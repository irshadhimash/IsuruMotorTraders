DELIMITER $$

DROP PROCEDURE IF EXISTS `GETUSERFORLOGIN` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETUSERFORLOGIN`(IN `username` CHAR(50))
BEGIN
  SELECT
  	SU.UserId,
    SU.FirstName,
    SU.LastName,
    SU.PreferedName,
    SU.Username,
    UL.HashedPassword,
    SR.RoleCode AS UserRole
  FROM systemuser SU
  INNER JOIN userlogin UL
  	ON SU.UserLoginID = UL.UserLoginID
  INNER JOIN user_has_systemrole UHR
  	ON SU.UserId = UHR.UserId
  INNER JOIN systemrole SR
  	ON UHR.SystemRoleId = SR.SystemRoleId
  WHERE username = username;
END $$

DELIMITER ;