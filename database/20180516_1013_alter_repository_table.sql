ALTER TABLE `rep_repository` 
ADD COLUMN `uploadMessage` TEXT NULL COMMENT 'Upload Message(system generated)' AFTER `Test`;


DROP TRIGGER IF EXISTS `updateTime_valid_rep`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` TRIGGER `updateTime_valid_rep` BEFORE INSERT ON `rep_repository` FOR EACH ROW BEGIN

declare mflcount int default 0;
declare EventDate date default null;

declare EventDateCount int default 0;

select count(MflCode) into mflcount from mfl_facility_codes where MflCode = new.MflCode;
select EndDate into EventDate from rep_providerrounds where PeriodDescription = new.RoundID;


  set new.EventDate=EventDate ;
  set new.uploadMessage='Valid data' ;


if mflcount=0 then
  set new.valid=0 ;
  set new.uploadMessage='Invalid mflcode' ;
end if;


if ( isnull(new.ReleaseDate) ) then
 set new.ReleaseDate=curdate();
end if;

END$$
DELIMITER ;

