<?php

class Slider_model extends CI_Model {

    public function getAll() {
        $query = $this->db->get('tb_slider');
        return $query->result();
    }

    public function insert($data = array()) {
        $this->db->insert('tb_slider', $data);
        return $this->db->affected_rows();
    }
    
    public function getOne($id) {
        $this->db->where('id_slider', $id);
        $query = $this->db->get('tb_slider');
        return $query->row(0);
    }
    
    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id_slider', $id);
            $this->db->update('tb_slider', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id_slider', $id);
            $this->db->delete('tb_slider');

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
