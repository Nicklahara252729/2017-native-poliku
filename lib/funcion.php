<?php
function OtomatisID() 
{ 
$querycount="SELECT count(id_pasok) as LastID FROM pasok"; 
$result=mysql_query($querycount) or die(mysql_error()); 
$row=mysql_fetch_array($result, MYSQL_ASSOC);
return $row['LastID']; 
}

function FormatNoTrans($num) { 
		$num=$num+1; switch (strlen($num)) 
		{     
		case 1 : $NoTrans = "TB0000".$num; break;     
		case 2 : $NoTrans = "TB000".$num; break;     
		case 3 : $NoTrans = "TB00".$num; break;     
		case 4 : $NoTrans = "TB0".$num; break;     
		default: $NoTrans = $num;        
		}           
		return $NoTrans; 
} 
?>