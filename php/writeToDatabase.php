<?php 
include '../db/Db.php';

class WriteDatabase extends Db{
    private $count = 0;
    private $response = array();

    function writeToDatabase($file){
        if (($openfile = fopen($file, "r")) !== FALSE) {
            while ($getdata = fgetcsv($openfile, 1000, ",")) {
                if ($this->count === 0) { $this->count++; continue; };
                $csvdata = implode(";", $getdata);
                $fncsvdata = explode(";", $csvdata);
                $data = [
                    'name' => $fncsvdata[0],
                    'surname' => $fncsvdata[1],
                    'email' => $fncsvdata[2],
                    'employee_id' => $fncsvdata[3],
                    'phone' => $fncsvdata[4],
                    'point' => $fncsvdata[5],
                ];
                //email kontrol noktası
                if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    array_push($this->response, [
                        "data" => $data,
                        "message" => "Bu kaydın email adresinde hata var. Kaydı düzeltip tekrar yükleyin",
                        "status" => "warning"
                    ]);
                }
                //telefon numarası formatlama
                $data['phone'] = preg_replace('/[^0-9]/','',$data['phone']);
                //telefon numarası kontrol noktası
                if (strlen($data['phone']) > 12) {
                    array_push($this->response, [
                        "data" => $data,
                        "message" => "Bu kaydın telefon numarasında hata var. Kaydı düzeltip tekrar yükleyin",
                        "status" => "warning"
                    ]);
                }
                if (strlen($data['phone']) < 10) {
                    array_push($this->response, [
                        "data" => $data,
                        "message" => "Bu kaydın telefon numarasında hata var. Kaydı düzeltip tekrar yükleyin",
                        "status" => "warning"
                    ]);
                }
                if (strlen($data['phone']) == 12) {
                    $data['phone'] = substr($data['phone'], 2);
                }
                if (strlen($data['phone']) == 11) {
                    $data['phone'] = substr($data['phone'], 1);
                }
                $checkUser = parent::getData($data['email'],$data['employee_id'],$data['phone']);
                if (!empty($checkUser)) {
                    array_push($this->response, [
                        "data" => $data,
                        "message" => "Bu kayıt veri tabanında tekrar ediyor. Kaydı düzeltip tekrar yükleyin",
                        "status" => "warning"
                    ]);
                }else{
                    $result = parent::insertData($data);
                    if (!$result) {
                        array_push($this->response, [
                            "data" => $data,
                            "message" => "Bu kayıt veritabanına eklenirken hata oluştu. Lütfen tekrar deneyin",
                            "status" => "warning"
                        ]);
                    }else{
                        array_push($this->response, [
                            "data" => $data,
                            "message" => "Kayıt başarıyla eklendi",
                            "status" => "success"
                        ]);
                    }
                }
            }
        }
        return $this->response;
    }
}

?>