<template>
<div>
  <Header />
  <Main />
  <Footer />
</div>
</template>

<script>
  import Main from '../components/Main/Main'
  import Header from '../components/Header/Header'
  import Footer from '../components/Footer/Footer'
  export default {
    name: 'App',
    data(){
      return{

      }
    },
    components:{
      Main,
      Header,
      Footer
    }
  }
</script>

<style>

</style>