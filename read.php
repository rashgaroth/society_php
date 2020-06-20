<?php 

header("Content-type:application/json");

require_once('connect.php');

$query = "SELECT * FROM `artikel`";

$sql = mysqli_query($conn, $query);
$response = array();

while($row = mysqli_fetch_assoc($sql)){
    array_push($response,
    array(
        'id' =>$row['id'],
        'judul' =>$row['judul'],
        'deskripsi' =>$row['deskripsi'],
        'gambar' =>$row['gambar'],
        'suka' =>$row['suka'],
        'author' =>$row['author']
    ));
}

json_encode($response);
echo json_encode($response);

?>