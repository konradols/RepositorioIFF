<?php 

class trabalho{

private $id_trabalho;
private $id_usuario;
private $nome;
private $resumo;
private $categoria;
private $autores;
private $orientadores;
private $coorientadores;
private $palavras_chave;
private $data_submissao;
private $caminho;
private $id_turma;
private $numero_acessos;
private $numero_downloads;
private $publicado;


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

     public function getId_trabalho(){
         return $this->id_trabalho;
     }

     function setId_trabalho($id_trabalho){
          $this->id_trabalho = $id_trabalho;
     }

     public function getId_usuario(){
         return $this->id_usuario;
     }

     function setId_usuario($id_usuario){
          $this->id_usuario = $id_usuario;
     }

     public function getNome(){
         return $this->nome;
     }

     function setNome($nome){
          $this->nome = $nome;
     }

     public function getResumo(){
         return $this->resumo;
     }

     function setResumo($resumo){
          $this->resumo = $resumo;
     }

     public function getCategoria(){
         return $this->categoria;
     }

     function setCategoria($categotia){
          $this->categoria = $categoria;
     }
     
     function getAutores() {
         return $this->autores;
     }

     function getPalavras_chave() {
         return $this->palavras_chave;
     }

     function setAutores($autores) {
         $this->autores = $autores;
     }
     
     function getOrientadores() {
         return $this->orientadores;
     }

     function getCoorientadores() {
         return $this->coorientadores;
     }

     function setOrientadores($orientadores) {
         $this->orientadores = $orientadores;
     }

     function setCoorientadores($coorientadores) {
         $this->coorientadores = $coorientadores;
     }

     function setPalavras_chave($palavras_chave) {
         $this->palavras_chave = $palavras_chave;
     }

     public function getData_submissao(){
         return $this->data_submissao;
     }

     function setData_submissao($data_submissao){
          $this->data_submissao = $data_submissao;
     }

     public function getCaminho(){
         return $this->caminho;
     }

     function setCaminho($caminho){
          $this->caminho = $caminho;
     }

     public function getId_turma(){
         return $this->id_turma;
     }

     function setId_turma($id_turma){
          $this->id_turma = $id_turma;
     }

     public function getNumero_acessos(){
         return $this->numero_acessos;
     }

     function setNumero_acessos($numero_acessos){
          $this->numero_acessos = $numero_acessos;
     }

     public function getNumero_downloads(){
         return $this->numero_downloads;
     }

     function setNumero_downloads($numero_downloads){
          $this->numero_downloads = $numero_downloads;
     }

    public function getPublicado()
    {
        return $this->publicado;
    }

    public function setPublicado($publicado)
    {
        $this->publicado = $publicado;
    }

}