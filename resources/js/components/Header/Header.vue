<template>
  <header class="nav_header">
    <nav class="navbar navbar-expand-lg navbar-dark mx-5">
        <a class="navbar-brand nav_text" href="#">BoolBnb</a>
        <button class="navbar-toggler nav_text" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon nav_text"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <router-link class="nav-link nav_text" :to="{name:'home'}">Home <span class="sr-only">(current)</span></router-link>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link nav_text" :to="{name:'about'}">About <span class="sr-only">(current)</span></router-link>
            </li>
            <li class="nav-item active">
                <a class="nav-link nav_text" href="/admin"> I'm a Host <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        </div>
    </nav>
  </header>
</template>

<script>  
  export default {
    name : 'Header',

  }
</script>

<style scoped lang="scss">
   @import '../../../sass/variables.scss';
    
    .nav_header{
        background-color: $nav_bg;
        border-bottom: 1px solid rgb(196, 196, 196) ;
    }

    .nav_text{
        color: $nav_text;
    }

    .navbar-nav li a{
        margin: 0 1rem;
        border-bottom: 2px solid transparent;
        &:hover{
            border-bottom: 2px solid $nav_text;
            transition: 0.5s;
        }
    }



</style>