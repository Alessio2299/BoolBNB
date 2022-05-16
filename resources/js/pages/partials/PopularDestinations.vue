<template>
   <div class="container-fluid py-4" id="section_03" >
        <h2 class="text-center ">Popular destinations</h2>
      <div class="row row-cols-3 mx-5 ">
        <a class="col text-center box" href="">
          <img src="../../../../public/img/Paris.png" alt="">
        </a>
        <a class="col text-center box" href="">
          <img src="../../../../public/img/Greece.png" alt="">
        </a>
        <a class="col text-center box" href="">
          <img src="../../../../public/img/Italy.png" alt="">
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

<style lang="scss">

  .box{
    border-radius: 50%;
  }

  .box:hover{
    transition: 1s;
  }

  img {
    width: 90%;
    height: 90%;
    object-fit: contain;
  }



  
</style>