INSERT INTO MataKuliah(IDMK,NamaMK) VALUES('MK301','Sistem Basis Data')

UPDATE MataKuliah SET SKS = 4, NamaMK = 'Teknologi Basis Data' WHERE IDMK = 'MK301'

SELECT * FROM AuditMK
SELECT * FROM MataKuliah

DROP TABLE AuditMK
DROP TABLE MataKuliah