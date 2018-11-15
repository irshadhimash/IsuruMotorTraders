
DELIMITER $$

DROP PROCEDURE IF EXISTS `CREATEUSER` $$
CREATE PROCEDURE `CREATEUSER`(
    IN istrader VARCHAR(3), IN iscustomer VARCHAR(3), IN isemployee VARCHAR(3), IN firstname VARCHAR(50), IN lastname VARCHAR(50), IN preferedname VARCHAR(50), IN address VARCHAR(50),
    IN gender VARCHAR(6), IN DOB DATE, IN email VARCHAR(60), IN username VARCHAR(50), IN hashedpw VARCHAR(255), IN isadmin VARCHAR(3)
)

BEGIN
START TRANSACTION;

	INSERT INTO userlogin ( username, hashedpassword)
    	VALUES ( username, hashedpw );
        
	INSERT INTO systemuser ( UserLoginID, istrader, iscustomer, isemployee, firstname, lastname, preferedname, address, gender, DOB, email, username, isadmin)
    	VALUES ( LAST_INSERT_ID(), istrader, iscustomer, isemployee, firstname, lastname, preferedname, address, gender, DOB, email, username, isadmin);

COMMIT;
END

DELIMITER ;