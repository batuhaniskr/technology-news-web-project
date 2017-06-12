<?php 
	try{
	$db=new PDO('mysql:host=localhost;dbname=teknoloji','root','');	
	}
	catch(PDOException $e){
		echo 'Hata' .$e->getMessage(); 
	}
	
?>