<?php
include 'C:/xampp/htdocs/Resep/fungsi/bookmark.php'; //ubah sesuai letak foldernya

if(!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

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
					<li><a href="userpage.php">Home</a></li>
					<li><a href="userprofile.php">Profile</a></li>
					<li><a href="userbookmark.php">Bookmark</a></li>
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
    
    <div class="konten-user">
        <p>Resep yang sering dilihat</p>
        <div class="grid-container">
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="grid-item">';
                echo '<div class="products_2">';
                echo '<a href="detailresep.php?id=' . $row['resep_id'] . '"><img src="' . $row['gambar'] . '" alt="Image"></a>';
                echo '<h3><a href="detailresep.php?id=' . $row['resep_id'] . '">' . $row['nama_resep'] . '</a></h3>';
                echo '<form method="post" action="fungsi/bookmark.php">';
                echo '<input type="hidden" name="resep_id" value="' . $row['resep_id'] . '">';
                echo '<input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">';
                echo '<input class="button_1" type="submit" name="tambahBookmark" value="Tambah Bookmark">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <footer class="footer-user">
        <p>INI FOOTER</p>
    </footer>

</body>
</html>
