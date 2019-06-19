<?php

defined('BASEPATH') OR exit('No direct script acces allowed');

class Slider extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('Slider_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $data['sliders'] = $this->Slider_model->getAll();

        $this->load->view('Administrador/Slider/ListaSliders', $data);
        
    }
    

    public function cadastrar() {
        $this->form_validation->set_rules('legenda', 'legenda', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Administrador/Slider/FormSlider');
        } else {
            $data = array(
                'legenda' => $this->input->post('legenda'),
            );

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('mensagem', '<div class="alert alert-succsess">' . $error . '</div>');
                redirect('Slider/cadastrar');
                exit();
            } else {
                //Pega o nome do arquivo que foi enviado e adiciona no array $data
                $data['imagem'] = $this->upload->data('file_name');
            }

            if ($this->Slider_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Imagem cadastrada com sucesso!!!');
                redirect('Slider/listar');
            } else {
                unlink('./uploads/' . $data['imagem']);
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar imagem!!!');
                redirect('Slider/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('legenda', 'legenda', 'required');
            if ($this->form_validation->run() == false) {
                $data['slider'] = $this->Slider_model->getOne($id);

                $this->load->view('Administrador/Slider/FormSlider', $data);
                
            } else {
                $data = array(
                    'legenda' => $this->input->post('legenda'),
                );
                
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('mensagem', '<div class="alert alert-succsess">' . $error . '</div>');
                redirect('Slider/cadastrar');
                exit();
            } else {
                $data['imagem'] = $this->upload->data('file_name');
            }

                if ($this->Equipe_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Imagem alterada com sucesso!!!');
                    redirect('Slider/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar equipe...');
                    redirect('Slider/alterar/' . $id);
                }
            }
        } else {
            redirect('Slider/listar');
        }
    }

    public function deletar($id) {
        If ($id > 0) {
            
            unlink('./uploads/' . $data['imagem']);
            if ($this->Equipe_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Imagem deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar imagem...');
            }
        }
        redirect('Slider/listar');
    }

}
