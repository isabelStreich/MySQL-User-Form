<?php
require 'database.php';
//on appelle notre fichier de config
// var_dump($_POST);
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header('location:index.php');
} elseif (!isset($_POST['submit'])) {
    //on lance la connection et la requete
    $pdo = Database ::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM tp_user where id =?';
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
//  && isset($_POST['submit'])
 if (!empty($_POST) && isset($_POST['submit'])) {
     // // on initialise nos erreurs
     $firstNameError = null;
     $lastNameError = null;
     $emailError = null;
     $userNameError = null;
     $userPasswordError = null;
     // On assigne nos valeurs
     $firstName = htmlentities(trim($_POST['firstName']));
     $lastName = htmlentities(trim($_POST['lastName']));
     $email = htmlentities(trim($_POST['email']));
     $userName = htmlentities(trim($_POST['userName']));
     $userPassword = htmlentities(trim($_POST['userPassword']));
     //  On verifie que les champs sont remplis
     $valid = true;
     if (empty($firstName)) {
         $firstNameError = 'Please enter Name';
         $valid = false;
     }
     if (empty($lastName)) {
         $lastNameError = 'Please enter lastName';
         $valid = false;
     }
     if (empty($email)) {
         $emailError = 'Please enter Email Address';
         $valid = false;
     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $emailError = 'Please enter a valid Email Address';
         $valid = false;
     }
     if (empty($userName)) {
         $userNameError = 'Please enter your userName';
         $valid = false;
     }
     if (empty($userPassword)) {
         $userPassword = 'Please enter userPassword';
         $valid = false;
     }
     // mise à jour des donnés
     if ($valid) {
         $pdo = Database::connect();
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = 'UPDATE tp_user SET firstName = ?,lastName = ?,email = ?,userName = ?, userPassword = ? WHERE id = ?';
         $q = $pdo->prepare($sql);
         $q->execute([$firstName, $lastName, $email, $userName, $userPassword, $id]);
         Database::disconnect();
         header('Location: index.php');
     }
 }
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once 'include/bootstrapLinkCss.php'; ?>
    <?php include 'include/navbar.php'; ?>
    <title>Update</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Modifier un contact</h1>
        </div>
        <form method="post"
            action="update.php?id=<?php echo $id; ?>">
            <div
                class="control-group <?php echo!empty($firstNameError) ? 'error' : ''; ?>">
                <label class="control-label">Prenom</label>
                <div class="controls">
                    <input name="firstName" type="text"
                        value="<?php echo!empty($firstName) ? $firstName : $data['firstName']; ?>">
                    <?php if (!empty($firstNameError)): ?><span
                        class="help-inline">
                        <?php echo $firstNameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="control-group<?php echo!empty($lastNameError) ? 'error' : ''; ?>">
                <label class="control-label">Nom</label>
                <div class="controls">
                    <input type="text" name="lastName"
                        value="<?php echo!empty($lastName) ? $lastName : $data['lastName']; ?>">
                    <?php if (!empty($lastNameError)): ?>
                    <span class="help-inline"><?php echo $lastNameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="control-group <?php echo!empty($emailError) ? 'error' : ''; ?>">
                <label class="control-label">Courriel</label>
                <div class="controls">
                    <input name="email" type="text"
                        value="<?php echo!empty($email) ? $email : $data['email']; ?>">
                    <?php if (!empty($emailError)): ?>
                    <span class="help-inline"><?php echo $emailError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="control-group<?php echo!empty($userNameError) ? 'error' : ''; ?>">
                <label class="control-label">Username</label>
                <div class="controls">
                    <input type="text" name="userName"
                        value="<?php echo!empty($userName) ? $userName : $data['userName']; ?>">
                    <?php if (!empty($userNameError)): ?>
                    <span class="help-inline"><?php echo $userNameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="control-group <?php echo!empty($userPasswordError) ? 'error' : ''; ?>">
                <label class="control-label">Password </label>
                <div class="controls">
                    <input name="userPassword" type="text"
                        value="<?php echo!empty($userPassword) ? $userPassword : $data['userPassword']; ?>">
                    <?php if (!empty($telError)): ?>
                    <span class="help-inline"><?php echo $userPasswordError; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-actions">
                    <input type="submit" class="btn btn-success" name="submit" value="submit">
                    <a class="btn" href="index.php">Retour</a>
                </div>
        </form>
    </div>

</body>

</html>