<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Votos_model extends CI_Model {
   
    public $usuarios_cpf = null;
    public $candidatos_id = null;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function regitraVoto() {
        if ((!$this->usuarios_cpf) && (!$this->candidatos_id)){
            $this->db->insert('entries', $this);
            return 1;
        }
        
    }
    
    public function carregaListaCandidatos($letra) {
        $this->db->like('nome', $letra, 'after'); 
        $dados = $this->db->get("candidatos");
        foreach ($dados->result() as $d){
            echo $d->id."###".$d->nome."|";
        }
    }
    
    public function votoTemporario() {
        //Conta a quantidade de votos de um determinado usuário
        $dados = $this->db->query("SELECT count(*) as total FROM temp_voto WHERE usuarios_cpf=".$this->usuarios_cpf);
        $temp1 = $dados->result();
                
        if ($temp1[0]->total < 3){
            //verificar se o eleitor votou neste candidato mais de uma vez
            $this->db->select('*');
            $this->db->where('usuarios_cpf', $this->usuarios_cpf);
            $this->db->where('candidatos_id', $this->candidatos_id);
            $temp = $this->db->get('temp_voto');
            
            if (!$temp->result()){
                $data = array(
                    'usuarios_cpf' => $this->usuarios_cpf,
                    'candidatos_id' => $this->candidatos_id,
                    'chave' => $this->session->session_id
                );
                $this->db->insert('temp_voto', $data);
                redirect('votar/novovoto');
                
            }else{
                return "Você já votou neste candidato anteriormente! Por favor, vote em outro candidato.";
            }    
        }else{
            //return "Você excedeu a quantidade de votos permitida!";
            redirect('votar/finalizavotacao');
        }
    }
    
    public function finalizavotacao() {
        $sql = "SELECT * FROM temp_voto WHERE usuarios_cpf = " . $this->usuarios_cpf;
        
        $result = $this->db->query($sql);
        
        foreach ($result->result() as $r) {
            return $r->chave;
        }
    }
    
    public function validarVoto($chave) {
        $sql = "SELECT * FROM temp_voto WHERE chave = '" . $chave . "'";
        
        $result = $this->db->query($sql);
        $dados = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $r){
                $dados[] = array(
                    'usuarios_cpf' => $r->usuarios_cpf,
                    'candidatos_id' => $r->candidatos_id,
                    'data' => date('Y-m-d H:m:s')
                ); 
            }
            $this->db->insert_batch("votos", $dados);
            return "<p>Voto validado com sucesso!</p><p>Obrigado por participar!</p>";
        }
        
    }
    
    public function quantidadeVotos(){
        //Conta a quantidade de votos de um determinado usuário
        $dados = $this->db->query("SELECT count(*) as total FROM temp_voto WHERE usuarios_cpf=".$this->usuarios_cpf);
        $temp = $dados->result();
        
        foreach ($temp as $t){
            return $t->total;
        }
    }
}