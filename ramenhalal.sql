-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 09:35 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ramenhalal`
--
CREATE DATABASE IF NOT EXISTS `ramenhalal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ramenhalal`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`) VALUES
(1, 'Egen Endo Lermatin', 'egen', 'egen'),
(2, 'Fero Endo Lermatin', 'fero', 'fero');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hidangan`
--

CREATE TABLE IF NOT EXISTS `tb_hidangan` (
  `id_hidangan` int(100) NOT NULL AUTO_INCREMENT,
  `nama_hidangan` varchar(100) NOT NULL,
  `harga_hidangan` int(100) NOT NULL,
  `gambar_hidangan` text NOT NULL,
  `deskripsi_hidangan` text NOT NULL,
  PRIMARY KEY (`id_hidangan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_kelamin`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_kelamin` (
  `id_jenis_kelamin` int(100) NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jenis_kelamin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_jenis_kelamin`
--

INSERT INTO `tb_jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tmp_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_tmp_transaksi` (
  `id_tmp_transaksi` int(100) NOT NULL AUTO_INCREMENT,
  `id_hidangan` int(100) NOT NULL,
  `jumlah_beli_hidangan` int(100) NOT NULL,
  `total_harga_hidangan` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  PRIMARY KEY (`id_tmp_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tb_tmp_transaksi`
--

INSERT INTO `tb_tmp_transaksi` (`id_tmp_transaksi`, `id_hidangan`, `jumlah_beli_hidangan`, `total_harga_hidangan`, `id_user`) VALUES
(42, 8, 1, 20000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` int(100) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_hidangan` int(100) NOT NULL,
  `nama_hidangan` varchar(100) NOT NULL,
  `harga_hidangan` int(100) NOT NULL,
  `gambar_hidangan` text NOT NULL,
  `deskripsi_hidangan` text NOT NULL,
  `jumlah_beli_hidangan` int(100) NOT NULL,
  `total_harga_hidangan` int(100) NOT NULL,
  `total_harga_transaksi` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jam_transaksi` time NOT NULL,
  `status_pembayaran` int(100) NOT NULL,
  `status_pengiriman` int(100) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `id_jenis_kelamin` int(100) NOT NULL,
  `alamat_user` text NOT NULL,
  `telepon_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email_user`, `password_user`, `id_jenis_kelamin`, `alamat_user`, `telepon_user`) VALUES
(3, 'Ferdy Budi Setiawan', 'ferdy@gmail.com', 'ferdy', 2, 'Jalan Sesama', '0856123456789'),
(4, 'Wahyu Wijaksono', 'wahyu@gmail.com', 'wahyu', 1, 'Jalan Sehat', '08543273234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
