<?php
 require 'database.php';

 if (!empty($_POST) && isset($_POST['submit'])) { //on initialise nos messages d'erreurs;
     $firstName = $lastName = $email = $userName = $userPassword = '';
     $firstNameError = $lastNameError = $emailError = $userNameError = $userPasswordError = '';
     // on recupère nos valeurs
     $firstName = htmlentities(trim($_POST['firstName']));
     $lastName = htmlentities(trim($_POST['lastName']));
     $email = htmlentities(trim($_POST['email']));
     $userName = htmlentities(trim($_POST['userName']));
     $userPassword = htmlentities(trim($_POST['userPassword']));
     //  $_SERVER['REQUEST_METHOD'] == 'POST' && if anterior
     // on vérifie nos champs
     $valid = true;

     if (empty($firstName)) {
         $firstNameError = 'Please enter Name';
         $valid = false;
     } elseif (!preg_match('/^[a-zA-Z ]*$/', $firstName)) {
         $firstNameError = 'Only letters and white space allowed';
     }
     if (empty($lastName)) {
         $lastNameError = 'Please enter firstname';
         $valid = false;
     } elseif (!preg_match('/^[a-zA-Z ]*$/', $lastName)) {
         $lastNameError = 'Only letters and white space allowed';
     }
     if (empty($email)) {
         $emailError = 'Please enter Email Address';
         $valid = false;
     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $emailError = 'Please enter a valid Email Address';
         $valid = false;
     }
     if (empty($userName)) {
         $userNameError = 'Please enter your user name';
         $valid = false;
     }
     if (empty($userPassword)) {
         $userPasswordError = 'Please enter your user user Password';
         $valid = false;
     }

     // si les données sont présentes et bonnes, on se connecte à la base
     //  if ($valid) {
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = 'INSERT INTO `tp_user`(`firstName`, `lastName`, `email`, `userName`, `userPassword`) values( ?, ?, ? , ? , ? )';
     $q = $pdo->prepare($sql);
     $q->execute([$firstName, $lastName, $email, $userName, $userPassword]);
     Database::disconnect();
     header('Location: index.php');
     //  }
 }
?>
<!DOCTYPE html>
<html>

<head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud</title>
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
         -->
    <?php include_once 'include/bootstrapLinkCss.php'; ?>
</head>

<body>

    <div class="container">
        <div class="row">

            <br />
            <h3>Ajouter un contact</h3>
        </div>
        <form method="post" action="form.php">
            <div
                class="control-group <?php echo !empty($firstNameError) ? 'error' : ''; ?>">
                <label class="control-label">firstName</label>
                <div class="controls">
                    <input name="firstName" type="text"
                        value="<?php echo !empty($firstName) ? $firstName : ''; ?>">
                    <?php if (!empty($firstNameError)): ?>
                    <span class="help-inline"><?php echo $firstNameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div
                class="control-group<?php echo !empty($lastNameError) ? 'error' : ''; ?>">
                <label class="control-label">lastName</label>
                <div class="controls">
                    <input type="text" name="lastName"
                        value="<?php echo !empty($lastName) ? $lastName : ''; ?>">
                    <?php if (!empty($lastNameError)):?>
                    <span class="help-inline"><?php echo $lastNameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <input name="email" type="text"
                        value="<?php echo !empty($email) ? $email : ''; ?>">
                    <?php if (!empty($emailError)): ?>
                    <span class="help-inline"><?php echo $emailError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="control-group <?php echo !empty($userNameError) ? 'error' : ''; ?>">
                <label class="control-label">userName</label>
                <div class="controls">
                    <input name="userName" type="text"
                        value="<?php echo !empty($userName) ? $userName : ''; ?>">
                    <?php if (!empty($userNameError)): ?>
                    <span class="help-inline"><?php echo $userNameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="control-group <?php echo !empty($userPasswordError) ? 'error' : ''; ?>">
                <label class="control-label">user password</label>
                <div class="controls">
                    <input name="userPassword" type="text"
                        value="<?php echo !empty($userPassword) ? $userPassword : ''; ?>">
                    <?php if (!empty($userNameError)): ?>
                    <span class="help-inline"><?php echo $userPasswordError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
            </div>
            <a class="btn" href="login.php">Retour</a>
    </div>
    </form>
    </div>

</body>

</html>