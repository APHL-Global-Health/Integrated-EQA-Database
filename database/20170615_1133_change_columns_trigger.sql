
DELIMITER $$

    DROP TRIGGER IF EXISTS tbl_bac_response_results_AFTER_UPDATE$$
    DROP TRIGGER IF EXISTS updateSamplesToUsers$$
    CREATE DEFINER=`root`@`localhost` TRIGGER `tbl_bac_response_results_AFTER_UPDATE` AFTER UPDATE ON `tbl_bac_response_results` FOR EACH ROW
    BEGIN
        UPDATE tbl_bac_samples_to_users 
            SET 
            totalCorrectScore=new.finalScore,
            finalScore=new.finalScore,
            grade=new.grade,
            remarks=new.remarks,
            adminMarked=new.adminMarked,
            totalMicroAgentsScore=new.totalMicroAgentsScore
        WHERE 
            sampleId=new.sampleId AND 
            roundId=new.roundId AND 
            participantId=new.participantId AND
            panelToSampleId=new.panelToSampleId AND 
            userId=new.userId;
    END$$
DELIMITER ;
