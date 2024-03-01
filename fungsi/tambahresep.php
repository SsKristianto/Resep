<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";

$data = mysqli_connect($host, $user, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_resep = $_POST['nama_resep'];
    $deskripsi_resep = $_POST['deskripsi_resep'];
    $bahan = $_POST['bahan'];
    
    $gambar = $_FILES['gambar'];
    $gambar_name = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_destination = 'gambar/'.$gambar_name;
    
    move_uploaded_file($gambar_tmp, $gambar_destination);

    $sql = "INSERT INTO resep (nama_resep, deskripsi_resep, bahan, gambar) 
    VALUES 
    ('$nama_resep', '$deskripsi_resep' ,'$bahan', '$gambar_destination')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        header('location:../adminpage.php');
    }
}
?>
