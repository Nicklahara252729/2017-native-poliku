<?php
error_reporting(0);
session_start();
include_once "../hubung/koneksi.php";
include_once "../lib/funcion.php";
$LastID=FormatNoTrans(OtomatisID());
if((empty($_GET["destroy"])==FALSE))
{
		 session_destroy();
}
?>
<!DOCTYPE html>
<script type="text/javascript">
		var objAjax1;
		
		function getData(id_dis){
			alert('Id Distributor = '+id_dis);
			objAjax3=buatajax();
			url3="odapatdatasuplier.php";
			url3=url3+"?Id Distributor="+id_dis;
			objAjax3.onreadystatechange=gantinamasup;
			objAjax3.open("GET", url3, true);
			objAjax3.send(null);
		}
		function buatajax(){
			if(window.XMLHttpRequest){
				return new XMLHttpRequest();
			}
			if(window.ActiveXObject){
				return new ActiveXObject
				("Microsoft.XMLHTTP");
			}
			return null;
		}
		function gantinamasup(){
			var data2;
			if(objAjax3.readyState==4){
				data2=objAjax3.responseText;
				if(data2.length>0){
					document.getElementById("id_dist").value=data2;
				}
				else{
					document.getElementById("id_dist").value="";
				}
			}
		}
		
		
		</script>
<html>
<head>
	<meta charset="utf-8">
	<title>Toko Buku</title>
	<style>nav, header, section,footer {margin:10px 0px 0 0px; background:#ccc;} p{text-align:justify;} article{margin:10px 10px 10px 10px;}</style>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body >
		<div class="row-fluid">
		<div class="navbar">
			<div class="navbar-inner">
					<div class="span12">
					<ul class="nav">
						
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Data Buku</a></li>
						<li><a href="#">Data Kasir</a></li>
						<li><a href="#">Data Supplier</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-th-large"></i>Transaksi
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">	
								<li><a href="data_pasien.php">Tran. Pembelian</a></li>
								<li><a href="data_pasien.php">Tran. Penjualan</a></li>
								
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-th-large"></i>Laporan
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="pr.php">Lap. Pembelian</a></li>
								<li><a href="pr.php">Lap. Penjualan</a></li>
								<li><a href="pr.php">Lap. Persedian Buku</a></li>
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
		</div>
		</div>
		
		<div class="row-fluid">
		<div class="container">
			<div class="span12" style="border:1px solid #bbb;border-radius:10px;padding:10px 20px 10px 20px;">
				<article><p>
				<form class="form-horizontal" action="" method="post" name='f'>
				<fieldset>
				<legend>Transaksi Pembelian</legend>			
							<div class="control-group">
								<label class="control-label" for="inputnoreg">No. Transaksi</label>
								<div class="controls">
								<input class="span3" type="text" name="notran" id="inputnotrans" disabled value="<?php echo $LastID ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputtgl">Tanggal</label>
								<div class="controls">
								<input class="span2" type="text" name="tanggal" id="inputtanggal" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("d-m-Y");?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputnama">Supplier</label>
								<div class="controls">
								<select name="id_dis" id="id_dis" class="form-control" onchange="getData(this.value)">
								<option value="" >Pilih Supplier</option>
								<?php
								//require_once "../library/koneksi.php";
								$sqlopt2 = "SELECT id_distributor,nama_distributor FROM distributor ORDER BY nama_distributor ASC ";
								$queryopt2 = mysql_query($sqlopt2);
								while($result=mysql_fetch_array($queryopt2))
								{
								$id_dis=$result['id_distributor'];
									if($result['id_distributor'] == $row['id_distributor']) {
									echo "<option value='$result[id_distributor]' selected='selected'>$result[nama_distributor]</option>";
									}else{
									echo "<option value='$result[id_distributor]'>$result[nama_distributor]</option>";
									}
								}
								?>					
								</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputJudul">Judul Buku</label>
								<div class="controls">
								<select name="judul" id="judul" class="form-control">
								<option value="" >Judul Buku</option>
								<?php
								//require_once "../library/koneksi.php";
								$sqlopt2 = "SELECT id_buku,judul FROM buku ORDER BY judul ASC ";
								$queryopt2 = mysql_query($sqlopt2);
								while($result=mysql_fetch_array($queryopt2))
								{
									if($result['id_buku'] == $row['id_buku']) {
									echo "<option value='$result[judul]' selected='selected'>$result[judul]</option>";
									}else{
									echo "<option value='$result[judul]'>$result[judul]</option>";
									}
								}
								?>					
								</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputJumlah">Jumlah</label>
								<div class="controls">
								<input class="span2" type="number" name="jmlh" id="inputjmlh" value='1'>
								</div>
							</div>
							<div class="control-group" style="text-align:center;">
							<input type="submit" name="add" value="Tambah" class="btn btn-primary" />
							</div>
						</fieldset>
						</form>
						
						<form class="form-horizontal" action="actiontrans.php" method="post">
						<fieldset>	
						<form  action="actiontrans.php" method="post">
		<table>
							<tr style="background-color:#E8DEBD">
							<th style="text-align:center">No.</th>
							<th style="text-align:center">Judul</th>
							<th style="text-align:center">Harga </th>
							<th style="text-align:center">Jumlah </th>
							<th style="text-align:center">Sub Total</th>
							<th style="text-align:center" hidden>Kode Buku</th>
			<?php
			$awal=1;$sub=0;$total=0;
			if (@$_POST["judul"]!=''){
				if (empty($_SESSION["isi"])==TRUE){
					$_SESSION["isi"]=1;
				}else{
					$_SESSION["isi"]++;
				}
				@$judul = $_POST['judul'];
				$tampil = mysql_fetch_array(mysql_query("select judul, harga_pokok from buku where judul = '$judul'"));
				@$judul= $tampil["judul"];
				@$harga_pokok=$tampil["harga_pokok"];
				@$jmlh=trim($_POST["jmlh"]);
				@$sub=$harga_pokok*$jmlh;
				$tampilid=mysql_fetch_array(mysql_query("select id_buku from buku where judul='$judul'"));
				@$id_buku=$tampilid["id_buku"];
				@$id_dis = $_POST['id_dis'];
				//$_SESSION["id_dtr"]= $_POST['id_dis'];
				$tampilsup=mysql_fetch_array(mysql_query("select id_distributor from distributor where id_distributor='$id_dis'"));
				@$id_distributor=$tampilsup["id_distributor"];
				//@$xx=$xx+$sub;
				$_SESSION["akhir"][$_SESSION["isi"]]=array($judul,$harga_pokok,$jmlh,$sub,$id_buku,$id_distributor);
			}//else{
				//echo "<script type='text/javascript'>alert('Silahkan isi terlebih dahulu!')</script>";
			//}

				@$awal = $_SESSION["isi"];
				
				for ($i=0;$i<=$awal;$i++) {
				if (@$_SESSION['akhir'][$i][0]!=''){ ?>
					<tr>
							<td><?php echo $i ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][0] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][1] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][2] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][3] ?></td>
							<td hidden><?php echo @$_SESSION['akhir'][$i][4] ?></td>
					</tr>
						
					
					<?php }
					$total=@$_SESSION['akhir'][$i][3]+$total;
					@$_SESSION['total'] = $total;
				}
			
			?>
			
			<tr>
			
			<tr>
				<td colspan=4>
				<?php echo "Total Bayar";?>
				</td>
					<td>
					<?php echo " Rp. $total";?>
					</td>
			</tr>
			<tr>
				<td colspan=4 hidden>
					<input type="text" name="id_dist" id="id_dist" readonly="yes">
				</td>
			</tr>
			
			<tr>
			<td colspan=6>
							<input type='submit' value="Save" name="Simpan"/>
							<!--<a href='destroy.php'><input type='button' value='Hapus'></a>-->
			</td>
			</tr>			
			</tr>
						
			</table>
		</form>
						</fieldset>
						</form>
				</p></article>
				
				
			</div>
		</div>
		</div>
		<section>
	</div> <!-- end dari class container -->
	<!-- Javascript files harus ditaruh di bawah untuk meningkatkan performa web -->
	<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
	<script src="../js/jquery-2.0.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>
</html>