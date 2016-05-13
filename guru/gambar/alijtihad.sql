-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2015 pada 12.02
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `alijtihad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
  `id_admin` int(1) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_guru`
--

CREATE TABLE IF NOT EXISTS `t_guru` (
  `id_guru` int(3) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `t_guru`
--

INSERT INTO `t_guru` (`id_guru`, `nip`, `nama`, `password`, `gelar`, `jenis_kelamin`, `alamat`, `agama`, `no_hp`, `tgl_lahir`, `email`, `foto`) VALUES
(2, '1000000002', 'Septi', 'd58d8a16aa666d48fbcc30bd3217fb17', 'S.Pd', 'o', 'Jalan', 'Islam', '09988786781', '10/10/2015', 'septi@ymail.com', ''),
(3, '1000000003', 'Gita', '4cb6903c6f8b22d7f191aff3e137dbef', 'S.Pd', 'P', 'Jalan2', 'Islam', '0909898787', '11/11/2011', 'gita@gmail.com', ''),
(4, '1000000004', 'Anonymous', '499ddaad9df107bf7107a3e2c0064800', 'S.Ag', 'L', 'no address', 'Islam', '00767678787', '00/00/0000', 'noname@nomail.com', ''),
(5, '1000000005', 'Adi', 'c46335eb267e2e1cde5b017acb4cd799', 'S.Kom', 'L', 'jl. inpres', 'Islam', '089776687899', '05/05/2015', 'adies@gmail.com', ''),
(6, '1000000006', 'Setiawan', '41591fa3a697604be431ef66b5f53572', 'S.Ag', 'L', 'jalan', 'Islam', '0656657689', '03/03/1999', 'setiawan@gmail.com', ''),
(7, '1000000007', 'adies', '0953173a2418895c0c5747cec2b8d24e', 'S.Pd', 'L', '', 'Islam', '0897878791', '01/01/2001', 'adiys@gmail.com', ''),
(8, '1', 'za', '47bce5c74f589f4867dbd57e9ca9f808', 'S.Pd', 'L', '', 'Islam', '1', '', 'adies@yahoo.com', ''),
(9, '2147483647', 'Adi Setiawan', '47bce5c74f589f4867dbd57e9ca9f808', 'S.Pd', 'L', 'aaa', 'Islam', '1234567890', '10/10/2015', 'a@gmail.com', ''),
(10, '2147483647', 'adies', '0953173a2418895c0c5747cec2b8d24e', 'S.Pd', 'L', 'aaaaa', 'Islam', '08989765677', '10/10/2015', 'adies@gmail.com', ''),
(11, '2147483647', 'askawan', '8d29dbf2cebed2cb595f7369c32f4c98', 'S.Pd', 'L', '', 'Islam', '1234567890', '11/11/2011', 'adiys@gmail.com', ''),
(12, '2147483647', 'cobaaa', '47bce5c74f589f4867dbd57e9ca9f808', 'S.Pd', 'L', '', 'Islam', '0876543218', '10/10/2015', 'adi.setiawan21@yahoo.com', ''),
(13, '2147483647', 'aska', '1a1dc91c907325c69271ddf0c944bc72', 'S.Pd', 'L', '', 'Islam', '085716241324', '10/10/2015', 'adies@yahoo.com', ''),
(14, '9990001112223334445', 'Gita', '4cb6903c6f8b22d7f191aff3e137dbef', 'S.Kom', 'P', 'jalananan', 'Islam', 'aaasa', '11/11/2011', 'gita@gmail.com', ''),
(15, '88899900011122233344', 'setiawan', '41591fa3a697604be431ef66b5f53572', 'S.Kom', 'L', 'jl. merdeka selatan', 'Islam', '085770289748', '05/05/2015', 'setiawan@gmail.com', ''),
(16, '00098765432101234567', '', '41591fa3a697604be431ef66b5f53572', 'S. Kom', 'L', 'Jl. Panjang', 'Islam', '02170215240', '1991-05-03', 'skawan13@gmail.com', ''),
(17, '00098765432101234568', '', '900150983cd24fb0d6963f7d28e17f72', 'S. Kom', 'L', '', 'Islam', '08776543109', '2015-06-14', 'abc@yahoo.com', ''),
(18, '00098765432101234569', '', '0953173a2418895c0c5747cec2b8d24e', 'S. Kom', 'L', '', 'Islam', '087765431091', '2015-06-03', 'adies@yahoo.com', ''),
(19, '00098765432101234566', '', '8ea3b58eb88f49009e0ebab340d5ba1b', 'S. Kom', 'L', '', 'Islam', '099865443555', '2015-06-14', 'ase@yahoo.com', ''),
(20, '00098765432101234565', '', '936aa2d51122f827004e568af835d1c6', 'S. Kom', 'L', '', 'Islam', '081374687302', '2015-06-01', 'as@yahoo.com', ''),
(21, '00098765432101234564', 'SETIAWAN ADI', '41591fa3a697604be431ef66b5f53572', 'S. Kom', 'L', '', 'Islam', '02190275081', '2015-06-03', 'set@gmail.com', ''),
(22, '00098765432101234563', 'NO NAMES', 'e99a18c428cb38d5f260853678922e03', 'S. Kom', 'L', 'jlnan', 'Islam', '000897676676', '14/06/2015', 'no@yahoo.com', 'Logo ITCEF.JPG'),
(23, '00098765432101234562', 'ANONYM', '0cc175b9c0f1b6a831c399e269772661', 'S. Kom', 'L', '', 'Islam', '099865443512', '2015-06-07', 'an@ymail.com', ''),
(24, '00098765432101234561', 'GURU', '77e69c137812518e359196bb2f5e9bb9', 'S. Kom', 'L', 'jl. guru', 'Islam', '099887786868', '14/06/1980', 'guru@gmail.com', ''),
(25, '00098765432101234560', 'SISWA', '912a0cfede4cd0f5f108d609cfbec754', 'S.Kom', 'L', 'jl', 'Islam', '0877766899', '14/06/2015', 'setiawan@gmail.com', ''),
(26, '00098765432101234559', 'TEST GURU', '0cc175b9c0f1b6a831c399e269772661', 'S.Kom', 'L', 'jl. guru', 'Islam', '0977878989', '14/06/2015', 'guru@gmail.com', 'al.jpg'),
(27, '12345678901234567890', '1', '0cc175b9c0f1b6a831c399e269772661', 's.kom', 'L', '', 'Islam', '0897867877987', '15/06/2015', 'adi@ymail.com', ''),
(28, '00099988877766655543', 'ADII', 'fe0b2359c510327ff1f517b83fa3f146', 'S.Kom', 'L', 'jl. inpres vxii', 'Islam', '0877654321', '03/05/1991', 'adii@gmail.com', ''),
(29, '0000000000123456', 'SCHOLES', 'a2b489072a231a479be29f6fd1df04d9', 'S.Ss', 'L', 'manchester', 'Protestan', '0515142323', '01/11/1974', 'scholes@manu.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jadwal`
--

CREATE TABLE IF NOT EXISTS `t_jadwal` (
  `id_jadwal` int(3) NOT NULL AUTO_INCREMENT,
  `id_guru` int(3) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `jam_keluar` varchar(10) NOT NULL,
  `thn_akademik` varchar(15) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_jadwal`
--

INSERT INTO `t_jadwal` (`id_jadwal`, `id_guru`, `id_kelas`, `id_mapel`, `hari`, `jam_masuk`, `jam_keluar`, `thn_akademik`, `semester`) VALUES
(1, 2, 2, 7, 'Selasa', '09:00', '10:00', '2015/2016', 1),
(2, 24, 1, 2, 'Senin', '08:00', '09:00', '2015/2016', 1),
(3, 26, 11, 12, 'Senin', '08:00', '08:00', '2015/2016', 1),
(4, 22, 10, 5, 'Senin', '07:00', '08:00', '2015/2016', 1),
(5, 0, 0, 0, 'Senin', '07:00', '07:00', '2015/2016', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kelas`
--

CREATE TABLE IF NOT EXISTS `t_kelas` (
  `id_kelas` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X 1'),
(2, 'X 2'),
(3, 'XI IPA 1'),
(4, 'XI IPA 2'),
(5, 'XI IPS 1'),
(6, 'XI IPS 2'),
(7, 'XII IPA 1'),
(8, 'XII IPA 2'),
(9, 'XII IPS 1 '),
(10, 'XII IPS 2'),
(11, 'XII IPC 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kelas_siswa`
--

CREATE TABLE IF NOT EXISTS `t_kelas_siswa` (
  `id_kelas_siswa` int(3) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(3) NOT NULL,
  `id_siswa` int(3) NOT NULL,
  PRIMARY KEY (`id_kelas_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mapel`
--

CREATE TABLE IF NOT EXISTS `t_mapel` (
  `id_mapel` int(3) NOT NULL AUTO_INCREMENT,
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `t_mapel`
--

INSERT INTO `t_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'M0001', 'MATEMATIKA'),
(2, '', 'BAHASA INDONESIA'),
(4, '', 'BAHASA INGGRIS'),
(5, '', 'AGAMA ISLAM'),
(6, '', 'KEWARGANEGARAAN'),
(7, '', 'OLAHRAGA'),
(8, '', 'SENI RUPA'),
(9, '', 'ILMU KOMPUTER'),
(10, '', 'EKONOMI'),
(12, '', 'BIOLOGI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE IF NOT EXISTS `t_siswa` (
  `id_siswa` int(3) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `kelas` int(3) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`id_siswa`, `nis`, `nama`, `password`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `no_hp`, `agama`, `email`, `foto`, `kelas`) VALUES
(1, '00011122233344455563', 'SEPTI KOMALASARI', 'd58d8a16aa666d48fbcc30bd3217fb17', 'P', 'Jl. Jalan2Men', '05/05/2015', '0987654321', 'Islam', 'septi@gmail.com', '', 0),
(2, '00011122233344455562', 'GITA', '4cb6903c6f8b22d7f191aff3e137dbef', 'P', 'Jalan', '01/01/2001', '08767676768', 'Hindu', 'gita@gmail.com', '', 0),
(3, '00011122233344455561', 'ADIES', '0cc175b9c0f1b6a831c399e269772661', '', '', '14/06/2015', 'a', 'Islam', 'adies@gmail.com', '', 0),
(4, '00011122233344455564', 'ASK ADYES', 'e99a18c428cb38d5f260853678922e03', 'L', 'jl jl jl jl3', '01/06/2015', '08111222345', 'Islam', 'adisss@gmail.com', 'al.jpg', 0),
(5, '00011122233344455566', 'SETIAWAN', '41591fa3a697604be431ef66b5f53572', 'L', 'jl. jalan', '16/06/2015', '0878787887', 'Islam', 'a@gmail.com', 'al.jpg', 0),
(6, '00011122233344455565', 'ASKA WAN', '8d29dbf2cebed2cb595f7369c32f4c98', 'L', 'jl, jln2men', '14/06/2015', '09878787879', 'Islam', 'aska@gmail.com', 'al.jpg', 0),
(7, '00011122233344455560', 'ADY', '443fab3c60e00c25554dd57d84703371', 'L', 'jljlnjlnmen', '15/06/2015', '07989898889', 'Islam', 'ady@gmail.com', '', 0),
(8, '0001112223334445', 'ZLATAN', '85ffd536abe3bac08a92529a97dd34cb', 'L', 'paris', '19/06/2015', '08798979791', 'Islam', 'zlatan@gmail.com', '', 1),
(9, '0001112223334444', 'YORKE', '6699aa47a9d7d4e81e3ce3ede5fcd90e', 'L', 'london', '01/06/2015', '08987877878', 'Katolik', 'yorke@ymail.com', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_walas`
--

CREATE TABLE IF NOT EXISTS `t_walas` (
  `id_walas` int(3) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(3) NOT NULL,
  `id_guru` int(3) NOT NULL,
  PRIMARY KEY (`id_walas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_walas`
--

INSERT INTO `t_walas` (`id_walas`, `id_kelas`, `id_guru`) VALUES
(1, 3, 23),
(2, 2, 26),
(3, 5, 22);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
