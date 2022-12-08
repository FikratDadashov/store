	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<?php foreach($main_cat as $key => $value) { ?>
						<li class="p-b-10">
							<a href="<?php echo base_url('./user/catalog/'.$value['id'])?>" class="stext-107 cl7 hov-cl1 trans-04">
								<?php echo $value['name']; ?>
							</a>
						</li>
						<?php } ?>			
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in <?php echo $settings[0]['address']; ?> or call us on <?php echo $settings[0]['phone']; ?>
					</p>

					<div class="p-t-27">
						<a target="_blank" href="<?php echo $settings[0]['facebook']; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a target="_blank" href="<?php echo $settings[0]['instagram']; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>
					</div>
				</div>

			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">					
					<img src="<?php echo base_url('./assets/images/icons/icon-pay-01.png')?>" alt="ICON-PAY">
					<img src="<?php echo base_url('./assets/images/icons/icon-pay-02.png')?>" alt="ICON-PAY">				
					<img src="<?php echo base_url('./assets/images/icons/icon-pay-03.png')?>" alt="ICON-PAY">				
					<img src="<?php echo base_url('./assets/images/icons/icon-pay-04.png')?>" alt="ICON-PAY">
					<img src="<?php echo base_url('./assets/images/icons/icon-pay-05.png')?>" alt="ICON-PAY">	
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div id="settings_product" class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<!--  -->
	</div>	

<!--===============================================================================================-->	
	<script src="<?php echo base_url('./assets/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url('./assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/select2/select2.min.js')?>"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/daterangepicker/moment.min.js')?>"></script>
	<script src="<?php echo base_url('./assets/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/slick/slick.min.js')?>"></script>
	<script src="<?php echo base_url('./assets/js/slick-custom.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/parallax100/parallax100.js')?>"></script>

	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/MagnificPopup/jquery.magnific-popup.min.js')?>"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/isotope/isotope.pkgd.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/sweetalert/sweetalert.min.js')?>"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			var id = $(this).parent().parent().find('.js-name-b2').attr("id");
			var price = $(this).parent().parent().find('.stext-105').attr("id");
			var photo = $(this).parent().parent().find('.stext-105').attr("data-filter");
						
			//alert(nameProduct);
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');

				$.ajax({
				    url:"<?php echo base_url(); ?>user/add_cart",
				    method:"POST",
				    data:{id : id, nameProduct : nameProduct, price : price, photo:photo },
				    success:function(data)
				    {
				    	$('#cart_products').html(data);			    	
				    }				
				});			
	   		});
		});

		$(".js-show-modal1").click(function(){
			$('#settings_product').show();	
		  	var id = $(this).attr('data-filter');
		  	alert(id);

			$.ajax({
			    url:"<?php echo base_url(); ?>user/quick_view",
			    method:"POST",
			    data:{id:id},
			    success:function(data)
			    {
			    	//$('#products_list').css("height","455px");
		     		$('#settings_product').html(data);
			    }
		   });
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

			$(document).on("click","button.js-addcart-detail", function () {					
				var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
				var id    = $(this).parent().parent().parent().parent().find('.js-name-detail').attr("id");
				var price = $(this).parent().parent().parent().parent().find('.mtext-106').attr("id");
				var photo = $(this).parent().parent().parent().parent().find('.mtext-106').attr("data-filter");
				var size   = $('select[name=size]').val();
				var color  = $('select[name=color]').val();
				var quantity = $('input[name=num-product]').val();	
				if (quantity > 5000) {
					quantity = 5000;
				}

				var count = $('.js-show-cart').attr("data-notify");
				count++;
				$('.js-show-cart').attr('data-notify', count);

				//alert(id+" "+nameProduct+" "+price+" "+photo+" "+size+" "+color+" "+quantity);
				swal(nameProduct, "is added to cart !", "success");
				$.ajax({
				    url:"<?php echo base_url(); ?>user/add_cart",
				    method:"POST",
				    data:{id : id, nameProduct : nameProduct, price : price, photo:photo, size:size, color:color, quantity:quantity },
				    success:function(data)
				    {
				    	$('#cart_products').html(data);			    	
				    }				
				});	
			});


		$(document).on("click","div .js-hide-modal1", function () {
			$('#settings_product').hide();
		});
	
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});


	$("#main_cat button").click(function() { 
        // Get data of category
        var main_id = $(this).data('filter');
        var search  = $('#myInput').val().toLowerCase();

        if($("#price button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var price = $('#price').find('li button.filter-link-active').attr("data-filter");         	
		}

		if($("#color button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var color = $('#color').find('li button.filter-link-active').attr("data-filter");
		}

		if($("#filtering button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var filtering = $('#filtering').find('li button.filter-link-active').attr("data-filter");
		}

		if($("#paging button").hasClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1"))
		{
			var page = $('#paging').find('button.active-pagination1').attr("value");         	
		}
		else{
			page = 1;
			 $("#load_more button").attr('value', page);
		}
        
        $.ajax({
		    url:"<?php echo base_url(); ?>user/fetch",
		    method:"POST",
		    data:{main_id:main_id, color:color, price:price, filtering:filtering, page:page, search:search},
		    success:function(data)
		    {
		    	$('#products_list').css("height","auto");
	     		$('#products_list').html(data);
		    }
	   });
    });

	$( "#price button" ).click(function() 
	{ 

		var price = $( this ).data('filter');
		var search  = $('#myInput').val().toLowerCase();

		if($("#color button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var color = $('#color').find('li button.filter-link-active').attr("data-filter");			
		}

		if($("#main_cat button").hasClass("stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"))
		{
			var main_id = $('#main_cat').find('button.how-active1').attr("data-filter");			
		}

		if($("#filtering button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var filtering = $('#filtering').find('li button.filter-link-active').attr("data-filter");
		}

		if($("#paging button").hasClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1"))
		{
			var page = $('#paging').find('button.active-pagination1').attr("value");         	
		}
		else{
			page = 1;
			$("#load_more button").attr('value', page);
		}

		$("#price button").removeClass("filter-link stext-106 trans-04 filter-link-active").addClass("filter-link stext-106 trans-04");               
		$(this).addClass("filter-link stext-106 trans-04 filter-link-active");  
	
        $.ajax({
		    url:"<?php echo base_url(); ?>user/fetch",
		    method:"POST",
		    data:{main_id:main_id, color:color, price:price, filtering:filtering, page:page, search: search},
		    success:function(data)
		    {
		    	$('#products_list').css("height","auto");
	     		$('#products_list').html(data);
		    }
	   });

    });

	$( "#color button" ).click(function() { 
        var color = $( this ).data('filter');
        var search  = $('#myInput').val().toLowerCase();

		if($("#price button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var price = $('#price').find('li button.filter-link-active').attr("data-filter");         	
		}

		if($("#main_cat button").hasClass("stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"))
		{
			var main_id = $('#main_cat').find('button.how-active1').attr("data-filter");			
		}

		if($("#filtering button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var filtering = $('#filtering').find('li button.filter-link-active').attr("data-filter");
		}
		if($("#paging button").hasClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1"))
		{
			var page = $('#paging').find('button.active-pagination1').attr("value");         	
		}
		else{
			page = 1;
			$("#load_more button").attr('value', page);
		}

		$("#color button").removeClass("filter-link stext-106 trans-04 filter-link-active").addClass("filter-link stext-106 trans-04");     
		$(this).addClass("filter-link stext-106 trans-04 filter-link-active");  
        
        $.ajax({
		    url:"<?php echo base_url(); ?>user/fetch",
		    method:"POST",
		    data:{main_id:main_id, color:color, price:price, filtering:filtering, page:page, search: search},
		    success:function(data)
		    {
		    	$('#products_list').css("height","auto");
	     		$('#products_list').html(data);
		    }
	   });

    });


	$( "#filtering button" ).click(function() 
	{ 
        var filtering = $( this ).data('filter');
        var search  = $('#myInput').val().toLowerCase();
     
		if($("#price button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var price = $('#price').find('li button.filter-link-active').attr("data-filter");         	
		}

		if($("#main_cat button").hasClass("stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"))
		{
			var main_id = $('#main_cat').find('button.how-active1').attr("data-filter");
			
		}

        if($("#color button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
        {
         	var color = $('#color').find('li button.filter-link-active').attr("data-filter"); 	
        }

        if($("#paging button").hasClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1"))
		{
			var page = $('#paging').find('button.active-pagination1').attr("value");         	
		}
        else{
			page = 1;
			$("#load_more button").attr('value', page);
		}

        $("#filtering button").removeClass("filter-link stext-106 trans-04 filter-link-active").addClass("filter-link stext-106 trans-04");
        $(this).addClass("filter-link stext-106 trans-04 filter-link-active");  
        
        $.ajax({
		    url:"<?php echo base_url(); ?>user/fetch",
		    method:"POST",
		    data:{main_id:main_id, color:color, price:price, filtering:filtering, page:page, search: search},
		    success:function(data)
		    {
		    	$('#products_list').css("height","auto");
	     		$('#products_list').html(data);
		    }
	   });

    });

    	$('.m-all-7').click(function() {
            var page  = $(this).attr("value");
            var search  = $('#myInput').val().toLowerCase();

            $("#paging button").removeClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1").addClass("flex-c-m how-pagination1 trans-04 m-all-7");
        	$(this).addClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1");  

            if($("#price button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
			{
				var price = $('#price').find('li button.filter-link-active').attr("data-filter");         	
			}

			if($("#main_cat button").hasClass("stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"))
			{
				var main_id = $('#main_cat').find('button.how-active1').attr("data-filter");				
			}

	        if($("#color button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
	        {
	         	var color = $('#color').find('li button.filter-link-active').attr("data-filter"); 	
	        }

	        if($("#filtering button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
			{
				var filtering = $('#filtering').find('li button.filter-link-active').attr("data-filter");
			}

	        $.ajax({
			    url:"<?php echo base_url(); ?>user/fetch",
			    method:"POST",
			    data:{main_id:main_id, color:color, price:price, filtering:filtering, page:page, search: search},
			    success:function(data)
			    {
			    	$('#products_list').css("height","auto");
		     		$('#products_list').html(data);
			    }
		   });

        });

        

    	$('.p-lr-15').click(function() {
            var page  = $(this).attr("value");
            var search  = $('#myInput').val().toLowerCase();
            //alert(page);
            var a = page;            
            page++;

            $("#load_more button").attr('value', page);

        	//$(this).addClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1");  

            if($("#price button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
			{
				var price = $('#price').find('li button.filter-link-active').attr("data-filter");         	
			}

			if($("#main_cat button").hasClass("stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"))
			{
				var main_id = $('#main_cat').find('button.how-active1').attr("data-filter");
				
			}

	        if($("#color button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
	        {
	         	var color = $('#color').find('li button.filter-link-active').attr("data-filter"); 	
	        }

	        if($("#filtering button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
			{
				var filtering = $('#filtering').find('li button.filter-link-active').attr("data-filter");
			}

	        $.ajax({
			    url:"<?php echo base_url(); ?>user/fetch",
			    method:"POST",
			    data:{main_id:main_id, color:color, price:price, filtering:filtering, page:a, load_more:page, search: search},
			    success:function(data)
			    {
			    	$('#products_list').css("height","auto");
		     		$('#products_list').html(data);
			    }
		   });

        });

        


    	$('.how-itemcart1').click(function() {
          var rowid = $(this).parent().next().next().next().find('input').attr('rowid');
          if (typeof rowid === "undefined") {
          	var rowid = $(this).next().find('input').attr('rowid');
          }
          //alert(id);

        	  $.ajax({
			    url:"<?php echo base_url(); ?>user/update_cart",
			    method:"POST",
			    data:{rowid : rowid, qty: 0 },
			    success:function(data)
			    {
			    	location.reload();		    	
			    }				
			});	

        });

        

        /*$('input[name=num-product1]').change(function() {

        	var numProduct = Number($(this).prev().val());
        	$(this).prev().val(numProduct + 1);
        	var qty = $('.num-product').val();
         	var id = $('.how-itemcart1').attr('id');
         	alert(numProduct);

        });*/

        $('div[name="product_down"]').on('click', function(){
        var qty = Number($(this).next().val());
        var rowid = $(this).next().attr("rowid");
        qty = qty-1; 

        $.ajax({
			    url:"<?php echo base_url(); ?>user/update_cart",
			    method:"POST",
			    data:{rowid : rowid, qty:qty },
			    success:function(data)
			    {
			    	location.reload();		    	
			    }				
			});	

        //alert(price);
        //if(numProduct > 0) $(this).next().val(numProduct - 1);
    });

        $('div[name="product_up"]').on('click', function(){
        var qty = Number($(this).prev().val());
        qty = qty+1;
        var rowid = $(this).prev().attr("rowid");

        $.ajax({
		    url:"<?php echo base_url(); ?>user/update_cart",
		    method:"POST",
		    data:{rowid : rowid, qty:qty },
		    success:function(data)
		    {
		    	location.reload();		    	
		    }				
		});	

        //alert(price);
        //$(this).prev().val(numProduct + 1);
    });


        $('select[name="shipping_country"]').change(function(e) {
        	var price  = $('option:selected', this).attr('price');//$(this).attr("country_name");
        	//alert(price);
        	var total = <?php echo $this->session->sub_total; ?>
        	//total = parseInt(total.substr(11));
        	price = parseInt(price);
        	total = total+price;
        	$.ajax({
		    url:"<?php echo base_url(); ?>user/session",
		    method:"POST",
		    data:{total : total },
		    success:function(data)
		    {
		    	$("#final_price").text("$"+total);
        		$("#input_price").val(total);    	
		    }				
		});	
        	  
        	

        });


		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {

		var search  = $(this).val().toLowerCase();


		if($("#filtering button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var filtering = $('#filtering').find('li button.filter-link-active').attr("data-filter");
		}
     
		if($("#price button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
		{
			var price = $('#price').find('li button.filter-link-active').attr("data-filter");         	
		}

		if($("#main_cat button").hasClass("stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"))
		{
			var main_id = $('#main_cat').find('button.how-active1').attr("data-filter");
			
		}

        if($("#color button").hasClass("filter-link stext-106 trans-04 filter-link-active"))
        {
         	var color = $('#color').find('li button.filter-link-active').attr("data-filter"); 	
        }

        if($("#paging button").hasClass("flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1"))
		{
			var page = $('#paging').find('button.active-pagination1').attr("value");         	
		}
        else{
			page = 1;
			$("#load_more button").attr('value', page);
		}
        
        $.ajax({
		    url:"<?php echo base_url(); ?>user/fetch",
		    method:"POST",
		    data:{main_id:main_id, color:color, price:price, filtering:filtering, page:page, search: search},
		    success:function(data)
		    {
		    	$('#products_list').css("height","auto");
	     		$('#products_list').html(data);
		    }
	   });
		     






		  });
		});

	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('./assets/js/main.js')?>"></script>

</body>
</html>