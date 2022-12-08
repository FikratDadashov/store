
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?php echo base_url('')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<?php foreach ($main_cat as $key => $value) { ?>
				<?php if ($value['id'] == $product[0]['main_cat_id']) { ?>
				<a href="<?php echo base_url('./user/catalog/'.$value['id'])?>" class="stext-109 cl8 hov-cl1 trans-04">
					<?php echo $value['name']; ?>
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>		
				<?php } ?>
			<?php } ?>
			

			<span class="stext-109 cl4">
				<?php echo $product[0]['name'];?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
							    <?php $array_of_photos = explode(":", $product[0]['image']); ?>
							    <?php for ($i=0; $i < count($array_of_photos) ; $i++) { ?>
								<div class="item-slick3" data-thumb="<?php echo base_url('./assets/uploads/'.$array_of_photos[$i]) ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo base_url('./assets/uploads/'.$array_of_photos[$i]) ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url('./assets/uploads/'.$array_of_photos[$i]) ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 id="<?php echo $product[0]['id'] ?>" class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $product[0]['name'];?>
						</h4>

						<span id="<?php echo $product[0]['price']; ?>" data-filter="<?php echo $product[0]['image']; ?>" class="mtext-106 cl2">
							$<?php echo $product[0]['price'];?>
						</span>

						<!-- <p class="stext-102 cl3 p-t-23">
							Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
						</p> -->
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="size">
											<?php foreach ($product_sizes as $key => $value) { ?>
												<?php for ($i=0; $i < count($sizes); $i++) { ?>
													<?php if ($value['id'] == $sizes[$i]) { ?>
														<option id="<?php echo $value['id']; ?>" ><?php echo $value['name']; ?></option>
													<?php } ?>													
												<?php } ?>												
											<?php } ?>
											<!-- <option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option> -->
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="color">
											<?php for ($i=0; $i< count($colors); $i++) { ?>
												<option id="<?php echo $colors[$i]; ?>" ><?php echo $colors[$i]; ?></option>
											<?php } ?>
											<!-- <option>Red</option>
											<option>Blue</option>
											<option>White</option>
											<option>Grey</option> -->
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" max="1000" type="number" name="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
								</div>
							</div>	
						</div>

					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $product[0]['body'];?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php foreach ($related as $key => $value) { ?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
							    <?php $array_of_photos = explode(":", $value['image']); ?>
							    <a href="<?php echo base_url('./user/product/'.$value['id'])?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								    <img src="<?php echo base_url('./assets/uploads/'.$array_of_photos[0]) ?>" alt="IMG-PRODUCT">
                                </a>
								<!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a> -->
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<?php echo $value['name']; ?>
									<span class="stext-105 cl3">
										<?php echo $value['price']; ?>$
									</span>
								</div>

								
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
		