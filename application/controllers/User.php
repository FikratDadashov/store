<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index()
	{		
		$this->load->library('cart');

		$query['settings']= $this->db->select('*')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')->where('language_id', 1)->get()->result_array();

		$query['class'] = "header-v3";

		$query['slides']= $this->db->select('*')
		->from('store_slide')->join('store_slide_language', 'store_slide_language.relation_id = store_slide.id')
		->where('status', 1)->where('language_id',1)
		->get()->result_array();

		$query['shoping_cart'] = $this->cart->contents();
		$query['total_products'] = count($this->cart->contents());
		//print_r($query['total_products']);
		
		$query['total_price'] = $this->cart->total();


		$query['main_cat'] = $this->db->select('store_product_main_category.id,store_product_main_category.image,store_product_main_category_language.name ')->from('store_product_main_category')
		->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
		->where('language_id', 1)->get()->result_array();

		$query['products'] = $this->db->select('store_product_item_language.name, store_product_item.price, store_product_item.id, store_product_item.image')
		->from('store_product_item')->limit(20)
		->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
		->where('store_product_item_language.language_id', 1)
		->order_by('rand()')->get()->result_array(); 

		$query['color'] = $this->db->select('store_product_color.id, store_product_color_language.name')->from('store_product_color')
		->join('store_product_color_language','store_product_color_language.relation_id = store_product_color.id')
		->where('language_id', 1)->where('status', 1)->get()->result_array();

		$query['size'] = $this->db->select('store_product_size.id, store_product_size_language.name')->from('store_product_size')
		->join('store_product_size_language','store_product_size_language.relation_id = store_product_size.id')
		->where('language_id', 1)->where('status', 1)->get()->result_array();

		
		//print_r($this->db->last_query()); 		
		$query['main'] = "active-menu";
		$query['about_us'] = "";
		$query['items'] = "";
		$query['mycart'] = "";
		$query['contact'] = "";
		$query['news'] = "";

		$this->load->view('header', $query);	
		$this->load->view('index_1' , $query);	
		$this->load->view('footer', $query);	
		
	}

	public function product()
	{	
		$id = $this->uri->segment(3);
		$query['class'] = "header-v4";
		$query['shoping_cart'] = $this->cart->contents();
		$query['total_price'] = $this->cart->total();

		$query['product'] = $this->db->select('store_product_item.id, store_product_item.main_cat_id, store_product_item.sub_cat_id, store_product_item.image,store_product_item.price, store_product_item_language.name, store_product_item_language.body')->from('store_product_item')
		->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
		->where('store_product_item.id', $id)->where('store_product_item_language.language_id', 1)
		->get()->result_array();

		$query['main_cat'] = $this->db->select('main.id, main_lan.name')->from('store_product_main_category main')
		->join('store_product_main_category_language main_lan', 'main_lan.relation_id = main.id')
		->where('main.status', 1)->where('main_lan.language_id', 1)->get()->result_array();

		$sub_cat_id = $query['product'][0]['sub_cat_id'];

		$query['colors'] = $this->db->select('store_product_item.color_id')->from('store_product_item')
		->where('store_product_item.id', $id)->get()->result_array();
		
		$query['sizes'] = $this->db->select('store_product_item.size_id')->from('store_product_item')
		->where('store_product_item.id', $id)->get()->result_array();

		$query['colors'] = explode(",", $query['colors'][0]['color_id']);
		$query['sizes'] = explode(",", $query['sizes'][0]['size_id']);


		$query['product_sizes'] = $this->db->select('store_product_size_language.name, store_product_size.id')->from('store_product_size')
		->join('store_product_size_language', 'store_product_size_language.relation_id = store_product_size.id')
		->where('store_product_size_language.language_id', 1)->get()->result_array();

		


		$query['shoping_cart'] = $this->cart->contents();
		$query['total_products'] = count($this->cart->contents());
		//print_r($query['total_products']);
		
		$query['total_price'] = $this->cart->total();		


		$query['related'] = $this->db->select('store_product_item.id, store_product_item.image, store_product_item_language.name, store_product_item.price')
		->from('store_product_item')
		->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
		->where('store_product_item.sub_cat_id', $sub_cat_id)->where('store_product_item_language.language_id', 1)->limit(8)
		->order_by('rand()')
		->get()->result_array();

		//$sub_cat_id = $query['product'][0]['sub_cat_id'];
		
		$query['settings']= $this->db->select('*')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')->where('language_id', 1)->get()->result_array();		

		$query['main'] = "";
		$query['about_us'] = "";
		$query['items'] = "active-menu";
		$query['mycart'] = "";
		$query['contact'] = "";
		$query['news'] = "";

		$this->load->view('header', $query);	
		$this->load->view('product-detail' , $query);	
		$this->load->view('footer', $query);	
		
	}

	public function fetch()
	{
		$main_id = $this->input->post('main_id');
		$price = $this->input->post('price');
		$color = $this->input->post('color');
		$filtering = $this->input->post('filtering');
		$page = $this->input->post('page');
		$load_more = $this->input->post('load_more');
		$page = $this->input->post('page');
		$search = $this->input->post('search');
				
		$string = "";
		$sort = "";
		
		if ($main_id != "") {
			$string .= ' AND store_product_item.main_cat_id ='.$main_id;			
		}
		if ($search != "") {
			$string .= ' AND store_product_item_language.name Like "%'.$search.'%"';
		}
		if ($color != "") {
			$string .= ' AND store_product_item.color_id Like "%'.$color.'%"';
		}

		if ($price == "0") {
			$string .= ' AND store_product_item.price >=0 ';
		}

		if ($price == "1") {
			$string .= ' AND store_product_item.price >=0 and store_product_item.price <=50';
		}

		if ($price == "2") {
			$string .= ' AND store_product_item.price >=50 and store_product_item.price <=100';
		}

		if ($price == "3") {
			$string .= ' AND store_product_item.price >=100 and store_product_item.price <=150';
		}

		if ($price == "4") {
			$string .= ' AND store_product_item.price >=150 and store_product_item.price <=200';
		}

		if ($price == "5") {
			$string .= ' AND store_product_item.price >=200';
		}

		if ($filtering == "1") {
			$sort .= ' ORDER BY store_product_item.price ASC ';
		}

		if ($filtering == "2") {
			$sort .= ' ORDER BY store_product_item.price DESC ';
		}
		
		if ($load_more != "") 
		{
			$sort.='LIMIT 0 , '.(($page)*20+20);
		}
		else{
			$sort.='LIMIT '.(($page-1)*20)." , 20 ";
		}


		
		if (!$page || $page<=0){
			$page = 1;
		}
		$out = '';


		$query['page']=$page;
		//echo '<script>console.log('.$child_id.')</script>';
	

		$products = $this->db->query("SELECT `store_product_item_language`.`name`, `store_product_item`.`id`, `store_product_item`.`price`, `store_product_item`.`image` FROM `store_product_item` JOIN `store_product_item_language` ON `store_product_item_language`.`relation_id` = `store_product_item`.`id` WHERE `store_product_item`.`status` = 1".$string." AND `store_product_item_language`.`language_id` = 1 ".$sort)->result_array();

			//print_r($this->db->last_query());			
		
		//echo '<script>alert('.count($products).')</script>';	

		if (count($products) != 0) 
		{	
			foreach($products as $value)
			{
			    $array_of_photos = explode(":", $value['image']);
				$out .=  '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
			
					<div class="block2">
						<div class="block2-pic hov-img0">
						<a href="'.base_url('./user/product/'.$value['id']).'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							<img src="'.base_url('./assets/uploads/'.$array_of_photos[0]).'" alt="IMG-PRODUCT">
						</a>
							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								
									'.$value['name'].'
								

								<span class="stext-105 cl3">
									$'.$value['price'].'
								</span>
							</div>

						</div>
					</div>
				
				</div>';
			}
		}
		echo $out;
		die();
		
	}
	
	public function contact()
	{
		$this->load->library('cart');
		
		$query['shoping_cart'] = $this->cart->contents();
		$query['total_price'] = $this->cart->total();
		$query['total_products'] = count($this->cart->contents());
		
		$query['main_cat'] = $this->db->select('main.id, main_lan.name')->from('store_product_main_category main')
		->join('store_product_main_category_language main_lan', 'main_lan.relation_id = main.id')
		->where('main.status', 1)->where('main_lan.language_id', 1)->get()->result_array();

		$query['settings']= $this->db->select('*')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')->where('language_id', 1)->get()->result_array();

		$query['about']= $this->db->select('background_image')->from('store_about')->where('store_about.id', 1)->get()->result_array();

		$query['class'] = "header-v4";
		$query['shoping_cart'] = $this->cart->contents();
		$query['total_price'] = $this->cart->total();

		$query['main'] = "";
		$query['about_us'] = "";
		$query['items'] = "";
		$query['mycart'] = "";
		$query['contact'] = "active-menu";
		$query['news'] = "";	

		$this->load->view('header', $query);	
		$this->load->view('contact', $query);	
		$this->load->view('footer', $query);	
	}

	public function add_cart()
	{
		$this->load->library('cart');

		$id = $this->input->post('id');
		$nameproduct = $this->input->post('nameProduct');
		$price = $this->input->post('price');
		$photo = $this->input->post('photo');
		$size = $this->input->post('size');
		$color = $this->input->post('color');
		$quantity = $this->input->post('quantity');
		
		$data = array(
        'id'      => $id,
        'qty'     => $quantity,
        'price'   => $price,
        'name'    => $nameproduct,
        'image'	  => $photo,
        'product_id' => $id,	
        'size' => $size,
        'color' => $color
    );

		$this->cart->insert($data);

		//print_r($this->cart->contents());
		$out = "";

		foreach ($this->cart->contents() as $items){
			$out.='
			<ul class="header-cart-wrapitem w-full">
				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img how-itemcart1">
						<img src="'.base_url('./assets/uploads/'.$items['image']).'" alt="IMG">
					</div>

					<div class="header-cart-item-txt p-t-8">
						<a href="'.base_url('./user/product/'.$items['product_id']).'" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							'.$items['name'].'
						</a>
						<input type="hidden" rowid="'.$items['rowid'].'" name="num-product1">
						<span class="header-cart-item-info">
							'.$items['price'].'
						</span>
					</div>
				</li>
			</ul>';

		}

		$out.='
		<div class="w-full">
			<div class="header-cart-total w-full p-tb-40">
				Total: $'.$this->cart->total().'
			</div>


            <div class="header-cart-buttons flex-w w-full">
				<a href="'.base_url('./user/mycart').'" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
					View Cart
				</a>
			</div>
		</div>';

		echo $out;
		die();

	}


	public function remove_cart()
	{
		$this->load->library('cart');

		$id = $this->input->post('id');
		$data = array(
        'rowid' => $id,
        'qty' => 0
		);
		$this->cart->update($data);		
		//print_r($this->cart->contents());
	}

	public function update_cart()
	{
		$this->load->library('cart');

		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('qty');
				

		$data = array(
        'rowid' => $rowid,
        'qty' => $qty
		);
		$this->cart->update($data);		
		//print_r($this->cart->contents());
	}

	public function mycart()
	{
		$query['main'] = "";
		$query['about_us'] = "";
		$query['items'] = "";
		$query['mycart'] = "active-menu";
		$query['contact'] = "";

		$query['shoping_cart'] = $this->cart->contents();
		$query['total_products'] = count($this->cart->contents());		
		$query['total_price'] = $this->cart->total();

		$query['main_cat'] = $this->db->select('store_product_main_category.id,store_product_main_category.image,store_product_main_category_language.name ')->from('store_product_main_category')
		->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
		->where('language_id', 1)->get()->result_array();

		$query['countries'] = $this->db->select('store_shipping_country.id, store_shipping_country.price, store_shipping_country_language.name')->from('store_shipping_country')
		->join('store_shipping_country_language','store_shipping_country_language.relation_id = store_shipping_country.id')
		->where('language_id', 1)->where('status', 1)->get()->result_array();

		$query['settings']= $this->db->select('*')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')->where('language_id', 1)->get()->result_array();		

		$query['class'] = "header-v4";

		$this->load->view('header', $query);
		$this->load->view('shoping-cart',$query );
		$this->load->view('footer', $query);

	}

	public function message()
	{
		$email = $this->input->post('email');
		$text = 	$this->input->post('msg');	
		//print_r($email." ". $text);
		
		$from = "raksanazeyd.com@gmail.com";
		$mailPassword = "raksanazeyd15_06_2020";

		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => $from,
			'smtp_pass' => $mailPassword,
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
			);


		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$mailContent = '
			<h2>Contact Request Submitted</h2>
			
			<p><b>Email: </b>'.$email.'</p>
			<p><b>Message: </b>'.$text.'</p>
			';



			$this->email->to($from);
			//$this->email->to($to2);
			$this->email->from($from);
			$this->email->message($mailContent);
			$this->email->send();


			//echo $this->email->print_debugger();

		redirect('/user/contact');		

	}

	public function about_us()
	{	
		$query['settings']= $this->db->select('*')->from('store_setting')->get()->result_array();
		$query['title']= $this->db->select('*')->from('store_setting_language')->get()->result_array();
		$query['about']= $this->db->select('*')->from('store_about')
		->join('store_about_language', 'store_about_language.relation_id = store_about.id')
		->where('store_about_language.language_id', 1)->get()->result_array();

		$query['shoping_cart'] = $this->cart->contents();
		$query['total_products'] = count($this->cart->contents());
		$query['total_price'] = $this->cart->total();


		$query['main_cat'] = $this->db->select('main.id, main_lan.name')->from('store_product_main_category main')
		->join('store_product_main_category_language main_lan', 'main_lan.relation_id = main.id')
		->where('main.status', 1)->where('main_lan.language_id', 1)->get()->result_array();

		$query['settings']= $this->db->select('*')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')->where('language_id', 1)->get()->result_array();


		$query['class'] = "header-v4";
		$query['shoping_cart'] = $this->cart->contents();
		$query['total_price'] = $this->cart->total();


		$query['main'] = "";
		$query['about_us'] = "active-menu";
		$query['items'] = "";
		$query['mycart'] = "";
		$query['contact'] = "";
		$query['news'] = "";
		
		$this->load->view('header', $query);
		$this->load->view('about', $query);
		$this->load->view('footer', $query);		
	}


	public function catalog()
	{	
		$main_id = $this->uri->segment(3);

		$query['class'] = "header-v4";
		$query['count']= $this->db->from("store_product_item")->where('store_product_item.status', 1)->count_all_results();
		$query['shoping_cart'] = $this->cart->contents();
		$query['total_products'] = count($this->cart->contents());		
		$query['total_price'] = $this->cart->total();
		$a = $query['count'];

		$query['settings'] = $this->db->select('*')->from('store_setting')->get()->result_array();
		$query['title'] = $this->db->select('*')->from('store_setting_language')->get()->result_array();
		$query['about'] = $this->db->select('*')->from('store_about')->get()->result_array();
		$query['list'] = $this->db->select('*')->from('store_about')->get()->result_array();

		if ($main_id != "") 
		{
			$query['products'] = $this->db->select('store_product_item_language.name, store_product_item.id,store_product_item.price, store_product_item.image')->from('store_product_item')
			->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
			->where('store_product_item.status', 1)->where('store_product_item.main_cat_id', $main_id)->where('store_product_item_language.language_id', 1)->limit(20)->get()->result_array();
		}

		else
		{
			$query['products'] = $this->db->select('store_product_item_language.name, store_product_item.id,store_product_item.price, store_product_item.image')->from('store_product_item')
			->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
			->where('store_product_item.status', 1)->where('store_product_item_language.language_id', 1)->limit(20)->get()->result_array();
		}

		$query['main_cat'] = $this->db->select('main.id, main_lan.name')->from('store_product_main_category main')
		->join('store_product_main_category_language main_lan', 'main_lan.relation_id = main.id')
		->where('main.status', 1)->where('main_lan.language_id', 1)->get()->result_array();

		$query['sub_cat'] = $this->db->select('sub.id, sub.main_cat_id, sub_lan.name')->from('store_product_sub_category sub')
		->join('store_product_sub_category_language sub_lan', 'sub_lan.relation_id = sub.id')
		->where('sub.status', 1)->where('sub_lan.language_id', 1)->get()->result_array();

		$query['color'] = $this->db->select('store_product_color.id, store_product_color_language.name')->from('store_product_color')
		->join('store_product_color_language','store_product_color_language.relation_id = store_product_color.id')
		->where('language_id', 1)->where('status', 1)->get()->result_array();

		$query['size'] = $this->db->select('store_product_size.id, store_product_size_language.name')->from('store_product_size')
		->join('store_product_size_language','store_product_size_language.relation_id = store_product_size.id')
		->where('language_id', 1)->where('status', 1)->get()->result_array();
		$query['checking'] = $main_id;

		$query['settings']= $this->db->select('*')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')->where('language_id', 1)->get()->result_array();

		
		$query['main'] = "";
		$query['about_us'] = "";
		$query['items'] = "active-menu";
		$query['mycart'] = "";
		$query['contact'] = "";	
		$query['news'] = "";
		
		$this->load->view('header', $query);
		$this->load->view('product', $query);
		$this->load->view('footer', $query);		
	}

	public function payment()
	{
		$price = $this->session->price;

		$state = $_POST['state'];
		$postcode = $_POST['postcode'];	
		$country_id = $_POST['shipping_country'];
		
		$input['value'] = array('price'=> $price, 'country_id' => $country_id , 'state' => $state, 'postcode' => $postcode);

		$this->load->view('product_form', $input);
	}	

	public function session()
	{
		$total = $_POST['total'];
		$this->session->set_userdata("price", $total);   		
	}	

	public function check()
	{
		//check whether stripe token is not empty
		if(!empty($_POST['stripeToken']))
		{
			//get token, card and user info from the form
			$token  = $_POST['stripeToken'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$card_num = $_POST['card_num'];
			$card_cvc = $_POST['cvc'];
			$card_exp_month = $_POST['exp_month'];
			$card_exp_year = $_POST['exp_year'];
			$price = $_POST['price'];
			$state = $_POST['state'];
			$postcode = $_POST['postcode'];	
			$country_id = $_POST['country_id'];	
			
			
			//include Stripe PHP library
			require_once APPPATH."third_party/stripe/init.php";
			
			//set api key
			$stripe = array(
			  "secret_key"      => "sk_test_51GtDCCC6fzJfyPcnt4jT3G1sBSn0oYYYofuOoYqFcj2Eb68UvTRqTOhqvRC9phaMH3JPSqD2VItqlSAvrWhHmwmV00irJAbZ7G",
			  "publishable_key" => "pk_test_51GtDCCC6fzJfyPcngcqEWEB3Fu6zmzB3PwHjfxnGhAuicuyOqYVSV0XyJfSrCWyzbA9dTuj0JMuVKwwMekM3sYGx00S7OG4dgN"
			);
			
			\Stripe\Stripe::setApiKey($stripe['secret_key']);
			
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'email' => $email,
				'source'  => $token
			));
			
			//item information
			$itemName = "Stripe Donation";
			$itemNumber = "PS123456";
			$itemPrice = $price;
			$currency = "usd";
			$orderID = "SKA92712382139";
			
			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $itemPrice*100,
				'currency' => $currency,
				'description' => $state." ".$postcode,
				'metadata' => array(
				'item_id' => $itemNumber
				)
			));
			
			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();

			//check whether the charge is successful
			if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
			{
				//order details 
				$amount = $chargeJson['amount'];
				$balance_transaction = $chargeJson['balance_transaction'];
				$currency = $chargeJson['currency'];
				$status = $chargeJson['status'];
				$date = time();
			
				
				//insert tansaction data into the database
				$dataDB = array(
					'name' => $name,
					'email' => $email, 
					/*'card_num' => $card_num, 
					'card_cvc' => $card_cvc, 
					'card_exp_month' => $card_exp_month, 
					'card_exp_year' => $card_exp_year, 
					'item_name' => $itemName, 
					'item_number' => $itemNumber, 
					'item_price' => $itemPrice, 
					'item_price_currency' => $currency, */
					'paid_amount' => $amount, 
					/*'paid_amount_currency' => $currency, 
					'txn_id' => $balance_transaction, 
					'payment_status' => $status,*/
					'created_date' => $date,
					//'modified_by' => $date,
					'country_id' => $country_id,
					'state' => $state,
					'postcode' => $postcode
				);

				if ($this->db->insert('store_orders', $dataDB)) {
					if($this->db->insert_id() && $status == 'succeeded'){
						$data['insertID'] = $this->db->insert_id();

						$shoping_cart = $this->cart->contents();
						foreach($shoping_cart as $items) {
							$a = array(
						        'qty'     => $items['qty'],
						        'price'   => $items['price'],
						        'name'    => $items['name'],
						        'image'	  => $items['image'],
						        'product_id' => $items['product_id'],	
						        'size' => $items['size'],
						        'color' => $items['color'],
						        'order_id' => $data['insertID'],
						        'status' => 0
						    );

							$this->db->insert('store_card', $a);


						}

						$from = "raksanazeyd.com@gmail.com";
						$mailPassword = "raksanazeyd15_06_2020";

						/*$to = "fikret.dadasov97@gmail.com";
						$to2 = "dadashovfikret22@gmail.com";*/

						$config = array(
							'protocol'  => 'smtp',
							'smtp_host' => 'ssl://smtp.googlemail.com',
							'smtp_port' => 465,
							'smtp_user' => $from,
							'smtp_pass' => $mailPassword,
							'mailtype'  => 'html',
							'charset'   => 'utf-8'
							);


						$this->email->initialize($config);
						$this->email->set_mailtype("html");
						$this->email->set_newline("\r\n");

						$mailContent = '
							<h2>Order Request Submitted</h2>							
							<p><b>Message: </b> Your order has accepted. The order will be shipped soon.</p>';

						$this->email->to($email);
						//$this->email->to($to2);
						$this->email->from($from);
						$this->email->message($mailContent);
						$this->email->send();

						$this->cart->destroy();

						$this->load->view('payment_success', $data);

						// redirect('Welcome/payment_success','refresh');
					}else{
						echo "Transaction has been failed";
					}
				}
				else
				{
					echo "not inserted. Transaction has been failed";
				}

			}
			else
			{
				echo "Invalid Token";
				$statusMsg = "";
			}
		}
	}

	public function payment_success()
	{
		$this->load->view('payment_success');
	}

	public function payment_error()
	{
		$this->load->view('payment_error');
	}

}