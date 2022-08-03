-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2022 pada 07.07
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kost`
--

CREATE TABLE `data_kost` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kost` varchar(255) NOT NULL,
  `kamar` varchar(255) NOT NULL,
  `toilet` varchar(255) NOT NULL,
  `kamar2` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kost`
--

INSERT INTO `data_kost` (`id`, `nama`, `harga`, `fasilitas`, `alamat`, `no_telepon`, `lokasi`, `kost`, `kamar`, `toilet`, `kamar2`, `user_id`) VALUES
(72, 'Asrama Tolaki', 'Rp. 450.000/Bulan', 'Kamar Tidur, WC, Dapur, Ruang Tamu', 'Jln. Kancil, Andonuhu', '082160565621', 'https://goo.gl/maps/EKVYCAtna3rfj8w47', 'Screenshot_(298).png', 'Screenshot_(299).png', 'Screenshot_(300).png', '10+_Best_Rick_and_Morty_Wallpapers_HD.png', 5),
(74, 'Kost Raka', 'Rp. 300.000/Bulan', 'Kamar Tidur, WC, Dapur, Ruang Tamu', 'Jln. Kancil, Andonuhu', '082160565621', 'https://goo.gl/maps/EKVYCAtna3rfj8w47', 'Live_gift.png', 'logo_genbi_id.png', 'logo_genbi_sultra.png', 'Muh_RiskyMirad.JPG', 22),
(75, 'Kost Cinta', 'Rp. 300.000/Bulan', 'Kamar Tidur, WC, Dapur, Ruang Tamu', 'Jln. Kancil, Andonuhu', '081234567890', 'https://goo.gl/maps/EKVYCAtna3rfj8w47', 'A_Selection_of_Projects.jpg', '10+_Best_Rick_and_Morty_Wallpapers_HD.png', 'Live_gift.png', 'Uyoo1.png', 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Iin Juliana Budiman', 'iinju.budiman@gmail.com', 'gambar.jpeg', '$2y$10$xWuosZyn76gIkbz5XXPdJ.31H9Pfqr1SHqJ.UvASD8ALqwGkw5ez2', 2, 1, 1655965894),
(21, 'Angela Stevani', 'angela@gmail.com', '1.png', '$2y$10$KgT/Gukix8nBgM67cnwDAOUU6yVyKf.RNt/aTS8yQlt88xStC0cZ2', 1, 1, 1658132099),
(22, 'Abdul Mulqi Rachman', 'mulqi@gmail.com', '1.png', '$2y$10$I7HtyviGCNthKwqok2c7tOSwH4GFbljehhtKM8YAzwVYe7clL3/B2', 2, 1, 1659190668),
(33, 'Muhammad Risky Mirad Rachman', 'rizkymirad177@gmail.com', 'Muh_RiskyMirad1.JPG', '$2y$10$nDt0pdkPTIrVG5X4XxJwP.EuXJhGTvNMaWtKhHHNZLmyw/geN5Ma.', 1, 1, 1659358594),
(34, 'Alfian Izzah', 'alfian@gmail.com', '1.png', '$2y$10$FkwxgaR4bJK1k9n9wSiR4ugYHeXo2fdMi3WxQlVXE9hE3elvFwfaO', 2, 1, 1659361581);

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
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(6, 1, 10),
(7, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Kost');

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
(1, 'Administrator'),
(2, 'Member');

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
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profil', 'user/edit', 'fas ta-fw fa-user-edit', 1),
(4, 3, 'Data Kost', 'kost', 'fas fa-fw fa-folder', 1),
(6, 1, 'Manajemen Akun', 'admin/editakun', 'fas fa-fw fa-user', 1),
(10, 2, 'Ubah Password', 'user/ubahpassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(32, 'rizkymirad177@gmail.com', 'pZKNP8WvkodJ9jW5IqefDbkYe06usqFpiDQQyWbrmS8=', 1659360797),
(33, 'alfian@gmail.com', 'AHhrgcWTlhMpT8jkf5RwUvNfPr3y1NtARmnYyo4fphI=', 1659361581);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kost`
--
ALTER TABLE `data_kost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kost`
--
ALTER TABLE `data_kost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_kost`
--
ALTER TABLE `data_kost`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
