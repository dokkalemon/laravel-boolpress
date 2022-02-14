<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //validazione dei dati
        $request->validate($this->validation_rules(), $this->validation_message());

        $data = $request->all();
        $img_path = Storage::put('uploads', $data['image']);
        
        //generiamo un nuovo post
        $new_post = new Post();

        //creazione di slug univoco
        $slug = Str::slug($data['title'], '-');
        $count = 1;
        $slug_base = $slug;

        //ciclo per ottenere post con slug uguale
        while(Post::where('slug', $slug)->first()) {
            $slug = $slug_base . '-' . $count;
            $count++;
        }

        //assegnamo lo slug
        $data['slug'] = $slug;

        //assegnamo i dati
        $new_post->fill($data);

        //salviamo
        $new_post->save();

        //Salviamo la relazione con nuovo post e tags
        if (array_key_exists('tags', $data)) {
            $new_post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $new_post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        dump(asset($post->image));

        
        if (! $post) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validazione dei dati
        $request->validate($this->validation_rules(), $this->validation_message());

        $data = $request->all();

        //cerchiamo il post tramite id
        $post = Post::find($id);

        //Aggiorniamo lo slug solo se il titolo viene modificato
        if ($data['title'] != $post->title) {
            $slug = Str::slug($data['title'], '-');
            $count = 1;
            $slug_base = $slug;

            while (Post::where('slug', $slug)->first()) {
                $slug = $slug_base . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        } 
        else {
            $data['slug'] = $post->slug;
        } 

        //aggiorniamo il post
        $post->update($data);

        //Aggiorniamo i tags
        if (array_key_exists('tags', $data))
        //sync aggiunge ed elimina contemporaneamenta
            $post->tags()->sync($data['tags']);
        else {
        //cancelliamo tutti i
            $post->tags()->detach();
        };



        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }





/* Metodi per la validazione dei dati dei form create e edit */
    private function validation_rules() {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'nullable|mimes:jpg,bmp,png'
        ];
    }

    private function validation_message() {
        return [
            'required' => 'The :attribute is required',
            'max:255' => 'The :attribute is longer than 255 characters',
            'category_id.exists' => 'Select another Category',
            'tags.exists' => 'Select a different tag',
            'image.mimes' => 'Please, Choose a image with jpg, bmp or png extension'
        ];
    }
}
