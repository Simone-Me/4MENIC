<?php
include 'conf.php';

//it works :)
try {
    $sql = $conn->prepare("INSERT INTO cinema (nomCine, adresseCine, villeCine, salleTot, CPCine) VALUES ('Odeon', '1 rue Rivoli', 'PARIS',2, 300);");
    $sql->execute();
} catch (\Throwable $th) {
    $th->getMessage();
    echo "error: not added movie";
}

//it does not work
try {
    $sql2 = $conn->prepare("INSERT INTO cinema (nomCine, adresseCine, villeCine, salleTot, CPCine) VALUES ('Odeon', 'PARIS', 2 , 300');");
    $sql2->execute();
} catch (\Throwable $th) {
    $th->getMessage();
    echo "error: not added movie";
}

//it does not work
try {
    $sql3 = $conn->prepare("INSERT INTO cinema (nomCine, adresseCine, villeCine, salleTot, CPCine) VALUES ('Odeon', '1 rue Rivoli', 'PARIS','deux', 300);");
    $sql3->execute();
} catch (\Throwable $th) {
    $th->getMessage();
    echo "error: not added movie";
}
