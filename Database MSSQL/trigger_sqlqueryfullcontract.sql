/* Trigger FullContract */
CREATE TRIGGER TG_FULLCONTRACT_INSERT_AUTOCODE
ON Full_Contract
FOR INSERT
AS
BEGIN	
	DECLARE @ID INT, @MAVUNG VARCHAR(2), @LOAIHINH VARCHAR(2), @NAMKIKET VARCHAR(2), @THANGKIKET VARCHAR(2), @LOAIHD VARCHAR(2), @MAX INT,@FULL_CONTRACT_CODE NVARCHAR(50), @CUSTOMER_NAME NVARCHAR(100),
	@YEAR_OF_BIRTH INT, @SSN VARCHAR(15), @CUSTOMER_ADDRESS NVARCHAR(100), @MOBILE VARCHAR(15),@DATE_OF_CONTRACT DATE, @PROPERTY_ID INT,
	@PRICE NUMERIC(18,0), @DEPOSIT NUMERIC(18,0), @REMAIN NUMERIC(18,0), @STATUS BIT

	
	SET @ID = (SELECT ID FROM inserted)

	---------------ĐÂY LÀ CODE CỨNG----------------
	SET @MAVUNG= 'SG' --HN: HÀ NỘI . other: LA: LONG AN, CM: CÀ MAU,... 
	SET @LOAIHINH = 'CH' --BT: biệt thự, CH: căn hộ, CC: chung cư,...
	SET @LOAIHD = 'MB' --MB: Mua bán; TD: Thuê đất, NN: Nhà nước,...
	SET @NAMKIKET = CONVERT(VARCHAR(2),RIGHT(YEAR(GETDATE()),2))
	SET @THANGKIKET = CONVERT(VARCHAR(2), MONTH(GETDATE()))

	---------------ĐÂY LÀ CODE TỪ NGƯỜI DÙNG NHẬP VÀO.NHƯNG PHẢI TẠO 3 CỘT TẠM THỜI VÀO BẢNG FULLCONTRACT -----------------
	/* SET @MAVUNG = (SELECT MAVUNG FROM inserted)
	SET @LOAIHINH = (SELECT LOAIHINH FROM inserted)
	SET @LOAIHD = (SELECT LOAIHD FROM inserted) */

	IF NOT EXISTS (SELECT 1 FROM Full_Contract WHERE SUBSTRING(Full_Contract_Code, 5, 2)=@NAMKIKET)
		SET @MAX = 1
	ELSE
		SET @MAX = (SELECT MAX(RIGHT(Full_Contract_Code,5)) FROM Full_Contract WHERE SUBSTRING(Full_Contract_Code,5,2)=@NAMKIKET) + 1
	SET @FULL_CONTRACT_CODE = CONCAT(@MAVUNG,@LOAIHINH,@NAMKIKET,@THANGKIKET,@LOAIHD,RIGHT('0000'+CONVERT(VARCHAR(5), @MAX),5))
	SET @CUSTOMER_NAME = (SELECT Customer_Name FROM inserted)
	SET @YEAR_OF_BIRTH = (SELECT Year_Of_Birth FROM inserted)
	SET @SSN = (SELECT SSN FROM inserted)
	SET @CUSTOMER_ADDRESS = (SELECT Customer_Address FROM inserted)
	SET @MOBILE = (SELECT Mobile FROM inserted)
	SET @PROPERTY_ID = (SELECT Property_ID FROM inserted)
	SET @DATE_OF_CONTRACT = (SELECT Date_Of_Contract FROM inserted)
	SET @PRICE = (SELECT Price FROM inserted)
	SET @DEPOSIT = (SELECT Deposit FROM inserted)
	SET @REMAIN = (SELECT Remain FROM inserted)
	SET @STATUS= (SELECT Status FROM inserted) 

	UPDATE Full_Contract SET Full_Contract_Code= @FULL_CONTRACT_CODE WHERE ID=@ID

END

/* Các câu lệnh xóa data có sẵn
DELETE FROM Full_Contract
*/
/* Test insert
SELECT * FROM  Full_Contract

INSERT INTO Full_Contract(Customer_Name,Year_Of_Birth,SSN,Customer_Address,
					Mobile,Property_ID , Date_Of_Contract, Price, Deposit, Remain, Status)
VALUES(N'Nguyễn Ngọc Định',2002,'21554888',N'10 Nguyễn Thị Yến, Ghềnh Ráng, Quy Nhơn, Bình Định','0911466489', 24,
		'2025-05-30',1234567890,1000000000,6000000000,1)

INSERT INTO Full_Contract(Customer_Name,Year_Of_Birth,SSN,Customer_Address,
					Mobile, Property_ID, Date_Of_Contract, Price, Deposit, Remain, Status)
VALUES(N'Nguyễn Ngọc Công',1993,'21444444',N'15 Nguyễn Thị Yến, Ghềnh Ráng, Quy Nhơn, Bình Định','0911467945', 25
		,'2025-05-28',1234567890,500000000,9000000000,1)
*/

