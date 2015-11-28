<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paste extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('create');
    }   

	public function index()
	{
		$random = $this->create->insert();
		if($random){
			redirect('/paste/code/'.$random, 'refresh');
		}
		$this->load->view('welcome_messag');
	}

	/*manual insertion to database

	public function add()
	{
		$this->load->helper('string');
		$data = array(
			'data' => $this->input->post('data'),
			'filename' => random_string('alnum', 8) 
			);
		$this->load->database();
		$this->db->insert('paste', $data);
		$this->load->view('aftersubmit', $data);
	}*/
	public function code($filename){
		$data['content'] = $this->create->select_one($filename);
		$this->load->view('file', $data);
		

		/*manual select database

		$this->load->database();
		$this->db->where('filename', $filename);
		//$query = $this->db->get_where('paste', array('filename' => $filename));
		$this->db->select('data');
		$query = $this->db->get('paste');
		$this->load->view('file', $query);
		*/
	}
}
