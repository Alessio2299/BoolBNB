<template>
        <div @click="push" class="card my-3" id="apartment_card">
            <div class="card-body">
                <img class="card-img-top" :src="image" :alt="title">
                <h5 class="card-title">{{title}}</h5>
                <p class="card-text">{{truncateText(description)}}</p>
            </div>
        </div>
</template>

<script>
export default {
    name: 'Apartment',

    props: ['image', 'title', 'description', 'slug'],

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