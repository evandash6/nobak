<?php
date_default_timezone_set('America/Mexico_City');
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

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

	//Funcion para crear select para las consultas
    public function crea_select($tabla, $id = null){
        $valores = "<option value=''>Selecciona</option>";
        $array =  $this->AM->all($tabla,'array');
        foreach ($array as $valor) {
            if ($id != null && $valor->id == $id)
               $valores .= '<option selected value="' . $valor->id . '">' . $valor->nombre . '</option>';
            else
               $valores .= '<option value="' . $valor->id . '">' . $valor->nombre . '</option>';
        }
        return $valores;
    }

	// //Funcion de ver empleados en tabla
	public function index(){
		$this->basicas();
		$data['empleados'] = json_encode($this->AM->consulta_personalizada('empleados', 'activo=1 ORDER BY id DESC')['data']);
		$data['puestos'] = $this->AM->crea_select('puestos',null,'activo=1');
		$this->load->view('empleados/empleado',$data);
		$this->load->view('footer');
	}

	public function ver_empleado($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['empleado'] = json_encode($this->AM->consulta('empleados',$condicion)['data'][0]);
		$data['puestos'] = $this->AM->crea_select('puestos',null,'activo=1');
		$this->load->view('empleados/ver_empleado',$data);
		$this->load->view('footer');
	}

	public function save_empleado(){
		$arr = $_POST;
		$data_emp = array(
			'nombre' => $arr['nombre'],
			'fecha_nac'=> $arr['fecha_nac'],
			'curp'=> $arr['curp'],
			'domicilio'=> $arr['domicilio'],
			'telefono'=> $arr['telefono'],
			'celular'=> $arr['celular'],
			'email'=> $arr['email'],
			'password'=> password_hash($arr['pass'],PASSWORD_BCRYPT),
			'puesto_id'=> $arr['puesto_id'],
			'actividades'=> $arr['actividades'],
			'fecha_ingreso'=> $arr['fecha_ingreso'],
			'usuario_creador'=> 1,
			'fecha_creacion'=> date('Y-m-d H:i:s')
		);
		echo json_encode($this->AM->save('empleados',$data_emp));
	}

	public function editar_empleado($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['empleado'] = json_encode($this->AM->consulta('empleados',$condicion)['data'][0]);
		$data['puestos'] = $this->AM->crea_select('puestos',null,'activo=1');
		$this->load->view('empleados/editar_empleado',$data);
		$this->load->view('footer');
	}

	public function actualizar_empleado(){
		$arr = $_POST;
		$data_emp = array(
			'nombre' => $arr['nombre'],
			'fecha_nac'=> $arr['fecha_nac'],
			'curp'=> $arr['curp'],
			'domicilio'=> $arr['domicilio'],
			'telefono'=> $arr['telefono'],
			'celular'=> $arr['celular'],
			'email'=> $arr['email'],
			'puesto_id'=> $arr['puesto_id'],
			'actividades'=> $arr['actividades'],
			'fecha_ingreso'=> $arr['fecha_ingreso']
		);
		$condicion = array('id'=>$arr['id']);
		echo json_encode($this->AM->actualizar('empleados',$data_emp,$condicion));
	}

	public function act_pass(){
		$arr = $_POST;
		$data_emp = array(
			'password'=> password_hash($arr['pass_m2'],PASSWORD_BCRYPT),
		);
		$condicion = array('id'=>$arr['id']);
		echo json_encode($this->AM->actualizar('empleados',$data_emp,$condicion));
	}

	public function inactivar_empleado($id){
		$arr = $_POST;
		$data_emp = array(
			'activo'=> 0,
		);
		$condicion = array('id'=>$id);
		echo json_encode($this->AM->actualizar('empleados',$data_emp,$condicion));
	}

}
