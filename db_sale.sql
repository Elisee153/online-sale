-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 10:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Numerique'),
(2, 'Habillement'),
(3, 'Musique'),
(4, 'Industry'),
(5, 'Divers'),
(6, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  `idproduit` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom`, `email`, `commentaire`, `date`, `etat`, `idproduit`, `iduser`) VALUES
(1, 'Jean-louis', 'jean@gmail.com', 'C comment qu\'on fait pour commenter', '12-02-2021', 1, 21, NULL),
(2, 'Jesus Kaz', 'jesus@gmail.com', 'This is the best cask in central africa!', '20-04-2021', 1, 21, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `main` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`, `main`, `idproduit`) VALUES
(13, 'fichierce76455adc0c1fe3a2bf43e555b7d886_images (2).jpg', 1, 12),
(14, 'fichierce76455adc0c1fe3a2bf43e555b7d886_images (7).jpg', 0, 12),
(15, 'fichierce76455adc0c1fe3a2bf43e555b7d886_images (6).jpg', 0, 12),
(16, 'fichierce76455adc0c1fe3a2bf43e555b7d886_images (11).jpg', 0, 12),
(17, 'fichierce76455adc0c1fe3a2bf43e555b7d886_images.jpg', 0, 12),
(18, 'fichierb76c6b0f5594588986a2deffc97e5580_hero-slide1.png', 1, 13),
(19, 'fichierb76c6b0f5594588986a2deffc97e5580_product5.png', 0, 13),
(20, 'fichiera4be13e2fcd6da47a654bd2ce5c31b06_hero-slide2.png', 1, 14),
(21, 'fichiera4be13e2fcd6da47a654bd2ce5c31b06_s-p1.jpg', 0, 14),
(22, 'fichier610611e62812ffc9f1bd0ecb42baa598_james-kovin-425Slg4x60U-unsplash.jpg', 1, 15),
(23, 'fichier4b997a3342d243ce47c8890aec3becf3_s-p1.jpg', 1, 16),
(24, 'fichier4b997a3342d243ce47c8890aec3becf3_s-p1.jpg', 0, 16),
(25, 'fichier4b997a3342d243ce47c8890aec3becf3_s-p1.jpg', 0, 16),
(26, 'fichier6af623131e251d32c6ae8c06acc18a47_product2.png', 1, 17),
(27, 'fichier6af623131e251d32c6ae8c06acc18a47_product2.png', 0, 17),
(30, 'fichier9b5a29aba038975e65b0c2c8e381513b_product3.png', 1, 19),
(31, 'fichier9b5a29aba038975e65b0c2c8e381513b_product6.png', 0, 19),
(32, 'fichier66fb563271ec4b3f07d0fbf966438484_hobi-industri-NLBJ2I0lNr4-unsplash.jpg', 1, 20),
(33, 'fichier66fb563271ec4b3f07d0fbf966438484_sharegrid-LbzWs77C6Jc-unsplash.jpg', 0, 20),
(34, 'fichier94a8e4671d3cb970be8587ebcb03af6e_hero-slide2.png', 1, 21),
(35, 'fichier9b54e5ef0b853d46ea2b149a749f2213_nina-mercado-KWjgfKVzjrM-unsplas.jpg', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `email`, `subject`, `message`, `date`, `etat`, `iduser`) VALUES
(1, 'Kasongo Scott', 'scott@gmail.com', 'Contact', 'Hi! I am so amazed to see you here', '10-04-2021', 1, 1),
(2, 'Youri', 'youri@gmail.com', 'Command', 'J\'ai besoin d\'une chemise', '12-04-2021', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `idcategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `designation`, `prix`, `description`, `idcategorie`) VALUES
(12, 'Ecouteur', '2000', 'lorem', 1),
(13, 'Chosuure', '30000', 'Tres belles chossures ', 2),
(14, 'Ecouteur', '12000', 'Des ecouteurs pas comme les autres.', 1),
(15, 'Mechanic tool', '12000', 'Un outil tres fort et puissant', 4),
(16, 'Montre', '2000', 'Tres belle montre', 5),
(17, 'Women Freshwash', '13000', 'Tres bonne chose a mettre au travail', 5),
(19, 'Room Flash Light', '15 $', 'Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.', 5),
(20, 'Electrical', '100 $', 'Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.', 4),
(21, 'Cask', '20000 FC', 'Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.', 1),
(22, 'Engine', '100 $', 'Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `mdp`, `type`, `email`) VALUES
(1, 'Jesus Kazembe', 'jesus', '0000', 'admin', 'jesus@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prod` (`idproduit`),
  ADD KEY `fk_user` (`iduser`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduit` (`idproduit`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dk_user` (`iduser`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categ` (`idcategorie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_com_prod` FOREIGN KEY (`idproduit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_im_prod` FOREIGN KEY (`idproduit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `dk_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
