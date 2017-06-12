<?php  include('sayfalar/pdo.php');

  if(isset($_SESSION['token']) && isset($_SESSION['email'])){
	 header("location:index.php");
 }
 $token=md5(uniqid(rand()));
 
 if(isset($_POST['submit']))
 {
	 $email=temizle(trim(mysql_real_escape_string($_POST['email'])));
	 $sifre=temizle(trim(mysql_real_escape_string($_POST['sifre'])));
	 $token=$_POST['token'];
	 $benihatirla=@$_POST['benihatirla'];
	 
	 if(empty($email) ||empty($sifre))
	 {
		 
		 $hata="Email veya şifre alanını boş bırakmayınız..!!";
	 }
	 else{
		 $sifre=md5($sifre);
		 $uyeSorgu=mysql_query("Select * from uyeler where email='{$email}' and sifre='{$sifre}'");
		 $uyeSonuc=mysql_fetch_object($uyeSorgu);
		 
		 if(mysql_num_rows($uyeSorgu)>0)
		 {
			 $uyeId=$uyeSonuc->uyeId;
			 $_SESSION['uyeId']=$uyeId;
			 $_SESSION['email']=$uyeSonuc->email;
			 $_SESSION['md5Id']=$uyeSonuc->md5Id;
			 $_SESSION['adsoyad']=$uyeSonuc->uyeAdsoyad;
			 $_SESSION['token']=$token;
			 $aktiviteAd="Üye Giriş Yaptı";
			 $ipadresi=$_SERVER['REMOTE_ADDR'];
			 date_default_timezone_set('Europe/Istanbul');
			 $tarih=date("Y-m-d H:m:s");
			 
			 
			 if($benihatirla=="on"){
				 setcookie("uyeId", $_SESSION['uyeId'],time()+3600);
				 setcookie("email", $_SESSION['email'],time()+3600);
				 setcookie("md5Id", $_SESSION['md5Id'],time()+3600);
				  setcookie("adsoyad", $_SESSION['adsoyad'],time()+3600);
				 setcookie("token", $_SESSION['token'],time()+3600);

				 
			 }
			 
			$ekle=mysql_query("Insert into aktiviteler(ipAdresi,tarih,aktiviteAd,uyeId) values('$ipadresi','$tarih','$aktiviteAd','$uyeId')");
			 if($ekle){
			 echo "<script>alert('Başarılı bir şekilde giriş yapıldı..');</script>";
echo " <meta http-equiv='refresh' content='0;URL=index.php'> "; 
			 }
			 
			 
		 }
		 else {
			$hata="Böyle bir üye sistemde kayıtlı değildir!";
		 }
		
	 }
 }
?>

	<div class="content_bottom">
            <div class="col-lg-8 col-md-8">
            <!-- start content bottom left -->
           
			  
                <!-- start business category -->

			  
				  
                 
				  
				  
				  

				   
				<div id="card">
						<h2>Oturum Aç  </h2>
  				
  <form class="contact_form" actions="index.php?s=login.php" method="post" >
   <p><?php echo @$hata; ?> </p>
 
  <input class="form-control" type="text"  name="email" placeholder="Mail.." />
  <input class="form-control" type="password" name="sifre"  placeholder="Parola.." /><br/>
 <input class="form-control" type="checkbox" name="benihatirla"  /><label>Beni Hatırlar</label><br/>
  <input type="hidden" name="token" value="<?php echo $token; ?>" />
   
  <!-- Agree with the term of services -->


  <!--  // // // // // // // // // //  -->
  <input type="submit" id="submit" name="submit" value="Giriş" />
 
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