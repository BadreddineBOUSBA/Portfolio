<?php
      @require('./includes/header.php');
   ?>
    <div style="overflow: hidden;">
        <section class="home-intro" id="intro">
        <p class="home-intro-text" >
        <i class="fas fa-quote-left "></i><br>
        <span id="txt-intro"></span>
        <i class="fas fa-quote-right  right"></i>
        </p>
        </section>
        
        <div  style="overflow: hidden;padding-bottom: 4vh;margin: 0;margin-top: -3%; height: 20vh; background-color: rgb(243, 241, 241);
        transform: rotate(3deg);width: 150%;margin-left: -10%;" class="distort">
        </div>
    </div>
    <div class="intro-style" style="margin: 0;padding:5%;padding-bottom: 0; background-color: rgb(243, 241, 241);">
    <a href="./crop_image.php">
        <div class="container">
        <i class="fas fa-crop custom crop "></i><div class="white"><p class="zig"> Resize and Crop your images</p> </div>
        </div>
    </a>
    <a href="image_scale.php">
        <div class="container">
        <i class="fa fa-compress default crop"></i><div class="white"> <p class="zig">Reduce your image size efficiently</p></div>
        </div>
    </a>
    <a href="projects/tic-tac-toe-game.php">
        <div class="container">
                    <i class="fa fa-gamepad custom crop"></i><div class="white"><p class="zig">Tic-tac-toe game project</p></div>
        </div>
    </a>
    <script src="script.js"></script> 
<?php
@require('./includes/footer.php');
?>