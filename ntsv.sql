-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2021 lúc 05:08 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ntsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(32) NOT NULL,
  `createad_time` datetime NOT NULL,
  `lastupdate_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `pass_admin`, `createad_time`, `lastupdate_time`) VALUES
(1, 'adminchinh', 'e10adc3949ba59abbe56e057f20f883e', '2020-12-01 13:47:28', '2020-12-20 13:47:19'),
(2, 'admin0170', '25f9e794323b453885f5181f1b624d0b', '2020-12-20 09:33:27', '2020-12-20 15:33:27'),
(9, 'admin13', 'e10adc3949ba59abbe56e057f20f883e', '2021-05-01 21:34:33', '2021-05-01 21:34:33'),
(11, 'admin23', 'e10adc3949ba59abbe56e057f20f883e', '2021-05-01 21:41:04', '2021-05-01 21:41:04'),
(12, 'admin01', 'e10adc3949ba59abbe56e057f20f883e', '2021-05-01 22:17:02', '2021-05-01 22:17:02'),
(13, 'admin234', 'e10adc3949ba59abbe56e057f20f883e', '2021-05-03 21:07:01', '2021-05-03 21:07:01'),
(14, 'admin235', 'e10adc3949ba59abbe56e057f20f883e', '2021-05-08 14:39:48', '2021-05-08 14:39:48'),
(15, 'adminmoi', 'e10adc3949ba59abbe56e057f20f883e', '2021-05-27 13:48:36', '2021-05-27 13:48:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `id_post` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(20) NOT NULL,
  `dientich` int(11) NOT NULL,
  `xa` varchar(50) NOT NULL,
  `huyen` varchar(100) NOT NULL,
  `tinh` varchar(50) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email_post` varchar(255) NOT NULL,
  `lienhe` varchar(13) NOT NULL,
  `mota` text NOT NULL,
  `img_post` varchar(255) NOT NULL,
  `id_chuyenmuc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `post_time` datetime NOT NULL,
  `lastupdate_post` datetime NOT NULL DEFAULT current_timestamp(),
  `latlng` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baidang`
--

INSERT INTO `baidang` (`id_post`, `tieude`, `soluong`, `gia`, `dientich`, `xa`, `huyen`, `tinh`, `diachi`, `email_post`, `lienhe`, `mota`, `img_post`, `id_chuyenmuc`, `id_user`, `post_time`, `lastupdate_post`, `latlng`) VALUES
(4, 'NHÀ TRỌ MẠNH QUỐC, cách công ty LẠC TỶ 200m', 4, 500000, 15, 'Thị trấn Cái Tắc', 'huyện Châu Thành A', 'Hậu Giang', 'Đường Số 5, Khu dân cư Tân Phú Thạnh', 'quynhaka69@gmail.com', '0973200989', '<p>NH&Agrave; TRỌ MẠNH QUỐC Địa chỉ : Đường Số 5, Khu d&acirc;n cư T&acirc;n Ph&uacute; Thạnh, Ch&acirc;u Th&agrave;nh A, Hậu Giang.</p>\r\n\r\n<p>Ph&ograve;ng mới, sạch sẽ, m&aacute;t mẻ, diện t&iacute;ch 15 m&eacute;t vu&ocirc;ng, c&oacute; giường ngủ, b&agrave;n để đồ nấu ăn, tolet trong ph&ograve;ng, la phong thạch cao&hellip;.Iternet, wifi tốc độ cao miễn ph&iacute;, nước 2 nguồn miễn ph&iacute;, điện 2.500 đ/kw.</p>\r\n\r\n<p>Gi&aacute; ph&ograve;ng : 500.000 đồng/th&aacute;ng, đặc biệt giảm 25% tiền ph&ograve;ng cho anh chị em n&agrave;o c&oacute; ho&agrave;ng cảnh kh&oacute; khăn trong 3 th&aacute;ng đầu ti&ecirc;n, ưu ti&ecirc;n c&aacute;c bạn nữ l&agrave;m trong c&ocirc;ng ty Lạc Tỷ.</p>\r\n\r\n<p>Nh&agrave; trọ c&oacute; chủ ph&ograve;ng trực thuộc quản l&yacute; v&agrave; giải quyết mọi vấn đề ph&aacute;t sinh, c&oacute; gắng hệ thống camera an ninh gi&aacute;m s&aacute;t, rất y&ecirc;n tĩnh v&agrave; an to&agrave;n.</p>\r\n\r\n<p>Nh&agrave; trọ c&aacute;ch c&ocirc;ng ty Lạc tỷ khoảng 200 m, anh chị em c&oacute; thể đi bộ để đi l&agrave;m.</p>\r\n\r\n<p>Thời gian đ&oacute;ng cửa cổng l&agrave; 22 giờ, khi đến ở phải c&oacute; giấy chứng minh g&oacute;c, nếu l&agrave; vợ chồng th&igrave; phải mang theo giấy kết h&ocirc;n. Mọi chi tiết xin li&ecirc;n hệ số n, gặp Mister Quốc.</p>\r\n\r\n<p>Thank you for calling me!</p>\r\n', 'baidang2020122653182.jpg', 1, 2, '2020-12-26 07:57:48', '2020-12-26 08:05:23', '{   \"lat\": 9.945866,   \"lng\": 105.729842 }'),
(6, 'Nhà rộng còn dư phòng', 1, 2000000, 36, 'Thị Trấn Ngã Sáu', 'huyện Châu Thành', 'Hậu Giang', ' Tỉnh lộ 925, Đường Tỉnh Lộ 925', 'nguyenthinga@gmail.com', '0908659653', '<p>Cho sinh vi&ecirc;n thu&ecirc;,bao điện nước,nh&agrave; vệ sinh trong ph&ograve;ng.</p>\r\n\r\n<p>chỉ v&ocirc; ở kh&ocirc;ng&nbsp;cần đem đ&ocirc; g&igrave; c&oacute; đ&acirc;y đủ.nh&agrave; ăn ri&ecirc;ng.</p>\r\n\r\n<p>an ninh an to&agrave;n v&agrave; y&ecirc;n tỉnh.</p>\r\n', 'baidang2021010583356.jpg', 1, 7, '2021-01-05 08:26:38', '2021-01-05 14:26:38', '{   \"lat\": 9.925064,   \"lng\": 105.795697 }'),
(7, 'Nhà cho thuê 1tr6 1T1L tiện ích đầy đủ', 3, 1600000, 18, 'Xã Long Thạnh', 'huyện Phụng Hiệp', 'Hậu Giang', 'Đường quốc lộ 1A', 'dinhtuanhoangtak489@gmail.com', '0947889305', '<p>CHO THU&Ecirc; KHU MINI HOUSE CAO CẤP E - HOME C&Aacute;I TẮC. * Vị tr&iacute;: Nằm trong KDC Minh Tr&iacute; trục ch&iacute;nh Quốc lộ 1A thuộc x&atilde; Long H&ograve;a, huyện Ch&acirc;u Th&agrave;nh, tỉnh Hậu Giang. ------------------------------------------ * Gi&aacute; chỉ từ 1.600.000đ/th&aacute;ng - 2.800.000đ/ th&aacute;ng. ------------------------------------------- -------------------------------------------- - Chi tiết sản phẩm: * Diện t&iacute;ch sử dụng từ 30m2 - 70m&sup2; * Được trang bị nội thất cao cấp: - M&aacute;y lạnh. - M&aacute;y giặt. - Quạt trần đảo 3600. - Tivi LCD 32. - Tủ &aacute;o. - B&agrave;n ghế kh&aacute;ch + sofa. - Kệ s&aacute;ch trang tr&iacute;. - Kệ bếp...</p>\r\n\r\n<p>* Vị tr&iacute; đắc địa, kh&ocirc;ng gian sống l&yacute; tưởng, ch&iacute;nh s&aacute;ch hậu m&atilde;i tốt: - Khu MINI HOUSE nằm cạnh c&aacute;c c&ocirc;ng ty, X&iacute; nghiệp ( VIỆT HẢI, KING GROUP, T&Acirc;N PH&Uacute; THẠNH...) với lượng c&ocirc;ng nh&acirc;n đ&ocirc;ng đảo thuận tiện đi lại.</p>\r\n\r\n<p>- Trong b&aacute;n k&iacute;nh 3km c&oacute; đầy đủ c&aacute;c tiện &iacute;ch: Điện đường, trường, trạm, KCN, KDC,...</p>\r\n\r\n<p>- Nội khu c&oacute; c&ocirc;ng vi&ecirc;n, b&atilde;i cỏ, c&acirc;y xanh tho&aacute;ng m&aacute;t - C&oacute; hệ thống điện v&agrave; nước đạt ti&ecirc;u chuẩn c&ugrave;ng hệ thống đ&egrave;n đường hiện đại. - C&oacute; bảo vệ trực cổng c&ugrave;ng hệ thống camera hiện đại đảm bảo an ninh trật tự 24/24.</p>\r\n\r\n<p>- C&oacute; đội ngũ kỹ thuật ri&ecirc;ng sẵn s&agrave;ng sửa chữa miễn ph&iacute; hư hỏng c&aacute;c trang thiết bị ph&aacute;t sinh trong qu&aacute; tr&igrave;nh sử dụng. * Đặc biệt c&oacute; ch&iacute;nh s&aacute;ch hậu m&atilde;i v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng cực tốt ---------------------------------------------- C&Ocirc;NG TY TNHH X&Acirc;Y DỰNG D&Acirc;N DỤNG KHANG PH&Uacute;C E-HOME, LẦU 1 A1.48, KDC NAM LONG ĐƯỜNG SỐ 5, P.HƯNG THẠNH, Q.C&Aacute;I RĂNG, TP.CẦN THƠ</p>\r\n', 'baidang2021010571602.jpg', 1, 8, '2021-01-05 08:42:59', '2021-01-05 14:42:59', '{   \"lat\": 9.885011,   \"lng\": 105.764065 }'),
(8, 'CHO THUÊ MINI HOUSE CAO CẤP TẠI KDC TM MINH TRÍ', 3, 1600000, 16, 'Xã Long Thạnh', 'huyện Phụng Hiệp', 'Hậu Giang', 'Đường quốc lộ 1A', 'dinhtuanhoangtak489@gmail.com', '0387523377', '<p>CHO THU&Ecirc; MINI HOUSE CAO CẤP TẠI KDC THƯƠNG MẠI MINH TR&Iacute; =&gt; Trang bị sẵn m&aacute;y lạnh, m&aacute;y giặt, tủ quần &aacute;o, kệ bếp, dọn v&agrave;o ở ngay!</p>\r\n\r\n<p>✅ Vị tr&iacute;: KDC Thương Mại Minh Tr&iacute; ( c&aacute;ch ng&atilde; 3 C&aacute;i Tắc 1 km về hướng Thị x&atilde; Ng&atilde; 7) 💰 Gi&aacute; 1,6 - 1,8 tr/th&aacute;ng</p>\r\n\r\n<p>🛑 TRANG BỊ SẴN: ✅ M&Aacute;Y LẠNH, M&Aacute;Y GIẶT... ✅ CAMERA an ninh. ✅ WC ri&ecirc;ng. ✅ Nội thất trang bị sẵn: tủ quần &aacute;o v&agrave; kệ bếp</p>\r\n\r\n<p>🛑 TIỆN &Iacute;CH: ✅Thiết kế 1 trệt 1 g&aacute;c --&gt; th&iacute;ch hợp với học sinh, sinh vi&ecirc;n, c&aacute;c cặp vợ chồng trẻ,... ✅ Gần KCN T&acirc;n Ph&uacute; Thạnh, ĐH V&otilde; Trường Toản, Bệnh Viện ĐH V&otilde; Trường Toản,... Di chuyển đến trung t&acirc;m TP Cần Thơ chỉ 15km,... 😍 Ch&igrave;a kh&oacute;a ri&ecirc;ng trao tay, giờ giấc tự do. ➡ SANG TRỌNG &ndash; THO&Aacute;NG M&Aacute;T &ndash; AN NINH --------------------------------------------------------- -------------------------------------- C&Ocirc;NG TY BĐS NH&Agrave; XINH VTT 278/15 Đ Tầm Vu, P.Hưng Lợi, Tp.Cần Thơ</p>\r\n\r\n<p>Nhấn để hiện số:&nbsp;<strong>0387523377</strong></p>\r\n', 'baidang2021010520636.jpg', 1, 8, '2021-01-05 10:31:21', '2021-01-05 10:32:17', '{   \"lat\": 9.893875,   \"lng\": 105.760000 }'),
(9, 'Cho thuê nhà trung tâm Hẻm 73 Phú lợi cacVicom500', 1, 3500000, 65, 'Phường 2', 'thành phố Sóc Trăng', 'Sóc Trăng', ' Đường Phú Lợi', 'nguyenthanhngan@gmail.com', '0988997852', '<p>Nh&agrave; mới x&acirc;y dựng vừa xong. C&Oacute; M&Aacute;Y LẠNH PH&Ograve;NG NGỦ Đi từ hẻm 73 Ph&uacute; lợi v&agrave;o hoặc đi từ Hẻm 116 v&agrave;o 100m. Xe 4 b&aacute;nh v&agrave;o v&ocirc; tư, s&acirc;n đậu được &ocirc; t&ocirc;. ngang 4m x 16m. S&acirc;n d&agrave;i 8m c&oacute; cổng r&agrave;o. nh&agrave; ở ho&agrave;n thiện. đặt cọc 03 th&aacute;ng. trả tiền thu&ecirc; h&agrave;ng 01 th&aacute;ng. Ngay trung t&acirc;m c&aacute;ch Vincom 500m</p>\r\n', 'baidang202101056450.jpg', 1, 9, '2021-01-05 11:03:57', '2021-01-05 17:03:57', '{   \"lat\": 9.595855304238995,   \"lng\": 105.96843306611147 }'),
(10, 'Tìm bạn nữ ở ghép', 1, 1000000, 21, 'Hòa An', 'huyện Phụng Hiệp', 'Hậu Giang', 'Gần cầu móng', 'nguyenthanhngan@gmail.com', '0939230407', '<p>Ph&ograve;ng sạch sẽ, tho&aacute;ng m&aacute;t, c&oacute; wifi, h&agrave;nh lang rộng 2m c&oacute; camera an ninh. Y&ecirc;u cầu người&nbsp;ở sạch sẽ gọn g&agrave;ng.&nbsp;</p>\r\n', 'baidang2021010589322.jpg', 2, 9, '2021-01-05 11:15:10', '2021-01-05 17:15:10', '{   \"lat\": 9.766714,   \"lng\": 105.613572 }'),
(11, 'Nhà trọ Bê Tông', 5, 2500000, 25, 'phường An Hoà', 'quận Ninh Kiều', 'Cần Thơ', 'Số 346 Nguyễn Văn Cừ', 'dinhvantrang@gmail.com', '0783996639', '<table cellspacing=\"0\" style=\"border-collapse:collapse; border:none; width:463pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:66.0pt; vertical-align:middle; white-space:normal; width:463pt\"><span style=\"font-size:9pt\"><span style=\"color:#050505\"><span style=\"font-family:&quot;Segoe UI Historic&quot;,sans-serif\">Full nội thất bao gồm: M&aacute;y lạnh, tủ lạnh lớn, quạt, b&agrave;n ghế gỗ, nệm cao su Vạn Th&agrave;nh, v&agrave; Đặt Biệt C&oacute; M&aacute;y Tắm Nước N&oacute;ng.- Giặt sấy miễn ph&iacute; tại khu trọ. Khu nh&agrave; bếp lớn tho&aacute;ng m&aacute;t. Nh&agrave; xe ri&ecirc;ng rộng r&atilde;i, cổng r&agrave;o 2 lớp, Camera An Ninh 24/24.<br />\r\n			&nbsp;- C&oacute; nh&acirc;n vi&ecirc;n vệ sinh khu vực chung mỗi ng&agrave;y. V&agrave; nhiều tiện &iacute;ch kh&aacute;c<br />\r\n			Khu trọ nằm mặt tiền vị tr&iacute; rất thuận tiện đi lại cũng như t&igrave;m kiếm. C&aacute;c bạn trọ vi&ecirc;n rất th&acirc;n thiện v&agrave; ho&agrave; đồng.</span></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'baidang2021010528766.jpg', 1, 10, '2021-01-05 11:29:07', '2021-01-05 17:29:07', '{   \"lat\": 10.043358439189342,   \"lng\": 105.76429417994211 }'),
(12, 'Mini house', 1, 2900000, 30, 'Phường An Khánh', 'quận Ninh Kiều', 'Cần Thơ', 'Hẻm liên tổ 3-4 Nguyễn Văn Cừ', 'dinhvantrang@gmail.com', '0932829509', '<p>Vị tr&iacute;: Hẻm li&ecirc;n tổ 3-4 Nguyễn Văn Cừ, An Kh&aacute;nh, Ninh Kiều<br />\r\nTrang bị sẵn:<br />\r\n✔ M&Aacute;Y LẠNH, M&Aacute;Y GIẶT, M&Aacute;Y NƯỚC N&Oacute;NG.<br />\r\n✔ CAMERA an ninh.<br />\r\n✔ WIFI Tốc độ cao miễn ph&iacute;.<br />\r\n✔ Nội thất th&ocirc;ng minh: B&agrave;n ăn gỗ, b&agrave;n l&agrave;m việc, giường ngủ, tủ quần &aacute;o gỗ, s&acirc;n phơi quần &aacute;o, WC ri&ecirc;ng...<br />\r\n✔ Nh&agrave; vệ sinh ri&ecirc;ng<br />\r\n😍 Ch&igrave;a kh&oacute;a ri&ecirc;ng trao tay, giờ giấc tự do.<br />\r\n🔰 Tiện &iacute;ch: gần trường ĐHYD, Trung Cấp Y Tế.<br />\r\n💰 Cọc 1 th&aacute;ng hợp đồng 1 năm<br />\r\n➡ SANG TRỌNG &ndash; THO&Aacute;NG M&Aacute;T &ndash; AN NINH</p>\r\n', 'baidang2021010519418.jpg', 1, 10, '2021-01-05 11:32:38', '2021-01-05 17:32:38', '{   \"lat\": 10.03675765140205,   \"lng\": 105.75831049713683 }'),
(13, 'Nhà trọ Bê Tông 2', 2, 3000000, 35, 'phường An Hoà', 'quận Ninh Kiều', 'Cần Thơ', 'số 310 Nguyễn Văn Cừ', 'dinhvantrang@gmail.com', '0783996639', '<p>Hiện tại khu trọ vừa n&acirc;ng cấp sơn sửa lại ph&ograve;ng c&ograve;n thơm m&ugrave;i sơn mới ạh 😊</p>\r\n\r\n<p>Nội thất: L&oacute;t s&agrave;n gỗ, trang bị sẵn nệm cao cấp, m&aacute;y lạnh, tủ lạnh, kệ treo quần &aacute;o v&agrave; đặt biệt c&oacute; m&aacute;y tắm nước n&oacute;ng. V&agrave; rất nhiều dịch vụ miễn ph&iacute; đi k&egrave;m.</p>\r\n\r\n<p><br />\r\n(sử dụng giặt sấy miễn ph&iacute; tại khu trọ)<br />\r\nC&oacute; S&acirc;n rửa xe v&agrave; v&ograve;i sịt cho c&aacute;c bạn trọ vi&ecirc;n rửa xe miễn ph&iacute;.<br />\r\nHiện tại khu trọ vừa n&acirc;ng cấp sơn sửa lại ph&ograve;ng c&ograve;n thơm m&ugrave;i sơn mới ạh 😊</p>\r\n\r\n<p>Nội thất: L&oacute;t s&agrave;n gỗ, trang bị sẵn nệm cao cấp, m&aacute;y lạnh, tủ lạnh, kệ treo quần &aacute;o v&agrave; đặt biệt c&oacute; m&aacute;y tắm nước n&oacute;ng. V&agrave; rất nhiều dịch vụ miễn ph&iacute; đi k&egrave;m.</p>\r\n\r\n<p>💵Gi&aacute; thu&ecirc;: 3tr/1 th&aacute;ng<br />\r\n(sử dụng giặt sấy miễn ph&iacute; tại khu trọ)<br />\r\nC&oacute; S&acirc;n rửa xe v&agrave; v&ograve;i sịt cho c&aacute;c bạn trọ vi&ecirc;n rửa xe miễn ph&iacute;.<br />\r\n&nbsp;</p>\r\n', 'baidang2021010594013.jpg', 1, 10, '2021-01-05 12:18:21', '2021-01-05 18:18:21', '{   \"lat\": 10.044619553930701,    \"lng\": 105.76636954266694 }'),
(14, 'Nhà trọ Ngọc Hân', 5, 800000, 14, 'Phường An Bình', 'quận Ninh Kiều', 'Cần Thơ', '303/6, khu vực 8, đường lộ Vòng Cung', 'nguyenngochan@gmail.com', '0919306402', '<p>Cọc trước 300 ng&agrave;n-DT 14m2<br />\r\n- Sạch sẽ, tho&aacute;ng m&aacute;t<br />\r\n- C&oacute; toilet, g&aacute;c lững, wifi<br />\r\n- Đảm bảo ANTT<br />\r\nGẦN C&Aacute;C ĐIỂM:<br />\r\n- Trường ĐH FPT<br />\r\n- Trường ĐH Nam Cần Thơ<br />\r\n- BV Nhi Đồng<br />\r\n&nbsp;Chợ An B&igrave;nh, c&aacute;ch chợ 300m</p>\r\n', 'baidang2021010559822.jpg', 1, 11, '2021-01-05 12:24:59', '2021-01-05 18:24:59', '{   \"lat\": 10.015054,   \"lng\": 105.748175 }'),
(15, 'Phòng trọ mặt tiền', 6, 1000000, 28, 'Phường 3', 'thành phố Sóc Trăng', 'Sóc Trăng', '24, Đoàn Thị Điểm', 'ngothichi@gmail.com', '0908838399', '<p>c&oacute; ph&ograve;ng ngủ ri&ecirc;ng, ph&ograve;ng kh&aacute;ch ri&ecirc;ng v&agrave; vs ri&ecirc;ng, ốp gạch xung quanh tường to&agrave;n bộ cao1,5 m&eacute;t, trần thach cao, cua sắt an to&agrave;n,c&oacute; Camera an ninh rất tiện lợi</p>\r\n', 'baidang2021010512710.jpg', 1, 12, '2021-01-05 12:40:09', '2021-01-05 18:40:09', '{   \"lat\": 9.585766214935184,     \"lng\": 105.9806722462074 }'),
(16, 'Tìm bạn nữ ở ghép( gọn gàng,  sạch sẽ gần đại học Tây Đô)', 1, 500000, 14, 'phường Lê Bình', 'quận Cái Răng', 'Cần Thơ', 'gần sân bóng đại học Tây Đô, đường 4, phường Lê Bình', 'nguyenaimy@gmail.com', '0918618400', '<p>nh&agrave; trọ Thanh An 2.</p>\r\n\r\n<p>Trọ gần đại học T&acirc;y Đ&ocirc; 2-3 ph&uacute;t đi xe m&aacute;y, trọ x&acirc;y cao r&aacute;o, gạch trắng tường xanh nhạt, c&oacute; g&aacute;c, ph&ograve;ng m&aacute;t mẻ, điện 3ng/kg, nước 7ng/khối, ngay trước trọ c&oacute; tiệm tạp h&oacute;a v&agrave; giặc ủi, khu trọ gồm sinh vi&ecirc;n, an ninh, thời gian ra v&agrave;o tự do, chổ phơi đồ &aacute;nh s&aacute;ng đầy đủ. Do ở một m&igrave;nh, muốn share ph&ograve;ng ở c&ugrave;ng cho vui v&agrave; tiết kiệm. C&oacute; g&igrave; gh&eacute; xem ph&ograve;ng cũng đc nh&eacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'baidang2021010545241.jpg', 2, 13, '2021-01-05 12:46:44', '2021-01-05 18:46:44', '{   \"lat\": 10.002664,     \"lng\": 105.756054 }'),
(17, 'Nhà trọ Thảo Vân', 6, 1000000, 15, 'xã Đông Phước A', 'huyện Châu Thành', 'Hậu Giang', 'Ấp Phước Hòa', 'nguyenthaovan@gmail.com', '0919306402', '<p>Diện t&iacute;ch: 15m2( c&oacute; g&aacute;c lửng ,tổng diện t&iacute;ch 24m2 )<br />\r\n- Gi&aacute; cho thu&ecirc;: 1 triệu/ th&aacute;ng<br />\r\nĐiện nước t&iacute;nh theo gi&aacute; nh&agrave; nước<br />\r\n- Giấy tờ ph&aacute;p l&iacute; đầy đủ, sổ ch&iacute;nh chủ.<br />\r\n- Nh&agrave; trọ mới x&acirc;y rất sạch sẽ,tho&aacute;ng m&aacute;t, c&oacute; tổng 12 ph&ograve;ng hiện c&ograve;n 10 ph&ograve;ng.<br />\r\n- Nh&agrave; trọ Minh Thư nằm khu vực trung t&acirc;m, c&aacute;ch chợ Long Thạnh chưa đến 100m, c&aacute;ch x&iacute; nghiệp gần 3km, gần trường học c&aacute;c cấp<br />\r\n- Xung quanh giao th&ocirc;ng cực k&igrave; thuận lợi, hiện đại v&agrave; thu h&uacute;t lượng d&acirc;n đổ về đ&acirc;y ở v&agrave; l&agrave;m ăn sinh sống.<br />\r\n- Kh&ocirc;ng kh&iacute; trong l&agrave;nh m&aacute;t mẻ, đường th&ocirc;ng nhiều hướng.</p>\r\n', 'baidang2021010578101.jpg', 1, 14, '2021-01-05 12:55:17', '2021-01-05 18:55:17', '{   \"lat\": 9.908871,     \"lng\": 105.773978 }'),
(18, 'Phòng Trọ A Hảo', 2, 3000000, 40, 'xã Tân Phú Thạnh', 'huyện Châu Thành A', 'Hậu Giang', '24, đường quốc lộn 1A', 'nguyenthaovan@gmail.com', '0936571290', '<p>Cho thu&ecirc; ph&ograve;ng trọ như h&igrave;nh,ph&ograve;ng rộng,tho&aacute;ng m&aacute;t,mặt tiền kdc,giờ giấc thoải m&aacute;i,điện nước gi&aacute; nh&agrave; nước,th&iacute;ch hợp gia đ&igrave;nh,sv,cn...mn c&oacute; nhu cầu lh m&igrave;nh sau 17h00 chiều nhe!(v&igrave; m&igrave;nh đi l&agrave;m)c&aacute;m ơn mọi người đ&atilde; xem tin!</p>\r\n', 'baidang2021010561992.jpg', 1, 14, '2021-01-05 13:01:07', '2021-01-05 19:01:07', '{   \"lat\": 9.967531997739188,    \"lng\": 105.73649999713625   }'),
(19, 'Nhà trọ Thanh Nga', 5, 1500000, 42, 'Phường 2', 'thành phố Sóc Trăng', 'Sóc Trăng', '459, đường quốc lộ 1A', 'huynhthichi@gmail.com', '0834766344', '<p>Số tiền cọc: 500k<br />\r\nNh&agrave; trọ c&oacute; 20 ph&ograve;ng mới x&acirc;y, diện t&iacute;ch 3.5x8(28m2) k&egrave;m g&aacute;c 14m2, chiều cao 6m<br />\r\nNh&agrave; trọ ngay mặt tiền, c&oacute; lối đi ri&ecirc;ng rộng 3m, h&agrave;ng r&agrave;o xung quanh.<br />\r\nGi&aacute; cho thu&ecirc; 1tr5( kh&ocirc;ng nội thất), giờ giấc tự do.</p>\r\n', 'baidang2021010565575.jpg', 1, 15, '2021-01-05 13:15:00', '2021-01-05 19:15:00', '{   \"lat\": 9.609115,   \"lng\": 105.962805 }'),
(36, 'Phòng trọ có sẵn máy lạnh, máy giặc, tivi', 3, 1600000, 40, 'Xã Long Thạnh', 'huyện Phụng Hiệp', 'Hậu Giang', ' Số 1, Xã Long Thạnh, Huyện Phụng Hiệp, Hậu Giang', 'dinhlamhuytak489@gmail.com', '0966382322', '<p>????Ở Đ&Acirc;Y CHO THU&Ecirc; NH&Agrave; C&Oacute; SẴN NỘI THẤT CAO CẤP????</p>\r\n\r\n<p>???? Địa chỉ: KDC Minh Tr&iacute; - C&aacute;i Tắc - Long Thạnh, Phụng Hiệp, Hậu Giang</p>\r\n\r\n<p>- DTSD: 40m2 - Lộ: 13m</p>\r\n\r\n<p>- Ph&ugrave; hợp: ở hộ gia đ&igrave;nh, kinh doanh mọi ng&agrave;nh nghề, mở văn ph&ograve;ng c&ocirc;ng ty ⚡️ Tặng nội thất: m&aacute;y lạnh, m&aacute;y giặt, kệ s&aacute;ch, tivi, sofa, b&agrave;n gỗ, tủ quần &aacute;o gỗ ⚡️ Kh&ocirc;ng gian tho&aacute;ng m&aacute;t, Free wifi, an ninh tối ưu (camera 24/24), hỗ trợ bảo tr&igrave;, sửa chữa ???? Gi&aacute; thu&ecirc; - Minihouse: 1tr6 -1tr8</p>\r\n\r\n<p>- Căn mặt tiền: 2tr7 ????ƯU Đ&Atilde;I: giảm 20% khi kh&aacute;ch thu&ecirc; ph&ograve;ng ngay trong th&aacute;ng 06</p>\r\n', 'baidang2021060118576.jpg', 1, 1, '2021-06-01 20:10:39', '2021-06-01 20:10:39', '{\r\n  \"lat\": 9.874011866239034,\r\n  \"lng\": 105.75022019658039\r\n}'),
(37, 'Cho thuê mini house KDC Minh Trí, full nội thất', 3, 1600000, 30, 'Xã Long Thạnh', 'huyện Phụng Hiệp', 'Hậu Giang', ' Đường Quốc lộ 1A, Xã Long Thạnh, Huyện Phụng Hiệp, Hậu Giang', 'dinhlamhuytak489@gmail.com', '0933383379', '<p>CHO THU&Ecirc; MINI HOUSE TẠI KDC MINH TR&Iacute; - ĐẦY ĐỦ NỘI THẤT, DỌN V&Agrave;O Ở NGAY</p>\r\n\r\n<p>Vị tr&iacute;: KDC Minh Tr&iacute;, Quốc Lộ 1A, x&atilde; Long Thạnh, huyện Phụng Hiệp, tỉnh Hậu Giang.</p>\r\n\r\n<p>THIẾT KẾ HIỆN ĐẠI - TRANG BỊ SẴN NỘI THẤT</p>\r\n\r\n<p>- G&aacute;c lửng ki&ecirc;n cố, nh&agrave; vệ sinh ri&ecirc;ng.</p>\r\n\r\n<p>- Nội thất: M&aacute;y lạnh, m&aacute;y giặt, tủ quần &aacute;o, kệ bếp.</p>\r\n\r\n<p>-&nbsp;Wifi miễn ph&iacute; - tốc độ cao</p>\r\n\r\n<p>-&nbsp;Ch&igrave;a kh&oacute;a ri&ecirc;ng trao tay, giờ giấc tự do.</p>\r\n\r\n<p>- Bảo vệ Khu d&acirc;n cư, camera an ninh 24/7&nbsp;</p>\r\n\r\n<p>- Ph&ograve;ng mới x&acirc;y cao cấp 100%</p>\r\n\r\n<p>- Lộ giới rộng, &ocirc; t&ocirc; ra v&agrave;o tho&aacute;i m&aacute;i</p>\r\n\r\n<p>Tiện &iacute;ch xung quanh: Gần chợ, si&ecirc;u thị, trường học, bệnh viện, khu c&ocirc;ng nghiệp T&acirc;n Ph&uacute; Thạnh,...</p>\r\n\r\n<p>C&aacute;ch TP Cần Thơ 15 ph&uacute;t xe m&aacute;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Số tiền cọc:&nbsp;1.600.000 đ</p>\r\n', 'baidang2021060118776.jpg', 1, 1, '2021-06-01 20:16:38', '2021-06-01 20:16:38', '{\r\n  \"lat\": 9.883359021240274,\r\n  \"lng\": 105.76061491666356\r\n}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookmark`
--

CREATE TABLE `bookmark` (
  `id_bm` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bookmark`
--

INSERT INTO `bookmark` (`id_bm`, `id_user`, `id_post`) VALUES
(38, 7, 6),
(68, 1, 16),
(70, 1, 15),
(81, 1, 8),
(85, 4, 19),
(86, 4, 17),
(87, 1, 37);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `id_chuyenmuc` int(11) NOT NULL,
  `tenchuyenmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`id_chuyenmuc`, `tenchuyenmuc`) VALUES
(1, 'Nhà cho thuê'),
(2, 'Tìm Người ở ghép');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datphong`
--

CREATE TABLE `datphong` (
  `id_datphong` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `tendk` varchar(50) NOT NULL,
  `gt` varchar(4) NOT NULL,
  `ns` date NOT NULL,
  `sdt` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dkotheothang` int(11) NOT NULL,
  `sophongdk` int(5) NOT NULL,
  `ochungkhacgt` varchar(20) NOT NULL,
  `nghenghiep` varchar(50) NOT NULL,
  `tentochuc` varchar(200) NOT NULL,
  `thunuoi` varchar(20) NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `ngaydangky` datetime NOT NULL DEFAULT current_timestamp(),
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `datphong`
--

INSERT INTO `datphong` (`id_datphong`, `id_post`, `tendk`, `gt`, `ns`, `sdt`, `email`, `dkotheothang`, `sophongdk`, `ochungkhacgt`, `nghenghiep`, `tentochuc`, `thunuoi`, `trangthai`, `ngaydangky`, `noidung`) VALUES
(1, 4, 'Đinh Lâm Huy', 'Nam', '1999-12-07', '01636644594', 'dinhlamhuytak489@gmail.com', 12, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Chưa xem', '2020-12-27 12:29:06', 'Đặt phòng trước'),
(4, 17, 'Đinh Lâm Huy', 'Nam', '1999-12-07', '0336644594', 'Dinhlamhuytak489@gmail.com', 1, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Chưa xem', '2021-01-06 07:58:17', 'Đặt phòng trước'),
(6, 19, 'Đinh Lâm Huy', 'Khác', '2021-05-04', '0336644594', 'dinhtuanhoangtak489@gmail.com', 12, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Liên hệ', '2021-05-03 17:32:24', 'Đặt phòng trước'),
(7, 16, 'Đinh Tuấn Hoàng', 'Nam', '1997-12-07', '0396325396', 'dinhtuanhoangtak489@gmail.com', 12, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Chưa xem', '2021-05-04 16:04:42', 'Đặt phòng trước'),
(8, 19, 'Đinh Tuấn Hoàng', 'Nam', '2000-01-13', '0396325396', 'dinhtuanhoangtak489@gmail.com', 12, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Chưa xem', '2021-05-06 16:50:20', 'Đặt phòng trước'),
(9, 17, 'Nguyễn Tuấn Anh', 'Nam', '2000-11-03', '0336644612', 'nguyentuananh123@gmail.com', 12, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Chưa xem', '2021-05-08 06:33:48', 'Đặt phòng trước'),
(10, 19, 'Nguyễn Thảo Vân', 'Nữ', '2002-02-02', '0964012396', 'nguyenthaovanst123@gmail.com', 5, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ (khu Hòa An)', 'có', 'Chưa xem', '2021-05-08 06:48:22', 'Đặt phòng trước'),
(11, 19, 'Ngô Thái Nhẫn', 'Nam', '1999-11-02', '0322332323', 'ngothainhan@gmail.com', 12, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Chưa xem', '2021-05-27 13:42:12', 'Đặt phòng trước'),
(12, 14, 'Trần Văn Đạt', 'Nam', '1999-12-12', '0725374628', 'nguyenvandat123@gmail.com', 6, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ(khu Hòa An)', 'Không', 'Chưa xem', '2021-05-27 14:12:00', 'Đặt phòng trước'),
(13, 36, 'Huỳnh Kim Phương Ngân', 'Nữ', '1999-02-13', '0964012396', 'hkpngan@gmail.com', 6, 3, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ', 'Không', 'Liên hệ', '2021-06-01 20:18:20', 'Đặt phòng trước'),
(14, 36, 'Trần Văn Nguyên', 'Nam', '2000-06-16', '0346744512', 'tvnguyen@gmail.com', 9, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Võ Trường Toản', 'Không', 'Hoàn thành', '2021-06-01 20:28:27', 'Đặt phòng trước'),
(15, 18, 'Lưu Huyền Trinh', 'Nữ', '1998-11-23', '0346837345', 'lhtrinh@gmail.com', 8, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ ', 'Không', 'Chưa xem', '2021-06-01 21:05:07', 'Đặt phòng trước'),
(16, 36, 'Trần Hoàng Phúc', 'Nam', '1999-05-31', '0384684656', 'thphuc@gmail.com', 4, 1, 'Không', 'Sinh Viên', 'Khu Hòa An, Trường Đại Học Cần Thơ', 'Không', 'Chưa xem', '2021-06-01 21:06:34', 'Đặt phòng trước'),
(17, 36, 'Lê Việt Khải', 'Nam', '1999-07-29', '0356427452', 'lvkhai@gmail.com', 6, 1, 'Không', 'Sinh Viên', 'Trường Đại Học Cần Thơ Hòa An', 'Không', 'Chưa xem', '2021-06-01 21:12:30', 'Đặt phòng trước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopy`
--

CREATE TABLE `gopy` (
  `id_gopy` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(13) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `tieude_gopy` varchar(1000) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noidung` text NOT NULL,
  `ngaygopy` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gopy`
--

INSERT INTO `gopy` (`id_gopy`, `hoten`, `sdt`, `diachi`, `tieude_gopy`, `email`, `noidung`, `ngaygopy`) VALUES
(5, 'Nguyễn Thị A', '0336644594', 'Sóc Trăng', 'Nhà trọ Hoàng Sơn quá cũ ', 'dinhtuanhoangtak489@gmail.com', 'Nhà trọ quá tệ, yêu cầu admin xem xét xóa khỏi danh sách', '2021-05-03 21:10:16'),
(6, 'Đinh Lâm Huy', '0336644594', 'Sóc Trăng', 'Phòng trọ Thảo Vân đăng tin không đúng sự thật', 'dinhlamhuytak489@gmail.com', '\r\nhttp://localhost/NTSV/chitietsp.php?id=17\r\nNhà trọ Thảo Vân đã đăng cho thuê phòng trọ 1tr/ tháng và có gác trọ như hình mô tả .\r\nNhưng khi đến nơi tham quan thì giá thuê lại là con số khác và không hề có gác. \r\nMong admin xử lý vụ việc này.\r\nCám ơn', '2021-05-08 07:03:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huyen`
--

CREATE TABLE `huyen` (
  `id_huyen` int(11) NOT NULL,
  `tenhuyen` varchar(100) NOT NULL,
  `id_tinh` int(11) NOT NULL,
  `huyen_lat` varchar(50) NOT NULL,
  `huyen_long` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `huyen`
--

INSERT INTO `huyen` (`id_huyen`, `tenhuyen`, `id_tinh`, `huyen_lat`, `huyen_long`) VALUES
(1, 'huyện Mỹ Tú', 1, '9.6225274', '105.7397348'),
(2, 'huyện Mỹ Xuyên', 1, '9.4680362', '105.7404105'),
(3, 'huyện Ngã Năm', 1, '9.5260706', '105.5541733'),
(4, 'huyện Thạnh Trị', 1, '9.4665844', '105.6487527'),
(5, 'huyện Long Phú', 1, '9.6680615', '105.9432979'),
(6, 'Thị xã Vĩnh Châu', 1, '9.3473722', '105.8652117'),
(7, 'thành phố Sóc Trăng', 1, '9.6097044', '105.9427922'),
(8, 'huyện Cù Lao Dung', 1, '9.6348082', '106.0482925'),
(9, 'huyện Kế Sách', 1, '9.8239224', '105.8879672'),
(10, 'huyện Phụng Hiệp', 2, '9.7864528', '105.574839'),
(11, 'huyện Long Mỹ', 2, '9.6788688', '105.4424963'),
(12, 'huyện Vị Thủy', 2, '9.8000523', '105.4686827'),
(13, 'huyện Châu Thành', 2, '9.9211628', '105.7387462'),
(14, 'huyện Châu Thành A', 2, '9.9301022', '105.5750277'),
(15, 'thị xã Ngã Bảy', 2, '9.8227678', '105.7466611'),
(16, 'thành phố Vị Thanh', 2, '9.7519006', '105.3452152'),
(18, 'quận Ninh Kiều', 3, '10.0353212', '105.7205709'),
(19, 'quận Bình Thuỷ', 3, '10.0649631', '105.6826263'),
(20, 'quận Cái Răng', 3, '9.9997837', '105.7481514'),
(21, 'huyện Ô Môn', 3, '10.126624', '105.5602283'),
(22, 'huyện Phong Điền', 3, '9.9997972', '105.5901302'),
(23, 'huyện Cờ Đỏ', 3, '10.1324921', '105.3915088'),
(24, 'huyện Vĩnh Thạnh', 3, '10.205514', '105.2877227'),
(25, 'huyện Thốt Nốt', 3, '10.2402675', '105.4794433'),
(26, 'Thành Phố Vĩnh Long', 4, '10.2518877', '105.9040738'),
(27, 'thị xã Bình Minh', 4, '10.0441231', '105.7757292'),
(28, 'huyện Bình Tân', 4, '10.1281841', '105.7040648'),
(29, 'huyện Long Hồ', 4, '10.232588', '105.8815808'),
(30, 'huyện Mang Thít', 4, '10.182375', '106.0180572'),
(31, 'huyện Tam Bình', 4, '10.0654646', '105.8969432'),
(32, 'huyện Trà Ôn', 4, '9.9875587', '105.8952652'),
(33, 'huyện Vũng Liêm', 4, '10.0577066', '106.0374485');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imgmota`
--

CREATE TABLE `imgmota` (
  `id_imgmota` int(11) NOT NULL,
  `nameimg` varchar(255) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `imgmota`
--

INSERT INTO `imgmota` (`id_imgmota`, `nameimg`, `id_post`) VALUES
(14, 'upload202012262710201077c7175e63c05d1f7b3f45ee-2697928801845947655.jpg.jpg', 4),
(15, 'upload20201226fb910488ab014c1339f5b51e050f67f7-2697928824554063224.jpg.jpg', 4),
(20, 'upload20210105749c07406b9456c979036179e485463e-2696015620857700803.jpg.jpg', 6),
(21, 'upload202101053686376af835f8835362e9e9c16aea82-2696015619938455078.jpg.jpg', 6),
(22, 'upload20210105b53dfbbb1d2ea6e773e511df990072dc-2696015619934888387.jpg.jpg', 6),
(23, 'upload20210105ba276080daacb0322bce2ed463d2c043-2696015619632831463.jpg.jpg', 6),
(24, 'upload202101059af0cd608331982fdd162a95c2b8848d-2693019992536798851.jpg.jpg', 7),
(25, 'upload20210105749c07406b9456c979036179e485463e-2696015620857700803.jpg.jpg', 7),
(26, 'upload202101053686376af835f8835362e9e9c16aea82-2696015619938455078.jpg.jpg', 7),
(27, 'upload202101052710201077c7175e63c05d1f7b3f45ee-2697928801845947655.jpg.jpg', 7),
(28, 'upload20210105b53dfbbb1d2ea6e773e511df990072dc-2696015619934888387.jpg.jpg', 7),
(29, 'upload20210105ba276080daacb0322bce2ed463d2c043-2696015619632831463.jpg.jpg', 7),
(30, 'upload20210105fb910488ab014c1339f5b51e050f67f7-2697928824554063224.jpg.jpg', 7),
(31, 'upload202101059af0cd608331982fdd162a95c2b8848d-2693019992536798851.jpg.jpg', 8),
(32, 'upload202101059b2a62bcbd7c548ca84000df1f351542-2693651430371772724.jpg.jpg', 8),
(33, 'upload2021010524fecbfc41ce3111c874c55aaac45bd8-2693651433760299017.jpg.jpg', 8),
(34, 'upload20210105749c07406b9456c979036179e485463e-2696015620857700803.jpg.jpg', 8),
(35, 'upload202101053686376af835f8835362e9e9c16aea82-2696015619938455078.jpg.jpg', 8),
(36, 'upload202101052710201077c7175e63c05d1f7b3f45ee-2697928801845947655.jpg.jpg', 8),
(37, 'upload20210105b53dfbbb1d2ea6e773e511df990072dc-2696015619934888387.jpg.jpg', 8),
(38, 'upload20210105ba276080daacb0322bce2ed463d2c043-2696015619632831463.jpg.jpg', 8),
(39, 'upload20210105c0baf0974216a9d768e4644740ac441e-2693651433760309151.jpg.jpg', 8),
(40, 'upload20210105ed8a140bfcb9f667089cd34b23647f21-2693651430646195959.jpg.jpg', 8),
(41, 'upload20210105fb910488ab014c1339f5b51e050f67f7-2697928824554063224.jpg.jpg', 8),
(42, 'upload202101059af0cd608331982fdd162a95c2b8848d-2693019992536798851.jpg.jpg', 9),
(43, 'upload202101059b2a62bcbd7c548ca84000df1f351542-2693651430371772724.jpg.jpg', 9),
(44, 'upload2021010524fecbfc41ce3111c874c55aaac45bd8-2693651433760299017.jpg.jpg', 9),
(45, 'upload20210105749c07406b9456c979036179e485463e-2696015620857700803.jpg.jpg', 9),
(46, 'upload202101053686376af835f8835362e9e9c16aea82-2696015619938455078.jpg.jpg', 9),
(47, 'upload202101052710201077c7175e63c05d1f7b3f45ee-2697928801845947655.jpg.jpg', 9),
(48, 'upload20210105b53dfbbb1d2ea6e773e511df990072dc-2696015619934888387.jpg.jpg', 9),
(49, 'upload202101059b2a62bcbd7c548ca84000df1f351542-2693651430371772724.jpg.jpg', 10),
(50, 'upload2021010524fecbfc41ce3111c874c55aaac45bd8-2693651433760299017.jpg.jpg', 10),
(51, 'upload20210105749c07406b9456c979036179e485463e-2696015620857700803.jpg.jpg', 10),
(52, 'upload202101051.2.jpg.jpg', 11),
(53, 'upload202101051.3.jpg.jpg', 11),
(54, 'upload202101051.4.jpg.jpg', 11),
(55, 'upload202101051.jpg.jpg', 11),
(56, 'upload202101059.1.jpg.jpg', 12),
(57, 'upload202101059.2.jpg.jpg', 12),
(58, 'upload202101059.3.jpg.jpg', 12),
(59, 'upload202101059.4.jpg.jpg', 12),
(60, 'upload202101059.5.jpg.jpg', 12),
(61, 'upload202101051.2.jpg.jpg', 13),
(62, 'upload202101051.3.jpg.jpg', 13),
(63, 'upload202101051.4.jpg.jpg', 13),
(64, 'upload202101051.jpg.jpg', 13),
(65, 'upload202101052.jpg.jpg', 13),
(66, 'upload202101058.1.jpg.jpg', 14),
(67, 'upload202101058.2.jpg.jpg', 14),
(68, 'upload202101058.3.jpg.jpg', 14),
(69, 'upload202101058.4.jpg.jpg', 14),
(70, 'upload202101058.5.jpg.jpg', 14),
(71, 'upload202101058.jpg.jpg', 14),
(72, 'upload20210105.', 15),
(73, 'upload2021010517.1.jpg.jpg', 16),
(74, 'upload2021010517.2.jpg.jpg', 16),
(75, 'upload2021010517.3.jpg.jpg', 16),
(76, 'upload2021010517.jpg.jpg', 16),
(77, 'upload2021010516.1.jpg.jpg', 17),
(78, 'upload2021010516.2.jpg.jpg', 17),
(79, 'upload2021010516.jpg.jpg', 17),
(80, 'upload2021010515.1.jpg.jpg', 18),
(81, 'upload2021010515.2.jpg.jpg', 18),
(82, 'upload2021010515.3.jpg.jpg', 18),
(83, 'upload2021010515.4.jpg.jpg', 18),
(84, 'upload2021010515.5.jpg.jpg', 18),
(85, 'upload2021010515.6.jpg.jpg', 18),
(86, 'upload2021010515.7.jpg.jpg', 18),
(87, 'upload2021010515.jpg.jpg', 18),
(88, 'upload2021010512.1.jpg.jpg', 19),
(89, 'upload2021010512.2.jpg.jpg', 19),
(90, 'upload2021010512.3.jpg.jpg', 19),
(91, 'upload2021010512.4.jpg.jpg', 19),
(92, 'upload2021010512.5.jpg.jpg', 19),
(93, 'upload2021010512.6.jpg.jpg', 19),
(94, 'upload2021010512.jpg.jpg', 19),
(143, 'upload202106019d8fd4a8c0bc7a29c35b1687c8359b6d-2722163193281105157.jpg.jpg', 36),
(144, 'upload202106019197434a7a38c40089651225ff896924-2722163194585145118.jpg.jpg', 36),
(145, 'upload20210601c97baa75f2ef184b7a9ac41e11573f1b-2722163196132025558.jpg.jpg', 36),
(146, 'upload20210601f966f2b249f5087d199ce2c1b6165165-2722163194619126546.jpg.jpg', 36),
(147, 'upload202106011c4618d33bb8b0e976ae33cb24af4195-2716638013283419309.jpg.jpg', 37),
(148, 'upload202106015c680b501fbd74df434f109b7e91383b-2716638013282638577.jpg.jpg', 37),
(149, 'upload2021060126e8d56ca92d9d7d9eb2cc264e9b7627-2716638013467010572.jpg.jpg', 37),
(150, 'upload20210601311be212d3cdbc806599ec84ebbdb17b-2716638013047359085.jpg.jpg', 37),
(151, 'upload202106016468128aa8f5aef5e7f65ec56b7b1bbf-2716638013186649851.jpg.jpg', 37),
(152, 'upload20210601fc6cacbd55661dc76616b0182783777d-2716638013205189794.jpg.jpg', 37);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id_mess` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `trangthai` varchar(30) NOT NULL,
  `ngaygui` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id_mess`, `id_from`, `id_to`, `content`, `trangthai`, `ngaygui`) VALUES
(63, 1, 14, '\r\n    <a href=\"./chitietsp.php?id=18\"> <span>http://localhost/NTSV/chitietsp.php?id=18</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010561992.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><span style=\"text-transform: uppercase;\">Phòng Trọ A Hảo</span>\r\n    <br><span style=\"text-transform: uppercase;\">3,000,000</span>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:21:12'),
(64, 1, 14, '\r\n    <a href=\"./chitietsp.php?id=18\"> <span>http://localhost/NTSV/chitietsp.php?id=18</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010561992.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0 pt-5\"><span style=\"text-transform: uppercase;\">Phòng Trọ A Hảo</span>\r\n    <br><span style=\"text-transform: uppercase;\">3,000,000 VND/Tháng</span>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:22:00'),
(65, 1, 14, '\r\n    <a href=\"./chitietsp.php?id=18\"> <span>http://localhost/NTSV/chitietsp.php?id=18</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010561992.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0 pt-3\"><span style=\"text-transform: uppercase;\">Phòng Trọ A Hảo</span>\r\n    <br><span style=\"text-transform: uppercase;\">3,000,000 VND/Tháng</span>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:22:26'),
(66, 1, 14, '\r\n    <a href=\"./chitietsp.php?id=18\"> <span>http://localhost/NTSV/chitietsp.php?id=18</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010561992.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0 pt-3\"><h4 style=\"text-transform: uppercase;\">Phòng Trọ A Hảo</h4>\r\n    <br><span style=\"font-weight:bold;\">3,000,000 VND/Tháng</span>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:23:25'),
(67, 1, 14, '\r\n    <a href=\"./chitietsp.php?id=18\"> <span>http://localhost/NTSV/chitietsp.php?id=18</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010561992.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0 pt-3\"><h5 style=\"text-transform: uppercase;\">Phòng Trọ A Hảo</h5>\r\n    <br><b style=\"font-weight:bold;\">3,000,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:24:25'),
(68, 1, 14, '\r\n    <a href=\"./chitietsp.php?id=18\"> <span>http://localhost/NTSV/chitietsp.php?id=18</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010561992.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Phòng Trọ A Hảo</h5>\r\n    <br><b style=\"font-weight:bold;\">3,000,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:24:57'),
(69, 1, 14, '\r\n    <a href=\"./chitietsp.php?id=18\"> <span>http://localhost/NTSV/chitietsp.php?id=18</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010561992.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Phòng Trọ A Hảo</h5>\r\n<b style=\"font-weight:bold;\">3,000,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:25:13'),
(70, 1, 9, '\r\n    <a href=\"./chitietsp.php?id=9\"> <span>http://localhost/NTSV/chitietsp.php?id=9</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang202101056450.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Cho thuê nhà trung tâm Hẻm 73 Phú lợi cacVicom500</h5>\r\n<b style=\"font-weight:bold;\">3,500,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-12 22:25:26'),
(71, 1, 14, 'hjdfklnkfgmn', 'Đã gửi', '2021-04-13 09:19:15'),
(72, 1, 10, '\r\n    <a href=\"./chitietsp.php?id=12\"> <span>http://localhost/NTSV/chitietsp.php?id=12</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010519418.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Mini house</h5>\r\n<b style=\"font-weight:bold;\">2,900,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã xem', '2021-04-14 11:08:26'),
(73, 1, 10, 'dsfdsfdjdk', 'Đã xem', '2021-04-14 11:08:41'),
(74, 1, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n<b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã xem', '2021-04-17 07:46:03'),
(75, 1, 15, 'dvdsvdsv', 'Đã xem', '2021-04-17 07:46:18'),
(76, 1, 1, '\r\n    <a href=\"./chitietsp.php?id=21\"> <span>http://localhost/NTSV/chitietsp.php?id=21</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021042614486.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà Trọ Hưng Lợi</h5>\r\n<b style=\"font-weight:bold;\">1,800,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-26 20:23:58'),
(77, 1, 15, '&agrave;dsa', 'Đã xem', '2021-04-26 20:37:15'),
(78, 1, 15, 'm', 'Đã xem', '2021-04-26 20:37:46'),
(79, 1, 14, 'sdgfd', 'Đã gửi', '2021-04-26 20:38:51'),
(80, 1, 1, '\r\n    <a href=\"./chitietsp.php?id=3\"> <span>http://localhost/NTSV/chitietsp.php?id=3</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2020122630617.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ sinh viên Mỹ Nhân ĐHCT khu hoà an</h5>\r\n<b style=\"font-weight:bold;\">1,000,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã gửi', '2021-04-28 08:43:18'),
(81, 1, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n    <div class=\"row\">\r\n  \r\n    \r\n    <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n    <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n<b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b>\r\n    </div>\r\n\r\n    </div>', 'Đã xem', '2021-04-28 08:43:43'),
(83, 1, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n            <b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-02 17:12:51'),
(84, 1, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n            <b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-02 17:13:06'),
(85, 1, 13, '\r\n    <a href=\"./chitietsp.php?id=16\"> <span>http://localhost/NTSV/chitietsp.php?id=16</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010545241.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Tìm bạn nữ ở ghép( gọn gàng,  sạch sẽ gần đại học Tây Đô)</h5>\r\n            <b style=\"font-weight:bold;\">500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-02 17:19:49'),
(86, 1, 13, '\r\n    <a href=\"./chitietsp.php?id=16\"> <span>http://localhost/NTSV/chitietsp.php?id=16</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010545241.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Tìm bạn nữ ở ghép( gọn gàng,  sạch sẽ gần đại học Tây Đô)</h5>\r\n            <b style=\"font-weight:bold;\">500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-02 17:19:57'),
(87, 1, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n            <b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-02 17:28:03'),
(88, 1, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n            <b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-03 17:21:54'),
(89, 1, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n            <b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-04 16:03:01'),
(90, 1, 13, '\r\n    <a href=\"./chitietsp.php?id=16\"> <span>http://localhost/NTSV/chitietsp.php?id=16</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010545241.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Tìm bạn nữ ở ghép( gọn gàng,  sạch sẽ gần đại học Tây Đô)</h5>\r\n            <b style=\"font-weight:bold;\">500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-04 16:03:58'),
(91, 13, 1, 'jwekfjkodfkdkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'Đã xem', '2021-05-04 16:05:28'),
(93, 15, 1, 'Ch&agrave;o bạn!! Bạn muốn đặt ph&ograve;ng trọ b&ecirc;n m&igrave;nh đ&uacute;ng kh&ocirc;ng?', 'Đã xem', '2021-05-06 21:25:22'),
(95, 4, 15, '\r\n    <a href=\"./chitietsp.php?id=19\"> <span>http://localhost/NTSV/chitietsp.php?id=19</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021010565575.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Nhà trọ Thanh Nga</h5>\r\n            <b style=\"font-weight:bold;\">1,500,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-05-27 13:45:24'),
(96, 4, 15, 'Ch&agrave;o Bạn', 'Đã xem', '2021-05-27 13:45:43'),
(97, 15, 4, 'C&oacute; g&igrave; kh&ocirc;ng bạn', 'Đã xem', '2021-05-27 13:46:30'),
(98, 10, 1, '\r\n    <a href=\"./chitietsp.php?id=37\"> <span>http://localhost/NTSV/chitietsp.php?id=37</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021060118776.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Cho thuê mini house KDC Minh Trí, full nội thất</h5>\r\n            <b style=\"font-weight:bold;\">1,600,000 VND/Tháng</b></div>\r\n        </div>', 'Đã gửi', '2021-06-01 20:36:20'),
(99, 7, 1, '\r\n    <a href=\"./chitietsp.php?id=37\"> <span>http://localhost/NTSV/chitietsp.php?id=37</span></a>\r\n        <div class=\"row\">\r\n            <div class=\"col-md-3 text-center ml-2 px-1 pb-0\"><img src=\"./assets/img/baidang/baidang2021060118776.jpg\"  class=\"w-100 h-75\"></div>\r\n            <div class=\"col-md-7 px-0 pb-0\"><h5 style=\"text-transform: uppercase;\" class=\"pt-2\">Cho thuê mini house KDC Minh Trí, full nội thất</h5>\r\n            <b style=\"font-weight:bold;\">1,600,000 VND/Tháng</b></div>\r\n        </div>', 'Đã xem', '2021-06-01 20:37:08'),
(100, 7, 1, 'Ch&agrave;o bạn!', 'Đã xem', '2021-06-01 20:37:18'),
(101, 7, 1, 'Kh&ocirc;ng biết bạn c&oacute; nh&agrave; trọ của bạn c&oacute; được ph&eacute;p được m&egrave;o kh&ocirc;ng?', 'Đã xem', '2021-06-01 20:38:27'),
(102, 7, 1, 'V&agrave; c&oacute; cổng ra tự do hay mỗi người được cấp 1 ch&igrave;a kh&oacute;a để ra v&agrave;o?', 'Đã xem', '2021-06-01 20:39:44'),
(103, 7, 1, 'Mong bạn phản hồi sớm cho m&igrave;nh!', 'Đã xem', '2021-06-01 20:40:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `id_tinh` int(11) NOT NULL,
  `tentinh` varchar(50) NOT NULL,
  `tinh_lat` varchar(50) NOT NULL,
  `tinh_long` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`id_tinh`, `tentinh`, `tinh_lat`, `tinh_long`) VALUES
(1, 'Sóc Trăng', '9.6097044', '105.9427922'),
(2, 'Hậu Giang', '9.7885397', '105.4720141'),
(3, 'Cần Thơ', '10.0341851', '105.7225507'),
(4, 'Vĩnh Long', '10.2518877', '105.9040738');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tieude_tintuc` varchar(1000) NOT NULL,
  `noidung_tintuc` text NOT NULL,
  `imgmota_tintuc` varchar(1000) NOT NULL,
  `ngayviet_tintuc` datetime NOT NULL,
  `capnhat_tintuc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `theloai_tintuc` varchar(50) NOT NULL,
  `nguon_tintuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id_tintuc`, `id_admin`, `tieude_tintuc`, `noidung_tintuc`, `imgmota_tintuc`, `ngayviet_tintuc`, `capnhat_tintuc`, `theloai_tintuc`, `nguon_tintuc`) VALUES
(8, 1, 'Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi', '<h1>Mới đ&acirc;y, d&atilde;y nh&agrave; trọ thuộc thị trấn Nếnh, Việt Y&ecirc;n, Bắc Giang đ&atilde; g&acirc;y b&atilde;o khắp MXH. Kh&aacute;c với h&igrave;nh ảnh b&igrave;nh d&acirc;n thường thấy, tr&ocirc;ng&nbsp;<a class=\"link-inline-content\" href=\"https://kenh14.vn/xon-xao-phong-tro-nhin-sang-chanh-nhu-khach-san-o-bac-giang-dan-tinh-to-mo-khong-biet-gia-thue-tren-troi-co-nao-2021030118225529.chn\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; text-decoration-line: none; box-sizing: border-box;\" target=\"_blank\" title=\"khu trọ này sang trọng và lộng lẫy chẳng khác gì khách sạn\">khu trọ n&agrave;y sang trọng v&agrave; lộng lẫy chẳng kh&aacute;c g&igrave; kh&aacute;ch sạn</a>. Cổng v&agrave;o v&agrave; lan can ban c&ocirc;ng c&aacute;c d&atilde;y nh&agrave; đều được sơn m&agrave;u gold với hoạ tiết tr&ocirc;ng rất sang trọng, cầu kỳ.</h1>\r\n\r\n<p>D&acirc;n t&igrave;nh đ&atilde; được phen trầm trồ v&agrave; thi nhau đo&aacute;n xem với kh&ocirc;ng gian sang chảnh cỡ n&agrave;y th&igrave; gi&aacute; thu&ecirc; trọ sẽ &quot;tr&ecirc;n trời&quot; cỡ n&agrave;o.</p>\r\n\r\n<div class=\"VCSortableInPreviewMode active\" style=\"margin: 0px auto 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: \">\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: 0px; box-sizing: border-box;\"><a class=\"detail-img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2021/3/1/1548169783719084788186968140246735295177551n-1614595336489856616810.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; text-decoration-line: none; box-sizing: border-box; cursor: zoom-in; display: block;\" target=\"_blank\" title=\"Dãy nhà trọ sang chảnh như khách sạn\"><img alt=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 1.\" class=\"lightbox-content\" id=\"img_290796709021925376\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2021/3/1/1548169783719084788186968140246735295177551n-1614595336489856616810.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; color:transparent; display:block; font:inherit; margin:0px; max-width:100%; padding:0px; vertical-align:bottom; width:580px\" title=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 1.\" /></a></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 10px; border: 0px; font-style: italic; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline: 0px; background: rgb(242, 242, 242); text-align: left; box-sizing: border-box;\">\r\n<p style=\"margin-left:0px; margin-right:0px\">D&atilde;y nh&agrave; trọ sang chảnh như kh&aacute;ch sạn</p>\r\n</div>\r\n</div>\r\n\r\n<p>Li&ecirc;n hệ với gia chủ, người n&agrave;y tiết lộ gia đ&igrave;nh chị mới ho&agrave;n thiện khu trọ c&oacute; tổng cộng 54 ph&ograve;ng hết 8 tỷ. Mỗi ph&ograve;ng rộng 18m2 c&oacute; trang bị điều ho&agrave;, quạt trần, giường gỗ v&agrave; toilet ri&ecirc;ng.</p>\r\n\r\n<div class=\"wp100 clearfix\" id=\"admzone474524\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: \">&nbsp;</div>\r\n\r\n<p>Chủ nh&agrave; tiết lộ: &quot;<em>2 vợ chồng m&igrave;nh cũng từng l&agrave;m l&aacute;i xe, c&ocirc;ng nh&acirc;n đi ở thu&ecirc; n&ecirc;n rất muốn mọi người c&oacute; nơi tươm tất để ở trọ. Tiền x&acirc;y khu trọ l&agrave; của 2 vợ chồng để d&agrave;nh rồi vay ng&acirc;n h&agrave;ng v&agrave; được bố mẹ hỗ trợ th&ecirc;m một &iacute;t&quot;</em>.</p>\r\n\r\n<p>Được biết, gi&aacute; ph&ograve;ng trọ l&agrave; 2200k/ph&ograve;ng miễn ph&iacute; nước uống, 100 số điện v&agrave; 5m3 nước. C&aacute;i gi&aacute; n&agrave;y chắc hẳn sẽ khiến nhiều người bất ngờ v&igrave; cứ nghĩ, gi&aacute; thu&ecirc; nh&agrave; phải &quot;tr&ecirc;n trời&quot; hơn.</p>\r\n\r\n<div class=\"VCSortableInPreviewMode active\" style=\"margin: 0px auto 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: \">\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: 0px; box-sizing: border-box;\"><a class=\"detail-img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2021/3/1/15544112237190847681869705136018721528280379n-16145953367952114495698.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; text-decoration-line: none; box-sizing: border-box; cursor: zoom-in; display: block;\" target=\"_blank\" title=\"Phòng trọ có giá 2200k/ tháng\"><img alt=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 2.\" class=\"lightbox-content\" id=\"img_290796709440126976\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2021/3/1/15544112237190847681869705136018721528280379n-16145953367952114495698.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; color:transparent; display:block; font:inherit; margin:0px; max-width:100%; padding:0px; vertical-align:bottom; width:580px\" title=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 2.\" /></a></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 10px; border: 0px; font-style: italic; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline: 0px; background: rgb(242, 242, 242); text-align: left; box-sizing: border-box;\">\r\n<p style=\"margin-left:0px; margin-right:0px\">Ph&ograve;ng trọ c&oacute; gi&aacute; 2200k/ th&aacute;ng</p>\r\n</div>\r\n</div>\r\n\r\n<p>Chủ nh&agrave; chia sẻ th&ecirc;m: &quot;<em>M&igrave;nh t&iacute;nh chung cả tiền nh&agrave; v&agrave; điện, nước vậy để mọi người khỏi phải băn khoăn, suy nghĩ, t&iacute;nh to&aacute;n nhiều những khoản ph&aacute;t sinh. Gi&aacute; n&agrave;y ở khu vực m&igrave;nh ở l&agrave; rất b&igrave;nh d&acirc;n, mọi người đều c&oacute; thể thu&ecirc; được&quot;</em>.</p>\r\n\r\n<p>Người n&agrave;y cũng tiết lộ hiện tại, hầu hết c&aacute;c ph&ograve;ng đ&atilde; được cho thu&ecirc;. Nhiều người thấy h&igrave;nh ảnh tr&ecirc;n MXH n&ecirc;n đ&atilde; đến xem v&agrave; nhanh ch&oacute;ng &quot;chốt đơn&quot;.</p>\r\n', 'Upload2021043034410.png', '2021-04-30 21:45:37', '2021-05-07 23:34:55', 'Đời sống & Xã hội', 'Facebook'),
(9, 1, 'Nên hay không sinh viên chọn thuê căn hộ thay vì nhà trọ', '<div class=\"article-summary\" style=\"box-sizing: border-box; outline: 0px; font-style: italic; margin-bottom: 15px; font-family: Arial, Helvetica, sans-serif; font-size: 15.6px;\">\r\n<p>Hiện nay nhu cầu t&igrave;m thu&ecirc; chỗ ở tại c&aacute;c th&agrave;nh phố l&agrave; v&ocirc; c&ugrave;ng lớn, rất nhiều căn hộ, ph&ograve;ng trọ được x&acirc;y dựng, y&ecirc;u cầu về chỗ ở đang ng&agrave;y c&agrave;ng tăng l&ecirc;n. Rất nhiều người đ&atilde; lựa chọn&nbsp;thu&ecirc; những căn hộ c&oacute; chất lượng cao, đảm bảo, c&oacute; những tiện &iacute;ch tốt thay v&igrave;&nbsp;thu&ecirc; nh&agrave; trọ&nbsp;đồng gi&aacute; m&agrave; kh&ocirc;ng c&oacute; những tiện &iacute;ch hay những chất lượng như căn hộ.</p>\r\n\r\n<p>V&agrave; hiện nay kh&ocirc;ng chỉ những người lao động c&oacute; thu nhập ổn định&nbsp;thu&ecirc; căn hộ&nbsp;m&agrave; c&oacute; rất nhiều lượng lớn c&aacute;c bạn học sinh, sinh vi&ecirc;n đang t&igrave;m thu&ecirc; những căn hộ. Vậy sinh vi&ecirc;n thu&ecirc; căn hộ c&oacute; thực sự tốt v&agrave; c&oacute; n&ecirc;n thu&ecirc; căn hộ thay v&igrave; thu&ecirc; ph&ograve;ng trọ trọ hay kh&ocirc;ng. H&atilde;y c&ugrave;ng ch&uacute;ng t&ocirc;i t&igrave;m hiểu sau đ&acirc;y</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"article-main-content\" style=\"box-sizing: border-box; outline: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 15.6px;\">\r\n<h2>Nhu cầu thu&ecirc; căn hộ ng&agrave;y c&agrave;ng lớn.</h2>\r\n\r\n<p>Nhu cầu cuộc sống của mỗi người ng&agrave;y c&agrave;ng lớn, việc&nbsp;thu&ecirc;&nbsp;những&nbsp;ph&ograve;ng trọ gi&aacute;&nbsp;trẻ c&oacute; chất lượng thấp, bị ẩm mốc, n&oacute;ng bức, đ&atilde; kh&ocirc;ng c&ograve;n l&agrave; sự lựa chọn của nhiều người.Đ&aacute;p ứng nhu cầu cuộc sống ng&agrave;y c&agrave;ng cao đ&oacute;, rất nhiều những căn hộ cũng như những nh&agrave; trọ c&oacute; chất lượng cao đ&atilde; được x&acirc;y dựng l&ecirc;n rất nhiều.Những căn hộ thường sẽ c&oacute; những đồ gia dụng hoặc nội thất k&egrave;m theo, t&ugrave;y theo v&agrave;o mức gi&aacute; cho thu&ecirc; của căn hộ đ&acirc;y l&agrave; điều m&agrave; &iacute;t nh&agrave; trọ c&oacute; được, rất nhiều chủ nh&agrave; trọ đ&atilde; chuyển hướng đầu tư x&acirc;y dựng những&nbsp;căn hộ mini cho thu&ecirc;&nbsp;với nhiều chất lượng kh&aacute;c nhau, từ cao cấp đến b&igrave;nh d&acirc;n gi&aacute; rẻ.</p>\r\n\r\n<p><img alt=\"Blog căn hộ 1\" src=\"https://static123.com/phongtro123/uploads/images/thumbs/900x600/fit/2021/04/19/blog-can-ho1_1618797878.jpg\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:400px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:600px\" /></p>\r\n\r\n<p>Căn hộ được x&acirc;y dựng l&ecirc;n rất nhiều c&oacute; chất lượng tốt, với những y&ecirc;u cầu về chất lượng cuộc sống cao, rất nhiều người lao động đ&atilde; lựa chọn thu&ecirc; căn hộ thay v&igrave; những nh&agrave; trọ c&oacute; chất lượng thấp hoặc thu&ecirc; những nh&agrave; trọ nhưng c&oacute; gi&aacute; gần tương đương với những căn hộ.</p>\r\n\r\n<h2>Sinh vi&ecirc;n c&oacute; n&ecirc;n thu&ecirc; căn hộ thay v&igrave; nh&agrave; trọ hay kh&ocirc;ng?</h2>\r\n\r\n<p>Lượng sinh vi&ecirc;n ng&agrave;y nay đang c&oacute; nhu cầu&nbsp;thu&ecirc; căn hộ gi&aacute; rẻ, căn hộ mini&nbsp;hoặc đ&ocirc;i khi l&agrave; những căn hộ tốt c&oacute; gi&aacute; kh&aacute;c cao, vậy khi thu&ecirc; căn hộ như vậy c&oacute; những lợi ưu điểm v&agrave; những nhược điểm g&igrave; ?</p>\r\n\r\n<h3>Ưu điểm thu&ecirc; căn hộ</h3>\r\n\r\n<p>Khi thu&ecirc; căn hộ một trong những điều m&agrave; nhiều người để &yacute; nhất đ&oacute; ch&iacute;nh l&agrave; chất lượng căn hộ đ&oacute; như thế n&agrave;o, những tiện &iacute;ch của n&oacute;. B&ecirc;n cạnh đ&oacute; khi thu&ecirc; căn hộ thường sẽ c&oacute; những vật dụng c&oacute; sẵn trong căn hộ, đ&acirc;y l&agrave; một trong những điều m&agrave; rất nhiều y&ecirc;u th&iacute;ch khi thu&ecirc; căn hộ so với nh&agrave; trọ.</p>\r\n\r\n<p>T&igrave;nh trạng an ninh tại c&aacute;c căn hộ sẽ được đảm bảo hơn. Thường khi thu&ecirc; những căn hộ sẽ c&oacute; một đội bảo vệ, ra v&agrave;o căn hộ đều được kiểm tra, t&ugrave;y v&agrave;o quy định của căn hộ của bạn thu&ecirc; m&agrave; c&oacute; thể m&agrave; bạn sẽ mất ph&iacute; bảo vệ hay kh&ocirc;ng. Đảm bảo t&igrave;nh trạng an ninh, giảm t&igrave;nh trạng mất cắp thường hay gặp.</p>\r\n\r\n<p>Tiện &iacute;ch xung quanh. Khi thu&ecirc; căn hộ b&ecirc;n cạnh những chất lượng m&agrave; bạn c&oacute; khi thu&ecirc; căn hộ, bạn sẽ c&oacute; được những tiện &iacute;ch b&ecirc;n cạnh đ&oacute;. Đối với những căn hộ cao cấp sẽ c&oacute; hồ bơi, ph&ograve;ng gym, &hellip; Đối với những căn hộ c&oacute; gi&aacute; thấp những tiện &iacute;ch sẽ &iacute;t hơn, t&ugrave;y v&agrave;o mức gi&aacute; thu&ecirc; của bạn sẽ c&oacute; những tiện &iacute;ch kh&aacute;c nhau.</p>\r\n\r\n<p><img alt=\"Blog căn hộ 2\" src=\"https://static123.com/phongtro123/uploads/images/2021/04/19/blog-can-ho-4_1618798201.jpg\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:513px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:600px\" /></p>\r\n\r\n<p>Hiện nay c&aacute;c căn hộ đều được x&acirc;y dựng ở những nơi c&oacute; giao th&ocirc;ng kh&aacute; thuận lợi, kh&ocirc;ng qu&aacute; xa trung t&acirc;m th&agrave;nh phố, gần những tiện &iacute;ch ngoại khu như: trung t&acirc;m thương mại, ng&acirc;n h&agrave;ng bệnh viện, &hellip; chất lượng cuộc sống của bạn lu&ocirc;n đảm bảo tốt nhất.</p>\r\n\r\n<p><img alt=\"Blog căn hộ 3\" src=\"https://static123.com/phongtro123/uploads/images/2021/04/19/blog-can-ho3_1618798200.jpg\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:450px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:600px\" /></p>\r\n\r\n<p>Kh&ocirc;ng gian sống tốt. Đa số những căn hộ hiện nay đều được x&acirc;y dựng c&oacute; lầu v&agrave; tr&ecirc;n cao, việc sống tr&ecirc;n nh&agrave; cao tầng sẽ gi&uacute;p bạn tận hưởng được kh&ocirc;ng kh&iacute; trong l&agrave;nh v&agrave; thoải m&aacute;i rất nhiều. Đặc biệt những căn hộ được x&acirc;y dựng mới rất rộng r&atilde;i thoải m&aacute;i nguy cơ ch&aacute;y bộ được hạn chết ở mức thấp nhất.</p>\r\n\r\n<h3>Nhược điểm thu&ecirc; căn hộ</h3>\r\n\r\n<p>Một trong những nhược điểm lớn nhất m&agrave; c&oacute; lẽ rất nhiều người đang gặp vướng mặt đ&oacute; ch&iacute;nh ph&iacute; thu&ecirc; căn hộ kh&aacute; cao so với nh&agrave; trọ. Tuy nhi&ecirc;n với những tiện &iacute;ch v&agrave; những chất lượng dịch vụ m&agrave; bạn tận hưởng v&agrave; sử dụng khi thu&ecirc; căn hộ bạn sẽ thấy việc thu&ecirc; căn hộ với mức gi&aacute; đ&oacute; th&igrave; thực sự ổn.</p>\r\n\r\n<p>Tuy nhi&ecirc;n đừng qu&aacute; mải nh&igrave;n v&agrave;o những chất lượng cũng như những tiện &iacute;ch nhận được m&agrave; thu&ecirc; căn hộ cao cấp. Bạn kh&ocirc;ng thể thu&ecirc; căn hộ cao cấp 10 &ndash; 15 triệu / th&aacute;ng trong khi lương của bạn c&ograve;n thấp hơn hoặc chỉ ngang bằng với mức đ&oacute;. H&atilde;y lưu &yacute; thật kỹ về vấn đề chọn thu&ecirc; căn hộ thật tốt cho m&igrave;nh. Tuy nhi&ecirc;n bạn c&oacute; thể t&igrave;m người ở gh&eacute;p để c&oacute; thể share tiền thu&ecirc; căn hộ. đ&oacute; l&agrave; một trong những c&aacute;ch để giảm tiền thu&ecirc; căn hộ được rất nhiều người lựa chọn.</p>\r\n\r\n<p><img alt=\"Blog căn hộ 4\" src=\"https://static123.com/phongtro123/uploads/images/2021/04/19/blog-can-ho2_1618798200.jpg\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:360px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:600px\" /></p>\r\n\r\n<p>Bạn c&oacute; thể tham khảo một số căn hộ cho thu&ecirc; tại:&nbsp;<em><a href=\"https://thuecanho123.com/\" rel=\"nofollow\" style=\"box-sizing: border-box; outline: 0px; background-color: transparent; color: rgb(0, 122, 255); text-decoration-line: none; margin-top: 0px; padding-top: 0px;\" target=\"_blank\" title=\"Website cho thuê căn hộ \">https://thuecanho123.com/</a></em>&nbsp;tại đ&acirc;y c&oacute; đầy đủ những th&ocirc;ng tin về những căn hộ từ gi&aacute; rẻ đến cao cấp với nhiều địa điểm kh&aacute;c nhau, đa dạng về diện t&iacute;ch căn hộ, số ph&ograve;ng ngủ, toilet, &hellip; gi&uacute;p cho bạn c&oacute; thể thoải m&aacute;i lựa chọn cho m&igrave;nh một căn hộ tốt nhất.</p>\r\n\r\n<h3>Sinh vi&ecirc;n c&oacute; n&ecirc;n thu&ecirc; căn hộ hay kh&ocirc;ng?&nbsp;</h3>\r\n\r\n<p>Nhu cầu thu&ecirc; căn hộ của c&aacute;c bạn sinh vi&ecirc;n hiện nay l&agrave; rất lớn. Nếu bạn c&oacute; điều kiện về kinh tế việc thu&ecirc; căn hộ l&agrave; điều rất tốt, nếu điều kiện của bạn thật sự chưa tốt nhưng bạn vẫn thu&ecirc; những căn hộ th&igrave; bạn c&oacute; thể t&igrave;m hiểu đến những căn hộ mini, căn hộ gi&aacute; rẻ, hoặc t&igrave;m người ở gh&eacute;p với m&igrave;nh để giảm bớt tiền trọ. Nếu bạn kh&ocirc;ng c&oacute; khả năng thu&ecirc; căn hộ, đừng lo lắng hiện nay c&oacute; rất nhiều những ph&ograve;ng trọ được x&acirc;y dựng mới c&oacute; chất lượng rất tốt kh&ocirc;ng thua k&eacute;m g&igrave; những căn hộ gi&aacute; rẻ hay căn hộ mini đ&acirc;u.</p>\r\n\r\n<p>Bạn c&oacute; thể tham khảo th&ecirc;m những ph&ograve;ng trọ tại:&nbsp;<em><a href=\"https://phongtro123.com/cho-thue-phong-tro\" style=\"box-sizing: border-box; outline: 0px; background-color: transparent; color: rgb(0, 122, 255); text-decoration-line: none; margin-top: 0px; padding-top: 0px;\" target=\"_blank\" title=\"Phòng trọ 123: Cho thuê phòng trọ\">https://phongtro123.com/cho-thue-phong-tro</a></em></p>\r\n\r\n<p>Hy vọng với những chia sẻ tr&ecirc;n sẽ gi&uacute;p bạn c&oacute; c&aacute;i nh&igrave;n tốt hơn về thu&ecirc; căn hộ v&agrave; t&igrave;m cho m&igrave;nh một ph&ograve;ng trọ hay căn hộ tốt nhất</p>\r\n</div>\r\n', 'Upload2021043021039.jpg', '2021-04-30 21:49:31', '2021-04-30 14:49:31', 'Đời sống & Xã hội', 'phongtro123.com'),
(10, 1, 'Ưu và nhược điểm của việc ở trọ \"bạn nên biết\"', '<div class=\"article-summary\" style=\"box-sizing: border-box; outline: 0px; font-style: italic; margin-bottom: 15px; font-family: Arial, Helvetica, sans-serif; font-size: 15.6px;\">\r\n<p>Một trong những vấn đề được quan t&acirc;m bởi sinh vi&ecirc;n, người mới lập gia đ&igrave;nh v&agrave; c&oacute; kinh tế mức chưa vững ch&iacute;nh l&agrave; nh&agrave; ở. V&igrave; nhiều yếu tố,&nbsp;<a href=\"https://phongtro123.com/tinh-thanh/ho-chi-minh\" style=\"box-sizing: border-box; outline: 0px; background-color: transparent; color: rgb(0, 122, 255); text-decoration-line: none; margin-top: 0px; padding-top: 0px; margin-bottom: 0px; padding-bottom: 0px;\" target=\"_blank\" title=\"tìm phòng trọ\">t&igrave;m ph&ograve;ng trọ</a>&nbsp;lu&ocirc;n l&agrave; sự lựa chọn ph&ugrave; hợp nhất. Thế nhưng ở trọ cũng c&oacute; 2 mặt, cũng c&oacute; những ưu điểm v&agrave; cũng tồn tại kh&ocirc;ng &iacute;t nhược điểm. H&atilde;y c&ugrave;ng t&igrave;m hiểu r&otilde; hơn về việc ở trọ qua b&agrave;i viết sau đ&acirc;y.</p>\r\n</div>\r\n\r\n<div class=\"article-main-content\" style=\"box-sizing: border-box; outline: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 15.6px;\">\r\n<h2 style=\"text-align:center\"><img alt=\"Ưu điểm và nhược điểm của ở trọ\" src=\"https://static123.com/phongtro123/uploads/images/thumbs/900x600/fit/2021/01/30/uu-va-nhuoc-diem-cua-o-tro_1611981473.jpg\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:400px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:700px\" /></h2>\r\n\r\n<h2>Nhược điểm của việc ở trọ</h2>\r\n\r\n<p>Khi n&oacute;i đến việc ở trọ, sẽ c&oacute; kh&ocirc;ng &iacute;t hạn chế xuất hiện m&agrave; bản th&acirc;n người thu&ecirc; cũng kh&oacute; l&ograve;ng khắc phục m&agrave; phải chấp nhận v&agrave; th&iacute;ch nghi với n&oacute;.</p>\r\n\r\n<h3>Thiếu kh&ocirc;ng gian ri&ecirc;ng v&agrave; sự tự do</h3>\r\n\r\n<p>Đầu ti&ecirc;n, ở trọ c&oacute; thể mang đến sự bức bối về kh&ocirc;ng gian cũng như thời gian. Trong b&agrave;i viết chỉ đề cập đến ph&ograve;ng trọ chứ kh&ocirc;ng phải căn hộ. Căn hộ thuộc một h&igrave;nh thức nh&agrave; ở cao cấp hơn v&agrave; nhiều tiện nghi hơn rất nhiều so với ph&ograve;ng trọ. Khi thu&ecirc; ph&ograve;ng trọ, c&aacute;c căn ph&ograve;ng thường c&oacute; diện t&iacute;ch nhỏ, vừa phải, đ&ocirc;i khi l&agrave; qu&aacute; nhỏ so với mức kh&ocirc;ng gian m&agrave; ch&uacute;ng ta cần. V&igrave; thế, nếu ở một hoặc v&agrave;i người th&igrave; kh&ocirc;ng sao nhưng sẽ rất kh&oacute; khăn nếu tổ chức tiệc hay c&aacute;c buổi họp mặt c&oacute; đ&ocirc;ng người.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, đa số ph&ograve;ng trọ đều được x&acirc;y theo d&atilde;y n&ecirc;n nếu ch&uacute;ng ta vui chơi hơi ồn &agrave;o th&igrave; c&oacute; thể l&agrave;m ảnh hưởng đến những người xung quanh.Vấn đề thời gian giới nghi&ecirc;m của c&aacute;c khu trọ cũng l&agrave;m hạn chế bớt những nhu cầu sinh hoạt, giải tr&iacute; của người thu&ecirc;. Tuy nhi&ecirc;n v&igrave; yếu tố an ninh v&agrave; trật tự của khu trọ m&agrave; mọi người ai cũng cần phải tu&acirc;n thủ. Nếu muốn kh&ocirc;ng bị giới hạn về thời gian, bạn c&oacute; thể t&igrave;m kiếm c&aacute;c ph&ograve;ng trọ đơn lẻ hoặc &iacute;t căn để thoải m&aacute;i hơn.</p>\r\n<img alt=\"Ở trọ thường khiến bạn bị bó buộc về không gian và thời gian\" src=\"https://static123.com/phongtro123/uploads/images/2021/01/30/bo-buoc-khong-gian-va-thoi-gian-khi-o-tro_1611981679.jpg\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:360px; margin:0px auto; max-height:100%; max-width:100%; object-fit:cover; outline:0px; padding-top:0px; width:640px\" title=\"bo-buoc-khong-gian-va-thoi-gian-khi-o-tro_1611981679.jpg\" />\r\n<p>Ở trọ thường khiến bạn bị b&oacute; buộc về kh&ocirc;ng gian v&agrave; thời gian</p>\r\n\r\n<h3>Bị phụ thuộc v&agrave;o nhiều yếu tố</h3>\r\n\r\n<p>Khi ở trọ, bạn chịu sự ảnh hưởng của kh&aacute; nhiều người, yếu tố.</p>\r\n\r\n<p>- Chủ trọ: Khi thu&ecirc; nh&agrave;, bạn chắc chắn sẽ lu&ocirc;n chịu ảnh hưởng v&agrave; chi phối từ ph&iacute;a chủ nh&agrave;. Đầu ti&ecirc;n, c&aacute;c vấn đề như tiền nh&agrave;, chi ph&iacute; dịch vụ như điện nước hoặc những chủ trương về nh&agrave; ở, giờ giấc,... bạn đều phải tu&acirc;n theo.</p>\r\n\r\n<p>- M&ocirc;i trường nh&agrave; trọ: ở trọ đồng nghĩa với việc ở theo khu d&acirc;n cư thu nhỏ v&agrave; dĩ nhi&ecirc;n bạn sẽ chịu ảnh hưởng rất nhiều bởi m&ocirc;i trường xung quanh. Ch&iacute;nh v&igrave; thế, khi chọn trọ để gắn b&oacute;, bạn cần cẩn trọng chọn khu trọ an ninh, văn h&oacute;a v&agrave; kh&ocirc;ng c&oacute; tệ nạn để m&igrave;nh kh&ocirc;ng bị ảnh hưởng.</p>\r\n\r\n<h2>Ưu điểm của việc ở trọ</h2>\r\n\r\n<p>B&ecirc;n cạnh những bất tiện c&oacute; thể ph&aacute;t sinh trong l&uacute;c ở trọ th&igrave; chọn h&igrave;nh thức nh&agrave; ở n&agrave;y cũng đem đến cho bạn rất nhiều lợi &iacute;ch.</p>\r\n\r\n<h3>Chi ph&iacute; cố định v&agrave; tiết kiệm</h3>\r\n\r\n<p>Chi ph&iacute; nh&agrave; trọ thường l&agrave; cố định v&agrave; &iacute;t biến đổi, c&aacute;c chi ph&iacute; k&egrave;m theo như tiền điện nước hay cơ sở hạ tầng thường nằm trong mức kiểm so&aacute;t v&agrave; cũng kh&ocirc;ng qu&aacute; nhiều. Thay v&agrave;o đ&oacute; nếu ở nh&agrave; ri&ecirc;ng, bạn c&oacute; thể sẽ phải lo rất nhiều chi ph&iacute; &ldquo;khủng&rdquo; như thuế đất, nh&agrave; c&ugrave;ng nhiều loại ph&iacute; nh&agrave; đất kh&aacute;c. Số tiền bỏ ra để x&acirc;y nh&agrave; thường cũng tương đối cao, bạn phải l&agrave;m việc quần quật trong nhiều năm sau đ&oacute; để thanh to&aacute;n hết c&aacute;c khoản nợ từ việc x&acirc;y nh&agrave;. Đối với những người c&oacute; thu nhập chưa vững th&igrave; ở trọ lu&ocirc;n l&agrave; sự lựa chọn ph&ugrave; hợp nhất.</p>\r\n<img alt=\"Chọn cách ở trọ giúp bạn giải quyết “bài toán về kinh tế”\" src=\"https://static123.com/phongtro123/uploads/images/2021/01/30/o-tro-giup-tiet-kiem_1611981770.jpg\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:316.188px; margin:0px auto; max-height:100%; max-width:100%; object-fit:cover; outline:0px; padding-top:0px; width:640px\" title=\"o-tro-giup-tiet-kiem_1611981770.jpg\" />\r\n<p><span style=\"font-family:roboto,sans-serif; font-size:15px\">Chọn c&aacute;ch ở trọ gi&uacute;p bạn giải quyết &ldquo;b&agrave;i to&aacute;n về kinh tế&rdquo;</span></p>\r\n\r\n<h3>Dễ d&agrave;ng thay đổi chỗ ở</h3>\r\n\r\n<p>Với t&iacute;nh chất kh&ocirc;ng bắt buộc của nh&agrave; trọ, bạn c&oacute; thể dễ d&agrave;ng &ldquo;bay nhảy&rdquo; v&agrave; chọn cho m&igrave;nh chỗ ở kh&aacute;c nếu cảm thấy kh&ocirc;ng hợp. Th&ocirc;ng thường chỉ cần b&aacute;o trước với chủ nh&agrave; khoảng 1 th&aacute;ng l&agrave; bạn c&oacute; thể sắp xếp chuyển ra cũng như lấy lại được tiền cọc ban đầu. C&oacute; kh&ocirc;ng &iacute;t người chuyển trọ v&agrave;i lần mỗi năm khi thay đổi c&ocirc;ng việc, học h&agrave;nh v&agrave; ở trọ gi&uacute;p họ dễ d&agrave;ng linh hoạt chuyển đổi chỗ ở.</p>\r\n\r\n<h3>Đa dạng sự lựa chọn</h3>\r\n\r\n<p>Với từng mức tiền nhất định, bạn c&oacute; thể dễ d&agrave;ng lựa chọn ph&ograve;ng trọ theo &yacute; th&iacute;ch, nhu cầu v&agrave; tiện nghi được cung cấp. D&ugrave; c&aacute;c ph&ograve;ng trọ c&oacute; diện t&iacute;ch kh&ocirc;ng lớn nhưng b&ugrave; lại, mỗi quận, mỗi th&agrave;nh phố đều c&oacute; rất nhiều khu trọ, bạn sẽ dễ d&agrave;ng t&igrave;m được một căn ph&ugrave; hợp với mức sống của m&igrave;nh. Để c&oacute; th&ecirc;m nhiều sự t&igrave;m kiếm cho ph&ograve;ng trọ, bạn đừng qu&ecirc;n truy cập v&agrave;o phongtro123.com - Nền tảng ti&ecirc;n phong trong t&igrave;m kiếm ph&ograve;ng trọ hiện nay. T&igrave;m kiếm theo gi&aacute; tiền, địa điểm, diện t&iacute;ch hay mức gi&aacute; tiền - tất cả đều c&oacute; ở website chất lượng n&agrave;y.</p>\r\n<img alt=\"Tìm phòng ở Phongtro123.com để có cho mình không gian phù hợp nhất\" src=\"https://static123.com/phongtro123/uploads/images/thumbs/900x600/fit/2021/01/30/kenh-cho-thue-phong-tro-phongtro123_1611981899.png\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:354.737px; margin:0px auto; max-height:100%; max-width:100%; object-fit:cover; outline:0px; padding-top:0px; width:640px\" title=\"Tìm phòng ở Phongtro123.com để có cho mình không gian phù hợp nhất\" />\r\n<p>T&igrave;m ph&ograve;ng ở Phongtro123.com để c&oacute; cho m&igrave;nh kh&ocirc;ng gian ph&ugrave; hợp nhất</p>\r\n\r\n<p>Ở trọ c&oacute; nhiều bất lợi nhưng cũng c&oacute; kh&ocirc;ng &iacute;t điểm cộng, nhất l&agrave; về vấn đề chi ph&iacute; cho cuộc sống của bạn. Chưa kể l&agrave; với mức d&acirc;n cư đ&ocirc;ng đ&uacute;c như hiện nay, đ&acirc;y l&agrave; h&igrave;nh thức nh&agrave; ở ph&ugrave; hợp cũng như mang đến chất lượng ổn định nhất. Để cuộc sống kh&ocirc;ng bị ngột ngạt, bạn cần một ch&uacute;t cẩn thận v&agrave; tinh tế để chọn ph&ograve;ng trọ cho ph&ugrave; hợp. Việc t&igrave;m ph&ograve;ng sẽ dễ d&agrave;ng hơn rất nhiều nếu bạn truy cập v&agrave;o Phongtro123.com. Đừng qu&ecirc;n t&igrave;m kiếm&nbsp;<a href=\"https://phongtro123.com/\" style=\"box-sizing: border-box; outline: 0px; background-color: transparent; color: rgb(0, 122, 255); text-decoration-line: none; margin-top: 0px; padding-top: 0px;\" title=\"Phòng trọ 123\">Ph&ograve;ng Trọ 123</a>&nbsp;khi c&oacute; nhu cầu thu&ecirc; ph&ograve;ng trọ nh&eacute;.</p>\r\n</div>\r\n', 'Upload2021050149410.jpg', '2021-05-01 20:43:09', '2021-05-01 13:43:09', 'Đời sống & Xã hội', 'phongtro123.com'),
(11, 1, 'Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi', '<h1>Nh&agrave; trọ sang chảnh g&acirc;y b&atilde;o ở Bắc Giang: X&acirc;y 54 ph&ograve;ng hết 8 tỷ, gi&aacute; thu&ecirc; rẻ bất ngờ d&ugrave; đầy đủ tiện nghi</h1>\r\n\r\n<p>Mới đ&acirc;y, d&atilde;y nh&agrave; trọ thuộc thị trấn Nếnh, Việt Y&ecirc;n, Bắc Giang đ&atilde; g&acirc;y b&atilde;o khắp MXH. Kh&aacute;c với h&igrave;nh ảnh b&igrave;nh d&acirc;n thường thấy, tr&ocirc;ng&nbsp;<a class=\"link-inline-content\" href=\"https://kenh14.vn/xon-xao-phong-tro-nhin-sang-chanh-nhu-khach-san-o-bac-giang-dan-tinh-to-mo-khong-biet-gia-thue-tren-troi-co-nao-2021030118225529.chn\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; text-decoration-line: none; box-sizing: border-box;\" target=\"_blank\" title=\"khu trọ này sang trọng và lộng lẫy chẳng khác gì khách sạn\">khu trọ n&agrave;y sang trọng v&agrave; lộng lẫy chẳng kh&aacute;c g&igrave; kh&aacute;ch sạn</a>. Cổng v&agrave;o v&agrave; lan can ban c&ocirc;ng c&aacute;c d&atilde;y nh&agrave; đều được sơn m&agrave;u gold với hoạ tiết tr&ocirc;ng rất sang trọng, cầu kỳ.</p>\r\n\r\n<p>D&acirc;n t&igrave;nh đ&atilde; được phen trầm trồ v&agrave; thi nhau đo&aacute;n xem với kh&ocirc;ng gian sang chảnh cỡ n&agrave;y th&igrave; gi&aacute; thu&ecirc; trọ sẽ &quot;tr&ecirc;n trời&quot; cỡ n&agrave;o.</p>\r\n\r\n<div class=\"VCSortableInPreviewMode active\" style=\"margin: 0px auto 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: &quot;Times New Roman&quot;, Georgia, serif; vertical-align: baseline; outline: 0px; text-align: center; width: 580px; box-sizing: border-box; position: relative; z-index: 1; color: rgb(34, 34, 34);\">\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: 0px; box-sizing: border-box;\"><a class=\"detail-img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2021/3/1/1548169783719084788186968140246735295177551n-1614595336489856616810.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; text-decoration-line: none; box-sizing: border-box; cursor: zoom-in; display: block;\" target=\"_blank\" title=\"Dãy nhà trọ sang chảnh như khách sạn\"><img alt=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 1.\" class=\"lightbox-content\" id=\"img_290796709021925376\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2021/3/1/1548169783719084788186968140246735295177551n-1614595336489856616810.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; color:transparent; display:block; font:inherit; margin:0px; max-width:100%; padding:0px; vertical-align:bottom; width:580px\" title=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 1.\" /></a></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 10px; border: 0px; font-style: italic; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline: 0px; background: rgb(242, 242, 242); text-align: left; box-sizing: border-box;\">\r\n<p style=\"margin-left:0px; margin-right:0px\">D&atilde;y nh&agrave; trọ sang chảnh như kh&aacute;ch sạn</p>\r\n</div>\r\n</div>\r\n\r\n<p>Li&ecirc;n hệ với gia chủ, người n&agrave;y tiết lộ gia đ&igrave;nh chị mới ho&agrave;n thiện khu trọ c&oacute; tổng cộng 54 ph&ograve;ng hết 8 tỷ. Mỗi ph&ograve;ng rộng 18m2 c&oacute; trang bị điều ho&agrave;, quạt trần, giường gỗ v&agrave; toilet ri&ecirc;ng.</p>\r\n\r\n<div class=\"wp100 clearfix\" id=\"admzone474524\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: &quot;Times New Roman&quot;, Georgia, serif; vertical-align: baseline; outline: 0px; box-sizing: border-box; width: 580px; color: rgb(34, 34, 34);\">&nbsp;</div>\r\n\r\n<p>Chủ nh&agrave; tiết lộ: &quot;<em>2 vợ chồng m&igrave;nh cũng từng l&agrave;m l&aacute;i xe, c&ocirc;ng nh&acirc;n đi ở thu&ecirc; n&ecirc;n rất muốn mọi người c&oacute; nơi tươm tất để ở trọ. Tiền x&acirc;y khu trọ l&agrave; của 2 vợ chồng để d&agrave;nh rồi vay ng&acirc;n h&agrave;ng v&agrave; được bố mẹ hỗ trợ th&ecirc;m một &iacute;t&quot;</em>.</p>\r\n\r\n<p>Được biết, gi&aacute; ph&ograve;ng trọ l&agrave; 2200k/ph&ograve;ng miễn ph&iacute; nước uống, 100 số điện v&agrave; 5m3 nước. C&aacute;i gi&aacute; n&agrave;y chắc hẳn sẽ khiến nhiều người bất ngờ v&igrave; cứ nghĩ, gi&aacute; thu&ecirc; nh&agrave; phải &quot;tr&ecirc;n trời&quot; hơn.</p>\r\n\r\n<div class=\"VCSortableInPreviewMode active\" style=\"margin: 0px auto 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: &quot;Times New Roman&quot;, Georgia, serif; vertical-align: baseline; outline: 0px; text-align: center; width: 580px; box-sizing: border-box; position: relative; z-index: 1; color: rgb(34, 34, 34);\">\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: 0px; box-sizing: border-box;\"><a class=\"detail-img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2021/3/1/15544112237190847681869705136018721528280379n-16145953367952114495698.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; text-decoration-line: none; box-sizing: border-box; cursor: zoom-in; display: block;\" target=\"_blank\" title=\"Phòng trọ có giá 2200k/ tháng\"><img alt=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 2.\" class=\"lightbox-content\" id=\"img_290796709440126976\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2021/3/1/15544112237190847681869705136018721528280379n-16145953367952114495698.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; color:transparent; display:block; font:inherit; margin:0px; max-width:100%; padding:0px; vertical-align:bottom; width:580px\" title=\"Nhà trọ sang chảnh gây bão ở Bắc Giang: Xây 54 phòng hết 8 tỷ, giá thuê rẻ bất ngờ dù đầy đủ tiện nghi - Ảnh 2.\" /></a></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 10px; border: 0px; font-style: italic; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline: 0px; background: rgb(242, 242, 242); text-align: left; box-sizing: border-box;\">\r\n<p style=\"margin-left:0px; margin-right:0px\">Ph&ograve;ng trọ c&oacute; gi&aacute; 2200k/ th&aacute;ng</p>\r\n</div>\r\n</div>\r\n\r\n<p>Chủ nh&agrave; chia sẻ th&ecirc;m: &quot;<em>M&igrave;nh t&iacute;nh chung cả tiền nh&agrave; v&agrave; điện, nước vậy để mọi người khỏi phải băn khoăn, suy nghĩ, t&iacute;nh to&aacute;n nhiều những khoản ph&aacute;t sinh. Gi&aacute; n&agrave;y ở khu vực m&igrave;nh ở l&agrave; rất b&igrave;nh d&acirc;n, mọi người đều c&oacute; thể thu&ecirc; được&quot;</em>.</p>\r\n\r\n<p>Người n&agrave;y cũng tiết lộ hiện tại, hầu hết c&aacute;c ph&ograve;ng đ&atilde; được cho thu&ecirc;. Nhiều người thấy h&igrave;nh ảnh tr&ecirc;n MXH n&ecirc;n đ&atilde; đến xem v&agrave; nhanh ch&oacute;ng &quot;chốt đơn&quot;.</p>\r\n', 'Upload2021050277807.jpg', '2021-05-02 22:22:41', '2021-05-02 15:22:41', 'Đời sống & Xã hội', 'Facebook'),
(12, 1, 'Top 5 website đăng tin cho thuê mặt bằng hiệu quả nhất hiện nay', '<div class=\"article-summary\" style=\"box-sizing: border-box; outline: 0px; font-style: italic; margin-bottom: 15px; font-family: Arial, Helvetica, sans-serif; font-size: 15.6px;\">\r\n<p><em>Hiện nay, do ảnh hưởng của Virut Corona, nhiều mặt bằng đ&atilde; bị trả lại h&agrave;ng loạt do kinh doanh bu&ocirc;n b&aacute;n ế ẩm. Để k&iacute;ch th&iacute;ch người thu&ecirc;, nhiều chủ nh&agrave; đ&atilde; giảm 10-30%&nbsp;tuy nhi&ecirc;n t&igrave;nh h&igrave;nh cho thu&ecirc; vẫn chưa được cải thiện l&agrave; mấy. Để việc&nbsp;<a href=\"https://bds123.vn/cho-thue-mat-bang-ho-chi-minh.html\" style=\"box-sizing: border-box; outline: 0px; background-color: transparent; color: rgb(0, 122, 255); text-decoration-line: none; margin-top: 0px; padding-top: 0px; margin-bottom: 0px; padding-bottom: 0px;\" title=\"cho thuê mặt bằng\">cho thu&ecirc; mặt bằng</a>&nbsp;tiếp cận được nhiều kh&aacute;ch v&agrave; cho thu&ecirc; nhanh ch&oacute;ng, ngo&agrave;i c&aacute;ch th&ocirc;ng thường l&agrave; đăng băng r&ocirc;n quảng c&aacute;o ngay tại vị tr&iacute; cho thu&ecirc;...th&igrave; k&ecirc;nh đăng tin l&ecirc;n c&aacute;c trang website chuy&ecirc;n về lĩnh vực cho thu&ecirc;/mua b&aacute;n bất động sản hiệu quả kh&ocirc;ng k&eacute;m, gi&uacute;p người cho thu&ecirc; tiếp cận được đối tượng kh&aacute;ch h&agrave;ng rộng hơn v&agrave; mau cho thu&ecirc; hơn. B&agrave;i viết n&agrave;y sẽ giới thiệu đến c&aacute;c bạn top 5 website chuy&ecirc;n về đăng tin cho thu&ecirc; mặt bằng hiệu quả nhất hiện nay.</em></p>\r\n</div>\r\n\r\n<div class=\"article-main-content\" style=\"box-sizing: border-box; outline: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 15.6px;\">\r\n<ol>\r\n	<li>Muaban.net</li>\r\n</ol>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://static123.com/phongtro123/uploads/images/2020/06/09/thumb-muaban_1591696009.png\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:180px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:350px\" /></p>\r\n\r\n<p>L&agrave; website rao vặt trực tuyến uy t&iacute;n tại Việt Nam được quản l&yacute; với C&ocirc;ng ty Cổ phần Mua B&aacute;n. Trang web ch&iacute;nh thức được hoạt động từ ng&agrave;y 16/04/2006, được độc quyền bảo trợ th&ocirc;ng tin bởi Ấn phẩm Mua&amp;b&aacute;n.&nbsp;</p>\r\n\r\n<p>Ph&acirc;n t&iacute;ch: muaban.net</p>\r\n\r\n<ul>\r\n	<li>Vị tr&iacute; seach google từ kho&aacute; mặt bằng: Top 1</li>\r\n	<li>Tổng lượt truy cập to&agrave;n website: 4.320.000 lượt truy cập ng&agrave;y 9/6/2020.&nbsp;</li>\r\n	<li>Vị tr&iacute; xếp hạng to&agrave;n trang tại Việt Nam: 174</li>\r\n</ul>\r\n\r\n<p>Muaban.net hiện l&agrave; 1 website đăng tin cho thu&ecirc; mặt bằng kh&aacute; tốt hiện nay, tuy nhi&ecirc;n muaban.net hoạt động đa k&ecirc;nh tổng hợp n&ecirc;n v&agrave;o website c&oacute; vẻ hơi bị pha lo&atilde;ng tin đăng c&aacute;c ng&agrave;nh nghề kh&aacute;c.&nbsp;</p>\r\n\r\n<p>Theo dữ liệu tr&ecirc;n, th&igrave; lượt truy cập v&agrave;o website Muaban.net ng&agrave;y c&agrave;ng tăng.&nbsp;</p>\r\n\r\n<p>Theo thống k&ecirc;, lượng seach trực tiếp c&aacute;c từ kho&aacute; l&agrave; 50,91% v&agrave; lượng v&agrave;o trực tiếp website l&agrave; 37,28% cho thấy website Muaban.net đ&atilde; qu&aacute; th&ocirc;ng dụng v&agrave; quen thuộc với người d&ugrave;ng.&nbsp;</p>\r\n\r\n<p>Hiện tại, muaban.net l&agrave; thừa hưởng trực tiếp từ việc đăng b&aacute;o giấy trước đ&acirc;y, n&ecirc;n hệ thống đại l&yacute;, chi nh&aacute;nh của muaban.net kh&aacute; lớn tr&ecirc;n to&agrave;n quốc.&nbsp;</p>\r\n\r\n<p><span style=\"font-family:roboto,sans-serif; font-size:15px\">2. Bds123.vn</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://static123.com/phongtro123/uploads/images/thumbs/900x600/fit/2020/06/09/bds123-logo_1591696543.png\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:106px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:394px\" /></p>\r\n\r\n<p>Bds123.vn l&agrave; k&ecirc;nh đăng tin chuy&ecirc;n về bất động sản,&nbsp;Website li&ecirc;n tục cập nhật nhanh nhất, ch&iacute;nh x&aacute;c nhất mọi th&ocirc;ng tin về thị trường bất động sản trong v&agrave; ngo&agrave;i nước, về c&aacute;c ch&iacute;nh s&aacute;ch v&agrave; văn bản ph&aacute;p luật li&ecirc;n quan cũng như c&aacute;c dự &aacute;n bất động sản đ&atilde; đang v&agrave; sắp triển khai tr&ecirc;n phạm vi to&agrave;n quốc, c&ugrave;ng rất nhiều vấn đề kh&aacute;c li&ecirc;n quan.</p>\r\n\r\n<p>Ph&acirc;n t&iacute;ch: Bds123.vn</p>\r\n\r\n<ul>\r\n	<li>Vị tr&iacute; seach google từ kho&aacute; mặt bằng: Top 2</li>\r\n	<li>Tổng lượt truy cập to&agrave;n website: 133.000 lượt truy cập ng&agrave;y 9/6/2020.&nbsp;</li>\r\n	<li>Vị tr&iacute; xếp hạng to&agrave;n trang tại Việt Nam: 3269</li>\r\n</ul>\r\n\r\n<p>Hiện tại Bds123.vn đang đứng top 3 google về từ kho&aacute; mặt bằng, cho thu&ecirc; mặt bằng việc đăng tin tại website n&agrave;y kh&aacute; hiệu quả, web c&ograve;n đang c&oacute; chương tr&igrave;nh đăng tin miễn ph&iacute; cho c&aacute;c th&agrave;nh vi&ecirc;n.&nbsp;</p>\r\n\r\n<p>Lượng t&igrave;m kiếm của Bds123.vn đang tăng&nbsp;nhanh, v&igrave; chỉ hoạt động chuy&ecirc;n lĩnh vực bất động sản, n&ecirc;n lượt traffic của Bds123.vn c&oacute; phần thấp hơn c&aacute;c website kh&aacute;c. Tuy nhi&ecirc;n v&igrave; hoạt động 1 lĩnh vực n&ecirc;n c&oacute; nhiều kh&aacute;ch h&agrave;ng thường xuy&ecirc;n v&agrave;o xem tin hơn.&nbsp;</p>\r\n\r\n<p>Mức độ t&igrave;m kiếm bằng c&aacute;ch seach Google của Bds123.vn kh&aacute; cao l&ecirc;n đến 84,13% cho thấy sự hiệu quả tốt của c&aacute;c từ kho&aacute; li&ecirc;n quan đến lĩnh vực bất động sản.&nbsp;</p>\r\n\r\n<p>3. Chotot.com&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://static123.com/phongtro123/uploads/images/2020/06/09/anh-chup-man-hinh-2020-06-09-luc-170040_1591696988.png\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:156px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:484px\" /></p>\r\n\r\n<p>Chợ Tốt ch&iacute;nh thức gia nhập thị trường Việt Nam v&agrave;o đầu năm 2012, với mục đ&iacute;ch tạo ra cho bạn một k&ecirc;nh rao vặt trung gian, kết nối người mua với người b&aacute;n lại với nhau bằng những giao dịch cực kỳ đơn giản, tiện lợi, nhanh ch&oacute;ng, an to&agrave;n, mang đến hiệu quả bất ngờ.</p>\r\n\r\n<p>Đến nay, Chợ Tốt tự h&agrave;o l&agrave; Website rao vặt được ưa chuộng h&agrave;ng đầu Việt Nam. H&agrave;ng ng&agrave;n m&oacute;n hời từ Bất động sản, Nh&agrave; cửa, Xe cộ, Đồ điện tử, Th&uacute; cưng, Vật dụng c&aacute; nh&acirc;n... đến t&igrave;m việc l&agrave;m, th&ocirc;ng tin tuyển dụng, c&aacute;c dịch vụ - du lịch được đăng tin, rao b&aacute;n tr&ecirc;n Chợ Tốt.</p>\r\n\r\n<p>Ph&acirc;n t&iacute;ch: Chotot.com</p>\r\n\r\n<ul>\r\n	<li>Vị tr&iacute; seach google từ kho&aacute; mặt bằng: Top 3</li>\r\n	<li>Tổng lượt truy cập to&agrave;n website: 15.130.000 lượt truy cập ng&agrave;y 9/6/2020.&nbsp;</li>\r\n	<li>Vị tr&iacute; xếp hạng to&agrave;n trang tại Việt Nam: 35</li>\r\n</ul>\r\n\r\n<p>Chotot.com cũng giống h&igrave;nh thức hoạt động của muaban.net, hoạt động đa k&ecirc;nh tin đăng nhiều lĩnh vực kh&aacute;c nhau. Với lượng traffic hơn 15 triệu lượt, đ&acirc;y l&agrave; lượt xem tổng c&aacute;c ng&agrave;nh nghề, c&ograve;n ri&ecirc;ng về lĩnh vực bất động sản cho thu&ecirc;/mua b&aacute;n chỉ chiếm 1 phần.&nbsp;</p>\r\n\r\n<p>Lượt traffic của Chotot.com cũng tăng, v&agrave; duy tr&igrave; đều qua c&aacute;c th&aacute;ng.&nbsp;</p>\r\n\r\n<p>cChotot.com cũng kh&aacute; l&acirc;u đời, n&ecirc;n lượng seach trực tiếp chiếm 48.44% rất cao, cho thấy thương hiệu đ&atilde; kh&aacute; phổ biến với người d&ugrave;ng, c&ograve;n lượt seach t&igrave;m kiếm l&agrave; 46,46%.&nbsp;</p>\r\n\r\n<ol start=\"4\">\r\n	<li>Alonhadat.com.vn</li>\r\n</ol>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://static123.com/phongtro123/uploads/images/thumbs/900x600/fit/2020/06/09/anh-chup-man-hinh-2020-06-09-luc-150231_1591696640.png\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:85px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:200px\" /></p>\r\n\r\n<p>Alonhadat.com.vn cũng kh&aacute; l&acirc;u đời, đ&acirc;y l&agrave; web chuy&ecirc;n về lĩnh vực bất động sản mua b&aacute;n v&agrave; cho thu&ecirc;. Alonhadat.com.vn cũng c&oacute; đối tượng kh&aacute;ch h&agrave;ng truy cập lớn, tuy nhi&ecirc;n giao diện web chưa được n&acirc;ng cấp mới ph&ugrave; hợp với thị trường hiện tại.&nbsp;</p>\r\n\r\n<p>Ph&acirc;n t&iacute;ch: Alonhadat.com.vn</p>\r\n\r\n<ul>\r\n	<li>Vị tr&iacute; seach google từ kho&aacute; mặt bằng: Top 4</li>\r\n	<li>Tổng lượt truy cập to&agrave;n website: 2.590.000 lượt truy cập ng&agrave;y 9/6/2020.&nbsp;</li>\r\n	<li>Vị tr&iacute; xếp hạng to&agrave;n trang tại Việt Nam: 280</li>\r\n</ul>\r\n\r\n<p>Lưu lượng kh&aacute;ch h&agrave;ng truy cấp của Alonhadat.com.vn duy tr&igrave; ổn định qua c&aacute;c th&aacute;ng.&nbsp;</p>\r\n\r\n<p>Lưu lượng truy cập tự nhi&ecirc;n của Alonhadat.com.vn kh&aacute; lớn chứng tỏ c&aacute;c từ kho&aacute; của Alonhadat.com.vn tiếp cận được kh&aacute;ch h&agrave;ng kh&aacute; tốt.&nbsp;</p>\r\n\r\n<ol start=\"5\">\r\n	<li>Phongtro123.com</li>\r\n</ol>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://static123.com/phongtro123/uploads/images/2020/06/09/anh-chup-man-hinh-2020-06-09-luc-170210_1591697078.png\" style=\"border-radius:3px; border-style:none; box-sizing:border-box; display:block; height:91px; margin:0px auto; max-height:100%; max-width:100%; outline:0px; padding-top:0px; width:200px\" /></p>\r\n\r\n<p>Phongtro123.com ra đời cũng kh&aacute; l&acirc;u, web chuy&ecirc;n về lĩnh vực cho thu&ecirc;: ph&ograve;ng trọ, nh&agrave; nguy&ecirc;n căn, căn hộ, mặt bằng cho thu&ecirc;....Web với giao diện v&agrave; chức năng kh&aacute; dễ sử dụng, c&oacute; đối tượng kh&aacute;ch h&agrave;ng thường xuy&ecirc;n truy cập ổn định qua c&aacute;c th&aacute;ng.&nbsp;</p>\r\n\r\n<p>Ph&acirc;n t&iacute;ch: Phongtro123.com</p>\r\n\r\n<ul>\r\n	<li>Vị tr&iacute; seach google từ kho&aacute; mặt bằng: Top 5</li>\r\n	<li>Tổng lượt truy cập to&agrave;n website: 276.000 lượt truy cập ng&agrave;y 9/6/2020.&nbsp;</li>\r\n	<li>Vị tr&iacute; xếp hạng to&agrave;n trang tại Việt Nam: 1716</li>\r\n</ul>\r\n\r\n<p>Web chỉ hoạt động lĩnh vực cho thu&ecirc;, n&ecirc;n đối tượng trung th&agrave;nh cũng nhiều, tuy nhi&ecirc;n v&igrave; hoạt động chỉ mảng thu&ecirc; n&ecirc;n lượng kh&aacute;ch h&agrave;ng tổng thể kh&ocirc;ng nhiều như c&aacute;c website kh&aacute;c.&nbsp;</p>\r\n\r\n<p>Lượng seach tự nhi&ecirc;n của Phongtro123.com cũng kh&aacute; tốt l&ecirc;n đến 71,9%, lượng truy cập trực tiếp 19,36% cũng tương đối cao, cho thấy web cũng đ&atilde; c&oacute; thương hiệu kh&aacute; tốt với người ti&ecirc;u d&ugrave;ng.&nbsp;</p>\r\n\r\n<p>Hy vọng với b&agrave;i viết đ&aacute;nh gi&aacute; một c&aacute;ch kh&aacute;ch quan n&agrave;y, sẽ gi&uacute;p c&aacute;c bạn c&oacute; kinh nghi&ecirc;m trong việc lựa chọn v&agrave; đăng tin cho thu&ecirc; mặt bằng l&uacute;c thị trường mặt bằng cho thu&ecirc; ng&agrave;y c&agrave;ng kh&oacute; trong l&uacute;c ảnh hưởng của dịch bệnh n&agrave;y.&nbsp;</p>\r\n</div>\r\n', 'Upload2021050444822.jpg', '2021-05-04 16:15:32', '2021-05-04 09:15:32', 'Kinh nghiệm', ''),
(13, 1, 'Mướn nhà trọ', '<p>Nh&agrave; trọ h&ograve;a an</p>\r\n', 'Upload2021060290481.jpg', '2021-06-02 08:12:42', '2021-06-02 01:12:42', 'Kinh nghiệm', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `userpassword` varchar(32) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `cretime_user` datetime NOT NULL,
  `lastupdate_user` datetime NOT NULL DEFAULT current_timestamp(),
  `hoatdong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `fullname`, `userpassword`, `sex`, `date_of_birth`, `address`, `email`, `phone`, `avatar`, `cretime_user`, `lastupdate_user`, `hoatdong`) VALUES
(1, 'dinhlamhuy', 'Đinh Lâm Huy', '1237d1538d1bbfdf2790639d57b95d91', 'Nam', '1999-12-07', 'Sóc Trăng', 'dlhuy99@gmail.com', '01636644594', 'Upload2021060238391.jpg', '2020-12-20 10:45:01', '2021-06-02 08:08:37', 1),
(2, 'quynhaka69', 'Nguyễn Thị Quỳnh Như', 'bd078d97a161694bd66bfab1da9f51ec', 'Nữ', '2001-10-07', 'Cần Thơ', 'Quynhaka69@gmail.com', '01636644594', 'Upload202012267507.jpg', '2020-12-26 07:53:44', '2020-12-26 13:53:44', 0),
(4, 'dinhtuanhoang123', 'Đinh Tuấn Hoàng', 'f36030a24122f6b83588517ea21c470a', 'Nam', '1999-12-07', 'Long Hưng, Mỹ Tú, Sóc Trăng', 'dinhtuanhoangtak489@gmail.com', '01636644594', 'Upload2021052799764.jpg', '2020-12-28 11:47:53', '2021-05-27 14:03:18', 1),
(7, 'nguyenthinga', 'Nguyễn Thị Thúy Nga', 'f0ba214716abdc853b27412d3cc1feaf', 'Nữ', '1999-07-08', 'Hậu Giang', 'Nguyenthinga@gmail.com', '0334488678', 'Upload2021010560325.jpg', '2021-01-05 08:21:52', '2021-06-01 09:54:31', 1),
(8, 'dinhtuanhoang', 'Đinh Tuấn Hoàng', 'f36030a24122f6b83588517ea21c470a', 'Nam', '1999-12-07', 'Hậu Giang', 'dinhtuanhoangtak489@gmail.com', '0334848594', 'Upload2021010547740.jpg', '2021-01-05 08:39:06', '2021-01-05 14:39:06', 0),
(9, 'nguyenthanhngan', 'Nguyễn Thanh Ngân', 'cdc80682c23b34fcc4c1abbf54800a17', 'Nữ', '1994-08-05', 'Sóc Trăng', 'nguyenthanhngan@gmail.com', '01636644612', 'Upload2021010586115.jpg', '2021-01-05 10:46:47', '2021-01-05 16:46:47', 0),
(10, 'dinhvantrang', 'Đinh Văn Tràng', '95368086fe9a063e15e664b61c8192bc', 'Nam', '1995-01-07', 'Cần Thơ', 'dinhvantrang@gmail.com', '0964012396', 'Upload2021010569693.jpg', '2021-01-05 11:25:37', '2021-06-01 20:36:35', 1),
(11, 'nguyenngochan', 'Nguyễn Ngọc Hân', '68a5c2f28aefed12b1adf4fac364ec57', 'Nữ', '1995-07-15', 'Cần Thơ', 'nguyenngochan@gmail.com', '0829868899', 'Upload2021010530668.jpg', '2021-01-05 12:21:58', '2021-01-05 18:21:58', 0),
(12, 'ngothichi', 'Ngô Thị Chi', 'b7a7ad5994c732f93a9b06243b829a17', 'Nữ', '1997-07-12', 'Sóc Trăng', 'ngothichi@gmail.com', '0908838399', 'Upload2021010550856.jpg', '2021-01-05 12:36:45', '2021-01-05 18:36:45', 0),
(13, 'nguyenaimy', 'Nguyễn Ái My', '07483c9799dc5960aca6aef6e20bcb48', 'Nữ', '1985-07-31', 'Cần Thơ', 'nguyenaimy@gmail.com', '0918618400', 'Upload2021010525532.jpg', '2021-01-05 12:43:33', '2021-05-04 17:06:05', 1),
(14, 'nguyenthaovan', 'Nguyễn Thảo Vân', 'b5f151e37cba51328bc3add375330d84', 'Nữ', '1985-07-04', 'Hậu Giang', 'nguyenthaovan@gmail.com', '0919306402', 'Upload2021010589341.jpg', '2021-01-05 12:49:31', '0000-00-00 00:00:00', 1),
(15, 'huynhthichi', 'Huỳnh Thị Chi', '29471b174e76e89fb5f0b099a6d1ae4d', 'Nữ', '1996-06-05', 'Sóc Trăng', 'huynhthichi@gmail.com', '0834766344', 'Upload2021010578334.jpg', '2021-01-05 13:13:03', '2021-05-03 21:14:59', 1),
(17, 'dinhlamhuyst123', 'Đinh Lâm Huy', '7c2bcf47ed79b306f3f9d64c6826ee56', 'Nam', '1999-12-07', 'Mỹ Tú, Sóc Trăng', 'dinhlamhuytak489@gmail.com', '0336644594', 'Upload2021050680125.jpg', '2021-05-06 23:14:53', '2021-05-06 23:14:53', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_chuyenmuc` (`id_chuyenmuc`);

--
-- Chỉ mục cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id_bm`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`id_chuyenmuc`);

--
-- Chỉ mục cho bảng `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`id_datphong`),
  ADD KEY `id_post` (`id_post`);

--
-- Chỉ mục cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`id_gopy`);

--
-- Chỉ mục cho bảng `huyen`
--
ALTER TABLE `huyen`
  ADD PRIMARY KEY (`id_huyen`),
  ADD KEY `id_tinh` (`id_tinh`);

--
-- Chỉ mục cho bảng `imgmota`
--
ALTER TABLE `imgmota`
  ADD PRIMARY KEY (`id_imgmota`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_mess`),
  ADD KEY `id_from` (`id_from`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`id_tinh`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `baidang`
--
ALTER TABLE `baidang`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id_bm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `id_chuyenmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `datphong`
--
ALTER TABLE `datphong`
  MODIFY `id_datphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `gopy`
--
ALTER TABLE `gopy`
  MODIFY `id_gopy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `huyen`
--
ALTER TABLE `huyen`
  MODIFY `id_huyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `imgmota`
--
ALTER TABLE `imgmota`
  MODIFY `id_imgmota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `tinh`
--
ALTER TABLE `tinh`
  MODIFY `id_tinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD CONSTRAINT `baidang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `baidang_ibfk_2` FOREIGN KEY (`id_chuyenmuc`) REFERENCES `chuyenmuc` (`id_chuyenmuc`);

--
-- Các ràng buộc cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `baidang` (`id_post`),
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `datphong`
--
ALTER TABLE `datphong`
  ADD CONSTRAINT `datphong_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `baidang` (`id_post`);

--
-- Các ràng buộc cho bảng `huyen`
--
ALTER TABLE `huyen`
  ADD CONSTRAINT `huyen_ibfk_1` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id_tinh`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_from`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
