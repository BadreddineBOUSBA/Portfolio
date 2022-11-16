<?php
 require './includes/header.php';
 ?>

 <style>
    #aboutme{
      color:gray;
    }
    .about-t{
      background-color:  rgba(22, 22, 22, 0.8);
      margin:auto;
      margin-top:15vh;
      margin-bottom:15vh;
      width:60%;
      padding:5%;
      color:rgb(15, 169, 216);
      filter:  drop-shadow(2.2vw 2.2vw 2.2vw rgba(22, 22, 22, 0.8));
      text-align:center;
      font-size:1.5em;
    }
    .growing{
       color:rgb(15, 169, 216);
        transition : all 0.2s ease-in-out;
    }
    .growing:hover{
      color: rgb(8, 149, 173)
    }
    a:hover{
        text-decoration:none;
    }
   .title-def{
     text-align:start;
     text-decoration:underline;
     padding:2vh
   }
    .rounded{
      width:30%;
      border-radius:50%;
      overflow:hidden;
    }
    @media  (max-width: 700px) {
      .rounded{
      width:50%;
      }
      .about-t {
       width:80%;
       margin:auto;
       margin-top:15vh;
      }
    }
    
 </style>
 <div class="about-t" >
        <img src="badreddine.jpeg" draggable="false"class="rounded" alt="profile image">
        <div>
         <div class="title-def"> <h4 >About me  :)</h4></div>
          <p >I'm <b> BOUSBA Badreddine</b>, an Information Technology<b> (IT)</b>  student.<br>
            I love building and styling websites and also working on mobile development.</p>
        <br>
        <h1>Skills:</h1>
        <div class="skills">
         <div class="skill-card" > 
            <img src="./images/angular.png" alt="">
            <div class="rate" ><p class="val" style="width:85%"></p>85%</div>
        </div>
        <div class="skill-card" > 
            <img src="./images/react.png" alt="">
            <div class="rate" ><p class="val" style="width:75%"></p>75%</div>
        </div>
        <div class="skill-card" > 
            <img src="./images/JavaScript-Logo.png" alt="">
            <div class="rate" ><p class="val" style="width:95%"></p>95%</div>
        </div>
        <div class="skill-card" > 
            <img src="./images/html.png" alt="">
            <div class="rate" ><p class="val" style="width:96%"></p>96%</div>
        </div>
        <div class="skill-card" > 
            <img src="./images/vue.png" alt="">
            <div class="rate" ><p class="val" style="width:75%"></p>75%</div>
        </div>
        </div>
        <div class="skills reverse">
          
        <div class="skill-card reversed" > 
            <img src="./images/php-logo.jpg" alt="">
            <div class="rate" ><p class="val" style="width:80%"></p>80%</div>
        </div>
         <div class="skill-card reversed" > 
            <img src="./images/java-4-logo.png" alt="">
            <div class="rate" ><p class="val" style="width:85%"></p>85%</div>
        </div>
        <div class="skill-card reversed" > 
            <img src="./images/c-logo.png" alt="">
            <div class="rate" ><p class="val" style="width:77%"></p>77%</div>
        </div>
        <div class="skill-card reversed" > 
            <img src="./images/sql.jpg" alt="">
            <div class="rate" ><p class="val" style="width:95%"></p>95%</div>
        </div>
        <div class="skill-card reversed" > 
            <img src="./images/xml.png" alt="">
            <div class="rate" ><p class="val" style="width:95%"></p>95%</div>
        </div>
         
        </div>
        <br><br>
        <div class="links">
                <a title="Contact me on Facebook." href="https://www.facebook.com/badr.eddine.5811877"><i
                        class="fab fa-facebook-square fa-2x btn btn-outline-light social-media fb growing"></i></a>
                <a title="Find me on Stackoverflow." href="https://stackoverflow.com/users/10964280/bousba-badredd"> <i
                        class="fab fa-stack-overflow fa-2x btn btn-outline-light social-media growing"></i></a>
                <a title="Follow me on Github." href="https://github.com/BadreddineBOUSBA"><i
                        class="fab fa-github-square fa-2x btn btn-outline-light social-media growing"></i></a>
                <a title="Find me on Linkedin." href="https://www.linkedin.com/in/badreddine-bousba-57a461165/"><i
                        class="fab fa-linkedin fa-2x btn btn-outline-light social-media growing"></i></a></div>

        </div>
  </div>
      
</div>
