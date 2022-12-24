<?php
$namaserver = "sql301.byethost3.com";
$namauser = "b3_33176357";
$password = "perikecil";
$namadb = "b3_33176357_rekomendasitrip_db";

$koneksi = new mysqli($namaserver, $namauser, $password, $namadb);

if($koneksi->connect_error) {
  die("koneksi ke server gagal!");
} else {
    echo "Koneksi ke server berhasil";
}
#/view.php?no=1
$nomortempat = $_GET["no"];

$perintah = "SELECT * FROM rekomendasi_trip WHERE No=" . $nomortempat;
$hasil = $koneksi ->query($perintah);

if ($hasil->num_rows > 0) {
    while ($baris = $hasil->fetch_assoc()) {
        echo $baris["Namatempat"];
        echo "<br>";
        echo $baris["Alamat"];
        echo "<br>";
        echo $baris["Rating"];
        echo "<br>";
        echo $baris["Tahundibangun"];
        echo "<br>";
        echo "<img src='" . $baris["Gambar"] . "'>";
        echo "<br>";
        echo $baris["Penjelasan"];
        echo "<br>";
    }
} else{
    echo "Tidak ada hasil!";
}
?>