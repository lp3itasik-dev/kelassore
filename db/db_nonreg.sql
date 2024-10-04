-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 02:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nonreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jadwal`
--

CREATE TABLE `tbl_detail_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_jadwal`
--

INSERT INTO `tbl_detail_jadwal` (`id_jadwal`, `nim`, `status`, `tanggal`, `semester`) VALUES
(9, '202002084', 'Hadir', '2023-02-27', 'Semester 1'),
(7, '12345', 'Hadir', '2023-02-27', 'Semester 1'),
(9, '202002084', 'Hadir', '2023-02-27', 'Semester 1'),
(10, '001AB', 'Hadir', '2023-02-28', 'Semester 2'),
(10, '001AB', 'Hadir', '2023-02-28', 'Semester 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `dosen`) VALUES
(3, 'DOSEN BAHASA INDONESIA'),
(4, 'Muhamad Aripin, A.Md'),
(5, 'Silvina Ghozali, '),
(6, 'H. Riza Faizal, S.IP., M.M'),
(7, 'Adzka Rosa Sanjayyana, S.E., Ak., M.Ak'),
(8, 'Rangga Munggaran'),
(9, 'Khariidatul');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `link_gmeet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `nim`, `id_matkul`, `id_dosen`, `hari`, `link_gmeet`) VALUES
(7, '12345', 6, 3, 'Monday', 'asd'),
(8, '12345', 6, 3, 'Monday', 'asd'),
(9, '202002084', 6, 3, 'Tuesday', 'asdf'),
(10, '001AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(11, '001AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(12, '001AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(13, '001AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(14, '002AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(15, '002AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(16, '002AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(17, '002AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(18, '003AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(19, '003AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(20, '003AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(21, '003AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(22, '004AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(23, '004AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(24, '004AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(25, '004AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(26, '005AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(27, '005AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(28, '005AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(29, '005AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa'),
(30, '006AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(31, '006AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(32, '006AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(33, '006AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(34, '007AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(35, '007AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(36, '007AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(37, '007AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(38, '008AB', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(39, '008AB', 11, 5, 'Tuesday', 'https://meet.google.com/uwp-sdwk-vpe\n'),
(40, '008AB', 12, 6, 'Monday', 'https://meet.google.com/aeq-eswn-nyj\n'),
(41, '008AB', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(42, '001MKP', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(43, '001MKP', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(44, '001MKP', 17, 8, 'Tuesday', 'https://meet.google.com/zxk-pihw-cfq\n'),
(45, '001MKP', 18, 9, 'Wednesday', 'https://meet.google.com/ney-yahg-nbn\n'),
(46, '002MKP', 10, 4, 'Friday', 'https://meet.google.com/gwp-wfrw-yay\n'),
(47, '002MKP', 14, 7, 'Thursday', 'https://meet.google.com/mhi-xcpq-fwa\n'),
(48, '002MKP', 17, 8, 'Tuesday', 'https://meet.google.com/zxk-pihw-cfq\n'),
(49, '002MKP', 18, 9, 'Wednesday', 'https://meet.google.com/ney-yahg-nbn\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `id_matkul` int(11) NOT NULL,
  `matkul` varchar(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `sks` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`id_matkul`, `matkul`, `semester`, `sks`) VALUES
(6, 'Bahasa Indonesia', 'Semester 1', '2'),
(7, 'MICE', 'Semester 4', '4'),
(8, 'Bahasa Indonesia', 'Semester 1', '3'),
(9, 'English II', 'Semester 2', '4'),
(10, 'Applied Computer 2', 'Semester 2', '4'),
(11, 'Office Management', 'Semester 2', '4'),
(12, 'Entrepreneurship 2', 'Semester 2', '2'),
(13, 'Introduction To Business', 'Semester 2', '4'),
(14, 'Design Thinking', 'Semester 2', '2'),
(15, 'Service Excellence', 'Semester 2', '2'),
(16, 'Accounting For Business', 'Semester 2', '2'),
(17, 'Financial Management', 'Semester 2', '2'),
(18, 'Auditing', 'Semester 2', '4'),
(19, 'Banks and Non-Bank Financial Instituions', 'Semester 2', '2'),
(20, 'Intermediate Accounting', 'Semester 2', '4'),
(21, 'Introduction to Economics', 'Semester 2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `kehadiran` varchar(3) NOT NULL,
  `tugas` varchar(3) NOT NULL,
  `formatif` varchar(3) NOT NULL,
  `uts` varchar(3) NOT NULL,
  `uas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `nim`, `id_matkul`, `kehadiran`, `tugas`, `formatif`, `uts`, `uas`) VALUES
(1, '12345', 6, '87', '86', '45', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nim` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nim`, `password`, `nama`, `kelas`, `jurusan`, `jenis_kelamin`, `foto`, `level`) VALUES
('001AB', '001AB', 'Dita Nurfadila', 'AB', 'AB', 'Perempuan', '1677511971733.png', '2'),
('001MKP', '001MKP', 'Devi Handiati', 'MKP', 'MKP', 'Perempuan', '1677512259847.png', '2'),
('002AB', '002AB', 'Asri Herawati', 'AB', 'AB', 'Perempuan', '1677512013856.png', '2'),
('002MKP', '002MKP', 'Bella Amalia S', 'MKP', 'MKP', 'Perempuan', '1677512306140.png', '2'),
('003AB', '003AB', 'Fani Oktaviani', 'AB', 'AB', 'Perempuan', '1677512054013.png', '2'),
('004AB', '004AB', 'Fasha Indriyani', 'AB', 'AB', 'Perempuan', '1677512096647.png', '2'),
('005AB', '005AB', 'Muhamad Wildan', 'AB', 'AB', 'Laki-laki', '1677512129455.png', '2'),
('006AB', '006AB', 'Ali Syabana', 'AB', 'AB', 'Laki-laki', '1677512157162.png', '2'),
('007AB', '007AB', 'Aditya Rizkilah', 'AB', 'AB', 'Laki-laki', '1677512191504.png', '2'),
('008AB', '008AB', 'Ari Rizki', 'AB', 'AB', 'Laki-laki', '1677512221359.png', '2'),
('0098', 'asdf', 'example', 'ab', 'ab', 'Perempuan', '1674190528738.png', '2'),
('12345', 'asdf12', 'Coba lagi', 'MI 22', 'Manajemen Informatika', 'Perempuan', '1674541790598.png', '2'),
('202002084', '202002084', 'Nabila Azzahra', 'MI20A', 'Manajemen Informatika', 'Perempuan', '1677489308026.png', '2'),
('admpdd', 'pdd0265', 'Admin Pendidikan', '', '', 'Laki-laki', 'default.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
