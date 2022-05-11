<template>
  <div class="main main_container">
    <h1 class="text-center mb-3">Home</h1>    

    <!-- Barra per la ricerca -->
    <div class="container-fluid py-4 py-4" id="jumbotron" style="backgroundColor: yellowgreen">
        <h1 class="text-center ">Search/Filters</h1>

      <form class="">
        <div class="row debug mx-5 justify-content-center ">

       
        <div class="col-8 text-center d-flex flex-column form-group align-content-center">
            <label for="address text-center d-block">Address</label>
            <input class="text-cente d-block" type="text" name="address" id="address">
        </div>
        
        <div class="col-2  text-center form-group">
          <label for="guests">Guests</label>
          <div class="row row">
            <button type="button" class="col btn btn-danger" @click="removeGuest">-</button>
             <input class="col-8 text-center" type="number" name="guests" id="guests" v-model="guests_num">
            <button type="button" class="col btn btn-danger" @click="guests_num++">+</button>
          </div>
        </div>

        <div class="text-center col-12">
          <button class="btn btn-danger my-4" type="submit">Search</button>
        </div>
         </div>
      </form>
    </div>


    <!-- Carosello con immagini che scorrono in automatico + eventuali scritte -->

    <Carousel/>

    <!-- Sezione Appartamenti Sponsorizzati -->
    
    <TrendingNow/>

    <!-- Altro carosello/slider che dovrebbe andare in automatico a mostrare recensioni di clienti/testimonial -->

    <AppFeatures/>

    <!-- Sezione "Nostre proposte"/Mete del momento, dovrebbe reindirizzare alla pagina della ricerca, per paese -->
    <PopularDestinations/>
    


  </div>
</template>

<script>
  import Carousel from './partials/Carousel'
  import TrendingNow from './partials/TrendingNow'
  import AppFeatures from './partials/Appfeatures'
  import PopularDestinations from './partials/PopularDestinations'

  export default {
    name : 'Home',
    components:{
      Carousel,
      TrendingNow,
      AppFeatures,
      PopularDestinations
    },
    data(){
      return{
        guests_num: null,
      }
    },
    methods:{
      removeGuest(){
        if(this.guests_num > 0){
          this.guests_num--
        }
      },
    },
  }
</script>

<style lang="scss" scoped>

</style>>
