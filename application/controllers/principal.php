<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("modelo_principal");
	}
	public function logout()
	{
		$this->session->sess_destroy();
        $this->load->view('plantilla/login');
	}
	
	public function principal()
	{	
		if(empty($this->session->userdata("id"))){
			redirect(base_url("principal/logout")); 
		}
		else{
        	$this->load->view('plantilla/header');
        	$this->load->view('plantilla/principal');
        	$this->load->view('plantilla/footer');
		}
	}
	

	public function verificarUsuario()
	{
                $datos["verificar"] = $this->modelo_principal->verificarUsuario(
                        $this->input->post("email"),
                        $this->input->post("telefono")
                );
                if (empty($datos["verificar"])) {
                        redirect(base_url("principal/logout"));
                } else {

                        foreach ($datos["verificar"] as $fila) {
                                $id = $fila->id;
                                $nombre = $fila->nombre;
                                $telefono = $fila->telefono;
                                $email = $fila->email;
			        $foto = $fila->foto;
                        }
                        $data = array(
                                'id' => $id,
                                'nombre' => $nombre,
                                'telefono' => $telefono,
                                'email' => $email,
								'foto' => $foto,
                                'login' => TRUE
                        );
                        $this->session->set_userdata($data);
                        redirect(base_url("principal/principal"));
                }
        }
}


