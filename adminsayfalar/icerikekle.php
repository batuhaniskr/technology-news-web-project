<?php include('sayfalar/pdo.php'); ?>



       
				
				  <?php 
					
							if(isset($_POST['submit'])){ 
						
							
							$turAlan=$_POST['turId'];
							$icerikBaslikAlan=$_POST['icerikBaslik'];
							$icerikAlan=$_POST['icerik'];
							$icerikSliderAlan=$_POST['icerikslider'];
							$icerikTarihAlan=$_POST['icerikTarih'];
							$icerikBDetay=$_POST['icerikBDetay'];					
							$icerikResim=$_POST['icerikResim'];
							$icerikEk="img/veritabani/";
							$icerikResimAlan=$icerikEk.$icerikResim;
							$seoKeyAlan=$_POST['seoKey'];
							$icerikYazar=$_POST['icerikYazar'];
	
							$sql=$db->prepare("INSERT INTO `icerikler` (`icerikId`, `icerikBaslik`, `icerik`, `turId`, `icerikslider`, `videoUrl`, `onay`, `icerikTarih`, `izlenme`, `icerikResim`, `icerikBDetay`, `seoKey`, `icerikYazar`, `kod1`, `kod2`) 
			VALUES (NULL, '$icerikBaslikAlan', '$icerikAlan', $turAlan, '$icerikSliderAlan', '', '0', '$icerikTarihAlan', NULL, '$icerikResimAlan','$icerikBDetay', '$seoKeyAlan', '$icerikYazar', '', NULL)");														
							$yEkle=$sql->execute(array(NULL, '$icerikBaslikAlan', '$icerikAlan', NULL, '', '', '0', '', NULL, '', '', '', '', '', NULL));
							if($sql){
								echo "<script>alert('İçerik  Başarıyla Eklenmiştir..!!')</script>";
								//header("refresh:0; url=index.php?s=detay.php&id=".$id);
								
							}
							else {
								echo "<script>alert('İçerik Eklenememiştir..!!')</script>";
								
								}
							}
							else {
								echo "a";
							}
						
					
				?>
				
                <!-- form start -->
                
  
			          <!-- Main content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General Form Elements

          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">İçerik Ekle</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
         
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">icerikBaslik</label>
                      <input type="text" class="form-control" name="icerikBaslik" id="icerikBaslik" placeholder="icerikBaslik">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">icerik</label>
                      <input type="text" class="form-control" name="icerik" id="icerik" placeholder="icerik">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">turId</label>
                      <input type="text" class="form-control" id="turId" name="turId" placeholder="turId">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">icerikslider</label>
                      <input type="text" class="form-control" id="icerikSlider"  name="icerikslider" placeholder="icerikslider">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">icerikTarih</label>
                      <input type="text" class="form-control" id="icerikTarih" name="icerikTarih" placeholder="icerikTarih">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1"> 	icerikBDetay</label>
                      <input type="text" class="form-control" id="icerikBDetay" name="icerikBDetay" placeholder="icerikBDetay">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputFile">icerikResim</label>
                      <input type="file" id="icerikResim" name="icerikResim">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"> 	seoKey</label>
                      <input type="text" class="form-control" id="seoKey" name="seoKey" placeholder="seoKey">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputPassword1"> 	icerikYazar</label>
                      <input type="text" class="form-control" id="icerikYazar" name="icerikYazar" placeholder="icerikYazar">
                    </div>
					

					
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>

            

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->