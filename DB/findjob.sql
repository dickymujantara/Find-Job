-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2019 pada 16.32
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findjob`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cv`
--

CREATE TABLE `data_cv` (
  `id` int(11) NOT NULL,
  `data_combine` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `messages` text NOT NULL,
  `experience` text NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_cv`
--

INSERT INTO `data_cv` (`id`, `data_combine`, `nama`, `email`, `phone`, `address`, `messages`, `experience`, `photo`) VALUES
(1, 'Back-end Developer,PT.Hack.co,Jakarta Selatan,5000000,Dicari Developer Back-end Expert', 'MUHAMMAD DICKY MUJANTARA', 'dickymujantara@gmail.com', '082117895456', 'GRIYA CEMPAKA ARUM J4 NO. 49 KELURAHAN RACANUMPANG, KECAMATAN GEDEBAGE, KOTA BANDUNG, JAWA BARAT  KOTA BANDUNG JAWA BARAT', 'tes', 'tes', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_vacancy`
--

CREATE TABLE `post_vacancy` (
  `id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `map_lat` double NOT NULL,
  `map_long` double(10,0) NOT NULL,
  `gaji` int(12) NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post_vacancy`
--

INSERT INTO `post_vacancy` (`id`, `post_title`, `date`, `company_name`, `location`, `map_lat`, `map_long`, `gaji`, `post_content`) VALUES
(2, 'Mobile Developer', '0000-00-00', 'Startup.co', 'Jakarta', 0, 0, 4500000, 'dicari mobile developer'),
(3, 'Front-end Developer', '0000-00-00', 'PT.FED', 'Bandung', 0, 0, 3000000, 'front developer berpengalaman'),
(4, 'Back-end Developer', '0000-00-00', 'PT.Hack.co', 'Jakarta Selatan', 0, 0, 5000000, 'Dicari Developer Back-end Expert');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_pic` longblob NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `profile_pic`, `role`) VALUES
(14, 'company', 'company', 'company@email.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', 2),
(15, 'admin', 'admin', 'admin@admin.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_cv`
--
ALTER TABLE `data_cv`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post_vacancy`
--
ALTER TABLE `post_vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_cv`
--
ALTER TABLE `data_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `post_vacancy`
--
ALTER TABLE `post_vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
