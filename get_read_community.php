<?php

header("Content-type:application/json");

require_once('connect.php');

if(isset($_GET['key'])){
    $key = $_GET['key'];
    $query = "SELECT * FROM `komunitas` WHERE nama_komunitas like '%$key%'";

    $sql = mysqli_query($conn, $query);
    $response = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        array_push(
            $response,
            array(
                'id_komunitas' => $row['id_komunitas'],
                'nama_komunitas' => $row['nama_komunitas'],
                'alamat' => $row['alamat'],
                'hobi_id' => $row['hobi_id']
            )
        );
    }
}else{
    $query = "SELECT * FROM `komunitas`";

    $sql = mysqli_query($conn, $query);
    $response = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        array_push(
            $response,
            array(
                'id_komunitas' => $row['id_komunitas'],
                'nama_komunitas' => $row['nama_komunitas'],
                'alamat' => $row['alamat'],
                'hobi_id' => $row['hobi_id'],
            )
        );
    }
}


json_encode($response);
echo json_encode($response);
