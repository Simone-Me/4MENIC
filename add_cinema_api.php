<?php
include 'conf.php';
/* include 'header.php';
 */
include 'api.php';

$url = 'https://data.culture.gouv.fr/api/explore/v2.1/catalog/datasets/etablissements-cinematographiques/records?limit=20&refine=region_administrative%3A%22ILE-DE-FRANCE%22';

//Total pages numbers -> ["nhits"] (304)
//each list porvide 10 cinema, the start means which id to start
for ($i = 0; $i <= 1; $i++) :
  $urlEnd = '&start=' . $i;
  $url . $urlEnd . "\n";
  $data = file_get_contents($url . $urlEnd);
  $results = json_decode($data, true);
  echo "<pre>";
  /*   var_dump($results);
 */
  echo "</pre>";
  // ora $results contiene un array associativo con tutti i cinema della regione Île-de-France e i relativi dettagli

  /*   $bdd = connect();
  $search = "SELECT nameCine from cinema";
  $result = $bdd->query($search);
  $cinemaName = $result->fetchAll(PDO::FETCH_ASSOC);
 */
  foreach ($results["results"] as $single) :
    echo "<pre>";
    var_dump($single["nom"]);
    echo "</pre>";

  /* foreach ($cinemaName as $uno) :

      if ($uno["nameCine"] == $fields["nom"]) {
        //already exist in the board
      } else {
        $sql = "INSERT INTO cinema (nameCine, adrCine, screen, seats, owner, category_art, medium_entry, multiplex, insee, entry2021, program_films, adm_region, people_around, new_movie, movieXweek)
    VALUES ('" . htmlspecialchars($fields["nom"]) . "',
    '" . $fields["adresse"] . "',
    '" . $fields["ecrans"] . "',
    '" . $fields["fauteuils"] . "',
    '" . $fields["proprietaire"] . "',
    '" . $fields["categorie_art_et_essai"] . "',
    '" . $fields["tranche_d_entrees"] . "',
    '" . $fields["multiplexe"] . "',
    '" . $fields["code_insee"] . "',
    '" . $fields["entrees_2021"] . "',
    '" . $fields["nombre_de_films_programmes"] . "',
    '" . $fields["region_administrative"] . "',
    '" . $fields["population_de_la_commune"] . "',
    '" . $fields["nombre_de_films_inedits"] . "',
    '" . $fields["nombre_de_films_en_semaine_1"] . "')";
        $result = $bdd->exec($sql);
      }
    endforeach; */
  endforeach;
endfor;

//---------------------------------
//CREATE ADMIN AND PRIVATE THE ACCESS TO MODIFY THE DATA
//CREATE A SPACE WHERE SET THE PROGRAMMATION OF THE MOVIE
//PANIER FOR THE TICKETS
//ENJOY
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>