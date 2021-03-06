<?php 

class usuario{

protected $id_usuario;
protected $nome;
protected $email;
protected $usuario;
protected $categoria;
protected $senha;
protected $foto;
protected $administrador;
protected $ativo;


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

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }


     public function getNome(){
         return $this->nome;
     }

     function setNome($nome){
          $this->nome = $nome;
     }

     public function getEmail(){
         return $this->email;
     }

     function setEmail($email){
          $this->email = $email;
     }

     public function getUsuario(){
         return $this->usuario;
     }

     function setUsuario($usuario){
          $this->usuario = $usuario;
     }
     
     function getCategoria() {
         return $this->categoria;
     }

     function setCategoria($categoria) {
         $this->categoria = $categoria;
     }

     public function getSenha(){
         return $this->senha;
     }

     function setSenha($senha){
          $this->senha = $senha;
     }

     public function getFoto(){
         return $this->foto;
     }

     function setFoto($foto){
          $this->foto = $foto;
     }
     
     function getAdministrador() {
         return $this->administrador;
     }

     function setAdministrador($administrador) {
         $this->administrador = $administrador;
     }

}