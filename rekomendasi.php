<?php
include("db.php");

$sql = "SELECT id, 
Nama_Tempat, 
Alamat, 
Gambar, 
Rating,
Tahun_Dibangun,
Penjelasan, 
reg_date FROM koreantrip";
$hasil = $conn->query($sql);

// semua data bakal disimpan dalam bentuk associated array di variabel $students
$kumpulan_koreantrip = $hasil->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <nav class = "navbar">
        <ul>
            <li><a href="index.html" class="menu">Home</a></li>
            <li><a href="about.html" class="menu">About</a></li>
            <li><a href="#recommendationtrip"class = "menu">Contact</a></li>
        </ul>
    </nav>

    <div class= "content- rekomendasi"</div>
        <h1> Rekomendasi</h1>
        <a href="tambah.html" class="button-utama">Tambah</a>
        <table style="width:100%">
        <tr>
          <th>No</th>
          <th>Nama tempat</th>
          <th>Gambar</th>
          <th>Rating</th>
          <th>Detail</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Namsan Tower</td> 
          <td><img src ="./img/namsan tower.jpeg" alt=""width= "150"></td>
          <td>4.6</td>
          <td><a href= "detail.html">detail</a></td>
        </tr>
        <tr>
        
      </table>
    </div>

</body>
</html>