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
function parseSingleValue($field)
{
    $value = '';

    if (isset($field['values']) and isset($field['values'][0])) {
        $value = $field['values'][0];
    }

    return $value;
}
function writeInvalidMessage($field)
{
    if (!$field['isValid']) {
        echo '<div class="invalid-feedback">'.$field['errorMessage'].'</div>';
    }
}

function writeFormRow($id, $label, $fieldString, $field)
{
    echo '<div class="form-group row">';
    echo "  <label for='$id' class='col-sm-3 col-form-label'>$label</label>";
    echo '  <div class="col-sm-9">';
    echo $fieldString;
    writeInvalidMessage($field);
    echo '  </div>';
    echo '</div>';
}

function showResult($formFields)
{
    foreach ($formFields as $field) {
        echo "<li class='list-group-item'>";
        echo $field['label'];
        echo '<ul>';
        foreach ($field['values'] as $value) {
            echo "<li>$value</li>";
        }
        echo '</ul>';
        echo '</li>';
    }
}

// Détecte si le formulaire a été soumis
if (isset($_POST['submit'])) {
    foreach ($formFields as $name => $field) {
        $nameWithoutBracket = rtrim($name, '[]');

        if (isset($_POST[$nameWithoutBracket])) {
            if (is_array($_POST[$nameWithoutBracket])) {
                $formFields[$name]['values'] = $_POST[$nameWithoutBracket];
                $formFields[$name]['isValid'] = (bool) !empty(array_values($_POST[$nameWithoutBracket]));
            } else {
                $formFields[$name]['values'] = [$_POST[$nameWithoutBracket]];
                $formFields[$name]['isValid'] = (bool) !empty($_POST[$nameWithoutBracket]);
            }
        } else {
            $formFields[$name]['values'] = [];
            $formFields[$name]['isValid'] = false;
        }
    }

    $formIsValid = !array_search(false, array_column($formFields, 'isValid'));
}

?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <div class="container">
        <div class="alert alert-primary" role="alert">
            sTEST FORM TP
        </div>
        <form action="form.php" method="post">
            <?php

            foreach ($formFields as $name => $field) {
                $fieldString = '';

                switch ($field['element']) {
                    case 'input':
                    $fieldString = writeInput($name, $field);
                    break;
                writeFormRow($field['id'], $field['label'], $fieldString, $field);
            }
            }

            ?>

            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Soumettre</button>
                </div>
            </div>

        </form>




        <!-- liens just pour tester -->
        <p> <a href='login.php'> Aller LOGIN.php </a> </p>
        <p> <a href='index.php'> Aller INDEX.php </a> </p>



    </div>


</body>

</html>