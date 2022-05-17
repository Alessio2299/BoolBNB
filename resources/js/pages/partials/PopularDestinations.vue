<template>
   <div class="container-fluid py-4" id="section_03" >
     <div class="row justify-content-center mb-5">
        <div class="col-4">
            <img class="img-fluid" src="../../../../storage/app/public/img/Popular_Destinations.png" alt="">
        </div>
      </div>
      <div class="row row-cols-3 mx-5 mb-5">
        <router-link :to="{name: 'advancedSearch', params :{address: destination.country}}" v-for="destination in destinations" :key="destination.name">
        <div class="col text-center ">
          <div class="card d-flex align-items-center" >
            <h1 class="card-title text-white">{{destination.country}}</h1>
            <img class="card-img-top "  style="height: 21rem;" :src="destination.path" alt="Card image cap">
          </div>
        </div>
        </router-link>

      </div>
    </div>
</template>

<script>
  
  export default {
    name: 'PopularDestinations',
    data(){
      return{
        destinations:[
          {
            country: 'Morocco',
            path: require('../../../../storage/app/public/img/Morocco.jpg')
          },
          {
            country: 'Italy',
            path: require('../../../../storage/app/public/img/Italy.jpg')

          },
          {
            country: 'Norway',
            path: require('../../../../storage/app/public/img/Norway.jpg')

          },
        ]

      }
    },
    components:{
     
    },
    methods:{
       getLatlong(){
            axios.get('https://api.tomtom.com/search/2/geocode/' + this.$route.params.address + '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1')
            .then( resp => {
                if(resp.data.results.length == 0){
                    this.success = false;
                } else{
                    this.addressLat = resp.data.results[0].position.lat;
                    this.addressLon = resp.data.results[0].position.lon;
                    this.flag = true
                }
            })
        },
    }
  }
</script>

<style lang="scss" scoped>
    #section_03{
      background-color: #FFCEAF;
      h2{
        color: #FFCEAF;
      }

    
      a{
        text-decoration: none;
        .col .card{
          background-color: #E7717D;
          border: 6px solid #E7717D;
          box-shadow: 15px 15px #EF9273;
          cursor: pointer;
          transition: 0.3s;
          position: relative;

          h1{
            position: absolute;
            font-family: Montserrat, sans-serif;
            text-transform: uppercase;
          }


          a{
            background-color: #EF9273;
            border: 0;
          }
          &:hover{
            box-shadow: 20px 25px #EF9273;
            transition: 0.4s;
            transform: translateY(-15px);
          }
        }
      }
    }
</style>