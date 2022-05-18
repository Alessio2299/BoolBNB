<template>
    <div class="container-fluid  py-4 px-0" id="app_features">

      <div class="row odd flex  px-5">
        <div class=" col-xl-8 col-lg-7  col-md-12 col-sm-12  text_box odd text-center d-flex flex-column justify-content-center text-white">
          <h1 class="text-left display-4 pl-4">Find your next adventure between thousand of destinations</h1>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 text-center d-flex flex-column justify-content-end">
            <img class="img-fluid" src="../../../../storage/app/public/img/Map_Light.png" id="map_icon" alt="Map">
        </div>
      </div>

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFCEAF" fill-opacity="1" d="M0,64L120,85.3C240,107,480,149,720,181.3C960,213,1200,235,1320,245.3L1440,256L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg> 

      <div class="row even  px-5">
        <div class="col-xl-4 col-lg-5 col-md-12 text-center d-flex flex-column justify-content-around">
            <img class="img-fluid" src="../../../../storage/app/public/img/Comfort_Pink.png" id="comfort_icon" alt="Heart">
        </div>
        <div class="col-xl-8 col-lg-7  col-md-12  even text-center d-flex flex-column justify-content-around text-white">
          <h1 class="text-center display-4 ">Check off your apartment preferences and get all the comfort you deserve</h1>
        </div>
      </div>


      <!-- <div class="row"> -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFCEAF" fill-opacity="1" d="M0,320L120,293.3C240,267,480,213,720,192C960,171,1200,181,1320,186.7L1440,192L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg> 
      <!-- </div> -->
      <div class="row odd  px-5">
        <div class=" col-xl-8 col-lg-7  col-md-12 col-md-12 col-xs-12 text_box odd text-center d-flex flex-column justify-content-around text-white">
          <h1 class="text-left display-4 pl-5">Get in touch with our friendly hosts: it's super easy!</h1>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-12 col-md-12 col-xs-12 text-center d-flex flex-column justify-content-end mb-5">
            <img class="img-fluid" src="../../../../storage/app/public/img/Host_Light_1.png" id="host_icon" alt="Host">
        </div>
      </div>


    </div>
</template>

<script>
  
  export default {
    name: 'AppFeatures',
    data(){
      return{

      }
    },
    components:{
     
    }
  }
</script>

<style scoped lang="scss">
  #app_features{
    background-color: #E7717D;
  }

.row.odd{
  .text_box.odd{
    h1{
    color: #FFCEAF;
    font-weight: bolder;
    text-shadow: 3px 3px #EF9273;
    line-height: 5rem;
    padding-right: 1rem;
    }
  }
}
  .row.even{
    background-color: #FFCEAF;
    h1{
    color: #E7717D;
    font-weight: bolder;
    text-shadow: 3px 3px #EF9273;
    line-height: 6rem;
    padding-right: 1rem;
    }
  }


  #comfort_icon{
    transform: scale(0.85);
  }

  #host_icon{
    transform: scale(0.85);
  }

 
 
  @media only screen and (min-width: 992px) {
  #map_icon, #host_icon{
    box-shadow: -10px 10px #FFCEAF;
  }
  #comfort_icon{
    box-shadow: 10px 10px #E7717D;
  }
}
 
</style>