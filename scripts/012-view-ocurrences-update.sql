CREATE OR REPLACE VIEW vw_ocurrences_update AS 
SELECT 
A.Ocurrence_Id as Id, 
A.Description,
sec.Name Place, 
A.Opening_Date,
oup.Status_Feedback,
oup.Responsible,  
stat.Description as Status, 
prio.Description as Priority 
FROM tb_ocurrences A 
INNER JOIN vw_last_ocurrences B ON A.Ocurrence_Id = B.Ocurrence_Id 
INNER JOIN tb_ocurrence_updates oup ON oup.Ocurrence_Update_Id = B.Ocurrence_Update_Id 
LEFT JOIN tb_ocurrence_statuses stat ON oup.Ocurrence_Status_Id = stat.Ocurrence_Status_Id 
LEFT JOIN tb_ocurrence_priorities prio ON oup.Ocurrence_Priority_Id = prio.Ocurrence_Priority_Id 
INNER JOIN tb_sectors sec ON sec.Sector_Id = A.Sector_Id 

ORDER BY A.Ocurrence_Id DESC