<?php
	$konek=mysql_connect("localhost","root","");
	$db=mysql_select_db("disributor", $konek);
	$id_dist=$_GET['id_dis'];
	echo id_dist;
	
?>