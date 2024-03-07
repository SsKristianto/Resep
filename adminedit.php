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
		  <ul class="navbar_1">
          <input type="text" class="navbar-header" placeholder="Search..">
		  </ul>
			    </div><!-- /.navbar-collapse -->
     <!-- /.container-fluid -->
	</nav>
</section>
 <h2>a</h2>

    <div class="konten-profile">
        <h1>Edit Resep</h1>

    <form action="fungsi/editresep.php" method="post" enctype="multipart/form-data">
        <label for="select_resep">Pilih Resep</label>
	    <div class="controls clearfix">
        <select class="span3" name="resep_id">
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
        </div>
        </br>

        <div>
            <label class="label_deg">Nama Resep</label>
            <input class="form-control" type="text" name="nama_resep" value="<?php echo $nama_resep; ?>"><br>
        </div>

        <div>
            <label class="label_deg">Deskripsi Resep</label>
            <textarea class="form-control" name="deskripsi_resep"><?php echo $deskripsi_resep; ?></textarea><br>
        </div>

        <div>
            <label class="label_deg">Bahan-Bahan</label>
            <textarea class="form-control" name="bahan"><?php echo $bahan; ?></textarea><br>
        </div>

        <label for="image">Pilih Gambar Baru</label>
        <input type="file" name="gambar_baru"><br>
        <div>
            <input class="button_1" type="submit" name="Edit" value="Simpan">
        </div>
        <div>
            <input class="button_1" formaction="adminpage.php" type="submit" name="submit" value="Back">
        </div>
    </form>

    </div>
</body>
</html>
