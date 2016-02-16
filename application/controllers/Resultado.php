<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultado extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index() {
        $this->load->model('resultado_model');
        $dados['dados'] = $this->resultado_model->resultadoParcial();
        $this->load->view('header');
        $this->load->view('resultado', $dados);
        $this->load->view('footer');
    }
}