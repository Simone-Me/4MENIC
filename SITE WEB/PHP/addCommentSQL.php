<?php
session_start();
include 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $note = isset($_POST['note']) ? $_POST['note'] : "";
    echo $note;
    $idSeance = "";
    $user = $_SESSION["user"];
    $filmIdComment = $_SESSION["idFilmComment"];

    try {
        $sqlAddCom = "INSERT INTO commentaire (texteCom, note, idFilm, idUser) VALUES (?,?,?,?)";
        echo $sqlAddCom;
        $sqlCom = $conn->prepare($sqlAddCom);
        $sqlCom->bind_param("ssss", $comment, $note, $filmIdComment, $_SESSION["user"]);
        $sqlCom->execute();
        $_SESSION['messageCom'] = "Commentaire prise en compte. STATUS : envoyé";
        header('Location: /4MENIC/PHP/almanach.php');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
