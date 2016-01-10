<?php include_once("header.php"); ?>
<section>
  <?php 

  $gallery_name = $_GET["gallery"];

  echo "<h2>$gallery_name</h2>";
  echo "<article>";

  preg_match("([^./]*)", $gallery_name, $output_array); //pour éviter les arnaques qui listeraient des fichiers privés 
  if(!empty($output_array)){
    $gallery_name = $output_array[0];
    $gallery_path = "photos/$gallery_name/";
    $photos = scandir("$gallery_path");
    $i=0;
    foreach ($photos as $photo){
      if($i>1){
        echo "<img src='/claire/$gallery_path/$photo'/>";
      }
      $i++;
    }
  }

  echo "</article>";
  ?>
</section>
<?php include_once("footer.php"); ?>
