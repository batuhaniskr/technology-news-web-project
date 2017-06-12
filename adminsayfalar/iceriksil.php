<?php include('sayfalar/pdo.php')?>
<?php 
	$id=$_GET['id'];
	$query = $db->prepare("DELETE FROM icerikler WHERE icerikId='$id'");
$delete = $query->execute(array(
   'id' => $_GET['id']
));
						if($delete){
								echo "<script>alert('İçerik Silinmiştir..!!')</script>";
								echo " <meta http-equiv='refresh' content='0;URL=adminindex.php'> "; 
								
							}
							else {
								echo "<script>alert('İçerik Silinmiştir..!!')</script>";
								
								}
							
?>