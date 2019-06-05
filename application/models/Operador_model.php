<?php

class Operador_model extends CI_Model{
    
    public function getAll(){
        $query = $this->db->get('tb_operador');
        
        return $query->result();
    }
    
    public function insert($data = array()){
        $this->db->insert('tb_operador', $data);
        
        return $this->db->affected_rows();
    }
    
    public function getOne($id){
        $this->db->where('id_operador', $id);
        $query = $this->db->get('tb_operador');
        
        return $query->row(0);
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_operador', $id);
            $this->db->update('tb_operador', $data);
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_operador', $id);
            $this->db->delete('tb_operador');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}

