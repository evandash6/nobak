<?php
date_default_timezone_set('America/Mexico_City');
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

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
		$data['datos'] = json_encode($this->AM->consulta_personalizada('vw_productos_filtro','1=1 ORDER BY nombre')['data']);
		$data['categorias'] = $this->AM->crea_select('categorias',null,'activo=1');
		$this->load->view('productos/producto',$data);
		$this->load->view('footer');
	}

    public function save_producto(){
        $config['upload_path'] = 'frontend/productos/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
		$config['file_name'] = uniqid();
		//Cragamos libreria necesaria
		$this->load->library('upload', $config);
		//verificamos la carga del archivo
		if($this->upload->do_upload('foto_producto')){
			$_POST['fotografia_name'] = $this->upload->data()['file_name'];
            $arr = $_POST;
			$data_emp = array(
                'nombre' => $arr['nombre'],
                'descripcion'=> $arr['descripcion'],
                'categoria'=> $arr['categoria_id'],
                'banner'=> $arr['banner'],
				'precio'=> $arr['precio'],
				'precio_promo'=> $arr['precio_promo'],
                'fotografia_name'=> $arr['fotografia_name']
            );
            echo json_encode($this->AM->save('productos',$data_emp));
		}
		else{
			echo json_encode(array('ban'=>false,'error'=>$this->upload->display_errors()));
		}
    }

    public function ver_producto($id){
		$this->basicas();
		$data['producto'] = json_encode($this->AM->consulta_personalizada('vw_productos_filtro','id='.$id.' ORDER BY nombre')['data']);
		$this->load->view('productos/ver_producto',$data);
		$this->load->view('footer');
	}

    public function editar_producto($id){
		$this->basicas();
		$data['producto'] = json_encode($this->AM->consulta_personalizada('vw_productos_filtro','id='.$id.' ORDER BY nombre')['data'][0]);
        $data['categorias'] = $this->AM->crea_select('categorias',null,'activo = 1');
		$this->load->view('productos/editar_producto',$data);
		$this->load->view('footer');
	}

    public function actualizar_producto(){
        $config['upload_path'] = 'frontend/productos/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
		$config['file_name'] = uniqid();
		//Cragamos libreria necesaria
		$this->load->library('upload', $config);
		//verificamos la carga del archivo
		if($_FILES['foto_producto']['name'] != ""){
			if($this->upload->do_upload('foto_producto')){
				$_POST['fotografia_name'] = $this->upload->data()['file_name'];
				$arr = $_POST;
				$data_emp = array(
					'nombre' => $arr['nombre'],
					'descripcion'=> $arr['descripcion'],
					'categoria'=> $arr['categoria_id'],
					'banner'=> $arr['banner'],
					'precio'=> $arr['precio'],
					'precio_promo'=> $arr['precio_promo'],
					'fotografia_name'=> $arr['fotografia_name'],
					'activo'=> $arr['activo']
				);
				$condicion = array('id'=>$arr['id']);
            	echo json_encode($this->AM->actualizar('productos',$data_emp,$condicion));
			}
			else{
				echo json_encode(array('ban'=>false,'error'=>$this->upload->display_errors()));
			}
		}
		else{
			$arr = $_POST;
			$data_emp = array(
				'nombre' => $arr['nombre'],
				'descripcion'=> $arr['descripcion'],
				'categoria'=> $arr['categoria_id'],
				'banner'=> $arr['banner'],
				'precio'=> $arr['precio'],
				'precio_promo'=> $arr['precio_promo'],
				'activo'=> $arr['activo']
			);
			$condicion = array('id'=>$arr['id']);
            echo json_encode($this->AM->actualizar('productos',$data_emp,$condicion));
		}
	}


}
