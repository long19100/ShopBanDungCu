-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2024 lúc 06:42 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom15_dungcubanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `created_at`) VALUES
(1, 'Dụng Cụ Làm Bánh', 'dung-lam-banh', 'Dụng cụ làm bánh là những thiết bị và vật dụng cần thiết để thực hiện quá trình nướng bánh và chế biến các món ăn ngọt ngon. Từ những chiếc khuôn bánh đa dạng hình dạng cho đến các dụng cụ như máy đánh trứng, cán bột, và spatula, tất cả đều đóng vai trò quan trọng trong việc tạo ra những chiếc bánh hoàn hảo.\r\n\r\nSử dụng dụng cụ đúng cách không chỉ giúp tiết kiệm thời gian mà còn nâng cao chất lượng sản phẩm. Những dụng cụ làm bánh chất lượng cao sẽ mang lại sự đồng đều trong việc nướng, giúp bánh chín đều và có hương vị thơm ngon hơn. Hãy khám phá thế giới của dụng cụ làm bánh để biến những ý tưởng sáng tạo của bạn thành những món ăn hấp dẫn và độc đáo!', '1539659457930.jpg', '2024-10-21 02:27:49'),
(2, 'Nguyên Liệu Làm Bánh', 'nguyen-lieu-lam-banh', 'Nguyên liệu làm bánh là những thành phần cơ bản và quan trọng giúp tạo nên hương vị và kết cấu đặc trưng của các loại bánh. Mỗi loại bánh sẽ có những nguyên liệu riêng, nhưng có một số nguyên liệu cơ bản thường được sử dụng trong hầu hết các công thức bánh:', '1539447753142.jpeg', '2024-10-21 02:31:31'),
(3, 'Khuôn Khay Làm Bánh', 'khuon-khay-lam-banh', 'Khuôn và khay làm bánh là những dụng cụ thiết yếu trong quá trình nướng bánh, đóng vai trò quan trọng trong việc tạo hình và đảm bảo kết cấu của bánh. Sự lựa chọn đúng loại khuôn và khay sẽ ảnh hưởng trực tiếp đến chất lượng và hình dáng của thành phẩm.', 'anh5.png', '2024-10-21 02:34:54'),
(4, 'Túi, hôp, cốc , lọ', 'tu-hop-coc-lo', 'Trong thế giới làm bánh, các dụng cụ như túi, hộp, cốc và lọ đóng vai trò quan trọng giúp quá trình chế biến và trang trí trở nên dễ dàng và hiệu quả hơn.', 'anh9.jpeg', '2024-10-21 02:37:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'Nguyễn Nhật Long', 'nhatlong0319@gmail.com', '0943372256', 'Sản phẩm của tôi bị lỗi', '2024-10-30 07:22:28'),
(14, 'Nguyễn Nhật Long', 'nhatlong0319@gmail.com', '0943372256', 'Lỗi sản phẩm rồi', '2024-11-05 08:37:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `qty`, `created_at`) VALUES
(18, 2, 2, 2, '2024-11-18 05:58:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(20) NOT NULL,
  `total_price` mediumtext NOT NULL,
  `qty` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `user_id`, `product_id`, `total_price`, `qty`, `status`, `created_at`) VALUES
(20, 5, 1, '100', 2, 1, '2024-11-18 11:17:12'),
(21, 5, 10, '100', 2, 0, '2024-11-18 11:17:12'),
(22, 5, 5, '36', 2, 2, '2024-11-18 11:19:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `created_at`) VALUES
(1, 1, 'Bàn xoay mặt kính 30cm', 'ban-xoay-mat-kinh', 'Bàn xoay mặt kính 30cm với mặt kính cường lực bền bỉ, trong suốt, đường kính 30cm, lý tưởng cho các không gian nhỏ gọn. Thiết kế xoay mượt mà giúp tiện lợi trong việc sử dụng, phù hợp để trưng bày đồ vật, phục vụ bàn ăn, hoặc làm phụ kiện trang trí hiện đại và sang trọng.', 'Bàn xoay mặt kính 30cm là sản phẩm lý tưởng cho những ai yêu thích sự tiện lợi và phong cách hiện đại. Với mặt kính cường lực có độ bền cao, đường kính 30cm, bàn không chỉ đẹp mà còn rất chắc chắn và an toàn khi sử dụng. Khả năng xoay 360 độ mượt mà giúp bạn dễ dàng xoay bàn để phục vụ món ăn, đặt các vật dụng nhỏ, hoặc sử dụng trong các buổi tiệc, phòng ăn, phòng khách. Thiết kế tối giản nhưng tinh tế, bàn xoay này phù hợp với nhiều phong cách nội thất khác nhau, tạo điểm nhấn sang trọng cho không gian sống của bạn.', 100, 50, 'anh1.jpeg', 6, '2024-10-22 08:52:35'),
(2, 1, 'Bàn xoay nhựa 28cm', 'ban-xoay-nhua', 'Bàn xoay nhựa đa năng, thiết kế tiện lợi cho không gian sống hiện đại. Chất liệu nhựa bền bỉ, chống thấm nước, dễ dàng vệ sinh. Kích thước phù hợp cho cả không gian nhỏ và lớn.', 'Bàn xoay nhựa là một sản phẩm lý tưởng cho không gian sống hiện đại và tiện nghi. Với thiết kế thông minh, bàn có thể xoay 360 độ, giúp bạn dễ dàng tiếp cận đồ vật mà không cần phải di chuyển bàn. Chất liệu nhựa cao cấp mang lại độ bền vượt trội và khả năng chống thấm nước, làm cho việc vệ sinh trở nên dễ dàng hơn bao giờ hết. Kích thước 28cm phù hợp với nhiều không gian khác nhau, từ phòng khách, phòng ngủ đến văn phòng làm việc. Bàn xoay nhựa không chỉ là một món đồ nội thất hữu ích mà còn là điểm nhấn trang trí độc đáo cho ngôi nhà của bạn.', 500, 100, 'anh2.jpeg', 10, '2024-10-22 08:54:59'),
(3, 3, 'Khay nhựa trong suốt đựng bánh dứa 7.3x5x2cm', 'khay-nhua-trong-suot', 'Khay nhựa trong suốt với kích thước 7.3x5x2cm, hoàn hảo để đựng bánh dứa tươi ngon. Thiết kế tiện lợi giúp bảo quản và trình bày bánh một cách đẹp mắt. Chất liệu nhựa bền, dễ dàng vệ sinh và tái sử dụng, thích hợp cho các bữa tiệc, sự kiện hoặc làm quà tặng.', 'Khay nhựa trong suốt này được thiết kế đặc biệt để đựng bánh dứa, với kích thước lý tưởng 7.3x5x2cm, giúp bảo quản và trình bày bánh một cách hoàn hảo. Chất liệu nhựa bền, an toàn cho thực phẩm, không chứa hóa chất độc hại, đảm bảo sức khỏe cho bạn và gia đình.\r\n\r\nKhay có khả năng chống thấm nước và dễ dàng vệ sinh, giúp bạn tiết kiệm thời gian và công sức trong việc dọn dẹp. Với thiết kế trong suốt, bạn có thể dễ dàng quan sát bánh bên trong mà không cần mở nắp, giúp giữ bánh luôn tươi ngon và hấp dẫn.\r\n\r\nSản phẩm rất thích hợp cho các bữa tiệc sinh nhật, lễ hội, hoặc các sự kiện đặc biệt. Nó cũng là một lựa chọn tuyệt vời để làm quà tặng cho những người yêu thích làm bánh. Hãy trải nghiệm sự tiện lợi và phong cách với khay nhựa trong suốt này!', 399, 155, 'anh4.jpg', 15, '2024-10-24 10:23:58'),
(4, 3, 'Khuôn gato 3D hình ô tô 27.5×14.5x8cm', 'khuon-gato-3d', 'Khuôn gato 3D hình ô tô (27.5×14.5×8cm) giúp bạn tạo ra những chiếc bánh độc đáo cho bữa tiệc. Chất liệu silicon an toàn, dễ lấy bánh và vệ sinh. Biến buổi tiệc của bạn thành một sự kiện thú vị với chiếc bánh ô tô này!', 'Khuôn có thiết kế chi tiết, tái hiện hình dáng chiếc ô tô một cách sống động, giúp bạn dễ dàng tạo ra những chiếc bánh gato thú vị cho bữa tiệc sinh nhật, lễ hội hay bất kỳ dịp đặc biệt nào. Độ sâu và kích thước hoàn hảo giúp bánh có được hình dáng rõ nét, đồng thời cho phép bạn thoải mái trang trí với kem và các loại topping yêu thích.\r\n\r\nDễ dàng vệ sinh và có thể sử dụng trong máy rửa bát, khuôn gato hình ô tô này không chỉ thích hợp cho việc làm bánh mà còn là món quà tuyệt vời cho những người yêu thích nấu nướng. Hãy biến những buổi tiệc trở nên thú vị hơn với chiếc bánh ô tô độc đáo từ khuôn gato 3D này!', 422, 198, 'anh5.png', 3, '2024-10-24 10:29:22'),
(5, 1, 'Cân điện tử SF400', 'can-dien-tu-sf400', 'Cân điện tử SF400, thiết kế nhỏ gọn, tiện lợi, chuyên dùng để cân thực phẩm, đồ vật nhỏ với độ chính xác cao.', 'Cân điện tử SF400 là sản phẩm lý tưởng cho gia đình, nhà bếp, hoặc các cửa hàng nhỏ. Với thiết kế nhỏ gọn, trọng lượng nhẹ, cân hỗ trợ đo lường chính xác với tải trọng lên đến 10kg. Màn hình hiển thị LCD rõ nét giúp dễ dàng đọc kết quả. Cân còn được trang bị chế độ trừ bì và đơn vị cân linh hoạt (g, oz). Sản phẩm sử dụng pin, tiết kiệm năng lượng và dễ dàng thay thế khi cần.', 100, 18, 'anh5.jpg', 1, '2024-10-25 07:28:21'),
(6, 1, 'Chổi quét silicon đúc', 'choi-quet-silicon-duc', 'Chổi quét silicon đúc, bền bỉ, chịu nhiệt cao, lý tưởng để phết dầu, bơ, gia vị trong nấu nướng và làm bánh.', 'Chổi quét silicon đúc được làm từ chất liệu silicon cao cấp, mềm mại, không làm trầy xước bề mặt chảo hoặc khay nướng. Chổi có khả năng chịu nhiệt tốt, an toàn khi sử dụng ở nhiệt độ cao mà không gây biến dạng. Thiết kế đúc nguyên khối giúp sản phẩm chắc chắn, dễ vệ sinh và không bị gãy như các loại chổi thông thường. Đây là dụng cụ hữu ích cho việc phết dầu, gia vị, bơ trong các công thức nấu ăn, nướng bánh, mang đến sự tiện lợi và bền lâu cho nhà bếp của bạn.', 300, 150, 'anh6.jpeg', 2, '2024-10-25 07:30:16'),
(7, 3, 'Khay bánh mỳ 3 sóng size nhỏ Unibaker', 'khay-banh-my-3-song', 'Khay bánh mì 3 sóng size nhỏ Unibaker, chất liệu cao cấp, thiết kế nhỏ gọn, hỗ trợ nướng bánh mì chuyên nghiệp ngay tại nhà.', 'Khay bánh mì 3 sóng size nhỏ Unibaker là sản phẩm lý tưởng cho những ai yêu thích làm bánh tại nhà. Với thiết kế 3 sóng giúp giữ hình dạng bánh mì đều đẹp, khay phù hợp để nướng baguette hoặc các loại bánh mì nhỏ. Sản phẩm được làm từ chất liệu nhôm hoặc thép carbon chống dính, đảm bảo độ bền cao và dễ dàng vệ sinh. Kích thước nhỏ gọn, tiện lợi cho các lò nướng gia đình, giúp bạn tạo ra những mẻ bánh thơm ngon và chuyên nghiệp.', 500, 400, 'anh7.jpeg', 12, '2024-10-25 07:33:20'),
(8, 4, 'Bát giấy kraft nắp PET 1000ml', 'bat-giay-kraft', 'Bát giấy kraft nắp PET 1000ml, thân thiện môi trường, thiết kế chắc chắn, tiện lợi để đựng thức ăn nóng, lạnh hoặc mang đi.', 'Bát giấy kraft nắp PET 1000ml là giải pháp đựng thực phẩm hiện đại và thân thiện với môi trường. Sản phẩm được làm từ giấy kraft cao cấp, kết hợp với nắp nhựa PET trong suốt, an toàn cho sức khỏe và giữ thực phẩm tươi ngon. Với dung tích 1000ml, bát phù hợp để đựng súp, salad, cơm, bún hoặc các món ăn mang đi. Thiết kế chắc chắn, chịu nhiệt tốt, không rò rỉ và dễ dàng phân hủy sinh học, đây là lựa chọn hoàn hảo cho các cửa hàng thực phẩm hoặc người tiêu dùng yêu thích sự tiện lợi và bảo vệ môi trường.', 50, 17, 'anh3.jpeg', 10, '2024-10-25 07:38:27'),
(9, 4, 'Bát giấy kraft chữ nhật nắp PET 750ml', 'bat-giay-kraft-chu-nhat', 'Bát giấy kraft chữ nhật nắp PET 750ml, thiết kế hiện đại, bền đẹp, hoàn hảo để đựng thực phẩm mang đi một cách an toàn và tiện lợi.', 'Bát giấy kraft chữ nhật nắp PET 750ml là sản phẩm đa năng, thích hợp để đựng các loại thực phẩm như cơm, salad, bún, hoặc các món ăn khác. Với chất liệu giấy kraft thân thiện môi trường, bát có độ bền cao, kết hợp nắp PET trong suốt giúp bảo quản thực phẩm tươi ngon và ngăn tràn hiệu quả. Thiết kế hình chữ nhật gọn gàng, dễ sắp xếp trong túi hoặc hộp vận chuyển, sản phẩm không chỉ phù hợp cho các cửa hàng thực phẩm mà còn là lựa chọn tuyệt vời cho những bữa ăn mang đi.', 50, 25, 'anh8.jpeg', 15, '2024-10-25 07:40:02'),
(10, 4, 'Bình gấu đựng trà sữa 400ml', 'binh-gau-tra-sua', 'Bình gấu đựng trà sữa 400ml, thiết kế đáng yêu, nhỏ gọn, phù hợp đựng trà sữa, nước ép, hoặc đồ uống yêu thích của bạn.', 'Bình gấu đựng trà sữa 400ml là sản phẩm độc đáo với hình dáng chú gấu dễ thương, mang lại sự mới lạ cho trải nghiệm thưởng thức đồ uống. Bình được làm từ nhựa PET chất lượng cao, an toàn cho sức khỏe, bền bỉ và tái sử dụng nhiều lần. Với dung tích 400ml, sản phẩm lý tưởng để đựng trà sữa, nước trái cây, sinh tố hoặc đồ uống yêu thích khi mang đi học, làm việc hoặc dã ngoại. Nắp vặn kín chống rò rỉ và dễ dàng vệ sinh, đây là lựa chọn hoàn hảo cho các tín đồ yêu thích phong cách sáng tạo và tiện lợi.', 100, 50, 'anh9.jpeg', 6, '2024-10-25 07:42:31'),
(11, 1, 'Bộ kim rau câu 3D 10 chiếc', 'bo-kim-rau-cau', 'Bộ kim rau câu 3D 10 chiếc, dụng cụ tạo hình nghệ thuật, giúp làm ra những chiếc bánh rau câu 3D đẹp mắt, tinh xảo.', 'Bộ kim rau câu 3D 10 chiếc là dụng cụ hoàn hảo cho những ai yêu thích sáng tạo với nghệ thuật làm bánh rau câu. Bộ sản phẩm gồm 10 đầu kim với các hình dáng khác nhau, từ cánh hoa, lá đến họa tiết trang trí, giúp bạn dễ dàng tạo ra những tác phẩm rau câu 3D sống động và tinh tế. Được làm từ thép không gỉ, các kim bền bỉ, dễ dàng vệ sinh sau khi sử dụng. Sản phẩm thích hợp cho cả người mới bắt đầu và những nghệ nhân chuyên nghiệp, mang lại niềm vui và sự độc đáo trong mỗi món bánh rau câu.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 100, 24, 'anh10.jpg', 10, '2024-10-25 08:02:18'),
(12, 1, 'Máy nhồi bột Bear 3.5L – A35M1', 'may-nhoi-bot-bear', 'Máy nhồi bột Bear 3.5L – A35M1, công suất mạnh mẽ, dung tích lớn, hỗ trợ nhồi bột, trộn bột và làm bánh tiện lợi tại nhà.', 'Máy nhồi bột Bear 3.5L – A35M1 là trợ thủ đắc lực cho những ai đam mê làm bánh. Với dung tích 3.5L và công suất mạnh mẽ, máy giúp nhồi bột đều, mịn mà không tốn sức. Thiết kế hiện đại, thân máy làm từ chất liệu cao cấp, bền bỉ và an toàn khi sử dụng. Máy đi kèm các chế độ nhồi bột linh hoạt, phù hợp cho nhiều loại bánh như bánh mì, bánh bao, pizza, hoặc bột làm mì sợi. Đế máy chống trượt và vận hành êm ái, sản phẩm này là lựa chọn hoàn hảo cho mọi gia đình yêu thích làm bánh tại nhà.', 1000, 500, 'anh11.jpeg', 10, '2024-10-25 08:03:53'),
(13, 1, 'Bộ thìa đong inox 5 chiếc (Đơn vị tsp,ml)', 'bo-thia-dong', 'Bộ thìa đong inox 5 chiếc, thiết kế chính xác theo đơn vị tsp và ml, hỗ trợ đo lường nguyên liệu nhanh chóng và tiện lợi.', 'Bộ thìa đong inox 5 chiếc là dụng cụ không thể thiếu trong nhà bếp, giúp đo lường chính xác các nguyên liệu như gia vị, bột, đường, hoặc chất lỏng theo đơn vị tsp (teaspoon) và ml. Được làm từ inox cao cấp, bộ thìa có độ bền cao, chống gỉ sét và dễ dàng vệ sinh sau khi sử dụng. Thiết kế nhỏ gọn với các kích thước khác nhau được khắc laser rõ ràng, giúp bạn dễ dàng lựa chọn đúng lượng nguyên liệu cần thiết. Sản phẩm lý tưởng cho việc làm bánh, pha chế, hoặc nấu ăn hàng ngày, mang lại sự tiện ích và chuyên nghiệp cho căn bếp của bạn.', 40, 20, 'anh12.jpg', 10, '2024-10-25 08:07:26'),
(14, 2, 'Bột mì Bakers’ Choice số 13 (bread flour) 1kg', 'bot-mi-bakers', 'Bột mì Bakers’ Choice số 13 (bread flour) 1kg, chất lượng cao, đặc biệt cho việc làm bánh mì, giúp tạo ra bánh mì mềm mịn và thơm ngon.', 'Bột mì Bakers’ Choice số 13 (bread flour) 1kg là loại bột mì chuyên dụng dành cho việc làm bánh mì, với hàm lượng protein cao giúp bánh mì có độ đàn hồi tốt và kết cấu mềm mịn. Bột có độ tinh khiết cao, không chứa tạp chất, dễ dàng sử dụng cho các công thức bánh mì truyền thống hay bánh mì phong cách hiện đại. Sản phẩm được đóng gói 1kg, phù hợp cho gia đình hoặc tiệm bánh nhỏ. Với bột mì Bakers’ Choice, bạn có thể tạo ra những chiếc bánh mì thơm ngon, có vỏ giòn, ruột xốp và mùi vị tuyệt vời ngay tại nhà.', 40, 20, 'anh13.jpeg', 10, '2024-10-25 08:17:09'),
(15, 2, 'Bột mì nguyên cám Bob’s Red Mill 2,27kg', 'bot-mi-nguyen-cam', 'Bột mì nguyên cám Bob’s Red Mill 2,27kg, giàu dinh dưỡng, giúp tạo ra các món bánh thơm ngon và lành mạnh với nhiều chất xơ và vitamin.', 'Bột mì nguyên cám Bob’s Red Mill 2,27kg được làm từ 100% lúa mì nguyên hạt, giữ lại đầy đủ các dưỡng chất, chất xơ và vitamin có trong hạt lúa mì. Bột có kết cấu thô hơn so với bột mì tinh khiết, mang lại hương vị đặc trưng và tăng cường giá trị dinh dưỡng cho các món bánh, bánh mì, bánh quy, hoặc các món nướng khác. Với trọng lượng 2,27kg, bột thích hợp cho cả gia đình hoặc các tiệm bánh nhỏ. Đây là lựa chọn tuyệt vời cho những ai muốn bổ sung thêm chất xơ vào chế độ ăn uống mà không làm mất đi hương vị thơm ngon của món ăn.', 40, 25, 'anh14.jpeg', 10, '2024-10-25 08:18:13'),
(16, 2, 'Bơ đậu phộng mịn 340g', 'bo-dau-phong', 'Bơ đậu phộng mịn 340g, hương vị béo ngậy, mịn màng, lý tưởng để phết bánh mì, làm các món tráng miệng hoặc kết hợp với món ăn yêu thích.', 'Bơ đậu phộng mịn 340g là sản phẩm bơ đậu phộng cao cấp, được chế biến từ những hạt đậu phộng tươi ngon, xay nhuyễn mịn màng. Với hương vị béo ngậy, sản phẩm không chỉ thích hợp để phết lên bánh mì mà còn là nguyên liệu tuyệt vời cho các món tráng miệng, sinh tố, hoặc kết hợp với bánh quy, trái cây. Bơ đậu phộng mịn giàu protein, chất béo lành mạnh và không chứa chất bảo quản, mang đến cho bạn nguồn dinh dưỡng tự nhiên và ngon miệng trong từng muỗng.', 50, 10, 'anh15.jpeg', 10, '2024-10-25 08:20:34'),
(17, 2, 'Bột nở (Baking Powder) 100g', 'bot-no-100g', 'Bột nở (Baking Powder) 100g là thành phần không thể thiếu trong việc nướng bánh, giúp làm bánh nở mềm và phồng xốp. Sản phẩm được đóng gói 100g, thích hợp cho việc sử dụng trong các công thức nướng bánh tại gia hoặc kinh doanh.', 'Bột nở (Baking Powder) 100g là một chất tạo nở phổ biến trong việc làm bánh, giúp bánh đạt được độ xốp, mềm mịn khi nướng. Sản phẩm này hoạt động bằng cách giải phóng khí trong quá trình nướng, làm cho bánh phồng lên và có kết cấu nhẹ nhàng. Bột nở được sử dụng trong nhiều loại bánh như bánh bông lan, bánh quy, bánh muffin và các món tráng miệng khác. Được đóng gói 100g, bột nở Baking Powder rất tiện dụng cho cả việc nướng bánh tại nhà và sử dụng trong các cửa hàng bánh.', 40, 20, 'B0429.jpg', 10, '2024-11-18 10:43:45'),
(18, 2, 'Bột nở (Baking powder) 1kg', 'bot-no-baking-powder-1kg', 'Bột nở (Baking Powder) 1kg là thành phần cần thiết trong làm bánh, giúp tạo độ xốp và phồng cho các món bánh. Được đóng gói trong bao bì 1kg, sản phẩm phù hợp cho các tiệm bánh và sử dụng trong lượng lớn.', 'Bột nở (Baking Powder) 1kg là nguyên liệu quan trọng trong ngành nướng bánh, giúp các món bánh trở nên xốp, mềm và phồng đều. Bột nở hoạt động bằng cách giải phóng khí carbon dioxide khi tiếp xúc với nhiệt độ trong quá trình nướng, từ đó tạo ra cấu trúc nhẹ nhàng cho các loại bánh như bánh bông lan, bánh muffin, bánh quy, và các loại bánh khác. Với dung tích 1kg, sản phẩm này phù hợp cho các tiệm bánh hoặc những người làm bánh thường xuyên, tiết kiệm chi phí và sử dụng được lâu dài.', 40, 10, 'B1277-1689929848825.jpeg', 10, '2024-11-18 10:45:42'),
(19, 2, 'Chà bông gà cay đặc biệt 100g', 'cha-bong-ga-cay-dac-biet-100g', 'Chà bông gà cay đặc biệt 100g là món ăn vặt hấp dẫn, có hương vị đậm đà và cay nhẹ, được làm từ thịt gà tươi ngon. Sản phẩm phù hợp cho những ai yêu thích hương vị mới lạ và độc đáo.', 'Chà bông gà cay đặc biệt 100g là món ăn vặt thơm ngon, được chế biến từ thịt gà tươi và gia vị cay đặc trưng, mang đến hương vị hấp dẫn và đậm đà. Với quy cách đóng gói 100g, chà bông gà cay đặc biệt không chỉ là món ăn lý tưởng cho các bữa ăn nhẹ mà còn phù hợp làm quà tặng, hoặc dùng để ăn kèm với cơm, bánh mì, cháo, hoặc xôi. Sản phẩm có độ giòn và vị cay vừa phải, mang đến trải nghiệm ăn uống mới lạ và thú vị cho những ai yêu thích các món ăn có gia vị đậm đà.', 100, 40, 'B8036-1643086601654.jpeg', 10, '2024-11-18 10:47:37'),
(20, 2, 'Chà bông gà cay đặc biệt 400g', 'cha-bong-ga-cay-dac-biet-400g', 'Chà bông gà cay đặc biệt 400g là món ăn vặt thơm ngon, đậm đà hương vị cay nồng, làm từ thịt gà tươi ngon. Đóng gói 400g, phù hợp cho gia đình hoặc sử dụng trong các bữa tiệc, mang lại hương vị đặc biệt và sự tiện lợi.', 'Chà bông gà cay đặc biệt 400g được làm từ thịt gà tươi, chế biến cùng gia vị cay đặc trưng, mang đến hương vị đậm đà và hấp dẫn. Với trọng lượng 400g, sản phẩm rất thích hợp cho các gia đình hoặc sử dụng trong các bữa tiệc, làm món ăn kèm cho các bữa cơm, bánh mì, hoặc các món ăn nhẹ. Chà bông gà cay đặc biệt có độ giòn, vị cay nhẹ, tạo cảm giác thú vị khi thưởng thức. Đây là lựa chọn tuyệt vời cho những ai yêu thích món ăn vặt có hương vị độc đáo và phong phú.', 112, 59, 'B11399-1722045516294.jpeg', 20, '2024-11-18 10:48:44'),
(21, 2, 'Kem béo thực vật Rich’s lùn 454g', 'kem-beo-thuc-vat-richs-lun-454g', 'Kem béo thực vật Rich’s lùn 454g là sản phẩm kem béo cao cấp, thích hợp cho các món tráng miệng, bánh kem, và thức uống. Được đóng gói 454g, sản phẩm mang đến hương vị béo ngậy và độ dẻo mịn, dễ sử dụng.', 'Kem béo thực vật Rich’s lùn 454g là một sản phẩm kem béo được sản xuất từ nguyên liệu thực vật, hoàn hảo cho việc chế biến các món tráng miệng, bánh kem, hoặc pha chế đồ uống. Với trọng lượng 454g, kem béo Rich’s có hương vị béo ngậy và độ mịn dẻo, dễ dàng tạo độ bông xốp và giữ được sự ổn định trong quá trình sử dụng. Đây là lựa chọn lý tưởng cho các tiệm bánh, quán cà phê, hoặc người tiêu dùng yêu thích việc tạo ra những món ăn ngọt, thơm ngon và có kết cấu hoàn hảo.', 500, 100, 'Slun.jpg', 10, '2024-11-18 10:50:03'),
(22, 1, 'Lò nướng UKOEO 32L', 'lo-nuong-ukoeo-32l', 'Lò nướng UKOEO 32L có thiết kế hiện đại, dung tích 32L phù hợp cho gia đình hoặc tiệm bánh, giúp nướng thực phẩm nhanh chóng và đồng đều với nhiều chức năng tiện lợi.', 'Lò nướng UKOEO 32L là sản phẩm lý tưởng cho những ai yêu thích nướng bánh, thịt, và các món ăn khác tại nhà. Với dung tích 32L, lò nướng này phù hợp cho gia đình hoặc các tiệm bánh có nhu cầu nướng số lượng vừa phải. Lò có thiết kế hiện đại, dễ sử dụng với các chức năng điều chỉnh nhiệt độ và thời gian nướng linh hoạt, giúp bạn dễ dàng nướng thực phẩm đạt kết quả như mong muốn. Các tính năng ưu việt như khả năng nướng đồng đều và tiết kiệm năng lượng giúp tiết kiệm thời gian và công sức trong việc chế biến món ăn.', 1000, 500, 'B7834-1640937753182.png', 6, '2024-11-18 10:52:40'),
(23, 3, 'Khuôn nướng bánh Springform 20cm Unibaker', 'khuon-nuong-banh-springform-20cm-unibaker', 'Khuôn nướng bánh Springform 20cm Unibaker giúp bạn tạo ra những chiếc bánh ngọt, bánh mousse, hoặc bánh kem với hình dạng hoàn hảo. Kích thước 20cm, dễ dàng tháo ra và vệ sinh sau khi sử dụng.', 'Khuôn nướng bánh Springform 20cm Unibaker là sản phẩm lý tưởng để nướng các loại bánh ngọt, mousse, hoặc bánh kem tại nhà. Với thiết kế vòng xoay thông minh, bạn có thể dễ dàng tháo khuôn sau khi nướng mà không làm hỏng hình dáng của bánh. Kích thước 20cm vừa vặn cho các loại bánh nhỏ, phù hợp với gia đình hoặc các bữa tiệc. Chất liệu chống dính cao cấp giúp việc vệ sinh khuôn trở nên đơn giản và nhanh chóng. Đây là công cụ không thể thiếu trong bộ đồ dùng nấu nướng của những người yêu thích làm bánh.', 100, 30, 'B7925-1640510815930.jpeg', 10, '2024-11-18 10:54:44'),
(24, 3, 'Khuôn bánh mì gối 21cm', 'khuon-banh-mi-goi-21cm-chong-dinh', 'Khuôn nướng bánh Springform 20cm Unibaker giúp bạn tạo ra những chiếc bánh ngọt, bánh mousse, hoặc bánh kem với hình dạng hoàn hảo. Kích thước 20cm, dễ dàng tháo ra và vệ sinh sau khi sử dụng.', 'Khuôn nướng bánh Springform 20cm Unibaker là sản phẩm lý tưởng để nướng các loại bánh ngọt, mousse, hoặc bánh kem tại nhà. Với thiết kế vòng xoay thông minh, bạn có thể dễ dàng tháo khuôn sau khi nướng mà không làm hỏng hình dáng của bánh. Kích thước 20cm vừa vặn cho các loại bánh nhỏ, phù hợp với gia đình hoặc các bữa tiệc. Chất liệu chống dính cao cấp giúp việc vệ sinh khuôn trở nên đơn giản và nhanh chóng. Đây là công cụ không thể thiếu trong bộ đồ dùng nấu nướng của những người yêu thích làm bánh.', 100, 50, '1513473t1rrbcfmlaxxxxxxxx-0-item-pic-600x600-1.jpg', 16, '2024-11-18 10:56:23'),
(25, 3, 'Khay nướng bánh mì 4 rãnh 38x33x2.5cm', 'khay-nuong-banh-mi-4-ranh-38332-5cm', 'Khay nướng bánh mì 4 rãnh 38332 5cm giúp nướng bánh mì đồng đều và đẹp mắt, với thiết kế 4 rãnh, kích thước 5cm phù hợp cho các tiệm bánh và gia đình.', 'Khay nướng bánh mì 4 rãnh 38332 5cm là lựa chọn lý tưởng cho việc nướng bánh mì với số lượng lớn và đều. Thiết kế với 4 rãnh riêng biệt giúp bạn nướng 4 ổ bánh cùng lúc mà không làm ảnh hưởng đến chất lượng từng chiếc bánh. Kích thước 5cm giúp bánh chín đều và có hình dáng chuẩn. Chất liệu của khay nướng giúp truyền nhiệt nhanh và đều, mang đến những chiếc bánh mì có vỏ giòn, ruột mềm. Khay dễ dàng vệ sinh và phù hợp cho cả tiệm bánh chuyên nghiệp lẫn sử dụng tại gia.', 116, 120, 'khaybanhmi.jpg', 14, '2024-11-18 10:59:01'),
(26, 3, 'Muỗng múc kem inox dạng bấm 5cm', 'muong-muc-kem-inox-dang-bam-5cm', 'Muỗng múc kem inox dạng bấm 5cm giúp bạn dễ dàng múc kem thành từng viên tròn đẹp mắt, với thiết kế inox bền bỉ và cơ chế bấm tiện lợi.', 'Muỗng múc kem inox dạng bấm 5cm là dụng cụ lý tưởng để múc kem thành viên tròn hoàn hảo, giúp bạn dễ dàng tạo hình kem đẹp mắt cho các món tráng miệng. Thiết kế inox bền bỉ, chống gỉ sét và dễ dàng vệ sinh sau khi sử dụng. Cơ chế bấm tiện lợi giúp kem không dính vào muỗng, dễ dàng thả ra mà không làm mất hình dáng. Với đường kính 5cm, muỗng phù hợp để múc các loại kem mềm hoặc đông lạnh, mang đến trải nghiệm múc kem nhanh chóng và chính xác.', 123, 113, 'B9372-1686549991269.jpeg', 17, '2024-11-18 11:00:35'),
(27, 3, 'Khuôn tart giấy bạc 5.6cm ', 'khuon-tart-giay-bac-5-6cm-khoang-250-chiec', 'Khuôn tart giấy bạc 5.6cm (khoảng 250 chiếc) là lựa chọn tiện lợi để làm tart, bánh nhỏ, với chất liệu giấy bạc chống dính và dễ dàng tháo khuôn.', 'Khuôn tart giấy bạc 5.6cm (khoảng 250 chiếc) là sản phẩm tiện dụng giúp bạn tạo ra những chiếc tart nhỏ xinh và đẹp mắt. Với chất liệu giấy bạc chất lượng, khuôn giúp bánh không bị dính và dễ dàng tháo khuôn sau khi nướng. Kích thước 5.6cm phù hợp để làm các món bánh tart mini, bánh ngọt, hoặc món ăn vặt cho bữa tiệc. Đóng gói khoảng 250 chiếc, khuôn giấy bạc tiết kiệm và phù hợp cho việc sử dụng trong gia đình hoặc các tiệm bánh.', 456, 343, 'B9432-1686275551779-1.jpeg', 10, '2024-11-18 11:02:47'),
(28, 4, 'Bộ 5 que cắm ông già Noel', 'bo-5-que-cam-ong-gia-noel', 'Bộ 5 que cắm ông già Noel là phụ kiện trang trí thú vị, hoàn hảo cho các dịp lễ Giáng Sinh, giúp không gian thêm phần ấm cúng và vui tươi.', 'Bộ 5 que cắm ông già Noel là sản phẩm trang trí Giáng Sinh tuyệt vời để tạo không gian lễ hội vui nhộn và ấm áp. Mỗi que cắm được thiết kế hình ông già Noel dễ thương, với màu sắc nổi bật và chi tiết sinh động, mang đến vẻ đẹp đặc trưng của mùa lễ hội. Bộ sản phẩm này rất phù hợp để trang trí cây thông Noel, bàn tiệc hoặc các khu vực trong nhà, mang lại không khí Giáng Sinh vui vẻ và ấm cúng cho gia đình và bạn bè.', 123, 50, 'B6003-1606709137629-2.jpeg', 14, '2024-11-18 11:07:23'),
(29, 4, 'Bộ 7 que cắm ngôi nhà giáng sinh', 'bo-7-que-cam-ngoi-nha-giang-sinh', 'Bộ 7 que cắm ngôi nhà Giáng Sinh là phụ kiện trang trí tuyệt vời, mang không khí lễ hội về với những ngôi nhà nhỏ xinh, hoàn hảo cho mùa Giáng Sinh.', 'Bộ 7 que cắm ngôi nhà Giáng Sinh là một lựa chọn tuyệt vời để trang trí trong dịp lễ Giáng Sinh. Mỗi que cắm có hình ngôi nhà Giáng Sinh dễ thương với chi tiết tinh xảo, tạo nên không khí ấm cúng và vui tươi. Bộ sản phẩm này có thể dùng để trang trí cây thông Noel, bàn tiệc hoặc bất kỳ không gian nào trong nhà, mang đến vẻ đẹp đặc trưng của mùa lễ hội. Với thiết kế đa dạng và sắc màu nổi bật, bộ que cắm sẽ giúp không gian nhà bạn thêm phần lộng lẫy và đầy sắc màu Giáng Sinh.', 50, 10, 'B6016-1606707226134.jpeg', 10, '2024-11-18 11:08:58'),
(30, 4, 'Bộ túi và hộp giấy 1 ngăn mẫu Hoa xuân', 'hop-giay-hoa-xuan', 'Bộ túi và hộp giấy 1 ngăn mẫu Hoa xuân là sự lựa chọn hoàn hảo để đóng gói quà tặng, mang đến vẻ đẹp tươi mới và ý nghĩa cho dịp Tết và mùa xuân.', 'Bộ túi và hộp giấy 1 ngăn mẫu Hoa xuân là sản phẩm trang nhã, tinh tế, lý tưởng để đóng gói quà tặng trong dịp Tết hoặc mùa xuân. Với họa tiết hoa xuân tươi tắn, bộ túi và hộp giấy mang lại cảm giác mới mẻ, ấm áp và ý nghĩa. Hộp giấy 1 ngăn rộng rãi, phù hợp để đựng các món quà nhỏ, trong khi túi giấy đi kèm dễ dàng cầm nắm và mang theo. Chất liệu giấy chắc chắn, giúp bảo vệ quà tặng bên trong, đồng thời tạo điểm nhấn trang trí nổi bật.', 50, 25, 'B6061-1607680554536.jpeg', 14, '2024-11-18 11:10:29'),
(31, 4, 'Bộ túi và hộp giấy 2 ngăn mẫu Én Vàng', 'hop-giay-en-vang', 'Bộ túi và hộp giấy 2 ngăn mẫu Én Vàng là lựa chọn sang trọng và tinh tế, lý tưởng để đựng quà tặng trong những dịp đặc biệt, mang lại vẻ đẹp quý phái.', 'Bộ túi và hộp giấy 2 ngăn mẫu Én Vàng với thiết kế độc đáo và tinh xảo, là sự lựa chọn hoàn hảo để đóng gói những món quà tặng đặc biệt. Mẫu Én Vàng mang lại cảm giác sang trọng và đẳng cấp, với họa tiết én vàng mang ý nghĩa may mắn, tài lộc. Hộp giấy 2 ngăn giúp phân chia quà tặng một cách gọn gàng và bảo vệ món quà bên trong, trong khi túi giấy đi kèm dễ dàng cầm nắm và di chuyển. Chất liệu giấy cao cấp và màu sắc trang nhã làm bộ sản phẩm này trở nên lý tưởng cho những dịp lễ tết, sinh nhật hay các sự kiện quan trọng.', 100, 50, 'B6063-1607680588567.jpeg', 10, '2024-11-18 11:11:59'),
(32, 4, 'Cup giấy cứng 4x5cm mẫu ngẫu nhiên', 'cup-giay-cung-4x5cm-mau-ngau-nhien', 'Cup giấy cứng 4x5cm mẫu ngẫu nhiên (48 – 50 chiếc) là sản phẩm tiện dụng, lý tưởng cho các dịp tiệc, sự kiện, với chất liệu giấy cứng và mẫu thiết kế ngẫu nhiên.', 'Cup giấy cứng 4x5cm mẫu ngẫu nhiên (48 – 50 chiếc) là lựa chọn hoàn hảo để sử dụng trong các bữa tiệc, sự kiện hoặc hoạt động ngoài trời. Với kích thước nhỏ gọn, mỗi cup giấy có thể đựng các loại thức uống như trà, cà phê hoặc các loại đồ uống khác. Chất liệu giấy cứng giúp đảm bảo độ bền và khả năng chịu lực tốt, không bị mềm hoặc rách khi sử dụng. Bộ sản phẩm bao gồm các cup giấy với mẫu thiết kế ngẫu nhiên, mang đến sự thú vị và đa dạng cho không gian tiệc của bạn.', 25, 12, 'B7873-1640946933277.png', 19, '2024-11-18 11:14:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VQrc5A7fMTU5omuAmE7X8vQhHpeDshuvvmyY28ZY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicnQ5NjZiWG1qOEViNGx5aE8wR3NTc0ZISzN0OWFhd0RUN3hpcko1YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1731951242),
('x5k5N9NsiCtuF4Wskmm0DrUsohn4Qv3T3nhkQe7v', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZW9OM3Bsd0Q3a0dVYm5BZm1zdUo2Qk9pQ2tNY1JhZHlRdHJQVGo5diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1731956415);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `role_as`, `created_at`) VALUES
(1, 'Admin DashBoard\r\n', 'admin@gmail.com', '0943372256', 'Hà Tĩnh', '$2y$12$S/Sd2Bi/HS5hWmqta1uU5.WlRqPJ8dqIqFuBO90Z/9VmrJT8LM4/W', 1, '2024-10-21 01:27:04'),
(2, 'Trương Văn Hiếu', 'vanhieu@gmail.com', '0123456789', 'Hà Nam', '$2y$12$qsGRrabXRbVyknCwnzpxmOf4ZtlpFyKDlvcAQlr8UG6SlLLLYDLy2', 0, '2024-10-21 01:28:43'),
(3, 'Nguyễn Minh Hiếu', 'minhhieu@gmail.com', '09123456783', 'Thanh Hoá', '$2y$12$XEiObEog2Xcr6yXuKAilEu9ZfuqMCp6j6wX95n60qVDvJhyFz9QoG', 0, '2024-10-21 22:41:14'),
(4, 'Nguyễn Tiến Long', 'tienlong@gmail.com', '09147258369', 'Hà Tây', '$2y$12$CROWg.dgw9C/oOMJlJnY4.1H6tsDBI0cmhAnnPMQFEaa.LkId6/OS', 0, '2024-10-22 01:11:49'),
(5, 'Nguyễn Nhật Long', 'nhatlong0319@gmail.com', '0943372256', 'Hà Tĩnh', '$2y$12$HOnFXLB6zjGXr5D9cEq4nePv3rDffGdNeawGxBIrk/IW/PDsqd8CO', 0, '2024-11-18 11:16:35');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
