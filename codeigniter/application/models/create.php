<?php
class Create extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('string');
    }
    
    public function select_all()
    {
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('paste');
        return $query->result();
    }

    public function select_one()
    {        
        $query = $this->db->get_where('tb_posts', array('id' => $id));
        return $query->result();
    }

    public function insert()
    {
            $data = array(
                'data' => $this->input->post('data'),
                'filename' => random_string('alnum', 8)
            );
            if($this->db->insert('paste', $data)) {
                return true;
            } else {
                return false;
            }
    }

}