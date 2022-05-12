<template>
<div id="demo" class="carousel slide" data-ride="carousel">

  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
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

  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
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

.carousel-item {
  background-color: yellowgreen;
  height: 500px;
  img {
    width: 100%;
  }
}

</style>