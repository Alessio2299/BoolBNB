<template>
  <div>
    <div class="main">
      <div class="container text-center">
        <h1 class="text-uppercase">About</h1>    
      </div>
    </div>
    <div class="container">
      <h2 class="text-center pt-3">Our Team</h2>
      <div class="row row-30 justify-content-center">
        <CardTeam 
          name="Alessio Napoli"
          image="Alessio Napoli.jpg"
          job="Full Stack Web Developer"
          linkGitHub="https://github.com/Alessio2299"
        />
        <CardTeam 
          name="Edoardo Lai"
          image="Edoardo Lai.jpeg"
          job="Full Stack Web Developer"
          linkGitHub="https://github.com/EdoardoLai96"
        />
        <CardTeam 
          name="Dario La Tegola"
          image="Dario La Tegola.jpeg"
          job="Full Stack Web Developer"
          linkGitHub="https://github.com/Afrodario"
        />
        <CardTeam 
          name="Christian D'Agostino"
          image="Christian D'Agostino.jpeg"
          job="Full Stack Web Developer"
          linkGitHub="https://github.com/Chris-dagostino"
        />
        <CardTeam 
          name="Marianna Galuppi"
          image="Marianna galuppi.jpeg"
          job="Full Stack Web Developer"
          linkGitHub="https://github.com/FloatIndex"
        />
      </div>
    </div>
  </div>
</template>

<script>
  import CardTeam from './partials/CardTeam.vue'
  export default {
    name : 'Home',
    components:{
      CardTeam,
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../sass/variables.scss';

  .main{
    background-image: url('../../../storage/app/public/img/slider.jpg');
    background-position: center;
    background-size: cover;
    height: 200px;
    width: 100%;
    h1{
      font-weight: 600;
      padding-top: 120px;
      font-family: 'Cormorant', serif;
    }
  }
  .container{
    h2{
      font-weight: 600;
      font-family: 'Cormorant', serif;
    }
  }
</style>>
