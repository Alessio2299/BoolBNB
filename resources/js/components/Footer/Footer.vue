<template>
  <footer>
      <div class="my_footer m-auto d-flex justify-content-end  flex-md-row">
        <div class="logo">
          <img class="my_img" src="../../../../public/img/BoolBnb.png" alt="Logo BoolBnb">
        </div>
        <div class="copyright">
         <span>Copyright © 2022 All Rights Reserved</span>
        </div>
      </div>
  </footer>
</template>

<script>  
  export default {
    name : 'Footer',

  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/variables.scss';

  footer{
    background-color: $nav_bg;
    color: $nav_text;
    .my_footer{
      height: 70px;
      width: 90%;
      align-items: center;
      .my_img{
        width: 40px;
        filter: grayscale(1);
      }
      .logo_text{
        font-size: 25px;
        display: inline-block;
        margin-left: 10px;
        font-family: 'Ms Madi', cursive;
      }
      .copyright span{
        display: inline-block;
        font-size: 12px;
        margin-left: 10px;
        color: rgb(196, 196, 196);
      }
    }
  }

</style>>
