<?php
include 'conf.php';
include 'api.php';
?>
<?php session_start() ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>4MENIC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>4MENIC</title>
    <link rel="icon" type="image/x-icon" href="Images/logo_4.png">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Rajdhani:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet/less" type="text/css" href="flip.scss" />
    <script src="flip.js"></script>
  </head>
  <body>
  <?php



$search_query = "cane";
$url = "https://www.google.com/search?q=" . urlencode($search_query) . "&tbm=isch";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3");
$output = curl_exec($ch);
curl_close($ch);

if(preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $output, $matches)) {
    echo $matches[1][0];
} else {
    echo "Nessuna immagine trovata.";
}

?>


  </body>
    </html>