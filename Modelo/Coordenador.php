<?php 

class coordenador extends usuario{

private $matricula;
private $telefone;
private $foto;


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

     public function getTelefone(){
         return $this->telefone;
     }

     function setTelefone($telefone){
          $this->telefone = $telefone;
     }
     
     function getFoto() {
         return $this->foto;
     }

     function setFoto($foto) {
         $this->foto = $foto;
     }

}