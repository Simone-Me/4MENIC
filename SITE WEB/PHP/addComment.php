<?php
include 'conf.php';
include 'header.php';
include 'api.php';

if (isset($_GET["id"])) {
    $idFilm = $_GET["id"];
    $_SESSION["idFilmComment"] = $idFilm;
}

try {
    $sql2 = $conn->prepare("SELECT * FROM film NATURAL JOIN cinema WHERE idFilm = ?");
    $sql2->bind_param("s", $idFilm);
    $sql2->execute();
    $result2 = $sql2->get_result(); // get the mysqli result

} catch (Exception $e) {
    echo $e->getMessage();
}
//obtein the result 1 line
$film = $result2->fetch_assoc();
$comment = array("Incroyable", "Brillant", "Intéressant", "Une découverte", "un régal pour les yeux", "Ambitieux", "Charismatique", "Efficace", "Experimental", "Méticuleux", "Structuré", "Un premier effort");
?>
<div class="m-5">
    <?php if (isset($_SESSION["user"])) { ?>
        <form id="commentForm" action="addCommentSQL.php" method="post" style="margin: 8.7vw; color: white;">
            <h1>Commentaire pour le film : <?= $film["nomFilm"] ?></h1>
            <div class="form-group">
                <label for="roomSelect">Choisi un commentaire</label>
                <select class="form-control" name="comment" required>
                    <?php for ($i = 1; $i < count($comment); $i++) { ?>
                        <option value="<?= $comment[$i] ?>"><?= $comment[$i] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="note">Donne un notation</label>
                <select class="form-control" name="note" required>
                    <?php for ($i = 3; $i < 11; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="acceptBookingCine" name="acceptBookingCine" required>
                <label class="form-check-label" for="acceptBookingCine">Je veux rendre publique mon commantaire</label>
            </div>
            <button type="submit" class="btn btn-primary">Publier</button>
        </form>
    <?php
        echo "Compte : " . $_SESSION["userName"];
    } else { ?>
        <a href="my_space.php">Connectez-vous pour réserver une séance</a>
</div>
<?php }
