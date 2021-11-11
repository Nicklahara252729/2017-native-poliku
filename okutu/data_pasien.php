<?php
error_reporting(0);
include_once("../hubung/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 5;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM pasien";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<title>Toko Buku Ku</title>
<style>nav, header, section,footer {margin:10px 0px 0 0px; background:#ccc;} p{text-align:justify;} article{margin:10px 10px 10px 10px;}</style>	
<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
<body >
		<div class="row-fluid">
		<div class="navbar">
			<div class="navbar-inner">
					<div class="span12">
					<ul class="nav">
						<li class="active dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-user"></i>File master
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="daftar.php">Data Buku</a></li>
								<li><a href="data_Pasien.php">Data Kasir</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-th-large"></i>Transaksi
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="pr.php">Pembelian Buku</a></li>
								<li><a href="pr.php">Penjualan Buku</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-th-large"></i>Laporan
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="pr.php">Pembelian Buku</a></li>
								<li><a href="pr.php">Penjualan Buku</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-th-large"></i>User Account
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="pr.php">LogOut</a></li>
								<li><a href="pr.php">Change Password</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			</div>
		</div>
		<div class="row-fluid" >
			<div class="span11" style="margin:10px 10px 10px 10px;">
				<a href="add_pasien.php" class="btn btn-primary btn-rect"><i class='icon icon-white icon-plus'></i> Pasien</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Pasien
	</div>
	<div class="panel-body">
		<div class="table-responsive" >
			<table class="table table-striped table-bordered table-hover" align="center">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nomor Pasien</th>
						<th>Tgl. Reg</th>
						<th>Nama Pasien</th>
						<th>Tgl. Lahir</th>
						<th>J. Kelamin</th>
						<th>Telp/Hp</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
			<?php
				$pasienSql = "SELECT * FROM pasien ORDER BY nopasien DESC LIMIT $hal, $row";
				$pasienQry = mysql_query($pasienSql, $server)  or die ("Query pasien salah : ".mysql_error());
				$nomor  = 0; 
				while ($pasien = mysql_fetch_array($pasienQry)) {
				$nomor++;
			?>
				<tbody>
					<tr>
						
						<td><?php echo $nomor;?></td>
						<td><?php echo $pasien['nopasien'];?></td>
						<td><?php echo $pasien['tglregistrasi'];?></td>
						<td><?php echo $pasien['namapas'];?></td>
						<td><?php echo $pasien['tgllahirpas'];?></td>
						<td><?php echo $pasien['jeniskelpas'];?></td>
						<td><?php echo $pasien['telppas'];?></td>
						<td><?php echo $pasien['almpas'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=hapus_pasien&aksi=hapus&nmr=<?php echo $pasien['id']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=edit_pasien&aksi=edit&nmr=<?php echo $pasien['id']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="11" align="right" >
						<div class="span11" >
						<div class="pagination">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul><li><a href='?menu=data_pasien&hal=$list[$h]'>$h</a></li></ul>";
						}
						?>
						</div>
				</div>
						</td>
					</tr>
			</table>
		</div>
	</div>
</div>				
</div>
</div>
</div> <!-- end dari class container -->
	<!-- Javascript files harus ditaruh di bawah untuk meningkatkan performa web -->	
	<script src="../js/jquery-2.0.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery.js"></script>
</body>