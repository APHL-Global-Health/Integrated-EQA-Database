CREATE TABLE `rep_programs` (
  `ProgramID` int(11) NOT NULL AUTO_INCREMENT,
  `ProgramCode` varchar(10) DEFAULT NULL,
  `Description` varchar(128) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ProgramID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1