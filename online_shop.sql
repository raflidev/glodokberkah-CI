-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 09:09 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `kode_alamat` char(5) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `deskel` varchar(25) NOT NULL,
  `kode_pos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`kode_alamat`, `provinsi`, `kota`, `kecamatan`, `deskel`, `kode_pos`) VALUES
('A0001', 'Jawa Barat', 'Bandung', 'Sukajadi', 'Sukawarna', 40164),
('A0002', 'Jawa barat', 'Kabupaten Bekasi', 'Tambun selatan', 'sumberjaya', 17510),
('A0003', 'Jawabarat', 'Kabupaten Bekasi', 'Tambun selatan', 'sumberjaya', 17510);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(6) NOT NULL,
  `harga_beli` int(9) NOT NULL,
  `harga_jual` int(9) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `terjual` int(5) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `harga_beli`, `harga_jual`, `tgl_produksi`, `kondisi`, `terjual`, `stok`) VALUES
('K02B08', 23500, 30000, '2019-01-09', 'Baru', 7, 97),
('K02B05', 550000, 650000, '2017-05-14', 'Baru', 9, 96),
('K02B06', 600000, 700000, '2018-01-10', 'Baru', 10, 96),
('K02B02', 1500000, 1750000, '2015-09-17', 'Bekas', 24, 91),
('K02B03', 2250000, 3000000, '2019-04-16', 'Baru', 7, 99),
('K02B07', 4500000, 5500000, '2016-04-08', 'Bekas', 11, 93),
('K02B01', 14000000, 15500000, '2017-06-21', 'Baru', 46, 94),
('K02B12', 1999999, 2200000, '2019-09-27', '', 2, 8),
('K02B13', 8250000, 8500000, '2017-02-01', 'Baru', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `detailbarang`
--

CREATE TABLE `detailbarang` (
  `kode_barang` char(6) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `kategori_utama` varchar(50) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailbarang`
--

INSERT INTO `detailbarang` (`kode_barang`, `nama_barang`, `merk`, `kategori_utama`, `kategori`, `gambar`, `deskripsi`) VALUES
('K02B01', 'Asus ROG GL503GE - EN023T', 'Asus', 'Gadget', 'Laptop', 'laptop1.jpg', 'Processor : Intel® Core™ i7-8750H Processor 2.2 GHz (9M Cache, up to 3.9 GHz)\r\nMemory : DDR4 2666 8GB\r\nHarddisk : SATA 1TB 5400RPM 2.5’ Hybrid HDD (FireCuda)\r\nVGA card : NVIDIA GeForce GTX 1050 Ti\r\nScreen : 15.6\' FHD FHD 1920x1080 16:9\r\nOS : Windows 10 (64bit)\r\nColor : metal Black\r\nBattery : 64WHrs, 4S1P, 4-cell Li-ion\r\nDimension / Weight : 38.4(W) x 26.2(D) x 2.40 ~ 2.40(H) cm/2.60 KG\r\nGaransi : 2 tahun garansi Global'),
('K02B02', 'Samsung 32 inch HD Flat TV 32N4001', 'Samsung', 'Elektronik', 'TV', 'tv1.jpg', 'HD TV\r\nHDMI\r\nCleanview\r\nWide Color Enhancer\r\nConnectShare Movie'),
('K02B03', 'Panasonic 32 Inch LED TV - Hitam (Model 32G302G)', 'Panasonic', 'Elektronik', 'TV', 'tv2.jpg', 'HD Ready,HDMI\r\nUSB Movie\r\nSuper bright panel\r\nDot noise reduction\r\nAV In'),
('K02B05', 'Gildan Long Sleeve Tee', 'Represent', 'Pakaian', 'Pakaian Pria', 'blyat.jpg', 'Official PewDiePie Merch:\r\n\r\nOnly Real Cykas\r\n\r\nA portion of proceeds will support Save The Children.\r\n\r\n** SHIPS WORLDWIDE **'),
('K02B06', 'Midweight Pullover Hoodie', 'Represent', 'Pakaian', 'Hoodie', '60mil.jpg', 'The vault has been opened!\r\n\r\nBack for a limited time, get your piece of history before it\'s gone for good.\r\n\r\nBe a sister and rep the 60 Mill Club.\r\n\r\n*Ships Internationally*'),
('K02B07', 'Canon EOS 3000D with lens EF-S 18-55mm III DC', 'Canon', 'Gadget', 'Kamera', 'kamera.jpg', '18.0 Megapixel APS-C CMOS sensor\r\nDIGIC 4+ Image Processor\r\nISO 100 \'\'\" 6400 (expandable to 12800)\r\n3 fps continuous shooting\r\n9 AF points (center cross type)\r\nFull HD video recording (1920x1080) 30p\r\n2.7\" TFT colour liquid-crystal monitor (230K pixels)\r\nBuilt-in flash (Manual pop up flash)\r\nEF and EF-S lens mount\r\nBuilt in Wifi\r\nSD/SDHC/SDXC card slot\r\n\'Creative Filter\' Image processing styles'),
('K02B08', 'Jam Tangan Casual Pria Quartz Analog Movement WK9117', 'Quartz', 'Aksesoris', 'Jam Tangan', 'jamtangan.jpg', 'Bahan Strap : PU Leather\r\nBahan Case Stainless Steel\r\nDiameter 4,7cm\r\nBahan Kaca : Mineral Glass\r\nQuartz Analog Movement\r\nPacking Rapi Dan Aman\r\nFashionable Watch'),
('K02B12', 'Asus Max Pro M1', 'Asus', 'Pilih salah satu...', 'Smartphone', 'asusmaxprom1.jpg', 'ASUS ZenFone Max Pro M1 ZB602KL\r\n\r\nZenFone Max Pro (M1) adalah generasi smartphone terbaru dengan platform Snapdragon 636 yang memiliki performa dan ketahanan yang maksimal yang bisa membawa Anda lebih jauh dari yang Anda pikirkan. Dengan layar Full View 6-inci Full HD+ (2160x1080) 18:9 yang memukau, baterai 5000mAh yang tahan lama, sistem dual kamera dan juga audio yang bombastis, ZenFone Max Pro memenuhi semua kebutuhkan Anda di keseharian yang padat. ZenFone Max Pro adalah pendamping yang setia bagi Anda, selalu siap saat dibutuhkan!\r\n\r\n\r\nPerformance\r\n\r\n14nm octa-core advanced mobile performance\r\n\r\nDi dalam ZenFone Max Pro terdapat prosesor Qualcomm Snapdragon 636 terbaru, yang menggabungkan performa yang responsif dan lancar dengan daya tahan baterai yang super. Prosesor Snapdragon 636 memiliki performa 1.54x lebih cepat dibandingkan Snapdragon 625.1 Apapun yang ingin Anda lakukan, ZenFone Max Pro bisa melakukannya dengan mudah.\r\n\r\n\r\nBattery\r\n\r\nMassive stamina\r\n\r\nDi dalam tampilan ZenFone Max Pro yang ramping terdapat baterai li-polimer 5000mAh yang kuat yang didesain untuk memberikan performa yang maksimum. Dengan baterai besar, Anda melakukan semua kegiatan lebih lama, selama yang Anda inginkan tanpa harus takut kehabisan baterai.\r\n\r\n\r\nDisplay\r\n\r\nFull View display\r\n\r\nPengalaman visual pada ZenFone Max Pro sangatlah memukau karena dilengkapi dengan layar FullView yang membuat Anda dapat melihat konten dengan layar yang lebih besar. ZenFone Max Pro membuat foto, video atau konten lainnya terlihat lebih bagus dan jernih. Dengan ZenFone Max Pro, segala sesuatu menjadi lebih jernih, terang dan besar!\r\n\r\n\r\nDesign\r\n\r\nSame size, more screen\r\n\r\nZenFone Max Pro membantu Anda untuk melihat lebih banyak dengan ruang yang lebih sedikit. Layar 6-inci milik Zenfone Max Pro memiliki bezel yang sangat tipis, sehingga pas di bodi tipis yang seukuran dengan smartphone 5.5-inci. Desain ergonomis ini sempurna, cantik, tipis dan nyaman untuk digenggam.\r\n\r\nZenFone Max Pro dibuat dengan metal yang kuat dengan bodi yang tipis dan ringan sehingga membuatnya sangat elegan dan nyaman digenggam. Dengan fitur unlock yang terletak di bagian belakang, membuat Anda lebih mudah untuk mengaksesnya. Anda dapat memilih warna yang sesuai dengan kesukaan Anda, Deepsea Black dan Meteor Silver.\r\n\r\n\r\nDual Rear Cameras\r\n\r\nCapture the realistic moments\r\n\r\nZenFone Max Pro memiliki sistem dual kamera yang canggih yang membawa fotografi mobile ke tingkat yang lebih tinggi. Kamera Belakang dapat melakukan fokus ke suatu objek hanya dalam satu kedipan mata. Selain itu kamera ZenFone Max Pro juga memiliki sensor resolusi tinggi dengan lensa wide yang dapat mengambil foto dengan lebih jelas setiap saat. ZenFone Max Pro menangkap video pada resolusi 4K UHD - 4 kali lebih baik dari Full HD! Tidak ada yang rumit untuk Anda lakukan: cukup arahkan, ambil dan bagikan kenangan Anda, semua ditangkap dengan tingkat detail yang luar biasa.\r\n\r\n\r\nPortrait Mode\r\n\r\nCapture perfect portraits\r\n\r\nUntuk foto portrait dan close up yang memukau, kamera kedua pada ZenFone Max Pro digunakan untuk mencitakan efek depth of field yang artistik, dengan meletakkan subjek pada fokus yang tajam, kamera akan membuat background menjadi kabur sehingga membuat subjek menjadi menonjol.\r\n\r\n\r\nBeauty Mode\r\n\r\nCapture the beauty of you\r\n\r\nUntuk membantu Anda mengambil foto selfie yang cantik, ZenFone Max Pro dilengkapi dengan fitur live beuatification yang secara instan mempercantik foto Anda dengan menghilangkan jerawat, menyeimbangkan bentuk wajah, mencerahkan warna kulit dan masih banyak lagi. ZenFone Max Pro sungguh membuat Anda terlihat bersinar!\r\n\r\n\r\nAudio\r\n\r\nMagnificent entertainment\r\n\r\nSpeaker ZenFone Max Pro memiliki konstruksi 5 magnet dengan suara yang dilindungi metal, dan juga ditambah dengan NXP smart amplifier yang memberikan suara yang lebih kencang dan jernih di semua kondisi. Saat Anda siap untuk menonton film atau mendengar musik favorit Anda, MaxBox yang didesain dengan sempurna mengubah suara ZenFone Max Pro menjadi suara yang kuat, tanpa menggunakan baterai atau kabel. Hanya dengan menempelkan ZenFone Max Pro pada MaxBox, Anda dapat berpesta sepanjang malam!\r\n\r\n\r\nTriple Slots\r\n\r\nMore connections, more storage\r\n\r\nZenFone Max Pro memilik 2 slot SIM Card yang mendukung 4G LTE dengan kecepatan hingga 400Mbps, dan juga slot microSD yang memudahkan Anda untuk menambah storage Anda hingga 2TB. Dengan Triple Slots, Anda dapat dengan mudah mengaktifkan 2 SIM card dan juga menambahkan microSD untuk storage Anda.\r\n\r\n\r\nSecurity\r\n\r\nUnlocks at your convenience\r\n\r\nJari Anda kotor atau sibuk? Jangan khawatir! ZenFone Max Pro memiliki sistem face-recognition - face unlock - yang mengenali fitur unik Anda dan dengan cepat membuka smartphone Anda. Selain itu, juga terdapat sensor sidik jari pada bagian belakang yang diposisikan sempurna sesuai dengan cara Anda memegang smartphone. Ini akan membuka ZenFone Max Pro Anda hanya dalam 0.3 detik - bahkan jika jari Anda basah!\r\n\r\n\r\nLatest Android™ 8.1 Oreo™\r\n\r\nFaster, smarter with a pure Android™ experience\r\n\r\nVersi terbaru dari user interface Android™ yang indah memberikan pengalaman intuitif yang membantu Anda melakukan hal-hal lebih cepat, meningkatkan produktivitas Anda, dan memungkinkan Anda bersenang-senang dengan smartphone Anda.'),
('K02B13', 'Acer Aspire E5-475G', 'Acer', 'Gadget', 'Laptop', 'Acer-Aspire-E5-475G-1.jpg', '	\r\nACER ASPIRE E5-475G\r\nPROCESSOR\r\nIntel Core i5-6200U Processor\r\n- 2.3GHz, 3MB L2 cache\r\n- Max Turbo Frequency 2.8 GHz\r\nMEMORY\r\n4GB DDR4 RAM\r\nSTORAGE\r\n1TB SATA HDD\r\nGRAPHIC\r\nNVIDIA GeForce GT940MX with 2 GB of Dedicated DDR5 VRAM\r\nSCREEN / RESOLUTION\r\n14\" HD 1366 x 768 resolution, Acer CineCrystal LED\r\nOPERATING SYSTEM\r\nWindows 10 Home 64-bit\r\nNETWORK\r\nGigabit Ethernet, Wake-on-LAN ready\r\nWireless-AC, 802.11 ac/a/b/g/n wireless LAN supporting MU-MIMO -----\r\n\r\nTechnology\r\nBluetooth 4.0\r\n-INTERFACES / PORTS\r\nAcer Crystal Eye HD webcam, 1280 x 720 resolution\r\n8X DVD Super Multi Plus Drive (M-DISC Ready Drive)\r\nSD card reader\r\nTwo USB3.0 & One USB 2.0 ports\r\nHDMI port with HDCP support & VGA port\r\n-BATTERY & POWER INFO\r\n4-cell Lithium Ion (Li-Ion) 2800 mAh\r\n65W Adaptor\r\n-DIMENSION & WEIGHT\r\n343 (W) x 248 (D) x 23.7 (H) mm\r\n2.1KG\r\n-COLOUR\r\nE5-475G-525V - Grey\r\nE5-475G-526W - White\r\nE5-475G-55H3 - Purple\r\n-PACKAGE CONTENT\r\nLaptop x 1\r\nCharger x 1\r\nUser Guide x 1\r\nAcer Backpack x 1\r\n-WARRANTY\r\n3 Years Acer Warranty');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `kode_transaksi` char(5) NOT NULL,
  `kode_metode` char(3) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `dibayar` char(1) NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`kode_transaksi`, `kode_metode`, `kode_unik`, `tgl`, `total_biaya`, `ongkir`, `dibayar`, `bukti`) VALUES
('T0006', 'MDR', 1622, '2019-09-03', 0, 25000, 'Y', 'WhatsApp_Image_2019-09-19_at_18_51_332.jpeg'),
('T0007', 'MDR', 1369, '0000-00-00', 0, 25000, 'Y', ''),
('T0008', 'MDR', 1337, '0000-00-00', 0, 25000, 'Y', ''),
('T0015', 'MDR', 2726, '2019-09-25', 0, 25000, 'Y', ''),
('T0016', 'MDR', 1220, '2019-09-25', 100000, 25000, 'Y', 'Kurenai_Rin_600_25392192.jpg'),
('T0017', 'OVO', 3002, '2019-09-25', 0, 25000, 'Y', ''),
('T0020', 'GPY', 1595, '2019-09-25', 1750000, 25000, 'Y', ''),
('T0021', 'OVO', 1856, '2019-09-25', 28250000, 25000, 'Y', 'yarik.jpg'),
('T0022', 'MDR', 1724, '2019-09-27', 30000, 25000, 'Y', ''),
('T0023', 'GPY', 1959, '2019-09-28', 2430000, 25000, 'Y', 'Shinrass3.png'),
('T0024', 'MDR', 1673, '2019-09-29', 29780000, 25000, 'Y', 'gits.jpg'),
('T0025', 'MDR', 1556, '2019-09-29', 650000, 25000, 'N', ''),
('T0026', 'MDR', 2153, '2019-09-29', 30000, 25000, 'N', ''),
('T0027', 'GPY', 1743, '2019-09-29', 1350000, 25000, 'N', 'buktii.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `infouser`
--

CREATE TABLE `infouser` (
  `id_user` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_alamat` char(5) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(9) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infouser`
--

INSERT INTO `infouser` (`id_user`, `nama`, `kode_alamat`, `tgl_lahir`, `jk`, `no_hp`, `email`) VALUES
('U0001', 'Andi', 'A0001', '2002-07-18', 'Laki-laki', '083802596832', 'andy32@gmail.com'),
('U0003', 'Rafli Ramadhan', 'A0002', '2019-09-23', 'Laki-Laki', '08138238366', 'rafliramdhn@gmail.com'),
('U0005', 'Aldi Ferdiansyah', 'A0003', '2019-01-30', 'Laki-Laki', '0813345746421', 'aldiFer@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `kode_metode` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `rekening` int(25) NOT NULL,
  `gambar` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`kode_metode`, `nama`, `rekening`, `gambar`) VALUES
('GPY', 'Gopay', 1002112411, 'gopay.png'),
('MDR', 'Mandiri', 1000014556, 'mandiri.png'),
('OVO', 'OVO', 813822121, 'ovo.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` char(5) NOT NULL,
  `kode_barang` char(6) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_user` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_barang`, `jumlah`, `id_user`) VALUES
('T0001', 'K02B05', 1, 'U0001'),
('T0002', 'K02B01', 1, 'U0002'),
('T0003', 'K02B02', 1, 'U0003'),
('T0004', 'K02B02', 1, 'U0003'),
('T0004', 'K02B05', 1, 'U0003'),
('T0004', 'K02B08', 1, 'U0003'),
('T0004', 'K02B03', 1, 'U0003'),
('T0005', 'K02B01', 2, 'U0003'),
('T0005', 'K02B07', 1, 'U0003'),
('T0005', 'K02B03', 2, 'U0003'),
('T0006', 'K02B07', 1, 'U0003'),
('T0006', 'K02B05', 1, 'U0003'),
('T0006', 'K02B03', 1, 'U0003'),
('T0006', 'K02B06', 3, 'U0003'),
('T0007', 'K02B01', 2, 'U0003'),
('T0008', 'K02B02', 3, 'U0003'),
('T0008', 'K02B05', 1, 'U0003'),
('T0009', 'K02B02', 1, 'U0003'),
('T0010', 'K02B02', 1, 'U0003'),
('T0011', 'K02B02', 1, 'U0003'),
('T0012', 'K02B02', 1, 'U0003'),
('T0013', 'K02B02', 1, 'U0003'),
('T0014', 'K02B02', 1, 'U0003'),
('T0015', 'K02B02', 1, 'U0003'),
('T0016', 'K02B02', 1, 'U0003'),
('T0017', 'K02B01', 1, 'U0003'),
('T0018', 'K02B02', 1, 'U0003'),
('T0019', 'K02B02', 1, 'U0003'),
('T0020', 'K02B02', 1, 'U0003'),
('T0021', 'K02B02', 1, 'U0003'),
('T0021', 'K02B07', 2, 'U0003'),
('T0021', 'K02B01', 1, 'U0003'),
('T0022', 'K02B08', 1, 'U0003'),
('T0023', 'K02B05', 1, 'U0003'),
('T0023', 'K02B08', 1, 'U0003'),
('T0023', 'K02B02', 1, 'U0003'),
('T0024', 'K02B12', 2, 'U0003'),
('T0024', 'K02B01', 1, 'U0003'),
('T0024', 'K02B08', 1, 'U0003'),
('T0024', 'K02B05', 1, 'U0003'),
('T0024', 'K02B06', 1, 'U0003'),
('T0024', 'K02B13', 1, 'U0003'),
('T0025', 'K02B05', 1, 'U0003'),
('T0026', 'K02B08', 1, 'U0003'),
('T0027', 'K02B05', 1, 'U0005'),
('T0027', 'K02B06', 1, 'U0005');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_user` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status_user`) VALUES
('U0001', 'a', 'a', '1'),
('U0002', 'asdasd', '$2y$10$pSKNZzDaSNalP8bHPShkXeHfaYex7rW83cXDj9RfQM9iaX/Y8vSBa', '2'),
('U0003', 'raf', '$2y$10$vAIQjoop5lFaSvY8hidhx.HbVrFOH1/qO2ajqaHaCQzusch6tIGTa', '2'),
('U0004', 'ras', '$2y$10$EQ9CmfJGJaZtxcbjZYvpJ.sWXAR7FBVjWqRFNI5sban9CvaydK8/m', '1'),
('U0005', '123', '$2y$10$bKThNJruHK8qLCDjndtcF..phz1W/e8xXUOL1IYDjFfyy68xTumyS', '2'),
('U0006', '321', '$2y$10$MXHxyzDHZFGn6TnzIwZ68e5wDIPxQoYo2G5TTHXAQPRNyuluLLXAS', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`kode_alamat`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `detailbarang`
--
ALTER TABLE `detailbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`kode_transaksi`) USING BTREE,
  ADD KEY `kode_metode` (`kode_metode`);

--
-- Indexes for table `infouser`
--
ALTER TABLE `infouser`
  ADD KEY `kode_alamat` (`kode_alamat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`kode_metode`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_transaksi` (`kode_transaksi`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `detailbarang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`kode_metode`) REFERENCES `metode` (`kode_metode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `infouser`
--
ALTER TABLE `infouser`
  ADD CONSTRAINT `infouser_ibfk_4` FOREIGN KEY (`kode_alamat`) REFERENCES `alamat` (`kode_alamat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `infouser_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `detailbarang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
