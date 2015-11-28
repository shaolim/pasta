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

    public function select_one($filename)
    {        
        $query = $this->db->get_where('paste', array('filename' => $filename));
        return $query->result();
    }

    public function insert()
    {
            $random = random_string('alnum', 8);
            $data = array(
                'data' => $this->input->post('data'),
                'filename' => $random
            );
            if($this->db->insert('paste', $data)) {
                return $random;
            } else {
                return false;
            }
    }

}