-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2024 at 09:49 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feliciasd_ixd608`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `colors` varchar(32) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `images` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `composition` text NOT NULL,
  `dimension` text NOT NULL,
  `category` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `colors`, `quantity`, `thumbnail`, `images`, `description`, `composition`, `dimension`, `category`, `date_added`) VALUES
(1, 'Two-Tone Vase', 82.51, 'Natural, Mist White', 2.00, 'img/products/product_1.jpg', 'img/products/product_1.jpg,img/products/product_1_2.jpg, img/products/product_1_3.jpg', 'Bring a touch of originality to your interior with this Onde vase, printed in wood, which will enhance your interior decoration and highlight your dried flowers.', 'This object is made from a renewable and biodegradable material : a mixture of recycled wood fibers and bio-plastic obtained from corn. This material has the unique look, feel and smell of raw wood.', 'Height 25 cm x inner diameter 3,5 cm', 'vase', '2024-04-10 17:40:21'),
(2, 'Tide Vase', 150.00, 'Natural, Blue', 2.00, 'img/products/product_2.jpg', 'img/products/product_2.jpg,img/products/product_2_2.jpg, img/products/product_2_3.jpg', 'The vase is drawn like waves thanks to its texture and depth. The shape of the vase differs according to the light and the perspective.', 'This vase is made from an organic and environmentally friendly material: a mixture of recycled wood fibers and bio-plastic obtained from corn.\r\n', 'Height 28 cm, inner diameter 5 x 22 cm', 'vase', '2024-04-15 17:57:35'),
(3, 'Variable Vase', 99.95, 'Natural', 1.00, 'img/products/product_3.jpg', 'img/products/product_3.jpg,\r\nimg/products/product_3_2.jpg, img/products/product_3_3.jpg', 'A vase you can change depending on your mood. It is made of 5 different parts you can rearrange to make it your own and have a different vase every day!\r\n\r\n', '3D printed from our recycled wood and cornstarch based bioplastic. Waterproof insert made from 100% recycled bottle.', '20cm height - 11cm width - 5cm inner diameter', 'vase', '2024-05-05 17:57:54'),
(4, 'Textured Vase', 79.99, 'Mist White', 1.00, 'img/products/product_4.jpg', 'img/products/product_4.jpg,img/products/product_4_2.jpg, img/products/product_4_3.jpg', 'Elevate your interior with our BERLIN Vase, expertly crafted in wood to mimic the intricate weave of fabric. This vase not only enhances your home decor but also provides a unique backdrop for showcasing dried flowers in style.\r\n', 'Crafted from an organic and eco-friendly blend of recycled wood fibers and corn-based bioplastic, the vase is a testament to sustainability.\r\n', 'Height: 25 cm x Inner Diameter: 15 cm', 'vase', '2024-04-22 17:58:54'),
(5, 'Minimalist Vase', 89.00, 'Mist White, Blue', 1.00, 'img/products/product_5.jpg', 'img/products/product_5.jpg,img/products/product_5_2.jpg, img/products/product_5_3.jpg', 'Bring a touch of originality to your interior with this Onde vase, printed in wood, which will enhance your interior decoration and highlight your dried flowers.', 'This vase is made from an organic and environmentally friendly material: a mixture of recycled wood fibers and bio-plastic obtained from corn.\r\n', 'Height 24,5 cm x inner diameter 5 cm and 8 cm', 'vase', '2024-05-26 17:58:14'),
(6, 'Pendant Lamp', 85.90, 'Natural', 1.00, 'img/products/product_6.jpg', 'img/products/product_6.jpg,img/products/product_6_2.jpg, img/products/product_6_3.jpg', 'Inspired by the shape of diamond industrial and vintage \"cage\" suspensions, this suspension combines modern techniques and lines, the raw side of the wood and vintage style.', 'This lamp is printed with a sustainable material : a blend of recycled wood fibers and bioplastic made from corn.', 'Diameter 16 cm x Height 20 cm', 'lamp', '2024-03-27 17:58:21'),
(8, 'Basket Table Lamp', 249.95, 'Natural', 1.00, 'img/products/product_8.jpg', 'img/products/product_8.jpg,\r\nimg/products/product_8_2.jpg, img/products/product_8_3.jpg', 'Inspired by the industrial suspensions, the SUNSET table lamp combines the modernity of the techniques and the lines, the raw side of the wood and the vintage style. Thanks to its pure and natural lines, this table lamp fits perfectly in a modern or industrial decor.', 'This lamp is made from an eco-responsible material: a mixture of recycled wood fibers and bio-plastic made from corn starch and wood (30%). An environmentally friendly and 100% biodegradable material.', 'Height : 20 cm x Depth: 25 cm', 'lamp', '2024-04-08 17:58:45'),
(9, 'Pendant Ceiling Lamp', 289.95, 'Natural', 1.00, 'img/products/product_9.jpg', 'img/products/product_9.jpg,img/products/product_9_2.jpg, img/products/product_9_3.jpg', 'Inspired by the industrial suspensions, this suspension combines the modernity of the techniques and the lines, the raw side of the wood and the vintage style.', 'This lamp is made from an eco-responsible material: a mixture of recycled wood fibers and bio-plastic made from corn starch and wood (30%). An environmentally friendly and 100% biodegradable material.Height : 21 cm x Depth: 21 cm', 'Height : 21 cm x Depth: 21 cm', 'lamp', '2024-05-06 17:58:56'),
(11, 'Ocean Bowl', 59.95, 'Ocean', 1.00, 'img/products/product_11.jpg', 'img/products/product_11_2.jpg, img/products/product_11_3.jpg', 'Its iridescent blue shade and minimalist design make it a stylish addition to any house, and it’s perfect for displaying your favorite fruits. Inspired by the ocean color, each bowl has a unique color, and cannot be replicated exactly the same.', 'By choosing this vase, you’re making a positive impact on the environment and supporting sustainable practices. This vase is made from recycled PET bottles. Let’s reduce plastic waste together by giving them a second life that is both durable and aesthetic.', 'Height : 10 cm, External diameter : 35 cm', 'home-decor', '2024-03-12 17:59:10'),
(22, 'Halo Lamp', 149.45, 'Natural, Mist White', 1.00, 'img/products/product_7.jpg', 'img/products/product_7.jpg,img/products/product_7_2.jpg, img/products/product_7_3.jpg', 'This versatile lamp can be installed as an elegant wall sconce or placed to create a soft and welcoming ambiance, thus adapting to all spaces and preferences.', 'True to our commitment to sustainability, Halo Lamp is made from 100% plant-based and durable materials, such as bioplastic and recycled wood. This eco-responsible approach gives each lamp a unique aesthetic, with the texture and characteristic scent of raw wood, inviting a piece of nature into your home.', 'Halo Lamp embodies originality and modernity with its dimensions of 33 cm in height, 21 cm in width, and 13 cm in depth. ', 'lamp', '2024-05-25 08:33:20'),
(23, 'Toucan Wall Decor', 249.95, 'Natural', 1.00, 'img/products/product_10.jpg', 'img/products/product_10.jpg,img/products/product_10_2.jpg, img/products/product_10_3.jpg', 'Graphic and colored wall sculpture representing a Toucan. This Toucan is also a very original idea gift to offer to your close relations. ', 'Sculpture realized by cut laser, painted in the hand, plating oak. A hook at the back of the sculpture allows to fix the Toucan on the wall.', 'Width 40 cm x height 44 cm x thickness 2,5 cm', 'wall-decor', '2024-05-25 08:39:59'),
(24, 'Ocean Vase', 95.45, 'Ocean', 1.00, 'img/products/product_12.jpg', 'img/products/product_12.jpg,img/products/product_12_2.jpg, img/products/product_12_3.jpg', 'Its iridescent blue shade and minimalist design make it a stylish addition to any room, and it’s perfect for displaying your favorite flowers or plants. Inspired by the ocean color, each vase has a unique color, and cannot be replicated exactly the same.', 'By choosing this vase, you’re making a positive impact on the environment and supporting sustainable practices. This vase is made from recycled PET bottles. Let’s reduce plastic waste together by giving them a second life that is both durable and aesthetic.', 'Height : 40 cm\r\nExternal diameter : 17 cm', 'vase', '2024-04-01 08:49:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
