<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Adimin
 *
 * @author Vianna
 */
class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();

        $this->load->model('Admin_model');
    }
    
    public function index(){
        $this->login();
    }
    
    public function pagina(){
        $this->load->view('Administrador/Header');
        $this->load->view('Administrador/InicioAdmin');
        $this->load->view('Administrador/Footer');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Administrador/AdminLogin');
        } else {

            $admin = $this->Admin_model->getAdmin(
                    $this->input->post('email'), $this->input->post('senha')
            );

            if ($admin) {
                $data = array(
                    'idAdmin' => $admin->id_admin,
                    'email' => $admin->email,
                    'logado' => true
                );

                $this->session->set_userdata($data);
                redirect($this->config->base_url() . 'Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"> Usuário e senha incorretos</div>');
                redirect($this->config->base_url() . 'Admin/login');
            }
        }
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Administrador/CadastroAdmin');
        } else {

            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => sha1($this->input->post('senha') . 'ImobiliariaColinas')
            );
            if ($this->Admin_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Administrador cadastrado com sucesso!</div>');
                redirect('Admin/login');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Admin/cadastrar');
            }
        }
    }

    public function alterar() {
        $id = $this->session->userdata('idAdmin');
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');


        if ($this->form_validation->run() == false) {

            $data['admin'] = $this->Admin_model->getOne($id);

            $this->load->view('Administrador/CadastroAdmin', $data);
        } else {
            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
            );

            if ($this->input->post('senha') != '') {
                $data['senha'] = sha1($this->input->post('senha') . 'ImobiliariaColinas');
            }

            if ($this->Usuario_model->update($id, $data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Usuário alterado com sucesso!</div>');
                redirect('Admin/pagina');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar Usuário...</div>');
                redirect('Admin/alterar/' . $id);
            }
        }
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect($this->config->base_url());
    }

}
