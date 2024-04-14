-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2024 at 10:15 AM
-- Server version: 10.6.16-MariaDB-cll-lve
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
  `selection` varchar(32) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `images` varchar(256) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `selection`, `quantity`, `thumbnail`, `images`, `description`) VALUES
(1, 'Two-Tone Vase', 74.95, 'Natural, Mist White', 1.00, 'img/products/product_1.jpg', 'img/products/product_1_2.jpg, img/products/product_1_3.jpg', '100% Vegetal and Sustainable material :\r\nBio plastic and reclaimed wood\r\n\r\nVase perfect for dried flowers - Natural and mist white color. Minimal design for your home decor and plant lovers.\r\n\r\nDESCRIPTION\r\nBring a touch of originality to your interior with this Onde vase, printed in wood, which will enhance your interior decoration and highlight your dried flowers.\r\n\r\nIts pure lines and material will bring a natural, zen, Scandinavian and original side to your interior, but also makes it an original gift to offer to your loved ones!\r\n\r\nDIMENSIONS\r\nHeight 25 cm x inner diameter 3,5 cm\r\n\r\nCOMPOSITIONS\r\nIn addition to decorating your home with this vase, you are doing our planet good.\r\n\r\nThis object is made from a renewable and biodegradable material : a mixture of recycled wood fibers and bio-plastic obtained from corn. This material has the unique look, feel and smell of raw wood.'),
(2, 'Tide Vase', 145.95, 'Natural, Blue', 1.00, 'img/products/product_2.jpg', 'img/products/product_2_2.jpg, img/products/product_2_3.jpg', '100% Vegetal and Sustainable material :\r\nBio plastic and reclaimed wood\r\n\r\nTide Vase for dried flowers - Natural wood for Home Decor\r\n\r\nDESCRIPTION\r\nThe vase is drawn like waves thanks to its texture and depth. The shape of the vase differs according to the light and the perspective. An invitation to look at it throughout the day, and in all its forms to discover all its facets.\r\n\r\nDIMENSIONS\r\n- Height 22 cm, inner diameter 4 cm x 18 cm\r\n- Height 28 cm, inner diameter 5 x 22 cm\r\n\r\nUSE :\r\nWe recommend to use this vase with dried flowers or waterproof container.\r\n\r\nCOMPOSITION\r\nIn addition to decorating your home with this vase, you are doing our planet good. This vase is made from an organic and environmentally friendly material: a mixture of recycled wood fibers and bio-plastic obtained from corn!\r\n\r\nIts composition makes it a completely renewable material. This material has the unique look, feel and smell of raw wood.'),
(3, 'Variable Vase', 99.95, 'Natural', 1.00, 'img/products/product_3.jpg', 'img/products/product_3_2.jpg, img/products/product_3_3.jpg', 'A vase you can change depending on your mood.\r\n\r\nIt is made of 5 different parts you can rearrange to make it your own and have a different vase every day !\r\n\r\nIts pure lines and material will bring a natural, zen and original side to your interior, but also makes it an original gift to offer to your loved ones!\r\n\r\n3D printed from our recycled wood and cornstarch based bioplastic\r\n\r\nWaterproof insert made from 100% recycled bottle\r\n\r\nSize: 20cm height - 11cm width - 5cm inner diameter'),
(4, 'Textured Vase', 79.95, 'Mist White', 1.00, 'img/products/product_4.jpg', 'img/products/product_4_2.jpg, img/products/product_4_3.jpg', 'A woven masterpiece perfect for displaying dried flowers.\r\n\r\nDESCRIPTION Elevate your interior with our BERLIN Vase, expertly crafted in wood to mimic the intricate weave of fabric. This vase not only enhances your home decor but also provides a unique backdrop for showcasing dried flowers in style.\r\n\r\nWith its sleek lines, organic material, and woven-like texture, the BERLIN Vase seamlessly blends elements of nature, zen tranquility, Scandinavian aesthetics, and originality into your living space. It\'s a thoughtful and unique gift choice for your loved ones.\r\n\r\nDIMENSIONS Height: 25 cm x Inner Diameter: 15 cm\r\n\r\nCOMPOSITION Crafted from an organic and eco-friendly blend of recycled wood fibers and corn-based bioplastic, the vase is a testament to sustainability. Its composition ensures it\'s a fully renewable material, and its woven-like texture adds a distinctive touch to your decor.\r\n'),
(5, 'Minimalist Vase', 85.95, 'Mist White, Blue', 1.00, 'img/products/product_5.jpg', 'img/products/product_5_2.jpg, img/products/product_5_3.jpg', '100% Vegetal and Sustainable material :\r\nBio plastic and reclaimed wood\r\n\r\nPerfect for dried flowers\r\n\r\nDESCRIPTION\r\nBring a touch of originality to your interior with this Onde vase, printed in wood, which will enhance your interior decoration and highlight your dried flowers.\r\n\r\nIts pure lines and material will bring a natural, zen, Scandinavian and original side to your interior, but also makes it an original gift to offer to your loved ones!\r\n\r\nDIMENSIONS\r\nHeight 24,5 cm x inner diameter 5 cm and 8 cm\r\n\r\nCOMPOSITION\r\nIn addition to decorating your home with this vase, you are doing our planet good.\r\n\r\nThis vase is made from an organic and environmentally friendly material: a mixture of recycled wood fibers and bio-plastic obtained from corn!\r\n\r\nIts composition makes it a completely renewable material. This material has the unique look, feel and smell of raw wood.'),
(6, 'Pendant Lamp', 85.95, 'Natural', 1.00, 'img/products/product_6.jpg', 'img/products/product_6_2.jpg, img/products/product_6_3.jpg', '100% Vegetal and Sustainable material :\r\nBio plastic and reclaimed wood\r\nMADE IN FRANCE - On demand, just for you\r\nReady to ship in 48 hours\r\n\r\n\r\n--\r\nDiamond Pendant light - Design Suspension - Lampshade printed in recycled wood and bioplastic.\r\n\r\nDESCRIPTION\r\nInspired by the shape of diamond industrial and vintage \"cage\" suspensions, this suspension combines modern techniques and lines, the raw side of the wood and vintage style.\r\n\r\nTERMS OF PURCHASE\r\n\r\nThe lampshade only : sold with its brass E27, not wired.\r\n\r\nThe complete pendant light : sold with a white or black cord, and a ceiling lamp cover.\r\n\r\nDIMENSION\r\nDiameter 16 cm x Height 20 cm\r\n\r\nUSE\r\nE27 - 60 watt max\r\nLed bulb recommended.\r\n\r\nCOMPOSITION\r\nThis lamp is printed with a sustainable material : a blend of recycled wood fibers and bioplastic made from corn \\ Its composition is renewable and fully biodegradable '),
(7, 'Halo Wall Lamp', 159.95, 'Natural', 1.00, 'img/products/product_7.jpg', 'img/products/product_7_2.jpg, img/products/product_7_3.jpg', 'Discover Halo Lamp, our latest innovation in lighting, specially designed for fans of minimalist design. This versatile lamp can be installed as an elegant wall sconce or placed to create a soft and welcoming ambiance, thus adapting to all spaces and preferences.\r\n\r\nDescription:\r\n\r\nHalo Lamp embodies originality and modernity with its dimensions of 33 cm in height, 21 cm in width, and 13 cm in depth. It is designed to integrate harmoniously into any interior. Installation is made easy thanks to an included hanging system, allowing great flexibility in choosing its location, whether as a wall sconce or a table lamp. Additionally, Halo 01 comes with a 4-meter-long electrical cord, providing ample length for versatile placement options without the need for immediate proximity to an outlet. The design of Halo 01 draws inspiration from the beauty of natural elements while highlighting eco-friendly materials.\r\n\r\nThe E14 socket is suitable for a wide selection of bulbs, giving you the freedom to customize the intensity and type of lighting according to your desires. Equipped with a standard European plug, Halo 01 requires an EU to US or UK plug adapter for use outside of Europe, thus ensuring its international compatibility.\r\n\r\nComposition:\r\n\r\nTrue to our commitment to sustainability, Halo Lamp is made from 100% plant-based and durable materials, such as bioplastic and recycled wood. This eco-responsible approach gives each lamp a unique aesthetic, with the texture and characteristic scent of raw wood, inviting a piece of nature into your home.\r\n\r\nCraftsmanship:\r\n\r\nProduced on order in our workshop located in Hossegor, France, each Halo 01 lamp is the result of passionate and meticulous work since 2016. Our artisanal process guarantees quality and particular attention to detail, while promoting environmentally friendly production.'),
(8, 'Basket Table Lamp', 249.95, 'Natural', 1.00, 'img/products/product_8.jpg', 'img/products/product_8_2.jpg, img/products/product_8_3.jpg', '100% Vegetal and Sustainable material :\r\nBio plastic and reclaimed wood\r\n\r\nDESCRIPTION\r\nInspired by the industrial suspensions, the SUNSET table lamp combines the modernity of the techniques and the lines, the raw side of the wood and the vintage style. Thanks to its pure and natural lines, this table lamp fits perfectly in a modern or industrial decor.\r\n\r\nThe suspension is sold with a black cable of 1,8 meter length.\r\n\r\nDIMENSIONS\r\nHeight : 20 cm x Depth: 25 cm.\r\n\r\nDouille E27 - 60 watts.\r\nLED bulb recommended.\r\n\r\nCOMPOSITION\r\nThis lamp is made from an eco-responsible material: a mixture of recycled wood fibers and bio-plastic made from corn starch and wood (30%). An environmentally friendly and 100% biodegradable material ! ?\r\n\r\nThis material gives it the unique look, feel and smell of raw wood.'),
(9, 'Pendant Ceiling Lamp', 289.95, 'Natural', 1.00, 'img/products/product_9.jpg', 'img/products/product_9_2.jpg, img/products/product_9_3.jpg', '100% Vegetal and Sustainable material :\r\nBio plastic and reclaimed wood\r\n\r\nDESCRIPTION\r\nInspired by the industrial suspensions, this suspension combines the modernity of the techniques and the lines, the raw side of the wood and the vintage style.\r\n\r\nThanks to its pure and natural lines, this suspension fits perfectly in a modern and industrial universe.\r\n\r\nThe suspension is sold with a white or black cable, an E27 socket and a ceiling light.\r\n\r\nDIMENSIONS\r\nHeight : 21 cm x Depth: 21 cm\r\n\r\nCOMPOSITION\r\nThis lamp is made from an eco-responsible material: a mixture of recycled wood fibers and bio-plastic made from corn starch and wood (30%). An environmentally friendly and 100% biodegradable material ! ?\r\n\r\nThis material gives it the unique look, feel and smell of raw wood.\r\n\r\nKNOW-HOW\r\nThis lamp is made with quality materials in our workshop in France, Hossegor, since 2016 and with Love!'),
(10, 'Toucan Wall Decor', 99.95, 'Natural', 1.00, 'img/products/product_10.jpg', 'img/products/product_10_2.jpg, img/products/product_10_3.jpg', 'Wall sculpture - Wall decor - Toucan\r\n\r\nDESCRIPTION\r\nGraphic and colored wall sculpture representing a Toucan. This Toucan is also a very original idea gift to offer to your close relations !\r\n\r\nSculpture realized by cut laser, painted in the hand, plating oak.\r\n\r\nA hook at the back of the sculpture allows to fix the Toucan on the wall.\r\n\r\nDIMENSIONS\r\n- S : Width 29 cm x Height 33 cm x Thickness 2,5 cm\r\n- M : Width 40 cm x height 44 cm x thickness 2,5 cm.\r\n\r\nKNOW-HOW\r\nWall sculpture made in our workshop in Hossegor, France, since 2016 and with Love!\r\n\r\n'),
(11, 'Ocean Bowl', 59.95, 'Ocean', 1.00, 'img/products/product_11.jpg', 'img/products/product_11_2.jpg, img/products/product_11_3.jpg', 'DESCRIPTION\r\nDiscover our new bowl, made from recycled PET bottles.\r\n\r\nIts iridescent blue shade and minimalist design make it a stylish addition to any house, and it’s perfect for displaying your favorite fruits. Inspired by the ocean color, each bowl has a unique color, and cannot be replicated exactly the same.\r\n\r\nDIMENSIONS\r\nHeight : 10 cm\r\nExternal diameter : 35 cm\r\n\r\nCOMPOSITION\r\nBy choosing this vase, you’re making a positive impact on the environment and supporting sustainable practices. This vase is made from recycled PET bottles. Let’s reduce plastic waste together by giving them a second life that is both durable and aesthetic.'),
(12, 'Ocean Vase', 139.95, 'Ocean', 1.00, 'img/products/product_12.jpg', 'img/products/product_12_2.jpg, img/products/product_12_3.jpg', 'DESCRIPTION\r\nDiscover our new vase, made from recycled PET bottles.\r\n\r\nIts iridescent blue shade and minimalist design make it a stylish addition to any room, and it’s perfect for displaying your favorite flowers or plants. Inspired by the ocean color, each vase has a unique color, and cannot be replicated exactly the same.\r\n\r\nDIMENSIONS\r\nHeight : 40 cm\r\nExternal diameter : 17 cm\r\n\r\nCOMPOSITION\r\nBy choosing this vase, you’re making a positive impact on the environment and supporting sustainable practices. This vase is made from recycled PET bottles. Let’s reduce plastic waste together by giving them a second life that is both durable and aesthetic.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
