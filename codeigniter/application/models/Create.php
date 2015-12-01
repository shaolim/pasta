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
            $now = new DateTime ( NULL, new DateTimeZone('UTC'));
            $data = array(
                'data' => $this->input->post('data'),
                'filename' => $random,
                'language' => $this->input->post('type'),
                'time_update' => $now->format('Y-m-d H:i:s')
            );
            if($this->db->insert('paste', $data)) {
                return $random;
            } else {
                return false;
            }
    }

    public function record_count(){
        return $this->db->count_all('paste');
    }

    public function fetch_data($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('paste');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}