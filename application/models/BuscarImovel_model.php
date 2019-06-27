<?php

class BuscarImovel_model extends CI_Model {

    public function getBuscaImovel($data = array()) {
        $this->db->select('tb_imovel.*, tb_bairro.nome_bairro as nomeBairro, tb_categoria.nome_categoria as nomeCategoria,'
                . 'tb_operador.tipo_operador as nomeOperador, tb_cidade.nome_cidade as nomeCidade');
        $this->db->from('tb_imovel');
         $this->db->join('tb_rua', 'tb_rua.id_rua = tb_imovel.cd_rua');
        $this->db->join('tb_bairro', 'tb_bairro.id_bairro = tb_rua.cd_bairro');
         $this->db->join('tb_cidade', 'tb_cidade.id_cidade = tb_bairro.cd_cidade');
        $this->db->join('tb_categoria', 'tb_categoria.id_categoria = tb_imovel.cd_categoria');
        $this->db->join('tb_operador', 'tb_operador.id_operador = tb_imovel.cd_operador');
        
        if(!empty($data['nomeCategoria']))
        $this->db->where('tb_imovel.cd_categoria',$data['nomeCategoria']);
        
        if(!empty($data['nomeOperador']))
        $this->db->where('tb_imovel.cd_operador',$data['nomeOperador']);
        
        if(!empty($data['nomeBairro']))
        $this->db->where('tb_rua.cd_bairro',$data['nomeBairro']);
        
        if(!empty($data['nomeCidade']))
        $this->db->where('tb_bairro.cd_cidade',$data['nomeCidade']);
        $this->db->GROUP_BY('tb_imovel.id_imovel');
        $query = $this->db->get();
        
        return $query->result();
    }

}
    

