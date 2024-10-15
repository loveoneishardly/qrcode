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
    }
?>