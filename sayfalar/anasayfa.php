<?php include('sayfalar/pdo.php')?>
<section id="mainContent">
        <!-- start main content top -->
        <div class="content_top">
          <div class="row">
             <!-- start content top latest slider -->
			 
            <div class="col-lg-6 col-md-6 col-sm">         
 
              <div class="latest_slider">
			
                 
				  
                <div class="slick_slider">	
						
					<?php $sql = $db->prepare("Select * from icerikler where icerikslider='true'" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                  <div class="single_iteam">
				  
                    <img src=<?php echo $row['icerikResim'] ?> alt="resim" class="boyut">										
					
				<h2><a  href="index.php?s=detay.php&id=<?php echo $row['icerikId']; ?>"><?php echo $row['icerikBaslik'] ?></a></h2>
				<!--<h4 class="media-heading"><?php echo $row['icerik'] ?></h4>-->				  	
                  </div>                 
                		
					<?php } ?>	
					
                </div> 
			
				</div>
						
              </div>
            <!-- End content top latest slider -->

            <div class="col-lg-6 col-md-6 col-sm6">
              <div class="content_top_right">
                <ul class="featured_nav wow fadeInDown">
					
					<?php $sql = $db->prepare("Select * from icerikler  order by icerikTarih desc limit 4" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                  <li>
                    <img src=<?php echo $row['icerikResim'] ?> alt="resim">		
                    <div class="title_caption">
					<a  href="index.php?s=detay.php&id=<?php echo $row['icerikId']; ?>">
                       <?php echo $row['icerikBaslik'] ?>
                      </a>
                    </div>
                  </li>
					<?php } ?>
                  
                </ul>
              </div>
            </div>
          </div>
        </div><!-- End main content top -->
     

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
                    <span class="title_text">Yeni Haberler</span>
                  </h2>					  
                              <?php 
					$sorgu=mysql_query("Select * from icerikler order by icerikTarih desc limit 6" );
					while($sonuc=@mysql_fetch_object($sorgu)){										
					?>	

					<div class="business_category_left wow fadeInDown">
				  
                    <ul class="fashion_catgnav">
                      <li>
                        <div class="catgimg2_container">
						
                          <a   href="index.php?s=detay.php&id=<?php echo $sonuc->icerikId; ?>"><img src=<?php echo $sonuc->icerikResim ?> alt="resim"></a>
					
                        </div>
                        <h2 class="catg_titile"><a href="single.html"><?php echo $sonuc->icerikBaslik ?></a></h2>
                        <div class="comments_box">
                          <span class="meta_date"><?php echo $sonuc->icerikTarih ?></span>
						  <?php 
						  $toplamYorum=mysql_query("Select count(yorumId) as tyorum from yorumlar where icerikId='{$sonuc->icerikId}'");
						  $yorumSonuc=mysql_fetch_object($toplamYorum);
					?>
                          <span class="meta_comment"><a href="#"><?php echo $yorumSonuc->tyorum; ?></a></span>
                          <span class="meta_more"><a  href="index.php?s=detay.php&id=<?php echo $sonuc->icerikId; ?>">Devamını Oku...</a></span>
          <p class="icerikBP"><?php echo $sonuc->icerikBDetay ?></p>
						
						</div>
                       
                      </li>
                    </ul>
					
                  </div>
					<?php  } ?>
               
			
                  </div>
                </div>
                <!-- End business category -->

                <!-- start games & fashion category -->
                <div class="games_fashion_area">
                <!-- start games category -->
                  <div class="games_category">
 
                  </div>
                  <!-- End games category -->
                  <!-- start fashion category -->

                </div><!-- End games & fashion category --> 
                <!-- start technology category area -->

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
          