<?php
session_start();

// Aktifkan error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Fungsi untuk memperbarui data user
function updateUserData($user_id, $nama, $password) {
    $host = "localhost";
    $user = "root";
    $dbPassword = ""; // Mengubah nama variabel untuk menghindari konflik
    $dbname = "web_resep";

    // Menggunakan PDO untuk koneksi database
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Aktifkan mode error untuk PDO

    $stmt = $db->prepare("UPDATE user SET name = :nama, password = :password WHERE user_id = :user_id");
    $stmt->execute(['nama' => $nama, 'password' => $password, 'user_id' => $user_id]);
}

// Jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $nama = $_POST['name'];
    $password = $_POST['password'];

    // Cek apakah user_id ada di session
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user_id) {
        // Update data user
        try {
            updateUserData($user_id, $nama, $password);
            // Redirect ke halaman login setelah perubahan
            header("Location: ../login.php");
            exit;
        } catch (PDOException $e) {
            // Jika terjadi error, tampilkan pesan error
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Jika user_id tidak sesuai, redirect ke halaman login atau halaman lain
        header("Location: ../login.php");
        exit;
    }
}
?>