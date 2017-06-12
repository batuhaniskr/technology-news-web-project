<?php include('sayfalar/pdo.php'); ?>



       
				
				  <?php 
					$id=$_GET['id'];
							if(isset($_POST['submit'])){ 
						
							$uyeIdAlan=$_POST['uyeId'];
							$uyeTipAlan=$_POST['tip'];
							$sql=$db->prepare("UPDATE  `uyeler` SET   tip='$uyeTipAlan'  where uyeId='$id'");														
							$yEkle=$sql->execute(array($uyeIdAlan, '$uyeTipAlan'));
							
							
        
							if($sql){
								echo "<script>alert('Düzenleme Gerçekleşti..!!')</script>";
								echo " <meta http-equiv='refresh' content='0;URL=adminindex.php?s=kullanici.php'> "; 
								
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
				
				$sql = $db->prepare("Select * from uyeler where uyeId='$id'" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">uyeId</label>
                      <input type="text" class="form-control" name="uyeId" id="uyeId" placeholder="<?php echo $row['uyeId'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tip</label>
                      <input type="text" class="form-control" name="tip" id="tip" placeholder="<?php echo $row['tip'] ?>">
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