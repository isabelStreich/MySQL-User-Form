<!-- PAGE_INDEX -->
<?php session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
        data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false"
        data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" /> -->
    <?php include_once 'include/bootstrapLinkCss.php'; ?>

</head>

<body>
    <?php include 'include/navbar.php'; ?>
    <!-- CSS CONTAINER -->
    <div class="container">
        <div>
            <a href="form.php" class="btn btn-success">Ajouter un user</a>
        </div>
        <!-- CSS TABLE -->
        <table class="table">

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
include 'C:\vsc-workspace\tp_dmytro-isabel-php\src\crud\database.php';
$pdo = Database::connect();
$sql = 'SELECT * FROM tp_user';
foreach ($pdo->query($sql) as $row) {
    echo '<br /><tr>';
    echo'<td>'.$row['firstName'].'</td>';
    echo'<td>'.$row['lastName'].'</td>';
    echo'<td>'.$row['email'].'</td>';
    echo'<td>'.$row['creationDate'].'</td>';
    echo'<td>'.$row['modificationDate'].'</td>';

    echo '<td>';
    echo '<a class="btn" href="edit.php?id='.$row['id'].' ">Read</a>'; // un autre td pour le bouton d'edition
    echo '</td>';
    echo '<td>';
    echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>'; // un autre td pour le bouton d'update
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
    <div>
        <p>Page INDEX </p>
        <p> <a href='login.php'> Aller LOGIN.php </a> </p>
        <p> <a href='form.php'> Aller FORM.php </a> </p>
    </div>
</body>

</html>