<!-- INDEX.PHP -->
<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once 'include/bootstrapLinkCss.php'; ?>
</head>

<body>
    <?php include 'include/navbar.php'; ?>
    <!-- CSS CONTAINER -->
    <div class="container">
        <!-- CSS TABLE -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Courriel</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Date de modification</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">AAAA</td>
                    <td>BBBB</td>
                    <td>@Courriel</td>
                    <td>date création</td>
                    <td>date de modification</td>
                    <td>$icone</td>
                </tr>
                <tr>
                    <td scope="row">CCCC</td>
                    <td>DDDD</td>
                    <td>@Courriel</td>
                    <td>date création</td>
                    <td>date de modification</td>
                    <td>$icone</td>
                </tr>
                <tr>
                    <td scope="row">EEEE</td>
                    <td>FFFF</td>
                    <td>@Courriel</td>
                    <td>date création</td>
                    <td>date de modification</td>
                    <td>$icone</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>Page INDEX </p>
    <p> <a href='login.php'> Aller LOGIN.php </a> </p>
    <p> <a href='form.php'> Aller FORM.php </a> </p>
</body>

</html>