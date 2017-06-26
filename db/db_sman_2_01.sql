-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for si_nilai_sman_2
DROP DATABASE IF EXISTS `si_nilai_sman_2`;
CREATE DATABASE IF NOT EXISTS `si_nilai_sman_2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `si_nilai_sman_2`;

-- Dumping structure for table si_nilai_sman_2.data_ekskul
DROP TABLE IF EXISTS `data_ekskul`;
CREATE TABLE IF NOT EXISTS `data_ekskul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ekskul` int(11) DEFAULT NULL,
  `id_semester` int(11) DEFAULT NULL,
  `nilai_ekskul` varchar(1) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ekskul` (`id_ekskul`),
  KEY `id_semester` (`id_semester`),
  CONSTRAINT `data_ekskul_ibfk_1` FOREIGN KEY (`id_ekskul`) REFERENCES `ref_ekskul` (`id`),
  CONSTRAINT `data_ekskul_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `data_semester` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_nilai_sman_2.data_ekskul: ~0 rows (approximately)
DELETE FROM `data_ekskul`;
/*!40000 ALTER TABLE `data_ekskul` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_ekskul` ENABLE KEYS */;

-- Dumping structure for table si_nilai_sman_2.data_nilai
DROP TABLE IF EXISTS `data_nilai`;
CREATE TABLE IF NOT EXISTS `data_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mata_pelajaran` int(11) DEFAULT NULL,
  `id_semester` int(11) DEFAULT NULL,
  `nilai_pengetahuan` int(11) DEFAULT NULL,
  `nilai_keterampilan` int(11) DEFAULT NULL,
  `predikat_pengetahuan` varchar(1) DEFAULT NULL,
  `predikat_keterampilan` varchar(1) DEFAULT NULL,
  `last_modified` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_mata_pelajaran` (`id_mata_pelajaran`),
  KEY `id_semester` (`id_semester`),
  CONSTRAINT `data_nilai_ibfk_2` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `ref_mata_pelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `data_nilai_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `data_semester` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_nilai_sman_2.data_nilai: ~0 rows (approximately)
DELETE FROM `data_nilai`;
/*!40000 ALTER TABLE `data_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_nilai` ENABLE KEYS */;

-- Dumping structure for table si_nilai_sman_2.data_semester
DROP TABLE IF EXISTS `data_semester`;
CREATE TABLE IF NOT EXISTS `data_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL,
  `penilaian_spiritual` text,
  `penilaian_sosial` text,
  `absen_sakit` int(11) DEFAULT NULL,
  `absen_izin` int(11) DEFAULT NULL,
  `absen_alfa` int(11) DEFAULT NULL,
  `terlambat` int(11) DEFAULT NULL,
  `tahun_ajar_awal` varchar(4) DEFAULT NULL,
  `tahun_ajar_akhir` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `data_semester_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_nilai_sman_2.data_semester: ~0 rows (approximately)
DELETE FROM `data_semester`;
/*!40000 ALTER TABLE `data_semester` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_semester` ENABLE KEYS */;

-- Dumping structure for table si_nilai_sman_2.data_siswa
DROP TABLE IF EXISTS `data_siswa`;
CREATE TABLE IF NOT EXISTS `data_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `nis` varchar(200) DEFAULT NULL,
  `nisn` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_nilai_sman_2.data_siswa: ~0 rows (approximately)
DELETE FROM `data_siswa`;
/*!40000 ALTER TABLE `data_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_siswa` ENABLE KEYS */;

-- Dumping structure for table si_nilai_sman_2.ref_ekskul
DROP TABLE IF EXISTS `ref_ekskul`;
CREATE TABLE IF NOT EXISTS `ref_ekskul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_nilai_sman_2.ref_ekskul: ~0 rows (approximately)
DELETE FROM `ref_ekskul`;
/*!40000 ALTER TABLE `ref_ekskul` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_ekskul` ENABLE KEYS */;

-- Dumping structure for table si_nilai_sman_2.ref_kurikulum
DROP TABLE IF EXISTS `ref_kurikulum`;
CREATE TABLE IF NOT EXISTS `ref_kurikulum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table si_nilai_sman_2.ref_kurikulum: ~2 rows (approximately)
DELETE FROM `ref_kurikulum`;
/*!40000 ALTER TABLE `ref_kurikulum` DISABLE KEYS */;
INSERT INTO `ref_kurikulum` (`id`, `nama`) VALUES
	(1, '< 2013'),
	(2, '2013');
/*!40000 ALTER TABLE `ref_kurikulum` ENABLE KEYS */;

-- Dumping structure for table si_nilai_sman_2.ref_mata_pelajaran
DROP TABLE IF EXISTS `ref_mata_pelajaran`;
CREATE TABLE IF NOT EXISTS `ref_mata_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `kode_mapel` varchar(100) DEFAULT NULL,
  `id_kurikulum` int(11) DEFAULT NULL,
  `kkm_sem_1` int(11) DEFAULT '0',
  `kkm_sem_2` int(11) DEFAULT '0',
  `kkm_sem_3` int(11) DEFAULT '0',
  `kkm_sem_4` int(11) DEFAULT '0',
  `kkm_sem_5` int(11) DEFAULT '0',
  `kkm_sem_6` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_kurikulum` (`id_kurikulum`),
  CONSTRAINT `ref_mata_pelajaran_ibfk_1` FOREIGN KEY (`id_kurikulum`) REFERENCES `ref_kurikulum` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table si_nilai_sman_2.ref_mata_pelajaran: ~2 rows (approximately)
DELETE FROM `ref_mata_pelajaran`;
/*!40000 ALTER TABLE `ref_mata_pelajaran` DISABLE KEYS */;
INSERT INTO `ref_mata_pelajaran` (`id`, `nama`, `kode_mapel`, `id_kurikulum`, `kkm_sem_1`, `kkm_sem_2`, `kkm_sem_3`, `kkm_sem_4`, `kkm_sem_5`, `kkm_sem_6`) VALUES
	(1, 'Inggris', 'ING0013', 1, 0, 0, 0, 0, 0, 0),
	(2, 'Indonesia', 'IND0013', 1, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `ref_mata_pelajaran` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
