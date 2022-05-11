<template>
   <div class="container-fluid py-4" id="section_03" style="backgroundColor: antiquewhite">
        <h2 class="text-center ">Popular destinations</i></h2>
      <div class="row row-cols-5 debug mx-5 ">
        <a class="col debug text-center box" href="">
          <img src="../../../../public/img/Neworleans.png" alt="">
        </a>
        <a class="col debug text-center box" href="">
          <img src="../../../../public/img/Paris.png" alt="">
        </a>
        <a class="col debug text-center box" href="">
          <img src="../../../../public/img/Milan.png" alt="">
        </a>
        <a class="col debug text-center box" href="">
          <img src="../../../../public/img/Sandiego.png" alt="">
        </a>
        <a class="col debug text-center box" href="">
          <img src="../../../../public/img/Florence.png" alt="">
        </a>
      </div>
    </div>
</template>

<script>
  
  export default {
    name: 'PopularDestinations',
    data(){
      return{

      }
    },
    components:{
     
    }
  }
</script>

<style>
  .box:hover{
    background-color: #72f3e4;
    transition: 1s;
  }

  img {
    width: auto;
    height: 90%;
    object-fit: contain;
  }

  
</style>