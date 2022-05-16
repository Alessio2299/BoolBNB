<template>
  <div id='map' class='map'></div>
</template>

<script>
  import tt from '@tomtom-international/web-sdk-maps';
  export default {
    name : 'MapFueture',
    data() {
      return {
      }
    },props:{
      lat: Number,
      lon: Number,
      apartments: Array
    },
    mounted(){
      this.initializeMap()
    },
    methods:{
      initializeMap() { 
        console.log(this.lat)
        console.log(this.lon)
        var latlon = {
          lat: this.lat,
          lon: this.lon
        }
        this.map = tt.map({
        key: 'TounQy5Lqgw3CSCowM1qIL48LHEGF6WA',
        container: 'map',
        zoom: 15,
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
