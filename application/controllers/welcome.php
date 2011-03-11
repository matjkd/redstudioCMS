<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('captcha_model');
	}
	
	function index()
	{
		redirect('welcome/home', 'refresh');
	}
	function home()
	{
		
		if($this->session->flashdata('message'))
			{
				$data['message'] = $this->session->flashdata('message'); 	
			}	
			
		$data['menu'] = 'home';	
		$data['title'] = $this->config_company_name;	
		$data['content'] = $this->content_model->get_content($data['menu']);
		foreach($data['content'] as $row):
			$data['sidebox'] = $row->sidebox;
		endforeach;
		
		$data['main_content'] = "global/content";
		$data['cats'] = $this->products_model->get_cats();
		$data['products'] = $this->products_model->get_all_products();
		
		$data['section2'] = 'global/links';
		
		$this->load->vars($data);
		
		//if theme is set load that template, otherwise load original template
		if($this->config_theme == NULL)
			{
				$this->load->view('template/main');
			}
		else
			{
				$theme = $this->config_theme;
				$this->load->view('template/custom/'.$theme.'/main');	
			}
	}
	function main()
	{
		$segment_active = $this->uri->segment(3);
		if ($segment_active!=NULL)
			{
				$data['menu'] = $this->uri->segment(3);
			}
		else
			{
				$data['menu'] = 'home';	
			}
		
		$data['content'] = $this->content_model->get_content($data['menu']);
		$data['captcha'] = $this->captcha_model->initiate_captcha();
		foreach($data['content'] as $row):
			
			$data['title'] = $row->title;
			$data['sidebox'] = $row->sidebox;
		
		endforeach;
		$data['main_content'] = "global/content";
		$data['cats'] = $this->products_model->get_cats();
		$data['products'] = $this->products_model->get_all_products();
		$data['section2'] = 'global/links';
		if($this->session->flashdata('message'))
			{
				$data['message'] = $this->session->flashdata('message'); 	
			}	
		
		$data['slideshow'] = 'header/slideshow';	
		$this->load->vars($data);
			//if theme is set load that template, otherwise load original template
		if($this->config_theme == NULL)
			{
				$this->load->view('template/main');
			}
		else
			{
				$theme = $this->config_theme;
				$this->load->view('template/custom/'.$theme.'/main');	
			}
		
	}
	
	function login()
	{
		if($this->session->flashdata('message'))
			{
				$data['message'] = $this->session->flashdata('message'); 	
			}	
		$id = 'login';
		$data['content'] =	$this->content_model->get_content($id);
		$data['main_content'] = "user/login_form";
		$data['title'] = "Login to ".$this->config_company_name."";
		
		$data['page'] = "login";
		$this->load->vars($data);
			//if theme is set load that template, otherwise load original template
		if($this->config_theme == NULL)
			{
				$this->load->view('template/main');
			}
		else
			{
				$theme = $this->config_theme;
				$this->load->view('template/custom/'.$theme.'/main');	
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */