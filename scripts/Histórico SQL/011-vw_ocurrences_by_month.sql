CREATE OR REPLACE VIEW vw_ocurrences_by_month AS
    SELECT
        COUNT(1) AS qty,
        CONCAT(YEAR(opening_date),'-', MONTH(opening_date)) AS month
    FROM tb_ocurrences 
    GROUP BY
        CONCAT(YEAR(opening_date),'-', MONTH(opening_date))
    ORDER BY month DESC;