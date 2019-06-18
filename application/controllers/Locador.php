<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locador extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Locador_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Locador_model', 'lm');

        $data['locadores'] = $this->lm->getAll();

        $this->load->view('Administrador/Locador/ListaLocadores', $data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome_locador', 'nome_locador', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('nascimento', 'nascimento', 'required');
        $this->form_validation->set_rules('genero', 'genero', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Administrador/Locador/FormLocador');
        } else {
            $data = array(
                    'nome_locador' => $this->input->post('nome_locador'),
                    'cpf' => $this->input->post('cpf'),
                    'telefone' => $this->input->post('telefone'),
                    'nascimento' => $this->input->post('nascimento'),
                    'genero' => $this->input->post('genero'),
                    'email' => $this->input->post('email'),
                );                
            if ($this->Locador_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Locador cadastrado com sucesso!</div>');
                redirect('Locador/listar');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Locador/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nome_locador', 'nome_locador', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            $this->form_validation->set_rules('telefone', 'telefone', 'required');
            $this->form_validation->set_rules('nascimento', 'nascimento', 'required');
            $this->form_validation->set_rules('genero', 'genero', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');

            if ($this->form_validation->run() == false) {

                $data['locador'] = $this->Locador_model->getOne($id);

                $this->load->view('Administrador/Locador/FormLocador', $data);
            } else {
                $data = array(
                    'nome_locador' => $this->input->post('nome_locador'),
                    'cpf' => $this->input->post('cpf'),
                    'telefone' => $this->input->post('telefone'),
                    'nascimento' => $this->input->post('nascimento'),
                    'genero' => $this->input->post('genero'),
                    'email' => $this->input->post('email')
                );

                if ($this->Locador_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Locador alterado com sucesso!</div>');
                    redirect('Locador/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar ...</div>');
                    redirect('Locador/alterar/' . $id);
                }
            }
        } else {
            redirect('Locador/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Locador_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Locador deletado com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar...</div>');
            }

            redirect('Locador/listar');
        }
        redirect('Locador/listar');
    }

}
