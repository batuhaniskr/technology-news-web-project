<?php
if(isset($_GET['s']))
{
	$s=$_GET['s'];
	switch($s)
	{
		
		case 'hakkimizda.php':
		include("sayfalar/hakkimizda.php");
		break;
		
		case 'profil.php':
		include("sayfalar/profil.php");
		break;
		
		
		case 'logout.php':
		include("sayfalar/logout.php");
		break;
		
			case 'adminindex.php':
		include("adminindex.php");
		break;
		
		case 'adminindex.php':
		include("adminindex.php");
		break;
		

		
		case 'guncelle.php':
		include("sayfalar/guncelle.php");
		break;
		
		case 'oyun.php':
		include("sayfalar/oyun.php");
		break;
		
		
		case 'iletisim.php':
		include("sayfalar/iletisim.php");
		break;
		
		case 'cevapsizsoru.php':
		include("sayfalar/cevapsizsoru.php");
		break;
		
		case 'detay.php':
		include("sayfalar/detay.php");
		break;
		
		case 'inceleme.php':
		include("sayfalar/inceleme.php");
		break;
		
		case 'sosyal.php':
		include("sayfalar/sosyal.php");
		break;
		
		case 'mobil.php':
		include("sayfalar/mobil.php");
		break;
		
		case 'sorucevap.php':
		include("sayfalar/sorucevap.php");
		break;
		
		case 'sorucevapdetay.php':
		include("sayfalar/sorucevapdetay.php");
		break;
	
		
		case 'programlama.php':
		include("sayfalar/programlama.php");
		break;
		
		
		case 'sorusor.php':
		include("sayfalar/sorusor.php");
		break;

		case 'arama.php':
		include("sayfalar/arama.php");
		break;
		
		case 'uyeol.php':
		include("sayfalar/uyeol.php");
		break;
		
		case 'login.php':
		include("sayfalar/login.php");
		break;
		
		
		default:
		include("sayfalar/anasayfa.php");
		break; 
	}
}

else
{
	include("sayfalar/anasayfa.php");
}
?>