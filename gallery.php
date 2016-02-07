<?php

$gallery_name = $_GET["gallery"];
include_once("header.php");
render_menu($gallery_name);
?>
<section>
  <article>
  <?php

  preg_match("([^./]*)", $gallery_name, $output_array); //pour éviter les arnaques qui listeraient des fichiers privés

  //gestion du pre-fetching des images d'autres catégories
  if(!empty($output_array)){
    $gallery_name = $output_array[0];

    $photo_directories = scandir("photos");
    if($photo_directories){
      $i=0;
      foreach ($photo_directories as $directory){
        if($i>1 && $directory != $gallery_name){ //pour éviter de lister . et ..
          $photos = scandir("photos/$directory");
          if($photos){
            $j=0;
            foreach ($photos as $photo){
              if($j>3) {
                break;
              }

              if(preg_match("(\.(jpg|png|gif|JPG|PNG)$)",$photo)){
                  echo "<img class='caching' src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src='/claire/photos/$directory/$photo' />";
              }
              $j++;
            }
          }
        }
        $i++;
      }
    }


    $gallery_path = "photos/$gallery_name/";

    if(file_exists ("$gallery_path/intro.txt")){
      $handle = fopen("$gallery_path/intro.txt", 'r');
      echo "<p>";
      while (($line = fgets($handle)) !== false) {
        echo "$line<br />";
      }
      echo "</p>";
      fclose($handle );
    }

    $photos = scandir("$gallery_path");
    $k=0;
    foreach ($photos as $photo){
      if(preg_match("(\.(jpg|png|gif|JPG|PNG)$)",$photo)){
        if($k < 4){
          echo "<a href='/claire/$gallery_path/$photo'><img src='/claire/$gallery_path/$photo' /></a>";
        }else{
          echo "<a href='/claire/$gallery_path/$photo'><img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src='/claire/$gallery_path/$photo' /></a>";
        }
      }
      $k++;
    }
  }

  ?>
  </article>
</section>
<script>
function init() {
  var imgDefer = document.getElementsByTagName('img');
  for (var i=0; i<imgDefer.length; i++) {
    if(imgDefer[i].getAttribute('data-src')) {
      imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
    }
  }
}
window.addEventListener('load', init);
</script>
<?php include_once("footer.php"); ?>
