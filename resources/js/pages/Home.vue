<template>
  <div class="main main_container">
    <!-- Barra per la ricerca -->
    <div class="container-fluid pt-4 px-0" id="jumbotron">
    <div class="overlay"></div>
    <div class="row justify-content-center mx-0">
      <div class="col-6 text-center ">
          <img class="img-fluid" src="../../../storage/app/public/img/BoolBnb.png" alt="Logo" id="logo">
      </div>
    </div>
      <div class="row align-items-end justify-content-center mx-0 mt-3" id="row_jumbo">
        <div class="col-12">

          <form id="searchForm" @submit.prevent="getLongLat">
            <div class="row mx-5 justify-content-center ">
              
            <div class="col-8 text-center d-flex flex-column form-group align-content-center">
                <label for="address"></label>
                <input @keyup="autoComplete" class="d-block" type="text" name="address" id="address" v-model="addressInput" placeholder="Where to?">
                <p v-for="(error, index) in errors.name" :key="'error_name'+index" class="invalid-feedback">
                  {{error}}
                </p>                    

                  <div class="mt-1">
                    <div @click="clickAddress(index)" class="text-left bg-white my_hover p-3" v-for="(address,index) in listAddress" :key="index">
                      <i class="mr-2 fas fa-map-marker-alt"></i> {{address.address.freeformAddress}} {{address.address.country}} {{address.address.countryCode}}  
                    </div>
                  </div>
              </div>
              <div class="text-center col-12">
                <button class="btn btn-danger my-4" type="submit">Search</button>
              </div>
            </div>
          </form>

        </div>
      </div>
      <div class="row"> 
        <div class="col">
          <svg class="w-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#E7717D" fill-opacity="1" d="M0,224L120,197.3C240,171,480,117,720,122.7C960,128,1200,192,1320,224L1440,256L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>     
        </div>
      </div>

    </div>


    <AppFeatures/>

    <div class="container-fluid py-4" id="section_01">

      <div class="row justify-content-center mb-5">
        <div class="col-md-7">
            <img class="img-fluid" src="../../../storage/app/public/img/Trending.png" alt="">
        </div>
      </div>

      <div class="row  mx-5">
        <TrendingNow 
          v-for="apartment in apartments"
          :key="apartment.id"
          :title= "apartment.title"
          :image= "apartment.image"
          :slug= "apartment.slug"
        />
      </div>
    </div>

    <Carousel/>
 
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
      isSending: false,
      apartments: []
      }
    },
    mounted(){
      this.getApartments()
    },
    methods:{
      autoComplete(){
        if(this.addressInput.length > 3){
          Axios.get('https://api.tomtom.com/search/2/search/' + this.addressInput + '.json?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Geo%2CStr&view=Unified&relatedPois=off&key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA')
          .then(resp => {
            this.listAddress = resp.data.results;
          })
        }
        if(this.addressInput.length <= 2){
          this.listAddress = []
        }
      },
      clickAddress(index){
      this.addressInput = this.listAddress[index].address.freeformAddress + ' ' + this.listAddress[index].address.country + ' ' + this.listAddress[index].address.countryCode;
      this.listAddress = [];
      clearInterval(this.interval);
    },
    getLongLat(event){
      this.success = true;
      if(this.addressInput.length != 0){
        event.preventDefault();
        Axios.get('https://api.tomtom.com/search/2/geocode/' + this.addressInput + '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1')
        .then( resp => {
          if(resp.data.results.length == 0 || resp.data.results[0].address.freeformAddress + ' ' + resp.data.results[0].address.country + ' ' + resp.data.results['0'].address.countryCode != this.addressInput){
            this.success = false;
          } else{
            this.addressLat = resp.data.results[0].position.lat;
            this.addressLon = resp.data.results[0].position.lon;
            setTimeout(() => {
              this.isSending = true;
              this.$router.push({ name: 'advancedSearch' , params: { address: this.addressInput}})
            },200)
          }
        })
      }
    },
    getApartments(){
      Axios.get('/api/all/apartments')
      .then(resp =>{
        for(let i = 0; i < 4; i++){
          this.apartments.push(resp.data.results[i])
        }
      })
    }
    },
  }
</script>

<style lang="scss" scoped>
  .main_container{
    overflow-x: hidden;
  }
  #jumbotron{
    background-image: url("../../../storage/app/public/img/jumbotron.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
   
      #logo{
        transform: scale(0.8);
        }

    .overlay{
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      background-color: black;
      opacity: 0.4;
    }
      #row_jumbo{
        flex-basis: 100%;
      }
      #address{
        outline: none;
        border-radius: 10px;
        border: 0;
        padding: 0.5rem;
      }

      svg{
        z-index: 99;
      }
  }
  #section_01{
    background-color: #E7717D;
    h2{
      color: #FFCEAF;
    }
  }

</style>>
