<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>

<link rel="stylesheet" href="userpage.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
	<link href="css/recipes.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Grandstander:ital,wght@1,900&display=swap" rel="stylesheet">
   <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

<section id="header" class="clearfix">
 <nav class="navbar navbar-default navbar-fixed-top">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
    	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.html"><span class="text_1">Nutrient</span></a>
	</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-left">
					<li><a href="adminpage.php">Home</a></li>
					<li><a href="adminprofile.php">Profile</a></li>
					<li><a href="admintambah.php">Tambah Resep</a></li>
					<li><a href="adminedit.php">Edit Resep</a></li>
					<li><a href="fungsi/logout.php">Logout</a></li>
			</li>
		  </ul>
			    </div><!-- /.navbar-collapse -->
     <!-- /.container-fluid -->
	</nav>
</section>
 <h2>a</h2>

<div class="konten-profile">
<h1>Tambah Resep</h1>

    <form action="fungsi/tambahresep.php" method="POST" enctype="multipart/form-data">
        <label class="label_deg">Nama Resep</label>
        <input class="form-control" type="text" name="nama-resep"><br>

        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi_resep"></textarea><br>
        
        <label>Bahan</label>
        <textarea class="form-control" name="bahan"></textarea><br>
        
        <label>Upload Gambar</label>
        <input type="file" name="gambar"><br>
        
        <input class="button_1" type="submit" name="submit" value="Tambah Resep">

        <div>
        <input class="button_1" class="btn-primary" formaction="adminpage.php" type="submit" name="submit" value="Back">
        </div>

    </form>

</body>

</html>