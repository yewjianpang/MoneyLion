USE `db`;


-- --------------------------------------------------------

--
-- Table structure for table `user_feature`
--

DROP TABLE IF EXISTS `user_feature`;
CREATE TABLE `user_feature` (
  `userId` int(10) NOT NULL,
  `featureId` int(10) NOT NULL,
  `enable` bit NOT NULL,
  `create_date` datetime NOT NULL DEFAULT NOW(),
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `user_feature`
  ADD PRIMARY KEY (`userId`,`featureId`);