<?php
    include('db.php');

    if(isset($_GET['id'])){
        $id= $conn->real_escape_string($_GET['id']);
        $sql = "SELECT Nama_Tempat, Rating, Tahun_Dibangun, Alamat, Penjelasan FROM koreantrip WHERE id=".$id;
        $result = $conn->query($sql);
        $kumpulan_koreantrip = $result->fetch_assoc();
        $result->free_result();
        $conn->close();
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <nav class = "navbar">
        <ul>
            <li><a href="index.html" class="menu">Home</a></li>
            <li><a href="about.html" class="menu">About</a></li>
            <li><a href="#recommendationtrip"class = "menu">Contact</a></li>
        </ul>
    </nav>
    <div class="halaman ketiga">
        <div class="content-ketiga">
            <h4 class=<?php echo $koreantrip['Nama_Tempat']; ?>Namsan Tower</h4>
            <h5 class="text-ketiga"><img src ="./img/namsan tower.jpeg" alt=""width= "200"></h5>
            <h6 class=<?php echo $koreantrip['Rating']; ?> </h6>
            <h6 class="text-ketiga">Tahun dibangun : 1980</h6>
            <h6 class="text-ketiga">Alamat : Namsangongwon-gil, Yongsan igadong, Yongsangu, Seoul, South Korea</h6>
            <h7 class="text-ketiga">Namsan Tower merupakan menara yang saat ini digunakan sebagai pemancar gelombang radio pertama di Korea Selatan. 
                Namsan tower memiliki tinggi 777 kaki dan dari menara tersebut kita dapat melihat keindahan kota seoul 360 derajat. 
                Berdasarkan Survey Namsan Tower dinobatkan sebagai objek wisata nomor satu di Seoul Korea Selatan.</h7>
        </div>
    </div>

    <div class=" text-ketiga">
        <a href="update.html" class=" button-utama">Edit</a>
        <a href=" hapus.html" class=" button-utama">Hapus</a>
    </div>
    
</body>
</html>