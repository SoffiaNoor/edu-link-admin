CREATE TABLE Dosen(
IDDosen VARCHAR(5) NOT NULL PRIMARY KEY,
NamaDosen VARCHAR(55),
Alamat VARCHAR(255)
)
CREATE TABLE Mahasiswa(
NRP VARCHAR(5) NOT NULL PRIMARY KEY,
NamaMhs VARCHAR(55),
Alamat VARCHAR(255),
IDDosen VARCHAR(5) FOREIGN KEY REFERENCES Dosen(IDDosen),
IPK float,
JenisKelamin VARCHAR(10)
)
CREATE TABLE Ruang(
IDRuang VARCHAR(5) NOT NULL PRIMARY KEY,
NamaRuang VARCHAR(10),
Kapasitas int
)
CREATE TABLE AmbilKuliah(
NRP VARCHAR(5), IDMK VARCHAR(5),
PRIMARY KEY (NRP, IDMK),
FOREIGN KEY (NRP) REFERENCES Mahasiswa(NRP),
FOREIGN KEY (IDMK) REFERENCES MataKuliah(IDMK),
NilaiAngka int,
NilaiHuruf VARCHAR(2)
)
CREATE TABLE Tempat(
IDRuang VARCHAR(5), IDMK VARCHAR(5),
PRIMARY KEY (IDRuang, IDMK),
FOREIGN KEY (IDRuang) REFERENCES Ruang(IDRuang),
FOREIGN KEY (IDMK) REFERENCES MataKuliah(IDMK)
)



INSERT INTO  Dosen 
VALUES ('D0001','Prof. Dr. Amanda Smith', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0002','Prof. Dr. Suyadi Ph.D.', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0003','Yasmi S.Si., M.Eng.', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0004','Ahmad Afandi B.Sc., M.B.A.', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0005','Taufiq Haqiqi S.T., M.T.', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0006','Dr. Slamet Wibowo, M.Sc.', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0007','Dewi Lestari S.Si., M.Si.', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0008','Nurul Huda S.Si., M.Si.', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0009','Arief Rahman S.Si., M.Si. ', 'Surabaya')
INSERT INTO  Dosen 
VALUES ('D0010',' Sugeng Purnomo S.Si., M.Si.', 'Surabaya')



INSERT INTO Mahasiswa
VALUES ('M0001','Indah Dwi', 'Madiun', 'D0001', 4, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0002','Emily Johnson', 'Blitar', 'D0002', 3.58, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0003','Carlos Rodriguez', 'Surabaya', 'D0003', 3.21, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0004','Sophie Williams', 'Malang', 'D0004', 3.92, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0005','Alexander Lee', 'Pontianak', 'D0005', 3.64, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0006','Isabella Martinez', 'Madura', 'D0006', 3.00, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0007','Pierre Dubois', 'Bandung', 'D0007', 3.12, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0008','Elena Petrov', 'Jakarta', 'D0008', 3.50, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0009','Muhammad Ali', 'Bekasi', 'D0009', 3.72, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0010','Sofia Hernandez', 'Banyuwangi', 'D0010', 3.62, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0011','David Kim', 'Probolinggo', 'D0001', 3.00, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0012','Maria Gonzalez', 'Kediri', 'D0002', 3.14, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0013','Olivia Brown', 'Tulungagung', 'D0003', 3.77, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0014','Luca Rossi', 'Ponorogo', 'D0004', 3.24, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0015','Mia Chen', 'Blora', 'D0005', 3.10, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0016','Gabriel Rodriguez', 'Tuban', 'D0006', 3.59, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0017','Aria Kapoor', 'Sidoarjo', 'D0007', 3.96, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0018','Viktor Ivanov', 'Jombang', 'D0008', 3.56, 'Laki-laki')
INSERT INTO Mahasiswa
VALUES ('M0019','Emma White', 'Mojokerto', 'D0009', 3.88, 'Perempuan')
INSERT INTO Mahasiswa
VALUES ('M0020','Juan Garcia', 'Lamongan', 'D0010', 3.46, 'Laki-laki')

SELECT*FROM Mahasiswa
DELETE FROM Mahasiswa

ALTER TABLE Mahasiswa
ALTER COLUMN IPK float;


INSERT INTO Ruang
VALUES ('R0001','T101A',50)
INSERT INTO Ruang
VALUES ('R0002','T101B',50)
INSERT INTO Ruang
VALUES ('R0003','F101',45)
INSERT INTO Ruang
VALUES ('R0004','F102',45)
INSERT INTO Ruang
VALUES ('R0005','F109',50)
INSERT INTO Ruang
VALUES ('R0006','F110',40)
INSERT INTO Ruang
VALUES ('R0007','F110',40)
INSERT INTO Ruang
VALUES ('R0008','U101',35)
INSERT INTO Ruang
VALUES ('R0009','U102',35)


INSERT INTO Tempat
VALUES ('R0001','MK101')
INSERT INTO Tempat
VALUES ('R0002','MK201')
INSERT INTO Tempat
VALUES ('R0003','MK301')
INSERT INTO Tempat
VALUES ('R0004','MK401')


INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0001','MK101', 89)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0001','MK301', 78)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0002','MK401', 90)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0002','MK201', 60)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0003','MK101', 89)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0003','MK201', 89)

INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0004','MK101', 82)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0004','MK201', 89)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0005','MK401', 91)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0005','MK201', 77)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0006','MK101', 81)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0006','MK301', 80)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0007','MK301', 92)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0007','MK201', 78)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0008','MK401', 70)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0008','MK301', 86)

INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0009','MK101', 88)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0009','MK201', 86)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0010','MK401', 81)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0010','MK301', 82)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0011','MK201', 85)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0011','MK401', 91)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0012','MK101', 80)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0012','MK301', 79)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0013','MK401', 88)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0013','MK201', 95)


INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0014','MK201', 90)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0014','MK101', 92)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0015','MK301', 88)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0015','MK401', 81)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0016','MK201', 86)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0016','MK401', 70)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0017','MK101', 71)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0017','MK301', 69)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0018','MK101', 90)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0018','MK401', 68)



INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0019','MK101', 89)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0019','MK201', 80)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0020','MK301', 95)
INSERT INTO AmbilKuliah (NRP, IDMK, NilaiAngka)
VALUES ('M0020','MK401', 76)


CREATE FUNCTION dbo.ConvertAngkaToHuruf (@NilaiAngka INT)
RETURNS VARCHAR(2)
AS
BEGIN
    DECLARE @NilaiHuruf VARCHAR(2)

    IF @NilaiAngka >= 86
        SET @NilaiHuruf = 'A'
    ELSE IF @NilaiAngka >= 76
        SET @NilaiHuruf = 'AB'
    ELSE IF @NilaiAngka >= 66
        SET @NilaiHuruf = 'B'
    ELSE IF @NilaiAngka >= 61
        SET @NilaiHuruf = 'BC'
	ELSE IF @NilaiAngka >= 56
        SET @NilaiHuruf = 'C'
	ELSE IF @NilaiAngka >= 41
        SET @NilaiHuruf = 'D'
    ELSE
        SET @NilaiHuruf = 'E'

    RETURN @NilaiHuruf
END

CREATE TRIGGER tr_AmbilKuliah_AutoGrade
ON AmbilKuliah
AFTER INSERT
AS
BEGIN
    DECLARE @NilaiAngka INT
    DECLARE @NilaiHuruf VARCHAR(2)

    SELECT @NilaiAngka = NilaiAngka FROM inserted
    SET @NilaiHuruf = dbo.ConvertAngkaToHuruf(@NilaiAngka)

    UPDATE AmbilKuliah
    SET NilaiHuruf = @NilaiHuruf
    FROM AmbilKuliah
    JOIN inserted ON AmbilKuliah.NRP = inserted.NRP AND AmbilKuliah.IDMK = inserted.IDMK
END



SELECT*FROM Mahasiswa
SELECT*FROM Dosen
SELECT*FROM Ruang
SELECT*FROM MataKuliah
SELECT*FROM AmbilKuliah
SELECT*FROM Tempat

DELETE FROM AmbilKuliah




