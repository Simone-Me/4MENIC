<?php
include 'conf.php';
include 'header.php';
include 'api.php';

//Alert for the mistake registrer
if (isset($_SESSION["messageError"])) {
    $message = $_SESSION['messageError'];
    unset($_SESSION["messageError"]);
    echo "<script>alert('$message');</script>";
}
?>

<link rel="stylesheet" href="subscription_user.css">

<form id="msform" action="add_user.php" method="post">
    <ul id="progressbar">
        <li class="active">Identifiants</li>
        <li>Informations personnelles</li>
        <li>Preferences</li>
    </ul>
    <fieldset>
        <h2 class="fs-title">Cration de l'utilisateur</h2>
        <h3 class="fs-subtitle">1er étape</h3>
        <input type="text" name="email" placeholder="Email*" required />
        <input type="password" name="password" placeholder="Password*" required />
        <input type="password" name="confPassword" placeholder="Confirmer le Password*" required />
        <input type="button" name="next" class="next action-button" value="Apres" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Complement informations</h2>
        <h3 class="fs-subtitle">On va surement pas le revendre...</h3>
        <input type="text" name="prenom" placeholder="Prenom*" required />
        <input type="text" name="nom" placeholder="Nom*" required />
        <input type="text" name="phone" placeholder="téléphone" />
        <textarea name="description" placeholder="Info a retenir..."></textarea>
        <input type="button" name="previous" class="previous action-button" value="Avant" />
        <input type="button" name="next" class="next action-button" value="Apres" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Preferences de cinema</h2>
        <h3 class="fs-subtitle">Situer le cinema a coté de moi</h3>
        <input type="text" name="twitter" placeholder="Twitter" />
        <input type="text" name="facebook" placeholder="Facebook" />
        <input type="text" name="gplus" placeholder="Google Plus" />
        <input type="button" name="previous" class="previous action-button" value="Avant" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
    </fieldset>
</form>

<script src="sub.js"></script>