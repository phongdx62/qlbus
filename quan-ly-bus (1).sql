-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 03:34 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quan-ly-bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `banvengay`
--

CREATE TABLE `banvengay` (
  `magdvn` int(6) UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `mapx` int(4) UNSIGNED NOT NULL,
  `mavn` int(6) UNSIGNED NOT NULL,
  `sovephatra` int(11) NOT NULL,
  `sovethuve` int(11) NOT NULL,
  `sovebanduoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banvengay`
--

INSERT INTO `banvengay` (`magdvn`, `ngay`, `mapx`, `mavn`, `sovephatra`, `sovethuve`, `sovebanduoc`) VALUES
(1, '2019-01-11', 1, 3, 200, 15, 185),
(2, '2019-02-02', 2, 3, 150, 5, 145),
(3, '2019-01-03', 4, 11, 100, 20, 80),
(6, '0000-00-00', 8, 12, 1000, 111, 480),
(7, '0034-02-23', 11, 3, 500, 50, 448),
(8, '0023-03-31', 10, 13, 1000, 20, 880),
(9, '2018-01-12', 14, 10, 820, 124, 689),
(10, '1231-03-21', 9, 12, 455, 23, 411),
(11, '2018-12-21', 14, 18, 250, 1, 244),
(12, '2019-01-01', 11, 16, 445, 25, 411),
(13, '2018-01-01', 9, 1, 455, 25, 398),
(14, '2018-02-02', 5, 19, 325, 5, 312),
(15, '0324-04-23', 2, 18, 234234, 234, 34234);

-- --------------------------------------------------------

--
-- Table structure for table `banvethang`
--

CREATE TABLE `banvethang` (
  `magdvt` int(4) UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `manvbvt` int(4) UNSIGNED NOT NULL,
  `mavt` int(6) UNSIGNED NOT NULL,
  `sovephatra` int(11) NOT NULL,
  `sovethuve` int(11) NOT NULL,
  `sovebanduoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banvethang`
--

INSERT INTO `banvethang` (`magdvt`, `ngay`, `manvbvt`, `mavt`, `sovephatra`, `sovethuve`, `sovebanduoc`) VALUES
(1, '2019-01-01', 2, 2, 500, 10, 480),
(2, '0324-04-23', 1, 1, 4343, 24, 2342);

-- --------------------------------------------------------

--
-- Table structure for table `datve`
--

CREATE TABLE `datve` (
  `madv` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `mavt` int(6) UNSIGNED NOT NULL,
  `xacnhan` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datve`
--

INSERT INTO `datve` (`madv`, `id`, `mavt`, `xacnhan`) VALUES
(1, 20, 1, '0'),
(2, 6, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `diembvt`
--

CREATE TABLE `diembvt` (
  `madbvt` int(4) UNSIGNED NOT NULL,
  `tendbvt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diembvt`
--

INSERT INTO `diembvt` (`madbvt`, `tendbvt`, `diachi`, `sdt`) VALUES
(1, 'ĐH Thủy Lợi', '175 TÂY SƠN, ĐỐNG ĐA, HÀ NỘI', '0973540339'),
(2, 'HV Bưu Chính VT', 'Km 10 Đường Nguyễn Trãi, Quận Hà Đông, Hà Nội', '0344578789'),
(3, 'BX Giáp Bát', 'BX Giáp Bát', '0979985566'),
(4, 'Bách Khoa', 'Bách Khoa - Đường Lê Thanh Nghị', '0976688996'),
(5, '2233', 'Sơn La', '038989885'),
(6, '2222a', '2222', '2222'),
(7, '2234a', '22', '22'),
(8, 'BX Mỹ Đình', 'BX Mỹ Đình', '0989977878'),
(9, 'BX Yên Nghĩa', 'BX Yên Nghĩa', '0997465589');

-- --------------------------------------------------------

--
-- Table structure for table `hoatdong`
--

CREATE TABLE `hoatdong` (
  `mahd` int(6) UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `ca` int(2) NOT NULL,
  `bienso` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matuyen` int(6) UNSIGNED NOT NULL,
  `matx` int(4) UNSIGNED NOT NULL,
  `mapx` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoatdong`
--

INSERT INTO `hoatdong` (`mahd`, `ngay`, `ca`, `bienso`, `matuyen`, `matx`, `mapx`) VALUES
(1, '2019-02-01', 4, '001', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capbac` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `activation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `ten`, `diachi`, `email`, `cmnd`, `sdt`, `taikhoan`, `matkhau`, `capbac`, `activation`, `status`) VALUES
(1, 'Nguyễn Văn Nhân', '', '', '', '0000-00-00', 'nhansu', 'e10adc3949ba59abbe56e057f20f883e', '1', '', '0'),
(2, 'Trần Đình Hành', '', '', '', '0000-00-00', 'dieuhanh', 'e10adc3949ba59abbe56e057f20f883e', '2', '', '0'),
(3, 'Kiều Mỹ Doanh', '', '', '', '0000-00-00', 'kinhdoanh', 'e10adc3949ba59abbe56e057f20f883e', '3', '', '0'),
(4, 'Admin', '', '', '', '0000-00-00', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0', '', '0'),
(6, 'Nguyễn Văn Vàng', 'Hà Đông - Hà Nội', 'gdnhell@gmail.com', '111111111', '111111', 'cauvang', 'e10adc3949ba59abbe56e057f20f883e', '', '', '0'),
(18, 'a', 'a', 'gdnhell169@gmail.com', '11', '11', 'a', '96e79218965eb72c92a549dd5a330112', '', 'd1c5c344fa5f797b22e1e328ba6da811', '0'),
(19, '1', '1', 'gdnhell169@gmail.com', '1', '1', '1', '96e79218965eb72c92a549dd5a330112', '', '', '1'),
(20, 'Nguyen Van Hac', 'Ha Noi', 'gdnhell169@gmail.com', '11111111', '0123456789', 'laohac', 'e10adc3949ba59abbe56e057f20f883e', '', 'dbaaa94d410653696ed47357e2a58fbf', '0'),
(21, 'e', 'e', 'vitieubaosongnhi@gmail.com', 'e', 'e', 'e', 'cd87cd5ef753a06ee79fc75dc7cfe66c', '', '6369da384065978e2081fe7970217494', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvienbvt`
--

CREATE TABLE `nhanvienbvt` (
  `manvbvt` int(4) UNSIGNED NOT NULL,
  `tennvbvt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `madbvt` int(4) UNSIGNED NOT NULL,
  `luong` int(11) NOT NULL,
  `anhnvbvt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvienbvt`
--

INSERT INTO `nhanvienbvt` (`manvbvt`, `tennvbvt`, `ngaysinh`, `diachi`, `sdt`, `cmnd`, `madbvt`, `luong`, `anhnvbvt`) VALUES
(1, 'Vương Thị Vấn', '1995-01-16', 'Hà Nội', '0123489489', '112122115', 1, 6000000, 'jfla.gif'),
(2, 'Vàng Mỹ Miều', '1992-01-01', 'Thái Bình', '0245558878', '2233445788', 2, 6500000, 'jfla.gif'),
(3, '11', '0011-11-11', '11', '11', '11', 5, 11, 'jfla.gif'),
(4, '22', '0222-02-22', '22', '22', '22', 5, 22, 'jfla.gif'),
(5, '33', '0333-03-31', '33', '33', '33', 3, 33, 'jfla.gif'),
(6, 'jfla', '3223-12-23', 'lala', '222222', '3222233', 5, 21312323, 'jfla.gif'),
(7, 'Lương Thị Mận', '1994-01-01', 'Tuyệt Tình Cốc', '0995566789', '112288994', 8, 6500000, 'jfla.gif'),
(8, '1312', '0024-04-23', '23423', '3242', '2342', 3, 32423, 'jfla.gif'),
(9, '34114', '0424-12-14', '14134', '14124', '124124', 8, 1414, 'jfla.gif'),
(10, '234', '0324-04-23', '234', '234', '234', 8, 234, 'jfla.gif');

-- --------------------------------------------------------

--
-- Table structure for table `phanhoi`
--

CREATE TABLE `phanhoi` (
  `maph` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phanhoi`
--

INSERT INTO `phanhoi` (`maph`, `id`, `noidung`) VALUES
(1, 6, 'xin chao toi muon noi vai loi'),
(2, 6, 'aaaaaaaaaa'),
(3, 6, 'ok im fine');

-- --------------------------------------------------------

--
-- Table structure for table `phuxe`
--

CREATE TABLE `phuxe` (
  `mapx` int(4) UNSIGNED NOT NULL,
  `tenpx` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matuyen` int(4) UNSIGNED NOT NULL,
  `luong` int(11) NOT NULL,
  `anhpx` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phuxe`
--

INSERT INTO `phuxe` (`mapx`, `tenpx`, `ngaysinh`, `diachi`, `sdt`, `cmnd`, `matuyen`, `luong`, `anhpx`) VALUES
(1, 'Thích Đậu Phụ', '1995-01-16', 'Hà Đông', '097778774', '554456568', 4, 7000000, 'px.jpg'),
(2, 'Nguyễn Văn Chào', '1992-01-18', 'Hà Nội', '097225889', '123335556', 6, 6000000, 'px.jpg'),
(4, 'Lò Văn Chảo', '2019-01-06', 'Mộc Châu', '0989988559', '1121112233', 6, 7000000, 'px.jpg'),
(5, 'a', '1989-01-24', 'Sơn La', '038989885', '251115454', 2, 10000000, 'px.jpg'),
(7, 'tt', '0434-03-31', 'Thái Nguyên', 't', 't', 1, 6, 'px.jpg'),
(8, '3', '0033-03-31', '3', '3', '33', 1, 3, 'px.jpg'),
(9, '66', '0666-06-06', '66', '66', '66', 3, 66, 'px.jpg'),
(10, 'zzgg', '0111-11-11', 'zz', 'zz', 'zz', 3, 0, 'px.jpg'),
(11, '77777777', '0777-07-07', '777', '777', '777', 3, 77, 'px.jpg'),
(12, '4444', '0444-04-04', '4444', '4444', '44444', 2, 44, 'px.jpg'),
(13, 'zz', '3123-03-12', 'zz', '22222', '333333', 5, 123, 'px.jpg'),
(14, 'thaite', '0213-03-12', 'eeee', '333333', '1312323', 17, 13123, 'px.jpg'),
(16, '324234', '0234-04-23', '23423', '23432', '234324', 17, 234, 'px.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taixe`
--

CREATE TABLE `taixe` (
  `matx` int(4) UNSIGNED NOT NULL,
  `tentx` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `loaibang` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `matuyen` int(4) UNSIGNED NOT NULL,
  `luong` int(11) NOT NULL,
  `anhtx` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taixe`
--

INSERT INTO `taixe` (`matx`, `tentx`, `ngaysinh`, `diachi`, `sdt`, `cmnd`, `loaibang`, `matuyen`, `luong`, `anhtx`) VALUES
(1, 'Nguyễn Văn Báo', '1989-01-01', 'Hà Đông', '0123489489', '112198849', 'E', 1, 10000000, 'smile.jpg'),
(2, 'Nguyễn Văn Hai', '1988-01-02', 'Hà Nội', '0123448878', '121254568', 'E', 2, 11000000, 'smile.jpg'),
(3, 'Trần Văn Ba', '1990-01-04', 'Hà Nam', '097335889', '212158878', 'F', 1, 12000000, 'smile.jpg'),
(4, 'Phạm Xuân Bá', '1991-01-02', 'Bắc Ninh', '0973558995', '1154668956', 'E', 2, 11000000, 'smile.jpg'),
(5, 'Phùng Trường Giang', '1989-01-24', 'Sơn La', '038989885', '251115454', 'E', 2, 10000000, 'smile.jpg'),
(7, 'Trần Thế Vinh', '1993-01-18', 'Hà Nội', '0388944658', '1548775769', 'F', 6, 12000000, 'smile.jpg'),
(8, 'Hùng Văn Hổ', '1995-01-05', 'Bắc Ninh', '0123445778', '1122445789', 'F', 1, 10000000, 'smile.jpg'),
(14, '1322ee', '0123-03-12', '123', '123', '123', '2', 5, 123, 'smile.jpg'),
(20, '1122', '0011-11-11', '11', '11', '11', '1', 2, 11, 'smile.jpg'),
(24, 'ffgg', '0000-00-00', 'ff', 'ff', 'ff', 'f', 3, 0, 'smile.jpg'),
(25, 'hhgg', '0044-04-04', 'hh', 'hh', 'hh', 'h', 3, 0, 'smile.jpg'),
(28, '333333', '0033-03-31', '33', '33', '33', '3', 1, 33, 'smile.jpg'),
(29, '44', '0044-04-04', '44', '44', '44', '4', 4, 444, 'smile.jpg'),
(30, '55', '0055-05-05', '55', '55', '5555', '5', 2, 55, 'smile.jpg'),
(31, '22', '0022-02-22', '22', '22', '22', '2', 2, 22, 'smile.jpg'),
(32, '777', '0777-07-07', '77', '77', '77', '7', 3, 77, 'smile.jpg'),
(33, 'bbaa', '0222-02-22', 'bb', '222', '33332', 'e', 18, 22, 'smile.jpg'),
(34, 'Vẫn Du Thiên', '1989-01-01', 'Bồng Thiên Nhai', '0998789989', '222454669', 'E', 35, 100000, 'smile.jpg'),
(35, 'Nguyễn Văn Bá', '1998-01-01', 'Bá Đạo', '0997878789', '1212124545', 'E', 16, 10000000, 'smile.jpg'),
(36, 'Trần Hoàng Lê', '2000-01-01', 'Hà Nam', '0123448776', '1212456787', 'E', 8, 9000000, 'smile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tuyen`
--

CREATE TABLE `tuyen` (
  `matuyen` int(4) UNSIGNED NOT NULL,
  `tentuyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `giobd` time NOT NULL,
  `giokt` time NOT NULL,
  `chieudi` text COLLATE utf8_unicode_ci NOT NULL,
  `chieuve` text COLLATE utf8_unicode_ci NOT NULL,
  `tansuat` int(11) NOT NULL,
  `soluongxe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuyen`
--

INSERT INTO `tuyen` (`matuyen`, `tentuyen`, `giobd`, `giokt`, `chieudi`, `chieuve`, `tansuat`, `soluongxe`) VALUES
(1, 'Gia Lâm - Yên Nghĩa', '05:30:00', '22:30:00', 'Bến xe Gia Lâm - Ngô Gia Khảm - Ngọc Lâm - Nguyễn Văn Cừ - Cầu Chương Dương - Trần Nhật Duật - Yên Phụ - Điểm trung chuyển Long Biên - Hàng Đậu - Hàng Cót - Hàng Gà - Hàng Điếu - Đường Thành - Phủ Doãn - Triệu Quốc Đạt - Hai Bà Trưng - Lê Duẩn - Khâm Thiên - Đường mới (Vành đai 1) - Quay đầu tại điểm mở dải phân cách - Đường mới (Vành đai 1)- Nguyễn Lương Bằng - Tây Sơn - Ngã tư Sở - Nguyễn Trãi - Trần Phú (Hà Đông) - Quang Trung (Hà Đông) - Ba La - Quốc lộ 6 - Bến xe Yên Nghĩa.', 'Bến xe Yên Nghĩa - Quốc lộ 6 - Ba La - Quang Trung (Hà Đông) - Trần Phú (Hà Đông) - Nguyễn Trãi - Ngã tư Sở - Tây Sơn - Nguyễn Lương Bằng - Xã Đàn - Quay đầu tại đối diện ngõ Xã Đàn 2 - Xã Đàn - Khâm Thiên - Nguyễn Thượng Hiền - Yết Kiêu - Trần Hưng Đạo - Quán Sứ - Hàng Da - Đường Thành - Phùng Hưng - Lê Văn Linh - Phùng Hưng (đường trong) - Phan Đình Phùng - Hàng Đậu - Trần Nhật Duật - Cầu Chương Dương - Nguyễn Văn Cừ - Nguyễn Sơn - Ngọc Lâm - Ngô Gia Khảm - Bến xe Gia Lâm.', 15, 10),
(2, 'Bác cổ - Yên Nghĩa', '06:00:00', '22:00:00', 'Bác Cổ (Bãi đỗ xe Trần Khánh Dư) - Trần Khánh Dư (đường dưới) - Trần Hưng Đạo - Lê Thánh Tông - Hai Bà Trưng - Quang Trung - Tràng Thi - Điện Biên Phủ - Trần Phú - Chu Văn An - Tôn Đức Thắng - Đường mới (Vành đai 1) - Quay đầu tại điểm mở dải phân cách - Đường mới (Vành đai 1) - Nguyễn Lương Bằng - Tây Sơn - Ngã tư Sở - Nguyễn Trãi - Trần Phú (Hà Đông) - Quang Trung (Hà Đông) - Ba La - Quốc Lộ 6 - BX Yên Nghĩa.', 'Bến xe Yên Nghĩa - Quốc Lộ 6 - Ba La - Quang Trung (Hà Đông) - Trần Phú (Hà Đông) - Nguyễn Trãi - Ngã tư Sở - Tây Sơn - Nguyễn Lương Bằng - Xã Đàn - Quay đầu tại đối diện ngõ Xã Đàn 2 - Xã Đàn - Tôn Đức Thắng - Nguyễn Thái Học - Phan Bội Châu - Hai Bà Trưng - Phan Chu Trinh - Tràng Tiền - Bác Cổ (Bãi đỗ xe Trần Khánh Dư).', 15, 10),
(3, 'Giáp Bát - Gia Lâm', '06:00:00', '22:00:00', 'Bến xe Giáp Bát - Giải Phóng - Lê Duẩn - Nguyễn Thượng Hiền - Yết Kiêu - Trần Hưng Đạo - Trần Khánh Dư - Trần Quang Khải - Trần Nhật Duật - Long Biên (Điểm quay đầu trước phố Hàng Khoai) - Trần Nhật Duật - Cầu Chương Dương - Nguyễn Văn Cừ - Nguyễn Sơn - Ngọc Lâm - Ngô Gia Khảm - Bến xe Gia Lâm', 'Bến xe Gia Lâm - Ngô Gia Khảm - Ngọc Lâm - Nguyễn Văn Cừ - Cầu Chương Dương - Trần Nhật Duật - Long Biên (Điểm quay đầu trước phố Hàng Khoai) - Trần Nhật Duật - Trần Quang Khải - Trần Khánh Dư - Trần Hưng Đạo - Lê Duẩn - Giải Phóng - Ngã 3 Đuôi Cá - Bến xe Giáp Bát.', 15, 10),
(4, 'Long Biên - Nước Ngầm', '06:00:00', '22:00:00', 'Long Biên (Yên Phụ - đoạn Hàng Than đến Hòe Nhai) - quay đầu tại đối diện phố Hàng Than - Yên Phụ - Điểm trung chuyển Long Biên - Trần Nhật Duật - Nguyễn Hữu Huân - Lý Thái Tổ - Ngô Quyền - Hai Bà Trưng - Lê Thánh Tông - Trần Thánh Tông - Tăng Bạt Hổ - Yecxanh - Lò Đúc - Trần Khát Chân - Quay đầu tại đối diện số nhà 274 Trần Khát Chân - Trần Khát Chân - Kim Ngưu - Tam Trinh - Cầu Voi - Nguyễn Tam Trinh - Đường Lĩnh Nam - Đường dẫn cầu Thanh Trì - Pháp Vân - Rẽ trái tại nút giao đường vành đai 3 và đường Ngọc Hồi (gần BX Nước Ngầm) - Ngọc Hồi - Quay đầu tại công ty ABB - Ngọc Hồi - Bến xe Nước Ngầm.', 'BX Nước Ngầm - Giải Phóng - Pháp Vân - Đường dẫn cầu Thanh Trì - Đường Lĩnh Nam - Nguyễn Tam Trinh - Kim Ngưu - Lò Đúc - Phan Chu Trinh - Lý Thái Tổ - Ngô Quyền - Hàng Vôi - Hàng Tre - Hàng Muối - Trần Nhật Duật - Điểm trung chuyển Long Biên - Yên Phụ - Long Biên (Yên Phụ - đoạn Hàng Than đến Hòe Nhai)', 15, 15),
(5, 'Linh Đàm - Phú Diễn', '07:00:00', '23:00:00', 'Linh Đàm (Khu đô thị Linh Đàm) - Nguyễn Duy Trinh - Nguyễn Hữu Thọ - Cầu Dậu - Kim Giang - Khương Đình - Nguyễn Trãi - Quay đầu tại 177 Nguyễn Trãi - Nguyễn Trãi - Nguyễn Tuân - Hoàng Minh Giám - Nguyễn Chánh - Vũ Phạm Hàm - Trung Kính - Trần Thái Tông - Tôn Thất Thuyết - Nguyễn Hoàng - Hàm Nghi - Nguyễn Cơ Thạch - Hồ Tùng Mậu - Cầu Diễn - Đường K1 Cầu Diễn - Ga Phú Diễn - Phú Diễn (Trại Gà)', 'Phú Diễn (Trại Gà) - Đường K1 Cầu Diễn - Ga Phú Diễn - Cầu Diễn - Quay đầu Doanh trại quân đội nhân dân (nhà máy Z157) - Hồ Tùng Mậu - Nguyễn Cơ Thạch - Hàm Nghi - Nguyễn Hoàng - Tôn Thất Thuyết - Trần Thái Tông - Trung Kính - Vũ Phạm Hàm - Nguyễn Chánh - Mạc Thái Tông - Hoàng Minh Giám - Nguyễn Tuân - Nguyễn Trãi - quay đầu tại ngã 4 Khuất Duy Tiến, Nguyễn Trãi - Nguyễn Trãi - Khương Đình - Kim Giang - Cầu Dậu - Nguyễn Hữu Thọ - Nguyễn Duy Trinh - Khu đô thị Linh Đàm', 30, 10),
(6, 'Giáp Bát - Cầu Giẽ', '05:30:00', '22:30:00', 'Bến xe Giáp Bát - Giải Phóng - Kim Đồng - Giải Phóng - Ngọc Hồi - Quốc Lộ 1 - Liên Ninh - Quán Gánh - Thị trấn Thường Tín - Tía - Đỗ Xá - Nghệ - Thị trấn Phú Xuyên - Guột - Cầu Giẽ (Ngã 3 đường ra cao tốc Pháp Vân - Cầu Giẽ)', 'Cầu Giẽ (Ngã 3 đường ra cao tốc Pháp Vân - Cầu Giẽ) - Quốc Lộ 1 - Guột - Thị trấn Phú Xuyên - Nghệ - Đỗ Xá - Tía - Thị trấn Thường Tín - Quán Gánh - Liên Ninh - Ngọc Hồi - Giải Phóng - Bến xe Giáp Bát.', 15, 16),
(7, 'Cầu Giấy - Nội Bài', '05:30:00', '22:30:00', 'Bãi đỗ xe Cầu Giấy - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Nguyễn Văn Huyên - Hoàng Quốc Việt - Phạm Văn Đồng - Cầu Thăng Long - Võ Văn Kiệt - Đường dưới cầu vượt Kim Chung - Võ Văn Kiệt - Quay đầu tại điểm mở (đối diện công ty dịch vụ hàng hóa hàng không - ACS) - Võ Văn Kiệt - Sân bay Nội Bài (Sân đỗ P2, nhà ga T1)', 'Sân bay Nội Bài (Sân đỗ P2, nhà ga T1) - Võ Văn Kiệt - Đường vào sân đỗ nhà ga T2, sân bay Nội Bài - Điểm dừng xe buýt đón trả khách (sân đỗ xe nhà ga T2) - Võ Văn Kiệt - Cầu Thăng Long - Phạm Văn Đồng - Hoàng Quốc Việt - Nguyễn Văn Huyên - Nguyễn Khánh Toàn - Trần Đăng Ninh - Cầu Giấy - Điểm trung chuyển Cầu Giấy - Cầu Giấy (đường dưới) - Bãi đỗ xe Cầu Giấy', 15, 20),
(8, '	Long Biên - Đông Mỹ', '05:30:00', '23:00:00', '	Long Biên (Yên Phụ - đoạn Hàng Than đến Hòe Nhai) - quay đầu tại đối diện phố Hàng Than - Yên Phụ - Điểm trung chuyển Long Biên - Trần Nhật Duật - Nguyễn Hữu Huân - Lý Thái Tổ - Ngô Quyền - Lý Thường Kiệt - Bà Triệu - Lê Đại Hành - Bạch Mai - Lê Thanh Nghị - Trần Đại Nghĩa - Đại La - Trường Chinh - Ngã tư Vọng - Giải Phóng - Đường Ngọc Hồi - Ngũ Hiệp - Sân vận động Đông Mỹ', 'Sân vận động Đông Mỹ - Ngũ Hiệp - Đường Ngọc Hồi - Giải Phóng - Quảng trường Bến xe Giáp Bát - Giải Phóng - Trường Chinh - Ngã tư Vọng - Đại La - Trần Đại Nghĩa - Lê Thanh Nghị - Bạch Mai - Phố Huế - Hàng Bài - Đinh Tiên Hoàng - Trần Nguyên Hãn - Ngô Quyền - Hàng Tre - Hàng Muối - Trần Nhật Duật - Điểm trung chuyển Long Biên - Yên Phụ - Long Biên (Yên Phụ - đoạn Hàng Than đến Hòe Nhai)', 20, 10),
(9, 'Bờ Hồ - Bờ Hồ', '06:00:00', '22:00:00', '	Bãi đỗ xe Bờ Hồ - Đinh Tiên Hoàng - Lê Thái Tổ - Bà Triệu - Hồ Xuân Hương - Nguyễn Bỉnh Khiêm - Trần Nhân Tông - Lê Duẩn - Khâm Thiên - Đường mới (Vành đai 1) - Quay đầu tại điểm mở dải phân cách - Đường mới (Vành đai 1) - Nguyễn Lương Bằng - Tây Sơn – Ngã Tư Sở - Láng - Láng Hạ - Huỳnh Thúc Kháng - Nguyễn Chí Thanh - Quay đầu tại đối diện số nhà 56 Nguyễn Chí Thanh - Nguyễn Chí Thanh - Chùa Láng - Đường Láng - Điểm trung chuyển Cầu Giấy - Kim Mã - Liễu Giai - Văn Cao - Hoàng Hoa Thám - Ngọc Hà - Lê Hồng Phong - Điện Biên Phủ - Phan Bội Châu - Hai Bà Trưng - Hàng Bài - Đinh Tiên Hoàng - Bãi đỗ xe Bờ Hồ', 'Bãi đỗ xe Bờ Hồ - Lê Thái Tổ - Tràng Thi - Điện Biên Phủ - Lê Hồng Phong - Đội Cấn - Liễu Giai - Kim Mã - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Đường Láng - Chùa Láng - Nguyễn Chí Thanh - Quay đầu tại gầm cầu vượt Nguyễn Chí Thanh - Nguyễn Chí Thanh - Huỳnh Thúc Kháng - Láng Hạ - Láng - Ngã Tư Sở - Tây Sơn - Nguyễn Lương Bằng - Xã Đàn - Quay đầu tại đối diện ngõ Xã Đàn 2 - Xã Đàn - Khâm Thiên - Lê Duẩn - Trần Nhân Tông - Quang Trung - Nguyễn Du - Phố Huế - Hàng Bài - Đinh Tiên Hoàng - Bãi đỗ xe Bờ Hồ', 30, 10),
(10, 'Long Biên - Từ Sơn', '06:00:00', '23:00:00', 'Long Biên (đối diện Đội CSGT số 1 Hà Nội - số 3 Trần Nhật Duật) - Trần Nhật Duật - Yên Phụ - Quay đầu tại đối diện 92 Yên Phụ - Điểm trung chuyển Long Biên - Trần Nhật Duật - Cầu Chương Dương - Nguyễn Văn Cừ - Ngô Gia Tự - Cầu Đuống - Hà Huy Tập - Quốc lộ 1A - Dốc Lã - Đình Bảng - Trần Phú (Từ Sơn) - Minh Khai (Từ Sơn) - Từ Sơn (Cổng bệnh viện đa khoa Từ Sơn)', 'Từ Sơn (Cổng bệnh viện đa khoa Từ Sơn) - Minh Khai (Từ Sơn) - Quay đầu tại điểm mở - Minh Khai (Từ Sơn) - Trần Phú (Từ Sơn) - Dốc Lã - Hà Huy Tập - Cầu Đuống - Ngô Gia Tự - Nguyễn Văn Cừ - Cầu Chương Dương - Trần Nhật Duật - Yên Phụ - Điểm trung chuyển Long Biên - Yên Phụ - Quay đầu tại đối diện 92 Yên Phụ - Trần Nhật Duật - Long Biên (đối diện Đội CSGT số 1 Hà Nội - số 3 Trần Nhật Duật)', 30, 15),
(11, 'CV Thống Nhất - HV Nông Nghiệp', '05:30:00', '22:00:00', 'Công viên Thống Nhất - Trần Nhân Tông - Quang Trung - Trần Hưng Đạo - Phan Chu Trinh - Lý Thái Tổ - Ngô Quyền - Hàng Vôi - Hàng Tre - Hàng Muối - Long Biên (Điểm quay đầu trước phố Hàng Khoai) - Trần Nhật Duật - Cầu Chương Dương - Đê Ngọc Thụy - Ngọc Lâm - Nguyễn Văn Cừ - Nguyễn Văn Linh - Nguyễn Đức Thuận - Ngô Xuân Quảng - HV Nông nghiệp Việt Nam', 'HV Nông nghiệp Việt Nam - Ngô Xuân Quảng - Nguyễn Đức Thuận - Nguyễn Văn Linh - Nguyễn Văn Cừ - Ngọc Lâm - Đê Ngọc Thụy - Cầu Chương Dương - Trần Nhật Duật - Long Biên (Điểm quay đầu tại phố Hàng Khoai) - Trần Nhật Duật - Nguyễn Hữu Huân - Lý Thái Tổ - Ngô Quyền - Trần Hưng Đạo - Lê Duẩn - Trần Nhân Tông - Công viên Thống Nhất', 20, 15),
(12, 'CV Nghĩa Đô - Đại Áng', '05:30:00', '22:30:00', 'Công viên Nghĩa Đô - Nguyễn Văn Huyên - Nguyễn Khánh Toàn - Đào Tấn - Liễu Giai - Nguyễn Chí Thanh - Quay đầu tại gầm cầu vượt Nguyễn Chí Thanh - Nguyễn Chí Thanh - Huỳnh Thúc Kháng - Thái Hà - Chùa Bộc - Tôn Thất Tùng - Lê Trọng Tấn - Trần Điền - Định Công - Đại Kim - Nguyễn Cảnh Dị - Nguyễn Hữu Thọ - KĐT Linh Đàm - Đường Hoàng Liệt - Ngọc Hồi - Quốc lộ 1 - Cầu Ngọc Hồi - Xã Ngọc Hồi - Đường mới - Đại Áng (cổng UBND xã Đại Áng)', 'Đại Áng (Cổng UBND xã Đại Áng) - Đường mới - Xã Ngọc Hồi - Cầu Ngọc Hồi - Quốc lộ 1 - Ngọc Hồi - Giải Phóng - Quay đầu tại chùa Pháp Vân - Giải Phóng - Đường Hoàng Liệt - KĐT Linh Đàm - Nguyễn Hữu Thọ - Nguyễn Cảnh Dị - Đại Kim - Đường Định Công - Trần Điền - Lê Trọng Tấn - Tôn Thất Tùng - Chùa Bộc - Thái Hà - Huỳnh Thúc Kháng - Nguyễn Chí Thanh - Liễu Giai - Đào Tấn - Nguyễn Khánh Toàn - Nguyễn Văn Huyên - Quay đầu tại cổng Công viên Nghĩa Đô - Công viên Nghĩa Đô', 15, 20),
(13, 'CV nước Hồ Tây - HV Cảnh Sát', '06:00:00', '22:30:00', 'Công viên nước Hồ Tây - Lạc Long Quân - Hoàng Quốc Việt - Nguyễn Văn Huyên - Tô Hiệu - Trần Quốc Hoàn - Phạm Văn Đồng - Hồ Tùng Mậu - Cầu Diễn - Hoàng Công Chất - Phan Bá Vành - Cầu Noi - Học viện Cảnh sát nhân dân - Cổ Nhuế (cạnh công ty da giầy Thụy Khuê, ngã 3 đường nội bộ Khu công nghiệp Đông Á).', 'Cổ Nhuế (cạnh công ty da giầy Thụy Khuê, ngã 3 đường nội bộ Khu công nghiệp Đông Á) - Học viện Cảnh sát nhân dân - Cầu Noi - Phan Bá Vành - Hoàng Công Chất - Cầu Diễn - Quay đầu tại Trung tâm kiểm định xe máy Cầu Diễn (Đối diện chợ Cầu Diễn) - Cầu Diễn - Hồ Tùng Mậu - Phạm Văn Đồng - Trần Quốc Hoàn - Tô Hiệu - Nguyễn Văn Huyên - Hoàng Quốc Việt - Vòng xuyến Bưởi, Hoàng Quốc Việt - Bưởi - Lạc Long Quân - Công viên nước Hồ Tây.', 30, 15),
(14, 'Bờ Hồ - Cổ Nhuế', '06:00:00', '23:00:00', 'Bờ Hồ (Bãi đỗ xe Bờ Hồ) - Cầu Gỗ - Hàng Thùng - Hàng Tre - Hàng Muối - Trần Nhật Duật - Yên Phụ (Quay đầu tại số nhà 92 Yên Phụ) - Điểm trung chuyển Long Biên - Hàng Đậu - Quán Thánh - Thụy Khuê - Lạc Long Quân - Hoàng Quốc Việt - Phạm Văn Đồng - Nam Thăng Long - Đường dẫn Chân cầu Thăng Long qua KĐT Ciputra - Cổ Nhuế (Cạnh đường vào làng Nhật Tảo).', 'Cổ Nhuế (Cạnh đường vào làng Nhật Tảo) - Đường Chân cầu Thăng Long - Đường mới Chân Cầu Thăng Long (Đối diện KĐT Ciputra) - Phạm Văn Đồng - Bãi đỗ xe Nam Thăng Long - Phạm Văn Đồng - Hoàng Quốc Việt - Vòng xuyến Bưởi, Hoàng Quốc Việt - Bưởi - Hoàng Hoa Thám - cầu vượt Hoàng Hoa Thám - Hoàng Hoa Thám - Phan Đình Phùng - Hàng Đậu - Trần Nhật Duật - Nguyễn Hữu Huân - Lò Sũ - Đinh Tiên Hoàng - Bờ Hồ (Bãi đỗ xe Bờ Hồ)', 20, 10),
(15, '	BX Gia Lâm - Phố Nỉ', '06:00:00', '22:00:00', 'Bến xe Gia Lâm - Ngô Gia Khảm - Ngọc Lâm - Nguyễn Văn Cừ - Ngô Gia Tự - Cầu Đuống - Quốc Lộ 3 - Dốc Vân - Cổ Loa - Đường cải tránh Quốc lộ 3 - Quốc lộ 3 - Đông Anh - Nguyên Khê - Phủ Lỗ - Đa Phúc - Phố Nỉ (Trung tâm thương mại Bình An)', 'Phố Nỉ (Trung tâm thương mại Bình An) - Đa Phúc - Phủ Lỗ - Nguyên Khê - Đông Anh - Đường cải tránh Quốc lộ 3 - Quốc lộ 3 - Cổ Loa - Dốc Vân - Quốc lộ 3 - Cầu Đuống - Ngô Gia Tự - Nguyễn Văn Cừ - Ngô Gia Khảm - Bến xe Gia Lâm', 15, 15),
(16, 'BX Mỹ Đình - BX Nước Ngầm', '06:00:00', '22:30:00', 'Bến xe Mỹ Đình - Phạm Hùng - Quay đầu tại Đình Thôn - Phạm Hùng - Xuân Thủy - Cầu Giấy - Đường Láng - Ngã tư Sở - Trường Chinh - Ngã tư Vọng - Giải Phóng - Ngọc Hồi - Quay đầu tại đối diện công ty ABB - Ngọc Hồi - Bến xe Nước Ngầm', '	Bến xe Nước Ngầm - Ngọc Hồi - Giải Phóng - Quảng trường bến xe Giáp Bát - Giải Phóng - Phố Vọng - Ngã tư Vọng - Trường Chinh - Ngã tư Sở - Đường Láng - Cầu Giấy - Xuân Thủy - Phạm Hùng - Bến xe Mỹ Đình', 30, 15),
(17, '	Long Biên - Nội Bài', '06:30:00', '22:30:00', 'Long Biên (Đối diện Đội CSGT số 1 Hà Nội - Số 3 Trần Nhật Duật) - Trần Nhật Duật - Yên Phụ - Quay đầu tại đối diện 92 Yên Phụ - Điểm trung chuyển Long Biên - Yên Phụ - Trần Nhật Duật - Cầu Chương Dương - Nguyễn Văn Cừ - Ngô Gia Tự - Cầu Đuống - Thiên Đức - Dốc Vân - Quốc lộ 3 - Đường Cổ Loa - Cao Lỗ - Đông Anh - Quốc lộ 3 - Nguyên Khê - Phủ Lỗ - Quốc lộ 2 - Đường nối Quốc lộ 2 và đường Võ Văn Kiệt, Võ Nguyên Giáp - Võ Nguyên Giáp - Quay đầu tại điểm mở - Võ Nguyên Giáp - Võ Văn Kiệt - Sân bay Nội Bài (Sân đỗ P2, Nhà ga T1)', 'Sân bay Nội Bài (Sân đỗ P2, Nhà ga T1) - đường trục nội cảng - Trạm thu phí Sân bay Nội Bài - Võ Văn Kiệt - Quay đầu tại điểm mở đường Võ Văn Kiệt - Võ Văn Kiệt - Đường nối Quốc lộ 2 và đường Võ Văn Kiệt - Quốc lộ 2 - Phủ Lỗ - Nguyên Khê - Đông Anh - Cao Lỗ - Đường Cổ Loa - Quốc lộ 3 - Thiên Đức - Cầu Đuống - Ngô Gia Tự - Nguyễn Văn Cừ - Cầu Chương Dương - Trần Nhật Duật - Yên Phụ - Điểm trung chuyển Long Biên - Yên Phụ - Quay đầu tại đối diện 92 Yên Phụ - Trần Nhật Duật - Long Biên (Đối diện Đội CSGT số 1 Hà Nội - Số 3 Trần Nhật Duật)', 20, 20),
(18, '	CV Nghĩa Đô - Đại Áng', '05:30:00', '10:30:00', 'Công viên Nghĩa Đô - Nguyễn Văn Huyên - Nguyễn Khánh Toàn - Đào Tấn - Liễu Giai - Nguyễn Chí Thanh - Quay đầu tại gầm cầu vượt Nguyễn Chí Thanh - Nguyễn Chí Thanh - Huỳnh Thúc Kháng - Thái Hà - Chùa Bộc - Tôn Thất Tùng - Lê Trọng Tấn - Trần Điền - Định Công - Đại Kim - Nguyễn Cảnh Dị - Nguyễn Hữu Thọ - KĐT Linh Đàm - Đường Hoàng Liệt - Ngọc Hồi - Quốc lộ 1 - Cầu Ngọc Hồi - Xã Ngọc Hồi - Đường mới - Đại Áng (cổng UBND xã Đại Áng)', 'Đại Áng (Cổng UBND xã Đại Áng) - Đường mới - Xã Ngọc Hồi - Cầu Ngọc Hồi - Quốc lộ 1 - Ngọc Hồi - Giải Phóng - Quay đầu tại chùa Pháp Vân - Giải Phóng - Đường Hoàng Liệt - KĐT Linh Đàm - Nguyễn Hữu Thọ - Nguyễn Cảnh Dị - Đại Kim - Đường Định Công - Trần Điền - Lê Trọng Tấn - Tôn Thất Tùng - Chùa Bộc - Thái Hà - Huỳnh Thúc Kháng - Nguyễn Chí Thanh - Liễu Giai - Đào Tấn - Nguyễn Khánh Toàn - Nguyễn Văn Huyên - Quay đầu tại cổng Công viên Nghĩa Đô - Công viên Nghĩa Đô', 20, 20),
(19, 'Trần Khánh Dư - Đường Bảo Sơn', '05:30:00', '22:30:00', 'Bãi đỗ xe Trần Khánh Dư - Trần Khánh Dư (đường dưới) - Bệnh viện Việt Xô - Trần Khánh Dư (đường trên) - Nguyễn Khoái - Dốc cầu Vĩnh Tuy - Vĩnh Tuy - Minh Khai - Đại La - Ngã tư Vọng - Trường Chinh - Đường Láng - Quay đầu tại đối diện số nhà 124 đường Láng - Đường Láng - Ngã tư Sở - Nguyễn Trãi - Trần Phú (Hà Đông) - Quang Trung (Hà Đông) - Vạn Phúc - Tố Hữu - Lê Trọng Tấn - Thiên Đường Bảo Sơn.', 'Thiên Đường Bảo Sơn - Lê Trọng Tấn - Tố Hữu - Vạn Phúc - Quang Trung (Hà Đông) - Trần Phú (Hà Đông) - Nguyễn Trãi - Ngã Tư Sở - Trường Chinh - Ngã tư Vọng - Đại La - Minh Khai - Vĩnh Tuy - quay đầu tại nút giao Vĩnh Tuy và đường dẫn lên đê Nguyễn Khoái - Vĩnh Tuy - Minh Khai - Nguyễn Khoái - Trần Khánh Dư (đường dưới) - Bệnh viện Việt Xô - Trần Khánh Dư (đường trên) - Bãi đỗ xe Trần Khánh Dư', 30, 10),
(20, 'Cầu Giấy - Phùng', '05:30:00', '22:30:00', 'Bãi đỗ xe Cầu Giấy - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Xuân Thủy - Hồ Tùng Mậu - Cầu Diễn - Nhổn - Trạm trung chuyển xe buýt Nhổn - Trôi - Phùng (Bến xe Đan Phượng)', 'Phùng (Bến xe Đan Phượng) - Quốc lộ 32 - Quay đầu tại ngã ba tượng đài liệt sĩ - Quốc lộ 32 - Trôi - Nhổn - Trạm trung chuyển xe buýt Nhổn - Cầu Diễn - Hồ Tùng Mậu - Xuân Thủy - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Trường ĐHGTVT) - Cầu Giấy (đường dưới) - Bãi đỗ xe Cầu Giấy', 20, 15),
(21, 'BX Giáp Bát - BX Yên Nghĩa', '05:30:00', '23:00:00', 'Bến xe Giáp Bát - Giải Phóng - Phố Vọng - Giải Phóng - Xã Đàn - Phạm Ngọc Thạch - Chùa Bộc - Tây Sơn - Ngã tư Sở - Nguyễn Trãi - Trần Phú (Hà Đông) - Quang Trung (Hà Đông) - Ba La - Quốc Lộ 6 - Bến xe Yên Nghĩa.', 'Bến xe Yên Nghĩa - Quốc Lộ 6 - Ba La - Quang Trung (Hà Đông) - Trần Phú (Hà Đông) - Nguyễn Trãi - Ngã tư Sở - Tây Sơn - Chùa Bộc - Phạm Ngọc Thạch - Đào Duy Anh - Giải Phóng - Ngã tư Vọng - Ngã 3 Đuôi Cá - Bến xe Giáp Bát', 15, 20),
(22, '	BX Gia Lâm - Kim Mã', '06:00:00', '11:00:00', 'Bến xe Gia Lâm - Ngô Gia Khảm - Ngọc Lâm - Nguyễn Văn Cừ - Cầu Chương Dương - Trần Nhật Duật - Yên Phụ (Quay đầu tại đối diện số nhà 92 Yên Phụ) - Điểm trung chuyển Long Biên - Hàng Đậu - Quán Thánh - Nguyễn Biểu - Hoàng Diệu - Trần Phú - Kim Mã (Tòa nhà PTA Kim Mã)', 'Kim Mã (Tòa nhà PTA Kim Mã) - Giảng Võ - Giang Văn Minh - Kim Mã - Nguyễn Thái Học - Hoàng Diệu - Phan Đình Phùng - Hàng Đậu - Long Biên - Trần Nhật Duật - Cầu Chương Dương - Nguyễn Văn Cừ - Nguyễn Sơn - Ngọc Lâm - Ngô Gia Khảm - Bến xe Gia Lâm', 30, 20),
(23, 'Nguyễn Công Trứ - Nguyễn Công Trứ', '07:00:00', '22:00:00', 'Điểm đỗ xe buýt 32 Nguyễn Công Trứ - Nguyễn Công Trứ - Phố Huế - Tuệ Tĩnh - Bà Triệu - Lê Đại Hành - Hoa Lư - Đại Cồ Việt - Quay đầu tại đối diện số nhà 100 Đại Cồ Việt - Đại Cồ Việt - Tạ Quang Bửu - Lê Thanh Nghị - Giải Phóng - Phương Mai - Lương Đình Của - Đông Tác - Chùa Bộc - Tây Sơn - Quay đầu tại đối diện số nhà 127 Tây Sơn - Tây Sơn - Đặng Tiến Đông - Trần Quang Diệu - Hoàng Cầu - Đê La Thành - Giảng Võ - Cát Linh - Tôn Đức Thắng - Nguyễn Thái Học - Cửa Nam - Phùng Hưng - Lê Văn Linh - Phùng Hưng (đường trong) - Phan Đình Phùng - Hàng Đậu - Long Biên - Trần Nhật Duật - Nguyễn Hữu Huân - Lý Thái Tổ - Ngô Quyền - Hai Bà Trưng - Lê Thánh Tông - Trần Hưng Đạo - Phan Huy Chú - Hàn Thuyên - Lê Văn Hưu - Ngô Thì Nhậm - Điểm đỗ xe buýt 32 Nguyễn Công Trứ', 'Điểm đỗ xe buýt 32 Nguyễn Công Trứ - Nguyễn Công Trứ - Lò Đúc - Phan Chu Trinh - Trần Hưng Đạo - Lê Thánh Tông - Lý Thái Tổ - Ngô Quyền - Hàng Vôi - Hàng Tre - Hàng Muối - Trần Nhật Duật - Điểm trung chuyển Long Biên - Yên Phụ - Hàng Than - Quán Thánh - Hoè Nhai - Phan Đình Phùng - Lý Nam Đế - Trần Phú - Chu Văn An - Tôn Đức Thắng - Cát Linh - Giảng Võ - Đê La Thành - Hoàng Cầu - Trần Quang Diệu - Đặng Tiến Đông - Tây Sơn - Chùa Bộc - Phạm Ngọc Thạch - Lương Định Của - Phương Mai - Giải Phóng - Quay đầu tại gầm cầu vượt Ngã Tư Vọng - Lê Thanh Nghị - Tạ Quang Bửu - Đại Cồ Việt - Quay đầu tại đối diện số nhà 36 Đại Cồ Việt - Đại Cồ Việt - Hoa Lư - Lê Đại Hành - Thái Phiên - Phố Huế - Nguyễn Công Trứ - Điểm đỗ xe buýt 32 Nguyễn Công Trứ', 15, 15),
(24, 'Long Biên - Ngã Tư Sở - Cầu Giấy', '05:30:00', '22:30:00', 'Long Biên (Điểm trung chuyển Long Biên - Khoang E3.2) - Trần Nhật Duật - Trần Quang Khải - Trần Khánh Dư - Trung chuyển xe buýt Trần Khánh Dư - Nguyễn Khoái - Minh Khai - Đại La - Trường Chinh - Ngã tư Sở - Đường Láng - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Trường ĐHGTVT) - Cầu Giấy (đường dưới) - Bãi đỗ xe Cầu Giấy.', '\nBãi đỗ xe Cầu Giấy - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Đường Láng - Trường Chinh - Đại La - Minh Khai - Nguyễn Khoái - Trần Khánh Dư - Trần Quang Khải - Trần Nhật Duật - Long Biên - Điểm trung chuyển Long Biên - Quay đầu tại đối diện 92 Yên Phụ - Điểm trung chuyển Long Biên (Khoang E3.2)', 15, 20),
(25, 'BX Nam Thăng Long - BX Giáp Bát', '06:00:00', '23:00:00', 'Bãi đỗ xe Nam Thăng Long - Phạm Văn Đồng - Nguyễn Hoàng Tôn - Lạc Long Quân - Đường Bưởi dưới (Đường bên sông Tô Lịch) - Đào Tấn - Liễu Giai - Kim Mã - Giảng Võ - Quay đầu tại 138 Giảng Võ - Giảng Võ - Cát Linh - Tôn Đức Thắng - Ô Chợ Dừa - Quay đầu tại điểm mở dải phân cách - Ô Chợ Dừa - Xã Đàn - Phạm Ngọc Thạch - Đào Duy Anh - Giải Phóng - Ngã 3 Đuôi Cá - Giải Phóng - Bến xe Giáp Bát', 'Bến xe Giáp Bát - Giải Phóng - Xã Đàn - Nguyễn Lương Bằng - Ô Chợ Dừa - Tôn Đức Thắng - Cát Linh - Giảng Võ - Núi Trúc - Kim Mã - Kim Mã (đường dưới, cạnh BĐX Ngọc Khánh) - Liễu Giai - Đào Tấn - Đường Bưởi (đường dưới bên nút giao Đội Cấn) - Lạc Long Quân - Nguyễn Hoàng Tôn - Phạm Văn Đồng - Gầm cầu Thăng Long - Xóm 1 Đông Ngạc - Tân Xuân - Phạm Văn Đồng - Bãi đỗ xe Nam Thăng Long', 20, 10),
(26, 'Mai Động - SVĐ Mỹ Đình', '06:00:00', '22:00:00', 'Mai Động (Đường vào XN buýt Thăng Long cũ, trước cầu tạm Benley, gần bãi đỗ xe Đền Lừ 2) - Nguyễn Tam Trinh - Cầu Mai Động - Kim Ngưu - Thanh Nhàn - Lê Thanh Nghị - Giải Phóng - Xã Đàn - Phạm Ngọc Thạch - Chùa Bộc - Thái Hà - Huỳnh Thúc Kháng - Nguyễn Chí Thanh - Đê La Thành - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Xuân Thuỷ - Hồ Tùng Mậu - Quay đầu tại cổng nghĩa trang Mai Dịch - Hồ Tùng Mậu - Lê Đức Thọ - Sân vận động Quốc Gia.', 'Sân vận động Quốc Gia - Lê Đức Thọ - Hồ Tùng Mậu - Xuân Thủy - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Trường ĐHGTVT) - Cầu Giấy (đường dưới) - Đê La Thành - Nguyễn Chí Thanh - Quay đầu tại gầm cầu vượt Nguyễn Chí Thanh, Trần Duy Hưng - Nguyễn Chí Thanh - Huỳnh Thúc Kháng - Thái Hà - Chùa Bộc - Phạm Ngọc Thạch - Đào Duy Anh - Xã Đàn - Đường trên hầm Kim Liên - Đại Cồ Việt - Trần Đại Nghĩa - Lê Thanh Nghị - Thanh Nhàn - Kim Ngưu - Tam Trinh - Cầu Ku1 - Nguyễn Tam Trinh - Mai Động (Đường vào XN buýt Thăng Long cũ, qua cầu tạm Benley, gần bãi đỗ xe Đền Lừ 2).', 20, 20),
(27, 'BX Yên Nghĩa - BX Nam Thăng Long', '06:30:00', '22:30:00', 'Bến xe Yên Nghĩa - Quốc Lộ 6 - Ba La - Quang Trung (Hà Đông) - Trần Phú (Hà Đông) - Nguyễn Trãi - Đường Láng - Nguyễn Chí Thanh - Kim Mã - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Trần Đăng Ninh - Nguyễn Phong Sắc - Trần Quốc Hoàn - Phạm Văn Đồng - Đỗ Nhuận - Nam Thăng Long (Bãi đỗ xe buýt Nam Thăng Long).', '\nNam Thăng Long (Bãi đỗ xe buýt Nam Thăng Long) - Phạm Văn Đồng - Hoàng Quốc Việt - Điểm trung chuyển Hoàng Quốc Việt - Phạm Tuấn Tài - Trần Quốc Hoàn - Nguyễn Phong Sắc - Trần Đăng Ninh - Cầu Giấy - Cầu Giấy (đường dưới) - Điểm trung chuyển Cầu Giấy (hè trước tường rào Trường ĐHGTVT) - Cầu Giấy (đường dưới) - Kim Mã - Nguyễn Chí Thanh - Đường Láng - Nguyễn Trãi - Trần Phú (Hà Đông) - Quang Trung (Hà Đông) - Ba La - Quốc Lộ 6 - Bến xe Yên Nghĩa.', 30, 15),
(28, 'BX Giáp Bát - Đại Học Mỏ', '05:30:00', '22:30:00', 'Bến xe Giáp Bát - Giải Phóng - Xã Đàn - Ô Chợ Dừa - Hoàng Cầu - Giảng Võ - Ngọc Khánh - Kim Mã - Quay đầu tại số nhà 295 Kim Mã - Kim Mã - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Trần Đăng Ninh - Nguyễn Khánh Toàn - đường mới (cạnh công viên Nghĩa Đô) - Chùa Hà - Tô Hiệu - Nguyễn Phong Sắc - Trần Cung - Phạm Văn Đồng - Tân Xuân - chân cầu Thăng Long (Tân Xuân) - Hoàng Tăng Bí - Đức Thắng - Đại học Mỏ Địa Chất (Phố Viên, điểm đầu cuối tuyến 31).', 'Đại học Mỏ Địa Chất (Phố Viên, điểm đầu cuối tuyến 31) - Phố Viên - Đức Thắng - Hoàng Tăng Bí - chân cầu Thăng Long (Tân Xuân) - Tân Xuân - Phạm Văn Đồng - Bãi đỗ xe Nam Thăng Long - Phạm Văn Đồng - Trần Cung - Nguyễn Phong Sắc - Tô Hiệu - Chùa Hà - Trần Đăng Ninh - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Trường ĐHGTVT) - Cầu Giấy (đường dưới) - Cầu Giấy - Kim Mã - Ngọc Khánh - Giảng Võ - Hoàng Cầu - Ô Chợ Dừa - Xã Đàn - Phạm Ngọc Thạch - Đào Duy Anh - Giải Phóng - Ngã 3 Đuôi Cá - Giải Phóng - Bến xe Giáp Bát.', 15, 25),
(29, 'BX Giáp Bát - Tân Lập', '06:30:00', '22:30:00', 'Bến xe Giáp Bát - Giải Phóng - Kim Đồng - Giải Phóng - Nguyễn Hữu Thọ - Cầu Dậu - Nghiêm Xuân Yêm - Nguyễn Xiển - Nguyễn Trãi - Quay đầu tại đối diện 241 Nguyễn Trãi - Nguyễn Trãi - Nguyễn Tuân - Hoàng Minh Giám - Nguyễn Chánh - Vòng xuyến Nguyễn Chánh, Nam Trung Yên - Nguyễn Chánh - Dương Đình Nghệ - Phạm Hùng - Hồ Tùng Mậu - Đường Cầu Diễn - Quốc lộ 32 - Nhổn - Quốc lộ 32 - Ngã 4 Trạm Trôi - Tân Lập - Tân Lập (Sân bóng xã Tân Lập)', 'Tân Lập (Sân bóng xã Tân Lập) - Tân Lập - Ngã 4 Trạm Trôi - Quốc lộ 32 - Nhổn - Quốc lộ 32 - Đường Cầu Diễn - Hồ Tùng Mậu - Phạm Hùng - Quay đầu tại Landmark 72 - Phạm Hùng - Dương Đình Nghệ - Nguyễn Chánh - Vòng xuyến Nguyễn Chánh, Nam Trung Yên - Nguyễn Chánh - Hoàng Minh Giám - Lê Văn Lương - Hoàng Đạo Thúy - Ngụy Như Kom Tum - Vũ Trọng Phụng - Nguyễn Trãi - Nguyễn Xiển - Nghiêm Xuân Yêm - Cầu Dậu - Nguyễn Hữu Thọ - Giải Phóng - Quay đầu tại chùa Pháp Vân - Giải Phóng - Bến xe Giáp Bát', 20, 12),
(30, 'Mai Động - BX Mỹ Đình', '06:30:00', '22:30:00', 'Mai Động (Đường vào XN buýt Thăng Long cũ, trước cầu tạm Benley, gần bãi đỗ xe Đền Lừ 2) - Nguyễn Tam Trinh - Kim Ngưu - Lò Đúc - Trần Xuân Soạn - Trần Nhân Tông - Lê Duẩn - Khâm Thiên - Đường mới (Vành đai 1) - Hoàng Cầu - Thái Hà - Láng Hạ - Lê Văn Lương - Hoàng Minh Giám – Nguyễn Chánh – vòng xuyến Nguyễn Chánh, Nam Trung Yên – Nguyễn Chánh – Dương Đình Nghệ - Phạm Hùng - Quay đầu trước Bến xe Mỹ Đình - Bến xe Mỹ Đình.', 'Bến xe Mỹ Đình - Phạm Hùng - Quay đầu tại đối diện Landmark 72 - Phạm Hùng - Dương Đình Nghê – Nguyễn Chánh - vòng xuyến Nguyễn Chánh, Nam Trung Yên - Nguyễn Chánh – Hoàng Minh Giám - Lê Văn Lương - Láng Hạ - Thái Hà - rẽ phải vào Yên Lãng - Quay đầu tại điểm mở dải phân cách - Yên Lãng - Hoàng Cầu - Ô Chợ Dừa - Xã Đàn - Quay đầu tại đối diện ngõ Xã Đàn 2 - Xã Đàn - Khâm Thiên - Lê Duẩn - Trần Nhân Tông - Trần Xuân Soạn - Ngô Thì Nhậm - Nguyễn Công Trứ - Lò Đúc - Trần Khát Chân - Quay đầu tại đối diện số nhà 274 Trần Khát Chân - Trần Khát Chân - Kim Ngưu - Tam Trinh - Cầu Ku1 - Nguyễn Tam Trinh - Mai Động (Đường vào XN buýt Thăng Long cũ, qua cầu tạm Benley, gần bãi đỗ xe Đền Lừ 2)', 12, 20),
(31, 'Bách Khoa - ĐH Mỏ', '06:30:00', '22:30:00', 'Đại học Bách Khoa - Trần Đại Nghĩa - Lê Thanh Nghị - Tạ Quang Bửu - Đại Cồ Việt - Phố Huế - Hàng Bài - Lý Thường Kiệt - Phan Chu Trinh - Lý Thái Tổ - Ngô Quyền - Hàng Vôi - Hàng Tre - Hàng Muối - Trần Nhật Duật - Điểm trung chuyển Long Biên - Yên Phụ - Nghi Tàm - Âu Cơ - Nhật Tân - An Dương Vương - Phú Thượng - Dốc Chèm - Đường Đông Ngạc (69) - Chèm (Đại học Mỏ)', 'Chèm (Đại học Mỏ) - Đường 69 - Đường Thuỵ Phương - Đường Đông Ngạc - Tân Xuân - An Dương Vương - Âu Cơ - Nghi Tàm - Yên Phụ (đường dành riêng cho xe buýt) - Điểm trung chuyển Long Biên - Hàng Đậu - Quán Thánh - Hàng Cót - Hàng Lược - Chả Cá - Hàng Cân - Lương Văn Can - Hàng Gai - Hàng Trống - Lê Thái Tổ - Bà Triệu - Đại Cồ Việt - Quay đầu tại đối diện số nhà 100 Đại Cồ Việt - Đại Cồ Việt - Tạ Quang Bửu - Lê Thanh Nghị - Trần Đại Nghĩa - Đại học Bách Khoa', 15, 16),
(32, '	BX Giáp Bát - Nhổn', '06:30:00', '21:30:00', 'Bến xe Giáp Bát - Giải Phóng - Lê Duẩn - Trần Nhân Tông - Trần Bình Trọng - Trần Hưng Đạo - Quán Sứ - Hai Bà Trưng - Thợ Nhuộm - Tràng Thi - Điện Biên Phủ - Trần Phú - Kim Mã - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Xuân Thuỷ - Hồ Tùng Mậu - Diễn - Đường 32 - Quay đầu tại ngã tư Nhổn - Phố Nhổn - Nhổn (điểm trung chuyển Nhổn).', 'Nhổn (điểm trung chuyển Nhổn) - Đường 32 - Diễn - Hồ Tùng Mậu - Xuân Thuỷ - Cầu Giấy - Cầu Giấy (đường dưới) - Điểm trung chuyển Cầu Giấy (hè trước tường rào Trường ĐHGTVT) - Cầu Giấy (đường dưới) - Kim Mã - Nguyễn Thái Học - Lê Duẩn - Giải Phóng - Ngã 3 Đuôi Cá - Bến xe Giáp Bát.', 30, 12),
(33, '	BX Yên Nghĩa - Xuân Đỉnh', '05:30:00', '22:30:00', 'Bến xe Yên Nghĩa - Quốc lộ 6 - Quang Trung (Hà Đông) - Trần Phú (Hà Đông) - Nguyễn Trãi - Khuất Duy Tiến - Phạm Hùng - Phạm Văn Đồng - Hoàng Quốc Việt - ĐTC Hoàng Quốc Việt - Hoàng Quốc Việt - Bưởi - Lạc Long Quân - Xuân La - Xuân Đỉnh (Trường ĐH Nội Vụ Hà Nội).', 'Xuân Đỉnh (Trường ĐH Nội Vụ Hà Nội) - Xuân La - Lạc Long Quân - Hoàng Quốc Việt - ĐTC Hoàng Quốc Việt - Phạm Văn Đồng - Phạm Hùng - Bến xe Mỹ Đình - Phạm Hùng - Khuất Duy Tiến - Nguyễn Trãi - Trần Phú (Hà Đông) - Quang Trung (Hà Đông) - Quốc lộ 6 - Bến xe Yên Nghĩa', 15, 20),
(34, 'BX Mỹ Đình - BX Gia Lâm', '05:30:00', '22:30:00', 'Bến xe Mỹ Đình - Phạm Hùng - Xuân Thủy - Cầu Giấy - Cầu Giấy (đường dưới) - Điểm trung chuyển Cầu Giấy (hè trước tường rào Trường ĐHGTVT) - Cầu Giấy (đường dưới) - Kim Mã - Nguyễn Thái Học - Phan Bội Châu - Lý Thường Kiệt - Quang Trung - Hai Bà Trưng - Phan Chu Trinh - Lý Thái Tổ - Ngô Quyền - Hàng Vôi - Hàng Tre - Hàng Muối - Trần Nhật Duật - Long Biên (Điểm quay đầu trước phố Hàng Khoai) - Nguyễn Văn Cừ - Nguyễn Sơn - Ngọc Lâm - Ngô Gia Khảm - Bến xe Gia Lâm.', 'Bến xe Gia Lâm - Ngô Gia Khảm - Ngọc Lâm - Nguyễn Văn Cừ - Long Biên (Điểm quay đầu trước phố Hàng Khoai) - Trần Nhật Duật - Trần Quang Khải - Tràng Tiền - Ngô Quyền - Hai Bà Trưng - Thợ Nhuộm - Điện Điên Phủ - Trần Phú - Kim Mã - Cầu Giấy - Điểm trung chuyển Cầu Giấy (hè trước tường rào Vườn thú Hà Nội) - Cầu Giấy - Xuân Thủy - Phạm Hùng - Bến xe Mỹ Đình', 20, 12),
(35, 'Trần Khánh Dư - Nam Thăng Long', '05:30:00', '22:30:00', 'Trần Khánh Dư - Trần Hưng Đạo - Bà Triệu - Đại Cồ Việt - Hầm Kim Liên - Xã Đàn - Phạm Ngọc Thạch - Chùa Bộc - Thái Hà - Huỳnh Thúc Kháng - Nguyễn Chí Thanh - Quay đầu tại đối diện tòa nhà Vincom Nguyễn Chí Thanh - Nguyễn Chí Thanh - Trần Duy Hưng - Phạm Hùng - Phạm Văn Đồng - Đỗ Nhuận - Nam Thăng Long.', 'Nam Thăng Long - Phạm Văn Đồng - Phạm Hùng - Trần Duy Hưng - Nguyễn Chí Thanh - Huỳnh Thúc Kháng - Thái Hà - Chùa Bộc - Phạm Ngọc Thạch - Đào Duy Anh - Hoàng Tích Trí - Xã Đàn - Hầm Kim Liên - Đại Cồ Việt - Phố Huế - Hàng Bài - Trần Hưng Đạo - Phan Chu Trinh - Tràng Tiền - ĐTC Trần Khánh Dư.', 20, 25),
(36, 'Yên Phụ - Linh Đàm', '06:00:00', '22:30:00', 'Yên Phụ (Điểm trung chuyển Long Biên) - Hàng Đậu - Hàng Cót - Hàng Gà - Hàng Điếu - Đường Thành - Phủ Doãn - Triệu Quốc Đạt - Hai Bà Trưng - Bà Triệu - Lê Đại Hành - Đại Cồ Việt - Bạch Mai - Trương Định - Kim Đồng - Giải Phóng - Nguyễn Hữu Thọ - Nguyễn Duy Trinh - Khu đô thị Linh Đàm', 'Khu đô thị Linh Đàm - Nguyễn Duy Trinh - Nguyễn Hữu Thọ - Giải Phóng - Quay đầu tại chùa Pháp Vân - Giải Phóng - Trương Định - Bạch Mai - Phố Huế - Hàng Bài - Hai Bà Trưng - TRiệu Quốc Đạt - Phủ Doãn - Đường Thành - Phùng Hưng - Phùng Hưng ( đường trong) - Phan Đình Phùng - Hàng Đậu - Trần Nhật Duật - Quay đầu tại đầu phố Hàng Khoai - Trần Nhật Duật - Điểm trung chuyển Long Biên - Quay đầu tại đối diện 92 Yên Phụ - Yên Phụ - Yên Phụ (điểm trung chuyển Long Biên)', 20, 21);

-- --------------------------------------------------------

--
-- Table structure for table `vengay`
--

CREATE TABLE `vengay` (
  `mavn` int(6) UNSIGNED NOT NULL,
  `tenvn` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dongia` int(11) NOT NULL,
  `matuyen` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vengay`
--

INSERT INTO `vengay` (`mavn`, `tenvn`, `dongia`, `matuyen`) VALUES
(1, 'Vé phổ thông', 7000, 1),
(2, 'Vé phổ thông', 7000, 2),
(3, 'Vé phổ thông', 7000, 3),
(4, 'Vé phổ thông', 7000, 4),
(5, 'Vé phổ thông', 7000, 5),
(6, 'Vé phổ thông', 7000, 6),
(7, 'Vé phổ thông', 7000, 7),
(8, 'Vé phổ thông', 7000, 8),
(9, 'Vé phổ thông', 7000, 9),
(10, 'Vé phổ thông', 7000, 10),
(11, 'Vé phổ thông', 7000, 11),
(12, 'Vé tuyến 103', 9000, 12),
(13, 'Vé phổ thông', 7000, 13),
(14, 'Vé phổ thông', 7000, 14),
(15, 'Vé phổ thông', 7000, 15),
(16, 'Vé phổ thông', 7000, 16),
(17, 'Vé phổ thông', 7000, 17),
(18, 'Vé đặc biệt', 9000, 18),
(19, 'Vé phổ thông', 7000, 19),
(20, 'Vé đặc biệt', 9000, 20),
(21, 'Vé phổ thông', 7000, 21),
(22, 'Vé phổ thông', 7000, 22),
(23, 'Vé phổ thông', 7000, 23),
(24, 'Vé phổ thông', 7000, 24),
(25, 'Vé đặc biệt', 9000, 25),
(26, 'Vé phổ thông', 7000, 26),
(27, 'Vé phổ thông', 7000, 27),
(28, 'Vé phổ thông', 7000, 28),
(29, 'Vé đặc biệt', 9000, 29),
(30, 'Vé phổ thông', 7000, 30),
(31, 'Vé phổ thông', 7000, 31),
(32, 'Vé phổ thông', 7000, 32),
(33, 'Vé đặc biệt', 9000, 33),
(34, 'Vé phổ thông', 7000, 34),
(35, 'Vé đặc biệt', 9000, 35),
(36, 'Vé phổ thông', 7000, 36);

-- --------------------------------------------------------

--
-- Table structure for table `vethang`
--

CREATE TABLE `vethang` (
  `mavt` int(6) UNSIGNED NOT NULL,
  `tenvt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dongia` int(11) NOT NULL,
  `ghichu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vethang`
--

INSERT INTO `vethang` (`mavt`, `tenvt`, `dongia`, `ghichu`) VALUES
(1, 'Ưu tiên liên tuyến', 100000, 'Dành cho sinh viên'),
(2, 'Vé 1 tuyến', 50000, 'Dành cho sinh viên'),
(3, 'Vé 1 tuyến', 200000, 'Vé phổ thông'),
(4, 'Ưu tiên liên tuyến', 150000, 'Dành cho công nhân viên chức'),
(5, 'Ưu tiên liên tuyến', 100000, 'No comment'),
(7, '121212', 12, '12');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `bienso` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hangsx` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `namsx` year(4) NOT NULL,
  `nhacc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `soghe` int(11) NOT NULL,
  `matuyen` int(4) UNSIGNED NOT NULL,
  `anhxe` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`bienso`, `hangsx`, `namsx`, `nhacc`, `soghe`, `matuyen`, `anhxe`) VALUES
('001', 'Toyota', 2000, 'Trường Hải', 32, 1, '01.PNG'),
('002', '1122', 2011, '11', 11, 2, '01.PNG'),
('003', 'HuynDai', 2000, 'CTCP Vinh Phú', 22, 3, '01.PNG'),
('004', 'Toyota', 2001, 'Trường Hải', 30, 4, '01.PNG'),
('005', 'HuynDai', 2005, 'Trường Hải', 32, 5, '01.PNG'),
('006', 'Toyota', 2000, 'Trường Hải', 32, 6, '01.PNG'),
('007', 'HuynDai', 2005, 'Trường Hải', 32, 7, '01.PNG'),
('008', 'Toyota', 2000, 'Trường Hải', 30, 8, '01.PNG'),
('009', 'HuynDai', 2005, 'Trường Hải', 32, 9, '01.PNG'),
('010', 'Toyota', 2000, 'Trường Hải', 30, 10, '01.PNG'),
('011', 'HuynDai', 2005, 'Trường Hải', 32, 11, '01.PNG'),
('012', 'Toyota', 2000, 'Trường Hải', 30, 12, '01.PNG'),
('013', 'HuynDai', 2005, 'Trường Hải', 32, 13, '01.PNG'),
('014', 'Toyota', 2000, 'Trường Hải', 30, 14, '01.PNG'),
('015', 'HuynDai', 2005, 'Trường Hải', 32, 15, '01.PNG'),
('016', 'Toyota', 2000, '	Trường Hải', 32, 16, '01.PNG'),
('017', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 17, '01.PNG'),
('018', 'Toyota', 2000, 'Trường Hải', 32, 18, '01.PNG'),
('019', 'HuynDai', 2005, 'CTCP Vinh Phú	', 30, 19, '01.PNG'),
('020', 'HuynDai', 2005, 'Trường Hải', 30, 20, '01.PNG'),
('021', 'Toyota', 2000, 'Trường Hải', 30, 21, '01.PNG'),
('022', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 22, '01.PNG'),
('023', 'Toyota', 2000, 'Trường Hải', 32, 23, '01.PNG'),
('024', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 24, '01.PNG'),
('025', 'Toyota', 2000, 'Trường Hải', 30, 25, '01.PNG'),
('026', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 26, '01.PNG'),
('027', 'Toyota', 2000, 'Trường Hải', 30, 27, '01.PNG'),
('028', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 28, '01.PNG'),
('029', 'Toyota', 2000, 'Trường Hải', 30, 29, '01.PNG'),
('030', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 30, '01.PNG'),
('031', 'Toyota', 2000, 'Trường Hải', 30, 31, '01.PNG'),
('032', 'Toyota', 2000, 'Trường Hải', 30, 32, '01.PNG'),
('033', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 33, '01.PNG'),
('034', 'Toyota', 2000, 'Trường Hải', 30, 34, '01.PNG'),
('035', 'HuynDai', 2005, 'CTCP Vinh Phú', 30, 35, '01.PNG'),
('036', 'Toyota', 2000, 'Trường Hải', 32, 36, '01.PNG'),
('1221', '212', 0000, '12121', 12121, 17, '01.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banvengay`
--
ALTER TABLE `banvengay`
  ADD PRIMARY KEY (`magdvn`),
  ADD KEY `mapx` (`mapx`),
  ADD KEY `mavn` (`mavn`);

--
-- Indexes for table `banvethang`
--
ALTER TABLE `banvethang`
  ADD PRIMARY KEY (`magdvt`),
  ADD KEY `manvbvt` (`manvbvt`),
  ADD KEY `mavt` (`mavt`);

--
-- Indexes for table `datve`
--
ALTER TABLE `datve`
  ADD PRIMARY KEY (`madv`),
  ADD KEY `id` (`id`),
  ADD KEY `mavt` (`mavt`);

--
-- Indexes for table `diembvt`
--
ALTER TABLE `diembvt`
  ADD PRIMARY KEY (`madbvt`);

--
-- Indexes for table `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `matuyen` (`matuyen`),
  ADD KEY `bienso` (`bienso`),
  ADD KEY `matx` (`matx`),
  ADD KEY `mapx` (`mapx`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvienbvt`
--
ALTER TABLE `nhanvienbvt`
  ADD PRIMARY KEY (`manvbvt`),
  ADD KEY `madbvt` (`madbvt`);

--
-- Indexes for table `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`maph`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `phuxe`
--
ALTER TABLE `phuxe`
  ADD PRIMARY KEY (`mapx`),
  ADD KEY `matuyen` (`matuyen`);

--
-- Indexes for table `taixe`
--
ALTER TABLE `taixe`
  ADD PRIMARY KEY (`matx`),
  ADD KEY `matuyen` (`matuyen`);

--
-- Indexes for table `tuyen`
--
ALTER TABLE `tuyen`
  ADD PRIMARY KEY (`matuyen`);

--
-- Indexes for table `vengay`
--
ALTER TABLE `vengay`
  ADD PRIMARY KEY (`mavn`),
  ADD KEY `matuyen` (`matuyen`);

--
-- Indexes for table `vethang`
--
ALTER TABLE `vethang`
  ADD PRIMARY KEY (`mavt`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`bienso`),
  ADD KEY `matuyen` (`matuyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banvengay`
--
ALTER TABLE `banvengay`
  MODIFY `magdvn` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `banvethang`
--
ALTER TABLE `banvethang`
  MODIFY `magdvt` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datve`
--
ALTER TABLE `datve`
  MODIFY `madv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diembvt`
--
ALTER TABLE `diembvt`
  MODIFY `madbvt` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `mahd` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nhanvienbvt`
--
ALTER TABLE `nhanvienbvt`
  MODIFY `manvbvt` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `maph` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phuxe`
--
ALTER TABLE `phuxe`
  MODIFY `mapx` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `taixe`
--
ALTER TABLE `taixe`
  MODIFY `matx` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tuyen`
--
ALTER TABLE `tuyen`
  MODIFY `matuyen` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vengay`
--
ALTER TABLE `vengay`
  MODIFY `mavn` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vethang`
--
ALTER TABLE `vethang`
  MODIFY `mavt` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banvengay`
--
ALTER TABLE `banvengay`
  ADD CONSTRAINT `banvengay_ibfk_1` FOREIGN KEY (`mapx`) REFERENCES `phuxe` (`mapx`),
  ADD CONSTRAINT `banvengay_ibfk_2` FOREIGN KEY (`mavn`) REFERENCES `vengay` (`mavn`);

--
-- Constraints for table `banvethang`
--
ALTER TABLE `banvethang`
  ADD CONSTRAINT `banvethang_ibfk_1` FOREIGN KEY (`manvbvt`) REFERENCES `nhanvienbvt` (`manvbvt`),
  ADD CONSTRAINT `banvethang_ibfk_2` FOREIGN KEY (`mavt`) REFERENCES `vethang` (`mavt`);

--
-- Constraints for table `datve`
--
ALTER TABLE `datve`
  ADD CONSTRAINT `datve_ibfk_1` FOREIGN KEY (`id`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `datve_ibfk_2` FOREIGN KEY (`mavt`) REFERENCES `vethang` (`mavt`);

--
-- Constraints for table `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD CONSTRAINT `hoatdong_ibfk_1` FOREIGN KEY (`matuyen`) REFERENCES `tuyen` (`matuyen`),
  ADD CONSTRAINT `hoatdong_ibfk_2` FOREIGN KEY (`bienso`) REFERENCES `xe` (`bienso`),
  ADD CONSTRAINT `hoatdong_ibfk_3` FOREIGN KEY (`matx`) REFERENCES `taixe` (`matx`),
  ADD CONSTRAINT `hoatdong_ibfk_4` FOREIGN KEY (`mapx`) REFERENCES `phuxe` (`mapx`);

--
-- Constraints for table `nhanvienbvt`
--
ALTER TABLE `nhanvienbvt`
  ADD CONSTRAINT `nhanvienbvt_ibfk_1` FOREIGN KEY (`madbvt`) REFERENCES `diembvt` (`madbvt`);

--
-- Constraints for table `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `phanhoi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `nguoidung` (`id`);

--
-- Constraints for table `phuxe`
--
ALTER TABLE `phuxe`
  ADD CONSTRAINT `phuxe_ibfk_1` FOREIGN KEY (`matuyen`) REFERENCES `tuyen` (`matuyen`);

--
-- Constraints for table `taixe`
--
ALTER TABLE `taixe`
  ADD CONSTRAINT `taixe_ibfk_1` FOREIGN KEY (`matuyen`) REFERENCES `tuyen` (`matuyen`);

--
-- Constraints for table `vengay`
--
ALTER TABLE `vengay`
  ADD CONSTRAINT `vengay_ibfk_1` FOREIGN KEY (`matuyen`) REFERENCES `tuyen` (`matuyen`);

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`matuyen`) REFERENCES `tuyen` (`matuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
