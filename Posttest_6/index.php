<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOOLS AI Tools</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="light-mode">
    <?php include 'header.php'?>

    <main id="home">
        <section class="hero">
            <h2>Selamat Datang di Website Tools AI</h2>
            <p>Menjelajahi teknologi AI yang berguna untuk meningkatkan produktivitas.</p>
        </section>

        <section id="ai-tools" class="tools">
            <h2>Daftar Tools AI</h2>
            <div id="ai-tools-list">
               
            </div>
        </section>

        <section id="form" class="about">
            <h2>Tertarik Menggunakan AI Tools?</h2>
            <p>Isi form di bawah ini untuk mendapatkan informasi terbaru tentang tools AI dan penawaran khusus!</p>

            <form class="user-form" method="POST" action="tambah.php" enctype="multipart/form-data">
                <h3>Daftarkan Minat Anda</h3>
                <div class="form-box">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" name="name" required placeholder="Masukkan nama lengkap">
                </div>
            
                <div class="form-box">
                    <label for="email">Alamat Email:</label>
                    <input type="email" name="email" required placeholder="Masukkan email">
                </div>
            
                <div class="form-box">
                    <label for="interest">Tools AI yang Diminati:</label>
                    <select id="interest" name="tools" required>
                        <option value="ChatGPT">ChatGPT</option>
                        <option value="Gemini">Gemini</option>
                        <option value="Claude AI">Claude AI</option>
                        <option value="Blackbox">Blackbox</option>
                        <option value="Perplexity AI">Perplexity AI</option>
                    </select>
                </div>
            
             
                <div class="form-box">
                    <label for="usage">Tujuan Menggunakan AI:</label>
                    <input type="text" name="tujuan" required placeholder="Misalnya, produktivitas, belajar, pekerjaan">
                </div>

                <div class="form-box">
                    <label for="file"> Unggah Foto atau Gambar Tools AI: </label>
                    <input type="file" name="file" require>
                </div>
                <button type="submit" class="btn" name="kirim">KIRIM</button>
            </form>

        </section>

        <section id="about-me" class="about">
            <h2>Tentang Saya</h2>
            <p>Nama: Ade Fajar Kurniawan</p>
            <p>Email: adefajar876@gmail.co .com</p>
            <button id="show-popup" class="btn">Lihat Info Lain</button>
        </section>
    </main>

 
    <?php include 'footer.php' ?>
   
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-popup">&times;</span>
            <h2>Informasi Tambahan</h2>
            <p>Nama : Ade Fajar Kurniawan</p>
            <p>Perguruan Tinggi : Universitas Mulawarman</p>
            <p>Fakultas : Teknik</p>
            <p>Program Studi : Informatika</p>
            <p>NIM : 2309106137</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
