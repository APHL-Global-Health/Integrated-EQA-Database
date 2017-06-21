ALTER TABLE tbl_bac_rounds_labs
ADD COLUMN `lastMailSend` DATE NULL DEFAULT now() AFTER `status`;
