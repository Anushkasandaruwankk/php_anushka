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
$joined_date = "";
$current_route = "";
$comment = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ){
    //GET method: Show the data of the client

    if ( !isset($_GET["id"])){
        header("location: /php_anushka/index.php");
        exit;
    }

    $id = $_GET["id"];

    //Read the row of the selected client from database table
    $sql = "SELECT * FROM test WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: /php_anushka/index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $telephone = $row["telephone"];  
    $joined_date = $row["joined_date"];
    $current_route = $row["current_route"]; 
    $comment = $row["comment"];
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
        <h2><?php echo $name; ?></h2>

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
                <label class="col-sm-3 col-form-label">Current Routes</label>
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
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/php_anushka/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>