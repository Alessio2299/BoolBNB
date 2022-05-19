<template>
  <div id='map' class='map'></div>
</template>

<script>
  import tt from '@tomtom-international/web-sdk-maps';
  export default {
    name : 'MiniMap',
    data() {
      return {
      }
    },props:{
      lat: String,
      lon: String,
      apartment: Object
    },
    mounted(){
      this.initializeMap()
    },
    methods:{
      initializeMap() { 
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
        var marker = new tt.Marker().setLngLat(latlon).addTo(this.map);
        var popup = new tt.Popup({ anchor: 'top' }).setText(this.apartment.title)
        marker.setPopup(popup).togglePopup();

        this.map.addControl(new tt.FullscreenControl());
        this.map.addControl(new tt.NavigationControl());
      }
    }    
  }
</script>

<style lang="scss" scoped>
  #map{
    width: 100%;
    height: 60vh;
    overflow: hidden;
  }
</style>>
