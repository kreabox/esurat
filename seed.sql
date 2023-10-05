CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`usernmae` varchar(100) NOT NULL,
	`nama_lengkap` varchar(100) NOT NULL,
	`jabatan` varchar(100) NOT NULL,
	`password` text NOT NULL,
	`email` varchar(150),
	`role` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1;

-- create table untuk arsip
CREATE TABLE IF NOT EXISTS `arsip` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nama` varchar(100) NOT NULL,
	`file` varchar(100) NOT NULL,
	`keterangan` text NOT NULL,
	`tanggalArsip` date NOT NULL,
	`tanggalUpload` date NOT NULL,
	`user_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1;

-- Create table untuk template surat
CREATE TABLE IF NOT EXISTS `template` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nama` varchar(100) NOT NULL,
	`file` varchar(100) NOT NULL,
	`keterangan` text NOT NULL,
	`tanggalUpload` date NOT NULL,
	`user_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1;

-- Create table untuk surat masuk
CREATE TABLE IF NOT EXISTS `surat_masuk` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nomor` varchar(100) NOT NULL,
	`pengirim` varchar(100) NOT NULL,
	`perihal` varchar(100) NOT NULL,
	`tanggal` date NOT NULL,
	`file` varchar(100) NOT NULL,
	`keterangan` text NOT NULL,
	`tanggalUpload` date NOT NULL,
	`user_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1;

-- Create table untuk surat keluar
CREATE TABLE IF NOT EXISTS `surat_keluar` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nomor` varchar(100) NOT NULL,
	`kepada` varchar(100) NOT NULL,
	`cq` varchar(100),
	`tujuan` varchar(100) NOT NULL,
	`alamatTujuan` varchar(100) NOT NULL,
	`perihal` varchar(100) NOT NULL,
	`tanggal` date NOT NULL,
	`keterangan` text NOT NULL,
	`user_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1;

-- Create table untuk disposisi
CREATE TABLE IF NOT EXISTS `disposisi` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`id_surat_masuk` int(11) NOT NULL,
	`user_id_dari` int(11) NOT NULL,
	`user_id_kepada` int(11) NOT NULL,
	`tanggal` date NOT NULL,
	`memo` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1;

-- Create table untuk Setting Web
CREATE TABLE IF NOT EXISTS `settings` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nama` varchar(100) NOT NULL,
	`alamat` varchar(160) NOT NULL,
	`email` varchar(100),
	`telepon` varchar(100),
	`logo` varchar(100) NOT NULL,
	`favicon` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1;

-- Create Insert Data Setting Web
INSERT INTO `settings` ( `nama`, `alamat`, `email`, `telepon`, `logo`, `favicon`, `footer`) VALUES
( 'SIMANDAK', 'Jl. Raya Konoha Samping Ramen Ichiraku - Konoha, Hi Country Selatan, Konohagakure', 'admin@simandak.com', '021-12345678', 'logo.png', 'favicon.png',);

-- Path: seed.sql
