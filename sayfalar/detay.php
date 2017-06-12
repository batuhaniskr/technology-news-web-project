<?php include('sayfalar/pdo.php')?>
<?php 
	$id=$_GET['id'];
	$iceriksorgu=mysql_query("Select * from icerikler where icerikId=$id");	
	$icerikSonuc=mysql_fetch_object($iceriksorgu);
	
	
	if(!isset($icerikSonuc->icerikId)){
			header("index.php");
	}	
	else {
		
	$ip=$_SERVER['REMOTE_ADDR'];
	date_default_timezone_set('Europe/Istanbul');
	$tarih=date("Y-m-d");
	$saat=date("H:m:s");
	$hitSorgu=mysql_query("Select * from reyting where ipAdresi='$ip' and tarih='$tarih' and icerikId='$icerikSonuc->icerikId'");
	$hitsonuc=mysql_fetch_object($hitSorgu); 
	
	
			if(!$hitsonuc){
				$reytingInsert=("Insert Into  reyting(ipAdresi,tarih,icerikId,saat) values('$ip',$tarih','$icerikSonuc->icerikId,'$saat')");

				$reytingUpdate=("Update icerikler set izlenme=izlenme +1 where icerikId='{$icerikSonuc->icerikId} '");
			}

}
	
	
?>


<div class="content_bottom">
	<div class="col-lg-8 col-md-8">
            <!-- start content bottom left -->
              <div class="content_bottom_left">                
                <div class="single_page_area">
			
                  <ol class="breadcrumb">
                    <li><a href="index.php">Anasayfa</a></li>
									<?php
	$id=$_GET['id'];
	$iceriksorgutarih=mysql_query("Select * from icerikler as i inner join turler as t on i.turId=t.turId where i.icerikId='$id'");
	$icerikSonucTarih=mysql_fetch_object($iceriksorgutarih);
	{	
?>
                    <li><a href="#"><?php echo $icerikSonucTarih->turİcerik ?></a></li>
	<?php } ?>
						<?php
	$id=$_GET['id'];
	$iceriksorgu=mysql_query("Select * from icerikler where icerikId=$id");
	$icerikSonuc=mysql_fetch_object($iceriksorgu);
	{
	
?>
                    <li class="active"><?php echo $icerikSonuc->icerikBaslik ?></li>
                  </ol>

                  <h2 class="post_titile"><?php echo $icerikSonuc->icerikBaslik ?></h2>

                  <div class="single_page_content">
                    <div class="post_commentbox">
                      <a href="#"><i class="fa fa-user"></i><?php echo $icerikSonuc->icerikYazar ?></a>
                      <span><i class="fa fa-calendar"></i><?php echo $icerikSonuc->icerikTarih; ?></span>
                      <a href="#"><i class="fa fa-tags"></i><?php echo $icerikSonucTarih->turİcerik ?></a>
                    </div>
					
					  <p><?php echo $icerikSonuc->icerikBDetay ?></p>					
                    <img class="img-center" src=<?php echo $icerikSonuc->icerikResim ?> >
                    <p><?php echo $icerikSonuc->icerik; ?></p>
					<?php if($icerikSonuc->kod1!=NULL) { ?> 
					<pre class="pre"><?php echo nl2br($icerikSonuc->kod1); ?></pre><?php } ?>
					</br>
                    <!-- Etiket-->
					Etiketler:
					<?php 
					 
	   
					$keywords=preg_split("/[,]+/",$icerikSonuc->seoKey); 
					if($keywords[0]!=0){
						for($i=0;$i<count($keywords);$i++)
						{	
$sql = $db->prepare("select seo from seokelimeler where seoId='{$keywords[$i]}'");
    $sql->execute();
	
	
    while($etiketsonuc=$sql->fetch(PDO::FETCH_ASSOC)) {
     				
				
	echo '<a href="#">'.$etiketsonuc['seo'].'</a>';
						if($i!=(count($keywords)-1))
							echo ',';
						}
						}
					}
             ?>
                   
                  </div>   
	<?php } ?>				  
                </div>                  
              <!--End content_bottom_left--> 
			  
              
			  
              <!-- start share post -->
              <div class="share_post">
                <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
                <a class="twitter" href="#"><i class="fa fa-twitter"></i>Twitter</a>
                <a class="googleplus" href="#"><i class="fa fa-google-plus"></i>Google+</a>
                <a class="linkedin" href="#"><i class="fa fa-linkedin"></i>LinkedIn</a>
                <a class="stumbleupon" href="#"><i class="fa fa-stumbleupon"></i>StumbleUpon</a>
                <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>Pinterest</a>
              </div><!-- End share post -->			  
			  
              <!-- start similar post-->
              <div class="similar_post">
                
				  <?php 
					if(isset($_POST['submit']))
					{
						$yorum=trim(mysql_real_escape_string($_POST['comment']));
						if(!empty($yorum) || $yorum="")
						{
							$ip=$_SERVER['REMOTE_ADDR'];
							date_default_timezone_set("Europe/Istanbul");
							$tarih=date("Y-m-d H:m:s");
							$uyeId=$_SESSION['uyeId'];
							$uyeAdsoyad=$_SESSION['adsoyad'];
							$icerikId=$id;
							$aktivite="yorum yapıldı".$yorum;
							$sql=$db->prepare("Insert into yorumlar(yorum,yorumTarih,uyeId,uyeAdsoyad,icerikId) values('$yorum','$tarih','$uyeId','$uyeAdsoyad','$icerikId')");							
							$sqlactivite=$db->prepare("Insert Into aktiviteler(tarih,aktiviteAd,ipAdresi) values('$tarih','$aktivite','$ip')");
							$yEkle=$sql->execute(array($yorum,$tarih,$uyeId,$uyeAdsoyad,$icerikId));
							$aktiviteEkle=$sqlactivite->execute(array($tarih,$aktivite,$ip,$uyeId));
							$hata=$sql->errorInfo();
							//aktive şartını aramadan && $aktiviteEkle
							if($yEkle){
								echo "<script>alert('Yorumunuz Başarıyla Eklenmiştir..!!')</script>";
								//header("refresh:0; url=index.php?s=detay.php&id=".$id);
								
							}
							else {
								echo "<script>alert('Yorumunuz Eklenememiştir..!!')</script>";
								header("refresh:0; url=index.php?s=detay.php&id=".$id);
							}
						}
						else{
							echo "<script>alert('Yorumu Alanını Boş Bırakmayınız..!!');</script>";
						}
					}
				?>
				<div class="comment">
				
				<!-- Uye girişi yapılmışsa yorum kısmı göster -->
				
				<?php @$token=$_SESSION['token'];
				      @$email=$_SESSION['email'];
					  if(isset($token) && isset($email))//içinde değer varsa anlamında
					  {
						  
						  ?>
					
				
					<h3>Yorum Bırakınız</h3>
					<div class=" contact_form">
						<form action="index.php?s=detay.php&id=<?php echo $id; ?>" method="post">
							
							<textarea class="form-control" name="comment" id="comment" placeholder="Message"></textarea>
							<input type="submit" id="submit" name="submit" class="btn-success" value="Gönder">
						</form>
					</div>
					<?php
					  }else  echo "Yorum yapabilmeniz için üye girişi yapmanız gerekmektedir.";
				?>
				</div>
				
				
				    <div class="comment-top">
					 &nbsp
						<h2>Yorum</h2>
						<?php $sql = $db->prepare("Select * from yorumlar as y left join uyeler as u on u.uyeId=y.uyeId where y.icerikId='{$id}'");
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
					
						  <h4 class="media-heading"><?php echo $row['uyeAdsoyad'] ?></h4>
						  
						  <p><?php  echo $row['yorum'] ?></p>
						   <span><?php  echo $row['yorumTarih'] ?></span>
					  <!-- Nested media object -->
	
							
						
				  <!-- Nested media object -->
					  
					</div>
					</div>
					<?php   }
					
						 ?>
						 
						
					
				</div>
				

				
				
              </div>
				</div>
              <!-- End similar post-->
			  </div>
	
		