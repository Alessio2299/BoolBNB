<template>
<div id="carousel" class="carousel slide p-5" data-ride="carousel">
  <ul class="carousel-indicators ">
    <li data-target="#carousel" data-slide-to="0" data-intervall="1000" class="active"></li>
    <li data-target="#carousel" data-slide-to="1" data-intervall="1000"></li>
    <li data-target="#carousel" data-slide-to="2" data-intervall="1000"></li>
  </ul>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../../../public/img/Slide_1_.jpg" alt="Flat-1">
    </div>
    <div class="carousel-item">
      <img src="../../../../public/img/Slide_2_.jpg" alt="Flat-2">
    </div>
    <div class="carousel-item">
      <img src="../../../../public/img/Slide_3_.jpg" alt="Flat-3">
    </div>
  </div>

  <a class="carousel-control-prev" href="#carousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#carousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</template>

<script>
  
  export default {
    name: 'Carousel',
    data(){
      return{

      }
    },
    components:{
     
    }
  }
</script>

<style scoped lang="scss">

#carousel{
  background-color: #E7717D;

  ul{
    visibility: hidden;
  }

  .carousel-control-prev-icon, .carousel-control-next-icon {
    filter: invert(100%);
  }
  .carousel-inner{
    border: 6px solid #FFCEAF;
  }

  .carousel-item {
    height: 500px;

    img {
      width: 100%;
      object-fit: cover;
      height: 100%;
    }
  }
  
}



</style>