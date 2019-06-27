<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Operador extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Imovel_model');
        $this->load->model('Operador_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar(){
        $this->load->model('Operador_model', 'om');

        $data['operadores'] = $this->om->getAll();
        
        $this->load->view('Administrador/Operador/ListaOperadores', $data);
        $this->load->view('Administrador/Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('tipo_operador', 'tipo_operador', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Administrador/Operador/FormOperador');
            $this->load->view('Administrador/Footer');
        } else {
            $data = array(
                'tipo_operador' => $this->input->post('tipo_operador')
            );
            if ($this->Operador_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Operador cadastrado com sucesso!</div>');
                redirect('Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Operador/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if($id > 0){

            $this->form_validation->set_rules('tipo_operador', 'tipo_operador', 'required');

            if ($this->form_validation->run() == false) {

                $data['operador'] = $this->Operador_model->getOne($id);
                
                $this->load->view('Administrador/Operador/FormOperador', $data);
                $this->load->view('Administrador/Footer');
            } else {
                $data = array(
                    'tipo_operador' => $this->input->post('tipo_operador')
                );

                if ($this->Categoria_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Operador alterado com sucesso!</div>');
                    redirect('Operador/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar ...</div>');
                    redirect('Operador/alterar/' . $id);
                }
            }
        } else {
            redirect('Operador/listar');
        }
    }
    
    public function deletar($id){
        if($id > 0){
            
            if($this->Operador_model->delete($id)){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Operador deletado com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar...</div>');
            }
            
            redirect('Operador/listar');
        }
        redirect('Operador/listar');
    }

}
