<?php
include 'conf.php';
include 'header.php';
include 'api.php';
?>
<link rel="stylesheet" href="/4MENIC/CSS/detailed_info.css"><?php

$id_movie = $_GET["id"];
//to get the info of movie use the ID
$request_detail= "movie/" . $id_movie;
$params = array(
    'api_key' => $api,
    'region' => 'FR',
    'language' => 'fr-FR',
);
$movie_detail = toGetDataTMBD($request_detail, $api, $params);
$date_fr = date('j F, Y', strtotime($movie_detail["release_date"]));

$request_video = "movie/" . $id_movie . "/videos";

$params_video = array(
    'api_key' => $api,
    'language' => 'en-US',
);

$params_video_fr = array(
  'api_key' => $api,
  'language' => 'fr-FR',
);

$video = toGetDataTMBD($request_video, $api, $params_video);
$video_fr = toGetDataTMBD($request_video, $api, $params_video_fr);

if (empty($video["results"]) && empty($video_fr["results"])) {
  //empyt, do nothing
} elseif (empty($video["results"])) {
  $video_key = $video_fr["results"][0]["key"];
} else {
  $video_key = $video["results"][0]["key"];
}

$request_image = "movie/" . $id_movie . "/images";

$params_image = array(
  'api_key' => $api,
  'language' => 'fr-FR',
  'include_image_language' => 'en'
);

$image = toGetDataTMBD($request_image, $api, $params_image);
?>
<div class="info_movie">
    <div class="top-part">
        <div class="info_movie_lf">
            <?php
    if($movie_detail["original_title"] !== $movie_detail["title"]) : ?>
            <h1><i>[ <?=$movie_detail["original_title"]?> ]</h1></i>
            <?php endif; ?>
            <h1><?=$movie_detail["title"]?></h1>
            <p>Date de sortie international : <?=$date_fr?></p>
            <p>Genre : <?=$movie_detail["genres"][0]["name"]?></p>
            <p>Status : <?=$movie_detail["status"]?></p>
            <p><?=round($movie_detail["vote_average"], 2)?> / 10 sur <?=$movie_detail["vote_count"]?> vote <a
                    href="comment.php"> <i class="bi bi-pencil-square"></i></a></p>
            <p></p>
            <p class="fs-5"><?=$movie_detail["overview"]?></p>
        </div>
        <img class="movie_image" src="https://image.tmdb.org/t/p/original/<?=$movie_detail["poster_path"]?>"
            alt="Card image cap">
    </div>

    <div class="down-part">
        <div class="container">
            <div class="row">
                <div class="trailer-card">
                    <iframe width="560" height="349" src="https://www.youtube.com/embed/<?=$video_key?>" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <?php foreach($image["posters"] as $poster) : ?>
                <div class="photos-card">
                    <img class="photos-movie" src="https://image.tmdb.org/t/p/original/<?=$poster["file_path"]?>"
                        alt="photo image movie">
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>