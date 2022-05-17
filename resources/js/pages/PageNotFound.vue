<template>
    <section class="container">
        <div class="row">
            <div class="col-12 d-flex flex-column">
                <img class="bool-logo" src="../../../public/images/BoolBnb.png" alt="Logo BoolBnb">
                <h1 class="text-center">Sorry, we could not find the page you are looking for!</h1>
            </div>
        </div>
    </section>
</template>

<script>
import About from './About.vue'
export default {
  components: { About },
    name: 'PageNotFound'
}
</script>

<style lang="scss" scoped>
    .container {
        height: 100vh;
        .row {
            padding-top: 200px;
            .bool-logo {
                width: 500px;
                margin: 0 auto;

            }
        }
    }
</style>