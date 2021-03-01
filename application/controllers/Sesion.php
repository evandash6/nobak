<?php
date_default_timezone_set('America/Mexico_City');
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

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

	// //Funcion de ver empleados en tabla
	public function index(){
        $this->load->view('funciones2');
        $this->load->view('sesion/login');
	}

	public function valida_ses(){
        $email = $_POST['email'];
		$pass = $_POST['pass'];
		$res = $this->AM->consulta_personalizada('empleados',' email = \''.$email.'\'');
		if($res['ban'] && $res['total']>0){
			$data = json_decode(json_encode($res['data'][0]),true);
			$pass2 = $data['password'];
			if(password_verify($pass,$pass2)){
				// $data_acc = array(
				// 	'cliente_id'=> $data['id'],
				// 	'ip_acceso'=> $_SERVER['REMOTE_ADDR'],
				// 	'fecha_acceso'=> date('Y-m-d H:i:s')
				// );
				// $res = $this->AM->save('bitacora_accesos',$data_acc);
				$_SESSION['empleado_id'] = $data['id'];
				$_SESSION['nombre_completo'] = $data['nombre'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['`puesto_id`'] = $data['puesto_id'];;
				echo json_encode(array('ban'=>true));
			}
			else{
				echo json_encode(array('ban'=>false));
			}
		}
		else{
			echo json_encode(array('ban'=>false));
		}
	}

	public function _404(){
		$this->load->view('error_404');
	}

    public function eliminar_ses(){
        session_destroy();
        redirect(base_url().'sesion');
    }


}
