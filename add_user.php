<?php
session_start();
include 'conf.php';

if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    $telephone = $_POST["phone"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $username = $_POST["username"];


    if ($password !== $confPassword) {
        $_SESSION["messageError"] = "Dude, try again and insert the same password...";
        header('Location: subscription_user.php');
    } else {
        try {
            $sql = $conn->prepare("INSERT INTO utilisateur (username, nom, prenom, password, email, telephone)
        SELECT ?, ?, ?, ?, ?, ?
        WHERE NOT EXISTS (SELECT * FROM utilisateur WHERE email = ?)");

            $sql->bind_param("sssssss", $username, $nom, $prenom, $password, $email, $telephone, $email);
            $sql->execute();

            if ($sql->affected_rows > 0) {
                unset($_SESSION["messageError"]);
                header('Location: my_space.php');
            } else {
                $_SESSION["messageError"] = "Erreur, Utilisateur déjà existant";
                header('Location: subscription_user.php');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}