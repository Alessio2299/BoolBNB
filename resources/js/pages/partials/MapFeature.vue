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
    },
    mounted(){
      this.initializeMap()
    },
    methods:{
      initializeMap() { 
        var latlon = {
          lat: 9.0548,
          lon: 7.4856
        }
        this.map = tt.map({
        key: 'TounQy5Lqgw3CSCowM1qIL48LHEGF6WA',
        container: 'map',
        zoom: 15,
        center: latlon
        });
        var marker = new tt.Marker().setLngLat(latlon).addTo(this.map);
        var popup = new tt.Popup({ anchor: 'top' }).setText('Ciao')
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
