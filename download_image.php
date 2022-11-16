<?php 
$src = base64_decode($_GET['file_id']);
if(isset($_GET['file_id'])){
      $filepath = urldecode(base64_decode($_GET['file_id']));
if(file_exists($filepath)){
if(isset($_POST['download']) ){
      
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush();
            readfile($filepath);
            $src = $filepath;
        }} else {
             header("location:/");
        die();
        
        }
    }else{
        header("location:/");
        die();
       }
       include './includes/header.php';
?>
<br><br><br><br><br>
<form method="POST" style="margin-left:40%;"><p class="centered"><input type="submit" name="download" value="download"></p></form><br>
<?php echo "<p class='info'>Size :<b> ". number_format(filesize($src)/1024, 1). " KB</b>.";
    $details = getimagesize($src);
    echo "<br>Dimensions : <b>".$details[0]." X ".$details[1]."</b>";
    echo "<br>Type :  <b>".$details['mime']." </b></p>";
    echo $src;
?>
<br>
<div id="image1"><img src="<?php echo $src;?>" alt="" draggable="false" ></div>
<div class="intro-style">
<?php
require './includes/footer.php';
?>
