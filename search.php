<?php
include 'bookmark.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM resep WHERE nama_resep LIKE '%$keyword%'";
    $result = mysqli_query($data, $sql);

    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    echo json_encode($response);
}
?>