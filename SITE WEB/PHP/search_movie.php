<?php
include 'conf.php';
include 'header.php';
include 'api.php';

$research = $_POST["search_movie"];

$requestReserch = "search/movie";

$paramsReserch = array(
  'api_key' => $api,
  'region' => 'FR',
  'language' => 'fr-FR',
  'page' => '1',
  'query' => $research,
  // 'year' => '2010',
  // 'primary_release_year' => 2020,
  'include_adult' => false
);

$dataReserch = toGetDataTMBD($requestReserch, $api, $paramsReserch);


// ----------------- @TODO --- FIX THE PAGING OF THE  MOVIES FOR MULTIPLE RETURN

// echo count($data["results"]);
// $film_page = 10;
// $numeroPagine = ceil(count($data["results"]) / $film_page);
// $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

?>

<!-- <nav aria-label="...">
  <ul class="pagination">
    <?php if ($pagina > 1) : ?>
      <li class="page-item">
        <a class="page-link" href="?pagina=<?php echo ($pagina - 1); ?>">Previous</a>
      </li>
    <?php else : ?>
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $numeroPagine; $i++) : ?>
      <li class="page-item <?php echo ($i == $pagina) ? 'active' : ''; ?>">
        <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($pagina < $numeroPagine) : ?>
      <li class="page-item">
        <a class="page-link" href="?pagina=<?php echo ($pagina + 1); ?>">Next</a>
      </li>
    <?php else : ?>
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Next</a>
      </li>
    <?php endif; ?>
  </ul>
</nav> 

-------------------------------
-->


<?php

echo "<div class='container-movie'>";
foreach ($dataReserch["results"] as $single) :
  $date_fr = date('j F, Y', strtotime($single["release_date"]));

  if ($single["poster_path"] == "" && $single["vote_average"] == 0) {
    continue;
  } else {
?>
<div class="movie-card">
    <?php if ($single["poster_path"] == "" || $single["poster_path"] == NULL) { ?>
    <img class="card-image" src="Images/Poster_not_available.jpg" alt="Card image cap">
    <?php } else { ?>
    <img class="card-image" src="https://image.tmdb.org/t/p/original/<?= $single["poster_path"] ?>"
        alt="Card image cap">
    <?php } ?>
    <div class="card-body">
        <div class="movie-info">
            <h5 class="card-title"><?= $single["title"] ?></h5>
            <p class="card-text text-wrap"><?= $single["overview"] ?></p>
            <p class="card-text"><small class="text-muted">Sortie le <?= $date_fr ?></small></p>
            <p class="card-text"><small class="text-muted"><?= $single["vote_average"] ?> / 10 de
                    <?= round($single["vote_count"], 2) ?> votes</small></p>
            <div class="buttom-card">
                <a href="info_movie.php?id=<?= $single["id"] ?>"><i class="bi bi-info-circle"></i></a>
                <a href="ticket.php?id=<?= $single["id"] ?>"><i class="bi bi-ticket-perforated"></i></a>
            </div>
        </div>
    </div>
</div>
<?php };
endforeach; ?>
</div>