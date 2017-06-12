<?php
if(isset($_GET['s']))
{
	$s=$_GET['s'];
	switch($s)
	{
		
		
		
	
		
		case 'icerik.php':
		include("adminsayfalar/icerik.php");
		break;
		
		case 'icerikekle.php':
		include("adminsayfalar/icerikekle.php");
		break;
		
		case 'seoekle.php':
		include("adminsayfalar/seoekle.php");
		break;
		
		case 'seoduzenle.php':
		include("adminsayfalar/seoduzenle.php");
		break;
		
		case 'seosil.php':
		include("adminsayfalar/seosil.php");
		break;
		
		case 'iletisima.php':
		include("adminsayfalar/iletisima.php");
		break;
		
		case 'icerikduzenle.php':
		include("adminsayfalar/icerikduzenle.php");
		break;
		
		case 'tur.php':
		include("adminsayfalar/tur.php");
		break;
		
		case 'kullanici.php':
		include("adminsayfalar/kullanici.php");
		break;
		
		case 'kullaniciduzenle.php':
		include("adminsayfalar/kullaniciduzenle.php");
		break;
		
		case 'yorum.php':
		include("adminsayfalar/yorum.php");
		break;
		
		case 'yorumsil.php':
		include("adminsayfalar/yorumsil.php");
		break;
		
	
		
		
		
		case 'iceriksil.php':
		include("adminsayfalar/iceriksil.php");
		break;
		
			
		case 'seokelimeler.php':
		include("adminsayfalar/seokelimeler.php");
		break;
		
		
		default:
		include("adminsayfalar/icerik.php");
		break; 
	}
}

else
{
	include("adminsayfalar/icerik.php");
}
?>