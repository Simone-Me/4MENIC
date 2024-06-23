<?php
include 'conf.php';
include 'header.php';
include 'api.php';

function isCinemaConnectedToAdmin($cinemaName)
{
    $conn = new mysqli("localhost", "root", "", "4menic");
    // Prepare and bind
    $stmt = $conn->prepare("
        SELECT 
            a.idAdmin,
            a.idUser,
            a.idCinema,
            c.nomCine AS cinemaName
        FROM 
            admin a
        JOIN 
            cinema c ON a.idCinema = c.idCinema
        WHERE 
            c.nomCine = ?
    ");
    $stmt->bind_param("s", $cinemaName);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}
$cinemaName2 = 'LUXEMBOURG';
?>

<body>
    <table class="table" style="margin: 7vw; width: 80vw;">
        <thead class="table-light">
            <tr>
                <th scope="col">Cinema</th>
                <th scope="col" style="width:20vw;">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">Info</th>
                <th scope="col">Salle privé</th>
            </tr>
        </thead>

        <?php

        $bdd = connect();
        $sql = "SELECT * FROM cinema ";
        $result = $bdd->query($sql);
        $cinema = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cinema as $single) :
            //----------@todo--------------------------------
            //------------------------------
        ?>
        <tbody>
            <tr>
                <td class="colomn"><?= $single["nomCine"] ?></td>
                <td class="colomn"><?= $single["adresseCine"] ?></td>
                <td class="colomn"><?= $single["villeCine"] ?></td>
                <td class="colomn"><i class="bi bi-info-circle"></i></td>
                <td class="colomn">
                    <?php if (isCinemaConnectedToAdmin($single["nomCine"])) {
                        ?>
                    <a style="color: lightgreen;" href="/4MENIC/PHP/bookRoom.php?nomCine=<?= $single["nomCine"] ?>"> <i
                            class="bi bi-house-add"></i></a>
                    <?php } else { ?>
                    NO <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php

    ?>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>