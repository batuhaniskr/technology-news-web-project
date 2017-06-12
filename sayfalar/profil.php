<?php include('sayfalar/pdo.php');?>

<?php 
if(isset($_SESSION['token']) && isset($_SESSION['email']) && $id=$_SESSION['md5Id'])
{
		$profilSorgu=mysql_query("select * from uyeler where email='{$_SESSION['email']}' and md5Id='{$id}'");
		
		
		if(mysql_num_rows($profilSorgu)>0)
		{
			$profilSonuc=mysql_fetch_object($profilSorgu);
			$aktiviteSorgu=mysql_query("Select * from aktiviteler where uyeId='{$profilSonuc->uyeId}' order by tarih desc limit 1");
			$aktiviteSonuc=mysql_fetch_object($aktiviteSorgu);

		}
		
?>
<div class="profilContent">

	<div class="contact_us wow fadeInRightBig">
               <h2>PROFİL</h2>
	</div>
<div class="clear"></div>
<div class="profil">
<img src="img/uyeResimleri/<?php echo $profilSonuc->uyeResimurl;?>">
		<div class="profilbilgi">
			<div class="profilbilgia">Ad Soyad:</div> <div class="profilbilgib"><?php echo $profilSonuc->uyeAdsoyad; ?></div>
			<?php if($profilSonuc->tip=="uyee")
			{ ?>
			oşgeldinbea
			<?php 
			}	
			?>
			<div class="profilbilgia">Email:</div> <div class="profilbilgib"><?php echo $profilSonuc->email; ?></div>
			<div class="profilbilgia">Üyelik Tarihi</div> <div class="profilbilgib"><?php echo $profilSonuc->uyeTarih; ?></div>
			<!--<div class="profilbilgia">En Son Giriş</div> <div class="profilbilgib"><?php echo $aktiviteSonuc->tarih ?></div>-->
		</div>
		
		

</div>	

<div class="profilbilgic"><a href="index.php?s=guncelle.php&id=<?php echo $_SESSION['md5Id'];?>&bilgi=sifredegistir">Şifre Değiştir</a></div>
		<div class="profilbilgic"><a href="index.php?s=guncelle.php&id=<?php echo $_SESSION['md5Id'];?>&bilgi=resimdegistir">Resim Değiştir</div>

</div>
<?php 
}
		else {
			header("location:index.php");
		}
?>

