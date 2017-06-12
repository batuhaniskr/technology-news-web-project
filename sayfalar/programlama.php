    <?php include('sayfalar/pdo.php')?>
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
                    <span class="title_text">YENİ HABERLER</span>
                  </h2>	
				  
				  <?php $sql = $db->prepare("Select * from icerikler where turId=9" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
				  
				 <div class="single_archive wow fadeInDown">
				   <div class="archive_imgcontainer">
					 <img src=<?php echo $row['icerikResim']; ?> alt="img">	
				   </div>
				   <div class="archive_caption">
					 <h2><a href="single.html"><?php echo $row['icerikBaslik']; ?></a></h2>
					 <p><?php echo $row['icerikBDetay']; ?></p>
				   </div>
				   <a class="read_more" href="index.php?s=detay.php&id=<?php echo  $row['icerikId']; ?>"><span>Devamını Oku</span></a>
				 </div><!-- start single archive -->
					<?php } ?>
                     
				  
                     
					 
				
				  
			
			  
			
				  				  
				  
				</div>

  
                </div>
                <!-- End business category -->
				
              </div><!--End content_bottom_left-->   
			  
			  <div class="pagination_area">
				<nav>
				  <ul class="pagination">
					<li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
				  </ul>
				</nav>
			  </div>
            </div>
            <!-- start content bottom right -->
            <div class="col-lg-4 col-md-4">
              <div class="content_bottom_right">
                <!-- start single bottom rightbar -->
              
          </div>
          <!-- start content bottom right -->
        </div><!-- end main content bottom -->        