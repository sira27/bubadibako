-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 06:56 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id_achievement` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_pencapaian` varchar(128) NOT NULL,
  `tahun` int(4) NOT NULL,
  `deskripsi_pencapaian` varchar(256) NOT NULL,
  `bukti_pendukung` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id_achievement`, `nim`, `nama_pencapaian`, `tahun`, `deskripsi_pencapaian`, `bukti_pendukung`, `status`, `tanggal_disetujui`, `point`) VALUES
(11, 1810139999, 'Cumlaude', 2021, 'Terlalu Pintar', NULL, NULL, '2020-06-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `name`, `email`) VALUES
(31, 1710130020, 'Dosennya', 'dosen@gmail.com'),
(29, 2122232425, 'Dosenku', 'dosenku@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id_education` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `jenjang_pendidikan` varchar(128) NOT NULL,
  `tahun` int(4) NOT NULL,
  `deskripsi` varchar(256) DEFAULT NULL,
  `bukti_pendukung` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id_education`, `nim`, `jenjang_pendidikan`, `tahun`, `deskripsi`, `bukti_pendukung`, `status`, `tanggal_disetujui`, `point`) VALUES
(19, 1810139999, 'SMA Negeri 5 Jakarta', 2017, 'Ranking 1 tiap hari', 'default.jpg', 0, '0000-00-00', NULL),
(20, 1810139999, 'Universitas Indonesia', 2019, 'Jurusan teknik beton', 'default.jpg', 0, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `id_work` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `tempat_kerja` varchar(128) NOT NULL,
  `posisi_kerja` varchar(128) NOT NULL,
  `tahun` int(4) NOT NULL,
  `deskripsi_kegiatan` varchar(256) NOT NULL,
  `bukti_pendukung` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`id_work`, `nim`, `tempat_kerja`, `posisi_kerja`, `tahun`, `deskripsi_kegiatan`, `bukti_pendukung`, `status`, `tanggal_disetujui`, `point`) VALUES
(2, 1810139999, 'Google', 'Satpam', 2021, 'Menjaga kamu', 'default.jpg', 0, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ketertarikan`
--

CREATE TABLE `ketertarikan` (
  `nim` int(10) NOT NULL,
  `ketertarikan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nidn`, `nim`, `email`) VALUES
(30, 2122232425, 1810139999, 'mahasiswaku@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nim_mahasiswa`
--

CREATE TABLE `nim_mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(20) NOT NULL,
  `deskripsi_diri` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nim_mahasiswa`
--

INSERT INTO `nim_mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status`, `alamat`, `email`, `deskripsi_diri`, `foto`) VALUES
(1810139999, 'Mahasiswaku', 'Jakarta', '2020-06-21', 'Kong Hu Cu', '0', 'Puri Depok', 'm.akbar.w@students.e', 'Pintar', 'logoWeb.png');

-- --------------------------------------------------------

--
-- Table structure for table `organizational`
--

CREATE TABLE `organizational` (
  `id_organisasi` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_organisasi` varchar(128) NOT NULL,
  `jabatan_organisasi` varchar(128) NOT NULL,
  `tahun` int(4) NOT NULL,
  `deskripsi_kegiatan` varchar(256) NOT NULL,
  `bukti_pendukung` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizational`
--

INSERT INTO `organizational` (`id_organisasi`, `nim`, `nama_organisasi`, `jabatan_organisasi`, `tahun`, `deskripsi_kegiatan`, `bukti_pendukung`, `status`, `tanggal_disetujui`, `point`) VALUES
(2, 1810139999, 'BEM', 'Ketua umum', 2020, 'Deskripsi', 'default.jpg', 0, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professional_certification`
--

CREATE TABLE `professional_certification` (
  `id_sertifikat` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `deskripsi_kegiatan` varchar(256) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bukti_pendukung` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_certification`
--

INSERT INTO `professional_certification` (`id_sertifikat`, `nim`, `nama_kegiatan`, `deskripsi_kegiatan`, `tahun`, `bukti_pendukung`, `status`, `tanggal_disetujui`, `point`) VALUES
(2, 1810139999, 'Solo learn', 'ngoding', 2020, 'default.jpg', 0, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id_skill` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `jenis_skill` varchar(50) NOT NULL,
  `nama_skill` varchar(64) NOT NULL,
  `bukti_pendukung` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id_skill`, `nim`, `jenis_skill`, `nama_skill`, `bukti_pendukung`, `status`, `tanggal_disetujui`, `point`) VALUES
(2, 1810139999, 'Game PUBG', 'akm x6 supressor no gyro no recoil', 'default.jpg', 0, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sosial_media`
--

CREATE TABLE `sosial_media` (
  `nim` int(10) NOT NULL,
  `sosial_media` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `telepon`
--

CREATE TABLE `telepon` (
  `nim` int(10) NOT NULL,
  `nomor_telepon` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id_training` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_training` varchar(128) NOT NULL,
  `sebagai` varchar(32) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bukti_pendukung` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id_training`, `nim`, `nama_training`, `sebagai`, `tahun`, `bukti_pendukung`, `status`, `tanggal_disetujui`, `point`) VALUES
(3, 1810139999, 'Cheerpark', 'Trainer', 2021, 'default.jpg', 0, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` int(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(28, 1011121314, 'Adminku', 'adminku@gmail.com', '', '$2y$10$.fIbY0QDC5n2R8SZl.JM/OEwMPK1bjee.dcspkAQWXg09jlnjO5rS', 1, 1, 1591173876),
(29, 2122232425, 'Dosenku', 'dosenku@gmail.com', '', '$2y$10$.fIbY0QDC5n2R8SZl.JM/OEwMPK1bjee.dcspkAQWXg09jlnjO5rS', 2, 1, 1591173876),
(30, 1810139999, 'Mahasiswaku', 'mahasiswaku@gmail.com', 'default.jpg', '$2y$10$Hg4xzfxm.TRvs4fZgf1VFuyiG5TARmocqV183u6vr90ZeSN/Jsu1q', 3, 1, 1591331717),
(31, 1710130020, 'Dosennya', 'dosen@gmail.com', 'default.jpg', '$2y$10$GVMV4UjwZ//NlMFfF5Mw.uunYDq4spHIDIr27WfzpjEr7bWzB0kvK', 2, 1, 1591332138);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Head of Study Program'),
(2, 'Academic Adviser'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'barwisnu69@gmail.com', 'u4bpBYDUhlKvY5JBmW6GVO2ONyG3WUs8XaAhHQiStWs=', 1588238689),
(2, 'wisnuakbar18@gmail.com', 'me0tKr8pA+ojApIsKb+jDV/HzzPLj6x7TrvqaHqfNAM=', 1590915425),
(3, 'wisnuakbar18@gmail.com', 'BEzYsmBGAK/GZuT5TRUVVS57kkx1vwqpp6p8Rpqk05M=', 1590915529),
(4, 'barwisnu69@gmail.com', 'HSYWUbm4B+1dfaSd98UGwTbRVJt9El4HskjFxGgNK8E=', 1590917835);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id_achievement`),
  ADD KEY `fk_achievement_nim` (`nim`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD KEY `fk_dosen_id` (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`),
  ADD KEY `fk_education_nim` (`nim`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id_work`),
  ADD KEY `fk_intership_nim` (`nim`);

--
-- Indexes for table `ketertarikan`
--
ALTER TABLE `ketertarikan`
  ADD KEY `fk_ketertarikan_nim` (`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`,`nidn`,`nim`),
  ADD KEY `fk_mahasiswa_nidn` (`nidn`),
  ADD KEY `fk_mahasiswa_nim` (`nim`);

--
-- Indexes for table `nim_mahasiswa`
--
ALTER TABLE `nim_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `organizational`
--
ALTER TABLE `organizational`
  ADD PRIMARY KEY (`id_organisasi`),
  ADD KEY `fk_organizational_nim` (`nim`);

--
-- Indexes for table `professional_certification`
--
ALTER TABLE `professional_certification`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `fk_certification_nim` (`nim`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`),
  ADD KEY `fk_skill_nim` (`nim`);

--
-- Indexes for table `sosial_media`
--
ALTER TABLE `sosial_media`
  ADD KEY `fk_sosmed_nim` (`nim`);

--
-- Indexes for table `telepon`
--
ALTER TABLE `telepon`
  ADD KEY `fk_telepon_nim` (`nim`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`),
  ADD KEY `fk_training_nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id_achievement` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `id_work` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizational`
--
ALTER TABLE `organizational`
  MODIFY `id_organisasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professional_certification`
--
ALTER TABLE `professional_certification`
  MODIFY `id_sertifikat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `fk_achievement_nim` FOREIGN KEY (`nim`) REFERENCES `nim_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_dosen_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `fk_education_nim` FOREIGN KEY (`nim`) REFERENCES `nim_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ketertarikan`
--
ALTER TABLE `ketertarikan`
  ADD CONSTRAINT `fk_ketertarikan_nim` FOREIGN KEY (`nim`) REFERENCES `nim_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mahasiswa_nidn` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mahasiswa_nim` FOREIGN KEY (`nim`) REFERENCES `nim_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizational`
--
ALTER TABLE `organizational`
  ADD CONSTRAINT `fk_organizational_nim` FOREIGN KEY (`nim`) REFERENCES `nim_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professional_certification`
--
ALTER TABLE `professional_certification`
  ADD CONSTRAINT `fk_certification_nim` FOREIGN KEY (`nim`) REFERENCES `nim_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `fk_skill_nim` FOREIGN KEY (`nim`) REFERENCES `nim_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
