<?php 

$gallery_name = $_GET["gallery"];
include_once("header.php"); 
render_menu($gallery_name);
?>
<section>
  <article>
  <?php 

  preg_match("([^./]*)", $gallery_name, $output_array); //pour éviter les arnaques qui listeraient des fichiers privés 
  if(!empty($output_array)){
    $gallery_name = $output_array[0];
    $gallery_path = "photos/$gallery_name/";
    $photos = scandir("$gallery_path");
    $i=0;
    foreach ($photos as $photo){
      if($i>1){
        if($i < 4){
          echo "<a href='/claire/$gallery_path/$photo'><img src='/claire/$gallery_path/$photo'/><a>";
        }else{
          echo "<a href='/claire/$gallery_path/$photo'><img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src='/claire/$gallery_path/$photo'><a>";
        }
      }
      $i++;
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
