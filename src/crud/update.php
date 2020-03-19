<!-- <?php
require_once 'C:\vsc-workspace\tp_dmytro-isabel-php\src\crud\database.php.php'; //on appelle notre fichier de config $id = null; if (!empty($_GET['id'])) { $id = $_REQUEST['id']; } if (null == $id) { header("location:index.php"); } else { //on lance la connection et la requete $pdo = Database ::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
   // Define variables and initialize with empty values
$name = $address = $salary = '';
$name_err = $address_err = $salary_err = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        $sql = 'SELECT * FROM tp_user where id =?';
        $q = $pdo->prepare($sql);
        $q->execute([$id]);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
        data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false"
        data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>

<body>

    <br />
    <div class="container">


        <br />
        <div class="span10 offset1">

            <br />
            <div class="row">

                <br />
                <h3>Edition</h3>
                <p>

            </div>
            <p>



                <br />
                <div class="form-horizontal">

                    <br />
                    <div class="control-group">
                        <label class="control-label">Name</label>

                        <br />
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name']; ?>
                            </label>
                        </div>
                        <p>

                    </div>
                    <p>


                        <br />
                        <div class="control-group">
                            <label class="control-label">Firstname</label>

                            <br />
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['firstname']; ?>
                                </label>
                            </div>
                            <p>

                        </div>
                        <p>


                            <br />
                            <div class="control-group">
                                <label class="control-label">Email Address</label>

                                <br />
                                <div class="controls">
                                    <label class="checkbox">
                                        <?php echo $data['email']; ?>
                                    </label>
                                </div>
                                <p>

                            </div>
                            <p>


                                <br />
                                <div class="control-group">
                                    <label class="control-label">Phone</label>

                                    <br />
                                    <div class="controls">
                                        <label class="checkbox">
                                            <?php echo $data['tel']; ?>
                                        </label>
                                    </div>
                                    <p>

                                </div>
                                <p>


                                    <br />
                                    <div class="control-group">
                                        <label class="control-label">Pays</label>

                                        <br />
                                        <div class="controls">
                                            <label class="checkbox">
                                                <?php echo $data['pays']; ?>
                                            </label>
                                        </div>
                                        <p>

                                    </div>
                                    <p>


                                        <br />
                                        <div class="control-group">
                                            <label class="control-label">Metier</label>

                                            <br />
                                            <div class="controls">
                                                <label class="checkbox">
                                                    <?php echo $data['metier']; ?>
                                                </label>
                                            </div>
                                            <p>

                                        </div>
                                        <p>


                                            <br />
                                            <div class="control-group">
                                                <label class="control-label">Url</label>

                                                <br />
                                                <div class="controls">
                                                    <label class="checkbox">
                                                        <?php echo $data['url']; ?>
                                                    </label>
                                                </div>
                                                <p>

                                            </div>
                                            <p>


                                                <br />
                                                <div class="control-group">
                                                    <label class="control-label">Comment</label>

                                                    <br />
                                                    <div class="controls">
                                                        <label class="checkbox">
                                                            <?php echo $data['comment']; ?>
                                                        </label>
                                                    </div>
                                                    <p>

                                                </div>
                                                <p>


                                                    <br />
                                                    <div class="form-actions">
                                                        <a class="btn" href="index.php">Back</a>
                                                    </div>
                                                    <p>



                </div>
                <p>

        </div>
        <p>


    </div>
    <p>
        <!-- /container -->
</body>

</html> -->

<!-- update DE OTRA PAG -->

<?php
// Include config file
include 'C:\vsc-workspace\tp_dmytro-isabel-php\src\crud\database.php';

// Define variables and initialize with empty values
$name = $address = $salary = '';
$name_err = $address_err = $salary_err = '';

// Processing form data when form is submitted
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Get hidden input value
    $id = $_POST['id'];

    // Validate name
    $input_name = trim($_POST['name']);
    if (empty($input_name)) {
        $name_err = 'Please enter a name.';
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-Z\s]+$/"]])) {
        $name_err = 'Please enter a valid name.';
    } else {
        $name = $input_name;
    }

    // Validate address address
    $input_address = trim($_POST['address']);
    if (empty($input_address)) {
        $address_err = 'Please enter an address.';
    } else {
        $address = $input_address;
    }

    // Validate salary
    $input_salary = trim($_POST['salary']);
    if (empty($input_salary)) {
        $salary_err = 'Please enter the salary amount.';
    } elseif (!ctype_digit($input_salary)) {
        $salary_err = 'Please enter a positive integer value.';
    } else {
        $salary = $input_salary;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($address_err) && empty($salary_err)) {
        // Prepare an update statement
        $sql = 'UPDATE employees SET name=?, address=?, salary=? WHERE id=?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'sssi', $param_name, $param_address, $param_salary, $param_id);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header('location: index.php');
                exit();
            } else {
                echo 'Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Get URL parameter
        $id = trim($_GET['id']);

        // Prepare a select statement
        $sql = 'SELECT * FROM employees WHERE id = ?';
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'i', $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row['name'];
                    $address = $row['address'];
                    $salary = $row['salary'];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header('location: error.php');
                    exit();
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header('location: error.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form
                        action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>"
                        method="post">
                        <div
                            class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                                value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                        <div
                            class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address"
                                class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err; ?></span>
                        </div>
                        <div
                            class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control"
                                value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err; ?></span>
                        </div>
                        <input type="hidden" name="id"
                            value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>