<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["userName"]);
header('Location: ../index.php');
