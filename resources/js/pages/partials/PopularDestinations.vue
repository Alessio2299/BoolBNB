<template>
   <div class="container-fluid py-4" id="section_03" >
     <div class="row justify-content-center mb-5">
        <div class="col-sm-6">
            <img class="img-fluid" src="../../../../storage/app/public/img/Popular_Destinations.png" alt="">
        </div>
      </div>
      <div class="row row-cols-md-3 row-cols-sm-1  mx-5 mb-5">
        <router-link :to="{name: 'advancedSearch', params :{address: destination.uri}}" v-for="destination in destinations" :key="destination.name">
        <div class="col text-center ">
          <div class="card d-flex align-items-center my-4" >
            <p class="card-title text-white h2 mt-2">{{destination.country}}</p>
            <img class="card-img-top "  :src="destination.path" alt="Card image cap">
          </div>
        </div>
        </router-link>

      </div>
    </div>
</template>

<script>
  const dayjs = require('dayjs')
  export default {
    name: 'PopularDestinations',
    data(){
      return{
<<<<<<< HEAD
        destinations:[
          {
            country: 'Morocco',
            uri: 'Morocco',
            path: require('../../../../storage/app/public/img/Cropped_Morocco.jpg')
          },
          {
            country: 'Italy',
            uri: 'Italia',
            path: require('../../../../storage/app/public/img/Italy.jpg')

          },
          {
            country: 'Norway',
            uri: 'Norway',
            path: require('../../../../storage/app/public/img/Cropped_Norway.jpg')

          },
        ]

=======
        dateNow: dayjs().format('D-MM-YYYY').split('-').slice(1,2).join(''),
        destinations: []
>>>>>>> fix-home
      }
    },
    mounted(){
      this.getDestination()
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
        getDestination(){
          if(this.dateNow >= '04' && this.dateNow <= '09'){
            this.destinations = [
              {
                country: 'Morocco',
                uri: 'Morocco',
                path: require('../../../../storage/app/public/img/Morocco.jpg')
              },
              {
                country: 'Italy',
                uri: 'Italia',
                path: require('../../../../storage/app/public/img/Italy.jpg')

              },
              {
                country: 'Greece',
                uri: 'Greece',
                path: require('../../../../storage/app/public/img/grecia.jpeg')

              },
            ]
          } else {
            this.destinations = [
              {
                country: 'Austria',
                uri: 'Austria',
                path: require('../../../../storage/app/public/img/Austria.jpeg')
              },
              {
                country: 'Germany',
                uri: 'Germany',
                path: require('../../../../storage/app/public/img/Germany.jpeg')

              },
              {
                country: 'Norway',
                uri: 'Norway',
                path: require('../../../../storage/app/public/img/Norway.jpg')

              },
            ]
          }
        }
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
        .card{
          background-color: #E7717D;
          border: 6px solid #E7717D;
          box-shadow: 15px 15px #EF9273;
          cursor: pointer;
          transition: 0.3s;
          position: relative;

          p.card-title{
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