<!-- PAGE LOGIN -->
<?php
$userName = 'admin';
$userPassword = 'admin';
// on teste si nos variables sont définies
if (isset($_POST['userName']) && isset($_POST['userPassword'])) {
    // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    if ($userName == $_POST['userName'] && $userPassword == $_POST['userPassword']) {
        // dans ce cas, tout est ok, on peut démarrer notre session
        // on la démarre :)
        session_start();
        // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
        $_SESSION['userName'] = $_POST['userName'];
        $_SESSION['userPassword'] = $_POST['userPassword'];
        // on redirige notre visiteur vers une page de notre section membre
        header('location: index.php');
    } else {
        // Le visiteur n'a pas été reconnu comme étant membre de notre site
        header('location: form.php');
    }
    // } else {
//     echo 'Les variables du formulaire ne sont pas déclarées.';
}?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'include/jumbotron.php'; ?>
    <?php include_once 'include/bootstrapLinkCss.php'; ?>

</head>

<body>
    <div class="container">

        <!-- Content container here -->
        <p> <a href='index.php'> Aller INDEX.php </a> </p>
        <p> <a href='form.php'> Aller FORM.php </a> </p>

        <p> <a href='src\logintest\index.php'> Aller logintestINDEX.php </a> </p>
        <p> <a href='src\logintest\entry.php'> Aller logintest login.php </a> </p>

    </div>
</body>

</html>
<?php
// } else {
//         header('Location: form.php');
//     }
