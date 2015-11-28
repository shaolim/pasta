<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	public function add()
	{
		$arrData["data"] = $this->input->post("data");
		$this->create->add($arrData);
	}
}
