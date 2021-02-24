<?php
date_default_timezone_set('America/Mexico_City');
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('Api_model','AM',true);
		$this->load->library('componentes');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Api_model','AM',true);
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
		$data['datos']= json_encode($this->AM->consulta_personalizada('clientes', 'activo=1 ORDER BY id DESC')['data']);
		$this->load->view('clientes/cliente',$data);
		$this->load->view('footer');
	}

	public function ver_cliente($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['cliente'] = json_encode($this->AM->consulta('vw_domicilios_clientes',$condicion)['data'][0]);
		
		$this->load->view('clientes/ver_cliente',$data);
		$this->load->view('footer');
	}


}
