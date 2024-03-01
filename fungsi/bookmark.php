<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";

$data = mysqli_connect($host, $user, $password, $db);


if(isset($_POST['tambahBookmark'])) {
    
    $user_id = $_SESSION['user_id'];
    $resep_id = $_POST['resep_id'];
    
    tambahBookmark($data, $user_id, $resep_id);
    header("Location: ../userpage.php");
    exit();
}

function tambahBookmark($data, $user_id, $resep_id) {
    $add_sql = "INSERT INTO bookmarks (user_id, resep_id) VALUES ('$user_id', '$resep_id')";
    echo "Query: " . $add_sql . "<br>";
    echo "user_id: " . $_SESSION['user_id'] . "<br>";
    echo "resep_id: " . $_POST['resep_id'] . "<br>"; 

    if(mysqli_query($data, $add_sql)) {
        echo "Berhasil Ditambahkan";
    } else {
        echo "Error: " . mysqli_error($data);
    }
    
}

function lihatBookmark($data, $user_id) {
    $bookmark_sql = "SELECT resep.* FROM bookmarks
                    JOIN resep ON bookmarks.resep_id = resep.resep_id
                    WHERE bookmarks.user_id = '$user_id'";
    $bookmark_result = mysqli_query($data, $bookmark_sql);
    return $bookmark_result;
}
?>
