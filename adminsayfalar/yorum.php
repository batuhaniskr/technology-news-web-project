<?php include('sayfalar/pdo.php')?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Yorum Tablosu
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Yorum Tablosu</li>
			
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
                        <th>yorumId</th>
                        <th>yorum</th>
                        <th>uyeId</th>
                        <th> yorumTarih</th>
                        <th>icerikId</th>
                      </tr>
                    </thead>
                    <tbody>
					 <?php $sql = $db->prepare("Select * from yorumlar" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
       ?> 
                      <tr>
					 
                        <td>
	   <?php echo $row['icerikId'] ?>
	   </td>
                        <td><?php echo $row['yorumId'] ?></td>
						<td><?php echo $row['yorum'] ?></td>
                        <td><?php echo $row['uyeId'] ?></td>
                        <td> <?php echo $row['icerikId'] ?></td>
						<td><a  href="adminindex.php?s=yorumsil.php&id=<?php echo $row['yorumId'] ?>">Sil</a></td>					
                      </tr>
                      <?php } ?>	
                      
                                       </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 </div>
			 </div></div>