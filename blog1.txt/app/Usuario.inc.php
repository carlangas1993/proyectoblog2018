<?php

class Usuario {
    
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $fecha_registro;
    private $activo;
    
    public function __construct($id, $nombre, $email, $password, $fecha_registro, $activo){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> email = $email;
        $this -> password = $password;
        $this -> fecha_registro = $fecha_registro;
        $this -> activo = $activo; 
        
    }
     public function obtener_Id(){
        return $this -> id;
    }
    public function obtener_Nombre(){
        return $this -> nombre;
    }

    public function obtener_Email(){
        return $this -> email;
    }
    public function obtener_Password(){
        return $this -> password;
    }
     public function obtener_FechaRegistro(){
        return $this -> fecha_registro;
    }
     public function esta_Activo(){
        return $this -> activo;
    }
    public function cambiar_nombre($nombre){
        $this -> nombre = $nombre;
    }
     public function cambiar_email($email){
         $this -> email = $email;
    }
    public function cambiar_password($password){
         $this -> password = $password;
    }
    public function cambiar_activo($activo){
         $this -> activo = $activo;
    }
 
}
