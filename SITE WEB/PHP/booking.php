<?php
include 'conf.php';
include 'header.php';
include 'api.php';

$id_movie = $_GET["id"];

if (isset($_SESSION["user"])) {

    $sql = $conn->prepare("SELECT * FROM film WHERE idFilm = ?");
    $sql->bind_param("s", $id_movie);
    $sql->execute();
    $result = $sql->get_result(); // get the mysqli result
    $film = $result->fetch_assoc();

    try {
        $sql2 = $conn->prepare("SELECT DISTINCT * FROM seance NATURAL JOIN salle NATURAL JOIN cinema WHERE idFilm = ?");
        $sql2->bind_param("s", $id_movie);
        $sql2->execute();
        $result2 = $sql2->get_result(); // get the mysqli result
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
    $cinemaNames = [];
    $roomNames = [];
    $horaires = [];

    while ($row = $result2->fetch_assoc()) {
        $cinemaNames[] = $row['nomCine'];
        $roomNames[] = $row['nomSalle'];
        $horaires[] = $row['horaire'];
    }

    if ($cinemaNames == null || $cinemaNames == "") {
?> <h1>Ce film n'est pas ou plus disponible dans nos cinema partenariat</h1>
<?php } else { ?>
<form id="bookingFilm" action="bookingFilm.php" method="post">
    <h1>Réservation pour : <?= $film["nomFilm"] ?></h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Cinema associés</label>
        <select class="form-control">
            <?php
                    foreach ($cinemaNames as $cinema) {
                    ?>
            <option><?= $cinema ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Salle de cinema</label>
        <select class="form-control">
            <?php
                    foreach ($roomNames as $room) {
                    ?>
            <option><?= $room ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Horaire</label>
        <select class="form-control">
            <?php
                    foreach ($horaires as $hour) {
                    ?>
            <option><?= $hour ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nombres de place</label>
        <input type="number" id="tentacles" name="tentacles" min="1" max="10" />
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Je suis sure de mon choix</label>
    </div>
    <button type="submit" class="btn btn-primary">Reserver</button>
</form>
<?php }
} else { ?>
<a href="my_space.php">Connectez-vous pour réserver une séance</a>
<?php }