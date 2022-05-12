<template>
  <div class="main main_container">
    <h1 class="text-center mb-3">Home</h1>    

    <!-- Barra per la ricerca -->
    <div class="container-fluid py-4 py-4" id="jumbotron" style="backgroundColor: yellowgreen">
        <h1 class="text-center ">Search/Filters</h1>

      <form id="searchForm" @submit.prevent="getLongLat">
        <div class="row debug mx-5 justify-content-center ">

       
        <div class="col-8 text-center d-flex flex-column form-group align-content-center">
            <label for="address">Address</label>
            <input @focus="autoComplete" class="d-block" type="text" name="address" id="address" v-model="addressInput">
            <p v-for="(error, index) in errors.name" :key="'error_name'+index" class="invalid-feedback">
              {{error}}
            </p>                    

            <div class="mt-1">
              <div @click="clickAddress(index)" class="text-left bg-white my_hover p-3" v-for="(address,index) in listAddress" :key="index">
                <i class="mr-2 fas fa-map-marker-alt"></i> {{address.address.freeformAddress}} {{address.address.country}} {{address.address.countryCode}}  
              </div>
            </div>
        </div>
        
        <!-- <div class="col-2  text-center form-group">
          <label for="guests">Guests</label>
          <div class="row row">
            <button type="button" class="col btn btn-danger" @click="removeGuest">-</button>
             <input class="col-8 text-center" type="number" name="guests" id="guests" v-model="guests_num">
            <button type="button" class="col btn btn-danger" @click="guests_num++">+</button>
          </div>
        </div> -->

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

  const { default: Axios } = require("axios");


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
      addressInput: '',
      addressLat: '',
      addressLong: '',
      success: null,
      listAddress: [],
      errors: {},
      isSending: false

      }
    },
    methods:{
      // removeGuest(){
      //   if(this.guests_num > 0){
      //     this.guests_num--
      //   }
      // },
      autoComplete(){
        this.interval = setInterval(() => {
          if(this.addressInput.length > 3){
            Axios.get('https://api.tomtom.com/search/2/search/' + this.addressInput + '.json?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Str&view=Unified&relatedPois=off&key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA')
            .then(resp => {
              this.listAddress = resp.data.results;
            })
          }
          if(this.addressInput.length <= 2){
            this.listAddress = []
          }
        },1000)
      },
      clickAddress(index){
      this.addressInput = this.listAddress[index].address.freeformAddress + ' ' + this.listAddress[index].address.country + ' ' + this.listAddress[index].address.countryCode;
      this.listAddress = [];
      clearInterval(this.interval);
    },
    getLongLat(event){
      this.success = true;
      // var data = {
      //   address: this.addressInput
      // }
      if(this.addressInput.length != 0){
        event.preventDefault();
        Axios.get('https://api.tomtom.com/search/2/geocode/' + this.addressInput + '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1')
        .then( resp => {
          if(resp.data.results.length == 0 || resp.data.results[0].address.freeformAddress + ' ' + resp.data.results[0].address.country + ' ' + resp.data.results['0'].address.countryCode != this.addressInput){
            this.success = false;
          } else{
            this.addressLat = resp.data.results[0].position.lat;
            this.addressLon = resp.data.results[0].position.lon;
            setTimeout(() => {
              this.isSending = true;
              axios.post("/api/apartments",{
                  "address" : this.addressInput
                  }).then(response =>{
                  this.isSending = false;
                  if(response.data.errors){
                      this.errors = response.data.errors;
                      this.success = false;
                  }else{
                    console.log(this.addressInput)
                    this.success = true;
                    this.addressInput = '';
                    this.errors = {};
                  }
                  console.log(response)
                });
            },200)
          }
        })
      }
    },



    },
  }
</script>

<style lang="scss" scoped>

</style>>
