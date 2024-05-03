-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 03, 2024 lúc 04:00 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sua_chua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DichVu`
--

CREATE TABLE `DichVu` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  `ID_Nhom` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `Anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `DichVu`
--

INSERT INTO `DichVu` (`id`, `Ten`, `ID_Nhom`, `created_at`, `updated_at`, `MoTa`, `Anh`) VALUES
(11, 'Cứu hộ oto', 3, '2024-04-13 20:53:57', '2024-04-13 20:53:57', '', 'cuu-ho-o-to-Ha-Dong-megacar-183.jpeg'),
(12, 'Cứu hộ xe máy', 3, '2024-04-13 20:58:07', '2024-04-13 20:58:07', '', 'cuu-ho-xe-may-466.jpeg'),
(13, 'Cứu hộ thuyền', 3, '2024-04-21 20:52:32', '2024-04-21 20:52:32', '', 'thuyen-cuu-ho-tadpole-sa-42093.jpeg'),
(14, 'Cứu hộ thang máy', 3, '2024-04-21 20:53:39', '2024-04-21 20:53:39', '', 'cuu-ho-thang-may-1-e167492323512664.jpeg'),
(15, 'Máy điều hòa', 4, '2024-04-21 20:55:29', '2024-04-21 20:58:48', '', 've-sinh-may-lanh-banner71.jpeg'),
(16, 'Tủ lạnh', 4, '2024-04-21 20:56:24', '2024-04-21 20:58:36', '', 'vesinhtulanhquanbinhthanh-813415.jpeg'),
(17, 'Máy giặt', 4, '2024-04-21 20:57:33', '2024-04-21 20:58:31', '', 'dich-vu-ve-sinh-may-giat42.jpeg'),
(18, 'Lò vi sóng', 4, '2024-04-21 20:58:21', '2024-04-21 20:58:21', '', 'sua-lo-vi-song-siemens-544.jpeg'),
(19, 'Gia công nhà trọn gói', 5, '2024-05-03 06:46:44', '2024-05-03 06:46:44', '', 'dich-vu-sua-nha-tron-goi-197.jpeg'),
(20, 'Thiết kế bản vẽ nhà', 5, '2024-05-03 06:47:23', '2024-05-03 06:47:23', '', 'giay-phep-xay-dung-sua-nha-tron-goi24.jpeg'),
(21, 'Sơn chống thấm', 5, '2024-05-03 06:47:58', '2024-05-03 06:47:58', '', 'dich-vu-sua-chua-nha-tron-goi-uy-tin15.jpeg'),
(22, 'San bằng nhà', 5, '2024-05-03 06:48:52', '2024-05-03 06:48:52', '', 'sua-nha-tron-goi-tphcm56.jpeg'),
(23, 'Vệ sinh tấm năng lượng', 6, '2024-05-03 06:49:40', '2024-05-03 06:49:40', '', 'Dich-vu-van-hanh-bao-duong-Long-tech-thuc-te-1400x78813.webp'),
(24, 'Lắp đặt tấm năng lượng', 6, '2024-05-03 06:50:08', '2024-05-03 06:50:08', '', 'dien-mat-troi-169.jpeg'),
(25, 'Lắp đặt camera', 7, '2024-05-03 06:50:57', '2024-05-03 06:50:57', '', 'dich-vu-lap-dat-va-sua-chua-camera-tai-ha-noi69.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `HoaDon`
--

CREATE TABLE `HoaDon` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_YeuCauSuaChua` varchar(255) DEFAULT NULL,
  `ID_Tho` varchar(255) DEFAULT NULL,
  `TongTien` varchar(255) DEFAULT NULL,
  `TrangThaiThanhToan` varchar(255) DEFAULT NULL,
  `DanhGiaDichVu` varchar(255) DEFAULT NULL,
  `LyDoHuyDon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `HoaDon`
--

INSERT INTO `HoaDon` (`id`, `ID_YeuCauSuaChua`, `ID_Tho`, `TongTien`, `TrangThaiThanhToan`, `DanhGiaDichVu`, `LyDoHuyDon`, `created_at`, `updated_at`) VALUES
(2, '7', '14', '20000000', '2', NULL, 'Nhầm', '2024-04-21 01:41:31', '2024-04-21 01:42:17'),
(3, '8', '15', '20000000', '1', 'okie', '', '2024-04-21 01:48:54', '2024-04-21 02:43:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `KhaNangSuaChua`
--

CREATE TABLE `KhaNangSuaChua` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_Tho` int(11) DEFAULT NULL,
  `ID_DichVu` int(11) DEFAULT NULL,
  `GiaTho` varchar(255) DEFAULT NULL,
  `MoTa` longtext DEFAULT NULL,
  `DanhGia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `KhaNangSuaChua`
--

INSERT INTO `KhaNangSuaChua` (`id`, `ID_Tho`, `ID_DichVu`, `GiaTho`, `MoTa`, `DanhGia`, `created_at`, `updated_at`) VALUES
(1, 14, 11, '20000000', '<h2>1. Vai tr&ograve; quan trọng của c&aacute;c dịch vụ cứu hộ &ocirc; t&ocirc;, cứu hộ giao th&ocirc;ng</h2>\r\n\r\n<p>Cứu hộ giao th&ocirc;ng l&agrave; dịch vụ kh&ocirc;ng thể thiếu đối với c&aacute;c t&agrave;i xế hiện nay. Bởi khi di chuyển tr&ecirc;n đường sẽ kh&oacute; tr&aacute;nh khỏi việc xe hơi gặp sự cố như chết m&aacute;y giữa đường, thủng xăm, hết xăng hoặc gặp tai nạn.&nbsp;</p>\r\n\r\n<p>L&uacute;c n&agrave;y dịch vụ cứu hộ &ocirc; t&ocirc; sẽ hỗ trợ bạn xử l&yacute; những sự cố đ&oacute; một c&aacute;ch nhanh ch&oacute;ng v&agrave; cũng g&oacute;p phần giải quyết t&igrave;nh trạng &aacute;ch tắc giao th&ocirc;ng. Bởi &ocirc; t&ocirc; khi kh&ocirc;ng di chuyển được sẽ trở th&agrave;nh vật cản g&acirc;y tắc đường.&nbsp;</p>\r\n\r\n<p>Như vậy, c&oacute; thể n&oacute;i rằng, cứu hộ giao th&ocirc;ng l&agrave; dịch vụ cần thiết, đặc biệt l&agrave; ở c&aacute;c th&agrave;nh phố lớn. Ngo&agrave;i mục đ&iacute;ch cứu hộ, gi&uacute;p c&aacute;c b&aacute;c t&agrave;i bớt lo lắng khi &ocirc; t&ocirc; gặp sự cố v&agrave; cũng đảm bảo đường phố nhanh ch&oacute;ng th&ocirc;ng tho&aacute;ng hơn.</p>\r\n\r\n<p><img alt=\"Công ty chuyên cứu hộ ô tô\" src=\"https://cuuhonhanh24h.com/wp-content/uploads/2023/04/cuu-ho-o-to-3-2.jpg\" style=\"height:280px; width:712px\" /></p>\r\n\r\n<h2>2. Khi n&agrave;o bạn cần li&ecirc;n hệ với dịch vụ cứu hộ &ocirc; t&ocirc;?</h2>\r\n\r\n<p>Dịch vụ cứu hộ &ocirc; t&ocirc; ra đời đ&aacute;p ứng nhu cầu cứu hộ &ocirc; t&ocirc; trong c&aacute;c trường hợp sau đ&acirc;y:</p>\r\n\r\n<ul>\r\n	<li>Lốp xe gặp vấn đề như x&igrave; hơi, lủng, nổ lốp, c&aacute;n đinh,&hellip;</li>\r\n	<li>B&igrave;nh ắc quy yếu hoặc hết điện khiến xe kh&ocirc;ng thể khởi động được.</li>\r\n	<li>Xe bị chết m&aacute;y hoặc gặp c&aacute;c lỗi hư hỏng m&agrave; bạn kh&ocirc;ng thể sửa chữa, khắc phục ngay l&uacute;c đ&oacute; được.</li>\r\n	<li>Bạn kh&ocirc;ng may gặp tai nạn khiến giao th&ocirc;ng bị &aacute;ch tắc cần phải li&ecirc;n hệ cứu hộ &ocirc; t&ocirc; để xử l&yacute;.</li>\r\n</ul>\r\n\r\n<h2>3. Cứu Hộ Nhanh 24H &ndash; đơn vị cứu hộ &ocirc; t&ocirc;, cứu hộ xe hơi uy t&iacute;n số 1&nbsp;</h2>\r\n\r\n<p>Cứu Hộ Nhanh 24H tự tin khẳng định ch&uacute;ng t&ocirc;i l&agrave; đơn vị cứu hộ &ocirc; t&ocirc; uy t&iacute;n, chuy&ecirc;n nghiệp. Kh&aacute;ch h&agrave;ng lựa chọn ch&uacute;ng t&ocirc;i sẽ nhận được sự h&agrave;i l&ograve;ng tuyệt đối bởi th&aacute;i độ phục vụ chu đ&aacute;o, tận t&acirc;m, chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Những lợi &iacute;ch khi lựa chọn dịch vụ cứu hộ &ocirc; t&ocirc;, cứu hộ giao th&ocirc;ng của c&ocirc;ng ty ch&uacute;ng t&ocirc;i:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>Cứu hộ nhanh ch&oacute;ng</h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Hơn ai hết, ch&uacute;ng t&ocirc;i hiểu r&otilde; nỗi lo lắng của c&aacute;c t&agrave;i xế khi &ocirc; t&ocirc; của m&igrave;nh gặp sự cố. V&igrave; vậy Cứu Hộ Nhanh 24H lu&ocirc;n cố gắng c&oacute; mặt sớm nhất để gi&uacute;p bạn xử l&yacute; vấn đề ngo&agrave;i &yacute; muốn. D&ugrave; &ocirc; t&ocirc; của bạn gặp sự cố ở cung đường n&agrave;o, mọi khung giờ, ch&uacute;ng t&ocirc;i sẽ c&oacute; mặt ngay để cứu hộ v&agrave; hỗ trợ bạn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cuuhonhanh24h.com/wp-content/uploads/2023/04/cuu-ho-o-to-4.jpg\" style=\"height:670px; width:722px\" /></p>', '', '2024-04-17 20:40:06', '2024-04-18 04:30:01'),
(3, 14, 12, '100000', '<p>oke</p>', '', '2024-04-17 21:56:40', '2024-04-17 21:56:40'),
(4, 15, 11, '1200000', '<p>cứu hộ</p>', '', '2024-04-17 22:04:46', '2024-04-17 22:04:46'),
(7, 18, 23, '500000', '<p>Vệ sinh</p>', '', '2024-05-03 06:54:46', '2024-05-03 06:54:46'),
(8, 18, 12, '50000', '<h2>1. Khi n&agrave;o cần cứu hộ xe m&aacute;y?</h2>\r\n\r\n<p>So với &ocirc; t&ocirc; th&igrave; xe m&aacute;y nhỏ gọn, tiện lợi hơn rất nhiều. C&aacute;c hư hỏng thường gặp tr&ecirc;n xe m&aacute;y cũng thường kh&ocirc;ng qu&aacute; nghi&ecirc;m trọng v&agrave; c&oacute; thể nhanh ch&oacute;ng khắc phục bằng c&aacute;ch dắt xe đến tiệm sửa xe gần đ&oacute;. V&igrave; vậy m&agrave; nhiều người cho rằng dịch vụ cứu hộ xe m&aacute;y l&agrave; kh&ocirc;ng cần thiết v&agrave; &iacute;t khi cần d&ugrave;ng đến. Do đ&oacute; họ cũng &iacute;t t&igrave;m hiểu về c&aacute;c đơn vị cứu hộ xe v&agrave; kh&ocirc;ng lưu lại hotline cứu hộ m&ocirc; t&ocirc; v&agrave;o điện thoại.</p>\r\n\r\n<p>Tuy nhi&ecirc;n thực tế th&igrave; nhu cầu cứu hộ xe m&aacute;y hiện nay l&agrave; rất cao v&igrave; những l&yacute; do sau đ&acirc;y:</p>\r\n\r\n<ul>\r\n	<li>Kh&ocirc;ng phải khi n&agrave;o cũng c&oacute; tiệm sửa xe gần vị tr&iacute; bạn gặp sự cố.&nbsp;</li>\r\n	<li>Một số lỗi hư hỏng c&oacute; thể khiến xe kh&oacute; di chuyển v&agrave; bạn kh&ocirc;ng thể dắt bộ xe, bắt buộc phải gọi cứu hộ.</li>\r\n	<li>Nhiều d&ograve;ng xe m&aacute;y c&oacute; trọng lượng nặng, k&iacute;ch thước lớn g&acirc;y kh&oacute; khăn cho qu&aacute; tr&igrave;nh dắt xe đến tiệm sửa xe.</li>\r\n	<li>Kh&ocirc;ng phải tiệm sửa xe n&agrave;o cũng c&oacute; thể sửa chữa tất cả hư hỏng tr&ecirc;n xe m&aacute;y. Với c&aacute;c d&ograve;ng xe ph&acirc;n khối lớn th&igrave; cần phải c&oacute; tiệm sửa xe chuy&ecirc;n nghiệp v&agrave; phụ t&ugrave;ng th&iacute;ch hợp.</li>\r\n	<li>Với c&aacute;c chị em phụ nữ, việc dắt bộ xe l&agrave; rất kh&oacute; khăn v&agrave; tốn nhiều c&ocirc;ng sức. Đặc biệt với c&aacute;c d&ograve;ng xe nặng như SH, Honda lead,&hellip;</li>\r\n	<li>Bạn đang c&oacute; c&ocirc;ng việc gấp v&agrave; cần khắc phục sự cố một c&aacute;ch nhanh ch&oacute;ng nhất.</li>\r\n	<li>Xe của bạn gặp sự cố tr&ecirc;n những cung đường vắng, c&oacute; &iacute;t tiệm sửa xe hoặc trong c&aacute;c khung giờ đặc biệt như s&aacute;ng sớm, đ&ecirc;m muộn &ndash; l&uacute;c n&agrave;y c&aacute;c tiệm sửa xe thường đang đ&oacute;ng cửa.</li>\r\n</ul>\r\n\r\n<p>C&oacute; thể thấy rằng, c&oacute; rất nhiều trường hợp cần cứu hộ xe m&aacute;y. Sự cố thường đến bất ngờ khiến bạn đ&ocirc;i khi kh&ocirc;ng thể trở tay kịp. V&igrave; vậy h&atilde;y lưu sẵn hotline của một v&agrave;i đơn vị cứu hộ xe m&aacute;y uy t&iacute;n, đ&aacute;ng tin cậy trong điện thoại của m&igrave;nh đề ph&ograve;ng l&uacute;c cần d&ugrave;ng đến nh&eacute;.&nbsp;</p>\r\n\r\n<p><img alt=\"Cứu hộ xe máy\" src=\"https://cuuhonhanh24h.com/wp-content/uploads/2023/04/cuu-ho-xe-may-4.jpg\" style=\"height:487px; width:707px\" /></p>\r\n\r\n<p>Dịch vụ cứu hộ xe m&aacute;y 24/7</p>\r\n\r\n<h2>2. Cứu Hộ Nhanh 24h &ndash; đơn vị cứu hộ xe m&aacute;y uy t&iacute;n h&agrave;ng đầu</h2>\r\n\r\n<p>Hiện nay c&oacute; rất nhiều đơn vị cứu hộ xe m&aacute;y cho bạn lựa chọn. Trong đ&oacute; Cứu Hộ Nhanh 24H tự tin khẳng định l&agrave; một trong những đơn vị uy t&iacute;n nhất, lu&ocirc;n c&oacute; mặt nhanh ch&oacute;ng kịp thời để hỗ trợ bạn trong những trường hợp khẩn cấp.</p>\r\n\r\n<p>Dịch vụ cứu hộ m&ocirc; t&ocirc; của ch&uacute;ng t&ocirc;i với th&acirc;m ni&ecirc;n hoạt động hơn 10 năm đ&atilde; cứu hộ h&agrave;ng triệu xe m&aacute;y tr&ecirc;n khắp tỉnh th&agrave;nh tr&ecirc;n to&agrave;n quốc. V&igrave; vậy m&agrave; c&aacute;c bạn h&atilde;y ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m khi lựa chọn ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>V&igrave; sao bạn n&ecirc;n lựa chọn Cứu Hộ Nhanh 24H khi cần cứu hộ xe m&aacute;y, m&ocirc; t&ocirc;?</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>C&oacute; mặt nhanh ch&oacute;ng, kịp thời</h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Cứu Hộ Nhanh 24H c&oacute; đội ngũ kỹ thuật vi&ecirc;n đ&ocirc;ng đảo, hoạt động rộng khắp c&aacute;c quận huyện tr&ecirc;n nhiều tỉnh th&agrave;nh. V&igrave; vậy m&agrave; d&ugrave; bạn gặp sự cố ở bất kỳ khung giờ, đoạn đường n&agrave;o đều sẽ được ch&uacute;ng t&ocirc;i c&oacute; mặt nhanh ch&oacute;ng v&agrave; kịp thời để gi&uacute;p bạn giải quyết sự cố. Đặc biệt Cứu Hộ Nhanh 24H hoạt động cả những ng&agrave;y lễ Tết Nguy&ecirc;n Đ&aacute;n để hỗ trợ người d&acirc;n mọi l&uacute;c, mọi nơi.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cuuhonhanh24h.com/wp-content/uploads/2023/04/cuu-ho-xe-may-6.jpg\" style=\"height:347px; width:707px\" /></p>\r\n\r\n<p>Dịch vụ si&ecirc;u tốc, kịp thời v&agrave; chuy&ecirc;n nghiệp</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>Đội ngũ kỹ thuật vi&ecirc;n tay nghề cao</h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Kỹ thuật vi&ecirc;n của Cứu Hộ Nhanh 24H đều l&agrave; những người c&oacute; tay nghề chuy&ecirc;n m&ocirc;n cao v&agrave; kinh nghiệm l&acirc;u năm sẽ x&aacute;c định ch&iacute;nh x&aacute;c sự cố bạn đang gặp phải v&agrave; khắc phục nhanh ch&oacute;ng.</p>\r\n\r\n<p>Hiện nay Cứu Hộ Nhanh 24H đ&aacute;p ứng được nhu cầu cứu hộ tất cả c&aacute;c d&ograve;ng xe m&aacute;y, m&ocirc; t&ocirc; tr&ecirc;n thị trường từ xe số đến xe ga, ph&acirc;n khối lớn của c&aacute;c tất cả c&aacute;c thương hiệu Honda, Yamaha, Piaggio, SYM, Suzuki, Triumph, Ducati,&hellip;.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>Cam kết phụ t&ugrave;ng ch&iacute;nh h&atilde;ng</h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Với c&aacute;c trường hợp cần thay thế phụ t&ugrave;ng xe, Cứu Hộ Nhanh 24H cam kết lu&ocirc;n sử dụng phụ t&ugrave;ng ch&iacute;nh h&atilde;ng chất lượng cao, đảm bảo an to&agrave;n tuyệt đối v&agrave; độ bền l&acirc;u d&agrave;i cho xe. Kh&aacute;ch h&agrave;ng c&oacute; thể đưa ra y&ecirc;u cầu về loại phụ t&ugrave;ng m&igrave;nh mong muốn để được sửa chữa, thay thế nhanh ch&oacute;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cuuhonhanh24h.com/wp-content/uploads/2023/04/cuu-ho-xe-may-5.jpg\" style=\"height:707px; width:707px\" /></p>\r\n\r\n<p>Phụ t&ugrave;ng ch&iacute;nh h&atilde;ng, uy t&iacute;n</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>Chi ph&iacute; hợp l&yacute;</h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Với dịch vụ cứu hộ xe m&aacute;y của ch&uacute;ng t&ocirc;i, bạn sẽ kh&ocirc;ng phải lo lắng đến vấn đề chi ph&iacute;. Cứu Hộ Nhanh 24H cam kết chi ph&iacute; lu&ocirc;n hợp l&yacute; v&agrave; cạnh tranh, kh&ocirc;ng hề đắt hơn so với việc bạn dắt xe đến sửa chữa tại c&aacute;c tiệm sửa xe. Ngo&agrave;i ra c&aacute;c bạn cũng sẽ được b&aacute;o gi&aacute; chi tiết trước khi cứu hộ n&ecirc;n sẽ kh&ocirc;ng lo t&igrave;nh trạng chặt ch&eacute;m.</p>', '', '2024-05-03 06:58:15', '2024-05-03 06:58:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `NguoiDung`
--

CREATE TABLE `NguoiDung` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `GioiTinh` varchar(255) DEFAULT NULL,
  `CCCD` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `TrangThai` varchar(255) DEFAULT NULL,
  `ID_Nhom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `NguoiDung`
--

INSERT INTO `NguoiDung` (`id`, `email`, `password`, `HoTen`, `SDT`, `created_at`, `updated_at`, `GioiTinh`, `CCCD`, `DiaChi`, `Avatar`, `TrangThai`, `ID_Nhom`) VALUES
(1, 'admin@gmail.com', '$2y$10$cEEGa4GXqC2tB3cF63V2neX5vYihZODv.FlukZn0vn1GU6A3eKvLm', 'Diễm Phúc', 'admin', '2024-03-28 01:51:09', '2024-04-13 08:18:46', '0', '4352354234', 'HN', NULL, '1', '1'),
(14, 'thien@gmail.com', '$2y$10$cEEGa4GXqC2tB3cF63V2neX5vYihZODv.FlukZn0vn1GU6A3eKvLm', 'Khánh Thiên', '0946144333', '2024-04-13 08:31:31', '2024-04-16 08:00:35', '1', '123123123', 'Cần Thơ', '-04-43-186855a6e7a512794e33fccfa679b5158a78.jpeg', '1', '2'),
(15, 'trungtran@gmail.com', '$2y$10$umMSyCDcCpxc6QxknL8nNOJAmN0f//kbSwj9ih9p.T4BmPeW4tpP2', 'Trung Trần', '0915365078', '2024-04-17 22:02:58', '2024-04-17 22:02:58', '1', '123123123', 'Hồ Chí Minh', '1824-quan-31124.jpeg', '1', '2'),
(16, 'nhan@gmail.com', '$2y$10$LixT4zU6q9SAhe4kqq/ej.cGGhPpOcJC8oqzOBr/3/M7ppcd.urcC', 'Thành Nhân', '0941204441', '2024-04-18 04:01:15', '2024-04-21 20:49:26', '1', NULL, 'Tỉnh sóc trăng, phường 2', NULL, '1', '3'),
(17, 'mai@gmail.com', '$2y$10$qXE9nHFAnA7q25dEigjqHuJQhwxN6eGpD1SgT8XjSu98hIw3Lbize', 'Xuân Mai', NULL, '2024-04-21 20:20:28', '2024-04-21 20:50:41', NULL, NULL, NULL, NULL, '0', '2'),
(18, 'huy@gmail.com', '$2y$10$Kq93awoK/Vb/6Pdt1E9GU.wDRaXkoWwo93zfpYjj.2pDEeLiojrAy', 'Hoàng Huy', NULL, '2024-05-03 06:53:23', '2024-05-03 06:53:40', NULL, NULL, NULL, NULL, '1', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `NhomDichVu`
--

CREATE TABLE `NhomDichVu` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `NhomDichVu`
--

INSERT INTO `NhomDichVu` (`id`, `Ten`, `MoTa`, `created_at`, `updated_at`) VALUES
(3, 'Cứu hộ', 'Cứu hộ trên các tuyến đường như kéo, vá lốp, thay vỏ, sửa chữa, thay phụ tùng tận nơi', '2024-04-12 09:08:19', '2024-04-15 08:05:27'),
(4, 'Sữa chữa điện lạnh', 'Sửa chữa các vật dụng điện lạnh như tủ lạnh, máy điều hòa, quạt máy ...', '2024-04-13 21:01:32', '2024-04-13 21:01:32'),
(5, 'Sửa chữa nhà', 'Sửa chữa nhà đã cũ, tân trang lại ngôi nhà của bạn, lắp ráp các mái che, hệ thống thông minh', '2024-04-15 08:07:11', '2024-04-15 08:07:11'),
(6, 'Lắp ráp tấm pin NLMT', 'Chuyên lắp đặt, sửa chữa các tấm pin năng lượng mặt trời cho gia đình của bạn', '2024-04-15 08:09:16', '2024-04-15 08:11:05'),
(7, 'Lắp đặt, sửa chữa camera', 'Chuyên lắp đặt, sửa chữa các loại camera an ninh, đảm bảo chất lượng uy tín', '2024-04-15 08:09:49', '2024-04-15 08:09:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `NhomNguoiDung`
--

CREATE TABLE `NhomNguoiDung` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `NhomNguoiDung`
--

INSERT INTO `NhomNguoiDung` (`id`, `Ten`, `MoTa`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Người quản trị', '2024-04-13 04:43:33', '2024-04-13 04:43:33'),
(2, 'Thợ sửa', 'Thợ sữa chữa', '2024-04-13 04:43:52', '2024-04-13 04:43:52'),
(3, 'Khách hàng', 'Nhũng người có nhu cầu mua hàng', '2024-04-13 04:44:16', '2024-04-13 04:44:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `YeuCauSuaChua`
--

CREATE TABLE `YeuCauSuaChua` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_DichVu` int(11) DEFAULT NULL,
  `ID_Khach` int(11) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ID_Tho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `YeuCauSuaChua`
--

INSERT INTO `YeuCauSuaChua` (`id`, `ID_DichVu`, `ID_Khach`, `MoTa`, `created_at`, `updated_at`, `ID_Tho`) VALUES
(7, 11, 16, 'Xe bị hư lốp', '2024-04-21 01:41:31', '2024-04-21 01:41:31', 14),
(8, 11, 16, 'Xe bị hư lốp', '2024-04-21 01:48:54', '2024-04-21 01:48:54', 15);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `DichVu`
--
ALTER TABLE `DichVu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `HoaDon`
--
ALTER TABLE `HoaDon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `KhaNangSuaChua`
--
ALTER TABLE `KhaNangSuaChua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `NguoiDung`
--
ALTER TABLE `NguoiDung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `NhomDichVu`
--
ALTER TABLE `NhomDichVu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `NhomNguoiDung`
--
ALTER TABLE `NhomNguoiDung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `YeuCauSuaChua`
--
ALTER TABLE `YeuCauSuaChua`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `DichVu`
--
ALTER TABLE `DichVu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `HoaDon`
--
ALTER TABLE `HoaDon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `KhaNangSuaChua`
--
ALTER TABLE `KhaNangSuaChua`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `NguoiDung`
--
ALTER TABLE `NguoiDung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `NhomDichVu`
--
ALTER TABLE `NhomDichVu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `NhomNguoiDung`
--
ALTER TABLE `NhomNguoiDung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `YeuCauSuaChua`
--
ALTER TABLE `YeuCauSuaChua`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
