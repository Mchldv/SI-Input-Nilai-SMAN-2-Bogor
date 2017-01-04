-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2016 at 08:50 AM
-- Server version: 5.6.14
-- PHP Version: 5.6.21

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

--
-- Dumping data for table `detail_kelas`
--

INSERT INTO `detail_kelas` (`id_kelas`, `nisn`) VALUES
(1, 'NISN0000000000000001'),
(3, 'NISN0000000000000002'),
(1, 'NISN0000000000000003');

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

--
-- Dumping data for table `detail_mapel`
--

INSERT INTO `detail_mapel` (`nisn`, `kode_mapel`) VALUES
('NISN0000000000000001', 'IPA000000001'),
('NISN0000000000000002', 'IPS000000002'),
('NISN0000000000000003', 'IPA000000001');

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

--
-- Dumping data for table `detail_pengajar`
--

INSERT INTO `detail_pengajar` (`nik`, `kode_mapel`) VALUES
('00000000000000000001', 'IPA000000001'),
('00000000000000000002', 'IPS000000002');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nik` char(20) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nik`, `nama`) VALUES
('00000000000000000001', 'Amira Amore'),
('00000000000000000002', 'Marina Merene'),
('00000000000000000003', 'Madara Madura'),
('00000000000000000004', 'Ngik Ngok'),
('00000000000000000005', 'Kambing Congek'),
('00000000000000000006', 'Paus Beluga'),
('00000000000000000007', 'Babi Lepas');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nik_wali`, `tingkat`, `jurusan`, `nomor_kelas`, `tahun_ajar`) VALUES
(1, '00000000000000000001', 10, 'IPA', 1, '2015/2016'),
(2, '00000000000000000002', 10, 'IPA', 2, '2015/2016'),
(3, '00000000000000000003', 10, 'IPS', 1, '2015/2016'),
(4, '00000000000000000004', 10, 'IPS', 2, '2015/2016'),
(5, '00000000000000000005', 10, 'IPA', 3, '2015/2016'),
(7, '00000000000000000006', 10, 'IPS', 3, '2015/2016'),
(8, '00000000000000000007', 12, 'IPS', 1, '2015/2016');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `kode_mapel` char(12) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama`) VALUES
('IPA000000001', 'Matematika'),
('IPA000000003', 'Kimia'),
('IPA000000004', 'Biologi'),
('IPA000000007', 'Fisika'),
('IPS000000002', 'Sejarah'),
('IPS000000005', 'Ekonomi'),
('IPS000000006', 'Geografi');

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
-- Stand-in structure for view `readable_kelas`
--
CREATE TABLE IF NOT EXISTS `readable_kelas` (
`id` int(11)
,`jurusan` varchar(6)
,`nomor_kelas` int(2)
,`nik_wali_kelas` char(20)
,`wali_kelas` varchar(50)
,`tahun_ajar` varchar(9)
,`tingkat` int(2)
);
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
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`) VALUES
('NISN0000000000000001', 'NIS00000000000000001', 'Dendeng Empuk'),
('NISN0000000000000002', 'NIS00000000000000002', 'Upil Asin'),
('NISN0000000000000003', 'NIS00000000000000003', 'Panu Onta'),
('NISN0000000000000004', 'NIS00000000000000004', 'Kadal Afrika');

-- --------------------------------------------------------

--
-- Structure for view `readable_kelas`
--
DROP TABLE IF EXISTS `readable_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `readable_kelas` AS select `kelas`.`id` AS `id`,`kelas`.`jurusan` AS `jurusan`,`kelas`.`nomor_kelas` AS `nomor_kelas`,`guru`.`nik` AS `nik_wali_kelas`,`guru`.`nama` AS `wali_kelas`,`kelas`.`tahun_ajar` AS `tahun_ajar`,`kelas`.`tingkat` AS `tingkat` from (`kelas` join `guru`) where (`kelas`.`nik_wali` = `guru`.`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD CONSTRAINT `detail_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `detail_kelas_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `detail_mapel`
--
ALTER TABLE `detail_mapel`
  ADD CONSTRAINT `detail_mapel_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `detail_mapel_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Constraints for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  ADD CONSTRAINT `detail_pengajar_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `guru` (`nik`),
  ADD CONSTRAINT `detail_pengajar_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
