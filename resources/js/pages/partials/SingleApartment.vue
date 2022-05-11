<template>
  <div class="container">
    <!-- Inizio container principale -->

    <!-- Inizio row intestazione -->
      <div class="row">

          <div class="col">
              <h1 class="text-center">Nome dell'appartamento e indirizzo</h1>
              <div class="apartment-description text-center">
                  <span>Località</span>
              </div>
          </div>

      </div>
      <!-- Fine row intestazione -->

        <!-- Row foto e mappa -->
        <div class="row row-cols-2">
            <!-- Colonna immagine appartamento -->
            <div class="col">
                <img class="rounded img-fluid" src="https://via.placeholder.com/350">
            </div>
            <!-- Colonna immagine appartamento -->
            <!-- Colonna mappa -->
            <div class="col">
                <img class="rounded img-fluid" src="https://via.placeholder.com/350">
            </div>
            <!-- Colonna mappa -->
        </div>
        <!-- Row foto e mappa -->

        <!-- Row informazioni appartamento -->
        <div class="row row-cols-2">
            <div class="col">
                <h2>Tipologia di appartamento e nome del proprietario</h2>
                <h3>Numero di occupanti, stanze, bagni e posti letto</h3>
                <div>
                    <p>Descrizione dettagliata dell'appartamento</p>
                </div>
            </div>
            <div class="col">
                <p>Box con servizi di maggior interesse</p>
            </div>
        </div>
        <!-- Row informazioni appartamento -->

        <!-- Row servizi aggiuntivi -->
        <div class="row">
            <div class="col">
                <ul>
                    <li>Servizio 1</li>
                    <li>Servizio 2</li>
                    <li>Servizio 3</li>
                    <li>Servizio 4</li>
                </ul>
            </div>
        </div>
        <!-- Row servizi aggiuntivi -->

        <!-- Row info sul proprietario -->
        <div class="row row-cols-2">
            <div class="col">
                <div>
                    <h2>Nome del proprietario</h2>
                    <span>Specifiche proprietario</span>
                    <p>Descrizione proprietario</p>
                </div>
            </div>

            <div class="col">
                <p>Contatta il proprietario</p>
            </div>
        </div>
        <!-- Row info sul proprietario -->

    <!-- Fine container principale -->
  </div>
</template>

<script>
export default {
    name: 'SingleApartment',
}
</script>

<style scoped lang="scss">
    @import '../../../sass/variables.scss';

    div {
        border: 1px solid black;
    }
</style>