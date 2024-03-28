<?php

define("HOST", 'localhost');
define("NAME", '4menic');
define("USER", 'root');
define("MDP", '');

function connect() {
try {
    $connect = new PDO('mysql:host=' . HOST .';dbname=' . NAME, USER, MDP, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
    return $connect;
} catch (PDOException $e) {
    echo "problem of connection to BDD <br>" . $e->getMessage();
    return false;
}
}
?>
