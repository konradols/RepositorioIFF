<?php 

class curso{

private $id_curso;
private $nome;


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

     public function getId_curso(){
         return $this->id_curso;
     }

     function setId_curso($id_curso){
          $this->id_curso = $id_curso;
     }

     public function getNome(){
         return $this->nome;
     }

     function setNome($nome){
          $this->nome = $nome;
     }

}