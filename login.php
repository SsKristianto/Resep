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
            <center class="title_deg">Login</center>

            
            <form action="fungsi/login_check.php" method="POST" class="login_form">
                <?php

                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];

                ?>
                <div>
                    <label class="label_deg">Username</label>
                    <input class="input" type="text" name="username">
                </div>
                
                <div>
                    <label class="label_deg">Password</label>
                    <input class="input" type="Password" name="password">
                </div>

                <div>
                    <input class="button_1" type="submit" name="submit" value="Login">
                </div>
                
                <div>
                    <input class="button_1" type="submit" formaction="register.php" name="submit" value="Register">
                </div></br>
            </form>
        </div>
    </center>
</body>
</html>
