<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'connect.php';


    $tanggal = date('d-m-Y H:i:s');
    //post
    // $id = $_POST['id_artikel'];
    //init file
    $server_ip = gethostbyname(gethostname());
    $target_dir = "uploads/";

    $target_file_name = $target_dir . basename($_FILES["file"]["name"]);
    $upload_url = 'http://192.168.1.113/society_php/' . $target_file_name;
    //reponse
    $response = array();

    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $author = $_POST['author'];
    $iid = $_POST['user_id'];

        $query = "INSERT INTO artikel (id_user, judul, deskripsi, author, gambar) VALUES ('$iid','$judul','$deskripsi','$author','$upload_url')";
        if (mysqli_query($conn, $query) && isset($_FILES["file"])) {

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) {
                $message = "sukses";
                $success = true;
            } else {
                $message = "gagal";
                $success = false;
            }
            mysqli_close($conn);
        } else {

            $message = "gagal";
            $success = false;
            mysqli_close($conn);
        }
    
}
$response["success"] = $success;
$response["message"] = $message;

echo json_encode($response);
?>