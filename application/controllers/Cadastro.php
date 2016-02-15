<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
    }
    
    public function index() {
        $this->load->view('header');
        $this->load->view('cadastro');
        $this->load->view('footer');
    }
    
    public function salvar() {
        $this->usuarios_model->cpf = $this->input->post('cpf');
        $this->usuarios_model->nome = $this->input->post('nome');
        $this->usuarios_model->senha = md5($this->input->post('senha'));
        $this->usuarios_model->email = $this->input->post('email');
        
        $dados['msg'] = $this->usuarios_model->salvar();
        
        $this->load->view('header');
        $this->load->view('mensagem', $dados);
        $this->load->view('footer');
    }
}