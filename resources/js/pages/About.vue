<template>
  <div>
    <section id="head">
      <div class="container">
        <div class="titles-wrap">
          <h1 class="title up">made by travellers</h1>
          <h1 class="title down">for travellers</h1>
        </div>
        <div class="go-to-wrap">
          <span>about us</span>
          <a class="go-to-mission" href="#mission"><i class="fas fa-chevron-down"></i></a>
        </div>
      </div>
    </section>

    <section id="mission">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
          <div class="col">
            <div class="img-wrap">
              <img src="../../../storage/app/public/img/time-2.jpg" alt="time picture">
            </div>
            <div class="text-wrap">
              <h3>It's about time.</h3>
              <p>Time is our most precious, non-renewable resource. By helping you to handle bookings, we are giving you the time and headspace to be your greatest self in the greatest spots.</p>
            </div>
          </div>

          <div class="col">
            <div class="img-wrap">
              <img src="../../../storage/app/public/img/choices-2.jpeg" alt="choices picture">
            </div>
            <div class="text-wrap">
              <h3>It’s about choice.</h3>
              <p>We give you our best choices, you choose the place that suits you the most. We all need help to live meaningful experiences: whether it is for work or for fun, we are here for you.</p>
            </div>
          </div>

          <div class="col">
            <div class="img-wrap">
              <img src="../../../storage/app/public/img/connection-2.jpeg" alt="connectivity picture">
            </div>
            <div class="text-wrap">
              <h3>It’s about connection.</h3>
              <p>Hospitality is about building relationships of trust. Relationships are the foundation for community, which gives meaning to the places we call home.</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="journey">
      <div class="left"></div>

      <div class="right">
        <div class="text-wrap">
          <h2 class="title">our journey</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non sodales neque sodales ut etiam. Eleifend donec pretium vulputate sapien nec. Arcu risus quis varius quam quisque id. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Vehicula ipsum a arcu cursus vitae congue mauris. Duis tristique sollicitudin nibh sit amet commodo nulla. Facilisis volutpat est velit egestas dui id ornare arcu odio. Vitae aliquet nec ullamcorper sit amet risus nullam eget. Sapien eget mi proin sed libero enim. Euismod lacinia at quis risus sed vulputate odio. Tempus egestas sed sed risus pretium quam vulputate. Id diam vel quam elementum. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur.</p>
        </div>
      </div>
    </section>

    <section id="founders">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>Meet the founders</h1>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
          <div class="col">
            <div class="img-wrap">
                <img src="../../../storage/app/public/img/founder-m.jpg" alt="founder">
            </div>
            <h3>Mark Pills</h3>
          </div>
          <div class="col">
            <div class="img-wrap">
              <img src="../../../storage/app/public/img/founder-f.jpg" alt="founder">
            </div>
            <h3>Erin Kristoff</h3>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non sodales neque sodales ut etiam. Eleifend donec pretium vulputate sapien nec. Arcu risus quis varius quam quisque id. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Vehicula ipsum a arcu cursus vitae congue mauris. Duis tristique sollicitudin nibh sit amet commodo nulla. Facilisis volutpat est velit egestas dui id ornare arcu odio.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="social">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3>Follow Along</h3>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  
</template>

<script>
  export default {
    name : 'About',
  }
</script>

<style lang="scss" scoped>
  @import '../../sass/variables.scss';

  .title {
      margin: 0;
      font-weight: 600;
      text-transform: uppercase;
  }

  #head {
    height: 770px;
    position: relative;
    background-image: url('../../../storage/app/public/img/head-santorini.jpg');
    background-size: cover;
    background-position: center;

    .titles-wrap {
      text-align: center;
      position: absolute;
      top: 170px;
      left: 50%;
      transform: translateX(-50%);

      &:hover {
        cursor: default;
      }
      
      .title.up {
        color: $ms_dark;
      }

      .title.down {
        font-family: 'Brush Script MT', cursive;
        font-size: 4rem;
        font-weight: 400;
        color: $ms_light;
        text-transform: lowercase;

        &:hover {
          color: $ms_dark
        }
      }
    }

    .go-to-wrap {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
      color: $ms-light;

      span {
        text-transform: uppercase;
        margin-bottom: 10px;
        font-weight: 800;
      }

      .go-to-mission {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 2px solid $ms_light;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.2rem;
        text-decoration: none;
        color: inherit;

        &:hover {
          color: $ms_dark;
        }
      }
    }
  }

  #mission {
    padding-top: 120px;
    padding-bottom: 90px;
    background-color: $ms_light;

    .col {
      padding: 0px 25px;

      .img-wrap {
        width: 100%;
        height: 250px;
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s;

        img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          object-position: 50% 50%;
          overflow: hidden;
        }

        &:hover {
          transition: 0.4s;
          transform: translateY(15px);
        }
      }

      .text-wrap {
        color: $ms_dark;

        h3 {
          margin-top: 40px;
          font-weight: 600;
        }

        p {
          margin-top: 30px;
        }
      }
    }
  }

  #journey {
    display: flex;
    height: 540px;

    .left {
      background-image: url('../../../storage/app/public/img/journey-2.jpg');
      background-size: cover;
      background-position: center;
      width: 50%;
    }

    .right {
      width: 50%;
      height: 100%;
      background-color: $blue_secondary;
      padding: 0px 30px;
      display: flex;
      align-items: center;

      .text-wrap {
        text-align: center;

        p {
          margin-top: 30px;
        }
      }
    }
  }

  #founders {
    padding-top: 120px;
    padding-bottom: 90px;
    background-color: $ms_light;

    h1 {
      text-align: center;
      margin-bottom: 50px;
      font-family: 'Brush Script MT', cursive;
      font-size: 4rem;
      font-weight: 400;
    }

    .row {
      display: flex;
      justify-content: center;

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
            box-shadow: 12px -1px #E2E4E3;
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
    }
  }

  #social {
    background-color: $blue_secondary;
    padding: 80px 0px;

    .col-12 {
      display: flex;
      flex-direction: column;
      align-items: center;

      h3 {
        font-weight: 600;
        padding: 0 20px;

        &:after {
          content: "";
          display: block;
          width: 100%;
          border-bottom: 0.5px solid $ms_dark;
          color: $ms_dark;
          margin: 20px 0px;
        }
      }

      .social-icons {
        font-size: 1.7rem;

        a {
          margin-right: 15px;
          text-decoration: none;
          color: inherit;
        }
      }
    }
  }
  
  @media (max-width: 768px) {
    #journey {
      flex-direction: column;
      height: 800px;

      .left {
        height: 50%;
        width: 100%;
        background-position: center;
      }

      .right {
        height: 50%;
        width: 100%;
      }
    }
  }

  @media (max-width: 576px) {
    #journey {
      height: 1000px;
    }
  }
</style>