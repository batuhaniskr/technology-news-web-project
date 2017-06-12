<?php include('sayfalar/pdo.php') ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kullanıcı Tablosu
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Kullanıcı Tablosu</li>
			
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
               
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>seoId</th>
                        <th>seo</th>
                       
                      </tr>
                    </thead>
                    <tbody>
					 <?php $sql = $db->prepare("Select * from uyeler" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                      <tr>
					 
                        
                        <td><?php echo $row['uyeId'] ?></td>
						<td><?php echo $row['uyeAdsoyad'] ?></td>  
						<td><?php echo $row['email'] ?></td>    
						<td><?php echo $row['sifre'] ?></td>                       
						<td><?php echo $row['uyeTarih'] ?></td>                       
		
						<td><?php echo $row['uyeResimurl'] ?></td>   
						<td><?php echo $row['tip'] ?></td>  
						<td><a  href="adminindex.php?s=kullaniciduzenle.php&id=<?php echo $row['uyeId'] ?>">Düzenle</a></td>

						
						
			
						 
                      </tr>
                      <?php } ?>	
                      
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 </div>
			 </div></div>