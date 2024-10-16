<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "ai_db";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if($conn -> connect_error) {
    die("Koneksi Gagal : " . mysqli_connect_error());
} else {  
}

?>