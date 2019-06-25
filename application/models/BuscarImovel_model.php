<?php

class BuscarImovel_model extends CI_Model {

    public function getBuscaImovel($data = array()) {
        $this->db->select('tb.*, tb_bairro.nome_bairro as nomeBairro');
        $this->db->from('tb_imovel AS tb');
         $this->db->join('tb_rua', 'tb_rua.id_rua = tb_imovel.cd_rua', 'inner');
        $this->db->join('tb_bairro', 'tb_bairro.id_bairro = tb_rua.cd_bairro', 'inner');
         $this->db->join('tb_cidade', 'tb_cidade.id_cidade = tb_bairro.cd_cidade', 'inner');
        $this->db->join('tb_categoria', 'tb_categoria.id_categoria = tb_imovel.cd_categoria', 'inner');
        $this->db->join('tb_operador', 'tb_operador.id_operador = tb_imovel.cd_operador', 'inner');
        $this->db->GROUP_BY('tb.id_imovel');
        $this->db->where(' tb_imovel.cd_categoria = '. $data['nomeCategoria'].' OR tb_imovel.cd_operador = '.$data['nomeOperador'].
                ' OR tb_rua.cd_bairro = '.$data['nomeBairro'].' OR tb_bairro.cd_cidade = '.$data['nomeCidade']);
        $query = $this->db->get('tb_imovel');
        return $query->result();
    }

}
    

