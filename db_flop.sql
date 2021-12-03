-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 01:12 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_flop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id_comment` int(11) NOT NULL,
  `post_title` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comment`
--

INSERT INTO `tb_comment` (`id_comment`, `post_title`, `username`, `comment`, `comment_date`) VALUES
(1, 'Testing title', 'johny', 'Sorry it\'s my first post', '2021-11-24'),
(4, 'Testing title', 'poster', 'Good post :))))))', '2021-11-28'),
(8, 'Testing title', 'poster', 'Content', '2021-11-25'),
(10, 'Another test title', 'poster', 'Bad post', '2021-11-25'),
(11, 'Another test title', 'poster', 'Why even', '2021-11-25'),
(13, 'Integrasi PLC', 'sukma', 'Coba koneksi dengan arduino dengan shield ethernet', '2021-12-02'),
(14, 'Nilai Potensio', 'sukma', 'Potensio boleh diganti tanpa merusak perangkat, tapi nilai potensio besar berarti perlu diputar lebih jauh dari biasanya', '2021-12-02'),
(15, 'Nilai Potensio', 'poster', 'Boleh dipakai nggak masalah, cuma perlu diputar lebih jauh', '2021-12-02'),
(16, 'Koneksi ESP8266', 'poster', 'Coba cek code di arduino dan code di komputer?', '2021-12-02'),
(17, 'Nilai Potensio', 'patar', 'Boleh kok', '2021-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_egarden`
--

CREATE TABLE `tb_egarden` (
  `id_entry` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `vent_status` tinyint(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_egarden`
--

INSERT INTO `tb_egarden` (`id_entry`, `temp`, `humidity`, `water`, `vent_status`, `time`, `action`) VALUES
(9, 34, 62, 55, 0, '2021-12-02 15:20:03', 'Siram'),
(74, 18, 68, 51, 0, '2021-12-02 15:52:30', 'Siram'),
(75, 34, 62, 68, 1, '2021-12-01 20:52:38', 'Toggle Vent'),
(76, 26, 67, 48, 1, '2021-12-02 15:52:41', 'Cek'),
(77, 36, 72, 69, 1, '2021-12-03 09:39:27', 'Cek'),
(78, 32, 64, 63, 0, '2021-12-03 02:39:40', 'Toggle Vent'),
(79, 19, 71, 41, 0, '2021-12-03 09:42:26', 'Cek'),
(80, 27, 73, 55, 1, '2021-12-03 02:42:43', 'Toggle Vent'),
(81, 37, 61, 64, 1, '2021-12-03 09:42:51', 'Siram');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `post_title` varchar(25) NOT NULL,
  `post_desc` varchar(50) NOT NULL,
  `post_content` text NOT NULL,
  `poster` varchar(25) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`post_title`, `post_desc`, `post_content`, `poster`, `post_date`) VALUES
('Koneksi ESP8266', 'ESP8266 Tidak bisa terhubung ke jaringan wifi??', 'Kenapa tidak bisa terhubung ya ???', 'sukma', '2021-11-29'),
('Nilai Potensio', 'Apa bisa potensio 250k diganti dengan 500k??', 'Untuk digunakan sebagai knob volum apa boleh diganti potensio 250k ohm dengan 500k ohm? efek sampingnya kira kira apa ya?', 'lily', '2021-11-29'),
('Home Automation', 'Semua tentang Home Automation', 'Halo agan-agan sekalian pecinta barang elektronik, kenalin ane as\r\nBerhubung ane suka banget dengan teknologi baru apalagi yg berkaitan dengan otomasi dan teman2nya.\r\nAne kali ini mau sharing tentang penggunaan teknologi otomasi yang bisa diaplikasikan di rumah agan, bisa bikin sendiri (DIY), atau bisa langsung beli dengan harga yang terjangkau (kalo mahal ane juga mikir2 lagi buat beli).\r\nAne tertarik banget untuk jadiin rumah ane smart home, dulu ane udh nyari2 kesana kemari produk2 smart home (tp ga ada yg jual), sampe nyoba buat sendiri (liat2 tutorial di forum luar, tapi ga perfect, maklum bukan lulusan teknik, haha), akhirnya ane cobain buat import barang2 otomasi di luar negeri (karena ane ngebet banget pengen punya smart home).\r\nNah, disini ane mau sharing tentang produk-produk home automation (terutama yang udh ane pernah pakai), siapa tau ada yang butuh, atau kepengen juga bikin rumahnya jadi home automation, bisa dicoba dibikin (DIY) atau beli juga produk sejenis (lumayan buat pamer ke tamu atau tetangga, hehe).\r\nAne sharingnya dikit2 ya gan, (soalnya ga bakat bikin tulisan, lg lumayan sibuk jga sih, hehe), semoga berkenan dan bermanfaat.\r\nOh Iyaa, Mohon maaf kalau threadnya berantakan dan kurang enak diliat, nanti ane rapihin dikit2 ya gan.\r\nKalau ada saran atau apapun, bisa langsung post disini aja atau PM ane gan.\r\nTerima kasih banyak gan.\r\nBTW ane haus nih gan, butuh cendol seger, siapa tau ada yg ngasih, hehe.\r\nThreadnya masih under construction ya gan ', 'as', '2021-12-02'),
('Integrasi PLC', 'Bagaimana cara integrasi jaringan ke PLC?', 'Untuk kalangan industri lebih efektif PLC karena PLC memang dibangun untuk memenuhi kebutuhan industri. PLC bisa digunakan untuk mengontrol sistem skala kecil hingga skala besar. PLC mendukung sistem yang berkembang. PLC dapat mengontrol gerakan motor bukan hanya on/off, bahkan bisa menggerakkan motor sampai ke detil derajad bahkan sub derajad. Bisa mengatur kecepatan, percepatan motor dengan pengaturan/pemrograman yang mudah.\r\nSedangkan Arduino adalah sistem umum yang belum ditujukan untuk pemakaian tertentu. Semua detil harus diprogram sendiri, semua alat pendukung harus disiapkan sendiri. Jika sistem yang akan didukung kecil dan sederhana baik saja menggunakan Arduino, apalagi jika bisa memrogramnya sendiri.', 'poster', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_level` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `user_level`, `full_name`, `email`) VALUES
('Admin', 'admin', 3, 'Admin nistrator', 'Admin@flop.id'),
('as', '1234', 2, '', 'as@gmail.com'),
('johny', '1234', 2, 'Johnathan Commentar', 'John@gmail.com'),
('lily', '1234', 2, 'Lily', 'lilian@gmail.com'),
('patar', '1234', 2, '', 'patar@gmail.com'),
('poster', '1234', 2, 'poster', 'poster@postoffice.com'),
('sukma', '1234', 2, '', 'Ragasukma23@Gmail.com'),
('teter', '1234', 2, '', 'test@gmail.com'),
('youbeE', '12344', 2, '', 'Ragasukma23@Gmail.com'),
('yourmom12', '1234', 2, '', 'urmom@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `tb_egarden`
--
ALTER TABLE `tb_egarden`
  ADD PRIMARY KEY (`id_entry`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_egarden`
--
ALTER TABLE `tb_egarden`
  MODIFY `id_entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
