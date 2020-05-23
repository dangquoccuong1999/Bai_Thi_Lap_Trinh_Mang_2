-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2020 lúc 03:35 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_dang_cuong_authentic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `total_money` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `id_customer`, `date`, `total_money`) VALUES
(34, 11, '1590224039', 89000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `quantity_number` int(11) NOT NULL,
  `capacity` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `id_bill`, `id_product`, `quantity_number`, `capacity`) VALUES
(43, 34, 1, 10, '100ml'),
(44, 34, 2, 5, '100ml'),
(45, 34, 3, 1, '100ml'),
(46, 34, 7, 4, '100ml');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sex` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `id_user`, `name`, `date_of_birth`, `address`, `number_phone`, `sex`) VALUES
(2, 2, 'Phạm Nhật Namm', '2020-05-22', 'Hà Nội', '0379164525', 'Nam'),
(8, 9, 'Đặng Quốc Cường', '2020-05-22', 'Nhà Cương Khánh, chợ Giường Duyên Thái Thường Tín Hà Nội', '0379197756', 'Khác'),
(11, 12, 'Lỗ Trong  Ban', '2020-05-23', 'Hà Nội', '0379197756', 'Khác'),
(16, 17, 'Lỗ Trọng Ban', '2020-05-30', 'Ha Noi', '0379197756', 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `founder`
--

CREATE TABLE `founder` (
  `id` int(20) NOT NULL,
  `name_founder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `founder`
--

INSERT INTO `founder` (`id`, `name_founder`, `age`, `description`, `img`) VALUES
(1, 'Đặng Cường', 21, 'CEO Đặng Quốc Cường sinh ngày 15 tháng 5 năm 1999. Quê ở huyện Thường Tín thành Phố Hà Nội. Sinh ra vào thời bình hiện tại đang làm việc tại khoa CNTT trường đại học Sư Phạm Hà Nội\r\n\r\n', 'View/images/person_cuong.jpg'),
(3, 'Lỗ Trọng Tấn ', 21, 'CEO Lỗ Trọng Tấn sinh ngày 15 tháng 1 năm 1999. Quê ở huyện Mê Linh thành Phố Hà Nội. Ông sinh ra vào thời bình hiện tại đang làm việc tại khoa CNTT trường đại học Sư Phạm Hà Nội\r\n', 'View/images/person_tan.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_04_132804_create_table_product', 1),
(5, '2020_02_04_132849_create_table_product_detail', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_producer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_product`, `name_producer`, `origin`, `description`, `category`, `img_product`, `created_at`, `updated_at`) VALUES
(1, 'Jimmy Choo Man Blue', 'JIMMY CHOO', 'Mỹ', 'Jimmy Choo Man Blue dành riêng cho những bạn trẻ năng động và tìm kiếm sự khác biệt: vừa hiện đại, trẻ trung nhưng vẫn vô cùng thanh lịch và sang trọng.', 'man', 'images/product-1.jpg', '1590224039', '2020-04-10 17:05:53'),
(2, 'K by Dolce & Gabbana', 'Dolce & Gabbana', 'Ý', 'Từ hình ảnh người đàn ông làm chủ sự nghiệp và là điểm tựa của gia đình, Nước hoa nam K by Dolce & Gabbana mở ra một kỉ nguyên mới về chuẩn mực nam tính.', 'man', 'images/product-2.jpg', '1590224039', '2020-04-10 17:05:53'),
(3, 'Yves Saint Laurent Libre Eau De Parfum ', 'Yves Saint Laurent', 'Pháp', 'Yves Saint Laurent Libre Eau De Parfum là hương thơm đại diện của tự do trong thời đại mới. Một loại nước hoa tuyên ngôn cho chính bản thân người dùng.', 'women', 'images/product-3.jpg', '1590224039', '2020-04-10 17:05:53'),
(4, 'Dior J\'adore Eau de Parfum ', 'Dior', 'Mỹ', 'Dior J\'adore Eau de Parfum khiến phái đẹp mang nét đẹp xuất chúng, nữ tính vô hạn đến từ sự lan tỏa mùi hương.', 'man', 'images/product-5.jpg', '1590224039', '2020-04-10 17:05:53'),
(5, 'Versace Man Eau Fraiche', 'Versace', 'Ý', 'Nước hoa nam Versace Man Eau Fraiche được thiết kế tinh tế với thủy tinh màu xanh trong suốt, thân chai có hình răng cưa độc đáo làm người dùng có thể dễ dàng cầm giữ. Với thiết kế thú vị này, sản phẩm đem đến sự cá tính và mạnh mẽ hơn cho phái mạnh.', 'man', 'images/product-4.jpg', '1590224039', '2020-04-10 17:05:53'),
(6, 'Giorgio Armani Acqua di Gioia', 'Giorgio', 'Mỹ', 'Giorgio Armani Acqua di Gioia là phiên bản của hương thơm được bán chạy nhất trên thị trường trong thời gian qua. Trong tiếng Ý, nghĩa của từ Gioia là niềm vui và viên ngọc.', 'man', 'images/product-6.jpg', '1590224039', '2020-04-10 17:05:53'),
(7, 'Montblanc Lady Emblem / Mont Blanc EDP Spray', 'Montblanc', 'Anh', 'Montblanc Lady Emblem / Mont Blanc EDP Spray là ph...', 'women', 'images/product-7.jpg', '1590224039', '2020-04-10 17:05:53'),
(8, 'Ralph Lauren Romance ', 'Yves Saint Laurent', 'Pháp', 'Ralph Lauren Romance là một sản phẩm rất lãng mạn, dành riêng cho người con gái đang yêu.', 'man', 'images/product-8.jpg', '1590224039', '2020-04-10 17:05:53'),
(9, 'Valentino Donna Born In Roma Eau de Parfum', 'Valentino', 'Pháp', 'Valentino Donna Born In Roma Eau de Parfum mang phong cách cổ điển đan xen hiện đại bởi sự góp mặt cả các nốt hương như cam bergamot Ý, hoa hồng Bulgari, hoa diên vĩ thích hợp cho những cô nàng đằm thắm, thích sự lãng mạn và thơ mộng.', 'man', 'images/product-9.jpg', '1590224039', '2020-04-10 17:05:53'),
(10, 'Jo Malones Grapefruit and English Pear & Freesia', 'Jo Malone', 'Mỹ', 'Jo Malones Grapefruit and English Pear & Freesia mang phong cách cổ điển đan xen hiện đại bởi sự góp mặt cả các nốt hương như cam bergamot Ý, hoa hồng Bulgari, hoa diên vĩ thích hợp cho những cô nàng đằm thắm, thích sự lãng mạn và thơ mộng.', 'women', 'images/product-11.jpg', '1590224039', '2020-04-10 17:05:53'),
(11, 'DOLCE&GABBANA The One', 'Dolce & Gabbana', 'Ý', 'DOLCE&GABBANA The One là một mùi hương dành riêng cho người đàn ông: lôi cuốn và quyến rũ, thanh lịch và tinh tế.', 'man', 'images/product-12.jpg', '1590224039', '2020-04-10 17:05:53'),
(12, 'Dolce & Gabbana The One Eau de Toilette for Woman', 'Dolce & Gabbana', 'Ý', 'Dolce & Gabbana giới thiệu lần đầu The One Eau de Toilette vào tháng 9 năm 2017 lấy cảm hứng từ tinh thần của thành phố Napoli của nước Ý. Được thiết kế dành cho những người phụ nữ hiện đại, gợi cảm, vui tươi, tràn đầy năng lượng. Được chuyên gia nước hoa', 'women', 'images/product-13.jpg', '1590224039', NULL),
(13, 'Versace Crystal Noir Eaude ', 'Versace', 'Ý', 'Nước hoa nữ Versace Crystal Noir Eaude  được thiết kế tinh tế với thủy tinh màu xanh trong suốt, thân chai có hình răng cưa độc đáo làm người dùng có thể dễ dàng cầm giữ. Với thiết kế thú vị này, sản phẩm đem đến sự cá tính và mạnh mẽ hơn cho phái mạnh.', 'women', 'images/product-10.jpg', '1590224039', NULL),
(14, 'Nước Hoa CHANEL N°5 RED EDITION Eau De Parfum', 'CHANEL', 'Mỹ', 'Màu gì có thể được kết hợp với sức mạnh của N°5 - biểu tượng của niềm đam mê và khao khát? Đó chính là màu ĐỎ, màu của cuộc sống, màu của máu', 'women', 'images/product-14.jpg', '1590224039', NULL),
(15, 'Nước hoa D&G Light Blue Eau Intense', 'Dolce & Gabbana', 'Ý', 'Nước hoa D&G Light Blue Eau Intense For Women cho nữ, xuất xứ Ý. Sản phẩm có nhóm hương hoa cỏ trái cây, nồng độ edp, lưu hương 7 - 12h', 'women', 'images/product-15.jpg', '1590224039', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `price`, `capacity`, `quantity_number`, `id_product`, `created_at`, `updated_at`) VALUES
(1, '4000000', '100ml', '977', 1, NULL, NULL),
(2, '4000000', '100ml', '983', 2, NULL, NULL),
(3, '5000000', '100ml', '996', 3, NULL, NULL),
(4, '4000000', '100ml', '989', 4, NULL, NULL),
(5, '2000000', '100ml', '985', 5, NULL, NULL),
(6, '6000000', '100ml', '990', 6, NULL, NULL),
(7, '6000000', '100ml', '996', 7, NULL, NULL),
(8, '3000000', '100ml', '1000', 8, NULL, NULL),
(9, '6500000', '100ml', '1000', 9, NULL, NULL),
(10, '6300000', '100ml', '1000', 10, NULL, NULL),
(11, '1000000', '100ml', '1000', 11, NULL, NULL),
(12, '3000000', '100ml', '1000', 12, NULL, NULL),
(13, '3000000', '100ml', '1000', 13, NULL, NULL),
(14, '63000000', '100ml', '1000', 14, NULL, NULL),
(15, '6300000', '100ml', '1000', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recommend_products`
--

CREATE TABLE `recommend_products` (
  `id` int(11) NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `JIMMY CHOO` int(11) NOT NULL,
  `Dolce & Gabbana` int(11) NOT NULL,
  `Yves Saint Laurent` int(11) NOT NULL,
  `Dior` int(11) NOT NULL,
  `Versace` int(11) NOT NULL,
  `Giorgio` int(11) NOT NULL,
  `Montblanc` int(11) NOT NULL,
  `Valentino` int(11) NOT NULL,
  `Jo Malone` int(11) NOT NULL,
  `CHANEL` int(11) NOT NULL,
  `origin_My` int(11) NOT NULL,
  `origin_Y` int(11) NOT NULL,
  `origin_Phap` int(11) NOT NULL,
  `origin_Anh` int(11) NOT NULL,
  `category_man` int(11) NOT NULL,
  `category_women` int(11) NOT NULL,
  `rating` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `recommend_products`
--

INSERT INTO `recommend_products` (`id`, `name_product`, `JIMMY CHOO`, `Dolce & Gabbana`, `Yves Saint Laurent`, `Dior`, `Versace`, `Giorgio`, `Montblanc`, `Valentino`, `Jo Malone`, `CHANEL`, `origin_My`, `origin_Y`, `origin_Phap`, `origin_Anh`, `category_man`, `category_women`, `rating`) VALUES
(1, 'Jimmy Choo Man Blue', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 10),
(2, 'K by Dolce & Gabbana', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 5),
(3, 'Yves Saint Laurent Libre Eau De Parfum ', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 8),
(4, 'Dior J\'adore Eau de Parfum ', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 8),
(5, 'Versace Man Eau Fraiche', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 9),
(6, 'Giorgio Armani Acqua di Gioia', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 10),
(7, 'Montblanc Lady Emblem / Mont Blanc EDP Spray', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 11),
(8, 'Ralph Lauren Romance ', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 8),
(9, 'Valentino Donna Born In Roma Eau de Parfum', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 7),
(10, 'Jo Malones Grapefruit and English Pear & Freesia', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 8),
(11, 'DOLCE&GABBANA The One', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 10),
(12, 'Dolce & Gabbana The One Eau de Toilette for Woman', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 10),
(13, 'Versace Crystal Noir Eaude ', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 6),
(14, 'Nước Hoa CHANEL N°5 RED EDITION Eau De Parfum', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 7),
(15, 'Nước hoa D&G Light Blue Eau Intense', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(5) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'nam', 0, 'nam@gmail.com', NULL, '123456', NULL, NULL, NULL),
(9, 'admin', 1, 'dangcuong@gmail.com', NULL, 'admin', NULL, NULL, NULL),
(12, 'ban', 0, 'ban@gmail.com', NULL, '123456', NULL, NULL, NULL),
(17, 'ban3', 0, 'a@gmail.com', NULL, '123456', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_bill` (`id_bill`),
  ADD KEY `pk_product` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pkCustomer` (`id_user`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `founder`
--
ALTER TABLE `founder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `recommend_products`
--
ALTER TABLE `recommend_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `founder`
--
ALTER TABLE `founder`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `recommend_products`
--
ALTER TABLE `recommend_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `pk_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `pk_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `pkCustomer` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
