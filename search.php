<?php
require  "bootstrap.php";
error_reporting(E_ERROR | E_PARSE);

$title = $_GET['name'];
$tomatoes = true;
$title = urlencode($title);


$json=file_get_contents("http://api.themoviedb.org/3/search/movie?api_key=myapikey&query=$title&search_type='ngram'");
$json2=file_get_contents("http://api.themoviedb.org/3/configuration?api_key=3d1dde58be22fd0bb5654af83c4597da");
$json3=file_get_contents("http://www.omdbapi.com/?t=$title&tomatoes=true");

$config= json_decode($json2,TRUE); //configuration settings from the movie db
$details=json_decode($json,TRUE); //json from themoviedb
$omdbInfo=json_decode($json3);    //json from omdb

//Error checking the input field
if (empty($_GET["name"]) ) {
  header("Location: index.html");
  return;
}
?>

<!DOCTYPE html>
<html>

<!-- Bootstrap core CSS -->
<link href="./index_files/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="./index_files/cover.css" rel="stylesheet">

 <?php  if ($omdbInfo->Response =='True') { ?>
<head>
  <title>Medidore</title>
  <style type="text/css">body,th,h2 { font-size:20px; font-family:Verdana; font-weight:bold;} th { background-color:#ffb000; text-align:center;} h2 { text-align:center; font-size:15px; margin-top: 20px; margin-bottom:0; }</style>
</head>


<div id="background-image"></div>
<div id="background-overlay"></div>


<div id="overlay">
 <table width="80%"align="left" style="border-collapse:collapse;margin-top:20px;margin-top:50px;"> 
  <tr>
    <button id="home_btn" onclick= "homeClick()" type="button">Home</button>
    <td> <?php  echo("<img  style='' src='". $config['images']['base_url'] . $config['images']['poster_sizes'][3] . $details['results'][0]['poster_path'] . "'/>");?></td>
    <td ><?php echo "<h1 style='padding-bottom:none;margin-top:-75px;font-family:Arimo;font-weight:bold;font-size:45px'>". $omdbInfo->Title. "  (".$omdbInfo->Year.")"."</h1>" ?> <?php echo "<span style='maring-top:-50px;font-family:Arimo;font-size:25px'>".$omdbInfo->Genre."</span>" ?><br><br><br><br> <?php echo "<img style ='' height='30' width='30' src=\"assets\imdb.png\">"?> <?php echo "<span style='margin-right:550px;font-size:20px;color:#ffb000'>". $omdbInfo->imdbRating."</span >" ?><br> <?php echo "<img height='30' width='30' src=\"assets\omatoes.png\">"?> <?php echo "<span style='margin-right:550px;font-size:20px;color:#ffb000'>". $omdbInfo->tomatoRating."</span>"?><br></td>
  </tr>
</table>

</div>
</html>
  <?php } else { 
     echo '<script>'
   , 'window.alert("The movie you requested does not exist");'
   ,'document.location.href="/";'
   , '</script>';
  } ?>



<script type = "text/javascript">
function homeClick() {
  document.location.href="/";
}
</script>
