CREATE VIEW VW_ocurrences_table AS
	SELECT
		oc.Ocurrence_Id as Id,
		oc.Description,
		sec.Name,
		ocs.Description as Status,
		ocp.Description as Priority,
		COUNT(ocf.Ocurrence_File_Id) as Files,
        ocp.Ocurrence_Priority_Id,
        ocs.Ocurrence_Status_Id,
        oc.Opening_Date
	FROM TB_OCURRENCES oc
		LEFT JOIN TB_OCURRENCE_UPDATES ocu ON ocu.Ocurrence_Id = oc.Ocurrence_Id
		LEFT JOIN TB_SECTORS sec ON sec.Sector_Id = oc.Sector_Id
		LEFT JOIN TB_Ocurrence_Priorities ocp ON ocp.Ocurrence_Priority_Id = oc.Ocurrence_Priority_Id
		LEFT JOIN TB_OCURRENCE_STATUSES ocs ON ocs.Ocurrence_Status_Id = ocu.Ocurrence_Status_Id
		LEFT JOIN TB_OCURRENCE_FILES ocf ON ocu.Ocurrence_Update_Id = ocf.Ocurrence_Update_Id
		GROUP BY oc.Ocurrence_Id, oc.Description, ocs.Description;