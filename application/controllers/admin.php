<?php

class Admin extends MY_Controller {

	function __Construct()
	{
		parent::__Construct();
		$this->load->library(array('encrypt', 'form_validation'));	
		$this->is_logged_in();
		$this->load->model('content_model');
	
	
	}
	function index()
	{
		redirect('welcome/login', 'refresh');
	}
	function content()
	{
	if(($this->uri->segment(3))<1)
			{
				$id = 1;
			}
		else
			{
				$id = $this->uri->segment(3);
			}
		$data['content'] =	$this->content_model->get_content($id);
		$data['main'] = "pages/dynamic";
		$data['edit'] = "admin/edit/$id";
		$this->load->vars($data);
		$this->load->view('template/main');
		
	}
	
	function edit()
	{
		
		
		$id = $this->uri->segment(3);
		$data['menu'] = $id;
		$data['page'] = $id;
		$data['content'] =	$this->content_model->get_content($id);
		
		$data['main_content'] = "admin/edit_content";
		
		
	
		$this->load->vars($data);
		$this->load->view('template/main');
	}

function edit_product()
	{
		
		
		$id = $this->uri->segment(3);
		$data['menu'] = $id;
		$data['page'] = $id;
		$data['content'] =	$this->products_model->get_product($id);
		
		$data['main_content'] = "admin/edit_product";
		
			
		$this->load->vars($data);
		$this->load->view('template/main');
	}
	function edit_content()
	{
		$id = $this->uri->segment(3);
		$this->content_model->edit_content($id);
		
		redirect ("admin/edit/$id");
	}
	
	function edit_product_content()
	{
		$id = $this->uri->segment(3);
		$this->products_model->edit_product($id);
		
		redirect ("products/main/$id");
	}
function create_news()
	{
		$data['page'] = "news";
		$data['content'] =	$this->content_model->get_content('news');
		$data['main'] = "admin/create_news";
		$data['menu'] =	$this->content_model->get_menus();
		$data['news'] = $this->news_model->list_news();
		$this->load->vars($data);
		$this->load->view('template/main');
	}
function editnews()
	{
		
		$id = $this->uri->segment(3);
		$data['page'] ='news';
		$data['content'] =	$this->content_model->get_content('news');
		$data['news'] =	$this->news_model->get_news($id);
		
		$data['main'] = "admin/edit_news";
		$data['menu'] =	$this->content_model->get_menus();
		$this->load->vars($data);
		$this->load->view('template/main');
	}
function edit_news()
	{
		$id = $this->uri->segment(3);
		$this->news_model->edit_news($id);
		redirect ("admin/editnews/$id");
	}
function editpro()
	{
		
		$id = $this->uri->segment(3);
		$data['page'] ='professionals';
		$data['content'] =	$this->content_model->get_content('professionals');
		$data['professional'] = $this->professionals_model->get_professional($id);
			foreach($data['professional'] as $row):
			
				$data['practice'] = $this->professionals_model->practice_areas();
				$data['professional_id'] = $id;
			endforeach;
		
		$data['cases'] = $this->cases_model->list_cases();
		
		$data['assigned_cases'] = $this->cases_model->assigned_cases($id);
		
		$data['news'] = $this->news_model->list_news();
		$data['main'] = "admin/edit_user";
		$data['menu'] =	$this->content_model->get_menus();
		
		$data['assigned_practices'] = $this->professionals_model->assigned_practice_areas($id);
		
		$this->load->vars($data);
		$this->load->view('template/main');
	}
function edit_pro()
	{
		$id = $this->uri->segment(3);
		$this->professionals_model->edit_pro($id);
		redirect ("admin/editpro/$id");
	}
function edit_practice()
	{
		
		$id = $this->uri->segment(3);
		$data['page'] ='practices';
		$data['content'] =	$this->content_model->get_content('news');
		$data['practice'] = $this->practice_model->get_practice($id);
		$data['news'] = $this->news_model->list_news();
		$data['main'] = "admin/edit_practice";
		$data['menu'] =	$this->content_model->get_menus();
		$this->load->vars($data);
		$this->load->view('template/main');
	}
function edit_practice_submit()
	{
		$id = $this->uri->segment(3);
		$this->practice_model->edit_practice($id);
		redirect ("admin/edit_practice/$id");
	}
function submit_news()
	{			
		$this->form_validation->set_rules('news_title','Title','max_length[255]');			
		$this->form_validation->set_rules('news_content','Content','max_length[1024]');
		$this->form_validation->set_rules('page_type','Page Type','max_length[11]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn'\t been passed
		{
			$this->load->view('myform_view', $data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			$name = "".$this->session->userdata('firstname')." ".$this->session->userdata('lastname')."";
			$format = 'DATE_RFC1123';
			$now = time();
			$datetime = standard_date($format, $now);
			$form_data = array(
					       	'news_title' => set_value('news_title'),
					       	'news_content' =>  $this->input->post('news_content'),
							'page_type' => set_value('page_type'),
							'added_by' => $name,
							'date_added' => $datetime
						);
					
			// run insert model to write data to db
		
			if ($this->news_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('/news');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function add_case()
	{
		$id = "selected_cases";
		
		$data['content'] =	$this->content_model->get_content($id);
		$data['cases'] = $this->cases_model->list_cases();
		
		$data['menu'] =	$this->content_model->get_menus();
		$data['main'] = "admin/add_case";
		$data['slideshow'] = "global/slideshow1";
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/news';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if($is_logged_in!=NULL)
			{
			$data['edit'] = site_url("admin/edit/$id");
			$data['add'] = site_url("admin/add_case/");
	        }
			
                       
			
	
		$this->load->vars($data);
		$this->load->view('template');
	}
	function assign_practice()
	{
	$segment_active = $this->uri->segment(3);
		if($segment_active==NULL)
		{
			redirect('welcome', 'refresh');
		}
		else
		{
			$this->professionals_model->assign_practice($segment_active);
			
			redirect('admin/editpro/'.$segment_active.'');   
		}
	}
	
	function assign_case()
	{
	$segment_active = $this->uri->segment(3);
		if($segment_active==NULL)
		{
			redirect('welcome', 'refresh');
		}
		else
		{
			$this->cases_model->assign_case($segment_active);
			
			redirect('admin/editpro/'.$segment_active.'');   
		}
	}
	
function delete_assigned_cases($id)
	{
	
		$data['case_id'] = $this->cases_model->delete_assigned_case($id);
		foreach($data['case_id'] as $key => $row):
		$professional = $row['professional_id'];
		endforeach;
		
		redirect('admin/editpro/'.$professional.'', 'refresh');
		
	}	
function delete_assigned_practice($id)
	{
	
		$data['practice_id'] = $this->professionals_model->delete_assigned_practice($id);
		foreach($data['practice_id'] as $key => $row):
		$professional = $row['professional_id'];
		endforeach;
		
		redirect('admin/editpro/'.$professional.'', 'refresh');
		
	}
	function do_upload()
	{
			if(isset($_FILES['file'])){
				$file 	= read_file($_FILES['file']['tmp_name']);
				$name 	= basename($_FILES['file']['name']);
				$name = str_replace(' ', '_', $name);
				$name = str_replace(',', '', $name);
				write_file('uploads/'.$name, $file);
	
				$this->cases_model->add($name);
				redirect('cases/view');		
			}
	
			else $this->load->view('upload');
	}
	
	
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$role = $this->session->userdata('role');
		if(!isset($is_logged_in) || $role != 1)
		{
			$data['message'] = "You don't have permission";
			redirect('welcome/login', 'refresh');
                       
		}	
			
	}	
	
}