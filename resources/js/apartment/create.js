const { default: Axios } = require("axios");
const { event } = require("jquery");


var app = new Vue({
  el: '#app',
  data: {
    addressInput: '',
    listAddress: [],
    addressLat: '',
    addressLon: '',
    success: true,
  },
  methods:{
    autoComplete(){
      if(this.addressInput.length > 2){
        Axios.get('https://api.tomtom.com/search/2/search/' + this.addressInput + '.json?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Str&view=Unified&relatedPois=off&key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA')
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
    }

    // Test per prendere latitudine e longitudine attraverso le chiamate axios, con get per prendere i parametri lat e lon, mentre con post per
    // inviarli al controller Apartment 


    // sendForm(event){
    //   event.preventDefault();
    //   Axios.get('https://api.tomtom.com/search/2/geocode/' + this.addressInput + '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1')
    //   .then( resp => {
    //     this.addressLat = resp.data.results[0].position.lat;
    //     this.addressLon = resp.data.results[0].position.lon;
    //   })
    // },
    // sendLatLon(){
    //   Axios.post('/api/apartments',{
    //     'lat': '9',
    //     'lon': '9'
    //   })
    //   .then(resp => {
    //     console.log(resp);
    //   })
    //   .catch(err => {
    //     console.log(err)
    //   })
    // }
  }
})