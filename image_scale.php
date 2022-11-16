<?php
use PhpSolutions\upload;
use PhpSolutions\thumbnail;
 $messages=[];
 $absPath = "";
 if (isset($_POST['upload'])) {
       require_once './PhpSolutions/upload.php';
       require_once './PhpSolutions/thumbnail.php';
       try{
       $loader = new upload('./uploaded');
       $loader->upload('image');
       $messages = $loader->getMessages();
       $scaled=new Thumbnail($loader->getFullPath(), './uploaded/', $_POST['ratio'] / 100);
       $details=getimagesize($loader->getFullPath());
       $scaled->create(0, 0, $details[0], $details[1], true );
       unlink($loader->getFullPath());
       $absPath = $scaled->getFullPath();
       header("location:download_image.php?file_id=".base64_encode($absPath));
       } catch (Exception $e) {
       echo $e->getMessage();
       }
       }
 include './includes/header.php';
?>
<div class="grid">
<br><br><br><br>
<div class="txt-centered">
<h1 class="title">Upload and resize images without losing in Quality. <br><br></h1>  </div>
</div>
<form action="" method="post" enctype="multipart/form-data" class="form1">
<p>
<label for="image">Upload image:</label>
<input type="file" name="image" id="image" ><br>
<label for="image">Ratio (10% to 100%):</label>
<input type="number" name="ratio" id="ratio">
</p>
<p>
<input type="submit" name="upload" value="Resize">
</p>
</form>
<?php
if(isset($_POST['upload']))
echo $messages[1];
?>
<p id="messages"><br></p>
<div id="image1" ><p id="p1"> Your image appears here once uploaded !</p></div>
<script>
var error = "none";
       let ratio = document.forms[0].elements['ratio'];
       ratio.min = 10;
       ratio.max = 100;
       ratio.value = 100;
       document.forms[0].elements['upload'].disabled = true;
document.forms[0].elements['image'].addEventListener("change", ()=>{
   if(event.target.value != null){
      document.getElementById("messages").innerHTML = "<br>";
    document.forms[0].elements['upload'].disabled = false;
    let img = document.createElement("img");
    img.src =  window.URL.createObjectURL(event.target.files[0]);
    img.draggable = false;
    
    img.onerror = function(){
      error = "error occured !";
    }
    img.onload =  function(){
      error = "none";
    }
    let img1 = document.getElementById("image1");
    img1.innerHTML = '';
    img1.appendChild(img); 
   }
});
document.forms[0].addEventListener("submit", (event)=>{
      if(error != "none"){
        event.preventDefault(); 
        document.getElementById("messages").innerHTML =" Something went wrong, your file is not yet uploaded !";
        document.getElementById("messages").classList.add("error");
      }else{
            document.forms[0].submit();
      }
 });
</script>
<div class="intro-style">
<?php
require './includes/footer.php';
?>