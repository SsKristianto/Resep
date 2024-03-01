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

<div class="tambah-admin">
<h1>Tambah Resep</h1>

    <form action="../Resep/fungsi/tambahresep.php" method="POST" enctype="multipart/form-data">
        <label>Nama Resep :</label>
        <input type="text" name="nama_resep"><br><br>

        <label>deskripsi :</label>
        <textarea name="deskripsi_resep"></textarea><br><br>
        
        <label>Bahan :</label>
        <textarea name="bahan"></textarea><br><br>
        
        <label>Upload Gambar :</label>
        <input type="file" name="gambar"><br><br>
        
        <input type="submit" name="submit" value="Tambah Resep">

        <div>
        <input class="btn-primary" formaction="adminpage.php" type="submit" name="submit" value="Back">
        </div>

    </form>

</body>

</html>