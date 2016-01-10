<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Claire Désérable</title>
  <meta name="description" content="Claire Désérable's photo book">
  <meta name="author" content="Claire Désérable">
  <meta name="author" content="StyMaar">
</head>
<body>
<h1>Claire Désérable</h1>

<nav>
  <h3>Pictures</h3>
  <?php
  $photo_directories = scandir("photos");
  if($photo_directories){
    $i=0;
    foreach ($photo_directories as $directory){
      if($i>1){
        echo "<h4><a href='/claire/gallery/?gallery=$directory'>$directory</a></h4>";
      }
      $i++;
    }
  }
  ?>
  <h3><a href='/claire/bio-contact'>Bio/contact</a></h3>
</nav>
