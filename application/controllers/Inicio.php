<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');


class Inicio extends CI_Controller {

	private $api;

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->library('componentes');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Api_model','AM',true);
		$this->seguridad();
	}

	private function seguridad(){
		if(!isset($_SESSION['empleado_id']))
		redirect(base_url().'sesion');
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

	private function integra($arr,$tipo){
		switch ($tipo) {
			case 'barras':
				$new_arr = array();
				for ($i=0; $i < count($arr) ; $i++) { 
					$new_arr['etiquetas'][$i] = $arr[$i]->mes;
					$new_arr['valores'][$i] = $arr[$i]->total_mes;
				}
				return $new_arr;
			break;
		}
	}
	
	//seguimiento
	public function index(){
		$this->basicas();
		$data['pie'] = $this->AM->all('vw_pie')['data'];
		$data['barras'] = $this->integra($this->AM->all('vw_barras')['data'],'barras');
		$this->load->view('estadistica',$data);
	}

	/// FORMAS DE PAGO ///
	public function fpago(){
		$this->basicas();
        $data['datos'] = json_encode($this->AM->consulta_personalizada('formas_pago','activo=1 ORDER BY id DESC')['data']);
        $this->load->view('pagos/fpago',$data);
	}

	public function ver_fpago($id){
		$this->basicas();
		$data['fpago'] = json_encode($this->AM->consulta_personalizada('formas_pago','id='.$id)['data'][0]);
		$this->load->view('pagos/ver_fpago',$data);
		$this->load->view('footer');
	}

	public function editar_fpago($id){
		$this->basicas();
		$data['fpago']= json_encode($this->AM->consulta_personalizada('formas_pago','id='.$id)['data'][0]);
		$this->load->view('pagos/editar_fpago',$data);
		$this->load->view('footer');
	}

	public function actualizar_fpago(){
		$config['upload_path'] = 'frontend/images/payment/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
		$config['file_name'] = uniqid();
		//Cragamos libreria necesaria
		$this->load->library('upload', $config);
		//verificamos la carga del archivo
		if($this->upload->do_upload('foto_fpago')){
			$_POST['imagen'] = $this->upload->data()['file_name'];
			$arr  = $_POST;
			$data_pag = array(
				'titulo' => $arr['titulo'],
				'descripcion'=> $arr['descripcion'],
				'costo'=> $arr['costo'],
				'imagen'=> $_POST['imagen'],
				'mensaje_email'=> $arr['mensaje_email']
			);
		}
		else{
			$arr  = $_POST;
			$data_pag = array(
				'titulo' => $arr['titulo'],
				'descripcion'=> $arr['descripcion'],
				'costo'=> $arr['costo'],
				'mensaje_email'=> $arr['mensaje_email']
			);
		}
		$condicion = array('id'=>$arr['id']);
		echo json_encode($this->AM->actualizar('formas_pago',$data_pag,$condicion));
	}

	public function inactivar_fpago($id){
		$arr = $_POST;
		$data_pag = array(
			'activo'=> 0,
		);
		$condicion = array('id'=>$id);
		echo json_encode($this->AM->actualizar('formas_pago',$data_pag,$condicion));
	}

	public function save_fpago(){
		$config['upload_path'] = 'frontend/images/payment/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
		$config['file_name'] = uniqid();
		//Cragamos libreria necesaria
		$this->load->library('upload', $config);
		//verificamos la carga del archivo
		if($this->upload->do_upload('foto_fpago')){
			$_POST['imagen'] = $this->upload->data()['file_name'];
			$arr  = $_POST;
			$data_pag = array(
				'titulo' => $arr['titulo'],
				'descripcion'=> $arr['descripcion'],
				'costo'=> $arr['costo'],
				'imagen'=> $_POST['imagen'],
				'mensaje_email'=> $arr['mensaje_email'],
				'usuario_creacion' => 1,
				'fecha_creacion' => date('Y-m-d H:i:s')
			);
		}
		else{
			$arr  = $_POST;
			$data_pag = array(
				'titulo' => $arr['titulo'],
				'descripcion'=> $arr['descripcion'],
				'costo'=> $arr['costo'],
				'mensaje_email'=> $arr['mensaje_email'],
				'usuario_creacion' => 1,
				'fecha_creacion' => date('Y-m-d H:i:s')
			);
		}
		echo json_encode($this->AM->save('formas_pago',$data_pag));
	}	
	/// END FORMAS DE PAGO ///
	
	/// FORMAS DE ENTREGA ///
	public function entregas(){
		$this->basicas();
		$data['datos']= json_encode($this->AM->consulta_personalizada('formas_entrega','activo=1')['data']);
		$this->load->view('entregas/entrega',$data);
		$this->load->view('footer');
	}

	public function ver_entrega($id){
		$this->basicas();
		$data['datos']= json_encode($this->AM->consulta_personalizada('formas_entrega','id='.$id)['data'][0]);
		$this->load->view('entregas/ver_entrega',$data);
		$this->load->view('footer');
	}

	public function editar_entrega($id){
		$this->basicas();
		$data['entrega']= json_encode($this->AM->consulta_personalizada('formas_entrega','id='.$id)['data'][0]);
		$this->load->view('entregas/editar_entrega',$data);
		$this->load->view('footer');
	}

	public function actualizar_entrega(){
		$arr  = $_POST;
		$data_ent = array(
			'titulo' => $arr['titulo'],
			'descripcion'=> $arr['descripcion'],
			'costo'=> $arr['costo'],
			'mensaje_email'=> $arr['mensaje_email']
		);
		$condicion = array('id'=>$arr['id']);
		echo json_encode($this->AM->actualizar('formas_entrega',$data_ent,$condicion));
	}

	public function inactivar_entrega($id){
		$arr = $_POST;
		$data_pag = array(
			'activo'=> 0,
		);
		$condicion = array('id'=>$id);
		echo json_encode($this->AM->actualizar('formas_entrega',$data_pag,$condicion));
	}

	public function save_entrega(){
		$arr  = $_POST;
		$data_ent = array(
			'titulo' => $arr['titulo'],
			'descripcion'=> $arr['descripcion'],
			'costo'=> $arr['costo'],
			'mensaje_email'=> $arr['mensaje_email'],
			'usuario_creacion' => 1,
			'fecha_creacion' => date('Y-m-d H:i:s')
		);
		echo json_encode($this->AM->save('formas_entrega',$data_ent));	
	}
	/// END FORMAS DE ENTREGA ///

	public function variables(){
		var_dump($_SESSION);
	}
	
}
