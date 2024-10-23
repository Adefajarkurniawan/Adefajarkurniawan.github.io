<?php
require 'koneksi.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['name'];
            echo "Login berhasil. Welcome" . $_SESSION['user'] . "!";
            header("Location: home.php");
        } else {
            echo "password salah";
        }
    } else {
        echo "tidak ada email.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="regis-login.css">
</head>
<body>
    <h2>Login</h2>
    <form id="loginForm" method="POST" action="index.php"  onsubmit="return validasiForm()">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" >
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" >
        </div>
        <a href="register.php">Belum ada Akun?</a>
        <button type="submit">Login</button>
    </form>

    <script src="script.js"></script> 
</body>
</html>
