<?php

class Rua_model extends CI_Model{
    
    public function getAll(){
        $this->db->select('tb_rua.*,tb_bairro.nome_bairro as nomeBairro');
        $this->db->join('tb_bairro', 'tb_bairro.id_bairro = tb_rua.id_rua', 'inner');
        $query = $this->db->get('tb_rua');
        return $query->result();
    }
    
    public function insert($data = array()){
        $this->db->insert('tb_rua', $data);
        
        return $this->db->affected_rows();
    }
    
    public function getOne($id){
        $this->db->where('id_rua', $id);
        $query = $this->db->get('tb_rua');
        
        return $query->row(0);
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_rua', $id);
            $this->db->update('tb_rua', $data);
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_rua', $id);
            $this->db->delete('tb_rua');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}

