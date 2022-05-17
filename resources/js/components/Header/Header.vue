<template>
  <header class="nav_header" @scroll="test" :class="nav_transparent == true ? 'transparent' : 'nav_bg' ">
    <nav class="navbar navbar-expand-lg navbar-dark mx-5">
        <router-link class="navbar-brand nav_text" :to="{name:'home'}">
         <img class="my_img" src="../../../../storage/app/public/img/BoolBnb.png" alt="Logo BoolBnb">
        </router-link>
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
    data(){
        return{
            nav_transparent : false,
        }
    },
    methods:{
        test(){
            if(window.scrollY > 20){
                this.nav_transparent = true
            }else{
                this.nav_transparent = false
            }
        }
    },
    mounted() {
        document.addEventListener('scroll', this.test)
    }
    

  }
</script>

<style scoped lang="scss">
   @import '../../../sass/variables.scss';
    
    .nav_header{
        position: fixed;
        z-index: 999;
        width: 100%;
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
    .my_img{
        width: 60px;
        margin-right: 10px;
      }

    .transparent{
        transition: 0.9s;
        background-color: $nav_bg;
    }

    .nav_bg{
        background-color: transparent;
        transition: 0.4s;
    }

</style>