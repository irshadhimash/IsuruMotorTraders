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

SELECT
	S.SaleID,
	S.VehicleNo,
	S.SalePrice,
    S.InitialPayment,
    (S.SalePrice - S.InitialPayment) AS TotalAfterInitial,
    CASE
    	WHEN IP.AmountPaid > 0
        	THEN SUM(IP.AmountPaid)
        ELSE 0
    END AS TotalInstallmentsPaid,
    CASE
    	WHEN IP.AmountPaid IS NULL
        	THEN 0
        ELSE COUNT(*)
    END  AS NoOfPayments
FROM SALE S 
LEFT JOIN installmentpayment IP
	ON S.SaleID = IP.SaleId
WHERE S.PaymentMethod = 'Installment'
GROUP BY S.SaleID

/*prev get all installments*/
SELECT
	S.SaleID,
	S.VehicleNo,
	S.SalePrice,
    S.InitialPayment,
    (S.SalePrice - S.InitialPayment) AS TotalAfterInitial,
    SUM(IP.AmountPaid) AS TotalInstallmentsPaid,
    COUNT(*) AS NoOfPayments
FROM installmentpayment IP
LEFT OUTER JOIN SALE S
	ON S.SaleID = IP.SaleId
WHERE S.PaymentMethod = 'Installment'
GROUP BY S.SaleID
