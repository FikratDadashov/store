	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div id="main_cat" class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button  class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($checking == "") {echo " how-active1"; } ?> " data-filter="">
						All Products
					</button>

					<?php foreach ($main_cat as $key => $value) { ?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($checking == $value['id']) {echo " how-active1"; } ?>" data-filter="<?php echo $value['id']; ?>">
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
									<button data-filter="1" href="#" class="filter-link stext-106 trans-04">
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

							<ul id="price" >
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
						<div class="block2-pic hov-img0">
						    <?php $array_of_photos = explode(":", $value['image']); ?>
							<a href="<?php echo base_url('./user/product/'.$value['id'])?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							<img src="<?php echo base_url('./assets/uploads/'.$array_of_photos[0]) ?>" width="270" height="270" alt="IMG-PRODUCT">
							</a>

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								
									<?php echo $value['name']; ?>
								

								<span class="stext-105 cl3">
									$<?php echo $value['price']; ?>
								</span>
							</div>

							<!-- <div class="block2-txt-child2 flex-r p-t-3">
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

			<!-- Load more -->
			<div id="load_more" class="flex-c-m flex-w w-full p-t-45">
				<button value="1" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</button>
			</div>
		</div>
	</div>
		
