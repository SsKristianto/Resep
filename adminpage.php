<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}elseif($_SESSION['role']=='user')
{
    header("location:login.php");
}

?>
<?php
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

    <link rel="stylesheet" href="adminpage.css">
</head>
<body>
    
    <header class="header-admin">
        <h1>Admin Page</h1>
        <div class="topnav">
            <a href="adminpage.php">Home</a>
            <a href="adminprofile.php">Profile</a>
            <a href="admintambah.php">Tambah Resep</a>
            <a href="adminedit.php">Edit Resep</a>
            <a href="../Resep/fungsi/logout.php">Logout</a>
            <input type="text" placeholder="Search..">
        </div>
    </header>
    
    <div class="konten-admin">
        <p>Resep yang sering dilihat</p>
        <div class="grid-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="grid-item">';
                echo '<img src="' . $row['gambar'] . '" alt="Image">';
                echo '<h3>' . $row['nama_resep'] . '</h3>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <footer class="footer-admin">
        <p>INI FOOTER</p>
    </footer>

</body>
</html>
