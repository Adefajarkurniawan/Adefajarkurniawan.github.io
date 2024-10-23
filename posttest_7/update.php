<?php
require 'koneksi.php';

L
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM minat WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['nama'];
        $email = $row['email'];
        $tools = $row['tools'];
        $tujuan = $row['tujuan'];
        $file = $row['file'];
    } else {
        echo "<script>alert('Data tidak ditemukan.'); window.location.href='admin.php';</script>";
        exit();
    }
}

if (isset($_POST["update"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tools = $_POST['tools'];
    $tujuan = $_POST['tujuan'];

    $sql_get_old = "SELECT file FROM minat WHERE id = $id";
    $result = $conn->query($sql_get_old);
    $row = $result->fetch_assoc();
    $old_file = $row['file'];

    if ($_FILES['file']['name'] != "") {
        $file = $_FILES['file']['name'];
        $dir = "img/";
        $tmp_file = $_FILES['file']['tmp_name'];
        $extensi = explode('.', $file);
        $extensi = strtolower(end($extensi));
        date_default_timezone_set('Asia/Makassar');
        $name_baru = date('Y-m-d H.i.s') . '.' . $extensi;

        $support = ['jpg', 'jpeg', 'png'];
        $size = $_FILES['file']['size'];
        $max_size = 1 * 1024 * 1024; // 1MB

        if (in_array($extensi, $support)) {
            if ($size < $max_size) {
                if (move_uploaded_file($tmp_file, $dir . $name_baru)) {
                    // Hapus file lama
                    $old_file_path = "img/" . $old_file;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                } else {
                    echo "<script>alert('Gagal mengunggah file baru'); window.location.href='update.php?id=$id';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Ukuran file melebihi 1MB'); window.location.href='update.php?id=$id';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Format file tidak didukung'); window.location.href='update.php?id=$id';</script>";
            exit();
        }
    } else {
        $name_baru = $old_file;
    }

    // Update data
    $sql_update = "UPDATE minat SET nama='$name', email='$email', tools='$tools', tujuan='$tujuan', file='$name_baru' WHERE id = $id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='admin.php';</script>";
        exit();
    } else {
        echo "<script>alert('Gagal mengupdate data: " . $conn->error . "'); window.location.href='update.php?id=$id';</script>";
        exit();
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

        <form class="user-form" method="POST" enctype="multipart/form-data" action="update.php?id=<?php echo $id; ?>">
            <div class="form-box">
                <label for="name">Nama Lengkap:</label>
                <input type="text" name="name" value="<?php echo $name; ?>" required>
            </div>

            <div class="form-box">
                <label for="email">Alamat Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="form-box">
                <label for="tools">Tools AI yang Diminati:</label>
                <select name="tools" required>
                    <option value="ChatGPT" <?php if ($tools == 'ChatGPT') echo 'selected'; ?>>ChatGPT</option>
                    <option value="Gemini" <?php if ($tools == 'Gemini') echo 'selected'; ?>>Gemini</option>
                    <option value="Claude AI" <?php if ($tools == 'Claude AI') echo 'selected'; ?>>Claude AI</option>
                    <option value="Blackbox" <?php if ($tools == 'Blackbox') echo 'selected'; ?>>Blackbox</option>
                    <option value="Perplexity AI" <?php if ($tools == 'Perplexity AI') echo 'selected'; ?>>Perplexity AI</option>
                </select>
            </div>

            <div class="form-box">
                <label for="tujuan">Tujuan Menggunakan AI:</label>
                <input type="text" name="tujuan" value="<?php echo $tujuan; ?>" required>
            </div>

            <div class="form-box">
                <label for="file">Unggah Foto atau Gambar Tools AI:</label>
                <input type="file" name="file">
                <p>File saat ini: <img src="img/<?php echo $file; ?>" width="100px"></p>
            </div>

            <button type="submit" class="btn" name="update">UPDATE</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
