<template>
  <div class="div container mt-3">
    <h1>All Post</h1>

    <div class="all-posts" v-if="posts != null">

      <!-- Loop dei post -->
      <div class="post mt-5" v-for="post in posts" :key="`post${post.id}`">
        <h2>{{post.title}}</h2>
        <h4>{{formateDate(post.created_at)}}</h4>
        <p>{{createSubString(post.description, 150)}}</p>
        <br>
        <router-link  :to="{name: 'post', params:{slug: post.slug}}">Read More</router-link>

        <hr>
      </div>

      <!-- Button -->
      <div class="buttons">
        <button class="btn btn-primary" :disabled="this.pages.current === 1" @click="getPosts(pages.current - 1)">PREV</button>

      <button class="btn" :class="pages.current === index + 1 ? 'btn-primary' : 'btn-secondary'" v-for="(page, index) in pages.last" :key="`page${index}`" @click="getPosts(index + 1)">{{index + 1}}</button>


        <button class="btn btn-primary" :disabled="this.pages.current === this.pages.last" @click="getPosts(pages.current + 1)">NEXT</button>
      </div>
    </div>

    <Loader v-else text="Please Wait..."/>


   



  </div>
</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader'

export default {
    name: 'App',
    components: {
      Loader

    },

  data() {
    return  {
        posts: null,
        pages: null,
        
    }
  },

  created() {
      this.getPosts(1)
  },

  methods: {
    getPosts(page) {
      axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
      .then(result=> {
        this.posts = result.data.data;
        this.pages = {
          current: result.data.current_page,
          last: result.data.last_page,
        }
      })
      .catch(err=>{
        console.log(err);
      })
    },

    createSubString(string, maxLength) {
      if (string.length > maxLength) {
        return string.substr(0, maxLength) + '...';
      } 
        return string
    
    },

    formateDate(date) {
      const newDate = new Date(date);
      const dateFormatted = new Intl.DateTimeFormat('it-IT').format(newDate)
      return dateFormatted;
    }

    
    
  }

}
</script>

<style lang="scss">


</style>