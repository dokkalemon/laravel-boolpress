<template>
  <div class="container mt-5">
      <div class="post" v-if="postDetail">
          <h1>{{postDetail.title}}</h1>
          <div class="date-create">
              Data inserimento: {{formateDate(postDetail.created_at)}}
          </div>
          <h3><span class="badge badge-primary">{{postDetail.category.name}}</span></h3>
          <p>{{postDetail.description}}</p>
          <h4>Tag</h4>
          <h5><span class="badge badge-primary" v-for="tag in postDetail.tags" :key="`tag${tag.id}`">{{tag.name}}</span></h5>
      </div>

      <Loader v-else text="Loading Post Detail..."/>
  </div>


</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader.vue'

export default {
    name: 'Post', 
    components: {
        Loader
    },

    created() {
        this.getPostDetail();
    },

    data() {
        return {
            postDetail: null,
        }
    },

    methods: {
        getPostDetail() {
            axios.get(`http://127.0.0.1:8000/api/post/${this.$route.params.slug}`)
            .then(res=>{
                if (res.data.not_available) {
                    this.$router.push({name: 'invalid'})
                } else {
                    
                    this.postDetail = res.data;
                }
            })
            .catch(err=>{
                console.log(err);
            })
        },

        formateDate(date) {
            const newDate = new Date(date);
            const dateFormatted = new Intl.DateTimeFormat('it-IT').format(newDate)
            return dateFormatted;
        }


    }
}
</script>

<style>

</style>