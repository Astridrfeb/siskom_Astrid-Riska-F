<?php 
    // connect database
    include("db.php");
    // kode ini akan dijalankan ketika user menekan button dengan name submit
    if(isset($_POST["submit"])){
        // membuat variabel yang berisi input dari form
        $No = $conn->real_escape_string($_POST['No']);
        $Nama_Tempat= $conn->real_escape_string($_POST['Nama_Tempat']);
        $Rating = $conn->real_escape_string($_POST['Rating']);
        $Detail = $conn->real_escape_string($_POST['Detail']);
        //membuat alamat gambarnya
        $filename = $_FILES['img']["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $new_name = date('YmdHis');
        $tempname = $_FILES['img']['tmp_name']; 
        $folder = "./img/".$new_name.".".$extension;

        // melakukan upload gambar ke folder image
        // jika ada gambar yang diunggah maka kita akan memasukkan seluruh data
        // jika tidak ada gambar maka kita akan memasukkan seluruh data kecuali kolom image
        if(move_uploaded_file($tempname, $folder)){
            $sql = "INSERT INTO mahasiswa (No, Nama_Tempat, Rating , Gambar, Detail) VALUES ('$Nama_Tempat', $Rating, '$folder', '$Detail')";        
        } else {
            $sql = "INSERT INTO mahasiswa (No, Nama_Tempat, Rating , Detail , Gambar) VALUES ('$Nama_Tempat', $Rating, '$folder', '$Detail')";
        } 
        // menjalankan query
        $result = $conn->query($sql);

        if($result) {
            // jika query sukses maka akan diarahkan ke page index.php
            header('Location: rekomendasi.php');
        } else {
            echo "error";
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
    
    <div class="update-data">
        <div class="text-data"></div>
        <h1>Tambah</h1>
         <form method="POST" action="tambah.php" enctype="multipart/form-data">
            <label>No</label>
            <br>
            <!-- menambahkan attribute value yang nilainya dari database. jadi nanti di input formnya langsung terisi nilai -->
            <input type="text" name="No" value=<?php echo $student['No']; ?> >
            <br>
            <label>Nama_Tempat<label>
            <br>
            <input type="text" name="Nama_Tempat" value=<?php echo $student['Nama_Tempat']; ?> >
            <br>
            <label>Rating<label>
            <br>
            <input type="text" name="Rating" value=<?php echo $student['Rating']; ?> >
            <br>
            <label>Gambar</label>
            <br>
            <input type="file" name="img">
            <br>
            <label>Detail<label>
            <br>
            <input type="text" name="Detail" value=<?php echo $student['Detail']; ?> >
            <br>
            <br>
            <button type="submit" name="update" value=<?php echo $student["id"]; ?>>Submit</button>
        </form>
            </div>

        </div>