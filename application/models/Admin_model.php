<?php

class Admin_model extends CI_Model {
    
    public function getAdmin($email, $senha){
        $this->db->where('email', $email);
        $this->db->where('senha', sha1($senha . 'ImobiliariaColinas'));
        
        $query = $this->db->get('tb_admin');
        return $query->row(0);
    }
    
    public function verificaLogin(){
        $logado = $this->session->userdata('logado');
        $idAdmin = $this->session->userdata('idAdmin');
        
        if((!isset($logado)) || ($logado != true) || ($idAdmin <= 0)){
            redirect($this->config->base_url().'Admin/login');
        }
    }
    
    public function getAll(){
        
        $query = $this->db->get('tb_admin');
        return $query->result();
        
    }
    
     public function insert($data = array()){
        
        $this->db->insert('tb_admin', $data);
        return $this->db->affected_rows();
        
    }
    
    public function getOne($id){
        
        $this->db->where('id_admin', $id);
        $query = $this->db->get('tb_admin');
        return $query->row(0);
        
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id_admin', $id);
            $this->db->update('tb_admin', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id_admin', $id);
            $this->db->delete('tb_admin');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
}
