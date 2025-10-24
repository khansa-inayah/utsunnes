<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 20px;
                font-size: 28px;
            }
            .message-box{
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            .success{
                background-color: #d4edda;
                color: #155724;
                border-color: #c3e6cb;
            }
            .error{
                background-color: #f8d7da;
                color: #721c24;
                border-color: #f5c6cb;
            }
            table.data-table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                margin-top: 20px;
            }
            .data-table th, .data-table td{
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }
            .data-table th{
                background-color: #f8f9fa;
                font-weight: bold;
                color: #333;
            }
            .data-table td{
                color: #666;
            }
            .data-table th:first-child, .data-table td:first-child {
                width: 10%;
                text-align: center;
            }
            .back-button{
                text-align: center;
                margin-top: 20px;
            }
            .back-button a{
                background-color: #007bff;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>
            
            <?php 
            if (isset($_POST['submit'])):
            
                $nama_depan = $_POST['nama_depan'];
                $nama_belakang = $_POST['nama_belakang'];
                $asal_kota = $_POST['asal_kota'];
                $umur = (int)$_POST['umur'];
                
                $nama_lengkap = $nama_depan . ' ' . $nama_belakang;

                if ($umur < 10):
            ?>
                <div class="message-box error">
                    Error: Umur minimal adalah 10 tahun.
                </div>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>

            <?php 
                else: 
            ?>
                <div class="message-box success">
                    Registrasi Berhasil!
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Umur</th>
                            <th>Asal Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop berjalan sebanyak $umur kali (misal 30 kali)
                        for ($i = 1; $i <= $umur; $i++) {
                            
                            // Cek 1: Apakah $i ganjil?
                            $isGanjil = ($i % 2 != 0);
                            // Cek 2: Apakah $i BUKAN 7 dan BUKAN 13?
                            $isNotSkipped = ($i != 7 && $i != 13);

                            // Hanya cetak baris jika KEDUA kondisi true
                            if ($isGanjil && $isNotSkipped) {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $nama_lengkap . "</td>";
                                echo "<td>" . $umur . " tahun</td>";
                                echo "<td>" . $asal_kota . "</td>";
                                echo "</tr>";
                            }
                            // Jika $i genap, atau 7, atau 13, tidak terjadi apa-apa
                            // dan loop lanjut ke $i berikutnya
                        }
                        ?>
                    </tbody>
                </table>
                
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
            
            <?php 
                endif;

            else: 
            ?>
                <div class="message-box error">
                    Error: Data tidak ditemukan.<br>
                    Silakan isi form registrasi terlebih dahulu.
                </div>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
            <?php 
            endif;
            ?>
        </div>
    </body>
</html>