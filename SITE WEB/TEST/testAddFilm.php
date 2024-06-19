<?php
include 'conf.php';

//it works :)
try {
    $sql = $conn->prepare("INSERT INTO film (idFilm, nomFilm, dateSortie) VALUES ('1300910', 'Natura','2024-06-19');");
    $sql->execute();
} catch (\Throwable $th) {
    $th->getMessage();
    echo "error: not added movie";
}

//it does not work
try {
    $sql2 = $conn->prepare("INSERT INTO film (idFilm, nomFilm, dateSortie) VALUES ('1300910', 'Natura','19 juin 2024');");
    $sql2->execute();
} catch (\Throwable $th) {
    $th->getMessage();
    echo "error: not added movie";
}

//it does not work
try {
    $sql3 = $conn->prepare("INSERT INTO film (idFilm, nomFilm, dateSortie) VALUES ('', 'Spiderman', '2001-01-01');");
    $sql3->execute();
} catch (\Throwable $th) {
    $th->getMessage();
    echo "error: not added movie";
}
