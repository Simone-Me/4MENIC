<?php
include 'conf.php';
include 'header.php';
include 'api.php'
?>

<?php
//actually playing
$request = "movie/now_playing";
//pour chercher la date specifique
$request5 = "movie/upcoming";

$params = array(
  'api_key' => $api,
  'region' => 'FR',
  'language' => 'fr-FR',
  'page' => '1'
  );

$data = toGetDataTMBD($request, $api, $params);

//var_dump($data);
//https://api.themoviedb.org/3/movie/upcoming?api_key=<<api_key>>&language=en-US&page=1

// echo $total_pages = $data['total_pages'];

echo "<div class='container-movie'>";

for ($i=1; $i <= 4; $i++) {

  $params2 = array(
    'api_key' => $api,
    'region' => 'FR',
    'language' => 'fr-FR',
    'page' => $i,
  );

$data2 = toGetDataTMBD($request5, $api, $params2);

foreach($data2["results"] as $single) :
$date_fr = date('j F, Y', strtotime($single["release_date"])); ?>

  <div class="movie-card">
    <?php if($single["poster_path"] == "") { ?>
      <img class="card-image" src="Images/Poster_not_available.jpg" alt="Card image cap">
          <?php } else {
    ?>
    <img class="card-image" src="https://image.tmdb.org/t/p/original/<?=$single["poster_path"]?>" alt="Card image cap">
    <?php }?>
    <div class="card-body">
      <div class="movie-info">
      <h5 class="card-title"><?=$single["title"]?></h5>
        <p class="card-text text-wrap"><?=$single["overview"]?></p>
        <p class="card-text"><small class="text-muted">Prevu le <?=$date_fr?></small></p>
        <div class="buttom-card">
          <a href="info_movie.php?id=<?=$single["id"]?>"><i class="bi bi-info-circle"></i></a>
          <a href="ticket.php?id=<?=$single["id"]?>"><i class="bi bi-ticket-perforated"></i></a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php } ?>
</div>
  </body>
</html>
