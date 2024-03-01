<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";

$data = mysqli_connect($host, $user, $password, $db);

$resep_id = "";
$gambar = "";
$nama_resep = "";
$deskripsi_resep = "";
$bahan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_resep'])) {
    $resep_id = $_POST['select_resep'];

    $sql = "SELECT * FROM resep WHERE resep_id = $resep_id";
    $result = mysqli_query($data, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar'];
        $nama_resep = $row['nama_resep'];
        $deskripsi_resep = $row['deskripsi_resep'];
        $bahan = $row['bahan'];
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
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

    <div class="tambah-admin">
        <h1>EDIT</h1>

    <form action="../Resep/fungsi/editresep.php" method="post" enctype="multipart/form-data">
        <label for="select_resep">Pilih Resep:</label>
        <select name="resep_id">
            <?php
            $sql_select = "SELECT resep_id, nama_resep FROM resep";
            $result_select = mysqli_query($data, $sql_select);
            if (!$result_select) {
                echo "Error executing query: " . mysqli_error($data);
            } else {
                while ($row_select = mysqli_fetch_assoc($result_select)) {
                    echo '<option value="' . $row_select['resep_id'] . '">' . $row_select['nama_resep'] . '</option>';
                }
            }
            ?>
        </select>

        <div>
            <label class="label_deg">Nama Resep : </label>
            <input type="text" name="nama_resep" value="<?php echo $nama_resep; ?>"><br><br>
        </div>

        <div>
            <label class="label_deg">Deskripsi Resep : </label>
            <textarea name="deskripsi_resep"><?php echo $deskripsi_resep; ?></textarea><br><br>
        </div>

        <div>
            <label class="label_deg">Bahan-Bahan :</label>
            <textarea name="bahan"><?php echo $bahan; ?></textarea><br><br>
        </div>

        <label>Gambar Lama:</label>
        <div class="grid-container">
            <div class="grid-item">
                <img src="<?php echo $gambar; ?>" alt="Gambar Lama">
            </div>
        </div>

        <label for="image">Pilih Gambar Baru:</label>
        <input type="file" name="gambar_baru"><br><br>
        <div>
            <input class="btn-primary" type="submit" name="Edit" value="Simpan">
        </div>
        <div>
            <input class="btn-primary" formaction="adminpage.php" type="submit" name="submit" value="Back">
        </div>
    </form>

    </div>
</body>
</html>
