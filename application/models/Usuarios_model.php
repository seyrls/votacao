<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
   
    public $cpf = null;
    public $nome = null;
    public $senha = null;
    public $email = null;
    public $data = null;
    public $origem = null;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function login() {
        $sql = "SELECT cpf, nome, email FROM usuarios WHERE cpf = ".$this->cpf." and senha = \"".md5($this->senha)."\"";
        $query = $this->db->query($sql);
        
        if ($query->result()){
            return $query->result();
        }else{
            return "CPF ou senha inválidos!";
        }
    }
    
    function salvar() {
        $result = $this->db->get_where('usuarios', array('cpf' => $this->cpf));
        
        if (!$result->result()){
            $this->origem = 0;
            $this->data = date('Y-m-d H:m:s');
            $this->db->insert("usuarios", $this);
            return "Eleitor(a) salvo com sucesso!<p>Você está apto para iniciar o processo de votação.</p>";
        }else{
            return "Eleitor(a) já cadastrado!";
        }
    }
}