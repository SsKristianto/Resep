<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="userpage.css">

</head>

<body>
    
    <header class="header-user">
    <h1>Profile</h1>

        <div class="topnav">
        <a href="userpage.php">Home</a>
        <a href="userprofile.php">Profile</a>
        <a href="userbookmark.php">Bookmark</a>
        <a href="fungsi/logout.php">Logout</a>
        <input type="text" placeholder="Search..">
        </div>

    </header>
    
    <div class="konten-profile">
    <h1>PROFILE</h1>

    <form action="fungsi/editprofile.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

    <div>
        <label class="label_deg">Nama Baru</label>
        <input class="input" type="text" name="name"><br><br>
    </div>

    <div>
        <label class="label_deg">Password Baru</label>
        <input class="input" type="password" name="password"><br><br>
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