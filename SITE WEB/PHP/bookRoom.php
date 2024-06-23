<?php
include 'conf.php';
include 'header.php';
include 'api.php';

if (isset($_GET["nomCine"])) {
    $nomCine = $_GET["nomCine"];
    $_SESSION["roomBookNameCine"] = $nomCine;
}

try {
    $sql2 = $conn->prepare("SELECT * FROM salle NATURAL JOIN cinema WHERE nomCine = ?");
    $sql2->bind_param("s", $nomCine);
    $sql2->execute();
    $result2 = $sql2->get_result(); // get the mysqli result
} catch (Exception $e) {
    echo $e->getMessage();
}
$roomNames = [];

while ($row = $result2->fetch_assoc()) {
    $roomNames[] = $row['nomSalle'];
}

if (isset($_SESSION["user"])) { ?>
    <div class="m-5">
        <?php
        if (isset($_SESSION["messageBookRoom"])) {
            $message = $_SESSION['messageBookRoom'];
            unset($_SESSION["messageBookRoom"]);
            echo "<script>alert('$message');</script>";
        } ?>

        <form id="bookingRoom" action="bookingRoomSQL.php" method="post" style="margin: 8.7vw; color: white;">
            <h1>Réservation d'une salle pour : <?= $nomCine ?></h1>
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
            <div class="form-group">
                <label for="dateDay">Jour</label>
                <select class="form-control" name="day" required>
                    <?php for ($i = 1; $i < 32; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
                <label for="dateMonth">Mois</label>
                <select class="form-control" name="month" required>
                    <?php for ($i = 1; $i < 13; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
                <label for="dateYear">Année</label>
                <select class="form-control" name="year" required>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="acceptBookingCine" name="acceptBookingCine">
                <label class="form-check-label" for="acceptBookingCine">Je comprends que le gerant pourra refuser ma
                    damande</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="acceptBookingCine" name="acceptBookingCine">
                <label class="form-check-label" for="acceptBookingCine">Je souhaite etre contacté par mail pour recevoir
                    la reponse</label>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer ma demande</button>
        </form>

    <?php
} else { ?>
        <a href="my_space.php">Connectez-vous pour faire une demande de réservation de salle</a>
    </div>
<?php }
