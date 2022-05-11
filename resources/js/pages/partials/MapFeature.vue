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
        this.map = tt.map({
        key: 'TounQy5Lqgw3CSCowM1qIL48LHEGF6WA',
        container: 'map',
        zoom: 17
        });
      }
    }    
  }
</script>

<style lang="scss" scoped>
  #map{
    width: 60vw;
    height: 60vh;
  }
</style>>
