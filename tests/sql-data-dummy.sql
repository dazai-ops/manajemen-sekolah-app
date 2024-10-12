-- data mapel
INSERT INTO mapel (mapel_nama, created_at, updated_at) VALUES
('Matematika', NOW(), NOW()),
('Bahasa Indonesia', NOW(), NOW()),
('Bahasa Inggris', NOW(), NOW()),
('Fisika', NOW(), NOW()),
('Kimia', NOW(), NOW()),
('Biologi', NOW(), NOW()),
('Sejarah', NOW(), NOW()),
('Geografi', NOW(), NOW()),
('Ekonomi', NOW(), NOW()),
('Sosiologi', NOW(), NOW());

-- data guru
INSERT INTO guru (
    guru_nama, 
    guru_nip, 
    guru_jenis_kelamin, 
    guru_nomor_telepon, 
    guru_foto, 
    guru_tempat_lahir, 
    guru_tanggal_lahir, 
    guru_alamat, 
    created_at, 
    updated_at
) VALUES
('Ahmad Syarif', '198901011234', '1', '081234567890', NULL, 'Jakarta', '1989-01-01', 'Jl. Merdeka No. 10, Jakarta', NOW(), NOW()),
('Budi Santoso', '198902022345', '1', '081234567891', NULL, 'Bandung', '1990-02-02', 'Jl. Asia Afrika No. 20, Bandung', NOW(), NOW()),
('Cahya Kartika', '198903033456', '0', '081234567892', NULL, 'Surabaya', '1991-03-03', 'Jl. Pahlawan No. 30, Surabaya', NOW(), NOW()),
('Dewi Lestari', '198904044567', '0', '081234567893', NULL, 'Yogyakarta', '1992-04-04', 'Jl. Malioboro No. 40, Yogyakarta', NOW(), NOW()),
('Eko Nugroho', '198905055678', '1', '081234567894', NULL, 'Malang', '1993-05-05', 'Jl. Ijen No. 50, Malang', NOW(), NOW()),
('Fajar Hidayat', '198906066789', '1', '081234567895', NULL, 'Semarang', '1994-06-06', 'Jl. Pemuda No. 60, Semarang', NOW(), NOW()),
('Gita Rahayu', '198907077890', '0', '081234567896', NULL, 'Medan', '1995-07-07', 'Jl. Gatot Subroto No. 70, Medan', NOW(), NOW()),
('Hadi Wijaya', '198908088901', '1', '081234567897', NULL, 'Makassar', '1996-08-08', 'Jl. Urip Sumoharjo No. 80, Makassar', NOW(), NOW()),
('Indah Permata', '198909099012', '0', '081234567898', NULL, 'Denpasar', '1997-09-09', 'Jl. Kuta No. 90, Denpasar', NOW(), NOW()),
('Joko Widodo', '198910101123', '1', '081234567899', NULL, 'Solo', '1998-10-10', 'Jl. Slamet Riyadi No. 100, Solo', NOW(), NOW()),
('Kartika Dewi', '198911111234', '0', '081234567800', NULL, 'Mataram', '1999-11-11', 'Jl. Pejanggik No. 110, Mataram', NOW(), NOW()),
('Lukman Hakim', '198912121345', '1', '081234567801', NULL, 'Palembang', '1980-12-12', 'Jl. Sudirman No. 120, Palembang', NOW(), NOW()),
('Maria Ulfa', '199001011456', '0', '081234567802', NULL, 'Banda Aceh', '1981-01-01', 'Jl. T. Panglima Polem No. 130, Banda Aceh', NOW(), NOW()),
('Nina Melinda', '199002021567', '0', '081234567803', NULL, 'Balikpapan', '1982-02-02', 'Jl. Jendral Sudirman No. 140, Balikpapan', NOW(), NOW()),
('Oki Setiawan', '199003031678', '1', '081234567804', NULL, 'Banjarmasin', '1983-03-03', 'Jl. A. Yani No. 150, Banjarmasin', NOW(), NOW()),
('Prita Sari', '199004041789', '0', '081234567805', NULL, 'Pontianak', '1984-04-04', 'Jl. Gajah Mada No. 160, Pontianak', NOW(), NOW()),
('Qomaruddin', '199005051890', '1', '081234567806', NULL, 'Manado', '1985-05-05', 'Jl. Sam Ratulangi No. 170, Manado', NOW(), NOW()),
('Ratna Dewi', '199006061901', '0', '081234567807', NULL, 'Ambon', '1986-06-06', 'Jl. Pattimura No. 180, Ambon', NOW(), NOW()),
('Sutrisno', '199007071012', '1', '081234567808', NULL, 'Jayapura', '1987-07-07', 'Jl. Yos Sudarso No. 190, Jayapura', NOW(), NOW()),
('Tasya Mutiara', '199008081123', '0', '081234567809', NULL, 'Kupang', '1988-08-08', 'Jl. El Tari No. 200, Kupang', NOW(), NOW());

-- data guru mapel (pivot table)
INSERT INTO guru_mapel (guru_id, mapel_id, created_at, updated_at) VALUES
(1, 1, NOW(), NOW()),
(2, 2, NOW(), NOW()),
(3, 3, NOW(), NOW()),
(4, 4, NOW(), NOW()),
(5, 5, NOW(), NOW()),
(6, 6, NOW(), NOW()),
(7, 7, NOW(), NOW()),
(8, 8, NOW(), NOW()),
(9, 9, NOW(), NOW()),
(10, 10, NOW(), NOW()),
(11, 1, NOW(), NOW()),
(12, 2, NOW(), NOW()),
(13, 3, NOW(), NOW()),
(14, 4, NOW(), NOW()),
(15, 5, NOW(), NOW()),
(16, 6, NOW(), NOW()),
(17, 7, NOW(), NOW()),
(18, 8, NOW(), NOW()),
(19, 9, NOW(), NOW()),
(20, 10, NOW(), NOW()),
(21, 1, NOW(), NOW()),
(22, 2, NOW(), NOW()),
(23, 3, NOW(), NOW()),
(24, 4, NOW(), NOW()),
(25, 5, NOW(), NOW()),
(26, 6, NOW(), NOW()),
(27, 7, NOW(), NOW()),
(28, 8, NOW(), NOW()),
(28, 9, NOW(), NOW()),
(29, 10, NOW(), NOW()),
(29, 1, NOW(), NOW()),
(30, 2, NOW(), NOW()),
(30, 3, NOW(), NOW());


-- data kelas
INSERT INTO kelas (kelas_nama, kelas_guru_wali_id, created_at, updated_at) VALUES
-- Kelas 10 IPA dan IPS
('10 IPA 1', 1, NOW(), NOW()), -- Ahmad Syarif
('10 IPA 2', 2, NOW(), NOW()), -- Budi Santoso
('10 IPA 3', 3, NOW(), NOW()), -- Cahya Kartika
('10 IPA 4', 4, NOW(), NOW()), -- Dewi Lestari
('10 IPS 1', 5, NOW(), NOW()), -- Eko Nugroho
('10 IPS 2', 6, NOW(), NOW()), -- Fajar Hidayat
('10 IPS 3', 7, NOW(), NOW()), -- Gita Rahayu
('10 IPS 4', 8, NOW(), NOW()), -- Hadi Wijaya

-- Kelas 11 IPA dan IPS
('11 IPA 1', 9, NOW(), NOW()), -- Indah Permata
('11 IPA 2', 10, NOW(), NOW()), -- Joko Widodo
('11 IPA 3', 11, NOW(), NOW()), -- Kartika Dewi
('11 IPA 4', 12, NOW(), NOW()), -- Lukman Hakim
('11 IPS 1', 13, NOW(), NOW()), -- Maria Ulfa
('11 IPS 2', 14, NOW(), NOW()), -- Nina Melinda
('11 IPS 3', 15, NOW(), NOW()), -- Oki Setiawan
('11 IPS 4', 16, NOW(), NOW()), -- Prita Sari

-- Kelas 12 IPA dan IPS
('12 IPA 1', 17, NOW(), NOW()), -- Qomaruddin
('12 IPA 2', 18, NOW(), NOW()), -- Ratna Dewi
('12 IPA 3', 19, NOW(), NOW()), -- Sutrisno
('12 IPA 4', 20, NOW(), NOW()), -- Tasya Mutiara
('12 IPS 1', 21, NOW(), NOW()), -- Guru 21
('12 IPS 2', 22, NOW(), NOW()), -- Guru 22
('12 IPS 3', 23, NOW(), NOW()), -- Guru 23
('12 IPS 4', 24, NOW(), NOW()), -- Guru 24

-- Guru yang menjadi wali kelas lebih dari 1 kelas
('10 IPA 5', 25, NOW(), NOW()), -- Guru 25 juga menjadi wali kelas di 10 IPA 5
('10 IPS 5', 25, NOW(), NOW()), -- Guru 25 juga menjadi wali kelas di 10 IPS 5
('11 IPA 5', 26, NOW(), NOW()), -- Guru 26 juga menjadi wali kelas di 11 IPA 5
('11 IPS 5', 26, NOW(), NOW()), -- Guru 26 juga menjadi wali kelas di 11 IPS 5
('12 IPA 5', 27, NOW(), NOW()), -- Guru 27 juga menjadi wali kelas di 12 IPA 5
('12 IPS 5', 27, NOW(), NOW()); -- Guru 27 juga menjadi wali kelas di 12 IPS 5

-- data fasilitas kelas
INSERT INTO fasilitas (fasilitas_nama, created_at, updated_at) VALUES
('Kipas Angin', NOW(), NOW()),
('Meja', NOW(), NOW()),
('Kursi', NOW(), NOW()),
('Papan Tulis', NOW(), NOW()),
('Proyektor', NOW(), NOW()),
('Whiteboard Marker', NOW(), NOW()),
('Ruang Pendingin (AC)', NOW(), NOW()),
('Kabel Listrik', NOW(), NOW()),
('Perpustakaan Mini', NOW(), NOW()),
('Ruang Diskusi', NOW(), NOW());

-- data kelas fasilitas
-- Menambahkan fasilitas meja, kursi, dan papan tulis untuk setiap kelas
-- Misalkan kita memiliki 30 kelas dengan ID dari 1 sampai 30

INSERT INTO kelas_fasilitas (kelas_id, fasilitas_id, created_at, updated_at) VALUES
(1, 1, NOW(), NOW()),  -- Kelas 1 memiliki Kipas Angin
(1, 2, NOW(), NOW()),  -- Kelas 1 memiliki Meja
(1, 3, NOW(), NOW()),  -- Kelas 1 memiliki Kursi
(1, 4, NOW(), NOW()),  -- Kelas 1 memiliki Papan Tulis
(1, 5, NOW(), NOW()),  -- Kelas 1 memiliki Proyektor
(2, 1, NOW(), NOW()),
(2, 2, NOW(), NOW()),
(2, 3, NOW(), NOW()),
(2, 4, NOW(), NOW()),
(2, 5, NOW(), NOW()),
(3, 1, NOW(), NOW()),
(3, 2, NOW(), NOW()),
(3, 3, NOW(), NOW()),
(3, 4, NOW(), NOW()),
(3, 5, NOW(), NOW()),
(4, 1, NOW(), NOW()),
(4, 2, NOW(), NOW()),
(4, 3, NOW(), NOW()),
(4, 4, NOW(), NOW()),
(4, 5, NOW(), NOW()),
(5, 1, NOW(), NOW()),
(5, 2, NOW(), NOW()),
(5, 3, NOW(), NOW()),
(5, 4, NOW(), NOW()),
(5, 5, NOW(), NOW()),
(6, 1, NOW(), NOW()),
(6, 2, NOW(), NOW()),
(6, 3, NOW(), NOW()),
(6, 4, NOW(), NOW()),
(6, 5, NOW(), NOW()),
(7, 1, NOW(), NOW()),
(7, 2, NOW(), NOW()),
(7, 3, NOW(), NOW()),
(7, 4, NOW(), NOW()),
(7, 5, NOW(), NOW()),
(8, 1, NOW(), NOW()),
(8, 2, NOW(), NOW()),
(8, 3, NOW(), NOW()),
(8, 4, NOW(), NOW()),
(8, 5, NOW(), NOW()),
(9, 1, NOW(), NOW()),
(9, 2, NOW(), NOW()),
(9, 3, NOW(), NOW()),
(9, 4, NOW(), NOW()),
(9, 5, NOW(), NOW()),
(10, 1, NOW(), NOW()),
(10, 2, NOW(), NOW()),
(10, 3, NOW(), NOW()),
(10, 4, NOW(), NOW()),
(10, 5, NOW(), NOW()),
(11, 1, NOW(), NOW()),
(11, 2, NOW(), NOW()),
(11, 3, NOW(), NOW()),
(11, 4, NOW(), NOW()),
(11, 5, NOW(), NOW()),
(12, 1, NOW(), NOW()),
(12, 2, NOW(), NOW()),
(12, 3, NOW(), NOW()),
(12, 4, NOW(), NOW()),
(12, 5, NOW(), NOW()),
(13, 1, NOW(), NOW()),
(13, 2, NOW(), NOW()),
(13, 3, NOW(), NOW()),
(13, 4, NOW(), NOW()),
(13, 5, NOW(), NOW()),
(14, 1, NOW(), NOW()),
(14, 2, NOW(), NOW()),
(14, 3, NOW(), NOW()),
(14, 4, NOW(), NOW()),
(14, 5, NOW(), NOW()),
(15, 1, NOW(), NOW()),
(15, 2, NOW(), NOW()),
(15, 3, NOW(), NOW()),
(15, 4, NOW(), NOW()),
(15, 5, NOW(), NOW()),
(16, 1, NOW(), NOW()),
(16, 2, NOW(), NOW()),
(16, 3, NOW(), NOW()),
(16, 4, NOW(), NOW()),
(16, 5, NOW(), NOW()),
(17, 1, NOW(), NOW()),
(17, 2, NOW(), NOW()),
(17, 3, NOW(), NOW()),
(17, 4, NOW(), NOW()),
(17, 5, NOW(), NOW()),
(18, 1, NOW(), NOW()),
(18, 2, NOW(), NOW()),
(18, 3, NOW(), NOW()),
(18, 4, NOW(), NOW()),
(18, 5, NOW(), NOW()),
(19, 1, NOW(), NOW()),
(19, 2, NOW(), NOW()),
(19, 3, NOW(), NOW()),
(19, 4, NOW(), NOW()),
(19, 5, NOW(), NOW()),
(20, 1, NOW(), NOW()),
(20, 2, NOW(), NOW()),
(20, 3, NOW(), NOW()),
(20, 4, NOW(), NOW()),
(20, 5, NOW(), NOW()),
(21, 1, NOW(), NOW()),
(21, 2, NOW(), NOW()),
(21, 3, NOW(), NOW()),
(21, 4, NOW(), NOW()),
(21, 5, NOW(), NOW()),
(22, 1, NOW(), NOW()),
(22, 2, NOW(), NOW()),
(22, 3, NOW(), NOW()),
(22, 4, NOW(), NOW()),
(22, 5, NOW(), NOW()),
(23, 1, NOW(), NOW()),
(23, 2, NOW(), NOW()),
(23, 3, NOW(), NOW()),
(23, 4, NOW(), NOW()),
(23, 5, NOW(), NOW()),
(24, 1, NOW(), NOW()),
(24, 2, NOW(), NOW()),
(24, 3, NOW(), NOW()),
(24, 4, NOW(), NOW()),
(24, 5, NOW(), NOW()),
(25, 1, NOW(), NOW()),
(25, 2, NOW(), NOW()),
(25, 3, NOW(), NOW()),
(25, 4, NOW(), NOW()),
(25, 5, NOW(), NOW()),
(26, 1, NOW(), NOW()),
(26, 2, NOW(), NOW()),
(26, 3, NOW(), NOW()),
(26, 4, NOW(), NOW()),
(26, 5, NOW(), NOW()),
(27, 1, NOW(), NOW()),
(27, 2, NOW(), NOW()),
(27, 3, NOW(), NOW()),
(27, 4, NOW(), NOW()),
(27, 5, NOW(), NOW()),
(28, 1, NOW(), NOW()),
(28, 2, NOW(), NOW()),
(28, 3, NOW(), NOW()),
(28, 4, NOW(), NOW()),
(28, 5, NOW(), NOW()),
(29, 1, NOW(), NOW()),
(29, 2, NOW(), NOW()),
(29, 3, NOW(), NOW()),
(29, 4, NOW(), NOW()),
(29, 5, NOW(), NOW()),
(30, 1, NOW(), NOW()),
(30, 2, NOW(), NOW()),
(30, 3, NOW(), NOW()),
(30, 4, NOW(), NOW()),
(30, 5, NOW(), NOW());

-- data siswa
-- Insert 50 student data
INSERT INTO siswa (siswa_nisn, siswa_nama, siswa_foto, siswa_kelas_id, siswa_tempat_lahir, siswa_tanggal_lahir, siswa_jenis_kelamin, siswa_alamat, siswa_nomor_telepon, created_at, updated_at) VALUES
('123456789012345678', 'Aldi Setiawan', 'foto1.jpg', 1, 'Jakarta', '2007-05-12', '1', 'Jl. Mawar No. 10, Jakarta', '081234567890', NOW(), NOW()),
('234567890123456789', 'Budi Santoso', 'foto2.jpg', 2, 'Bandung', '2008-08-20', '1', 'Jl. Melati No. 20, Bandung', '0813456789123', NOW(), NOW()),
('345678901234567890', 'Cahya Kartika', 'foto3.jpg', 3, 'Surabaya', '2007-11-05', '0', 'Jl. Kenanga No. 30, Surabaya', '08145678901234', NOW(), NOW()),
('456789012345678901', 'Dewi Lestari', 'foto4.jpg', 4, 'Semarang', '2008-01-17', '0', 'Jl. Cempaka No. 40, Semarang', '08156789012345', NOW(), NOW()),
('567890123456789012', 'Eko Nugroho', 'foto5.jpg', 5, 'Yogyakarta', '2007-04-24', '1', 'Jl. Dahlia No. 50, Yogyakarta', '0816789012345', NOW(), NOW()),
('678901234567890123', 'Fajar Hidayat', 'foto6.jpg', 6, 'Malang', '2008-07-30', '1', 'Jl. Anggrek No. 60, Malang', '08178901234567', NOW(), NOW()),
('789012345678901234', 'Gita Rahayu', 'foto7.jpg', 7, 'Medan', '2007-03-18', '0', 'Jl. Mawar No. 70, Medan', '08189012345678', NOW(), NOW()),
('890123456789012345', 'Hadi Wijaya', 'foto8.jpg', 8, 'Makassar', '2008-06-11', '1', 'Jl. Melati No. 80, Makassar', '0820123456789', NOW(), NOW()),
('901234567890123456', 'Indah Permata', 'foto9.jpg', 9, 'Palembang', '2007-09-09', '0', 'Jl. Kenanga No. 90, Palembang', '082134567890', NOW(), NOW()),
('012345678901234567', 'Joko Widodo', 'foto10.jpg', 10, 'Pontianak', '2008-12-22', '1', 'Jl. Cempaka No. 100, Pontianak', '0823456789012', NOW(), NOW()),
('112345678901234567', 'Kartika Dewi', 'foto11.jpg', 11, 'Jakarta', '2007-10-15', '0', 'Jl. Mawar No. 110, Jakarta', '08245678901234', NOW(), NOW()),
('212345678901234567', 'Lukman Hakim', 'foto12.jpg', 12, 'Bandung', '2008-05-25', '1', 'Jl. Melati No. 120, Bandung', '08256789012345', NOW(), NOW()),
('312345678901234567', 'Maria Ulfa', 'foto13.jpg', 13, 'Surabaya', '2007-02-14', '0', 'Jl. Kenanga No. 130, Surabaya', '0826789012345', NOW(), NOW()),
('412345678901234567', 'Nina Melinda', 'foto14.jpg', 14, 'Semarang', '2008-08-08', '0', 'Jl. Cempaka No. 140, Semarang', '08278901234567', NOW(), NOW()),
('512345678901234567', 'Oki Setiawan', 'foto15.jpg', 15, 'Yogyakarta', '2007-12-19', '1', 'Jl. Dahlia No. 150, Yogyakarta', '08289012345678', NOW(), NOW()),
('612345678901234567', 'Prita Sari', 'foto16.jpg', 16, 'Malang', '2008-03-03', '0', 'Jl. Anggrek No. 160, Malang', '0830123456789', NOW(), NOW()),
('712345678901234567', 'Qomaruddin', 'foto17.jpg', 17, 'Medan', '2007-06-27', '1', 'Jl. Mawar No. 170, Medan', '083123456789', NOW(), NOW()),
('812345678901234567', 'Ratna Dewi', 'foto18.jpg', 18, 'Makassar', '2008-10-10', '0', 'Jl. Melati No. 180, Makassar', '083234567890', NOW(), NOW()),
('912345678901234567', 'Sutrisno', 'foto19.jpg', 19, 'Palembang', '2007-01-01', '1', 'Jl. Kenanga No. 190, Palembang', '0833456789012', NOW(), NOW()),
('013456789012345678', 'Tasya Mutiara', 'foto20.jpg', 20, 'Pontianak', '2008-07-14', '0', 'Jl. Cempaka No. 200, Pontianak', '08345678901234', NOW(), NOW()),

-- Insert the next 30 students
('023456789012345678', 'Usman Firdaus', 'foto21.jpg', 1, 'Jakarta', '2008-09-21', '1', 'Jl. Mawar No. 210, Jakarta', '08356789012345', NOW(), NOW()),
('033456789012345678', 'Vina Lestari', 'foto22.jpg', 2, 'Bandung', '2007-06-02', '0', 'Jl. Melati No. 220, Bandung', '0836789012345', NOW(), NOW()),
('043456789012345678', 'Wahyu Ramadhan', 'foto23.jpg', 3, 'Surabaya', '2008-04-09', '1', 'Jl. Kenanga No. 230, Surabaya', '08378901234567', NOW(), NOW()),
('053456789012345678', 'Xena Pratama', 'foto24.jpg', 4, 'Semarang', '2007-11-12', '0', 'Jl. Cempaka No. 240, Semarang', '08389012345678', NOW(), NOW()),
('063456789012345678', 'Yoga Wibisono', 'foto25.jpg', 5, 'Yogyakarta', '2008-01-30', '1', 'Jl. Dahlia No. 250, Yogyakarta', '0840123456789', NOW(), NOW()),
('073456789012345678', 'Zahra Nuraini', 'foto26.jpg', 6, 'Malang', '2007-07-18', '0', 'Jl. Anggrek No. 260, Malang', '084123456789', NOW(), NOW()),
('083456789012345678', 'Arman Fadhil', 'foto27.jpg', 7, 'Medan', '2008-02-25', '1', 'Jl. Mawar No. 270, Medan', '084234567890', NOW(), NOW()),
('093456789012345678', 'Bela Putri', 'foto28.jpg', 8, 'Makassar', '2007-08-07', '0', 'Jl. Melati No. 280, Makassar', '0843456789012', NOW(), NOW()),
('103456789012345678', 'Citra Amelia', 'foto29.jpg', 9, 'Palembang', '2008-05-03', '0', 'Jl. Kenanga No. 290, Palembang', '08445678901234', NOW(), NOW()),
('113456789012345678', 'Doni Pratama', 'foto30.jpg', 10, 'Pontianak', '2007-03-20', '1', 'Jl. Cempaka No. 300, Pontianak', '08456789012345', NOW(), NOW()),
('123456789012345679', 'Elisa Fatimah', 'foto31.jpg', 11, 'Jakarta', '2008-11-29', '0', 'Jl. Mawar No. 310, Jakarta', '0846789012345', NOW(), NOW()),
('133456789012345678', 'Fauzi Ramdhan', 'foto32.jpg', 12, 'Bandung', '2007-09-10', '1', 'Jl. Melati No. 320, Bandung', '08478901234567', NOW(), NOW()),
('143456789012345678', 'Gilang Saputra', 'foto33.jpg', 13, 'Surabaya', '2008-12-08', '1', 'Jl. Kenanga No. 330, Surabaya', '08489012345678', NOW(), NOW()),
('153456789012345678', 'Hanna Rahma', 'foto34.jpg', 14, 'Semarang', '2007-04-13', '0', 'Jl. Cempaka No. 340, Semarang', '0850123456789', NOW(), NOW()),
('163456789012345678', 'Imam Bukhori', 'foto35.jpg', 15, 'Yogyakarta', '2008-02-14', '1', 'Jl. Dahlia No. 350, Yogyakarta', '085123456789', NOW(), NOW()),
('173456789012345678', 'Julius Ramli', 'foto36.jpg', 16, 'Malang', '2007-11-01', '1', 'Jl. Anggrek No. 360, Malang', '085234567890', NOW(), NOW()),
('183456789012345678', 'Karina Ayu', 'foto37.jpg', 17, 'Medan', '2008-03-11', '0', 'Jl. Mawar No. 370, Medan', '0853456789012', NOW(), NOW()),
('193456789012345678', 'Laras Pratiwi', 'foto38.jpg', 18, 'Makassar', '2007-07-30', '0', 'Jl. Melati No. 380, Makassar', '08545678901234', NOW(), NOW()),
('203456789012345678', 'Miko Setiawan', 'foto39.jpg', 19, 'Palembang', '2008-10-15', '1', 'Jl. Kenanga No. 390, Palembang', '08556789012345', NOW(), NOW()),
('213456789012345678', 'Nina Sari', 'foto40.jpg', 20, 'Pontianak', '2007-05-12', '0', 'Jl. Cempaka No. 400, Pontianak', '0856789012345', NOW(), NOW()),
('223456789012345678', 'Oscar Nugroho', 'foto41.jpg', 1, 'Jakarta', '2008-12-22', '1', 'Jl. Mawar No. 410, Jakarta', '08578901234567', NOW(), NOW()),
('233456789012345678', 'Putri Anggraeni', 'foto42.jpg', 2, 'Bandung', '2007-10-08', '0', 'Jl. Melati No. 420, Bandung', '08589012345678', NOW(), NOW()),
('243456789012345678', 'Qiana Maharani', 'foto43.jpg', 3, 'Surabaya', '2008-03-19', '0', 'Jl. Kenanga No. 430, Surabaya', '0860123456789', NOW(), NOW()),
('253456789012345678', 'Rafi Darmawan', 'foto44.jpg', 4, 'Semarang', '2007-09-27', '1', 'Jl. Cempaka No. 440, Semarang', '086123456789', NOW(), NOW()),
('263456789012345678', 'Satria Bima', 'foto45.jpg', 5, 'Yogyakarta', '2008-01-18', '1', 'Jl. Dahlia No. 450, Yogyakarta', '086234567890', NOW(), NOW()),
('273456789012345678', 'Tina Lestari', 'foto46.jpg', 6, 'Malang', '2007-11-04', '0', 'Jl. Anggrek No. 460, Malang', '0863456789012', NOW(), NOW()),
('283456789012345678', 'Umar Zulfikar', 'foto47.jpg', 7, 'Medan', '2008-06-29', '1', 'Jl. Mawar No. 470, Medan', '08645678901234', NOW(), NOW()),
('293456789012345678', 'Vania Putri', 'foto48.jpg', 8, 'Makassar', '2007-05-05', '0', 'Jl. Melati No. 480, Makassar', '08656789012345', NOW(), NOW()),
('303456789012345678', 'Winda Rahmawati', 'foto49.jpg', 9, 'Palembang', '2008-07-23', '0', 'Jl. Kenanga No. 490, Palembang', '0866789012345', NOW(), NOW()),
('313456789012345678', 'Yusuf Priyanto', 'foto50.jpg', 10, 'Pontianak', '2007-12-30', '1', 'Jl. Cempaka No. 500, Pontianak', '08678901234567', NOW(), NOW());

-- data list mapel (tabel pivot)
INSERT INTO jadwal_list (kelas_id, guru_id, mapel_id, hari, jam_mulai, jam_selesai)
VALUES
-- Kelas 1: Senin sampai Jumat
(1, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(1, 2, 2, 'Senin', '08:00:00', '09:00:00'),
(1, 3, 3, 'Senin', '09:00:00', '10:00:00'),
(1, 4, 4, 'Selasa', '07:00:00', '08:00:00'),
(1, 5, 5, 'Selasa', '08:00:00', '09:00:00'),
(1, 6, 6, 'Selasa', '09:00:00', '10:00:00'),
(1, 7, 7, 'Rabu', '07:00:00', '08:00:00'),
(1, 8, 8, 'Rabu', '08:00:00', '09:00:00'),
(1, 9, 9, 'Rabu', '09:00:00', '10:00:00'),
(1, 10, 10, 'Kamis', '07:00:00', '08:00:00'),
(1, 11, 11, 'Kamis', '08:00:00', '09:00:00'),
(1, 12, 12, 'Kamis', '09:00:00', '10:00:00'),
(1, 13, 13, 'Jumat', '07:00:00', '08:00:00'),
(1, 14, 14, 'Jumat', '08:00:00', '09:00:00'),
(1, 15, 15, 'Jumat', '09:00:00', '10:00:00'),

-- Kelas 2: Senin sampai Jumat
(2, 16, 16, 'Senin', '07:00:00', '08:00:00'),
(2, 17, 17, 'Senin', '08:00:00', '09:00:00'),
(2, 18, 18, 'Senin', '09:00:00', '10:00:00'),
(2, 19, 19, 'Selasa', '07:00:00', '08:00:00'),
(2, 20, 20, 'Selasa', '08:00:00', '09:00:00'),
(2, 21, 21, 'Selasa', '09:00:00', '10:00:00'),
(2, 22, 22, 'Rabu', '07:00:00', '08:00:00'),
(2, 23, 23, 'Rabu', '08:00:00', '09:00:00'),
(2, 24, 24, 'Rabu', '09:00:00', '10:00:00'),
(2, 25, 25, 'Kamis', '07:00:00', '08:00:00'),
(2, 26, 26, 'Kamis', '08:00:00', '09:00:00'),
(2, 27, 27, 'Kamis', '09:00:00', '10:00:00'),
(2, 28, 28, 'Jumat', '07:00:00', '08:00:00'),
(2, 29, 29, 'Jumat', '08:00:00', '09:00:00'),
(2, 30, 30, 'Jumat', '09:00:00', '10:00:00'),

-- Kelas 3: Senin sampai Jumat
(3, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(3, 2, 2, 'Senin', '08:00:00', '09:00:00'),
(3, 3, 3, 'Senin', '09:00:00', '10:00:00'),
(3, 4, 4, 'Selasa', '07:00:00', '08:00:00'),
(3, 5, 5, 'Selasa', '08:00:00', '09:00:00'),
(3, 6, 6, 'Selasa', '09:00:00', '10:00:00'),
(3, 7, 7, 'Rabu', '07:00:00', '08:00:00'),
(3, 8, 8, 'Rabu', '08:00:00', '09:00:00'),
(3, 9, 9, 'Rabu', '09:00:00', '10:00:00'),
(3, 10, 10, 'Kamis', '07:00:00', '08:00:00'),
(3, 11, 11, 'Kamis', '08:00:00', '09:00:00'),
(3, 12, 12, 'Kamis', '09:00:00', '10:00:00'),
(3, 13, 13, 'Jumat', '07:00:00', '08:00:00'),
(3, 14, 14, 'Jumat', '08:00:00', '09:00:00'),
(3, 15, 15, 'Jumat', '09:00:00', '10:00:00');

-- data post
INSERT INTO post (post_status, post_title, post_body, post_excerpt, post_slug, post_author, post_image, created_at, updated_at)
VALUES
-- Post 1: Prestasi Sekolah
(1, 'Prestasi Lomba Sains Tingkat Nasional', 
'SMAN 1 Boyolangu meraih juara pertama dalam Lomba Sains Nasional tahun 2024. Prestasi ini menjadi bukti nyata kualitas pendidikan yang ada di sekolah kami.',
'SMAN 1 Boyolangu meraih juara pertama dalam Lomba Sains Nasional tahun 2024.', 
'prestasi-lomba-sains-tingkat-nasional', 'admin', 'prestasi_sains.jpg', NOW(), NOW()),

-- Post 2: Informasi Ujian Akhir
(1, 'Jadwal Ujian Akhir Semester Genap', 
'Ujian akhir semester genap akan dilaksanakan mulai tanggal 10 Desember hingga 20 Desember. Para siswa diharapkan untuk mempersiapkan diri dengan baik.',
'Ujian akhir semester genap akan dilaksanakan mulai tanggal 10 Desember hingga 20 Desember.', 
'jadwal-ujian-akhir-semester-genap', 'admin', 'ujian_akhir.jpg', NOW(), NOW()),

-- Post 3: Pendaftaran Siswa Baru
(1, 'Pendaftaran Siswa Baru Tahun 2024 Dibuka', 
'SMAN 1 Boyolangu telah membuka pendaftaran untuk calon siswa baru tahun ajaran 2024/2025. Informasi lebih lanjut dapat dilihat di website resmi sekolah.',
'Pendaftaran siswa baru tahun ajaran 2024/2025 telah dibuka.', 
'pendaftaran-siswa-baru-2024', 'admin', 'pendaftaran_siswa.jpg', NOW(), NOW()),

-- Post 4: Kegiatan Ekstrakurikuler
(1, 'Kegiatan Ekstrakurikuler Bulan Desember', 
'Di bulan Desember, kami akan mengadakan berbagai kegiatan ekstrakurikuler untuk meningkatkan keterampilan siswa. Semua siswa diharapkan untuk ikut berpartisipasi.',
'Kegiatan ekstrakurikuler di bulan Desember akan diadakan.', 
'kegiatan-ekstrakurikuler-bulan-desember', 'admin', 'ekstrakurikuler.jpg', NOW(), NOW()),

-- Post 5: Pengumuman Libur Sekolah
(1, 'Pengumuman Libur Sekolah', 
'Sekolah akan libur selama 2 minggu mulai tanggal 24 Desember hingga 7 Januari. Selamat berlibur!',
'Sekolah akan libur selama 2 minggu mulai tanggal 24 Desember.', 
'pengumuman-libur-sekolah', 'admin', 'libur_sekolah.jpg', NOW(), NOW()),

-- Post 6: Prestasi Olahraga
(1, 'Prestasi Tim Sepak Bola', 
'Tim sepak bola SMAN 1 Boyolangu berhasil meraih juara kedua dalam turnamen sepak bola antar sekolah. Selamat untuk semua pemain!',
'Tim sepak bola berhasil meraih juara kedua dalam turnamen.', 
'prestasi-tim-sepak-bola', 'admin', 'prestasi_sepak_bola.jpg', NOW(), NOW()),

-- Post 7: Workshop Pendidikan
(1, 'Workshop Pendidikan untuk Orang Tua', 
'Kami akan mengadakan workshop untuk orang tua siswa pada tanggal 5 Januari 2025. Tema workshop adalah "Mendukung Pembelajaran Anak di Rumah".',
'Workshop untuk orang tua siswa akan diadakan pada tanggal 5 Januari.', 
'workshop-pendidikan-untuk-orang-tua', 'admin', 'workshop.jpg', NOW(), NOW()),

-- Post 8: Informasi Beasiswa
(1, 'Informasi Beasiswa Tahun 2024', 
'Sekolah menyediakan berbagai beasiswa untuk siswa berprestasi. Pendaftaran dibuka mulai 1 Januari hingga 31 Maret.',
'Informasi beasiswa untuk siswa berprestasi dibuka.', 
'informasi-beasiswa-tahun-2024', 'admin', 'beasiswa.jpg', NOW(), NOW()),

-- Post 9: Kegiatan Bakti Sosial
(1, 'Kegiatan Bakti Sosial Siswa', 
'Siswa SMAN 1 Boyolangu akan mengadakan kegiatan bakti sosial di panti asuhan pada tanggal 15 Januari. Mari berpartisipasi untuk membantu sesama.',
'Kegiatan bakti sosial di panti asuhan akan diadakan.', 
'kegiatan-bakti-sosial', 'admin', 'bakti_sosial.jpg', NOW(), NOW()),

-- Post 10: Pengumuman Kelulusan
(1, 'Pengumuman Kelulusan Siswa', 
'Kami dengan bangga mengumumkan bahwa semua siswa kelas 12 SMAN 1 Boyolangu dinyatakan lulus tahun ajaran 2024. Selamat untuk semua!',
'Semua siswa kelas 12 dinyatakan lulus tahun ajaran 2024.', 
'pengumuman-kelulusan', 'admin', 'kelulusan.jpg', NOW(), NOW());

-- data tag
INSERT INTO tag (tag_nama, created_at, updated_at)
VALUES
-- Tag 1: Prestasi
('Prestasi', NOW(), NOW()),

-- Tag 2: Ujian
('Ujian', NOW(), NOW()),

-- Tag 3: Pendaftaran
('Pendaftaran', NOW(), NOW()),

-- Tag 4: Ekstrakurikuler
('Ekstrakurikuler', NOW(), NOW()),

-- Tag 5: Libur
('Libur', NOW(), NOW()),

-- Tag 6: Kegiatan Sosial
('Kegiatan Sosial', NOW(), NOW()),

-- Tag 7: Beasiswa
('Beasiswa', NOW(), NOW());

-- data post tag
INSERT INTO post_tag (post_id, tag_id, created_at, updated_at) VALUES
-- Post 1
(1, 1, NOW(), NOW()), -- Prestasi
(1, 2, NOW(), NOW()), -- Ujian

-- Post 2
(2, 1, NOW(), NOW()), -- Prestasi
(2, 3, NOW(), NOW()), -- Pendaftaran

-- Post 3
(3, 4, NOW(), NOW()), -- Ekstrakurikuler
(3, 5, NOW(), NOW()), -- Libur

-- Post 4
(4, 1, NOW(), NOW()), -- Prestasi
(4, 6, NOW(), NOW()), -- Kegiatan Sosial

-- Post 5
(5, 2, NOW(), NOW()), -- Ujian
(5, 7, NOW(), NOW()), -- Beasiswa

-- Post 6
(6, 3, NOW(), NOW()), -- Pendaftaran
(6, 4, NOW(), NOW()), -- Ekstrakurikuler

-- Post 7
(7, 5, NOW(), NOW()), -- Libur
(7, 6, NOW(), NOW()), -- Kegiatan Sosial

-- Post 8
(8, 1, NOW(), NOW()), -- Prestasi
(8, 7, NOW(), NOW()), -- Beasiswa

-- Post 9
(9, 2, NOW(), NOW()), -- Ujian
(9, 3, NOW(), NOW()), -- Pendaftaran

-- Post 10
(10, 4, NOW(), NOW()), -- Ekstrakurikuler
(10, 5, NOW(), NOW()); -- Libur

