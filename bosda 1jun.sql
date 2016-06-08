-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Jun 2016 pada 09.43
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bosda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `hargastandar` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `hargastandar`, `created_at`) VALUES
(1, 'Buku Tulis Bergaris Kecil', 2000, '2016-06-01 11:00:00'),
(2, 'Pensil 2B Lusin', 24000, '2016-06-01 11:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritaacaraperiksakas`
--

CREATE TABLE `beritaacaraperiksakas` (
  `id` int(11) NOT NULL,
  `idsekolah` int(11) NOT NULL,
  `tglacara` date NOT NULL,
  `skkepsek` varchar(100) NOT NULL,
  `tglskkepsek` date NOT NULL,
  `idkepsek` int(11) NOT NULL,
  `idtujuan` int(11) NOT NULL,
  `nosktujuan` varchar(100) NOT NULL,
  `tglsktujuan` date NOT NULL,
  `ketsktujuan` text NOT NULL,
  `jmluangkertas` int(11) NOT NULL,
  `jmlsaldobank` int(11) NOT NULL,
  `jmlsuratberharga` int(11) NOT NULL,
  `jmlbukukas` int(11) NOT NULL,
  `perbedaan` int(11) NOT NULL,
  `tglbawah` date NOT NULL,
  `idbendaharattd` int(11) NOT NULL,
  `idkepsekttd` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bkcatatinventaris`
--

CREATE TABLE `bkcatatinventaris` (
  `id` int(11) NOT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `tahunperoleh` int(11) DEFAULT NULL,
  `jmlterima` int(11) DEFAULT NULL,
  `jmlkeluar` int(11) DEFAULT NULL,
  `jmlsisa` int(11) DEFAULT NULL,
  `keterangan` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bkkas`
--

CREATE TABLE `bkkas` (
  `id` int(11) NOT NULL,
  `bulantahun` date DEFAULT NULL,
  `jenis` enum('Kas Umum','Pembantu Kas','Pembantu Bank','Pembantu Pajak') DEFAULT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `idbendahara` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bkterimabarang`
--

CREATE TABLE `bkterimabarang` (
  `id` int(11) NOT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `hargariil` int(11) DEFAULT NULL,
  `sumber` varchar(100) DEFAULT NULL,
  `referensi` varchar(100) DEFAULT NULL,
  `tanggalterima` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `nama` varchar(50) DEFAULT NULL,
  `nrp` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`nama`, `nrp`) VALUES
('raven', 6134132),
('raven', 6134132),
('bastomy', 6134117);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtlbkkas`
--

CREATE TABLE `dtlbkkas` (
  `id` int(11) NOT NULL,
  `idbkkas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nokode` int(11) DEFAULT NULL,
  `nobukti` int(11) DEFAULT NULL,
  `uraian` text,
  `jenispenerimaan` enum('PPN','PPh 21','PPh 22','PPh 23') DEFAULT NULL,
  `penerimaandebit` int(11) DEFAULT NULL,
  `pengeluarankredit` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtllappenggunaan`
--

CREATE TABLE `dtllappenggunaan` (
  `id` int(11) NOT NULL,
  `idlappenggunaan` int(11) DEFAULT NULL,
  `jenis` tinyint(4) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `tanggalbulan` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `namatoko` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtlrekapbelibarang`
--

CREATE TABLE `dtlrekapbelibarang` (
  `id` int(11) NOT NULL,
  `idrekapbelibarang` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `hargariil` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtlrekaprealisasipenggunaan`
--

CREATE TABLE `dtlrekaprealisasipenggunaan` (
  `id` int(11) NOT NULL,
  `nourut` int(11) DEFAULT NULL,
  `namakegiatan` varchar(1000) DEFAULT NULL,
  `penggunaandana` enum('Pengembangan perpustakaan','Kegiatan penerimaan mahasiswa baru','Kegiatan pembelajaran dan eskul siswa','Kegiatan ulangan dan ujian','Pembelian bahan habis pakai','Layanan daya dan jasa','Perawatan sekolah','Pembayaran honorarium bulanan guru honorer dan tenaga kependidikan honorer','Pengembangan profesi guru','Membantu siswa miskin','Pembiayaan pengelolaan BOS','Pembelian perangkat komputer','Biaya lainnya jika komponen 1 s.d 12 telah terpenuhi') DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtlrencanapenggunaan`
--

CREATE TABLE `dtlrencanapenggunaan` (
  `id` int(11) NOT NULL,
  `idrencanapenggunaan` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `hargariil` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtlrkas`
--

CREATE TABLE `dtlrkas` (
  `id` int(11) NOT NULL,
  `idrkas` int(11) DEFAULT NULL,
  `nourut` int(11) DEFAULT NULL,
  `nokode` int(11) DEFAULT NULL,
  `uraian` text,
  `hargariil` int(11) DEFAULT NULL,
  `triwulan` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabkota`
--

CREATE TABLE `kabkota` (
  `ID` int(11) NOT NULL,
  `Nama Kab/Kota` varchar(50) NOT NULL,
  `ID Prov` smallint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `ID` smallint(6) NOT NULL,
  `Nama Penanya` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Tanggal Pertanyaan` date NOT NULL,
  `Uraian` text NOT NULL,
  `Penerima` varchar(50) NOT NULL,
  `Tindak Lanjut` tinyint(1) NOT NULL,
  `Tgl Laporan` date NOT NULL,
  `ID Prov Kota Asal` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lappenggunaan`
--

CREATE TABLE `lappenggunaan` (
  `id` int(11) NOT NULL,
  `periodemulai` varchar(20) DEFAULT NULL,
  `periodeakhir` varchar(20) DEFAULT NULL,
  `idketuakomite` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `idbendahara` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pernyataantggjwb`
--

CREATE TABLE `pernyataantggjwb` (
  `id` int(11) NOT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `tanggallap` date DEFAULT NULL,
  `penerimaan1` int(11) DEFAULT NULL,
  `penerimaan2` int(11) DEFAULT NULL,
  `penerimaan3` int(11) DEFAULT NULL,
  `penerimaan4` int(11) DEFAULT NULL,
  `pengeluaran1` int(11) DEFAULT NULL,
  `pengeluaran2` int(11) DEFAULT NULL,
  `pengeluatan3` int(11) DEFAULT NULL,
  `pengeluaran4` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `programsekolah`
--

CREATE TABLE `programsekolah` (
  `id` int(11) NOT NULL,
  `nokode` varchar(1000) DEFAULT NULL,
  `nama` varchar(1000) DEFAULT NULL,
  `deskripsi` text,
  `idprograminduk` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `programsekolah`
--

INSERT INTO `programsekolah` (`id`, `nokode`, `nama`, `deskripsi`, `idprograminduk`, `created_at`) VALUES
(1, '01', 'Pengembangan Kompetensi Lulusan', '', 0, '2016-06-01 06:43:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `ID` smallint(6) NOT NULL,
  `Nama Provinsi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`ID`, `Nama Provinsi`) VALUES
(1, 'Jakarta'),
(2, 'Jabar'),
(3, 'Jateng'),
(4, 'DIY'),
(5, 'Jatim'),
(6, 'Banten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapbs`
--

CREATE TABLE `rapbs` (
  `id` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `jmlsisathnlalu` int(11) DEFAULT NULL,
  `jmlbospusat` int(11) DEFAULT NULL,
  `jmlbosprov` int(11) DEFAULT NULL,
  `jmlboskota` int(11) DEFAULT NULL,
  `jmldanadekon` int(11) DEFAULT NULL,
  `jmldanatugas` int(11) DEFAULT NULL,
  `jmldanakhusus` int(11) DEFAULT NULL,
  `jmllainlain` int(11) DEFAULT NULL,
  `namasumberlain1` varchar(200) DEFAULT NULL,
  `namasumberlain2` varchar(200) DEFAULT NULL,
  `jmlsumberlain1` int(11) DEFAULT NULL,
  `jmlsumberlain2` int(11) DEFAULT NULL,
  `jmlpkomplulusan` int(11) DEFAULT NULL,
  `jmlpstandarisi` int(11) DEFAULT NULL,
  `jmlpstandarproses` int(11) DEFAULT NULL,
  `jmlpperiodik` int(11) DEFAULT NULL,
  `jmlpsarana` int(11) DEFAULT NULL,
  `jmlpstandarkelola` int(11) DEFAULT NULL,
  `jmlpstandarbiaya` int(11) DEFAULT NULL,
  `jmlpisistemnilai` int(11) DEFAULT NULL,
  `idketuakomite` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `idbendahara` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registertutupkas`
--

CREATE TABLE `registertutupkas` (
  `id` int(11) NOT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `tgltutupkas` date DEFAULT NULL,
  `namapenutup` varchar(1000) DEFAULT NULL,
  `tgltutuplalu` date DEFAULT NULL,
  `jmlpenerimaan` int(11) DEFAULT NULL,
  `jmlpengeluaran` int(11) DEFAULT NULL,
  `saldokas` int(11) DEFAULT NULL,
  `lbr100` int(11) DEFAULT NULL,
  `lbr50` int(11) DEFAULT NULL,
  `lbr20` int(11) DEFAULT NULL,
  `lbr10` int(11) DEFAULT NULL,
  `lbr5` int(11) DEFAULT NULL,
  `lbr2` int(11) DEFAULT NULL,
  `lbr1` int(11) DEFAULT NULL,
  `koin1` int(11) DEFAULT NULL,
  `koin500` int(11) DEFAULT NULL,
  `koin200` int(11) DEFAULT NULL,
  `koin100` int(11) DEFAULT NULL,
  `saldobanksuratdll` int(11) DEFAULT NULL,
  `perbedaan` int(11) DEFAULT NULL,
  `penjelasanperbedaan` text,
  `tglregister` int(11) DEFAULT NULL,
  `idbendahara` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapbelibarang`
--

CREATE TABLE `rekapbelibarang` (
  `id` int(11) NOT NULL,
  `jenislembaga` tinyint(4) DEFAULT NULL,
  `idkepdin` int(11) DEFAULT NULL,
  `tahunrekap` int(11) DEFAULT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekaprealisasipenggunaan`
--

CREATE TABLE `rekaprealisasipenggunaan` (
  `id` int(11) NOT NULL,
  `tanggalmulai` date DEFAULT NULL,
  `tanggalselesai` date DEFAULT NULL,
  `triwulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `idbendahara` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencanapenggunaan`
--

CREATE TABLE `rencanapenggunaan` (
  `id` int(11) NOT NULL,
  `periodemulai` varchar(4) DEFAULT NULL,
  `periodeakhir` varchar(4) DEFAULT NULL,
  `jumlahpeserta` int(11) DEFAULT NULL,
  `jumlahdanabos` float DEFAULT NULL,
  `idketuakomite` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `idbendahara` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rkas`
--

CREATE TABLE `rkas` (
  `id` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `idsekolah` int(11) DEFAULT NULL,
  `idketuakomite` int(11) DEFAULT NULL,
  `idkepsek` int(11) DEFAULT NULL,
  `idbendahara` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `jabatan` enum('Bendahara','Komite Sekolah','Kepala Sekolah','Administrator','Guru','Staff BOS Kota','Karyawan Sekolah') DEFAULT NULL,
  `namalengkapdgngelar` varchar(200) DEFAULT NULL,
  `namapanggilan` varchar(50) DEFAULT NULL,
  `sapaan` varchar(10) DEFAULT NULL,
  `nipnik` int(10) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkcatatinventaris`
--
ALTER TABLE `bkcatatinventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkkas`
--
ALTER TABLE `bkkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkterimabarang`
--
ALTER TABLE `bkterimabarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtlbkkas`
--
ALTER TABLE `dtlbkkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtllappenggunaan`
--
ALTER TABLE `dtllappenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtlrekapbelibarang`
--
ALTER TABLE `dtlrekapbelibarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtlrekaprealisasipenggunaan`
--
ALTER TABLE `dtlrekaprealisasipenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtlrencanapenggunaan`
--
ALTER TABLE `dtlrencanapenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtlrkas`
--
ALTER TABLE `dtlrkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lappenggunaan`
--
ALTER TABLE `lappenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pernyataantggjwb`
--
ALTER TABLE `pernyataantggjwb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programsekolah`
--
ALTER TABLE `programsekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `ID_2` (`ID`),
  ADD UNIQUE KEY `ID_3` (`ID`),
  ADD UNIQUE KEY `ID_4` (`ID`);

--
-- Indexes for table `rapbs`
--
ALTER TABLE `rapbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registertutupkas`
--
ALTER TABLE `registertutupkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapbelibarang`
--
ALTER TABLE `rekapbelibarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekaprealisasipenggunaan`
--
ALTER TABLE `rekaprealisasipenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencanapenggunaan`
--
ALTER TABLE `rencanapenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rkas`
--
ALTER TABLE `rkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bkcatatinventaris`
--
ALTER TABLE `bkcatatinventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bkkas`
--
ALTER TABLE `bkkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bkterimabarang`
--
ALTER TABLE `bkterimabarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtlbkkas`
--
ALTER TABLE `dtlbkkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtllappenggunaan`
--
ALTER TABLE `dtllappenggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtlrekapbelibarang`
--
ALTER TABLE `dtlrekapbelibarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtlrekaprealisasipenggunaan`
--
ALTER TABLE `dtlrekaprealisasipenggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtlrencanapenggunaan`
--
ALTER TABLE `dtlrencanapenggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtlrkas`
--
ALTER TABLE `dtlrkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kabkota`
--
ALTER TABLE `kabkota`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lappenggunaan`
--
ALTER TABLE `lappenggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programsekolah`
--
ALTER TABLE `programsekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rapbs`
--
ALTER TABLE `rapbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registertutupkas`
--
ALTER TABLE `registertutupkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rekaprealisasipenggunaan`
--
ALTER TABLE `rekaprealisasipenggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rencanapenggunaan`
--
ALTER TABLE `rencanapenggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
