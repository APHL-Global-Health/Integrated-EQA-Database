-- Change from using plain text passwords
UPDATE system_admin SET password = md5(password);