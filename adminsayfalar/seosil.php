<?php include('sayfalar/pdo.php')?>
<?php 
	$id=$_GET['id'];
	$query = $db->prepare("DELETE FROM seokelimeler WHERE seoId='$id'");
$delete = $query->execute(array(
   'id' => $_GET['id']
));
						if($delete){
								echo "<script>alert('Seo Silinmiştir..!!')</script>";
								echo " <meta http-equiv='refresh' content='0;URL=adminindex.php?s=seokelimeler.php'> "; 
								
							}
							else {
								echo "<script>alert('Seo Silinmiştir..!!')</script>";
								
								}
							
?>