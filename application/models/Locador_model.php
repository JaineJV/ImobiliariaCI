<?php

class Locador_model extends CI_Model{
    
    public function getAll(){
        $query = $this->db->get('tb_locador');
        
        return $query->result();
    }
    
    public function insert($data = array()){
        $this->db->insert('tb_locador', $data);
        
        return $this->db->affected_rows();
    }
    
    public function getOne($id){
        $this->db->where('id_locador', $id);
        $query = $this->db->get('tb_locador');
        
        return $query->row(0);
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_locador', $id);
            $this->db->update('tb_locador', $data);
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_locador', $id);
            $this->db->delete('tb_locador');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}

