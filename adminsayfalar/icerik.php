<?php include('sayfalar/pdo.php')?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            İçerik Tablosu
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
					<a href="adminindex.php?s=icerikekle.php">İÇERİK EKLE +</a>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>icerikId</th>
                        <th>icerikBaslik</th>
                        <th>icerik</th>
                        <th> turId</th>
                        <th>icerikResim</th>
                      </tr>
                    </thead>
                    <tbody>
					 <?php $sql = $db->prepare("Select * from icerikler where icerikslider!='false'" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                      <tr>
					 
                        <td>
	   <?php echo $row['icerikId'] ?>
	   </td>
                        <td><?php echo $row['icerikBaslik'] ?></td>
						<td><?php echo $row['icerik'] ?></td>
                        <td><?php echo $row['turId'] ?></td>
                        <td> <?php echo $row['icerikResim'] ?></td>
						<td><a  href="adminindex.php?s=iceriksil.php&id=<?php echo $row['icerikId'] ?>">Sil</a></td>		
						<td><a  href="adminindex.php?s=icerikduzenle.php&id=<?php echo $row['icerikId'] ?>">Düzenle</a></td>						
                      </tr>
                      <?php } ?>	
                      
                                      </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 </div>
			 </div></div>