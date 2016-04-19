-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2016 at 11:08 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `si_nilai_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas`
--

CREATE TABLE IF NOT EXISTS `detail_kelas` (
  `id_kelas` int(11) DEFAULT NULL,
  `nisn` char(20) DEFAULT NULL,
  KEY `id_kelas` (`id_kelas`),
  KEY `nisn` (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_mapel`
--

CREATE TABLE IF NOT EXISTS `detail_mapel` (
  `nisn` char(20) DEFAULT NULL,
  `kode_mapel` char(12) DEFAULT NULL,
  KEY `nisn` (`nisn`),
  KEY `kode_mapel` (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajar`
--

CREATE TABLE IF NOT EXISTS `detail_pengajar` (
  `nik` char(20) DEFAULT NULL,
  `kode_mapel` char(12) DEFAULT NULL,
  KEY `nik` (`nik`),
  KEY `kode_mapel` (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nik` char(20) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik_wali` char(20) DEFAULT NULL,
  `tingkat` int(2) DEFAULT NULL,
  `jurusan` varchar(6) DEFAULT NULL,
  `nomor_kelas` int(2) DEFAULT NULL,
  `tahun_ajar` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `kode_mapel` char(12) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `nisn` char(20) DEFAULT NULL,
  `kode_mapel` char(20) DEFAULT NULL,
  `pengetahuan` int(3) DEFAULT NULL,
  `keterampilan` int(3) DEFAULT NULL,
  `sosial` int(3) DEFAULT NULL,
  `deskr_pengetahuan` varchar(512) DEFAULT NULL,
  `deskr_keterampilan` varchar(512) DEFAULT NULL,
  `deskr_sosial` varchar(512) DEFAULT NULL,
  KEY `nisn` (`nisn`),
  KEY `kode_mapel` (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nisn` char(20) NOT NULL DEFAULT '',
  `nis` char(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD CONSTRAINT `detail_kelas_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `detail_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `detail_mapel`
--
ALTER TABLE `detail_mapel`
  ADD CONSTRAINT `detail_mapel_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`),
  ADD CONSTRAINT `detail_mapel_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  ADD CONSTRAINT `detail_pengajar_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`),
  ADD CONSTRAINT `detail_pengajar_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `guru` (`nik`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`),
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
