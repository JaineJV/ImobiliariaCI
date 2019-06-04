<?php

/**
 * Description of Imovel_model
 *
 * @author Vianna
 */
class Imovel_model extends CI_Model{
    
    public function getAll(){
        
        $query = $this->db->get('tb_imovel');
        return $query->result();
        
    }
    
    public function insert($data = array()){
        
        $this->db->insert('tb_imovel', $data);
        return $this->db->affected_rows();
        
    }
    
    public function getOne($id){
        
        $this->db->where('id_imovel', $id);
        $query = $this->db->get('tb_imovel');
        return $query->row(0);
        
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_imovel', $id);
            $this->db->update('tb_imovel', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_imovel', $id);
            $this->db->delete('tb_imovel');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }

}
