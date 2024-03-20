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

<script>
        function search() {
            var input, filter;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();

            var gridItems = document.getElementsByClassName("grid-item");
            for (var i = 0; i < gridItems.length; i++) {
                var title = gridItems[i].getElementsByTagName("h3")[0].innerText.toUpperCase();
                if (title.indexOf(filter) > -1) {
                    gridItems[i].style.display = "";
                } else {
                    gridItems[i].style.display = "none";
                }
            }
        }
</script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="adminpage.css">
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
		  <ul class="navbar_1">
          <input type="text" class="navbar-header" id="searchInput" onkeyup="search()" placeholder="Search..">
		  </ul>
			    </div><!-- /.navbar-collapse -->
     <!-- /.container-fluid -->
	</nav>
</section>
    
    <div class="konten-admin">
        <p>Resep yang sering dilihat</p>
        <div class="grid-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="grid-item">';
                echo '<div class="products_2">';
                echo '<a href="detailadmin.php?id=' . $row['resep_id'] . '"><img src="' . $row['gambar'] . '" alt="Image"></a>';
                echo '<h3><a href="detailadmin.php?id=' . $row['resep_id'] . '">' . $row['nama_resep'] . '</a></h3>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <footer class="footer">
    <div class="footer-left">
            <div class="logo">
                <img src="gambar/ayamgoreng33.jpeg" alt="Logo 1">
                <img src="gambar/3.jpg" alt="Logo 2">
            </div>
            <div class="logo">
                <img src="gambar/kue nagasari 6.jpg" alt="Logo 3">
                <img src="gambar/Kue_Ape (2).jpg" alt="Logo 4">
            </div>
        </div>
        <div class="footer-center">
            <h4 class="judul">Tentang Kami</h4>
            <p class="penjelasan">Selamat datang di Rasakan Aroma-Kuliner Kreatif, kami berkomitmen untuk memberikan Anda akses ke beragam resep makanan sehat dan lezat yang dapat Anda coba di rumah. Kami percaya bahwa memasak adalah kegiatan yang menyenangkan dan bermanfaat, dan kami ingin memudahkan Anda menemukan inspirasi baru setiap hari.</p>
        </div>
        <div class="footer-right">
            <h4 class="judul">Kontak</h4>
            <p>No. Telepon: 123-456-789</p>
            <p>Email: info@nutrifood.com</p>
        </div>
    </footer>

</body>
</html>
