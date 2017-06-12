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
			<div class="profilbilgia">Email:</div> <div class="profilbilgib"><?php echo $profilSonuc->email; ?></div>
			<div class="profilbilgia">Üyelik Tarihi</div> <div class="profilbilgib"><?php echo $profilSonuc->uyeTarih; ?></div>
			<div class="profilbilgia">En Son Giriş</div> <div class="profilbilgib"><?php echo $aktiviteSonuc->tarih ?></div>
		</div>
		
		

</div>	


		

		
		

<?php 
}
		else {
			//header("location:index.php");
		}
?>

<!-- Şifre Değiştir -->

<?php 
	$bilgi=$_GET['bilgi'];
	
	
	if($_SESSION['md5Id']!=$id){
		//header("location:index.php");
	}
	
	if(isset($bilgi))
	{
		if($bilgi=="sifredegistir")
		{
			//şifre değiştirme
			
		if(isset($_POST['btnSifreDegistir']))
		{
			$eskisifre=temizle(trim(mysql_real_escape_string($_POST['eskiSifre'])));
			$yeniSifre=temizle(trim(mysql_real_escape_string($_POST['yeniSifre'])));
			$yeniSifretekrar=temizle(trim(mysql_real_escape_string($_POST['yeniSifreTekrar'])));
			
			
			if(empty($eskisifre) || empty($yeniSifre) ||empty($yeniSifretekrar)){
				$hata="Bütün alanları doldurdunuz..!!!";
			}
			else if($yeniSifre!=$yeniSifretekrar)
			{
				$hata="Yeni şifreniz birbiriyle uyuşmuyor!";
			}
			else if(strlen($yeniSifre)<5 && strlen($yeniSifretekrar)<5){
				$hata="Minimum 6 karakterden oluşmalı";
			}
			else {
				
				$eskisifre=md5($eskisifre);
				$sifreSorgu=mysql_query("Select * from uyeler where md5Id='{$id}' and sifre='{$eskisifre}'");
				if(mysql_num_rows($sifreSorgu)>0){
					$yeniSifre=md5($yeniSifre);
					$guncelle=mysql_query("update uyeler set sifre='{$yeniSifre}' where md5Id='{$_SESSION['md5Id']}'");
					if($guncelle)
					{
						echo "<script>alert('Şifreniz başarıyla güncellendi..')";
						//header("refresh:0;url=index.php?s=profil.php&id=".$_SESSION['md5Id']);
					}
					else {
						echo "<script>alert('Güncelleme esnasında hata oluştu,tekrar deneyiniz...')";
					}
				}
			}
		}
		
			?>
			
	<div class="profilbilgic"><a href="index.php?s=guncelle.php&id=<?php echo $_SESSION['md5Id'];?>&bilgi=sifredegistir">Şifre Değiştir</a></div>

</div>
			<div class="content_bottom">
            <div class="col-lg-4 col-md-8">
            <!-- start content bottom left -->
        			
                <!-- start business category -->
				   
				<div id="card">
						<h2>Parola  Değiştir</h2>
  				
  <form class="contact_form" actions="index.php?s=guncelle.php&id=<?php echo $id?>&bilgi=sifredegistir" method="post" >
   <p><?php echo @$hata; ?> </p>
 
  <input class="form-control" type="password"  name="eskiSifre" placeholder="Kullandığınız Sifre" /><br>
  <input class="form-control" type="password" name="yeniSifre"  placeholder="Yeni Sifre:" /><br/>
 <input class="form-control" type="password" name="yeniSifreTekrar"  placeholder="Yeni Sifre:" /><br/>
 
   
  <!-- Agree with the term of services -->


  <!--  // // // // // // // // // //  -->
  <input type="submit"  name="btnSifreDegistir" value="Parola Değiştir" />
 
</form>
 


<?php 
		}
		else if($bilgi=="resimdegistir"){
			
			if(isset($_POST['btnResimdegistir'])){
				
				$kaynak=$_FILES['dosya']['tmp_name'];//dosyanın kaynak yolu;
				$resim=$_FILES['dosya']['name'];//dosya ismi;
				$rtipi=$_FILES['dosya']['type'];//resim tipi
				$rboyut=$_FILES['dosya']['size'];//resim boyutu;
				$uzanti=substr($resim,(strpos($resim,'.')));
				$yeniad=substr(uniqid(md5(rand())),0,35);
				$yeniResim=$yeniad.$uzanti;
				$hedef="img/uyeResimleri";
				if(isset($kaynak))
				{
					if($rtipi!="image/pjpeg" && $rtipi!="image/gif" && $rtipi!="image/jpeg"  && $rtipi!="image/xpng" && $rtipi!="image/png")
					{
						$hata="Lütfen resim seçiniz!";
					}
					else if($resim>1024*1024){//1MB tekabüt etmekte
								$hata="Max 1 MB boyutunda bir resim seçiniz";
					}
					else {
						if(move_uploaded_file($kaynak,$hedef.'/'.$yeniResim)){
							$resimSorgu=mysql_query("Select * from uyeler where md5Id='{$id}'");
							$resimSonuc=mysql_fetch_object($resimSorgu);
							if(mysql_num_rows($resimSorgu)>0)
							{
								if($resimSonuc->uyeResimurl!="")
								{
									$ekle=mysql_query("Update uyeler set uyeResimurl='{$yeniResim}' where email='{$resimSonuc->email}'");
									if($ekle){
										//unlink("img/uyeResimleri/$resimSonuc->uyeResimurl");
										echo "<script>alert('Resminiz başarıyla güncellendi..')";
										header("refresh:0;url=index.php?s=profil.php&id=".$_SESSION['md5Id']);
									}
									else {
										echo "<script>alert('Resminiz güncellenirken hata oluştu tekrar deneyiniz....')";
									}
								}
								
							}
							else {
								echo "Resim değişitirilirken bir hata oluştu!";
							}
						}
						else {
							$hata="Resim yüklenemedi!";
						}
					}
				}
				else {
					$hata="Lütfen dosya seçiniz";
				}
			}
			
		?>
						<div id="card">
						<h2>Resim  Değiştir</h2>
  				
  <form class="contact_form" actions="index.php?s=guncelle.php&id=<?php echo $id?>&bilgi=resimdegistir" method="post"  enctype="multipart/form-data">
   <p><?php echo @$hata; ?> </p>
 
  
 <input class="form-control" type="file" name="dosya"  placeholder="Dosya Yükleme:" /><br/>
 
   
  <!-- Agree with the term of services -->


  <!--  // // // // // // // // // //  -->
  <input type="submit"  name="btnResimdegistir" value="Resim Degistir"  />
 
</form>
<?php
		}
		else {
			//yönlendirme
		}
	}
	else {
		//bilgi değeri yoksa
		echo "bilgi yok";
	}
  ?>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

                 </div>
                <!-- End business category -->
				
              </div><!--End content_bottom_left-->   
			  
			 
            <!-- start content bottom right -->
            <div class="col-lg-4 col-md-4">
              <div class="content_bottom_right">
                <!-- start single bottom rightbar -->
              
          </div>
          <!-- start content bottom right -->
        </div><!-- end main content bottom -->        