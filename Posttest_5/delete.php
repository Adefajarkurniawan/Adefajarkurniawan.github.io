<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "DELETE FROM minat WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
        <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal menghapus data!');
        document.location.href = 'admin.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('ID tidak ditemukan!');
    document.location.href = 'admin.php';
    </script>
    ";
}
?>
