<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->helper("url");
        $this->load->library("fpdf/fpdf");
        define('FPDF_FONTPATH',BASEPATH.'/libraries/fpdf/font/');
		$this->load->model("modelo_contactos");
	}
    public function imprimir(){
		
        $this->fpdf->AddPage();//Añade la primera pagina
        $this->fpdf->SetFont('Times','B',15);
        $this->fpdf->SetXY(30,30);//posicion de las letras
        $this->fpdf->Cell(150,35,"LISTADO DE CONTACTOS",0,'B','C',0);  //alto , ancho, texto, como un encendedor del borde, LTRB los bordes de los lados, alinng, 
        $this->fpdf->SetXY(10,60);
        $this->fpdf->Cell(15,15,"Nro",1,'LTRB','C',0);
        $this->fpdf->Cell(40,15,"Nombre",1,'LTRB','C',0);     
        $this->fpdf->Cell(35,15,"Telefono",1,'LTRB','C',0);      


		
        $this->fpdf->Cell(60,15,"Email",1,'LTRB','C',0);      
        $this->fpdf->Cell(40,15,"Foto",1,'LTRB','C',0);  
		$data["ver"]=$this->modelo_contactos->ver();
		$i=1;
		$y=70;
		foreach($data["ver"] as $fila){
			$this->fpdf->SetFont('Times','',10);
			$this->fpdf->SetXY(10,$y);
        	$this->fpdf->Cell(15,15,$i++,1,'LTRB','C',0);     
        	$this->fpdf->Cell(40,15,$fila->nombre,1,'LTRB','C',0);        
        	$this->fpdf->Cell(35,15,$fila->telefono,1,'LTRB','C',0);     
        	$this->fpdf->Cell(60,15,$fila->email,1,'LTRB','C',0);
			$this->fpdf->Image(base_url("fotos/").$fila->foto,175,70,8);    
        	$this->fpdf->Cell(40,15,"",1,'LTRB','C',0);
			$y=$y+5;
		}
        $this->fpdf->Output('contactos.pdf','I');   //asegura subir el archivo
    }
	public function imprimir_user($id){
		$this->fpdf->AddPage();//Añade la primera pagina
        $this->fpdf->SetFont('Times','U',30);
        $this->fpdf->SetXY(30,30);//posicion de las letras
        $this->fpdf->Cell(150,35,"CONTACTOS",0,'B','C',0);  //alto , ancho, texto, como un encendedor del borde, LTRB los bordes de los lados, alinng, 
		if(is_numeric($id)){
			$data["datos"]=$this->modelo_contactos->editar($id);
			//$this->load->view('vista_editar_contactos',$data);

				$this->fpdf->SetXY(100,70);
		//$data["datos"]=$this->modelo_contactos->ver();
			foreach($data["datos"] as $fila){
				$this->fpdf->Image(base_url("fotos/").$fila->foto,20,70,50);    
				$this->fpdf->SetFont('Times','B',20);
        		$this->fpdf->Cell(5,5,"Nombre",0,'','R',0);     
				$this->fpdf->Ln();  //cambiar los titulos en negrita y lo demas en letra normal
				$this->fpdf->SetFont('Times','I',15);
				$this->fpdf->Cell(98,10,$fila->nombre,0,'B','R',0);     
				$this->fpdf->Ln();   
				$this->fpdf->SetFont('Times','B',20);
        		$this->fpdf->Cell(96,10,"Telefono",0,'B','R',0);    
				$this->fpdf->Ln();  
				$this->fpdf->SetFont('Times','I',15);
				$this->fpdf->Cell(95,10,$fila->telefono,0,'LTRB',0,0);     
				$this->fpdf->Ln();  
				$this->fpdf->SetFont('Times','B',20);   
        		$this->fpdf->Cell(30,10,"Email",0,'LTRB',0,0);    
				$this->fpdf->Ln();
				$this->fpdf->SetFont('Times','I',15);
				$this->fpdf->Cell(60,10,$fila->email,0,'LTRB',0,0);     
				$this->fpdf->Ln();        
        		$this->fpdf->Output('contactos.pdf','I');   //asegura subir el archivo
			}
		}
	}

}

