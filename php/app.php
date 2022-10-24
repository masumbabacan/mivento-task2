<?php
include '../db/DB.php';
include '../utils/uuid.php';

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allowedTypes = ['csv'];

if (isset($_POST)) {
    $Uuid = new Uuid;
    //dosyanın ismini benzersiz olması için değiştiriyorum
    $changeFileName = explode('.',explode('/',$target_file)[2])[0].'-'.$Uuid->generateRandomString().'.'.explode('.',explode('/',$target_file)[2])[1];
    $target_file = '../uploads/'.''.$changeFileName;
    if (!in_array($fileType, $allowedTypes)) {
        $response["type"] = "error";
        $response["message"] = "Gönderdiğiniz dosya '.csv' formatında olmalıdır!";
        echo json_encode($response);
    }elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        writeToDatabase($target_file);
    }
}

//Bu fonksiyon dosyanın adını alacak ve bulursa eğer dosyayı veritabanına yazmaya çalışacak.
function writeToDatabase($file){
    $db = new DB;
    $row = 1;
    $count = 0;
    if (($openfile = fopen($file, "r")) !== FALSE) {
        while ($getdata = fgetcsv($openfile, 1000, ",")) {
            if ($count === 0) { $count++; continue; };
            $total = count($getdata);
            $row++;
            for ($c=0; $c < $total; $c++) {
                $csvdata = implode(";", $getdata);
                $fncsvdata = explode(";", $csvdata);
                $checkUser = checkUsers($fncsvdata[2],$fncsvdata[3],$fncsvdata[4]);
                if ($checkUser === 1) {
                    echo 'bu kayıttan zaten var';
                }else{
                    $data = [
                        'name' => $fncsvdata[0],
                        'surname' => $fncsvdata[1],
                        'email' => $fncsvdata[2],
                        'employee_id' => $fncsvdata[3],
                        'phone' => $fncsvdata[4],
                        'point' => $fncsvdata[5],
                    ];
                    $sql = "INSERT INTO users (name, surname, email,employee_id,phone,point) 
                    VALUES (:name, :surname, :email, :employee_id, :phone, :point)";
                    $user= $db->prepare($sql);
                    $result = $user->execute($data);
                };
            }
        }
    }                
}

function checkUsers($email, $employee_id, $phone){
    $db = new DB;
    $sth = $db->prepare("SELECT * FROM users where email='$email' OR employee_id='$employee_id' OR phone='$phone'");
    $sth->execute();
    $array = $sth->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($array)) return 1;
    return 0;

}
?>  