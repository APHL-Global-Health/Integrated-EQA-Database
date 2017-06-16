

DELIMITER $$

DROP TRIGGER IF EXISTS eanalyze_test.tbl_bac_response_results_AFTER_UPDATE$$
USE `eanalyze_test`$$
CREATE DEFINER=`root`@`localhost` TRIGGER `eanalyze_test`.`tbl_bac_response_results_AFTER_UPDATE` AFTER UPDATE ON `tbl_bac_response_results` FOR EACH ROW
BEGIN
	update tbl_bac_samples_to_users 
	   set 
	   totalCorrectScore=new.finalScore,
       finalScore=new.finalScore,
       grade=new.grade,
       remarks=new.remarks,
       adminMarked=new.adminMarked,
       totalMicroAgentsScore=new.totalMicroAgentsScore
   where 
   sampleId=new.sampleId and 
   roundId=new.roundId and 
   participantId=new.participantId and
    panelToSampleId=new.panelToSampleId and 
     userId=new.userId;
END$$
DELIMITER ;
