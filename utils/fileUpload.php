<?php 
include 'uuid.php';

class FileUpload{
    public function upload(){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedTypes = ['csv'];
        $Uuid = new Uuid;
        if (isset($_POST)) {
            $changeFileName = explode('.',explode('/',$target_file)[2])[0].'-'.$Uuid->generateRandomString().'.'.explode('.',explode('/',$target_file)[2])[1];
            $target_file = '../uploads/'.''.$changeFileName;
            if (!in_array($fileType, $allowedTypes)) {
                return 0;
            }elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                return $target_file;
            }
        }
    }
}

?>