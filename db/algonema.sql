-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2021 pada 09.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algonema`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_banner`
--

CREATE TABLE `data_banner` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_banner`
--

INSERT INTO `data_banner` (`id`, `nama`, `image`, `deskripsi`, `tanggal_post`, `urutan`) VALUES
(1, 'headers-2', 'headers2.jpg', 'This Banner is so good !', '2021-05-20 15:16:26', 1),
(5, 'headers-3', 'headers3.jpg', 'Cools Properly Aglonema Planting', '2021-05-20 16:01:48', 2),
(6, 'headers-4', 'headers4.jpg', 'Good Choice Human !', '2021-05-20 16:03:19', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penanaman`
--

CREATE TABLE `data_penanaman` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `subjudul` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_penanaman`
--

INSERT INTO `data_penanaman` (`id`, `judul`, `image`, `subjudul`, `urutan`, `tanggal_post`, `deskripsi`) VALUES
(1, 'Penanaman', 'Aglaonema_JT_2000.jpg', 'Proses Pembibitan Dengan Biji', 1, '2021-05-21 15:04:45', 'Jika anda ingin melakukan pembibitan menggunakan biji maka anda harus mencari biji yang diambil dari tanaman indukan yang sudah berumur atau sedah tua. Sebelumnya rendam biji aglaonema selama 2 hingga 3 jam agar bisa meransang pertumbuhan biji tersebut.'),
(4, 'Penanaman', 'Diana.jpg', 'Proses Pembibitan Dengan Stek', 2, '2021-05-21 15:05:21', 'Potonglah pucuk indukan yang sebelumnya telah anda pilih tersebut. Setelah melakukan pemotongan pucuk menggunakan gunting tanaman atau pisau yang tajam, maka anda hanya perlu menanam pucuk tersebut kedalam wadah kecil dan letakan di daerah sejuk dan terhin'),
(5, 'Penanaman', 'tiara.jpg', 'Pembibitan Dengan Cangkok', 3, '2021-05-22 15:33:28', 'Pilihlah tanaman indukan yang bewarna batang coklat dan kokoh. Biasanya akan di tandai dengan daun yang mudah gugur atau telah gugur dengan sendirinya. Kupas sedikit batang yang telah dipilih untuk menjadi indukan pembibitan cangkok tersebut. Lapisi dengan kombinasi tanah sekam, humus, pakis dan pasir malang gunakan plastik. Berilah lubang kecil untuk sirkulasi udara untuk lubang pengakaran, lakukan penyemprotan pada plastik 2 kali sehari dan biasanya akan siap dalam 3 atau 4 minggu. Itulah cara menanam bunga aglaonema.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_perawatan`
--

CREATE TABLE `data_perawatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `subjudul` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_perawatan`
--

INSERT INTO `data_perawatan` (`id`, `judul`, `image`, `subjudul`, `urutan`, `tanggal_post`, `deskripsi`) VALUES
(1, 'Perawatan', 'widuri.jpg', 'Penyiraman Tanaman Aglaonema', 1, '2021-05-22 15:27:59', 'Ketika anda menanam tanaman aglaonema maka anda harus juga menyesuaikan dengan kondisi lingkungan dan kondisi dai media tanam. Penyiraman biasanya di lakukan dengan menyesuaikan dengan jumlah air dengan media tanam. Sebaiknya gunakan air bersih yang tidak '),
(2, 'Perawatan', 'Shinta.jpg', 'Pemupukan Bunga Aglonema', 2, '2021-05-22 15:32:55', 'Agar pertumbuhan tanaman ini menjadi baik dan berkembang dengan pesat maka anda harus memberi pupuk secara rutin sekitar sekali 2 minggu. Nutrisi akan di berikan kepada tanaman bunga aglaonema dengan pemberian pupuk rutin dan nantinya akan menunjang pertumbuhan tanaman ini. Biasanya pupuk yang biasa di gunakan adalah pupuk NPK. Pupuk lain yang di pakai adalah Gandasil D, Vitabloom, Hyponex dan Growmore. Agar tanaman hias ini bisa tumbuh dengan baik dan daun yang di hasilkan juga cantik maka anda harus rajin memberikan pemupukan dan berikan kelembaban sekitar 50 hingga 75 %.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tanaman`
--

CREATE TABLE `data_tanaman` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `berat` int(11) NOT NULL,
  `warna` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_tanaman`
--

INSERT INTO `data_tanaman` (`id`, `kode`, `nama`, `image`, `jenis`, `berat`, `warna`, `jumlah`, `harga`, `tanggal_post`, `user_id`) VALUES
(1, '19/05/2021 -DT- 001', 'Adelia', 'adelia.jpg', 'Aglonema A', 2, 'Merah Kehijauan', 4, 142000, '2021-05-20 08:47:54', 3),
(13, '23/05/2021 -DT- 001', 'Angela', 'angela.jpg', 'Aglonema A', 3, 'Merah Kehitaman', 3, 145000, '2021-05-23 09:29:21', 3),
(14, '23/05/2021 -DT- 002', 'Ariana', 'Ariana.jpg', 'Aglonema A', 4, 'Merah Kebiruan', 4, 154000, '2021-05-23 09:29:42', 3),
(15, '23/05/2021 -DT- 003', 'Bidadari', 'Bidadari.jpg', 'Aglonema  - B', 5, 'Merah Kekuningan', 5, 213000, '2021-05-23 09:30:16', 3),
(16, '23/05/2021 -DT- 004', 'Cinta', 'cinta.jpg', 'Aglonema - C', 6, 'Merah Merona', 6, 300000, '2021-05-23 09:31:36', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_bank` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `no_telp`, `alamat`, `role_id`, `is_active`, `date_created`, `no_rekening`, `nama_bank`) VALUES
(1, 'Admin', 'admin@gmail.com', 'avatar.png', '$2y$10$AXjPk8Onb.G08Rqqeoa7sOktJKQGteHQ5PL4QcqJOAMIJIzuvE2xS', '628555411222', '', 1, 1, 1620834085, '', ''),
(2, 'Buyer', 'buyer@gmail.com', 'user5-128x128.jpg', '$2y$10$OvPvijWzTcLrwuC./VNEcOhVSpkoOmjjt8OZoyfB0oXG6ROlHXZDq', '628900011122', 'JL Buyer 21', 3, 1, 1620834190, '', ''),
(3, 'Seller', 'seller@gmail.com', 'user7-128x128.jpg', '$2y$10$OvPvijWzTcLrwuC./VNEcOhVSpkoOmjjt8OZoyfB0oXG6ROlHXZDq', '628575515589', 'JL Seller 21', 2, 1, 1620834190, '0007000200050003', 'BRI'),
(11, 'Ubisol', 'ubicroftnest@gmail.com', 'user8-128x128.jpg', '$2y$10$t0PHKsp47XueXKXSPRhDn.2Jyrc5uKLVbTFwU2LiprpxWoj0ZI6uW', '628888888888', 'JL Kemuning', 2, 1, 1620999851, '0007166675651213', 'Bank BRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `urutan`) VALUES
(1, 'Admin', 1),
(2, 'Seller', 1),
(3, 'Buyer', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Seller'),
(3, 'Buyer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `urutan`, `is_active`) VALUES
(1, 1, 'Dashboard Admin', 'admin', 'nav-icon fas fa-fw fa-tachometer-alt', 1, 1),
(2, 2, 'Dashboard Seller', 'seller', 'nav-icon fas fa-fw fa-tachometer-alt', 1, 1),
(3, 1, 'My Profile', 'admin/my_profile', 'nav-icon far fa-fw fa-user', 8, 1),
(5, 2, 'My Profile', 'seller/my_profile', 'nav-icon far fa-fw fa-user', 8, 1),
(6, 1, 'Edit Profile', 'admin/edit_profile', 'nav-icon fa fa-fw fa-user-edit', 9, 1),
(7, 2, 'Edit Profile', 'seller/edit_profile', 'nav-icon fa fa-fw fa-user-edit', 9, 1),
(8, 1, 'Change Password', 'admin/change_password', 'fa fa-fw fa-key', 10, 1),
(9, 2, 'Change Password', 'seller/change_password', 'fa fa-fw fa-key', 10, 1),
(10, 2, 'Data Tanaman', 'seller/data_tanaman', 'fa fa-fw fa-cube', 2, 1),
(11, 2, 'Riwayat Pesan', 'seller/riwayat_penjualan', 'fa fa-fw fa-file-contract', 3, 1),
(12, 1, 'Data Users', 'admin/data_user', 'nav-icon fa fa-fw fa-users', 2, 1),
(13, 1, 'Data Banner', 'admin/data_banner', 'nav-icon fa fa-fw fa-scroll', 3, 1),
(14, 1, 'Data Penanaman', 'admin/data_penanaman', 'nav-icon fa fa-fw fa-tree', 4, 1),
(15, 1, 'Data Perawatan', 'admin/data_perawatan', 'nav-icon fa fa-fw fa-book-open', 5, 1),
(16, 2, 'Pengajuan Dana', 'seller/pengajuan_dana', 'nav-icon fa fa-fw fa-money-bill', 4, 1),
(17, 1, 'Pencairan Dana', 'admin/pencairan_dana', 'nav-icon fa fa-fw fa-money-bill', 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_banner`
--
ALTER TABLE `data_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_penanaman`
--
ALTER TABLE `data_penanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_perawatan`
--
ALTER TABLE `data_perawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tanaman`
--
ALTER TABLE `data_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_banner`
--
ALTER TABLE `data_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_penanaman`
--
ALTER TABLE `data_penanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_perawatan`
--
ALTER TABLE `data_perawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_tanaman`
--
ALTER TABLE `data_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
