<?php
if(isset($_GET['s']))
{
	$s=$_GET['s'];
	switch($s)
	{
		
		
		
	
		
		case 'icerik.php':
		include("adminsayfalar/icerik.php");
		break;
		
		
		default:
		include("adminihdex.php");
		break; 
	}
}

else
{
	include("adminihdex.php");
}
?>