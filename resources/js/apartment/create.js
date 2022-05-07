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

    sendForm(event){
      event.preventDefault();
      Axios.get('https://api.tomtom.com/search/2/geocode/' + this.addressInput + '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1')
      .then( resp => {
        if(resp.data.results.length == 0){
          this.success = false;
        } else{
          this.addressLat = resp.data.results[0].position.lat;
          this.addressLon = resp.data.results[0].position.lon;
          event.submit()
        }
      })
    }
  }
})