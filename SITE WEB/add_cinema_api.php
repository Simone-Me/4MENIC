<?php
include 'conf.php';
/* include 'header.php';
 */
include 'api.php';

$bdd = connect();
$conn = new mysqli("localhost", "root", "", "4menic");

$region_totale = ["AUVERGNE-RHONE-ALPES", "BOURGOGNE-FRANCHE-COMTE", "BRETAGNE", "CENTRE-VAL DE LOIRE", "CORSE", "GRAND EST", "HAUTS DE FRANCE", "ILE-DE-FRANCE", "NORMANDIE", "NOUVELLE AQUITAINE", "OCCITANIE", "PAYS DE LA LOIRE", "PROVENCE-ALPES-COTE D'AZUR"];

$request_region = '&refine=region_administrative:' . $region_totale[7];

$limit = "?limit=1";

$url = 'https://data.culture.gouv.fr/api/explore/v2.1/catalog/datasets/etablissements-cinematographiques/records' . $limit . $request_region;

//Total pages numbers -> ["nhits"] (304)
//each list porvide 10 cinema, the start means which id to start
for ($i = 200; $i <= 500; $i++) :
  $urlEnd = '&start=' . $i;
  $url . $urlEnd . "\n";
  $data = file_get_contents($url . $urlEnd);
  $results = json_decode($data, true);

  foreach ($results["results"] as $single) :
    /*   echo "<pre>";
    var_dump($single["nom"]);

    echo "</pre>"; */
    try {
      $nom = $single["nom"];
      $adresse = $single["adresse"];
      $commune = $single["commune"];
      $ecrans = $single["ecrans"];
      $code_insee = $single["code_insee"];

      $sql = $conn->prepare("INSERT INTO cinema (nomCine, adresseCine, villeCine, salleTot, CPCine)
      SELECT ?, ?, ?, ?, ?
      WHERE NOT EXISTS (
            SELECT * 
            FROM cinema 
            WHERE nomCine = ?)");
      $sql->bind_param("ssssss", $nom, $adresse, $commune, $ecrans, $code_insee, $nom);
      $sql->execute();
      $sql->store_result();

      echo $nom . " : all good" . "<br>";
    } catch (Exception $e) {
      echo $e;
      echo "ERROR \n";
      die();
    }
  endforeach;
endfor;

//---------------------------------
//CREATE ADMIN AND PRIVATE THE ACCESS TO MODIFY THE DATA
//CREATE A SPACE WHERE SET THE PROGRAMMATION OF THE MOVIE
//PANIER FOR THE TICKETS
//ENJOY
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>