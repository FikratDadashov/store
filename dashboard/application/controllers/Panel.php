<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class panel extends MY_Controller {

	public function index($a=0)
	{
		$alert['alert'] = $a;
		$this->load->view('login', $alert);
	}

	public function queries()
	{
		$query['admin']=$this->db->select('username')->from('store_admin')->where('id', $this->session->id)->get()->result_array();
		$query['settings']= $this->db->select('logo')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')->where('language_id', 1)->get()->result_array();
		$query['name'] = $this->uri->segment(2);
		
		$this->load->view('header', $query);
	}

	public function login()
	{
		if ($this->input->post('submit'))
		{
			$email = $this->input->post('email');
			$pass=$this->db->select('password')->from('store_admin')->where('email', $email)->get()->result_array();

			if (count($pass) == 0) {
				$this->index(1);
			}

			//print_r($pass);
			$catch = $this->encrypt->decode($pass[0]['password']);
			$password = $this->input->post('password');
						
			$query=$this->db->get_where('store_admin', array('email' => $email));
            if ($query->num_rows()>0 && $catch == $password)
			{
				$query = $query->result_array()[0];
            	$this->session->set_userdata("id", $query['id']);                     	
            	redirect('/panel/mainpage');
			}
			else{
				$this->index(1);
			}

		}
	}

	public function mainpage()
	{   $query['for_index'] = 0;
		$this->queries();		
		$this->load->view('index', $query);
		$this->load->view('footer');
	}

	public function orders()
	{  
		$page = $this->uri->segment(3);
		$e = (int)$page;
		$query['count'] = $this->db->select('*')->from('store_orders')
		->join('store_card', 'store_card.order_id = store_orders.id')->count_all_results();	
		$limit = 10;

		$a = $query['count'];
		if ($page>ceil($a/$limit)) {
			$page = ceil($a/$limit);
		}
		if ($page == "" || $page == "0" || $e == 0) {
			$page = 1;
		}
		
		$query['page']=$page;
		$this->session->set_userdata("page", $page);
		$query['for_index'] = 1;
		$query['orders'] = $this->db->select('store_orders.id, store_orders.created_date, store_card.id s_id, store_card.price, store_orders.email,store_orders.name sname, store_orders.state, store_orders.postcode, store_card.image,store_card.name, store_card.color, store_card.size, store_card.qty, store_card.status')->from('store_orders')
		->join('store_card', 'store_card.order_id = store_orders.id')->limit(10, ($page-1)*10)->order_by('store_orders.id', 'DESC')->get()->result_array();

		$this->queries();		
		$this->load->view('index', $query);
		$this->load->view('footer');
	}

	public function status()
	{
		$id = $this->uri->segment(3);
		$email = $this->input->post('email');
		$product_name = $this->input->post('product_name');


		if ($this->input->post('finish'))
		{
			$data = array('status' => 2 );
	    	$this->db->where('id', $id);
			$this->db->update('store_card', $data); 

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
			<h2>Your order has delivered</h2>		
			<p> Please check your post office </p>
			<p><b>Product name </b>:'.$product_name.'</p>';

			$this->email->to($email);
			$this->email->from($from);
			$this->email->message($mailContent);
			$this->email->send();
        }
        if ($this->input->post('start'))
		{
			$data = array('status' => 1 );
	    	$this->db->where('id', $id);
			$this->db->update('store_card', $data); 

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
			<h2>Your order was started shipping</h2>		
			<p> Your order will be delivered soon </p>
			<p><b>Product name </b>:'.$product_name.'</p>';

			$this->email->to($email);
			$this->email->from($from);
			$this->email->message($mailContent);
			$this->email->send();
        }		

    	redirect('panel/orders/'.$this->session->page);
	}

	public function check_order()
	{
		$id = $this->uri->segment(3);
		$query['order'] = $this->db->select('store_orders.id, store_orders.created_date, store_card.id s_id, store_card.price, store_orders.email,store_orders.name sname, store_orders.state, store_orders.postcode, store_card.image,store_card.name, store_card.color, store_card.size, store_card.qty, store_card.status, store_shipping_country_language.name c_name, store_orders.paid_amount')->from('store_orders')
		->join('store_card', 'store_card.order_id = store_orders.id')
		->join('store_shipping_country_language', 'store_shipping_country_language.relation_id = store_orders.country_id')
		->where('store_card.id', $id)->get()->result_array();
		//print_r($this->db->last_query());
		/*$data = array('status' => 1 );
    	$this->db->where('id', $id);
		$this->db->update('store_card', $data); 
    	redirect('panel/orders');*/
    	$this->queries();		
		$this->load->view('orders', $query);
		$this->load->view('footer');
	}

	public function delete()
	{
		$table = $this->uri->segment(3);
		$id=$this->uri->segment(4);	
		$this->db->delete('store_'.$table, array('id' => $id));
		$this->db->delete('store_'.$table.'_language', array('relation_id' => $id));
		redirect('panel/'.$table.'/'.$this->session->page);		
	}

	public function delete_photo()
	{
		$name = $this->input->post('name');
		echo "";
		unlink("../assets/uploads/".$name);	
		
	}		

	public function settings()
	{
		$query['data']=
		$this->db->select('*')->from('store_setting')->order_by('store_setting.id', 'ASC')->get()->result_array();
		$query['name'] = array(0=>'id', 1=>'logo', 2=>'email', 3=>'phone', 4=>'facebook', );
		$this->queries();
		$this->load->view('settings', $query);
		$this->load->view('footer');		
	}

	public function about_us()
	{	
		$query['data'] = $this->db->select('*')->from('store_about')->get()->result_array();
		
		$query['data_lan'] = $this->db->select('*')->from('store_about')->
		join('store_about_language', 'store_about_language.relation_id = store_about.id')
		->get()->result_array();
		$query['name'] = array(0=>'id', 1=>'image', 2=>'status');
		
		$this->queries();
		$this->load->view('about', $query);
		$this->load->view('footer');		
	}

	public function update()
	{
		$table=$this->uri->segment(3);
		$id = $this->uri->segment(4);
		$text = $this->uri->segment(5);

		if ($table == "slide")
		{
			if($text !="")
			{
				$query['data']=$this->db->select('*')->from('store_slide')->join('store_slide_language', 'store_slide_language.relation_id = store_slide.id')
				->where('relation_id', $id)->where('language_id', 1)->get()->result_array();	
			}
			elseif ($text == "") 
			{
				$query['data']=$this->db->select('*')->from('store_slide')->where('id', $id)->get()->result_array();	
				
			}
			
			$query['id']= $id;
			$query['uri']= "slide";
			$query['lan']=$text;
			
			$this->queries();
			$this->load->view('updatelist', $query);
			$this->load->view('footer');			
		}

		elseif ($table == "product_main_category")
		{
			if($text !="")
			{
				$query['data'] = $this->db->select('*')->from('store_product_main_category')
				->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
				->where('relation_id', $id)->where('language_id', 1)->get()->result_array();
			}
			elseif ($text == "") 
			{
				$query['data'] = $this->db->select('*')->from('store_product_main_category')
				//->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
				->where('id', $id)->get()->result_array();
				
			}
			
			$query['id']= $id;
			$query['uri']= "product_main_category";
			$query['lan']=$text;
			
			$this->queries();
			$this->load->view('updatelist', $query);
			$this->load->view('footer');			
		}

		elseif ($table == "product_sub_category")
		{
			if($text !="")
			{
				$query['data'] = $this->db->select('*')->from('store_product_sub_category')
				->join('store_product_sub_category_language','store_product_sub_category_language.relation_id = store_product_sub_category.id')
				->where('relation_id', $id)->where('language_id', 1)->get()->result_array();
			}
			elseif ($text == "") 
			{
				$query['data'] = $this->db->select('*')->from('store_product_sub_category')
				->join('store_product_sub_category_language','store_product_sub_category_language.relation_id = store_product_sub_category.id')
				->where('store_product_sub_category.id', $id)->where('language_id', 1)->get()->result_array();
				$query['main'] = $this->db->select('*')->from('store_product_main_category')
				->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
				->where('language_id', 1)->get()->result_array();
				$query['sub'] = $this->db->select('*')->from('store_product_sub_category')
				->join('store_product_sub_category_language','store_product_sub_category_language.relation_id = store_product_sub_category.id')
				->where('language_id', 1)->get()->result_array();				
			}
			
			$query['id']= $id;
			$query['uri']= "product_sub_category";
			$query['lan']=$text;
			
			$this->queries();
			$this->load->view('updatelist', $query);
			$this->load->view('footer');			
		}	
		
		 elseif ($table == "about_us" )
		{
			$query['id']= $id;
			$query['table']=$table;
			$query['lan']=$text;
			if ($text != "" )
			{				
				$query['data'] = $this->db->select('*')->from('store_about')->
				join('store_about_language', 'store_about_language.relation_id = store_about.id')
				->where('relation_id', $id)->where('language_id', 1)
				->get()->result_array();
				$query['uri']="updatetext";
				
				$this->queries();
				$this->load->view('updateabout', $query);
				$this->load->view('footer');	
			}
			
			else 
			{
				$query['data']=$this->db->select('*')->from('store_about')->get()->result_array();
				$query['uri']="updateabout";
				$query['table']=$table;
				$query['id']= 1;
				$this->queries();
				$this->load->view('updateabout', $query);
				$this->load->view('footer');	
			}	
		}

		else if ($table == "settings")
		{
			$query['lan'] = $text;
			if($text !="")
			{
				$query['data']=$this->db->select('*')->from('store_setting')->join('store_setting_language', 'store_setting_language.relation_id = store_setting.id')
				->where('relation_id', $id)->where('language_id', 1)->get()->result_array();
			}
			elseif ($text == "") 
			{
				$query['data']=$this->db->select('*')->from('store_setting')->where('id', $id)->get()->result_array();			
			}
			$query['uri']="updatesettings";
			$query['id']= 1;
			$this->queries();
			$this->load->view('updatesettings', $query);
			$this->load->view('footer');	
		}

		else if ($table == "product_item")
		{
			$query['id']= $id;
			$query['uri']=$table;
			$query['lan']=$text;
			if($text !="")
			{
				$query['data']=
				$this->db->select('*')
				->from('store_product_item')
				->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
				->where('store_product_item_language.relation_id', $id)
				->where('store_product_item_language.language_id', $text)				
				->get()->result_array();

			}
			elseif ($text == "") 
			{
				$query['data']=
				$this->db->select('store_product_item.id, store_product_item.main_cat_id,store_product_item.color_id,store_product_item.size_id, store_product_item.price, store_product_item.sub_cat_id, 
				store_product_item.image ,store_product_item.status')
				->from('store_product_item')
				->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
				->join('store_product_main_category', 'store_product_main_category.id = store_product_item.main_cat_id')
				->join('store_product_sub_category', 'store_product_sub_category.id = store_product_item.sub_cat_id')
				->where('store_product_item.id', $id)
				->group_by('store_product_item.id')
				->get()->result_array();

				$query['main'] = $this->db->select('*')->from('store_product_main_category')
				->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
				->where('language_id', 1)->get()->result_array();

				$query['sub'] = $this->db->select('*')->from('store_product_sub_category')
				->join('store_product_sub_category_language','store_product_sub_category_language.relation_id = store_product_sub_category.id')
				->where('language_id', 1)->get()->result_array();

				$query['color'] = $this->db->select('store_product_color.id, store_product_color_language.name')->from('store_product_color')
				->join('store_product_color_language','store_product_color_language.relation_id = store_product_color.id')
				->where('language_id', 1)->get()->result_array();

				$query['size'] = $this->db->select('store_product_size.id, store_product_size_language.name')->from('store_product_size')
				->join('store_product_size_language','store_product_size_language.relation_id = store_product_size.id')
				->where('language_id', 1)->get()->result_array();
				
			}

			$this->queries();
			$this->load->view('updatelist', $query);
			$this->load->view('footer');	
		}

		elseif ($table == "product_color")
		{
			$query['column'] = $table;
			if ($text != "" )
			{
				$query['data']=	$this->db->select('store_product_color_language.name')
				->from('store_product_color')->join('store_product_color_language', 'store_product_color_language.relation_id = store_product_color.id')->where('language_id', 1)->where('relation_id', $id)->get()->result_array();

				$query['uri']="update_parameter";
				$query['id']= $id;
				$query['lan']=$text;

				$this->queries();
				$this->load->view('update_parameter', $query);
				$this->load->view('footer');
			}	
			
			else 
			{
				$query['data']=$this->db->select('status')->from('store_product_color')->where('id', $id)->get()->result_array();
				$query['uri']="update_parameter";
				$query['id']= $id;
				$query['lan']=$text;
		
				$this->queries();
				$this->load->view('update_parameter', $query);
				$this->load->view('footer');	

			}
				
		}


		elseif ($table == "product_size")
		{
			$query['column'] = $table;
			if ($text != "" )
			{
				$query['data']=	$this->db->select('store_product_size_language.name')
				->from('store_product_size')->join('store_product_size_language', 'store_product_size_language.relation_id = store_product_size.id')->where('language_id', 1)->where('relation_id', $id)->get()->result_array();

				$query['uri']="update_parameter";
				$query['id']= $id;
				$query['lan']=$text;

				$this->queries();
				$this->load->view('update_parameter', $query);
				$this->load->view('footer');
			}	
			
			else 
			{
				$query['data']=$this->db->select('status')->from('store_product_size')->where('id', $id)->get()->result_array();
				$query['uri']="update_parameter";
				$query['id']= $id;
				$query['lan']=$text;
		
				$this->queries();
				$this->load->view('update_parameter', $query);
				$this->load->view('footer');	

			}
				
		}


		elseif ($table == "shipping_country")
		{
			$query['column'] = $table;
			if ($text != "" )
			{
				$query['data']=	$this->db->select('store_shipping_country_language.name')
				->from('store_shipping_country')->join('store_shipping_country_language', 'store_shipping_country_language.relation_id = store_shipping_country.id')->where('language_id', 1)->where('relation_id', $id)->get()->result_array();

				$query['uri']="update_parameter";
				$query['id']= $id;
				$query['lan']=$text;

				$this->queries();
				$this->load->view('update_parameter', $query);
				$this->load->view('footer');
			}	
			
			else 
			{
				$query['data']=$this->db->select('status, price')->from('store_shipping_country')->where('id', $id)->get()->result_array();
				$query['uri']="update_parameter";
				$query['id']= $id;
				$query['lan']=$text;
		
				$this->queries();
				$this->load->view('update_parameter', $query);
				$this->load->view('footer');	

			}
				
		}

	}

	public function updatesettings()
	{
		$id = $this->uri->segment(3);
		$lan = $this->uri->segment(4);
		if ($this->input->post('cancel'))
		{
        	redirect('panel/settings');
        }
		if ($this->input->post('update') && $lan == "" )
		{
			$poct = $this->input->post('poct');
			$mobil = $this->input->post('mobil');
			$tel = $this->input->post('tel');
			$face = $this->input->post('face');
			$ins = $this->input->post('ins');
	
			$config['upload_path']          = '../assets/uploads';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	     	//  $config['max_size']             = 100;
	        //  $config['max_width']            = 40;
			//	$config['max_height']           = 40;
			$this->load->library('upload', $config);
	        if ($this->upload->do_upload('fileupload')) 
	        {    		
	        	$data = array(
	   			'email' => $poct,
	   			'telephone' => $tel,
	   			'facebook' => $face,
	   			'instagram' => $ins,
	   			'phone' => $mobil,			
	   			'logo' => $this->upload->data('file_name')			 
	   				);
	        	$this->db->where('id', 1);
				$this->db->update('store_setting', $data); 
	        	redirect('panel/settings');
        	}
	        else 
	        {
	        	$data = array(
	   			'email' => $poct,
	   			'telephone' => $tel,
	   			'facebook' => $face,
	   			'instagram' => $ins,
	   			'phone' => $mobil,
	   				);
	        	$this->db->where('id', 1);
				$this->db->update('store_setting', $data); 
	        	redirect('panel/settings');
	        }	       
		}
		 if ($this->input->post('update') && $lan != "" )
		{
			$name = $this->input->post('name');
			$title = $this->input->post('title');
			$desc = $this->input->post('desc');
			$contact_text = $this->input->post('contact_text');
			$address = $this->input->post('address');					
			  		
        	$data = array(
        	
   			'name' => $name,
   			'desc' => $desc,
   			'contact_text' => $contact_text,
   			'address' => $address,
   			'title' => $title		 
   				);
        	$this->db->where('language_id', $lan);
			$this->db->update('store_setting_language', $data); 
        	redirect('panel/settings');
        	 
		}
	}

	public function updateabout()
	{
		$id = $this->uri->segment(3);
		$table=$this->uri->segment(4);
		$lan = $this->uri->segment(5);
		
		if ($this->input->post('cancel'))
		{
        	redirect('panel/about_us');
        }
		if ($this->input->post('update') && $lan == "")
		{
			$config['upload_path']          = '../assets/uploads';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	     	//  $config['max_size']             = 100;
	        //  $config['max_width']            = 40;
			//	$config['max_height']           = 40;
			$this->load->library('upload', $config);
	        if ($this->upload->do_upload('fileupload')) 
	        {    		
	        	$data = 
	        	array(
	   			'image' => $this->upload->data('file_name')			 
	   			);
	        	$this->db->where('id', 1);
				$this->db->update('store_about', $data); 
	        	redirect('panel/about_us');
        	}
        	elseif ($this->upload->do_upload('fileupload_2')) 
	        {    		
	        	$data = 
	        	array(
	   			'background_image' => $this->upload->data('file_name')			 
	   			);
	        	$this->db->where('id', 1);
				$this->db->update('store_about', $data); 
	        	redirect('panel/about_us');
        	}
	        else 
	        {
	        	redirect('panel/about_us');
	        }
		}

		if ($this->input->post('update') && $lan != "")
		{
			$title = $this->input->post('title');
			$desc = $this->input->post('desc');
			$text = $this->input->post('text');

        	$data = 
        	array(
   			'title' => $title, 
   			'desc' => $desc, 
   			'body' => $text, 			 
   			);
        	$this->db->where('relation_id', 1);
			$this->db->where('language_id', $lan);
        	$this->db->update('store_about_language', $data); 
        	redirect('panel/about_us');
		}
	}

	public function slide()
	{
		$query['uri'] = "slide";
		$query['data']=
		$this->db->select('*')->from('store_slide')->order_by('store_slide.id', 'ASC')->get()->result_array();
		$query['name'] = array(0=>'id', 1=>'image', 2=>'status');

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}		

	public function updateslides()
	{
		$id = $this->uri->segment(3);
		$lan = $this->uri->segment(4);

		if ($this->input->post('cancel'))
		{
        	redirect('panel/slide');
        }
		if ($this->input->post('update'))
		{
			$title = $this->input->post('title');
			$body = $this->input->post('body');			
			$a=$this->input->post('aktiv');
	
			$config['upload_path']          = '../assets/uploads';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	     	//  $config['max_size']             = 100;
	        //  $config['max_width']            = 40;
			//	$config['max_height']           = 40;
			$this->load->library('upload', $config);
			if ($lan == "") 
			{
				$this->upload->do_upload('fileupload');
				if ($this->upload->data('file_name')!="") {	         		
		         	if ($this->upload->data('file_size') > 300) {
	         			$data = $this->upload->data();  
						$config['image_library'] = 'gd2';  
						$config['source_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
						$config['create_thumb'] = FALSE;  
						$config['maintain_ratio'] = FALSE;  
						$config['quality'] = '100%';  
						$config['width'] = 350;  
						$config['height'] = 350;  
						$config['new_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
						$this->load->library('image_lib', $config);  
						$this->image_lib->resize();  
		         		}	

		        	$data = 
		        	array(
		   			'status' => $a,
		   			'image' => $this->upload->data('file_name')			 
		   				);
		   		}
		   		else{
		   			$data = array('status' => $a);
		   		}			 

		        $query = $this->db->where('id', $id)->update('store_slide', $data); 
			}
	       
	        if ($lan != "")
	        {
	        	
        		$data = array(
        		'title' => $title,
        		'body' => $body        		 
   				);
	        	
	        	$this->db->where('relation_id', $id);
	        	$this->db->where('language_id', $lan);
				$this->db->update('store_slide_language', $data); 
	        }

        	redirect('panel/slide');
		}
	}

	public function updatemain()
	{
		$id = $this->uri->segment(3);
		$lan = $this->uri->segment(4);

		if ($this->input->post('cancel'))
		{
        	redirect('panel/product_main_category');
        }
		if ($this->input->post('update'))
		{
			$name = $this->input->post('name');
			$text = $this->input->post('text');

			$status=$this->input->post('status');
	
			$config['upload_path']          = '../assets/uploads';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	     	//  $config['max_size']             = 100;
	        //  $config['max_width']            = 40;
			//	$config['max_height']           = 40;
			$this->load->library('upload', $config);
			if ($lan == "") 
			{

				$this->upload->do_upload('fileupload');
				if ($this->upload->data('file_name')!="") {	
					if ($this->upload->data('file_size') > 300) {
		     			$data = $this->upload->data();  
						$config['image_library'] = 'gd2';  
						$config['source_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
						$config['create_thumb'] = FALSE;  
						$config['maintain_ratio'] = FALSE;  
						$config['quality'] = '100%';  
						$config['width'] = 513;  
						$config['height'] = 513;  
						$config['new_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
						$this->load->library('image_lib', $config);  
						$this->image_lib->resize();  
		     		}

	        	$data = 
	        	array(
	   			'status' => $status,
	   			'image' => $this->upload->data('file_name')			 
	   				);	        	
        		}
        		else{
		   			$data = array('status' => $status);
		   		}	

		        $this->db->where('id', $id);
				$this->db->update('store_product_main_category', $data); 
			}
	       
	        if ($lan != "")
	        {
	        	
        		$data = array(
        		'name' => $name, 
        		'body' => $text 
   				);
	        	
	        	$this->db->where('relation_id', $id);
	        	$this->db->where('language_id', $lan);
				$this->db->update('store_product_main_category_language', $data); 
	        }	        
        	redirect('panel/product_main_category');
		}
	}

	public function updatesub()
	{
		$id = $this->uri->segment(3);
		$lan = $this->uri->segment(4);

		if ($this->input->post('cancel'))
		{
        	redirect('panel/product_sub_category');
        }
		if ($this->input->post('update'))
		{
			$name = $this->input->post('name');
			$main = $this->input->post('main');
			$sub = $this->input->post('sub');

			$status=$this->input->post('status');
	
			if ($lan == "") 
			{   		
		        	$data = 
		        	array(
		   			'status' => $status,
		   			'main_cat_id' => $main
		   				);
        		
		        $this->db->where('id', $id);
				$this->db->update('store_product_sub_category', $data); 
			}
	       
	        if ($lan != "")
	        {
	        	
        		$data = array(
        		'name' => $name
   				);
	        	
	        	$this->db->where('relation_id', $id);
	        	$this->db->where('language_id', $lan);
				$this->db->update('store_product_sub_category_language', $data); 
	        }

        	redirect('panel/product_sub_category');
		}
	}
	
	public function product_item()
	{
		$page = $this->uri->segment(3);
		$e = (int)$page;
		$query['count']= $this->db->from("store_product_item")->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')->count_all_results();	
		$limit = 10;

		$a = $query['count'];
		if ($page>ceil($a/$limit)) {
			$page = ceil($a/$limit);
		}
		if ($page == "" || $page == "0" || $e == 0) {
			$page = 1;
		}
		
		$query['page']=$page;
		$this->session->set_userdata("page", $page);

		$query['data']=
		$this->db->select('store_product_item.id, store_product_item.main_cat_id, store_product_item.sub_cat_id, store_product_item.image ,store_product_item.status')
		->from('store_product_item')
		->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
		->join('store_product_main_category', 'store_product_main_category.id = store_product_item.main_cat_id')
		->join('store_product_sub_category', 'store_product_sub_category.id = store_product_item.sub_cat_id')
		->where('language_id', 1)->limit(10, ($page-1)*10)
		->get()->result_array();
		//print_r($this->db->last_query());

		$query['main'] = $this->db->select('*')->from('store_product_main_category')
		->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
		->where('language_id', 1)->get()->result_array();
		
		$query['sub'] = $this->db->select('*')->from('store_product_sub_category')
		->join('store_product_sub_category_language','store_product_sub_category_language.relation_id = store_product_sub_category.id')
		->where('language_id', 1)->get()->result_array();

		$query['name'] = array(0=>'id', 1=>'main_cat_id', 2=>'sub_cat_id', 3=>'image', 4=>'status');
		$query['uri'] = "product_item"; 

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}

	public function update_settings()
	{
		$query['data']=
		$this->db->select('store_product_item.id, store_product_item.main_cat_id, store_product_item.sub_cat_id, store_product_item.image ,store_product_item.status')
		->from('store_product_item')
		->join('store_product_item_language', 'store_product_item_language.relation_id = store_product_item.id')
		->join('store_product_main_category', 'store_product_main_category.id = store_product_item.main_cat_id')
		->join('store_product_sub_category', 'store_product_sub_category.id = store_product_item.sub_cat_id')
		->group_by('store_product_item.id')
		->get()->result_array();
		
		$query['name'] = array(0=>'id', 1=>'main_cat_id', 2=>'sub_cat_id', 3=>'image', 4=>'status');

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}

	public function product_main_category()
	{
		$query['data'] = $this->db->select('store_product_main_category.id, store_product_main_category.status, store_product_main_category.image')->from('store_product_main_category')
		->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
		->where('language_id', 1)->get()->result_array();

		$query['uri'] = "product_main_category";
		
		$query['name'] = array(0=>'id', 1=>'image', 2=>'status');

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}

	public function product_sub_category()
	{
		$query['data'] = $this->db->select('store_product_sub_category.id, store_product_sub_category.main_cat_id, store_product_sub_category.status, store_product_sub_category_language.name ')->from('store_product_sub_category')
		->join('store_product_sub_category_language','store_product_sub_category_language.relation_id = store_product_sub_category.id')
		->where('language_id', 1)->get()->result_array();

		$query['main'] = $this->db->select('*')->from('store_product_main_category')
		->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
		->where('language_id', 1)->get()->result_array();

		$query['uri'] = "product_sub_category";		
		$query['name'] = array(0=>'id', 1=>'main_cat_id', 2=>'name', 3=>'status' );

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}


	public function product_color()
	{
		$query['data'] = $this->db->select('store_product_color.id, store_product_color.status, store_product_color_language.name ')->from('store_product_color')
		->join('store_product_color_language','store_product_color_language.relation_id = store_product_color.id')
		->where('language_id', 1)->get()->result_array();

		$query['uri'] = "product_color";		
		$query['name'] = array(0=>'id', 1=>'name', 2=>'status' );

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}


	public function product_size()
	{
		$query['data'] = $this->db->select('store_product_size.id, store_product_size.status, store_product_size_language.name ')->from('store_product_size')
		->join('store_product_size_language','store_product_size_language.relation_id = store_product_size.id')
		->where('language_id', 1)->get()->result_array();

		$query['uri'] = "product_size";		
		$query['name'] = array(0=>'id', 1=>'name', 2=>'status' );

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}

	public function shipping_country()
	{
		$query['data'] = $this->db->select('store_shipping_country.id, store_shipping_country.status, store_shipping_country_language.name ')->from('store_shipping_country')
		->join('store_shipping_country_language','store_shipping_country_language.relation_id = store_shipping_country.id')
		->where('language_id', 1)->get()->result_array();
		//print_r($query['data']);

		$query['uri'] = "shipping_country";		
		$query['name'] = array(0=>'id', 1=>'name', 2=>'status' );

		$this->queries();
		$this->load->view('list', $query);
		$this->load->view('footer');		
	}



	public function add()
	{
		$uri = $this->uri->segment(3);
		
		$query['uri'] = $uri;
		$query['column'] = $uri;
		if ($uri =="product_main_category" || $uri =="product_sub_category"  || $uri =="product_item" ) 
		{
			$query['main'] = $this->db->select('*')->from('store_product_main_category')
			->join('store_product_main_category_language','store_product_main_category_language.relation_id = store_product_main_category.id')
			->where('language_id', 1)->get()->result_array();

			$query['sub'] = $this->db->select('*')->from('store_product_sub_category')
			->join('store_product_sub_category_language','store_product_sub_category_language.relation_id = store_product_sub_category.id')
			->where('language_id', 1)->get()->result_array();	

			$query['color'] = $this->db->select('store_product_color.id, store_product_color_language.name')->from('store_product_color')
			->join('store_product_color_language','store_product_color_language.relation_id = store_product_color.id')
			->where('language_id', 1)->get()->result_array();

			$query['size'] = $this->db->select('store_product_size.id, store_product_size_language.name')->from('store_product_size')
			->join('store_product_size_language','store_product_size_language.relation_id = store_product_size.id')
			->where('language_id', 1)->get()->result_array();		
		}
		
		
		$this->queries();
		if ($uri == "product_color" || $uri == "product_size" || $uri == "shipping_country" ) {
			$this->load->view('add_parameter', $query);	
		}
		else {
			$this->load->view('add', $query);
		}
		
		$this->load->view('footer');		
	}

	public function add_content()
	{
		$uri = $this->uri->segment(3);
		$status = $this->input->post('status');
		$main = $this->input->post('main');
		$sub = $this->input->post('sub');
		$link = $this->input->post('link');
		$main = $this->input->post('main');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$text = $this->input->post('product_body');
		
		
		
		$color = $this->input->post('color');
		$color = implode(",", $color);

		$size = $this->input->post('size');
		if($size == "" )
		{
		    $size = " ";
		}
		else{
		    $size = implode(",", $size);
		}
		
		$config['upload_path']          = '../assets/uploads';
        $config['allowed_types']        = 'jpg|png|jpeg';
     	//  $config['max_size']             = 100;
        //  $config['max_width']            = 40;
		//	$config['max_height']           = 40;
		$this->load->library('upload', $config);
		$this->upload->do_upload('fileupload');
	
	    $filesCount = count($_FILES['files']['name']); 
		
		$comma_separated = implode(":", $_FILES['files']['name']);
				
		for($i=0;$i<$filesCount;$i++)
		{
			
	        if(!empty($_FILES['files']['name'][$i])){
	 
	          // Define new $_FILES array - $_FILES['file']
				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];
				$this->upload->do_upload('file');

				if ( $this->upload->data('file_size') > 300) {
							
					$config['image_library'] = 'gd2';  
					$config['source_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
					$config['create_thumb'] = FALSE;  
					$config['maintain_ratio'] = FALSE;  
					$config['quality'] = '100%';  
					$config['width'] = 513;  
					$config['height'] = 513;  
					$config['new_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
					$this->load->library('image_lib');
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();  
					
	 			}
      		}
  		}
	
		if ($this->input->post('update'))
		{	 	
        	if ($uri == "slide")
        	{
        		$data = array(
        		'status' => $status, 			
   				'image' => $this->upload->data('file_name')			 
   				);
        	}

        	if ($uri == "product_item")
        	{
        		$data = array(
        		'status' => $status, 			
   				'main_cat_id' => $main,
   				'sub_cat_id' => $sub,	
   				'color_id' => $color,
   				'size_id' => $size,	
   				'price' => $price,		
   				'image' => $comma_separated
   				 
   				);
        	}

        	if ($uri == "product_main_category")
        	{
        		$data = array(
        		'status' => $status, 					
   				'image' => $this->upload->data('file_name')
   				 
   				);
        	}

        	if ($uri == "product_sub_category")
        	{
        		$data = array(
        		'status' => $status,
        		'main_cat_id'=> $main
   				 
   				);
        	}

    		$this->db->insert('store_'.$uri, $data);	
    		$last_id = $this->db->insert_id();
    		if ($uri == "product_item") {
    			$data_2 =  array(
    			'relation_id' => $last_id,
    			'language_id' => 1,
    			'name' => $name,
    			'body' => $text
    			);

    		}

    		else{
    			$data_2 =  array(
    			'relation_id' => $last_id,
    			'language_id' => 1,
    			'name' => $name
    			);
    		}

    		

    		/*$data_3 =  array(
    			'relation_id' => $last_id,
    			'language_id' => 2
    			);
    		$data_4 =  array(
    			'relation_id' => $last_id,
    			'language_id' => 3
    			);*/
    		
    		
    		$this->db->insert('store_'.$uri.'_language', $data_2);	

    		$message = "The row inserted successfully!";
    		$url = "../".$uri;
			echo "<script type='text/javascript'>alert('$message');   window.location.href = '$url'   </script>";
    		/*$this->db->insert('store_'.$uri.'_language', $data_3);
    		$this->db->insert('store_'.$uri.'_language', $data_4);*/
    		
			//redirect('./panel/'.$uri);	        	
    	}
	}

	public function add_parameter()
	{
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		
		$column = $this->input->post('column');
		
		
		if ($this->input->post('add'))
		{			       		
        	
        	if ($column != "shipping_country") {
        		$data = array('status' => 1);
        		$this->db->insert('store_'.$column, $data);
        	}
        	else{
        		$data = array('status' => 1, 'price' => $price);
        		$this->db->insert('store_'.$column, $data);
        	}
        	$id = $this->db->insert_id();
			$data2 = array(
        	'relation_id' => $id,
        	'name' => $name,
        	'language_id' => 1
        	);
        	/*$data3 = array(
        	'relation_id' => $id,
        	'language_id' => 2
        	);
        	$data4 = array(
        	'relation_id' => $id,
        	'language_id' => 3
        	);*/
        	$this->db->insert('store_'.$column.'_language', $data2);
			/*$this->db->insert('store_product_'.$column.'_language', $data3);
        	$this->db->insert('store_product_'.$column.'_language', $data4);*/
    		redirect('panel/'.$column);
        	
     
		}  
	}


	public function update_parameter()
	{
		$id = $this->uri->segment(3);
		$lan = $this->uri->segment(4);
		$column = $this->input->post('column'); 
		if ($column == 1) {	$column = "color"; }
		if ($column == 2) {	$column = "size"; }
		if ($column == 3) {	$column = "shipping_country"; }


		$name = $this->input->post('name');
		$price = $this->input->post('price');
		
		$a = $this->input->post('aktiv');

		if ($this->input->post('cancel'))
		{
			if ($column != "shipping_country") {
				redirect('panel/product_'.$column);
			}
			else{
				redirect('panel/'.$column);
			}
        }
		if ($this->input->post('update'))
		{
			if ($lan != "" )
			{
				$data = array('name' => $name);

	        	$this->db->where('relation_id', $id);
		        $this->db->where('language_id', $lan);
		        if ($column != "shipping_country") {
					$this->db->update('store_product_'.$column.'_language', $data);
					redirect('panel/product_'.$column);
				} 
				else{
					$this->db->update('store_'.$column.'_language', $data);
					redirect('panel/'.$column);
				}
		    	
			}
			
			else
			{	     
		        if ($column != "shipping_country") {
		        	$data = array('status' => $a);
		        	$this->db->where('id', $id);
					$this->db->update('store_product_'.$column, $data); 
			    	redirect('panel/product_'.$column);
			    }
			    else{
			    	$data = array('status' => $a, 'price' => $price );
		        	$this->db->where('id', $id);
					$this->db->update('store_'.$column, $data);
					redirect('panel/'.$column);
				}
        	}
    	}
	
	}

	public function update_product_item()
	{
		$id = $this->uri->segment(3);
		$lan = $this->uri->segment(4);	

		$photo =$this->db->select('image')->from('store_product_item')->where('id', $id)->get()->result_array();

		$delete_photo = $photo[0]['image'];

		$array_of_photos = explode(":", $name);
			//echo "<script type='text/javascript'>console.log('$name'); </script>";
		for ($i=0; $i < count($array_of_photos) ; $i++) { 
			echo "";
			unlink("../assets/uploads/".$array_of_photos[$i]);	
		}
		
		if ($this->input->post('cancel'))
		{
        	redirect('panel/product_item/'.$this->session->page);
        }
		if ($this->input->post('update') && $lan =="")
		{	
			$link = $this->input->post('link');
			$a = $this->input->post('aktiv');
			$main_id = $this->input->post('main');
			$sub_id = $this->input->post('sub');
			$price = $this->input->post('price');

			$color = $this->input->post('color');
			$color = implode(",", $color);

			$size = $this->input->post('size');
			$size = implode(",", $size);

			$config['upload_path']          = '../assets/uploads';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	     	//  $config['max_size']             = 100;
	        //  $config['max_width']            = 40;
			//	$config['max_height']           = 40;
			$this->load->library('upload', $config);

			$filesCount = count($_FILES['files']['name']); 
		
			$comma_separated = implode(":", $_FILES['files']['name']);
					
			for($i=0;$i<$filesCount;$i++)
			{
				
		        if(!empty($_FILES['files']['name'][$i])){
		 
		          // Define new $_FILES array - $_FILES['file']
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];
					$this->upload->do_upload('file');

					if ( $this->upload->data('file_size') > 300) {
								
						$config['image_library'] = 'gd2';  
						$config['source_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
						$config['create_thumb'] = FALSE;  
						$config['maintain_ratio'] = FALSE;  
						$config['quality'] = '100%';  
						$config['width'] = 513;  
						$config['height'] = 513;  
						$config['new_image'] = '../assets/uploads/'.$this->upload->data('file_name');  
						$this->load->library('image_lib');
						$this->image_lib->initialize($config); 
						$this->image_lib->resize();  
						
		 			}
	      		}
	  		}


	        if ($this->upload->data('file_name')!="") {	
						
	        	
	        	$data = array(
	   			'status' => $a,
	   			'main_cat_id' => $main_id,
	   			'sub_cat_id' => $sub_id,
	   			'color_id' => $color,
	   			'size_id' => $size,	  
	   			'price' => $price,	   			
	   			'image' => $comma_separated			 
	   				);	        
	   		}
	   		else{
	   			$data = array(
	   			'status' => $a,
	   			'main_cat_id' => $main_id,
	   			'sub_cat_id' => $sub_id,
	   			'color_id' => $color,
	   			'size_id' => $size,	  
	   			'price' => $price	 
	   				);	     

	   		}	  

	        $this->db->where('id', $id);
			$this->db->update('store_product_item', $data); 
        	redirect('panel/product_item/'.$this->session->page);
		}

		if ($this->input->post('update') && $lan !="")
		{	
			$name = $this->input->post('name');
			$text = $this->input->post('text');

        	$data = array(
        	'name' => $name,
   			'body' => $text
   				);
	        	  
	        $this->db->where('relation_id', $id);
	        $this->db->where('language_id', $lan);
			$this->db->update('store_product_item_language', $data); 
        	redirect('panel/product_item/'.$this->session->page);
		}		
	}
	
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('page');
		redirect('/panel/index');
	}

}
