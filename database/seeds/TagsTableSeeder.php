<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['FrontEnd', 'BackEnd', 'Design', 'UI', 'UX', 'Software', 'WebSite', 'WebApp'];

        foreach ($tags as $tag) {
            $new_tag = new Tag();
            
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag, '-');

            $new_tag->save();

        }
        
    }
}
