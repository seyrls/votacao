<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultado_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function resultadoParcial() {
        $sql = "select 
                    (select count(*) from votos) total_votos,
                    round((count(*) * 100) / (select count(*) from votos),2) total,
                    c.nome 
                from votos v
                inner join candidatos c
                on v.candidatos_id = c.id
                group by c.id
                order by total desc";
        $result = $this->db->query($sql);
        
        return $result->result();
    }
}