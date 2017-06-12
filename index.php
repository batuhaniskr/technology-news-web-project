<?php 
ob_start();
include("fonksiyonlar/config.php"); 
include("fonksiyonlar/kontrol.php");
session_start();			

			if(isset($_COOKIE['email']) &&  isset($_COOKIE['token']))
			{
				 $_SESSION['uyeId']=$_COOKIE['uyeId'];
				 $_SESSION['email']=$_COOKIE['email'];
				 $_SESSION['md5Id']=$_COOKIE['md5Id'];
				 $_SESSION['adsoyad']=$_COOKIE['adsoyad'];
				 $_SESSION['token']=$_COOKIE['token'];
			}

		
			?>


<!DOCTYPE html>	
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BİLİŞİM ONLİNE</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- for fontawesome icon css file -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- for content animate css file -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- google fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 
     <!-- slick slider css file -->
    <link href="css/slick.css" rel="stylesheet">     
    <!-- <link href="css/theme-red.css" rel="stylesheet"> -->  
      <link href="css/theme.css" rel="stylesheet">	 
    <!-- main site css file -->    
    <link href="style.css" rel="stylesheet">

    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
  <!-- =========================
    //////////////This Theme Design and Developed //////////////////////
    //////////// by www.wpfreeware.com======================-->

  <!-- Preloader 
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>-->
  <!-- End Preloader -->
   
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  
  <div class="container">
    <!-- start header area -->
    <header id="header">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <!-- start header top -->
          <div class="header_top">
            <div class="header_top_left">
              <ul class="top_nav">
                <li><a href="index.php">ANASAYFA</a></li>
                <li><a href="index.php?s=hakkimizda.php">HAKKIMIZDA</a></li>
                <li><a href="index.php?s=iletisim.php">İLETİŞİM</a></li>
                
				<?php 
				if(isset($_SESSION['token']) && isset($_SESSION['email'])){
					?>
					<li><a href="index.php?s=profil.php&id=(<?php echo $_SESSION['md5Id']; ?>">PROFİL(<?php echo $_SESSION['adsoyad']; ?>)</a></li>
					
					<?php include('sayfalar/pdo.php');?>

<?php 
if(isset($_SESSION['token']) && isset($_SESSION['email']) && $id=$_SESSION['md5Id'])
{
		$profilSorgu=mysql_query("select * from uyeler where email='{$_SESSION['email']}' and md5Id='{$id}'");
		
		
		if(mysql_num_rows($profilSorgu)>0)
		{
			$profilSonuc=mysql_fetch_object($profilSorgu);
			$aktiviteSorgu=mysql_query("Select * from aktiviteler where uyeId='{$profilSonuc->uyeId}' order by tarih desc limit 1");
			$aktiviteSonuc=mysql_fetch_object($aktiviteSorgu);

		}
		
?><?php if($profilSonuc->tip=="admint")
			{ ?>
			<li><a href="adminindex.php">ADMİN PANELİ</a></li>
			<?php 
			}	
			?>
					
					
					<?php 
}
		
?>

					<li><a href="index.php?s=logout.php">ÇIKIŞ</a></li>
				<?php
				}
				else{
				?>
				 <li><a href="index.php?s=uyeol.php">ÜYELİK</a></li>
					<li><a href="index.php?s=login.php">ÜYE GİRİŞİ</a></li>
              <?php	
				}
				?>
			  </ul>
            </div>
            <div class="header_top_right">
              <form class="search_form" method="post" action="index.php?s=arama.php">
                <input type="text" placeholder="Text to Search" name="kelime">
              </form>
            </div>
          </div><!-- End header top -->
          <!-- start header bottom -->
          <div class="header_bottom">
            <div class="header_bottom_left">
            <!-- for img logo -->
			
            <!-- <a class="logo" href="index.html">
              <img src="img/logo.jpg" alt="logo">
             </a>-->
             <!-- for text logo -->
              <a class="logo" href="index.html">
               Bilişim<strong>ONLİNE</strong> <span>Bilişimin Doğru Adresi</span>
             </a> 
			 
            </div>
            
          </div><!-- End header bottom -->
        </div>
      </div>
    </header><!-- End header area -->
     <!-- Static navbar -->
      <div id="navarea">
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>             
            </div>
			
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav custom_nav">
                <li class=""><a href="index.php">Anasayfa</a></li>              
                 <li>
                  <a href="index.php?s=mobil.php">MOBİL</a>
                  
                </li>            
                <li><a href="index.php?s=inceleme.php">İNCELEME</a></li>
                <li><a href="index.php?s=sosyal.php">SOSYAL MEDYA</a></li>
               
				<li><a href="index.php?s=oyun.php">OYUN</a></li>
				<li><a href="index.php?s=programlama.php">PROGRAMLAMA</a></li>	
				<li><a href="index.php?s=sorucevap.php">SORU CEVAP</a></li>				
				<li><a href="index.php?s=iletisim.php">İLETİŞİM</a></li>


              </ul>           
            </div><!--/.nav-collapse -->
			
          </div><!--/.container-fluid -->
        </nav>
      </div>
      <!-- start site main content -->
      
	  
	  <?php  include("fonksiyonlar/if.php") ?>
	  
	   <!-- start content bottom right -->
			
            <div class="col-lg-4 col-md-4">
              <div class="content_bottom_right">
                <!-- start single bottom rightbar -->

                <!-- start single bottom rightbar -->
                <div class="single_bottom_rightbar">
                  <ul role="tablist" class="nav nav-tabs custom-tabs">
                    <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">En Çok Okunanlar</a></li>
                    
                  </ul>
                  <div class="tab-content">
                  <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
                    <ul class="small_catg popular_catg wow fadeInDown">
					<?php $sayac=0; ?>
					<?php $sql = $db->prepare("Select * from icerikler order by izlenme desc limit 5" );
					$sql->execute();
					while($row=$sql->fetch(PDO::FETCH_ASSOC)) {
						$sayac++;
       ?> 
                      <li>
                        <div class="media wow fadeInDown">
                          <a class="media-left"  href="#"> 
                           <?php echo $sayac; ?>
                          </a>
                          <div class="media-body">
                            <h4 class="media-heading"><a  href="index.php?s=detay.php&id=<?php echo $row['icerikId']; ?>"><?php echo $row['icerikBaslik']; ?> </a></h4> 
                            
                          </div>
                        </div>
                      </li>
					<?php } ?>
                    </ul>
                  </div>
                  <div id="recentComent" class="tab-pane fade" role="tabpanel">
                    
                  </div>                                   
                </div>
              </div> <!-- End single bottom rightbar -->
               <div class="single_bottom_rightbar">
                
              </div>
              <div class="single_bottom_rightbar wow fadeInDown">
                <h2>Popular Linkler</h2>
                <ul>
                  <li><a href="index.php?s=sorucevap.php">Soru Cevap</a></li>
                  <li><a href="index.php?s=sosyal.php">Sosyal Ağlar</a></li>
                  <li><a href="index.php?s=programlama.php">Programlama Eğitimi</a></li>
                  <li><a href="index.php?s=mobil.php">Mobil</a></li>
                                
                </ul>
              </div>
            </div>
          </div>
          <!-- start content bottom right -->
        </div><!-- end main content bottom -->        
		</section>
    </div> <!-- /.container -->
    <footer id="footer">
      <div class="footer_top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="single_footer_top wow fadeInLeft">
                <h2>Sosyal Ağlar</h2>
                <ul class="labels_nav">
                    
                  <li>
                    <a class="btn btn-social-icon btn-twitter">
    <span class="fa fa-facebook"></span>
  </a>

                  </li>
				   <li>
                   <a class="btn btn-social-icon btn-twitter">
    <span class="fa fa-twitter"></span>
  </a>
                  </li>
				   <li>
                    <a class="btn btn-social-icon btn-twitter">
    <span class="fa fa-youtube"></span>
  </a></li>

                   
                </ul>
				
				
				 <ul class="labels_nav">
								   <li>
                    <a class="btn btn-social-icon btn-twitter">
    <span class="fa fa-google"></span>
  </a></li>
  
  
  <li>
                    <a class="btn btn-social-icon btn-twitter">
    <span class="fa fa-instagram"></span>
  </a></li>
  
  <li>
                    <a class="btn btn-social-icon btn-twitter">
    <span class="fa fa-linkedin"></span>
  </a></li>
  </ul>
  
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="single_footer_top wow fadeInDown">
                <h2>Labels</h2>
                <ul class="labels_nav">
                  <li><a href="#">Bilişim</a></li>
                  <li><a href="#">Teknoloji</a></li>
                  <li><a href="#">Programlama</a></li>
                  <li><a href="#">Bilgisayar</a></li>
                  <li><a href="#">Eğitim</a></li>
                  <li><a href="#">Mobil</a></li>
                  <li><a href="#">Oyun</a></li>
                  <li><a href="#">Sosyal  Medya</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="single_footer_top wow fadeInRight">
                <h2>About Us</h2>
                <p>Kemalpaşa Mahallesi,Serdivan/Sakarya</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="footer_bottom_left">
                <p>Copyright © 2014 <a href="index.html">Sora Red</a></p>
              </div>   
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="footer_bottom_right">
                <p>Designed BY <a href="http://wpfreeware.com/">Wpfreeware</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  <!-- jQuery google CDN Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- For content animatin  -->
  <script src="js/wow.min.js"></script>
  <!-- bootstrap js file -->
  <script src="js/bootstrap.min.js"></script> 
  <!-- slick slider js file -->
  <script src="js/slick.min.js"></script> 
  
    <!-- custom js file include -->
  <script src="js/custom.js"></script> 

  <!-- =========================
        //////////////This Theme Design and Developed //////////////////////
        //////////// by www.wpfreeware.com======================-->
    
      
  </body>
</html>