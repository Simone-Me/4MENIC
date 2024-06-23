<?php
include './PHP/conf.php';
include './PHP/header.php';
include './PHP/api.php';
?>

<body>
  <header>
    <span id="title">4MENIC</span>
    <p class="slogan">Trouve ta place parmi les étoiles</p>
  </header>

  <?php
  if (isset($_SESSION["messageError"])) {
    $message = $_SESSION['messageError'];
    unset($_SESSION["messageError"]);
    echo "<script>alert('$message');</script>";
  }

  /*     $bdd = connect();
    $search = "SELECT nameCine from cinema";
    $result = $bdd->query($search);
    $cinemaName = $result->fetchAll(PDO::FETCH_ASSOC);
    // foreach($cinemaName as $uno) {
    echo "<pre>";
    var_dump($cinemaName[0]["nameCine"]);
  echo "</pre>";
 */    // }

  //actually playing
  $request = "movie/now_playing";
  // to request a list
  $request2 = "genre/movie/list";
  //not working without the lnguage fallback
  $request3 = "movie/502356/images";
  //pour chercher la date specifique
  $request5 = "discover/movie";

  $params = array(
    'api_key' => $api,
    'region' => 'FR',
    'language' => 'fr-FR',
    'page' => '1'
  );
  try {
    $data = toGetDataTMBD($request, $api, $params);
  } catch (\Throwable $th) {
    $th->getMessage();
  }
  $data = toGetDataTMBD($request, $api, $params);

  $total_pages = $data['total_pages'];

  $_SESSION["total_pages"] = $total_pages;

  //var_dump($_SESSION["total_pages"]);

  echo "<div class='container-movie'>";

  $today = date("Y-m-d");

  $date = new DateTime();
  $today = $date->format('Y-m-d');
  $date->modify("-5 weeks");
  $yesterday = $date->format('Y-m-d');

  for ($i = 1; $i <= $total_pages; $i++) :

    $params2 = array(
      'api_key' => $api,
      'region' => 'FR',
      'language' => 'fr-FR',
      'page' => $i,
      'release_date.gte' => $yesterday,
      'release_date.lte' => $today,
      'with_release_type' => 3 | 2,
      'sort_by' => 'release_date.desc'
    );

    $data2 = toGetDataTMBD($request5, $api, $params2);

    $_SESSION["now_playing"] = $data2;

    $total_pages = $data2['total_pages'];

    foreach ($data2["results"] as $single) :
      $idFilm = $single['id'];
      $titleFilm = $single['title'];
      $sortieFilm = $single["release_date"];

      if (($single["poster_path"] == "" && $single["vote_average"] == 0)) {
        continue;
      } else {

        //IT ADD CINEMA MOVIE AT THE LIST FILM -- TO DO EVERY WEEK
        //only the new one
        /* try {
          $sql = $conn->prepare("INSERT INTO film (idFilm, nomFilm, dateSortie)
      VALUES ('" . $idFilm . "', '" . $titleFilm . "','" . $sortieFilm . "');");
          $sql->execute();
      } catch (\Throwable $th) {
          echo $th->getMessage();
      } */

        $date_fr = date('j F, Y', strtotime($single["release_date"]));
  ?>

        <div class="movie-card">
          <?php if ($single["poster_path"] == "") { ?>
            <img class="card-image" src="./Images/Poster_not_available.jpg" alt="Card image cap">
          <?php } else { ?>
            <img class="card-image" src="https://image.tmdb.org/t/p/original/<?= $single["poster_path"] ?>" alt="Card image cap">
          <?php } ?>
          <div class="movie-info">
            <h5 class="card-title"><?= $single["title"] ?></h5>
            <!-- <p class="card-text text-wrap"><?= $single["overview"] ?></p> -->
            <p class="card-text"><small class="text-muted">Sortie le <?= $date_fr ?></small></p>
            <p class="card-text"><small class="text-muted"><?= $single["vote_average"] ?> / 10 de
                <?= round($single["vote_count"], 2) ?> votes</small></p>
            <div class="buttom-card">
              <a href="./PHP/info_movie.php?id=<?= $single["id"] ?>"><i class="bi bi-info-circle"></i></a>
              <?php if (isset($_SESSION["user"])) { ?>
                <a href="./PHP/addComment.php?id=<?= $single["id"] ?>"><i class="bi bi-chat-square-quote"></i></a>
              <?php } ?>
              <a href="./PHP/booking.php?id=<?= $single["id"] ?>"><i class="bi bi-ticket-perforated"></i></a>
            </div>
          </div>
        </div>
  <?php };
    endforeach;
  endfor ?>
  </div>
</body>

</html>