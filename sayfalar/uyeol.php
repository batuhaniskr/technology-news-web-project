    <?php include('sayfalar/pdo.php');
	if(isset($_SESSION['token'] ) && isset($_SESSION['email']))
	{
		header("location:index.php");
	}
	if(isset($_POST['submit'])){ 
			$adsoyad=temizle(trim(mysql_real_escape_string($_POST['name'])));
			$sifre=temizle(trim(mysql_real_escape_string($_POST['sifre'])));
			$sifret=temizle(trim(mysql_real_escape_string($_POST['sifre2'])));
			$email=($_POST['email']);
			$ipadresi=$_SERVER['REMOTE_ADDR'];
			$tarih=date("Y-M-d H:m:s");
			$aktiviteAd="Üye oldu";
			$resimIsmi="si.png";
			
			if(empty($adsoyad) || empty($sifre) || empty($sifret) || empty($email)){
				$hata="Lütfen gerekli alanları doldurunuz!";
			}
			else if($sifre!=$sifret)
			{
				$hata="Şifreler aynı değil";
			}
			else if(strlen($sifre)<=5)
			{
				$hata="Şifre minimum 6 karakterden oluşmalı..";
			}
			else {
													
								
									$emailSorgu=mysql_query("select * from  uyeler Where email='{$email}' ");
									if(mysql_num_rows($emailSorgu)>0){
										$hata="Bu email adresi sistemde mevcut lütfen başka bir email adresi deneyiniz..";
									}
									else {
													$sifre=md5($sifre);
													$md5Id=md5(rand() + $adsoyad);
													$ekle=mysql_query("INSERT INTO `uyeler` (`uyeId`, `uyeAdsoyad`, `email`, `sifre`, `uyeTarih`, `md5Id`, `uyeResimurl`) VALUES (NULL, '$adsoyad', '$email', '$sifre', '$tarih','$md5Id','$resimIsmi');");
													/*if($ekle){
														echo mysql_insert_id();
													}*/
													$uyeId=mysql_insert_id();
													$aktiviteEkle=mysql_query("Insert into aktiviteler(ipAdresi,tarih,aktiviteAd,uyeId) values('$ipadresi','$tarih','$aktiviteAd','$uyeId')");
													if($ekle && $aktiviteEkle)
													{
														echo "<script>alert('Üyeliğiniz başarıyla gerçekleştirildi.');</script>";
														echo " <meta http-equiv='refresh' content='0;URL=index.php'> "; 
														
													}
													else{
														echo "<script>alert('Üyeliğiniz gerçekleşmemiştir Lütfen Tekrar deneyiniz..');</script>";
														
													}
											}
					 
			}
	}
		?>
	
	
	
	<div class="content_bottom">
            <div class="col-lg-8 col-md-8">
            <!-- start content bottom left -->
           
			  
                <!-- start business category -->

			  
				  
                 
				  
				  
				  

				   
				<div id="card">
						<h2>Üyelik  </h2>
  				
  <form class="contact_form" actions="index.php?s=uyeol.php" method="post" >
   <p><?php echo @$hata; ?> </p>
  <input  class="form-control" type="text" name="name" placeholder="Ad.."/>
  <input class="form-control" type="text"  name="email" placeholder="Mail.." />
  <input class="form-control" type="password" name="sifre"  placeholder="Parola.." /><br/>
    <input class="form-control" type="password"  name="sifre2"  placeholder="Tekrar Parola.." />
  <!-- Agree with the term of services -->


  <!--  // // // // // // // // // //  -->
  <input type="submit" id="submit" name="submit" value="Kayıt" />
 
</form>
 


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