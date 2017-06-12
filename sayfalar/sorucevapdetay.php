     <?php include('sayfalar/pdo.php')?>
	


	
	<div class="content_bottom">
            <div class="col-lg-8 col-md-8">
	 
				  <section id="ContactContent">        
       <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- start contact area -->
           <div class="contact_area">
            
             <div class="contact_bottom">

               <div class="contact_us wow fadeInRightBig">
			        
			    <h4><a href="index.php?s=sorusor.php">Soru Sor    |  <a href="index.php?s=cevapsizsoru.php">Cevaplanmamış Sorular</h4></a>
			   <?php 
					$id=$_GET['id'];
					$sql = $db->prepare("Select * from sorucevap where soruId='{$id}'");
    $sql->execute();
	

    while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?>  
               <h3><?php  echo $row['baslik'] ?></h2>
			      <?php  echo $row['soru'] ?>
               <div class="tab-content">
				
                  <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
                    <ul class="small_catg popular_catg wow fadeInDown">
					
					
                      <li>
                        <div class="media wow fadeInDown">
                          <div class="media-body">
                            <h4 class="media-heading"><a href="#"></a></h4> 
							
                          
                          </div>
						  
						 
						  
                          
                        </div>
                      </li>
					  

                    </ul>
                  </div>
               </div>
			   <?php
	}
		 ?>
             </div>
           </div>
		    <!-- start similar post-->
             
			 
			 <?php 
					if(isset($_POST['submit']))
					{
						$cevapAlan=trim(mysql_real_escape_string($_POST['cevap']));
						if(!empty($cevapAlan) || $cevapAlan="")
						{
							$ip=$_SERVER['REMOTE_ADDR'];
							date_default_timezone_set("Europe/Istanbul");
							$cevapTarih=date("Y-m-d H:m:s");
							$uyeId=$_SESSION['uyeId'];
							$uyeAdsoyad=$_SESSION['adsoyad'];
						
							$soruId=$id;
							//$aktivite="yorum yapıldı".$yorum;
							$sql=$db->prepare("INSERT INTO `scevapyorum` (`scevapId`, `soruId`, `cevap`, `uyeId`, `uyeAdSoyad`, `cevapTarih`) VALUES (NULL, '$soruId', '$cevapAlan', '$uyeId', '$uyeAdsoyad', '$cevapTarih')");							
							//$sqlactivite=$db->prepare("Insert Into aktiviteler(tarih,aktiviteAd,ipAdresi) values('$tarih','$aktivite','$ip')");
							$yEkle=$sql->execute(array($soruId,$cevapAlan,$uyeId,$uyeAdsoyad,$cevapTarih));
							//$aktiviteEkle=$sqlactivite->execute(array($tarih,$aktivite,$ip,$uyeId));
							$hata=$sql->errorInfo();
							//aktive şartını aramadan && $aktiviteEkle
							if($yEkle){
								echo "<script>alert('Cevabınız başarıyla Eklenmiştir..!!')</script>";
								//header("refresh:0; url=index.php?s=detay.php&id=".$id);
								
							}
							else {
								echo "<script>alert('Cevabınız Eklenememiştir..!!')</script>";
								
							}
						}
						else{
							echo "<script>alert('Yorumu Alanını Boş Bırakmayınız..!!');</script>";
						}
					}
				?>
			 
				  				<div class="comment">
				<?php @$token=$_SESSION['token'];
				      @$email=$_SESSION['email'];
					  if(isset($token) && isset($email))//içinde değer varsa anlamında
					  {
						  
						  ?>
				<!-- Uye girişi yapılmışsa yorum kısmı göster -->
				
									
				
					<h3>Yorum Bırakınız</h3>
					<div class=" contact_form">
						<form action="index.php?s=sorucevapdetay.php&id=<?php echo $id; ?>" method="post">
							
							
							<textarea class="form-control" name="cevap" id="cevap" placeholder="Cevap"></textarea>
							<input type="submit" id="submit" name="submit" class="btn-success" value="Gönder">
						</form>
					</div>
					<?php
						
					  }else  { 
				?>
			
				
				<img src="img/lockkd.png" class="bosluk"><br/><br/>
				<p>Soruyu cevaplayabilmeniz için üye girişi yapmanız gerekmektedir.</p>
				
			
					  <?php } ?>
									</div>
									
						  <div class="comment-top">
					 &nbsp
						<h2>Yorum</h2>
						<?php $sql = $db->prepare("Select * from scevapyorum as s left join uyeler as u on u.uyeId=s.uyeId where s.soruId='{$id}'");
    $sql->execute();
	
	
    while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?>  				<div class="media">
						<div class="media-left">
						  <a href="#">
							 <img class="imgprofil" src='img/UyeResimleri/<?php echo $row['uyeResimurl']; ?>' alt="">		
							 
							<!-- <img src='img/si.png' alt="">		-->
						  </a>
						</div>
					<!-- Yorumların Listelenmesi -->	
					
					<div class="media-body">
					
						  <h3 class="media-heading"><?php echo $row['uyeAdsoyad'] ?></h4>
						  
						  <p><?php  echo $row['cevap'] ?></p>
						   <span><?php  echo $row['cevapTarih'] ?></span>
					  <!-- Nested media object -->
	
							
						
				  <!-- Nested media object -->
					  
					</div>
					</div>
					<?php   }
					
						 ?>
						 
						
					
				</div>			
									

									
           <!-- End contact area -->
         </div>
       </div>
               </div></div>
			   
      </section><!-- End site main content -->
	  
	  
	  
   <!-- start content bottom right -->
            <div class="col-lg-4 col-md-4">
              <div class="content_bottom_right">
                <!-- start single bottom rightbar -->
              
          </div>
          <!-- start content bottom right -->
        </div><!-- end main content bottom -->        