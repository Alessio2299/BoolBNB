<template>
    <div class="container-fluid py-4" id="section_01">

      <div class="row justify-content-center mb-5">
        <div class="col-4">
            <img class="img-fluid" src="../../../../public/img/Trending.png" alt="">
        </div>
      </div>

      <div class="row row-cols-4 mx-5">
        <a href="">
        <div class="col text-center">
          <div class="card" >
            <img class="card-img-top " src="../../../../public/img/trending1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-white">Apartment Title</h5>
            </div>
          </div>
        </div>
        </a>

        <a href="">
          <div class="col text-center">
            <div class="card" >
              <img class="card-img-top " src="../../../../public/img/trending2.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title text-white">Apartment Title</h5>
              </div>
            </div>
          </div>
        </a>


        <a href="">
          <div class="col text-center">
            <div class="card" >
              <img class="card-img-top " src="../../../../public/img/trending3.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title text-white">Apartment Title</h5>
              </div>
            </div>
          </div>
        </a>


        <a href="">
        <div class="col text-center">
          <div class="card" >
            <img class="card-img-top " src="../../../../public/img/trending4.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-white">Apartment Title</h5>
            </div>
          </div>
        </div>
        </a>

      </div>
    </div>    
</template>

<script>
  export default {
    name: 'TrendingNow',
    data(){
      return{

      }
    },
    components:{
     
    }
  }
</script>

<style scoped lang="scss">
    #section_01{
      background-color: #E7717D;
      h2{
        color: #FFCEAF;
      }

    
      a{
        text-decoration: none;
        .col .card{
          background-color: #E7717D;
          border: 6px solid #FFCEAF;
          box-shadow: 15px 15px #EF9273;
          cursor: pointer;
          transition: 0.3s;

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