<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Imovel extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Imovel_model');
    }

    public function index() {
        $this->buscar();
    }

    public function listar() {
        $this->load->model('Imovel_model', 'im');

        $data['imoveis'] = $this->im->getAll();

        $this->load->view('Administrador/Imovel/ListaImoveis', $data);
    }

    public function listarVisitante() {
        $this->load->model('Imovel_model', 'im');

        $data['imoveis'] = $this->im->select();

        $this->load->view('Header');
        $this->load->view('Visitante/ListarImoveis', $data);
        $this->load->view('Footer');
    }

    public function detalhes($id) {
        if ($id > 0) {
            $this->load->model('Imovel_model', 'im');

            $data['imoveis'] = $this->im->select();

            $this->load->view('Header');
            $this->load->view('Visitante/Detalhes', $data);
            $this->load->view('Footer');
        } else {
            $this->load->view('Header');
            $this->load->view('Visitante/ListarImoveis', $data);
            $this->load->view('Footer');
        }
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nomeLocador', 'nomeLocador', 'required');
        $this->form_validation->set_rules('preco_imovel', 'preco_imovel', 'required');
        $this->form_validation->set_rules('area_total', 'area_total', 'required');
        $this->form_validation->set_rules('nomeRua', 'nomeRua', 'required');
        $this->form_validation->set_rules('nomeCategoria', 'nomeCategoria', 'required');
        $this->form_validation->set_rules('nomeOperador', 'nomeOperador', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->model('Operador_model', 'om');
            $data['operadores'] = $this->om->getAll();

            $this->load->model('Locador_model', 'lm');
            $data['locadores'] = $this->lm->getAll();

            $this->load->model('Rua_model', 'rm');
            $data['ruas'] = $this->rm->getAll();

            $this->load->model('Categoria_model', 'cam');
            $data['categorias'] = $this->cam->getAll();

            $this->load->view('Administrador/Imovel/FormImovel', $data);
        } else {
            $data = array(
                'cd_locador' => $this->input->post('nomeLocador'),
                'numero_garagem' => $this->input->post('numero_garagem'),
                'quantidade_dormitorio' => $this->input->post('quantidade_dormitorio'),
                'preco_imovel' => $this->input->post('preco_imovel'),
                'area_total' => $this->input->post('area_total'),
                'area_construida' => $this->input->post('area_construida'),
                'cd_rua' => $this->input->post('nomeRua'),
                'cd_categoria' => $this->input->post('nomeCategoria'),
                'cd_operador' => $this->input->post('nomeOperador'),
                'numero_residencial' => $this->input->post('numero_residencial'),
                'sala_estar' => $this->input->post('sala_estar'),
                'numero_banheiro' => $this->input->post('numero_banheiro'),
                'area_servico' => $this->input->post('area_servico'),
                'cozinha' => $this->input->post('cozinha'),
            );

            $config['upload_path'] = './Imagens/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {

                $error = $this->upload->display_errors();
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success">' . $error . '</div>');
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
                unlink('./Imagens/' . $data['imagem']);
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar imóvel!!!');
                redirect('Imovel/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nomeLocador', 'nomeLocador', 'required');
            $this->form_validation->set_rules('preco_imovel', 'preco_imovel', 'required');
            $this->form_validation->set_rules('area_total', 'area_total', 'required');
            $this->form_validation->set_rules('nomeRua', 'nomeRua', 'required');
            $this->form_validation->set_rules('nomeCategoria', 'nomeCategoria', 'required');


            if ($this->form_validation->run() == false) {
                $this->load->model('Locador_model', 'lm');
                $data['locadores'] = $this->lm->getAll();

                $data['imovel'] = $this->Imovel_model->getOne($id);

                $this->load->view('Administrador/Imovel/FormImovel', $data);
            } else {
                $data = array(
                    'nomeLocador' => $this->input->post('nomeLocador'),
                    'numero_garagem' => $this->input->post('numero_garagem'),
                    'quantidade_dormitorio' => $this->input->post('quantidade_dormitorio'),
                    'preco_imovel' => $this->input->post('preco_imovel'),
                    'area_total' => $this->input->post('area_total'),
                    'area_construida' => $this->input->post('area_construida'),
                    'nomeRua' => $this->input->post('nomeRua'),
                    'nomeCategoria' => $this->input->post('nomeCategoria'),
                    'numero_residencial' => $this->input->post('numero_residencial'),
                    'sala_estar' => $this->input->post('sala_estar'),
                    'numero_banheiro' => $this->input->post('numero_banheiro'),
                    'area_servico' => $this->input->post('area_servico'),
                    'cozinha' => $this->input->post('cozinha')
                );

                $config['upload_path'] = './Imagens/';
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

    public function ocultar($id) {

        if ($id > 0) {
            $opaco = true;
            if ($opaco == true) {
                echo '<tr style="opacity: 0.5">';
            } else {
                echo '<tr>';
            }
            $this->load->view('Administrador/Imovel/ListaImoveis', $opaco);
            $this->load->model('Imovel_model', 'im');

            $data['imoveis'] = $this->im->getAll();

            $this->load->view('Administrador/Imovel/ListaImoveis', $data);
        }
    }

    public function deletar($id) {
        If ($id > 0) {
            //Manda para o model deletar e já valida o retorno para ver se deu certo.
            unlink('./Imagens/' . $data['imagem']);
            if ($this->Imovel_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Imóvel deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar imóvel...');
            }
        }
        redirect('Imovel/listar');
    }

}
