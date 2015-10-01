<?php
require __DIR__ . "\bootstrap.php";



# If we have no MID and no NAME, go back to search page
if (empty($_GET["name"])) {
  header("Location: index.html");
  return;
}

$search = new \Imdb\TitleSearch(); // Optional $config parameter
$results = $search->search($_GET["name"], [\Imdb\TitleSearch::MOVIE],1); // Restricting search by movies and 1 search result


?>
<!DOCTYPE html>
<html>

    <!-- Bootstrap core CSS -->
    <link href="./index_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./index_files/cover.css" rel="stylesheet">


  <head>
    <title>Search results for '<?php echo $_GET["name"] ?>'</title>
    <style type="text/css">body,td,th,h2 { font-size:20px; font-family:sans-serif; } th { background-color:#ffb000; text-align:center;} h2 { text-align:center; font-size:15px; margin-top: 20px; margin-bottom:0; }</style>
  </head>



   <div id="background-image"></div>
   <div id="background-overlay"></div>
  
  <div id="overlay">
    <table width="80%"align="center" border="1" style="border-collapse:collapse;margin-top:20px;">
      <tr><th align="center">Details</th><th align="center">IMDB Rating</th><th align="center">Rotten tomatoes Rating</th></tr>
      <?php foreach ($results as $res):?>
      <tr>
            <td><a href="movie.php?mid=<?php echo $res->imdbid() ?>"><?php echo $res->title() ?></a></td>
            <td align="center"style ="color:#ffb000;"><?php echo  $res->rating() ?></td>
            <td align="center" style ="color:#ffb000;"><?php echo $res->rating() ?></td>
      </tr>
      <?php endforeach ?>
    </table>
  </div>





</html>
