<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Claire Désérable</title>
  <meta name="description" content="Claire Désérable's photo book">
  <meta name="author" content="Claire Désérable">
  <meta name="author" content="StyMaar">
  <link rel="stylesheet" href="/claire/style.css">
  <link href='//fonts.googleapis.com/css?family=Lato:400,300,300italic,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
</head>
<body>
  <?php
  function render_menu($position){
    ?>
    <header>
      <h1><a href='/claire/'>Claire Désérable</a></h1>
      <nav>
        <?php
        $photo_directories = scandir("photos");
        if($photo_directories){
          $i=0;
          foreach ($photo_directories as $directory){
            if($i>1){ //pour éviter de lister . et ..
              if($directory === $position){
                echo "<h3 class='current'><a href='/claire/gallery/?gallery=$directory'>$directory</a></h3>";
              } else {
                echo "<h3><a href='/claire/gallery/?gallery=$directory'>$directory</a></h3>";
              }

            }
            $i++;
          }
        }
        if("bio-contact" === $position){
          echo "<h3 class='current'><a href='/claire/bio-contact'>Bio/contact</a></h3>";
        } else {
          echo "<h3><a href='/claire/bio-contact'>Bio/contact</a></h3>";
        }
        ?>
      </nav>
    </header>
    <?php
  }
  ?>
