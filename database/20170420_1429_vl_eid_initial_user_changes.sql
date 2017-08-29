-- VL/EID initial user changes
INSERT INTO `system_admin` (first_name, last_name, primary_email, password, secondary_email, phone, force_password_reset,
	status, created_on, created_by, updated_on, updated_by, IsVl, IsProvider, ProviderName, AssignModule, County)
VALUES ('VL/EID', 'Administrator', 'vladmin@nphls.or.ke', md5('system@17'), '', '0788492586', 1, 'active', now(), '1', now(), '1', 1, '0', '', 0, NULL);

ALTER TABLE data_manager ADD COLUMN IsTester VARCHAR(45) DEFAULT '0';
ALTER TABLE participant_manager_map ADD COLUMN Parent_id INT(11) DEFAULT 0;
ALTER TABLE participant ADD COLUMN ModuleID INT(11) DEFAULT 0;
