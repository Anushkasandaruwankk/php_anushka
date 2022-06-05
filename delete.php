<?php
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "php_anushka";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM test WHERE id=$id";
    $connection->query($sql);
}

header("location: /php_anushka/index.php");
exit;
?>