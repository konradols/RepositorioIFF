<?php 

class curso{

private $id;
private $nome;
private $matricula_coordenador;


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

     public function getId(){
         return $this->id;
     }

     function setId($id){
          $this->id = $id;
     }

     public function getNome(){
         return $this->nome;
     }

     function setNome($nome){
          $this->nome = $nome;
     }

     function getMatricula_coordenador() {
         return $this->matricula_coordenador;
     }

     function setMatricula_coordenador($matricula_coordenador) {
         $this->matricula_coordenador = $matricula_coordenador;
     }

}