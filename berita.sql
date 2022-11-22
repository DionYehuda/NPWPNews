-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 08:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_admin`, `nama`, `username`, `pass`) VALUES
(1, 'Dion Yehuda', 'dion@admin.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Dwi Rianto', 'dwi@admin.com', '099ebea48ea9666a7da2177267983138');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `nomor` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `konten` longtext NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`nomor`, `judul`, `kategori`, `penulis`, `konten`, `tanggal`, `gambar`) VALUES
(1, 'Tikung MU, Man City Curi Start untuk Transfer Erling Haaland', 'Olahraga', 'Serafin Unus Pasi', 'Bola.net - Rencana Manchester United untuk mengamankan jasa Erling Braut Haaland menemui kendala baru. Tetangga mereka, Manchester City dilaporkan sudah curi start untuk mengamankan jasa sang striker.\r\nStriker berusia 21 tahun itu bakal jadi properti panas di tahun 2022. Ini dikarenakan sang striker adalah striker muda terbaik di Eropa saat ini bersama Borussia Dortmund.\r\nManchester United diketahui menjadi salah satu peminat Haaland. Setan Merah sudah mengejar sang striker sejak tahun 2019 dan mereka diyakini akan tampil all out untuk mengamankan jasa sang striker.\r\nManchester Evening News mengklaim bahwa MU terancanm tertikung untuk transfer Haaland. Tetangga mereka, Manchester City dilaporkan sudah mulai bergerak untuk mengamankan jasa sang striker.', '2021-10-07', 'olahraga.jpg'),
(2, 'Elektabilitas AHY Meroket di Survei Capres, Demokrat: Rakyat ingin regenerasi kepemimpinan', 'Politik', 'Agung Sandy Lesmana | Bagaskhara Isdiansyah', 'Suara.com - Hasil survei terbaru lembaga survei Institute for Democracy & Strategic Affairs (Indostrategic) yang menempatkan Agus Harimurti Yudhoyono (AHY) dalam 5 besar kandidat calon presiden yang memiliki tingkat popularitas tinggi dimaknai sebagi suatu hal yang penting. Belum lagi, dalam survei tersebut Demokrat berada di urutan ketiga soal elektabilitas.\r\nKepala Balitbang DPP Partai Demokrat Tomi Satryatomo menegaskan bahwa pesan terpenting dari hasil survei nasional ini adalah publik menginginkan regenerasi kepemimpinan nasional pada Pemilu 2024.\r\n\"Tabulasi silang yang dilakukan Indostrategic menunjukkan pemilih muda cenderung memilih kandidat capres yang lebih muda,\" kata Tomi kepada wartawan, Rabu (4/8/2021). \r\nTomi menjabarkan, kandidat capres yang lebih tua cenderung dipilih oleh generasi Baby Boomer (lahir 1945-1965) dan generasi sebelumnya yang lahir tahun 1925-1945). Namun menurutnya, pada perhelatan Pilpres 2024 nanti jumlah pemilih muda diprediksi akan mendominasi. Hal itu bisa mencapai angka 65 persen. \r\nUntuk diketahui, survei tersebut dilakukan pada 23 Maret - 1 Juni 2021 di 34 provinsi di seluruh Indonesia melalui pendekatan face to face interview. Sedangkan untuk metode penarikan sampel dilakukan melalui multi-stage random sampling dengan jumlah sampel 2.400 responden.\r\n', '2021-08-04', 'politik.jpg'),
(3, 'Imbas tarif PPN naik, pertumbuhan ekonomi 2022 diramal hanya 4,5 persen', 'Ekonomi', 'Maulandy Rizky Bayu Kencana', 'Liputan6.com, Jakarta Ekonomi Bank Permata Josua Pardede menilai, rencana kenaikan tarif PPN menjadi 11 persen pada April 2022 belum sejalan dengan target pertumbuhan ekonomi sebesar 5,2 persen di tahun depan.\r\nMenurut dia, pertumbuhan ekonomi 2022 sebesar 5,2 persen berdasarkan APBN 2022, diasumsikan sebagai skenario optimis pemulihan ekonomi tahun depan. Secara proyeksi, Josua beranggapan, pemulihan ekonomi 2022 bakal berjalan cenderung lebih signifikan dibanding 2021 yang dipengaruhi oleh varian delta. \r\nMeskipun demikian, dia menegaskan, berdasar asumsi pertumbuhan ekonomi tahun 2022 tersebut, dampak dari kenaikan tarif PPN berpotensi membatasi pemulihan ekonomi cukup signifikan.\r\n\"Sehingga pandangan saya pertumbuhan ekonomi tahun 2022 diperkirakan berkisar 4,5-5 persen,\" ujar Josua kepada Liputan6.com, Selasa (5/10/2021).\r\nJosua tak memungkiri, peningkatan tarif PPN menjadi 11 persen berpotensi mendukung peningkatan penerimaan negara dari pajak. Namun, ia mewaspadai kebijakan itu memiliki konsekuensi perlambatan pemulihan ekonomi.\r\n\"Karena peningkatan tarif PPN akan merefleksikan peningkatan harga barang dan jasa atau inflasi, sehingga berpotensi menghambat pemulihan daya beli masyarakat, khususnya 1-2 kuartal sejak penerapan tarif baru PPN,\" terangnya.\r\n', '2021-10-05', 'ekonomi.jpg'),
(4, 'MPL ID Season 8 Menjadi Top Event Bulan September, Kalahkan VCT Valorant!', 'Permainan', 'Heraldi', 'MPL ID Season 8 menjadi turnamen dengan top event di bulan September ini, dan menjadi bulan kedua secara berturut-turut untuk turnamen tertinggi Mobile Legends di Indonesia ini. \r\nBerdasarkan eschart.com, MPL ID Season 8 berhasil mengalahkan turnamen lain yang diadakan bulan ini, di antaranya adalah VCT 2021 Stage 3 Master Berlin (Valorant) serta ESL Pro League Season 14 (CS:GO).\r\nMPL PH Season 8 yang juga turnamen Mobile Legends region Filipina juga berhasil menembus lima besar untuk jumlah peak viewers di bulan ini.\r\nRRQ Hoshi vs EVOS Legends adalah pertandingan yang paling banyak ditonton saat bertanding di MPL ID Season 8 bulan Agustus lalu, yang membuat turnamen ini menjadi top event di bulan ini.\r\nTak disangka, RRQ Hoshi kembali menjadi pertandingan dengan peak viewers tertinggi di bulan selanjutnya. Kali ini, pertandingannya melawan Alter Ego ditonton lebih dari 1.174.536 orang!\r\nRRQ Hoshi vs Alter Ego yang dilangsungkan pada 25 September ini pun membuat MPL ID Season 8 menjadi top event yang kedua secara berturut-turut untuk MPL ID Season 8.\r\nDi urutan kedua ada VCT 2021: Stage Master Berlin yang berhasil menarik 811.370 penonton, mengalahkan ESL Pro League Season 14 yang mendapatkan peak viewers sebanyak 758.567.\r\nPrestasi diraih oleh MPL PH S8 yang juga menemani MPL ID di 5 besar The Most Popular Tournaments bulan September. Pertandingan antara Nexplay EVOS vs OMEGA Esports ditonton oleh lebih dari 569.000 penonton.\r\nSepertinya turnamen MPL dari berbagai region akan tetap mendominasi top event di bulan Oktober nanti.\r\n', '2021-10-07', 'permainan.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `profile` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_depan`, `nama_belakang`, `username`, `pass`, `tanggal_lahir`, `jenis_kelamin`, `profile`) VALUES
(1001, 'Robert', 'Downey', 'ironman@marvel.com', '01cfcd4f6b8770febfb40cb906715822', '1965-04-04', 'laki-laki', 'default.jpg'),
(1004, 'Dion', 'Suginta', 'dionyehuda44143', '81dc9bdb52d04dc20036dbd8313ed055', '2021-10-05', 'laki-laki', 'default.jpg'),
(1005, 'Annastasya', 'Saphira', 'CHII', '46a832d5657c637e72eccf0de2c26f5e', '2002-09-28', 'perempuan', 'CHII.jpg'),
(1010, 'Ariel', 'Rafael', 'ArielR', 'e10adc3949ba59abbe56e057f20f883e', '2001-10-10', 'laki-laki', 'default.jpg'),
(1011, 'Dwi', 'Rianto', 'iantowibu', '3068b5569d07c1a26df66a799be21894', '2001-12-01', 'laki-laki', 'profile1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_action`
--

CREATE TABLE `user_action` (
  `id_comment` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `komen` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_action`
--

INSERT INTO `user_action` (`id_comment`, `nomor`, `id_pengguna`, `komen`) VALUES
(1, 1, 1001, 'Bakal makin seru ini kalo emang beneran ditikung , soalnya kan MU udah ada Ronaldo , ya masa city gamau nyari striker ganas yang baru apalagi abis di tinggal Sergio aguero.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `user_action`
--
ALTER TABLE `user_action`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `nomor` (`nomor`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `user_action`
--
ALTER TABLE `user_action`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_action`
--
ALTER TABLE `user_action`
  ADD CONSTRAINT `user_action_ibfk_1` FOREIGN KEY (`nomor`) REFERENCES `berita` (`nomor`),
  ADD CONSTRAINT `user_action_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
