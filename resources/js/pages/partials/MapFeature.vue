<template>
  <div id='map' class='map'></div>
</template>

<script>
  import tt from '@tomtom-international/web-sdk-maps';

  export default {
    name : 'MapFueture',
    data() {
      return {
        myZoom : 20
      }
    },props:{
      lat: Number,
      lon: Number,
      apartments: Array,
      radius: String
    },
    mounted(){
      this.initializeMap()
    },
    watch:{
      apartments(){
        this.initializeMap()
      },
      radius(){
        this.zoom()
      }
    },
    methods:{
      initializeMap() { 
        if(this.apartments.length == 1){
          var latlon = {
            lat: this.apartments[0].lat,
            lon: this.apartments[0].lon
          }
        }else{
          var latlon = {
            lat: this.lat,
            lon: this.lon
          }
        }
        this.map = tt.map({
        key: 'TounQy5Lqgw3CSCowM1qIL48LHEGF6WA',
        container: 'map',
        zoom: this.myZoom,
        center: latlon,
        style: 'https://api.tomtom.com/style/1/style/20.4.5-*/?map=basic_night&poi=poi_main'
        });
        if(this.apartments){
          var apartmentsMarker = [];
          this.apartments.forEach(apartment => {
            var latLng = {lat: apartment.lat, lng: apartment.lon}
            apartmentsMarker.push(latLng)
          })
            apartmentsMarker.forEach(apartmentMarker => {
              new tt.Marker().setLngLat(apartmentMarker).addTo(this.map);
            })
        }
        this.map.addControl(new tt.FullscreenControl());
        this.map.addControl(new tt.NavigationControl());
      },
      zoom(){
        switch (this.radius) {
          case '10':
            this.myZoom = 13
            break;
          case '9':
            this.myZoom = 14
            break;
          case '8':
            this.myZoom = 15
            break;
          case '7':
            this.myZoom = 16
            break;
          case '6':
            this.myZoom = 17
            break;
          default:
            this.myZoom = 20
        }
      }
    }    
  }
</script>

<style lang="scss" scoped>
  #map{
    width: 60vw;
    height: 60vh;
    overflow: hidden;
  }
</style>>
