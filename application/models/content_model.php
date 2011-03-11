<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Content_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
      
    }
	function get_content($title)
	{
			
		$this->db->where('menu', $title);
		$query = $this->db->get('content');
		if($query->num_rows == 1);
			{
				return $query->result();
			}
		
	}	
	
	
	
	
	function edit_content($id)
		{
			
			
    				$content_update = array(
    				'content' => $this->input->post('content'),
    				'menu' => $this->input->post('menu'),
    				'title' => $this->input->post('title'),
					'extra' => $this->input->post('extra')
    				);
					
					
					
		
		$this->db->where('menu', $id);
		$update = $this->db->update('content', $content_update);
		return $update;
		}
		
	
	function get_all_products()
	{
			
	
		$query = $this->db->get('products');
		if($query->num_rows > 0);
			{
				return $query->result();
			}
		
	}
	
	function get_all_news()
	{
			
		$this->db->where('content_type', 'news');
		$this->db->orderby('content_id', 'desc');
		$query = $this->db->get('content');
		if($query->num_rows > 0);
			{
				return $query->result();
			}
		
	}
	function get_news($id)
	{
			
		$this->db->where('menu', $id);
		$query = $this->db->get('content');
		if($query->num_rows > 0);
			{
				return $query->result();
			}
		
	}
	
	function get_service_groups()
	{
		
		$query = $this->db->get('service_groups');
		if($query->num_rows > 0);
			{
				return $query->result();
			}
	}
	
	function get_services()
	{
		$query = $this->db->get('services');
		if($query->num_rows > 0);
			{
				return $query->result();
			}
	}
	
	function latest_news()
	{
	$this->db->where('content_type', 'news');
	$this->db->orderby('content_id', 'desc');
	$this->db->limit(1);
		$query = $this->db->get('content');
		if($query->num_rows == 1);
			{
				return $query->result();
			}
	}
}