<?php include('sayfalar/pdo.php')?>
<?php 
	$id=$_GET['id'];
	$query = $db->prepare("DELETE FROM yorumlar WHERE yorumId='$id'");
$delete = $query->execute(array(
   'id' => $_GET['id']
));
						if($delete){
								echo "<script>alert('Yorum Silinmiştir..!!')</script>";
								echo " <meta http-equiv='refresh' content='0;URL=adminindex.php?s=yorum.php'> "; 
								
							}
							else {
								echo "<script>alert('Yorum Silinemedi..!!')</script>";
								
								}
							
?>