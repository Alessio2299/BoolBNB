<template>
    <div class="col-6 mb-4">
        <div @click="push" class="card h-100 mb-3" id="apartment_card">
            <div class="card-body text-center p-1">
                <img class="card-img-top" :src="image" :alt="title">
                <h5 class="card-title mt-2"><strong>{{title}}</strong></h5>
                <p class="card-text my-1 description">{{truncateText(description)}}</p>
                <!-- <p class="card-text my-3 address">{{address}}</p> -->
                <div class="d-flex justify-content-around">
                    <span class="card-text"><font-awesome-icon icon="fa-solid fa-people-roof" /><br>{{rooms}}</span>
                    <span class="card-text"><font-awesome-icon icon="fa-solid fa-bed" /><br>{{beds}}</span>
                    <span class="card-text"><font-awesome-icon icon="fa-solid fa-toilet" /><br>{{bathrooms}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Apartment',

    props: ['image', 'title', 'description', 'slug', 'rooms', 'bathrooms', 'beds', 'address'],

    methods: {
        truncateText(text) {
            const maxLength = 20;
            if(text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            } else {
                return text;
            }
            
        },
        push(){
            this.$router.push({name:'single-apartment' , params:{slug: this.slug}})
        }
    }
}
</script>

<style scoped lang="scss">
    #apartment_card{
        cursor: pointer;
        background-color: #FFCEAF;
        border: 6px solid #FFCEAF;
        box-shadow: 15px 15px #E7717D;
        .card-title{
            color: #EF9273;
            text-shadow: 1px 1px #E7717D;
        }
        p.description{
        }
        .card-text{
            color: #5f2e1d;
        }
    }
    .address{
       
    }
</style>