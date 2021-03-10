-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Agu 2020 pada 03.08
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kedaimencong`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE IF NOT EXISTS `bahan_baku` (
  `ID_BAHAN_BAKU` varchar(10) NOT NULL,
  `NAMA_BAHAN_BAKU` varchar(50) DEFAULT NULL,
  `SATUAN_BAHAN_BAKU` varchar(15) DEFAULT NULL,
  `AKSI_BAHAN_BAKU` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`ID_BAHAN_BAKU`, `NAMA_BAHAN_BAKU`, `SATUAN_BAHAN_BAKU`, `AKSI_BAHAN_BAKU`) VALUES
('BK0001', 'Fresh Milk', 'Liter', 1),
('BK0002', 'UHT White', 'Mililiter', 1),
('BK0003', 'UHT Chocolate', 'Mililiter', 1),
('BK0004', 'Powder Chocolate', 'Kilogram', 1),
('BK0005', 'Powder Red Velvet', 'Kilogram', 1),
('BK0006', 'Powder Taro', 'Kilogram', 1),
('BK0007', 'Powder Avocado', 'Kilogram', 1),
('BK0008', 'Powder Matcha', 'Kilogram', 1),
('BK0009', 'Powder Lemon Tea', 'Kilogram', 1),
('BK0010', 'Powder Vanilla', 'Kilogram', 1),
('BK0011', 'Lipton Tea Bag', 'Pcs', 1),
('BK0012', 'Flavor Tea Bag', 'Pcs', 1),
('BK0013', 'Thai Tea Bag', 'Pcs', 1),
('BK0014', 'Syrup Caramel', 'Mililiter', 1),
('BK0015', 'Syrup Hazelnut', 'Mililiter', 1),
('BK0016', 'Syrup Vanilla', 'Mililiter', 1),
('BK0017', 'Syrup Strawberry', 'Mililiter', 1),
('BK0018', 'Syrup Lychee', 'Mililiter', 1),
('BK0019', 'Simple Syrup', 'Mililiter', 1),
('BK0020', 'Pomegranate Juice', 'Mililiter', 1),
('BK0021', 'Yakult', 'Mililiter', 1),
('BK0022', 'Susu Kental Manis', 'Mililiter', 1),
('BK0023', 'FN', 'Mililiter', 1),
('BK0024', 'Leci Kaleng', 'Pcs', 1),
('BK0025', 'Sugar', 'Kilogram', 1),
('BK0026', 'Palm Sugar', 'Kilogram', 1),
('BK0027', 'Brown Sugar Stick', 'Pcs', 1),
('BK0028', 'Straw Plastic', 'Pcs', 1),
('BK0029', 'Straw Hot', 'Pcs', 1),
('BK0030', 'Plastic Cup 12oz', 'Pcs', 1),
('BK0031', 'Paper Cup 8oz', 'Pcs', 1),
('BK0032', 'Mineral Water', 'Pcs', 1),
('BK0033', 'Paper Filter V60 01', 'Pcs', 1),
('BK0034', 'Indomie Goreng', 'Pcs', 1),
('BK0035', 'Indomie Rebus', 'Pcs', 1),
('BK0036', 'Telur', 'Pcs', 1),
('BK0037', 'Bawang Putih', 'Gram', 1),
('BK0038', 'Cabe', 'Gram', 1),
('BK0039', 'Otak-otak & Sosis', 'Gram', 1),
('BK0040', 'Kentang', 'Gram', 1),
('BK0041', 'Tempe', 'Pcs', 1),
('BK0042', 'Espresso', 'Gram', 1),
('BK0043', 'Coffee Beans', 'Gram', 1),
('BK0044', 'Powder Choco Berry', 'Kilogram', 1),
('BK0045', 'Otak-Otak', 'Pcs', 1),
('BK0046', 'Single Origin', 'Gram', 1),
('BK0047', 'Robusta', 'Kilogram', 1),
('BK0048', 'House Bland', 'Kilogram', 1),
('BK0049', 'Ice Cube', 'Gram', 1),
('BK0050', 'Vanilla Bella', 'Gram', 1),
('BK0051', 'Ice Nugget', 'Mililiter', 1),
('BK0052', 'Flavoured Syrup', 'Gram', 1),
('BK0053', 'Steam Milk + Froth Milk', 'Mililiter', 1),
('BK0054', 'Condensed Milk', 'Mililiter', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `ID_DETAILJUAL` varchar(10) NOT NULL,
  `ID_PENJUALAN` varchar(10) DEFAULT NULL,
  `ID_MENU` varchar(10) NOT NULL,
  `JUMLAH_ITEM` int(11) DEFAULT NULL,
  `HARGA_ITEM` int(11) DEFAULT NULL,
  `SUB_TOTALJUAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`ID_DETAILJUAL`, `ID_PENJUALAN`, `ID_MENU`, `JUMLAH_ITEM`, `HARGA_ITEM`, `SUB_TOTALJUAL`) VALUES
('DP0001', '0608200001', 'MN0001', 1, 17500, 17500),
('DP0002', '0608200001', 'MN0002', 1, 17500, 17500),
('DP0003', '0608200001', 'MN0008', 1, 14000, 14000),
('DP0004', '0608200001', 'MN0007', 1, 12000, 12000),
('DP0005', '0608200002', 'MN0014', 1, 15000, 15000),
('DP0006', '0608200002', 'MN0018', 1, 10000, 10000),
('DP0007', '0608200002', 'MN0007', 1, 12000, 12000),
('DP0008', '0608200002', 'MN0017', 1, 20000, 20000),
('DP0009', '0608200003', 'MN0002', 1, 17500, 17500),
('DP0010', '0608200003', 'MN0001', 2, 17500, 35000),
('DP0011', '0608200004', 'MN0006', 1, 17500, 17500),
('DP0012', '0608200004', 'MN0013', 1, 15000, 15000),
('DP0013', '0608200004', 'MN0008', 1, 14000, 14000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_umum`
--

CREATE TABLE IF NOT EXISTS `jurnal_umum` (
  `NO_URUT` varchar(10) NOT NULL,
  `ID_KAS_KELUAR` varchar(10) DEFAULT NULL,
  `ID_KARYAWAN` varchar(10) DEFAULT NULL,
  `ID_KAS_MASUK` varchar(10) DEFAULT NULL,
  `NO_JURNAL` varchar(10) DEFAULT NULL,
  `TGL_JURNAL` date DEFAULT NULL,
  `KETERANGAN_JURNAL` varchar(50) DEFAULT NULL,
  `JURNAL_DEBET` int(11) DEFAULT NULL,
  `JURNAL_KREDIT` int(11) DEFAULT NULL,
  `SUMBER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`NO_URUT`, `ID_KAS_KELUAR`, `ID_KARYAWAN`, `ID_KAS_MASUK`, `NO_JURNAL`, `TGL_JURNAL`, `KETERANGAN_JURNAL`, `JURNAL_DEBET`, `JURNAL_KREDIT`, `SUMBER`) VALUES
('N0001', NULL, '0906200001', 'M0001', 'J0001', '2020-08-06', 'Penjualan', 217000, NULL, 1),
('N0002', 'K0001', '0906200001', NULL, 'J0002', '2020-08-06', 'Iuran Keamanan', NULL, 30000, 1),
('N0003', 'K0002', '0906200001', NULL, 'J0003', '2020-08-06', 'Pembelian Bahan Baku', NULL, 32000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `ID_KARYAWAN` varchar(10) NOT NULL,
  `NAMA_KARYAWAN` varchar(50) DEFAULT NULL,
  `JABATAN` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `AKSI_KARYAWAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`ID_KARYAWAN`, `NAMA_KARYAWAN`, `JABATAN`, `USERNAME`, `PASSWORD`, `AKSI_KARYAWAN`) VALUES
('0906200001', 'Ebi Milzam Maulana', 'Admin', '27adf8cc565b615eb84cc29591a56d6d', 'f418c144d68348564bd765cc5dfc885e', 1),
('0906200002', 'Tania Hantara', 'Kasir', '13776eaab9768c7f7735444723e6afd1', 'f418c144d68348564bd765cc5dfc885e', 1),
('0906200003', 'Abdul Zidan', 'Pramusaji', '5070f015005cb8d1571af561a6e2445f', 'f418c144d68348564bd765cc5dfc885e', 1),
('0906200004', 'Faisal Kurniawan', 'Barista', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_keluar`
--

CREATE TABLE IF NOT EXISTS `kas_keluar` (
  `ID_KAS_KELUAR` varchar(10) NOT NULL,
  `TGL_KAS_KELUAR` date DEFAULT NULL,
  `KETERANGAN_KAS_KELUAR` varchar(50) DEFAULT NULL,
  `TOTAL_KAS_KELUAR` int(11) DEFAULT NULL,
  `KODE_KAS_KELUAR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas_keluar`
--

INSERT INTO `kas_keluar` (`ID_KAS_KELUAR`, `TGL_KAS_KELUAR`, `KETERANGAN_KAS_KELUAR`, `TOTAL_KAS_KELUAR`, `KODE_KAS_KELUAR`) VALUES
('K0001', '2020-08-06', 'Iuran Keamanan', 30000, 1),
('K0002', '2020-08-06', 'Pembelian Bahan Baku', 32000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_masuk`
--

CREATE TABLE IF NOT EXISTS `kas_masuk` (
  `ID_KAS_MASUK` varchar(10) NOT NULL,
  `TGL_KAS_MASUK` date DEFAULT NULL,
  `KETERANGAN_KAS_MASUK` varchar(50) DEFAULT NULL,
  `TOTAL_KAS_MASUK` int(11) DEFAULT NULL,
  `KODE_KAS_MASUK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas_masuk`
--

INSERT INTO `kas_masuk` (`ID_KAS_MASUK`, `TGL_KAS_MASUK`, `KETERANGAN_KAS_MASUK`, `TOTAL_KAS_MASUK`, `KODE_KAS_MASUK`) VALUES
('M0001', '2020-08-06', 'Penjualan', 217000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `ID_KATEGORI` varchar(10) NOT NULL,
  `JENIS` varchar(15) NOT NULL,
  `NAMA_KATEGORI` varchar(50) DEFAULT NULL,
  `GAMBAR` varchar(50) DEFAULT NULL,
  `AKSI_KATEGORI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `JENIS`, `NAMA_KATEGORI`, `GAMBAR`, `AKSI_KATEGORI`) VALUES
('KT0001', 'Makanan', 'Makanan', 'kategori/makanan.png', 1),
('KT0002', 'Minuman', 'Minuman', 'kategori/uncategoriez.png', 1),
('KT0003', 'Minuman', 'Non Coffee', 'kategori/non coffee.png', 1),
('KT0004', 'Minuman', 'Tea', 'kategori/tea.png', 1),
('KT0005', 'Minuman', 'Manual Brewing', 'kategori/manual brewing.png', 1),
('KT0006', 'Minuman', 'Espresso Based', 'kategori/espresso based.png', 1),
('KT0007', 'Minuman', 'Frappe Blended', 'kategori/frappe blended.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
  `ID_MEJA` varchar(10) NOT NULL,
  `NOMOR_MEJA` varchar(50) DEFAULT NULL,
  `AKSI_MEJA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`ID_MEJA`, `NOMOR_MEJA`, `AKSI_MEJA`) VALUES
('MJ0001', '1', 1),
('MJ0002', '2', 1),
('MJ0003', '3', 1),
('MJ0004', '4', 1),
('MJ0005', '5', 1),
('MJ0006', '6', 1),
('MJ0007', '7', 1),
('MJ0008', '8', 1),
('MJ0009', '9', 1),
('MJ0010', '10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `ID_MENU` varchar(10) NOT NULL,
  `ID_BAHAN_BAKU` varchar(10) NOT NULL,
  `ID_KATEGORI` varchar(10) NOT NULL,
  `ID_KARYAWAN` varchar(10) NOT NULL,
  `NAMA_MENU` varchar(100) DEFAULT NULL,
  `HARGA_MENU` int(11) DEFAULT NULL,
  `AKSI_MENU` int(11) DEFAULT NULL,
  `STATUS_MENU` varchar(10) DEFAULT NULL,
  `DISKON_MENU` int(11) DEFAULT NULL,
  `GAMBAR_MENU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`ID_MENU`, `ID_BAHAN_BAKU`, `ID_KATEGORI`, `ID_KARYAWAN`, `NAMA_MENU`, `HARGA_MENU`, `AKSI_MENU`, `STATUS_MENU`, `DISKON_MENU`, `GAMBAR_MENU`) VALUES
('MN0001', 'BK0004', 'KT0003', '0906200001', 'Chocolate', 23000, 1, 'Ada', 0, 'menu/chocolate.jpg'),
('MN0002', 'BK0005', 'KT0003', '0906200001', 'Red Velvet', 23000, 1, 'Ada', 0, 'menu/red velvet.jpg'),
('MN0003', 'BK0006', 'KT0003', '0906200001', 'Taro', 23000, 1, 'Ada', 0, 'menu/taro.jpg'),
('MN0004', 'BK0007', 'KT0003', '0906200001', 'Avocado', 23000, 1, 'Ada', 0, 'menu/Avocado.png'),
('MN0005', 'BK0044', 'KT0003', '0906200001', 'Choco Berry', 23000, 1, 'Ada', 0, 'menu/choco berry.jpg'),
('MN0006', 'BK0008', 'KT0003', '0906200001', 'Greentea Latte', 25000, 1, 'Ada', 0, 'menu/matcha.jpeg'),
('MN0007', 'BK0040', 'KT0001', '0906200001', 'Kentang Mencong', 20000, 1, 'Ada', 0, 'menu/kentang mencong.jpg'),
('MN0008', 'BK0039', 'KT0001', '0906200001', 'Oasis (Otak-Otak Sosis)', 20000, 1, 'Ada', 0, 'menu/oasis.jpg'),
('MN0009', 'BK0041', 'KT0001', '0906200001', 'Tempe Mencong', 20000, 1, 'Ada', 0, 'menu/tempe mencong.jpg'),
('MN0010', 'BK0045', 'KT0001', '0906200001', 'Otak-Otak', 15000, 1, 'Ada', 0, 'menu/otak-otak.jpg'),
('MN0011', 'BK0036', 'KT0001', '0906200001', 'Sosis Kentang Goreng (Sistagor)', 20000, 1, 'Ada', 0, 'menu/sistagor.jpg'),
('MN0012', 'BK0012', 'KT0004', '0906200001', 'Black Tea', 20000, 1, 'Ada', 0, 'menu/black tea.jpg'),
('MN0013', 'BK0009', 'KT0004', '0906200001', 'Lemon Tea', 20000, 1, 'Ada', 0, 'menu/lemon tea.jpg'),
('MN0014', 'BK0013', 'KT0004', '0906200001', 'Thai Tea', 20000, 1, 'Ada', 0, 'menu/thai tea.jpg'),
('MN0015', 'BK0024', 'KT0004', '0906200001', 'Lychee Tea', 20000, 1, 'Ada', 0, 'menu/lychee tea.jpg'),
('MN0016', 'BK0016', 'KT0002', '0906200001', 'Kopi Sore', 20000, 1, 'Ada', 0, 'menu/kopi sore.jpg'),
('MN0017', 'BK0010', 'KT0002', '0906200001', 'Kopi Mencong', 20000, 1, 'Ada', 0, 'menu/kopi mencong.png'),
('MN0018', 'BK0034', 'KT0001', '0906200001', 'Indomie Goreng', 13000, 1, 'Ada', 0, 'menu/indomie goreng.jpg'),
('MN0019', 'BK0035', 'KT0001', '0906200001', 'Indomie Rebus', 13000, 1, 'Ada', 0, 'menu/indomie rebus.jpg'),
('MN0020', 'BK0011', 'KT0004', '0906200001', 'Raspberry', 20000, 1, 'Ada', 0, 'menu/raspberry.jpg'),
('MN0021', 'BK0052', 'KT0002', '0906200001', 'Mencong Zero', 20000, 1, 'Ada', 0, 'menu/mencong zero.jpeg'),
('MN0022', 'BK0046', 'KT0005', '0906200001', 'Kopi Tubruk', 20000, 1, 'Ada', 0, 'menu/kopi tubruk.jpg'),
('MN0023', 'BK0046', 'KT0005', '0906200001', 'V60', 20000, 1, 'Ada', 0, 'menu/v60.jpg'),
('MN0024', 'BK0046', 'KT0005', '0906200001', 'V60 (Japanese)', 25000, 1, 'Ada', 0, 'menu/v60 japanese.jpg'),
('MN0025', 'BK0046', 'KT0005', '0906200001', 'Vietnam Drip', 20000, 1, 'Ada', 0, 'menu/vietnam drip.jpg'),
('MN0026', 'BK0046', 'KT0005', '0906200001', 'Special Beans', 25000, 1, 'Ada', 0, 'menu/special beans.jpg'),
('MN0027', 'BK0047', 'KT0006', '0906200001', 'Espresso', 13000, 1, 'Ada', 0, 'menu/espresso.jpg'),
('MN0028', 'BK0048', 'KT0006', '0906200001', 'Americano', 15000, 1, 'Ada', 0, 'menu/americano.jpg'),
('MN0029', 'BK0048', 'KT0006', '0906200001', 'Cafe Latte', 23000, 1, 'Ada', 0, 'menu/ice caffe latte.jpeg'),
('MN0030', 'BK0051', 'KT0006', '0906200001', 'Cappucino', 23000, 1, 'Ada', 0, 'menu/capucino.jpeg'),
('MN0031', 'BK0047', 'KT0006', '0906200001', 'Hazelnut Latte', 25000, 1, 'Ada', 0, 'menu/hazelnut.jpeg'),
('MN0032', 'BK0047', 'KT0006', '0906200001', 'Mocha Espresso', 25000, 1, 'Ada', 0, 'menu/mocha espresso.webp'),
('MN0033', 'BK0048', 'KT0006', '0906200001', 'Caramel Latte', 25000, 1, 'Ada', 0, 'menu/caramel latte.jpg'),
('MN0034', 'BK0036', 'KT0001', '0906200001', 'Indomie Rebus + Telur', 18000, 1, 'Ada', 0, 'menu/indomie rebus + telur.jpg'),
('MN0035', 'BK0036', 'KT0001', '0906200001', 'Indomie Goreng + Telur', 18000, 1, 'Ada', 0, 'menu/indomie goreng + telur.jpg'),
('MN0036', 'BK0053', 'KT0007', '0906200001', 'Cappucino', 25000, 1, 'Ada', 0, 'menu/cappucino.jpeg'),
('MN0037', 'BK0050', 'KT0007', '0906200001', 'Cookies & Cream', 25000, 1, 'Ada', 0, 'menu/cookies and cream.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE IF NOT EXISTS `pembelian_detail` (
  `ID_DETAIL` varchar(10) NOT NULL,
  `ID_PEMBELIAN` varchar(15) DEFAULT NULL,
  `ID_BAHAN_BAKU` varchar(10) NOT NULL,
  `HARGA_DETAIL_PEMBELIAN` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `SUB_TOTAL` int(11) DEFAULT NULL,
  `STATUS_DETAIL_PEMBELIAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`ID_DETAIL`, `ID_PEMBELIAN`, `ID_BAHAN_BAKU`, `HARGA_DETAIL_PEMBELIAN`, `JUMLAH`, `SUB_TOTAL`, `STATUS_DETAIL_PEMBELIAN`) VALUES
('DB0001', 'OB0608200001', 'BK0040', 3200, 10, 32000, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan_baku`
--

CREATE TABLE IF NOT EXISTS `stok_bahan_baku` (
  `ID_BAHAN_BAKU` varchar(10) NOT NULL,
  `TGL_STOK` date NOT NULL,
  `STOK_AWAL` decimal(10,0) DEFAULT NULL,
  `BARANG_MASUK` decimal(10,0) DEFAULT NULL,
  `BARANG_KELUAR` decimal(10,0) DEFAULT NULL,
  `STOK_AKHIR` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_bahan_baku`
--

INSERT INTO `stok_bahan_baku` (`ID_BAHAN_BAKU`, `TGL_STOK`, `STOK_AWAL`, `BARANG_MASUK`, `BARANG_KELUAR`, `STOK_AKHIR`) VALUES
('BK0001', '2020-07-10', '5', '0', '0', '5'),
('BK0002', '2020-07-10', '1000', '0', '0', '1000'),
('BK0003', '2020-07-10', '1000', '0', '0', '1000'),
('BK0004', '2020-07-10', '5', '0', '0', '5'),
('BK0005', '2020-07-10', '5', '0', '0', '5'),
('BK0006', '2020-07-10', '5', '0', '0', '5'),
('BK0007', '2020-07-10', '5', '5', '0', '10'),
('BK0008', '2020-07-10', '5', '0', '0', '5'),
('BK0009', '2020-07-10', '5', '0', '0', '5'),
('BK0010', '2020-07-10', '5', '0', '0', '5'),
('BK0011', '2020-07-10', '100', '0', '0', '100'),
('BK0012', '2020-07-10', '50', '0', '0', '50'),
('BK0013', '2020-07-10', '50', '0', '0', '50'),
('BK0014', '2020-07-10', '650', '0', '0', '650'),
('BK0015', '2020-07-10', '750', '0', '0', '750'),
('BK0016', '2020-07-10', '750', '0', '0', '750'),
('BK0017', '2020-07-10', '750', '0', '0', '750'),
('BK0018', '2020-07-10', '750', '0', '0', '750'),
('BK0019', '2020-07-10', '500', '0', '0', '500'),
('BK0020', '2020-07-10', '650', '0', '0', '650'),
('BK0021', '2020-07-10', '650', '0', '0', '650'),
('BK0022', '2020-07-10', '81', '0', '0', '81'),
('BK0023', '2020-07-10', '250', '0', '0', '250'),
('BK0024', '2020-07-10', '10', '0', '0', '10'),
('BK0025', '2020-07-10', '5', '0', '0', '5'),
('BK0026', '2020-07-10', '5', '0', '0', '5'),
('BK0027', '2020-07-10', '100', '0', '0', '100'),
('BK0028', '2020-07-10', '100', '0', '0', '100'),
('BK0029', '2020-07-10', '100', '0', '0', '100'),
('BK0030', '2020-07-10', '50', '0', '0', '50'),
('BK0031', '2020-07-10', '50', '0', '0', '50'),
('BK0032', '2020-07-10', '50', '0', '0', '50'),
('BK0033', '2020-07-10', '50', '0', '0', '50'),
('BK0034', '2020-07-10', '25', '0', '0', '25'),
('BK0035', '2020-07-10', '25', '0', '0', '25'),
('BK0036', '2020-07-10', '50', '0', '0', '50'),
('BK0037', '2020-07-10', '10', '0', '0', '10'),
('BK0038', '2020-07-10', '10', '0', '0', '10'),
('BK0039', '2020-07-10', '50', '0', '0', '50'),
('BK0040', '2020-07-10', '50', '10', '0', '60'),
('BK0041', '2020-07-10', '5', '0', '0', '5'),
('BK0042', '2020-07-10', '13', '0', '0', '13'),
('BK0043', '2020-07-10', '15', '0', '0', '15'),
('BK0044', '2020-07-10', '5', '0', '0', '5'),
('BK0045', '2020-08-11', '100', '0', '0', '100'),
('BK0046', '2020-08-11', '100', '0', '0', '100'),
('BK0047', '2020-08-11', '100', '0', '0', '100'),
('BK0048', '2020-08-11', '100', '0', '0', '100'),
('BK0049', '2020-08-11', '150', '0', '0', '150'),
('BK0050', '2020-08-11', '20', '0', '0', '20'),
('BK0051', '2020-08-11', '100', '0', '0', '100'),
('BK0052', '2020-08-11', '50', '0', '0', '50'),
('BK0053', '2020-08-11', '200', '0', '0', '200'),
('BK0054', '2020-08-11', '50', '0', '0', '50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `ID_SUPPLIER` varchar(10) NOT NULL,
  `NAMA_SUPPLIER` varchar(50) DEFAULT NULL,
  `ALAMAT_SUPPLIER` varchar(100) DEFAULT NULL,
  `NO_HP_SUPPLIER` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`ID_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT_SUPPLIER`, `NO_HP_SUPPLIER`) VALUES
('SP0001', 'Toko Sasa', 'Jl. H. Jukih No. 56', '0899534729812');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penjualan`
--

CREATE TABLE IF NOT EXISTS `tmp_penjualan` (
`ID_TMP_PENJUALAN` int(11) NOT NULL,
  `ID_KARYAWAN` varchar(15) DEFAULT NULL,
  `TMP_MENU` varchar(20) DEFAULT NULL,
  `TMP_HARGA_MENU` int(11) DEFAULT NULL,
  `TMP_JML` int(11) DEFAULT NULL,
  `TMP_SUB_TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penjualan`
--

CREATE TABLE IF NOT EXISTS `transaksi_penjualan` (
  `ID_PENJUALAN` varchar(10) NOT NULL,
  `ID_KARYAWAN` varchar(10) DEFAULT NULL,
  `ID_MEJA` varchar(10) NOT NULL,
  `PRAMUSAJI` varchar(10) DEFAULT NULL,
  `KETERANGAN_PENJUALAN` varchar(20) DEFAULT NULL,
  `TGL_PENJUALAN` datetime DEFAULT NULL,
  `TOTAL_HARGA_PENJUALAN` int(11) DEFAULT NULL,
  `DISKON_PENJUALAN` int(11) DEFAULT NULL,
  `TOTAL_HARGA_AKHIR_PENJUALAN` int(11) DEFAULT NULL,
  `STATUS_PENJUALAN` varchar(20) DEFAULT NULL,
  `CETAK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`ID_PENJUALAN`, `ID_KARYAWAN`, `ID_MEJA`, `PRAMUSAJI`, `KETERANGAN_PENJUALAN`, `TGL_PENJUALAN`, `TOTAL_HARGA_PENJUALAN`, `DISKON_PENJUALAN`, `TOTAL_HARGA_AKHIR_PENJUALAN`, `STATUS_PENJUALAN`, `CETAK`) VALUES
('0608200001', '0906200002', 'MJ0001', '0906200003', 'Pelanggan', '2020-08-06 07:36:39', 61000, 0, 61000, 'Lunas', 1),
('0608200002', '0906200002', 'MJ0002', '0906200003', 'Pelanggan', '2020-08-06 07:37:09', 57000, 0, 57000, 'Lunas', 1),
('0608200003', '0906200002', 'MJ0004', '0906200003', 'Pelanggan', '2020-08-06 07:37:36', 52500, 0, 52500, 'Lunas', 1),
('0608200004', '0906200002', 'MJ0003', '0906200003', 'Pelanggan', '2020-08-06 07:37:23', 46500, 0, 46500, 'Lunas', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trs_pembelian`
--

CREATE TABLE IF NOT EXISTS `trs_pembelian` (
  `ID_PEMBELIAN` varchar(15) NOT NULL,
  `ID_SUPPLIER` varchar(10) DEFAULT NULL,
  `NO_NOTA` varchar(10) DEFAULT NULL,
  `TGL_PEMBELIAN` date DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  `TOTAL_HARGA_PEMBELIAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trs_pembelian`
--

INSERT INTO `trs_pembelian` (`ID_PEMBELIAN`, `ID_SUPPLIER`, `NO_NOTA`, `TGL_PEMBELIAN`, `KETERANGAN`, `TOTAL_HARGA_PEMBELIAN`) VALUES
('OB0608200001', 'SP0001', 'PBK001', '2020-08-06', 'Diterima', 32000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
 ADD PRIMARY KEY (`ID_BAHAN_BAKU`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
 ADD PRIMARY KEY (`ID_DETAILJUAL`), ADD KEY `FK_MENJUAL` (`ID_MENU`), ADD KEY `FK_PENJUALAN` (`ID_PENJUALAN`);

--
-- Indexes for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
 ADD PRIMARY KEY (`NO_URUT`), ADD KEY `FK_RELATIONSHIP_17` (`ID_KAS_MASUK`), ADD KEY `FK_RELATIONSHIP_18` (`ID_KAS_KELUAR`), ADD KEY `FK_JURNAL_KAR` (`ID_KARYAWAN`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`ID_KARYAWAN`);

--
-- Indexes for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
 ADD PRIMARY KEY (`ID_KAS_KELUAR`);

--
-- Indexes for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
 ADD PRIMARY KEY (`ID_KAS_MASUK`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
 ADD PRIMARY KEY (`ID_MEJA`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`ID_MENU`), ADD KEY `FK_KATEGORI` (`ID_KATEGORI`), ADD KEY `FK_MEMBUAT` (`ID_BAHAN_BAKU`), ADD KEY `ID_KARYAWAN` (`ID_KARYAWAN`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
 ADD PRIMARY KEY (`ID_DETAIL`), ADD KEY `FK_DETAIL_BELI` (`ID_BAHAN_BAKU`), ADD KEY `FK_MEMBELI` (`ID_PEMBELIAN`);

--
-- Indexes for table `stok_bahan_baku`
--
ALTER TABLE `stok_bahan_baku`
 ADD PRIMARY KEY (`ID_BAHAN_BAKU`,`TGL_STOK`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`ID_SUPPLIER`);

--
-- Indexes for table `tmp_penjualan`
--
ALTER TABLE `tmp_penjualan`
 ADD PRIMARY KEY (`ID_TMP_PENJUALAN`), ADD KEY `FK_TMP_KARY` (`ID_KARYAWAN`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
 ADD PRIMARY KEY (`ID_PENJUALAN`), ADD KEY `FK_MEJA` (`ID_MEJA`), ADD KEY `FK_MELAYANI` (`ID_KARYAWAN`);

--
-- Indexes for table `trs_pembelian`
--
ALTER TABLE `trs_pembelian`
 ADD PRIMARY KEY (`ID_PEMBELIAN`), ADD KEY `FK_MENGORDER` (`ID_SUPPLIER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmp_penjualan`
--
ALTER TABLE `tmp_penjualan`
MODIFY `ID_TMP_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
ADD CONSTRAINT `FK_MENJUAL` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_PENJUALAN` FOREIGN KEY (`ID_PENJUALAN`) REFERENCES `transaksi_penjualan` (`ID_PENJUALAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
ADD CONSTRAINT `FK_JURNAL_KAR` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`),
ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`ID_KAS_MASUK`) REFERENCES `kas_masuk` (`ID_KAS_MASUK`),
ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`ID_KAS_KELUAR`) REFERENCES `kas_keluar` (`ID_KAS_KELUAR`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `FK_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_MEMBUAT` FOREIGN KEY (`ID_BAHAN_BAKU`) REFERENCES `bahan_baku` (`ID_BAHAN_BAKU`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_MENKAR` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
ADD CONSTRAINT `FK_DETAIL_BELI` FOREIGN KEY (`ID_BAHAN_BAKU`) REFERENCES `bahan_baku` (`ID_BAHAN_BAKU`),
ADD CONSTRAINT `FK_MEMBELI` FOREIGN KEY (`ID_PEMBELIAN`) REFERENCES `trs_pembelian` (`ID_PEMBELIAN`);

--
-- Ketidakleluasaan untuk tabel `stok_bahan_baku`
--
ALTER TABLE `stok_bahan_baku`
ADD CONSTRAINT `FK_STOK_BAHAN` FOREIGN KEY (`ID_BAHAN_BAKU`) REFERENCES `bahan_baku` (`ID_BAHAN_BAKU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_penjualan`
--
ALTER TABLE `tmp_penjualan`
ADD CONSTRAINT `FK_PENJ_KARY` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`);

--
-- Ketidakleluasaan untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
ADD CONSTRAINT `FK_MEJA` FOREIGN KEY (`ID_MEJA`) REFERENCES `meja` (`ID_MEJA`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_MELAYANI` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trs_pembelian`
--
ALTER TABLE `trs_pembelian`
ADD CONSTRAINT `FK_MENGORDER` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
