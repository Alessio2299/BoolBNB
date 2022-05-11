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
                <h3>Foto dell'appartamento</h3>
                <img class="img-fluid p-3" src="https://via.placeholder.com/350">
            </div>
            <!-- Colonna immagine appartamento -->
            <!-- Colonna mappa -->
            <div class="col">
                <div class="map">
                    <h3 class="text-center p-5">Possibile collocazione mappa</h3>
                </div>
                <div>
                    <h4>Highlights near you</h4>
                    <p>Descrizione dei maggiori punti di interesse vicini all'indirizzo</p>
                </div>
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
                <ul>
                    <li>Ex: Check-in time</li>
                    <li>Ex: Check-out time</li>
                    <li>Ex: no smoking area</li>
                    <li>Ex: not suitabile for kids</li>
                </ul>
            </div>
        </div>
        <!-- Row informazioni appartamento -->

        <!-- Row servizi aggiuntivi -->
        <div class="row">
            <div class="col">
                <h3>Additional services for enjoying your stay</h3>
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

    .container {
        border: 1px solid red;

        .col {
            border: 1px solid black;
        }

        .map {
            height: 80%;
            width: 100%;
            border: 1px solid blue;
        }

        img {
            border-radius: 10%;
        }
    }
</style>