<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Destaque
 *
 * @author Vianna
 */
class Destaque extends CI_Controller{
    public function index() {
        
        $this->lista();
        
    }

    public function lista() {
        
        $this->load->view('Header');
        $this->load->view('Destaque/ListaDestaque');
        $this->load->view('Footer');
    }
}
