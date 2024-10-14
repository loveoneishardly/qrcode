<?php
    // include_once('./lib/phpqrcode/qrlib.php');
    require_once('./lib/phpqrcode/qrlib.php');

    class CreateQRCode {

        public function CreateQRHanhChinhCong($madonvi,$id){
            $imgname ="qrcodefarm.png";
            $loaiurl = "1";
            $tinh = "";
            $huyen = "";
            $xa = "";
            $idtinh = "";
            $idhuyen = "";
            $idxa = "";
            $malinhvuc = "";
            $duongdan = "";
            $checkupdate = "";

            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_thongtin_qr_code(:madonvi,:id);");
            $stmt -> bindParam(':madonvi', $madonvi, PDO::PARAM_STR);
            $stmt -> bindParam(':id', $id, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0){
                $row = $stmt->fetch();
                $tinh = $row["TEN_TINH"];
                $huyen = $row["TEN_HUYEN"];
                $xa = $row["TEN_XA"];
                $idtinh = $row["ID_TINH"];
                $idhuyen = $row["ID_HUYEN"];
                $idxa = $row["ID_XA"];
                $malinhvuc = $row["MA_LINH_VUC"];
            }

            $pdo_url = ConnectDb::getInstance()->getConnection();
            $stmt_url = $pdo_url->prepare("call p_get_url(:loaiurl);");
            $stmt_url -> bindParam(':loaiurl', $loaiurl, PDO::PARAM_STR);
            $stmt_url -> execute();
            if($stmt_url->rowCount() > 0){
                $row_url = $stmt_url->fetch();
                $duongdan = $row_url["DUONG_DAN"];
            }

            $tinhThanh = urlencode($tinh);
            $quanHuyen = urlencode($huyen);
            $phuongXa = urlencode($xa);

            $url = "$duongdan?tu_khoa=&bo_nganh=&tinh_thanh=$tinhThanh&so=&quan_huyen=$quanHuyen&phuong_xa=$phuongXa&ma_tt=$malinhvuc&id_tinh_thanh=$idtinh&id_quan_huyen=$idhuyen&id_phuong_xa=$idxa&id_so=null&id_bo_nganh=-1";

            $pdo_update = ConnectDb::getInstance()->getConnection();
            $stmt_update = $pdo_update->prepare("call p_update_url_qrcode(:madonvi,:id,:url);");
            $stmt_update -> bindParam(':madonvi', $madonvi, PDO::PARAM_STR);
            $stmt_update -> bindParam(':id', $id, PDO::PARAM_STR);
            $stmt_update -> bindParam(':url', $url, PDO::PARAM_STR);
            $stmt_update -> execute();
            
            $data = isset($_GET['data']) ? $_GET['data'] : $url;
            $logo = isset($_GET['logo']) ? $_GET['logo'] : './lib/images/vnpt.png';
            $sdir = explode("/",$_SERVER['REQUEST_URI']);
            $dir = str_replace($sdir[count($sdir)-1],"",$_SERVER['REQUEST_URI']);
            QRcode::png($data,$imgname,QR_ECLEVEL_L,11.45,0);
            $QR = imagecreatefrompng($imgname);
            if($logo !== FALSE){
                $logopng = imagecreatefrompng($logo);
                $QR_width = imagesx($QR);
                $QR_height = imagesy($QR);
                $logo_width = imagesx($logopng);
                $logo_height = imagesy($logopng);
                
                list($newwidth, $newheight) = getimagesize($logo);
                $out = imagecreatetruecolor($QR_width, $QR_width);
                imagecopyresampled($out, $QR, 0, 0, 0, 0, $QR_width, $QR_height, $QR_width, $QR_height);
                imagecopyresampled($out, $logopng, $QR_width/2.65, $QR_height/2.65, 0, 0, $QR_width/4, $QR_height/4, $newwidth, $newheight);
                
            }
            imagepng($out,$imgname);
            imagedestroy($out);

            // === Change image color
            $im = imagecreatefrompng($imgname);
            $r = 44;$g = 62;$b = 80;
            for($x=0;$x<imagesx($im);++$x){
                for($y=0;$y<imagesy($im);++$y){
                    $index  = imagecolorat($im, $x, $y);
                    $c      = imagecolorsforindex($im, $index);
                    if(($c['red'] < 100) && ($c['green'] < 100) && ($c['blue'] < 100)) { // dark colors
                        // here we use the new color, but the original alpha channel
                        $colorB = imagecolorallocatealpha($im, 0x12, 0x2E, 0x31, $c['alpha']);
                        imagesetpixel($im, $x, $y, $colorB);
                    }
                }
            }
            imagepng($im,$imgname);
            imagedestroy($im);
            // === Convert Image to base64
            $type = pathinfo($imgname, PATHINFO_EXTENSION);
            $data = file_get_contents($imgname);
            $imgbase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $imgbase64;
        }
    }
?>