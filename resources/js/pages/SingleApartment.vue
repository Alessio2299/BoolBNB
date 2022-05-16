<template>
    <section class="container" v-if="apartment">

        <div class="row row-cols-1">
            <div class="col py-3">
                <h1 class="text-center">{{apartment.title}}</h1>
                <h2 class="text-center">{{apartment.address}}</h2>
            </div>
        </div>

        <div class="row row-cols-1 row-img">
            <div class="col py-3">
                <img class="img-fluid text-center" :src="apartment.image" :alt="apartment.title">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="row section">
                    <div class="col-12 py-3">
                        <ul class="facilities">
                            <li class="text-center"><br>{{apartment.rooms}} bedrooms</li>
                            <li class="text-center"><font-awesome-icon icon="fa-solid fa-bed" /><br>{{apartment.beds}} beds</li>
                            <li class="text-center"><font-awesome-icon icon="fa-solid fa-toilet" /><br>{{apartment.bathrooms}} bathrooms</li>
                        </ul>
                    </div>
                </div>
                <div class="row section">
                    <div class="col-12 py-3">
                        {{apartment.description}}
                    </div>
                </div>

                <div class="row section">
                    <div class="col-12 py-3">
                        <h5 class="p-3 text-center"><strong>Here you will find these additional services</strong></h5>
                        <ul class="amenities d-flex justify-content-center">
                            <li class="btn btn-primary" v-for="amenity in apartment.amenities" :key="amenity.id">
                                <font-awesome-icon icon="fa-solid fa-wifi" v-if="amenity.id == 1" />
                                <font-awesome-icon icon="fa-solid fa-square-parking" v-if="amenity.id == 2" />
                                {{amenity.name}}
                            </li>
                        </ul>
                    </div>
                </div>
                <h5 class="p-3 text-center"><strong>This is where you will find your apartment</strong></h5>
                <div class="row mb-3 map-container">
                    <MiniMap 
                        :lat= 'apartment.lat'
                        :lon= 'apartment.lon'
                        :apartment= "apartment"
                    />
                </div>
            </div>
            
            <div class="col-lg-4 pb-3">
                <div class="row">
                    <div class="col-12 py-3">
                        <h4 class="text-center">Contact the host</h4>
                        <div v-if="success == true" class="text-success">Your message has been successfully submitted</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form id="message-form" @submit.prevent="sendMessage">
                            <div class="form-group">
                                <label class="required-field">Name</label>
                                <input type="text" class="form-control" id="name" v-model="form.name" placeholder="name" required>
                            </div>
                            <div class="form-group">
                                <label class="required-field">Email address</label>
                                <input type="email" class="form-control" id="email" v-model="form.email" placeholder="name@example.com" required>
                            </div>
                            <div class="form-group">
                                <label class="required-field">Your message</label>
                                <textarea class="form-control" id="message" v-model="form.message" rows="5"></textarea>
                            </div>
                            <button class="btn btn-dark" type="submit">
                                    <span v-if="success == null || success == true">Send</span>
                                <div v-if="success == false" class="spinner-border" role="status">
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import MiniMap from './partials/MiniMap.vue';

    export default {
        name: 'SingleApartment',

        data() {
            return {
                apartment: null,
                success: null,
                form: {
                    name: "",
                    email: "",
                    message: "",
                }
            }
        },
        components:{
            MiniMap
        },

        mounted() {
            this.getApartment();
        },

        methods: {
            getApartment() {
                const slug = this.$route.params.slug;
                axios.get('/api/apartments/single-apartment/' + slug)
                .then(response => {
                    if(response.data.success == true) {
                        this.apartment = response.data.results;
                    } else {
                        this.$router.push({name: 'page-not-found'})
                    }
                });
            },

            sendMessage() {
                this.success = false
                axios.post(`/api/messages/apartment/${this.apartment.slug}`, {
                    'apartment_id': this.apartment.id,
                    'sender_name': this.form.name,
                    'sender_email': this.form.email,
                    'message': this.form.message
                })
                .then(response => {
                    if(response.data.success === true){
                        this.success = true
                        this.form.name = ''
                        this.form.email = ''
                        this.form.message = ''
                        setTimeout(() => {
                            this.success = null;
                        },5000)
                    }
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/variables.scss";

    .container {

        .row-img {
            justify-content: center;
        }

        .section:after {
            content: "";
            width: 100%;
            height: 1px;
            background-color: #ddd;
        }

        img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            border: 2px solid black;
        }

        .facilities {
            list-style: none;
            padding: 0;
            margin: 0;

            li {
                display: inline-block;
                border: 1px solid black;
                border-radius: 10%;
                padding: 20px;
                margin: 5px;

                // &:not(:last-child):after {
                //     content: '\2219';
                //     padding-left: 5px;
                // }
            }
        }

        .amenities {
            list-style: none;
            padding: 0;
            margin: 0;

            li {
                margin: 0 10px;
            }
        }

        .map-container {
            border: 1px solid black;
            padding: 15px;
        }

        form {
            .form-group {
                .required-field::before {
                    content: '* ';
                    color: $red;
                }
            }
        }
    }
</style>