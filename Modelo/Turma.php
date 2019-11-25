<?php 

class turma{

private $id_turma;
private $id_curso;
private $nome;
private $ano_inicio;
private $ano_fim;


public function __construct() {
    if (func_num_args() != 0) {
        $atributos = func_get_args()[0];
        foreach ($atributos as $atributo => $valor) {
                if (isset($valor)) {
                    $this->$atributo = $valor;
                }
            }
        }
    }

    function atualizar($vetor) {
        foreach ($vetor as $atributo => $valor) {
            if (isset($valor)) {
                $this->$atributo = $valor;
            }
        }
    }

    function getId() {
        return $this->id_turma;
    }

    function setId($id) {
        $this->id_turma = $id;
    }
        
     public function getId_curso(){
         return $this->id_curso;
     }

     function setId_curso($id_curso){
          $this->id_curso = $id_curso;
     }
     
     function getNome() {
         return $this->nome;
     }

     function setNome($nome) {
         $this->nome = $nome;
     }
     
     public function getAno_inicio(){
         return $this->ano_inicio;
     }

     function setAno_inicio($ano_inicio){
          $this->ano_inicio = $ano_inicio;
     }

     public function getAno_fim(){
         return $this->ano_fim;
     }

     function setAno_fim($ano_fim){
          $this->ano_fim = $ano_fim;
     }

}