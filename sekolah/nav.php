<nav class="main-nav sixteen columns" style="margin-top: 20px;">
    <ul class="fifteen columns alpha">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="datasekolah.php">Data Sekolah</a></li>
        <li class="dropdown">
            <a href="#" class="dropbtn">Rencana</a>
            <div class="dropdown-content">
                <a href="rkas.php">RKAS</a>
                <a href="rapbs.php">RAPBS</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="dropbtn">Buku Kas</a>
            <div class="dropdown-content">
                <a href="bkumum.php">BK. Umum</a>
                <a href="bkpembantu.php">BK. Pembantu Kas</a>
                <a href="bkpembantubank.php">BK. Pembantu Bank</a>
                <a href="bkpembantupajak.php">BK. Pembantu Pajak</a>
                <a href="registutupkas.php">Register Penutupan Kas</a>
                <!-- <a href="beritaacarapemeriksaankas.php">Berita Acara Penutupan Kas</a> -->
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="dropbtn">Realisasi</a>
            <div class="dropdown-content">
                <!-- Input Realisasi Penggunaan Dana Tiap Jenis Anggaran -->
                <a href="realpenerimaandanatiap.php">Input Realisasi Penerimaan</a>
                <a href="realpengeluarandanatiap.php">Input Realisasi Pengeluaran</a>
                
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="dropbtn">Laporan</a>
            <div class="dropdown-content">
                <a href="lapdanabos.php">Laporan Keuangan per Triwulan</a>
                <a href="laprencanarealisasi.php">Laporan Rencana-Realisasi</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="dropbtn">Master Data</a>
            <div class="dropdown-content">
                <a href="msprogram.php">Program Sekolah</a>
            <?php 
                if($_SESSION['nama'] == "ika") {
            ?>
                <a href="msbarang.php">Barang</a>
                <a href="msuser.php">User</a>
            </div>
        </li>
        <?php } ?>
    </ul>
</nav>
