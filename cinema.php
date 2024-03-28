<?php
include 'conf.php';
include 'header.php';
include 'api.php'
?>

<body>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Affiche</th>
      <th scope="col">Cinema</th>
      <th scope="col">Adresse</th>
      <th scope="col">Ville</th>
      <th scope="col">Écrans</th>
      <th scope="col">Places</th>
      <th scope="col">Categorie</th>
      <th scope="col">Multiplex</th>
      <th scope="col">Programmés</th>
      <th scope="col">Inedits</th>
      <th scope="col">Par semaine</th>
    </tr>
  </thead>
  
  <?php

  $bdd = connect();
  $sql = "SELECT * FROM cinema";
  $result = $bdd->query($sql);
  $cinema = $result->fetchAll(PDO::FETCH_ASSOC);

  foreach($cinema as $single) :
    //----------@todo--------------------------------
    //DO A REQUETTE SQL TO COLLECT THE DATA IN MYPHPADMIN,
    //CREATE ADMIN AND PRIVATE THE ACCESS TO MODIFY THE DATA
    //CREATE A SPACE WHERE SET THE PROGRAMMATION OF THE MOVIE
    //PANIER FOR THE TICKETS
    //------------------------------
?>
  <tbody>
    <tr>
      <th scope="row"><img class="colomn affiche w-25 h-75" src="Images/Poster_not_available.jpg" alt=""></th>
      <td class="colomn"><?=$single["nameCine"]?></i></td>      
      <td class="colomn"><?=$single["adrCine"]?></i></td>
      <td class="colomn"><?=$single["adrVille"]?></i></td>
      <td class="colomn"><?=$single["screen"]?></i></td>
      <td class="colomn"><?=$single["seats"]?></i></td>
      <td class="colomn"><?=$single["category_art"]?></i></td>
      <td class="colomn"><?=$single["multiplex"]?></i></td>
      <td class="colomn"><?=$single["program_films"]?></i></td>
      <td class="colomn"><?=$single["new_movie"]?></i></td>
      <td class="colomn"><?=$single["movieXweek"]?></i></td>
    </tr>
  <?php endforeach ; ?>

    </tbody>
</table>
<?php

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>
