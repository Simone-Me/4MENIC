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
            header('Location: /4MENIC/index.php');
            exit();
        } else {
            $_SESSION["messageError"] = "Erreur, username ou/et password erronés";
            header('Location: /4MENIC/PHP/my_space.php');
            exit();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
