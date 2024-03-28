<?php
include 'conf.php';
include 'header.php';
include 'api.php';

$filter = $_GET["filter"];

$total_pages = $_SESSION["total_pages"];

if($filter === "last_out") {

$request5 = "discover/movie";
  
$today = date("Y-m-d");
  
$date = new DateTime();
$today = $date->format('Y-m-d');
$date->modify("-5 weeks");
$yesterday = $date->format('Y-m-d');

$vote = [];
  
for ($i=1; $i <= $total_pages; $i++) :
  
  $params2 = array(
    'api_key' => $api,
    'region' => 'FR',
    'language' => 'fr-FR',
    'page' => $i,
    'release_date.gte' => $yesterday,
    'release_date.lte' => $today,
    'with_release_type' => 3|2,
    'sort_by' => 'release_date.desc'
  );
  
  $data2 = toGetDataTMBD($request5, $api, $params2);
  $total_pages = $data2['total_pages'];

  foreach($data2["results"] as $single) :
    $vote[$single["id"]] = $single["vote_average"];
  endforeach;
endfor;

arsort($vote);
$movie_by_pop = [];
foreach ($vote as $key => $val) {
  array_push($movie_by_pop, $key);
}
echo "<div class='container-movie'>";

foreach($movie_by_pop as $id_movie) :

$request = "movie/" . $id_movie;

$params = array(
  'api_key' => $api,
  'region' => 'FR',
  'language' => 'fr-FR',
);

$movie_filtered = toGetDataTMBD($request, $api, $params);

$date_fr = date('j F, Y', strtotime($movie_filtered["release_date"]));

?>

<div class="movie-card">
    <?php 
// ----@TODO-------------
//LE IF METTRE AU 1ER FOREACH POUR GARDER MOINS DE DONNEES
//----------------
if($movie_filtered["poster_path"] == "") { ?>
    <img class="card-image" src="Images/Poster_not_available.jpg" alt="Card image cap">
    <?php } else { ?>
    <img class="card-image" src="https://image.tmdb.org/t/p/original/<?=$movie_filtered["poster_path"]?>"
        alt="Card image cap">
    <?php }?>
    <div class="movie-info">
        <h5 class="card-title"><?=$movie_filtered["title"]?></h5>
        <!-- <p class="card-text text-wrap"><?=$movie_filtered["overview"]?></p> -->
        <p class="card-text"><small class="text-muted">Sortie le <?=$date_fr?></small></p>
        <p class="card-text"><small class="text-muted"><?=round($movie_filtered["vote_average"], 2)?> / 10 de
                <?=round($movie_filtered["vote_count"], 2)?> votes</small></p>
        <div class="buttom-card">
            <a href="info_movie.php?id=<?=$movie_filtered["id"]?>"><i class="bi bi-info-circle"></i></a>
            <a href="ticket.php?id=<?=$movie_filtered["id"]?>"><i class="bi bi-ticket-perforated"></i></a>
        </div>
    </div>
</div>

<?php endforeach;
echo "</div>";
      } elseif($filter === "popular") { ?>
<div class="m-5">
    <h1 class="text-light">Work in progress ...</h1>
</div>
<?php }