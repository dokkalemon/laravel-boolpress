<template>
  <div class="div container mt-3">
    <h1>All Post</h1>

    <div class="post mt-5" v-for="post in posts" :key="`post${post.id}`" >
      <h2>{{post.title}}</h2>
      <h4>{{post.created_at}}</h4>
      <p>{{createSubString(post.description, 150)}}</p>
      <br>
      <hr>
    </div>
   



  </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'App',
    components: {

    },

  data() {
    return  {
        posts: null,
    }
  },

  created() {
      this.getPosts()
  },

  methods: {
    getPosts() {
      axios.get('http://127.0.0.1:8000/api/posts')
      .then(result=> {
        this.posts = result.data;
      })
      .catch(err=>{
        console.log(err);
      })
    },

    createSubString(string, maxLength) {
      if (string.length > maxLength) {
        return string.substr(0, maxLength) + '...';
      } else {
        return string
      }
    }

    
    
  }

}
</script>

<style lang="scss">


</style>