<?php
require_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //post
    // $id = $_POST['id_artikel'];
    //init file
    $server_ip = gethostbyname(gethostname());
    $target_dir = "uploads/";

    $target_file_name = $target_dir . basename($_FILES["file"]["name"]);
    $upload_url = 'http://' . $server_ip . $target_dir . $target_file_name;
    //reponse
    $response = array();
    //query
    $query = "INSERT INTO artikel(gambar) VALUES ('$upload_url')";

    $response_sql = mysqli_query($conn, $query);

    if (isset($_FILES["file"])) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) {
                try{
                if ($response_sql) {
                    $success = true;
                    $message = "Successfully Uploaded";
                } else {
                    $success = false;
                    $message = "error bos";
                }
                }catch(Exception $e){
                    $success = false;
                    $message = "error";
                $response["message"] = $e->getMessage();
                }
            } else {
                $success = false;
                $message = "Error while uploading";
            }
    } else {
        $success = false;
        $message = "Required Field Missing";
    }
}
$response["success"] = $success;
$response["message"] = $message;
echo json_encode($response);

?>