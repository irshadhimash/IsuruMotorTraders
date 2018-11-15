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
  LEFT OUTER JOIN user_has_systemrole UHR
  	ON SU.UserId = UHR.UserId
  LEFT OUTER JOIN systemrole SR
  	ON UHR.SystemRoleId = SR.SystemRoleId
  WHERE SU.username = username;
END

DELIMITER ;