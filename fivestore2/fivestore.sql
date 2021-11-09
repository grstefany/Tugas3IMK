-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 09:00 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fivestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(40) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`) VALUES
(1, 'Admin Five store', 'admin', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id_brands` int(11) NOT NULL,
  `nama_brands` varchar(50) NOT NULL,
  `logo_brands` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id_brands`, `nama_brands`, `logo_brands`) VALUES
(1, 'LENOVO', 'Lenovo_logo.png'),
(2, 'HP', 'logo_hp.png'),
(3, 'ASUS', 'logo_asus1.png'),
(4, 'ACER', 'logo_acer.png'),
(5, 'APPLE', 'logo_apple.png'),
(6, 'DELL', 'logo_dell.png'),
(7, 'AXIOO', 'logo_axioo.png'),
(8, 'GENIUS', 'logo_genius.png'),
(9, 'HUAWEI', 'logo_huawei1.png'),
(10, 'LG', 'logo_LG.png'),
(11, 'MICROSOFT', 'logo_microsoft.png'),
(12, 'LOGITECH', 'logo_logitech.png'),
(13, 'ZYREX', 'logo_zyrex.png'),
(14, 'RAZER', 'logo_razer.png'),
(15, 'ROG', 'logo_ROG.png'),
(16, 'XIAOMI', 'logo_xiaomi.png'),
(17, 'TOSHIBA', 'logo_toshiba.png'),
(18, 'PANASONIC', 'logo_panasonic.png'),
(19, 'SAMSUNG', 'logo_samsung.png'),
(20, 'VAIO', 'logo_vaio.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `jenis_kelamin_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `kota_pelanggan` varchar(40) NOT NULL,
  `provinsi_pelanggan` varchar(40) NOT NULL,
  `kode_pos_pelanggan` varchar(20) NOT NULL,
  `no_hp_pelanggan` varchar(20) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin_pelanggan`, `alamat_pelanggan`, `kota_pelanggan`, `provinsi_pelanggan`, `kode_pos_pelanggan`, `no_hp_pelanggan`, `email_pelanggan`, `password_pelanggan`) VALUES
(13, 'iwan', '', 'jalan mesjid', 'tanjungbalai', 'provinsi', '123456', '111111', 'bagindaharahap3554@gmail.com', '1bbd886460827015e5d605ed44252251');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_owner` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` varchar(100) NOT NULL,
  `cardbank_type` varchar(100) NOT NULL,
  `cardbank_number` varchar(100) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `nama_owner`, `tanggal_pembelian`, `total_pembelian`, `cardbank_type`, `cardbank_number`, `status_pembayaran`, `status_pembelian`) VALUES
('0001', 13, 'iwan', '2021-01-20', '25169000', 'Bank Mandiri', '2323233', 'PAID', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` varchar(11) NOT NULL,
  `bgimg` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `bgimg`, `id_produk`, `nama`, `jumlah`, `harga`) VALUES
(1, '0001', 'ACER 001(A).jpg', 1, 'Acer Aspire 3 A315-42-R34T [AMD Ryzen 5 3500U] [NX.HHNSN.002]', 2, '8084500'),
(2, '0001', 'AXIOO 001.jpg', 9, 'Axioo Mybook 11 Plus Notebook', 3, '3000000');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` varchar(30) NOT NULL,
  `kategori_produk` varchar(100) NOT NULL,
  `brand_produk` varchar(100) NOT NULL,
  `spesifikasi_produk` text NOT NULL,
  `bgimg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `kategori_produk`, `brand_produk`, `spesifikasi_produk`, `bgimg`) VALUES
(1, 'Acer Aspire 3 A315-42-R34T [AMD Ryzen 5 3500U] [NX.HHNSN.002]', '8084500', 'Laptop', 'ACER', 'Ukuran Layar: 15,6 Inch\r\n\r\nResolusi Layar: 1366 x 768 pixels\r\n\r\nProsesor: AMD RYZENâ„¢ 5 3500U\r\n\r\nMemori RAM:  2 x 4GB DDR4\r\n\r\nPenyimpanan: 1TB HDD\r\n\r\nKartu Grafis: AMD Radeonâ„¢ Vega 8 Mobile Graphics\r\n\r\nSistem Operasi: Windows 10\r\n\r\nOptical Drive: No ODD (tidak ada slot/ruang DVD)', 'ACER 001(A).jpg'),
(3, 'Lenovo ThinkBook 14S-IWL Notebook - Mineral Gray [i7-8565U RAM 16GB SSD 512GB RADEON 540X-2GB 14', '13260000', 'Laptop', 'LENOVO', 'OS : Windows 10 Professional\r\nProsesor : Intel Core i7 8565U-1.8Ghz upto 4.6Ghz\r\nMemory : 16GB DDR4 RAM\r\nStorage : 512GB SSD\r\nGrafis : Radeon 540X-2GB\r\nLayar : 14 Inch FHD\r\nBluetooth : Ada', 'LENOVO 001.jpg'),
(4, 'Asus VivoBook A409JA-BV321T - Notebook / Laptop [i3-1005G1/ 4GB/ 1TB/ Intel UHD/ Windows 10 Home]', '7999000', 'Laptop', 'ASUS', '- 10th Gen Intel Core i3-1005G1 ( 1.20 â€“ 3.40 GHz, 4 MB IntelÂ® Smart Cache ) \r\n\r\n- Windows 10 Home\r\n\r\n- 4GB DDR4\r\n\r\n- 1TB SATA 2.5\" HD\r\n\r\n- IntelÂ® UHD Graphics\r\n\r\n- WiFi 802.11ac (2Ã—2) , Bluetooth 4.2 Combo\r\n\r\n- 3 Cell 42WHr lithium-ion Battery', 'ASUS 001.jpg'),
(5, 'LAPTOP HP PAVILION 13-AN0014TU', '14065000', 'Laptop', 'HP', '- 8th generation Intel Core i7-8565U Processor (1.8 GHz) [2] [23]\r\n\r\n- 512GB Solid State Drive [3]\r\n\r\n- 8192MB on-board DDR4 SDRAM [4]\r\n\r\n- No Optical Drive\r\n\r\n- Windows 10 [8] [21]\r\n\r\n- Finger Print Reader\r\n\r\n- 13.3\" Diagonal Full HD IPS LED Display (220nits) [10]\r\n\r\n- WLAN & Bluetooth [16] [17]\r\n\r\n- B&O', 'HP 001.jpg'),
(6, 'Laptop Dell Latitude 5400 i5 HDD', '9379000', 'Laptop', 'DELL', 'Processor: Intel Core i5-8365U\r\nRAM: 4GB DDR4\r\nHDD: 1TB\r\nVGA: Intel UHD Graphics\r\nSecurity: Fingerprint\r\nUkuran Layar: 14 inch FHD\r\nSistem Operasi: Win 10 Home', 'DELL 001.jpg'),
(7, 'Apple MacBook Air MQD32 Notebook - Silver [Intel Core i5/8GB/128GB/13 Inch]', '11608000', 'Laptop', 'APPLE', 'Layar : 13 Inch\r\nProsessor : Intel Core i5 - 1.8 Ghz\r\nMemori : RAM 8 GB\r\nKapasitas penyimpanan : 128 GB SSD\r\nSistem operasi : OS X Sierra', 'APPLE 001.jpg'),
(8, 'Microsoft Universal Foldable Hitam Keyboard', '1454400', 'Accecories', 'MICROSOFT', 'Keyboard Wireless\r\nDesain ramping, mengkilap sehingga terlihat elegan saat digunakan\r\nDapat mengontrol musik dan video\r\nDapat membuka kalkulator dengan sentuhan tombol\r\nSangat cocok Anda gunakan untuk di rumah atau di kantor', 'MICROSOFT 001.jpg'),
(9, 'Axioo Mybook 11 Plus Notebook', '3000000', 'Laptop', 'AXIOO', 'Intel N3350 Apollolike\r\n11.6â€ FHD IPS Display (1920 x 1080)\r\n3GB RAM, SSD 120\r\nBatery 5000mAh 7.4 V\r\nWi-fi & Bluetooth\r\nSupport Windows 10 (64 bit)', 'AXIOO 001.jpg'),
(10, 'Genius HD FaceCam 1000X Webcam', '250000', 'Accecories', 'GENIUS', 'Image Sensor : 720p HD pixel CMOS.\r\nLens type : Manual focus lens.\r\nFile format : AVI/WMV.\r\nMicrophone : YES.\r\nResolution (DPI) : 1MP, 1280 x 720, 640 x 480 pixels.\r\nBerat : 50 g.\r\nDimensi produk : 2,0 x 2,2 x 6,0 cm.\r\n', 'GENIUS 001.jpg'),
(11, 'HUAWEI MateBook X Pro 2020 Laptop', '28500000', 'Laptop', 'HUAWEI', 'Prosesor : Intel Core i7-10510U\r\nMemory : 16 GB LPDDR3\r\nGrafis : NVIDIA GeForce MX250\r\nKapasitas penyimpanan : 1 TB SSD (PCIe, NVMe)\r\nOS : Windows 10 Home', 'HUAWEI 001.jpg'),
(12, 'LG GRAM 14 2IN1-T90N LAPTOP GREY', '16830000', 'Laptop', 'LG', 'Processor: IntelÂ® Coreâ„¢ i7-10510U (1.8 GHz, Turbo up to 4.9 GHz, L3 Cache 8 MB, 15W)\r\nRAM: 16GB DDR4 2666MHz - (8 GB x 1 (On Board) - 8 GB x 1)\r\nStorage: 512GB SSD (Superfast & Antishock) - Up to 1TB SSD\r\nKartu Grafis: IntelÂ® UHD Graphics\r\nLayar: 14â€ Full HD (1920 x 1080) IPS LCD Touchscreen with Corning Gorilla Glass 6\r\nOS: Windows 10\r\nBacklit Keyboard\r\nFingerprint', 'LG 001.jpg'),
(13, 'Logitech H151 Stereo Headset with Noise-Canceling Mic', '169000', 'Accecories', 'LOGITECH', 'Input Impedance : 22 Ohms\r\nSensitivity (headphone) : 122dB +/-3dB\r\nFrequency response (Headset) : 20Hz to 20kHz\r\nFrequency response (Microphone) : 100Hz to 6500Hz', 'LOGITECH 001.jpg'),
(14, 'Panasonic RP DJS400 Headphone', '725000', 'Accecories', 'PANASONIC', 'Frekuensi : 10 - 27000\r\nImpedance : 32 Ohms\r\nSPL 102 : dB/mW\r\nConnector : 3.5mm\r\nPanjang kabel : 1.2 m', 'PANASONIC 001.jpg'),
(15, 'Razer Mouse DeathAdder V2 Mini', '699000', 'Accecories', 'RAZER', 'FORM FACTOR : Right-Handed\r\nCONNECTIVITY : Wired - Razerâ„¢ Speedflex Cable\r\nBATTERY LIFE : None\r\nRGB LIGHTING : Razer Chromaâ„¢ RGB\r\nSENSOR : Optical\r\nMAX SENSITIVITY (DPI) : 8500\r\nMAX SPEED (IPS) : 300\r\nMAX ACCELERATION (G) : 35\r\nPROGRAMMABLE BUTTONS : 6\r\nSWITCH TYPE : Optical\r\nSWITCH LIFECYCLE : 70 Million Clicks\r\nON-BOARD MEMORY PROFILES : 1', 'RAZER 001.jpg'),
(16, 'Asus ROG Zephyrus G14 GA401II-R55TA8G Gaming', '15875000', 'Laptop', 'ROG', 'Processor : AMD Ryzen 5 4600H\r\nMemory :  8 GB DDR4\r\nHard Drive : 512GB SSD\r\nGraphics : Nvidia GeForce GTX 1650 Ti 4 GB\r\nOperating System : Windows 10 Home', 'ROG 001.jpg'),
(17, 'Samsung 5th GRSi Flash Drive BAR USB 3.0 Metal Flashdisk [32GB]', '250000', 'Accecories', 'SAMSUNG', 'Interface : USB 3.0\r\nStorage Capacity : 32GB, (1GB=1Billion byte) \r\nActual usable capacity may be less (due to formatting, operating system, applications or otherwise)\r\nData Transfer Speed : Up to 150MB/s Data Transfer Speed\r\nWater-resistant : Yes', 'SAMSUNG 001.jpg'),
(18, 'NOTEBOOK VAIO S11 NP11V1AV017P CORE i5-8TH GEN/8GB/256GB SSD/BLACK', '23743850', 'Laptop', 'VAIO', '8th Gen Intel Core i5-8250U Processor\r\n\r\n( Up to 3.4GHz, 6MB Cache)\r\n\r\nWindows 10 Home\r\n\r\n8GB RAM + 256GB PCIe SSD\r\n\r\nIntel UHD 620 Graphics\r\n\r\n11.6\" FHD (1920 x 1080) Display\r\n\r\nCMOS Sensor HD Web Camera\r\n\r\nUp to 11 Hours Battery Life\r\n\r\nUSB 3.0 / LAN/ HDMI/ VGA\r\n\r\n0.85KG\r\n\r\nFingerprint Reader + Backlit Keyboard', 'VAIO 001.jpg'),
(19, 'Xiaomi USB 2.0 LAN Adapter USB to Ethernet RJ45 100Mbps', '199000', 'Accecories', 'XIAOMI', '1 x Xiaomi High Speed Ethernet Lan Adapter USB 2.0 100Mbps\r\n\r\nTechnical Specifications of Xiaomi High Speed Ethernet Lan Adapter USB 2.0 100Mbps\r\nConnection USB 2.0\r\nInterface Provided RJ45 Ethernet\r\nDimension 16.0 x 1.5 x 0.4 cm', 'XIAOMI 001.jpg'),
(20, 'Zyrex NB SKY 360 Touch Screen Laptop 2 in 1 [64GB SSD M2 256GB WIN 10 HM]', '5150000', 'Laptop', 'ZYREX', 'Intel Celeron N4000 Processor \r\nRAM 4GB (Tdk dapat di upgrade)\r\nStorage : - internal storage 64GB (Tdk dapat di upgrade)+ SSD M.2 256GB (dapat di upgrade sampai 1TB)\r\nScreen 13.3\", Full HD Touch Screen\r\nFull metal body', 'ZYREX 001.jpg'),
(22, 'Toshiba Portege Z30 / Core i5 5200U ', '4800000', 'Laptop', 'TOSHIBA', 'Core i5 2520M Prosesor.\r\n320 GB HDD Penyimpanan.\r\n4 GB RAM.\r\n14 inch Ukuran Layar.', 'TOSHIBA 001.jpg'),
(23, 'Acer Aspire A514-53-32H2 Notebook - Purple', '7099000', 'Laptop', 'ACER', 'Intel Core i3-1005G1\r\n4 GB DDR4\r\n512 GB SSD\r\nIntel UHD Graphics\r\nWindows 10 Home\r\nOffice Home and  Student', 'ACER 002.jpg'),
(24, 'Lenovo Slim 3 81WE013SID Notebook - Black ', '9099000', 'Laptop', 'LENOVO', 'Layar : 15.6\"\" FHD (1920x1080) IPS 250nits Anti-glare\r\nTouchscreen : No\r\nProsesor : Intel Core i5-1035G1 (4C / 8T, 1.0 / 3.6GHz, 6MB)\r\nMicrosoft Office :  Microsoft Office Home and student  2019 Full Lisence\r\nMemory : 4GB Soldered DDR4-2666 + 4GB SO-DIMM DDR4-2666\r\nSistem Operasi : Windows 10 Home\r\nTipe Garansi : 2 year warranty ', 'LENOVO 002.jpg'),
(25, 'Asus A412FA-EK54051T/EK54052T Laptop ', '7250000', 'Laptop', 'ASUS', 'OS : Windows 10 Home\r\nProsessor : Intel Pentium Gold 5405U\r\nMemory RAM : 4GB\r\nStorage : SSD 512GB\r\nUkuran Layar : 14 Inch FHD', 'ASUS 002.jpg'),
(26, 'Asus ROG STRIX-G G512LI- I75TB6T Laptop Gaming', '16799000', 'Laptop', 'ROG', 'Intel Core i7-10750H Processor\r\nDDR4 8GB 3200Mhz, M.2 512GB SSD PCIe\r\nNVIDIA GeForce GTX1650Ti GDDR6 4GB\r\n15.6 Inch Slim Bezel IPS FHD 144Hz 250nits 3ms, sRGB:67%, NTSC:45%\r\nWiFi, Bluetooth,\r\nWindows 10', 'ROG 002.jpg'),
(27, 'Acer Predator Nitro5 AN515-54-73VG Gaming Laptop - Black', '15299000', 'Laptop', 'ACER', 'OS : Windows 10 Home\r\nProcessor : Intel Core i7-9750H\r\nGraphic : NVIDIA GeForce GTX 1660Ti\r\nScreen : 15.6 inch FHD\r\nAudio :  Integrated', 'ACER 003.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brands`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brands` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
