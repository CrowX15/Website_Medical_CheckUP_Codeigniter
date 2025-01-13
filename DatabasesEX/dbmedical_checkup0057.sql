-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2025 pada 20.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmedical_checkup0057`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesimpulan`
--

CREATE TABLE `kesimpulan` (
  `no_rm` varchar(50) NOT NULL,
  `pemeriksaan_fisik` varchar(255) DEFAULT NULL,
  `thorax` varchar(255) DEFAULT NULL,
  `laboratorium` varchar(255) DEFAULT NULL,
  `saran` varchar(255) DEFAULT NULL,
  `imt` varchar(10) DEFAULT NULL,
  `tatalaksana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kesimpulan`
--

INSERT INTO `kesimpulan` (`no_rm`, `pemeriksaan_fisik`, `thorax`, `laboratorium`, `saran`, `imt`, `tatalaksana`) VALUES
('RM001', 'Normal', 'Tidak ada kelainan', 'Normal', 'Perbanyak olahraga', '22.5', 'Pemantauan rutin'),
('RM002', 'Pemeriksaan fisik menunjukkan gejala hipertensi', 'Kelainan ringan ditemukan', 'Hasil laboratorium menunjukkan kemungkinan hepatitis', 'Segera lakukan pengobatan', '28.5', 'Obat antihipertensi'),
('RM003', 'Tinggi badan normal, berat badan berlebih', 'Normal', 'Normal', 'Menurunkan berat badan', '30.1', 'Diet ketat dan olahraga'),
('RM004', 'Hipertensi sedang', 'Tidak ada kelainan', 'Hasil laboratorium normal', 'Kontrol tekanan darah', '27.8', 'Obat antihipertensi dan diet'),
('RM005', 'Kondisi fisik baik', 'Normal', 'Tidak ada kelainan', 'Lakukan pemeriksaan rutin', '24.2', 'Pemantauan berkala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboratorium`
--

CREATE TABLE `laboratorium` (
  `no_rm` varchar(50) NOT NULL,
  `id_tipeperiksa_lab` int(11) UNSIGNED NOT NULL,
  `hasil_lab` varchar(255) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laboratorium`
--

INSERT INTO `laboratorium` (`no_rm`, `id_tipeperiksa_lab`, `hasil_lab`, `biaya`) VALUES
('RM001', 1, 'Normal', 500000),
('RM002', 2, 'Abnormal', 750000),
('RM003', 3, 'Normal', 600000),
('RM004', 4, 'Abnormal', 800000),
('RM005', 5, 'Normal', 550000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_lab`
--

CREATE TABLE `master_lab` (
  `id_tipeperiksa_lab` int(11) UNSIGNED NOT NULL,
  `tipeperiksa_lab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_lab`
--

INSERT INTO `master_lab` (`id_tipeperiksa_lab`, `tipeperiksa_lab`) VALUES
(1, 'Tes Darah Lengkap'),
(2, 'Tes Gula Darah'),
(3, 'Tes Kolesterol'),
(4, 'Tes Asam Urat'),
(5, 'Tes Urin'),
(6, 'Tes Hemoglobin'),
(7, 'Tes Elektrolit'),
(8, 'Tes Fungsi Hati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_rad`
--

CREATE TABLE `master_rad` (
  `id_tipeperiksa_rad` int(11) UNSIGNED NOT NULL,
  `tipeperiksa_rad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_rad`
--

INSERT INTO `master_rad` (`id_tipeperiksa_rad`, `tipeperiksa_rad`) VALUES
(1, 'X-Ray Thorax'),
(2, 'CT Scan Kepala'),
(3, 'MRI Otak'),
(4, 'Ultrasonografi (USG) Abdomen'),
(5, 'X-Ray Dada'),
(6, 'CT Scan Abdomen'),
(7, 'MRI Punggung'),
(8, 'X-Ray Sendi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-12-31-160500', 'App\\Database\\Migrations\\Pasien', 'default', 'App', 1736767098, 1),
(2, '2024-12-31-161736', 'App\\Database\\Migrations\\MasterLab', 'default', 'App', 1736767098, 1),
(3, '2024-12-31-163146', 'App\\Database\\Migrations\\Laboratorium', 'default', 'App', 1736767098, 1),
(4, '2024-12-31-170345', 'App\\Database\\Migrations\\MasterRad', 'default', 'App', 1736767098, 1),
(5, '2024-12-31-174342', 'App\\Database\\Migrations\\Radiologi', 'default', 'App', 1736767099, 1),
(6, '2024-12-31-175004', 'App\\Database\\Migrations\\Periksa', 'default', 'App', 1736767099, 1),
(7, '2024-12-31-175847', 'App\\Database\\Migrations\\Kesimpulan', 'default', 'App', 1736767099, 1),
(8, '2025-01-05-030036', 'App\\Database\\Migrations\\Roles', 'default', 'App', 1736767100, 1),
(9, '2025-01-05-030057', 'App\\Database\\Migrations\\User', 'default', 'App', 1736767100, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `no_rm` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `perusahaan` varchar(100) DEFAULT NULL,
  `nik` int(16) DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `bagian` varchar(100) DEFAULT NULL,
  `usia` int(3) DEFAULT NULL,
  `tgl_mcu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_rm`, `nama`, `perusahaan`, `nik`, `departemen`, `bagian`, `usia`, `tgl_mcu`) VALUES
('RM001', 'John Doe', 'PT ABC', 2147483647, 'Produksi', 'Assembly', 30, '2025-01-01'),
('RM002', 'Jane Smith', 'PT XYZ', 2147483647, 'Keuangan', 'Akuntansi', 28, '2025-01-02'),
('RM003', 'Robert Brown', 'PT DEF', 2147483647, 'HRD', 'Rekrutmen', 35, '2025-01-03'),
('RM004', 'Emily Davis', 'PT GHI', 2147483647, 'IT', 'Support', 25, '2025-01-04'),
('RM005', 'Michael Wilson', 'PT JKL', 2147483647, 'Logistik', 'Pengiriman', 32, '2025-01-05'),
('RM006', 'Sarah Moore', 'PT MNO', 2147483647, 'Marketing', 'Promosi', 27, '2025-01-06'),
('RM007', 'Daniel Taylor', 'PT PQR', 2147483647, 'Produksi', 'Packing', 29, '2025-01-07'),
('RM008', 'Jessica Lee', 'PT STU', 2147483647, 'Keuangan', 'Perencanaan', 31, '2025-01-08'),
('RM009', 'Andrew White', 'PT VWX', 2147483647, 'R&D', 'Pengembangan', 33, '2025-01-09'),
('RM010', 'Karen Thomas', 'PT YZA', 2147483647, 'HRD', 'Pelatihan', 26, '2025-01-10'),
('RM011', 'Kevin Martinez', 'PT BCD', 2147483647, 'Produksi', 'Quality Control', 34, '2025-01-11'),
('RM012', 'Laura Hernandez', 'PT EFG', 2147483647, 'IT', 'Infrastruktur', 24, '2025-01-12'),
('RM013', 'Chris Martin', 'PT HIJ', 2147483647, 'Logistik', 'Penyimpanan', 36, '2025-01-13'),
('RM014', 'Sophia Garcia', 'PT KLM', 2147483647, 'Marketing', 'Distribusi', 22, '2025-01-14'),
('RM015', 'Ryan Walker', 'PT NOP', 2147483647, 'R&D', 'Desain Produk', 28, '2025-01-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `no_rm` varchar(50) NOT NULL,
  `batuk_darah` varchar(10) DEFAULT NULL,
  `kencing_batu` varchar(10) DEFAULT NULL,
  `hepatitis` varchar(10) DEFAULT NULL,
  `hernia` varchar(10) DEFAULT NULL,
  `hipertensi` varchar(10) DEFAULT NULL,
  `hemoroid` varchar(10) DEFAULT NULL,
  `diabetes` varchar(10) DEFAULT NULL,
  `tinggi_badan` varchar(10) DEFAULT NULL,
  `berat_badan` varchar(10) DEFAULT NULL,
  `nadi` varchar(10) DEFAULT NULL,
  `tekanan_darah` varchar(10) DEFAULT NULL,
  `visus` varchar(10) DEFAULT NULL,
  `buta_warna` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`no_rm`, `batuk_darah`, `kencing_batu`, `hepatitis`, `hernia`, `hipertensi`, `hemoroid`, `diabetes`, `tinggi_badan`, `berat_badan`, `nadi`, `tekanan_darah`, `visus`, `buta_warna`) VALUES
('RM001', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', '170 cm', '65 kg', 'Normal', '120/80 mmH', 'Normal', 'Tidak'),
('RM002', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', '165 cm', '70 kg', 'Normal', '130/85 mmH', 'Normal', 'Ya'),
('RM003', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', '180 cm', '80 kg', 'Normal', '120/80 mmH', 'Normal', 'Tidak'),
('RM004', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', '175 cm', '85 kg', 'Normal', '135/90 mmH', 'Normal', 'Ya'),
('RM005', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', '160 cm', '75 kg', 'Normal', '125/80 mmH', 'Normal', 'Tidak'),
('RM006', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', '155 cm', '60 kg', 'Normal', '110/70 mmH', 'Normal', 'Ya'),
('RM007', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', '185 cm', '90 kg', 'Normal', '140/90 mmH', 'Normal', 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `radiologi`
--

CREATE TABLE `radiologi` (
  `no_rm` varchar(50) NOT NULL,
  `id_tipeperiksa_rad` int(11) UNSIGNED NOT NULL,
  `hasil_rad` varchar(255) DEFAULT NULL,
  `kesimpulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `radiologi`
--

INSERT INTO `radiologi` (`no_rm`, `id_tipeperiksa_rad`, `hasil_rad`, `kesimpulan`) VALUES
('RM001', 1, 'Normal', 'Tidak ditemukan kelainan pada X-Ray Thorax.'),
('RM002', 2, 'Abnormal', 'Terdapat pembengkakan pada jaringan otak di CT Scan Kepala.'),
('RM003', 3, 'Normal', 'Tidak ditemukan masalah pada MRI Otak.'),
('RM004', 4, 'Abnormal', 'Ada kelainan pada liver yang terlihat pada Ultrasonografi (USG) Abdomen.'),
('RM005', 5, 'Normal', 'Tidak ada kelainan pada X-Ray Dada.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin_sirs', 'Administrator Sistem Informasi Rumah Sakit', '2025-01-13 11:18:19', '2025-01-13 11:18:19'),
(2, 'loket', 'Petugas Loket', '2025-01-13 11:18:19', '2025-01-13 11:18:19'),
(3, 'dokter', 'Dokter', '2025-01-13 11:18:19', '2025-01-13 11:18:19'),
(4, 'user_lab', 'User Laboratorium', '2025-01-13 11:18:19', '2025-01-13 11:18:19'),
(5, 'admin_lab', 'Admin Laboratorium', '2025-01-13 11:18:19', '2025-01-13 11:18:19'),
(6, 'user_rad', 'User Radiologi', '2025-01-13 11:18:19', '2025-01-13 11:18:19'),
(7, 'admin_rad', 'Admin Radiologi', '2025-01-13 11:18:19', '2025-01-13 11:18:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `password`, `email`, `role_id`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Admin SIRS', 'admin_sirs', '$2y$10$YIQLKxahbk22JjpTEOVOA.YXUNWZDzAdzE.Vhr85zhDEKAi4qefhi', 'admin_sirs@gmail.com', 1, '2025-01-13 04:18:30', '2025-01-13 04:18:30', '2025-01-13 04:18:30'),
(2, 'Loket User', 'user_loket', '$2y$10$suwB3dmgD26TfjpG4K8ir.sXbXjPxotZbakNbNrQ.IRSYnHSMvu4G', 'user_loket@gmail.com', 2, '2025-01-13 04:18:30', '2025-01-13 04:18:30', '2025-01-13 04:18:30'),
(3, 'Dokter User', 'user_dokter', '$2y$10$KZrCoUyr93ZL7.H9I3jRq.DaKUXtGSXxs29so6gz7NQ1UVxfzeV82', 'user_dokter@gmail.com', 3, '2025-01-13 04:18:30', '2025-01-13 04:18:30', '2025-01-13 04:18:30'),
(4, 'User Laboratorium', 'user_lab', '$2y$10$zGnspmcCQogZlOrpNaL39O/I03KiBJzmccqzwi6WvmZdO3Z/FZZe.', 'user_lab@gmail.com', 4, '2025-01-13 04:18:30', '2025-01-13 04:18:30', '2025-01-13 04:18:30'),
(5, 'Admin Laboratorium', 'admin_lab', '$2y$10$jBR3n5BZIECVqxdE8RJO2ePCqbOK2kWpn3J36e2J0XACb5DGoDiz2', 'admin_lab@gmail.com', 5, '2025-01-13 04:18:30', '2025-01-13 04:18:30', '2025-01-13 04:18:30'),
(6, 'User Radiologi', 'user_rad', '$2y$10$A6l3GApAqIs6YNqsNwDfXut7KtPswT3EpzXWsIHt8tLEJsKEITBzy', 'user_rad@gmail.com', 6, '2025-01-13 04:18:30', '2025-01-13 04:18:30', '2025-01-13 04:18:30'),
(7, 'Admin Radiologi', 'admin_rad', '$2y$10$gN56FGxUTENPohUnZrZNmOsmIqJ109dDZza/uHyuCfPkqeNp7sufy', 'admin_rad@gmail.com', 7, '2025-01-13 04:18:30', '2025-01-13 04:18:30', '2025-01-13 04:18:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kesimpulan`
--
ALTER TABLE `kesimpulan`
  ADD KEY `kesimpulan_no_rm_foreign` (`no_rm`);

--
-- Indeks untuk tabel `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD KEY `laboratorium_no_rm_foreign` (`no_rm`),
  ADD KEY `laboratorium_id_tipeperiksa_lab_foreign` (`id_tipeperiksa_lab`);

--
-- Indeks untuk tabel `master_lab`
--
ALTER TABLE `master_lab`
  ADD PRIMARY KEY (`id_tipeperiksa_lab`);

--
-- Indeks untuk tabel `master_rad`
--
ALTER TABLE `master_rad`
  ADD PRIMARY KEY (`id_tipeperiksa_rad`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD KEY `periksa_no_rm_foreign` (`no_rm`);

--
-- Indeks untuk tabel `radiologi`
--
ALTER TABLE `radiologi`
  ADD KEY `radiologi_no_rm_foreign` (`no_rm`),
  ADD KEY `radiologi_id_tipeperiksa_rad_foreign` (`id_tipeperiksa_rad`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_lab`
--
ALTER TABLE `master_lab`
  MODIFY `id_tipeperiksa_lab` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `master_rad`
--
ALTER TABLE `master_rad`
  MODIFY `id_tipeperiksa_rad` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kesimpulan`
--
ALTER TABLE `kesimpulan`
  ADD CONSTRAINT `kesimpulan_no_rm_foreign` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD CONSTRAINT `laboratorium_id_tipeperiksa_lab_foreign` FOREIGN KEY (`id_tipeperiksa_lab`) REFERENCES `master_lab` (`id_tipeperiksa_lab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laboratorium_no_rm_foreign` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_no_rm_foreign` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `radiologi`
--
ALTER TABLE `radiologi`
  ADD CONSTRAINT `radiologi_id_tipeperiksa_rad_foreign` FOREIGN KEY (`id_tipeperiksa_rad`) REFERENCES `master_rad` (`id_tipeperiksa_rad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiologi_no_rm_foreign` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
