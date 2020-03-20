<!-- PAGE_INDEX -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <?php include_once 'include/bootstrapLinkCss.php'; ?>

</head>

<body>
    <?php include 'include/navbar.php'; ?>
    <!-- CSS CONTAINER -->
    <div class="container">

        <!-- CSS TABLE -->
        <table class="table">
            <a href="form.php" class="btn btn-success"> Ajouter un user</a>
            <thead>
                <tr>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Courriel</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Date de modification</th>
                    <th scope="col">Edition</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
include 'database.php';
$pdo = Database::connect();
$sql = 'SELECT * FROM tp_user';
foreach ($pdo->query($sql) as $row) {
    echo '<tr>';
    echo'<td>'.$row['firstName'].'</td>';
    echo'<td>'.$row['lastName'].'</td>';
    echo'<td>'.$row['email'].'</td>';
    echo'<td>'.$row['creationDate'].'</td>';
    echo'<td>'.$row['modificationDate'].'</td>';

    echo '<td>';
    echo '<a class="btn btn-success" href=update.php?id='.$row['id'].'">Update</a>'; // un autre td pour le bouton d'update
    echo '</td>';
    echo'<td>';
    echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].' ">Delete</a>'; // un autre td pour le bouton de suppression
    echo '</td>';
    echo '</tr>';
}
Database::disconnect(); //on se deconnecte de la base
?>
            </tbody>
        </table>
    </div>
</body>

</html>