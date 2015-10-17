<?php
require "bootstrap.php";

if (empty($_GET["name"])) {
  header("Location: index.html");
  return;
}


$title = $_GET['name'];
$year = " ";
$tomatoes = true;
$title = urlencode($title);

$json=file_get_contents("http://www.omdbapi.com/?t=$title&tomatoes=true");

$details=json_decode($json);
?>

<!DOCTYPE html>
<html>

    <!-- Bootstrap core CSS -->
    <link href="./index_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./index_files/cover.css" rel="stylesheet">


  <head>
    <title>Search results for '<?php echo $_GET["name"] ?>'</title>
    <style type="text/css">body,td,th,h2 { font-size:20px; font-family:Arimo; } th { background-color:#ffb000; text-align:center;} h2 { text-align:center; font-size:15px; margin-top: 20px; margin-bottom:0; }</style>
  </head>


   <div id="background-image"></div>
   <div id="background-overlay"></div>
  
  <div id="overlay">
    <table width="80%"align="left" style="border-collapse:collapse;margin-top:20px;margin-top:50px;">
      
      <tr>
            <td> <?php echo "<img style='margin-top:100px' src=\"$details->Poster\">"?></td>
            <td ><?php echo "<h1 style='padding-bottom:none;margin-top:-75px'>". $details->Title."</h1>" ?> <?php echo "<span >".$details->Year."</span>" ?><br> <?php echo "<span style='maring-top:-50px'>".$details->Genre."</span>" ?><br><br><br><br> <?php echo "<img style ='' height='30' width='30' src=\"assets\imdb.png\">"?> <?php echo "<span style='margin-right:550px'>". $details->imdbRating."</span >" ?><br> <?php echo "<img height='30' width='40' src=\"assets\omatoes.png\">"?> <?php echo "<span style='margin-right:550px'>". $details->tomatoRating."</span>"?><br></td>
      </tr>
    </table>
  </div>








