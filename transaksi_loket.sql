-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2021 pada 14.30
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi_loket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_penggaduan`
--

CREATE TABLE `tabel_penggaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nomor_trx` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama_pelanggan` varchar(50) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(100) COLLATE utf8_bin NOT NULL,
  `no_hp` varchar(50) COLLATE utf8_bin NOT NULL,
  `jenis_trx` varchar(50) COLLATE utf8_bin NOT NULL,
  `waktu_trx` varchar(20) COLLATE utf8_bin NOT NULL,
  `kendala_trx` varchar(50) COLLATE utf8_bin NOT NULL,
  `status_peng` varchar(50) COLLATE utf8_bin NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_bin NOT NULL,
  `struk_trx_peng` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_trx` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE utf8_bin NOT NULL,
  `jenis_trx` varchar(150) COLLATE utf8_bin NOT NULL,
  `waktu_trx` varchar(50) COLLATE utf8_bin NOT NULL,
  `nominal_trx` varchar(50) COLLATE utf8_bin NOT NULL,
  `status_trx` varchar(50) COLLATE utf8_bin NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_bin NOT NULL,
  `struk` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_trx`, `nama_pelanggan`, `jenis_trx`, `waktu_trx`, `nominal_trx`, `status_trx`, `keterangan`, `struk`) VALUES
(1, 'budi', 'transfer tunai bri', '09/10/2021', '4.000.000', 'Sukses', 'ok', 'jbt1.png'),
(2, 'andi', 'pln', '09-09-2021', '50.000', 'Sukses', 'terkirim', 'eps.JPG'),
(5, 'tekt', 'duit', '09-09-2021', '800.000', 'Sukses', 'coba keterangan', 'IMG_20210211_053026.jpg'),
(6, 'cek lagi', 'tranfer', '08-08-2021', '600.000', 'Pending', 'pending', 'LIC.JPG'),
(7, 'jkjk', 'tagihan', '10-10-2021', '4.000.000', 'Sukses', 'sip', 'exam.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status` enum('Pegawai','Honorer') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `alamat`, `no_hp`, `status`, `jabatan`, `foto`) VALUES
('123', 'Agus', 'demak', '087789987654', 'Pegawai', 'Operator', 'Tulips.jpg'),
('1298', 'Sunandar', 'Jakarta', '089987789011', 'Honorer', 'Produksi', 'Penguins.jpg'),
('67', 'joni', 'semarang', '089987789098', 'Honorer', 'ketua', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Sekretaris') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Tamu 1', 'admin 1', '1234', 'Administrator'),
(2, 'Somat', 'sek', '1', 'Sekretaris'),
(3, 'Aris Yudianto', 'arisyud', 'cdfa225xmb', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_profil` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_profil`, `alamat`, `bidang`) VALUES
(1, 'Loket SMLink', 'Putussibau - Kalimantan Barat', 'Pelayanan Publik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_penggaduan`
--
ALTER TABLE `tabel_penggaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_trx`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_penggaduan`
--
ALTER TABLE `tabel_penggaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
