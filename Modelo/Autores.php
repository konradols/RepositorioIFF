<?php 

class autores{

private $id_autores;
private $id_usuario;
private $id_trabalho;


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

     public function getId_autores(){
         return $this->id_autores;
     }

     function setId_autores($id_autores){
          $this->id_autores = $id_autores;
     }

     public function getId_usuario(){
         return $this->id_usuario;
     }

     function setId_usuario($id_usuario){
          $this->id_usuario = $id_usuario;
     }

     public function getId_trabalho(){
         return $this->id_trabalho;
     }

     function setId_trabalho($id_trabalho){
          $this->id_trabalho = $id_trabalho;
     }

}