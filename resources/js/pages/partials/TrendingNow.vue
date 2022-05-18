<template>
  <a :href="'/apartments/single-apartment/' + slug">
    <div class="col text-center">
      <div class="card" >
        <img class="card-img-top " :src="image" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title text-white">{{title}}</h5>
        </div>
      </div>
    </div>
  </a>  
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
  a{
    text-decoration: none;
    .col .card{
      background-color: #E7717D;
      border: 6px solid #FFCEAF;
      box-shadow: 15px 15px #EF9273;
      cursor: pointer;
      transition: 0.3s;
      height: 400px;
      img{
        width: 100%;
        height: 300px;
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
</style>