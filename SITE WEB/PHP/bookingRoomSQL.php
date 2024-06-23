<?php
session_start();
include 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $day = isset($_POST['day']) ? $_POST['day'] : '';
    $month = isset($_POST['month']) ? $_POST['month'] : "";
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $room = isset($_POST['room']) ? $_POST['room'] : '';
    $dateDemande = $year . "-" . $month . "-" . $day;
    echo $dateDemande;
    $idSeance = "";
    $user = $_SESSION["user"];

    try {
        $sqlRoom = "SELECT * FROM salle WHERE nomSalle = ?";
        $stmt_user = $conn->prepare($sqlRoom);
        $stmt_user->bind_param("s", $room);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            $row_seance = $result_user->fetch_assoc();
            $idSalle = $row_seance['idSalle'];
        }
    } catch (Exception $e) {
        $e->getMessage();
        $_SESSION['messageErrorFilm'] = "error : essayer à nouveau";
        header('Location: /4MENIC/PHP/bookingFilm.php');
    }

    try {
        $sqlAddResa = "INSERT INTO reservationsalle (idSalle, dateResa, idUser) VALUES (?,?,?)";
        $sqlResa = $conn->prepare($sqlAddResa);
        $sqlResa->bind_param("sss", $idSalle, $dateDemande, $user);
        $sqlResa->execute();
        $_SESSION['messageBookRoom'] = "Reservation prise en compte. STATUS : envoyé";
        header('Location: /4MENIC/PHP/cinema.php');
    } catch (Exception $e) {
        $e->getMessage();
    }
}
