<?php

class Email extends My_Controller {

	function __Construct()
	{
		parent::__Construct();
	
	$this->load->model('captcha_model');
	
	}

	function index()
	{
		
	}
	
	function send()
	{
					$this->form_validation->set_rules('email', 'email', 'trim|required');
					$this->form_validation->set_rules('subject', 'subject', 'trim|required');
					$this->form_validation->set_rules('message', 'message', 'trim|required');
					$this->form_validation->set_rules('captcha', 'captcha', 'trim|required');
						
						$data['email'] = $this->input->post('email');
						$data['subject'] = $this->input->post('subject');
	    				$data['message'] = $this->input->post('message');
						$word = $this->input->post('captcha');
						$time = $this->input->post('time');
						$ip_address = $this->input->post('ip_address');
    
			if($this->form_validation->run() == FALSE)
				{
					
					
					$this->session->set_flashdata('message',validation_errors());
					redirect('welcome/main/contact', 'refresh');
					
				}
			else
				{
						
					// check captcha
					// if it returns true the captcha has failed
						if($this->captcha_model->check($word, $ip_address, $time))
						{
								$this->session->set_flashdata('message', 'The captcha was wrong');
								redirect('welcome/main/contact', 'refresh');
						}	
						
					// end check captcha	
						
					$config_email = $this->config_email;
					$config_company_name = $this->config_company_name;	
		
					//$this->postmark->from($config_email, $config_company_name);
		
		 			//echo "from($config_email, $config_company_name)<br/>";	
		
					$this->postmark->to($config_email);
		
				
		
					$this->postmark->cc('mat@redstudio.co.uk');
					
					
					$this->postmark->subject(''.$config_company_name.'Contact Form');
					$this->postmark->message_html("The contact form has been filled in
					
					<br/>
					email: ".$data['email']."
					<br/>
					subject: ".$data['subject']."
				    <br/><br/>
					Message: ".$data['message']." 
    			
					");	
					$this->postmark->send();
					
					$this->session->set_flashdata('message', 'Your message has been sent. Thank you.');
					redirect('welcome/main/contact', 'refresh');
				}	
	}

}
