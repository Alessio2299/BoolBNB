<template>
  <div class="col-lg-4 col-sm-6">
    <div class="team-box mb-3">
      <div class="team-box-image">
        <img :src="require (`../../../../public/img/${image}`)" :alt="name">
      </div>
      <div class="team-box-caption text-center">
        <h4>{{name}}</h4>
        <p>{{job}}</p>
        <a class="social" target="_blank" :href="linkGitHub"><i class="fab fa-github"></i></a>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'CardTeam',
    props:{
      name: String,
      image: String,
      job: String,
      linkGitHub: String
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/variables.scss';

  .team-box{
    position: relative;
    .team-box-image img{
      width: 100%;
      height: 420px;
      object-position: center;
      object-fit: cover;
    }
    .team-box-caption{
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: $nav_bg;
      color: $nav_text;
      padding: 10px;
      visibility: hidden;
      .social{
        font-size: 20px;
        color: $nav_text;
        &:hover{
          color: gray;
        }
      }
    }
    &:hover .team-box-caption{
      visibility: visible;
    }
  }
</style>