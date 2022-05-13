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
      apartment: Object
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
        console.log(this.apartment)
        var apartmentLatLon = {
          lat: this.apartment.lat,
          lon: this.apartment.lon,
        }
        this.map = tt.map({
        key: 'TounQy5Lqgw3CSCowM1qIL48LHEGF6WA',
        container: 'map',
        zoom: 15,
        center: latlon
        });
        var marker = new tt.Marker().setLngLat(apartmentLatLon).addTo(this.map);
        var popup = new tt.Popup({ anchor: 'top' }).setText(this.apartment.title)
        marker.setPopup(popup).togglePopup()
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
