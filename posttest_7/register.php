<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil.<a href='index.php'>log in</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="regis-login.css">
</head>
<body>
    <h2>Register</h2>
    <form id="registerForm" method="POST" action="register.php" onsubmit="return validasiForm()">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" >
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" >
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" >
        </div>
        <a href="index.php">Sudah ada akun?</a>
        <button type="submit">Register</button>
    </form>

    <script src="script.js"></script> 
</body>
</html>
