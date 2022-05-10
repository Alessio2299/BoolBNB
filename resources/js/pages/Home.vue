<template>
  <div class="main main_container">
    <h1 class="text-center mb-3">Home</h1>    

    <!-- Barra per la ricerca -->
    <div class="container-fluid py-4 py-4" id="jumbotron" style="backgroundColor: yellowgreen">
        <h1 class="text-center ">Search/Filters</h1>

      <form class="">
        <div class="row debug mx-5 justify-content-center ">

       
        <div class="col-8 text-center d-flex flex-column form-group align-content-center">
            <label for="address text-center d-block">Address</label>
            <input class="text-cente d-block" type="text" name="address" id="address">
        </div>
        
        <div class="col-2  text-center form-group">
          <label for="guests">Guests</label>
          <div class="row row">
            <button type="button" class="col btn btn-danger" @click="removeGuest">-</button>
             <input class="col-8 text-center" type="number" name="guests" id="guests" v-model="guests_num">
            <button type="button" class="col btn btn-danger" @click="guests_num++">+</button>
          </div>
        </div>

        <div class="text-center col-12">
          <button class="btn btn-danger my-4" type="submit">Search</button>
        </div>
         </div>
      </form>
      
    </div>


    <!-- Carosello con immagini che scorrono in automatico + eventuali scritte -->
    <div class="container-fluid py-4" id="jumbotron" style="backgroundColor: cornflowerblue">
      <div class="row debug mx-5">
        <div class="col debug text-center d-flex flex-column justify-content-around">
          <h1 class="text-center">Carousel</h1>

          <div>
            <button type="button" class="btn btn-outline-dark">Bottone per azione</button>
          </div>

        </div>
      </div>
    </div>


      <!-- Sezione per apartamenti in offerta (dovrebbe reindirizzare al singolo appartamento) -->
    <div class="container-fluid py-4" id="section_01" style="backgroundColor: violet">
        <h2 class="text-center text-white">Hot deals</h2>
      <div class="row row-cols-4 debug mx-5">
        <div class="col debug text-center">
          <h4 class="text-center">hot deal 1</h4>
        </div>
        <div class="col debug text-center">
          <h4 class="text-center">hot deal 2</h4>
        </div>
        <div class="col debug text-center">
          <h4 class="text-center">hot deal 3</h4>
        </div>
        <div class="col debug text-center">
          <h4 class="text-center">hot deal 4</h4>
        </div>
      </div>
    </div>    


      <!-- Altro carosello/slider che dovrebbe andare in automatico a mostrare recensioni di clienti/testimonial -->
    <div class="container-fluid py-4" id="section_02" style="backgroundColor: turquoise">
      <div class="row debug mx-5">
        <div class="col debug text-center">
          <h1 class="text-center">Slider con recensione clienti</h1>
        </div>
      </div>
    </div>


    <!-- Sezione "Nostre proposte"/Mete del momento, dovrebbe reindirizzare alla pagina della ricerca, per paese -->
    <div class="container-fluid py-4" id="section_03" style="backgroundColor: antiquewhite">
        <h2 class="text-center ">Popular destinations (by country)</h2>
      <div class="row row-cols-3 debug mx-5">
        <div class="col debug text-center">
          <h4 class="text-center">destination 1</h4>
        </div>
        <div class="col debug text-center">
          <h4 class="text-center">destination 2</h4>
        </div>
        <div class="col debug text-center">
          <h4 class="text-center">destination 3</h4>
        </div>
      </div>
    </div>    


>>>>>>> create-home-page
  </div>
</template>

<script>
  export default {
    name : 'Home',
    data(){
      return{
        guests_num: null,
      }
    },
    methods:{
      removeGuest(){
        if(this.guests_num > 0){
          this.guests_num--
        }
      },
    },
  }
</script>

<style lang="scss" scoped>

</style>>
