<?php
include 'conf.php';
include 'header.php';
include 'api.php';

$requestReserch = "search/movie";
$researchLetter = chr(rand(97, 122));

$paramsReserch = array(
    'api_key' => $api,
    'region' => 'FR',
    'language' => 'fr-FR',
    'page' => '1',
    'query' => $researchLetter,
    // 'year' => '2010',
    // 'primary_release_year' => 2020,
    'include_adult' => false
);

$dataReserch = toGetDataTMBD($requestReserch, $api, $paramsReserch);

//Give each imageLogin a poster of a movie that begin with a random letter
for ($i = 0; $i < 10; $i++) {
    if ($dataReserch["results"][$i]["poster_path"] == ("" || NULL) || $dataReserch["results"][$i]["vote_average"] == 0) {
    } else {
        ${"imageLogin$i"} = "https://image.tmdb.org/t/p/original/" . $dataReserch["results"][$i]["poster_path"];
    }
}

?>

<body>
    <div class="containerLogin" onclick="onclick">
        <div class="topLogin"
            style="--my-color-var1: url(<?= $imageLogin1 ?>); --my-color-var2: url(<?= $imageLogin2 ?>);"></div>
        <div class="bottomLogin"
            style="--my-color-var3: url(<?= $imageLogin3 ?>); --my-color-var4: url(<?= $imageLogin4 ?>);"></div>
        <div class="centerLogin">
            <h2>Connectez-vous</h2>
            <input type="email" placeholder="email" />
            <input type="password" placeholder="password" />
            <a href="subscription_user.php" style="color: white;">Première Connexion</a>
            <h2>&nbsp;</h2>
        </div>
    </div>
</body>