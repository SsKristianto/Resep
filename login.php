<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="loginregis.css">

</head>
<body class = "web">

    <center>
        <div class="form_deg">
            <center class="title_deg">Login</center>

            
            <form action="../Resep/fungsi/login_check.php" method="POST" class="login_form">
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
                    <input class="btn-primary" type="submit" name="submit" value="Login">
                </div>
                
                <div>
                    <input class="btn-primary" type="submit" formaction="register.php" name="submit" value="Register">
                </div>
            </form>
        </div>
    </center>
</body>
</html>
