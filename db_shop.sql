-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2022 at 12:31 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `gender`, `address`, `email`, `password`, `token`) VALUES
(24, 'Khách Hàng', '0123456789', 1, 'Việt Nam', 'kh1@gmail.com', '123456', NULL),
(31, 'Lê Hưng', '+84123456789', 1, 'Đông Lào', 'auzeze111@gmail.com', 'hahaha', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` int(11) NOT NULL,
  `working_year` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `levels` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `address`, `gender`, `working_year`, `email`, `password`, `token`, `levels`) VALUES
(1, 'Nhân Viên 1', '01284322', 'Hồ Tây', 0, 2020, 'nv1@gmail.com', '123456', NULL, 0),
(3, 'Nhân Viên 2', '09872934', 'Hồ Gươm', 1, 2019, 'nv2@gmail.com', '123456', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `customer_id` int(11) NOT NULL,
  `token` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `menu_id`, `name`) VALUES
(1, 2, 'Apple'),
(5, 4, ' Asus'),
(6, 2, 'OPPO'),
(7, 2, 'Xiaomi'),
(8, 2, 'SAMSUNG'),
(9, 2, 'Vivo'),
(10, 2, 'Nokia'),
(11, 4, 'Dell'),
(12, 4, 'Acer'),
(13, 4, 'HP'),
(14, 2, 'VSmart'),
(15, 2, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(4, 'LAPTOP'),
(2, 'ĐIỆN THOẠI');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_phone` varchar(15) NOT NULL,
  `receiver_address` text NOT NULL,
  `status` int(11) NOT NULL,
  `note` text,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `employee_id`, `created_at`, `receiver_name`, `receiver_phone`, `receiver_address`, `status`, `note`, `total_price`) VALUES
(23, 24, NULL, '2022-01-27 12:22:21', 'Khách Hàng', '0123456789', 'Việt Nam', 1, '', 64000000);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(23, 18, 1),
(23, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Mới đặt'),
(2, 'Đã duyệt'),
(3, 'Đã giao'),
(4, 'Hủy');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created` date DEFAULT NULL,
  `price` float NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `photo`, `created`, `price`, `manufacturer_id`, `menu_id`) VALUES
(4, 'iPhone 13 Pro Max 128GB', 'iPhone 13 Pro Max xứng đáng là một chiếc iPhone lớn nhất, mạnh mẽ nhất và có thời lượng pin dài nhất từ trước đến nay sẽ cho bạn trải nghiệm tuyệt vời, từ những tác vụ bình thường cho đến các ứng dụng chuyên nghiệp.', '1641629266.jpg', NULL, 32000000, 1, 2),
(5, 'OPPO Reno6 Z 5G', 'Không chỉ đưa bạn đến những trải nghiệm đầy phấn khích của mạng 5G siêu tốc, OPPO Reno6 Z 5G còn là chiếc điện thoại tuyệt vời để lưu giữ cảm xúc. Chụp ảnh và quay video chân dung chưa bao giờ thú vị đến thế với loạt tính năng chuyên nghiệp, đầy nghệ thuật.', '1641629368.jpg', NULL, 9500000, 6, 2),
(6, 'iPhone 11 64GB', 'iPhone 11 với 6 phiên bản màu sắc, camera có khả năng chụp ảnh vượt trội, thời lượng pin cực dài và bộ vi xử lý mạnh nhất từ trước đến nay sẽ mang đến trải nghiệm tuyệt vời dành cho bạn.\r\n\r\nĐiện thoại iPhone 11 chính hãng\r\n\r\nRực rỡ sắc màu, thể hiện cá tính\r\nCó tới 6 sự lựa chọn màu sắc cho iPhone 11 64GB, bao gồm Tím, Vàng, Xanh lục, Đen, Trắng và Đỏ, tha hồ để bạn lựa chọn màu phù hợp với sở thích, cá tính riêng của bản thân. Vẻ đẹp của iPhone 11 đến từ thiết kế cao cấp khi được làm từ khung nhôm nguyên khối và mặt lưng liền lạc với một tấm kính duy nhất. Ở mặt trước, bạn sẽ được chiêm ngưỡng màn hình Liquid Retina lớn 6,1 inch, màu sắc vô cùng chân thực. Tất cả tạo nên chiếc điện thoại tràn đầy hứng khởi.\r\n\r\nRực rỡ sắc màu, thể hiện cá tính | iPhone 11\r\n\r\nHệ thống camera kép mới\r\nApple iPhone 11 sở hữu cụm camera kép mặt sau, bao gồm camera góc rộng và camera góc siêu rộng. Cảm biến camera góc rộng 12MP có khả năng lấy nét tự động nhanh gấp 3 lần trong điều kiện thiếu sáng. Bên cạnh đó cảm biến góc siêu rộng cho khả năng chụp cảnh rộng gấp 4 lần, là phương tiện ghi hình tuyệt vời cho những chuyến du lịch, chụp hình nhóm. Nhanh chóng chụp ảnh, quay video, chỉnh sửa và chia sẻ ngay trên iPhone, bạn sẽ không bỏ lỡ bất cứ khoảnh khắc đáng nhớ nào.\r\n\r\nHệ thống camera kép mới | iPhone 11\r\n\r\nQuay video chưa bao giờ chuyên nghiệp đến thế\r\nĐiện thoại iPhone 11 64GB có khả năng quay những đoạn video tuyệt đẹp với độ phân giải 4K 60fps siêu sắc nét. Camera góc siêu rộng mang đến nhiều khung cảnh hơn, đồng thời khả năng quay chuyển động cực ấn tượng sẽ tạo nên những thước phim hoàn hảo. Ngoài ra bạn còn có thể tập trung thu âm vào một chủ thể khi quay video bằng cách phóng to, zoom hình ảnh – đồng thời zoom âm thanh hết sức thú vị. Tất nhiên sau khi quay video, việc chỉnh sửa và xuất bản sẽ diễn ra hết sức tiện lợi, nhanh chóng trên iPhone 11.', '1641629484.png', NULL, 15000000, 1, 2),
(7, 'Laptop ASUS Gaming TUF FX506HCB', 'ngon', '1641631706.jpg', NULL, 25000000, 5, 4),
(14, 'Iphone 13 Pro 128GB', 'Đánh giá chi tiết iPhone 13 Pro\r\nTận hưởng tốc độ khó tin trên chiếc smartphone nhanh nhất thế giới, iPhone 13 Pro với màn hình ProMotion 120Hz đột phá, bộ vi xử lý A15 Bionic cho hiệu năng không đối thủ, thời lượng pin vượt trội và bộ 3 camera được nâng cấp đáng kể, xứng đáng là chiếc điện thoại đầu bảng trên thị trường.\r\n\r\nĐiện thoại iPhone 13 Pro\r\n\r\nThể hiện đẳng cấp trong từng đường nét\r\nSự cao cấp toát lên ở mọi chi tiết là điều mà bạn có thể dễ dàng cảm nhận được trên iPhone 13 Pro. Được chế tác từ khung thép không gỉ cứng cáp, bảo vệ màn hình là mặt gốm Ceramic Shield siêu cứng cùng ngôn ngữ thiết kế phẳng hiện đại, iPhone 13 Pro có vẻ đẹp trường tồn theo năm tháng.\r\n\r\nĐiện thoại còn đạt chuẩn chống nước IP68, tránh được mọi nguy cơ từ nước trong cuộc sống thường ngày. Bên cạnh 3 màu sắc quen thuộc là Xám, Vàng, Trắng, iPhone 13 Pro năm nay có thêm màu Xanh Sierra đẹp theo xu hướng thanh lịch và độc đáo.\r\n\r\nthiết kế iPhone 13 Pro\r\n\r\nCamera nâng cấp nhiều nhất từ trước đến nay\r\nHệ thống camera Pro với 3 camera được nâng cấp mạnh mẽ, với phần cứng ống kính chất lượng hơn, phần mềm thông minh hơn và con chip xử lý hình ảnh tốc độ nhanh hơn.\r\n\r\niPhone 13 Pro sở hữu camera chính khẩu độ f/1.5, điểm ảnh 1.9 um, lớn nhất trong thế giới smartphone cho khả năng thu sáng vượt trội; camera góc siêu rộng khẩu độ f/1.8, cảm biến nhanh hơn, lấy nét từng điểm ảnh và camera tele có khả năng zoom quang học 3x. Hãy cùng đón chờ những điều kỳ diệu đang chờ đón bạn ở camera iPhone 13 Pro.\r\n\r\ncamera iPhone 13 Pro\r\n\r\nChụp ảnh và quay video macro\r\nVới iPhone 13 Pro, những chi tiết nhỏ nhất cũng có thể biến thành tác phẩm nghệ thuật. Khả năng lấy nét ở khoảng cách siêu gần chỉ 2cm giúp các vật thể nhỏ như chiếc lá, côn trùng hay thậm chí giọt sương đều được tái hiện sắc nét.\r\n\r\nKhông chỉ chụp ảnh, iPhone 13 Pro còn là chiếc điện thoại đầu tiên có thể quay video macro, tích hợp cả tính năng chuyển động chậm và tua nhanh khi quay, mang đến những thước phim macro mê hoặc.\r\n\r\nchụp ảnh macro iPhone 13 Pro\r\n\r\nThách thức màn đêm\r\niPhone 13 Pro là chiếc điện thoại chuyên dụng cho điều kiện ánh sáng yếu. Với ống kính camera khẩu độ rộng hơn, kích thước cảm biến lớn hơn và sự hỗ trự đắc lực của máy quét LiDAR, iPhone 13 Pro không chỉ chụp cảnh đêm hoàn hảo mà còn có thể chụp chân dung đêm đầy ấn tượng.\r\n\r\nSo với thế hệ trước, camera chính cho ánh sáng nhiều hơn tới 2,2 lần, camera siêu rộng sáng hơn 92%. Chế độ chụp đêm giờ đây cũng có mặt ở camera siêu rộng và camera tele để ảnh chụp đêm sắc nét, giàu chi tiết, màu sắc chính xác trong mọi hoàn cảnh.\r\n\r\nchụp đêm iPhone 13 Pro\r\n\r\nZoom quang 3x và hơn thế nữa với camera Tele\r\nCamera Tele mới trên điện thoại iPhone 13 Pro có tiêu cự 77mm và khả năng zoom quang 3x, lý tưởng cho ảnh chụp chân dung hoặc phóng to ảnh, video mà không hề giảm chất lượng.\r\n\r\nĐối với ảnh chân dung, hiệu ứng xóa phông và tách biệt phông nền rất mượt mà, tự nhiên. Bạn cũng có những hiệu ứng ánh sáng chuẩn studio để hình ảnh thêm phần nghệ thuật.\r\n\r\nquay 3x iPhone 13 Pro\r\n\r\nQuay video xóa phông chuẩn điện ảnh\r\nChế độ điện ảnh Cinematic trên iPhone 13 Pro có thể quay video xóa phông và chuyển đổi lấy nét mượt mà trong khung hình, cho sự sáng tạo trở nên chuyên nghiệp hơn bao giờ hết. Bạn có thể thay đổi, điều chỉnh độ làm mờ phông nền cả trước và sau khi quay video.\r\n\r\nChế độ Cinematic hỗ trợ tất cả camera bao gồm 3 camera sau và camera trước, tương thích hình ảnh Dolby Vision HDR. Với iPhone 13 Pro, bạn sẽ đóng vai trò đạo diễn, quay phim và tự mình sáng tạo những đoạn phim hiệu ứng chiều sâu thú vị chuẩn điện ảnh một cách dễ dàng.\r\n\r\nxóa phông iPhone 13 Pro\r\n\r\nBộ lọc màu thông minh\r\nTrên iPhone 13 Pro có rất nhiều bộ lọc màu, điều chỉnh tông màu một cách tự nhiên cho phong cảnh bạn đang chụp. Bạn có thể nhanh chóng áp dụng những bộ lọc màu sẵn, hoặc tinh chỉnh sâu hơn để có được bức ảnh hoàn toàn ưng ý. Chỉ cần vài thao tác đơn giản, những bức ảnh của bạn sẽ sống động hơn rất nhiều, như chụp và chỉnh sửa bởi các nhiếp ảnh gia thứ thiệt.\r\n\r\nbộ lọc màu iPhone 13 Pro\r\n\r\nChế độ chỉnh sửa video chuyên nghiệp\r\niPhone 13 Pro là chiếc điện thoại đầu tiên có khả năng sản xuất video chuyên nghiệp từ quay, dựng và chỉnh sửa trong chế độ ProRes. Đây là chế độ cho phép bạn thực hiện những dự án video phức tạp với nhiều tính năng chuyên sâu, dễ dàng chỉnh sửa trên ứng dụng Final Cut Pro của máy tính Mac. Chỉ một chiếc điện thoại nhỏ gọn, bạn có thể tạo ra các đoạn phim, vlog chất lượng chuyên nghiệp.\r\n\r\nvideo iPhone 13 Pro\r\n\r\nCamera selfie đỉnh cao\r\nCamera trước của iPhone 13 Pro cũng không kém phần “Pro” với độ phân giải cao 12MP và hỗ trợ toàn bộ tính năng có mặt trên camera chính. Từ chụp ảnh chân dung, chế độ chụp đêm, Smart HDR 4, Apple ProRAW cho đến quay video 4K HDR Dolby Vision, video điện ảnh Cinematic hay cả video ProRes, tất cả đều xuất hiện trên camera trước iPhone 13 Pro.\r\n\r\nNgoài ra công nghệ TrueDepth cũng hỗ trợ tính năng nhận diện khuôn mặt Face ID, phương thức xác thực sinh trắc học an toàn nhất trên smartphone hiện nay.\r\n\r\nselfie iPhone 13 Pro\r\n\r\nMàn hình ProMotion 120Hz thay đổi cuộc chơi\r\nMột trải nghiệm hoàn toàn mới trên iPhone 13 Pro với màn hình Super Retina XDR công nghệ ProMotion. Màn hình sẽ có tần số làm tươi linh hoạt từ 10 đến 120Hz tùy thuộc vào tác vụ bạn đang sử dụng, mang tới trải nghiệm mượt mà hơn bao giờ hết.\r\n\r\nTốc độ màn hình sẽ tăng lên khi chơi những tựa game đồ họa cao và giảm xuống để tiết kiệm năng lượng trong các tác vụ thông thường. Màn hình này thậm chí còn thông minh đến mức để hiệu ứng mượt mà dựa theo tốc độ ngón tay cuộn trang của bạn. Từng thao tác vuốt chạm của bạn đều trở nên khác biệt trên iPhone 13 Pro và mọi thứ còn tuyệt vời hơn nữa khi chơi game.\r\n\r\nmàn hình iPhone 13 Pro\r\n\r\nChất lượng hiển thị đẹp mãn nhãn\r\nMàn hình của một chiếc iPhone Pro chưa bao giờ làm bạn phải thất vọng. iPhone 13 Pro sở hữu màn hình công nghệ OLED tùy chỉnh của Apple, cho độ phân giải siêu cao và màu sắc chính xác, chân thực đến khó tin.\r\n\r\nĐộ sáng màn hình được tăng lên 25%, đạt tới 1200 nits cho hình ảnh và nội dung HDR. Độ sâu màu đen và độ sắc nét tuyệt vời, giúp mọi thứ đều trở nên sống động, dù là khi xem phim, chơi game hay chỉ là đọc văn bản. Hệ thống camera TrueDepth trên iPhone 13 Pro được thu nhỏ hơn thế hệ trước, mang đến nhiều không gian hiển thị hơn.\r\n\r\nhiển thị màn hình iPhone 13 Pro\r\n\r\nChiếc điện thoại nhanh nhất thế giới\r\nApple A15 Bionic trên iPhone 13 Pro là bộ vi xử lý nhanh nhất trong thế giới smartphone hiện nay. CPU mới cho hiệu suất đủ để chạy những tác vụ phức tạp trong chớp mắt, đồng thời tiết kiệm năng lượng hơn. Hiệu suất đồ họa GPU nhanh hơn tới 50% khi đặt cạnh bất kỳ đối thủ nào khác trên thị trường.\r\n\r\nA15 Bionic có thể thực hiện tới 15,8 nghìn tỉ phép tính mỗi giây, xử lý chế độ Cinematic hay Smart HDR 4 một cách mượt mà. Bộ xử lý hình ảnh mới ISP giúp giảm nhiễu, tăng cường độ chi tiết. A15 Bionic còn tích hợp các thông tin cá nhân như dữ liệu Face ID, danh bạ của bạn và bảo vệ một cách an toàn tuyệt đối.\r\n\r\nhiệu năng iPhone 13 Pro\r\n\r\nThời lượng pin khó tin\r\niPhone 13 Pro là một bước đột phá về thời lượng pin với khả năng xem video liên tục lên tới 22 giờ đồng hồ. Sự kết hợp giữa bộ vi xử lý A15 mới, viên pin dung lượng cao hơn và tấm nền màn hình tiết kiệm năng lượng hơn cho thời lượng pin xuất sắc nhất từ trước đến nay.\r\n\r\nBạn có thể thoải mái trải nghiệm trong hai ngày mới cần phải sạc. Quá trình sạc pin cũng rất nhanh chóng với công nghệ sạc nhanh, chỉ mất 30 phút để sạc đầy 50% pin.\r\n\r\npin iPhone 13 Pro\r\n\r\nMạng 5G siêu tốc\r\nHầu hết những smartphone cao cấp hiện nay đều trang bị kết nối mạng 5G, nhưng iPhone 13 Pro mới là chiếc điện thoại có tốc độ mạng 5G nhanh nhất. Nhờ trang bị nhiều băng tần 5G hơn, tương thích với nhiều nhà mạng hơn, iPhone 13 Pro luôn cho tốc độ 5G tối đa. Bạn có thể tải những tệp tin nặng, xem phim 4K, truyền phát trực tiếp hay chơi game trực tuyến mà không hề có độ trễ.', '1643285248.jpg', NULL, 28500000, 1, 2),
(15, 'iphone 13 128GB', 'Đánh giá chi tiết iPhone 13\r\niPhone 13 sở hữu hệ thống camera kép xuất sắc nhất từ trước đến nay, bộ vi xử lý Apple A15 nhanh nhất thế giới smartphone cùng thời lượng pin cực khủng, sẵn sàng đồng hành cùng bạn suốt cả ngày.\r\n\r\niPhone 13\r\n\r\nThiết kế iPhone 13 sang trọng và bền bỉ\r\niPhone 13 là chiếc điện thoại toát lên sự đẳng cấp ngay từ cái nhìn đầu tiên nhờ thiết kế sang trọng với ngôn ngữ thiết kế phẳng và chất lượng hoàn thiện tuyệt vời.\r\n\r\nKhung nhôm cao cấp kết hợp cùng kính bảo vệ Ceramic Shield siêu cứng tạo nên chiếc điện thoại vừa thời trang, lại vô cùng bền bỉ. Khả năng chống nước chuẩn IP68 giúp bạn hoàn toàn yên tâm trước mọi nguy cơ từ nước trong quá trình sử dụng thường ngày.\r\n\r\nthiết kế iPhone 13\r\n\r\nThêm sắc màu, thêm niềm vui\r\nCó tới 5 màu sắc để bạn lựa chọn trên iPhone 13 bao gồm màu Đỏ, Trắng ánh sao, Đen nửa đêm, Xanh và Hồng. Mỗi màu sắc đều mang những nét cá tính riêng, thể hiện phong cách nổi bật. Trong đó phiên bản màu Hồng mới với vẻ đẹp nhẹ nhàng chắc chắn sẽ rất thu hút đối với phái nữ.\r\n\r\nmàu sắc iPhone 13\r\n\r\nHệ thống camera kép xuất sắc nhất từ trước đến nay\r\nApple trang bị cho iPhone 13 bộ đôi cảm biến camera cực đỉnh với khẩu độ và kích thước cảm biến cực lớn, bổ sung tính năng ổn định hình ảnh quang học Sensor-shift OIS. Đó là lý do để 2 ống kính đặt chéo 45 độ, thích hợp không gian cho những cảm biến mới. Kết quả là camera iPhone 13 có khả năng thu sáng vượt trội với lượng ánh sáng nhiều hơn tới 47%, cho ảnh chụp và video tuyệt đẹp.\r\n\r\ncamera iPhone 13\r\n\r\nSáng tạo những tác phẩm điện ảnh kinh điển\r\nKhông chỉ quay phim đơn thuần, chế độ điện ảnh Cinematic trên iPhone 13 còn cho phép bạn sáng tạo những thước phim với chất lượng điện ảnh. Giờ đây iPhone của bạn có thể dễ dàng quay những đoạn video xóa phông, làm mờ hậu cảnh, chuyển chủ thể lấy nét mượt mà cả trước và trong khi quay.\r\n\r\nTrong những đoạn phim truyền hình, nhân vật đang nói chuyện sẽ được lấy nét còn bối cảnh khác sẽ được làm mờ, iPhone 13 hoàn toàn có thể quay phim như vậy một cách đầy chuyên nghiệp. Thậm chí iPhone 13 còn cho khả năng điều chỉnh nhanh hơn, chỉ bằng vài thao tác chạm và vuốt.\r\n\r\nvideo điện ảnh iPhone 13\r\n\r\nChất lượng ảnh chụp đáng kinh ngạc của iPhone 13\r\nVới iPhone 13, đơn giản bạn chỉ cần nhấn chụp là sẽ có ngay ảnh đẹp. Chế độ chụp đêm sẽ tự động nhận diện cảnh thiếu sáng và điều chỉnh ánh sáng phù hợp để bức ảnh của bạn luôn đủ sáng, màu sắc chính xác dù là trong đêm tối.\r\n\r\nChế độ chân dung làm mờ hậu cảnh một cách nghệ thuật cùng 6 hiệu ứng ánh sáng độc đáo để bạn luôn nổi bật. Đặc biệt, tính năng Smart HDR 4 có thể nhận dạng tới 4 người trong một khung hình và tối ưu hóa độ tương phản, ánh sáng để phù hợp với tông màu da từng người khiến ai cũng xuất hiện đầy rạng rỡ.\r\n\r\nchụp ảnh trên iPhone 13\r\n\r\nẢnh chụp chân thực từ camera góc siêu rộng\r\nCamera góc siêu rộng trên iPhone 13 mang tới khung cảnh cực rộng ngay cả khi bạn đang ở gần chủ thế. Vì thế bạn có thể thu gọn cả khung cảnh hùng vĩ vào trong khung hình mà không cần di chuyển.\r\n\r\nCảm biến mới chất lượng giúp camera Ultra Wide của iPhone 13 có thể chụp ảnh thiếu sáng tốt hơn, bổ sung chế độ chụp đêm, đồng thời ảnh chụp chân thực hơn bao giờ hết.\r\n\r\ncamera góc siêu rộng iPhone 13\r\n\r\nBộ lọc màu ấn tượng trên iPhone 13\r\nĐiện thoại iPhone 13 có sẵn những bộ lọc màu ấn tượng để bạn thay đổi màu sắc, ánh sáng nhanh chóng theo đúng sở thích. Hơn nữa, iPhone của bạn đủ thông minh để thay đổi màu ngoại cảnh nhưng màu da của bạn vẫn giữ được tông màu tự nhiên.\r\n\r\nChỉ cần vài thao tác vuốt chạm hay chỉnh sửa chuyên sâu hơn nếu muốn, bức ảnh của bạn sẽ trở nên đẹp và nghệ thuật đến bất ngờ.\r\n\r\nbộ lọc màu iPhone 13\r\n\r\nCamera trước TrueDepth cực chất\r\nThật tuyệt vời khi camera trước của iPhone 13 cũng sở hữu độ phân giải 12MP và toàn bộ tính năng có mặt ở camera sau. Nghĩa là bạn có thể selfie tuyệt đẹp với loạt tính năng như chế độ chụp đêm, Smart HDR 4, xóa phông hay thậm chí là quay video điện ảnh Cinematic.\r\n\r\nKhông chỉ chụp ảnh và quay video selfie xuất sắc, camera trước TrueDepth còn hỗ trợ nhận diện khuôn mặt Face ID, phương thức xác thực an toàn và thông minh nhất thế giới smartphone hiện nay.\r\n\r\ncamera trước iPhone 13\r\n\r\nMàn hình Super Retina XDR siêu sáng\r\nMàn hình OLED chất lượng Super Retina XDR giúp mọi thứ đều trở nên sống động, chân thực và mãn nhãn trên iPhone 13. Mật độ điểm ảnh cực cao, gam màu rộng chuẩn rạp chiếu phim mang đến hình ảnh sắc nét, màu sắc chính xác một cách tự nhiên.\r\n\r\nNgoài ra, màn hình iPhone 13 còn sáng hơn tới 28% so với iPhone 12, lên tới 800 nits và 1200 nits cho nội dung HDR. Bạn vẫn sẽ nhìn rõ tất cả nội dung, kể cả màu đen sâu thẳm ngay cả khi đang dùng điện thoại ở dưới ánh sáng mặt trời nắng gắt.\r\n\r\nmàn hình iPhone 13\r\n\r\nThời lượng pin vượt trội\r\nMột viên pin dung lượng lớn hơn kết hợp cùng bộ vi xử lý Apple A15 và tấm nền màn hình mới tiết kiệm năng lượng giúp thời lượng pin iPhone 13 tốt hơn những gì bạn nghĩ. So với thế hệ trước, iPhone 13 có pin lâu hơn 2,5 giờ sử dụng, cho bạn thoải mái làm những điều mình thích mà không lo hết pin.\r\n\r\niPhone 13 hỗ trợ sạc nhanh 20W, giúp sạc đầy 50% pin chỉ sau 30 phút. Đồng thời những công nghệ sạc không dây tiên tiến như chuẩn Qi hay MagSafe cũng được hỗ trợ, cho phép nạp năng lượng theo nhiều cách linh hoạt.\r\n\r\npin iPhone 13\r\n\r\nApple A15 Bionic, không chỉ mạnh mà còn rất đa năng\r\nNhững nâng cấp đột phá đã tạo nên Apple A15 Bionic, con chip khiến iPhone 13 trở thành chiếc điện thoại nhanh bậc nhất thế giới. So với những đối thủ hàng đầu hiện nay, CPU của Apple A15 nhanh hơn tới 50% và GPU đồ họa nhanh hơn tới 30%.\r\n\r\nTất cả những thao tác của bạn đều diễn ra trong chớp mắt, kể cả việc xử lý các đoạn phim phức tạp của chế độ quay phim điện ảnh Cinematic hay chơi những tựa game bom tấn.\r\n\r\nKhông chỉ mạnh mẽ, Apple A15 còn mang trên mình bộ xử lý hình ảnh ISP giúp nâng cao chất lượng camera; công nghệ thực tế tăng cường AR; khả năng mã hóa bảo mật dữ liệu đáng tin cậy.\r\n\r\nchip iPhone 13\r\n\r\niPhone 13 vào mạng 5G nhanh nhất\r\nThế giới đang bước vào kỷ nguyên của mạng 5G, nhưng không chiếc điện thoại nào có mạng 5G tốc độ cao như iPhone. iPhone 13 tích hợp nhiều băng tần 5G hơn, tương thích ở nhiều địa phương hơn.\r\n\r\nKết quả là những hoạt động trên mạng Internet của bạn như phát trực tiếp, tải tệp tin, xem video 4K, chơi game trực tuyến đều diễn ra với tốc độ nhanh chóng mặt. Với chế độ dữ liệu thông minh, iPhone còn có thể tự động giảm tốc độ để tiết kiệm điện năng trong những hoạt động không đòi hỏi quá nhiều về lưu lượng mạng.', '1643285351.jpg', NULL, 22500000, 1, 2),
(16, 'iPhone 12 Pro 256GB', 'Đánh giá chi tiết iPhone 12 Pro\r\nĐến với đẳng cấp Pro đích thực, nơi mà những điều đặc biệt đang chờ đón bạn trên iPhone 12 Pro. Từ hệ thống camera Pro chụp thiếu sáng cực đỉnh, kết nối 5G siêu tốc cho đến bộ vi xử lý A14 Bionic nhanh nhất thế giới smartphone, vẫn còn nhiều bất ngờ khác để bạn khám phá.\r\n\r\nĐiện thoại iPhone 12 Pro\r\n\r\nViền màn hình mỏng hơn, màn hình lớn hơn\r\nNhờ viền màn hình mỏng hơn, iPhone 12 Pro đã có thể trang bị một màn hình lớn hơn, nhưng kích thước vẫn nhỏ gọn tương tự iPhone 11 Pro. Giờ đây bạn sẽ có màn hình lớn tới 6,1 inch, để trải nghiệm được nhiều hơn.\r\n\r\nẤn tượng hơn nữa, màn hình iPhone 12 Pro siêu sắc nét với công nghệ Super Retina XDR. Tấm nền OLED mang tới hình ảnh trong trẻo, màu sắc chính xác, độ tương phản lên tới 2.000.000:1, độ sáng tối đa 1200 nits. Các công nghệ khác như HDR hay True Tone khiến cho chất lượng hiển thị của iPhone 12 Pro thêm phần hoàn hảo.\r\n\r\nmàn hình iPhone 12 Pro\r\n\r\nMặt kính màn hình bền nhất thế giới smartphone\r\nApple đã đưa công nghệ bảo vệ màn hình phủ gốm Ceramic Shield lên iPhone 12 Pro. Các tinh thể gốm nano cứng hơn cả kim loại và kính được đưa vào tấm kính màn hình, mang tới độ bền cũng như khả năng chống xước tuyệt vời. Kết quả là màn hình iPhone 12 Pro sẽ bền hơn tới 4 lần trong thử nghiệm thả rơi. Nguy cơ bị vỡ màn hình của bạn sẽ giảm đi rất nhiều với Ceramic Shield.\r\n\r\nmặt kính iPhone 12 Pro\r\n\r\nTác phẩm nghệ thuật đích thực\r\niPhone 12 Pro đã đạt đến tầm tinh xảo thượng thừa trong thiết kế. Bạn sẽ có một chiếc điện thoại viền thép không gỉ đặc biệt sang trọng và cứng cáp. Phần viền thép được làm phẳng, vuông vắn với những đường cắt kim cương sáng bóng tạo nên vẻ ngoài cao cấp, xứng tầm tác phẩm nghệ thuật.\r\n\r\nSẽ có 4 màu sắc để bạn lựa chọn là Bạc, Xám than chì, Vàng và Xanh đại dương. Cả 4 màu sắc này đều rất đẳng cấp và tạo phong thái riêng cho người dùng.\r\n\r\nthiết kế iPhone 12 Pro\r\n\r\nĐánh bật nỗi lo vào nước\r\nChuẩn chống nước IP68 trên iPhone 12 Pro mang tới khả năng chống nước hàng đầu trong ngành smartphone. Bạn có thể ngâm nước ở độ sâu lên đến 6m trong vòng 30 phút mà không ảnh hưởng gì đến điện thoại. Gần như toàn bộ mối nguy hại từ nước đều được miễn nhiễm bởi iPhone 12 Pro.\r\n\r\nchống nước iPhone 12 Pro\r\n\r\nCông nghệ 5G siêu tốc độ\r\nKết nối 5G giúp cho iPhone 12 Pro trở thành thiết bị hoàn hảo để vào mạng. Giờ đây bạn có thể tải xuống những tệp tin lớn, xem phim HDR chất lượng cao, chơi game online siêu mượt, không hề có bất cứ hiện tượng lag giật nhỏ nào. iPhone 12 Pro cũng là chiếc điện thoại có băng tần 5G lớn nhất hiện nay, mở ra một tương lai mới cho tốc độ Internet.\r\n\r\n5G iPhone 12 Pro\r\n\r\nHiệu năng đỉnh cao với Apple A14 Bionic\r\nCho đến trước khi iPhone 12, iPhone 12 Pro và iPhone 12 Pro Max xuất hiện, Apple A13 Bionic của iPhone 11 Pro vẫn là con chip mạnh nhất thế giới smartphone. Nhưng sự có mặt của Apple A14 Bionic đích thực là một “vụ nổ” với loạt nâng cấp và công nghệ mới đáng giá. Đây là con chip sản xuất trên tiến trình 5nm đầu tiên, tăng tới 40% số lượng bóng bán dẫn, cho hiệu suất vượt trội và thời lượng pin tuyệt vời.\r\n\r\nHơn thế nữa, Apple A14 Bionic còn tích hợp chip xử lý hình ảnh ISP mới, cho tính năng quay video Dolby Vision, tính năng mà nhiều máy quay phim chuyên nghiệp còn không làm được.\r\n\r\nvi xử lý iPhone 12 Pro\r\n\r\nMáy quét LiDAR, tương lai của thực tế tăng cường AR\r\nLiDAR là công nghệ đang được NASA sử dụng trong ngành hàng không vũ trụ. Với máy quét LiDAR, iPhone 12 Pro có thể đo khoảng thời gian ánh sáng phản xạ lại từ các vật thể để tạo ra bản đồ chiều sâu của bất cứ vật thể nào trong không gian.\r\n\r\nTốc độ cực nhanh và chính xác giúp bạn có thể tái hiện cả một khu rừng ngay trong phòng nhờ các ứng dụng AR. Máy quét LiDAR chuyên nghiệp sẽ mở ra tương lai của công nghệ thực tế tăng cường AR, xu hướng công nghệ ứng dụng sẽ rất phổ biến trong thời gian tới.\r\n\r\nLiDAR iPhone 12 Pro\r\n\r\nCamera siêu chụp đêm rõ nét như ban ngày\r\nChế độ chụp đêm Night Mode có mặt trên cả camera góc rộng và góc siêu rộng của iPhone 12 Pro, đồng thời loạt tính năng lý tưởng giúp cho máy có khả năng chụp ảnh thiếu sáng cực đỉnh. Khẩu độ lớn f/1.6 giúp thu được ánh sáng nhiều hơn 27%; thấu kính 7 thành phần mới cho độ sắc nét hoàn hảo; tính năng chống rung quang học OIS được cải tiến, đồng thời sự trợ giúp của máy quét LiDAR giúp tăng tốc độ lấy nét tới 6 lần trong điều kiện thiếu sáng.\r\n\r\nKết quả là ảnh thiếu sáng trên iPhone 12 Pro tốt hơn tới 87%, cho bạn chụp những bức ảnh ban đêm vô cùng rõ nét, màu sắc chính xác, ánh sáng tuyệt vời và ít nhiễu. Thậm chí bạn còn có thể chụp chân dung trong đêm tối với hiệu ứng làm mờ đầy nghệ thuật, với hậu cảnh là những ánh đèn lung linh huyền ảo.\r\n\r\nchụp đêm iPhone 12 Pro\r\n\r\nChụp ảnh sắc nét trong mọi hoàn cảnh\r\nTrí tuệ nhân tạo AI cũng đóng góp vai trò quan trọng để iPhone 12 Pro chụp ảnh xuất sắc trong mọi hoàn cảnh. Tính năng Smart HDR 3 sẽ tự động tinh chỉnh các điểm nổi bật, hiệu ứng bóng đổ và đường viền trong bức ảnh để bạn chụp ảnh rõ nét trong điều kiện ánh sáng phức tạp. Dù chủ thể là khuôn mặt hay cảnh vật, Smart HDR 3 đều đủ thông minh để nhận dạng và tạo nên bức ảnh chân thực, có hồn nhất.\r\n\r\ncamera iPhone 12 Pro\r\n\r\nQuay video 4K Dolby Vision chuyên nghiệp\r\nVới phần cứng camera mạnh mẽ và chip xử lý A14 Bionic cực nhanh, lần đầu tiên iPhone 12 Pro trình làng tính năng quay video 4K Dolby Vision lên tới 60fps, điều mà nhiều máy quay chuyên nghiệp không làm được chứ chưa nói đến những chiếc điện thoại khác. Bạn có thể quay những đoạn video siêu sắc nét, khả năng phơi sáng tuyệt vời, dải màu sống động tới 700 triệu màu ở những đoạn video Dolby Vision.\r\n\r\nChưa hết, bạn còn có thể chỉnh sửa video Dolby Vision ngay trên iPhone 12 Pro. Hãy thử xuất bản và xem trên TV 4K HDR màn hình lớn, bạn sẽ được chiêm ngưỡng những tác phẩm điện ảnh đích thực quay bằng chính iPhone 12 Pro.\r\n\r\n\r\n\r\nCamera selfie TrueDepth đỉnh cao\r\nTin vui cho những ai thích sử dụng camera trước, Apple đã tích hợp tất cả những tính năng cao cấp của camera sau lên camera TrueDepth mặt trước. Bạn sẽ có chế độ chụp selfie đêm; tính năng Deep Fusion, Smart HDR 3 và cả quay video Dolby Vision. Luôn tỏa sáng rạng ngời với những bức ảnh selfie, video hay livestream bằng iPhone 12 Pro.\r\niPhone 13\r\n\r\nThiết kế iPhone 13 sang trọng và bền bỉ\r\niPhone 13 là chiếc điện thoại toát lên sự đẳng cấp ngay từ cái nhìn đầu tiên nhờ thiết kế sang trọng với ngôn ngữ thiết kế phẳng và chất lượng hoàn thiện tuyệt vời.\r\n\r\nKhung nhôm cao cấp kết hợp cùng kính bảo vệ Ceramic Shield siêu cứng tạo nên chiếc điện thoại vừa thời trang, lại vô cùng bền bỉ. Khả năng chống nước chuẩn IP68 giúp bạn hoàn toàn yên tâm trước mọi nguy cơ từ nước trong quá trình sử dụng thường ngày.\r\n\r\nthiết kế iPhone 13\r\n\r\nThêm sắc màu, thêm niềm vui\r\nCó tới 5 màu sắc để bạn lựa chọn trên iPhone 13 bao gồm màu Đỏ, Trắng ánh sao, Đen nửa đêm, Xanh và Hồng. Mỗi màu sắc đều mang những nét cá tính riêng, thể hiện phong cách nổi bật. Trong đó phiên bản màu Hồng mới với vẻ đẹp nhẹ nhàng chắc chắn sẽ rất thu hút đối với phái nữ.\r\n\r\nmàu sắc iPhone 13\r\n\r\nHệ thống camera kép xuất sắc nhất từ trước đến nay\r\nApple trang bị cho iPhone 13 bộ đôi cảm biến camera cực đỉnh với khẩu độ và kích thước cảm biến cực lớn, bổ sung tính năng ổn định hình ảnh quang học Sensor-shift OIS. Đó là lý do để 2 ống kính đặt chéo 45 độ, thích hợp không gian cho những cảm biến mới. Kết quả là camera iPhone 13 có khả năng thu sáng vượt trội với lượng ánh sáng nhiều hơn tới 47%, cho ảnh chụp và video tuyệt đẹp.\r\n\r\ncamera iPhone 13\r\n\r\nSáng tạo những tác phẩm điện ảnh kinh điển\r\nKhông chỉ quay phim đơn thuần, chế độ điện ảnh Cinematic trên iPhone 13 còn cho phép bạn sáng tạo những thước phim với chất lượng điện ảnh. Giờ đây iPhone của bạn có thể dễ dàng quay những đoạn video xóa phông, làm mờ hậu cảnh, chuyển chủ thể lấy nét mượt mà cả trước và trong khi quay.\r\n\r\nTrong những đoạn phim truyền hình, nhân vật đang nói chuyện sẽ được lấy nét còn bối cảnh khác sẽ được làm mờ, iPhone 13 hoàn toàn có thể quay phim như vậy một cách đầy chuyên nghiệp. Thậm chí iPhone 13 còn cho khả năng điều chỉnh nhanh hơn, chỉ bằng vài thao tác chạm và vuốt.\r\n\r\nvideo điện ảnh iPhone 13\r\n\r\nChất lượng ảnh chụp đáng kinh ngạc của iPhone 13\r\nVới iPhone 13, đơn giản bạn chỉ cần nhấn chụp là sẽ có ngay ảnh đẹp. Chế độ chụp đêm sẽ tự động nhận diện cảnh thiếu sáng và điều chỉnh ánh sáng phù hợp để bức ảnh của bạn luôn đủ sáng, màu sắc chính xác dù là trong đêm tối.\r\n\r\nChế độ chân dung làm mờ hậu cảnh một cách nghệ thuật cùng 6 hiệu ứng ánh sáng độc đáo để bạn luôn nổi bật. Đặc biệt, tính năng Smart HDR 4 có thể nhận dạng tới 4 người trong một khung hình và tối ưu hóa độ tương phản, ánh sáng để phù hợp với tông màu da từng người khiến ai cũng xuất hiện đầy rạng rỡ.\r\n\r\nchụp ảnh trên iPhone 13\r\n\r\nẢnh chụp chân thực từ camera góc siêu rộng\r\nCamera góc siêu rộng trên iPhone 13 mang tới khung cảnh cực rộng ngay cả khi bạn đang ở gần chủ thế. Vì thế bạn có thể thu gọn cả khung cảnh hùng vĩ vào trong khung hình mà không cần di chuyển.\r\n\r\nCảm biến mới chất lượng giúp camera Ultra Wide của iPhone 13 có thể chụp ảnh thiếu sáng tốt hơn, bổ sung chế độ chụp đêm, đồng thời ảnh chụp chân thực hơn bao giờ hết.\r\n\r\ncamera góc siêu rộng iPhone 13\r\n\r\nBộ lọc màu ấn tượng trên iPhone 13\r\nĐiện thoại iPhone 13 có sẵn những bộ lọc màu ấn tượng để bạn thay đổi màu sắc, ánh sáng nhanh chóng theo đúng sở thích. Hơn nữa, iPhone của bạn đủ thông minh để thay đổi màu ngoại cảnh nhưng màu da của bạn vẫn giữ được tông màu tự nhiên.\r\n\r\nChỉ cần vài thao tác vuốt chạm hay chỉnh sửa chuyên sâu hơn nếu muốn, bức ảnh của bạn sẽ trở nên đẹp và nghệ thuật đến bất ngờ.\r\n\r\nbộ lọc màu iPhone 13\r\n\r\nCamera trước TrueDepth cực chất\r\nThật tuyệt vời khi camera trước của iPhone 13 cũng sở hữu độ phân giải 12MP và toàn bộ tính năng có mặt ở camera sau. Nghĩa là bạn có thể selfie tuyệt đẹp với loạt tính năng như chế độ chụp đêm, Smart HDR 4, xóa phông hay thậm chí là quay video điện ảnh Cinematic.\r\n\r\nKhông chỉ chụp ảnh và quay video selfie xuất sắc, camera trước TrueDepth còn hỗ trợ nhận diện khuôn mặt Face ID, phương thức xác thực an toàn và thông minh nhất thế giới smartphone hiện nay.\r\n\r\ncamera trước iPhone 13\r\n\r\nMàn hình Super Retina XDR siêu sáng\r\nMàn hình OLED chất lượng Super Retina XDR giúp mọi thứ đều trở nên sống động, chân thực và mãn nhãn trên iPhone 13. Mật độ điểm ảnh cực cao, gam màu rộng chuẩn rạp chiếu phim mang đến hình ảnh sắc nét, màu sắc chính xác một cách tự nhiên.\r\n\r\nNgoài ra, màn hình iPhone 13 còn sáng hơn tới 28% so với iPhone 12, lên tới 800 nits và 1200 nits cho nội dung HDR. Bạn vẫn sẽ nhìn rõ tất cả nội dung, kể cả màu đen sâu thẳm ngay cả khi đang dùng điện thoại ở dưới ánh sáng mặt trời nắng gắt.\r\n\r\nmàn hình iPhone 13\r\n\r\nThời lượng pin vượt trội\r\nMột viên pin dung lượng lớn hơn kết hợp cùng bộ vi xử lý Apple A15 và tấm nền màn hình mới tiết kiệm năng lượng giúp thời lượng pin iPhone 13 tốt hơn những gì bạn nghĩ. So với thế hệ trước, iPhone 13 có pin lâu hơn 2,5 giờ sử dụng, cho bạn thoải mái làm những điều mình thích mà không lo hết pin.\r\n\r\niPhone 13 hỗ trợ sạc nhanh 20W, giúp sạc đầy 50% pin chỉ sau 30 phút. Đồng thời những công nghệ sạc không dây tiên tiến như chuẩn Qi hay MagSafe cũng được hỗ trợ, cho phép nạp năng lượng theo nhiều cách linh hoạt.\r\n\r\npin iPhone 13\r\n\r\nApple A15 Bionic, không chỉ mạnh mà còn rất đa năng\r\nNhững nâng cấp đột phá đã tạo nên Apple A15 Bionic, con chip khiến iPhone 13 trở thành chiếc điện thoại nhanh bậc nhất thế giới. So với những đối thủ hàng đầu hiện nay, CPU của Apple A15 nhanh hơn tới 50% và GPU đồ họa nhanh hơn tới 30%.\r\n\r\nTất cả những thao tác của bạn đều diễn ra trong chớp mắt, kể cả việc xử lý các đoạn phim phức tạp của chế độ quay phim điện ảnh Cinematic hay chơi những tựa game bom tấn.\r\n\r\nKhông chỉ mạnh mẽ, Apple A15 còn mang trên mình bộ xử lý hình ảnh ISP giúp nâng cao chất lượng camera; công nghệ thực tế tăng cường AR; khả năng mã hóa bảo mật dữ liệu đáng tin cậy.\r\n\r\nchip iPhone 13\r\n\r\niPhone 13 vào mạng 5G nhanh nhất\r\nThế giới đang bước vào kỷ nguyên của mạng 5G, nhưng không chiếc điện thoại nào có mạng 5G tốc độ cao như iPhone. iPhone 13 tích hợp nhiều băng tần 5G hơn, tương thích ở nhiều địa phương hơn.\r\n\r\nKết quả là những hoạt động trên mạng Internet của bạn như phát trực tiếp, tải tệp tin, xem video 4K, chơi game trực tuyến đều diễn ra với tốc độ nhanh chóng mặt. Với chế độ dữ liệu thông minh, iPhone còn có thể tự động giảm tốc độ để tiết kiệm điện năng trong những hoạt động không đòi hỏi quá nhiều về lưu lượng mạng.', '1643285750.jpg', NULL, 27500000, 1, 2),
(17, 'iPhone 12 64GB', 'Đánh giá chi tiết iPhone 12\r\niPhone 12 ra mắt với vai trò mở ra một kỷ nguyên hoàn toàn mới. Tốc độ mạng 5G siêu tốc, bộ vi xử lý A14 Bionic nhanh nhất thế giới smartphone, màn hình OLED tràn cạnh tuyệt đẹp và camera siêu chụp đêm, tất cả đều có mặt trên iPhone 12.\r\n\r\nĐiện thoại iPhone 12\r\n\r\nThiết kế mỏng nhẹ, nhỏ gọn và đẳng cấp\r\niPhone 12 đã có sự đột phá về thiết kế với kiểu dáng mới vuông vắn, mạnh mẽ và sang trọng hơn. Không chỉ vậy, iPhone 12 mỏng hơn 11%, nhỏ gọn hơn 15% và nhẹ hơn 16% so với thế hệ trước iPhone 11.\r\n\r\nBất ngờ hơn nữa là dù gọn hơn đáng kể nhưng iPhone 12 vẫn có màn hình 6,1 inch như iPhone 11 mà không hề bị cắt giảm. Phần viền màn hình thu hẹp tối đa cùng sự nỗ lực trong thiết kế đã tạo nên điều kỳ diệu ở iPhone 12.\r\n\r\nThiết kế iPhone 12\r\n\r\niPhone 12 có thiết kế nhỏ gọn, mỏng nhẹ và đẳng cấp\r\n\r\nCeramic Shield, bảo vệ an toàn cho mặt kính\r\niPhone 12 thể hiện sự cao cấp từ những vật liệu chế tác, bao gồm khung nhôm cứng cáp và 2 mặt kính tuyệt đẹp. Hơn thế nữa, mặt kính của iPhone 12 được bảo vệ bởi một lớp gốm (Ceramic Shield), giúp cứng hơn mặt kính của bất kỳ chiếc điện thoại nào khác. iPhone của bạn sẽ bền vững hơn tới 4 lần, khó xước hơn, mang tới cảm giác yên tâm khi sử dụng.\r\n\r\nCamera iPhone 12\r\n\r\niPhone 12 chống nước hoàn hảo\r\niPhone 12 tiếp tục có khả năng chống nước và chống bụi chuẩn IP68, nhưng giờ đây bạn đã có thể ngâm nước ở độ sâu tới 6m trong vòng 30 phút thay vì 1,5m như trước kia. Tha hồ sử dụng mà không còn bất cứ nỗi lo nào về hư hại từ nước.\r\n\r\niPhone 12 chống nước\r\n\r\nMàu sắc mới của iPhone 12\r\niPhone 12 mang đến cho bạn nhiều sự lựa chọn màu hơn bao giờ hết. Có tới 6 màu sắc iPhone 12 thời trang, bao gồm Đen, Trắng, Đỏ, Xanh lá, Xanh dương và Tím. Bạn có thể tự do thể hiện cá tính, khác biệt với phiên bản màu sắc phù hợp.\r\n\r\nNgoài ra iPhone 12 có 3 phiên bản dung lượng cho người dùng lựa chọn gồm: iPhone 12 64GB, iPhone 12 128GB và iPhone 12 256GB.\r\n\r\niPhone 12 các màu sắc\r\n\r\nTổng hợp các tùy chọn màu sắc mới trên iPhone 12\r\n\r\n5G siêu tốc, mở ra kỷ nguyên di động mới\r\niPhone 12 sẽ có hỗ trợ kết nối mạng 5G nhanh nhất hiện nay. Bạn có thể làm việc, giải trí với tốc độ mạng nhanh đáng kinh ngạc. Xem video trực tuyến, phát trực tiếp, chơi game online, gọi FaceTime HD hay làm bất cứ điều gì bạn muốn mà không hề có hiện tượng giật hình vì mạng yếu. iPhone 12 cho trải nghiệm mạng di động nhanh chưa từng thấy.\r\n\r\niPhone 12 với 5G\r\n\r\niPhone 12 sẽ có hỗ trợ kết nối 5G cho các model series\r\n\r\nApple A14 Bionic, bộ vi xử lý nhanh nhất thế giới smartphone\r\nSức mạnh của iPhone 12 vượt trội so với phần còn lại nhờ bộ vi xử lý Apple A14 Bionic, con chip nhanh nhất thế giới điện thoại hiện nay. Apple A14 Bionic là con chip đầu tiên trên thế giới sản xuất trên tiến trình 5nm, với 6 nhân CPU và 4 nhân GPU cùng 11,8 tỷ bóng bán dẫn, không chỉ cho hiệu năng tuyệt đỉnh mà còn tiết kiệm năng lượng hơn rất nhiều.\r\n\r\nApple A14 Bionic cũng được nâng cấp về khả năng học hỏi thói quen người dùng khi tăng từ 8 lên 16 lõi Neural Engine, đồng thời trang bị bộ xử lý tín hiệu hình ảnh hoàn toàn mới để iPhone 12 có thể mang đến những điều khác biệt trong cả chụp ảnh và quay phim.\r\n\r\nChip Apple A14 Bionic trên iPhone 12\r\n\r\nHiệu năng iPhone 12 có trở nên \"vô đối\" với chip Apple A14 Bionic?\r\n\r\nMàn hình OLED Super Retina XDR siêu sắc nét\r\nSo với màn hình iPhone 11, màn hình iPhone 12 đã có một sự nhảy vọt. Ngoài thiết kế viền mỏng hơn, chất lượng màn hình iPhone 12 cải thiện rõ rệt với công nghệ OLED và độ sắc nét tuyệt vời từ công nghệ Super Retina XDR.\r\n\r\nBạn sẽ được chiêm ngưỡng những hình ảnh giàu chi tiết, độ tương phản cao tới 2.000.000:1, màu sắc rực rỡ và màu đen cực sâu. Đây là màn hình iPhone đẹp nhất từ trước đến nay, khiến bạn đắm chìm trong không gian giải trí hấp dẫn.\r\n\r\nMàn hình iPhone 12 \r\n\r\nHệ thống camera mới, thách thức màn đêm\r\nCả camera góc rộng và góc siêu rộng trên iPhone 12 đều được trang bị tính năng chụp đêm Night mode, cho khả năng chụp ảnh thiếu sáng hoàn hảo.\r\n\r\nCamera chính 12MP khẩu độ lớn tới f/1.6, cho khả năng thu sáng nhiều hơn tới 27%. Dù là bạn chụp ảnh ban ngày hay dưới màn đêm, iPhone 12 cũng đều tái tạo lại độ chi tiết tuyệt vời, màu sắc chính xác và tạo nên những tác phẩm nghệ thuật.\r\n\r\ncamera iPhone 12\r\n\r\nSmart HDR 3, chụp đẹp trong mọi hoàn cảnh\r\nTính năng mới Smart HDR 3 trên iPhone 12 giúp bạn chụp ảnh đẹp trong mọi hoàn cảnh, kể cả khi điều kiện ánh sáng phức tạp như nắng gắt hay ngược sáng.\r\n\r\nNgoài ra, trí tuệ nhân tạo còn giúp nhận diện cảnh hiệu quả để điều chỉnh màu và cân bằng trắng phù hợp. Ví dụ khi bạn chụp đồ ăn, iPhone sẽ khéo léo tinh chỉnh đôi chút để món ăn trông hấp dẫn và ngon mắt hơn.\r\n\r\nchụp ảnh trên iPhone 12\r\n\r\nMột phim trường ngay trên tay bạn\r\nĐiện thoại iPhone 12 có thể quay những thước phim chuyên nghiệp, bất chấp điều kiện thiếu sáng. Hơn nữa, giờ đây bạn đã có thể quay video 4K HDR Dolby Vision, cho chất lượng như những đoạn phim truyền hình trên Netflix.\r\n\r\nTrên iPhone 12 còn có đầy đủ công cụ để chỉnh sửa, biên tập và xuất bản video nhanh chóng. Hãy thử thưởng thức đoạn phim của bạn trên màn hình lớn của TV 4K HDR, bạn sẽ thấy bất ngờ vì những gì mình làm được.\r\n\r\nQuay video trên iPhone 12\r\n\r\nSelfie trong đêm tuyệt đẹp với iPhone 12\r\nTính năng chụp đêm Night mode không chỉ áp dụng cho camera sau mà còn xuất hiện trên cả camera trước của iPhone 12. Bạn có thể tự tin selfie dù là dưới trời tối.\r\n\r\nCác tính năng khác của camera sau như Deep Fusion, Smart HDR 3, quay video 4K HDR Dolby Vision cũng đều có mặt ở camera trước, giúp camera trước iPhone 12 làm được nhiều hơn là những gì bạn nghĩ.', '1643285819.jpg', NULL, 27500000, 1, 2),
(18, 'Samsung Galaxy Z Fold3 5G 256GB', 'Đánh giá chi tiết Samsung Galaxy Z Fold3 5G\r\nKhi bạn mở ra màn hình gập lớn tới 7,6 inch trên Samsung Galaxy Z Fold3 5G là lúc bạn đã mở ra một tương lai hoàn toàn mới cho thế giới smartphone, nơi công nghệ vượt qua mọi giới hạn, cho trải nghiệm hoàn hảo nhất ở một thiết bị di động nhỏ gọn.\r\n\r\nSamsung Galaxy Z Fold3 5G\r\n\r\nGập mở linh hoạt, màn hình lớn hơn nhưng lại nhỏ gọn hơn\r\nVới một màn hình gập, Samsung Galaxy Z Fold3 5G đã giải quyết bài toán đưa màn hình lớn lên một chiếc điện thoại di động. Trong trạng thái gập, Galaxy Z Fold3 5G thậm chí còn nhỏ hơn một chiếc smartphone thông thường, dễ dàng cho vào túi xách, túi quần, sử dụng bằng một tay.\r\n\r\nCòn khi bạn mở màn hình gập, mọi thứ sẽ trở nên sống động hơn bao giờ hết với kích thước lớn tới 7,6 inch. Hơn nữa, đây còn là màn hình tỉ lệ vuông, cho diện tích sử dụng lớn gấp đôi so với smartphone thông thường.\r\n\r\nthiết kế Samsung Galaxy Z Fold3 5G\r\n\r\nMàn hình ngoài tiện lợi\r\nNgay cả khi trong trạng thái gập, bạn vẫn hoàn toàn có thể sử dụng Samsung Galaxy Z Fold3 5G bình thường với màn hình ngoài kích thước 6,2 inch. Chất lượng của màn hình này cũng đứng trong top đầu hiện nay với công nghệ Dynamic AMOLED 2X, tần số quét 120Hz, hiển thị tuyệt đẹp và siêu mượt mà.\r\n\r\nMàn hình ngoài cho phép bạn sử dụng điện thoại tiện lợi hơn, trong những trường hợp cần thao tác nhanh bằng một tay mà không cần phải mở màn hình lớn.\r\n\r\nmàn hình Samsung Galaxy Z Fold3 5G\r\n\r\nThế giới giải trí hoàn hảo\r\nThât khó tin khi chiếc điện thoại nằm gọn trong túi của bạn lại có thể mở ra một thế giới giải trí hoàn hảo. Bạn chỉ cần mở màn hình gập của Galaxy Z Fold3 5G ra một cách sành điệu, trước mắt sẽ là không gian hiển thị cực lớn Infinity Flex 7,6 inch, camera trước ẩn dưới màn hình, tạo nên những hình ảnh tuyệt đẹp không điểm khuyết. Trải nghiệm đọc báo, đọc sách, chơi game, xem phim của bạn thực sự sống động đến mức khó tin trên Z Fold3 5G.\r\n\r\ngiải trí Samsung Galaxy Z Fold3 5G\r\n\r\nSử dụng điện thoại theo cách của riêng bạn\r\nMàn hình Samsung Galaxy Z Fold3 5G có thể gập theo bất cứ góc độ nào bạn mong muốn, tạo nên trải nghiệm sử dụng điện thoại sáng tạo hơn bao giờ hết.\r\n\r\nBạn có thể gập theo dạng một chiếc laptop để nhập liệu trực quan; sử dụng camera chính để chụp ảnh selfie; vừa chụp ảnh vừa xem trước trên cùng một màn hình. Chính bạn sẽ quyết định cách sử dụng Galaxy Z Fold3 5G theo phong cách thú vị của riêng bạn.\r\n\r\nsử dụng Samsung Galaxy Z Fold3 5G\r\n\r\nĐẹp tuyệt tác, bền vững với thời gian\r\nSamsung Galaxy Z Fold3 5G được chế tác từ những vật liệu cao cấp và bền bỉ nhất trong ngành công nghiệp smartphone. Phần khung viền được làm từ hợp kim nhôm Armor Alumium siêu bền, cả màn hình trong và màn hình ngoài đều được bảo vệ bằng kính cường lực Gorilla Glass Victus cứng cáp, cho khả năng chống trầy vượt trội gấp 4 lần cùng khả năng chống va đập khi rơi từ độ cao 2m.\r\n\r\nTrong khi đó phần màn hình gập sử dụng kính Ultra Thin Glass siêu mỏng, là bước tiến lớn trong công nghệ màn hình gập, cho trải nghiệm gập mở linh hoạt hơn, đồng thời bền bỉ hơn 80% trước đây. Đặc biệt, Z Fold3 5G còn là chiếc điện thoại màn hình gập đầu tiên có thể kháng nước với chuẩn kháng nước IPX8.\r\n\r\nthiết kế Samsung Galaxy Z Fold3 5G\r\n\r\nSáng tạo vô hạn với bút S Pen\r\nS Pen đã từng thể hiện quyền năng tuyệt đỉnh trên dòng Galaxy Note, giờ đây với một màn hình lớn chưa từng thấy ở thế giới smartphone, S Pen sẽ mang đến sự sáng tạo vô hạn. Tha hồ ghi chú viết vẽ với những nét bút tự nhiên, mượt mà và chính xác trên không gian màn hình cực lớn, khả năng gập mở linh hoạt.\r\n\r\nNhờ S Pen, bạn có thể chia màn hình thành nhiều cửa sổ ứng dụng, sử dụng một cách trực quan và liền mạch. Dễ dàng thực hiện nhiều việc cùng lúc với sự kết hợp hoàn hảo của S Pen và Samsung Galaxy Z Fold3 5G.\r\n\r\nbút S Pen của Samsung Galaxy Z Fold3 5G\r\n\r\nÂm thanh chuẩn nhà hát\r\nKhông chỉ mãn nhãn với màn hình không điểm khuyết cực lớn 7,6 inch, bạn còn được đắm chìm trong thế giới âm thanh từ hệ thống loa stereo chân thực và công nghệ Dolby Atmos cho bạn chất âm cao cấp như đang ở trong rạp hát. Một rạp chiếu phim di động ngay trong túi của bạn, Samsung Galaxy Z Fold3 5G biến mọi điều không thể thành có thể.\r\n\r\nâm thanh Samsung Galaxy Z Fold3 5G\r\n\r\nChơi game chưa bao giờ đã đến thế\r\nHãy thử tưởng tượng về việc trải nghiệm những tựa game đỉnh cao trên màn hình lớn gấp đôi thông thường, công nghệ Dynamic AMOLED 2X hiển thị sống động hàng đầu, tần số quét 120Hz siêu mượt và sức mạnh cấu hình tuyệt vời, mọi thứ quả thực rất đáng kinh ngạc trên Samsung Galaxy Z Fold3 5G.\r\n\r\nThưởng thức những hình ảnh sắc nét, những chuyển động cực nhanh, những hiệu ứng đồ họa chân thực được điều khiển bằng những thao tác mượt mà từ chính bạn, trải nghiệm chơi game chưa bao giờ hấp dẫn đến thế.\r\n\r\nchơi game Samsung Galaxy Z Fold3 5G\r\n\r\nChụp ảnh và quay video chuyên nghiệp\r\nVới năm camera ở ba vị trí khác nhau, hai màn hình trong đó một màn hình có khả năng gập mở linh hoạt, Samsung Galaxy Z Fold3 5G mang tới sự sáng tạo không ngờ trong chụp ảnh và quay video. Việc chuyển đổi linh hoạt giữa các camera, sử dụng hai màn hình để xem trước giúp bạn có thể chụp ảnh, quay video ở nhiều góc độ, nhiều mục đích hơn.\r\n\r\nNhững công nghệ tiên tiến nhất trong nhiếp ảnh của Samsung như điểm ảnh kép Dual Pixel, chống rung quang học OIS đều được tích hợp trên Samsung Galaxy Z Fold3 5G, cho hình ảnh và video chất lượng đáng tin cậy.\r\n\r\nchụp ảnh Samsung Galaxy Z Fold3 5G\r\n\r\nĐầy đủ tính năng camera\r\nTất cả những tính năng camera hàng đầu đều có mặt trên Samsung Galaxy Z Fold3 5G. Từ chụp chân dung, chụp đêm cho đến chụp ảnh góc siêu rộng, chụp zoom quang học 2x, bạn đều có những bức ảnh rõ nét, màu sắc, độ sáng và độ tương phản hoàn hảo.\r\n\r\nBạn còn có thể thử tài đạo diễn nhờ khả năng quay video lấy nét chính xác, quay chuyển động nhanh hay cả quay video timelapse đầy lôi cuốn với những ánh đèn lung linh trong đêm tối.', '1643285942.jpg', NULL, 42000000, 8, 2),
(19, 'Samsung Galaxy S21 Ultra 128GB', 'Đánh giá chi tiết Samsung Galaxy S21 Ultra\r\nSamsung Galaxy S21 Ultra 5G mang đến cuộc cách mạng trong nhiếp ảnh với khả năng tạo ra kiệt tác dễ dàng hơn bao giờ hết; ngoài ra máy còn sở hữu bộ vi xử lý nhanh nhất, màn hình đẹp nhất, kết nối 5G và thời lượng pin thoải mái suốt cả ngày.\r\n\r\nSamsung Galaxy S21 Ultra 5G\r\n\r\nSự kết hợp của thiết kế phá cách và giá trị nguyên bản\r\nThiết kế Samsung Galaxy S21 Ultra là sự hội tụ giữa những đường nét phá cách và giá trị nguyên bản. Nổi bật nhất chính là cụm camera kích thước cực lớn, cho thấy điểm nhấn của chiếc S21 Ultra năm nay là khả năng nhiếp ảnh. Toàn thân máy đều có màu đen mờ nguyên bản, đơn giản nhưng rất sang trọng và lịch lãm. Nếu bạn thích sự nổi bật và thời trang hơn, có thể chọn màu bạc ngẫu hứng với vẻ đẹp sắc sảo.\r\n\r\nthiết kế Samsung Galaxy S21 Ultra 5G\r\n\r\nMàn hình đỉnh cao nhất thế giới smartphone\r\nDù là thông số kỹ thuật hay trải nghiệm thực tế thì màn hình Samsung Galaxy S21 Ultra 5G cũng xứng đáng đứng vị trí số một trong thế giới smartphone hiện nay.\r\n\r\nĐiện thoại sở hữu màn hình vô cực 6,8 inch Infinity-O công nghệ Dynamic AMOLED 2X trứ danh của Samsung, hỗ trợ HDR 10+ và độ phân giải siêu cao 1440 x 3200 pixels. Mọi thứ đều trở nên sống động và tuyệt vời hơn bao giờ hết trên màn hình S21 Ultra. Chưa hết, màn hình này còn có độ sáng tối đa lên tới 1500 nits, công nghệ bảo vệ mắt, tương thích với bút S Pen và tần số quét 120 Hz siêu mượt.\r\n\r\nmàn hình Samsung Galaxy S21 Ultra 5G\r\n\r\nKính cường lực cứng cáp nhất từ trước đến nay\r\nBảo vệ cho màn hình tuyệt mỹ của Samsung Galaxy S21 Ultra 5G là kính cường lực Gorilla Glass Victus, loại kính cường lực ưu việt nhất từ trước đến nay. Bạn sẽ yên tâm hơn rất nhiều khi màn hình bền bỉ vượt trội, bảo vệ cho cả mặt trước và mặt sau điện thoại. Khả năng chống trầy xước, chống va đập tối đa và cả chống nước chuẩn IP68 giúp chiếc S21 Ultra trở nên cứng cỏi, mạnh mẽ hơn.\r\n\r\nkính cường lực Samsung Galaxy S21 Ultra 5G\r\n\r\nBộ camera chuyên nghiệp nhất từng có trên smartphone\r\nNhững gì có mặt trên cụm camera sau của Galaxy S21 Ultra 5G chính là những cảm biến xuất sắc nhất từng xuất hiện trên điện thoại. Nổi bật nhất phải kể đến camera chính độ phân giải lên tới 108MP, mang đến độ chi tiết khổng lồ trong mỗi bức ảnh.\r\n\r\nViệc sử dụng tới 2 camera Tele 10MP giúp khả năng thu phóng của S21 Ultra thực sự đáng kinh ngạc. Bạn có thể thu phóng chuẩn không gian tối đa 100x, đưa những điều ở xa tận chân trời đến gần ngay trước mắt. Đặc biệt, khả năng thu phóng còn thể hiện rất mượt mà khi quay video, giúp các đoạn phim trở nên sống động hơn bao giờ hết.\r\n\r\ncamera Samsung Galaxy S21 Ultra 5G\r\n\r\nSáng tạo kiệt tác trong màn đêm\r\nCông nghệ chụp ảnh thiếu sáng vốn đã được đánh giá cao của Samsung nay còn ấn tượng hơn nữa trên S21 Ultra. Bộ cảm biến camera chất lượng và tính năng chụp đêm thông minh giúp bạn khắc họa rõ nét những vẻ đẹp trong màn đêm một cách chân thực, màu sắc rực rỡ và sống động.\r\n\r\nTốc độ chụp được cải thiện đáng kể dù là trong đêm tối mang đến mức nhiễu ảnh tối thiểu và thời gian phơi sáng tối ưu, để bạn nhanh chóng chớp lại những khoảnh khắc đáng nhớ.\r\n\r\nchụp đêm Samsung Galaxy S21 Ultra 5G\r\n\r\nĐẳng cấp chụp ảnh chân dung\r\nNhững bức ảnh chân dung chụp bằng Samsung Galaxy S21 Ultra 5G đã đạt tới tầm nghệ thuật. Ngoài khả năng tách chủ thể và phông nền hoàn hảo, màu sắc chính xác, độ chi tiết cao, trên S21 Ultra còn có những bộ lọc màu chuẩn studio được hỗ trợ bởi công nghệ AI siêu việt. Các chi tiết như góc mặt, ánh sáng, hướng ánh sáng và độ sâu trường ảnh đều được tối ưu để bạn có được bức ảnh chân dung sinh động đến khó tin.\r\n\r\nchân dung Samsung Galaxy S21 Ultra 5G\r\n\r\nQuay video 8K, sẵn sàng với những thước phim chuẩn chiếu rạp\r\nKhả năng quay video độ phân giải siêu nét tới 8K giúp những thước phim từ bạn quay có thể trình chiếu trên màn hình lớn như ở rạp chiếu phim một cách rõ nét và sống động. Chỉ đơn giản quay những khung cảnh đời thường, những tình huống vui nhộn trong cuộc sống, tất cả cũng có thể trở thành kiệt tác dưới ống kính của Samsung Galaxy S21 Ultra 5G. Những đoạn phim này sắc nét đến nỗi bạn chỉ cần cắt một hình ảnh bất kỳ trong video 8K cũng tạo nên một bức ảnh đầy chất lượng.\r\n\r\n\r\n\r\nQuay phim siêu chống rung\r\nBạn là người thích đi du lịch và muốn ghi lại mọi khoảnh khắc trong chuyến đi. Chế độ quay phim siêu chống rung sẽ biến Samsung Galaxy S21 Ultra 5G trở thành một camera hành trình thực thụ. Tính năng chống rung AI giúp đoạn phim trở nên mượt mà một cách đáng kinh ngạc ở tốc độ khung hình 60fps, kể cả khi bạn vừa quay vừa di chuyển ở tốc độ cao, tất cả vẫn hết sức tuyệt vời.\r\n\r\n\r\n\r\nBộ vi xử lý 5nm đầu tiên trên điện thoại Galaxy\r\nSamsung Galaxy S21 Ultra 5G trang bị bộ vi xử lý Exynos 2100, đây là bộ vi xử lý sản xuất trên tiến trình 5nm đầu tiên trên điện thoại Galaxy. Với tốc độ CPU nhanh hơn 20%, GPU mạnh hơn 35%, công nghệ AI nhanh hơn 2 lần, mọi trải nghiệm của bạn đều được phản hồi ngay lập tức trên S21 Ultra. Dù là chơi những game 3D nặng hay chỉnh sửa các đoạn video 8K, tất cả đều diễn ra mượt mà và nhanh chóng. Trải nghiệm trên Samsung Galaxy S21 Ultra 5G xứng tầm đẳng cấp của chiếc điện thoại đầu bảng hiện nay.\r\n\r\ncấu hình Samsung Galaxy S21 Ultra 5G\r\n\r\nKết nối 5G siêu tốc\r\nGalaxy S21 Ultra hỗ trợ kết nối 5G và tương thích hoàn hảo với mạng 5G của các nhà mạng tại Việt Nam. Tha hồ tải phim trong nháy mắt, chơi game online không độ trễ và tận hưởng tốc độ mạng không dây nhanh nhất từ trước đến nay. Không chỉ 5G, S21 Ultra còn tích hợp kết nối Wi-Fi 6E đầu tiên trên thế giới, cho khả năng thu sóng khỏe, mạng ổn định và độ bảo mật cao.\r\n\r\nkết nối Samsung Galaxy S21 Ultra 5G\r\n\r\nThời lượng pin bứt phá\r\nViên pin dung lượng lên tới 5000 mAh, bộ vi xử lý tối ưu và màn hình tiết kiệm năng lượng giúp bạn trải nghiệm Samsung Galaxy S21 Ultra 5G xuyên suốt ngày dài, kể cả khi kết nối 5G luôn bật. Điện thoại hỗ trợ những công nghệ sạc tiên tiến nhất hiện nay như sạc nhanh siêu tốc 25W; sạc nhanh không dây 2.0; chia sẻ pin không dây. S21 Ultra có thể sạc nhanh và linh hoạt ở bất cứ đâu.', '1643286044.jpg', NULL, 22000000, 8, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `CK_menu` (`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CK_customer_id` (`customer_id`),
  ADD KEY `CK_employee_id` (`employee_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CK_manufacturer_id` (`manufacturer_id`),
  ADD KEY `CK_menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD CONSTRAINT `CK_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `CK_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `CK_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `CK_manufacturer_id` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufactures` (`id`),
  ADD CONSTRAINT `CK_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
