<?php
date_default_timezone_set('America/Mexico_City');
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('componentes');
		//$this->load->model('Api_model','AM',true);
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
	public function index(){
		$data = $this->basicas();
		$this->load->view('footer');
		
	}
	public function empleados(){
		$data = $this->basicas();
		$this->load->view('empleados/empleado');
		$this->load->view('footer');
	}
	public function usuarios(){
		$data = $this->basicas();
		$this->load->view('usuarios/usuario');
		$this->load->view('usuarios/usuario_js');
		$this->load->view('footer');
	}
	public function clientes(){
		$data = $this->basicas();
		$this->load->view('clientes/cliente');
		$this->load->view('clientes/cliente_js');
		$this->load->view('footer');
	}
	public function productos(){
		$data = $this->basicas();
		$this->load->view('productos/producto');
		$this->load->view('productos/producto_js');
		$this->load->view('footer');
	}
	public function cedis(){
		$data = $this->basicas();
		$this->load->view('cedis/cedis');
		$this->load->view('cedis/cedis_js');
		$this->load->view('footer');
	}
}