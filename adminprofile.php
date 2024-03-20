<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";

$data = mysqli_connect($host, $user, $password, $db);

$userData = getUserData($_SESSION['user_id']);
$_SESSION['name'] = $userData['name'];
$_SESSION['password'] = $userData['password'];

?>

<?php
function getUserData($user_id) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "web_resep";

    $data = mysqli_connect($host, $user, $password, $db);

    $stmt = $data->prepare("SELECT name, password FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    return $userData;
}
?>

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
    <h1>Profile</h1>

    <form action="fungsi/editprofile.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

    <div>
        <label class="label_deg">Nama Baru</label>
        <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['name']; ?>">
    </div>

    <div>
    <label class="label_deg">Password Baru</label>
    <input class="form-control" type="password" name="password" id="password" value="<?php echo $_SESSION['password']; ?>">
    <input type="checkbox" id="showPassword"> Lihat Password
    </div>

    <script>
    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('password');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
    </script>

    <div>
        <input class="button_1" type="submit" name="Edit" value="Edit">
    </div>

    <div>
        <input class="button_1" formaction="userpage.php" type="submit" name="submit" value="Back">
    </div>
</form>

</body>

</html>