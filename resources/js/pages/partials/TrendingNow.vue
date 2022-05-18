<template>
    <div class="col-md-6 col-lg-3 text-center pb-5">
        <div class="card">
          <a :href="'/apartments/single-apartment/' + slug">
            <img class="card-img-top img-fluid" :src="image" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title ">{{title}}</h5>
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
    props:{
      title : String,
      image : String,
      slug : String
    }
  }
</script>

<style scoped lang="scss">
  
    .card{
      background-color: #E7717D;
      border: 6px solid #FFCEAF;
      box-shadow: 15px 15px #EF9273;
      cursor: pointer;
      transition: 0.3s;
      .card-body{
        background-color: #FFCEAF;
      }
        a{
          text-decoration: none;
          .card-title{
            color: #EF9273;
            font-family: Montserrat, sans-serif;
          }
          img{
            width: 100%;
        }
      
        }
      &:hover{
        box-shadow: 20px 25px #EF9273;
        transition: 0.4s;
        transform: translateY(-15px);
      }
    }
</style>