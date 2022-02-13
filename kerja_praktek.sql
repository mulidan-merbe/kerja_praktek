-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 07:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja_praktek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id_admin` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `No_identitas` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id_admin`, `Nama`, `No_identitas`, `Password`, `Status`) VALUES
(1, 'admin', '123', 'admin', '2'),
(2, 'ketua jurusan', '1234567890', '$2y$10$Lyn5MXlWrRN2LjmEwi6K/e14wdJ1w7I5Om0QQTvdgpOgI3dLrKOg6', '1'),
(3, 'admin', '11111', '$2y$10$2Z2lB58lxXcJT0bXytRfjuKg.G0uXLX/Ttg8wvVlYhxEMd.TMxJDO', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `Id_dosen` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`Id_dosen`, `Username`, `NIP`, `Password`) VALUES
(123, 'Pak Dosen', '987654321', '$2y$10$Ar1Awc2E56Jh72BhMZEJFO612Ec/OWPmx53gqqGgNK6H0MJZ.Kq7S'),
(124, 'dosen321', '12121212', 'dosen321');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpdua`
--

CREATE TABLE `tbl_kpdua` (
  `Id_Kpdua` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `File` varchar(255) NOT NULL,
  `Tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpdua`
--

INSERT INTO `tbl_kpdua` (`Id_Kpdua`, `NIM`, `File`, `Tanggal`) VALUES
(17, 'D1041151007', '38-81-1-SM1.pdf', '2020-08-24'),
(21, '6701174119', '5285-14611-1-PB.pdf', '2021-01-07'),
(23, 'D111111111', 'Frame_1.pdf', '2021-02-28'),
(24, 'D1041151001', 'file_pendaftaran.pdf', '2021-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpdua_a`
--

CREATE TABLE `tbl_kpdua_a` (
  `Id_duaA` int(11) NOT NULL,
  `Id_proposal` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Tema` varchar(255) NOT NULL,
  `Uraian` varchar(255) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `File` varchar(255) NOT NULL,
  `Berkas` varchar(255) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpdua_a`
--

INSERT INTO `tbl_kpdua_a` (`Id_duaA`, `Id_proposal`, `NIM`, `Tema`, `Uraian`, `NIP`, `File`, `Berkas`, `Status`, `Tanggal`) VALUES
(30, 196, 'D1041151007', 'KONSUL SIDANG', 'lkj', '987654321', 'Pelaksanaan_Kerja_Praktek_2019-2020_(1)2.pdf', 'Pelaksanaan_Kerja_Praktek_2019-2020_(1)2.pdf', '2', '2020-08-03'),
(31, 196, 'D1041151007', 'konsul keenam', 'aaaaa', '987654321', 'Pelaksanaan_Kerja_Praktek_2019-2020_(1)3.pdf', 'Pelaksanaan_Kerja_Praktek_2019-2020_(1)3.pdf', '2', '2020-08-03'),
(32, 196, 'D1041151007', 'konsul keenam', 'm', '987654321', 'ktm3.pdf', 'ktm3.pdf', '2', '2020-08-03'),
(34, 196, 'D1041151007', 'konsul kedua', 'wewe', '987654321', '1042-Article_Text-1950-1-10-20181114.pdf', '1042-Article_Text-1950-1-10-20181114.pdf', '2', '2020-08-07'),
(35, 0, '6701174119', 'konsul pertama', 'pertama', '987654321', 'doc.pdf', 'doc.pdf', '2', '2020-08-08'),
(36, 0, '6701174119', 'konsul kedua', 'kedua', '987654321', 'SOP_Kerja_Praktek.pdf', 'SOP_Kerja_Praktek.pdf', '2', '2020-08-08'),
(37, 0, '6701174119', 'konsul ketiga', 'ketiga', '987654321', 'SOP_Kerja_Praktek1.pdf', 'SOP_Kerja_Praktek1.pdf', '2', '2020-08-08'),
(38, 0, '6701174119', 'kosul keempat', 'keempat', '987654321', 'SOP_Kerja_Praktek2.pdf', 'SOP_Kerja_Praktek2.pdf', '2', '2020-08-08'),
(39, 0, '6701174119', 'konsul kelima', 'kelima', '987654321', 'BELAJAR_BAHASA_ARAB_DARI_NOL.pdf', 'BELAJAR_BAHASA_ARAB_DARI_NOL.pdf', '2', '2020-08-08'),
(45, 1, 'D111111111', 'konsul kedua', 'konsul kedua', '987654321', 'ktm7.pdf', 'ktm6.pdf', '2', '2020-12-01'),
(47, 196, 'D1041151007', 'BAB Vi', 'terakhirrr', '987654321', 'WhatsApp_Image_2021-02-01_at_13_58_33-removebg-preview.pdf', '', '2', '2021-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpdua_b`
--

CREATE TABLE `tbl_kpdua_b` (
  `Id_duaB` int(11) NOT NULL,
  `Id_pembimbing` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Tema` varchar(255) NOT NULL,
  `Uraian` varchar(255) NOT NULL,
  `No_identitas` varchar(50) NOT NULL,
  `File` varchar(255) NOT NULL,
  `Masukkan` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpdua_b`
--

INSERT INTO `tbl_kpdua_b` (`Id_duaB`, `Id_pembimbing`, `NIM`, `Tema`, `Uraian`, `No_identitas`, `File`, `Masukkan`, `Status`, `Tanggal`) VALUES
(30, 23, 'D1041151007', 'satu', 'aaa', '123', '148-1-691-1-10-20170908.pdf', '', '2', '2021-06-01'),
(31, 23, 'D1041151007', 'konsul kedua', 'qwe', '123', 'BELAJAR_BAHASA_ARAB_DARI_NOL.pdf', '', '2', '2021-06-09'),
(32, 23, 'D1041151007', 'revisi', 'asdasdasd', '123', 'BAB_II.pdf', '', '2', '2021-06-01'),
(33, 0, '6701174119', 'satu', 'asdasdasd', '123', '38-81-1-SM1.pdf', '', '1', '0000-00-00'),
(35, 0, 'D111111111', 'konsul pertama', 'konsul pertama', '11111', '1443-Article_Text-2836-1-10-20190830_(1).pdf', '', '1', '2020-11-29'),
(36, 23, 'D1041151007', 'konsultasi', 'konsultasi', '123', 'ktm.pdf', '', '1', '2020-12-22'),
(37, 23, 'D1041151007', 'konsultasi', 'konsultasi 2', '123', 'ktm1.pdf', '', '1', '2020-12-22'),
(38, 23, 'D1041151007', 'BAB V', 'as', '123', 'WhatsApp_Image_2021-02-01_at_13_58_33-removebg-preview.pdf', '', '2', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpdua_c`
--

CREATE TABLE `tbl_kpdua_c` (
  `Id_duaC` int(11) NOT NULL,
  `No_identitas` varchar(30) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Nilai_satu` varchar(20) NOT NULL,
  `Nilai_dua` varchar(20) NOT NULL,
  `Nilai_tiga` varchar(20) NOT NULL,
  `Nilai_empat` varchar(20) NOT NULL,
  `Nilai_lima` varchar(20) NOT NULL,
  `Nilai_total` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpdua_c`
--

INSERT INTO `tbl_kpdua_c` (`Id_duaC`, `No_identitas`, `NIM`, `Nilai_satu`, `Nilai_dua`, `Nilai_tiga`, `Nilai_empat`, `Nilai_lima`, `Nilai_total`, `Tanggal`) VALUES
(1, '123', '6701174119', '100', '100', '100', '100', '90', '', '2020-09-26'),
(2, '123', 'D1041151007', '50', '100', '100', '100', '100', '', '2020-09-26'),
(3, '123', '6701174119', '100', '100', '100', '100', '100', '', '2020-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpempat`
--

CREATE TABLE `tbl_kpempat` (
  `Id_Kpempat` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `No_identitas` varchar(30) NOT NULL,
  `Hari` varchar(30) NOT NULL,
  `Tanggal_seminar` date NOT NULL,
  `Waktu` varchar(30) NOT NULL,
  `Ruangan` varchar(100) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpempat`
--

INSERT INTO `tbl_kpempat` (`Id_Kpempat`, `NIM`, `NIP`, `No_identitas`, `Hari`, `Tanggal_seminar`, `Waktu`, `Ruangan`, `Tanggal`) VALUES
(2, 'D1041151007', '987654321', '123', 'Selasa', '2020-08-05', '08.00', 'Ruang Sidang', '2020-08-04'),
(4, '6701174119', '987654321', '123', 'Jumat', '2020-08-14', '12.00', 'Kelas A', '2021-01-07'),
(6, 'D1041151001', '987654321', '1234', 'Senin', '2021-06-08', '08.00', 'Ruang Sidang', '2021-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpempat_a`
--

CREATE TABLE `tbl_kpempat_a` (
  `Id_empatA` int(11) NOT NULL,
  `NIP` varchar(100) NOT NULL,
  `NIM` varchar(100) NOT NULL,
  `Nilai_satu` int(11) NOT NULL,
  `Nilai_dua` int(11) NOT NULL,
  `Nilai_tiga` int(11) NOT NULL,
  `Nilai_empat` int(11) NOT NULL,
  `Nilai_lima` int(11) NOT NULL,
  `Catatan` text NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpempat_a`
--

INSERT INTO `tbl_kpempat_a` (`Id_empatA`, `NIP`, `NIM`, `Nilai_satu`, `Nilai_dua`, `Nilai_tiga`, `Nilai_empat`, `Nilai_lima`, `Catatan`, `Tanggal`) VALUES
(2, '987654321', 'D1041151007', 100, 100, 100, 100, 90, 'asdasdasd', '2020-08-08'),
(6, '987654321', '6701174119', 90, 100, 100, 100, 100, 'SDASDASD', '2020-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpempat_b`
--

CREATE TABLE `tbl_kpempat_b` (
  `Id_empatB` int(11) NOT NULL,
  `No_identitas` varchar(30) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Nilai_satu` int(11) NOT NULL,
  `Nilai_dua` int(11) NOT NULL,
  `Nilai_tiga` int(11) NOT NULL,
  `Nilai_empat` int(11) NOT NULL,
  `Nilai_lima` int(11) NOT NULL,
  `Catatan` text NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpempat_b`
--

INSERT INTO `tbl_kpempat_b` (`Id_empatB`, `No_identitas`, `NIM`, `Nilai_satu`, `Nilai_dua`, `Nilai_tiga`, `Nilai_empat`, `Nilai_lima`, `Catatan`, `Tanggal`) VALUES
(1, '123', 'D1041151007', 100, 100, 100, 100, 90, 'ASSS', '2020-12-14'),
(3, '123', '6701174119', 90, 90, 90, 90, 90, 'ASDASD', '2020-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kpempat_c`
--

CREATE TABLE `tbl_kpempat_c` (
  `Id_empatC` int(11) NOT NULL,
  `Id_periode` int(11) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `No_identitas` varchar(30) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Id_duaC` int(11) NOT NULL,
  `Id_empatA` int(11) NOT NULL,
  `Id_empatB` int(11) NOT NULL,
  `Status_kaprodi` int(1) NOT NULL,
  `Status_dosen` int(1) NOT NULL,
  `Tanggal_kaprodi` date NOT NULL,
  `Tanggal_dosen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kpempat_c`
--

INSERT INTO `tbl_kpempat_c` (`Id_empatC`, `Id_periode`, `NIP`, `No_identitas`, `NIM`, `Id_duaC`, `Id_empatA`, `Id_empatB`, `Status_kaprodi`, `Status_dosen`, `Tanggal_kaprodi`, `Tanggal_dosen`) VALUES
(1, 14, '987654321', '11111', '6701174119', 0, 0, 0, 2, 2, '2021-06-16', '2021-05-31'),
(5, 14, '987654321', '11111', 'D1041151007', 2, 2, 1, 1, 2, '2021-07-02', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kptiga`
--

CREATE TABLE `tbl_kptiga` (
  `Id_Kptiga` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Status` int(11) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kptiga`
--

INSERT INTO `tbl_kptiga` (`Id_Kptiga`, `NIM`, `NIP`, `Status`, `Tanggal`) VALUES
(2, 'D1041151007', '987654321', 2, '2021-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `Id_laporan` int(11) NOT NULL,
  `Id_pelaksanaan` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `No_identitas` varchar(30) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Berkas` varchar(255) NOT NULL,
  `Tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`Id_laporan`, `Id_pelaksanaan`, `NIM`, `NIP`, `No_identitas`, `Keterangan`, `Berkas`, `Tanggal`) VALUES
(21, 14, 'D1041151007', '987654321', '123', 'Seminar', '', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `Id_mahasiswa` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `NIM` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `IPK` float NOT NULL,
  `SKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`Id_mahasiswa`, `Username`, `NIM`, `Password`, `Alamat`, `IPK`, `SKS`) VALUES
(1, 'mahasiswa', '6701174119', 'mahasiswa', 'Alamat', 3.4, 20),
(2, 'mulidan', 'D1041151007', '$2y$10$Y9nDcgIgQKGEXGEjq1YWvuK9ZXtOkcK3.HQ4gbIMdgxyyS1qKfNwO', 'jl daya nasional', 3.3, 120),
(3, 'mahasiswiii', 'D111111111', '$2y$10$Y9nDcgIgQKGEXGEjq1YWvuK9ZXtOkcK3.HQ4gbIMdgxyyS1qKfNwO', 'jl jalan aja', 3.5, 120),
(4, 'mahasiswa 2', 'D1041151001', '$2y$10$VC4YbnMtb0ePpGZXTGJyYuABct4xXKgzhI8fOaATdsZhwWAx/Oe9G', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelaksanaan`
--

CREATE TABLE `tbl_pelaksanaan` (
  `Id_pelaksanaan` int(11) NOT NULL,
  `Id_tahun_pelaksanaan` int(11) NOT NULL,
  `Tahun` varchar(30) NOT NULL,
  `Periode` int(2) NOT NULL,
  `Tanggal_mulai` date NOT NULL,
  `Tanggal_selesai` date NOT NULL,
  `Pengajuan_seminar` date NOT NULL,
  `Pelaksanaan_seminar` date NOT NULL,
  `RevisiDpengumpulan` date NOT NULL,
  `Tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelaksanaan`
--

INSERT INTO `tbl_pelaksanaan` (`Id_pelaksanaan`, `Id_tahun_pelaksanaan`, `Tahun`, `Periode`, `Tanggal_mulai`, `Tanggal_selesai`, `Pengajuan_seminar`, `Pelaksanaan_seminar`, `RevisiDpengumpulan`, `Tanggal_upload`) VALUES
(13, 0, '2020', 2, '2020-12-25', '2021-02-25', '2021-01-25', '2021-01-29', '2021-02-28', '2021-01-07'),
(14, 1, '2021', 1, '2021-03-21', '2021-07-31', '2021-04-18', '2021-04-20', '2021-05-28', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembimbing_lapangan`
--

CREATE TABLE `tbl_pembimbing_lapangan` (
  `Id` int(11) NOT NULL,
  `Id_proposal` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `No_identitas` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  `Alamat_kantor` varchar(255) NOT NULL,
  `No_hp` varchar(20) NOT NULL,
  `File` varchar(255) NOT NULL,
  `Tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembimbing_lapangan`
--

INSERT INTO `tbl_pembimbing_lapangan` (`Id`, `Id_proposal`, `NIM`, `Nama`, `No_identitas`, `Password`, `Jabatan`, `Alamat_kantor`, `No_hp`, `File`, `Tanggal`) VALUES
(20, 187, '6701174119', 'pak Dia', '1111111111', '', 'ketua', 'Jl imbonnnn', '08134567890111', 'Contoh_Desain_UML_Sistem_Informasi_Absen.pdf', '2020-08-08'),
(23, 196, 'D1041151007', 'Pak Pembimbing', '123', '$2y$10$pZ02jgLDlZehgTeDUIeup.FCfBQ.fNHE8TOF24//SojCUcaZbQZuW', 'IT ', 'Jl imbon ', '08134567890', 'backdrop.pdf', '2021-06-27'),
(28, 205, 'D111111111', 'Pak Pembimbing mahasiswi', '11111', '', 'IT', 'Jl imbon', '08134567890', 'Frame_1_(1).pdf', '2021-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `Id_pengajuan` int(11) NOT NULL,
  `Topik` varchar(255) NOT NULL,
  `Abstrak` varchar(255) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Instansi` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Narahubung` int(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Konfirmasi` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`Id_pengajuan`, `Topik`, `Abstrak`, `Jumlah`, `Instansi`, `Alamat`, `Narahubung`, `Email`, `Konfirmasi`, `Status`, `Tanggal`) VALUES
(3, 'd', 'd', 1, 'informatika', 'jl kuala behe', 909, 'mulidan131296@student.untan.ac.id', 2, 2, '2021-07-23'),
(4, 'd', 'd', 1, 'informatika', 'jl kuala behe', 909, 'mulidan131296@student.untan.ac.id', 2, 2, '2021-07-23'),
(5, 'd', 'v', 1, 'informatika', 'jl kuala behe', 909, 'mulidan131296@gmail.com', 2, 2, '2021-07-23'),
(10, 'sistem', 'sistem', 1, 'test', 'jl daya nasional no 2', 2147483647, 'mulidan131296@student.untan.ac.id', 2, 2, '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persentasenilai`
--

CREATE TABLE `tbl_persentasenilai` (
  `Id` int(11) NOT NULL,
  `Id_pelaksanaan` int(11) NOT NULL,
  `Nilai_lapangan` varchar(20) NOT NULL,
  `Nilai_Seminar_lapangan` varchar(20) NOT NULL,
  `Nilai_Seminar_dosen` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_persentasenilai`
--

INSERT INTO `tbl_persentasenilai` (`Id`, `Id_pelaksanaan`, `Nilai_lapangan`, `Nilai_Seminar_lapangan`, `Nilai_Seminar_dosen`, `Tanggal`) VALUES
(2, 14, '20', '30', '50', '2021-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proposal`
--

CREATE TABLE `tbl_proposal` (
  `Id_proposal` int(11) NOT NULL,
  `Id_pelaksanaan` int(11) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Berkas` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `NamaDosen` varchar(100) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Tanggal_Status` date NOT NULL,
  `Tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proposal`
--

INSERT INTO `tbl_proposal` (`Id_proposal`, `Id_pelaksanaan`, `topik`, `NIM`, `Berkas`, `nama`, `NIP`, `NamaDosen`, `Status`, `Tanggal_Status`, `Tanggal_upload`) VALUES
(187, 13, 'sistem informasi manajemen kerja praktek', '6701174119', '2015_2016-Ganjil.pdf', 'mahasiswa', '987654321', 'Pak Dosen', 2, '2021-05-28', '2020-09-16'),
(196, 14, 'sistem informasi manajemen kerja praktekaaa', 'D1041151007', 'backdrop.pdf', 'mulidan', '987654321', 'Pak Dosen', 2, '2021-05-28', '2021-01-20'),
(205, 14, 'sistem uji kompetensi', 'D1111111112', 'Frame_1_(7).pdf', 'mahasiswiii', '987654321', 'pakdosen', 2, '2021-05-28', '2021-02-22'),
(206, 14, 'topik baru2', 'D1041151001', 'Transkrip.pdf', 'mahasiswa 2', '987654321', 'dosen123', 2, '2021-06-29', '2021-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rencanajudul`
--

CREATE TABLE `tbl_rencanajudul` (
  `Id_rencanajudul` int(11) NOT NULL,
  `Id_tawaranjudul` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT '1',
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rencanajudul`
--

INSERT INTO `tbl_rencanajudul` (`Id_rencanajudul`, `Id_tawaranjudul`, `NIM`, `Username`, `Status`, `Tanggal`) VALUES
(45, 21, 'D1041151007', 'mulidan', '2', '2021-01-07'),
(59, 22, 'D1041151001', 'mahasiswa 2', '1', '2021-03-15'),
(60, 20, 'D1041151001', 'mahasiswa 2', '1', '2021-03-15'),
(61, 21, 'D1041151001', 'mahasiswa 2', '3', '2021-03-15'),
(63, 24, 'D1041151001', 'mahasiswa 2', '2', '2021-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `Id` int(11) NOT NULL,
  `Icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`Id`, `Icon`) VALUES
(1, '<span class=\"badge badge-primary\">Diproses</span>'),
(2, '<span class=\"badge badge-success\">Diterima</span>'),
(3, '<span class=\"badge badge-danger\">Ditolak</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_syaratseminar`
--

CREATE TABLE `tbl_syaratseminar` (
  `Id` int(11) NOT NULL,
  `Id_pelaksanaan` int(11) NOT NULL,
  `Jumlah` int(100) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_syaratseminar`
--

INSERT INTO `tbl_syaratseminar` (`Id`, `Id_pelaksanaan`, `Jumlah`, `Tanggal`) VALUES
(8, 14, 5, '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tawaranjudul`
--

CREATE TABLE `tbl_tawaranjudul` (
  `Id_tawaranjudul` int(11) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `No_Hp` varchar(25) NOT NULL,
  `Instansi` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Id_pelaksanaan` int(11) NOT NULL,
  `Tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tawaranjudul`
--

INSERT INTO `tbl_tawaranjudul` (`Id_tawaranjudul`, `NIP`, `topik`, `Alamat`, `Jumlah`, `No_Hp`, `Instansi`, `Username`, `Id_pelaksanaan`, `Tanggal`) VALUES
(20, '987654321', 'topik baru', 'jl topik', 1, '089009090909', 'untan', 'dosen123', 14, '22 Desember 2020'),
(21, '987654321', 'topik baru2', 'jl topik', 1, '08900123', 'untan', 'dosen123', 14, '02 Maret 2021'),
(22, '987654321', 'sistem informasi manajemen untan', 'untan', 1, '08134567890', 'Untan', 'Pak Dosen', 14, '09 Maret 2021'),
(23, '0000', 'sistem pemetaan wilayah', 'Untan', 1, '08000000', 'Untan', 'tes', 14, '16 Maret 2021'),
(24, '11111', 'Web Service', 'Jurusan Informatika', 1, '08134567890', 'informatika', 'admin', 14, '07 Juni 2021'),
(36, '11111', 'd', 'jl kuala behe', 1, '08', 'informatika', 'admin', 14, '27 Juli 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id_user` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `No_identitas` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Id_user`, `Nama`, `No_identitas`, `Password`, `Status`, `Tanggal`) VALUES
(17, 'pembimbing lapangan', '1234', '$2y$10$eyjwvoMQ5xSwDjnXChhQYee1rSohApo1TWpiPPS8GIYAIXR/zs772', 1, '2020-09-05'),
(18, 'pembimbing lapangan 2', '123', '$2y$10$ZbHx7iukfM98iszORHsjpOuxdbTDiYjLy2HSC8FrWzdjt01fcR05W', 1, '2020-09-16'),
(23, 'mulidan', '112233', '$2y$10$GJYk.vl.vuaN.tfdiTowUeUs7kVRxMFDRzTqlY3vur1CoBLa8TxEq', 1, '2020-12-22'),
(24, 'saya', '121212', '$2y$10$DQ37H.MD18Ai3mqRByKM3u1EpajjlHbB0.nZHn/5CV85F35nAgD9e', 1, '2020-12-22'),
(26, 'mulidan', 'D1041151007', '$2y$10$Y9nDcgIgQKGEXGEjq1YWvuK9ZXtOkcK3.HQ4gbIMdgxyyS1qKfNwO', 1, '2021-01-01'),
(27, 'dosen', '987654321', '$2y$10$Ar1Awc2E56Jh72BhMZEJFO612Ec/OWPmx53gqqGgNK6H0MJZ.Kq7S', 1, '2021-01-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`Id_dosen`);

--
-- Indexes for table `tbl_kpdua`
--
ALTER TABLE `tbl_kpdua`
  ADD PRIMARY KEY (`Id_Kpdua`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `tbl_kpdua_a`
--
ALTER TABLE `tbl_kpdua_a`
  ADD PRIMARY KEY (`Id_duaA`);

--
-- Indexes for table `tbl_kpdua_b`
--
ALTER TABLE `tbl_kpdua_b`
  ADD PRIMARY KEY (`Id_duaB`);

--
-- Indexes for table `tbl_kpdua_c`
--
ALTER TABLE `tbl_kpdua_c`
  ADD PRIMARY KEY (`Id_duaC`);

--
-- Indexes for table `tbl_kpempat`
--
ALTER TABLE `tbl_kpempat`
  ADD PRIMARY KEY (`Id_Kpempat`);

--
-- Indexes for table `tbl_kpempat_a`
--
ALTER TABLE `tbl_kpempat_a`
  ADD PRIMARY KEY (`Id_empatA`);

--
-- Indexes for table `tbl_kpempat_b`
--
ALTER TABLE `tbl_kpempat_b`
  ADD PRIMARY KEY (`Id_empatB`);

--
-- Indexes for table `tbl_kpempat_c`
--
ALTER TABLE `tbl_kpempat_c`
  ADD PRIMARY KEY (`Id_empatC`);

--
-- Indexes for table `tbl_kptiga`
--
ALTER TABLE `tbl_kptiga`
  ADD PRIMARY KEY (`Id_Kptiga`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`Id_laporan`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`Id_mahasiswa`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indexes for table `tbl_pelaksanaan`
--
ALTER TABLE `tbl_pelaksanaan`
  ADD PRIMARY KEY (`Id_pelaksanaan`);

--
-- Indexes for table `tbl_pembimbing_lapangan`
--
ALTER TABLE `tbl_pembimbing_lapangan`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`Id_pengajuan`);

--
-- Indexes for table `tbl_persentasenilai`
--
ALTER TABLE `tbl_persentasenilai`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_proposal`
--
ALTER TABLE `tbl_proposal`
  ADD PRIMARY KEY (`Id_proposal`);

--
-- Indexes for table `tbl_rencanajudul`
--
ALTER TABLE `tbl_rencanajudul`
  ADD PRIMARY KEY (`Id_rencanajudul`),
  ADD KEY `Id_tawaranjudul` (`Id_tawaranjudul`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_syaratseminar`
--
ALTER TABLE `tbl_syaratseminar`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_tawaranjudul`
--
ALTER TABLE `tbl_tawaranjudul`
  ADD PRIMARY KEY (`Id_tawaranjudul`),
  ADD KEY `Id_dosen` (`NIP`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `Id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_kpdua`
--
ALTER TABLE `tbl_kpdua`
  MODIFY `Id_Kpdua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_kpdua_a`
--
ALTER TABLE `tbl_kpdua_a`
  MODIFY `Id_duaA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_kpdua_b`
--
ALTER TABLE `tbl_kpdua_b`
  MODIFY `Id_duaB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_kpdua_c`
--
ALTER TABLE `tbl_kpdua_c`
  MODIFY `Id_duaC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kpempat`
--
ALTER TABLE `tbl_kpempat`
  MODIFY `Id_Kpempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kpempat_a`
--
ALTER TABLE `tbl_kpempat_a`
  MODIFY `Id_empatA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kpempat_b`
--
ALTER TABLE `tbl_kpempat_b`
  MODIFY `Id_empatB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kpempat_c`
--
ALTER TABLE `tbl_kpempat_c`
  MODIFY `Id_empatC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kptiga`
--
ALTER TABLE `tbl_kptiga`
  MODIFY `Id_Kptiga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `Id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `Id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pelaksanaan`
--
ALTER TABLE `tbl_pelaksanaan`
  MODIFY `Id_pelaksanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pembimbing_lapangan`
--
ALTER TABLE `tbl_pembimbing_lapangan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `Id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_persentasenilai`
--
ALTER TABLE `tbl_persentasenilai`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_proposal`
--
ALTER TABLE `tbl_proposal`
  MODIFY `Id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `tbl_rencanajudul`
--
ALTER TABLE `tbl_rencanajudul`
  MODIFY `Id_rencanajudul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_syaratseminar`
--
ALTER TABLE `tbl_syaratseminar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tawaranjudul`
--
ALTER TABLE `tbl_tawaranjudul`
  MODIFY `Id_tawaranjudul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_rencanajudul`
--
ALTER TABLE `tbl_rencanajudul`
  ADD CONSTRAINT `tbl_rencanajudul_ibfk_2` FOREIGN KEY (`Id_tawaranjudul`) REFERENCES `tbl_tawaranjudul` (`Id_tawaranjudul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
