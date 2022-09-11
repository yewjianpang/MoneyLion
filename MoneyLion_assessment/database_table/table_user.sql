USE `db`;


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userId` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `userEmail` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT NOW(),
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` ENUM('0', '1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;