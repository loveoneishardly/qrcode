<?php
    session_start();
    include_once('controllers/AppController.php');
    include_once('controllers/QrCode.php');
    include_once('controllers/ApiController.php');

    if(isset($_GET['check'])) {
        $check_session = 0;
		if(!isset($_SESSION["sansang"])){
            $check_session = "";
        } else {
            if($_SESSION["sansang"] != "1"){
                $check_session = $_SESSION["sansang"];
            }
        }

        ob_start();

        switch ($_GET['check']) {
            case "_home":
                include("pages/index.php");
            break;
            case "_index":
                include("pages/login.php");
            break;
            case "_loading_page":
                include("pages/check_page_edit.php");
            break;
            default:
                include("pages/ferror.php");
            break;
        }
        echo ob_get_clean();
    }

    if(isset($_POST['for'])) {
        switch ($_POST['for']) {
            case "login":
                $md5pass = md5($_POST['matkhau']);
                $trangthai = (new AppController())->FLogin($_POST['taikhoan'], $md5pass);
                echo json_encode($trangthai);
            break;
            case "_taomaqrcode":
                $id = $_POST['idqrcode'];
                $madonvi = $_POST["madonvi"];
                $res = (new CreateQRCode())->CreateQRHanhChinhCong($madonvi,$id);
                echo $res;
            break;
            case "_get_info_idqrcode":
                $id = $_POST['idqrcode'];
                $madonvi = $_POST["madonvi"];
                $res = (new AppController())->FGetInfoQrCode($madonvi,$id);
                echo json_encode($res);
            break;
            case "_logout":
                echo (new AppController())->FLogout_web();
            break;
            default:
                echo "Chức năng không tồn tại";
        }
    }

    if(isset($_GET['for'])) {
        switch ($_GET['for']) {
            case "loadlistqrcode":
                if (isset($_SESSION["madv"])){
                    $iddonvi = $_GET['iddonvi'];
                    $res = (new AppController())->FLoadDSQRCode($iddonvi);
                    echo json_encode($res);
                }
            break;
            case "loadlisttinh":
                if (isset($_SESSION["madv"])){
                    $res = (new AppController())->FLoadDSTinh();
                    echo json_encode($res);
                }
            break;
            case "loadlisthuyen":
                if (isset($_SESSION["madv"])){
                    $res = (new AppController())->FLoadDSHuyen();
                    echo json_encode($res);
                }
            break;
            default:
                echo "Chức năng không tồn tại";
            break;
        }
    }

    if(isset($_GET['page'])) {
        
        if(!isset($_SESSION["sansang"])){
                header("Location: go?check=_home");
        } else {
            if($_SESSION["sansang"] != "1"){
                header("Location: go?check=_home");
            }
        }
        
        ob_start();

        switch ($_GET['page']) {
            case "_main":
                include("pages/manage.php");
            break;
            case "_registerinfo":
                include("pages/check_page_edit.php");
            break;
            default:
                include("pages/ferror.php");
            break;
        }
        echo ob_get_clean();
    }
?>