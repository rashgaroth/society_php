<?php 
$nick = $_GET['nama_depan'];
require_once('connect.php');

$query = "SELECT * FROM user WHERE nama_depan='$nick'";
$sql = mysqli_query($conn, $query);

$response = array();

while ($row = mysqli_fetch_array($sql)){
    array_push($response, array(
        "id" => $row['id'],
        "email" => $row['email'],
        "nama_depan" => $row['nama_depan']
    ));
}

echo json_encode($response);
mysqli_close($conn);
