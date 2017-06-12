	     <?php include('sayfalar/pdo.php')?><div class="content_bottom">
            <div class="col-lg-8 col-md-8">
<section id="ContactContent">        
       <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- start contact area -->
           <div class="contact_area">
          
             <div class="contact_bottom">
<?php  				@$token=$_SESSION['token'];
				      @$email=$_SESSION['email'];
					  if(isset($token) && isset($email))//içinde değer varsa anlamında
					  {
						  
						  	
					
					if(isset($_POST['submit']))
					{
						$uyeId=$_SESSION['uyeId'];
						$adsoyad=$_SESSION['adsoyad'];
						$email=$_SESSION['email'];
						$baslikAlan=trim(mysql_real_escape_string($_POST['baslik']));	
						$soruAlan=trim(mysql_real_escape_string($_POST['soru']));
						$turAlan=trim(mysql_real_escape_string($_POST['turİcerik']));

						if(!empty($baslikAlan) || $baslikAlan="" || empty($turAlan) || $turAlan="" ||   empty($soruAlan) || $soruAlan="" )
						{
						
								
							$sql=$db->prepare("INSERT INTO `sorucevap` (`uyeId`, `uyeAdSoyad`, `email`, `baslik`, `soru`, `cevap`, `soruId`,`turİcerik`) VALUES ('$uyeId', '$adsoyad', '$email', '$baslikAlan', '$soruAlan', '', NULL,'$turAlan')");
							
							$yEkle=$sql->execute(array($uyeId,$adsoyad,$email,$baslikAlan,$soruAlan));
						
							$hata=$sql->errorInfo();
							if($yEkle){
								echo "<script>alert('Yorumunuz Başarıyla Eklenmiştir..!!')</script>";
								//header("refresh:0; url=index.php?s=detay.php&id=".$id);
								
							}
							else {
								echo "<script>alert('Yorumunuz Eklenememiştir..!!')</script>";
								
							}
						}
						else{
							echo "<script>alert('Yorumu Alanını Boş Bırakmayınız..!!');</script>";
						}
					
					}
					  }
					  else {
						  echo "<script>alert('Yorum Yapabilmek için üye girişi yapmanız gerekmektedir.');</script>";
						  echo " <meta http-equiv='refresh' content='0;URL=index.php?s=login.php'> "; 
					  }
				
				?>
               <div class="contact_us wow fadeInRightBig">
               <h2>Soru Sor</h2>
                 <form class="contact_form" method="post">
                    <select id="turİcerik" name="turİcerik">
						<option value="Android">Android</option>
						<option value="İOS">İOS</option>
						<option value="Bilgisayar" selected>Bilgisayar</option>
						<option value="Programlama">Programlama</option>
						<option value="Oyun">Oyun</option>
						<option value="Sosyal">Sosyal</option>
						<option value="İnternet">İnternet</option>


					</select>
                   <input class="form-control" name="baslik" id="baslik" type="text" placeholder="Soru Başlık:">
                   <textarea class="form-control" cols="30" rows="10" name="soru" id="soru"  placeholder="Sorunuzun Detayları:"></textarea>
				   
                   	<input type="submit" id="submit" name="submit" class="btn-success" value="Gönder">
                 </form>
               </div>
             </div>
           </div>
           <!-- End contact area -->
         </div>
       </div>
               </div>
      </section><!-- End site main content -->  <!-- start content bottom right -->
            <div class="col-lg-4 col-md-4">
              <div class="content_bottom_right">
                <!-- start single bottom rightbar -->
              
          </div>
          <!-- start content bottom right -->
        </div><!-- end main content bottom -->        