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

	public function code($filename){
		$data['content'] = $this->create->select_one($filename);
		$this->load->view('file_view', $data);
	}

	public function select_all(){
		$data['list_data'] = $this->create->select_all();
		$this->load->view('history_view', $data);
	}

	public function history() {
        $config = array();
        $config["base_url"] = base_url() . "paste/history";
        $config["total_rows"] = $this->create->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->create->
            fetch_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("history_view", $data);
    }
}
