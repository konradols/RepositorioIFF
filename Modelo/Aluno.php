<?php 

class aluno extends usuario{

private $matricula;
private $id_usuario;
private $id_turma;


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
    
    public function getMatricula(){
         return $this->matricula;
     }

     function setMatricula($matricula){
          $this->matricula = $matricula;
     }

     public function getId_usuario(){
         return $this->id_usuario;
     }

     function setId_usuario($id_usuario){
          $this->id_usuario = $id_usuario;
     }

     public function getId_turma(){
         return $this->id_turma;
     }

     function setId_turma($id_turma){
          $this->id_turma = $id_turma;
     }

}