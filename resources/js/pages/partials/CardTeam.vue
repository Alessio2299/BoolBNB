<template>
  <div class="col">
    <div class="img-wrap">
        <a :href="'https://www.linkedin.com/in/' + linkedin" target="_blank" rel="noopener noreferrer"><img :src="require('../../../../storage/app/public/img/' + image)" :alt="name"></a>
    </div>
    <h3>{{name}}</h3>
  </div>
</template>

<script>
  export default {
    name: 'CardTeam',
    props:{
      name: String,
      image: String,
      linkedin: String
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/variables.scss';
        .col {
        display: flex;
        flex-direction: column;
        justify-content: center;
        
        .img-wrap {
          height: 150px;
          width: 150px;
          border-radius: 50%;
          background-color: $blue_secondary;
          align-self: center;
          overflow: hidden;
          transition: 0.3s;

          &:hover {
            cursor: pointer;
            box-shadow: 12px -1px #FFCEAF;
            transition: 0.5s;
          }
        }

        img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        h3 {
          margin-top: 15px;
          font-weight: 600;
          text-align: center;
          font-family: 'Brush Script MT', cursive;
          font-size: 2rem;
        }

        p {
          margin-top: 20px;
          text-align: center;
        }
      }
</style>