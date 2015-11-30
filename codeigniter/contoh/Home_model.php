<?php
class Home_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_all()
        {
        	$this->db->order_by("id", "desc"); 
        	$query = $this->db->get('paste');
        	return $query->result();	
        }

        public function get_one($id)
        {
            $query = $this->db->get_where('tb_posts', array('id' => $id));
            return $query->result();
        }

        public function insert_post()
        {
        	$data = array(
		        'title' => $this->input->post('title'),
		        'text' => $this->input->post('text')
		    );
			if($this->db->insert('tb_posts', $data)) {
				return true;
			} else {
				return false;
			}
        }
}