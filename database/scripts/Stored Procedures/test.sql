DELIMITER $$

DROP PROCEDURE IF EXISTS `test` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `test`(IN `username` CHAR(50))
BEGIN

DECLARE RecCount INT;

SET @RecCount = SELECT COUNT(*) FROM systemuser su WHERE su.username = Username;

SELECT RecCount;

DELIMITER ;

/*
INSERT INTO systemuser ( firstname, lastname, preferedname, address, gender, DOB, email, username) VALUES ( 'Sahana', 'Fathima', 'sahana', 'Colombo', 'Female', '1995-10-16', 'abc@xyz.com', 'sahana')
call CREATEUSER( 'y', 'n', 'n', 'abc', 'abc', 'abc', 'abc', 'Male', '2018-11-14', 'abc2@xyz.com', 'abc', 'ThG2XHmq.t7EU', 'n')
*/