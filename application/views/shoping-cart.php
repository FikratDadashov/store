
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?php echo base_url('')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
		<?php echo form_open_multipart('user/payment' ,'role="form"'); ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								<?php foreach($shoping_cart as $items) { ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
										    <?php $array_of_photos = explode(":", $items['image']); ?>
											<img src="<?php echo base_url('./assets/uploads/'.$array_of_photos[0]) ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $items['name']; ?></td>
									<td class="column-3">$ <?php echo $items['price']; ?></td>
									<td class="column-4">
										<div id="changing" class="wrap-num-product flex-w m-l-auto m-r-0">
											<div id="product_down" name="product_down" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input disabled="" rowid="<?php echo $items['rowid']; ?>" class="mtext-104 cl3 txt-center num-product" type="number"  name="num-product1" value="<?php echo $items['qty'];?>">

											<div id="product_up" name="product_up" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">$ <?php echo $items['price']*$items['qty']; ?></td>
								</tr>
								<?php } ?>

								
							</table>
						</div>

						
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span id="subtotal_price" class="mtext-110 cl2">
									$<?php $this->session->set_userdata("sub_total", $total_price); echo $total_price; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">	
								<span class="stext-112 cl8">Calculate Shipping</span>					
								<div class="p-t-15">
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select required="" class="js-select2" name="shipping_country">
											<option value="">Select a country...</option>	
											<?php foreach ($countries as $key => $value){ ?>
											<option price="<?php echo $value['price']; ?>" value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>	
											<?php } ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input required="" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input required="" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<!-- <div class="flex-w">
										<div id="update_total" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div> -->
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span name="price" id="final_price" class="mtext-110 cl2">
									$<?php echo $total_price; ?>
								</span>
							</div>
						</div>
						<input id="input_price" type="hidden" name="price" value="<?php echo $total_price; ?>" > 
						<?php if ($total_products != 0) { ?>					
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</form>