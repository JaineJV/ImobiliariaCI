<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Imovel extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Imovel_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Imovel_model', 'im');

        $data['imoveis'] = $this->im->getAll();

        $this->load->view('Header');
        $this->load->view('Destaque/ListaDestaque', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('numero_garagem', 'numero_garagem', 'required');
        $this->form_validation->set_rules('quantidade_dormitorio', 'quantidade_dormitorio', 'required');
        $this->form_validation->set_rules('preco_imovel', 'preco_imovel', 'required');
        $this->form_validation->set_rules('area_total', 'area_total', 'required');
        $this->form_validation->set_rules('area_construida', 'area_construida', 'required');
        $this->form_validation->set_rules('cd_endereco', 'endereco', 'required');
        $this->form_validation->set_rules('cd_categoria', 'categoria', 'required');

        if ($this->form_validation->run() == false) {
            $this->cadastrar();
        } else {
            if (!empty($_FILES['imagem_imovel']['name'])) {
                $config['upload_path'] = '.public/uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 100;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('imagem_imovel')) {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-danger">' . $this->upload->display_errors() . redirect(base_url('imovel')) . '</div>');
                } else {
                    $imovel['imagem_imovel'] = $this->upload->data()['file_name'];
                }
            }
            $imovel['numero_garagem'] = $this->input->post('numero_garagem');
            $imovel['quantidade_dormitorio'] = $this->input->post('quantidade_dormitorio');
            $imovel['preco_imovel'] = $this->input->post('preco_imovel');
            $imovel['area_total'] = $this->input->post('area_total');
            $imovel['area_construida'] = $this->input->post('area_construida');
            $imovel['cd_endereco'] = $this->input->post('endereco');
            $imovel['cd_categoria'] = $this->input->post('categoria');

            if ($this->Imovel_model->insert($imovel)) {

                $this->session->set_flashdata('retorno', '<div class="alert alert-success"> Imovel cadastrado com sucesso! </div>');
                redirect('Imovel/listar');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"> Falha ao cadastrar...</div>');
                redirect('Imovel/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Imovel_model');

            $this->form_validation->set_rules('numero_garagem', 'numero_garagem', 'required');
            $this->form_validation->set_rules('quantidade_dormitorio', 'quantidade_dormitorio', 'required');
            $this->form_validation->set_rules('preco_imovel', 'preco_imovel', 'required');
            $this->form_validation->set_rules('area_total', 'area_total', 'required');
            $this->form_validation->set_rules('area_construida', 'area_construida', 'required');
            $this->form_validation->set_rules('cd_endereco', 'endereco', 'required');
            $this->form_validation->set_rules('cd_categoria', 'categoria', 'required');

            if ($this->form_validation->run() == false) {

                $data['imovel'] = $this->Imovel_model->getOne($id);
                $this->load->view('FormImovel', $data);
            } else {
                $data = array(
                'numero_garagem' => $this->input->post('numero_garagem'),
                'quantidade_dormitorio' => $this->input->post('quantidade_dormitorio'),
                'preco_imovel' => $this->input->post('preco_imovel'),
                'area_total' => $this->input->post('area_total'),
                'area_construida' => $this->input->post('area_construida'),
                'cd_endereco' => $this->input->post('endereco'),
                'cd_categoria' => $this->input->post('categoria')
                );

                if ($this->Imovel_model->update($id, $data)) {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-success"> Imóvel alterado com sucesso!');
                    redirect('Imovel/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar Imóvel...');
                    redirect('Imovel/alterar/' . $id);
                }
            }
        } else {
            redirect('Imovel/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Imovel_model');

            if ($this->Imovel_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Imóvel deletado com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar Veículo...');
            }

            redirect('Imovel/listar');
        }
        redirect('Imovel/listar');
    }

}
