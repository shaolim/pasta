<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paste extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('create');
        $this->load->helper('url');
        $this->load->library('pagination');
    }   

	public function index()
	{
		$random = $this->create->insert();
		if($random){
			redirect('/paste/code/'.$random, 'refresh');
		}
		$this->load->view('home_view');
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
		$this->load->view('file_view', $data);
		

		/*manual select database

		$this->load->database();
		$this->db->where('filename', $filename);
		//$query = $this->db->get_where('paste', array('filename' => $filename));
		$this->db->select('data');
		$query = $this->db->get('paste');
		$this->load->view('file', $query);
		*/
	}

	public function select_all(){
		$data['list_data'] = $this->create->select_all();
		$this->load->view('history_view', $data);
	}

	/*public function example1() {
        $config = array();
        $config["base_url"] = base_url() . "paste/example1";
        $config["total_rows"] = $this->create->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->create->
            fetch_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("example1", $data);
    }*/
}
