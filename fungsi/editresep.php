<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";

$data = mysqli_connect($host, $user, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['resep_id']) && isset($_POST['nama_resep']) && isset($_POST['deskripsi_resep']) && isset($_POST['bahan'])) {
        $resep_id = $_POST['resep_id'];
        $nama_resep = $_POST['nama_resep'];
        $deskripsi_resep = $_POST['deskripsi_resep'];
        $bahan = $_POST['bahan'];

        if ($_FILES['gambar_baru']['name']) {
            $gambar_baru = $_FILES['gambar_baru'];
            $gambar_baru_name = $_FILES['gambar_baru']['name'];
            $gambar_baru_tmp = $_FILES['gambar_baru']['tmp_name'];
            $gambar_baru_destination = '../gambar/'.$gambar_baru_name;

            move_uploaded_file($gambar_baru_tmp, $gambar_baru_destination);

            $sql = "UPDATE resep SET nama_resep='$nama_resep', deskripsi_resep='$deskripsi_resep', bahan='$bahan', gambar='$gambar_baru_destination' WHERE resep_id='$resep_id'";
        } else {
            $sql = "UPDATE resep SET nama_resep='$nama_resep', deskripsi_resep='$deskripsi_resep', bahan='$bahan' WHERE resep_id='$resep_id'";
        }

        $result = mysqli_query($data, $sql);

        if ($result) {
            header('location:../adminpage.php');
        } else {
            echo "Error Update Resep: " . mysqli_error($data);
        }
    } else {
        echo "Belum Ada Isi";
    }
}
?>
