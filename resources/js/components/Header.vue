<template>
<div class="header-app bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'about'}">About</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'blog'}">Blog</router-link>
          </li>
    
        </ul>
      </div>
    </nav>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>