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
        <a href="fungsi/logout.php">Logout</a>
        <input type="text" placeholder="Search..">
        </div>

    </header>
    
    <div class="profile-admin">
    <h1>PROFILE</h1>

    <form action="fungsi/editprofile.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

    <div>
        <label class="label_deg">Nama Baru</label>
        <input class="input" type="text" name="name" >
    </div>

    <div>
        <label class="label_deg">Password Baru</label>
        <input class="input" type="password" name="password">
    </div>

    <div>
        <input class="btn-primary" type="submit" name="Edit" value="Edit">
    </div>

    <div>
        <input class="btn-primary" formaction="userpage.php" type="submit" name="submit" value="Back">
    </div>
</form>

</body>

</html>