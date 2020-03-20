<!-- PAGE LOGIN -->
<?php

session_start();
require_once 'database.php';

    if (isset($_POST['userName']) && isset($_POST['userPassword'])) {
        $userName = trim(addslashes(htmlspecialchars($_POST['userName'])));
        $hashPassword = password_hash(($_POST['userPassword']), PASSWORD_DEFAULT);

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from tp_user where userPassword = '$hashPassword' && userName ='$userName'";
        $q = $pdo->prepare($sql);
        $q->execute([$userPassword, $userName]);

        $numRows = mysqli_num_rows($q);
        // $verification= password_verify ($userPassword, $hash)
        header('location: index.php');
        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($q);
            if (password_verify($userPassword, $row['userPassword']) && $userName == $row['userName']) {
                // echo 'Password verified';
                header('location: index.php');
            } else {
                // echo 'Wrong Password';
                header('location: form.php');
            }
        }
    }

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
