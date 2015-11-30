<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paste extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_messag');
	}
	public function add()
	{
		$this->load->helper('string');
		$data = array(
			'data' => $this->input->post('data'),
			'filename' => random_string('alnum', 8) 
			);
		$this->load->database();
		$this->db->insert('paste', $data);
		//$query = $this->db->get_where('paste', array('filename' => 'AjLz5Z2l');
		$this->load->view('aftersubmit', $data);
	}
}
