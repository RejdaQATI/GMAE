-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 04, 2024 at 06:27 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jcp_vacances`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `name`) VALUES
(1, 'Mer'),
(2, 'Campagne'),
(3, 'Montagne');

-- --------------------------------------------------------

--
-- Table structure for table `formule`
--

CREATE TABLE `formule` (
  `id_formule` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `username`, `password`) VALUES
(1, 1, 'RejdaQati', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `voyage`
--

CREATE TABLE `voyage` (
  `id_voyage` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_formule` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `id_categorie`, `id_formule`, `title`, `image_url`, `description`, `date_debut`, `date_fin`, `price`) VALUES
(46, 2, 2, 'Paris', 'http://localhost:8888/GMAE/assets/img/ru6pzjldfeolb2hfyv9u.webp', 'Paris - Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam nam ullam modi veritatis sed ratione inventore, illum odio, natus aliquam labore Paris', '2024-03-26', '2024-03-21', 140),
(47, 3, 2, 'Bretagne', 'http://localhost:8888/GMAE/assets/img/msm-featured.jpeg', 'Bretagne - Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam nam ullam modi veritatis sed ratione inventore, illum odio, natus aliquam labore ', '2024-03-22', '2024-03-21', 130),
(48, 1, 2, 'Marseille', 'http://localhost:8888/GMAE/assets/img/b089c412c647e05341592171b6d34ba8-marseille.jpeg', 'Marseille -  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', '2024-03-22', '2024-03-12', 150),
(49, 2, 2, 'Montpellier', 'http://localhost:8888/GMAE/assets/img/montpellier-2992166-jeremy-bezanger-bz1fd1ecgri-unsplash-617169fae3b7f733862246.jpeg', 'Montpellier - Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium debitis perferendis repellendus quas suscipit accusantium', '2024-03-15', '2024-03-13', 8),
(52, 2, 2, 'Strasbourg', 'http://localhost:8888/GMAE/assets/img/visiter-strasbourg.jpeg', 'Strasbourg - Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam cum facilis, totam suscipit recusandae quos tenetur ipsam nobis aspernatur', '2024-03-09', '2024-03-09', 12),
(53, 2, 2, 'Etretat', 'http://localhost:8888/GMAE/assets/img/540e0ec76da8111e3ef5facd.webp', 'Etretat -  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', '2024-04-11', '2024-04-03', 200),
(54, 2, 1, 'Aix-en-Provence', 'http://localhost:8888/GMAE/assets/img/lavender_fields_france_provence_my_french_recipe__56178.jpeg', 'Aix-en-Provence -  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', '2024-04-11', '2024-04-11', 180),
(57, 2, 2, 'Bretagne', 'http://localhost:8888/GMAE/assets/img/brittany-coast.webp', 'Bretagne -  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', '2024-04-11', '2024-04-18', 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `formule`
--
ALTER TABLE `formule`
  ADD PRIMARY KEY (`id_formule`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id_voyage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `formule`
--
ALTER TABLE `formule`
  MODIFY `id_formule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id_voyage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
