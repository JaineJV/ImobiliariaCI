<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Indices
 *
 * @author Vianna
 */

class Indices extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {

        $this->load->model('Indices_model', 'idm');

        $data['indices'] = $this->idm->getAll();

        $this->load->view('Administrador/Indices/ListaIndices', $data);
        
    }

    public function cadastrar() {
        $this->form_validation->set_rules('id_indice', 'id_indice', 'required');
        $this->form_validation->set_rules('tipo', 'tipo', 'required');
        $this->form_validation->set_rules('data', 'data', 'required');
        $this->form_validation->set_rules('percentual', 'percentual', 'required');
        $this->form_validation->set_rules('valor', 'valor', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Administrador/Indices/FormIndice');
            
        } else {
            $data = array(
                'id_indice' => $this->input->post('id_indice'),
                'tipo' => $this->input->post('tipo'),
                'data' => $this->input->post('data'),
                'percentual' => $this->input->post('percentual'),
                'valor' => $this->input->post('valor')
            );
            if ($this->Indices_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Índice cadastrado com sucesso!</div>');
                redirect('Indices/listar');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Indices/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('id_indice', 'id_indice', 'required');
            $this->form_validation->set_rules('tipo', 'tipo', 'required');
            $this->form_validation->set_rules('data', 'data', 'required');
            $this->form_validation->set_rules('percentual', 'percentual', 'required');
            $this->form_validation->set_rules('valor', 'valor', 'required');

            if ($this->form_validation->run() == false) {

                $data['indice'] = $this->Indices_model->getOne($id);

                $this->load->view('Administrador/Indices/ListaIndices', $data);
                
            } else {
                $data = array(
                    'id_indice' => $this->input->post('id_indice'),
                    'tipo' => $this->input->post('tipo'),
                    'data' => $this->input->post('data'),
                    'percentual' => $this->input->post('percentual'),
                    'valor' => $this->input->post('valor')
                );

                if ($this->Indices_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Índice alterado com sucesso!</div>');
                    redirect('Indices/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar Índice...</div>');
                    redirect('Indices/alterar/' . $id);
                }
            }
        } else {
            redirect('Indices/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Indices_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Índice deletado com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar Índice...</div>');
            }

            redirect('Indices/listar');
        }
        redirect('Indices/listar');
    }

}
