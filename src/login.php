<!-- LOGIN.PHP -->
<?php session_start();
// $userName = 'admin@qqch.com';
// $password = 'admin';
//$hash = password_hash($password);
if (isset($_POST['userName']) and isset($_POST['password'])) {
    $_SESSION['userName'] = $_POST['userName'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: index.php');

    // if (password_verify($password, $hash)) {
//     echo 'Password is valid!';
    // } else {
//     echo 'Invalid password.';

    session_start();
    // Store Session Data
$_SESSION['login_user'] = $username;  // Initializing Session with value of PHP Variable
}?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'include/jumbotron.php'; ?>
    <?php include_once 'include/bootstrapLinkCss.php'; ?>

</head>

<body>

    <!-- CSS CONTAINER -->
    <div class="container">

        <!-- Content container here -->
        <p> <a href='index.php'> Aller INDEX.php </a> </p>
        <p> <a href='form.php'> Aller FORM.php </a> </p>

    </div>
</body>

</html>
<?php
// } else {
//         header('Location: form.php');
//     }
