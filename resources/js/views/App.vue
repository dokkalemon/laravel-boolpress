<template>
  <div class="div container mt-3">
    <h1>All Post</h1>

    <div class="all-posts" v-if="posts != null">
      <div class="post mt-5" v-for="post in posts" :key="`post${post.id}`">
        <h2>{{post.title}}</h2>
        <h4>{{formateDate(post.created_at)}}</h4>
        <p>{{createSubString(post.description, 150)}}</p>
        <br>
        <hr>
      </div>
    </div>

    <Loader v-else/>


   



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