CREATE TRIGGER AuditMataKuliah
ON MataKuliah
AFTER UPDATE
AS
BEGIN
    DECLARE @IDMK VARCHAR(5);
    DECLARE @SKS_New INT;
    DECLARE @SKS_Old INT;
    DECLARE @NamaMK_New VARCHAR(40);
    DECLARE @NamaMK_Old VARCHAR(40);
    DECLARE @ChangeDate DATE;
    DECLARE @ChangedBy VARCHAR(40);

    SELECT 
        @IDMK = i.IDMK,
        @SKS_New = i.SKS, 
        @SKS_Old = d.SKS, 
        @NamaMK_New = i.NamaMK, 
        @NamaMK_Old = d.NamaMK, 
        @ChangeDate = GETDATE(), 
        @ChangedBy = SYSTEM_USER
    FROM INSERTED i
    INNER JOIN DELETED d ON i.IDMK = d.IDMK;

    INSERT INTO AuditMK (IDMK, SKS_New, SKS_Old, NamaMK_New, NamaMK_Old, Date, users)
    VALUES (@IDMK, @SKS_New, @SKS_Old, @NamaMK_New, @NamaMK_Old, @ChangeDate, @ChangedBy);
END;
