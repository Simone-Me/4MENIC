<?php
session_start();
include 'conf.php';

if (isset($_POST["username"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $sql = $conn->prepare("SELECT * FROM utilisateur WHERE username = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $result = $sql->get_result(); // get the mysqli result
        $user = $result->fetch_assoc();

        if ($user["username"] == $username && $user["password"] == $password) {
            unset($_SESSION["messageError"]);
            $_SESSION["user"] = $user["idUser"];
            $_SESSION["userName"] = $user["username"];
            header('Location: ../index.php');
        } else {
            $_SESSION["messageError"] = "Erreur, username ou/et password erronés";
            header('Location: my_space.php');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
