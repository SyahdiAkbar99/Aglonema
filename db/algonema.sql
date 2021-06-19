-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2021 pada 08.41
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
(1, 'headers-2', 'Dolores.jpg', 'This Banner is so good !', '2021-06-16 16:59:30', 1),
(5, 'headers-3', 'Hot_Lady.jpg', 'Cools Properly Aglonema Planting', '2021-06-16 16:59:42', 2),
(6, 'headers-4', 'Red_Kochin.jpg', 'Good Choice Human !', '2021-06-16 17:00:06', 3);

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
(1, '19/05/2021 -DT- 001', 'Adelia', 'adelia.jpg', 'Aglonema A', 2, 'Merah Kehijauan', 3, 142000, '2021-06-19 05:51:11', 3),
(13, '23/05/2021 -DT- 001', 'Angela', 'angela.jpg', 'Aglonema A', 3, 'Merah Kehitaman', 3, 145000, '2021-06-19 06:35:06', 3),
(14, '23/05/2021 -DT- 002', 'Ariana', 'Ariana.jpg', 'Aglonema A', 4, 'Merah Kebiruan', 1, 154000, '2021-06-18 07:06:14', 3),
(15, '23/05/2021 -DT- 003', 'Bidadari', 'Bidadari.jpg', 'Aglonema  - B', 5, 'Merah Kekuningan', 2, 213000, '2021-06-19 06:37:26', 3),
(16, '23/05/2021 -DT- 004', 'Cinta', 'cinta.jpg', 'Aglonema - C', 6, 'Merah Merona', 4, 300000, '2021-06-19 00:11:13', 3),
(17, '16/06/2021 -DT- 001', 'Diana', 'Diana.jpg', 'Aglonema D', 12, 'Merah Kehitaman', 4, 154000, '2021-06-19 00:21:07', 3),
(18, '16/06/2021 -DT- 002', 'Dolores', 'Dolores.jpg', 'Aglonema D', 15, 'Merah Merona', 13, 142000, '2021-06-19 03:14:17', 3),
(19, '18/06/2021 -DT- 001', 'Mutiara', 'Mutiara.jpg', 'Aglonema M', 7, 'Merah Kehijauan', 12, 145600, '2021-06-19 06:37:31', 11);

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
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`detail_id`, `product_id`, `name`, `jumlah`, `harga`, `total`, `status`, `image`, `tanggal`, `seller_id`, `transaksi_id`) VALUES
(1, 19, 'Mutiara', 1, 145600, 145600, 1, 'letter_C1.png', '2021-06-19 13:36:00', 11, 1),
(2, 13, 'Angela', 1, 145000, 145000, 1, 'letter_K.png', '2021-06-19 13:38:27', 3, 1),
(3, 15, 'Bidadari', 2, 213000, 426000, 1, 'letter_K1.png', '2021-06-19 13:39:11', 3, 2),
(4, 19, 'Mutiara', 2, 145600, 291200, 1, 'letter_L.png', '2021-06-19 13:37:53', 11, 2);

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
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode`, `buyer_id`, `buyer_email`, `buyer_name`, `buyer_bank`, `buyer_rekening`, `buyer_telp`, `seller_id`, `seller_name`, `seller_bank`, `seller_rekening`, `transaksi_total`, `transaksi_tanggal`, `status`) VALUES
(1, '19/06/2021 -PSN- 001', 2, 'buyer@gmail.com', 'Buyer', 'BRI', '000999189990101', '628900011122', 11, 'Ubisol', 'Bank BRI', '0007166675651213', 290600, '2021-06-19 13:36:00', 1),
(2, '19/06/2021 -PSN- 002', 2, 'buyer@gmail.com', 'Buyer', 'BRI', '000999189990101', '628900011122', 3, 'Seller', 'BRI', '0007000200050003', 717200, '2021-06-19 13:38:27', 1);

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
(11, 'Ubisol', 'ubicroftnest@gmail.com', 'user8-128x128.jpg', '$2y$10$i/QVm5fd4cLWWnb9SXij0ebtiJjK14ba.OdWjQTkMobpoFUz7EbdS', '628888888888', 'JL Kemuning', 2, 1, 1620999851, '0007166675651213', 'Bank BRI');

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
(3, 1, 'My Profile', 'Admin/my_profile', 'nav-icon far fa-fw fa-user', 8, 1),
(5, 2, 'My Profile', 'Seller/my_profile', 'nav-icon far fa-fw fa-user', 8, 1),
(6, 1, 'Edit Profile', 'Admin/edit_profile', 'nav-icon fa fa-fw fa-user-edit', 9, 1),
(7, 2, 'Edit Profile', 'Seller/edit_profile', 'nav-icon fa fa-fw fa-user-edit', 9, 1),
(8, 1, 'Change Password', 'Admin/change_password', 'fa fa-fw fa-key', 10, 1),
(9, 2, 'Change Password', 'Seller/change_password', 'fa fa-fw fa-key', 10, 1),
(10, 2, 'Data Tanaman', 'Seller/data_tanaman', 'fa fa-fw fa-cube', 2, 1),
(11, 2, 'Riwayat Pesan', 'Seller/riwayat_penjualan', 'fa fa-fw fa-file-contract', 3, 1),
(12, 1, 'Data Users', 'Admin/data_user', 'nav-icon fa fa-fw fa-users', 2, 1),
(13, 1, 'Data Banner', 'Admin/data_banner', 'nav-icon fa fa-fw fa-scroll', 3, 1),
(14, 1, 'Data Penanaman', 'Admin/data_penanaman', 'nav-icon fa fa-fw fa-tree', 4, 1),
(15, 1, 'Data Perawatan', 'Admin/data_perawatan', 'nav-icon fa fa-fw fa-book-open', 5, 1),
(16, 2, 'Pengajuan Dana', 'Seller/pengajuan_dana', 'nav-icon fa fa-fw fa-money-bill', 4, 1),
(17, 1, 'Pencairan Dana', 'Admin/pencairan_dana', 'nav-icon fa fa-fw fa-money-bill', 6, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
