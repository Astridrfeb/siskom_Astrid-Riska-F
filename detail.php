<?php
    include('db.php');

    if(isset($_GET['id'])){
        $id= $conn->real_escape_string($_GET['id']);
        $sql = "SELECT id, Nama_Tempat, Gambar, Rating, Tahun_Dibangun, Alamat, Penjelasan FROM koreantrip WHERE id=".$id;
        $result = $conn->query($sql);
        $kumpulan_koreantrip = $result->fetch_assoc();
        $result->free_result();
        $conn->close();

        if(isset($_POST['delete'])){
        // ambil value yang dibawa oleh button delete
        $id_to_delete= $conn->real_escape_string($_POST['delete']);
        // delete data dengan id tertentu
        $sql = "DELETE FROM koreantrip WHERE id=".$id_to_delete;
        $result = $conn->query($sql);

        if($result){
            // jika query sukses dijalankan maka kita akan diarahkan ke page index.php
            header('Location: index.php');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}
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
    <h4><?php echo $kumpulan_koreantrip['Nama_Tempat']; ?></h4>
    <h5><img src =<?php echo $kumpulan_koreantrip['Gambar']; ?> width= "200"></h4>
    <h5><?php echo $kumpulan_koreantrip['Rating']; ?></h4>
    <h5><?php echo "Tahun_Dibangun :" . $kumpulan_koreantrip['Tahun_Dibangun']; ?></h5>
    <h5><?php echo "Alamat :". $kumpulan_koreantrip['Alamat']; ?></h5>
    <h5><?php echo "Penjelasan ;". $kumpulan_koreantrip['Penjelasan']; ?></h5>
    </div>

    <div class=" text-ketiga">
    <form action="detail.php" method="POST">
        <!-- button ini kita namakan delete dan mengandung nilai id yang akan dimasukkan ke dalam query -->        
            <button type="submit" name="delete" value=<?php echo $kumpulan_koreantrip['id']; ?>>Delete</button>
            <!-- kita buat link khusus ke page update dengan membawa id data yang akan diupdate -->        
            <a href=<?php echo "update.php?id=".$kumpulan_koreantrip['id']; ?>>Update data</a>       
        </form>
    </div>
    
</body>
</html>
