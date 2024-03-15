<?php
// Koneksi database
$host = "localhost";
$user = "root";
$password = "";
$db = "web_resep";
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Mendapatkan kata kunci dari permintaan AJAX
$keyword = $_GET['keyword'];

// Query untuk mencari resep berdasarkan kata kunci
$stmt = $data->prepare("SELECT * FROM resep WHERE nama_resep LIKE ?");
$keyword = '%' . $keyword . '%';
$stmt->bind_param("s", $keyword);
$stmt->execute();

$result = $stmt->get_result();

// Mengembalikan hasil dalam format JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>