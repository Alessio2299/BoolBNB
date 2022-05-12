<template>
    <section>
        <div class="container my-3">
            <div class="row">
                <div class="col-12 my-3">
                    <h1 class="text-center">Ricerca avanzata</h1>
                </div>

                <div class="col-12 d-flex justify-content-around my-3">
                    <div>
                        <label for="rooms">Rooms</label>
                        <input type="number" min=1 name="rooms" id="rooms" v-model="rooms_num">
                    </div>

                    <div>
                        <label for="beds">Beds</label>
                        <input type="number" min=1 name="beds" id="beds" v-model="beds_num">
                    </div>

                    <div>
                        <label for="bathrooms">Bathrooms</label>
                        <input type="number" min=1 name="bathrooms" id="bathrooms" v-model="bathrooms_num">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-around my-3">
                    <div v-for="amenity in amenities" :key="amenity.id">
                        <label :for="amenity.name">{{amenity.name}}</label>
                        <input type="checkbox" :id="amenity.name" :value="amenity.name" v-model="checked_amenities">
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-dark" @click="filterApartments()">Cerca</button>
                </div>
            </div>

            <!-- <form action="">
                <div class="d-flex justify-content-around my-3">
                    <div class="form-group">
                        <label for="rooms">Rooms</label>
                        <input type="number" min=1 name="rooms" id="rooms" v-model="rooms_num">
                    </div>

                    <div class="form-group">
                        <label for="beds">Beds</label>
                        <input type="number" min=1 name="beds" id="beds" v-model="beds_num">
                    </div>

                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <input type="number" min=1 name="bathrooms" id="bathrooms" v-model="bathrooms_num">
                    </div>
                </div>
                

                <div class="d-flex justify-content-around my-3">
                    <div class="form-check" v-for="amenity in amenities" :key="amenity.id">
                        <label :for="amenity.name">{{amenity.name}}</label>
                        <input type="checkbox" :id="amenity.name" :value="amenity.name" v-model="checked_amenities">
                    </div>
                </div>

                <button type="submit" class="btn btn-dark" @click="filterApartments()">Cerca</button>
            </form> -->

            <div class="row">
                <div class="col-12 my-3">
                    <p>{{filteredApartments.length}} alloggi a {{city}} per {{guests}} persone</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <Apartment
                        v-for="filteredApartment in filteredApartments" :key="filteredApartment.id"
                        :image="filteredApartment.image"
                        :title="filteredApartment.title"
                        :description="filteredApartment.description"
                    />
                </div>

                <div class="col-6 d-flex align-items-center justify-content-center">
                    <h1>MAPPA</h1>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
import Apartment from '../components/Apartment';

export default {
    name: 'AdvancedSearch',

    components: {
        Apartment
    },

    data() {
        return {
            apartments: [],
            filteredApartments: [],
            amenities: [],
            rooms_num: "",
            beds_num: "",
            bathrooms_num: "",
            checked_amenities: [],
            city: this.$route.params.address,
            guests: this.$route.params.guests,
        }
    },

    mounted() {
        this.getApartments();
        this.getAmenities();
    },

    methods: {
        getApartments() {
            axios.get('/api/apartments')
            .then((response) => {
                this.apartments = response.data.results;
            });
        },

        getAmenities() {
            axios.get('/api/amenities')
            .then((response) => {
                this.amenities = response.data.results;
            });
        },

        filterApartments() {
            this.filteredApartments = this.apartments.filter(apartment => {
                return apartment.rooms >= this.rooms_num;
            })
            .filter(apartment => {
                return apartment.beds >= this.beds_num
            })
            .filter(apartment => {
                return apartment.bathrooms >= this.bathrooms_num
            });

            if(checked_amenities.length > 0) {

            }
        }
    }
}
</script>

<style>

</style>