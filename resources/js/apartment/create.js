const { default: Axios } = require("axios");
const { event } = require("jquery");


var app = new Vue({
  el: '#app',
  data: {
    addressInput:'',
    listAddress: [],
    AddressLat: '',
    AddressLon: ''
  },
  methods:{
    autoComplete(){
      if(this.addressInput.length > 2){
        Axios.get('https://api.tomtom.com/search/2/search/' + this.addressInput + '.json?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Str&view=Unified&relatedPois=off&key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA')
        .then(resp => {
          this.listAddress = resp.data.results;
          console.log(this.listAddress[0])
        })
      }
      if(this.addressInput.length <= 2){
        this.listAddress = []
      }
    },
    clickAddress(index){
      this.addressInput = this.listAddress[index].address.freeformAddress + ' ' + this.listAddress[index].address.country + ' ' + this.listAddress[index].address.countryCode;
      this.listAddress = [];
    },
    sendForm(event){
      event.preventDefault();
      Axios.get('https://api.tomtom.com/search/2/geocode/' + this.addressInput + '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1')
      .then( resp => {
        this.AddressLat = resp.data.results[0].position.lat;
        this.AddressLon = resp.data.results[0].position.lon;
        console.log(this.AddressLat);
        console.log(this.AddressLon);
      })
    }
  }
})