<?php
    include_once('./lib/phpqrcode/qrlib.php');

    class ApiController {

        public function FGetInFoApiVfarm($ID, $MADINHDANH, $LOAISANPHAM){
            $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
            $curl_post_data =  array(
                "maDinhDanh"        => "WTKMSL", // $MADINHDANH
                "loaiSanPham"       => "1" //$LOAISANPHAM
            );
            $curl = curl_init();
            curl_setopt_array($curl, 
                array(
                    CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/get-info',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                    CURLOPT_HTTPHEADER => array(
                        $arr_header,
                        'Content-Type: application/json'
                    ),
                )
            );
            $response = curl_exec($curl);
            return $response;
        }

        public function FGetInFoApiVfarmID($IDVUNGTRONG){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_madinhdanh(:IDVUNGTRONG);");
            $stmt -> bindParam(':IDVUNGTRONG', $IDVUNGTRONG, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
                $curl_post_data =  array(
                    "maDinhDanh"        => $row["MAVUNGTRONG"], // $MADINHDANH $row["MAVUNGTRONG"]
                    "loaiSanPham"       => $row["LOAISANPHAM"] //$LOAISANPHAM
                );
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/get-info',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                return $response;
            } else {
                return array('status' => false, "message" => "Chưa có thông tin mã định danh");
            }
        }

        public function FUpdateInFoApiVfarmID($SDT, $MAXACNHAN, $madinhdanh){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:SDT, :madinhdanh);");
            $stmt -> bindParam(':SDT', $SDT, PDO::PARAM_STR);
            $stmt -> bindParam(':madinhdanh', $madinhdanh, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
                $curl_post_data =  array(
                    "maDinhDanh"        => $row["MAVUNGTRONG"], // $MADINHDANH $row["MAVUNGTRONG"]
                    "loaiSanPham"       => $row["LOAISANPHAM"] //$LOAISANPHAM
                );
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/get-info',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                return $response;
            } else {
                return json_encode(array('status' => false, "message" => "Chưa có thông tin mã định danh"));
            }
        }

        function base64url_encode($data) {
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        }

        function generate_jwt($headers_encoded, $payload_encoded, $signature_encoded) {
            $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
            $_SESSION["SECRET_KEY"] = $jwt;
            return $jwt;
        }        
    }
?>