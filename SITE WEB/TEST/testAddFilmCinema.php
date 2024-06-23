<?php
include '../PHP/conf.php';

//TEST
try {
    $bdd = connect();
    $search = "SELECT * from cinema NATURAL JOIN salle";
    $result = $bdd->query($search);
    $cinemaName = $result->fetchAll(PDO::FETCH_ASSOC);

    $bdd2 = connect();
    $search2 = "SELECT * from film";
    $result2 = $bdd2->query($search2);
    $filmName = $result2->fetchAll(PDO::FETCH_ASSOC);

    $hours = array("19:00", "21:30");



    foreach ($filmName as $uno) {
        echo "<pre>";
        //var_dump($uno);
        echo "</pre>";
        $nbHours = rand(0, 1);
        $nbSalle = rand(0, 585);
        try {
            $sql = "INSERT INTO seance (idFilm, idSalle, horaire) VALUES ('" . $uno['idFilm'] . "'," . $nbSalle . ",'" . $hours[$nbHours] . "')";
            echo $sql;
            //UNCOMMENT TO CREATE EACH MOVIE A SEANCE
            /* $sql = $conn->prepare("INSERT INTO seance (idFilm, idSalle, horaire) VALUES ('" . $uno['idFilm'] . "'," . $nbSalle . ",'" . $hours[$nbHours] . "')");
            $sql->execute();
            $sql->store_result(); */
            var_dump($uno["nomFilm"] . " : OK");
            echo "<br>";
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    $couleurs = array("Vert", "Rouge", "Jeune", "Noir", "Blanc", "Orange");

    foreach ($cinemaName as $uno) {
        $nbColor = rand(0, 5);
        $nbSeats = rand(30, 60);
        try {
            $sql2 = "INSERT INTO salle (nomSalle, capacite, idCinema) VALUES ('" . $couleurs[$nbColor] . "'," . $nbSeats . "," . $uno["idCinema"] . ")";
            echo $sql2;
            //UNCOMMENT TO CREATE EACH CINEMA A ROOM
            /*$sql = $conn->prepare("INSERT INTO salle (nomSalle, capacite, idCinema) VALUES ('" . $couleurs[$nbColor] . "'," . $nbSeats . "," . $uno["idCinema"] . ")");
            $sql->execute();
            $sql->store_result();*/
            var_dump($uno["idCinema"] . " : OK");
            echo "<br>";
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
} catch (Exception $e) {
    $e->getMessage();
}
