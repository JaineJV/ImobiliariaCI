<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Indice extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Imovel_model');
        $this->load->model('Indice_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Indice_model', 'idm');

        $data['indices'] = $this->idm->getAll();

        $this->load->view('Administrador/Indice/ListaIndices', $data);
    }
    
    public function mostrarVisitante(){
        $this->load->model('Indice_model', 'idm');

        $data['indices'] = $this->idm->getBD();
                $data['header'] = $this->idm->getHeader();

        $this->load->view('Header');
        $this->load->view('Visitante/Indice', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('tipo', 'tipo', 'required');
        $this->form_validation->set_rules('data', 'data', 'required');
        $this->form_validation->set_rules('percentual', 'percentual', 'required');
        $this->form_validation->set_rules('valor', 'valor', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Administrador/Indice/FormIndice');
        } else {
            $data = array(
                'tipo' => $this->input->post('tipo'),
                'data' => $this->input->post('data'),
                'percentual' => $this->input->post('percentual'),
                'valor' => $this->input->post('valor'),
            );
            if ($this->Indice_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Indice cadastrado com sucesso!</div>');
                redirect('Indice/listar');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Indice/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('tipo', 'tipo', 'required');
            $this->form_validation->set_rules('data', 'data', 'required');
            $this->form_validation->set_rules('percentual', 'percentual', 'required');
            $this->form_validation->set_rules('valor', 'valor', 'required');

            if ($this->form_validation->run() == false) {

                $data['indice'] = $this->Indice_model->getOne($id);

                $this->load->view('Administrador/Indice/FormIndice', $data);
            } else {
                $data = array(
                'tipo' => $this->input->post('tipo'),
                'data' => $this->input->post('data'),
                'percentual' => $this->input->post('percentual'),
                'valor' => $this->input->post('valor'),
            );

                if ($this->Indice_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Índice alterado com sucesso!</div>');
                    redirect('Indice/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar ...</div>');
                    redirect('Indice/alterar/' . $id);
                }
            }
        } else {
            redirect('Indice/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Indice_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Indice deletado com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar...</div>');
            }

            redirect('Indice/listar');
        }
        redirect('Indice/listar');
    }

}
