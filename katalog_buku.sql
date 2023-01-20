-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 04:38 PM
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
-- Database: `katalog_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `id_kategori_blog` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT '1999-01-01',
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `id_kategori_blog`, `id_user`, `tanggal`, `judul`, `isi`) VALUES
(3, 1, 5, '2019-04-03', 'Teknologi Terkini', '<p>Perkembangan teknologi saat ini sangat bangus sekali</p>'),
(4, 2, 5, '2020-01-09', 'Teknologi Terbaru', '<p>Perkembangan teknologi</p>'),
(6, 5, 9, '2022-10-20', 'IOT Sukses', '<p>Internet of Things</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori_buku` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori_buku`, `judul`, `pengarang`, `id_penerbit`, `tahun_terbit`, `sinopsis`, `cover`) VALUES
(1, 1, 'Pemrograman Web dengan PHP 7', 'Betha Sidik', 4, 2019, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'cover_php7.jpg'),
(2, 4, 'Machine Learning Tingkat Dasar dan Lanjut', 'Suyanto', 4, 2020, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'cover_machine_learning.jpg'),
(3, 1, 'Vue.js', 'Luthfi', 3, 2019, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'cover_vue.jpg'),
(4, 1, 'React JS', 'Lukmanul Hakim S', 3, 2019, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'cover_php7.jpg'),
(6, 11, 'Visual Basic', 'Rafio Sadani', 4, 2021, '<p>Coding</p>\r\n', 'vb.jpg'),
(7, 5, 'Hypertext Preprocessor 1', 'Rasmus Lerdorf', 4, 2020, '<p>ASBGH</p>\r\n', 'c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `id_coba` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`id_coba`, `kategori`) VALUES
(1, 'Pemrograman'),
(2, 'Pemrograman Mobile'),
(3, 'Software Enginering');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_blog`
--

CREATE TABLE `kategori_blog` (
  `id_kategori_blog` int(11) NOT NULL,
  `kategori_blog` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_blog`
--

INSERT INTO `kategori_blog` (`id_kategori_blog`, `kategori_blog`) VALUES
(1, 'Teknologi Informasi'),
(2, 'Pemrograman'),
(3, 'Android'),
(5, 'IoT');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL,
  `kategori_buku` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori_buku`, `kategori_buku`) VALUES
(1, 'Website'),
(2, 'Mobile'),
(3, 'Desain'),
(4, 'Machine Learning'),
(5, 'Pemrograman'),
(6, 'Basis Data'),
(8, 'Software Enginering'),
(10, 'Pemrograman Mobile'),
(11, 'Pemrograman Dekstop');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT '1999-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `isi`, `tanggal`) VALUES
(1, 'About Us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1999-01-01'),
(2, 'Selamat Datang', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,', '2022-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `penerbit`, `alamat`) VALUES
(1, 'Graha Ilmu', 'Candi Gebang Permai Blok R-6 Yogyakarta'),
(2, 'Andi', 'JL Beo 38-40 Yogyakarta'),
(3, 'Lokomedia', 'JL. Jambon, Perum. Persona Alam Hijau Kav 2. B-4, Kricak Yogyakarta'),
(4, 'Informatika', 'Pasar Buku Palasari No. 82 Bandung'),
(5, 'Elek Media Komputindo', 'Jakarta, Indonesia'),
(6, 'Wineka Utama', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `tag`) VALUES
(1, 'PHP'),
(2, 'MySQL'),
(3, 'Android'),
(4, 'Javascript'),
(5, 'Phyton'),
(6, 'UML'),
(7, 'Bahasa Inggris'),
(8, 'Bahasa Jepang'),
(9, 'Bahasa Korea'),
(10, 'Oracle'),
(11, 'HTML'),
(12, 'CSS'),
(13, 'Deep Learning'),
(14, 'Frontend'),
(15, 'Framework'),
(16, 'Fuzzy'),
(17, 'Neural Network');

-- --------------------------------------------------------

--
-- Table structure for table `tag_buku`
--

CREATE TABLE `tag_buku` (
  `id_tag_buku` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_buku`
--

INSERT INTO `tag_buku` (`id_tag_buku`, `id_buku`, `id_tag`) VALUES
(1, 3, 15),
(2, 3, 4),
(6, 1, 1),
(7, 1, 2),
(25, 4, 12),
(26, 4, 15),
(27, 4, 4),
(31, 2, 13),
(32, 2, 16),
(33, 2, 11),
(34, 2, 5),
(36, 7, 15),
(37, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `level`, `foto`) VALUES
(5, 'Rafio Sadani', 'rafioosadani@gmail.com', 'rafio', '59eaa000aea87a497103a15925f7ac43', 'Superadmin', 'rafio.jpg'),
(9, 'Bima Laroi Bafih', 'bima.lrbfh08@gmail.com', 'bimalb', '6eedaeff2ab0a876cfe0bf1600db9207', 'Superadmin', 'bima.png'),
(10, 'Sindy Novianti Risma Widiana', 'sindynvianti3001@gmail.com', 'sindy', '3bc54e195911d13a3de5a337b5b3c2d6', 'Superadmin', 'sindy.jpg'),
(11, 'Siska Mahardika Sulianto', 'siskamahardika587@gmail.com', 'siska mahardika', '21232f297a57a5a743894a0e4a801fc3', 'Superadmin', 'siska.jpg'),
(13, 'Felix Isa Gigih Maulana', 'felikisa999@gmail.com', 'felix999', '039628ff9560f0ec28f3797aa4d9f431', 'Admin', 'felix.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `kategori_blog` (`id_kategori_blog`),
  ADD KEY `user_blog` (`id_user`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`) USING BTREE,
  ADD KEY `kategori_buku` (`id_kategori_buku`),
  ADD KEY `penerbit_buku` (`id_penerbit`);

--
-- Indexes for table `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id_coba`);

--
-- Indexes for table `kategori_blog`
--
ALTER TABLE `kategori_blog`
  ADD PRIMARY KEY (`id_kategori_blog`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tag_buku`
--
ALTER TABLE `tag_buku`
  ADD PRIMARY KEY (`id_tag_buku`),
  ADD KEY `tag_tag` (`id_tag`),
  ADD KEY `buku_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coba`
--
ALTER TABLE `coba`
  MODIFY `id_coba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_blog`
--
ALTER TABLE `kategori_blog`
  MODIFY `id_kategori_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tag_buku`
--
ALTER TABLE `tag_buku`
  MODIFY `id_tag_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_kategori_blog`) REFERENCES `kategori_blog` (`id_kategori_blog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori_buku`) REFERENCES `kategori_buku` (`id_kategori_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_buku`
--
ALTER TABLE `tag_buku`
  ADD CONSTRAINT `tag_buku_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
