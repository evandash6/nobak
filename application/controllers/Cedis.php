<?php
date_default_timezone_set('America/Mexico_City');
defined('BASEPATH') OR exit('No direct script access allowed');

class Cedis extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('Api_model','AM',true);
		$this->load->library('componentes');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Api_model','AM',true);
		$this->seguridad();
	}

	private function seguridad(){
		if(!isset($_SESSION['empleado_id']))
		redirect(base_url().'sesion');
	}

	private function codificar($arr){
		echo json_encode($arr);
	}

	//Carga de componentes basicas
	private function basicas(){
		$data['logo'] = $this->componentes->logo();
		$data['boton_menu'] = $this->componentes->boton_menu();
		$data['ajustes_perfil'] = $this->componentes->ajustes_perfil();
		$this->load->view('header');
		$this->load->view('menu',$data);
		$this->load->view('funciones');
		return $data;
	}

	// //Funcion de ver empleados en tabla
	public function index(){
        $this->basicas();
        $data['datos'] = json_encode($this->AM->consulta_personalizada('cedis','activo=1 ORDER BY id DESC')['data']);
        $this->load->view('cedis/cedis',$data);
	}

    public function ver_cedis($id){
		$this->basicas();
		$data['datos'] = json_encode($this->AM->consulta_personalizada('cedis','id='.$id.' ORDER BY nombre')['data'][0]);
		$this->load->view('cedis/ver_cedis',$data);
		$this->load->view('footer');
	}

    public function save_cedis(){
		$arr = $_POST;
		$data_ced = array(
			'nombre' => $arr['nombre'],
			'cdl'=> $arr['cdl'],
			'direccion'=> $arr['direccion'],
			'telefono'=> $arr['telefono'],
			'contacto'=> $arr['contacto'],
			'email'=> $arr['email'],
			'usuario_creador'=> 1,
			'fecha_creacion'=> date('Y-m-d H:i:s')
		);
		echo json_encode($this->AM->save('cedis',$data_ced));
	}

    public function editar_cedis($id){
        $this->basicas();
        $data['datos'] = json_encode($this->AM->consulta_personalizada('cedis','id='.$id.' ORDER BY id DESC')['data'][0]);
        $this->load->view('cedis/editar_cedis',$data);
	}

    public function actualizar_cedis(){
		$arr = $_POST;
		$data_ced = array(
			'nombre' => $arr['nombre'],
			'cdl'=> $arr['cdl'],
			'direccion'=> $arr['direccion'],
			'telefono'=> $arr['telefono'],
			'contacto'=> $arr['contacto'],
			'email'=> $arr['email']
		);
        $condicion = array('id'=>$arr['id']);
		echo json_encode($this->AM->actualizar('cedis',$data_ced,$condicion));
	}

    public function inactivar_cedis($id){
		$data_ced = array(
			'activo' => 0
		);
        $condicion = array('id'=>$id);
		echo json_encode($this->AM->actualizar('cedis',$data_ced,$condicion));
	}

}
