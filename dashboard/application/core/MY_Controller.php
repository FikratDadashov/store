<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	 public function __construct()
    {
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');   
        $this->load->library('session');  
        $this->load->library('email');
		$this->load->library('encrypt');
		$this->load->library('cart');


        if ( $this->uri->segment(2) == 'login' )
		{
			
		}
		else
		{

			if ($this->session->has_userdata('id') && ($this->uri->segment(2) == 'index' || $this->uri->segment(2) == '') )
			{
				redirect('/panel/mainpage');

			}

			if (!$this->session->has_userdata('id') && $this->uri->segment(2) != 'index')
			{
				redirect('/panel/index');
			}
		}
	}		
		
}

?>