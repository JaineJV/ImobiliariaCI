<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Imovel_model');
        $this->load->model('Cidade_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar(){
        $this->load->model('Cidade_model', 'cm');

        $data['cidades'] = $this->cm->getAll();
        
        $this->load->view('Administrador/Cidade/ListaCidades', $data);
        $this->load->view('Administrador/Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome_cidade', 'nome_cidade', 'required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('Administrador/Cidade/FormCidade');
            $this->load->view('Administrador/Footer');
        } else {
            $data = array(
                'nome_cidade' => $this->input->post('nome_cidade')
            );
            if ($this->Cidade_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Cidade cadastrada com sucesso!</div>');
                redirect('Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Cidade/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if($id > 0){

            $this->form_validation->set_rules('nome_cidade', 'nome_cidade', 'required');

            if ($this->form_validation->run() == false) {

                $data['cidade'] = $this->Cidade_model->getOne($id);
                
                $this->load->view('Administrador/Cidade/FormCidade', $data);
                $this->load->view('Administrador/Footer');
            } else {
                $data = array(
                    'nome_cidade' => $this->input->post('nome_cidade')
                );

                if ($this->Cidade_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Cidade alterada com sucesso!</div>');
                    redirect('Admin/pagina');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar ...</div>');
                    redirect('Cidade/alterar/' . $id);
                }
            }
        } else {
            redirect('Cidade/listar');
        }
    }
    
    public function deletar($id){
        if($id > 0){
            
            if($this->Cidade_model->delete($id)){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Cidade deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar...</div>');
            }
            
            redirect('Admin/pagina');
        }
        redirect('Admin/pagina');
    }

}
