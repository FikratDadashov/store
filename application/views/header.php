<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('./assets/uploads/'.$settings[0]['logo']) ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/fonts/iconic/css/material-design-iconic-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/fonts/linearicons-v1.0.0/icon-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/slick/slick.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/MagnificPopup/magnific-popup.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/vendor/perfect-scrollbar/perfect-scrollbar.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/css/main.css')?>">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="<?php echo $class;?>">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="<?php echo base_url('')?>" class="logo">
						<img src="<?php echo base_url('./assets/uploads/'.$settings[0]['logo']) ?>" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="<?php echo $main; ?>">
								<a href="<?php echo base_url('')?>">Home</a>
							</li>

							<li class="<?php echo $items; ?>" >
								<a href="<?php echo base_url('./user/catalog')?>">Shop</a>
							</li>

							<li <?php if ($total_products != 0) { ?> 
								class=" <?php echo $mycart . " label1"; ?>"  data-label1="hot" 
							<?php } ?> class="<?php echo $mycart; ?>">
								<a  href="<?php echo base_url('./user/mycart')?>">Features</a>
							</li>

							<li class="<?php echo $about_us; ?>" >
								<a href="<?php echo base_url('./user/about_us')?>">About</a>
							</li>

							<li class="<?php echo $contact; ?>">
								<a href="<?php echo base_url('./user/contact')?>">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
							<div class="icon-header-item cl4 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" 
							data-notify="<?php echo $total_products ?>">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
							
						<!-- <div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl4 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div> -->
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?php echo base_url('')?>"><img src="<?php echo base_url('./assets/uploads/'.$settings[0]['logo']) ?>" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $total_products ?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
			
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="<?php echo base_url('')?>">Home</a>
				</li>

				<li>
					<a href="<?php echo base_url('./user/catalog')?>">Shop</a>
				</li>

				<li>
					<a href="<?php echo base_url('./user/mycart')?>"   <?php if ($total_products != 0): ?>
						class="label1 rs1" data-label1="hot"
					<?php endif; ?> >Features</a>
				</li>

				<li>
					<a href="<?php echo base_url('./user/about_us')?>">About</a>
				</li>

				<li>
					<a href="<?php echo base_url('./user/contact')?>">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<!-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<button class="flex-c-m btn-hide-modal-search trans-04">
				<i class="zmdi zmdi-close"></i>
			</button>

			<form class="container-search-header">
				<div class="wrap-search-header">
					<input class="plh0" type="text" name="search" placeholder="Search...">

					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
				</div>
			</form>
		</div> -->
	</header>


	<!-- Sidebar -->
	


	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div id="cart_products" class="header-cart-content flex-w js-pscroll">
				<?php foreach ($shoping_cart as $key => $value) { ?>				
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img how-itemcart1">
						    <?php $array_of_photos = explode(":", $value['image']); ?>
							<img src="<?php echo base_url('./assets/uploads/'.$array_of_photos[0]) ?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="<?php echo base_url('./user/product/'.$value['product_id'])?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $value['name'];?>
							</a>
							<input type="hidden" rowid="<?php echo $value['rowid']; ?>" name="num-product1">

							<span class="header-cart-item-info">
								<?php echo $value['qty']; ?> x $<?php echo $value['price'];?>
							</span>
						</div>
					</li>				
				</ul>
				<?php } ?>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $<?php echo $total_price;?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="<?php echo base_url('./user/mycart')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
