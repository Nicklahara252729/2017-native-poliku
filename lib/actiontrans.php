<?php 
session_start();
include "../hubung/koneksi.php";
include "../lib/funcion.php";
$LastID=FormatNoTrans(OtomatisID());
$total=$_SESSION['total'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("y-m-d");
$id_distri=$_POST['id_distri'];
$sql = mysql_query("insert into pasok(id_pasok,id_distributor,jumlah , tanggal) values ('$LastID','$id_distri','$total','$tanggal')");

$awal = $_SESSION['isi'];
	$j=0;
	while($j <= $awal){
		$id_buku = @$_SESSION['akhir'][$j][4];
		$jlh = @$_SESSION['akhir'][$j][2];
		$sub = @$_SESSION['akhir'][$j][3];
		$id_distributor = @$_SESSION['akhir'][$j][5];
		
		if($LastID!="" and $id_buku!="" and $jlh!=""){
			$query = mysql_query("INSERT INTO detail_pasok (id_pasok,id_buku,id_distributor,jumlah,harga_jual)
				values('$LastID','$idbuku','$id_distributor','$jlh','$sub')
			");
			if($query){
				echo "<script>alert('berhasil masuk');<script>";
			}
			$tampilid=mysql_fetch_array(mysql_query("select jlhbeli from buku where id_buku='$id_buku'"));
			@$stok_beli2=$tampilid["jlhbeli"];
			@$stok_beli3=$stok_beli2+$jlh;
			$query3 = mysql_query("
				update buku set jlhbeli='$stok_beli3' where id_buku='$id_buku' 
			");
		}
		$j++;
	}
	echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
	echo "<script>document.location.href='../okutu/transbelibuku.php';</script>";
	unset($_SESSION['isi']);
	unset($_SESSION['nilai']);
	echo "".mysql_error();

?>