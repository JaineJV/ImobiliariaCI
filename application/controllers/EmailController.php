<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

    public function index() {
        
        $this->load->config('email');
        $this->load->library('email');
        
        $this->form_validation->set_rules('email');
        $this->form_validation->set_rules('texto');

       if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('Visitante/Contato');
            $this->load->view('Footer');
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
                redirect('EmailController');
            }else{
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">E-mail enviado com sucesso</div>');
                redirect('Imovel');
            }
        }
        //$this->email->print_debugger();//para analisar erros*/
    }
}