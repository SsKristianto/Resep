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

$sql = "SELECT * FROM resep";
$result = mysqli_query($data, $sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="userpage.css">

</head>

<body>
    
    <header class="header-user">
        <h1>User Page</h1>
        <div class="topnav">
            <a href="userpage.php">Home</a>
            <a href="userprofile.php">Profile</a>
            <a href="userbookmark.php">Bookmark</a>
            <a href="../Resep/fungsi/logout.php">Logout</a>
            <input type="text" placeholder="Search..">
        </div>
    </header>
    
    <div class="konten-user">
        <p>Resep yang sering dilihat</p>
        <div class="grid-container">
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="grid-item">';
                echo '<img src="' . $row['gambar'] . '" alt="Image">';
                echo '<h3>' . $row['nama_resep'] . '</h3>';
                echo '<form method="post" action="../Resep/fungsi/bookmark.php">';
                echo '<input type="hidden" name="resep_id" value="' . $row['resep_id'] . '">';
                echo '<input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">';
                echo '<input type="submit" name="tambahBookmark" value="Tambah Bookmark">';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <footer class="footer-user">
        <p>INI FOOTER</p>
    </footer>

</body>
</html>
