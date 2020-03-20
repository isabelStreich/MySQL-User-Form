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
}
// require_once 'database.php';
// if (isset($_POST['submit'])) {
//     $userName = trim($_POST['userName']);
//     $userPassword = trim($_POST['userPassword']);

//     $pdo = Database::connect();
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "select * from tp_user where userPassword = '".$userPassword."'";
//     $q = $pdo->prepare($sql);
//     $q->execute([$userPassword]);

//     $numRows = mysqli_num_rows($q);

//     if ($numRows == 1) {
//         $row = mysqli_fetch_assoc($q);
//         if (password_verify($userPassword, $row['userPassword'])) {
//             echo 'Password verified';
//         } else {
//             echo 'Wrong Password';
//         }
//     } else {
//         echo 'No User found';
//     }
//     if ($userName == $_POST['userName'] && $userPassword == $_POST['userPassword']) {
//         // dans ce cas, tout est ok, on peut démarrer notre session
//         // on la démarre :)
//         session_start();
//         // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
//         $_SESSION['userName'] = $_POST['userName'];
//         $_SESSION['userPassword'] = $_POST['userPassword'];
//         // on redirige notre visiteur vers une page de notre section membre
//         header('location: index.php');
//     } else {
//         // Le visiteur n'a pas été reconnu comme étant membre de notre site
//         header('location: form.php');
//     }
// }

?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'include/jumbotron.php'; ?>
    <?php include_once 'include/bootstrapLinkCss.php'; ?>

</head>

<body>
    <div class="container">


    </div>
</body>

</html>
<?php
