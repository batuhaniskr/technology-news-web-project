<?php include('sayfalar/pdo.php') ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SeoKelimeler Tablosu
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">İçerik Tablosu</li>
			
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
					<a href="adminindex.php?s=seoekle.php">SEO EKLE +</a>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>seoId</th>
                        <th>seo</th>
                       
                      </tr>
                    </thead>
                    <tbody>
					 <?php $sql = $db->prepare("Select * from seokelimeler" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                      <tr>
					 
                        
                        <td><?php echo $row['seoId'] ?></td>
						<td><?php echo $row['seo'] ?></td>                       
						<td><a  href="adminindex.php?s=seoduzenle.php&id=<?php echo $row['seoId'] ?>">Düzenle</a></td>		
						 <td><a  href="adminindex.php?s=seosil.php&id=<?php echo $row['seoId'] ?>">Sil</a></td>					
						 
                      </tr>
                      <?php } ?>	
                      
                                        </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 </div>
			 </div></div>