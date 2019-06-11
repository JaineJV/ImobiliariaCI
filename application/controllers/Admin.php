<?php
/**
 * Description of Adimin
 *
 * @author Vianna
 */
class Admin extends CI_Controller{
    
    public function index(){
        $this->pagina();
    }
    
    public function pagina(){
        $this->load->view('Administrador/Header');
        $this->load->view('Administrador/InicioAdmin');
        $this->load->view('Administrador/Footer');
    }
}
