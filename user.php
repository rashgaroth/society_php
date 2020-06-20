<?php 
$email = $_GET['email'];
require_once('connect.php');

$query = "SELECT * FROM user WHERE email='$email'";
$sql = mysqli_query($conn, $query);

$response = array();

while ($row = mysqli_fetch_array($sql)){
    array_push($response, array(
        "email" => $row['email'],
        "nama_depan" => $row['nama_depan'],
        "nama_belakang" => $row['nama_belakang'],
        "id" => $row['id']
    ));
}

echo json_encode($response);
mysqli_close($conn);

?>