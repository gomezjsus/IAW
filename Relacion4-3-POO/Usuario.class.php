<?php
class Usuario {   
    //put your code here
    private $login;
    private $nombre;
    private $foto;
    
    public function __construct($login='',$nombre='',$foto=''){
        $this->login=$login;
        $this->nombre=$nombre;
        $this->foto=$foto;        
    }
    public function __get($name){
        return $this->$name;
    }
    public function __set($name,$value){
        $this->$name=$value;        
    }   
    
}
