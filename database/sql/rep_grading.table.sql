CREATE TABLE `rep_grading` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GradeDescription` varchar(128) NOT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1