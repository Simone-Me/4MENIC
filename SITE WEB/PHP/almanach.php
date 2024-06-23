<?php
include 'conf.php';
include 'header.php';
include 'api.php';

if (isset($_GET["id"])) {
    $idFilm = $_GET["id"];
    $_SESSION["idFilmComment"] = $idFilm;
}

if (isset($_SESSION["messageCom"])) {
    $message = $_SESSION['messageCom'];
    unset($_SESSION["messageCom"]);
    echo "<script>alert('$message');</script>";
}

try {
    $sql2 = $conn->prepare("SELECT * FROM commentaire");
    $sql2->execute();
    $result2 = $sql2->get_result(); // get the mysqli result

} catch (Exception $e) {
    echo $e->getMessage();
}
$roomNames = [];
?>
<table class="table" style="margin: 7vw; width: 80vw;">
    <thead class="table-light">
        <tr>
            <th scope="col">Film</th>
            <th scope="col">Note</th>
            <th scope="col">Comment</th>
            <th scope="col">Info</th>
        </tr>
    </thead><?php
            try {
                $bdd = connect(); // Assuming connect() is a function that returns a PDO connection
                $sql = "SELECT * FROM commentaire NATURAL JOIN film;";
                $result = $bdd->query($sql);
                $comment = $result->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            foreach ($comment as $single) :
            ?>
        <tbody>
            <tr>
                <td class="colomn"><?= $single["nomFilm"] ?></td>
                <td class="colomn"><?= $single["note"] ?></td>
                <td class="colomn"><?= $single["texteCom"] ?></td>
                <td class="colomn"><a style="color: pink;" href="/4MENIC/PHP/info_movie.php?id=<?= $single["idFilm"] ?>"><i class="bi bi-info-circle"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
</table>