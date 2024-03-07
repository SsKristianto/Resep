<?php
$host="localhost";
$user="root";
$password="";
$db="web_resep";

$data=mysqli_connect($host, $user, $password, $db);

if(isset($_POST['register']))
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $role='user';
    $password=$_POST['password'];

    $sql="INSERT INTO user (name,username,role,password) VALUES
    ('$name','$username','$role','$password')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        header('location:login.php');
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="loginregis.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
	<link href="css/recipes.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Grandstander:ital,wght@1,900&display=swap" rel="stylesheet">
   <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<body class = "web">
    <center>
        <div class="form_deg">
        <center class="title_deg">Register</center>
            <form action="register.php" method="POST" class="login_form">

                <div>
                    <label class="label_Deg">Nama</label>
                    <input class="input" type="text" name="name">

                </div>

                <div>
                    <label class="label_deg">Username</label>
                    <input class="input" type="text" name="username">
                </div>
                
                <div>
                    <label class="label_deg">Password</label>
                    <input class="input" type="Password" name="password">
                </div>
                
                <div>
                    <input class="button_1" type="submit" name="register" value="Register">
                </div>

                <div>
                    <input class="button_1" formaction="login.php" type="submit" name="submit" value="Back">
                </div></br>
            </form>
        </div>
    </center>
</body>
</html>
