<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_anushka";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$telephone = "";
$current_route = "";
$joined_date = "";
$comment = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $current_route = $_POST["current_route"];
    $joined_date = $_POST["joined_date"];
    $comment = $_POST["comment"];

    do {
        if(empty($name) || empty($email) || empty($telephone) || empty($current_route)){
            $errorMessage = "All the fields are required";
            break;
        }

        //Add new client to database
        $sql = "INSERT INTO test (id, name, email, telephone, joined_date, current_route, comment)" . "VALUES ('$id','$name','$email','$telephone','$joined_date','$current_route','$comment')";
        $result = $connection->query($sql);

        if (!$result){
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $id  ="";
        $name = "";
        $email = "";
        $telephone = "";
        $current_route = "";
        $joined_date = "";
        $comment = "";

        $successMessage = "Client added correctly";

        header("location: /php_anushka/index.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICAL TEST - PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Create User</h2>

        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ID:</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div> 
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email Address:</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telephone:</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" name="telephone" value="<?php echo $telephone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Joined Date:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="joined_date" value="<?php echo $joined_date; ?>">
                </div>
            </div>            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Current Routes:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="current_route" value="<?php echo $current_route; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Comments:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="comment" value="<?php echo $comment; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/php_anushka/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>