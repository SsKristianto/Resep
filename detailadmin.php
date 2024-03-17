<?php
session_start();

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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
	<link href="css/recipes-details.css" rel="stylesheet">
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
		  <ul class="navbar_1">
          <input type="text" class="navbar-header" placeholder="Search..">
		  </ul>
			    </div><!-- /.navbar-collapse -->
     <!-- /.container-fluid -->
	</nav>
</section>

<section id="shop">
 <div class="container">
  <div class="row">
   <div class="shop_1">
    <h1>DETAIL RESEP</h1>
	<div class=" content-top2">
	 <h4 class="text-center"><i class="fa fa-star"></i></h4>
    </div>
   </div>
  </div>
 </div>
</section>

<section id="products_main" class="clearfix">
    <div class="col-sm-6">
    <div class="products_main_1">
            <h2><?php echo $resep['nama_resep']; ?></h2>
            
            <p><?php echo $resep['deskripsi_resep']; ?></p>
            <h3>Bahan:</h3>
            <ul>
                <?php
                $bahan = explode(',', $resep['bahan']);
                foreach ($bahan as $item) {
                    echo '<li>' . trim($item) . '</li>';
                }
                ?>  
            </ul>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="products_main_2">
        <center>
        <a href="#"><img src="<?php echo $resep['gambar']; ?>" alt="Image"></a>
        </center>
    </div>
    </div>
</section>

</body>
</html>