<?php

// $conn = mysqli_connect("localhost","root","hidecard","phpcrud");

// if(!$conn){
//     die("Database connection failed");
// }


$server_name = "localhost";
$username = "root";
$password = "hidecard";
$database_name = "phpcrud";

try {
    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    $conn->set_charset("utf8");
    echo "Database connected successfully";
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}

?>   