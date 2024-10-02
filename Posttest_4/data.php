<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $interest = htmlspecialchars($_POST['interest']);
    $usage = htmlspecialchars($_POST['usage']);
    $newsletter = isset($_POST['newsletter']) ? "Ya, saya ingin menerima email." : "Tidak, saya tidak ingin menerima email.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran AI Tools</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Data Pendaftaran Tools AI</h1>
    </header>
    <main>
        <section>
            <h2>Terima Kasih, Berikut Detail Pendaftaran Anda:</h2>
            <p><strong>Nama Lengkap:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Tools AI yang Diminati:</strong> <?php echo $interest; ?></p>
            <p><strong>Tujuan Penggunaan AI:</strong> <?php echo $usage; ?></p>
            <p><strong>Newsletter:</strong> <?php echo $newsletter; ?></p>
        </section>
    </main>
   
</body>
</html>
