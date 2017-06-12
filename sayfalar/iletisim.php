	     <?php include('sayfalar/pdo.php')?>
		 <div class="content_bottom">
            <div class="col-lg-8 col-md-8">
<section id="ContactContent">        
       <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- start contact area -->
           <div class="contact_area">
          
             <div class="contact_bottom">
<?php  						

					if(isset($_POST['submit']))
					{
						
						
						$iletisimAdAlan=trim(mysql_real_escape_string($_POST['iletisimAd']));	
						$iletisimMailAlan=trim(mysql_real_escape_string($_POST['iletisimMail']));	
						$iletisimBaslikAlan=trim(mysql_real_escape_string($_POST['iletisimBaslik']));
						$iletisimMesajAlan=trim(mysql_real_escape_string($_POST['iletisimMesaj']));

						if(!empty($iletisimMailAlan) || $iletisimMailAlan="" || empty($iletisimMesaj) || $iletisimMesaj="")
						{
						
								
							$sql=$db->prepare("INSERT INTO `iletisim` (`iletisimId`, `iletisimAd`, `iletisimMail`, `iletisimBaslik`, `iletisimMesaj`) VALUES (NULL, '$iletisimAdAlan', '$iletisimMailAlan', '$iletisimBaslikAlan', '$iletisimMesajAlan');");
							
							$yEkle=$sql->execute(array(NULL,$iletisimAdAlan,$iletisimMailAlan,$iletisimBaslikAlan,$iletisimMesajAlan));
						
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
					
				
				?>
               <div class="contact_us wow fadeInRightBig">
               <h2>İletişim</h2>
                
                 <form class="contact_form" method="post">
                   <input class="form-control" name="iletisimAd" id="iletisimAd" type="text" placeholder="Ad Soyad">
                   <input class="form-control" name="iletisimMail" id="iletisimMail" type="email" placeholder="E-mail(required)">
                   <input class="form-control" name="iletisimBaslik" id="iletisimBaslik"  type="text" placeholder="Başlık">
				   <textarea class="form-control" cols="30" rows="10" name="iletisimMesaj" id="iletisimMesaj" placeholder="Mesaj"></textarea>
                   <input type="submit" id="submit" name="submit" value="Send">
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