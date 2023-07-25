-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2023 pada 21.37
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_piket`
--

CREATE TABLE `group_piket` (
  `id_group_piket` int(11) NOT NULL,
  `id_pekerja` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `Ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `group_piket`
--

INSERT INTO `group_piket` (`id_group_piket`, `id_pekerja`, `id_jabatan`, `id_group`, `Ket`) VALUES
(2222, 2, 22, 222, 'ddd'),
(3333, 3, 55, 333, ''),
(4444, 4, 66, 444, 'asasasasasasasasaasasasasa'),
(11111, 1, 11, 111, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(11, 'jabatan 1'),
(22, 'jabatan 2'),
(33, 'Pemimpin Kelompok'),
(44, 'Pemimpin Apel'),
(55, 'jabatan 3'),
(66, 'jabatan 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal` date NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jadwal`, `id_group`) VALUES
(1111, '2023-07-25', 111),
(2222, '2023-07-26', 222),
(3333, '2023-07-27', 333);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekera`
--

CREATE TABLE `pekera` (
  `id_pekerja` int(11) NOT NULL,
  `nama` text NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pekera`
--

INSERT INTO `pekera` (`id_pekerja`, `nama`, `id_jabatan`) VALUES
(1, 'nama pekerja 1', 11),
(2, 'nama pekerja 2', 22),
(3, 'Pekerja 3', 55),
(4, 'Pekerja 4', 66);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_group`
--

CREATE TABLE `tb_group` (
  `id_group` int(11) NOT NULL,
  `Nama_group` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_group`
--

INSERT INTO `tb_group` (`id_group`, `Nama_group`) VALUES
(111, 'A'),
(222, 'B'),
(333, 'C'),
(444, 'Izin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `group_piket`
--
ALTER TABLE `group_piket`
  ADD PRIMARY KEY (`id_group_piket`),
  ADD UNIQUE KEY `id_pekerja` (`id_pekerja`),
  ADD UNIQUE KEY `id_jabatan` (`id_jabatan`),
  ADD UNIQUE KEY `id_group` (`id_group`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD UNIQUE KEY `id_group` (`id_group`);

--
-- Indeks untuk tabel `pekera`
--
ALTER TABLE `pekera`
  ADD PRIMARY KEY (`id_pekerja`),
  ADD UNIQUE KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `group_piket`
--
ALTER TABLE `group_piket`
  MODIFY `id_group_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3334;

--
-- AUTO_INCREMENT untuk tabel `pekera`
--
ALTER TABLE `pekera`
  MODIFY `id_pekerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_group`
--
ALTER TABLE `tb_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `group_piket`
--
ALTER TABLE `group_piket`
  ADD CONSTRAINT `group_piket_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `tb_group` (`id_group`),
  ADD CONSTRAINT `group_piket_ibfk_2` FOREIGN KEY (`id_pekerja`) REFERENCES `pekera` (`id_pekerja`),
  ADD CONSTRAINT `group_piket_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `tb_group` (`id_group`);

--
-- Ketidakleluasaan untuk tabel `pekera`
--
ALTER TABLE `pekera`
  ADD CONSTRAINT `pekera_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
