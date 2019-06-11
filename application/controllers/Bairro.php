<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bairro extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Imovel_model');
        $this->load->model('Bairro_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Bairro_model', 'bm');

        $data['bairros'] = $this->bm->getAll();

        $this->load->view('Administrador/Bairro/ListaBairros', $data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('cd_cidade', 'cd_cidade', 'required');
        $this->form_validation->set_rules('nome_bairro', 'nome_bairro', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->model('Cidade_model', 'cm');

            $data['cidades'] = $this->cm->getAll();

            $this->load->view('Administrador/Bairro/FormBairro', $data);
        } else {
            $data = array(
                'cd_cidade' => $this->input->post('cd_cidade'),
                'nome_bairro' => $this->input->post('nome_bairro')
                
            );
            if ($this->Bairro_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Bairro cadastrado com sucesso!</div>');
                redirect('Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Admin/pagina');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('cd_cidade', 'cd_cidade', 'required');
            $this->form_validation->set_rules('nome_bairro', 'nome_bairro', 'required');
            

            if ($this->form_validation->run() == false) {

                $data['bairro'] = $this->Bairro_model->getOne($id);

                $this->load->view('Administrador/Bairro/FormBairro', $data);
            } else {
                $data = array(
                    'cd_cidade' => $this->input->post('cd_cidade'),
                    'nome_bairro' => $this->input->post('nome_bairro')
                    
                );

                if ($this->Bairro_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Bairro alterado com sucesso!</div>');
                    redirect('Bairro/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar ...</div>');
                    redirect('Bairro/alterar/' . $id);
                }
            }
        } else {
            redirect('Bairro/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Bairro_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Bairro deletado com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar...</div>');
            }

            redirect('Admin/pagina');
        }
        redirect('Admin/pagina');
    }

}
