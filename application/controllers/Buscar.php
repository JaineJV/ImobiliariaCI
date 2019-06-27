<?php

class Buscar extends CI_Controller {

    public function index() {
        $this->load->model('Imovel_model');
        $data['imoveis'] = $this->Imovel_model->getAll();
        
            $this->load->model('Operador_model', 'om');
            $data['operadores'] = $this->om->getAll();

            $this->load->model('Cidade_model', 'cim');
            $data['cidades'] = $this->cim->getAll();

            $this->load->model('Categoria_model', 'cam');
            $data['categorias'] = $this->cam->getAll();

            $this->load->model('Bairro_model', 'bm');
            $data['bairros'] = $this->bm->getAll();

            $this->load->model('Slider_model', 'sm');
            $data['sliders'] = $this->sm->getAll();
            
        $this->form_validation->set_rules('nomeOperador', 'nomeOperador', 'required');

 
        if ($this->form_validation->run() == false) {
             $this->load->view('Header');
            $this->load->view('Slider', $data);
            $this->load->view('Visitante/Inicio');
            $this->load->view('Footer');
        } else {

            $dataBusca = array(
                'nomeBairro' => $this->input->post('nomeBairro'),
                'nomeCategoria' => $this->input->post('nomeCategoria'),
                'nomeCidade' => $this->input->post('nomeCidade'),
                'nomeOperador' => $this->input->post('nomeOperador'),
            );
            $this->load->model('BuscarImovel_model');

            $data['imoveis'] = $this->BuscarImovel_model->getBuscaImovel($dataBusca);
            
                $this->load->view('Header');
                $this->load->view('Visitante/Inicio',$data);
                $this->load->view('Visitante/ResultadoBusca');
                $this->load->view('Footer');
           
        }
    }

}
