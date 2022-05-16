<template>
<div id="carousel" class="carousel slide py-5" data-ride="carousel">
  <h1 class="text-center text-white mb-5">What's waiting for you</h1>
  <ul class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ul>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://q-xx.bstatic.com/xdata/images/hotel/840x460/76109618.jpg?k=ba537b048279407e0241cbd138c6dced32572a4f864bdaf5dbb60c314c3003b0&o=" alt="Flat-1">
    </div>
    <div class="carousel-item">
      <img src="https://real-estate.tornode.org/media/listings/4.jpeg" alt="Flat-2">
    </div>
    <div class="carousel-item">
      <img src="https://bigsee.eu/wp-content/uploads/2019/09/00_attic-flat.jpg" alt="Flat-3">
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

  .carousel-control-prev-icon, .carousel-control-next-icon {
    filter: invert(100%);
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