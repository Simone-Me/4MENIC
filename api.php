<?php

setlocale(LC_TIME, 'fr_FR.utf8');

$api = '52db8feb6a2445049b2744c7a9223a05';

//actually playing
//$request like -> $request = "movie/now_playing";

// Imposta i parametri della richiesta
//$params = array('api_key' => $api,'region' => 'FR','language' => 'fr-FR','page' => '1');

//format the data
//echo '<pre>' + </pre>;

function toGetDataTMBD($request, $api, $params) {
    // Inizializza la sessione cURL
    $ch = curl_init();

    // Imposta l'URL dell'endpoint API
    $url = 'https://api.themoviedb.org/3/' . $request;


    // Aggiunge i parametri all'URL dell'endpoint API
    $url .= '?' . http_build_query($params);

    // Imposta le opzioni della richiesta cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Esegue la richiesta cURL e ottiene la risposta
    $response = curl_exec($ch);

    // Chiude la sessione cURL
    curl_close($ch);


    // Decodifica la risposta JSON
    $data = json_decode($response, true);
    return $data;
};
