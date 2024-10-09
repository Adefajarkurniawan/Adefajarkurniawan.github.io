<?php
    require 'koneksi.php'; 

    if(isset($_POST['kirim'])) {
        $nama = $_POST["name"];
        $email = $_POST["email"];
        $tools = $_POST["tools"];
        $tujuan = $_POST["tujuan"];
    }

    
    $query_sql = "INSERT INTO minat (nama, email, tools, tujuan)
                    VALUES ('$nama', '$email', '$tools', '$tujuan')";
 
    if ($conn -> query($query_sql)) {
        
        header("Location: index.php");
     
    } else {
        // Jika terjadi error, tampilkan pesan error
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
?>
