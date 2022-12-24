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

$perintah = "SELECT No, Namatempat FROM rekomendasi_trip";

$hasil = $koneksi->query($perintah);
echo "<br>";
echo "<table>";
if($hasil->num_rows > 0) {
    while ($baris = $hasil->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $baris["No"];
            echo "</td>";
            echo "<td>";
            echo $baris["Namatempat"];
            echo "</td>";
            echo "<td>";
            echo "<a href='view.php?no=" . $baris["No"] . "'>Lihat</a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='edit.php?no=" . $baris["No"] . "'>Ubah</a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='delete.php?no=" . $baris["No"] . "'>Hapus</a>";
            echo "</td>";
        }

} else {
    echo "Tidak menemukan data!";
}
echo "</table>"
?>