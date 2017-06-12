    <?php include('sayfalar/pdo.php')?>
<?php
$kelime=trim(mysql_real_escape_string(strip_tags($_POST['kelime'])));
$bulunan=0;

	 $aramaSorgu =$db->prepare("Select * from icerikler where icerikBaslik like '%$kelime%' or icerik like '%$kelime%' ");
	 $aramaSorgu->execute();

	while($rowArama=$aramaSorgu->fetch(PDO::FETCH_ASSOC)) {
		$bulunan++;
	 ?>
	 <div class="content_bottom">
            <div class="col-lg-8 col-md-8">
            <!-- start content bottom left -->
              <div class="content_bottom_left">
			  
                <!-- start business category -->
                <div class="single_category wow fadeInDown">
			  
				<div class="archive_style_1">	
				  
                  <h2>                  
                    <span class="bold_line"><span></span></span>
                    <span class="solid_line"></span>
                    <span class="title_text"><?php echo $kelime;  ?> aramasında bulunan sonuclar</span>
                  </h2>	
				  

					
				  
				 <div class="single_archive wow fadeInDown">
				   <div class="archive_imgcontainer">
					 <img src=<?php echo $rowArama['icerikResim']; ?> alt="img">	
				   </div>
				   <div class="archive_caption">
	<h2><a href="single.html"><?php echo $rowArama['icerikBaslik']; ?></a></h2>
					 <p><?php echo $rowArama['icerikBDetay'] ?></p>
				   </div>
				   <a class="read_more" href="index.php?s=detay.php&id=<?php echo  $rowArama['icerikId']; ?>"><span>Devamını Oku</span></a>
				 </div><!-- start single archive -->
					

				  
				</div>

  
                </div>
                <!-- End business category -->
				
              </div><!--End content_bottom_left-->   
			  
			 
            </div>
            <!-- start content bottom right -->
            <div class="col-lg-4 col-md-4">
              <div class="content_bottom_right">
                <!-- start single bottom rightbar -->
              
          </div>
          <!-- start content bottom right -->
        </div><!-- end main content bottom -->        
		
<?php	}
	
?>

