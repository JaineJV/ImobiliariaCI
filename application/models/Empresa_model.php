<?php

class Empresa_model extends CI_Model{
    
    public function getAll(){
        $query = $this->db->get('tb_sobre');
        
        return $query->result();
    }
    
    public function insert($data = array()){
        $this->db->insert('tb_sobre', $data);
        
        return $this->db->affected_rows();
    }
    
    public function getOne($id){
        $this->db->where('id_sobre', $id);
        $query = $this->db->get('tb_sobre');
        
        return $query->row(0);
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_sobre', $id);
            $this->db->update('tb_sobre', $data);
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_sobre', $id);
            $this->db->delete('tb_sobre');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}

