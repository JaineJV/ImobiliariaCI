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

        $this->load->view('Administrador/Imovel/ListaImoveis', $data);
    }

    public function buscar() {
        $this->form_validation->set_rules('id_operador', 'id_operador', 'required');
        $this->form_validation->set_rules('id_cidade', 'id_cidade', 'required');
        $this->form_validation->set_rules('id_categoria', 'id_categoria', 'required');
        $this->form_validation->set_rules('id_bairro', 'id_bairro', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->model('Operador_model', 'om');
            $data['operadores'] = $this->om->getAll();

            $this->load->model('Cidade_model', 'cim');
            $data['cidades'] = $this->cim->getAll();

            $this->load->model('Categoria_model', 'cam');
            $data['categorias'] = $this->cam->getAll();

            $this->load->model('Bairro_model', 'bm');
            $data['bairros'] = $this->bm->getAll();

            $this->load->view('Header', $data);
            $this->load->view('Footer');
        } else {

            $data = array(
                'id_operador' => $this->input->post('id_operador'),
                'id_cidade' => $this->input->post('id_cidade'),
                'id_categoria' => $this->input->post('id_categoria'),
                'id_bairro' => $this->input->post('id_bairro'),
                'qtd_dormitorio' => $this->input->post('qtd_dormitorio'),
                'qtd_banheiro' => $this->input->post('qtd_banheiro'),
                'qtd_garagem' => $this->input->post('qtd_garagem')
            );
            if ($this->Imovel_model->select($data)) {
                
            }
        }
    }

    public function cadastrar() {
        $this->form_validation->set_rules('cd_locador', 'cd_locador', 'required');
        $this->form_validation->set_rules('preco_imovel', 'preco_imovel', 'required');
        $this->form_validation->set_rules('area_total', 'area_total', 'required');
        $this->form_validation->set_rules('cd_rua', 'cd_rua', 'required');
        $this->form_validation->set_rules('cd_categoria', 'cd_categoria', 'required');


        if ($this->form_validation->run() == false) {
            
            $this->load->model('Locador_model', 'lm');
            $data['locadores'] = $this->lm->getAll();
            
            $this->load->model('Rua_model', 'rm');
            $data['ruas'] = $this->rm->getAll();
            
            $this->load->model('Categoria_model', 'cam');
            $data['categorias'] = $this->cam->getAll();
            
            $this->load->view('Administrador/Imovel/FormImovel', $data);
        } else {
            $data = array(
                'cd_locador' => $this->input->post('cd_locador'),
                'numero_garagem' => $this->input->post('numero_garagem'),
                'quantidade_dormitorio' => $this->input->post('quantidade_dormitorio'),
                'preco_imovel' => $this->input->post('preco_imovel'),
                'area_total' => $this->input->post('area_total'),
                'area_construida' => $this->input->post('area_construida'),
                'cd_rua' => $this->input->post('cd_rua'),
                'cd_categoria' => $this->input->post('categoria'),
                'numero_residencial' => $this->input->post('numero_residencial'),
                'sala_estar' => $this->input->post('sala_estar'),
                'numero_banheiro' => $this->input->post('numero_banheiro'),
                'area_servico' => $this->input->post('area_servico'),
                'cozinha' => $this->input->post('cozinha')
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
                redirect('Imovel/cadastrar');
                exit();
            } else {
                
                $data['imagem'] = $this->upload->data('file_name');
            }

            if ($this->Imovel_model->insert($data)) {
                //Salva uma mensagem rapida na sessão.
                $this->session->set_flashdata('mensagem', 'Imóvel cadastrado com sucesso!!!');
                redirect('Imovel/listar');
            } else {
                unlink('./uploads/' . $data['imagem']);
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar imóvel!!!');
                redirect('Imovel/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('cd_locador', 'cd_locador', 'required');
            $this->form_validation->set_rules('preco_imovel', 'preco_imovel', 'required');
            $this->form_validation->set_rules('area_total', 'area_total', 'required');
            $this->form_validation->set_rules('cd_rua', 'cd_rua', 'required');
            $this->form_validation->set_rules('cd_categoria', 'cd_categoria', 'required');


            if ($this->form_validation->run() == false) {

                $data['imovel'] = $this->Imovel_model->getOne($id);

                $this->load->view('Administrador/Imovel/FormImovel', $data);
            } else {
                $data = array(
                'cd_locador' => $this->input->post('cd_locador'),
                'numero_garagem' => $this->input->post('numero_garagem'),
                'quantidade_dormitorio' => $this->input->post('quantidade_dormitorio'),
                'preco_imovel' => $this->input->post('preco_imovel'),
                'area_total' => $this->input->post('area_total'),
                'area_construida' => $this->input->post('area_construida'),
                'cd_rua' => $this->input->post('cd_rua'),
                'cd_categoria' => $this->input->post('categoria'),
                'numero_residencial' => $this->input->post('numero_residencial'),
                'sala_estar' => $this->input->post('sala_estar'),
                'numero_banheiro' => $this->input->post('numero_banheiro'),
                'area_servico' => $this->input->post('area_servico'),
                'cozinha' => $this->input->post('cozinha')
            );

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('userfile')) {
                    //Cria uma sessão com o error e redireciona
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-succsess">' . $error . '</div>');
                    redirect('Imovel/cadastrar');
                    exit();
                } else {
                    $data['imagem'] = $this->upload->data('file_name');
                }

                if ($this->Imovel_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Imóvel alterado com sucesso!!!');
                    redirect('Imovel/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar imóvel...');
                    redirect('Imovel/alterar/' . $id);
                }
            }
        } else {
            redirect('Imovel/listar');
        }
    }

    public function deletar($id) {
        If ($id > 0) {
            //Manda para o model deletar e já valida o retorno para ver se deu certo.
            unlink('./uploads/' . $data['imagem']);
            if ($this->Imovel_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Imóvel deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar imóvel...');
            }
        }
        redirect('Imovel/listar');
    }

}
