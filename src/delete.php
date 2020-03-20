<?php
require 'database.php';
$id = 0;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (!empty($_POST)) {
    $id = $_POST['id'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'DELETE FROM tp_user  WHERE id = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    Database::disconnect();
    header('Location: index.php');
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'include/bootstrapLinkCss.php'; ?>
    <?php include 'include/navbar.php'; ?>
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h1>Supprimer l"utilisateur</h1>
            </div>
            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id"
                    value="<?php echo $id; ?>" />
                <h5>Etes-vous sur pour delete ?</h5>
                <div class="form-actions">
                    <input type="submit" class="btn btn-danger" value="Oui">
                    <input type="submit" class="btn btn-success" href="index.php" name="submit" value="Non">
                </div>
            </form>

</body>

</html>