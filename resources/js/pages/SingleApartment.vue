<template>
    <section class="container" v-if="apartment">

        <div class="row">
            <div class="col-12 py-3">
                <h1>{{apartment.title}}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-10 py-3">
                <img class="img-fluid" :src="apartment.image" :alt="apartment.title">
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="row section">
                    <div class="col-12 py-3">
                        <ul class="facilities">
                            <li>{{apartment.rooms}} bedrooms</li>
                            <li>{{apartment.beds}} beds</li>
                            <li>{{apartment.bathrooms}} bathrooms</li>
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
                        <h5>Amenities</h5>
                        <ul class="amenities">
                            <li v-for="amenity in apartment.amenities" :key="amenity.id">
                                {{amenity.name}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-4 pb-3">
                <div class="row">
                    <div class="col-12 py-3">
                        <h4>Contact the host</h4>
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
                            <button class="btn btn-dark" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>
</template>

<script>
export default {
    name: 'SingleApartment',

    data() {
        return {
            apartment: null,
            form: {
                name: "",
                email: "",
                message: "",
            }
        }
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
            console.log(this.form.name)
            axios.post(`/api/messages/apartment/${this.apartment.slug}`, {
                'apartment_id': this.apartment.id,
                'sender_name': this.form.name,
                'sender_email': this.form.email,
                'message': this.form.message
            })
            .then(response => {
                console.log(response)
            });
        }
    }
}
</script>

<style lang="scss" scoped>
    @import "../../sass/variables.scss";

    .container {
        .section:after {
            content: "";
            width: 100%;
            height: 1px;
            background-color: #ddd;
        }

        // div[class*='col'] {
            
        // }

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

                &:not(:last-child):after {
                    content: '\2219';
                    padding-left: 5px;
                }
            }
        }

        .amenities {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        form {
            .form-group {
                .required-field::before {
                    content: '* ';
                    color: $red;
                }
            }

            // &::after {
            //     content: '\a All the fields marked with * are required';
            //     white-space: pre;
            //     color: $red;
            // }
        }
    }
</style>