-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Agu 2018 pada 07.50
-- Versi server: 10.2.16-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos`
--

CREATE TABLE `bos` (
  `id_bo` int(10) UNSIGNED NOT NULL,
  `id_ho` int(11) NOT NULL,
  `kode_bo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_sub_master_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bos`
--

INSERT INTO `bos` (`id_bo`, `id_ho`, `kode_bo`, `nama_bo`, `no_hp_sub_master_dompul`, `status_bo`) VALUES
(1, 1, 'PMK', 'Pamekasan', '', 1),
(2, 1, 'SMP', 'Sumenep', '', 1),
(3, 2, 'OFF', 'Office', '', 1),
(4, 2, 'OFS', 'Office SDA', '', 1),
(5, 3, 'MDN', 'Madiun', '', 1),
(6, 3, 'NGW', 'Ngawi', '', 1),
(7, 3, 'TLG', 'Tulungagung', '', 1),
(8, 1, 'BKL', 'Bangkalan', '', 1),
(9, 2, 'BJN', 'Bojonegoro', '', 1),
(10, 1, 'SMP', 'Sampang', '', 1),
(11, 2, 'SDA', 'Sidoarjo', '081998062641', 1),
(12, 2, 'GRK', 'Gresik', '', 1),
(13, 2, 'LMG', 'Lamongan', '', 1),
(14, 2, 'JMB', 'Jombang', '', 1),
(15, 2, 'MJK', 'Mojokerto', '', 1),
(16, 2, 'TBN', 'Tuban', '081938062644', 1),
(17, 3, 'TRK', 'Trenggalek', '', 0),
(18, 3, 'KDR', 'Kediri', '', 0),
(19, 3, 'NJK', 'Nganjuk', '', 0),
(20, 3, 'BTR', 'Blitar', '', 0),
(21, 3, 'PCT', 'Pacitan', '', 0),
(22, 3, 'PNG', 'Ponorogo', '', 0),
(23, 1, 'MDR', 'Madura', '', 0),
(24, 3, 'MGN', 'Magetan', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_bayars`
--

CREATE TABLE `cara_bayars` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cara_bayars`
--

INSERT INTO `cara_bayars` (`id`, `keterangan`, `status`) VALUES
(1, 'DP 50% diawal. 50% sebelum serah terima unit', 1),
(2, 'DP 40% diawal. 60% sebelum serah terima unit', 1),
(3, 'DP 30% diawal. 70% sebelum serah terima unit', 1),
(4, 'Full Payment Leasing', 1),
(5, 'Full Payment Pribadi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran_pembelian_dompuls`
--

CREATE TABLE `detail_pembayaran_pembelian_dompuls` (
  `id_detail_pembayaran_dompul` int(10) UNSIGNED NOT NULL,
  `id_pembelian_dompul` int(11) NOT NULL,
  `metode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_pusat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_cabang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mandiri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nominal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pembayaran_pembelian_dompuls`
--

INSERT INTO `detail_pembayaran_pembelian_dompuls` (`id_detail_pembayaran_dompul`, `id_pembelian_dompul`, `metode_pembayaran`, `cash`, `bca_pusat`, `bca_cabang`, `mandiri`, `bni`, `bri`, `nominal`, `catatan`, `deleted`) VALUES
(1, 1, 'BCA Pusat', '0', '80.004,925', '0', '0', '0', '0', '80004.925', 'Lunas', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran_pembelian_sps`
--

CREATE TABLE `detail_pembayaran_pembelian_sps` (
  `id_detail_pembayaran_psp` int(10) UNSIGNED NOT NULL,
  `id_pembelian_sp` int(11) NOT NULL,
  `metode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_pusat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_cabang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mandiri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nominal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran_sps`
--

CREATE TABLE `detail_pembayaran_sps` (
  `id_detail_pembayaran_sp` int(10) UNSIGNED NOT NULL,
  `id_penjualan_sp` int(11) NOT NULL,
  `metode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_pusat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_cabang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mandiri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nominal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian_dompuls`
--

CREATE TABLE `detail_pembelian_dompuls` (
  `id_detail_pembelian_dompul` int(10) UNSIGNED NOT NULL,
  `id_pembelian_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tipe_harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` double(8,2) NOT NULL,
  `harga_total` double(8,2) NOT NULL,
  `keterangan_detail_pd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_detail_pd` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pembelian_dompuls`
--

INSERT INTO `detail_pembelian_dompuls` (`id_detail_pembelian_dompul`, `id_pembelian_dompul`, `id_supplier`, `produk`, `jumlah`, `tipe_harga`, `harga_satuan`, `harga_total`, `keterangan_detail_pd`, `status_detail_pd`) VALUES
(1, '1', 1, 'DOMPUL', 5, 'SERVER', 98.00, 492.00, 'none', 1),
(2, '1', 1, 'DP10', 5, 'HI', 10000.00, 50000.00, 'none', 1),
(3, '1', 1, 'DP5', 6, 'HI', 5000.00, 30000.00, 'none', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian_sps`
--

CREATE TABLE `detail_pembelian_sps` (
  `id_detail_pembelian_sp` int(10) UNSIGNED NOT NULL,
  `id_pembelian_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_sp` int(11) NOT NULL,
  `tipe_harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_total` bigint(20) NOT NULL,
  `keterangan_detail_psp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_detail_psp` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan_dompuls`
--

CREATE TABLE `detail_penjualan_dompuls` (
  `id_detail_penjualan` int(10) UNSIGNED NOT NULL,
  `id_penjualan_dompul` int(11) NOT NULL,
  `metode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_pusat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bca_cabang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mandiri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nominal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan_sps`
--

CREATE TABLE `detail_penjualan_sps` (
  `id_detail_penjualan_sp` int(10) UNSIGNED NOT NULL,
  `id_penjualan_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_sp` int(11) NOT NULL,
  `tipe_harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_total` bigint(20) NOT NULL,
  `keterangan_detail_psp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_detail_psp` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hos`
--

CREATE TABLE `hos` (
  `id_ho` int(10) UNSIGNED NOT NULL,
  `kode_ho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ho` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_stok_dompuls`
--

CREATE TABLE `kartu_stok_dompuls` (
  `id_stok_dompul` int(10) UNSIGNED NOT NULL,
  `id_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `nomor_referensi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_transaksi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `masuk` bigint(20) NOT NULL,
  `keluar` bigint(20) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_stok_dompul` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kartu_stok_dompuls`
--

INSERT INTO `kartu_stok_dompuls` (`id_stok_dompul`, `id_produk`, `id_sales`, `id_lokasi`, `tanggal_transaksi`, `nomor_referensi`, `jenis_transaksi`, `keterangan`, `masuk`, `keluar`, `tanggal_input`, `id_user`, `status_stok_dompul`) VALUES
(1, 'DOMPUL', NULL, 4, '2018-08-30 00:00:00', '1', 'PEMBELIAN', 'SERVER-', 5, 0, '2018-08-30 00:00:00', 1, 0),
(2, 'DP10', NULL, 4, '2018-08-30 00:00:00', '1', 'PEMBELIAN', 'HI-', 5, 0, '2018-08-30 00:00:00', 1, 0),
(3, 'DP5', NULL, 4, '2018-08-30 00:00:00', '1', 'PEMBELIAN', 'HI-', 6, 0, '2018-08-30 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_stok_sps`
--

CREATE TABLE `kartu_stok_sps` (
  `id_stok_sp` int(10) UNSIGNED NOT NULL,
  `id_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `nomor_referensi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_transaksi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `masuk` bigint(20) NOT NULL,
  `keluar` bigint(20) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_stok_sp` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasbon_tabels`
--

CREATE TABLE `kasbon_tabels` (
  `id_kasbon` int(10) UNSIGNED NOT NULL,
  `id_spkpb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_kasbon` date DEFAULT NULL,
  `nm_kasbon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kasbon` double NOT NULL,
  `sisa_borongan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_banks`
--

CREATE TABLE `master_banks` (
  `id_bank` int(10) UNSIGNED NOT NULL,
  `kode_bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_banks`
--

INSERT INTO `master_banks` (`id_bank`, `kode_bank`, `nama_bank`, `status_bank`) VALUES
(1, 'BNK-1', 'Cash', 'Aktif'),
(2, 'BNK-2', 'Bank BRI', 'Aktif'),
(3, 'BNK-3', 'Bank Mandiri', 'Aktif'),
(4, 'BNK-4', 'Bank BNI', 'Aktif'),
(5, 'BNK-5', 'Bank BCA (Pusat)', 'Aktif'),
(6, 'BNK-6', 'Bank BCA Cabang Sidoarjo', 'Aktif'),
(7, 'BNK-7', 'Bank BCA Cabang Madiun', 'Aktif'),
(8, 'BNK-8', 'Bank BCA Cabang Madura', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_customers`
--

CREATE TABLE `master_customers` (
  `id_cust` int(10) UNSIGNED NOT NULL,
  `nm_cust` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_cust` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_customers`
--

INSERT INTO `master_customers` (`id_cust`, `nm_cust`, `alamat_cust`, `no_hp`, `jabatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Salamun Rohman', 'Puri Gunung Anyar Regency', '08121713320', 'owner', 1, '2018-08-29 18:41:42', '2018-08-29 18:41:42'),
(2, 'Ekohariyadi', 'Jl. Ikan Nilam M-4 Sidoarjo', '08155078973', 'owner', 1, '2018-08-29 18:41:42', '2018-08-29 18:41:42'),
(3, 'Dedy Rahman P', 'Palm Spring Regency Blok A/26 Jambangan', '08123220710', 'owner', 1, '2018-08-29 18:41:42', '2018-08-29 18:41:42'),
(4, 'Meini Sondang S', 'Baratajaya IV/104 Surabaya', '0818336488', 'owner', 1, '2018-08-29 18:41:43', '2018-08-29 18:41:43'),
(5, 'Ardhini Warih Utami', 'Jojoran III C/58 Surabaya', '0818595272', 'owner', 1, '2018-08-29 18:41:43', '2018-08-29 18:41:43'),
(6, 'SASMITA CELL', 'Gresik', '087750955792', 'owner', 1, '2018-08-29 18:41:44', '2018-08-29 18:41:44'),
(7, 'GFR CELL KRIAN', 'Sidoarjo', '081803000271', 'owner', 1, '2018-08-29 18:41:44', '2018-08-29 18:41:44'),
(8, 'SUNTORO CELLKRIAN', 'Sidoarjo', '081938450042', 'owner', 1, '2018-08-29 18:41:45', '2018-08-29 18:41:45'),
(9, 'PULSA PULSA', 'Jombang', '081913132540', 'owner', 1, '2018-08-29 18:41:45', '2018-08-29 18:41:45'),
(10, 'CYBER CELL', 'Bojonegoro', '081913132354', 'owner', 1, '2018-08-29 18:41:45', '2018-08-29 18:41:45'),
(11, 'GRK ID CELL', '7979 Osinski Square Apt. 238\nLake Jackport, ME 33012-0693', '081913810492', 'Rental Clerk', 1, NULL, NULL),
(12, 'GRK ID 2 CELL', '91169 Antonetta Turnpike Suite 646\nNorth Nico, NH 07052-1928', '081913810638', 'Rail Transportation Worker', 1, NULL, NULL),
(13, 'Yoga 2 Cell', '366 Bernhard River\nSwaniawskiberg, WA 51604-0045', '087854000320', 'Biological Science Teacher', 1, NULL, NULL),
(14, 'MARS CELL SEDATI', '821 Janice Via Suite 954\nKelsiview, LA 88828-1572', '08179392388', 'Postmasters', 1, NULL, NULL),
(15, '3D CELL', '373 Brett Light\nFreddyshire, OH 83776', '081939870837', 'Logging Tractor Operator', 1, NULL, NULL),
(16, '46 CELL', '5045 Jillian Branch Apt. 156\nNew Reginald, TN 93820-4222', '081938062435', 'Sys Admin', 1, NULL, NULL),
(17, 'AGUS CELL', '52308 Yolanda River\nWest Evemouth, IN 29651-6663', '087750954914', 'Chemical Equipment Operator', 1, NULL, NULL),
(18, 'VINA CELL KRIAN', '313 Dawson Fort Suite 927\nNorth Alayna, CO 34988', '081931572439', 'Rough Carpenter', 1, NULL, NULL),
(19, 'ROYAL PONSEL', '151 Carter Plaza\nLionelmouth, NV 41749-8205', '085931398333', 'Library Worker', 1, NULL, NULL),
(20, 'BJN TOFA CEL', '6387 Schuppe Trace Suite 706\nEast Kaleigh, OH 90852', '087750954146', 'Creative Writer', 1, NULL, NULL),
(21, 'GRK ALIF CELL BUNGA', '97927 Carter Parkway Suite 535\nPort Collinberg, CO 00072', '087856230161', 'Printing Press Machine Operator', 1, NULL, NULL),
(22, 'GRK BRALINK CELL', '22451 Little Trail\nJonesburgh, MD 53987', '087856231710', 'Plating Operator OR Coating Machine Operator', 1, NULL, NULL),
(23, 'CAESAR CELL', '72140 Peggie Plaza\nFreddiefort, FL 69572-7060', '087856560771', 'Recyclable Material Collector', 1, NULL, NULL),
(24, 'GRK RIZKY CELL DRIYOREJO', '8262 Robel Prairie Apt. 521\nSmithport, KY 83439', '087851052065', 'Photoengraving Machine Operator', 1, NULL, NULL),
(25, 'WB cell 3', '5077 Will Plain\nPort Drake, KY 51086-2847', '081938063636', 'Video Editor', 1, NULL, NULL),
(26, 'GRK LOVIE CELL', '86328 Nicolette Cape\nWest Julietstad, SC 86532', '081913811402', 'Able Seamen', 1, NULL, NULL),
(27, 'Puma cell.', '8869 Bashirian Motorway Suite 763\nSouth Christopheton, HI 45384', '081938072787', 'Motorboat Operator', 1, NULL, NULL),
(28, 'WB 2 CELL WEDORO', '3410 Murphy Roads\nSouth Daisy, SC 04159', '081938062597', 'Precision Aircraft Systems Assemblers', 1, NULL, NULL),
(29, 'IN PULSA', '4170 Gulgowski Plains Suite 409\nMitchellton, WA 61652', '081938063515', 'Dredge Operator', 1, NULL, NULL),
(30, 'KARYA UNGGUL 1', '590 Rolando Estates\nSchusterton, VA 43324', '081938063621', 'Crushing Grinding Machine Operator', 1, NULL, NULL),
(31, 'DRIAN CELL', '167 Bashirian Stravenue Suite 148\nSouth Vellahaven, MT 12639-9076', '081913115801', 'Drywall Ceiling Tile Installer', 1, NULL, NULL),
(32, 'REGGAE CELL', '71648 Swift Circle Apt. 437\nLake Aimeeview, MN 20290', '081938802022', 'Parking Enforcement Worker', 1, NULL, NULL),
(33, 'GRK HANIF CELL', '697 Alford Vista Suite 494\nPort Madelynfurt, NY 26509', '087854153457', 'Civil Drafter', 1, NULL, NULL),
(34, 'GRK EXOTIK 2 CELL', '803 Ruecker Ways\nBetsyfurt, WY 08344', '081949610770', 'Musical Instrument Tuner', 1, NULL, NULL),
(35, 'ZIP CELL', '776 Zoey Fork Suite 172\nWest Kaycee, AR 19820-3835', '081938545658', 'Special Education Teacher', 1, NULL, NULL),
(36, 'FATIN CELL', '1491 Isabella Mills Suite 428\nAngelofort, IL 17398', '087757117337', 'Sound Engineering Technician', 1, NULL, NULL),
(37, 'NURI CELL', '467 Von Ville Apt. 081\nVolkmantown, IA 82931-2938', '08179360960', 'Maintenance Supervisor', 1, NULL, NULL),
(38, 'ABADI CELL CANDI', '8713 Terence Isle\nRomabury, NC 74557', '087859587485', 'Animal Control Worker', 1, NULL, NULL),
(39, 'BJG MEHDI CELL', '8779 Ottis Glens\nLolaport, IN 37568', '081949610499', 'Professional Photographer', 1, NULL, NULL),
(40, 'GRK INTAN CELL DRIYOREJO', '40798 Grady Shoals Apt. 610\nWest Walker, CT 12262', '087856002458', 'Precision Lens Grinders and Polisher', 1, NULL, NULL),
(41, 'PRINCE CELL 2', '336 Reilly Prairie Suite 779\nSouth Jayson, GA 36709', '081703366562', 'Fashion Model', 1, NULL, NULL),
(42, 'RIYA', '7320 Price Plains\nStehrmouth, ND 93965-2911', '087856080219', 'Manager', 1, NULL, NULL),
(43, 'KHARISMA CELL WARU1', '800 Leopold Square Apt. 501\nPearlinemouth, IN 18522', '081703364170', 'Educational Counselor OR Vocationall Counselor', 1, NULL, NULL),
(44, 'Bejo Cell', '9922 Schulist Lodge\nCandacetown, MO 73699-9944', '081938062399', 'Architect', 1, NULL, NULL),
(45, 'SARI TRISNO CELL', '652 Chasity Cliff Suite 669\nEast Evan, CA 66812', '081703351437', 'Service Station Attendant', 1, NULL, NULL),
(46, 'KNK CELL', '249 Greenfelder Mews\nLake Pete, CT 35909', '087750955413', 'Recyclable Material Collector', 1, NULL, NULL),
(47, 'ARJOM CELL', '4035 Demarcus Hills Suite 232\nDominiquemouth, WV 95791', '087757029554', 'Teacher', 1, NULL, NULL),
(48, 'E CELL JOMBANG', '4676 Collins Summit\nPort Abrahamside, HI 73250-1470', '081913242263', 'Civil Engineer', 1, NULL, NULL),
(49, 'RISKA CELL', '7150 Michael Cove\nKassandrahaven, NV 24006-9768', '087850809537', 'Personal Trainer', 1, NULL, NULL),
(50, 'DNS CELL', '868 Amy Inlet\nBreannaton, GA 23502-3395', '081703921482', 'Retail Sales person', 1, NULL, NULL),
(51, 'ABADI CELL 2', '60414 Klocko Drive Suite 281\nBetteburgh, UT 36733-5261', '081913242753', 'Shampooer', 1, NULL, NULL),
(52, 'MERAH CELL', '2793 Jast Highway Suite 655\nNew Rickiemouth, IL 15501', '081938073048', 'Refinery Operator', 1, NULL, NULL),
(53, 'ARSYAF CELL', '7940 Little Place\nLake Mallorymouth, MI 83175-5419', '081938062493', 'Tire Builder', 1, NULL, NULL),
(54, 'ANDIK CELL TAMAN', '675 Kulas Highway Suite 866\nLupeland, KS 56868', '081703930418', 'Plating Operator', 1, NULL, NULL),
(55, 'RAMADHAN CELL', '245 Catharine Grove Apt. 431\nWinstonport, ME 10649-3424', '081935052119', 'Glazier', 1, NULL, NULL),
(56, 'AL FATIH CELL', '665 Jamison Extension\nSouth Raul, MD 75585', '081938063523', 'Health Practitioner', 1, NULL, NULL),
(57, 'GAMBIRAN 1', '527 Ramona Wall\nLake Tommiechester, HI 25090-0197', '087757029454', 'Loan Interviewer', 1, NULL, NULL),
(58, 'KHOIR PULSA', '420 Ottis Fords Suite 332\nEast Lexie, SD 28343', '087751710230', 'Central Office and PBX Installers', 1, NULL, NULL),
(59, 'KARANG CELL', '951 Mary Cliff\nKathlynview, ID 07017', '087757029439', 'Letterpress Setters Operator', 1, NULL, NULL),
(60, 'amanah cell', '502 Isai Street Apt. 818\nDietrichview, MA 78495-0835', '081938072883', 'Computer Software Engineer', 1, NULL, NULL),
(61, 'MANDIRI CELL', '727 Drake Islands\nLake Taliabury, HI 11862-8718', '081803104600', 'Electronic Engineering Technician', 1, NULL, NULL),
(62, 'PRESIDEN  CELL', '5239 Brenda Vista Apt. 430\nArishire, MO 20664', '081938063111', 'Account Manager', 1, NULL, NULL),
(63, 'HM PULSA', '752 Cummerata Run\nLake Jayceefort, MT 47744-7258', '081938831922', 'Geographer', 1, NULL, NULL),
(64, 'ABI PULSA', '34312 Cleve Views\nPort Eliseoborough, MT 16334-2257', '087856560368', 'Hotel Desk Clerk', 1, NULL, NULL),
(65, 'MBOX CELL', '5667 Cleta Locks Apt. 188\nNorth Chad, AK 53374', '087856413050', 'Online Marketing Analyst', 1, NULL, NULL),
(66, 'NAGANO CELL', '809 Adan Fork\nCodyside, KS 50449-8543', '081938062617', 'Decorator', 1, NULL, NULL),
(67, 'VITA CELL', '2718 Wilson Ford\nAshleyport, SC 80697', '085932609135', 'Brazer', 1, NULL, NULL),
(68, 'GRK RENDY CELL', '5747 Brice Walk Suite 764\nSouth Destineeport, CA 41037', '081949610646', 'Metal Pourer and Caster', 1, NULL, NULL),
(69, 'AAN CELL', '5745 Providenci Mountains Suite 078\nNew Kameron, NE 24725-8568', '087856560342', 'Personal Service Worker', 1, NULL, NULL),
(70, 'ALKAUTASAR COMP CELL', '31020 Lilian Mews Suite 420\nBrekkeport, NV 33909-3211', '087856560297', 'Home Appliance Repairer', 1, NULL, NULL),
(71, 'WARTEL DAMAI', '4598 Lorena Junction Suite 847\nSchummland, NJ 20269-5842', '081913849295', 'Sales Representative', 1, NULL, NULL),
(72, 'SUSAN CELL', '989 Ryder Squares Suite 113\nSmithfort, NY 64485-1430', '081949610951', 'Optometrist', 1, NULL, NULL),
(73, 'REJO CELL', '6633 Jerad Mountains\nBartolettihaven, OR 86961-5513', '087854153236', 'Cartographer', 1, NULL, NULL),
(74, 'Noval cell', '8618 Kihn Plaza\nNew Rosario, HI 50616-7928', '081938063727', 'User Experience Manager', 1, NULL, NULL),
(75, 'FATQUL CELL', '484 Waelchi Village Apt. 373\nNew Cory, SC 24166', '081803124154', 'Radiation Therapist', 1, NULL, NULL),
(76, 'Golden Phonsel', '8416 Cassin Station\nNew Norma, DE 26953', '081938072823', 'Sys Admin', 1, NULL, NULL),
(77, 'JUMBO CELL', '7444 Klocko Spur\nOceaneburgh, NY 07213-8147', '081703355929', 'Bailiff', 1, NULL, NULL),
(78, 'ALI CELL', '8223 Marks Vista\nReynoldsfurt, PA 19061-4654', '081938072824', 'Medical Laboratory Technologist', 1, NULL, NULL),
(79, 'SHAFIRA CELL', '57713 Strosin Street\nBrayanbury, GA 90313-1962', '085932609437', 'Gluing Machine Operator', 1, NULL, NULL),
(80, 'ARRL CELL TAMAN', '8508 Stark Mountains\nJaskolskiton, IN 38203', '087856439451', 'Waiter', 1, NULL, NULL),
(81, 'MASTER 88', '967 Mollie Isle Apt. 072\nEast Zula, WV 20324-3384', '081938450424', 'Environmental Science Technician', 1, NULL, NULL),
(82, 'RISKI CELL', '272 Abshire Dale\nSouth Luella, IA 81711', '081703350149', 'Wind Instrument Repairer', 1, NULL, NULL),
(83, 'JAYA NATA', '6664 Judah Curve Apt. 407\nWest Gunnerberg, WI 19017-2990', '081931074833', 'Electrical Drafter', 1, NULL, NULL),
(84, 'DUTA CELL SUKO', '9700 Diamond Ports\nKaiahaven, VA 47113', '081931074324', 'Dental Hygienist', 1, NULL, NULL),
(85, 'yola cell', '31718 Karolann Trace\nVernshire, ID 14767-9689', '081938063464', 'Heat Treating Equipment Operator', 1, NULL, NULL),
(86, 'SANJAYA CELL SUKODONO', '81939 Cummings Dale Apt. 705\nSchultzland, AZ 21277-0378', '081913243511', 'Credit Checker', 1, NULL, NULL),
(87, 'TBN ONE CELL', '38842 Keeling Lake\nPort Burdettemouth, MT 80589-0186', '087856099050', 'Electrician', 1, NULL, NULL),
(88, 'GRK AGP CELL', '5841 Maia Trafficway\nNew Vitafurt, TX 75291', '081913810285', 'Glass Blower', 1, NULL, NULL),
(89, 'ASKAR', '438 Florida Trace\nEast Brennanmouth, MI 19119', '081913131790', 'Grinder OR Polisher', 1, NULL, NULL),
(90, 'PULSA CELL', '11648 O\'Reilly Summit Apt. 792\nLake Edgardo, WY 44627-9675', '081938062636', 'Tank Car', 1, NULL, NULL),
(91, 'GRK MHAN CELL', '7684 Grimes Course\nEast Marisastad, ME 79817-1844', '087856242200', 'Physicist', 1, NULL, NULL),
(92, 'GRK INUNK PHONE', '58895 Jordy Fork\nWeissnattown, IA 43683', '087856309425', 'Heaters', 1, NULL, NULL),
(93, 'REDJO CELL', '5321 Dolores Views Suite 617\nEast Katelyn, MN 52193', '087757029594', 'Glazier', 1, NULL, NULL),
(94, 'KARTIKA CELL', '35122 Margret Crest\nKilbackville, VT 72952', '081935060296', 'Technical Program Manager', 1, NULL, NULL),
(95, 'LUV CELL SIDOKLUMPUK', '5581 Dylan Village Suite 949\nRuthland, PA 41663-8644', '081703284886', 'Interior Designer', 1, NULL, NULL),
(96, 'gembrot cell', '599 Arvel Groves Suite 928\nKundemouth, CO 02841', '081938072705', 'Stationary Engineer', 1, NULL, NULL),
(97, 'DIANA CELL', '26731 Jacobson Key\nPort Robbie, MN 12267', '087757029600', 'Lodging Manager', 1, NULL, NULL),
(98, 'HAFIDZ CELL', '5444 Angie Mountain Apt. 162\nEast Carlie, MA 86872-3894', '081703356729', 'Mapping Technician', 1, NULL, NULL),
(99, 'BAMBANG CELL GUDO', '5061 Jacey Cliff Apt. 678\nLake Miguelside, CO 94124-4880', '087856412967', 'Photoengraving Machine Operator', 1, NULL, NULL),
(100, 'GRK LANCAR JAYA', '2440 Wolff Wall Apt. 025\nKadetown, CO 81117-5434', '081703674848', 'Fire Fighter', 1, NULL, NULL),
(101, 'TINO CELL', '34743 Fay Shoals\nLake Fosterborough, TN 98161-9604', '081938072764', 'Multi-Media Artist', 1, NULL, NULL),
(102, 'DONN CELL MOJOKERTO', '928 Clemmie Cliffs Suite 690\nNew Jeremieshire, NH 59786', '087856560346', 'Insulation Installer', 1, NULL, NULL),
(103, 'TALITA CELL', '888 Alberta Pines\nWillfurt, AL 03778-6346', '081935051709', 'ccc', 1, NULL, NULL),
(104, 'ADINATA 2 CELL WARU', '8392 Nya Neck\nWest Ima, FL 66512', '087856439508', 'Welfare Eligibility Clerk', 1, NULL, NULL),
(105, 'JAGO CELL', '169 Schmeler Islands\nKarliside, RI 14518', '081938063640', 'Production Laborer', 1, NULL, NULL),
(106, 'GRK JAYA SAKTI 1', '765 Jabari Mountain\nLorenzmouth, AZ 06119-1860', '081703357602', 'Retail Sales person', 1, NULL, NULL),
(107, 'GRK JAYA SAKTI 3', '45786 Hoeger Loop\nPort Mandyburgh, CO 54269-1111', '081931077529', 'Locomotive Firer', 1, NULL, NULL),
(108, 'RIFDAH PULSA KRIAN', '968 Kaden Extensions Suite 225\nEmmanueltown, NY 76325', '081913243373', 'Physical Scientist', 1, NULL, NULL),
(109, 'diamond cell', '738 Michaela Field\nFredhaven, WV 05845', '081938063632', 'Employment Interviewer', 1, NULL, NULL),
(110, 'GRK CAM CAM CELL', '168 Runte Drive Suite 243\nIgnaciomouth, MA 66966', '081949640883', 'Forging Machine Setter', 1, NULL, NULL),
(111, 'AHA CELL', '9593 Baumbach Passage Apt. 408\nVerlaport, NH 09151', '081938830173', 'Executive Secretary', 1, NULL, NULL),
(112, 'SHADOW CELL', '34473 Maryse Via Suite 420\nEast Christophe, NC 60441-5033', '081803171281', 'Sailor', 1, NULL, NULL),
(113, 'queen cell', '120 Kuhn Circles Apt. 207\nLake Verna, ME 30159-9456', '081938063731', 'Food Science Technician', 1, NULL, NULL),
(114, 'GRK G TA CELL', '8378 Delia Path Suite 037\nAbbieborough, CO 92596', '087856309517', 'Gaming Manager', 1, NULL, NULL),
(115, 'RIFSA CELL', '735 Antoinette Spur\nColliermouth, ME 22717-3076', '087856000127', 'Recreational Vehicle Service Technician', 1, NULL, NULL),
(116, 'DANS CELL', '1389 Stokes Freeway Apt. 936\nNorth Leonelfurt, AK 75513', '081703362661', 'Underground Mining', 1, NULL, NULL),
(117, 'CAHAYA CELL 2', '8780 Cathy Unions\nWest Destinee, KS 09833', '081913130231', 'Buyer', 1, NULL, NULL),
(118, 'queen cell 2', '329 Fadel Dam\nLake Israel, WA 74821-5104', '081938063711', 'Mechanical Drafter', 1, NULL, NULL),
(119, 'REVAN CELL', '3625 Mante Viaduct Apt. 565\nHuelfort, SC 66065', '081938062591', 'Nursery Manager', 1, NULL, NULL),
(120, 'ASA CELL', '86651 Kiley Rest\nSylviabury, OK 15878', '087750958101', 'Bailiff', 1, NULL, NULL),
(121, 'GRK BON CELL', '2184 Prohaska Flat\nPort Sylvia, MA 75432-5694', '087856002572', 'Spraying Machine Operator', 1, NULL, NULL),
(122, 'HAFIDZ AS', '9622 Keebler Islands\nHeidenreichfort, DC 34439-4360', '081946410254', 'Bulldozer Operator', 1, NULL, NULL),
(123, 'ION CELL', '9666 Williamson Summit Suite 721\nIsaacfurt, NY 10090-1881', '081946410304', 'Physics Teacher', 1, NULL, NULL),
(124, 'SHARI CELL', '327 Gutkowski Rapids\nSchinnerfurt, RI 92081-8958', '087750957697', 'CSI', 1, NULL, NULL),
(125, 'PATPAN CELULAR 3', '130 Feest Grove Suite 201\nNew Roxanne, DC 48346', '081938562086', 'Welder and Cutter', 1, NULL, NULL),
(126, 'FANI CELL', '31188 Darion Glens Apt. 182\nRomaguerahaven, GA 36503', '081703921261', 'Sailor', 1, NULL, NULL),
(127, 'GRK ZAHERA CELL', '5883 Maudie Forge Suite 307\nStonestad, AR 53207', '087856002417', 'Educational Psychologist', 1, NULL, NULL),
(128, 'PAT PAN 1 CELL', '1214 Elian Ridges Suite 043\nCletafurt, IN 05264', '081703813590', 'Nursing Instructor', 1, NULL, NULL),
(129, 'GRK JBI SAMSON', '25983 Tyson Ranch\nEast Mathewview, SD 04551-3705', '087856240588', 'Agricultural Inspector', 1, NULL, NULL),
(130, 'REDZCARD', '7469 Kendall Creek Suite 574\nPort Dante, TX 07642-0580', '081938063427', 'Plate Finisher', 1, NULL, NULL),
(131, 'ZEFIRA CELL', '28978 Mercedes Walk\nPort Ericside, MN 47396-0759', '087856560107', 'Supervisor of Customer Service', 1, NULL, NULL),
(132, 'ONE CELL', '45302 Kilback Estate\nWest Harmonborough, UT 03051', '081703352253', 'Welder', 1, NULL, NULL),
(133, 'AFFAN', '6636 Trace Glen Suite 275\nEast Peggiechester, IN 97778-2666', '081938544392', 'Medical Technician', 1, NULL, NULL),
(134, 'CITY CELL', '936 Noemie Mountain Suite 743\nPort Addisonberg, AR 57673-8323', '081938062428', 'Operating Engineer', 1, NULL, NULL),
(135, 'GRK WONGKOL CELL', '3011 Dooley Highway\nNew Cyrus, NM 79716', '087856232004', 'Graphic Designer', 1, NULL, NULL),
(136, 'GRK EXOTIC', '9838 Herzog Summit Suite 901\nHeidenreichside, VT 97738-6952', '081913849545', 'Forging Machine Setter', 1, NULL, NULL),
(137, 'GRK WONG 9 CELL', '8604 Hilpert Trail\nLewisfort, MS 53607-4785', '087856560576', 'Life Scientists', 1, NULL, NULL),
(138, 'RAHMA CELL CANDI', '93856 Boehm Fork\nKayliehaven, WI 58978', '081703350261', 'Licensed Practical Nurse', 1, NULL, NULL),
(139, 'PERDANA SELULAR', '61957 Haley Gateway\nNorth Clotildefurt, TX 55995', '085932609448', 'Audio and Video Equipment Technician', 1, NULL, NULL),
(140, 'AIS PHONE', '342 Leland Islands\nLake Mireya, AK 49760', '081931074317', 'Computer Security Specialist', 1, NULL, NULL),
(141, 'BJG DD CELL', '211 Polly Parkway\nOrieside, IN 90257-5952', '087850511096', 'Painting Machine Operator', 1, NULL, NULL),
(142, 'MIKAL CELL 2 KLUDAN', '35587 Casper Hill Apt. 359\nWunschport, DE 19845', '081703813631', 'Materials Engineer', 1, NULL, NULL),
(143, 'WONG 9 CELL 2', '572 Norwood Manors\nJoaniefurt, CA 09621-2109', '081913814628', 'Licensing Examiner and Inspector', 1, NULL, NULL),
(144, 'MIKAL CELL 2', '43567 Zulauf Coves Apt. 788\nNorth Jonathanborough, KS 79530-9245', '087859587449', 'Transformer Repairer', 1, NULL, NULL),
(145, 'Dina Maya cell', '559 Kathlyn Point Suite 532\nSouth Nelsonville, AZ 48730-6341', '081938073024', 'Urban Planner', 1, NULL, NULL),
(146, 'ZAKY CELL', '559 Heidenreich Locks Apt. 632\nEast Angusport, FL 76797-0025', '081913109874', 'Chemical Equipment Operator', 1, NULL, NULL),
(147, 'SURYA INDAH KLUDAN', '137 Hyatt Stravenue Suite 625\nLake Karianemouth, PA 17316-2865', '081931074172', 'Mathematical Science Teacher', 1, NULL, NULL),
(148, 'BERLIANDA CELL', '689 Jarred Fords Suite 776\nRaynorfurt, NM 27535', '081938062866', 'Train Crew', 1, NULL, NULL),
(149, 'ANGGA 2 CELL', '3593 Nina Avenue\nMarinaberg, NH 21894', '087757170102', 'Nuclear Power Reactor Operator', 1, NULL, NULL),
(150, 'MUDA BEDA', '68653 Louie Track\nDoylebury, NH 35409-5494', '081913243382', 'Office Machine Operator', 1, NULL, NULL),
(151, 'MAYA 2 CELL', '13780 Weissnat Causeway Suite 895\nGradychester, HI 07900', '087856439305', 'Ship Carpenter and Joiner', 1, NULL, NULL),
(152, 'MAYA CELL NGABAN', '27076 Sandy Springs\nLake Audra, WY 13176-9148', '08175003312', 'Geoscientists', 1, NULL, NULL),
(153, 'cha cha cell', '39757 Rahul Via\nCorbinview, SD 24153', '081938072871', 'Housekeeper', 1, NULL, NULL),
(154, 'INTER CELL', '525 Murphy Landing\nEmmyside, IL 44196', '081703366905', 'Precision Dyer', 1, NULL, NULL),
(155, 'MULTI CELL2', '744 Yost Crest Suite 888\nLake Jeremy, AK 54416-7073', '081913144804', 'Hydrologist', 1, NULL, NULL),
(156, 'M 2 M', '5274 Matt Junctions\nGulgowskitown, NV 72244-7823', '081703361943', 'Chemical Engineer', 1, NULL, NULL),
(157, 'GRK TIARA CELL', '612 Yoshiko Road Apt. 367\nRusselfort, DC 92714-1760', '087856002486', 'Biological Technician', 1, NULL, NULL),
(158, 'GRK MADANIYAH', '883 Bergnaum Rue Apt. 026\nMoenport, KY 50311', '081931575475', 'Natural Sciences Manager', 1, NULL, NULL),
(159, 'GRK CJDW CELL KEBOMAS', '1660 Hodkiewicz Shoal\nNew Humberto, MI 45741', '081913847896', 'Record Clerk', 1, NULL, NULL),
(160, 'GRK CASPER CELL', '43655 Filomena Manors\nLangchester, ND 53384-5106', '087856002431', 'Professional Photographer', 1, NULL, NULL),
(161, 'GRK IMEI CELL', '521 Jeramie Junctions Suite 373\nEast Percyborough, MI 61579-6275', '087856309343', 'Precision Pattern and Die Caster', 1, NULL, NULL),
(162, 'IVAN CELL KRIAN', '759 Walter Vista Apt. 860\nLake Lee, NC 26469', '081703930406', 'Motion Picture Projectionist', 1, NULL, NULL),
(163, 'GRK MD CELL', '8698 Ortiz Lane Suite 359\nPort Novellaberg, WI 29619-8043', '087856309338', 'Fashion Designer', 1, NULL, NULL),
(164, 'GRK INDANA CELL', '143 Alexandrea Loop\nAnnabelport, IA 56072-8518', '081703356757', 'Restaurant Cook', 1, NULL, NULL),
(165, 'FAFA CELL', '650 Herta Harbor\nIlabury, NV 71624-3789', '081913130321', 'Tire Builder', 1, NULL, NULL),
(166, 'GRK YASMITA CELL', '694 Lempi Islands\nSouth Juliana, IN 24055-7104', '087750955874', 'Urban Planner', 1, NULL, NULL),
(167, 'MEDIA CELL', '9624 Moses Centers Apt. 047\nNorth Frederiqueville, CO 94157-3125', '081939870586', 'Telemarketer', 1, NULL, NULL),
(168, 'GRK MIRA CELL', '855 Monserrate Park Suite 757\nPeteberg, MD 25932', '081949610158', 'Recyclable Material Collector', 1, NULL, NULL),
(169, 'FS CELL', '83334 Clarissa Ferry\nNorth Alexandro, PA 98595-0418', '081938063651', 'Keyboard Instrument Repairer and Tuner', 1, NULL, NULL),
(170, 'MINUS CELL', '25221 Kiehn Points\nBernieceview, MO 65977-0954', '081938062535', 'Curator', 1, NULL, NULL),
(171, 'DIKA BALEN CELL', '39487 Sporer Dale\nNorth Loniehaven, ME 89979', '087856390137', 'Dental Assistant', 1, NULL, NULL),
(172, '36 SEVEN CELL', '529 Marvin Heights\nWest Piercemouth, LA 09763-8695', '081913120090', 'Aircraft Assembler', 1, NULL, NULL),
(173, 'SHEVA CELL', '826 Leon Groves\nAmelyberg, DE 60724-8369', '087856052569', 'Nuclear Monitoring Technician', 1, NULL, NULL),
(174, 'DENIS CELL', '17945 Collins Ridge\nZoieborough, DC 40951', '087856002410', 'Radio Operator', 1, NULL, NULL),
(175, 'MKT CELL', '1303 Alyson Fall Apt. 582\nLoribury, AK 18131', '081938063605', 'Boat Builder and Shipwright', 1, NULL, NULL),
(176, 'RANGERS CELL', '51563 Trycia Springs Apt. 734\nWest Marystad, NC 90493', '081938063530', 'Logging Supervisor', 1, NULL, NULL),
(177, 'GRK BARU CELL 2', '34946 Ledner Harbors\nWest Roel, ME 95789-7966', '087856309376', 'Bookkeeper', 1, NULL, NULL),
(178, 'Bill cell', '43434 Seamus Mill Apt. 787\nBrekkeside, NY 63638', '081938063531', 'Ticket Agent', 1, NULL, NULL),
(179, 'TBN RANI CELL', '46793 Olaf Cliffs\nSouth Grover, AL 48248-0585', '087750958070', 'Roofer', 1, NULL, NULL),
(180, 'GLOBAL CELL', '338 Bayer Ports\nCandaceview, NE 48367', '087850808940', 'Forensic Investigator', 1, NULL, NULL),
(181, 'BASMALA CELL', '590 Alene Pines\nSouth Rocio, SC 20569', '081938062389', 'Maintenance Supervisor', 1, NULL, NULL),
(182, 'RIZKY CELL', '27667 Hailie Mission\nWinonamouth, WV 16997-6619', '081938062558', 'Law Clerk', 1, NULL, NULL),
(183, 'JAVA CELL TULANGAN', '946 Stokes Roads Suite 801\nCelinechester, MA 23407-0529', '081938063652', 'Stock Clerk', 1, NULL, NULL),
(184, 'SARI CELL', '51189 Sammy Alley\nSouth Onie, IA 09405-9541', '081938545906', 'Power Generating Plant Operator', 1, NULL, NULL),
(185, 'MUTIARA CELL', '69041 Paxton Junction\nEulahton, AR 16968', '081938062509', 'Logging Tractor Operator', 1, NULL, NULL),
(186, 'METRO', '173 Casper Freeway Suite 440\nJaynemouth, DE 40907', '081931572062', 'Organizational Development Manager', 1, NULL, NULL),
(187, 'AHSHIL CELL', '2451 Kulas Inlet Suite 621\nSouth Paxtonbury, OK 18572-5082', '081938830866', 'Dishwasher', 1, NULL, NULL),
(188, 'WAHYU CELLt', '814 Alfreda Shores Suite 467\nPort Jaquelin, MS 24296-0602', '087854153238', 'Opticians', 1, NULL, NULL),
(189, 'PRALAKS CELL', '2004 Emmerich River\nEast Mossie, ID 63278', '087858733653', 'Clinical Psychologist', 1, NULL, NULL),
(190, 'BUDI PHONE', '84861 Hane Loop Suite 477\nLake Francescastad, IL 45287-0448', '081913132211', 'Grinding Machine Operator', 1, NULL, NULL),
(191, 'RAHAYU CELL', '291 Witting Groves Suite 156\nBaileyfurt, NE 31350', '087856099052', 'Nuclear Medicine Technologist', 1, NULL, NULL),
(192, 'CENT CELL', '357 Brown Underpass\nMullerborough, RI 05717-2060', '087757029595', 'Designer', 1, NULL, NULL),
(193, 'UGD JAYA', '43682 Jacobs Flat Suite 203\nWest Nikitaton, LA 00385', '081938073043', 'Silversmith', 1, NULL, NULL),
(194, 'GEMA CELL', '42403 Stanley Rapids Apt. 343\nBernitastad, WY 57175', '081931070682', 'Structural Iron and Steel Worker', 1, NULL, NULL),
(195, 'GAJAH CELL', '318 Rudolph Mission\nPort Denisfort, CO 72239-6327', '081913848497', 'Insurance Sales Agent', 1, NULL, NULL),
(196, 'TYAR CELL', '177 Albertha Track Suite 406\nNorth Noble, HI 64611-6306', '081913817901', 'Video Editor', 1, NULL, NULL),
(197, 'ZM JAYA CELL', '16573 Keara Streets\nWatersview, TN 17014-5784', '081703272664', 'Rigger', 1, NULL, NULL),
(198, 'OMDA CELL1', '9722 Elsie Stream Suite 995\nLake Lupe, WA 24730', '081938450422', 'Etcher', 1, NULL, NULL),
(199, 'OMDA CELL2', '5160 Watsica Burgs Apt. 476\nWest Kennith, VA 81607', '081938450145', 'Electrical Engineer', 1, NULL, NULL),
(200, 'IDOLA CELL', '213 Fredrick Branch\nSouth Margaret, MD 70274-6897', '087757029583', 'Head Nurse', 1, NULL, NULL),
(201, 'LAZ ACC', '589 Schumm Track\nSouth Kennediburgh, AL 26975-6688', '081938062605', 'Cooling and Freezing Equipment Operator', 1, NULL, NULL),
(202, 'ARTA CELL', '7124 Kozey Pine Suite 550\nNorth Othabury, CT 93264', '081938072686', 'Bindery Machine Operator', 1, NULL, NULL),
(203, 'CHELSEA CELL', '260 Ruecker Common Suite 617\nEliasburgh, IA 41016', '081938545961', 'Medical Secretary', 1, NULL, NULL),
(204, 'KIKI CELL WARU', '72188 Dare Greens Suite 861\nAndersonstad, IN 13472-8818', '081703453459', 'Command Control Center Specialist', 1, NULL, NULL),
(205, 'ATHASHOP CELL', '30838 Bergstrom Plaza Suite 677\nSchuppeville, NC 98722-8458', '087750957977', 'Earth Driller', 1, NULL, NULL),
(206, 'MD CELL', '471 Wilderman Rue\nEleanoraton, NY 60138', '081938809883', 'Dentist', 1, NULL, NULL),
(207, 'DANI CELL', '11581 Reinger Crescent Apt. 830\nVolkmanstad, NY 72609-8380', '081938063463', 'Tree Trimmer', 1, NULL, NULL),
(208, 'CAHAYA CELL', '21286 Birdie Corners Apt. 719\nMohrchester, PA 79746-4440', '081938063647', 'Ship Pilot', 1, NULL, NULL),
(209, 'PEDE CELL', '16082 Mara Parks Suite 199\nNew Iliana, PA 11627', '087752651478', 'Lawn Service Manager', 1, NULL, NULL),
(210, 'ARBY CELL', '86477 Bradtke Hills\nYvonnemouth, IN 98905-8070', '081703367234', 'Healthcare Practitioner', 1, NULL, NULL),
(211, 'GLOBAL SAKTI', '90557 Keebler Locks Suite 626\nBradleyview, MT 57358-6623', '08175292158', 'Forming Machine Operator', 1, NULL, NULL),
(212, 'ILHAM CELL JMBNG', '8334 Rempel Road\nSauerland, CO 55020-4771', '081913242755', 'Social Work Teacher', 1, NULL, NULL),
(213, 'ARBY 2 CELL', '6931 Ondricka Inlet\nNorth Selmer, NH 48823-9613', '081935051510', 'Agricultural Crop Farm Manager', 1, NULL, NULL),
(214, 'AA CELL SEDATI', '2769 Daniel Lakes Apt. 850\nEast Kendraport, KY 43105', '081938452172', 'General Practitioner', 1, NULL, NULL),
(215, 'K26 CELL GEDANGAN', '567 Schuster Course Suite 228\nFritschstad, VT 93521-5208', '087851051298', 'Visual Designer', 1, NULL, NULL),
(216, 'REE ONE', '577 Carole Flat Apt. 440\nAlvinaport, VT 68795', '08175073331', 'Tool Set-Up Operator', 1, NULL, NULL),
(217, 'andro reload', '65517 Wyman Viaduct Suite 529\nOsbornefurt, TX 61601-2902', '081938072706', 'Chemical Plant Operator', 1, NULL, NULL),
(218, 'AZAM LILUH CELL', '213 Janis Squares\nEast Aditya, MT 88875-5880', '087757029481', 'Home', 1, NULL, NULL),
(219, 'GRK INDAH CELL DRIYOREJO', '96636 Mariano Streets\nMcGlynnberg, LA 49527-1586', '087856309525', 'Account Manager', 1, NULL, NULL),
(220, 'ADANZ CELL WARU', '43062 Goodwin Isle\nMaggiochester, CO 65679-2696', '081703814751', 'Title Abstractor', 1, NULL, NULL),
(221, 'M-2 CELLULAR', '87577 Clemmie Road\nRobynbury, NC 88021', '087856309614', 'Order Filler', 1, NULL, NULL),
(222, 'DITA CELL DELTA', '225 Jerad Lodge Suite 397\nMcLaughlinville, LA 68388', '081931073498', 'Engineering Manager', 1, NULL, NULL),
(223, 'Prabhu Cell', '73533 Victoria Rest Apt. 573\nEast Randal, NH 62471', '081938062397', 'Hazardous Materials Removal Worker', 1, NULL, NULL),
(224, 'nico cell', '570 Steuber Springs\nJammiefort, UT 74832', '081938073035', 'Buyer', 1, NULL, NULL),
(225, 'Azzam CELL', '9083 Kaden Prairie Apt. 403\nEast Wendell, OK 44976-3486', '081938072869', 'Real Estate Appraiser', 1, NULL, NULL),
(226, 'BL CARD', '48044 Kaia Isle Suite 070\nKihnshire, AR 71338', '087858733643', 'Manager Tactical Operations', 1, NULL, NULL),
(227, 'EDWIN CELL', '1652 Cassandre Fall\nAbshireside, AR 97493-1971', '081913240533', 'Manager', 1, NULL, NULL),
(228, '21 cell', '23855 Runolfsson Forks\nKlockohaven, FL 88528', '081938062566', 'Computer Support Specialist', 1, NULL, NULL),
(229, 'HIKMAH CELL', '5306 Anika Brook Suite 442\nEast Linniestad, CT 77939', '08179392523', 'Biological Science Teacher', 1, NULL, NULL),
(230, 'MONOPHONE', '9746 Wiza Street Suite 334\nNew Eloise, FL 86021-7308', '081931074961', 'Personal Care Worker', 1, NULL, NULL),
(231, 'BOND CELL JOMBANG', '42292 Emmalee Street Suite 310\nDareton, TX 28260-6288', '08179394902', 'Landscaping', 1, NULL, NULL),
(232, 'BOND CELL 2', '89033 Mertz Springs\nO\'Konhaven, SC 02974-5307', '081913242751', 'Product Management Leader', 1, NULL, NULL),
(233, 'METEOR 88 CELL', '5382 Mervin Cliff\nJaydeport, HI 28588', '087757029564', 'Bridge Tender OR Lock Tender', 1, NULL, NULL),
(234, 'HIDAYAH CELL', '4984 Marcelo Groves Apt. 303\nPort Cortney, DC 68187', '087858733642', 'Personal Home Care Aide', 1, NULL, NULL),
(235, 'Hidayah Cell 2', '82353 Esta Motorway Suite 015\nNew Carmeloburgh, GA 20226', '081938062384', 'Stringed Instrument Repairer and Tuner', 1, NULL, NULL),
(236, 'BIG SHOP CELL', '5309 Moen Corner\nNorth Waynemouth, MN 75194', '081935050359', 'Multi-Media Artist', 1, NULL, NULL),
(237, 'PRIANITA', '2128 Koch Corner Apt. 976\nPort Delphine, NY 82178', '081938450436', 'Cartoonist', 1, NULL, NULL),
(238, 'GLOBAL PHONE TAMAN PINANG', '9724 Hegmann Garden\nClementinaberg, HI 18078-9947', '08179392457', 'Locksmith', 1, NULL, NULL),
(239, 'GYMBUL CELL', '5895 Kulas Knolls Apt. 237\nWest Jess, NM 06714-9132', '087858733654', 'Social Work Teacher', 1, NULL, NULL),
(240, 'RAHAYU CELL WARU', '1999 Alayna Park\nNew Tiffany, NM 73876-7315', '081803010748', 'Mathematical Science Teacher', 1, NULL, NULL),
(241, 'IDA CELL', '11530 Macejkovic Parkways\nSchillerburgh, VA 75576-0440', '087856002369', 'Outdoor Power Equipment Mechanic', 1, NULL, NULL),
(242, 'MELATI CELL', '6837 Tromp Corner Apt. 124\nNew Kyle, KY 43456-3109', '081959452699', 'Interpreter OR Translator', 1, NULL, NULL),
(243, 'YUNI CELL', '1554 Farrell Brook\nUptonside, VA 36039', '081938072866', 'Railroad Yard Worker', 1, NULL, NULL),
(244, 'jaya mandiri', '666 Domenico Valleys Apt. 225\nNew Michael, TN 19048-6945', '087854000339', 'Cost Estimator', 1, NULL, NULL),
(245, 'UCUP CELL', '96827 Doyle Mission\nCroninstad, WV 77510', '087850801814', 'Pastry Chef', 1, NULL, NULL),
(246, 'LITHA CELL', '917 Bashirian Walk Suite 854\nEast Wilfredoshire, AL 74469-7450', '081938450204', 'Construction Driller', 1, NULL, NULL),
(247, 'MUMTAZ CELL', '4859 Doyle Cove\nNew Nataliechester, WI 25587-3267', '087851051308', 'Forestry Conservation Science Teacher', 1, NULL, NULL),
(248, 'SIDODADI', '547 Corkery Parks\nEast Haskellport, NY 30374', '081931572669', 'Engineering Manager', 1, NULL, NULL),
(249, 'ANDINA CELL', '16951 Nelle Rue\nSouth Manuelaside, HI 73835-5915', '081931077593', 'Fish Hatchery Manager', 1, NULL, NULL),
(250, 'RAJIB CELL', '5746 Cecil Path Suite 609\nNew Wavabury, MN 74780-4141', '087856001997', 'Government', 1, NULL, NULL),
(251, 'GRK MN CELL', '577 Webster Trail\nOsinskifort, WI 22808', '081703195055', 'Director Religious Activities', 1, NULL, NULL),
(252, 'SODA CELL', '80586 Rath Causeway Suite 124\nDudleyview, SD 62188-1284', '081938073045', 'Dentist', 1, NULL, NULL),
(253, 'ucok cell', '882 Schoen Island\nPollichton, FL 15944-5559', '081938062503', 'Washing Equipment Operator', 1, NULL, NULL),
(254, 'AMSTERDAM CELL', '2794 Erna Valley Suite 776\nNorth Evelyn, OK 34035-9913', '087856439497', 'Sailor', 1, NULL, NULL),
(255, 'RPM CELL', '2583 Enos Point Apt. 601\nFurmanton, DC 62716-9631', '081938545908', 'Mechanical Engineer', 1, NULL, NULL),
(256, 'AW CELL SEDATI', '1538 Esteban Mills Apt. 468\nNew Robin, LA 04031', '087856560113', 'Educational Counselor OR Vocationall Counselor', 1, NULL, NULL),
(257, 'GRK SINGO SARI CELL', '74314 Runolfsdottir Stravenue Apt. 288\nReillyborough, GA 55579', '081931077503', 'Music Director', 1, NULL, NULL),
(258, 'GRK ARDYS CELL', '7440 Nathen Burgs\nHaagton, AL 59536-6701', '087856230013', 'Mathematician', 1, NULL, NULL),
(259, 'OSHELA cell', '710 Powlowski Highway\nEast Oletabury, MI 78177-9549', '081938062580', 'Plumber OR Pipefitter OR Steamfitter', 1, NULL, NULL),
(260, 'GRAHA CELL', '84286 Harber Union\nShaneview, IL 79539-1520', '087757029635', 'Communication Equipment Repairer', 1, NULL, NULL),
(261, 'PR CELL', '4710 Kirlin Extension\nKertzmannfort, WY 01318', '081938062488', 'Automatic Teller Machine Servicer', 1, NULL, NULL),
(262, 'MARS CELL SUKODONO', '918 Felton Locks Suite 067\nPort Nyah, NJ 40521', '081946410345', 'Potter', 1, NULL, NULL),
(263, 'SURYA JAYA JOMBANG', '3809 Luna Vista\nBayleechester, DC 89867-2494', '081913130474', 'Mechanical Engineering Technician', 1, NULL, NULL),
(264, 'HAPPY CELL MOJOSARI', '101 Jasen Extension Suite 556\nShaynechester, MA 34310-9159', '081913242436', 'Appliance Repairer', 1, NULL, NULL),
(265, 'al cell', '234 Ledner Extensions\nSashastad, DC 31582', '081938072775', 'Nuclear Power Reactor Operator', 1, NULL, NULL),
(266, 'SD SIDOARJO', '8640 Brandyn Neck Suite 759\nHaleyfort, SC 88026', '081938062641', 'Laundry OR Dry-Cleaning Worker', 1, NULL, NULL),
(267, 'KURNIA JAYA CELL', '39173 Kunze Village\nKennithton, MA 74580', '087858900505', 'Amusement Attendant', 1, NULL, NULL),
(268, 'BUQIN CELL', '702 Torp Extension Suite 998\nEast Obieton, OK 24684-0146', '087856242132', 'Tire Changer', 1, NULL, NULL),
(269, 'SD TUBAN', '6928 Marianne Camp Apt. 830\nEast Lois, AK 52330-1674', '081938062644', 'Civil Engineer', 1, NULL, NULL),
(270, 'DIO CELL', '654 Edgar Mount\nWest Jennings, CO 88204-8395', '087757029628', 'Security Systems Installer OR Fire Alarm Systems Installer', 1, NULL, NULL),
(271, 'GRK TIGA PUTRA CELL DRIYO', '9910 Heaney Spurs\nGreenfelderberg, NV 49993', '087856002541', 'Art Director', 1, NULL, NULL),
(272, 'ADI SURYA CELL', '646 Garnett Light Suite 702\nNew Ahmad, KY 94453-7294', '081913848553', 'Auditor', 1, NULL, NULL),
(273, 'LUMBUNG CELL', '16575 Ankunding Villages\nLake Alizemouth, AL 57167', '087757029551', 'Customer Service Representative', 1, NULL, NULL),
(274, 'AUDE CELL KEDUNG BANTENG', '179 Keyshawn Fords Suite 418\nNew Gretchenbury, PA 12136', '087859587410', 'Bindery Worker', 1, NULL, NULL),
(275, 'ROSE CELL', '68736 Leffler Parks Suite 456\nLydabury, OK 79238', '087856000184', 'Desktop Publisher', 1, NULL, NULL),
(276, 'KRISNA CELL JMBNG', '312 Derrick Ville\nLake Anika, GA 35435', '087856560284', 'Septic Tank Servicer', 1, NULL, NULL),
(277, 'ANGEL CELL', '826 Lysanne Squares Apt. 834\nPort Janyfurt, ND 71908', '081938062473', 'Electrical Engineering Technician', 1, NULL, NULL),
(278, 'DIFA CELL TANGGULANGIN', '208 Terence Mall\nStewartfort, MA 94516', '081938450021', 'Brazer', 1, NULL, NULL),
(279, 'SAMBI CELL', '351 Kub Falls Apt. 383\nPort Lessie, KS 66573-0375', '081913849663', 'Musician', 1, NULL, NULL),
(280, 'ari cell', '76544 Heidi Isle\nSouth Ashly, MO 53974', '081938062573', 'Customer Service Representative', 1, NULL, NULL),
(281, 'JAYA CELL MOJO', '43786 Emmerich Fields\nEast Chelsea, WV 08259-5088', '081935060208', 'Life Scientists', 1, NULL, NULL),
(282, 'ANIK CELL', '924 Barton Mission\nSouth Maureenborough, UT 72109-7512', '087856390001', 'Engineering', 1, NULL, NULL),
(283, 'COCO CELL', '197 Jammie Crossroad Apt. 059\nSatterfieldton, MT 88095-0897', '081913243235', 'Drycleaning Machine Operator', 1, NULL, NULL),
(284, 'GARUDA PULSA', '4055 Karelle Fork\nSouth Nigelville, CT 23202-2496', '081935053113', 'Stock Clerk', 1, NULL, NULL),
(285, 'KD CELL1', '9441 Lehner Tunnel Suite 262\nNew Brad, KY 86336-2903', '081938450342', 'Lathe Operator', 1, NULL, NULL),
(286, 'SS PHONE', '78934 Boyle Keys\nEast Mohamed, ND 73531-2626', '081938545902', 'University', 1, NULL, NULL),
(287, 'GRK PRINCE CELL', '3865 Kadin Vista Apt. 078\nLake Parismouth, IA 38596', '087856053351', 'Photographic Developer', 1, NULL, NULL),
(288, 'bulan phone', '6092 Breitenberg Pine Apt. 085\nEstellmouth, VT 96913', '081938063584', 'Actuary', 1, NULL, NULL),
(289, 'EGY CELL', '21648 Daryl Extensions\nSatterfieldtown, WI 66716', '081938546166', 'Transportation Equipment Maintenance', 1, NULL, NULL),
(290, 'JOYO CELL', '6259 Hillard Forest Apt. 411\nEast Stacy, MT 89486-0549', '087750958026', 'Forming Machine Operator', 1, NULL, NULL),
(291, 'LA ANTIN CELL', '349 Orland Mountain\nZemlakchester, ME 35509', '081931074205', 'Jeweler', 1, NULL, NULL),
(292, 'PORONG 88', '9400 Emmalee Ports Suite 538\nBergnaumstad, LA 44666-4017', '081938063608', 'Air Crew Member', 1, NULL, NULL),
(293, 'aladin Cell 3', '4002 Ernser Crescent\nBoganberg, MD 91681', '081938063459', 'Personal Care Worker', 1, NULL, NULL),
(294, 'AMIRAH CELL', '922 Welch Station Suite 747\nNew Cordell, IN 48858', '081938545923', 'Patternmaker', 1, NULL, NULL),
(295, 'TID CELL', '375 Christiana Rue Apt. 293\nFelicitaborough, IL 77970', '087757029612', 'Audio-Visual Collections Specialist', 1, NULL, NULL),
(296, 'AS CELL TROSOBO', '61215 Schiller Plains Suite 782\nStrosintown, MO 88539', '087757170367', 'Forming Machine Operator', 1, NULL, NULL),
(297, 'JAYA CELL 2', '9014 Annabelle Extension Suite 414\nNew Maidabury, IN 36288', '087752650019', 'Advertising Sales Agent', 1, NULL, NULL),
(298, 'DIMENSI CELL', '24287 Estelle Bridge Suite 672\nMerlinside, NE 35526-0038', '081938063182', 'Welder', 1, NULL, NULL),
(299, 'INOVA CELL', '540 Amparo Park\nKossbury, NE 33962', '081938880376', 'Nursing Aide', 1, NULL, NULL),
(300, 'OCC 2 CELL', '13927 Hansen Inlet Suite 999\nSouth Shayne, NE 50368', '087856000249', 'Automotive Mechanic', 1, NULL, NULL),
(301, 'ALADIN CELL', '704 Maryse Haven\nKeeblerstad, LA 32692', '081938804560', 'Home Appliance Installer', 1, NULL, NULL),
(302, 'Indri Cell', '52088 Marcos Lodge Apt. 042\nStammfurt, GA 92803', '081938062439', 'Career Counselor', 1, NULL, NULL),
(303, 'MIETHA CELL 2', '7639 Kuphal Extension\nJohantown, OH 07893', '081938062405', 'Aircraft Launch and Recovery Officer', 1, NULL, NULL),
(304, 'MUTIARA CELL CANDI', '77871 Ferry Village\nMayertmouth, WY 66491-7217', '081703275690', 'Landscape Artist', 1, NULL, NULL),
(305, 'MAPLE CELL COLLECTION', '40073 Thea Mountains\nFramiport, FL 11786-1192', '081703812727', 'Commercial and Industrial Designer', 1, NULL, NULL),
(306, 'INA CELL', '264 Mariano Ford Suite 439\nTerryland, NC 35922', '081938072890', 'Algorithm Developer', 1, NULL, NULL),
(307, 'GTZ', '6894 Mckenna Valley Apt. 358\nWest Matildeton, UT 21421-6873', '081938809732', 'Secretary', 1, NULL, NULL),
(308, 'D2 CELL', '5818 Hagenes Parkways\nBrekkemouth, OR 05862-6485', '081703355634', 'Telephone Operator', 1, NULL, NULL),
(309, 'S180T CELL', '432 Kennedi Parks\nEast Kadefurt, NH 46790', '081913242826', 'Agricultural Worker', 1, NULL, NULL),
(310, 'MIETHA CELL TAMAN PINANG', '4738 Witting Circles\nWest Olen, MD 16821-5336', '087858733669', 'Music Composer', 1, NULL, NULL),
(311, 'bengkel hp', '909 Melyssa Island\nRyanchester, AR 48326-9993', '081938063634', 'Mapping Technician', 1, NULL, NULL),
(312, 'SATRIA 1 CELL', '71470 Hayden Falls\nWindlermouth, IL 80732-2753', '08179392646', 'Calibration Technician OR Instrumentation Technician', 1, NULL, NULL),
(313, 'SATRIA 2 CELL', '757 Thompson Rue Suite 150\nCamrynchester, ID 43663-2778', '081913243768', 'Computer Hardware Engineer', 1, NULL, NULL),
(314, 'ALOHA CELL', '5746 Walter Shoal Apt. 207\nNew Othobury, IA 23920', '081931074312', 'Rental Clerk', 1, NULL, NULL),
(315, 'DINAR CELL', '261 VonRueden Trafficway\nAugustineberg, IL 67782-4942', '081938062383', 'Electrolytic Plating Machine Operator', 1, NULL, NULL),
(316, 'MIETHA CELL', '92030 Towne Islands Apt. 201\nNorth Jay, CT 90631', '081931074136', 'Veterinary Assistant OR Laboratory Animal Caretaker', 1, NULL, NULL),
(317, 'GRK I ONE CELL', '5314 Davin Corner\nKylertown, SD 76540-7345', '087856230028', 'Physical Therapist', 1, NULL, NULL),
(318, 'UUN CELL', '9390 Langosh Centers\nJosiahside, FL 89236', '081703939083', 'Construction Equipment Operator', 1, NULL, NULL),
(319, 'FATTAN CELL', '15635 Hoeger Ranch\nPort Maryjaneburgh, NV 15933-6898', '081949610263', 'Electronics Engineering Technician', 1, NULL, NULL),
(320, 'K26 CELL WARU', '59471 Volkman Branch Apt. 497\nShayneview, MD 85982', '087851051301', 'Anthropology Teacher', 1, NULL, NULL),
(321, 'MY CELL', '8877 Heidenreich Orchard Apt. 690\nSouth Aric, HI 92207-6253', '081938063444', 'Farmer', 1, NULL, NULL),
(322, 'IFUL.CELL', '9337 Robbie Way Suite 085\nEast Blairborough, VA 65935', '081938062404', 'CTO', 1, NULL, NULL),
(323, 'THE PROF', '19632 Hackett Track Suite 484\nDesireeport, NY 58020-6164', '087851051408', 'Product Promoter', 1, NULL, NULL),
(324, 'BAGUS CELL 3 JOMBANG', '3577 Carroll Bridge Suite 788\nSunnybury, AL 58963', '087856560778', 'Instructional Coordinator', 1, NULL, NULL),
(325, 'PAMUNGKAS CELL', '6361 Greenfelder Springs Apt. 428\nSouth Niaborough, NJ 57083-3754', '081938063468', 'Eligibility Interviewer', 1, NULL, NULL),
(326, 'SIJI SONGO CELL', '2263 Oberbrunner Ferry\nSouth Raphaelletown, IL 11274', '087856560364', 'Purchasing Manager', 1, NULL, NULL),
(327, 'jj cell', '44529 Nader Flats Apt. 330\nWest Leopoldoberg, RI 02493-9074', '081938072854', 'Oil Service Unit Operator', 1, NULL, NULL),
(328, 'AZAY CELL JOMBANG', '2623 Conn Terrace Suite 301\nEast Marilou, NM 92563-4101', '081913130478', 'Detective', 1, NULL, NULL),
(329, 'RAHMAT CELL CEMENG', '5395 Timothy Well Apt. 793\nNew Christine, OK 03004-5679', '087859588085', 'Vocational Education Teacher', 1, NULL, NULL),
(330, 'arwan cell 2', '865 Cecilia Valleys\nJakubowskimouth, IN 51274-3447', '081938062632', 'Cafeteria Cook', 1, NULL, NULL),
(331, 'MAHESA', '58271 Micaela Run\nVonberg, SC 17799', '081949640567', 'Composer', 1, NULL, NULL),
(332, 'GRK YASMINI CELL', '459 Flatley Junctions\nEast Kamille, WA 15692-3559', '087750956302', 'Machine Tool Operator', 1, NULL, NULL),
(333, 'NB CELL', '851 Kaela Circle Suite 727\nCorkeryfurt, MN 24182-1242', '081913240916', 'Shampooer', 1, NULL, NULL),
(334, 'CHELSEA CELL 2', '3762 Upton Isle\nMetaborough, GA 37861', '081938072972', 'Court Reporter', 1, NULL, NULL),
(335, 'PUTRA CELL', '338 Macie Mountains Suite 641\nTyrelview, ND 13126-6617', '081703275711', 'Product Promoter', 1, NULL, NULL),
(336, 'BODY CELL', '95013 Willy Inlet\nEast Perry, NC 06795', '081931571642', 'Set Designer', 1, NULL, NULL),
(337, 'BJN ECA SUMBERJO', '1335 Bobby Plaza\nAudreannemouth, NH 28795', '087856099091', 'Installation and Repair Technician', 1, NULL, NULL),
(338, 'JAPAN CELLULAR 2', '458 Parker Burg Suite 253\nMadisonbury, LA 10845', '08175123801', 'Postal Service Clerk', 1, NULL, NULL),
(339, 'BIMA NET', '982 Kayli Brook Apt. 812\nWest Vidamouth, AZ 52981-7491', '087757029580', 'Meter Mechanic', 1, NULL, NULL),
(340, 'EMBONG PHONE 2 WEDORO', '319 Cassie Radial\nNew Jermaine, VT 41187', '087757029539', 'Museum Conservator', 1, NULL, NULL),
(341, 'umam cell', '1085 Jacobs Unions\nLucileberg, NJ 86349', '081938063541', 'Maintenance Supervisor', 1, NULL, NULL),
(342, 'GRK BAROKAH CELL', '157 Wilburn Mount\nBeckerside, MO 09852', '081913848308', 'Chemical Plant Operator', 1, NULL, NULL),
(343, 'FATTAN CELL 2', '149 Schuster Squares Apt. 177\nNorth Nicolette, NJ 59271-0135', '081938073034', 'Maintenance Supervisor', 1, NULL, NULL),
(344, 'MEGA JAYA', '785 Yundt Rue Apt. 227\nRustyshire, DC 26438-1107', '081938545936', 'Landscaper', 1, NULL, NULL),
(345, 'BIMA CELL', '775 Beer Drive\nEast Jarredview, FL 71397-5145', '085931398155', 'Illustrator', 1, NULL, NULL),
(346, 'GRK MASTER PONSEL', '61158 Tromp Skyway Suite 678\nCaterinaton, CT 48486', '081931573029', 'Spotters', 1, NULL, NULL),
(347, 'ISTANA GSM CELL JOMBANG', '8685 Krystel Overpass Apt. 279\nLake Toney, PA 64835', '081939870584', 'Surveying and Mapping Technician', 1, NULL, NULL),
(348, 'ARINSA CELLULER', '8864 Parker Squares\nBartholomehaven, MI 65587-1456', '081913810709', 'Advertising Manager OR Promotions Manager', 1, NULL, NULL),
(349, '3 RAJA CELL', '525 Ryan Causeway Suite 797\nCronaside, NM 93110', '081938801377', 'Production Manager', 1, NULL, NULL),
(350, 'President cell 2', '4047 Ebony Fork\nScottieport, VA 34388', '081938063539', 'Secondary School Teacher', 1, NULL, NULL),
(351, 'RIFKA CELL', '707 Linda Ridge Apt. 836\nWalshtown, VT 71647-7454', '087856001036', 'Compliance Officers', 1, NULL, NULL),
(352, 'GRK H2 CELL', '26471 Nico Groves Suite 256\nPort Bettehaven, AL 59304', '087856243361', 'Art Director', 1, NULL, NULL),
(353, 'GRK ANITA CELL 2', '123 Witting Valleys\nDavisberg, MT 31722', '087750955542', 'Soil Scientist', 1, NULL, NULL),
(354, 'DIAN', '765 Marian Burgs Apt. 674\nRaulview, MT 84222', '087856080109', 'Poet OR Lyricist', 1, NULL, NULL),
(355, 'RZACK CELL', '138 Kaia Walks Apt. 619\nMelyssaberg, NC 17125-7723', '081913130453', 'Dentist', 1, NULL, NULL),
(356, 'NEO CELL', '79117 Adolfo Causeway Suite 007\nHegmannberg, WA 05216-8221', '081935051122', 'Medical Secretary', 1, NULL, NULL),
(357, 'YANTI CELL', '38762 Furman Lights\nPort Colby, PA 75463-4081', '087850479272', 'Press Machine Setter, Operator', 1, NULL, NULL),
(358, 'ATA CELL', '2436 Cole Passage Apt. 546\nHicklebury, UT 99331', '087757029563', 'Photographic Developer', 1, NULL, NULL),
(359, 'BJN HOOD CELL', '590 Auer Crossing Apt. 540\nSouth Emersonview, UT 52307', '087856099059', 'Highway Maintenance Worker', 1, NULL, NULL),
(360, 'GRK DEVY CELL', '48241 Kautzer Mountains\nChristopherview, ME 27399-7829', '087854151833', 'Insurance Underwriter', 1, NULL, NULL),
(361, 'GRK PALAPA CELL', '29730 Don Haven\nJohntown, LA 27424-0323', '081913848183', 'Landscape Artist', 1, NULL, NULL),
(362, 'SAHABAT CELL', '52592 Cole Drive Apt. 517\nTierrafurt, GA 56364', '081959452700', 'Press Machine Setter, Operator', 1, NULL, NULL),
(363, 'TOKO NIKIMURA', '83712 Kovacek Island\nLake Gilbert, MT 06451-3853', '087856560108', 'MARCOM Director', 1, NULL, NULL),
(364, 'DWIPANTARA CELL', '220 Jaunita Land Suite 523\nSouth Taliamouth, WV 42472-9805', '081913130274', 'Gaming Service Worker', 1, NULL, NULL),
(365, 'JOHAN CELL', '625 Ardith Freeway\nNew Julienside, NC 28287', '081913810755', 'Gauger', 1, NULL, NULL),
(366, 'Safira cell', '262 Kale Summit\nSouth Gertrudeborough, IA 42162', '081938072879', 'Tire Changer', 1, NULL, NULL),
(367, 'CHANEL CELL', '98025 Schamberger Mill Apt. 889\nNorth Danny, RI 19495-2185', '081938072895', 'Appliance Repairer', 1, NULL, NULL),
(368, 'DIK CELL', '127 August Ford Suite 443\nWest Adriannachester, VT 24608-9894', '087856590865', 'Maintenance Equipment Operator', 1, NULL, NULL),
(369, 'LATANZA CELL', '52805 Beer Wall\nNorth Ubaldo, NM 19856-5422', '081949610512', 'House Cleaner', 1, NULL, NULL),
(370, 'UDIN', '571 Darryl Ranch\nNorth Amber, ME 92581', '081913120146', 'Artillery Officer', 1, NULL, NULL),
(371, 'DILA MALO', '961 Prosacco Via\nKiaraborough, MA 80797-5507', '081938072893', 'Private Detective and Investigator', 1, NULL, NULL),
(372, 'PRIMA 2 CELL', '597 Lila Turnpike Suite 933\nWest Tyshawn, RI 81346', '081935052663', 'Court Reporter', 1, NULL, NULL),
(373, 'ESA CELL MOJO', '19209 Carolyn Roads\nPort Daniellatown, AZ 71883-9389', '087856413110', 'Police Identification OR Records Officer', 1, NULL, NULL),
(374, 'star cell', '849 Drake Mall Suite 465\nLueilwitzchester, SC 37037', '081938072668', 'Ship Pilot', 1, NULL, NULL),
(375, 'IVAN 2 CELULLER', '528 Fisher Drives\nJackfort, DC 70023-9897', '081938072894', 'Control Valve Installer', 1, NULL, NULL),
(376, 'WELLCOM', '1898 Sid Lake\nLindgrenport, FL 17508-4843', '081938804402', 'Waitress', 1, NULL, NULL),
(377, 'AK-47 Cell', '3016 Mante Highway\nWest Madiemouth, FL 93054', '081938072710', 'General Practitioner', 1, NULL, NULL),
(378, 'DUA PUTRA CELL', '4064 Weber Manor Suite 517\nWest Mollie, DC 75628-8166', '081938809775', 'Meter Mechanic', 1, NULL, NULL),
(379, 'LANTABUR CELL', '8972 Hirthe Path Suite 351\nBrekkeborough, TN 02257', '081938063720', 'Adjustment Clerk', 1, NULL, NULL),
(380, 'Zitus Cell', '746 Schuster Point\nNew Rhetthaven, NV 46008-4810', '081938063442', 'Printing Press Machine Operator', 1, NULL, NULL),
(381, 'GET RICH PHONE', '3996 Halvorson Forges\nSouth Estrellaville, NE 45340', '087757170223', 'Production Helper', 1, NULL, NULL),
(382, 'MULYA CELL', '9206 Keara Heights\nHuelsborough, DE 21964', '087856560605', 'Gluing Machine Operator', 1, NULL, NULL),
(383, 'GRK WARNA CELL', '49958 Jenkins Gateway\nSmithburgh, GA 98568', '087856309528', 'Artillery Crew Member', 1, NULL, NULL),
(384, 'MAJU CELL', '317 Hane Lakes Suite 562\nEast Janymouth, PA 21792', '087856560356', 'Power Plant Operator', 1, NULL, NULL),
(385, 'MILLA CELL SEPANDE', '57687 Heaney Village Apt. 715\nNew Concepcionborough, CA 83744-1269', '087757029402', 'Audiologist', 1, NULL, NULL),
(386, 'ORANGE CELL MOJOKERTO', '98332 Abshire Stravenue\nSouth Kennedi, NY 64633-2970', '087856560345', 'Radio Mechanic', 1, NULL, NULL),
(387, 'NASIONAL CELL', '7368 Pollich Burg\nEast Matt, DC 85361', '081938063643', 'Life Scientists', 1, NULL, NULL),
(388, 'SINAR 1', '518 Adrien Viaduct\nNorth Alex, AK 78478', '081938545659', 'Environmental Compliance Inspector', 1, NULL, NULL),
(389, 'JAVA CELL KABUH', '525 Pinkie Mount Suite 910\nHirtheshire, NE 48686-6545', '081935052302', 'Personal Financial Advisor', 1, NULL, NULL);
INSERT INTO `master_customers` (`id_cust`, `nm_cust`, `alamat_cust`, `no_hp`, `jabatan`, `status`, `created_at`, `updated_at`) VALUES
(390, 'OFI CELL', '37366 Nolan Radial\nWisozkmouth, ME 80565', '081938833098', 'Sports Book Writer', 1, NULL, NULL),
(391, 'SD ROS SDJ', '318 Nasir Bridge\nRobertsshire, MS 79215', '081938062640', 'Insurance Policy Processing Clerk', 1, NULL, NULL),
(392, 'GRK STAR CELL GRESIK', '3173 Hammes Branch Suite 651\nRuthieville, HI 43982', '081913810096', 'Hotel Desk Clerk', 1, NULL, NULL),
(393, 'HILDA CELL', '22321 Kay Orchard Suite 595\nSchambergertown, MS 55068-2054', '081939870595', 'Glazier', 1, NULL, NULL),
(394, 'ORENZ CELL', '7031 Buck Glens\nArjunshire, DC 83254-9979', '08175247177', 'Law Clerk', 1, NULL, NULL),
(395, 'Garuda Reloads', '1626 Naomi Crossing\nPort Werner, NH 42229', '081913848476', 'Social Scientists', 1, NULL, NULL),
(396, 'NATURE CELL', '157 Amir Road Apt. 130\nMalcolmville, GA 17542-9711', '087758459970', 'Animal Trainer', 1, NULL, NULL),
(397, 'YOHAN CELL', '2500 Viva Rapid Apt. 122\nAnnaberg, ME 45014-2746', '087757029525', 'Fitter', 1, NULL, NULL),
(398, 'KINAR RELOAD', '84887 Lemke Mills Suite 434\nSchaeferfort, AZ 52918-9621', '087856230249', 'Plating Operator', 1, NULL, NULL),
(399, 'ADI PULSA 3', '725 Jeffery Walk\nLake David, AZ 65036', '081931073451', 'Electric Meter Installer', 1, NULL, NULL),
(400, 'FABIO CELL', '81563 Florine Forges\nEast Tierra, KY 18566-1996', '081938545945', 'Precision Pattern and Die Caster', 1, NULL, NULL),
(401, 'ADI PULSA 2', '324 Tracey Stravenue\nLegrosborough, MI 36867', '081931073370', 'Mining Engineer OR Geological Engineer', 1, NULL, NULL),
(402, 'ADI PULSA 4', '624 Pearlie Branch Suite 647\nDickiland, ND 74773', '08175247117', 'Petroleum Pump Operator', 1, NULL, NULL),
(403, 'ALSA 3', '7344 Jarret Points Suite 173\nMarciaburgh, PA 16771', '081931076022', 'Anesthesiologist', 1, NULL, NULL),
(404, 'DUTA 1', '7352 Johnson Isle Apt. 960\nNew Gardner, CT 70587', '087856560748', 'Plumber OR Pipefitter OR Steamfitter', 1, NULL, NULL),
(405, 'DUTA 2', '417 Justice Extensions\nCorwinfort, OH 52785', '087856560756', 'Food Science Technician', 1, NULL, NULL),
(406, 'DUTA 3', '66327 Okuneva Mountain\nPort Orafort, CA 60368-0891', '087856591203', 'Geologist', 1, NULL, NULL),
(407, 'DUTA 4', '8047 Paucek Bypass\nPagacburgh, ME 09214', '087856591236', 'Bartender', 1, NULL, NULL),
(408, 'DUTA 5', '8001 Hahn Unions\nChristiansenmouth, ID 98772', '087856560768', 'Laundry OR Dry-Cleaning Worker', 1, NULL, NULL),
(409, 'GRK MERCI B QU CELL', '61656 Rodger Point\nNew Ramiro, VA 11195-4376', '081931575502', 'Fashion Designer', 1, NULL, NULL),
(410, 'DUTA 6', '71262 Jerde Trail\nRossieville, OK 71392', '081938452549', 'Telecommunications Equipment Installer', 1, NULL, NULL),
(411, 'DUTA 7', '999 Deondre Cove Suite 802\nEast Abigail, AK 19510', '081937388453', 'Forest Fire Inspector', 1, NULL, NULL),
(412, 'DUTA 8', '783 Andreanne Harbor Apt. 469\nSouth Kellieberg, MO 40376', '081938450102', 'Correctional Officer', 1, NULL, NULL),
(413, 'DUTA 9', '950 Isac Way Apt. 318\nNew Elroyburgh, IA 51796-9441', '081703930093', 'Brokerage Clerk', 1, NULL, NULL),
(414, 'FANNY CELL JOMBANG', '7771 Watson Points Suite 557\nAlenechester, VT 69104', '081931073064', 'Motor Vehicle Inspector', 1, NULL, NULL),
(415, 'LOTUS 2', '37853 Langosh Common\nSouth Casandra, WY 90995', '081939860928', 'Welding Machine Operator', 1, NULL, NULL),
(416, 'LOTUS 7', '3143 Eliane Run\nNorth Orphaview, AR 90291', '081703930465', 'Night Security Guard', 1, NULL, NULL),
(417, 'PS 6', '35669 Dickens Ways Suite 167\nPourosberg, AR 68288-6707', '081703931172', 'Social and Human Service Assistant', 1, NULL, NULL),
(418, 'PS 4', '4905 Ethel Skyway\nWolffborough, AZ 59635', '081939862865', 'Coating Machine Operator', 1, NULL, NULL),
(419, 'PS 5', '2941 Aurelie Track Apt. 172\nNorth Merle, NC 13429-4178', '087856410900', 'Welder-Fitter', 1, NULL, NULL),
(420, 'PS 1', '379 Jermaine Land Suite 281\nRosarioberg, WI 24120', '081935060165', 'Astronomer', 1, NULL, NULL),
(421, 'PS 2', '313 Monica Falls\nNew Bert, GA 79884-9744', '087850809479', 'Substance Abuse Social Worker', 1, NULL, NULL),
(422, 'SPESIALIS PULSA 1', '6102 Beier Valley\nZulaufville, ID 32937-6045', '081938802138', 'Mathematical Science Teacher', 1, NULL, NULL),
(423, 'princes Cell', '28959 Alford Street\nSouth Fannie, KS 18745', '081959452768', 'Community Service Manager', 1, NULL, NULL),
(424, 'SPESIALIS PULSA 3', '103 Hoppe Key\nImeldabury, ID 03054', '081939862884', 'Rehabilitation Counselor', 1, NULL, NULL),
(425, 'mega cell', '8648 Trevor Road Apt. 661\nEast Lysanne, NY 22351-6942', '081938072746', 'Transportation Equipment Maintenance', 1, NULL, NULL),
(426, 'TANI CELL', '58454 Marquardt Green Suite 884\nSouth Isaiah, VT 11840', '081703356324', 'Steel Worker', 1, NULL, NULL),
(427, 'TANI MAJU CELL', '25356 Diego Station Suite 673\nFriesenville, SC 25544-5896', '081935051932', 'Mechanical Engineer', 1, NULL, NULL),
(428, 'TOP TRONIK 1', '811 Kiehn Locks\nDylanborough, MS 31304-3371', '081803001631', 'Receptionist and Information Clerk', 1, NULL, NULL),
(429, 'TOP TRONIK 2', '787 Rowena Stravenue\nKellistad, OH 15733', '081938450193', 'Word Processors and Typist', 1, NULL, NULL),
(430, 'TOP TRONIK 3', '93108 Kasandra Stream Apt. 915\nFrankieland, CA 66033-5842', '081938561817', 'Fraud Investigator', 1, NULL, NULL),
(431, 'TOP TRONIK 5', '90629 Quitzon Corner\nPort Daijatown, DC 07332-2257', '081703930497', 'Audiologist', 1, NULL, NULL),
(432, 'JAYA CELL', '361 Cleveland Prairie Suite 058\nHestermouth, AK 13402-6380', '081938063137', 'Travel Agent', 1, NULL, NULL),
(433, 'TOP TRONIK 4', '7525 VonRueden Loop Suite 179\nWilkinsonshire, DE 61861', '087858733670', 'Prosthodontist', 1, NULL, NULL),
(434, 'TOP TRONIK 6', '3696 Harry Landing Apt. 116\nNew Lewis, GA 91102-6356', '087850809522', 'Woodworking Machine Operator', 1, NULL, NULL),
(435, 'TOP TRONIK 8', '39366 Bins Tunnel\nLake Ignatiuston, KS 77161', '081935060179', 'Cartoonist', 1, NULL, NULL),
(436, 'ISTANA CELL JOMBANG', '740 Allan Cliffs\nDavisland, CO 79168', '081931073079', 'Truck Driver', 1, NULL, NULL),
(437, 'TOP TRONIK 10', '44283 Christine Groves Suite 193\nEarlineville, KS 20296-6861', '081935060148', 'Cooling and Freezing Equipment Operator', 1, NULL, NULL),
(438, 'TOP TRONIK 9', '667 Jaleel Via\nJeremybury, VT 85502', '087850809481', 'Retail Salesperson', 1, NULL, NULL),
(439, 'YENI CELL GEDANGAN', '810 Rippin Meadow\nJesusside, WA 92350-4874', '081938452180', 'Patternmaker', 1, NULL, NULL),
(440, 'GARUDA CELLt', '935 Schulist Corner Apt. 317\nSteuberbury, ME 57688-7522', '081913848519', 'Logging Worker', 1, NULL, NULL),
(441, 'SALSA CELL', '27649 Christiana Vista Apt. 099\nLake Tomasa, CO 11965', '087757029574', 'HVAC Mechanic', 1, NULL, NULL),
(442, 'Ivan cell', '11899 Bailey Tunnel\nLourdesside, HI 67708-4039', '081938073057', 'Extraction Worker', 1, NULL, NULL),
(443, 'TBN ALAM CELL', '48383 Murphy Overpass\nLake Adrianamouth, FL 14939-9727', '087750958071', 'Electric Meter Installer', 1, NULL, NULL),
(444, 'ARUM CELL SEDATI', '6063 Alessandra Pine Suite 835\nOlsonview, CO 15657', '081703231715', 'Camera Operator', 1, NULL, NULL),
(445, 'ian cell', '487 Mraz Mills Suite 623\nAdamsburgh, UT 45984-8579', '081938063476', 'Cement Mason and Concrete Finisher', 1, NULL, NULL),
(446, 'MEGA CELL', '179 Kian Radial Suite 505\nPort Verna, IL 60064-7240', '081935060133', 'Stationary Engineer', 1, NULL, NULL),
(447, 'D CELL CANDI', '96764 Rempel Shoal Suite 813\nNew Georgebury, TX 02781-2370', '08170539703', 'User Experience Researcher', 1, NULL, NULL),
(448, 'OJIK CELL', '9311 Wyman Row Apt. 442\nAuershire, MO 80730-3789', '081913242273', 'Fishery Worker', 1, NULL, NULL),
(449, '85 KOMUNIKA CELL', '18637 Clementine Corner\nWalkerchester, TX 42679-3908', '081938802952', 'Bindery Worker', 1, NULL, NULL),
(450, 'KAYLA 2  CELL', '3095 Breitenberg Drive Suite 212\nWest Monserrateberg, WA 95614', '081938063424', 'Producers and Director', 1, NULL, NULL),
(451, 'YANTI SALON', '7885 Abigale Forest Suite 677\nSwiftbury, MD 17533-3624', '081938062628', 'Well and Core Drill Operator', 1, NULL, NULL),
(452, 'RR CELL', '52840 Orion Walk\nNew Cornelius, IL 78227-5747', '081938062445', 'Plate Finisher', 1, NULL, NULL),
(453, 'KOYEX CELL', '6787 Konopelski Meadow\nPort Gonzalo, CA 84846-3204', '081803001816', 'Copy Machine Operator', 1, NULL, NULL),
(454, 'MTS cell', '659 Trantow Station Apt. 178\nBreitenbergburgh, WA 52245-6763', '081938062514', 'Food Science Technician', 1, NULL, NULL),
(455, 'ADITYA CELL', '8347 Hermiston Wells\nGulgowskifurt, NE 65499', '081938801729', 'Truck Driver', 1, NULL, NULL),
(456, 'BINTANG CELL', '96233 Twila Corners\nBaumbachport, KS 26908-5757', '087856230245', 'Social Worker', 1, NULL, NULL),
(457, 'ELUCKY CELL', '548 Ricky Underpass\nBrennaborough, WA 61212-1201', '081939870067', 'Occupational Therapist', 1, NULL, NULL),
(458, 'ECHA TONE GEDANGAN', '450 Deckow Shore\nPowlowskiburgh, NM 73556-0577', '08175103376', 'Anthropology Teacher', 1, NULL, NULL),
(459, 'LOVARINA CELL', '7623 Kessler Stravenue\nHilpertville, MS 40957', '085931398206', 'Environmental Engineering Technician', 1, NULL, NULL),
(460, 'indopart', '189 Jerrold Village\nWest Camilleland, SD 82732', '081938072950', 'Training Manager OR Development Manager', 1, NULL, NULL),
(461, 'GRK SNOW GIRLS', '67665 Melvina Cliffs\nWelchfurt, AR 47192', '081949640866', 'Industrial-Organizational Psychologist', 1, NULL, NULL),
(462, 'ELJE JAYA CELL', '250 Medhurst Skyway\nLake Elroy, NY 17692', '087856099066', 'Woodworker', 1, NULL, NULL),
(463, 'KEMBAR CLC CELL', '177 Curt Manor Apt. 521\nRolfsontown, AK 13397', '081938452372', 'Special Force', 1, NULL, NULL),
(464, 'hai cell', '58870 Dooley Station\nWalkerside, DE 91505', '081959452744', 'Locomotive Engineer', 1, NULL, NULL),
(465, 'ANANDA CELL 2', '921 Schinner Green\nCamilleborough, IL 46998', '081935053244', 'Ship Captain', 1, NULL, NULL),
(466, 'GRK INDO CELL', '527 Conroy Summit Apt. 958\nNew Stephon, CT 09812', '087856560611', 'Coil Winders', 1, NULL, NULL),
(467, 'WAWANG CELL', '608 Christophe Fort Suite 892\nLake Nickolas, WV 17296', '081913120336', 'HR Manager', 1, NULL, NULL),
(468, 'THE MAX 3', '86016 Kiarra Hill Suite 983\nKleinberg, DC 86372-1634', '081938063480', 'Distribution Manager', 1, NULL, NULL),
(469, 'THE MAX SEDATI', '73259 Oliver Circles Apt. 199\nSouth Nick, MD 34027', '081938062614', 'Potter', 1, NULL, NULL),
(470, 'TRANS CELL', '6335 Kendra Road\nKianmouth, UT 60314-0495', '081913120283', 'CFO', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_dompuls`
--

CREATE TABLE `master_dompuls` (
  `id_dompul` int(10) UNSIGNED NOT NULL,
  `no_hp_master_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_sub_master_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gudang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sub_master_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_sub_master_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_dompuls`
--

INSERT INTO `master_dompuls` (`id_dompul`, `no_hp_master_dompul`, `no_hp_sub_master_dompul`, `id_gudang`, `nama_sub_master_dompul`, `tipe_dompul`, `status_sub_master_dompul`) VALUES
(1, '081938063309', '081938062640', '2', 'SD ROS SDJ', 'SD', 'Aktif'),
(2, '081938063309', '081938062641', '2', 'SD SIDOARJO', 'SD', 'Aktif'),
(3, '081938063309', '081938062642', '2', 'SD MJK-JMB', 'SD', 'Aktif'),
(4, '081938063309', '081938062644', '2', 'SD TUBAN', 'SD', 'Aktif'),
(5, '081938063309', '081938063309', '2', 'MD SIDOARJO', 'MD', 'Aktif'),
(6, '081938063342', '081938063342', '3', 'MD MADIUN', 'MD', 'Aktif'),
(7, '081938063342', '081938063356', '3', 'SD TUL-BLI-TRE', 'SD', 'Aktif'),
(8, '081938063342', '081938063358', '3', 'SD KDR-NGK', 'SD', 'Aktif'),
(9, '081938063342', '081938063363', '3', 'SD GRT-MDN-SRV', 'SD', 'Aktif'),
(10, '081938063342', '081938063370', '3', 'SD MDN-MAG-NGA', 'SD', 'Aktif'),
(11, '081938063342', '081938063371', '3', 'SD PCT-PNR', 'SD', 'Aktif'),
(12, '081938545995', '081938545987', '1', 'SD SERVER', 'SD', 'Aktif'),
(13, '081938545995', '081938545988', '1', 'BANGKALAN', 'SD', 'Aktif'),
(14, '081938545995', '081938545990', '1', 'BANGKALAN DISTRO', 'SD', 'Aktif'),
(15, '081938545995', '081938545993', '1', 'SAMPANG', 'SD', 'Aktif'),
(16, '081938545995', '081938545994', '1', 'SAMPANG DISTRO', 'SD', 'Aktif'),
(17, '081938545995', '081938545995', '1', 'MD MADURA', 'MD', 'Aktif'),
(18, '081938545995', '081938545996', '1', 'PAMEKASAN', 'SD', 'Aktif'),
(19, '081938545995', '081938545997', '1', 'PAMEKASAN DISTRO', 'SD', 'Aktif'),
(20, '081938545995', '081938545998', '1', 'SUMENEP', 'SD', 'Aktif'),
(21, '081938545995', '081938546007', '1', 'SUMENEP DISTRO', 'SD', 'Aktif'),
(22, '581.286.0639 x991', '081938063309', '0', 'MD', 'MD', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_gudangs`
--

CREATE TABLE `master_gudangs` (
  `id_gudang` int(10) UNSIGNED NOT NULL,
  `id_lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_gudang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_gudangs`
--

INSERT INTO `master_gudangs` (`id_gudang`, `id_lokasi`, `alamat_gudang`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Gudang Utama Sampang', 1, '2018-08-29 18:41:45', '2018-08-29 18:41:45'),
(2, '1', 'Gudang Cadangan Sampang', 1, '2018-08-29 18:41:46', '2018-08-29 18:41:46'),
(3, '2', 'Gudang Utama Pamekasan', 1, '2018-08-29 18:41:46', '2018-08-29 18:41:46'),
(4, '2', 'Gudang Cadangan Pamekasan', 1, '2018-08-29 18:41:47', '2018-08-29 18:41:47'),
(5, '3', 'Gudang Utama Bangkalan', 1, '2018-08-29 18:41:47', '2018-08-29 18:41:47'),
(6, '3', 'Gudang Cadangan Bangkalan', 1, '2018-08-29 18:41:47', '2018-08-29 18:41:47'),
(7, '4', 'Gudang Bahan Baku Kedamean', 1, '2018-08-29 18:41:48', '2018-08-29 18:41:48'),
(8, '4', 'Gudang Produksi Kedamean', 1, '2018-08-29 18:41:48', '2018-08-29 18:41:48'),
(9, '5', 'Gudang Bahan Baku Putat', 1, '2018-08-29 18:41:48', '2018-08-29 18:41:48'),
(10, '5', 'Gudang Produksi Putat', 1, '2018-08-29 18:41:48', '2018-08-29 18:41:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_harga_dompuls`
--

CREATE TABLE `master_harga_dompuls` (
  `id_harga_dompul` int(10) UNSIGNED NOT NULL,
  `nama_harga_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_harga_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_dompul` double NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_harga_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_harga_dompuls`
--

INSERT INTO `master_harga_dompuls` (`id_harga_dompul`, `nama_harga_dompul`, `tipe_harga_dompul`, `harga_dompul`, `tanggal_update`, `status_harga_dompul`) VALUES
(1, 'DP5', 'DS', 6000, '2018-08-30 01:40:29', 'Aktif'),
(2, 'DP10', 'DS', 11000, '2018-08-30 01:40:30', 'Aktif'),
(3, 'DP5', 'CVS', 5650, '2018-08-30 01:40:30', 'Aktif'),
(4, 'DP10', 'CVS', 10650, '2018-08-30 01:40:31', 'Aktif'),
(5, 'DP5', 'HI', 5000, '2018-08-30 01:40:32', 'Aktif'),
(6, 'DP10', 'HI', 10000, '2018-08-30 01:40:33', 'Aktif'),
(7, 'DP5', 'SERVER', 5550, '2018-08-30 01:40:34', 'Aktif'),
(8, 'DP10', 'SERVER', 10550, '2018-08-30 01:40:35', 'Aktif'),
(9, 'DP5', 'SDE', 5500, '2018-08-30 01:40:36', 'Aktif'),
(10, 'DP10', 'SDE', 10500, '2018-08-30 01:40:37', 'Aktif'),
(11, 'DOMPUL', 'DS', 1, '2018-08-30 01:40:38', 'Aktif'),
(12, 'DOMPUL', 'CVS', 0.985, '2018-08-30 01:40:38', 'Aktif'),
(13, 'DOMPUL', 'HI', 0.98, '2018-08-30 01:40:39', 'Aktif'),
(14, 'DOMPUL', 'SERVER', 0.985, '2018-08-30 01:40:42', 'Aktif'),
(15, 'DOMPUL', 'SDE', 0.98, '2018-08-30 01:40:44', 'Aktif'),
(16, 'DP5', 'CVS2', 5350, '2018-08-30 01:40:45', 'Aktif'),
(17, 'DP10', 'CVS2', 10350, '2018-08-30 01:40:46', 'Aktif'),
(18, 'DP5', 'CVS1', 5500, '2018-08-30 01:40:46', 'Aktif'),
(19, 'DP10', 'CVS1', 10500, '2018-08-30 01:40:47', 'Aktif'),
(20, 'DP5', 'CVS3', 5450, '2018-08-30 01:40:47', 'Aktif'),
(21, 'DP10', 'CVS3', 10450, '2018-08-30 01:40:48', 'Aktif'),
(22, 'DP5', 'SERVER1', 5400, '2018-08-30 01:40:49', 'Aktif'),
(23, 'DP10', 'SERVER1', 10400, '2018-08-30 01:40:50', 'Aktif'),
(24, 'DP5', 'SERVER2', 5300, '2018-08-30 01:40:51', 'Aktif'),
(25, 'DP10', 'SERVER2', 10300, '2018-08-30 01:40:52', 'Aktif'),
(26, 'DOMPUL', 'CVS1', 0.985, '2018-08-30 01:40:53', 'Aktif'),
(27, 'DOMPUL', 'SERVER1', 0.985, '2018-08-30 01:40:53', 'Aktif'),
(28, 'DOMPUL', 'CVS2', 0.985, '2018-08-30 01:40:54', 'Aktif'),
(29, 'DOMPUL', 'CVS3', 0.985, '2018-08-30 01:40:55', 'Aktif'),
(30, 'DOMPUL', 'SERVER2', 0.985, '2018-08-30 01:40:59', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_harga_sp`
--

CREATE TABLE `master_harga_sp` (
  `id_harga_sp` int(10) UNSIGNED NOT NULL,
  `id_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_harga_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sp` bigint(20) NOT NULL,
  `status_harga_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_harga_sp`
--

INSERT INTO `master_harga_sp` (`id_harga_sp`, `id_produk`, `tipe_harga_sp`, `harga_sp`, `status_harga_sp`) VALUES
(1, 'BG11017', 'CVS', 15500, 'Aktif'),
(2, 'BG11017', 'DS', 18500, 'Aktif'),
(3, 'BG7038', 'CVS', 23000, 'Aktif'),
(4, 'BG4010', 'CVS', 25000, 'Aktif'),
(5, 'BG12046', 'CVS', 101000, 'Aktif'),
(6, 'BG12046', 'DS', 104000, 'Aktif'),
(7, 'BG12042', 'CVS', 21000, 'Aktif'),
(8, 'BG12042', 'DS', 24000, 'Aktif'),
(9, 'BG12043', 'CVS', 31000, 'Aktif'),
(10, 'BG12043', 'DS', 34000, 'Aktif'),
(11, 'BG12044', 'CVS', 51000, 'Aktif'),
(12, 'BG12044', 'DS', 54000, 'Aktif'),
(13, 'BG12045', 'CVS', 81000, 'Aktif'),
(14, 'BG12045', 'DS', 84000, 'Aktif'),
(15, 'BG3035', 'CVS', 485000, 'Aktif'),
(16, 'BG3035', 'DS', 650000, 'Aktif'),
(17, 'BG10004', 'CVS', 20000, 'Aktif'),
(18, 'BG10004', 'DS', 20000, 'Aktif'),
(19, 'BG2008', 'CVS', 20000, 'Aktif'),
(20, 'BG2008', 'DS', 20000, 'Aktif'),
(21, 'BG9012', 'CVS', 11000, 'Aktif'),
(22, 'BG9011', 'CVS', 2100, 'Aktif'),
(23, 'BG9013', 'CVS', 51000, 'Aktif'),
(24, 'BG9036', 'CVS', 975000, 'Aktif'),
(25, 'BG10009', 'CVS', 10000, 'Aktif'),
(26, 'BG11026', 'CVS', 40000, 'Aktif'),
(27, 'BG11026', 'DS', 43000, 'Aktif'),
(28, 'BG11024', 'CVS', 100000, 'Aktif'),
(29, 'BG11027', 'CVS', 54000, 'Aktif'),
(30, 'BG11027', 'DS', 57000, 'Aktif'),
(31, 'BG11018', 'CVS', 25500, 'Aktif'),
(32, 'BG11018', 'DS', 28500, 'Aktif'),
(33, 'BG11019', 'CVS', 39000, 'Aktif'),
(34, 'BG11019', 'DS', 42000, 'Aktif'),
(35, 'BG11020', 'CVS', 47000, 'Aktif'),
(36, 'BG11020', 'DS', 50000, 'Aktif'),
(37, 'BG11052', 'CVS', 55000, 'Aktif'),
(38, 'BG11052', 'DS', 58000, 'Aktif'),
(39, 'BG11021', 'CVS', 57000, 'Aktif'),
(40, 'BG11021', 'DS', 60000, 'Aktif'),
(41, 'BG11022', 'CVS', 67000, 'Aktif'),
(42, 'BG11022', 'DS', 70000, 'Aktif'),
(43, 'BG11053', 'CVS', 75000, 'Aktif'),
(44, 'BG11053', 'DS', 78000, 'Aktif'),
(45, 'BG11023', 'CVS', 82000, 'Aktif'),
(46, 'BG11023', 'DS', 85000, 'Aktif'),
(47, 'BG12047', 'CVS', 11000, 'Aktif'),
(48, 'BG10001', 'CVS', 3500, 'Aktif'),
(49, 'BG10001', 'DS', 3500, 'Aktif'),
(50, 'BG10001', 'HPP', 3000, 'Aktif'),
(51, 'BG10002', 'CVS', 3500, 'Aktif'),
(52, 'BG10002', 'HK1', 2000, 'Aktif'),
(53, 'BG1050', 'CVS', 1000, 'Aktif'),
(54, 'BG1050', 'HPP', 250, 'Aktif'),
(55, 'BG1049', 'CVS', 1000, 'Aktif'),
(56, 'BG1049', 'HPP', 500, 'Aktif'),
(57, 'BG12048', 'CVS', 3500, 'Aktif'),
(58, 'BG12048', 'HPP', 3000, 'Aktif'),
(59, 'BG9051', 'CVS', 500, 'Aktif'),
(60, 'BG9051', 'HPP', 250, 'Aktif'),
(61, 'BG11014', 'CVS', 55000, 'Aktif'),
(62, 'BG2005', 'CVS', 3500, 'Aktif'),
(63, 'BG7015', 'CVS', 23000, 'Aktif'),
(64, 'BG12047', 'CVS', 11000, 'Aktif'),
(65, 'BG6055', 'CVS', 500, 'Aktif'),
(66, 'BG11025', 'CVS', 100000, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_lokasis`
--

CREATE TABLE `master_lokasis` (
  `id_lokasi` int(10) UNSIGNED NOT NULL,
  `nm_lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lokasi` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_lokasis`
--

INSERT INTO `master_lokasis` (`id_lokasi`, `nm_lokasi`, `status_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'XL Sampang', 1, '2018-08-29 18:41:49', '2018-08-29 18:41:49'),
(2, 'XL Pamekasan', 1, '2018-08-29 18:41:50', '2018-08-29 18:41:50'),
(3, 'XL Bangkalan', 1, '2018-08-29 18:41:51', '2018-08-29 18:41:51'),
(4, 'Wijaya Baru Kedamean', 1, '2018-08-29 18:41:52', '2018-08-29 18:41:52'),
(5, 'Wijaya Baru Putat', 1, '2018-08-29 18:41:54', '2018-08-29 18:41:54'),
(6, 'Sumenep', 1, '2018-08-29 18:41:54', '2018-08-29 18:41:54'),
(7, 'Office', 1, '2018-08-29 18:41:56', '2018-08-29 18:41:56'),
(8, 'Office SDA', 1, '2018-08-29 18:41:57', '2018-08-29 18:41:57'),
(9, 'Madiun', 1, '2018-08-29 18:41:58', '2018-08-29 18:41:58'),
(10, 'Ngawi', 1, '2018-08-29 18:41:59', '2018-08-29 18:41:59'),
(11, 'Tulungagung', 1, '2018-08-29 18:42:00', '2018-08-29 18:42:00'),
(12, 'Bangkalan', 1, '2018-08-29 18:42:01', '2018-08-29 18:42:01'),
(13, 'Bojonegoro', 1, '2018-08-29 18:42:03', '2018-08-29 18:42:03'),
(14, 'Sampang', 1, '2018-08-29 18:42:04', '2018-08-29 18:42:04'),
(15, 'Sidoarjo', 1, '2018-08-29 18:42:04', '2018-08-29 18:42:04'),
(16, 'Gresik', 1, '2018-08-29 18:42:05', '2018-08-29 18:42:05'),
(17, 'Lamongan', 1, '2018-08-29 18:42:06', '2018-08-29 18:42:06'),
(18, 'Jombang', 1, '2018-08-29 18:42:06', '2018-08-29 18:42:06'),
(19, 'Mojokerto', 1, '2018-08-29 18:42:06', '2018-08-29 18:42:06'),
(20, 'Tuban', 1, '2018-08-29 18:42:06', '2018-08-29 18:42:06'),
(21, 'Trenggalek', 1, '2018-08-29 18:42:08', '2018-08-29 18:42:08'),
(22, 'Kediri', 1, '2018-08-29 18:42:08', '2018-08-29 18:42:08'),
(23, 'Nganjuk', 1, '2018-08-29 18:42:09', '2018-08-29 18:42:09'),
(24, 'Blitar', 1, '2018-08-29 18:42:09', '2018-08-29 18:42:09'),
(25, 'Pacitan', 1, '2018-08-29 18:42:09', '2018-08-29 18:42:09'),
(26, 'Ponorogo', 1, '2018-08-29 18:42:09', '2018-08-29 18:42:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pemborongs`
--

CREATE TABLE `master_pemborongs` (
  `id_pb` int(10) UNSIGNED NOT NULL,
  `nm_pb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_ang` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_pemborongs`
--

INSERT INTO `master_pemborongs` (`id_pb`, `nm_pb`, `jenis_pb`, `jml_ang`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Annisa Jarizky', 'Pemborong Cat', 14, 1, '2018-08-29 18:42:10', '2018-08-29 18:42:10'),
(2, 'M. Hauwin', 'Pemborong Rakit', 19, 1, '2018-08-29 18:42:10', '2018-08-29 18:42:10'),
(3, 'Miftahur Rahman', 'Pemborong Fitting', 17, 1, '2018-08-29 18:42:11', '2018-08-29 18:42:11'),
(4, 'Nabil Dzaki', 'Pemborong Las', 9, 1, '2018-08-29 18:42:11', '2018-08-29 18:42:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_ppns`
--

CREATE TABLE `master_ppns` (
  `id_ppn` int(10) UNSIGNED NOT NULL,
  `jenis_ppn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_ppns`
--

INSERT INTO `master_ppns` (`id_ppn`, `jenis_ppn`, `status`) VALUES
(1, 'PPN 5%', 1),
(2, 'PPN 10%', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_produks`
--

CREATE TABLE `master_produks` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BOM` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` double NOT NULL,
  `tarif_pajak` double NOT NULL,
  `diskon` double NOT NULL,
  `komisi` double NOT NULL,
  `status_produk` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_produks`
--

INSERT INTO `master_produks` (`id_produk`, `kode_produk`, `nama_produk`, `kategori_produk`, `satuan`, `jenis`, `BOM`, `harga_jual`, `tarif_pajak`, `diskon`, `komisi`, `status_produk`) VALUES
(1, 'BG9051', 'VOUCHERINET10KAXIS', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(2, 'BG9036', 'ROUTER', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(3, 'BG9013', 'PV50K', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(4, 'BG9012', 'PV10K', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(5, 'BG9011', 'PV2K', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(6, 'BG7038', 'BRONET 2GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(7, 'BG7016', 'BRONET 5GB ( 151 )', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(8, 'BG7015', 'BRONET 2GB ( 151 )', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(9, 'BG6055', 'SP0KAXISGAOL', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(10, 'BG6040', 'SP2KAXGAOL', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(11, 'BG4010', 'CIP DOMPUL', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(12, 'BG3035', 'MIFI', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(13, 'BG2039', 'SP3KLTE128', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(14, 'BG2032', 'SP0KDATALTEOP HOTRODXFLASH 4GB 60D', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(15, 'BG2008', 'NOCAN SP3KAXISGAOL', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(16, 'BG2007', 'SP3KAXISGAOL RELOAD', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(17, 'BG2006', 'SP3KAXISGAOL AKTIF', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(18, 'BG2005', 'SP3KAXISGAOL', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(19, 'BG12048', 'SP3KXLNEWPRE', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(20, 'BG12047', 'SP YOTOP', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(21, 'BG12046', 'Combo Lite 12GB+', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(22, 'BG12045', 'Combo Lite 8GB+', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(23, 'BG12044', 'Combo Lite 4GB+', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(24, 'BG12043', 'Combo Lite 2GB+', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(25, 'BG12042', 'Combo Lite 1GB+', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(26, 'BG11053', 'SP WHITELIST 6GB convertan 16GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(27, 'BG11052', 'SP WHITELIST 4GB convertan 10GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(28, 'BG11029', 'SP WHITELIST 4 15GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(29, 'BG11028', 'SP WHITELIST 2 10GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(30, 'BG11027', 'SP WHITELIST 2+14GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(31, 'BG11026', 'SP WHITELIST 1+9GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(32, 'BG11025', 'SP WHITELIST 16 GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(33, 'BG11024', 'SP WHITELIST 10 GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(34, 'BG11023', 'SP WHITELIST 8GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(35, 'BG11022', 'SP WHITELIST 6 GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(36, 'BG11021', 'SP WHITELIST 5 GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(37, 'BG11020', 'SP WHITELIST 4GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(38, 'BG11019', 'SP WHITELIST 3GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(39, 'BG11018', 'SP WHITELIST 2GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(40, 'BG11017', 'SP WHITELIST 1 GB', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(41, 'BG11014', 'SP WHITELIST 2 GB COMBO', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(42, 'BG1050', 'SP0KAXISHITZ', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(43, 'BG1049', 'SP0KXLNEWPRE', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(44, 'BG10034', 'SP0KDATALTEOP HOTRODXFLASH 10GB 60D', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(45, 'BG10033', 'SP0KDATALTEOP HOTRODXFLASH 6GB 60D', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(46, 'BG10031', 'SP0KDATALTEOP HOTRODXFLASH 2GB 60D', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(47, 'BG10030', 'SP0KDATALTEOP HOTRODXFLASH 1 GB 60D', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(48, 'BG10009', 'SP REPLACE', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(49, 'BG10004', 'NOCAN SP0K DATALTEOP', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1),
(50, 'BG10003', 'SP0K DATALTEOP RELOAD', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(51, 'BG10002', 'SP0K DATALTEOP AKTIF', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 0),
(52, 'BG10001', 'SP0K DATALTEOP', 'SP', 'PCS', 'GOODS', 'YA', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_saless`
--

CREATE TABLE `master_saless` (
  `id_sales` int(10) UNSIGNED NOT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `nm_sales` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sales` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_saless`
--

INSERT INTO `master_saless` (`id_sales`, `id_lokasi`, `nm_sales`, `alamat_sales`, `no_hp`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Selvi', 'Gresik', '082761892123', 1, '2018-08-29 18:42:11', '2018-08-29 18:42:11'),
(2, NULL, 'Abdul Muiz', 'Gresik', '087805834781', 1, '2018-08-29 18:42:12', '2018-08-29 18:42:12'),
(3, NULL, 'Misbahul Ulum', 'Gresik', '087819554765', 1, '2018-08-29 18:42:12', '2018-08-29 18:42:12'),
(4, NULL, 'Hanif Ashar', 'Gresik', '087753094222', 1, '2018-08-29 18:42:13', '2018-08-29 18:42:13'),
(5, NULL, 'Agus Salim', 'Sidoarjo', '081935015005', 1, '2018-08-29 18:42:14', '2018-08-29 18:42:14'),
(6, NULL, 'Kesuma Reshi', 'Sidoarjo', '087701111762', 1, '2018-08-29 18:42:14', '2018-08-29 18:42:14'),
(7, NULL, 'Fauzy Ahdiat', 'Sidoarjo', '087852821951', 1, '2018-08-29 18:42:14', '2018-08-29 18:42:14'),
(8, NULL, 'Miftakhur Rozak', 'Jombang', '087752623999', 1, '2018-08-29 18:42:15', '2018-08-29 18:42:15'),
(9, NULL, 'Agus Susanto', 'Bojonegoro', '087753167878', 1, '2018-08-29 18:42:15', '2018-08-29 18:42:15'),
(10, NULL, 'Puji Karyono', 'Mojokerto', '087702406667', 1, '2018-08-29 18:42:16', '2018-08-29 18:42:16'),
(11, 0, 'GRK-ABDUL MUIZ', '6670 Desmond Loaf Suite 601\nAnyaton, MO 34318', '087805834781', 1, NULL, NULL),
(12, 0, 'SDA-AGUS SALIM', '381 Monahan Parkway Suite 603\nGreenholtborough, NJ 71977-1399', '081935015005', 1, NULL, NULL),
(13, 0, 'SDA-KESUMA RESHI', '63025 Heathcote Square Suite 699\nPort Katlyn, DE 86218', '087701111762', 1, NULL, NULL),
(14, 0, 'JMB-MIFTACHUR ROZAK', '79239 Dibbert Shores\nFreddieside, AR 83392', '087752623999', 1, NULL, NULL),
(15, 0, 'BJG-AGUS SUSANTO', '91793 Mayert Isle\nKuvalisport, AZ 93659-6614', '087753167878', 1, NULL, NULL),
(16, 0, 'GRK-MISBAHUL ULUM', '5105 Justen Run Apt. 819\nEast Kristofferton, TN 71940-3152', '087819554765', 1, NULL, NULL),
(17, 0, 'GRK-HANIF ASHAR', '589 Jett Shores Apt. 384\nEast Cynthia, DC 65012', '087753094222', 1, NULL, NULL),
(18, 0, 'SDA-CANDRA', '5173 Margarett Square Suite 617\nLake Dashawnburgh, CT 43877', '083832555495', 1, NULL, NULL),
(19, 0, 'SDA-ROBY P.P', '9742 Ledner Junctions Suite 399\nMrazton, NY 04124-5221', '087701000420', 1, NULL, NULL),
(20, 0, 'MJK-PUJI KARYONO', '978 Kilback Radial Apt. 753\nRosieberg, KS 93428-2609', '087702406667', 1, NULL, NULL),
(21, 0, 'SDA-FAUZY AHDIAT', '117 Nitzsche Fork\nNorth Vivianneton, SC 95313', '087852821951', 1, NULL, NULL),
(22, 0, 'BJG-PUJIHANTO', '5620 Kiehn Court Suite 051\nSouth Greysonmouth, AR 19856', '083856929617', 1, NULL, NULL),
(23, 0, 'TBN-ANDRI SAPUTRA', '36378 Kuvalis Street\nFaheyborough, SC 63726', '087856344433', 1, NULL, NULL),
(24, 0, 'SDA-IMAM HIDAYAT', '8638 O\'Kon Junctions\nPort Megane, RI 66225', '087856665455', 1, NULL, NULL),
(25, 0, 'SDA-HANDAYANI', '16515 Waelchi Mews\nPort Dinoberg, WV 68482-3845', '087701000096', 1, NULL, NULL),
(26, 0, 'SDA-DIDIK ANDRIANTO', '17676 Elinore Roads\nCamilaland, AR 81739', '087701111860', 1, NULL, NULL),
(27, 0, 'JMB-SULIKIN', '632 Winifred Viaduct\nKalebton, MN 08479-8290', '087703499322', 1, NULL, NULL),
(28, 0, 'SDA-SITI NAFISHA', '29826 Krystal Haven\nHarryborough, NY 97616-9621', '083856948889', 1, NULL, NULL),
(29, 0, 'MJK-SUNAN', '87435 Monahan Mission Apt. 430\nBlandamouth, NH 42756-6462', '087753251616', 1, NULL, NULL),
(30, 0, 'LMG-MOCH SYAHPUTRA', '20110 Kiehn Place\nAdrianastad, ND 07466-4534', '081913714141', 1, NULL, NULL),
(31, 0, 'TBN-M.MARZUQUN', '703 Wiegand Mount Suite 481\nLake Kamronton, NE 42852-0913', '087856320444', 1, NULL, NULL),
(32, 0, 'GRK-FENDI PURNOMO', '3934 Corkery Ranch\nGutmanntown, SD 46269-8969', '087701112509', 1, NULL, NULL),
(33, 0, 'MJK-DONY INDARKO', '24061 Powlowski Locks\nSheilaside, AK 11952-8961', '081938882277', 1, NULL, NULL),
(34, 0, 'SDA-M.JANUAR FAHMI', '29812 Skiles Walk Suite 216\nLangburgh, VT 96921-5500', '083831998975', 1, NULL, NULL),
(35, 0, 'MJK-TOMMY WIJAYA', '88545 Ondricka Grove Apt. 672\nStreichmouth, NY 90785-4088', '087701342666', 1, NULL, NULL),
(36, 0, 'JMB-IRAWAN', '216 Donny Spurs Apt. 601\nSouth Christophertown, HI 15864', '087702851112', 1, NULL, NULL),
(37, 0, 'GRK-AMI SUSILO', '11695 Schinner Lakes\nPort Gerardside, TX 99463-3997', '081949659898', 1, NULL, NULL),
(38, 0, 'TBN-WAHYUANDA FIRMAN', '35280 Elza Inlet Apt. 804\nNew Christiana, MI 58222', '081949762444', 1, NULL, NULL),
(39, 0, 'SDA-RICKY SETIAWAN', '578 Schuster Land\nShermanfort, SD 76182', '087771770757', 1, NULL, NULL),
(40, 0, 'SDA-DEVI ALFIAN', '9437 Satterfield Trafficway\nWizastad, NC 54691', '087752977788', 1, NULL, NULL),
(41, 0, 'LMG-EKO WAHYU', '88399 Stiedemann Ford Suite 518\nWest Conormouth, MI 21662', '087701029091', 1, NULL, NULL),
(42, 0, 'BJG-JAROT ASMORO', '782 Jarred Locks\nCarloview, MI 11930', '081949888886', 1, NULL, NULL),
(43, 0, 'DENY DWIYANTO', '5646 Kiara Dale\nSouth Frederic, HI 26131-6759', '08175207075', 1, NULL, NULL),
(44, 0, 'OFFICE', '1543 Monserrate Squares\nWest Jamisonshire, WI 49875', '085942838872', 1, NULL, NULL),
(45, 0, 'OFFICE SDA', '220 Kutch Parks\nLake Mollieland, TN 00728-9197', '087702410260', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_satuans`
--

CREATE TABLE `master_satuans` (
  `id_satuan` int(10) UNSIGNED NOT NULL,
  `nama_satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `induk_satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_konversi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_satuans`
--

INSERT INTO `master_satuans` (`id_satuan`, `nama_satuan`, `tipe_satuan`, `induk_satuan`, `nilai_konversi`, `status_satuan`) VALUES
(1, 'PCS', 'Induk', 'PCS', 'PCS', 'tersedia'),
(2, 'BOX', 'Induk', 'BOX', 'BOX', 'tersedia'),
(3, 'Unit', 'Induk', 'Unit', 'Unit', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_supervisors`
--

CREATE TABLE `master_supervisors` (
  `id_spv` int(10) UNSIGNED NOT NULL,
  `nm_spv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_spv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_supervisors`
--

INSERT INTO `master_supervisors` (`id_spv`, `nm_spv`, `alamat_spv`, `no_hp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faisal Muzakki', 'Jl. Anggrek No.1', '08183459203', 1, '2018-08-29 18:42:17', '2018-08-29 18:42:17'),
(2, 'Rahma Melati', 'Jl. Melati No.2', '08769302832', 1, '2018-08-29 18:42:18', '2018-08-29 18:42:18'),
(3, 'Diah Widyaningsih', 'Jl. Teratai No.98', '085739279273', 1, '2018-08-29 18:42:18', '2018-08-29 18:42:18'),
(4, 'Rahmat Dicky', 'Jl. Sulawesi No.90', '08167892873', 1, '2018-08-29 18:42:19', '2018-08-29 18:42:19'),
(5, 'Farah Herzygofah', 'Jl. Sidokumpul No.56', '081567926728', 1, '2018-08-29 18:42:20', '2018-08-29 18:42:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_suppliers`
--

CREATE TABLE `master_suppliers` (
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `norek_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_suppliers`
--

INSERT INTO `master_suppliers` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telepon_supplier`, `email_supplier`, `bank_supplier`, `norek_supplier`, `status_supplier`) VALUES
(1, 'XL', 'Sidoarjo', '081938062644', 'xladminn@gmail.com', 'Bank Mandiri', '111458772135', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_tipe_dompul`
--

CREATE TABLE `master_tipe_dompul` (
  `id_tipe_dompul` int(10) UNSIGNED NOT NULL,
  `tipe_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tipe_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_tipe_dompul`
--

INSERT INTO `master_tipe_dompul` (`id_tipe_dompul`, `tipe_dompul`, `status_tipe_dompul`) VALUES
(1, 'DS', 'Aktif'),
(2, 'CVS', 'Aktif'),
(3, 'HI', 'Aktif'),
(4, 'SERVER', 'Aktif'),
(5, 'SDE', 'Aktif'),
(6, 'CVS1', 'Aktif'),
(7, 'CVS2', 'Aktif'),
(8, 'CVS3', 'Aktif'),
(9, 'SERVER1', 'Aktif'),
(10, 'SERVER2', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_14_012429_create_banks_table', 1),
(4, '2018_07_16_120141_create_master_customers_table', 1),
(5, '2018_07_16_120621_create_master_lokasis_table', 1),
(6, '2018_07_16_120635_create_master_saless_table', 1),
(7, '2018_07_16_122728_create_master_gudangs_table', 1),
(8, '2018_07_16_122943_create_produks_table', 1),
(9, '2018_07_17_035447_create_satuans_table', 1),
(10, '2018_07_17_041035_create_suppliers_table', 1),
(11, '2018_07_17_122800_create_dompuls_table', 1),
(12, '2018_07_17_154409_create_master_pemborongs_table', 1),
(13, '2018_07_17_154504_create_master_supervisors_table', 1),
(14, '2018_07_19_082948_create_master_harga_dompul', 1),
(15, '2018_07_19_083601_create_master_harga_sp', 1),
(16, '2018_07_19_085504_create_spkcs_table', 1),
(17, '2018_07_22_105152_create_upload_dompuls_table', 1),
(18, '2018_07_22_120740_create_master_tipe_dompul_table', 1),
(19, '2018_07_24_065421_create_cara_bayars_table', 1),
(20, '2018_07_24_113035_create_penjualan_dompuls_table', 1),
(21, '2018_07_28_104901_create_pbb_tabels_table', 1),
(22, '2018_07_28_151018_create_pbb_details_table', 1),
(23, '2018_08_01_121338_create_kasbon_tabels_table', 1),
(24, '2018_08_03_085605_create_hos_table', 1),
(25, '2018_08_03_085640_create_bos_table', 1),
(26, '2018_08_06_061117_create_penjualan_sps_table', 1),
(27, '2018_08_06_061721_create_detail_penjualan_sps_table', 1),
(28, '2018_08_08_040700_create_pembayaran_penjualan_dompuls_table', 1),
(29, '2018_08_08_040733_create_pembayaran_penjualan_sps_table', 1),
(30, '2018_08_08_085242_create_kartu_stok_sps_table', 1),
(31, '2018_08_08_085306_create_kartu_stok_dompuls_table', 1),
(32, '2018_08_12_070643_create_detail_penjualan_dompuls_table', 1),
(33, '2018_08_13_043530_create_temp_penjualan_sps_table', 1),
(34, '2018_08_13_062548_create_temp_detail_penjualan_sps_table', 1),
(35, '2018_08_13_081618_create_detail_pembayaran_sps_table', 1),
(36, '2018_08_19_052911_create_pembelian_sps_table', 1),
(37, '2018_08_19_053150_create_detail_pembelian_sps_table', 1),
(38, '2018_08_19_060823_create_detail_pembayaran_pembelian_sps_table', 1),
(39, '2018_08_19_061049_create_pembelian_dompuls_table', 1),
(40, '2018_08_19_061230_create_detail_pembelian_dompuls_table', 1),
(41, '2018_08_19_072513_create_detail_pembayaran_pembelian_dompuls_table', 1),
(42, '2018_08_19_074317_create_temp_pembelian_dompuls_table', 1),
(43, '2018_08_19_074331_create_temp_detail_pembelian_dompuls_table', 1),
(44, '2018_08_19_074354_create_temp_pembelian_sps_table', 1),
(45, '2018_08_19_074405_create_temp_detail_pembelian_sps_table', 1),
(46, '2018_08_23_025945_create_master_ppns_table', 1),
(47, '2018_08_28_070030_create_penawarans_table', 1),
(48, '2018_08_28_070058_create_produksi_details_table', 1),
(49, '2018_08_28_070111_create_produksi_tabels_table', 1),
(50, '2018_08_28_070124_create_qcpb_tabels_table', 1),
(51, '2018_08_28_070151_create_surat_jalan_tabels_table', 1),
(52, '2018_08_28_075313_create_spkpbs_table', 1),
(53, '2018_08_30_005330_view_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbb_details`
--

CREATE TABLE `pbb_details` (
  `id_detailpbb` int(10) UNSIGNED NOT NULL,
  `id_pbb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_wo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `material` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_setuju` int(11) NOT NULL DEFAULT 0,
  `catatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `votes` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbb_tabels`
--

CREATE TABLE `pbb_tabels` (
  `id_pbb` int(10) UNSIGNED NOT NULL,
  `id_spkpb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `id_wo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalharga_material` double NOT NULL DEFAULT 0,
  `tgl_pbb` timestamp NOT NULL DEFAULT current_timestamp(),
  `pemohon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_penjualan_dompuls`
--

CREATE TABLE `pembayaran_penjualan_dompuls` (
  `id_pembayaran_penjualan_dompul` int(10) UNSIGNED NOT NULL,
  `id_penjualan_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembayaran_penjualan` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `status_pembayaran_penjualan` tinyint(4) NOT NULL DEFAULT 0,
  `status_cetak` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_penjualan_sps`
--

CREATE TABLE `pembayaran_penjualan_sps` (
  `id_pembayaran_penjualan_sp` int(10) UNSIGNED NOT NULL,
  `id_penjualan_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembayaran_penjualan` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `status_pembayaran_penjualan` tinyint(4) NOT NULL DEFAULT 0,
  `status_cetak` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_dompuls`
--

CREATE TABLE `pembelian_dompuls` (
  `id_pembelian_dompul` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian_dompul` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `status_pembayaran` tinyint(4) NOT NULL DEFAULT 0,
  `status_pembelian` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_dompuls`
--

INSERT INTO `pembelian_dompuls` (`id_pembelian_dompul`, `id_supplier`, `id_lokasi`, `id_user`, `tanggal_pembelian_dompul`, `tanggal_input`, `grand_total`, `status_pembayaran`, `status_pembelian`, `deleted`) VALUES
(1, 1, 4, '1', '2018-08-30', '2018-08-30', 80005, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_sps`
--

CREATE TABLE `pembelian_sps` (
  `id_pembelian_sp` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian_sp` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `grand_total` bigint(20) NOT NULL DEFAULT 0,
  `status_pembayaran` tinyint(4) NOT NULL DEFAULT 0,
  `status_pembelian` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawarans`
--

CREATE TABLE `penawarans` (
  `id_spkc` int(11) NOT NULL,
  `id_penawaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_penawaran` date NOT NULL,
  `karoseri_penawaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_unit_penawaran` int(11) NOT NULL,
  `harga_unit_penawaran` double NOT NULL,
  `ppb_penawaran` double NOT NULL,
  `total_harga_penawaran` double NOT NULL,
  `spek_penawaran` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_dompuls`
--

CREATE TABLE `penjualan_dompuls` (
  `id_penjualan_dompul` int(10) UNSIGNED NOT NULL,
  `id_sales` int(11) NOT NULL,
  `id_bo` int(11) NOT NULL,
  `no_hp_kios` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penjualan_dompul` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `status_pembayaran` tinyint(4) NOT NULL DEFAULT 0,
  `status_penjualan` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_sps`
--

CREATE TABLE `penjualan_sps` (
  `id_penjualan_sp` int(10) UNSIGNED NOT NULL,
  `id_sales` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `no_hp_customer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penjualan_sp` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `grand_total` bigint(20) NOT NULL DEFAULT 0,
  `status_pembayaran` tinyint(4) NOT NULL DEFAULT 0,
  `status_penjualan` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_details`
--

CREATE TABLE `produksi_details` (
  `id_detailproduksi` int(10) UNSIGNED NOT NULL,
  `id_produksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_jam` datetime NOT NULL,
  `foto_pengerjaan` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_tabels`
--

CREATE TABLE `produksi_tabels` (
  `id_produksi` int(10) UNSIGNED NOT NULL,
  `kode_produksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spkc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` datetime DEFAULT NULL,
  `status_produksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BELUM SELESAI',
  `status_print_sj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BELUM PRINT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `qcpb_tabels`
--

CREATE TABLE `qcpb_tabels` (
  `id_qcpb` int(10) UNSIGNED NOT NULL,
  `tgl_pengerjaan` date NOT NULL,
  `tgl_progress` datetime DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `jenis_pekerjaan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persentase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0%',
  `id_spkpb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_pb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spkcs`
--

CREATE TABLE `spkcs` (
  `id_spkc` int(10) UNSIGNED NOT NULL,
  `id_cust` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `nm_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_karoseri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `harga_unit` double NOT NULL,
  `ppn` double NOT NULL,
  `harga_total` double NOT NULL,
  `dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `statuswo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `vote` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spkpbs`
--

CREATE TABLE `spkpbs` (
  `id_spkpb` int(10) UNSIGNED NOT NULL,
  `id_pb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spkc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pbb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_spkpb` date NOT NULL,
  `ukuran_karoseri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_borongan` double NOT NULL,
  `keterangan_spkpb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_spkpb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `status_print` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BELUM PRINT',
  `tanggal_print` date DEFAULT NULL,
  `vote_spkpb` tinyint(4) NOT NULL DEFAULT 1,
  `vote_qc` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalan_tabels`
--

CREATE TABLE `surat_jalan_tabels` (
  `id_sj` int(10) UNSIGNED NOT NULL,
  `id_produksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spkc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `nm_sopir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload_dompuls`
--

CREATE TABLE `upload_dompuls` (
  `id_upload` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_penjualan_dompul` int(11) DEFAULT NULL,
  `no_hp_sub_master_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sub_master_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `tanggal_upload` date NOT NULL,
  `no_faktur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) NOT NULL,
  `qty_program` bigint(20) NOT NULL,
  `balance` double NOT NULL,
  `diskon` double NOT NULL,
  `no_hp_downline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_downline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_canvasser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_canvasser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inbox` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `print` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_dompul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CVS',
  `harga_dompul` double NOT NULL DEFAULT 0,
  `status_active` tinyint(4) NOT NULL DEFAULT 0,
  `status_penjualan` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `upload_dompuls`
--

INSERT INTO `upload_dompuls` (`id_upload`, `id_user`, `id_lokasi`, `id_penjualan_dompul`, `no_hp_sub_master_dompul`, `nama_sub_master_dompul`, `tanggal_transfer`, `tanggal_upload`, `no_faktur`, `produk`, `qty`, `qty_program`, `balance`, `diskon`, `no_hp_downline`, `nama_downline`, `status`, `no_hp_canvasser`, `nama_canvasser`, `inbox`, `print`, `bayar`, `tipe_dompul`, `harga_dompul`, `status_active`, `status_penjualan`, `deleted`) VALUES
(1, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180001S-KOKO', 'DOMPUL', 300000, 0, 935770, 1.5, '087750955792', 'SASMITA CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(2, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180002S-KOKO', 'DOMPUL', 500000, 0, 435770, 1.5, '081913810492', 'GRK ID CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(3, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180002S-KOKO', 'DP10', 30, 0, 4888, 0, '081913810492', 'GRK ID CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(4, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180002S-KOKO', 'DP5', 20, 0, 9852, 0, '081913810492', 'GRK ID CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(5, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180003S-KOKO', 'DOMPUL', 600000, 0, 4180820, 1.5, '081803000271', 'GFR CELL KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(6, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180003S-KOKO', 'DP10', 60, 0, 3617, 0, '081803000271', 'GFR CELL KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(7, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180003S-KOKO', 'DP5', 60, 0, 8965, 0, '081803000271', 'GFR CELL KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(8, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180004S-KOKO', 'DOMPUL', 200000, 0, 235770, 1.5, '081913810638', 'GRK ID 2 CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(9, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180004S-KOKO', 'DP10', 5, 0, 4883, 0, '081913810638', 'GRK ID 2 CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(10, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180004S-KOKO', 'DP5', 7, 0, 9845, 0, '081913810638', 'GRK ID 2 CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(11, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180005S-KOKO', 'DP10', 30, 0, 83735, 0, '087854000320', 'Yoga 2 Cell', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(12, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180005S-KOKO', 'DP5', 20, 0, 26301, 0, '087854000320', 'Yoga 2 Cell', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(13, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180006S-KOKO', 'DOMPUL', 200000, 0, 3980820, 1.5, '081938450042', 'SUNTORO CELLKRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(14, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180006S-KOKO', 'DP10', 20, 0, 3597, 0, '081938450042', 'SUNTORO CELLKRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(15, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180006S-KOKO', 'DP5', 20, 0, 8945, 0, '081938450042', 'SUNTORO CELLKRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(16, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180007S-KOKO', 'DOMPUL', 1000000, 0, 2980820, 1.5, '08179392388', 'MARS CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(17, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180007S-KOKO', 'DP10', 50, 0, 3547, 0, '08179392388', 'MARS CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(18, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180007S-KOKO', 'DP5', 60, 0, 8885, 0, '08179392388', 'MARS CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(19, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180008S-KOKO', 'DOMPUL', 100000, 0, 6732195, 1.5, '081913132540', 'PULSA PULSA', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(20, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180008S-KOKO', 'DP10', 10, 0, 8196, 0, '081913132540', 'PULSA PULSA', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(21, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180008S-KOKO', 'DP5', 10, 0, 4000, 0, '081913132540', 'PULSA PULSA', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(22, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180009S-KOKO', 'DP5', 20, 0, 3980, 0, '081939870837', '3D CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(23, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180010S-KOKO', 'DOMPUL', 1000000, 0, 9235770, 1.5, '081913132354', 'CYBER CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(24, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180011S-KOKO', 'DOMPUL', 700000, 0, 534274900, 1.5, '081938062435', '46 CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(25, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180012S-KOKO', 'DOMPUL', 500000, 0, 8735770, 1.5, '087750954914', 'AGUS CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(26, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180012S-KOKO', 'DP10', 20, 0, 4863, 0, '087750954914', 'AGUS CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(27, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180012S-KOKO', 'DP5', 20, 0, 9825, 0, '087750954914', 'AGUS CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(28, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180013S-KOKO', 'DOMPUL', 1000000, 0, 1980820, 1.5, '081931572439', 'VINA CELL KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(29, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180015S-KOKO', 'DOMPUL', 100000, 0, 1880820, 1.5, '085931398333', 'ROYAL PONSEL', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(30, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180014S-KOKO', 'DP10', 50, 0, 4813, 0, '087750954146', 'BJN TOFA CEL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(31, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180014S-KOKO', 'DP5', 50, 0, 9775, 0, '087750954146', 'BJN TOFA CEL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(32, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180016S-KOKO', 'DOMPUL', 500000, 0, 8235770, 1.5, '087856230161', 'GRK ALIF CELL BUNGA', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(33, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180016S-KOKO', 'DP10', 70, 0, 4743, 0, '087856230161', 'GRK ALIF CELL BUNGA', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(34, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180016S-KOKO', 'DP5', 70, 0, 9705, 0, '087856230161', 'GRK ALIF CELL BUNGA', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(35, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180017S-KOKO', 'DOMPUL', 300000, 0, 7935770, 1.5, '087856231710', 'GRK BRALINK CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(36, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180017S-KOKO', 'DP10', 20, 0, 4723, 0, '087856231710', 'GRK BRALINK CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(37, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180017S-KOKO', 'DP5', 15, 0, 9690, 0, '087856231710', 'GRK BRALINK CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(38, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180018S-KOKO', 'DOMPUL', 500000, 0, 1380820, 1.5, '087856560771', 'CAESAR CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(39, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180018S-KOKO', 'DP10', 50, 0, 3497, 0, '087856560771', 'CAESAR CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(40, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180018S-KOKO', 'DP5', 50, 0, 8835, 0, '087856560771', 'CAESAR CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(41, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180019S-KOKO', 'DOMPUL', 200000, 0, 7735770, 1.5, '087851052065', 'GRK RIZKY CELL DRIYOREJO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(42, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180019S-KOKO', 'DP10', 10, 0, 4713, 0, '087851052065', 'GRK RIZKY CELL DRIYOREJO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(43, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180019S-KOKO', 'DP5', 10, 0, 9680, 0, '087851052065', 'GRK RIZKY CELL DRIYOREJO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(44, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180020S-KOKO', 'DOMPUL', 1000000, 0, 533274900, 1.5, '081938063636', 'WB cell 3', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(45, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180020S-KOKO', 'DP10', 65, 0, 83670, 0, '081938063636', 'WB cell 3', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(46, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180020S-KOKO', 'DP5', 35, 0, 26266, 0, '081938063636', 'WB cell 3', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(47, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180021S-KOKO', 'DP10', 10, 0, 4703, 0, '081913811402', 'GRK LOVIE CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(48, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180021S-KOKO', 'DP5', 10, 0, 9670, 0, '081913811402', 'GRK LOVIE CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(49, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180022S-KOKO', 'DOMPUL', 100000, 0, 533174900, 1.5, '081938072787', 'Puma cell.', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(50, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180022S-KOKO', 'DP10', 5, 0, 83665, 0, '081938072787', 'Puma cell.', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(51, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180023S-KOKO', 'DOMPUL', 500000, 0, 880820, 1.5, '081938062597', 'WB 2 CELL WEDORO', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(52, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180023S-KOKO', 'DP10', 45, 0, 3452, 0, '081938062597', 'WB 2 CELL WEDORO', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(53, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180023S-KOKO', 'DP5', 35, 0, 8800, 0, '081938062597', 'WB 2 CELL WEDORO', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(54, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180024S-KOKO', 'DOMPUL', 250000, 0, 532924900, 1.5, '081938063515', 'IN PULSA', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(55, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180024S-KOKO', 'DP10', 20, 0, 83645, 0, '081938063515', 'IN PULSA', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(56, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180024S-KOKO', 'DP5', 15, 0, 26251, 0, '081938063515', 'IN PULSA', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(57, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180025S-KOKO', 'DOMPUL', 100000, 0, 532824900, 1.5, '081938063621', 'KARYA UNGGUL 1', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(58, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180025S-KOKO', 'DP10', 10, 0, 83635, 0, '081938063621', 'KARYA UNGGUL 1', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(59, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180025S-KOKO', 'DP5', 10, 0, 26241, 0, '081938063621', 'KARYA UNGGUL 1', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(60, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180026S-KOKO', 'DOMPUL', 200000, 0, 6532195, 1.5, '081913115801', 'DRIAN CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(61, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180027S-KOKO', 'DOMPUL', 500000, 0, 380820, 1.5, '081938802022', 'REGGAE CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(62, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180027S-KOKO', 'DP10', 20, 0, 3432, 0, '081938802022', 'REGGAE CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(63, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180027S-KOKO', 'DP5', 15, 0, 8785, 0, '081938802022', 'REGGAE CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(64, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180028S-KOKO', 'DOMPUL', 1000000, 0, 6735770, 1.5, '087854153457', 'GRK HANIF CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(65, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180028S-KOKO', 'DP10', 40, 0, 4663, 0, '087854153457', 'GRK HANIF CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(66, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180028S-KOKO', 'DP5', 30, 0, 9640, 0, '087854153457', 'GRK HANIF CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(67, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180029S-KOKO', 'DOMPUL', 400000, 0, 6335770, 1.5, '081949610770', 'GRK EXOTIK 2 CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(68, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180029S-KOKO', 'DP10', 30, 0, 4633, 0, '081949610770', 'GRK EXOTIK 2 CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(69, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180029S-KOKO', 'DP5', 30, 0, 9610, 0, '081949610770', 'GRK EXOTIK 2 CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(70, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180030S-KOKO', 'DOMPUL', 150000, 0, 6185770, 1.5, '081938545658', 'ZIP CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(71, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180030S-KOKO', 'DP10', 10, 0, 4623, 0, '081938545658', 'ZIP CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(72, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180030S-KOKO', 'DP5', 15, 0, 9595, 0, '081938545658', 'ZIP CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(73, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180031S-KOKO', 'DOMPUL', 600000, 0, 5932195, 1.5, '087757117337', 'FATIN CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(74, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180031S-KOKO', 'DP10', 20, 0, 8176, 0, '087757117337', 'FATIN CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(75, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180032S-KOKO', 'DOMPUL', 1500000, 0, 8880820, 1.5, '08179360960', 'NURI CELL', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(76, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180032S-KOKO', 'DP10', 50, 0, 3382, 0, '08179360960', 'NURI CELL', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(77, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180032S-KOKO', 'DP5', 10, 0, 8775, 0, '08179360960', 'NURI CELL', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(78, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180033S-KOKO', 'DOMPUL', 500000, 0, 8380820, 1.5, '087859587485', 'ABADI CELL CANDI', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(79, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180033S-KOKO', 'DP10', 30, 0, 3352, 0, '087859587485', 'ABADI CELL CANDI', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(80, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180033S-KOKO', 'DP5', 40, 0, 8735, 0, '087859587485', 'ABADI CELL CANDI', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(81, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180034S-KOKO', 'DOMPUL', 300000, 0, 5885770, 1.5, '081949610499', 'BJG MEHDI CELL', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(82, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180035S-KOKO', 'DOMPUL', 200000, 0, 5685770, 1.5, '087856002458', 'GRK INTAN CELL DRIYOREJO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(83, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180035S-KOKO', 'DP10', 20, 0, 4603, 0, '087856002458', 'GRK INTAN CELL DRIYOREJO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(84, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180035S-KOKO', 'DP5', 20, 0, 9575, 0, '087856002458', 'GRK INTAN CELL DRIYOREJO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(85, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180036S-KOKO', 'DP10', 30, 0, 3322, 0, '081703366562', 'PRINCE CELL 2', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(86, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180036S-KOKO', 'DP5', 30, 0, 8705, 0, '081703366562', 'PRINCE CELL 2', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(87, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180037S-KOKO', 'DOMPUL', 500000, 0, 5185770, 1.5, '087856080219', 'RIYA', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(88, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180038S-KOKO', 'DP10', 30, 0, 3292, 0, '081703364170', 'KHARISMA CELL WARU1', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(89, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180038S-KOKO', 'DP5', 30, 0, 8675, 0, '081703364170', 'KHARISMA CELL WARU1', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(90, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180039S-KOKO', 'DOMPUL', 750000, 0, 532074900, 1.5, '081938062399', 'Bejo Cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(91, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180039S-KOKO', 'DP10', 20, 0, 83615, 0, '081938062399', 'Bejo Cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(92, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180039S-KOKO', 'DP5', 10, 0, 26231, 0, '081938062399', 'Bejo Cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(93, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180040S-KOKO', 'DOMPUL', 300000, 0, 8080820, 1.5, '081703351437', 'SARI TRISNO CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(94, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180040S-KOKO', 'DP10', 10, 0, 3282, 0, '081703351437', 'SARI TRISNO CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(95, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180040S-KOKO', 'DP5', 20, 0, 8655, 0, '081703351437', 'SARI TRISNO CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(96, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180041S-KOKO', 'DOMPUL', 200000, 0, 4985770, 1.5, '087750955413', 'KNK CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(97, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180041S-KOKO', 'DP10', 7, 0, 4596, 0, '087750955413', 'KNK CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(98, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180041S-KOKO', 'DP5', 7, 0, 9568, 0, '087750955413', 'KNK CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(99, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180042S-KOKO', 'DOMPUL', 800000, 0, 5132195, 1.5, '087757029554', 'ARJOM CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(100, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180043S-KOKO', 'DOMPUL', 1000000, 0, 4132195, 1.5, '081913242263', 'E CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(101, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180043S-KOKO', 'DP10', 20, 0, 8156, 0, '081913242263', 'E CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(102, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180043S-KOKO', 'DP5', 20, 0, 3960, 0, '081913242263', 'E CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(103, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180044S-KOKO', 'DOMPUL', 1500000, 0, 6580820, 1.5, '087850809537', 'RISKA CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(104, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180045S-KOKO', 'DOMPUL', 600000, 0, 5980820, 1.5, '081703921482', 'DNS CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(105, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180045S-KOKO', 'DP5', 50, 0, 8605, 0, '081703921482', 'DNS CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(106, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180046S-KOKO', 'DOMPUL', 500000, 0, 3632195, 1.5, '081913242753', 'ABADI CELL 2', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(107, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180046S-KOKO', 'DP10', 15, 0, 8141, 0, '081913242753', 'ABADI CELL 2', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(108, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180046S-KOKO', 'DP5', 15, 0, 3945, 0, '081913242753', 'ABADI CELL 2', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(109, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180048S-KOKO', 'DOMPUL', 2000000, 0, 529574900, 1.5, '081938073048', 'MERAH CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(110, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180048S-KOKO', 'DP10', 200, 0, 83385, 0, '081938073048', 'MERAH CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(111, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180048S-KOKO', 'DP5', 200, 0, 26001, 0, '081938073048', 'MERAH CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(112, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180047S-KOKO', 'DOMPUL', 500000, 0, 531574900, 1.5, '081938062493', 'ARSYAF CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(113, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180047S-KOKO', 'DP10', 30, 0, 83585, 0, '081938062493', 'ARSYAF CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(114, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180047S-KOKO', 'DP5', 30, 0, 26201, 0, '081938062493', 'ARSYAF CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(115, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180049S-KOKO', 'DOMPUL', 500000, 0, 5480820, 1.5, '081703930418', 'ANDIK CELL TAMAN', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(116, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180049S-KOKO', 'DP10', 30, 0, 3252, 0, '081703930418', 'ANDIK CELL TAMAN', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(117, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180049S-KOKO', 'DP5', 10, 0, 8595, 0, '081703930418', 'ANDIK CELL TAMAN', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(118, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180050S-KOKO', 'DOMPUL', 100000, 0, 3532195, 1.5, '081935052119', 'RAMADHAN CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(119, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180050S-KOKO', 'DP10', 5, 0, 8136, 0, '081935052119', 'RAMADHAN CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(120, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180051S-KOKO', 'DOMPUL', 700000, 0, 528874900, 1.5, '081938063523', 'AL FATIH CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(121, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180052S-KOKO', 'DOMPUL', 1000000, 0, 2532195, 1.5, '087757029454', 'GAMBIRAN 1', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(122, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180052S-KOKO', 'DP10', 60, 0, 8076, 0, '087757029454', 'GAMBIRAN 1', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(123, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180052S-KOKO', 'DP5', 40, 0, 3905, 0, '087757029454', 'GAMBIRAN 1', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(124, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180076S-KOKO', 'DOMPUL', 100000, 0, 8180820, 1.5, '087751710230', 'KHOIR PULSA', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(125, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180076S-KOKO', 'DP10', 5, 0, 2942, 0, '087751710230', 'KHOIR PULSA', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(126, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180076S-KOKO', 'DP5', 10, 0, 8335, 0, '087751710230', 'KHOIR PULSA', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(127, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180077S-KOKO', 'DOMPUL', 500000, 0, 7680820, 1.5, '087757029439', 'KARANG CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(128, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180077S-KOKO', 'DP10', 50, 0, 2892, 0, '087757029439', 'KARANG CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(129, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180078S-KOKO', 'DOMPUL', 500000, 0, 521924900, 1.5, '081938072883', 'amanah cell', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(130, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180078S-KOKO', 'DP10', 50, 0, 82935, 0, '081938072883', 'amanah cell', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(131, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180078S-KOKO', 'DP5', 50, 0, 25771, 0, '081938072883', 'amanah cell', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(132, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180053S-KOKO', 'DOMPUL', 500000, 0, 2032195, 1.5, '081803104600', 'MANDIRI CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(133, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180053S-KOKO', 'DP10', 10, 0, 8066, 0, '081803104600', 'MANDIRI CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(134, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180054S-KOKO', 'DOMPUL', 2000000, 0, 3480820, 1.5, '081938063111', 'PRESIDEN  CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(135, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180055S-KOKO', 'DOMPUL', 200000, 0, 1832195, 1.5, '081938831922', 'HM PULSA', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(136, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180055S-KOKO', 'DP5', 10, 0, 3895, 0, '081938831922', 'HM PULSA', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(137, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180056S-KOKO', 'DOMPUL', 2000000, 0, 1480820, 1.5, '087856560368', 'ABI PULSA', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(138, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180056S-KOKO', 'DP10', 170, 0, 3082, 0, '087856560368', 'ABI PULSA', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(139, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180056S-KOKO', 'DP5', 150, 0, 8445, 0, '087856560368', 'ABI PULSA', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(140, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180057S-KOKO', 'DOMPUL', 150000, 0, 1682195, 1.5, '087856413050', 'MBOX CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(141, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180057S-KOKO', 'DP10', 15, 0, 8051, 0, '087856413050', 'MBOX CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(142, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180057S-KOKO', 'DP5', 7, 0, 3888, 0, '087856413050', 'MBOX CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(143, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180058S-KOKO', 'DOMPUL', 1000000, 0, 527874900, 1.5, '081938062617', 'NAGANO CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(144, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180058S-KOKO', 'DP10', 90, 0, 83295, 0, '081938062617', 'NAGANO CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(145, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180058S-KOKO', 'DP5', 70, 0, 25931, 0, '081938062617', 'NAGANO CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(146, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180085S-KOKO', 'DOMPUL', 500000, 0, 1085770, 1.5, '085932609135', 'VITA CELL', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(147, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180085S-KOKO', 'DP10', 50, 0, 3066, 0, '085932609135', 'VITA CELL', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(148, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180085S-KOKO', 'DP5', 70, 0, 8128, 0, '085932609135', 'VITA CELL', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(149, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180059S-KOKO', 'DOMPUL', 300000, 0, 4685770, 1.5, '081949610646', 'GRK RENDY CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(150, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180059S-KOKO', 'DP10', 50, 0, 4546, 0, '081949610646', 'GRK RENDY CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(151, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180059S-KOKO', 'DP5', 50, 0, 9518, 0, '081949610646', 'GRK RENDY CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(152, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180060S-KOKO', 'DOMPUL', 100000, 0, 1582195, 1.5, '087856560342', 'AAN CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(153, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180060S-KOKO', 'DP10', 15, 0, 8036, 0, '087856560342', 'AAN CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(154, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180061S-KOKO', 'DOMPUL', 350000, 0, 1232195, 1.5, '087856560297', 'ALKAUTASAR COMP CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(155, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180061S-KOKO', 'DP10', 10, 0, 8026, 0, '087856560297', 'ALKAUTASAR COMP CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(156, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180061S-KOKO', 'DP5', 10, 0, 3878, 0, '087856560297', 'ALKAUTASAR COMP CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(157, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180062S-KOKO', 'DOMPUL', 150000, 0, 4535770, 1.5, '081913849295', 'WARTEL DAMAI', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(158, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180062S-KOKO', 'DP10', 10, 0, 4536, 0, '081913849295', 'WARTEL DAMAI', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(159, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180088S-KOKO', 'DP10', 50, 0, 2986, 0, '081949610951', 'SUSAN CELL', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(160, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180088S-KOKO', 'DP5', 30, 0, 8088, 0, '081949610951', 'SUSAN CELL', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(161, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180063S-KOKO', 'DOMPUL', 750000, 0, 3785770, 1.5, '087854153236', 'REJO CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(162, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180063S-KOKO', 'DP10', 200, 0, 4336, 0, '087854153236', 'REJO CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(163, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180063S-KOKO', 'DP5', 100, 0, 9418, 0, '087854153236', 'REJO CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(164, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180064S-KOKO', 'DOMPUL', 350000, 0, 527524900, 1.5, '081938063727', 'Noval cell', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(165, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180064S-KOKO', 'DP10', 10, 0, 83285, 0, '081938063727', 'Noval cell', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(166, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180064S-KOKO', 'DP5', 10, 0, 25921, 0, '081938063727', 'Noval cell', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(167, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180065S-KOKO', 'DOMPUL', 100000, 0, 1380820, 1.5, '081803124154', 'FATQUL CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(168, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180065S-KOKO', 'DP10', 10, 0, 3072, 0, '081803124154', 'FATQUL CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(169, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180065S-KOKO', 'DP5', 10, 0, 8435, 0, '081803124154', 'FATQUL CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(170, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180066S-KOKO', 'DOMPUL', 3000000, 0, 524524900, 1.5, '081938072823', 'Golden Phonsel', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(171, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180066S-KOKO', 'DP10', 200, 0, 83085, 0, '081938072823', 'Golden Phonsel', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(172, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180066S-KOKO', 'DP5', 50, 0, 25871, 0, '081938072823', 'Golden Phonsel', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(173, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180067S-KOKO', 'DOMPUL', 1500000, 0, 9880820, 1.5, '081703355929', 'JUMBO CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(174, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180068S-KOKO', 'DOMPUL', 2000000, 0, 522524900, 1.5, '081938072824', 'ALI CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(175, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180068S-KOKO', 'DP10', 100, 0, 82985, 0, '081938072824', 'ALI CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(176, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180068S-KOKO', 'DP5', 50, 0, 25821, 0, '081938072824', 'ALI CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(177, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180069S-KOKO', 'DOMPUL', 200000, 0, 3585770, 1.5, '085932609437', 'SHAFIRA CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(178, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180069S-KOKO', 'DP10', 20, 0, 4316, 0, '085932609437', 'SHAFIRA CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(179, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180069S-KOKO', 'DP5', 20, 0, 9398, 0, '085932609437', 'SHAFIRA CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(180, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180070S-KOKO', 'DOMPUL', 300000, 0, 9580820, 1.5, '087856439451', 'ARRL CELL TAMAN', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(181, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180070S-KOKO', 'DP10', 25, 0, 3047, 0, '087856439451', 'ARRL CELL TAMAN', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(182, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180071S-KOKO', 'DOMPUL', 300000, 0, 9280820, 1.5, '081938450424', 'MASTER 88', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(183, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180071S-KOKO', 'DP10', 20, 0, 3027, 0, '081938450424', 'MASTER 88', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(184, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180071S-KOKO', 'DP5', 20, 0, 8415, 0, '081938450424', 'MASTER 88', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(185, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180072S-KOKO', 'DOMPUL', 500000, 0, 8780820, 1.5, '081703350149', 'RISKI CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(186, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180072S-KOKO', 'DP10', 50, 0, 2977, 0, '081703350149', 'RISKI CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(187, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180072S-KOKO', 'DP5', 30, 0, 8385, 0, '081703350149', 'RISKI CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(188, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180073S-KOKO', 'DOMPUL', 300000, 0, 8480820, 1.5, '081931074833', 'JAYA NATA', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(189, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180073S-KOKO', 'DP10', 10, 0, 2967, 0, '081931074833', 'JAYA NATA', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(190, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180073S-KOKO', 'DP5', 10, 0, 8375, 0, '081931074833', 'JAYA NATA', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(191, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180074S-KOKO', 'DOMPUL', 200000, 0, 8280820, 1.5, '081931074324', 'DUTA CELL SUKO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(192, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180074S-KOKO', 'DP10', 20, 0, 2947, 0, '081931074324', 'DUTA CELL SUKO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(193, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180074S-KOKO', 'DP5', 30, 0, 8345, 0, '081931074324', 'DUTA CELL SUKO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(194, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180075S-KOKO', 'DOMPUL', 100000, 0, 522424900, 1.5, '081938063464', 'yola cell', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(195, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180079S-KOKO', 'DOMPUL', 400000, 0, 7280820, 1.5, '081913243511', 'SANJAYA CELL SUKODONO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(196, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180079S-KOKO', 'DP10', 40, 0, 2852, 0, '081913243511', 'SANJAYA CELL SUKODONO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(197, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180079S-KOKO', 'DP5', 40, 0, 8295, 0, '081913243511', 'SANJAYA CELL SUKODONO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(198, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180080S-KOKO', 'DOMPUL', 2000000, 0, 1585770, 1.5, '087856099050', 'TBN ONE CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(199, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180080S-KOKO', 'DP10', 200, 0, 4116, 0, '087856099050', 'TBN ONE CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0);
INSERT INTO `upload_dompuls` (`id_upload`, `id_user`, `id_lokasi`, `id_penjualan_dompul`, `no_hp_sub_master_dompul`, `nama_sub_master_dompul`, `tanggal_transfer`, `tanggal_upload`, `no_faktur`, `produk`, `qty`, `qty_program`, `balance`, `diskon`, `no_hp_downline`, `nama_downline`, `status`, `no_hp_canvasser`, `nama_canvasser`, `inbox`, `print`, `bayar`, `tipe_dompul`, `harga_dompul`, `status_active`, `status_penjualan`, `deleted`) VALUES
(200, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180080S-KOKO', 'DP5', 200, 0, 9198, 0, '087856099050', 'TBN ONE CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(201, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180081S-KOKO', 'DOMPUL', 3000000, 0, 8585770, 1.5, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(202, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180081S-KOKO', 'DP10', 300, 0, 3816, 0, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(203, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180081S-KOKO', 'DP5', 300, 0, 8898, 0, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(204, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180082S-KOKO', 'DOMPUL', 2000000, 0, 6585770, 1.5, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(205, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180082S-KOKO', 'DP10', 200, 0, 3616, 0, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(206, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180082S-KOKO', 'DP5', 200, 0, 8698, 0, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(207, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180083S-KOKO', 'DOMPUL', 1000000, 0, 232195, 1.5, '081913131790', 'ASKAR', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(208, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180084S-KOKO', 'DOMPUL', 5000000, 0, 1585770, 1.5, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(209, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180084S-KOKO', 'DP10', 500, 0, 3116, 0, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(210, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180084S-KOKO', 'DP5', 500, 0, 8198, 0, '081913810285', 'GRK AGP CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(211, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180086S-KOKO', 'DOMPUL', 5000000, 0, 2280820, 1.5, '081938062636', 'PULSA CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(212, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180087S-KOKO', 'DOMPUL', 600000, 0, 485770, 1.5, '087856242200', 'GRK MHAN CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(213, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180087S-KOKO', 'DP10', 30, 0, 3036, 0, '087856242200', 'GRK MHAN CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(214, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180087S-KOKO', 'DP5', 10, 0, 8118, 0, '087856242200', 'GRK MHAN CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(215, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180089S-KOKO', 'DOMPUL', 200000, 0, 285770, 1.5, '087856309425', 'GRK INUNK PHONE', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(216, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180089S-KOKO', 'DP10', 5, 0, 2981, 0, '087856309425', 'GRK INUNK PHONE', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(217, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180089S-KOKO', 'DP5', 15, 0, 8073, 0, '087856309425', 'GRK INUNK PHONE', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(218, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180090S-KOKO', 'DOMPUL', 750000, 0, 9482195, 1.5, '087757029594', 'REDJO CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(219, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180090S-KOKO', 'DP10', 50, 0, 7976, 0, '087757029594', 'REDJO CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(220, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180090S-KOKO', 'DP5', 50, 0, 3828, 0, '087757029594', 'REDJO CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(221, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180091S-KOKO', 'DOMPUL', 100000, 0, 9382195, 1.5, '081935060296', 'KARTIKA CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(222, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180114S-KOKO', 'DOMPUL', 400000, 0, 9580820, 1.5, '081703284886', 'LUV CELL SIDOKLUMPUK', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(223, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180114S-KOKO', 'DP5', 20, 0, 8155, 0, '081703284886', 'LUV CELL SIDOKLUMPUK', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(224, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180092S-KOKO', 'DOMPUL', 100000, 0, 521824900, 1.5, '081938072705', 'gembrot cell', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(225, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180093S-KOKO', 'DOMPUL', 500000, 0, 8882195, 1.5, '087757029600', 'DIANA CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(226, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180093S-KOKO', 'DP10', 100, 0, 7876, 0, '087757029600', 'DIANA CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(227, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180093S-KOKO', 'DP5', 50, 0, 3778, 0, '087757029600', 'DIANA CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(228, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180117S-KOKO', 'DOMPUL', 200000, 0, 9080820, 1.5, '081703356729', 'HAFIDZ CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(229, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180117S-KOKO', 'DP10', 10, 0, 2642, 0, '081703356729', 'HAFIDZ CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(230, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180094S-KOKO', 'DOMPUL', 500000, 0, 8382195, 1.5, '087856412967', 'BAMBANG CELL GUDO', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(231, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180094S-KOKO', 'DP10', 50, 0, 7826, 0, '087856412967', 'BAMBANG CELL GUDO', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(232, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180094S-KOKO', 'DP5', 50, 0, 3728, 0, '087856412967', 'BAMBANG CELL GUDO', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(233, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180095S-KOKO', 'DOMPUL', 1500000, 0, 8785770, 1.5, '081703674848', 'GRK LANCAR JAYA', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(234, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180096S-KOKO', 'DOMPUL', 200000, 0, 521624900, 1.5, '081938072764', 'TINO CELL', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(235, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180097S-KOKO', 'DOMPUL', 100000, 0, 8282195, 1.5, '087856560346', 'DONN CELL MOJOKERTO', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(236, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180097S-KOKO', 'DP10', 10, 0, 7816, 0, '087856560346', 'DONN CELL MOJOKERTO', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(237, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180126S-KOKO', 'DOMPUL', 800000, 0, 7180820, 1.5, '081935051709', 'TALITA CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(238, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180126S-KOKO', 'DP10', 35, 0, 2487, 0, '081935051709', 'TALITA CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(239, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180126S-KOKO', 'DP5', 30, 0, 8015, 0, '081935051709', 'TALITA CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(240, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180098S-KOKO', 'DP10', 10, 0, 2971, 0, '087750955792', 'SASMITA CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(241, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180098S-KOKO', 'DP5', 10, 0, 8063, 0, '087750955792', 'SASMITA CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(242, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180099S-KOKO', 'DOMPUL', 1000000, 0, 1280820, 1.5, '087856439508', 'ADINATA 2 CELL WARU', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(243, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180099S-KOKO', 'DP10', 50, 0, 2802, 0, '087856439508', 'ADINATA 2 CELL WARU', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(244, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180100S-KOKO', 'DOMPUL', 200000, 0, 521424900, 1.5, '081938063640', 'JAGO CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(245, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180100S-KOKO', 'DP10', 20, 0, 82915, 0, '081938063640', 'JAGO CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(246, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180100S-KOKO', 'DP5', 15, 0, 25756, 0, '081938063640', 'JAGO CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(247, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180101S-KOKO', 'DOMPUL', 300000, 0, 8485770, 1.5, '081703357602', 'GRK JAYA SAKTI 1', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(248, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180101S-KOKO', 'DP10', 20, 0, 2951, 0, '081703357602', 'GRK JAYA SAKTI 1', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(249, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180101S-KOKO', 'DP5', 10, 0, 8053, 0, '081703357602', 'GRK JAYA SAKTI 1', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(250, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180102S-KOKO', 'DOMPUL', 300000, 0, 8185770, 1.5, '081931077529', 'GRK JAYA SAKTI 3', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(251, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180102S-KOKO', 'DP10', 25, 0, 2926, 0, '081931077529', 'GRK JAYA SAKTI 3', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(252, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180103S-KOKO', 'DOMPUL', 100000, 0, 1180820, 1.5, '081913243373', 'RIFDAH PULSA KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(253, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180103S-KOKO', 'DP10', 20, 0, 2782, 0, '081913243373', 'RIFDAH PULSA KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(254, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180103S-KOKO', 'DP5', 20, 0, 8275, 0, '081913243373', 'RIFDAH PULSA KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(255, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180104S-KOKO', 'DOMPUL', 100000, 0, 521324900, 1.5, '081938063632', 'diamond cell', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(256, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180104S-KOKO', 'DP10', 5, 0, 82910, 0, '081938063632', 'diamond cell', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(257, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180104S-KOKO', 'DP5', 10, 0, 25746, 0, '081938063632', 'diamond cell', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(258, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180105S-KOKO', 'DP10', 15, 0, 2911, 0, '081949640883', 'GRK CAM CAM CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(259, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180105S-KOKO', 'DP5', 10, 0, 8043, 0, '081949640883', 'GRK CAM CAM CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(260, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180106S-KOKO', 'DOMPUL', 1000000, 0, 180820, 1.5, '081938830173', 'AHA CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(261, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180106S-KOKO', 'DP10', 90, 0, 2692, 0, '081938830173', 'AHA CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(262, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180106S-KOKO', 'DP5', 70, 0, 8205, 0, '081938830173', 'AHA CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(263, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180107S-KOKO', 'DOMPUL', 100000, 0, 80820, 1.5, '081803171281', 'SHADOW CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(264, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180107S-KOKO', 'DP10', 25, 0, 2667, 0, '081803171281', 'SHADOW CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(265, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180107S-KOKO', 'DP5', 20, 0, 8185, 0, '081803171281', 'SHADOW CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(266, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180108S-KOKO', 'DOMPUL', 1500000, 0, 519824900, 1.5, '081938063731', 'queen cell', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(267, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180108S-KOKO', 'DP10', 200, 0, 82710, 0, '081938063731', 'queen cell', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(268, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180108S-KOKO', 'DP5', 150, 0, 25596, 0, '081938063731', 'queen cell', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(269, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180109S-KOKO', 'DOMPUL', 50000, 0, 8135770, 1.5, '087856309517', 'GRK G TA CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(270, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180109S-KOKO', 'DP10', 5, 0, 2906, 0, '087856309517', 'GRK G TA CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(271, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180109S-KOKO', 'DP5', 10, 0, 8033, 0, '087856309517', 'GRK G TA CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(272, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180110S-KOKO', 'DOMPUL', 200000, 0, 7935770, 1.5, '087856000127', 'RIFSA CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(273, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180110S-KOKO', 'DP10', 10, 0, 2896, 0, '087856000127', 'RIFSA CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(274, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180110S-KOKO', 'DP5', 20, 0, 8013, 0, '087856000127', 'RIFSA CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(275, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180111S-KOKO', 'DOMPUL', 100000, 0, 9980820, 1.5, '081703362661', 'DANS CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(276, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180111S-KOKO', 'DP10', 15, 0, 2652, 0, '081703362661', 'DANS CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(277, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180111S-KOKO', 'DP5', 10, 0, 8175, 0, '081703362661', 'DANS CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(278, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180112S-KOKO', 'DOMPUL', 100000, 0, 8182195, 1.5, '081913130231', 'CAHAYA CELL 2', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(279, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180112S-KOKO', 'DP10', 5, 0, 7811, 0, '081913130231', 'CAHAYA CELL 2', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(280, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180113S-KOKO', 'DOMPUL', 1500000, 0, 518324900, 1.5, '081938063711', 'queen cell 2', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(281, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180113S-KOKO', 'DP10', 200, 0, 82510, 0, '081938063711', 'queen cell 2', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(282, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180113S-KOKO', 'DP5', 150, 0, 25446, 0, '081938063711', 'queen cell 2', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(283, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180115S-KOKO', 'DOMPUL', 300000, 0, 9280820, 1.5, '081938062591', 'REVAN CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(284, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180116S-KOKO', 'DOMPUL', 500000, 0, 7435770, 1.5, '087750958101', 'ASA CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(285, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180118S-KOKO', 'DOMPUL', 200000, 0, 7235770, 1.5, '087856002572', 'GRK BON CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(286, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180118S-KOKO', 'DP10', 20, 0, 2876, 0, '087856002572', 'GRK BON CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(287, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180118S-KOKO', 'DP5', 20, 0, 7993, 0, '087856002572', 'GRK BON CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(288, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180119S-KOKO', 'DP10', 10, 0, 2632, 0, '081946410254', 'HAFIDZ AS', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(289, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180119S-KOKO', 'DP5', 20, 0, 8135, 0, '081946410254', 'HAFIDZ AS', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(290, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180120S-KOKO', 'DOMPUL', 100000, 0, 8980820, 1.5, '081946410304', 'ION CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(291, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180120S-KOKO', 'DP10', 10, 0, 2622, 0, '081946410304', 'ION CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(292, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180121S-KOKO', 'DOMPUL', 400000, 0, 6835770, 1.5, '087750957697', 'SHARI CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(293, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180121S-KOKO', 'DP10', 20, 0, 2856, 0, '087750957697', 'SHARI CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(294, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180121S-KOKO', 'DP5', 20, 0, 7973, 0, '087750957697', 'SHARI CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(295, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180122S-KOKO', 'DP10', 10, 0, 2612, 0, '081938562086', 'PATPAN CELULAR 3', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(296, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180122S-KOKO', 'DP5', 20, 0, 8115, 0, '081938562086', 'PATPAN CELULAR 3', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(297, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180123S-KOKO', 'DOMPUL', 400000, 0, 8580820, 1.5, '081703921261', 'FANI CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(298, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180123S-KOKO', 'DP10', 40, 0, 2572, 0, '081703921261', 'FANI CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(299, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180123S-KOKO', 'DP5', 40, 0, 8075, 0, '081703921261', 'FANI CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(300, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180124S-KOKO', 'DOMPUL', 100000, 0, 6735770, 1.5, '087856002417', 'GRK ZAHERA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(301, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180124S-KOKO', 'DP10', 20, 0, 2836, 0, '087856002417', 'GRK ZAHERA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(302, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180124S-KOKO', 'DP5', 10, 0, 7963, 0, '087856002417', 'GRK ZAHERA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(303, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180125S-KOKO', 'DOMPUL', 600000, 0, 7980820, 1.5, '081703813590', 'PAT PAN 1 CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(304, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180125S-KOKO', 'DP10', 50, 0, 2522, 0, '081703813590', 'PAT PAN 1 CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(305, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180125S-KOKO', 'DP5', 30, 0, 8045, 0, '081703813590', 'PAT PAN 1 CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(306, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180127S-KOKO', 'DOMPUL', 2000000, 0, 4735770, 1.5, '087856240588', 'GRK JBI SAMSON', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(307, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180127S-KOKO', 'DP10', 70, 0, 2766, 0, '087856240588', 'GRK JBI SAMSON', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(308, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180127S-KOKO', 'DP5', 70, 0, 7893, 0, '087856240588', 'GRK JBI SAMSON', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(309, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180128S-KOKO', 'DOMPUL', 500000, 0, 517824900, 1.5, '081938063427', 'REDZCARD', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(310, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180128S-KOKO', 'DP10', 40, 0, 82470, 0, '081938063427', 'REDZCARD', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(311, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180128S-KOKO', 'DP5', 40, 0, 25406, 0, '081938063427', 'REDZCARD', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(312, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180129S-KOKO', 'DOMPUL', 1500000, 0, 5680820, 1.5, '087856560107', 'ZEFIRA CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(313, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180129S-KOKO', 'DP10', 50, 0, 2437, 0, '087856560107', 'ZEFIRA CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(314, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180129S-KOKO', 'DP5', 50, 0, 7965, 0, '087856560107', 'ZEFIRA CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(315, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180130S-KOKO', 'DOMPUL', 300000, 0, 5380820, 1.5, '081703352253', 'ONE CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(316, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180130S-KOKO', 'DP10', 40, 0, 2397, 0, '081703352253', 'ONE CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(317, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180130S-KOKO', 'DP5', 30, 0, 7935, 0, '081703352253', 'ONE CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(318, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180131S-KOKO', 'DOMPUL', 300000, 0, 4435770, 1.5, '081938544392', 'AFFAN', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(319, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180132S-KOKO', 'DOMPUL', 700000, 0, 517124900, 1.5, '081938062428', 'CITY CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(320, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180132S-KOKO', 'DP10', 25, 0, 82445, 0, '081938062428', 'CITY CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(321, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180132S-KOKO', 'DP5', 10, 0, 25396, 0, '081938062428', 'CITY CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(322, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180133S-KOKO', 'DOMPUL', 300000, 0, 4135770, 1.5, '087856232004', 'GRK WONGKOL CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(323, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180133S-KOKO', 'DP10', 50, 0, 2716, 0, '087856232004', 'GRK WONGKOL CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(324, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180133S-KOKO', 'DP5', 50, 0, 7843, 0, '087856232004', 'GRK WONGKOL CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(325, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180134S-KOKO', 'DOMPUL', 200000, 0, 3935770, 1.5, '081913849545', 'GRK EXOTIC', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(326, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180134S-KOKO', 'DP10', 20, 0, 2696, 0, '081913849545', 'GRK EXOTIC', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(327, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180134S-KOKO', 'DP5', 20, 0, 7823, 0, '081913849545', 'GRK EXOTIC', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(328, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180135S-KOKO', 'DOMPUL', 2000000, 0, 1935770, 1.5, '087856560576', 'GRK WONG 9 CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(329, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180135S-KOKO', 'DP10', 50, 0, 2646, 0, '087856560576', 'GRK WONG 9 CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(330, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180135S-KOKO', 'DP5', 50, 0, 7773, 0, '087856560576', 'GRK WONG 9 CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(331, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180136S-KOKO', 'DOMPUL', 300000, 0, 5080820, 1.5, '081703350261', 'RAHMA CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(332, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180136S-KOKO', 'DP10', 40, 0, 2357, 0, '081703350261', 'RAHMA CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(333, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180136S-KOKO', 'DP5', 20, 0, 7915, 0, '081703350261', 'RAHMA CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(334, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180137S-KOKO', 'DOMPUL', 100000, 0, 1835770, 1.5, '085932609448', 'PERDANA SELULAR', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(335, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180137S-KOKO', 'DP10', 10, 0, 2636, 0, '085932609448', 'PERDANA SELULAR', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(336, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180169S-KOKO', 'DOMPUL', 100000, 0, 780820, 1.5, '081931074317', 'AIS PHONE', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(337, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180169S-KOKO', 'DP10', 15, 0, 2167, 0, '081931074317', 'AIS PHONE', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(338, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180169S-KOKO', 'DP5', 15, 0, 7715, 0, '081931074317', 'AIS PHONE', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(339, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180138S-KOKO', 'DOMPUL', 600000, 0, 1235770, 1.5, '087850511096', 'BJG DD CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(340, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180139S-KOKO', 'DOMPUL', 100000, 0, 4980820, 1.5, '081703813631', 'MIKAL CELL 2 KLUDAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(341, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180139S-KOKO', 'DP10', 10, 0, 2347, 0, '081703813631', 'MIKAL CELL 2 KLUDAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(342, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180139S-KOKO', 'DP5', 10, 0, 7905, 0, '081703813631', 'MIKAL CELL 2 KLUDAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(343, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180140S-KOKO', 'DOMPUL', 500000, 0, 735770, 1.5, '081913814628', 'WONG 9 CELL 2', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(344, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180140S-KOKO', 'DP10', 50, 0, 2586, 0, '081913814628', 'WONG 9 CELL 2', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(345, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180141S-KOKO', 'DOMPUL', 900000, 0, 4080820, 1.5, '087859587449', 'MIKAL CELL 2', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(346, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180141S-KOKO', 'DP10', 10, 0, 2337, 0, '087859587449', 'MIKAL CELL 2', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(347, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180141S-KOKO', 'DP5', 10, 0, 7895, 0, '087859587449', 'MIKAL CELL 2', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(348, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180142S-KOKO', 'DP10', 10, 0, 82435, 0, '081938073024', 'Dina Maya cell', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(349, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180142S-KOKO', 'DP5', 10, 0, 25386, 0, '081938073024', 'Dina Maya cell', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(350, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180143S-KOKO', 'DOMPUL', 100000, 0, 8082195, 1.5, '081913109874', 'ZAKY CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(351, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180143S-KOKO', 'DP10', 5, 0, 7806, 0, '081913109874', 'ZAKY CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(352, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180143S-KOKO', 'DP5', 7, 0, 3721, 0, '081913109874', 'ZAKY CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(353, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180144S-KOKO', 'DOMPUL', 300000, 0, 3780820, 1.5, '081931074172', 'SURYA INDAH KLUDAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(354, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180144S-KOKO', 'DP10', 20, 0, 2317, 0, '081931074172', 'SURYA INDAH KLUDAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(355, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180144S-KOKO', 'DP5', 20, 0, 7875, 0, '081931074172', 'SURYA INDAH KLUDAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(356, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180145S-KOKO', 'DOMPUL', 1000000, 0, 2780820, 1.5, '081938062866', 'BERLIANDA CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(357, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180181S-KOKO', 'DOMPUL', 700000, 0, 80820, 1.5, '087757170102', 'ANGGA 2 CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(358, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180181S-KOKO', 'DP10', 50, 0, 2117, 0, '087757170102', 'ANGGA 2 CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(359, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180181S-KOKO', 'DP5', 40, 0, 7675, 0, '087757170102', 'ANGGA 2 CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(360, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180146S-KOKO', 'DOMPUL', 400000, 0, 2380820, 1.5, '081913243382', 'MUDA BEDA', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(361, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180146S-KOKO', 'DP10', 30, 0, 2287, 0, '081913243382', 'MUDA BEDA', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(362, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180146S-KOKO', 'DP5', 30, 0, 7845, 0, '081913243382', 'MUDA BEDA', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(363, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180147S-KOKO', 'DOMPUL', 200000, 0, 2180820, 1.5, '087856439305', 'MAYA 2 CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(364, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180147S-KOKO', 'DP10', 10, 0, 2277, 0, '087856439305', 'MAYA 2 CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(365, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180147S-KOKO', 'DP5', 15, 0, 7830, 0, '087856439305', 'MAYA 2 CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(366, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180148S-KOKO', 'DOMPUL', 100000, 0, 2080820, 1.5, '08175003312', 'MAYA CELL NGABAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(367, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180148S-KOKO', 'DP10', 15, 0, 2262, 0, '08175003312', 'MAYA CELL NGABAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(368, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180148S-KOKO', 'DP5', 20, 0, 7810, 0, '08175003312', 'MAYA CELL NGABAN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(369, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180149S-KOKO', 'DOMPUL', 2000000, 0, 515124900, 1.5, '081938072871', 'cha cha cell', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(370, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180149S-KOKO', 'DP10', 75, 0, 82360, 0, '081938072871', 'cha cha cell', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(371, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180149S-KOKO', 'DP5', 25, 0, 25361, 0, '081938072871', 'cha cha cell', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(372, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180150S-KOKO', 'DOMPUL', 400000, 0, 1680820, 1.5, '081703366905', 'INTER CELL', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(373, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180151S-KOKO', 'DOMPUL', 300000, 0, 7782195, 1.5, '081913144804', 'MULTI CELL2', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(374, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180151S-KOKO', 'DP10', 10, 0, 7796, 0, '081913144804', 'MULTI CELL2', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(375, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180151S-KOKO', 'DP5', 7, 0, 3714, 0, '081913144804', 'MULTI CELL2', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(376, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180152S-KOKO', 'DOMPUL', 500000, 0, 1180820, 1.5, '081703361943', 'M 2 M', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(377, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180152S-KOKO', 'DP10', 20, 0, 2242, 0, '081703361943', 'M 2 M', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(378, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180152S-KOKO', 'DP5', 30, 0, 7780, 0, '081703361943', 'M 2 M', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(379, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180153S-KOKO', 'DOMPUL', 200000, 0, 535770, 1.5, '087856002486', 'GRK TIARA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(380, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180153S-KOKO', 'DP10', 25, 0, 2561, 0, '087856002486', 'GRK TIARA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(381, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180153S-KOKO', 'DP5', 10, 0, 7763, 0, '087856002486', 'GRK TIARA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(382, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180154S-KOKO', 'DOMPUL', 900000, 0, 9635770, 1.5, '081931575475', 'GRK MADANIYAH', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(383, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180154S-KOKO', 'DP10', 50, 0, 2511, 0, '081931575475', 'GRK MADANIYAH', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(384, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180154S-KOKO', 'DP5', 60, 0, 7703, 0, '081931575475', 'GRK MADANIYAH', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(385, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180155S-KOKO', 'DOMPUL', 2000000, 0, 7635770, 1.5, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(386, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180155S-KOKO', 'DP10', 300, 0, 2211, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(387, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180155S-KOKO', 'DP5', 300, 0, 7403, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(388, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180156S-KOKO', 'DP10', 10, 0, 2201, 0, '087856002431', 'GRK CASPER CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(389, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180156S-KOKO', 'DP5', 20, 0, 7383, 0, '087856002431', 'GRK CASPER CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(390, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180157S-KOKO', 'DOMPUL', 600000, 0, 7035770, 1.5, '087856309343', 'GRK IMEI CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(391, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180157S-KOKO', 'DP10', 30, 0, 2171, 0, '087856309343', 'GRK IMEI CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(392, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180157S-KOKO', 'DP5', 10, 0, 7373, 0, '087856309343', 'GRK IMEI CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(393, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180158S-KOKO', 'DOMPUL', 300000, 0, 880820, 1.5, '081703930406', 'IVAN CELL KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(394, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180158S-KOKO', 'DP10', 60, 0, 2182, 0, '081703930406', 'IVAN CELL KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(395, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180158S-KOKO', 'DP5', 50, 0, 7730, 0, '081703930406', 'IVAN CELL KRIAN', 'Success', '081935015005', 'SDA-AGUS SALIM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(396, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180159S-KOKO', 'DOMPUL', 200000, 0, 6835770, 1.5, '087856309338', 'GRK MD CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0);
INSERT INTO `upload_dompuls` (`id_upload`, `id_user`, `id_lokasi`, `id_penjualan_dompul`, `no_hp_sub_master_dompul`, `nama_sub_master_dompul`, `tanggal_transfer`, `tanggal_upload`, `no_faktur`, `produk`, `qty`, `qty_program`, `balance`, `diskon`, `no_hp_downline`, `nama_downline`, `status`, `no_hp_canvasser`, `nama_canvasser`, `inbox`, `print`, `bayar`, `tipe_dompul`, `harga_dompul`, `status_active`, `status_penjualan`, `deleted`) VALUES
(397, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180159S-KOKO', 'DP10', 15, 0, 2156, 0, '087856309338', 'GRK MD CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(398, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180159S-KOKO', 'DP5', 10, 0, 7363, 0, '087856309338', 'GRK MD CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(399, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180160S-KOKO', 'DOMPUL', 300000, 0, 6535770, 1.5, '081703356757', 'GRK INDANA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(400, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180160S-KOKO', 'DP10', 10, 0, 2146, 0, '081703356757', 'GRK INDANA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(401, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180161S-KOKO', 'DOMPUL', 200000, 0, 7582195, 1.5, '081913130321', 'FAFA CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(402, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180161S-KOKO', 'DP10', 10, 0, 7786, 0, '081913130321', 'FAFA CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(403, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180161S-KOKO', 'DP5', 20, 0, 3694, 0, '081913130321', 'FAFA CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(404, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180162S-KOKO', 'DP10', 10, 0, 2136, 0, '087750955874', 'GRK YASMITA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(405, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180163S-KOKO', 'DOMPUL', 150000, 0, 7432195, 1.5, '081939870586', 'MEDIA CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(406, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180164S-KOKO', 'DOMPUL', 50000, 0, 6485770, 1.5, '081949610158', 'GRK MIRA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(407, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180164S-KOKO', 'DP10', 10, 0, 2126, 0, '081949610158', 'GRK MIRA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(408, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180164S-KOKO', 'DP5', 10, 0, 7353, 0, '081949610158', 'GRK MIRA CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(409, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180165S-KOKO', 'DP10', 50, 0, 82310, 0, '081938063651', 'FS CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(410, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180166S-KOKO', 'DP10', 20, 0, 82290, 0, '081938062535', 'MINUS CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(411, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180167S-KOKO', 'DOMPUL', 100000, 0, 6385770, 1.5, '087856390137', 'DIKA BALEN CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(412, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180167S-KOKO', 'DP10', 10, 0, 2116, 0, '087856390137', 'DIKA BALEN CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(413, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180168S-KOKO', 'DOMPUL', 200000, 0, 7232195, 1.5, '081913120090', '36 SEVEN CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(414, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180168S-KOKO', 'DP10', 5, 0, 7781, 0, '081913120090', '36 SEVEN CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(415, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180170S-KOKO', 'DOMPUL', 200000, 0, 6185770, 1.5, '087856052569', 'SHEVA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(416, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180170S-KOKO', 'DP10', 15, 0, 2101, 0, '087856052569', 'SHEVA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(417, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180170S-KOKO', 'DP5', 10, 0, 7343, 0, '087856052569', 'SHEVA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(418, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180171S-KOKO', 'DOMPUL', 2000000, 0, 4185770, 1.5, '087856002410', 'DENIS CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(419, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180172S-KOKO', 'DOMPUL', 300000, 0, 514824900, 1.5, '081938063605', 'MKT CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(420, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180173S-KOKO', 'DOMPUL', 2500000, 0, 512324900, 1.5, '081938063530', 'RANGERS CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(421, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180173S-KOKO', 'DP10', 400, 0, 81890, 0, '081938063530', 'RANGERS CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(422, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180173S-KOKO', 'DP5', 250, 0, 25111, 0, '081938063530', 'RANGERS CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(423, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180174S-KOKO', 'DOMPUL', 1000000, 0, 3185770, 1.5, '087856309376', 'GRK BARU CELL 2', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(424, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180174S-KOKO', 'DP10', 50, 0, 2051, 0, '087856309376', 'GRK BARU CELL 2', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(425, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180174S-KOKO', 'DP5', 25, 0, 7318, 0, '087856309376', 'GRK BARU CELL 2', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(426, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180175S-KOKO', 'DOMPUL', 2500000, 0, 509824900, 1.5, '081938063531', 'Bill cell', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(427, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180175S-KOKO', 'DP10', 400, 0, 81490, 0, '081938063531', 'Bill cell', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(428, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180175S-KOKO', 'DP5', 250, 0, 24861, 0, '081938063531', 'Bill cell', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(429, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180176S-KOKO', 'DOMPUL', 750000, 0, 2435770, 1.5, '087750958070', 'TBN RANI CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(430, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180176S-KOKO', 'DP10', 100, 0, 1951, 0, '087750958070', 'TBN RANI CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(431, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180176S-KOKO', 'DP5', 100, 0, 7218, 0, '087750958070', 'TBN RANI CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(432, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180177S-KOKO', 'DOMPUL', 2500000, 0, 9935770, 1.5, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(433, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180177S-KOKO', 'DP10', 200, 0, 1751, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(434, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180177S-KOKO', 'DP5', 200, 0, 7018, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(435, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180178S-KOKO', 'DOMPUL', 2800000, 0, 4432195, 1.5, '087850808940', 'GLOBAL CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(436, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180178S-KOKO', 'DP10', 170, 0, 7611, 0, '087850808940', 'GLOBAL CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(437, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180178S-KOKO', 'DP5', 120, 0, 3574, 0, '087850808940', 'GLOBAL CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(438, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180179S-KOKO', 'DOMPUL', 600000, 0, 509224900, 1.5, '081938062389', 'BASMALA CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(439, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180179S-KOKO', 'DP10', 50, 0, 81440, 0, '081938062389', 'BASMALA CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(440, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180179S-KOKO', 'DP5', 25, 0, 24836, 0, '081938062389', 'BASMALA CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(441, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180180S-KOKO', 'DOMPUL', 100000, 0, 509124900, 1.5, '081938062558', 'RIZKY CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(442, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180180S-KOKO', 'DP10', 10, 0, 81430, 0, '081938062558', 'RIZKY CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(443, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180182S-KOKO', 'DOMPUL', 300000, 0, 508824900, 1.5, '081938063652', 'JAVA CELL TULANGAN', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(444, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180182S-KOKO', 'DP10', 75, 0, 81355, 0, '081938063652', 'JAVA CELL TULANGAN', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(445, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180182S-KOKO', 'DP5', 30, 0, 24806, 0, '081938063652', 'JAVA CELL TULANGAN', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(446, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180183S-KOKO', 'DOMPUL', 1000000, 0, 8935770, 1.5, '081938545906', 'SARI CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(447, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180183S-KOKO', 'DP10', 100, 0, 1651, 0, '081938545906', 'SARI CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(448, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180183S-KOKO', 'DP5', 100, 0, 6918, 0, '081938545906', 'SARI CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(449, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180184S-KOKO', 'DOMPUL', 700000, 0, 508124900, 1.5, '081938062509', 'MUTIARA CELL', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(450, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180184S-KOKO', 'DP10', 8, 0, 81347, 0, '081938062509', 'MUTIARA CELL', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(451, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180184S-KOKO', 'DP5', 8, 0, 24798, 0, '081938062509', 'MUTIARA CELL', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(452, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180185S-KOKO', 'DOMPUL', 500000, 0, 8435770, 1.5, '081931572062', 'METRO', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(453, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180186S-KOKO', 'DOMPUL', 1300000, 0, 3132195, 1.5, '081938830866', 'AHSHIL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(454, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180186S-KOKO', 'DP10', 15, 0, 7596, 0, '081938830866', 'AHSHIL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(455, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180186S-KOKO', 'DP5', 10, 0, 3564, 0, '081938830866', 'AHSHIL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(456, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180187S-KOKO', 'DOMPUL', 100000, 0, 8335770, 1.5, '087854153238', 'WAHYU CELLt', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(457, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180188S-KOKO', 'DOMPUL', 200000, 0, 2932195, 1.5, '087858733653', 'PRALAKS CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(458, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180188S-KOKO', 'DP10', 15, 0, 7581, 0, '087858733653', 'PRALAKS CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(459, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180188S-KOKO', 'DP5', 15, 0, 3549, 0, '087858733653', 'PRALAKS CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(460, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180189S-KOKO', 'DOMPUL', 100000, 0, 8235770, 1.5, '081913132211', 'BUDI PHONE', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(461, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180189S-KOKO', 'DP10', 10, 0, 1641, 0, '081913132211', 'BUDI PHONE', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(462, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180189S-KOKO', 'DP5', 10, 0, 6908, 0, '081913132211', 'BUDI PHONE', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(463, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180190S-KOKO', 'DOMPUL', 1000000, 0, 7235770, 1.5, '087856099052', 'RAHAYU CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(464, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180190S-KOKO', 'DP10', 50, 0, 1591, 0, '087856099052', 'RAHAYU CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(465, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180190S-KOKO', 'DP5', 50, 0, 6858, 0, '087856099052', 'RAHAYU CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(466, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180191S-KOKO', 'DOMPUL', 150000, 0, 2782195, 1.5, '087757029595', 'CENT CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(467, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180192S-KOKO', 'DOMPUL', 1000000, 0, 507124900, 1.5, '081938073043', 'UGD JAYA', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(468, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180192S-KOKO', 'DP10', 50, 0, 81297, 0, '081938073043', 'UGD JAYA', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(469, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180192S-KOKO', 'DP5', 50, 0, 24748, 0, '081938073043', 'UGD JAYA', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(470, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180193S-KOKO', 'DOMPUL', 600000, 0, 6635770, 1.5, '081931070682', 'GEMA CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(471, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180194S-KOKO', 'DOMPUL', 1000000, 0, 5635770, 1.5, '081913848497', 'GAJAH CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(472, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180194S-KOKO', 'DP10', 50, 0, 1541, 0, '081913848497', 'GAJAH CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(473, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180194S-KOKO', 'DP5', 50, 0, 6808, 0, '081913848497', 'GAJAH CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(474, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180195S-KOKO', 'DOMPUL', 500000, 0, 5135770, 1.5, '081913817901', 'TYAR CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(475, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180195S-KOKO', 'DP10', 50, 0, 1491, 0, '081913817901', 'TYAR CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(476, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180195S-KOKO', 'DP5', 50, 0, 6758, 0, '081913817901', 'TYAR CELL', 'Success', '081949762444', 'TBN-WAHYUANDA FIRMAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(477, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180196S-KOKO', 'DOMPUL', 500000, 0, 580820, 1.5, '081703272664', 'ZM JAYA CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(478, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180196S-KOKO', 'DP10', 25, 0, 2092, 0, '081703272664', 'ZM JAYA CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(479, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180196S-KOKO', 'DP5', 25, 0, 7650, 0, '081703272664', 'ZM JAYA CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(480, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180197S-KOKO', 'DOMPUL', 1000000, 0, 580820, 1.5, '081938450422', 'OMDA CELL1', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(481, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180197S-KOKO', 'DP10', 70, 0, 2022, 0, '081938450422', 'OMDA CELL1', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(482, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180197S-KOKO', 'DP5', 20, 0, 7630, 0, '081938450422', 'OMDA CELL1', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(483, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180198S-KOKO', 'DP10', 60, 0, 1962, 0, '081938450145', 'OMDA CELL2', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(484, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180198S-KOKO', 'DP5', 20, 0, 7610, 0, '081938450145', 'OMDA CELL2', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(485, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180199S-KOKO', 'DOMPUL', 250000, 0, 330820, 1.5, '087757029583', 'IDOLA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(486, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180199S-KOKO', 'DP10', 15, 0, 1947, 0, '087757029583', 'IDOLA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(487, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180199S-KOKO', 'DP5', 15, 0, 7595, 0, '087757029583', 'IDOLA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(488, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180200S-KOKO', 'DOMPUL', 400000, 0, 506724900, 1.5, '081938062605', 'LAZ ACC', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(489, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180201S-KOKO', 'DOMPUL', 300000, 0, 506424900, 1.5, '081938072686', 'ARTA CELL', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(490, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180202S-KOKO', 'DOMPUL', 300000, 0, 4835770, 1.5, '081938545961', 'CHELSEA CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(491, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180202S-KOKO', 'DP10', 50, 0, 1441, 0, '081938545961', 'CHELSEA CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(492, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180203S-KOKO', 'DOMPUL', 300000, 0, 30820, 1.5, '081703453459', 'KIKI CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(493, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180203S-KOKO', 'DP10', 10, 0, 1937, 0, '081703453459', 'KIKI CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(494, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180203S-KOKO', 'DP5', 10, 0, 7585, 0, '081703453459', 'KIKI CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(495, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180204S-KOKO', 'DP10', 20, 0, 81277, 0, '081938062523', 'ZAKY CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(496, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180205S-KOKO', 'DOMPUL', 200000, 0, 4635770, 1.5, '087750957977', 'ATHASHOP CELL', 'Success', '087701029091', 'LMG-EKO WAHYU', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(497, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180209S-KOKO', 'DOMPUL', 400000, 0, 2182195, 1.5, '081938809883', 'MD CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(498, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180209S-KOKO', 'DP10', 10, 0, 7551, 0, '081938809883', 'MD CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(499, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180206S-KOKO', 'DOMPUL', 200000, 0, 506224900, 1.5, '081938063463', 'DANI CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(500, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180207S-KOKO', 'DOMPUL', 800000, 0, 505424900, 1.5, '081938063647', 'CAHAYA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(501, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180207S-KOKO', 'DP10', 10, 0, 81267, 0, '081938063647', 'CAHAYA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(502, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180207S-KOKO', 'DP5', 10, 0, 24738, 0, '081938063647', 'CAHAYA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(503, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180208S-KOKO', 'DOMPUL', 200000, 0, 2582195, 1.5, '087752651478', 'PEDE CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(504, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180208S-KOKO', 'DP10', 20, 0, 7561, 0, '087752651478', 'PEDE CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(505, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180208S-KOKO', 'DP5', 10, 0, 3539, 0, '087752651478', 'PEDE CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(506, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180210S-KOKO', 'DOMPUL', 500000, 0, 530820, 1.5, '081703367234', 'ARBY CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(507, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180210S-KOKO', 'DP10', 20, 0, 1917, 0, '081703367234', 'ARBY CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(508, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180210S-KOKO', 'DP5', 20, 0, 7565, 0, '081703367234', 'ARBY CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(509, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180211S-KOKO', 'DP10', 20, 0, 1897, 0, '08175292158', 'GLOBAL SAKTI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(510, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180211S-KOKO', 'DP5', 20, 0, 7545, 0, '08175292158', 'GLOBAL SAKTI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(511, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180212S-KOKO', 'DOMPUL', 1000000, 0, 1182195, 1.5, '081913242755', 'ILHAM CELL JMBNG', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(512, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180213S-KOKO', 'DOMPUL', 300000, 0, 230820, 1.5, '081935051510', 'ARBY 2 CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(513, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180213S-KOKO', 'DP10', 15, 0, 1882, 0, '081935051510', 'ARBY 2 CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(514, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180213S-KOKO', 'DP5', 10, 0, 7535, 0, '081935051510', 'ARBY 2 CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(515, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180214S-KOKO', 'DOMPUL', 200000, 0, 30820, 1.5, '081938452172', 'AA CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(516, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180214S-KOKO', 'DP10', 10, 0, 1872, 0, '081938452172', 'AA CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(517, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180214S-KOKO', 'DP5', 10, 0, 7525, 0, '081938452172', 'AA CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(518, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180215S-KOKO', 'DP10', 30, 0, 1842, 0, '087851051298', 'K26 CELL GEDANGAN', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(519, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180215S-KOKO', 'DP5', 20, 0, 7505, 0, '087851051298', 'K26 CELL GEDANGAN', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(520, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180216S-KOKO', 'DOMPUL', 300000, 0, 882195, 1.5, '08175073331', 'REE ONE', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(521, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180216S-KOKO', 'DP10', 20, 0, 7531, 0, '08175073331', 'REE ONE', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(522, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180217S-KOKO', 'DOMPUL', 300000, 0, 505124900, 1.5, '081938072706', 'andro reload', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(523, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180218S-KOKO', 'DOMPUL', 300000, 0, 730820, 1.5, '087757029481', 'AZAM LILUH CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(524, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180218S-KOKO', 'DP10', 40, 0, 1802, 0, '087757029481', 'AZAM LILUH CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(525, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180218S-KOKO', 'DP5', 25, 0, 7480, 0, '087757029481', 'AZAM LILUH CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(526, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180219S-KOKO', 'DOMPUL', 500000, 0, 4135770, 1.5, '087856309525', 'GRK INDAH CELL DRIYOREJO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(527, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180220S-KOKO', 'DOMPUL', 250000, 0, 504874900, 1.5, '081938063651', 'FS CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(528, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180220S-KOKO', 'DP5', 25, 0, 24713, 0, '081938063651', 'FS CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(529, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180221S-KOKO', 'DOMPUL', 500000, 0, 230820, 1.5, '081703814751', 'ADANZ CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(530, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180221S-KOKO', 'DP10', 50, 0, 1752, 0, '081703814751', 'ADANZ CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(531, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180221S-KOKO', 'DP5', 50, 0, 7430, 0, '081703814751', 'ADANZ CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(532, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180222S-KOKO', 'DOMPUL', 500000, 0, 3635770, 1.5, '087856309614', 'M-2 CELLULAR', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(533, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180222S-KOKO', 'DP10', 8, 0, 1433, 0, '087856309614', 'M-2 CELLULAR', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(534, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180222S-KOKO', 'DP5', 7, 0, 6751, 0, '087856309614', 'M-2 CELLULAR', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(535, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180223S-KOKO', 'DOMPUL', 500000, 0, 730820, 1.5, '081931073498', 'DITA CELL DELTA', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(536, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180224S-KOKO', 'DOMPUL', 200000, 0, 504674900, 1.5, '081938062397', 'Prabhu Cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(537, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180224S-KOKO', 'DP10', 10, 0, 81257, 0, '081938062397', 'Prabhu Cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(538, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180224S-KOKO', 'DP5', 10, 0, 24703, 0, '081938062397', 'Prabhu Cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(539, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180225S-KOKO', 'DOMPUL', 500000, 0, 504174900, 1.5, '081938073035', 'nico cell', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(540, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180226S-KOKO', 'DP10', 50, 0, 81207, 0, '081938072869', 'Azzam CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(541, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180226S-KOKO', 'DP5', 30, 0, 24673, 0, '081938072869', 'Azzam CELL', 'Success', '081913714141', 'LMG-MOCH SYAHPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(542, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180228S-KOKO', 'DOMPUL', 800000, 0, 930820, 1.5, '087858733643', 'BL CARD', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(543, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180227S-KOKO', 'DOMPUL', 100000, 0, 782195, 1.5, '081913240533', 'EDWIN CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(544, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180228S-KOKO', 'DP5', 20, 0, 7410, 0, '087858733643', 'BL CARD', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(545, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180227S-KOKO', 'DP10', 20, 0, 7511, 0, '081913240533', 'EDWIN CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(546, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180229S-KOKO', 'DOMPUL', 500000, 0, 503674900, 1.5, '081938062566', '21 cell', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(547, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180230S-KOKO', 'DP10', 10, 0, 1742, 0, '08179392523', 'HIKMAH CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(548, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180231S-KOKO', 'DOMPUL', 150000, 0, 780820, 1.5, '081931074961', 'MONOPHONE', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(549, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180231S-KOKO', 'DP10', 10, 0, 1732, 0, '081931074961', 'MONOPHONE', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(550, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180231S-KOKO', 'DP5', 10, 0, 7400, 0, '081931074961', 'MONOPHONE', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(551, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180232S-KOKO', 'DOMPUL', 300000, 0, 482195, 1.5, '08179394902', 'BOND CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(552, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180232S-KOKO', 'DP10', 10, 0, 7501, 0, '08179394902', 'BOND CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(553, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180233S-KOKO', 'DOMPUL', 300000, 0, 182195, 1.5, '081913242751', 'BOND CELL 2', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(554, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180233S-KOKO', 'DP10', 10, 0, 7491, 0, '081913242751', 'BOND CELL 2', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(555, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180234S-KOKO', 'DOMPUL', 1500000, 0, 280820, 1.5, '087757029564', 'METEOR 88 CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(556, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180234S-KOKO', 'DP10', 50, 0, 1682, 0, '087757029564', 'METEOR 88 CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(557, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180234S-KOKO', 'DP5', 50, 0, 7350, 0, '087757029564', 'METEOR 88 CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(558, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180235S-KOKO', 'DP10', 20, 0, 1662, 0, '087858733642', 'HIDAYAH CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(559, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180235S-KOKO', 'DP5', 10, 0, 7340, 0, '087858733642', 'HIDAYAH CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(560, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180236S-KOKO', 'DOMPUL', 200000, 0, 503474900, 1.5, '081938062384', 'Hidayah Cell 2', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(561, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180236S-KOKO', 'DP10', 10, 0, 81197, 0, '081938062384', 'Hidayah Cell 2', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(562, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180236S-KOKO', 'DP5', 10, 0, 24663, 0, '081938062384', 'Hidayah Cell 2', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(563, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180237S-KOKO', 'DOMPUL', 200000, 0, 80820, 1.5, '081935050359', 'BIG SHOP CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(564, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180237S-KOKO', 'DP10', 10, 0, 1652, 0, '081935050359', 'BIG SHOP CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(565, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180237S-KOKO', 'DP5', 20, 0, 7320, 0, '081935050359', 'BIG SHOP CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(566, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180238S-KOKO', 'DOMPUL', 300000, 0, 780820, 1.5, '081938450436', 'PRIANITA', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(567, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180238S-KOKO', 'DP10', 50, 0, 1602, 0, '081938450436', 'PRIANITA', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(568, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180239S-KOKO', 'DOMPUL', 100000, 0, 680820, 1.5, '08179392457', 'GLOBAL PHONE TAMAN PINANG', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(569, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180239S-KOKO', 'DP10', 20, 0, 1582, 0, '08179392457', 'GLOBAL PHONE TAMAN PINANG', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(570, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180239S-KOKO', 'DP5', 15, 0, 7305, 0, '08179392457', 'GLOBAL PHONE TAMAN PINANG', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(571, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180240S-KOKO', 'DOMPUL', 139000, 0, 43195, 1.5, '081913240533', 'EDWIN CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(572, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180241S-KOKO', 'DOMPUL', 150000, 0, 9893195, 1.5, '087858733654', 'GYMBUL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(573, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180241S-KOKO', 'DP10', 20, 0, 7471, 0, '087858733654', 'GYMBUL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(574, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180241S-KOKO', 'DP5', 7, 0, 3532, 0, '087858733654', 'GYMBUL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(575, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180242S-KOKO', 'DOMPUL', 600000, 0, 80820, 1.5, '081803010748', 'RAHAYU CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(576, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180242S-KOKO', 'DP10', 20, 0, 1562, 0, '081803010748', 'RAHAYU CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(577, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180242S-KOKO', 'DP5', 10, 0, 7295, 0, '081803010748', 'RAHAYU CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(578, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180243S-KOKO', 'DOMPUL', 100000, 0, 3535770, 1.5, '087856002369', 'IDA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(579, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180244S-KOKO', 'DP10', 10, 0, 81187, 0, '081959452699', 'MELATI CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(580, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180244S-KOKO', 'DP5', 10, 0, 24653, 0, '081959452699', 'MELATI CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(581, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180245S-KOKO', 'DP10', 10, 0, 81177, 0, '081938072866', 'YUNI CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(582, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180246S-KOKO', 'DOMPUL', 2000000, 0, 501474900, 1.5, '087854000339', 'jaya mandiri', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(583, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180246S-KOKO', 'DP10', 30, 0, 81147, 0, '087854000339', 'jaya mandiri', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(584, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180246S-KOKO', 'DP5', 30, 0, 24623, 0, '087854000339', 'jaya mandiri', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(585, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180247S-KOKO', 'DOMPUL', 5000000, 0, 4893195, 1.5, '087850801814', 'UCUP CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(586, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180248S-KOKO', 'DOMPUL', 300000, 0, 780820, 1.5, '081938450204', 'LITHA CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(587, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180248S-KOKO', 'DP10', 20, 0, 1542, 0, '081938450204', 'LITHA CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(588, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180248S-KOKO', 'DP5', 35, 0, 7260, 0, '081938450204', 'LITHA CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(589, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180249S-KOKO', 'DOMPUL', 350000, 0, 430820, 1.5, '087851051308', 'MUMTAZ CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(590, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180249S-KOKO', 'DP10', 15, 0, 1527, 0, '087851051308', 'MUMTAZ CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(591, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180249S-KOKO', 'DP5', 10, 0, 7250, 0, '087851051308', 'MUMTAZ CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(592, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180250S-KOKO', 'DP10', 100, 0, 1333, 0, '081931572669', 'SIDODADI', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(593, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180250S-KOKO', 'DP5', 100, 0, 6651, 0, '081931572669', 'SIDODADI', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(594, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180251S-KOKO', 'DOMPUL', 900000, 0, 2635770, 1.5, '081931077593', 'ANDINA CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0);
INSERT INTO `upload_dompuls` (`id_upload`, `id_user`, `id_lokasi`, `id_penjualan_dompul`, `no_hp_sub_master_dompul`, `nama_sub_master_dompul`, `tanggal_transfer`, `tanggal_upload`, `no_faktur`, `produk`, `qty`, `qty_program`, `balance`, `diskon`, `no_hp_downline`, `nama_downline`, `status`, `no_hp_canvasser`, `nama_canvasser`, `inbox`, `print`, `bayar`, `tipe_dompul`, `harga_dompul`, `status_active`, `status_penjualan`, `deleted`) VALUES
(595, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180252S-KOKO', 'DOMPUL', 400000, 0, 2235770, 1.5, '087856001997', 'RAJIB CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(596, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180253S-KOKO', 'DOMPUL', 100000, 0, 2135770, 1.5, '081703195055', 'GRK MN CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(597, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180253S-KOKO', 'DP10', 10, 0, 1323, 0, '081703195055', 'GRK MN CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(598, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180254S-KOKO', 'DP10', 10, 0, 81137, 0, '081938073045', 'SODA CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(599, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180254S-KOKO', 'DP5', 10, 0, 24613, 0, '081938073045', 'SODA CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(600, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180255S-KOKO', 'DOMPUL', 1500000, 0, 499974900, 1.5, '081938062503', 'ucok cell', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(601, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180255S-KOKO', 'DP10', 150, 0, 80987, 0, '081938062503', 'ucok cell', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(602, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180255S-KOKO', 'DP5', 150, 0, 24463, 0, '081938062503', 'ucok cell', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(603, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180256S-KOKO', 'DOMPUL', 1000000, 0, 30820, 1.5, '087856439497', 'AMSTERDAM CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(604, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180256S-KOKO', 'DP10', 20, 0, 1507, 0, '087856439497', 'AMSTERDAM CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(605, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180256S-KOKO', 'DP5', 20, 0, 7230, 0, '087856439497', 'AMSTERDAM CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(606, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180257S-KOKO', 'DOMPUL', 300000, 0, 1835770, 1.5, '081938545908', 'RPM CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(607, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180257S-KOKO', 'DP10', 20, 0, 1303, 0, '081938545908', 'RPM CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(608, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180258S-KOKO', 'DP10', 30, 0, 1477, 0, '087856560113', 'AW CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(609, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180258S-KOKO', 'DP5', 20, 0, 7210, 0, '087856560113', 'AW CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(610, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180259S-KOKO', 'DOMPUL', 300000, 0, 1535770, 1.5, '081931077503', 'GRK SINGO SARI CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(611, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180259S-KOKO', 'DP10', 15, 0, 1288, 0, '081931077503', 'GRK SINGO SARI CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(612, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180259S-KOKO', 'DP5', 20, 0, 6631, 0, '081931077503', 'GRK SINGO SARI CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(613, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180260S-KOKO', 'DOMPUL', 100000, 0, 1435770, 1.5, '087856230013', 'GRK ARDYS CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(614, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180260S-KOKO', 'DP10', 10, 0, 1278, 0, '087856230013', 'GRK ARDYS CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(615, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180260S-KOKO', 'DP5', 7, 0, 6624, 0, '087856230013', 'GRK ARDYS CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(616, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180261S-KOKO', 'DOMPUL', 500000, 0, 499474900, 1.5, '081938062580', 'OSHELA cell', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(617, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180262S-KOKO', 'DOMPUL', 1000000, 0, 3893195, 1.5, '087757029635', 'GRAHA CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(618, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180262S-KOKO', 'DP10', 150, 0, 7321, 0, '087757029635', 'GRAHA CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(619, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180262S-KOKO', 'DP5', 150, 0, 3382, 0, '087757029635', 'GRAHA CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(620, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180263S-KOKO', 'DOMPUL', 1000000, 0, 2893195, 1.5, '081938062488', 'PR CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(621, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180263S-KOKO', 'DP10', 150, 0, 7171, 0, '081938062488', 'PR CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(622, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180263S-KOKO', 'DP5', 150, 0, 3232, 0, '081938062488', 'PR CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(623, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180264S-KOKO', 'DP10', 50, 0, 1427, 0, '081946410345', 'MARS CELL SUKODONO', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(624, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180265S-KOKO', 'DOMPUL', 300000, 0, 2593195, 1.5, '081913130474', 'SURYA JAYA JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(625, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180265S-KOKO', 'DP10', 10, 0, 7161, 0, '081913130474', 'SURYA JAYA JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(626, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180266S-KOKO', 'DOMPUL', 200000, 0, 2393195, 1.5, '081913242436', 'HAPPY CELL MOJOSARI', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(627, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180266S-KOKO', 'DP10', 10, 0, 7151, 0, '081913242436', 'HAPPY CELL MOJOSARI', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(628, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180267S-KOKO', 'DOMPUL', 400000, 0, 1993195, 1.5, '08179394902', 'BOND CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(629, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180268S-KOKO', 'DOMPUL', 500000, 0, 498974900, 1.5, '081938072775', 'al cell', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(630, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180001-KOKO', 'DOMPUL', 100000000, 0, 398974900, 1.5, '081938062641', 'SD SIDOARJO', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(631, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180001-KOKO', 'DP10', 10000, 0, 70987, 0, '081938062641', 'SD SIDOARJO', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(632, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180269S-KOKO', 'DOMPUL', 100000, 0, 1893195, 1.5, '087858900505', 'KURNIA JAYA CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(633, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180270S-KOKO', 'DOMPUL', 100000, 0, 1335770, 1.5, '087856242132', 'BUQIN CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(634, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180270S-KOKO', 'DP10', 10, 0, 1268, 0, '087856242132', 'BUQIN CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(635, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180270S-KOKO', 'DP5', 20, 0, 6604, 0, '087856242132', 'BUQIN CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(636, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180264S-KOKO', 'DOMPUL', 2000000, 0, 8430820, 1.5, '081946410345', 'MARS CELL SUKODONO', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', NULL, 'Tunai', 'CVS', 0.985, 1, 0, 0),
(637, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180002-KOKO', 'DOMPUL', 100000000, 0, 298974900, 1.5, '081938062644', 'SD TUBAN', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(638, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180002-KOKO', 'DP10', 10000, 0, 60987, 0, '081938062644', 'SD TUBAN', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(639, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180271S-KOKO', 'DOMPUL', 500000, 0, 1393195, 1.5, '087757029628', 'DIO CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(640, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180271S-KOKO', 'DP10', 10, 0, 7141, 0, '087757029628', 'DIO CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(641, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180271S-KOKO', 'DP5', 10, 0, 3222, 0, '087757029628', 'DIO CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(642, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180272S-KOKO', 'DOMPUL', 200000, 0, 11135770, 1.5, '087856002541', 'GRK TIGA PUTRA CELL DRIYO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(643, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180272S-KOKO', 'DP10', 10, 0, 11258, 0, '087856002541', 'GRK TIGA PUTRA CELL DRIYO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(644, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180272S-KOKO', 'DP5', 10, 0, 6594, 0, '087856002541', 'GRK TIGA PUTRA CELL DRIYO', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(645, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180273S-KOKO', 'DOMPUL', 1000000, 0, 10135770, 1.5, '081913848553', 'ADI SURYA CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(646, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180274S-KOKO', 'DOMPUL', 150000, 0, 1243195, 1.5, '087757029551', 'LUMBUNG CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(647, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180275S-KOKO', 'DOMPUL', 100000, 0, 8330820, 1.5, '087859587410', 'AUDE CELL KEDUNG BANTENG', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(648, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180275S-KOKO', 'DP10', 25, 0, 11402, 0, '087859587410', 'AUDE CELL KEDUNG BANTENG', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(649, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180275S-KOKO', 'DP5', 25, 0, 7185, 0, '087859587410', 'AUDE CELL KEDUNG BANTENG', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(650, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180298S-KOKO', 'DOMPUL', 200000, 0, 3135770, 1.5, '087856000184', 'ROSE CELL', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(651, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180276S-KOKO', 'DOMPUL', 200000, 0, 1043195, 1.5, '087856560284', 'KRISNA CELL JMBNG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(652, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180277S-KOKO', 'DP10', 15, 0, 11243, 0, '087850511096', 'BJG DD CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(653, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180278S-KOKO', 'DOMPUL', 500000, 0, 298474900, 1.5, '081938062473', 'ANGEL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(654, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180278S-KOKO', 'DP10', 50, 0, 60937, 0, '081938062473', 'ANGEL CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(655, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180279S-KOKO', 'DOMPUL', 300000, 0, 8030820, 1.5, '081938450021', 'DIFA CELL TANGGULANGIN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(656, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180279S-KOKO', 'DP10', 20, 0, 11382, 0, '081938450021', 'DIFA CELL TANGGULANGIN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(657, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180279S-KOKO', 'DP5', 20, 0, 7165, 0, '081938450021', 'DIFA CELL TANGGULANGIN', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(658, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180280S-KOKO', 'DP10', 50, 0, 11193, 0, '081913849663', 'SAMBI CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(659, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180280S-KOKO', 'DP5', 50, 0, 6544, 0, '081913849663', 'SAMBI CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(660, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180281S-KOKO', 'DOMPUL', 2000000, 0, 296474900, 1.5, '081938062573', 'ari cell', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(661, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180281S-KOKO', 'DP10', 150, 0, 60787, 0, '081938062573', 'ari cell', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(662, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180281S-KOKO', 'DP5', 150, 0, 24313, 0, '081938062573', 'ari cell', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(663, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180282S-KOKO', 'DOMPUL', 100000, 0, 943195, 1.5, '081935060208', 'JAYA CELL MOJO', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(664, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180282S-KOKO', 'DP10', 10, 0, 7131, 0, '081935060208', 'JAYA CELL MOJO', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(665, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180282S-KOKO', 'DP5', 10, 0, 3212, 0, '081935060208', 'JAYA CELL MOJO', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(666, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180283S-KOKO', 'DP10', 20, 0, 11173, 0, '087856390001', 'ANIK CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(667, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180283S-KOKO', 'DP5', 20, 0, 6524, 0, '087856390001', 'ANIK CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(668, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180284S-KOKO', 'DOMPUL', 210000, 0, 7820820, 1.5, '081913243235', 'COCO CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(669, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180284S-KOKO', 'DP10', 20, 0, 11362, 0, '081913243235', 'COCO CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(670, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180284S-KOKO', 'DP5', 50, 0, 7115, 0, '081913243235', 'COCO CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(671, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180285S-KOKO', 'DOMPUL', 3000000, 0, 7135770, 1.5, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(672, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180285S-KOKO', 'DP10', 270, 0, 10903, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(673, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180285S-KOKO', 'DP5', 270, 0, 6254, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(674, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180286S-KOKO', 'DOMPUL', 100000, 0, 843195, 1.5, '081935053113', 'GARUDA PULSA', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(675, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180286S-KOKO', 'DP10', 10, 0, 7121, 0, '081935053113', 'GARUDA PULSA', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(676, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180287S-KOKO', 'DOMPUL', 500000, 0, 7320820, 1.5, '081938450342', 'KD CELL1', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(677, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180287S-KOKO', 'DP10', 50, 0, 11312, 0, '081938450342', 'KD CELL1', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(678, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180287S-KOKO', 'DP5', 50, 0, 7065, 0, '081938450342', 'KD CELL1', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(679, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180288S-KOKO', 'DP10', 50, 0, 10853, 0, '081938545902', 'SS PHONE', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(680, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180288S-KOKO', 'DP5', 50, 0, 6204, 0, '081938545902', 'SS PHONE', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(681, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180289S-KOKO', 'DOMPUL', 300000, 0, 6835770, 1.5, '087856053351', 'GRK PRINCE CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(682, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180289S-KOKO', 'DP10', 15, 0, 10838, 0, '087856053351', 'GRK PRINCE CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(683, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180289S-KOKO', 'DP5', 15, 0, 6189, 0, '087856053351', 'GRK PRINCE CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(684, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180290S-KOKO', 'DP10', 10, 0, 60777, 0, '081938063584', 'bulan phone', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(685, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180290S-KOKO', 'DP5', 10, 0, 24303, 0, '081938063584', 'bulan phone', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(686, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180291S-KOKO', 'DOMPUL', 2500000, 0, 4335770, 1.5, '081938546166', 'EGY CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(687, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180291S-KOKO', 'DP10', 150, 0, 10688, 0, '081938546166', 'EGY CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(688, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180291S-KOKO', 'DP5', 150, 0, 6039, 0, '081938546166', 'EGY CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(689, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180292S-KOKO', 'DOMPUL', 500000, 0, 3835770, 1.5, '087750958026', 'JOYO CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(690, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180292S-KOKO', 'DP10', 20, 0, 10668, 0, '087750958026', 'JOYO CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(691, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180292S-KOKO', 'DP5', 20, 0, 6019, 0, '087750958026', 'JOYO CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(692, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180293S-KOKO', 'DOMPUL', 3000000, 0, 4320820, 1.5, '081931074205', 'LA ANTIN CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(693, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180293S-KOKO', 'DP10', 300, 0, 11012, 0, '081931074205', 'LA ANTIN CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(694, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180293S-KOKO', 'DP5', 100, 0, 6965, 0, '081931074205', 'LA ANTIN CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(695, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180294S-KOKO', 'DOMPUL', 3000000, 0, 293474900, 1.5, '081938063608', 'PORONG 88', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(696, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180294S-KOKO', 'DP10', 250, 0, 60527, 0, '081938063608', 'PORONG 88', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(697, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180294S-KOKO', 'DP5', 150, 0, 24153, 0, '081938063608', 'PORONG 88', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(698, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180295S-KOKO', 'DOMPUL', 50000, 0, 293424900, 1.5, '081938063459', 'aladin Cell 3', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(699, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180296S-KOKO', 'DOMPUL', 500000, 0, 3335770, 1.5, '081938545923', 'AMIRAH CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(700, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180296S-KOKO', 'DP10', 10, 0, 10658, 0, '081938545923', 'AMIRAH CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(701, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180297S-KOKO', 'DOMPUL', 200000, 0, 643195, 1.5, '087757029612', 'TID CELL', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(702, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180325S-KOKO', 'DOMPUL', 400000, 0, 7620820, 1.5, '087757170367', 'AS CELL TROSOBO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(703, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180325S-KOKO', 'DP10', 30, 0, 10692, 0, '087757170367', 'AS CELL TROSOBO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(704, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180325S-KOKO', 'DP5', 10, 0, 6768, 0, '087757170367', 'AS CELL TROSOBO', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(705, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180299S-KOKO', 'DOMPUL', 100000, 0, 543195, 1.5, '087752650019', 'JAYA CELL 2', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(706, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180300S-KOKO', 'DOMPUL', 500000, 0, 3820820, 1.5, '081938063182', 'DIMENSI CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(707, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180301S-KOKO', 'DOMPUL', 100000, 0, 443195, 1.5, '081938880376', 'INOVA CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(708, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180301S-KOKO', 'DP5', 10, 0, 3202, 0, '081938880376', 'INOVA CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(709, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180302S-KOKO', 'DOMPUL', 500000, 0, 2635770, 1.5, '087856000249', 'OCC 2 CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(710, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180303S-KOKO', 'DOMPUL', 200000, 0, 293224900, 1.5, '081959452699', 'MELATI CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(711, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180304S-KOKO', 'DOMPUL', 100000, 0, 343195, 1.5, '081938804560', 'ALADIN CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(712, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180305S-KOKO', 'DOMPUL', 100000, 0, 293124900, 1.5, '081938062439', 'Indri Cell', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(713, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180306S-KOKO', 'DOMPUL', 300000, 0, 292824900, 1.5, '081938062405', 'MIETHA CELL 2', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(714, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180306S-KOKO', 'DP10', 20, 0, 60507, 0, '081938062405', 'MIETHA CELL 2', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(715, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180306S-KOKO', 'DP5', 20, 0, 24133, 0, '081938062405', 'MIETHA CELL 2', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(716, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180307S-KOKO', 'DOMPUL', 1600000, 0, 2220820, 1.5, '081703275690', 'MUTIARA CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(717, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180307S-KOKO', 'DP10', 20, 0, 10992, 0, '081703275690', 'MUTIARA CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(718, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180307S-KOKO', 'DP5', 20, 0, 6945, 0, '081703275690', 'MUTIARA CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(719, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180308S-KOKO', 'DOMPUL', 100000, 0, 2120820, 1.5, '081703812727', 'MAPLE CELL COLLECTION', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(720, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180308S-KOKO', 'DP10', 10, 0, 10982, 0, '081703812727', 'MAPLE CELL COLLECTION', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(721, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180308S-KOKO', 'DP5', 7, 0, 6938, 0, '081703812727', 'MAPLE CELL COLLECTION', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(722, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180309S-KOKO', 'DOMPUL', 50000, 0, 292774900, 1.5, '081938072890', 'INA CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(723, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180310S-KOKO', 'DOMPUL', 150000, 0, 292624900, 1.5, '081959452699', 'MELATI CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(724, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180311S-KOKO', 'DOMPUL', 100000, 0, 243195, 1.5, '081938809732', 'GTZ', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(725, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180311S-KOKO', 'DP10', 10, 0, 7111, 0, '081938809732', 'GTZ', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(726, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180311S-KOKO', 'DP5', 10, 0, 3192, 0, '081938809732', 'GTZ', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(727, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180312S-KOKO', 'DOMPUL', 300000, 0, 1820820, 1.5, '081703355634', 'D2 CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(728, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180312S-KOKO', 'DP10', 90, 0, 10892, 0, '081703355634', 'D2 CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(729, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180312S-KOKO', 'DP5', 40, 0, 6898, 0, '081703355634', 'D2 CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(730, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180313S-KOKO', 'DOMPUL', 1000000, 0, 820820, 1.5, '081913242826', 'S180T CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(731, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180313S-KOKO', 'DP10', 10, 0, 10882, 0, '081913242826', 'S180T CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(732, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180313S-KOKO', 'DP5', 10, 0, 6888, 0, '081913242826', 'S180T CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(733, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180314S-KOKO', 'DOMPUL', 300000, 0, 520820, 1.5, '087858733669', 'MIETHA CELL TAMAN PINANG', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(734, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180314S-KOKO', 'DP10', 30, 0, 10852, 0, '087858733669', 'MIETHA CELL TAMAN PINANG', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(735, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180314S-KOKO', 'DP5', 25, 0, 6863, 0, '087858733669', 'MIETHA CELL TAMAN PINANG', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(736, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180315S-KOKO', 'DP10', 10, 0, 60497, 0, '081938063634', 'bengkel hp', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(737, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180315S-KOKO', 'DP5', 10, 0, 24123, 0, '081938063634', 'bengkel hp', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(738, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180316S-KOKO', 'DOMPUL', 200000, 0, 320820, 1.5, '08179392646', 'SATRIA 1 CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(739, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180317S-KOKO', 'DOMPUL', 100000, 0, 220820, 1.5, '081913243768', 'SATRIA 2 CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(740, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180317S-KOKO', 'DP10', 20, 0, 10832, 0, '081913243768', 'SATRIA 2 CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(741, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180317S-KOKO', 'DP5', 10, 0, 6853, 0, '081913243768', 'SATRIA 2 CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(742, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180318S-KOKO', 'DOMPUL', 1000000, 0, 9220820, 1.5, '081931074312', 'ALOHA CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(743, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180318S-KOKO', 'DP10', 40, 0, 10792, 0, '081931074312', 'ALOHA CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(744, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180318S-KOKO', 'DP5', 30, 0, 6823, 0, '081931074312', 'ALOHA CELL', 'Success', '087771770757', 'SDA-RICKY SETIAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(745, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180319S-KOKO', 'DOMPUL', 200000, 0, 292424900, 1.5, '081938062383', 'DINAR CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(746, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180319S-KOKO', 'DP10', 10, 0, 60487, 0, '081938062383', 'DINAR CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(747, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180319S-KOKO', 'DP5', 20, 0, 24103, 0, '081938062383', 'DINAR CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(748, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180320S-KOKO', 'DOMPUL', 1000000, 0, 8220820, 1.5, '081931074136', 'MIETHA CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(749, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180320S-KOKO', 'DP10', 50, 0, 10742, 0, '081931074136', 'MIETHA CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(750, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180320S-KOKO', 'DP5', 25, 0, 6798, 0, '081931074136', 'MIETHA CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(751, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180321S-KOKO', 'DOMPUL', 2000000, 0, 635770, 1.5, '087856230028', 'GRK I ONE CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(752, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180322S-KOKO', 'DOMPUL', 200000, 0, 8020820, 1.5, '081703939083', 'UUN CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(753, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180322S-KOKO', 'DP10', 20, 0, 10722, 0, '081703939083', 'UUN CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(754, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180322S-KOKO', 'DP5', 20, 0, 6778, 0, '081703939083', 'UUN CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(755, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180323S-KOKO', 'DOMPUL', 1500000, 0, 9135770, 1.5, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(756, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180323S-KOKO', 'DP10', 230, 0, 10428, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(757, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180323S-KOKO', 'DP5', 230, 0, 5789, 0, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(758, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180324S-KOKO', 'DOMPUL', 1000000, 0, 8135770, 1.5, '081949610263', 'FATTAN CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(759, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180324S-KOKO', 'DP10', 30, 0, 10398, 0, '081949610263', 'FATTAN CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(760, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180324S-KOKO', 'DP5', 20, 0, 5769, 0, '081949610263', 'FATTAN CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(761, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180326S-KOKO', 'DOMPUL', 2500000, 0, 5120820, 1.5, '087851051301', 'K26 CELL WARU', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(762, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180327S-KOKO', 'DOMPUL', 600000, 0, 291824900, 1.5, '081938063444', 'MY CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(763, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180329S-KOKO', 'DOMPUL', 300000, 0, 291524900, 1.5, '081938062404', 'IFUL.CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(764, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180328S-KOKO', 'DOMPUL', 800000, 0, 4320820, 1.5, '087851051408', 'THE PROF', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(765, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180330S-KOKO', 'DOMPUL', 200000, 0, 43195, 1.5, '087856560778', 'BAGUS CELL 3 JOMBANG', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(766, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180330S-KOKO', 'DP10', 15, 0, 7096, 0, '087856560778', 'BAGUS CELL 3 JOMBANG', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(767, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180331S-KOKO', 'DOMPUL', 300000, 0, 291224900, 1.5, '081938063468', 'PAMUNGKAS CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(768, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180331S-KOKO', 'DP10', 30, 0, 60457, 0, '081938063468', 'PAMUNGKAS CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(769, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180331S-KOKO', 'DP5', 20, 0, 24083, 0, '081938063468', 'PAMUNGKAS CELL', 'Success', '087852821951', 'SDA-FAUZY AHDIAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(770, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180332S-KOKO', 'DOMPUL', 1000000, 0, 3320820, 1.5, '087856560364', 'SIJI SONGO CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(771, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180332S-KOKO', 'DP10', 100, 0, 10592, 0, '087856560364', 'SIJI SONGO CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(772, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180332S-KOKO', 'DP5', 50, 0, 6718, 0, '087856560364', 'SIJI SONGO CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(773, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180333S-KOKO', 'DOMPUL', 200000, 0, 291024900, 1.5, '081938072854', 'jj cell', 'Success', '087701029091', 'LMG-EKO WAHYU', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(774, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180334S-KOKO', 'DOMPUL', 300000, 0, 9743195, 1.5, '081913130478', 'AZAY CELL JOMBANG', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(775, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180334S-KOKO', 'DP10', 20, 0, 7076, 0, '081913130478', 'AZAY CELL JOMBANG', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(776, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180334S-KOKO', 'DP5', 10, 0, 3182, 0, '081913130478', 'AZAY CELL JOMBANG', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(777, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180335S-KOKO', 'DOMPUL', 2500000, 0, 820820, 1.5, '087859588085', 'RAHMAT CELL CEMENG', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(778, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180335S-KOKO', 'DP10', 15, 0, 10577, 0, '087859588085', 'RAHMAT CELL CEMENG', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(779, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180335S-KOKO', 'DP5', 10, 0, 6708, 0, '087859588085', 'RAHMAT CELL CEMENG', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(780, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180353S-KOKO', 'DOMPUL', 500000, 0, 290224900, 1.5, '081938062632', 'arwan cell 2', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(781, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180336S-KOKO', 'DOMPUL', 500000, 0, 7635770, 1.5, '081949640567', 'MAHESA', 'Success', '087701029091', 'LMG-EKO WAHYU', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(782, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180336S-KOKO', 'DP10', 20, 0, 10378, 0, '081949640567', 'MAHESA', 'Success', '087701029091', 'LMG-EKO WAHYU', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(783, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180337S-KOKO', 'DOMPUL', 300000, 0, 7335770, 1.5, '087750956302', 'GRK YASMINI CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(784, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180337S-KOKO', 'DP10', 10, 0, 10368, 0, '087750956302', 'GRK YASMINI CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(785, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180337S-KOKO', 'DP5', 10, 0, 5759, 0, '087750956302', 'GRK YASMINI CELL', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(786, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180338S-KOKO', 'DOMPUL', 100000, 0, 9643195, 1.5, '081913240916', 'NB CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(787, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180338S-KOKO', 'DP10', 10, 0, 7066, 0, '081913240916', 'NB CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(788, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180339S-KOKO', 'DOMPUL', 200000, 0, 290824900, 1.5, '081938072972', 'CHELSEA CELL 2', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(789, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180339S-KOKO', 'DP10', 20, 0, 60437, 0, '081938072972', 'CHELSEA CELL 2', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(790, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180339S-KOKO', 'DP5', 20, 0, 24063, 0, '081938072972', 'CHELSEA CELL 2', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(791, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180340S-KOKO', 'DOMPUL', 250000, 0, 570820, 1.5, '081703275711', 'PUTRA CELL', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0);
INSERT INTO `upload_dompuls` (`id_upload`, `id_user`, `id_lokasi`, `id_penjualan_dompul`, `no_hp_sub_master_dompul`, `nama_sub_master_dompul`, `tanggal_transfer`, `tanggal_upload`, `no_faktur`, `produk`, `qty`, `qty_program`, `balance`, `diskon`, `no_hp_downline`, `nama_downline`, `status`, `no_hp_canvasser`, `nama_canvasser`, `inbox`, `print`, `bayar`, `tipe_dompul`, `harga_dompul`, `status_active`, `status_penjualan`, `deleted`) VALUES
(792, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180341S-KOKO', 'DOMPUL', 100000, 0, 7235770, 1.5, '081931571642', 'BODY CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(793, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180341S-KOKO', 'DP10', 25, 0, 10343, 0, '081931571642', 'BODY CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(794, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180341S-KOKO', 'DP5', 20, 0, 5739, 0, '081931571642', 'BODY CELL', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(795, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180342S-KOKO', 'DOMPUL', 100000, 0, 7135770, 1.5, '087856099091', 'BJN ECA SUMBERJO', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(796, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180342S-KOKO', 'DP10', 10, 0, 10333, 0, '087856099091', 'BJN ECA SUMBERJO', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(797, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180342S-KOKO', 'DP5', 10, 0, 5729, 0, '087856099091', 'BJN ECA SUMBERJO', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(798, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180343S-KOKO', 'DOMPUL', 500000, 0, 70820, 1.5, '08175123801', 'JAPAN CELLULAR 2', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(799, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180343S-KOKO', 'DP10', 20, 0, 10557, 0, '08175123801', 'JAPAN CELLULAR 2', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(800, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180343S-KOKO', 'DP5', 20, 0, 6688, 0, '08175123801', 'JAPAN CELLULAR 2', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(801, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180344S-KOKO', 'DOMPUL', 1000000, 0, 6135770, 1.5, '081913847896', 'GRK CJDW CELL KEBOMAS', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(802, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180345S-KOKO', 'DP10', 20, 0, 7046, 0, '087757029580', 'BIMA NET', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(803, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180345S-KOKO', 'DP5', 20, 0, 3162, 0, '087757029580', 'BIMA NET', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(804, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180346S-KOKO', 'DOMPUL', 1200000, 0, 8870820, 1.5, '087757029539', 'EMBONG PHONE 2 WEDORO', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(805, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180346S-KOKO', 'DP10', 130, 0, 10427, 0, '087757029539', 'EMBONG PHONE 2 WEDORO', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(806, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180346S-KOKO', 'DP5', 110, 0, 6578, 0, '087757029539', 'EMBONG PHONE 2 WEDORO', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(807, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180347S-KOKO', 'DP5', 10, 0, 24053, 0, '081938063541', 'umam cell', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(808, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180348S-KOKO', 'DOMPUL', 300000, 0, 5835770, 1.5, '081913848308', 'GRK BAROKAH CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(809, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180348S-KOKO', 'DP10', 10, 0, 10323, 0, '081913848308', 'GRK BAROKAH CELL', 'Success', '087819554765', 'GRK-MISBAHUL ULUM', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(810, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180349S-KOKO', 'DOMPUL', 200000, 0, 9443195, 1.5, '081931076820', 'ALADIN CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(811, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180349S-KOKO', 'DP10', 5, 0, 7041, 0, '081931076820', 'ALADIN CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(812, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180349S-KOKO', 'DP5', 10, 0, 3152, 0, '081931076820', 'ALADIN CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(813, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180350S-KOKO', 'DOMPUL', 100000, 0, 290724900, 1.5, '081938073034', 'FATTAN CELL 2', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(814, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180350S-KOKO', 'DP10', 10, 0, 60427, 0, '081938073034', 'FATTAN CELL 2', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(815, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180350S-KOKO', 'DP5', 10, 0, 24043, 0, '081938073034', 'FATTAN CELL 2', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(816, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180351S-KOKO', 'DOMPUL', 3000000, 0, 2835770, 1.5, '081938545936', 'MEGA JAYA', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(817, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180351S-KOKO', 'DP10', 100, 0, 10223, 0, '081938545936', 'MEGA JAYA', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(818, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180351S-KOKO', 'DP5', 100, 0, 5629, 0, '081938545936', 'MEGA JAYA', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(819, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180352S-KOKO', 'DOMPUL', 500000, 0, 8370820, 1.5, '085931398155', 'BIMA CELL', 'Success', '083856948889', 'SDA-SITI NAFISHA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(820, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180354S-KOKO', 'DOMPUL', 2000000, 0, 835770, 1.5, '081931573029', 'GRK MASTER PONSEL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(821, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180354S-KOKO', 'DP10', 200, 0, 10023, 0, '081931573029', 'GRK MASTER PONSEL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(822, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180354S-KOKO', 'DP5', 200, 0, 5429, 0, '081931573029', 'GRK MASTER PONSEL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(823, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180355S-KOKO', 'DOMPUL', 200000, 0, 9243195, 1.5, '081939870584', 'ISTANA GSM CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(824, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180356S-KOKO', 'DOMPUL', 410000, 0, 425770, 1.5, '081913810709', 'ARINSA CELLULER', 'Success', '087753167878', 'BJG-AGUS SUSANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(825, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180357S-KOKO', 'DOMPUL', 300000, 0, 8070820, 1.5, '081938801377', '3 RAJA CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(826, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180357S-KOKO', 'DP10', 30, 0, 10397, 0, '081938801377', '3 RAJA CELL', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(827, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180358S-KOKO', 'DOMPUL', 300000, 0, 289924900, 1.5, '081938063539', 'President cell 2', 'Success', '087701000096', 'SDA-HANDAYANI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(828, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180359S-KOKO', 'DOMPUL', 700000, 0, 9725770, 1.5, '087856001036', 'RIFKA CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(829, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180359S-KOKO', 'DP10', 40, 0, 9983, 0, '087856001036', 'RIFKA CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(830, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180359S-KOKO', 'DP5', 10, 0, 5419, 0, '087856001036', 'RIFKA CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(831, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180360S-KOKO', 'DOMPUL', 700000, 0, 9025770, 1.5, '087856243361', 'GRK H2 CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(832, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180360S-KOKO', 'DP10', 40, 0, 9943, 0, '087856243361', 'GRK H2 CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(833, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180360S-KOKO', 'DP5', 10, 0, 5409, 0, '087856243361', 'GRK H2 CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(834, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180361S-KOKO', 'DOMPUL', 700000, 0, 8325770, 1.5, '087750955542', 'GRK ANITA CELL 2', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(835, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180361S-KOKO', 'DP10', 40, 0, 9903, 0, '087750955542', 'GRK ANITA CELL 2', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(836, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180361S-KOKO', 'DP5', 10, 0, 5399, 0, '087750955542', 'GRK ANITA CELL 2', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(837, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180362S-KOKO', 'DOMPUL', 1600000, 0, 6725770, 1.5, '087856080109', 'DIAN', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(838, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180362S-KOKO', 'DP10', 100, 0, 9803, 0, '087856080109', 'DIAN', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(839, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180362S-KOKO', 'DP5', 100, 0, 5299, 0, '087856080109', 'DIAN', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(840, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180363S-KOKO', 'DP10', 30, 0, 7011, 0, '081913130453', 'RZACK CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(841, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180363S-KOKO', 'DP5', 15, 0, 3137, 0, '081913130453', 'RZACK CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(842, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180364S-KOKO', 'DOMPUL', 200000, 0, 7870820, 1.5, '081935051122', 'NEO CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(843, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180364S-KOKO', 'DP10', 20, 0, 10377, 0, '081935051122', 'NEO CELL', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(844, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180365S-KOKO', 'DOMPUL', 200000, 0, 6525770, 1.5, '087850479272', 'YANTI CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(845, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180365S-KOKO', 'DP10', 30, 0, 9773, 0, '087850479272', 'YANTI CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(846, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180365S-KOKO', 'DP5', 30, 0, 5269, 0, '087850479272', 'YANTI CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(847, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180366S-KOKO', 'DOMPUL', 100000, 0, 7770820, 1.5, '087757029563', 'ATA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(848, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180366S-KOKO', 'DP10', 15, 0, 10362, 0, '087757029563', 'ATA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(849, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180366S-KOKO', 'DP5', 10, 0, 6568, 0, '087757029563', 'ATA CELL', 'Success', '087752977788', 'SDA-DEVI ALFIAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(850, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180367S-KOKO', 'DOMPUL', 500000, 0, 6025770, 1.5, '087856099059', 'BJN HOOD CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(851, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180367S-KOKO', 'DP10', 50, 0, 9723, 0, '087856099059', 'BJN HOOD CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(852, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180367S-KOKO', 'DP5', 50, 0, 5219, 0, '087856099059', 'BJN HOOD CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(853, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180368S-KOKO', 'DOMPUL', 650000, 0, 5375770, 1.5, '087854151833', 'GRK DEVY CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(854, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180368S-KOKO', 'DP10', 45, 0, 9678, 0, '087854151833', 'GRK DEVY CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(855, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180368S-KOKO', 'DP5', 15, 0, 5204, 0, '087854151833', 'GRK DEVY CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(856, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180369S-KOKO', 'DOMPUL', 650000, 0, 4725770, 1.5, '081913848183', 'GRK PALAPA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(857, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180369S-KOKO', 'DP10', 45, 0, 9633, 0, '081913848183', 'GRK PALAPA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(858, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180369S-KOKO', 'DP5', 15, 0, 5189, 0, '081913848183', 'GRK PALAPA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(859, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180370S-KOKO', 'DOMPUL', 1000000, 0, 288924900, 1.5, '081959452700', 'SAHABAT CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(860, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180370S-KOKO', 'DP10', 50, 0, 60377, 0, '081959452700', 'SAHABAT CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(861, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180370S-KOKO', 'DP5', 70, 0, 23973, 0, '081959452700', 'SAHABAT CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(862, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180387S-KOKO', 'DOMPUL', 100000, 0, 7270820, 1.5, '087856560108', 'TOKO NIKIMURA', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(863, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180387S-KOKO', 'DP10', 10, 0, 10331, 0, '087856560108', 'TOKO NIKIMURA', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(864, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180371S-KOKO', 'DOMPUL', 100000, 0, 9143195, 1.5, '081913130274', 'DWIPANTARA CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(865, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180371S-KOKO', 'DP10', 10, 0, 7001, 0, '081913130274', 'DWIPANTARA CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(866, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180371S-KOKO', 'DP5', 10, 0, 3127, 0, '081913130274', 'DWIPANTARA CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(867, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180372S-KOKO', 'DOMPUL', 650000, 0, 4075770, 1.5, '081913810755', 'JOHAN CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(868, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180372S-KOKO', 'DP10', 45, 0, 9588, 0, '081913810755', 'JOHAN CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(869, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180372S-KOKO', 'DP5', 15, 0, 5174, 0, '081913810755', 'JOHAN CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(870, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180373S-KOKO', 'DOMPUL', 500000, 0, 288424900, 1.5, '081938072879', 'Safira cell', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(871, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180374S-KOKO', 'DOMPUL', 200000, 0, 288224900, 1.5, '081938072895', 'CHANEL CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(872, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180374S-KOKO', 'DP10', 20, 0, 60357, 0, '081938072895', 'CHANEL CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(873, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180374S-KOKO', 'DP5', 20, 0, 23953, 0, '081938072895', 'CHANEL CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(874, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180375S-KOKO', 'DOMPUL', 400000, 0, 7370820, 1.5, '087856590865', 'DIK CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(875, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180375S-KOKO', 'DP10', 21, 0, 10341, 0, '087856590865', 'DIK CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(876, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180375S-KOKO', 'DP5', 11, 0, 6557, 0, '087856590865', 'DIK CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(877, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180376S-KOKO', 'DOMPUL', 400000, 0, 3675770, 1.5, '081949610512', 'LATANZA CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(878, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180376S-KOKO', 'DP10', 30, 0, 9558, 0, '081949610512', 'LATANZA CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(879, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180376S-KOKO', 'DP5', 30, 0, 5144, 0, '081949610512', 'LATANZA CELL', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(880, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180377S-KOKO', 'DOMPUL', 300000, 0, 8843195, 1.5, '081913120146', 'UDIN', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(881, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180377S-KOKO', 'DP10', 10, 0, 6991, 0, '081913120146', 'UDIN', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(882, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180377S-KOKO', 'DP5', 10, 0, 3117, 0, '081913120146', 'UDIN', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(883, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180378S-KOKO', 'DOMPUL', 300000, 0, 287924900, 1.5, '081938072893', 'DILA MALO', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(884, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180378S-KOKO', 'DP10', 40, 0, 60317, 0, '081938072893', 'DILA MALO', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(885, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180378S-KOKO', 'DP5', 30, 0, 23923, 0, '081938072893', 'DILA MALO', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(886, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180379S-KOKO', 'DOMPUL', 500000, 0, 8343195, 1.5, '081935052663', 'PRIMA 2 CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(887, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180379S-KOKO', 'DP10', 20, 0, 6971, 0, '081935052663', 'PRIMA 2 CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(888, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180380S-KOKO', 'DOMPUL', 300000, 0, 8043195, 1.5, '087856413110', 'ESA CELL MOJO', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(889, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180380S-KOKO', 'DP10', 10, 0, 6961, 0, '087856413110', 'ESA CELL MOJO', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(890, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180380S-KOKO', 'DP5', 20, 0, 3097, 0, '087856413110', 'ESA CELL MOJO', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(891, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180381S-KOKO', 'DOMPUL', 200000, 0, 287724900, 1.5, '081938072668', 'star cell', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(892, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180382S-KOKO', 'DOMPUL', 300000, 0, 287424900, 1.5, '081938072894', 'IVAN 2 CELULLER', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(893, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180382S-KOKO', 'DP10', 30, 0, 60287, 0, '081938072894', 'IVAN 2 CELULLER', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(894, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180382S-KOKO', 'DP5', 20, 0, 23903, 0, '081938072894', 'IVAN 2 CELULLER', 'Success', '081949888886', 'BJG-JAROT ASMORO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(895, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180383S-KOKO', 'DOMPUL', 200000, 0, 7843195, 1.5, '081938804402', 'WELLCOM', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(896, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180383S-KOKO', 'DP10', 10, 0, 6951, 0, '081938804402', 'WELLCOM', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(897, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180383S-KOKO', 'DP5', 10, 0, 3087, 0, '081938804402', 'WELLCOM', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(898, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180384S-KOKO', 'DOMPUL', 139000, 0, 287285900, 1.5, '081938072710', 'AK-47 Cell', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(899, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180385S-KOKO', 'DOMPUL', 50000, 0, 7793195, 1.5, '081938809775', 'DUA PUTRA CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(900, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180385S-KOKO', 'DP10', 10, 0, 6941, 0, '081938809775', 'DUA PUTRA CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(901, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180386S-KOKO', 'DOMPUL', 200000, 0, 287085900, 1.5, '081938063720', 'LANTABUR CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(902, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180386S-KOKO', 'DP10', 10, 0, 60277, 0, '081938063720', 'LANTABUR CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(903, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180386S-KOKO', 'DP5', 10, 0, 23893, 0, '081938063720', 'LANTABUR CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(904, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180388S-KOKO', 'DOMPUL', 200000, 0, 286885900, 1.5, '081938063442', 'Zitus Cell', 'Success', '087701000420', 'SDA-ROBY P.P', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(905, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180389S-KOKO', 'DP10', 200, 0, 10131, 0, '087757170223', 'GET RICH PHONE', 'Success', '083831998975', 'SDA-M.JANUAR FAHMI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(906, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180390S-KOKO', 'DOMPUL', 725000, 0, 2950770, 1.5, '087856560605', 'MULYA CELL', 'Success', '081949659898', 'GRK-AMI SUSILO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(907, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180391S-KOKO', 'DOMPUL', 200000, 0, 2750770, 1.5, '087856309528', 'GRK WARNA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(908, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180391S-KOKO', 'DP10', 20, 0, 9538, 0, '087856309528', 'GRK WARNA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(909, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180391S-KOKO', 'DP5', 20, 0, 5124, 0, '087856309528', 'GRK WARNA CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(910, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180392S-KOKO', 'DOMPUL', 400000, 0, 7393195, 1.5, '087856560356', 'MAJU CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(911, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180393S-KOKO', 'DOMPUL', 50000, 0, 7220820, 1.5, '087757029402', 'MILLA CELL SEPANDE', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(912, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180393S-KOKO', 'DP10', 20, 0, 10111, 0, '087757029402', 'MILLA CELL SEPANDE', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(913, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180393S-KOKO', 'DP5', 30, 0, 6527, 0, '087757029402', 'MILLA CELL SEPANDE', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(914, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180394S-KOKO', 'DOMPUL', 300000, 0, 7093195, 1.5, '087856560345', 'ORANGE CELL MOJOKERTO', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(915, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180394S-KOKO', 'DP10', 15, 0, 6926, 0, '087856560345', 'ORANGE CELL MOJOKERTO', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(916, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180395S-KOKO', 'DOMPUL', 3000000, 0, 4093195, 1.5, '087858900106', 'IDA CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(917, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180395S-KOKO', 'DP10', 300, 0, 6626, 0, '087858900106', 'IDA CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(918, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180395S-KOKO', 'DP5', 200, 0, 2887, 0, '087858900106', 'IDA CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(919, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180396S-KOKO', 'DOMPUL', 100000, 0, 286785900, 1.5, '081938063643', 'NASIONAL CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(920, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180396S-KOKO', 'DP10', 10, 0, 60267, 0, '081938063643', 'NASIONAL CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(921, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180396S-KOKO', 'DP5', 10, 0, 23883, 0, '081938063643', 'NASIONAL CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(922, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180397S-KOKO', 'DOMPUL', 200000, 0, 2550770, 1.5, '081938545659', 'SINAR 1', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(923, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180397S-KOKO', 'DP10', 25, 0, 9513, 0, '081938545659', 'SINAR 1', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(924, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180397S-KOKO', 'DP5', 15, 0, 5109, 0, '081938545659', 'SINAR 1', 'Success', '087805834781', 'GRK-ABDUL MUIZ', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(925, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180398S-KOKO', 'DOMPUL', 5000000, 0, 9093195, 1.5, '081935052302', 'JAVA CELL KABUH', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(926, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180399S-KOKO', 'DOMPUL', 2000000, 0, 7093195, 1.5, '081938833098', 'OFI CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(927, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180399S-KOKO', 'DP10', 100, 0, 6526, 0, '081938833098', 'OFI CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(928, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180399S-KOKO', 'DP5', 100, 0, 2787, 0, '081938833098', 'OFI CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(929, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180003-KOKO', 'DOMPUL', 100000000, 0, 186785900, 1.5, '081938062640', 'SD ROS SDJ', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(930, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180003-KOKO', 'DP10', 9040, 0, 51227, 0, '081938062640', 'SD ROS SDJ', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(931, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180003-KOKO', 'DP5', 5480, 0, 18403, 0, '081938062640', 'SD ROS SDJ', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(932, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180004-KOKO', 'DOMPUL', 7700000, 0, 179085900, 1.5, '081938062640', 'SD ROS SDJ', 'Success', '08175207075', 'DENY DWIYANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(933, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180400S-KOKO', 'DOMPUL', 200000, 0, 2350770, 1.5, '081913810096', 'GRK STAR CELL GRESIK', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(934, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180400S-KOKO', 'DP10', 25, 0, 9488, 0, '081913810096', 'GRK STAR CELL GRESIK', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(935, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180401S-KOKO', 'DP10', 200, 0, 6326, 0, '081939870595', 'HILDA CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(936, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180401S-KOKO', 'DP5', 300, 0, 2487, 0, '081939870595', 'HILDA CELL', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(937, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180402S-KOKO', 'DOMPUL', 1000000, 0, 6220820, 1.5, '08175247177', 'ORENZ CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(938, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180402S-KOKO', 'DP10', 50, 0, 10061, 0, '08175247177', 'ORENZ CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(939, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180402S-KOKO', 'DP5', 40, 0, 6487, 0, '08175247177', 'ORENZ CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(940, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180403S-KOKO', 'DOMPUL', 1000000, 0, 6700000, 1.5, '081913848476', 'Garuda Reloads', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(941, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180403S-KOKO', 'DP10', 75, 0, 8965, 0, '081913848476', 'Garuda Reloads', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(942, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180403S-KOKO', 'DP5', 50, 0, 5430, 0, '081913848476', 'Garuda Reloads', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(943, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180404S-KOKO', 'DOMPUL', 1000000, 0, 6093195, 1.5, '087758459970', 'NATURE CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(944, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180404S-KOKO', 'DP10', 90, 0, 6236, 0, '087758459970', 'NATURE CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(945, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180404S-KOKO', 'DP5', 70, 0, 2417, 0, '087758459970', 'NATURE CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(946, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180405S-KOKO', 'DOMPUL', 1000000, 0, 5700000, 1.5, '081931572123', 'Garuda Reloads', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(947, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180405S-KOKO', 'DP10', 75, 0, 8890, 0, '081931572123', 'Garuda Reloads', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(948, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180405S-KOKO', 'DP5', 50, 0, 5380, 0, '081931572123', 'Garuda Reloads', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(949, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180406S-KOKO', 'DP10', 300, 0, 5936, 0, '087757029525', 'YOHAN CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(950, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180406S-KOKO', 'DP5', 200, 0, 2217, 0, '087757029525', 'YOHAN CELL', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(951, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180407S-KOKO', 'DOMPUL', 3000000, 0, 2700000, 1.5, '087856230249', 'KINAR RELOAD', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(952, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180407S-KOKO', 'DP10', 200, 0, 8690, 0, '087856230249', 'KINAR RELOAD', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(953, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180407S-KOKO', 'DP5', 100, 0, 5280, 0, '087856230249', 'KINAR RELOAD', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(954, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180408S-KOKO', 'DOMPUL', 750000, 0, 1950000, 1.5, '081931073451', 'ADI PULSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(955, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180408S-KOKO', 'DP10', 75, 0, 8615, 0, '081931073451', 'ADI PULSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(956, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180408S-KOKO', 'DP5', 35, 0, 5245, 0, '081931073451', 'ADI PULSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(957, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180409S-KOKO', 'DOMPUL', 9000000, 0, 170085900, 1.5, '081938545945', 'FABIO CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(958, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180410S-KOKO', 'DOMPUL', 750000, 0, 1200000, 1.5, '081931073370', 'ADI PULSA 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(959, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180410S-KOKO', 'DP10', 75, 0, 8540, 0, '081931073370', 'ADI PULSA 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(960, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180410S-KOKO', 'DP5', 35, 0, 5210, 0, '081931073370', 'ADI PULSA 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(961, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180411S-KOKO', 'DOMPUL', 500000, 0, 700000, 1.5, '08175247117', 'ADI PULSA 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(962, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180411S-KOKO', 'DP10', 100, 0, 8440, 0, '08175247117', 'ADI PULSA 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(963, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180411S-KOKO', 'DP5', 30, 0, 5180, 0, '08175247117', 'ADI PULSA 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(964, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180412S-KOKO', 'DOMPUL', 5000000, 0, 5700000, 1.5, '081931076022', 'ALSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(965, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180412S-KOKO', 'DP10', 300, 0, 8140, 0, '081931076022', 'ALSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(966, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180412S-KOKO', 'DP5', 200, 0, 4980, 0, '081931076022', 'ALSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(967, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180413S-KOKO', 'DOMPUL', 6000000, 0, 9700000, 1.5, '087856560748', 'DUTA 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(968, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180413S-KOKO', 'DP10', 556, 0, 7584, 0, '087856560748', 'DUTA 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(969, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180413S-KOKO', 'DP5', 389, 0, 4591, 0, '087856560748', 'DUTA 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(970, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180414S-KOKO', 'DOMPUL', 5500000, 0, 4200000, 1.5, '087856560756', 'DUTA 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(971, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180414S-KOKO', 'DP10', 556, 0, 7028, 0, '087856560756', 'DUTA 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(972, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180414S-KOKO', 'DP5', 389, 0, 4202, 0, '087856560756', 'DUTA 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(973, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180415S-KOKO', 'DOMPUL', 5500000, 0, 8700000, 1.5, '087856591203', 'DUTA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(974, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180415S-KOKO', 'DP10', 556, 0, 6472, 0, '087856591203', 'DUTA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(975, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180415S-KOKO', 'DP5', 389, 0, 3813, 0, '087856591203', 'DUTA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(976, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180416S-KOKO', 'DOMPUL', 5500000, 0, 3200000, 1.5, '087856591236', 'DUTA 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(977, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180416S-KOKO', 'DP10', 556, 0, 5916, 0, '087856591236', 'DUTA 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(978, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180416S-KOKO', 'DP5', 389, 0, 3424, 0, '087856591236', 'DUTA 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(979, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180417S-KOKO', 'DOMPUL', 5500000, 0, 7700000, 1.5, '087856560768', 'DUTA 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(980, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180417S-KOKO', 'DP10', 556, 0, 5360, 0, '087856560768', 'DUTA 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(981, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180417S-KOKO', 'DP5', 389, 0, 3035, 0, '087856560768', 'DUTA 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(982, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180418S-KOKO', 'DOMPUL', 9000000, 0, 3350770, 1.5, '081931575502', 'GRK MERCI B QU CELL', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(983, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180419S-KOKO', 'DOMPUL', 5500000, 0, 2200000, 1.5, '081938452549', 'DUTA 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(984, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180419S-KOKO', 'DP10', 555, 0, 4805, 0, '081938452549', 'DUTA 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(985, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180419S-KOKO', 'DP5', 389, 0, 2646, 0, '081938452549', 'DUTA 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(986, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180420S-KOKO', 'DOMPUL', 5500000, 0, 6700000, 1.5, '081937388453', 'DUTA 7', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(987, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180420S-KOKO', 'DP10', 555, 0, 4250, 0, '081937388453', 'DUTA 7', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(988, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180420S-KOKO', 'DP5', 389, 0, 2257, 0, '081937388453', 'DUTA 7', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(989, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180421S-KOKO', 'DOMPUL', 5500000, 0, 1200000, 1.5, '081938450102', 'DUTA 8', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(990, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180421S-KOKO', 'DP10', 555, 0, 3695, 0, '081938450102', 'DUTA 8', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(991, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180421S-KOKO', 'DP5', 389, 0, 1868, 0, '081938450102', 'DUTA 8', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(992, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180422S-KOKO', 'DOMPUL', 5500000, 0, 5700000, 1.5, '081703930093', 'DUTA 9', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0);
INSERT INTO `upload_dompuls` (`id_upload`, `id_user`, `id_lokasi`, `id_penjualan_dompul`, `no_hp_sub_master_dompul`, `nama_sub_master_dompul`, `tanggal_transfer`, `tanggal_upload`, `no_faktur`, `produk`, `qty`, `qty_program`, `balance`, `diskon`, `no_hp_downline`, `nama_downline`, `status`, `no_hp_canvasser`, `nama_canvasser`, `inbox`, `print`, `bayar`, `tipe_dompul`, `harga_dompul`, `status_active`, `status_penjualan`, `deleted`) VALUES
(993, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180422S-KOKO', 'DP10', 555, 0, 3140, 0, '081703930093', 'DUTA 9', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(994, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180422S-KOKO', 'DP5', 388, 0, 1480, 0, '081703930093', 'DUTA 9', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(995, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180423S-KOKO', 'DOMPUL', 1000000, 0, 5093195, 1.5, '081931073064', 'FANNY CELL JOMBANG', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(996, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180423S-KOKO', 'DP10', 50, 0, 5886, 0, '081931073064', 'FANNY CELL JOMBANG', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(997, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180423S-KOKO', 'DP5', 50, 0, 2167, 0, '081931073064', 'FANNY CELL JOMBANG', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(998, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180424S-KOKO', 'DOMPUL', 5000000, 0, 700000, 1.5, '081939860928', 'LOTUS 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(999, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180424S-KOKO', 'DP10', 300, 0, 2840, 0, '081939860928', 'LOTUS 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1000, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180424S-KOKO', 'DP5', 250, 0, 1230, 0, '081939860928', 'LOTUS 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1001, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180425S-KOKO', 'DOMPUL', 5000000, 0, 5700000, 1.5, '081703930465', 'LOTUS 7', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1002, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180425S-KOKO', 'DP10', 300, 0, 2540, 0, '081703930465', 'LOTUS 7', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1003, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180425S-KOKO', 'DP5', 250, 0, 980, 0, '081703930465', 'LOTUS 7', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1004, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180426S-KOKO', 'DOMPUL', 2000000, 0, 3700000, 1.5, '081703931172', 'PS 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1005, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180426S-KOKO', 'DP10', 100, 0, 2440, 0, '081703931172', 'PS 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1006, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180426S-KOKO', 'DP5', 30, 0, 950, 0, '081703931172', 'PS 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1007, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180427S-KOKO', 'DOMPUL', 2000000, 0, 1700000, 1.5, '081939862865', 'PS 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1008, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180427S-KOKO', 'DP10', 100, 0, 2340, 0, '081939862865', 'PS 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1009, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180427S-KOKO', 'DP5', 30, 0, 920, 0, '081939862865', 'PS 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1010, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180428S-KOKO', 'DOMPUL', 2000000, 0, 9700000, 1.5, '087856410900', 'PS 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1011, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180428S-KOKO', 'DP10', 100, 0, 2240, 0, '087856410900', 'PS 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1012, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180428S-KOKO', 'DP5', 30, 0, 890, 0, '087856410900', 'PS 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1013, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180429S-KOKO', 'DOMPUL', 2000000, 0, 7700000, 1.5, '081935060165', 'PS 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1014, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180429S-KOKO', 'DP10', 100, 0, 2140, 0, '081935060165', 'PS 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1015, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180429S-KOKO', 'DP5', 30, 0, 860, 0, '081935060165', 'PS 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1016, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180430S-KOKO', 'DOMPUL', 2000000, 0, 5700000, 1.5, '087850809479', 'PS 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1017, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180430S-KOKO', 'DP10', 100, 0, 2040, 0, '087850809479', 'PS 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1018, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180430S-KOKO', 'DP5', 30, 0, 830, 0, '087850809479', 'PS 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1019, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180431S-KOKO', 'DOMPUL', 2500000, 0, 3200000, 1.5, '081938802138', 'SPESIALIS PULSA 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1020, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180431S-KOKO', 'DP10', 300, 0, 1740, 0, '081938802138', 'SPESIALIS PULSA 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1021, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180432S-KOKO', 'DOMPUL', 140000, 0, 169945900, 1.5, '081959452768', 'princes Cell', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1022, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180433S-KOKO', 'DOMPUL', 2500000, 0, 700000, 1.5, '081939862884', 'SPESIALIS PULSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1023, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180433S-KOKO', 'DP10', 300, 0, 1440, 0, '081939862884', 'SPESIALIS PULSA 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1024, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180434S-KOKO', 'DOMPUL', 1000000, 0, 168945900, 1.5, '081938072746', 'mega cell', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1025, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180434S-KOKO', 'DP10', 50, 0, 51177, 0, '081938072746', 'mega cell', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1026, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180434S-KOKO', 'DP5', 50, 0, 18353, 0, '081938072746', 'mega cell', 'Success', '087702851112', 'JMB-IRAWAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1027, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180435S-KOKO', 'DOMPUL', 750000, 0, 9950000, 1.5, '081703356324', 'TANI CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1028, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180435S-KOKO', 'DP10', 100, 0, 1340, 0, '081703356324', 'TANI CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1029, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180435S-KOKO', 'DP5', 50, 0, 780, 0, '081703356324', 'TANI CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1030, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180436S-KOKO', 'DOMPUL', 750000, 0, 9200000, 1.5, '081935051932', 'TANI MAJU CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1031, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180436S-KOKO', 'DP10', 100, 0, 1240, 0, '081935051932', 'TANI MAJU CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1032, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180436S-KOKO', 'DP5', 50, 0, 730, 0, '081935051932', 'TANI MAJU CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1033, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180437S-KOKO', 'DOMPUL', 8000000, 0, 1200000, 1.5, '081803001631', 'TOP TRONIK 1', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1034, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180438S-KOKO', 'DOMPUL', 8000000, 0, 200000, 1.5, '081938450193', 'TOP TRONIK 2', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1035, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180439S-KOKO', 'DP10', 143, 0, 1097, 0, '081938561817', 'TOP TRONIK 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1036, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180439S-KOKO', 'DP5', 86, 0, 644, 0, '081938561817', 'TOP TRONIK 3', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1037, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180440S-KOKO', 'DP10', 143, 0, 954, 0, '081703930497', 'TOP TRONIK 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1038, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180440S-KOKO', 'DP5', 86, 0, 558, 0, '081703930497', 'TOP TRONIK 5', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1039, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180441S-KOKO', 'DOMPUL', 150000, 0, 6070820, 1.5, '081938063137', 'JAYA CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1040, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180441S-KOKO', 'DP10', 17, 0, 10044, 0, '081938063137', 'JAYA CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1041, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180441S-KOKO', 'DP5', 30, 0, 6457, 0, '081938063137', 'JAYA CELL', 'Success', '087856665455', 'SDA-IMAM HIDAYAT', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1042, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180442S-KOKO', 'DP10', 143, 0, 811, 0, '087858733670', 'TOP TRONIK 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1043, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180442S-KOKO', 'DP5', 86, 0, 472, 0, '087858733670', 'TOP TRONIK 4', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1044, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180443S-KOKO', 'DP10', 143, 0, 668, 0, '087850809522', 'TOP TRONIK 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1045, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180443S-KOKO', 'DP5', 86, 0, 386, 0, '087850809522', 'TOP TRONIK 6', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1046, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180444S-KOKO', 'DP10', 143, 0, 525, 0, '081935060179', 'TOP TRONIK 8', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1047, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180444S-KOKO', 'DP5', 86, 0, 300, 0, '081935060179', 'TOP TRONIK 8', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1048, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180445S-KOKO', 'DOMPUL', 300000, 0, 4793195, 1.5, '081931073079', 'ISTANA CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1049, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180445S-KOKO', 'DP10', 10, 0, 5876, 0, '081931073079', 'ISTANA CELL JOMBANG', 'Success', '087752623999', 'JMB-MIFTACHUR ROZAK', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1050, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180446S-KOKO', 'DP10', 143, 0, 382, 0, '081935060148', 'TOP TRONIK 10', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1051, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180446S-KOKO', 'DP5', 85, 0, 215, 0, '081935060148', 'TOP TRONIK 10', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1052, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180447S-KOKO', 'DP10', 142, 0, 240, 0, '087850809481', 'TOP TRONIK 9', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1053, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180447S-KOKO', 'DP5', 85, 0, 130, 0, '087850809481', 'TOP TRONIK 9', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1054, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180448S-KOKO', 'DOMPUL', 200000, 0, 0, 1.5, '081938452180', 'YENI CELL GEDANGAN', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1055, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180448S-KOKO', 'DP10', 40, 0, 200, 0, '081938452180', 'YENI CELL GEDANGAN', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1056, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180448S-KOKO', 'DP5', 30, 0, 100, 0, '081938452180', 'YENI CELL GEDANGAN', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1057, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180449S-KOKO', 'DOMPUL', 3000000, 0, 0, 1.5, '081913848519', 'GARUDA CELLt', 'Valid', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1058, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180449S-KOKO', 'DP10', 200, 0, 0, 0, '081913848519', 'GARUDA CELLt', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1059, 1, 15, NULL, '081938062640', 'SD ROS SDJ', '2017-03-18', '2018-08-30', 'XL-1703180449S-KOKO', 'DP5', 100, 0, 0, 0, '081913848519', 'GARUDA CELLt', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1060, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180450S-KOKO', 'DOMPUL', 1000000, 0, 5070820, 1.5, '087757029574', 'SALSA CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1061, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180450S-KOKO', 'DP10', 100, 0, 9944, 0, '087757029574', 'SALSA CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1062, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180450S-KOKO', 'DP5', 80, 0, 6377, 0, '087757029574', 'SALSA CELL', 'Success', '085942838872', 'OFFICE', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1063, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180451S-KOKO', 'DP10', 50, 0, 51127, 0, '081938073057', 'Ivan cell', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1064, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180451S-KOKO', 'DP5', 50, 0, 18303, 0, '081938073057', 'Ivan cell', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1065, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180452S-KOKO', 'DP10', 50, 0, 9438, 0, '087750958071', 'TBN ALAM CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1066, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180452S-KOKO', 'DP5', 50, 0, 5059, 0, '087750958071', 'TBN ALAM CELL', 'Success', '087856320444', 'TBN-M.MARZUQUN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1067, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180453S-KOKO', 'DOMPUL', 400000, 0, 4670820, 1.5, '081703231715', 'ARUM CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1068, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180453S-KOKO', 'DP10', 20, 0, 9924, 0, '081703231715', 'ARUM CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1069, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180453S-KOKO', 'DP5', 30, 0, 6347, 0, '081703231715', 'ARUM CELL SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1070, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180454S-KOKO', 'DOMPUL', 100000, 0, 168845900, 1.5, '081938063476', 'ian cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1071, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180454S-KOKO', 'DP5', 10, 0, 18293, 0, '081938063476', 'ian cell', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1072, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180455S-KOKO', 'DOMPUL', 3000000, 0, 1670820, 1.5, '081935060133', 'MEGA CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1073, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180455S-KOKO', 'DP10', 340, 0, 9584, 0, '081935060133', 'MEGA CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1074, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180455S-KOKO', 'DP5', 260, 0, 6087, 0, '081935060133', 'MEGA CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1075, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180456S-KOKO', 'DOMPUL', 100000, 0, 1570820, 1.5, '08170539703', 'D CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1076, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180456S-KOKO', 'DP10', 20, 0, 9564, 0, '08170539703', 'D CELL CANDI', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1077, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180457S-KOKO', 'DOMPUL', 500000, 0, 4293195, 1.5, '081913242273', 'OJIK CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1078, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180457S-KOKO', 'DP10', 50, 0, 5826, 0, '081913242273', 'OJIK CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1079, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180457S-KOKO', 'DP5', 50, 0, 2117, 0, '081913242273', 'OJIK CELL', 'Success', '087703499322', 'JMB-SULIKIN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1080, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180458S-KOKO', 'DOMPUL', 3000000, 0, 8570820, 1.5, '081938802952', '85 KOMUNIKA CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1081, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180458S-KOKO', 'DP10', 320, 0, 9244, 0, '081938802952', '85 KOMUNIKA CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1082, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180458S-KOKO', 'DP5', 190, 0, 5897, 0, '081938802952', '85 KOMUNIKA CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1083, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180459S-KOKO', 'DOMPUL', 4000000, 0, 164845900, 1.5, '081938063424', 'KAYLA 2  CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1084, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180459S-KOKO', 'DP10', 340, 0, 50787, 0, '081938063424', 'KAYLA 2  CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1085, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180459S-KOKO', 'DP5', 220, 0, 18073, 0, '081938063424', 'KAYLA 2  CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1086, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180460S-KOKO', 'DOMPUL', 4000000, 0, 160845900, 1.5, '081938062628', 'YANTI SALON', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1087, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180460S-KOKO', 'DP10', 370, 0, 50417, 0, '081938062628', 'YANTI SALON', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1088, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180460S-KOKO', 'DP5', 260, 0, 17813, 0, '081938062628', 'YANTI SALON', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1089, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180461S-KOKO', 'DOMPUL', 2000000, 0, 158845900, 1.5, '081938062445', 'RR CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1090, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180461S-KOKO', 'DP10', 220, 0, 50197, 0, '081938062445', 'RR CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1091, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180461S-KOKO', 'DP5', 150, 0, 17663, 0, '081938062445', 'RR CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1092, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180462S-KOKO', 'DOMPUL', 4000000, 0, 4570820, 1.5, '081803001816', 'KOYEX CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1093, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180462S-KOKO', 'DP10', 310, 0, 8934, 0, '081803001816', 'KOYEX CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1094, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180462S-KOKO', 'DP5', 220, 0, 5677, 0, '081803001816', 'KOYEX CELL', 'Success', '087702410260', 'OFFICE SDA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1095, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180463S-KOKO', 'DP10', 50, 0, 50147, 0, '081938062514', 'MTS cell', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1096, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180463S-KOKO', 'DP5', 50, 0, 17613, 0, '081938062514', 'MTS cell', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1097, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180464S-KOKO', 'DOMPUL', 100000, 0, 4470820, 1.5, '081938801729', 'ADITYA CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1098, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180464S-KOKO', 'DP10', 10, 0, 8924, 0, '081938801729', 'ADITYA CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1099, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180464S-KOKO', 'DP5', 10, 0, 5667, 0, '081938801729', 'ADITYA CELL', 'Success', '083832555495', 'SDA-CANDRA', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1100, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180465S-KOKO', 'DOMPUL', 200000, 0, 3150770, 1.5, '087856230245', 'BINTANG CELL', 'Success', '087701029091', 'LMG-EKO WAHYU', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1101, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180465S-KOKO', 'DP10', 20, 0, 9418, 0, '087856230245', 'BINTANG CELL', 'Success', '087701029091', 'LMG-EKO WAHYU', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1102, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180465S-KOKO', 'DP5', 20, 0, 5039, 0, '087856230245', 'BINTANG CELL', 'Success', '087701029091', 'LMG-EKO WAHYU', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1103, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180466S-KOKO', 'DOMPUL', 600000, 0, 3693195, 1.5, '081939870067', 'ELUCKY CELL', 'Success', '081938882277', 'MJK-DONY INDARKO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1104, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180467S-KOKO', 'DOMPUL', 600000, 0, 3870820, 1.5, '08175103376', 'ECHA TONE GEDANGAN', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1105, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180468S-KOKO', 'DOMPUL', 300000, 0, 3570820, 1.5, '085931398206', 'LOVARINA CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1106, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180468S-KOKO', 'DP10', 20, 0, 8904, 0, '085931398206', 'LOVARINA CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1107, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180468S-KOKO', 'DP5', 15, 0, 5652, 0, '085931398206', 'LOVARINA CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1108, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180469S-KOKO', 'DOMPUL', 1400000, 0, 157445900, 1.5, '081938072950', 'indopart', 'Success', '083856929617', 'BJG-PUJIHANTO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1109, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180470S-KOKO', 'DOMPUL', 500000, 0, 2650770, 1.5, '081949640866', 'GRK SNOW GIRLS', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1110, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180470S-KOKO', 'DP10', 40, 0, 9378, 0, '081949640866', 'GRK SNOW GIRLS', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1111, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180470S-KOKO', 'DP5', 50, 0, 4989, 0, '081949640866', 'GRK SNOW GIRLS', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1112, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180471S-KOKO', 'DOMPUL', 1000000, 0, 1650770, 1.5, '087856099066', 'ELJE JAYA CELL', 'Success', '087856344433', 'TBN-ANDRI SAPUTRA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1113, 1, 15, NULL, '081938062641', 'SD SIDOARJO', '2017-03-18', '2018-08-30', 'XL-1703180472S-KOKO', 'DP10', 20, 0, 8884, 0, '081938452372', 'KEMBAR CLC CELL', 'Success', '087701111860', 'SDA-DIDIK ANDRIANTO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1114, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180295S-KOKO', 'DP10', 5, 0, 50142, 0, '081938063459', 'aladin Cell 3', 'Success', '087702851112', 'JMB-IRAWAN', '1', NULL, 'Tunai', 'CVS', 10650, 1, 0, 0),
(1115, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180295S-KOKO', 'DP5', 10, 0, 17603, 0, '081938063459', 'aladin Cell 3', 'Success', '087702851112', 'JMB-IRAWAN', '1', NULL, 'Tunai', 'CVS', 5650, 1, 0, 0),
(1116, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180473S-KOKO', 'DOMPUL', 300000, 0, 157145900, 1.5, '081959452744', 'hai cell', 'Success', '087701112509', 'GRK-FENDI PURNOMO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1117, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180474S-KOKO', 'DOMPUL', 1000000, 0, 2693195, 1.5, '081935053244', 'ANANDA CELL 2', 'Success', '087753251616', 'MJK-SUNAN', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1118, 1, 15, NULL, '081938062644', 'SD TUBAN', '2017-03-18', '2018-08-30', 'XL-1703180475S-KOKO', 'DOMPUL', 1000000, 0, 650770, 1.5, '087856560611', 'GRK INDO CELL', 'Success', '087753094222', 'GRK-HANIF ASHAR', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1119, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180476S-KOKO', 'DOMPUL', 100000, 0, 2593195, 1.5, '081913120336', 'WAWANG CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1120, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180476S-KOKO', 'DP10', 10, 0, 5816, 0, '081913120336', 'WAWANG CELL', 'Success', '087702406667', 'MJK-PUJI KARYONO', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1121, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180477S-KOKO', 'DOMPUL', 100000, 0, 157045900, 1.5, '081938063480', 'THE MAX 3', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1122, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180477S-KOKO', 'DP10', 7, 0, 50135, 0, '081938063480', 'THE MAX 3', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1123, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180477S-KOKO', 'DP5', 7, 0, 17596, 0, '081938063480', 'THE MAX 3', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1124, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180478S-KOKO', 'DOMPUL', 100000, 0, 156945900, 1.5, '081938062614', 'THE MAX SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0),
(1125, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180478S-KOKO', 'DP10', 7, 0, 50128, 0, '081938062614', 'THE MAX SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 10650, 1, 0, 0),
(1126, 1, 15, NULL, '081938063309', 'MD', '2017-03-18', '2018-08-30', 'XL-1703180478S-KOKO', 'DP5', 10, 0, 17586, 0, '081938062614', 'THE MAX SEDATI', 'Success', '087701111762', 'SDA-KESUMA RESHI', '1', 'False', 'Tunai', 'CVS', 5650, 1, 0, 0),
(1127, 1, 15, NULL, '081938062642', 'SD MJK-JMB', '2017-03-18', '2018-08-30', 'XL-1703180479S-KOKO', 'DOMPUL', 200000, 0, 2393195, 1.5, '081913120283', 'TRANS CELL', 'Success', '087701342666', 'MJK-TOMMY WIJAYA', '1', 'False', 'Tunai', 'CVS', 0.985, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_bo` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_lokasi`, `id_bo`, `username`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 15, 14, 'admin', 'Administrator', 'admin@admin.com', '$2y$10$j99elUo.VcPbYWIXpS0fg.8DtX6aFwhXbmC0uSBoeiSi/R.bbRbXW', NULL, '2018-08-29 18:44:58', '2018-08-29 18:44:58');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_bap`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_bap` (
`id_spkpb` int(10) unsigned
,`id_pb` varchar(191)
,`id_pbb` varchar(191)
,`tgl_spkpb` date
,`ukuran_karoseri` varchar(191)
,`harga_borongan` double
,`keterangan_spkpb` text
,`status_spkpb` varchar(191)
,`status_print` varchar(191)
,`tanggal_print` date
,`vote_spkpb` tinyint(4)
,`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_pb` varchar(191)
,`jenis_pb` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_gudang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_gudang` (
`id_gudang` int(10) unsigned
,`nm_lokasi` varchar(191)
,`alamat_gudang` varchar(191)
,`status` tinyint(4)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kasbon`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kasbon` (
`id_spkpb` int(10) unsigned
,`id_pb` varchar(191)
,`id_pbb` varchar(191)
,`tgl_spkpb` date
,`ukuran_karoseri` varchar(191)
,`harga_borongan` double
,`keterangan_spkpb` text
,`status_spkpb` varchar(191)
,`vote_spkpb` tinyint(4)
,`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_pb` varchar(191)
,`jenis_pb` varchar(191)
,`id_kasbon` int(10) unsigned
,`tgl_kasbon` date
,`nm_kasbon` varchar(191)
,`jumlah_kasbon` double
,`sisa_borongan` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pbb`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pbb` (
`id_pbb` int(10) unsigned
,`id_spkpb` varchar(191)
,`totalharga_material` double
,`tgl_pbb` timestamp
,`pemohon` varchar(191)
,`statuspbb` varchar(191)
,`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_cust` varchar(191)
,`jabatan` varchar(191)
,`alamat_cust` varchar(191)
,`keterangan` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_produksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_produksi` (
`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`id_produksi` int(10) unsigned
,`kode_produksi` varchar(191)
,`tgl_akhir` datetime
,`status_produksi` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_progress_unit`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_progress_unit` (
`id_spkpb` int(10) unsigned
,`id_pb` varchar(191)
,`id_pbb` varchar(191)
,`tgl_spkpb` date
,`ukuran_karoseri` varchar(191)
,`harga_borongan` double
,`keterangan_spkpb` text
,`status_spkpb` varchar(191)
,`vote_spkpb` tinyint(4)
,`vote_qc` tinyint(4)
,`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_pb` varchar(191)
,`jenis_pb` varchar(191)
,`sisa_borongan` double
,`nm_spv` varchar(191)
,`nm_cust` varchar(191)
,`id_qcpb` int(10) unsigned
,`tgl_pengerjaan` date
,`tgl_progress` datetime
,`tgl_selesai` date
,`jenis_pekerjaan` text
,`keterangan` text
,`persentase` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_sj`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_sj` (
`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_cust` varchar(191)
,`id_produksi` int(10) unsigned
,`kode_produksi` varchar(191)
,`tgl_mulai` date
,`tgl_akhir` datetime
,`status_produksi` varchar(191)
,`status_print_sj` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_spkc`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_spkc` (
`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_cust` varchar(191)
,`jabatan` varchar(191)
,`alamat_cust` varchar(191)
,`keterangan` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_spkpb`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_spkpb` (
`id_spkpb` int(10) unsigned
,`id_pb` varchar(191)
,`id_pbb` varchar(191)
,`tgl_spkpb` date
,`ukuran_karoseri` varchar(191)
,`harga_borongan` double
,`keterangan_spkpb` text
,`status_spkpb` varchar(191)
,`vote_spkpb` tinyint(4)
,`vote_qc` tinyint(4)
,`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_pb` varchar(191)
,`jenis_pb` varchar(191)
,`sisa_borongan` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_wo`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_wo` (
`id_spkc` int(10) unsigned
,`id_cust` varchar(191)
,`id_cb` varchar(191)
,`id_spv` varchar(191)
,`nm_perusahaan` varchar(191)
,`jenis_karoseri` varchar(191)
,`jumlah_unit` int(11)
,`harga_unit` double
,`ppn` double
,`harga_total` double
,`dokumen` varchar(191)
,`ket` text
,`tanggal` date
,`status` varchar(191)
,`statuswo` varchar(191)
,`vote` tinyint(4)
,`nm_cust` varchar(191)
,`jabatan` varchar(191)
,`alamat_cust` varchar(191)
,`nm_spv` varchar(191)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_bap`
--
DROP TABLE IF EXISTS `view_bap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bap`  AS  select `spkpbs`.`id_spkpb` AS `id_spkpb`,`spkpbs`.`id_pb` AS `id_pb`,`spkpbs`.`id_pbb` AS `id_pbb`,`spkpbs`.`tgl_spkpb` AS `tgl_spkpb`,`spkpbs`.`ukuran_karoseri` AS `ukuran_karoseri`,`spkpbs`.`harga_borongan` AS `harga_borongan`,`spkpbs`.`keterangan_spkpb` AS `keterangan_spkpb`,`spkpbs`.`status_spkpb` AS `status_spkpb`,`spkpbs`.`status_print` AS `status_print`,`spkpbs`.`tanggal_print` AS `tanggal_print`,`spkpbs`.`vote_spkpb` AS `vote_spkpb`,`spkcs`.`id_spkc` AS `id_spkc`,`spkcs`.`id_cust` AS `id_cust`,`spkcs`.`id_cb` AS `id_cb`,`spkcs`.`id_spv` AS `id_spv`,`spkcs`.`nm_perusahaan` AS `nm_perusahaan`,`spkcs`.`jenis_karoseri` AS `jenis_karoseri`,`spkcs`.`jumlah_unit` AS `jumlah_unit`,`spkcs`.`harga_unit` AS `harga_unit`,`spkcs`.`ppn` AS `ppn`,`spkcs`.`harga_total` AS `harga_total`,`spkcs`.`dokumen` AS `dokumen`,`spkcs`.`ket` AS `ket`,`spkcs`.`tanggal` AS `tanggal`,`spkcs`.`status` AS `status`,`spkcs`.`statuswo` AS `statuswo`,`spkcs`.`vote` AS `vote`,`master_pemborongs`.`nm_pb` AS `nm_pb`,`master_pemborongs`.`jenis_pb` AS `jenis_pb` from ((`spkpbs` join `spkcs` on(`spkcs`.`id_spkc` = `spkpbs`.`id_spkc`)) join `master_pemborongs` on(`master_pemborongs`.`id_pb` = `spkpbs`.`id_pb`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_gudang`
--
DROP TABLE IF EXISTS `view_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gudang`  AS  select `master_gudangs`.`id_gudang` AS `id_gudang`,`master_lokasis`.`nm_lokasi` AS `nm_lokasi`,`master_gudangs`.`alamat_gudang` AS `alamat_gudang`,`master_gudangs`.`status` AS `status` from (`master_gudangs` join `master_lokasis` on(`master_gudangs`.`id_lokasi` = `master_lokasis`.`id_lokasi`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kasbon`
--
DROP TABLE IF EXISTS `view_kasbon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kasbon`  AS  select `spkpbs`.`id_spkpb` AS `id_spkpb`,`spkpbs`.`id_pb` AS `id_pb`,`spkpbs`.`id_pbb` AS `id_pbb`,`spkpbs`.`tgl_spkpb` AS `tgl_spkpb`,`spkpbs`.`ukuran_karoseri` AS `ukuran_karoseri`,`spkpbs`.`harga_borongan` AS `harga_borongan`,`spkpbs`.`keterangan_spkpb` AS `keterangan_spkpb`,`spkpbs`.`status_spkpb` AS `status_spkpb`,`spkpbs`.`vote_spkpb` AS `vote_spkpb`,`spkcs`.`id_spkc` AS `id_spkc`,`spkcs`.`id_cust` AS `id_cust`,`spkcs`.`id_cb` AS `id_cb`,`spkcs`.`id_spv` AS `id_spv`,`spkcs`.`nm_perusahaan` AS `nm_perusahaan`,`spkcs`.`jenis_karoseri` AS `jenis_karoseri`,`spkcs`.`jumlah_unit` AS `jumlah_unit`,`spkcs`.`harga_unit` AS `harga_unit`,`spkcs`.`ppn` AS `ppn`,`spkcs`.`harga_total` AS `harga_total`,`spkcs`.`dokumen` AS `dokumen`,`spkcs`.`ket` AS `ket`,`spkcs`.`tanggal` AS `tanggal`,`spkcs`.`status` AS `status`,`spkcs`.`statuswo` AS `statuswo`,`spkcs`.`vote` AS `vote`,`master_pemborongs`.`nm_pb` AS `nm_pb`,`master_pemborongs`.`jenis_pb` AS `jenis_pb`,`kasbon_tabels`.`id_kasbon` AS `id_kasbon`,`kasbon_tabels`.`tgl_kasbon` AS `tgl_kasbon`,`kasbon_tabels`.`nm_kasbon` AS `nm_kasbon`,`kasbon_tabels`.`jumlah_kasbon` AS `jumlah_kasbon`,`kasbon_tabels`.`sisa_borongan` AS `sisa_borongan` from (((`spkpbs` join `spkcs` on(`spkcs`.`id_spkc` = `spkpbs`.`id_spkc`)) join `master_pemborongs` on(`master_pemborongs`.`id_pb` = `spkpbs`.`id_pb`)) join `kasbon_tabels` on(`kasbon_tabels`.`id_spkpb` = `spkpbs`.`id_spkpb`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pbb`
--
DROP TABLE IF EXISTS `view_pbb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pbb`  AS  select `pbb_tabels`.`id_pbb` AS `id_pbb`,`pbb_tabels`.`id_spkpb` AS `id_spkpb`,`pbb_tabels`.`totalharga_material` AS `totalharga_material`,`pbb_tabels`.`tgl_pbb` AS `tgl_pbb`,`pbb_tabels`.`pemohon` AS `pemohon`,`pbb_tabels`.`status` AS `statuspbb`,`view_spkc`.`id_spkc` AS `id_spkc`,`view_spkc`.`id_cust` AS `id_cust`,`view_spkc`.`id_cb` AS `id_cb`,`view_spkc`.`id_spv` AS `id_spv`,`view_spkc`.`nm_perusahaan` AS `nm_perusahaan`,`view_spkc`.`jenis_karoseri` AS `jenis_karoseri`,`view_spkc`.`jumlah_unit` AS `jumlah_unit`,`view_spkc`.`harga_unit` AS `harga_unit`,`view_spkc`.`ppn` AS `ppn`,`view_spkc`.`harga_total` AS `harga_total`,`view_spkc`.`dokumen` AS `dokumen`,`view_spkc`.`ket` AS `ket`,`view_spkc`.`tanggal` AS `tanggal`,`view_spkc`.`status` AS `status`,`view_spkc`.`statuswo` AS `statuswo`,`view_spkc`.`vote` AS `vote`,`view_spkc`.`nm_cust` AS `nm_cust`,`view_spkc`.`jabatan` AS `jabatan`,`view_spkc`.`alamat_cust` AS `alamat_cust`,`view_spkc`.`keterangan` AS `keterangan` from (`pbb_tabels` join `view_spkc` on(`pbb_tabels`.`id_wo` = `view_spkc`.`id_spkc`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_produksi`
--
DROP TABLE IF EXISTS `view_produksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produksi`  AS  select `spkcs`.`id_spkc` AS `id_spkc`,`spkcs`.`id_cust` AS `id_cust`,`spkcs`.`id_cb` AS `id_cb`,`spkcs`.`id_spv` AS `id_spv`,`spkcs`.`nm_perusahaan` AS `nm_perusahaan`,`spkcs`.`jenis_karoseri` AS `jenis_karoseri`,`spkcs`.`jumlah_unit` AS `jumlah_unit`,`spkcs`.`harga_unit` AS `harga_unit`,`spkcs`.`ppn` AS `ppn`,`spkcs`.`harga_total` AS `harga_total`,`spkcs`.`dokumen` AS `dokumen`,`spkcs`.`ket` AS `ket`,`spkcs`.`tanggal` AS `tanggal`,`spkcs`.`status` AS `status`,`spkcs`.`statuswo` AS `statuswo`,`spkcs`.`vote` AS `vote`,`produksi_tabels`.`id_produksi` AS `id_produksi`,`produksi_tabels`.`kode_produksi` AS `kode_produksi`,`produksi_tabels`.`tgl_akhir` AS `tgl_akhir`,`produksi_tabels`.`status_produksi` AS `status_produksi` from (`spkcs` join `produksi_tabels` on(`spkcs`.`id_spkc` = `produksi_tabels`.`id_spkc`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_progress_unit`
--
DROP TABLE IF EXISTS `view_progress_unit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_progress_unit`  AS  select `view_spkpb`.`id_spkpb` AS `id_spkpb`,`view_spkpb`.`id_pb` AS `id_pb`,`view_spkpb`.`id_pbb` AS `id_pbb`,`view_spkpb`.`tgl_spkpb` AS `tgl_spkpb`,`view_spkpb`.`ukuran_karoseri` AS `ukuran_karoseri`,`view_spkpb`.`harga_borongan` AS `harga_borongan`,`view_spkpb`.`keterangan_spkpb` AS `keterangan_spkpb`,`view_spkpb`.`status_spkpb` AS `status_spkpb`,`view_spkpb`.`vote_spkpb` AS `vote_spkpb`,`view_spkpb`.`vote_qc` AS `vote_qc`,`view_spkpb`.`id_spkc` AS `id_spkc`,`view_spkpb`.`id_cust` AS `id_cust`,`view_spkpb`.`id_cb` AS `id_cb`,`view_spkpb`.`id_spv` AS `id_spv`,`view_spkpb`.`nm_perusahaan` AS `nm_perusahaan`,`view_spkpb`.`jenis_karoseri` AS `jenis_karoseri`,`view_spkpb`.`jumlah_unit` AS `jumlah_unit`,`view_spkpb`.`harga_unit` AS `harga_unit`,`view_spkpb`.`ppn` AS `ppn`,`view_spkpb`.`harga_total` AS `harga_total`,`view_spkpb`.`dokumen` AS `dokumen`,`view_spkpb`.`ket` AS `ket`,`view_spkpb`.`tanggal` AS `tanggal`,`view_spkpb`.`status` AS `status`,`view_spkpb`.`statuswo` AS `statuswo`,`view_spkpb`.`vote` AS `vote`,`view_spkpb`.`nm_pb` AS `nm_pb`,`view_spkpb`.`jenis_pb` AS `jenis_pb`,`view_spkpb`.`sisa_borongan` AS `sisa_borongan`,`master_supervisors`.`nm_spv` AS `nm_spv`,`master_customers`.`nm_cust` AS `nm_cust`,`qcpb_tabels`.`id_qcpb` AS `id_qcpb`,`qcpb_tabels`.`tgl_pengerjaan` AS `tgl_pengerjaan`,`qcpb_tabels`.`tgl_progress` AS `tgl_progress`,`qcpb_tabels`.`tgl_selesai` AS `tgl_selesai`,`qcpb_tabels`.`jenis_pekerjaan` AS `jenis_pekerjaan`,`qcpb_tabels`.`keterangan` AS `keterangan`,`qcpb_tabels`.`persentase` AS `persentase` from (((`view_spkpb` join `qcpb_tabels` on(`qcpb_tabels`.`id_spkpb` = `view_spkpb`.`id_spkpb`)) join `master_customers` on(`master_customers`.`id_cust` = `view_spkpb`.`id_cust`)) join `master_supervisors` on(`master_supervisors`.`id_spv` = `view_spkpb`.`id_spv`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_sj`
--
DROP TABLE IF EXISTS `view_sj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sj`  AS  select `spkcs`.`id_spkc` AS `id_spkc`,`spkcs`.`id_cust` AS `id_cust`,`spkcs`.`id_cb` AS `id_cb`,`spkcs`.`id_spv` AS `id_spv`,`spkcs`.`nm_perusahaan` AS `nm_perusahaan`,`spkcs`.`jenis_karoseri` AS `jenis_karoseri`,`spkcs`.`jumlah_unit` AS `jumlah_unit`,`spkcs`.`harga_unit` AS `harga_unit`,`spkcs`.`ppn` AS `ppn`,`spkcs`.`harga_total` AS `harga_total`,`spkcs`.`dokumen` AS `dokumen`,`spkcs`.`ket` AS `ket`,`spkcs`.`tanggal` AS `tanggal`,`spkcs`.`status` AS `status`,`spkcs`.`statuswo` AS `statuswo`,`spkcs`.`vote` AS `vote`,`master_customers`.`nm_cust` AS `nm_cust`,`produksi_tabels`.`id_produksi` AS `id_produksi`,`produksi_tabels`.`kode_produksi` AS `kode_produksi`,`produksi_tabels`.`tgl_mulai` AS `tgl_mulai`,`produksi_tabels`.`tgl_akhir` AS `tgl_akhir`,`produksi_tabels`.`status_produksi` AS `status_produksi`,`produksi_tabels`.`status_print_sj` AS `status_print_sj` from ((`spkcs` join `produksi_tabels` on(`spkcs`.`id_spkc` = `produksi_tabels`.`id_spkc`)) left join `master_customers` on(`spkcs`.`id_cust` = `master_customers`.`id_cust`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_spkc`
--
DROP TABLE IF EXISTS `view_spkc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_spkc`  AS  select `spkcs`.`id_spkc` AS `id_spkc`,`spkcs`.`id_cust` AS `id_cust`,`spkcs`.`id_cb` AS `id_cb`,`spkcs`.`id_spv` AS `id_spv`,`spkcs`.`nm_perusahaan` AS `nm_perusahaan`,`spkcs`.`jenis_karoseri` AS `jenis_karoseri`,`spkcs`.`jumlah_unit` AS `jumlah_unit`,`spkcs`.`harga_unit` AS `harga_unit`,`spkcs`.`ppn` AS `ppn`,`spkcs`.`harga_total` AS `harga_total`,`spkcs`.`dokumen` AS `dokumen`,`spkcs`.`ket` AS `ket`,`spkcs`.`tanggal` AS `tanggal`,`spkcs`.`status` AS `status`,`spkcs`.`statuswo` AS `statuswo`,`spkcs`.`vote` AS `vote`,`master_customers`.`nm_cust` AS `nm_cust`,`master_customers`.`jabatan` AS `jabatan`,`master_customers`.`alamat_cust` AS `alamat_cust`,`cara_bayars`.`keterangan` AS `keterangan` from ((`spkcs` join `master_customers` on(`spkcs`.`id_cust` = `master_customers`.`id_cust`)) join `cara_bayars` on(`spkcs`.`id_cb` = `cara_bayars`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_spkpb`
--
DROP TABLE IF EXISTS `view_spkpb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_spkpb`  AS  select `spkpbs`.`id_spkpb` AS `id_spkpb`,`spkpbs`.`id_pb` AS `id_pb`,`spkpbs`.`id_pbb` AS `id_pbb`,`spkpbs`.`tgl_spkpb` AS `tgl_spkpb`,`spkpbs`.`ukuran_karoseri` AS `ukuran_karoseri`,`spkpbs`.`harga_borongan` AS `harga_borongan`,`spkpbs`.`keterangan_spkpb` AS `keterangan_spkpb`,`spkpbs`.`status_spkpb` AS `status_spkpb`,`spkpbs`.`vote_spkpb` AS `vote_spkpb`,`spkpbs`.`vote_qc` AS `vote_qc`,`spkcs`.`id_spkc` AS `id_spkc`,`spkcs`.`id_cust` AS `id_cust`,`spkcs`.`id_cb` AS `id_cb`,`spkcs`.`id_spv` AS `id_spv`,`spkcs`.`nm_perusahaan` AS `nm_perusahaan`,`spkcs`.`jenis_karoseri` AS `jenis_karoseri`,`spkcs`.`jumlah_unit` AS `jumlah_unit`,`spkcs`.`harga_unit` AS `harga_unit`,`spkcs`.`ppn` AS `ppn`,`spkcs`.`harga_total` AS `harga_total`,`spkcs`.`dokumen` AS `dokumen`,`spkcs`.`ket` AS `ket`,`spkcs`.`tanggal` AS `tanggal`,`spkcs`.`status` AS `status`,`spkcs`.`statuswo` AS `statuswo`,`spkcs`.`vote` AS `vote`,`master_pemborongs`.`nm_pb` AS `nm_pb`,`master_pemborongs`.`jenis_pb` AS `jenis_pb`,`kasbon_tabels`.`sisa_borongan` AS `sisa_borongan` from (((`spkpbs` join `spkcs` on(`spkcs`.`id_spkc` = `spkpbs`.`id_spkc`)) join `master_pemborongs` on(`master_pemborongs`.`id_pb` = `spkpbs`.`id_pb`)) left join `kasbon_tabels` on(`spkpbs`.`id_spkpb` = `kasbon_tabels`.`id_spkpb`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_wo`
--
DROP TABLE IF EXISTS `view_wo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_wo`  AS  select `spkcs`.`id_spkc` AS `id_spkc`,`spkcs`.`id_cust` AS `id_cust`,`spkcs`.`id_cb` AS `id_cb`,`spkcs`.`id_spv` AS `id_spv`,`spkcs`.`nm_perusahaan` AS `nm_perusahaan`,`spkcs`.`jenis_karoseri` AS `jenis_karoseri`,`spkcs`.`jumlah_unit` AS `jumlah_unit`,`spkcs`.`harga_unit` AS `harga_unit`,`spkcs`.`ppn` AS `ppn`,`spkcs`.`harga_total` AS `harga_total`,`spkcs`.`dokumen` AS `dokumen`,`spkcs`.`ket` AS `ket`,`spkcs`.`tanggal` AS `tanggal`,`spkcs`.`status` AS `status`,`spkcs`.`statuswo` AS `statuswo`,`spkcs`.`vote` AS `vote`,`master_customers`.`nm_cust` AS `nm_cust`,`master_customers`.`jabatan` AS `jabatan`,`master_customers`.`alamat_cust` AS `alamat_cust`,`master_supervisors`.`nm_spv` AS `nm_spv` from ((`spkcs` join `master_customers` on(`spkcs`.`id_cust` = `master_customers`.`id_cust`)) join `master_supervisors` on(`spkcs`.`id_spv` = `master_supervisors`.`id_spv`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bos`
--
ALTER TABLE `bos`
  ADD PRIMARY KEY (`id_bo`);

--
-- Indeks untuk tabel `cara_bayars`
--
ALTER TABLE `cara_bayars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pembayaran_pembelian_dompuls`
--
ALTER TABLE `detail_pembayaran_pembelian_dompuls`
  ADD PRIMARY KEY (`id_detail_pembayaran_dompul`);

--
-- Indeks untuk tabel `detail_pembayaran_pembelian_sps`
--
ALTER TABLE `detail_pembayaran_pembelian_sps`
  ADD PRIMARY KEY (`id_detail_pembayaran_psp`);

--
-- Indeks untuk tabel `detail_pembayaran_sps`
--
ALTER TABLE `detail_pembayaran_sps`
  ADD PRIMARY KEY (`id_detail_pembayaran_sp`);

--
-- Indeks untuk tabel `detail_pembelian_dompuls`
--
ALTER TABLE `detail_pembelian_dompuls`
  ADD PRIMARY KEY (`id_detail_pembelian_dompul`);

--
-- Indeks untuk tabel `detail_pembelian_sps`
--
ALTER TABLE `detail_pembelian_sps`
  ADD PRIMARY KEY (`id_detail_pembelian_sp`);

--
-- Indeks untuk tabel `detail_penjualan_dompuls`
--
ALTER TABLE `detail_penjualan_dompuls`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indeks untuk tabel `detail_penjualan_sps`
--
ALTER TABLE `detail_penjualan_sps`
  ADD PRIMARY KEY (`id_detail_penjualan_sp`);

--
-- Indeks untuk tabel `hos`
--
ALTER TABLE `hos`
  ADD PRIMARY KEY (`id_ho`);

--
-- Indeks untuk tabel `kartu_stok_dompuls`
--
ALTER TABLE `kartu_stok_dompuls`
  ADD PRIMARY KEY (`id_stok_dompul`);

--
-- Indeks untuk tabel `kartu_stok_sps`
--
ALTER TABLE `kartu_stok_sps`
  ADD PRIMARY KEY (`id_stok_sp`);

--
-- Indeks untuk tabel `kasbon_tabels`
--
ALTER TABLE `kasbon_tabels`
  ADD PRIMARY KEY (`id_kasbon`);

--
-- Indeks untuk tabel `master_banks`
--
ALTER TABLE `master_banks`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `master_customers`
--
ALTER TABLE `master_customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `master_dompuls`
--
ALTER TABLE `master_dompuls`
  ADD PRIMARY KEY (`id_dompul`);

--
-- Indeks untuk tabel `master_gudangs`
--
ALTER TABLE `master_gudangs`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indeks untuk tabel `master_harga_dompuls`
--
ALTER TABLE `master_harga_dompuls`
  ADD PRIMARY KEY (`id_harga_dompul`);

--
-- Indeks untuk tabel `master_harga_sp`
--
ALTER TABLE `master_harga_sp`
  ADD PRIMARY KEY (`id_harga_sp`);

--
-- Indeks untuk tabel `master_lokasis`
--
ALTER TABLE `master_lokasis`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `master_pemborongs`
--
ALTER TABLE `master_pemborongs`
  ADD PRIMARY KEY (`id_pb`);

--
-- Indeks untuk tabel `master_ppns`
--
ALTER TABLE `master_ppns`
  ADD PRIMARY KEY (`id_ppn`);

--
-- Indeks untuk tabel `master_produks`
--
ALTER TABLE `master_produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `master_saless`
--
ALTER TABLE `master_saless`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indeks untuk tabel `master_satuans`
--
ALTER TABLE `master_satuans`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `master_supervisors`
--
ALTER TABLE `master_supervisors`
  ADD PRIMARY KEY (`id_spv`);

--
-- Indeks untuk tabel `master_suppliers`
--
ALTER TABLE `master_suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `master_tipe_dompul`
--
ALTER TABLE `master_tipe_dompul`
  ADD PRIMARY KEY (`id_tipe_dompul`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pbb_details`
--
ALTER TABLE `pbb_details`
  ADD PRIMARY KEY (`id_detailpbb`);

--
-- Indeks untuk tabel `pbb_tabels`
--
ALTER TABLE `pbb_tabels`
  ADD PRIMARY KEY (`id_pbb`);

--
-- Indeks untuk tabel `pembayaran_penjualan_dompuls`
--
ALTER TABLE `pembayaran_penjualan_dompuls`
  ADD PRIMARY KEY (`id_pembayaran_penjualan_dompul`);

--
-- Indeks untuk tabel `pembayaran_penjualan_sps`
--
ALTER TABLE `pembayaran_penjualan_sps`
  ADD PRIMARY KEY (`id_pembayaran_penjualan_sp`);

--
-- Indeks untuk tabel `pembelian_dompuls`
--
ALTER TABLE `pembelian_dompuls`
  ADD PRIMARY KEY (`id_pembelian_dompul`);

--
-- Indeks untuk tabel `pembelian_sps`
--
ALTER TABLE `pembelian_sps`
  ADD PRIMARY KEY (`id_pembelian_sp`);

--
-- Indeks untuk tabel `penawarans`
--
ALTER TABLE `penawarans`
  ADD UNIQUE KEY `penawarans_id_penawaran_unique` (`id_penawaran`);

--
-- Indeks untuk tabel `penjualan_dompuls`
--
ALTER TABLE `penjualan_dompuls`
  ADD PRIMARY KEY (`id_penjualan_dompul`);

--
-- Indeks untuk tabel `penjualan_sps`
--
ALTER TABLE `penjualan_sps`
  ADD PRIMARY KEY (`id_penjualan_sp`);

--
-- Indeks untuk tabel `produksi_details`
--
ALTER TABLE `produksi_details`
  ADD PRIMARY KEY (`id_detailproduksi`);

--
-- Indeks untuk tabel `produksi_tabels`
--
ALTER TABLE `produksi_tabels`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indeks untuk tabel `qcpb_tabels`
--
ALTER TABLE `qcpb_tabels`
  ADD PRIMARY KEY (`id_qcpb`);

--
-- Indeks untuk tabel `spkcs`
--
ALTER TABLE `spkcs`
  ADD PRIMARY KEY (`id_spkc`);

--
-- Indeks untuk tabel `spkpbs`
--
ALTER TABLE `spkpbs`
  ADD PRIMARY KEY (`id_spkpb`);

--
-- Indeks untuk tabel `surat_jalan_tabels`
--
ALTER TABLE `surat_jalan_tabels`
  ADD PRIMARY KEY (`id_sj`);

--
-- Indeks untuk tabel `upload_dompuls`
--
ALTER TABLE `upload_dompuls`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bos`
--
ALTER TABLE `bos`
  MODIFY `id_bo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `cara_bayars`
--
ALTER TABLE `cara_bayars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pembayaran_pembelian_dompuls`
--
ALTER TABLE `detail_pembayaran_pembelian_dompuls`
  MODIFY `id_detail_pembayaran_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_pembayaran_pembelian_sps`
--
ALTER TABLE `detail_pembayaran_pembelian_sps`
  MODIFY `id_detail_pembayaran_psp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pembayaran_sps`
--
ALTER TABLE `detail_pembayaran_sps`
  MODIFY `id_detail_pembayaran_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian_dompuls`
--
ALTER TABLE `detail_pembelian_dompuls`
  MODIFY `id_detail_pembelian_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian_sps`
--
ALTER TABLE `detail_pembelian_sps`
  MODIFY `id_detail_pembelian_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan_dompuls`
--
ALTER TABLE `detail_penjualan_dompuls`
  MODIFY `id_detail_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan_sps`
--
ALTER TABLE `detail_penjualan_sps`
  MODIFY `id_detail_penjualan_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hos`
--
ALTER TABLE `hos`
  MODIFY `id_ho` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kartu_stok_dompuls`
--
ALTER TABLE `kartu_stok_dompuls`
  MODIFY `id_stok_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kartu_stok_sps`
--
ALTER TABLE `kartu_stok_sps`
  MODIFY `id_stok_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasbon_tabels`
--
ALTER TABLE `kasbon_tabels`
  MODIFY `id_kasbon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_banks`
--
ALTER TABLE `master_banks`
  MODIFY `id_bank` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `master_customers`
--
ALTER TABLE `master_customers`
  MODIFY `id_cust` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT untuk tabel `master_dompuls`
--
ALTER TABLE `master_dompuls`
  MODIFY `id_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `master_gudangs`
--
ALTER TABLE `master_gudangs`
  MODIFY `id_gudang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `master_harga_dompuls`
--
ALTER TABLE `master_harga_dompuls`
  MODIFY `id_harga_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `master_harga_sp`
--
ALTER TABLE `master_harga_sp`
  MODIFY `id_harga_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `master_lokasis`
--
ALTER TABLE `master_lokasis`
  MODIFY `id_lokasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `master_pemborongs`
--
ALTER TABLE `master_pemborongs`
  MODIFY `id_pb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_ppns`
--
ALTER TABLE `master_ppns`
  MODIFY `id_ppn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_produks`
--
ALTER TABLE `master_produks`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `master_saless`
--
ALTER TABLE `master_saless`
  MODIFY `id_sales` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `master_satuans`
--
ALTER TABLE `master_satuans`
  MODIFY `id_satuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_supervisors`
--
ALTER TABLE `master_supervisors`
  MODIFY `id_spv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_suppliers`
--
ALTER TABLE `master_suppliers`
  MODIFY `id_supplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_tipe_dompul`
--
ALTER TABLE `master_tipe_dompul`
  MODIFY `id_tipe_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `pbb_details`
--
ALTER TABLE `pbb_details`
  MODIFY `id_detailpbb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pbb_tabels`
--
ALTER TABLE `pbb_tabels`
  MODIFY `id_pbb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_penjualan_dompuls`
--
ALTER TABLE `pembayaran_penjualan_dompuls`
  MODIFY `id_pembayaran_penjualan_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_penjualan_sps`
--
ALTER TABLE `pembayaran_penjualan_sps`
  MODIFY `id_pembayaran_penjualan_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_dompuls`
--
ALTER TABLE `pembelian_dompuls`
  MODIFY `id_pembelian_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian_sps`
--
ALTER TABLE `pembelian_sps`
  MODIFY `id_pembelian_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan_dompuls`
--
ALTER TABLE `penjualan_dompuls`
  MODIFY `id_penjualan_dompul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan_sps`
--
ALTER TABLE `penjualan_sps`
  MODIFY `id_penjualan_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produksi_details`
--
ALTER TABLE `produksi_details`
  MODIFY `id_detailproduksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produksi_tabels`
--
ALTER TABLE `produksi_tabels`
  MODIFY `id_produksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `qcpb_tabels`
--
ALTER TABLE `qcpb_tabels`
  MODIFY `id_qcpb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `spkcs`
--
ALTER TABLE `spkcs`
  MODIFY `id_spkc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `spkpbs`
--
ALTER TABLE `spkpbs`
  MODIFY `id_spkpb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_jalan_tabels`
--
ALTER TABLE `surat_jalan_tabels`
  MODIFY `id_sj` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `upload_dompuls`
--
ALTER TABLE `upload_dompuls`
  MODIFY `id_upload` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1128;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
