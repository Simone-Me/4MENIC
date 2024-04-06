<?php
include 'conf.php';
include 'header.php';
include 'api.php'
?>

<body>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Cinema</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">CP</th>
                <th scope="col">Écrans</th>
            </tr>
        </thead>

        <?php

        $bdd = connect();
        $sql = "SELECT * FROM cinema LIMIT 30";
        $result = $bdd->query($sql);
        $cinema = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cinema as $single) :
            //----------@todo--------------------------------
            //DO A REQUETTE SQL TO COLLECT THE DATA IN MYPHPADMIN,
            //CREATE ADMIN AND PRIVATE THE ACCESS TO MODIFY THE DATA
            //CREATE A SPACE WHERE SET THE PROGRAMMATION OF THE MOVIE
            //PANIER FOR THE TICKETS
            //------------------------------
        ?>
            <tbody>
                <tr>
                    <td class="colomn"><?= $single["nomCine"] ?></i></td>
                    <td class="colomn"><?= $single["adresseCine"] ?></i></td>
                    <td class="colomn"><?= $single["villeCine"] ?></i></td>
                    <td class="colomn"><?= $single["CPCine"] ?></i></td>
                    <td class="colomn"><?= $single["salleTot"] ?></i></td>
                </tr>
            <?php endforeach; ?>

            </tbody>
    </table>
    <?php

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>