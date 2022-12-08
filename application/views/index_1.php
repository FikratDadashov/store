
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<?php foreach($slides as $key => $value) { ?>
				<div class="item-slick1 bg-overlay1" style="background-image: url(<?php echo base_url('./assets/uploads/'.$value['image']) ?>);" data-thumb="<?php echo base_url('./assets/uploads/'.$value['image']) ?>" data-caption="">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									<?php echo $value['body']; ?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									<?php echo $value['title']; ?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="<?php echo base_url('./user/catalog')?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>				
			</div>

			<div class="wrap-slick1-dots p-lr-10"></div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-95 p-b-55">
		<div class="container">
			<div class="row">
				<?php foreach($main_cat as $key => $value) { ?>
				<div class="col-md-6 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="<?php echo base_url('./assets/uploads/'.$value['image']) ?>" alt="IMG-BANNER">

						<a href="<?php echo base_url('./user/catalog/'.$value['id'])?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?php echo $value['name']; ?>
								</span>
								<!-- <span class="block1-info stext-102 trans-04">
									New Trend
								</span> -->
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div id="main_cat" class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="">
						All Products
					</button>
					<?php foreach ($main_cat as $key => $value) { ?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="<?php echo $value['id']; ?>">
						<?php echo $value['name']; ?>
					</button>
					<?php } ?>

					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input id="myInput" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul id="filtering">
								<li class="p-b-6">
									<button data-filter="" class="filter-link stext-106 trans-04 filter-link-active">
										Default
									</button>
								</li>

								<li class="p-b-6">
									<button data-filter="1" class="filter-link stext-106 trans-04">
										Price: Low to High
									</button>
								</li>

								<li class="p-b-6">
									<button data-filter="2" class="filter-link stext-106 trans-04">
										Price: High to Low
									</button>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul id="price">
								<li class="p-b-6">
									<button data-filter=""  class="filter-link stext-106 trans-04 filter-link-active">
										All
									</button>
								</li>

								<li class="p-b-6">
									<button data-filter="1"  class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</button>
								</li>

								<li class="p-b-6">
									<button data-filter="2" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</button>
								</li>

								<li class="p-b-6">
									<button data-filter="3"  class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</button>
								</li>

								<li class="p-b-6">
									<button data-filter="4" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</button>
								</li>

								<li class="p-b-6">
									<button data-filter="5" class="filter-link stext-106 trans-04">
										$200.00+
									</button>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>
							<ul id="color">
								<li class="p-b-6">
									<button  data-filter="" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</button>
								</li>
								<?php foreach ($color as $key => $value) { ?>									
								<li class="p-b-6">
									<button data-filter="<?php echo $value['name'];?>" class="filter-link stext-106 trans-04">
										<?php echo $value['name']; ?>
									</button>
								</li>
								<?php } ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div id="products_list" class="row isotope-grid">
				<?php foreach($products as $key => $value) { ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0" >
						    <?php $array_of_photos = explode(":", $value['image']); ?>
							<a href="<?php echo base_url('./user/product/'.$value['id'])?>" id="<?php echo $value['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							<img src="<?php echo base_url('./assets/uploads/'.$array_of_photos[0]) ?>" alt="IMG-PRODUCT">
							</a>
							<!-- <button id="quick_view" data-filter="<?php echo $value['id'] ?>"  class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</button> -->
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								
									<?php echo $value['name']; ?>
								

								<span id="<?php echo $value['price']; ?>" data-filter="<?php echo $value['image']; ?>" class="stext-105 cl3">
									$<?php echo $value['price']; ?>
								</span>
							</div>

							<!-- <div id="add_to_cart" class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?php echo base_url('./assets/images/icons/icon-heart-01.png')?>" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?php echo base_url('./assets/images/icons/icon-heart-02.png')?>" alt="ICON">
								</a>
							</div> -->
						</div>
					</div>
				</div>
				<?php } ?>
			</div>		

			<!-- Pagination -->
			<div id="paging" class="flex-c-m flex-w w-full p-t-38">
				<button value="1" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
					1
				</button>

				<button value="2" class="flex-c-m how-pagination1 trans-04 m-all-7">
					2
				</button>
			</div>
		</div>
	</section>

