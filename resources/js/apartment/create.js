const { default: Axios } = require("axios");
const { event } = require("jquery");


var app = new Vue({
  el: '#app',
  data: {
    addressInput: '',
    listAddress: [],
    addressLat: '',
    addressLon: '',
    success: null,
  },
  mounted(){
    this.oldAddress();
  },
  methods:{
    oldAddress(){
      let old = document.getElementById('old-address').value;
      this.addressInput = old;
    },
    autoComplete(){
      if(this.addressInput.length > 3){
        Axios.get('https://api.tomtom.com/search/2/search/' + this.addressInput + '.json?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=Str&view=Unified&relatedPois=off&key=dE9bHqujdqyvRaNJuN6VZY7LZmSuidap')
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

    sendForm(event){
      this.success = true;
      if(this.addressInput.length != 0){
        event.preventDefault();
        let form = document.getElementById('form');
        Axios.get('https://api.tomtom.com/search/2/geocode/' + this.addressInput + '.json?key=dE9bHqujdqyvRaNJuN6VZY7LZmSuidap&limit=1')
        .then( resp => {
          if(resp.data.results.length == 0 || resp.data.results[0].address.freeformAddress + ' ' + resp.data.results[0].address.country + ' ' + resp.data.results['0'].address.countryCode != this.addressInput){
            this.success = false;
          } else{
            this.addressLat = resp.data.results[0].position.lat;
            this.addressLon = resp.data.results[0].position.lon;
            setTimeout(() => {
              form.submit()
            },200)
          }
        })
      }
    }
  }
})