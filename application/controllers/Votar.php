<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Votar extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('votos_model');
    }
    
    public function index() {
        if (!$this->session->cpf){
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }else{
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }        
    }
    
    public function validaUsuario(){
    	//$this->sair();
        $this->load->model('usuarios_model');
        $this->usuarios_model->cpf = str_replace("-","",str_replace(".","",$this->input->post('usuario')));
        $this->usuarios_model->senha = $this->input->post('senha');

        $retorno = $this->usuarios_model->login();
        
        if (is_array($retorno)){
            $this->session->set_userdata(array('cpf' => $retorno[0]->cpf, 'nome' => $retorno[0]->nome, 'email'=>$retorno[0]->email, 'quantidade' => 0));
            
            $this->votos_model->usuarios_cpf = $this->session->cpf;
            $dados['total'] = $this->votos_model->quantidadeVotos();

            $this->load->view('header');
            $this->load->view('votar',$dados);
            $this->load->view('footer');
        }else{
            $dados['msg'] = $retorno;
            $this->load->view('header');
            $this->load->view('mensagem', $dados);
            $this->load->view('footer');
        }
    }


    public function sair() {
        $this->session->sess_destroy();
        redirect('/');
    }
    
    public function votacao() {
        $this->votos_model->usuarios_cpf = $this->session->cpf;
        $this->votos_model->candidatos_id = $this->input->post('candidato_ID');
        $dados['msg'] = $this->votos_model->votoTemporario();
        
        if (!$dados['msg']) {
            $this->load->view('header');
            $this->load->view('mensagem', $dados);
            $this->load->view('footer');
        }
    }
    
    public function listacandidatos(){
        if(isset($_GET['letters'])){
	$letters = $_GET['letters'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        
        $this->votos_model->carregaListaCandidatos($letters);
        }
    }
    
    public function  novovoto() {
        if ($this->session->cpf){  
            $this->votos_model->usuarios_cpf = $this->session->cpf;
            if ($this->votos_model->quantidadeVotos() < 6){
                $dados['total'] = $this->votos_model->quantidadeVotos();

                $this->load->view('header');
                $this->load->view('votar', $dados);
                $this->load->view('footer');
            }else{
                $this->finalizavotacao();
            }
        }
    }
    
    public function finalizavotacao() {
        $this->votos_model->usuarios_cpf = $this->session->cpf;
        $chave = $this->votos_model->finalizavotacao();

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'votacaoanauni@gmail.com', //email id
            'smtp_pass' => '@anauni@', // password
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $msg = "<p>Prezado(a) eleitor(a),</p>";
        $msg .= "<p>Você recebeu este e-mail por participar da votação eletrônica em nosso site.</p>";
        $msg .= "<p>Por favor, clique no link a seguir => <a href='".base_url()."index.php/votar/validar/".$chave."'>FINALIZAR VOTAÇÃO</a> para finalizar sua votação.</p>";
        $msg .= "<p>LEMBRE-SE: Se você não acessar o link acima, o seu voto <b>NÃO SERÁ COMPUTADO!</b></p>";
        $msg .= "<p>Obrigado por participar da votação.</p>";
        $msg .= "<p>Atenciosamente,</p>";
        $msg .= "<p>Associação Nacional do Advogados da União - ANAUNI</p>";

        $this->email->from('votacaoanauni@gmail.com', 'Sistema de votação da ANAUNI');
        $this->email->to($this->session->email); // email array
        $this->email->subject('Confirmaçao de votação');
        $this->email->message($msg);

        $this->email->send();
        
        $msg = "<p>Foi enviado para o e-mail " . $this->session->email . " a confirmação do seu voto.</p>";
        $msg .= "<p>Por favor, acesse seu e-mail e clique no link enviado para a <b>CONFIRMAÇÃO e FINALIZAÇÃO da votação.</b></p>";
        $msg .= "<p>Caso não apareça o e-mail em sua caixa de entrada, por favor, verifique se não foi encaminhado para a caixa <b>LIXO ELETRÔNICO ou SPAM</b></p>";
        $msg .= "<p>LEMBRE-SE: Se você não acessar o link enviado no seu e-mail, o seu voto <b>NÃO SERÁ COMPUTADO!</b></p>";
        $msg .= "Obrigado por participar da votação.</p>";
        $msg .= "<p>Atenciosamente,</p>";
        $msg .= "<p>Associação Nacional do Advogados da União - ANAUNI</p>";
        $dados['msg'] = $msg;
        $this->load->view('header');
        $this->load->view('finaliza', $dados);
        $this->load->view('footer');
    }
    
    public function validar($chave) {
        $dados['msg'] = $this->votos_model->validarVoto($chave);
        
        $this->load->view('header');
        $this->load->view('mensagem', $dados);
        $this->load->view('footer');
    }

}
