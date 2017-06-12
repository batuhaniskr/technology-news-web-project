<?php
	if(isset($_SESSION['token']) 	&& isset($_SESSION['email']))
	{
				session_start();
				session_destroy();
				setcookie("uyeId","",time()-1);
				setcookie("email", "",time()-1);
				setcookie("md5Id", "",time()-1);
				setcookie("adsoyad","",time()-1);
				setcookie("token", "",time()-1);
				header("location:index.php");
			
		}
else{
	header("location:index.php");
}		
?>