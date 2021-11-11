<?php
	$server = mysql_connect("localhost","root","satusampe250599");
	$db = mysql_select_db("2017_web_native_tokobuku");
	
	if(!$server){
		echo "Maaf, Gagal tersambung dengan server !";
	}
	if(!$db){
		echo "Maaf, Gagal tersambung dengan database !";
	}
?>