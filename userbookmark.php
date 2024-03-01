<?php
include 'C:/xampp/htdocs/Pemweb/Resep/fungsi/bookmark.php';

if(!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";

$data = mysqli_connect($host, $user, $password, $db);

$user_id = $_SESSION['user_id'];
$bookmark_result = lihatBookmark($data, $user_id);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>

    <link rel="stylesheet" href="userpage.css">
</head>
<body>
    
    <header class="header-user">
        <h1>User Bookmarks</h1>
        <div class="topnav">
            <a href="userpage.php">Home</a>
            <a href="userprofile.php">Profile</a>
            <a href="userbookmark.php">Bookmark</a>
            <a href="../Resep/fungsi/logout.php">Logout</a>
            <input type="text" placeholder="Search..">
        </div>
    </header>
    
    <div class="konten-bookmark">
        <p>Isi bookmark</p>
        <div class="grid-container">
            <?php
            while ($row = mysqli_fetch_assoc($bookmark_result)) {
                echo '<div class="grid-item">';
                echo '<img src="' . $row['gambar'] . '" alt="Image">';
                echo '<h3>' . $row['nama_resep'] . '</h3>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>
</html>
