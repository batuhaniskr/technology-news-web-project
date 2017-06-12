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

               <h2>TARTIŞMA KONULARI</h2>
			 
               <div class="tab-content">
				
                  <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
                    <ul class="small_catg popular_catg wow fadeInDown">
					
					<?php $sql = $db->prepare("Select * from sorucevap");
    $sql->execute();
	
	
    while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?>  
                      <li>
                        <div class="media wow fadeInDown">
                          <a class="media-left"  href="#"> 	
                          <?php  echo $row['uyeAdSoyad'] ?>
                          </a>
						  
                          <div class="media-body">
                            <h4 class="media-heading"><a href="index.php?s=sorucevapdetay.php&id=<?php echo  $row['soruId'] ?>"><?php  echo $row['baslik'] ?></a></h4> 
							<h9 class="media-headingc"><a href="#"><?php  echo $row['turİcerik'] ?> kategorisinde </a></h7> 
                          
                          </div>
                        </div>
                      </li>
					  <?php
	}
		 ?>

                    </ul>
                  </div>
               </div>
			
				<div class="media wow fadeInDown">
				
				</div>		
             </div>
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