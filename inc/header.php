<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= isset($page_title) && !empty($page_title) ? $page_title : 'Kuguru Food Complex Limited'; ?></title>

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

    <body id="top">
			<!--header start-->
			<header id="header" class="tt-nav">

				<div class="header-sticky light-header">
					<div class="container">
							<div id="materialize-menu" class="menuzord">

									<!--logo start-->
									<a href="<?= BASE_URL?>" class="logo-brand">
										<img class="logo-dark" src="<?= ASSETS_URL?>/img/logos/kuguru-dark.png" alt=""/>
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
												</ul>
											</li>
											<li><a href="<?= BASE_URL?>/pages/contact.php">Contact Us</a></li>
									</ul>
									<!--mega menu end-->

							</div>
					</div>
				</div>

			</header>
			<!--header end-->