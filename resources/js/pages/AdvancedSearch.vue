<template>
    <section class="mx-auto">
        <div class="container-fluid my_index px-5 py-5 position-relative">
            <div class="container my_container position-relative my_pb">
                <div class="row filters p-4 justify-content-center">
                    <div class="col-12 my-3">
                        <h1 class="text-center my_title">Advanced Search</h1>
                    </div>

                    <div class="row justify-content-center mb-4">
                        <div class="col-3 h-100 text-center d-flex justify-content-around my-3 align-items-center">
                            <div class="text-center">
                                <label for="rooms"><font-awesome-icon icon="fa-solid fa-people-roof" class="mr-2" /> Rooms</label>
                                <select v-model="rooms_num">
                                    <option value="All">All</option>
                                    <option v-for="index in 9" :key="index" :value="index" >{{index}}</option>
                                    <option value="10+">10+</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3 h-100 text-center d-flex justify-content-around my-3 align-items-center">
                            <div class="text-center">
                                <label for="beds"><font-awesome-icon icon="fa-solid fa-bed" class="mr-2" /> Beds</label>
                                <select v-model="beds_num">
                                    <option value="All">All</option>
                                    <option v-for="index in 9" :key="index" :value="index">{{index}}</option>
                                    <option value="10+">10+</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3 h-100 text-center d-flex justify-content-around my-3 align-items-center">
                            <div class="text-center">
                                <label for="bathrooms"><font-awesome-icon icon="fa-solid fa-toilet" class="mr-2" /> Bathrooms</label>
                                <select v-model="bathrooms_num">
                                    <option value="All">All</option>
                                    <option v-for="index in 9" :key="index" :value="index">{{index}}</option>
                                    <option value="10+">10+</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3 h-100 text-center d-flex justify-content-around my-3 align-items-center">
                            <div @click="viewMore()" class="text-center more-search">
                                <span class="label">More 
                                    <i v-if="!more" class="ml-1 fas fa-chevron-down"></i>
                                    <i v-if="more" class="ml-1 fas fa-chevron-up"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div v-if="more" class="col-12 d-flex flex-column my_amenity mb-4">
                        <div class="d-flex my-3 align-items-center justify-content-around">
                            <div class="my_width justify-content-center d-flex align-items-center" v-for="amenity in amenities" :key="amenity.id">
                                <div class="justify-content-center align-items-center d-flex flex-column flex-md-row">
                                    <label class="mr-2" :for="amenity.name">{{amenity.name}}</label>
                                    <input type="checkbox" :id="amenity.name" :value="amenity.id" v-model="checked_amenities">
                                </div>
                            </div>
                        </div>
                        <div class="linee"></div>
                        <div class="text-center d-flex justify-content-center align-items-center py-3">
                            <label for="radius" class="d-block form-label my_padding">Radius: {{radius}} km</label>
                            <input type="range" min="1" max="30" id="radius" name="radius" v-model="radius">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn my-btn" @click="sendParams()">Search now!</button>
                    </div>
                </div>
            </div>         
            <div class="row results mt-4">
                <div class="col apart_container mb-3">
                    <div class="row">
                        <p class="text-center my_text" v-if="apartments.length == 0">Sorry, we could not find an apartment matching your requirments!</p>
                        <Apartment
                            v-for="apartment in apartments" :key="apartment.id"
                            :image="apartment.image"
                            :title="apartment.title"
                            :description="apartment.description"
                            :slug="apartment.slug"
                            :rooms="apartment.rooms"
                            :bathrooms="apartment.bathrooms"
                            :beds="apartment.beds"
                            :address="apartment.address"
                        />
                    </div>
                </div>

                <div v-if="flag && flagApartment" class="search-map col-lg-6 col-md-12  d-flex  justify-content-center">
                    <MapFeature
                        :lat= 'addressLat'
                        :lon= 'addressLon'
                        :apartments= "apartments"
                        :radius="radius"
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
            more: false,
            radius: '20',
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
            flagApartment: false,
            update: null
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

                this.amenities = response.data.results;
            });
        },
        getLatlong(){
            axios.get('https://api.tomtom.com/search/2/geocode/' + this.$route.params.address + '.json?key=TounQy5Lqgw3CSCowM1qIL48LHEGF6WA&limit=1')
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
            console.log(this.radius)
            axios.post('/api/apartments/filter',{
                'rooms' : this.rooms_num,
                'bathrooms' : this.bathrooms_num,
                'beds' : this.beds_num,
                'address' : this.city,
                'lat': this.addressLat,
                'lon': this.addressLon,
                'amenities': this.checked_amenities,
                'radius' : this.radius
            })
            .then(resp => {
                if(!resp.data.success){
                    this.errors = resp.data.errors;
                } else{
                    this.apartments = resp.data.results
                    this.error = false
                    this.more = false
                }
            })
        },
        viewMore(){
            if(this.more == false){
                this.more = true
            } else{
                this.more = false
            }
        
        }
    }
}
</script>

<style lang="scss" scoped>
    @import "../../sass/variables.scss";
    .my_title{
        font-size: 5rem;
        text-transform: uppercase;
        text-shadow: 4px 4px #e7707d;
        color: #f5deb3;
    }
    .my_width{
        width: 20%;
    }
    section {
        background-color: #f4e2d6;
        font-family: Montserrat, sans-serif;


        .apart_container{
            overflow-y: auto;
            height: 60vh;
            padding: 50px;
            background-color: #ef9073;
            border-radius: 10px;
        }

        .card-body {
            background-color: $blue_primary;
        }
        .row.filters{
            background-color: #ef9173;
            border-radius: 10px;
            box-shadow: 10px 10px #e7717d;

        }
        label {
            font-size: 18px;
            font-weight: bold;
            white-space: nowrap;
        }

        #map {
            border: 3px solid #ef9173;
            padding: 10px;
            border-radius: 10px;
        }
        select{
            width: 100%;
        }
    }
    #radius{
        width: 300px;
    }
    .my_text{
        font-size: 40px;
    }

    input[type='range'] {
        accent-color: $orange_secondary;
    }
    .label{
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
    }
    .my_amenity{
        background-color: #E7717D;
        border-radius: 10px;
        padding-top: 5px;
        box-shadow: 10px 10px #aa535b;
        color: #fff;
        .linee{
            height: 1px;
            width: 100%;
            background-color: black;
        }
        .my_padding{
            padding-top: 5px;
            padding-right: 10px;
        }
    }
    input[type='checkbox']{
        filter: grayscale(1);
        width: 20px;
        height: 20px;
        margin-bottom: 0.5rem;
    }
    .my-btn{
        color: #fff;
        background-color: #aa535b;
    }
</style>