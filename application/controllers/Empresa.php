<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Empresa_model');
        $this->load->model('Imovel_model');
    }

    public function index() {
        $this->mostrar();
    }

    public function mostrar(){
        $this->load->model('Empresa_model', 'em');

        $summernote['summernote'] = $this->Empresa_model->getOne(0);
        
        $this->load->view('Administrador/Empresa/VisualizarTexto', $summernote);
    }
    
    
    public function cadastrar() {
      
        $this->form_validation->set_rules('summernote', 'summernote', 'required');

        if ($this->form_validation->run() == false) {
            $summernote['summernote'] = $this->Empresa_model->getOne(0);
            $this->load->view('Administrador/Empresa/EditarInformacao',$summernote);
           
        } else {
            
            $data = array(
                'summernote' => $this->input->post('summernote')
            );
            if ($this->Empresa_model->update($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>');
                redirect('Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Empresa/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if($id > 0){

            $this->form_validation->set_rules('summernote', 'summernote', 'required');

            if ($this->form_validation->run() == false) {

                $data['empresa'] = $this->Empresa_model->getOne($id);
                
                $this->load->view('Administrador/Empresa/EditarInformacao', $data);
            } else {
                $data = array(
                    'summernote' => $this->input->post('summernote')
                );

                if ($this->Empresa_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Cidade alterada com sucesso!</div>');
                    redirect('Admin/pagina');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar ...</div>');
                    redirect('Empresa/alterar/' . $id);
                }
            }
        } else {
            redirect('Empresa/mostrar');
        }
    }
}
