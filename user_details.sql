use assignment1;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `street_address` varchar(30) DEFAULT NULL,
  `suburb` varchar(20) DEFAULT NULL,
  `state` varchar(3) DEFAULT NULL,
  `postcode` int(4) unsigned DEFAULT NULL,
  `phone_number` int(10) unsigned DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=latin1;