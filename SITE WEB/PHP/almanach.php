<?php
include 'conf.php';
include 'header.php';
include 'api.php';
?>
<div class="m-5">
    <?php if (isset($_SESSION["user"])) {
        echo "Compte : " . $_SESSION["userName"];
    } else { ?>
    <a href="my_space.php">Connectez-vous pour réserver une séance</a>
</div>
<?php }