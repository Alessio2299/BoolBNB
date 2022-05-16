<template>
    <section>
        <div class="container my-3">
            <div class="row">
                <div class="col-12 my-3">
                    <h1 class="text-center">Ricerca avanzata</h1>
                    <div class="text-center">
                        <label for="radius" class="d-block form-label">Radius: {{radius}} km</label>
                        <input type="range" min="0" max="200" value="20" id="radius" name="radius" v-model="radius">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-around my-3">
                    <div>
                        <label for="rooms">Rooms</label>
                        <select v-model="rooms_num">
                            <option value="All">All</option>
                            <option v-for="index in 9" :key="index" :value="index" >{{index}}</option>
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div>
                        <label for="beds">Beds</label>
                        <select v-model="beds_num">
                            <option value="All">All</option>
                            <option v-for="index in 9" :key="index" :value="index">{{index}}</option>
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div>
                        <label for="bathrooms">Bathrooms</label>
                        <select v-model="bathrooms_num">
                            <option value="All">All</option>
                            <option v-for="index in 9" :key="index" :value="index">{{index}}</option>
                            <option value="10+">10+</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-around my-3">
                    <div v-for="amenity in amenities" :key="amenity.id">
                        <label :for="amenity.name">{{amenity.name}}</label>
                        <input type="checkbox" :id="amenity.name" :value="amenity.name" v-model="checked_amenities">
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-dark" @click="sendParams()">Cerca</button>
                </div>
            </div>

            <div class="row">
                <div class="col-12 my-3">
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <Apartment
                        v-for="apartment in apartments" :key="apartment.id"
                        :image="apartment.image"
                        :title="apartment.title"
                        :description="apartment.description"
                        :slug="apartment.slug"
                    />
                </div>

                <div v-if="flag && flagApartment" class="col-6 d-flex align-items-center justify-content-center">
                    <MapFeature
                        :lat= 'addressLat'
                        :lon= 'addressLon'
                        :apartments= "apartments"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Apartment from '../components/Apartment';
import MapFeature from './partials/MapFeature.vue';


export default {
    name: 'AdvancedSearch',

    components: {
        Apartment,
        MapFeature
    },

    data() {
        return {
            radius: 20,
            apartments: [],
            amenities: [],
            rooms_num: 'All',
            beds_num: 'All',
            bathrooms_num: 'All',
            checked_amenities: [],
            city: this.$route.params.address,
            addressLat: '',
            addressLon: '',
            flag: false,
            flagApartment: false
        }
    },

    mounted() {
        this.getApartments();
        this.getAmenities();
        this.getLatlong();
    },
    methods:{ 
        getApartments() {
          let address = this.$route.params.address
            axios.get(`/api/apartments/${address}`)
            .then((response) => {
                this.apartments = response.data.results;
                this.flagApartment = true
            });
        },

        getAmenities() {
            axios.get('/api/amenities')
            .then((response) => {
                console.log(response)
                this.amenities = response.data.results;
            });
        },
        getLatlong(){
            axios.get('https://api.tomtom.com/search/2/geocode/' + this.$route.params.address + '.json?key=dE9bHqujdqyvRaNJuN6VZY7LZmSuidap&limit=1')
            .then( resp => {
                if(resp.data.results.length == 0){
                    this.success = false;
                } else{
                    this.addressLat = resp.data.results[0].position.lat;
                    this.addressLon = resp.data.results[0].position.lon;
                    this.flag = true
                }
            })
        },
        sendParams(){
            axios.post('/api/apartments/filter',{
                'rooms' : this.rooms_num,
                'bathrooms' : this.bathrooms_num,
                'beds' : this.beds_num,
                'address' : this.city,
                'lat': this.addressLat,
                'lon': this.addressLon
            })
            .then(resp => {
                if(!resp.data.success){
                    this.errors = resp.data.errors;
                } else{
                    console.log(resp)
                    this.apartments = resp.data.results
                    this.error = false
                }
            })
        }
    }
}
</script>

<style lang="scss" scoped>
    #radius{
        width: 300px;
    }
</style>