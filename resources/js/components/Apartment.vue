<template>
        <div @click="push" class="card my-3" id="apartment_card">
            <div class="card-body text-center">
                <img class="card-img-top" :src="image" :alt="title">
                <h5 class="card-title my-3"><strong>{{title}}</strong></h5>
                <p class="card-text my-3">{{truncateText(description)}}</p>
                <p class="card-text my-3">{{address}}</p>
                <div class="d-flex justify-content-around">
                    <span class="card-text"><font-awesome-icon icon="fa-solid fa-people-roof" /><br>{{rooms}}</span>
                    <span class="card-text"><font-awesome-icon icon="fa-solid fa-bed" /><br>{{beds}}</span>
                    <span class="card-text"><font-awesome-icon icon="fa-solid fa-toilet" /><br>{{bathrooms}}</span>
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
            const maxLength = 100;
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
    }
</style>