<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section>
            <h2>Data Minat Pengguna</h2>
            
            <form method="GET" action="admin.php">
                <input type="text" name="search" placeholder="Cari Nama, Email, atau Tools..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit">Cari</button>
            </form>

            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tools</th>
                        <th>Tujuan</th>
                        <th>Gambar</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'koneksi.php';
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];                          
                            $sql = "SELECT * FROM minat WHERE nama LIKE '%$search%' OR email LIKE '%$search%' OR tools LIKE '%$search%'";
                        } else {
                            $sql = "SELECT * FROM minat";
                        }

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['nama'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['tools'] . "</td>
                                    <td>" . $row['tujuan'] . "</td>
                                    <td><img src='img/{$row['file']}' width='100px'></td>
                                    <td>
                                        <a href='update.php?id=" . urlencode($row['id']) . "'>Update</a> | 
                                        <a href='delete.php?id=" . urlencode($row['id']) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Tidak ada data ditemukan</td></tr>";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
