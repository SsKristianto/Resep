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
    
    <div class="profile-admin">
    <p>PROFILE</p>

    <div class="grid-container">
        <div class="grid-item">
            <img src="image1.jpg" alt="Image 1">
            <h3>Gambar Lama</h3>
        </div>
    </div>

    <h2>Gambar Baru</h2>
    <form action="fotoresep.php" method="post" enctype="multipart/form-data">
    <label for="image">Pilih Gambar Baru:</label>
    <input type="file" name="image" id="image">
    
    <div>
            <label class="label_deg">Nama</label>
            <input class="input" type="nama" name="nama">
    </div>

    <div>
            <label class="label_deg">Alamat</label>
            <input class="input" type="alamat" name="alamat">
    </div>

    <div>
        <input class="btn-primary" type="submit" name="Edit" value="Edit">
    </div>

    <div>
        <input class="btn-primary" formaction="adminpage.php" type="submit" name="submit" value="Back">
    </div>

    </div>



</body>

</html>