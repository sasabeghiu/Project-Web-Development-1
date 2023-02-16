-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Feb 16, 2023 at 05:33 PM
-- Server version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unit240`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(2500) DEFAULT NULL,
  `description` varchar(2500) NOT NULL,
  `photo` varchar(2500) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `location` varchar(2500) NOT NULL,
  `ticketsAvailable` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `photo`, `datetime`, `location`, `ticketsAvailable`, `price`, `product_id`) VALUES
(1, 'UNIT240: DJ Motchito, DJ Paliyo, DJ Hanto', 'Our celebration of UNIT240 Birthday. Come join us in Amsterdam at one of the best techno venues for a crazy night. Only a few weeks left before we can rave like maniacs again. We\'re already preparing the laser show combined with our visuals, you really are not ready for what is coming.', '/img/event1.jpg', '2023-01-19 23:00:00', 'RADION, Amsterdam, Netherlands', 200, 20, 6),
(2, 'UNIT240 Christmas Rave', 'Attendees can expect to dance the night away to thumping beats and enjoy the holiday spirit with a techno twist. Our Christmas techno rave promises to be a unique and unforgettable celebration of the holiday season. Go get your tickets before they sell out!', '/img/event2.png', '2023-01-31 19:00:00', 'RADION, Amsterdam, Netherlands', 200, 30, 7),
(11, 'UNIT240 Birthday Party', 'Our second celebration of UNIT240 Birthday. Come join us in Haarlem at Patronaat for a crazy night. Only a few weeks left before we can rave like maniacs again. We\'re already preparing the laser show combined with our visuals, you really are not ready for what is coming.', '/img/event3.png', '2023-04-20 18:00:00', 'Patronaat, Haarlem, Netherlands', 100, 25, 8);

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int(11) NOT NULL,
  `name` varchar(2500) DEFAULT NULL,
  `description` varchar(2500) NOT NULL,
  `photo` varchar(2500) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `size` varchar(2500) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`id`, `name`, `description`, `photo`, `price`, `size`, `stock`, `product_id`) VALUES
(1, 'T-SHIRT &quot;DJ MOCHITO&quot;', '- Organic cotton \r\n- Oversized &amp; boxed fit, fits true to size\r\n- Do not tumble dry\r\n- Wash inside out', '/img/tshirt1.jpg', 15, 'L', 200, 1),
(2, 'T-SHIRT &quot;BASIC&quot;', '- Organic cotton \r\n- Oversized &amp; boxed fit, fits true to size\r\n- Do not tumble dry\r\n- Wash inside out', '/img/tshirt2.jpg', 20, 'L', 200, 2),
(3, 'T-SHIRT &quot;WHITE&quot;', '- Organic cotton \r\n- Oversized &amp; boxed fit, fits true to size\r\n- Do not tumble dry\r\n- Wash inside out', '/img/tshirt3.jpg', 20, 'L', 200, 3),
(4, 'T-SHIRT &quot;GREEN&quot;', '- Organic cotton \r\n- Oversized fit, we recommend ordering one size smaller\r\n- Do not tumble dry\r\n- Wash inside out', '/img/tshirt4.jpg', 30, 'M', 200, 4),
(5, 'T-SHIRT &quot;COLOR&quot;', '- Organic cotton \r\n- Oversized fit, we recommend ordering one size smaller\r\n- Do not tumble dry\r\n- Wash inside out', '/img/tshirt5.jpg', 30, 'M', 200, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_firstname` varchar(200) NOT NULL,
  `user_lastname` varchar(200) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_country` varchar(200) NOT NULL,
  `user_zipcode` varchar(200) NOT NULL,
  `order_totalprice` int(11) NOT NULL,
  `order_createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `user_email`, `user_firstname`, `user_lastname`, `user_address`, `user_country`, `user_zipcode`, `order_totalprice`, `order_createdat`) VALUES
(46, 78, 'alexandrubeghiu0@gmail.com', 'Alexandru', 'Beghiu', 'Schoonzichtlaan 8 A', 'Netherlands', '2015 CL', 100, '2023-02-16 17:04:27'),
(47, 77, 'cepoxuwu@mailinator.com', 'Sean', 'Maynard', 'Kleinstraat 5', 'Netherlands', '2015 CV', 115, '2023-02-16 17:06:24'),
(48, 77, 'demas@mailinator.com', 'Teagan', 'Middleton', 'Streetteerts', 'Belgium', '2000 YR', 70, '2023-02-16 17:07:34'),
(49, 77, 'wyvi@mailinator.com', 'Mason', 'Sims', 'Doesntmatter 5', 'Italy', '7289 AF', 25, '2023-02-16 17:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`, `created_at`) VALUES
(80, 46, 3, 1, 20, '2023-02-16 17:04:27'),
(81, 46, 4, 1, 30, '2023-02-16 17:04:27'),
(82, 46, 6, 1, 20, '2023-02-16 17:04:27'),
(83, 46, 7, 1, 30, '2023-02-16 17:04:27'),
(84, 47, 1, 1, 15, '2023-02-16 17:06:24'),
(85, 47, 2, 1, 20, '2023-02-16 17:06:24'),
(86, 47, 3, 1, 20, '2023-02-16 17:06:24'),
(87, 47, 5, 1, 30, '2023-02-16 17:06:24'),
(88, 47, 4, 1, 30, '2023-02-16 17:06:24'),
(89, 48, 7, 1, 30, '2023-02-16 17:07:34'),
(90, 48, 2, 1, 20, '2023-02-16 17:07:34'),
(91, 48, 3, 1, 20, '2023-02-16 17:07:34'),
(92, 49, 8, 1, 25, '2023-02-16 17:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `item_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 1),
(7, 2),
(8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) NOT NULL,
  `name` varchar(2500) DEFAULT NULL,
  `description` varchar(2500) NOT NULL,
  `photo` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `name`, `description`, `photo`) VALUES
(1, 'DJ Motchito', 'Motche Pejhanfar - DJ Mochito\r\nBorn in 19/01/1999 in Iran, he started playing various instruments such as piano and guitar at a very young age. Due to Iran&#039;s political situation at the time, it was really hard for him to progress in his musical carrer. He was forced to leave the country due to personal reasons and moved to the Netherlands which delayed his musical carrer until the situation was more stable. After a few years he fell in love with EDM (Electronic Dance Music) and started DJ&#039;ing professionally. Currently, he is known as a Pystrance/Techno DJ and CEO of his own event company: Unit 240, which will soon have events all over The Netherlands.', '/img/resident1.jpeg'),
(3, 'DJ Paliyo', 'Pablo is welcomed into the UNIT240 family for his fast-paced, reversed bass filled DJ sets and killer productions. Expect to see much more of Pablo across our shows in the Netherlands and abroad.', '/img/resident2.jpeg'),
(5, 'DJ Hanto', 'His name is Hanto from South Korea, an ICB student in-love with music. Started his DJ career back in 2010 in USA while doing his studies. Over the years he jumped from music genre to genre and tried new things. Now you will hear him playing Tech House, House, DnB, Techno.', '/img/resident3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `role` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(77, 'admin', '$2y$10$nwdoSgjrHfImBtnQ3/H3nuUib628mPzy6XwWWMX49UZECKyGNRRPG', 'admin@unit240.nl', 'admin'),
(78, 'user', '$2y$10$iENComC.Kx7uEQaVk14cF.jAVhRVWYQZCNRnS6rOoOZ5iXedWCbEO', 'user@unit240.nl', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
