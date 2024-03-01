<?php
include 'C:/xampp/htdocs/Resep/fungsi/bookmark.php'; //ubah sesuai letak foldernya

if(!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";

$data = mysqli_connect($host, $user, $password, $db);

// Mendapatkan ID resep dari URL
$resep_id = $_GET['id'];

// Mengambil data resep berdasarkan ID
$sql = "SELECT * FROM resep WHERE resep_id = $resep_id";
$result = mysqli_query($data, $sql);
$resep = mysqli_fetch_assoc($result);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Resep</title>

    <link rel="stylesheet" href="userpage.css">
</head>
<body>
    <header class="header-user">
        <h1>Detail Resep</h1>
        <div class="topnav">
            <a href="userpage.php">Home</a>
            <a href="userprofile.php">Profile</a>
            <a href="userbookmark.php">Bookmark</a>
            <a href="fungsi/logout.php">Logout</a>
            <input type="text" placeholder="Search..">
        </div>
    </header>

    <div class="konten-user">
        <h2><?php echo $resep['nama_resep']; ?></h2>
        <img src="<?php echo $resep['gambar']; ?>" alt="Image">
        <p><?php echo $resep['deskripsi_resep']; ?></p>
        <h3>Bahan:</h3>
        <ul>
            <?php
            // Misalkan bahan disimpan dalam format string di database, kita perlu memisahkannya
            $bahan = explode(',', $resep['bahan']);
            foreach ($bahan as $item) {
                echo '<li>' . trim($item) . '</li>';
            }
            ?>
        </ul>
    </div>

    <footer class="footer-user">
        <p>INI FOOTER</p>
    </footer>
</body>
</html>