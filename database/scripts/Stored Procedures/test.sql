DELIMITER $$

DROP PROCEDURE IF EXISTS `test` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `test`(IN `username` CHAR(50))
BEGIN

DECLARE RecCount INT

SET @RecCount = SELECT COUNT(*) FROM systemuser su WHERE su.username = Username

SELECT RecCount

DELIMITER ;

/*
INSERT INTO systemuser ( firstname, lastname, preferedname, address, gender, DOB, email, username) VALUES ( 'Sahana', 'Fathima', 'sahana', 'Colombo', 'Female', '1995-10-16', 'abc@xyz.com', 'sahana')
*/