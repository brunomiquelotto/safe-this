CREATE VIEW vw_last_ocurrences AS
SELECT MAX(oup.Ocurrence_Id) Ocurrence_Id, 
MAX(oup.Ocurrence_Update_Id) Ocurrence_Update_Id 
FROM tb_ocurrence_updates oup GROUP BY oup.Ocurrence_Id