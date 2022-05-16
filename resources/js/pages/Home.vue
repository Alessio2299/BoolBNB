<template>
  <div class="main main_container">
    <!-- Barra per la ricerca -->
    <div class="container-fluid py-4 px-0" id="jumbotron">
    <div class="overlay"></div>
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="img_box">
          <img src="../../../public/img/BoolBnb.png" alt="Logo" id="logo">
        </div>
      </div>
    </div>
      <div class="row align-items-end justify-content-center" id="row_jumbo">
        <div class="col-8">

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
    },
  }
</script>

<style lang="scss" scoped>

#jumbotron{
  background-image: url("../../../public/img/jumbotron.jpg");
  background-size: cover;
  background-position: center;
  position: relative;
  .img_box{
    width: min-content;
    margin: auto;
    #logo{
      transform: scale(0.8);
      }
    }

  .overlay{
    position: absolute;
    width: 100vw;
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
}

</style>>
