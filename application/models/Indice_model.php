<?php

/**
 * Description of Indices_model
 *
 * @author Vianna
 */
class Indice_model extends CI_Model{
    
    public function getAll(){
        
        $query = $this->db->get('tb_indice');
        return $query->result();
        
    }
    
    public function getHeader(){
        $this->db->select('tipo');
        $this->db->group_by('tipo');
        $query = $this->db->get('tb_indice');
        return $query->result();
    }
    
    public function getBD(){
       
        $this->db->order_by('tipo');
        $query = $this->db->get('tb_indice');
        return $query->result();
    }
    
    public function insert($data = array()){
        
        $this->db->insert('tb_indice', $data);
        return $this->db->affected_rows();
        
    }
    
    public function getOne($id){
        
        $this->db->where('id_indice', $id);
        $query = $this->db->get('tb_indice');
        return $query->row(0);
        
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_indice', $id);
            $this->db->update('tb_indice', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_indice', $id);
            $this->db->delete('tb_indice');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }

}
