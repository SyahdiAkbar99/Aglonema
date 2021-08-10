-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2021 pada 05.15
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
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `t__keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE data_tanaman SET jumlah = jumlah - NEW.jumlah WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(123) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `t_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE data_tanaman SET jumlah = jumlah + NEW.jumlah WHERE id = NEW.product_id;
END
$$
DELIMITER ;

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
(1, 'Macam - Macam', 'Red_Kochin1.jpg', 'Aglonema Jenis Red Kochin', '2021-07-08 03:06:34', 1),
(5, 'Macam - Macam', 'Aglonema_Super_White.jpg', 'Aglonema Jenis Super White', '2021-07-08 03:07:18', 2),
(6, 'Macam - Macam', 'Dolores.jpg', 'Aglonema Jenis Dolores', '2021-07-08 03:08:09', 3),
(7, 'Macam - Macam', 'Aglonema_Reanita.jpg', 'Aglonema Jenis Reanita', '2021-07-08 03:09:06', 4),
(8, 'Macam - Macam', 'Aglonema_Sartika.jpg', 'Aglonema Jenis Sartika', '2021-07-08 03:09:51', 5),
(9, 'Macam - Macam', 'cinta.jpg', 'Aglonema Jenis Cinta', '2021-07-08 03:10:45', 6),
(10, 'Macam - Macam', 'Aglonema_Stardust_Oranges.jpg', 'Aglonema Jenis Stardust Oranges', '2021-07-08 03:11:30', 7);

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
(1, 'Penanaman', 'Moonlight.jpg', 'Proses Pembibitan Dengan Biji', 1, '2021-07-08 03:15:18', 'Jika anda ingin melakukan pembibitan menggunakan biji maka anda harus mencari biji yang diambil dari tanaman indukan yang sudah berumur atau sedah tua. Sebelumnya rendam biji aglaonema selama 2 hingga 3 jam agar bisa meransang pertumbuhan biji tersebut.'),
(4, 'Penanaman', 'Diana.jpg', 'Proses Pembibitan Dengan Stek', 2, '2021-05-21 15:05:21', 'Potonglah pucuk indukan yang sebelumnya telah anda pilih tersebut. Setelah melakukan pemotongan pucuk menggunakan gunting tanaman atau pisau yang tajam, maka anda hanya perlu menanam pucuk tersebut kedalam wadah kecil dan letakan di daerah sejuk dan terhin'),
(5, 'Penanaman', 'Claudia.jpg', 'Pembibitan Dengan Cangkok', 3, '2021-07-08 03:17:01', 'Pilihlah tanaman indukan yang bewarna batang coklat dan kokoh. Biasanya akan di tandai dengan daun yang mudah gugur atau telah gugur dengan sendirinya. Kupas sedikit batang yang telah dipilih untuk menjadi indukan pembibitan cangkok tersebut. Lapisi dengan kombinasi tanah sekam, humus, pakis dan pasir malang gunakan plastik. Berilah lubang kecil untuk sirkulasi udara untuk lubang pengakaran, lakukan penyemprotan pada plastik 2 kali sehari dan biasanya akan siap dalam 3 atau 4 minggu. Itulah cara menanam bunga aglaonema.');

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
(1, 'Perawatan', 'adelia.jpg', 'Penyiraman Tanaman Aglaonema', 1, '2021-07-08 03:17:48', 'Ketika anda menanam tanaman aglaonema maka anda harus juga menyesuaikan dengan kondisi lingkungan dan kondisi dai media tanam. Penyiraman biasanya di lakukan dengan menyesuaikan dengan jumlah air dengan media tanam. Sebaiknya gunakan air bersih yang tidak'),
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
(1, '19/05/2021 -DT- 001', 'Aglonema Big Apple', 'Aglonema_Big_Apple.jpg', 'Aglonema A', 2, 'Merah Pink', 29, 345000, '2021-08-09 22:58:48', 3),
(13, '23/05/2021 -DT- 001', 'Aglonema Big Roy White', 'Aglonema_Big_Roy_White.jpg', 'Aglonema A', 1, 'Putih Hijau', 29, 315000, '2021-08-09 22:58:52', 3),
(14, '23/05/2021 -DT- 002', 'Aglonema Pink Sunset', 'Aglonema_Pink_Sunset.jpg', 'Aglonema A', 1, 'Hijau Pink', 31, 310000, '2021-07-11 11:51:17', 3),
(15, '23/05/2021 -DT- 003', 'Aglonema Super White', 'Aglonema_Super_White.jpg', 'Aglonema  B', 2, 'Putih', 35, 265000, '2021-07-10 09:29:14', 3),
(16, '23/05/2021 -DT- 004', 'Cinta', 'cinta1.jpg', 'Aglonema  B', 3, 'Pink Merah', 33, 287000, '2021-07-10 08:48:22', 3),
(17, '16/06/2021 -DT- 001', 'Diana', 'Diana.jpg', 'Aglonema B', 3, 'Hijau Bintik Merah', 23, 215000, '2021-07-10 09:25:02', 3),
(18, '16/06/2021 -DT- 002', 'Shinta', 'Shinta.jpg', 'Aglonema C', 2, 'Hijau', 17, 165000, '2021-07-08 05:20:12', 3),
(20, '08/07/2021 -DT- 001', 'Red Kochin', 'Red_Kochin.jpg', 'Aglonema A', 2, 'Merah Merona', 19, 450000, '2021-07-11 11:52:57', 3),
(22, '10/07/2021 -DT- 001', 'Aglonema Komkom', 'Aglonema_Komkom.jpg', 'Aglonema A', 2, 'merah', 100, 350000, '2021-07-10 09:29:23', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `antar_id` int(11) NOT NULL,
  `nama_antar` varchar(128) NOT NULL,
  `lokasi_antar` varchar(128) NOT NULL,
  `biaya_antar` int(11) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`detail_id`, `product_id`, `name`, `jumlah`, `harga`, `total`, `status`, `image`, `tanggal`, `seller_id`, `antar_id`, `nama_antar`, `lokasi_antar`, `biaya_antar`, `biaya_admin`, `transaksi_id`) VALUES
(1, 1, 'Aglonema Big Apple', 1, 345000, NULL, 1, NULL, NULL, 3, 0, '', '', 0, 0, 1),
(2, 13, 'Aglonema Big Roy White', 1, 315000, 315000, 2, '1.PNG', '2021-08-10 07:03:55', 3, 2, 'JNT', 'Malang', 12000, 2500, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_antar`
--

CREATE TABLE `jasa_antar` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `biaya` int(11) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa_antar`
--

INSERT INTO `jasa_antar` (`id`, `nama`, `lokasi`, `biaya`, `biaya_admin`, `tanggal`) VALUES
(2, 'JNT', 'Malang', 12000, 2500, '2021-08-09 22:58:08'),
(3, 'JNE', 'Lumajang', 4000, 2500, '2021-08-09 23:48:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `buyer_email` varchar(255) DEFAULT NULL,
  `buyer_name` varchar(128) DEFAULT NULL,
  `buyer_bank` varchar(128) DEFAULT NULL,
  `buyer_rekening` varchar(128) DEFAULT NULL,
  `buyer_telp` char(14) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(128) NOT NULL,
  `seller_bank` varchar(128) NOT NULL,
  `seller_rekening` varchar(128) NOT NULL,
  `transaksi_total` int(11) DEFAULT NULL,
  `transaksi_tanggal` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode`, `buyer_id`, `buyer_email`, `buyer_name`, `buyer_bank`, `buyer_rekening`, `buyer_telp`, `seller_id`, `seller_name`, `seller_bank`, `seller_rekening`, `transaksi_total`, `transaksi_tanggal`, `status`) VALUES
(1, '10/08/2021 -PSN- 001', 2, 'buyer@gmail.com', 'Buyer', NULL, NULL, '628900011122', 3, 'Seller', 'BRI', '0007000200050003', 660000, '2021-08-10 07:03:55', 2);

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
(1, 'Admin', 'admin@gmail.com', 'images-7_(2).jpg', '$2y$10$AXjPk8Onb.G08Rqqeoa7sOktJKQGteHQ5PL4QcqJOAMIJIzuvE2xS', '628555411222', '', 1, 1, 1620834085, '', ''),
(2, 'Buyer', 'buyer@gmail.com', 'images-4_(2).jpg', '$2y$10$OvPvijWzTcLrwuC./VNEcOhVSpkoOmjjt8OZoyfB0oXG6ROlHXZDq', '628900011122', 'JL Buyer 21', 3, 1, 1620834190, '', ''),
(3, 'Seller', 'seller@gmail.com', 'images-6_(2).jpg', '$2y$10$OvPvijWzTcLrwuC./VNEcOhVSpkoOmjjt8OZoyfB0oXG6ROlHXZDq', '628579895678', 'JL Seller 21', 2, 1, 1620834190, '0007000200050003', 'BRI');

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
(1, 1, 'Dashboard Admin', 'Admin', 'nav-icon fas fa-fw fa-tachometer-alt', 1, 1),
(2, 2, 'Dashboard Seller', 'Seller', 'nav-icon fas fa-fw fa-tachometer-alt', 1, 1),
(3, 1, 'Profil Saya', 'Admin/my_profile', 'nav-icon far fa-fw fa-user', 8, 1),
(5, 2, 'Profil Saya', 'Seller/my_profile', 'nav-icon far fa-fw fa-user', 8, 1),
(6, 1, 'Edit Profil', 'Admin/edit_profile', 'nav-icon fa fa-fw fa-user-edit', 9, 1),
(7, 2, 'Edit Profil', 'Seller/edit_profile', 'nav-icon fa fa-fw fa-user-edit', 9, 1),
(8, 1, 'Ubah Kata Sandi', 'Admin/change_password', 'fa fa-fw fa-key', 10, 1),
(9, 2, 'Ubah Kata Sandi', 'Seller/change_password', 'fa fa-fw fa-key', 10, 1),
(10, 2, 'Data Tanaman', 'Seller/data_tanaman', 'fa fa-fw fa-cube', 2, 1),
(11, 2, 'Riwayat Penjualan', 'Seller/riwayat_penjualan', 'fa fa-fw fa-file-contract', 3, 1),
(12, 1, 'Data User', 'Admin/data_user', 'nav-icon fa fa-fw fa-users', 2, 1),
(13, 1, 'Data Banner', 'Admin/data_banner', 'nav-icon fa fa-fw fa-scroll', 3, 1),
(14, 1, 'Data Penanaman', 'Admin/data_penanaman', 'nav-icon fa fa-fw fa-tree', 4, 1),
(15, 1, 'Data Perawatan', 'Admin/data_perawatan', 'nav-icon fa fa-fw fa-book-open', 5, 1),
(16, 1, 'Jasa Antar', 'Admin/jasa_antar', 'fa fa-fw fa-file-contract', 6, 1);

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
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(13, 'jina@gmail.com', 'EYBrqKEEgLblT2Zltw60SiYLrJdVy4oc3RvQDpk2xzY=', 1624166809);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `jasa_antar`
--
ALTER TABLE `jasa_antar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_banner`
--
ALTER TABLE `data_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_penanaman`
--
ALTER TABLE `data_penanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_perawatan`
--
ALTER TABLE `data_perawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_tanaman`
--
ALTER TABLE `data_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jasa_antar`
--
ALTER TABLE `jasa_antar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
