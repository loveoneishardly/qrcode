<?php
    include_once('./config/db.php');

    class AppController {

        public function FLogin($taikhoan, $matkhau){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_dangnhap(:taikhoan, :matkhau);");
            $stmt -> bindParam(':taikhoan', $taikhoan, PDO::PARAM_STR);
            $stmt -> bindParam(':matkhau', $matkhau, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0){
                $row = $stmt->fetch();
                $_SESSION["manv"] = $row["MA_NHAN_VIEN"];
                $_SESSION["taikhoan"] = $row["TAI_KHOAN"];
                $_SESSION["tennv"] = $row["TEN_NHAN_VIEN"];
                $_SESSION["madv"] = $row["MA_DON_VI"];
                $_SESSION["diachi"] = $row["DIA_CHI"];
                $_SESSION["gioitinh"] = $row["GIOI_TINH"];
                $_SESSION["admin"] = $row["ADMIN"];
                $_SESSION["ngaysinh"] = $row["NGAY_SINH"];
                $_SESSION["sansang"] = $row["TRANGTHAI"];
                $_SESSION["sodienthoai"] = $row["SO_DIEN_THOAI"];
                $_SESSION["tendonvi"] = $row["TENDONVI"];
                $_SESSION["menu"] = $row["MENU"];
                $_SESSION["avatar"] = $row["AVATAR"];
                $_SESSION["tuoi"] = $row["TUOI"];
                $_SESSION["cccd"] = $row["SO_CCCD"];
                return array("trangthai" => $row["TRANGTHAI"], "cap" => $row["ADMIN"]);
            } else {
                return array("trangthai" => -1, "cap" => -1);
            }
        }

        public function FLogout_web(){
            if(isset($_SESSION["manv"])){
                unset($_SESSION["manv"]);
                session_destroy();
                return 1;
            } else {
                return 0;
            }
        }

        public function FLoadDSQRCode($madonvi){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_list_qr_code(:madonvi);");
            $stmt -> bindParam(':madonvi', $madonvi, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FGetInfoQrCode($madonvi,$id){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_duong_dan(:madonvi,:id);");
            $stmt -> bindParam(':madonvi', $madonvi, PDO::PARAM_STR);
            $stmt -> bindParam(':id', $id, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FLoadDSTinh(){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_tinh();");
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FLoadDSHuyen($matinh){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_huyen(:matinh);");
            $stmt -> bindParam(':matinh', $matinh, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FLoadDSXa($mahuyen){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_xa(:mahuyen);");
            $stmt -> bindParam(':mahuyen', $mahuyen, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FLoadDSLinhVuc($organization,$loaithutuc){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_linhvuc(:organization,:loaithutuc);");
            $stmt -> bindParam(':organization', $organization, PDO::PARAM_STR);
            $stmt -> bindParam(':loaithutuc', $loaithutuc, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FLoadDSThuTuc($organization,$loaithutuc,$malinhvuc){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_thutuc(:organization,:loaithutuc,:malinhvuc);");
            $stmt -> bindParam(':organization', $organization, PDO::PARAM_STR);
            $stmt -> bindParam(':loaithutuc', $loaithutuc, PDO::PARAM_STR);
            $stmt -> bindParam(':malinhvuc', $malinhvuc, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FLuuThongTinQRCode($idqrcode,$madonvi,$matinh,$mahuyen,$maxa,$mathutuc,$manhanvien){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_luu_thontin_qr_code(:idqrcode,:madonvi,:matinh,:mahuyen,:maxa,:mathutuc,:manhanvien);");
            $stmt -> bindParam(':idqrcode', $idqrcode, PDO::PARAM_STR);
            $stmt -> bindParam(':madonvi', $madonvi, PDO::PARAM_STR);
            $stmt -> bindParam(':matinh', $matinh, PDO::PARAM_STR);
            $stmt -> bindParam(':mahuyen', $mahuyen, PDO::PARAM_STR);
            $stmt -> bindParam(':maxa', $maxa, PDO::PARAM_STR);
            $stmt -> bindParam(':mathutuc', $mathutuc, PDO::PARAM_STR);
            $stmt -> bindParam(':manhanvien', $manhanvien, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>