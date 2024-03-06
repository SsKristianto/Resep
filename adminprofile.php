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
        <input class="input" type="text" name="name" value="<?php echo $_SESSION['name']; ?>">
    </div>

    <div>
    <label class="label_deg">Password Baru</label>
    <input class="input" type="password" name="password" id="password" value="<?php echo $_SESSION['password']; ?>">
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
        <input class="btn-primary" type="submit" name="Edit" value="Edit">
    </div>

    <div>
        <input class="btn-primary" formaction="adminpage.php" type="submit" name="submit" value="Back">
    </div>
</form>

</body>

</html>