<?php
require 'koneksi.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "SELECT * FROM minat WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "
    <script>
    alert('ID tidak ditemukan!');
    document.location.href = 'admin.php';
    </script>
    ";
    exit;
}


if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $tools = mysqli_real_escape_string($conn, $_POST["tools"]);
    $tujuan = mysqli_real_escape_string($conn, $_POST["tujuan"]);

    // Query update
    $query = "UPDATE minat SET nama = '$nama', email = '$email', tools = '$tools', tujuan = '$tujuan' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
        <script>
        alert('Data berhasil diupdate!');
        document.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal mengupdate data!');
        document.location.href = 'admin.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section id="form" class="about">
        <h2>Update Data Minat</h2>

        <form class="user-form" method="POST" action="update.php?id=<?php echo $id; ?>">
            <div class="form-box">
                <label for="name">Nama Lengkap:</label>
                <input type="text" name="name" value="<?php echo $row['nama']; ?>" required>
            </div>

            <div class="form-box">
                <label for="email">Alamat Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>

            <div class="form-box">
                <label for="tools">Tools AI yang Diminati:</label>
                <select name="tools" required>
                    <option value="ChatGPT" <?php if ($row['tools'] == 'ChatGPT') echo 'selected'; ?>>ChatGPT</option>
                    <option value="Gemini" <?php if ($row['tools'] == 'Gemini') echo 'selected'; ?>>Gemini</option>
                    <option value="Claude AI" <?php if ($row['tools'] == 'Claude AI') echo 'selected'; ?>>Claude AI</option>
                    <option value="Blackbox" <?php if ($row['tools'] == 'Blackbox') echo 'selected'; ?>>Blackbox</option>
                    <option value="Perplexity AI" <?php if ($row['tools'] == 'Perplexity AI') echo 'selected'; ?>>Perplexity AI</option>
                </select>
            </div>

            <div class="form-box">
                <label for="tujuan">Tujuan Menggunakan AI:</label>
                <input type="text" name="tujuan" value="<?php echo $row['tujuan']; ?>" required>
            </div>
            
            <button type="submit" class="btn" name="update">UPDATE</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
