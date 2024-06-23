<?php
session_start();
include 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $selectedHour = isset($_POST['hour']) ? $_POST['hour'] : '';
    $numberOfSeats = isset($_POST['placeCine']) ? (int)$_POST['placeCine'] : "";
    $isBookingConfirmed = isset($_POST['acceptBookingCine']) ? true : false;
    $today = date("Y-m-d");
    $idSeance = "";
    $user = $_SESSION["user"];

    try {
        $sqlRoom = "SELECT * FROM seance NATURAL JOIN salle, cinema, film WHERE nomCine = ? AND nomSalle = ? AND film.idFilm = ?";
        $stmt_user = $conn->prepare($sqlRoom);
        $stmt_user->bind_param("sss", $_SESSION["cinemaBooking"], $_SESSION["roomaBooking"], $_SESSION["id_movie"]);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            $row_seance = $result_user->fetch_assoc();
            $idSeance = $row_seance['idSeance'];
            echo $idSeance;
        }
    } catch (Exception $e) {
        $e->getMessage();
        $_SESSION['messageErrorFilm'] = "error : essayer à nouveau";
        header('Location: /4MENIC/PHP/bookingFilm.php');
    }

    try {
        $sqlAddTicket = "INSERT INTO ticket (nbPlace, dateAchat, idSeance, idUser) VALUES (?,?,?,?)";
        $sqlTicket = $conn->prepare($sqlAddTicket);
        $sqlTicket->bind_param("ssss", $numberOfSeats, $today, $idSeance, $user);

        $sqlTicket->execute();
        $_SESSION["messageBookFilm"] = "OK";
        header('Location: /4MENIC/index.php');
    } catch (Exception $e) {
        $e->getMessage();
    }
}
