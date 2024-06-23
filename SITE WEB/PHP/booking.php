<?php
include 'conf.php';
include 'header.php';
include 'api.php';

$id_movie = $_GET["id"];
$_SESSION["id_movie"] = $id_movie;

if (isset($_SESSION["user"])) {

    $sql = $conn->prepare("SELECT * FROM film WHERE idFilm = ?");
    $sql->bind_param("s", $id_movie);
    $sql->execute();
    $result = $sql->get_result(); // get the mysqli result
    $film = $result->fetch_assoc();
    $_SESSION["filmTitle"] = $film["nomFilm"];

    try {
        $sql2 = $conn->prepare("SELECT DISTINCT * FROM seance NATURAL JOIN salle NATURAL JOIN cinema WHERE idFilm = ?");
        $sql2->bind_param("s", $id_movie);
        $sql2->execute();
        $result2 = $sql2->get_result(); // get the mysqli result
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $cinemaNames = [];
    $roomNames = [];
    $horaires = [];

    while ($row = $result2->fetch_assoc()) {
        $cinemaNames[] = $row['nomCine'];
        $roomNames[] = $row['nomSalle'];
        $horaires[] = $row['horaire'];
    }

    if ($cinemaNames == null || $cinemaNames == "") { ?>
        <div class="m-5">
            <h1 style="color: white;">Ce film n'est pas ou plus disponible dans nos cinema partenariat</h1>
        <?php } else {
        if (isset($_SESSION["messageErrorFilm"])) {
            $message = $_SESSION['messageErrorFilm'];
            unset($_SESSION["messageErrorFilm"]);
            echo "<script>alert('$message');</script>";
        } ?>

            <form id="bookingFilm" action="booking2.php" method="post" style="margin: 5vw; color: white;">
                <h1>Réservation pour : <?= $film["nomFilm"] ?></h1>
                <div class="form-group">
                    <label for="cinemaSelect">Cinema associés</label>
                    <select class="form-control" name="cinema" required>
                        <?php
                        foreach ($cinemaNames as $cinema) {
                        ?>
                            <option value="<?= $cinema ?>"><?= $cinema ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Continuer vers la salle</button>
            </form>

        <?php }
} else { ?>
        <a href="my_space.php">Connectez-vous pour réserver une séance</a>
        </div>
    <?php }
