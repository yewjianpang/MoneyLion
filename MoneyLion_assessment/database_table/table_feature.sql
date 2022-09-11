USE `db`;


-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
CREATE TABLE `feature` (
  `featureId` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `featureName` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT NOW(),
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` ENUM('0', '1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;