<?php
  require_once "../DbConn.php";
  if(isset($_POST['btn-submit'])){
    //get details from the form
    $id = "";
    $order = $DbConn->real_escape_string($_REQUEST['product']);
    $quantity = $DbConn->real_escape_string($_REQUEST['quantity']);
    //query
    $sql = "INSERT INTO orders (Order_id,Product,Quantity) VALUES ('$id','$order','$quantity');";
    if($DbConn->query($sql) === true){
        echo "<script language='javascript'>
            alert ('Thank you for making an order!');
        </script>";
    } 
    else{
      echo "ERROR: Could not able to execute $sql. ".$DbConn->error;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="materialize is a material design based mutipurpose responsive template">
        <meta name="keywords" content="material design, card style, material template, portfolio, corporate, business, creative, agency">
        <meta name="author" content="trendytheme.net">

        <title>Received Orders</title>

        <!--  favicon -->
        <link rel="shortcut icon" href="<?= ASSETS_URL?>/img/favicon.jpg">

        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>
        <!-- Material Icons CSS -->
        <link href="<?= ASSETS_URL?>/fonts/iconfont/material-icons.css" rel="stylesheet">
        <!-- FontAwesome CSS -->
        <link href="<?= ASSETS_URL?>/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- owl.carousel -->
        <link href="<?= ASSETS_URL?>/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
				<link href="<?= ASSETS_URL?>/owl.carousel/assets/owl.theme.default.min.css" rel="stylesheet">
				<!-- flexslider -->
        <link href="<?= ASSETS_URL?>/flexSlider/flexslider.css" rel="stylesheet">
        <!-- materialize -->
        <link href="<?= ASSETS_URL?>/materialize/css/materialize.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?= ASSETS_URL?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- shortcodes -->
        <link href="<?= ASSETS_URL?>/css/shortcodes/shortcodes.css" rel="stylesheet">
        <link href="<?= ASSETS_URL?>/css/shortcodes/login.css" rel="stylesheet">
        <!-- Style CSS -->
        <link href="<?= BASE_URL?>/style.css" rel="stylesheet">
        <!-- Custon CSS -->
        <link href="<?= ASSETS_URL?>/css/custom.css" rel="stylesheet">
        <link href="<?= ASSETS_URL?>/css/custom-utility.min.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body id="top" class="has-header-search">

        <!--header start-->
        <header id="header" class="tt-nav transparent-header">
            <div class="header-sticky light-header">
                <div class="container">    
                    <div id="materialize-menu" class="menuzord">

                        <!--logo start-->
                        <a href="index.html" class="logo-brand">
                            <img src="<?= ASSETS_URL?>/img/logos/kuguru-dark.png" alt="">
                        </a>
                        <!--logo end-->

                        <!--mega menu start-->
                        <ul class="menuzord-menu pull-right">
                          <li><a href="<?= BASE_URL?>">Home</a></li>

                          <li><a href="<?= BASE_URL?>/pages/about.php">About Us</a></li>

                          <li><a href="javascript:void(0)">Services</a>
                            <ul class="dropdown">
                              <li><a href="<?= BASE_URL?>/pages/softa.php">Softa Bottling Company</a>
                              <li><a href="<?= BASE_URL?>/pages/cateress.php">Cateress Milling Company</a>
                              <li><a href="<?= BASE_URL?>/pages/just_real.php">Just Real Estate</a>
                            </ul>
                          </li>
                          <li><a href="<?= BASE_URL?>/pages/contact.php">Contact Us</a></li>
                      </ul>
                            <!--mega menu end-->

                    </div>
                </div>
            </div>
        </header><br><br><br>
        <!--header end-->

        <section class="section gray-bg">
          <div class="container mt-30 table-responsive">

            <h2>ORDERS RECEIVED</h2>

            <table class="table table-hover table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Collection Date</th>
                    </tr>
                </thead>
                <tbody>                      
                    <?php        
                            $sql = "SELECT * FROM orders;";
                            $query =$DbConn->query($sql);
                                    
                            if ($query == true) 
                            {
                                // output data of each row
                                while($row = $query->fetch_array()) 
                                {
                                echo "<tr><td>". $row["Order_id"]. "</td><td>". $row["Name"]. "</td><td>". $row["Email"]. "</td><td>". $row["Product"]. "</td><td>". $row["Quantity"]."</td><td>". $row["Collection_date"]. "</td>";
                                }
                            }
                    ?>
                </tbody>
            </table><br><br>

          </div>
        </section>          

			<!--footer 1 start -->
			<footer class="footer footer-one">
				<div class="primary-footer custom-brand-bg">
						<div class="container">
								<a href="#top" class="page-scroll btn-floating btn-large back-top waves-effect waves-light tt-animate btt" data-section="#top">
									<i class="material-icons">&#xE316;</i>
								</a>

								<div class="row">
										<div class="col-md-4 widget clearfix">
											<div class="footer-logo">
												<img src="<?= ASSETS_URL?>/img/logos/kuguru-dark.png" alt="">
											</div>
											<p class="mt-3 text-white">
												A family owned business founded by Mr. Peter Kuguru in 1988 and has
												had experience in mass-market beverage manufacturing and distribution since 1992.
												In an effort to diversify, KFCL now has several subsidiaries such as Softa Bottling Company,
												Cateress Milling and Just Real Estate.
											</p>

												<ul class="social-link tt-animate ltr">
													<li><a title="Follow us on Facebook" href="#"><i class="fa fa-2x fa-facebook"></i></a></li>
													<li><a title="Follow us on Twitter" href="#"><i class="fa fa-2x fa-twitter"></i></a></li>
													<li><a title="Mail to info@kuguru.com" href="mailto:info@kugur.com"><i class="fa fa-2x fa-envelope"></i></a></li>
												</ul>
										</div><!-- /.col-md-3 -->

										<div class="col-md-4 widget">
												<h2 class="white-text">Imporant links</h2>

												<ul class="footer-list">
														<li><a href="<?= BASE_URL.'/pages/about.php';?>">About us</a></li>
														<li><a href="<?= BASE_URL.'/pages/softa.php';?>">Softa Bottling Company</a></li>
														<li><a href="<?= BASE_URL.'/pages/cateress.php';?>">Cateress Milling Company</a></li>
														<li><a href="<?= BASE_URL.'/pages/just_real.php';?>">Just Real Estate</a></li>
														<li><a href="#">Terms &amp; Condition</a></li>
														<li><a href="#">Privacy Policy</a></li>
														<li><a href="<?= BASE_URL.'/pages/contact.php';?>">Contact Us</a></li>
												</ul>
										</div><!-- /.col-md-3 -->

										<div class="col-md-4 widget">
												<h2 class="white-text">Join our newsletter for updates</h2>

												<form>
													<div class="form-group clearfix">
														<label class="sr-only" for="subscribe">Email address</label>
														<input type="email" class="form-control" id="subscrib" placeholder="Email address">
														<button type="submit" class="tt-animate ltr"><i class="fa fa-long-arrow-right"></i></button>
													</div>
												</form>
										</div><!-- /.col-md-3 -->
								</div><!-- /.row -->
						</div>
				</div>

				<div class="secondary-footer custom-brand-bg darken-2">
						<div class="container">
								<span class="copy-text">Copyright &copy; 2019 <a href="<?= BASE_URL?>">Kuguru Food Complex Limited</a> &nbsp;  | &nbsp;  All Rights Reserved &nbsp;</span>
						</div><!-- /.container -->
				</div><!-- /.secondary-footer -->
			</footer>
			<!--footer 1 end-->

			<!-- jQuery -->
			<script src="<?= ASSETS_URL?>/js/jquery-2.1.3.min.js"></script>
			<script src="<?= ASSETS_URL?>/bootstrap/js/bootstrap.min.js"></script>
			<script src="<?= ASSETS_URL?>/materialize/js/materialize.min.js"></script>
			<script src="<?= ASSETS_URL?>/js/menuzord.js"></script>
			<script src="<?= ASSETS_URL?>/js/jquery.easing.min.js"></script>
			<script src="<?= ASSETS_URL?>/js/jquery.sticky.min.js"></script>
			<!-- <script src="<?= ASSETS_URL?>/js/smoothscroll.min.js"></script> -->
			<script src="<?= ASSETS_URL?>/js/jquery.stellar.min.js"></script>
			<script src="<?= ASSETS_URL?>/js/imagesloaded.js"></script>
			<script src="<?= ASSETS_URL?>/js/jquery.inview.min.js"></script>
			<script src="<?= ASSETS_URL?>/js/jquery.shuffle.min.js"></script>
			<script src="<?= ASSETS_URL?>/js/bootstrap-tabcollapse.min.js"></script>
			<script src="<?= ASSETS_URL?>/owl.carousel/owl.carousel.min.js"></script>
			<script src="<?= ASSETS_URL?>/flexSlider/jquery.flexslider-min.js"></script>
			<script src="<?= ASSETS_URL?>/magnific-popup/jquery.magnific-popup.min.js"></script>
			<script src="<?= ASSETS_URL?>/js/scripts.js"></script>
    </body>
</html>