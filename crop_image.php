<?php
use PhpSolutions\upload;
use PhpSolutions\thumbnail;
 require './includes/header.php';
 if(isset($_POST['upload'])){
       require_once './PhpSolutions/upload.php';
       require_once './PhpSolutions/thumbnail.php';
       $destination = "./uploaded/";
       try{
       $loader = new Upload($destination);
       $loader->upload('image');
      $th = new Thumbnail($loader->getFullPath(), $destination, 1);
      $th->create($_POST['startx'], $_POST['starty'], $_POST['endx'], $_POST['endy'], false);
      //*********          Redirect to the download page with the GET file_id             ******* */
      header("location:download_image.php?file_id=".base64_encode($th->getFullPath()));

       }catch(Throwable $t){
             echo $t->getMessage();
       }
}
?>
<br><br><br><br><br><br>
<div class="txt-centered">
<p class="title"> Upload, Crop your images and download them easily.</p></div>
<br>
<form action="" method="post" enctype="multipart/form-data" class="form1">
    <p>  <label for="image">Choose an image :</label>
      <input type="file" id="image" name="image"></p>
     startx : <input type="number" name="startx" id="startx">
     starty : <input type="number" name="starty" id="starty"><br><br>
     endx : <input type="number" name="endx" id="endx">
     endy : <input type="number" name="endy" id="endy"><br><br>
     <p > <input  type="submit" value="upload" name="upload" class="upload"></p>
</form>
<br>
<p id="messages"><br></p>
<div id="image1" ><p id="p1"> Your image appears here once uploaded !</p></div>
<div class="intro-style">
<script>
    //initialise start and end coordinates
    //********* */
    let coordinates = document.querySelectorAll("input[type='number']");
    for(let el=0;el< coordinates.length; el++){
        coordinates[el].value= 0;
        coordinates[el].min= 0;
    }
    //*************** */
    let upload = document.forms[0].elements['upload'];
    upload.disabled = true;
    //event listener fires when client choose a file to upload
    //****** */
    document.forms[0].elements['image'].addEventListener("change", ()=>{
   if(event.target.value != null){
    document.getElementById("messages").innerHTML = "<br>";
    upload.disabled = false;
    let img = document.createElement("img");
    img.src =  window.URL.createObjectURL(event.target.files[0]);
    img.onload = function() {
        coordinates[0].max= Math.round(this.width-(this.width * 0.3));
        coordinates[2].max= this.width;
        coordinates[2].value= this.width;
        coordinates[1].max= Math.round(this.height-(this.height * 0.3));
        coordinates[3].max= this.height;
        coordinates[3].value= this.height; 
      }

    img.draggable = false;
      let img1 = document.getElementById("image1");
      img1.innerHTML = '';
    img1.appendChild(img);      
    }
  });
  //********** */
  //checking some Conditions before submitting the form
 document.forms[0].addEventListener("submit", (event)=>{
      //before submit make sure that endx > startx+80 && endy > starty+80
      if(parseInt(coordinates[2].value) > parseInt(coordinates[0].value) +100  &&
       parseInt(coordinates[3].value) > parseInt(coordinates[1].value) +100){
        document.forms[0].submit();
      }else{
        event.preventDefault(); 
        document.getElementById("messages").innerHTML =" Something went wrong, your file is not yet uploaded !";
        document.getElementById("messages").classList.add("error");
      }
 });
 //****** */
</script>
<?php
require './includes/footer.php';
?>