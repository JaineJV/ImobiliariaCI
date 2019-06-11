<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rua extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Imovel_model');
        $this->load->model('Rua_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Rua_model', 'rm');

        $data['ruas'] = $this->rm->getAll();

        $this->load->view('Administrador/Rua/ListaRuas', $data);
    }

    public function cadastrar() {
        
        $this->form_validation->set_rules('nome_rua', 'nome_rua', 'required');
        $this->form_validation->set_rules('cd_bairro', 'cd_bairro', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->model('Bairro_model', 'bm');
            $data['bairros'] = $this->bm->getAll();
            
            $this->load->view('Administrador/Rua/FormRua', $data);
        } else {
            $data = array(
                
                'nome_rua' => $this->input->post('nome_rua'),
                'cd_bairro' => $this->input->post('cd_bairro')
            );
            if ($this->Rua_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Rua cadastrada com sucesso!</div>');
                redirect('Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Rua/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nome_cidade', 'nome_cidade', 'required');

            if ($this->form_validation->run() == false) {

                $data['rua'] = $this->Rua_model->getOne($id);

                $this->load->view('Administrador/Rua/FormRua', $data);
            } else {
                $data = array(
                    'nome_rua' => $this->input->post('nome_rua')
                );

                if ($this->Rua_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Rua alterada com sucesso!</div>');
                    redirect('Admin/pagina');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar...</div>');
                    redirect('Rua/alterar/' . $id);
                }
            }
        } else {
            redirect('Admin/pagina');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Rua_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Rua deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar...</div>');
            }

            redirect('Admin/pagina');
        }
        redirect('Admin/pagina');
    }

}
