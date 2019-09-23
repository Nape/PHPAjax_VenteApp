
CREATE DATABASE IF NOT EXISTS `paypal_bd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `paypal_bd`;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `client_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) NOT NULL,
  `prix_produit` int(20) NOT NULL,
  `devise` varchar(255) NOT NULL,
  `email_achat` varchar(255) NOT NULL,
  `description_produit` text NOT NULL,
  `image_produit` varchar(255) NOT NULL,
  `mode_payment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
