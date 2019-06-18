<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Empresa_model');
        $this->load->model('Imovel_model');
    }

    public function index() {
        $this->mostrar();
    }

    public function mostrarVisitante() {
        $this->load->model('Empresa_model', 'em');

        $summernote['summernote'] = $this->Empresa_model->getOne(0);

        $this->load->view('Header');
        $this->load->view('Visitante/Sobre', $summernote);
        $this->load->view('Footer');
    }

    public function contato() {
        /* $this->form_validation->set_rules('email');
        $this->form_validation->set_rules('texto');

       if ($this->form_validation->run() == false) {
           */ $this->load->view('Header');
            $this->load->view('Visitante/Contato');
            $this->load->view('Footer');/*
        } else {
            $this->email->from($this->input->post('email')); //email de quem envia a mensagem
            $this->email->subject($this->input->post('assunto')); //Assunto do email
            $this->email->reply_to($this->input->post('email')); //email que recebe a resposta
            $this->email->to("jaine.vianna@aluno.sc.senac.br"); //destinário
            $this->email->message($this->input->post('texto')); // vai a mensagem ao destinatário
            $this->email->attach('/path/to/photo1.jpg'); //enviar anexos. ps.: duvido que vá ser utilizado
            $this->email->send();

            if ($this->email->send() == false) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Erro ao enviar E-mail!</div>');
                redirect('Empresa/contato');
            }else{
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">E-mail enviado com sucesso</div>');
                redirect('Imovel');
            }
        }


        //$this->email->print_debugger();//para analisar erros*/
    }

    public function mostrar() {
        $this->load->model('Empresa_model', 'em');

        $summernote['summernote'] = $this->Empresa_model->getOne(0);

        $this->load->view('Administrador/Empresa/VisualizarTexto', $summernote);
    }

    public function cadastrar() {

        $this->form_validation->set_rules('summernote', 'summernote', 'required');

        if ($this->form_validation->run() == false) {
            $summernote['summernote'] = $this->Empresa_model->getOne(0);
            $this->load->view('Administrador/Empresa/EditarInformacao', $summernote);
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
        if ($id > 0) {

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
