<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICAL TEST - PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Sales Team</h2>
        <a class="btn btn-primary" href="/php_anushka/create.php" role="button">Add New</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Current Route</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "php_anushka";

                //Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //Check connection
                if($connection->connect_error){
                    die("Connection faild: ". $connection->connect_error);
                }

                //Read all row from database table
                $sql = "SELECT * FROM test";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query: " . $connection->error);
                }

                //Read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[telephone]</td>
                        <td>$row[current_route]</td>
                        <td>
                            <a class='btn btn-info btn-sm' href='/php_anushka/view.php?id=$row[id]'>View</a>
                            <a class='btn btn-warning btn-sm' href='/php_anushka/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/php_anushka/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>