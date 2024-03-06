<?php
session_start();

error_reporting(0);

$host="localhost";
$user="root";
$password="";
$db="web_resep";

$data=mysqli_connect($host, $user, $password, $db);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql="select * from user where username='".$uname."' AND
    password='".$password."' ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row)
    {
        $_SESSION['username']=$uname;
        $_SESSION['role']=$row["role"];
        $_SESSION['user_id'] = $row['user_id'];

        if($row["role"]=="user")
        {
            header("location:../userpage.php");
        }
        elseif($row["role"]=="admin")
        {
            header("location:../adminpage.php");
        }
    }
    else
    {
        $message= "Username or Password do not match!";
        $_SESSION['loginMessage']=$message;
        header("location:../login.php");
    }
}
?>
