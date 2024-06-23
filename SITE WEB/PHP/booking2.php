<?php
include 'conf.php';
include 'header.php';
include 'api.php';

if (isset($_SESSION["user"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cinema = $_POST['cinema'];
        $_SESSION["cinemaBooking"] = $cinema;

        try {
            $sql2 = $conn->prepare("SELECT * FROM seance NATURAL JOIN salle NATURAL JOIN cinema WHERE idFilm = ? AND nomCine = ?;");
            $sql2->bind_param("ss", $_SESSION["id_movie"], $cinema);
            $sql2->execute();
            $result2 = $sql2->get_result();

            $roomNames = [];

            while ($row = $result2->fetch_assoc()) {
                $roomNames[] = $row['nomSalle'];
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } ?>

        <?php if (isset($_SESSION["messageErrorFilm"])) {
            $message = $_SESSION['messageErrorFilm'];
            unset($_SESSION["messageErrorFilm"]);
            echo "<script>alert('$message');</script>";
        } ?>
        <div class="m-5">
            <form id="booking2" action="booking3.php" method="post" style="margin: 5vw; color: white;">
                <h1>Réservation pour : <?= $_SESSION["filmTitle"] ?> au cinema : <?= $cinema ?></h1>
                <div class="form-group">
                    <label for="roomSelect">Selectionne une salle</label>
                    <select class="form-control" name="room" required>
                        <?php
                        foreach ($roomNames as $room) {
                        ?>
                            <option onclick="" value="<?= $room ?>"><?= $room ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Continer vers l'horaire</button>
            </form>

        <?php
    } else { ?>
            <a href="my_space.php">Connectez-vous pour réserver une séance</a>
        </div>
<?php }
}
