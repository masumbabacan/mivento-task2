<?php
include '../utils/fileUpload.php';
include 'writeToDatabase.php';

$fileUpload = new FileUpload();
$fileUpload = $fileUpload->upload();
$writeToDatabase = new WriteDatabase();
if ($fileUpload != 0) {
    $response = $writeToDatabase->writeToDatabase($fileUpload);
    echo json_encode($response);
}else{
    $response = array();
    $response["type"] = "error";
    $response["message"] = "Gönderdiğiniz dosya '.csv' formatında olmalıdır!";
    echo json_encode($response);
};
?>  