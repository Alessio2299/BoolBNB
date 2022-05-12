<template>
    <div class="card my-3">
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
            
        }
    }
}
</script>

<style>

</style>