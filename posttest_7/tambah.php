<?php
    require 'koneksi.php'; 

    if(isset($_POST['kirim'])) {
        $nama = $_POST["name"];
        $email = $_POST["email"];
        $tools = $_POST["tools"];
        $tujuan = $_POST["tujuan"];
        $file_tools = $_FILES['file']['name'];
        $dir = "img/";
        $tmp_file = $_FILES['file']['tmp_name'];
        $extensi = explode('.', $file_tools);
        $extensi = strtolower(end($extensi));
        date_default_timezone_set('Asia/Makassar');
        $name_baru = date('Y-m-d H.i.s').'.'.$extensi;
        
        $support = ['jpg', 'jpeg', 'png'];
        $size = $_FILES['file']['size'];
        $max_size = 1 * 1024 * 1024;

        if(in_array($extensi, $support)) {
            if($size < $max_size) {
                if(move_uploaded_file($tmp_file, $dir.$name_baru)){
                    $sql = "INSERT INTO minat (nama, email, tools, tujuan, file) 
                    VALUES ('$nama', '$email', '$tools', '$tujuan','$name_baru')"; 
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Data berhasil disimpan'); 
                        window.location.href='home.php';
                        </script>";
                    } else {
                        echo "<script>alert('Gagal menyimpan data: " . $conn->error . "'); 
                        window.location.href='home.php';
                        </script>";
                    }

                }
            }else {
                echo "<script>alert('File di atas 1mb'); 
                window.location.href='home.php';
                </script>";
            }
        }else {
            echo "<script>alert('Format file tidak didukung');
            window.location.href='home.php';
            </script>";
        }
}
    

    
   
?>
