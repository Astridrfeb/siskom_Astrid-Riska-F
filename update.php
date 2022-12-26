<?php 
    // connect data ke database
    include("db_connect.php");

    // mengambil id dari URL dan mengambil data dari id tersebut
    if(isset($_GET['id'])){
        $id = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT id, name, npm, jenis_kelamin, image FROM mahasiswa WHERE id=".$id;
        $result = $conn->query($sql);
        $student = $result->fetch_assoc();
        $result->free_result();
        $conn->close();
    }
    
    // mengambil data dari form yang memiliki button submit bernama update
    if(isset($_POST['update'])){
        // membuat variabel dari setiap data yang ada di form
        $id_to_update = $conn->real_escape_string($_POST['update']);
        $name = $conn->real_escape_string($_POST['name']);
        $npm = $conn->real_escape_string($_POST['npm']);
        $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);

        // membuat link dari gambar yang kita upload
        $filename = $_FILES['image']["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $new_name = date('YmdHis');
        $tempname = $_FILES['image']['tmp_name'];
        $folder = "./images/".$new_name.".".$extension;
        
        // mengupload gambar. jika ada gambar maka akan mengupdate data gambar, jika tidak maka kita tidak akan mengupdate data gambar
        if(move_uploaded_file($tempname, $folder)){
            $sql = "UPDATE mahasiswa SET name='$name', npm=$npm, jenis_kelamin='$jenis_kelamin', image='$folder' WHERE id=$id_to_update";
        } else {
            $sql = "UPDATE mahasiswa SET name='$name', npm=$npm, jenis_kelamin='$jenis_kelamin' WHERE id=$id_to_update";
        }
        $result = $conn->query($sql);

        // menjalankan query
        if($result) {
            // jika query berhasil maka akan diarahkan ke page index.php
            header('Location: index.php');
        } else {
            echo "error";
        }
    }
    
    // ini function untuk menceklis opsi jenis kelamin di radio button. jika kita menambahkan attribute "checked" maka opsi tersebut sudah tercentang.
    function cek_jenis_kelamin($data, $jenis_kelamin){
        if($jenis_kelamin == $data) {
            return "checked";
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
        <h1>Update</h1>
         <form method="POST" action="update.html" enctype="multipart/form-data">
            <label>Nama tempat</label>
            <br>
            <!-- menambahkan attribute value yang nilainya dari database. jadi nanti di input formnya langsung terisi nilai -->
            <input type="text" name="Nama tempat" value=<?php echo $student['Nama tempat']; ?> >
            <br>
            <label>Rating<label>
            <br>
            <input type="text" name="Rating" value=<?php echo $student['Rating']; ?> >
            <br>
            <label>Tahundibagun</label>
            <br>
            <input type="text" name="Tahundibagun" value=<?php echo $student['Tahun dibagun']; ?> >
            <br>
            <label>Alamat</label>
            <br>
            <input type="text" name="Alamat" value=<?php echo $student['Alamat']; ?> >
            <br>
            <label>Penjelasan</label>
            <br>
            <input type="text" name="Penjelasan" value=<?php echo $student['Penjelasan']; ?> >
            
            <br>
            <br>
            <br>
            <button type="submit" name="update" value=<?php echo $student["id"]; ?>>Submit</button>
        </form>
            </div>

        </div>