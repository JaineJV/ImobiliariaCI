<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Imovel_model');
        $this->load->model('Categoria_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar(){
        $this->load->model('Categoria_model', 'cam');

        $data['categorias'] = $this->cam->getAll();
        
        $this->load->view('Administrador/Categoria/ListaCategorias', $data);
        $this->load->view('Administrador/Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome_categoria', 'nome_categoria', 'required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('Administrador/Categoria/FormCategoria');
            $this->load->view('Administrador/Footer');
        } else {
            $data = array(
                'nome_categoria' => $this->input->post('nome_categoria')
            );
            if ($this->Categoria_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Categoria cadastrada com sucesso!</div>');
                redirect('Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Categoria/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if($id > 0){

            $this->form_validation->set_rules('nome_categoria', 'nome_categoria', 'required');

            if ($this->form_validation->run() == false) {

                $data['categoria'] = $this->Categoria_model->getOne($id);
                
                $this->load->view('Administrador/Categoria/FormCategoria', $data);
                $this->load->view('Administrador/Footer');
            } else {
                $data = array(
                    'nome_categoria' => $this->input->post('nome_categoria')
                );

                if ($this->Categoria_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Categoria alterada com sucesso!</div>');
                    redirect('Admin/pagina');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar ...</div>');
                    redirect('Categoria/alterar/' . $id);
                }
            }
        } else {
            redirect('Categoria/listar');
        }
    }
    
    public function deletar($id){
        if($id > 0){
            
            if($this->Categoria_model->delete($id)){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Categoria deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar...</div>');
            }
            
            redirect('Admin/pagina');
        }
        redirect('Admin/pagina');
    }

}
