<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelo_principal extends CI_MODEL
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function verificarUsuario($correo, $pass)
    {
        $consulta = $this->db->query("SELECT * FROM contactos  
      WHERE email='$correo' AND telefono='$pass' ");
        return  $consulta->result();

    }

}