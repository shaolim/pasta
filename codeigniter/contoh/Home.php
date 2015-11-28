<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }   

	public function index()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');
		if($this->form_validation->run() === FALSE) {
			$data['posts'] = $this->home_model->get_all();
	    	$this->load->view('index', $data);
	    } else {
	    	if($this->home_model->insert_post()) {
	    		redirect('home', 'refresh');
	    	}
	    }	
	}

	public function full($id) {
		$data['content'] = $this->home_model->get_one($id);
		$this->load->view('full', $data);
	}
}
