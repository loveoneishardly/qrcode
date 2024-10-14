/*
SQLyog Community v12.16 (32 bit)
MySQL - 10.4.21-MariaDB : Database - management_qrcode
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`management_qrcode` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `management_qrcode`;

/*Table structure for table `dm_donvi` */

DROP TABLE IF EXISTS `dm_donvi`;

CREATE TABLE `dm_donvi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TENDONVI` varbinary(250) DEFAULT NULL,
  `DIACHI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SODIENTHOAI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GHICHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dm_donvi` */

insert  into `dm_donvi`(`ID`,`TENDONVI`,`DIACHI`,`SODIENTHOAI`,`EMAIL`,`GHICHU`,`TRANGTHAI`) values 
(1,'Trung tâm Công nghệ thông tin - VNPT Sóc Trăng','Sóc Trăng','0911355888','soctrang@gmail.com',NULL,1);

/*Table structure for table `dm_duong_dan` */

DROP TABLE IF EXISTS `dm_duong_dan`;

CREATE TABLE `dm_duong_dan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DUONG_DAN` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LOAI` int(11) DEFAULT NULL COMMENT '1: hành chính công, ...',
  `TRANG_THAI` int(2) DEFAULT NULL,
  `TIME_CREATE` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dm_duong_dan` */

insert  into `dm_duong_dan`(`ID`,`DUONG_DAN`,`LOAI`,`TRANG_THAI`,`TIME_CREATE`) values 
(1,'https://dichvucong.gov.vn/p/home/dvc-danh-sach-dich-vu-cong.html',1,1,'2024-10-14 20:52:16');

/*Table structure for table `dm_huyen` */

DROP TABLE IF EXISTS `dm_huyen`;

CREATE TABLE `dm_huyen` (
  `ID_HUYEN` int(11) NOT NULL,
  `ID_TINH` int(11) DEFAULT NULL,
  `TEN_HUYEN` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANG_THAI` int(2) DEFAULT NULL,
  `TIME_CREATE` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_HUYEN`),
  KEY `ID_TINH` (`ID_TINH`),
  CONSTRAINT `dm_huyen_ibfk_1` FOREIGN KEY (`ID_TINH`) REFERENCES `dm_tinh` (`ID_TINH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dm_huyen` */

insert  into `dm_huyen`(`ID_HUYEN`,`ID_TINH`,`TEN_HUYEN`,`TRANG_THAI`,`TIME_CREATE`) values 
(748,61,'Huyện Kế Sách',1,'2024-10-14 20:43:48');

/*Table structure for table `dm_linhvuc` */

DROP TABLE IF EXISTS `dm_linhvuc`;

CREATE TABLE `dm_linhvuc` (
  `ID_LINH_VUC` int(11) NOT NULL AUTO_INCREMENT,
  `TEN_LINH_VUC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MA_LINH_VUC` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANG_THAI` int(2) DEFAULT NULL,
  `TIME_CREATE` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_LINH_VUC`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dm_linhvuc` */

insert  into `dm_linhvuc`(`ID_LINH_VUC`,`TEN_LINH_VUC`,`MA_LINH_VUC`,`TRANG_THAI`,`TIME_CREATE`) values 
(1,'Thủ tục đăng ký kết hôn','1.000894',1,'2024-10-14 17:37:28');

/*Table structure for table `dm_nhanvien` */

DROP TABLE IF EXISTS `dm_nhanvien`;

CREATE TABLE `dm_nhanvien` (
  `MA_NHAN_VIEN` int(11) NOT NULL AUTO_INCREMENT,
  `MA_DON_VI` int(11) DEFAULT NULL,
  `MA_PHONG_BAN` int(11) DEFAULT NULL,
  `TEN_NHAN_VIEN` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DAN_TOC` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'lấy theo danh mục dân tộc',
  `NGAY_SINH` date DEFAULT NULL,
  `TUOI` int(11) DEFAULT NULL,
  `GIOI_TINH` int(2) DEFAULT NULL,
  `SO_CCCD` int(11) DEFAULT NULL,
  `DIA_CHI` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SO_DIEN_THOAI` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1: có, 0: không',
  `TAI_KHOAN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AVATAR` longblob DEFAULT NULL,
  `GHI_CHU` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADMIN` int(2) DEFAULT 0,
  `MENU` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TIME_CREATE` datetime DEFAULT NULL,
  `TIME_LOCK` datetime DEFAULT NULL,
  `TRANGTHAI` int(11) DEFAULT 1,
  PRIMARY KEY (`MA_NHAN_VIEN`,`TAI_KHOAN`),
  KEY `MA_DON_VI` (`MA_DON_VI`),
  KEY `MA_PHONG_BAN` (`MA_PHONG_BAN`),
  CONSTRAINT `dm_nhanvien_ibfk_1` FOREIGN KEY (`MA_DON_VI`) REFERENCES `dm_donvi` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dm_nhanvien` */

insert  into `dm_nhanvien`(`MA_NHAN_VIEN`,`MA_DON_VI`,`MA_PHONG_BAN`,`TEN_NHAN_VIEN`,`DAN_TOC`,`NGAY_SINH`,`TUOI`,`GIOI_TINH`,`SO_CCCD`,`DIA_CHI`,`SO_DIEN_THOAI`,`TAI_KHOAN`,`PASSWORD`,`AVATAR`,`GHI_CHU`,`ADMIN`,`MENU`,`TIME_CREATE`,`TIME_LOCK`,`TRANGTHAI`) values 
(1,1,1,'Admin','1','2024-02-22',45,1,2147483647,'thành phố Sóc Trăng, tỉnh Sóc Trăng','1','admin','85d617c7e82c1ec51ee00bec5dca17e4',NULL,'',9,NULL,'2024-02-23 14:50:52',NULL,1);

/*Table structure for table `dm_tinh` */

DROP TABLE IF EXISTS `dm_tinh`;

CREATE TABLE `dm_tinh` (
  `ID_TINH` int(11) NOT NULL,
  `TEN_TINH` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `TRANG_THAI` int(2) DEFAULT NULL,
  `TIME_CREATE` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_TINH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dm_tinh` */

insert  into `dm_tinh`(`ID_TINH`,`TEN_TINH`,`TRANG_THAI`,`TIME_CREATE`) values 
(61,'Tỉnh Sóc Trăng',1,'2024-10-14 20:43:27');

/*Table structure for table `dm_xa_phuong_tt` */

DROP TABLE IF EXISTS `dm_xa_phuong_tt`;

CREATE TABLE `dm_xa_phuong_tt` (
  `ID_XA` int(11) NOT NULL,
  `ID_HUYEN` int(11) DEFAULT NULL,
  `TEN_XA` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANG_THAI` int(2) DEFAULT NULL,
  `TIME_CREATE` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_XA`),
  KEY `ID_HUYEN` (`ID_HUYEN`),
  CONSTRAINT `dm_xa_phuong_tt_ibfk_1` FOREIGN KEY (`ID_HUYEN`) REFERENCES `dm_huyen` (`ID_HUYEN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dm_xa_phuong_tt` */

insert  into `dm_xa_phuong_tt`(`ID_XA`,`ID_HUYEN`,`TEN_XA`,`TRANG_THAI`,`TIME_CREATE`) values 
(1481,748,'Thị trấn An Lạc Thôn',1,'2024-10-14 20:44:17');

/*Table structure for table `manage_qr_code` */

DROP TABLE IF EXISTS `manage_qr_code`;

CREATE TABLE `manage_qr_code` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DON_VI` int(11) DEFAULT NULL,
  `ID_TINH` int(11) DEFAULT NULL,
  `ID_HUYEN` int(11) DEFAULT NULL,
  `ID_XA` int(11) DEFAULT NULL,
  `ID_LINH_VUC` int(11) DEFAULT NULL,
  `NGUOI_TAO` int(11) DEFAULT NULL,
  `DUONG_DAN` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANG_THAI` int(2) DEFAULT NULL,
  `TIME_CREATE` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `ID_DON_VI` (`ID_DON_VI`),
  KEY `ID_LINH_VUC` (`ID_LINH_VUC`),
  KEY `ID_TINH` (`ID_TINH`),
  KEY `ID_HUYEN` (`ID_HUYEN`),
  KEY `ID_XA` (`ID_XA`),
  KEY `NGUOI_TAO` (`NGUOI_TAO`),
  CONSTRAINT `manage_qr_code_ibfk_1` FOREIGN KEY (`ID_DON_VI`) REFERENCES `dm_donvi` (`ID`),
  CONSTRAINT `manage_qr_code_ibfk_2` FOREIGN KEY (`ID_LINH_VUC`) REFERENCES `dm_linhvuc` (`ID_LINH_VUC`),
  CONSTRAINT `manage_qr_code_ibfk_3` FOREIGN KEY (`ID_TINH`) REFERENCES `dm_tinh` (`ID_TINH`),
  CONSTRAINT `manage_qr_code_ibfk_4` FOREIGN KEY (`ID_HUYEN`) REFERENCES `dm_huyen` (`ID_HUYEN`),
  CONSTRAINT `manage_qr_code_ibfk_5` FOREIGN KEY (`ID_XA`) REFERENCES `dm_xa_phuong_tt` (`ID_XA`),
  CONSTRAINT `manage_qr_code_ibfk_6` FOREIGN KEY (`NGUOI_TAO`) REFERENCES `dm_nhanvien` (`MA_NHAN_VIEN`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `manage_qr_code` */

insert  into `manage_qr_code`(`ID`,`ID_DON_VI`,`ID_TINH`,`ID_HUYEN`,`ID_XA`,`ID_LINH_VUC`,`NGUOI_TAO`,`DUONG_DAN`,`TRANG_THAI`,`TIME_CREATE`) values 
(1,1,61,748,1481,1,1,'https://dichvucong.gov.vn/p/home/dvc-danh-sach-dich-vu-cong.html?tu_khoa=&bo_nganh=&tinh_thanh=T%E1%BB%89nh+S%C3%B3c+Tr%C4%83ng&so=&quan_huyen=Huy%E1%BB%87n+K%E1%BA%BF+S%C3%A1ch&phuong_xa=Th%E1%BB%8B+tr%E1%BA%A5n+An+L%E1%BA%A1c+Th%C3%B4n&ma_tt=1.000894&id_tinh_thanh=61&id_quan_huyen=748&id_phuong_xa=1481&id_so=null&id_bo_nganh=-1',1,'2024-10-14 17:38:44');

/* Procedure structure for procedure `p_dangnhap` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_dangnhap` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_dangnhap`(p_taikhoan VARCHAR(1024), p_matkhau VARCHAR(2048))
BEGIN
	DECLARE v_kt INT(10) DEFAULT 0;
	
	SELECT COUNT(*) INTO v_kt FROM dm_nhanvien WHERE p_taikhoan = TAI_KHOAN AND p_matkhau = PASSWORD AND TRANGTHAI = 1;
	
	IF v_kt = 0 THEN
		SELECT '-1' AS MA_NHAN_VIEN,'-1' AS MA_DON_VI, '-1' AS TEN_NHAN_VIEN,'-1' AS ADMIN,
		'-1' AS TRANGTHAI,'-1' AS SO_DIEN_THOAI, '-1' AS MENU, '' AS TUOI, '' AS DIA_CHI, '' AS GIOI_TINH, '' AS NGAY_SINH, '' AS SO_CCCD, '' AS TENDONVI, '' AS AVATAR, 'Tài khoản không tồn tại' AS TAI_KHOAN FROM DUAL;
	ELSE
		SELECT t.MA_NHAN_VIEN, t.MA_DON_VI, t.TEN_NHAN_VIEN, t.ADMIN, t.TRANGTHAI, t.SO_DIEN_THOAI, t.MENU, t.TUOI, t.DIA_CHI, t.GIOI_TINH, t.NGAY_SINH, t.SO_CCCD, dv.TENDONVI, t.AVATAR, t.TAI_KHOAN
		FROM dm_nhanvien t, dm_donvi dv
		WHERE p_taikhoan = t.TAI_KHOAN AND p_matkhau = t.PASSWORD AND t.MA_DON_VI = dv.ID AND t.TRANGTHAI = 1;
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_duong_dan` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_duong_dan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_duong_dan`(
	p_madonvi varchar(150),
	p_id_manage_qr varchar(20)
)
BEGIN
	select *
	from manage_qr_code
	where id_don_vi = p_madonvi and id = p_id_manage_qr;
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_huyen` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_huyen` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_huyen`(
	p_id_tinh varchar(100)
)
BEGIN
	select *
	from dm_huyen
	where id_tinh = p_id_tinh
	order by ten_huyen;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_list_qr_code` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_list_qr_code` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_list_qr_code`(
	p_madonvi varchar(150)
)
BEGIN
	select aa.ID, aa.ID_DON_VI, dv.TENDONVI, lv.TEN_LINH_VUC, t.TEN_TINH, h.TEN_HUYEN, p.TEN_XA, nv.TEN_NHAN_VIEN, case when aa.TRANG_THAI = 1 then 'Hoạt động' else 'Đã hủy' end as TRANG_THAI, DATE_FORMAT(aa.TIME_CREATE,'%d/%m/%Y %H:%i:%s') as TIME_CREATE
	from manage_qr_code aa 
		left join dm_tinh t on aa.ID_TINH = t.ID_TINH
		left join dm_huyen h on aa.ID_HUYEN = h.ID_HUYEN
		left join dm_xa_phuong_tt p on aa.ID_XA = p.ID_XA,
	     dm_donvi dv, dm_linhvuc lv, dm_nhanvien nv
	 where aa.ID_DON_VI = p_madonvi and aa.ID_DON_VI = dv.ID and dv.ID = p_madonvi
		and aa.ID_LINH_VUC = lv.ID_LINH_VUC and lv.trang_thai = 1 and aa.NGUOI_TAO = nv.MA_NHAN_VIEN
	order by dv.TENDONVI, t.TEN_TINH, h.TEN_HUYEN, p.TEN_XA;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_thongtin_qr_code` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_thongtin_qr_code` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_thongtin_qr_code`(
	p_madonvi varchar(150),
	p_id_qr_code varchar(150)
)
BEGIN
	select aa.ID, t.ID_TINH, t.TEN_TINH, h.ID_HUYEN, h.TEN_HUYEN, p.ID_XA, p.TEN_XA, lv.MA_LINH_VUC
	from manage_qr_code aa 
		left join dm_tinh t on aa.ID_TINH = t.ID_TINH
		left join dm_huyen h on aa.ID_HUYEN = h.ID_HUYEN
		left join dm_xa_phuong_tt p on aa.ID_XA = p.ID_XA,
	     dm_linhvuc lv
	 where aa.ID = p_id_qr_code and aa.ID_DON_VI = p_madonvi and aa.ID_LINH_VUC = lv.ID_LINH_VUC;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_tinh` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_tinh` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_tinh`(
)
BEGIN
	select * 
	from dm_tinh;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_url` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_url` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_url`(
	p_loai_url varchar(20)
)
BEGIN
	select *
	from dm_duong_dan
	where loai = p_loai_url and trang_thai = 1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_get_xa` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_get_xa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_get_xa`(
	p_id_huyen varchar(100)
)
BEGIN
	select *
	from dm_xa_phuong_tt
	where id_huyen = p_id_huyen
	order by ten_xa;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `p_update_url_qrcode` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_update_url_qrcode` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_update_url_qrcode`(
	p_madonvi VARCHAR(150),
	p_id_qr_code VARCHAR(150),
	p_url text
)
BEGIN
	declare v_check int(2);
	DECLARE v_kq INT(2);
	
	select count(*) into v_check from manage_qr_code where id = p_id_qr_code and id_don_vi = p_madonvi;
	if v_check > 0 then
		update manage_qr_code set duong_dan =  p_url WHERE id = p_id_qr_code AND id_don_vi = p_madonvi;
		SELECT ROW_COUNT() INTO v_kq;
	else
		set v_kq = 0;
	end if;
	
	select v_kq as KET_QUA from dual;
	
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
