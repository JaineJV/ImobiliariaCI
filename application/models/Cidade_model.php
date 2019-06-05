<?php

class Cidade_model extends CI_Model{
    
    public function getAll(){
        $query = $this->db->get('tb_cidade');
        
        return $query->result();
    }
    
    public function insert($data = array()){
        $this->db->insert('tb_cidade', $data);
        
        return $this->db->affected_rows();
    }
    
    public function getOne($id){
        $this->db->where('id_cidade', $id);
        $query = $this->db->get('tb_cidade');
        
        return $query->row(0);
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_cidade', $id);
            $this->db->update('tb_cidade', $data);
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_cidade', $id);
            $this->db->delete('tb_cidade');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}

