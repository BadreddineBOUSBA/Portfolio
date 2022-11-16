<?php 
$pagePath=basename($_SERVER['SCRIPT_FILENAME']);
if($pagePath=="index.php"){
$title = "Bou-devlpr blog about Information technology and especially concerning web, mobile development";
$description="Free and online photo resizer, image compressor to crop,
 resize images in JPEG|PNG|GIF format, compress and reduce the file sizes";
}else if($pagePath=="crop_image.php"){
$title = "Crop, Resize &amp; Compress Images, Photos and Pictures for FREE";
$description = "Free  photo resizing and image compressing to crop, 
resize images in any fotmat including  JPEG|PNG|GIF, and also compress and reduce the file sizes without losing the image quality";
}else if($pagePath=="image_scale.php"){
$title = "Upload Image, scale and Compress Images, Photos and Pictures for FREE";
$description="Free and online image scaling service, scale your images in any format you want (JPEG|PNG|GIF|WEBP),
and download them with one click";
}else if($pagePath=="download_image.php"){
  $title = "Download your scaled and Compressed Images, Photos and Pictures for FREE";
  $description="Free and online image scaling and cropping service, download your scaled and cropped images
  easily and freely"; 
}
else if($pagePath=="about.php"){
  $title = "Badreddine, Bou-devlpr.xyz author";
  $description="My name is Badr Eddine, an Information Technology (IT) student.
  I love building and styling websites and also working on mobile development.";
}else if($pagePath=="tic-tac-toe-game.php"){
  $title = "Tic-tac-toe game project, developed using java & javaFX and Netbiens IDE (open source project)";
  $description="Open source game project developed using Java & JavaFX and netbiens IDE.";
}
    $domain_name="http://localhost/www/";
?>
<!DOCTYPE html>
<html>  
    <head>  
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description;?>">
    <meta name="keywords" content="Images, pictures, icons, resize image, scale image, crop image, JPEG, PNG, GIF, reduce file size">
        <title><?php echo $title;?></title>  
    <link rel="stylesheet" href="<?php echo $domain_name;?>style.css">
    <link rel="stylesheet" href="<?php echo $domain_name;?>fontawesome/css/all.css">
    <link rel="icon" type="image/png" href="<?php echo $domain_name;?>icon.png" />
</head>
<body>
<meta property="og:type" content="website"/>
<meta property="og:locale" content="En"/>
<meta property="og:url" content="https://bou-devlpr.xyz"/>
<meta property="og:title" content="<?php echo $title; ?>"/>
<meta itemprop="name" content="<?php echo $title;?>"/>
<meta itemprop="url" content="http://bou-devlpr.xyz"/>
<meta itemprop="author" content="bou-devlpr"/>
<meta itemprop="image" content="<?php echo $domain_name;?>logo.png"/>



    </head> 
       <body>  
       <header>
        <a href="http://bou-devlpr.xyz">
          <img src="<?php echo $domain_name;?>logo.png" >
        </a>
        <a href="<?php echo $domain_name;?>about.php" class="about"> <i class="fas fa-at"></i> </a>
          <!-- <script data-ad-client="ca-pub-6792296207124772" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174698682-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-174698682-1');
        </script> -->
        </header>
        