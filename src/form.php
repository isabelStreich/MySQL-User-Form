<!-- FORM.PHP -->
<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$formIsValid = false;
$formFields = [
    'name' => [
        'element' => 'input',
        'type' => 'text',
        'id' => 'name',
        'label' => 'Prénom',
        'attributes' => [],
        'values' => null,
        'isValid' => true,
        'errorMessage' => 'Message de validation',
    ],
    'surname' => [
        'element' => 'input',
        'type' => 'text',
        'id' => 'surname',
        'label' => 'Nom',
        'attributes' => [],
        'values' => null,
        'isValid' => true,
        'errorMessage' => 'Message de validation',
    ],
    'userEmail' => [
        'element' => 'input',
        'type' => 'email',
        'id' => 'userEmail',
        'label' => 'Courriel',
        'attributes' => [],
        'values' => null,
        'isValid' => true,
        'errorMessage' => 'Message de validation',
    ],
    'userName' => [
        'element' => 'input',
        'type' => 'text',
        'id' => 'userName',
        'label' => 'UserName',
        'attributes' => [],
        'values' => null,
        'isValid' => true,
        'errorMessage' => 'Message de validation',
    ],
    'password' => [
        'element' => 'input',
        'type' => 'text',
        'id' => 'password',
        'label' => 'Password',
        'attributes' => [],
        'values' => null,
        'isValid' => true,
        'errorMessage' => 'Message de validation',
    ],
];
?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'php'; ?>
</head>

<body>

    <div class="container">


        <p> <a href='login.php'> Aller LOGIN.php </a> </p>
        <p> <a href='index.php'> Aller INDEX.php </a> </p>



    </div>

    <?php include 'php'; ?>
</body>

</html>