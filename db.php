<?php

$servername ="sql301.byethost3.com";
$database = "b3_33176357_rekomendasitrip_db";
$username = "b3_33176357";
$password = "perikecil";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$sql= " CREATE TABLE koreantrip (
    //id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //Nama_Tempat VARCHAR(300) NOT NULL,
    //Alamat VARCHAR(300) NOT NULL,
    //Gambar VARCHAR (255)NOT NULL,
    //Rating INT(64) NOT NULL,
    //Tahun_Dibangun INT(7) NOT NULL,
    //Penjelasan VARCHAR(1000)NOT NULL,
    //reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//)";
//if ($conn->query($sql) === TRUE){
    //echo "Table koreantrip created succsuccessfully";
//} else {
    //echo "Error creating table: " .$conn->error;
//}

// $conn->close();
// $sql = "INSERT INTO koreantrip (Nama_Tempat, Alamat, Gambar, Rating, Tahun_Dibangun, Penjelasan )
// VALUES ('test', 'testalamat','./img/1.jpeg', 5 , 1980, 'test')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>