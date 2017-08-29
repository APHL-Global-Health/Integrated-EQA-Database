SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `readinesschecklist`;
CREATE TABLE `readinesschecklist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ParticipantID` int(11) DEFAULT NULL,
  `q1` int(1) DEFAULT NULL,
  `q2` int(1) DEFAULT NULL,
  `q3` int(1) DEFAULT NULL,
  `q4` text,
  `q5` int(1) DEFAULT NULL,
  `q6` int(1) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `verdict` varchar(250) DEFAULT NULL,
  `comment` text,
  `added_by` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `RoundID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `readinesschecklist` VALUES ('11', '18', '1', '1', '1', 'None', '1', '1', 'Complete', 'Congratulations, you have been approved for participation in this EQA round. Your panel will be shipped within 2 weeks. We greatly appreciate your continued support', 'Good to go!', null, '2017-05-19 11:06:26', '7');
