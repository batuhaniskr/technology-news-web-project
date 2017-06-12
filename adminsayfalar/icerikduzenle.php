<?php include('sayfalar/pdo.php'); ?>



       
				
				  <?php 
					$id=$_GET['id'];
							if(isset($_POST['submit'])){ 
						
							$icerikBaslikAlan=$_POST['icerikBaslik'];
							$icerikAlan=$_POST['icerik'];
							$turAlan=$_POST['turId'];
							$icerikSliderAlan=$_POST['icerikslider'];
							$icerikTarihAlan=$_POST['icerikTarih'];
							$icerikBDetay=$_POST['icerikBDetay'];					
							$icerikResim=$_POST['icerikResim'];
							$icerikEk="img/veritabani/";
							$icerikResimAlan=$icerikEk.$icerikResim;
							$seoKeyAlan=$_POST['seoKey'];
							$icerikYazar=$_POST['icerikYazar'];
							
							
							$sql=$db->prepare("UPDATE  icerikler SET   icerikBaslik='$icerikBaslikAlan' , icerik='$icerikAlan' , turId='$turAlan',icerikslider='$icerikSliderAlan',icerikBDetay='$icerikBDetay'
							,icerikResim='$icerikResimAlan',icerikYazar='$icerikYazar',seokey='$seoKeyAlan',icerikTarih='$icerikTarihAlan'
    where icerikId='$id'");														
							$yEkle=$sql->execute(array(NULL, '$icerikBaslikAlan', '$icerikAlan', NULL, '', '', '0', '', NULL, '', '', '', '', '', NULL));
							
							
        
							if($sql){
								echo "<script>alert('Düzenleme Gerçekleşti..!!')</script>";
								echo " <meta http-equiv='refresh' content='0;URL=adminindex.php?s=icerik.php'> "; 
								
							}
							else {
								echo "<script>alert('Düzenleme gerçekleşemedi..!!')</script>";
								
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
            Kullanıcı Düzenle
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
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
				<?php 
				
				$sql = $db->prepare("Select * from icerikler where icerikId='$id'" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                    <div class="form-group">
                     <label for="exampleInputEmail1">icerikBaslik</label>
                      <input type="text" class="form-control" name="icerikBaslik" id="icerikBaslik" placeholder="<?php echo $row['icerikBaslik'] ?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">icerik</label>
                      <input type="text" class="form-control" name="icerik" id="icerik" placeholder="<?php echo $row['icerik'] ?>">
                    </div>                   
				   
					
					
					<div class="form-group">
                      <label for="exampleInputPassword1">turId</label>
                      <input type="text" class="form-control" id="turId" name="turId" placeholder="<?php echo $row['turId'] ?>">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputPassword1">icerikslider</label>
                      <input type="text" class="form-control" id="icerikslider" name="icerikslider" placeholder="<?php echo $row['icerikslider'] ?>">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputPassword1">icerikTarih</label>
                      <input type="text" class="form-control" id="icerikTarih" name="icerikTarih" placeholder="<?php echo $row['icerikTarih'] ?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1"> 	icerikBDetay</label>
                      <input type="text" class="form-control" id="icerikBDetay" name="icerikBDetay" placeholder="<?php echo $row['icerikBDetay'] ?>">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputFile">icerikResim</label>
                      <input type="file" id="icerikResim" name="icerikResim" >
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"> 	seoKey</label>
                      <input type="text" class="form-control" id="seoKey" name="seoKey" placeholder="<?php echo $row['seoKey'] ?>">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputPassword1"> 	icerikYazar</label>
                      <input type="text" class="form-control" id="icerikYazar" name="icerikYazar" placeholder="<?php echo $row['icerikYazar'] ?>">
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					                  
                    
                    
					
					
					
					
					
                  </div><!-- /.box-body -->
  <?php
							}
				?>
                  <div class="box-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Kayıt</button>
                  </div>
                </form>

          

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->