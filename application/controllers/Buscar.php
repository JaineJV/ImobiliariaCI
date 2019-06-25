<?php

class Buscar extends CI_Controller {

    public function index() {
        $this->form_validation->set_rules('nomeOperador', 'nomeOperador', 'required');

        if ($this->form_validation->run() == false) {

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

            $this->load->view('Header');
            $this->load->view('Slider', $data['sliders']);
            $this->load->view('Visitante/Inicio', $data);
            $this->load->view('Footer');
        } else {

            $data = array(
                'nomeBairro' => $this->input->post('nomeBairro'),
                'nomeCategoria' => $this->input->post('nomeCategoria'),
                'nomeCidade' => $this->input->post('nomeCidade'),
                'nomeOperador' => $this->input->post('nomeOperador'),
            );
            $this->load->model('BuscarImovel_model');
            if ($this->BuscarImovel_model->getBuscaImovel($data)) {
                
                $data['imoveis'] = $this->BuscarImovel_model->getBuscaImovel($data); 
                
                $this->load->view('Header');
                $this->load->view('Visitante/ResultadoBusca', $data);
                $this->load->view('Footer');
            } else {
                redirect('Buscar');
            }
        }
    }

}
