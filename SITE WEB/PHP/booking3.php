<?php
include 'conf.php';
include 'header.php';
include 'api.php';
?> <div style="margin: 5vw; color: white;">
    <?php if (isset($_SESSION["user"])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $room = $_POST['room'];
            $_SESSION["roomaBooking"] = $room;
            try {
                $sql = $conn->prepare("SELECT * FROM seance NATURAL JOIN salle, cinema WHERE idFilm = ? AND nomCine = ? AND nomSalle = ?;");
                $sql->bind_param("sss", $_SESSION["id_movie"], $_SESSION["cinemaBooking"], $room);
                $sql->execute();
                $result = $sql->get_result();

                $hourSelect = [];
                while ($row = $result->fetch_assoc()) {
                    $hourSelect[] = $row['horaire'];
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } ?>
</div>
<div class="m-5">
    <?php if (isset($_SESSION["messageErrorFilm"])) {
                $message = $_SESSION['messageErrorFilm'];
                unset($_SESSION["messageErrorFilm"]);
                echo "<script>alert('$message');</script>";
            } ?>

    <form id="bookingFilm" action="bookingFilm.php" method="post" style="margin: 5vw; color: white;">
        <h1>Réservation pour : <?= $_SESSION["filmTitle"] ?> au cinema : <?= $_SESSION["cinemaBooking"] ?> dans la salle
            : <?= $room ?></h1>
        <div class="form-group">
            <label for="hourSelect">Selectionne l'horaire</label>
            <select class="form-control" name="horaire" required>
                <?php
                foreach ($hourSelect as $hour) {
                ?>
                    <option onclick="" value="<?= $hour ?>"><?= $hour ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="placeCine">Nombres de place</label>
            <input type="number" id="placeCine" name="placeCine" min="1" max="10" />
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="acceptBookingCine" name="acceptBookingCine">
            <label class="form-check-label" for="acceptBookingCine">Je suis sure de mon choix</label>
        </div>
        <button type="submit" class="btn btn-primary">Confirmer mon choix</button>
    </form>

<?php
        } else { ?>
    <a href="my_space.php">Connectez-vous pour réserver une séance</a>
</div>
<?php }
    }
