
DELIMITER $$

DROP PROCEDURE IF EXISTS `GETMODULELISTBYROLECODE` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETMODULELISTBYROLECODE`(IN `rolecode` CHAR(50))

BEGIN

  	SELECT
		SR.RoleCode,
    	SM.ModuleCode
    FROM roldemodulelink RL
	INNER JOIN systemrole SR
		ON RL.RoleId = SR.SystemRoleId
	INNER JOIN systemmodule SM
		ON RL.ModuleId = SM.SystemModuleID
	WHERE SR.RoleCode = rolecode;

END

DELIMITER ;