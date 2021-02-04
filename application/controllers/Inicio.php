<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

require APPPATH. '/libraries/restclien.php';
class Inicio extends CI_Controller {

	private $api;

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->library('componentes');
		$this->load->helper(array('form', 'url'));

		$this->api = new RestClient([
			'base_url' => 'https://apinobak.lamat.pro/api/',
			
			'format' => "json"
		]);
		//$this->seguridad();
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
		$this->basicas();
		$data['estado'] = $this->crea_select_estado();
		//var_dump($data);
		//$this->load->view('prueba',$data);
		//$this->load->view('prueba_js');
		$this->load->view('footer');
		
	}

	
	public function crea_select_estado($id = null){
		$_POST['tabla'] = 'cat_estado';
		$valores = "<option value=''>Selecciona</option>";
		$array = $this->api->post('all',$_POST);
        foreach ($array['data'] as $valor) {
            if ($id != null && $valor->id == $id)
               $valores .= "<option selected value='" . $valor->id . "'>" . $valor->nom_ent . "</option>";
            else
               $valores .= "<option value='" . $valor->id . "'>" . $valor->nom_ent . "</option>";
        }
        return $valores;
	}
	public function crea_select($tabla,$id = null){
		$_POST['tabla'] = $tabla;
		$valores = "<option value=''>Selecciona</option>";
		$array = $this->api->post('all',$_POST);
        foreach ($array['data'] as $valor) {
            if ($id != null && $valor->id == $id)
               $valores .= "<option selected value='" . $valor->id . "'>" . $valor->nombre. "</option>";
            else
               $valores .= "<option value='" . $valor->id . "'>" . $valor->nombre . "</option>";
        }
        return $valores;
	}
	public function empleados(){
		$data = $this->basicas();
		$this->load->view('empleados/empleado');
		$this->load->view('footer');
	}

	public function crea_empleado(){
		$nombre=$_POST['nombre'];
		$pass=$_POST['password'];
		$password=password_hash($pass,PASSWORD_BCRYPT);
		$curp=$_POST['curp'];
		$fecha_nac=$_POST['fecha_nac'];
		$puesto=$_POST['puesto'];
		$domicilio=$_POST['domicilio'];
		$telefono=$_POST['telefono'];
		$celular=$_POST['celular'];
		$email=$_POST['email'];
		$fecha_creacion=$_POST['fecha_ingreso'];
		$_POST['tabla'] = 'empleados';
		$_POST['datos'] = array('nombre'=>$nombre,'telefono'=>$telefono,'celular'=>$celular,'puesto_id'=>$puesto,'email'=>$email,'password'=>$password,'fecha_nac'=>$fecha_nac,'curp'=>$curp,'domicilio'=>$domicilio,
		'activo'=>'1','fecha_creacion'=>$fecha_creacion);
		$this->api->post('insertar',$_POST)->response;
		echo'<script type="text/javascript">
				alert("Empleado registrado correctamente : ");
				window.location.href="empleados";
			</script>';		
	}
	public function usuarios(){
	    $this->basicas();
		$_POST['tabla'] = 'empleados';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		//var_dump($data['datos']);
		$this->load->view('usuarios/usuario',$data);
		$this->load->view('usuarios/usuario_js');
		$this->load->view('footer');
	}
	public function editar_usuario(){
		$_POST['tabla']='empleados';
		$_POST['datos'] = array('nombre' => $_POST['nombre'],'fecha_creacion'=>$_POST['fecha_creacion']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_usuario(){
		$_POST['tabla']='empleados';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
	public function clientes(){
		$this->basicas();
		$_POST['tabla'] = 'clientes';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		$data['estado'] = $this->crea_select_estado();
		$this->load->view('clientes/cliente',$data);
		$this->load->view('clientes/cliente_js');
		$this->load->view('footer');
	}
	public function crea_cliente(){
		//$ultimo_acceso=$_POST['ultimo_acceso'];
		//$direccion1=$_POST['direccion1'];
		//$estado=$_POST['estado_id'];
		//$municipio=$_POST['municipio_id'];
		$email=$_POST['email'];
		$direccion =$_POST['direccion'];
		$colonia=$_POST['colonia'];
		$estado=$_POST['estado'];
		$cp=$_POST['cp'];
		$telefono=$_POST['telefono'];
		$fecha_registro=$_POST['fecha_registro'];
		$nombre=$_POST['nombre'];
		$_POST['tabla'] = 'clientes';
		$_POST['datos'] = array('nombre'=>$nombre,'email'=>$email,'estado_id'=>$estado,'direccion'=>$direccion,'colonia'=>$colonia,
		'cp'=>$cp,'telefono'=>$telefono,'fecha_registro'=>$fecha_registro);
		$res=$this->api->post('insertar',$_POST)->response;
		$data = json_decode($res,true);
		//var_dump($data['id_insertado']);
		//---------Tabla de facturación----------------
		$cliente_id=$data['id_insertado'];
		$rfc=$_POST['rfc'];
		$nombre=$_POST['nombre'];
		$uso_cfdi=$_POST['uso_cfdi'];
		$direccionf =$_POST['direccionf'];
		$coloniaf=$_POST['coloniaf'];
		$fecha_registro=$_POST['fecha_registro'];
		$estadof=$_POST['estadof'];
		$nota=$_POST['nota'];
		$cpf=$_POST['cpf'];
		$telefonof=$_POST['telefonof'];
		$_POST['tabla'] = 'facturacion_clientes';
		$_POST['datos'] = array('cliente_id'=>$cliente_id,'nombre'=>$nombre,'nota'=>$nota,'rfc'=>$rfc,'uso_cfdi'=>$uso_cfdi,'direccion'=>$direccionf,'colonia'=>$coloniaf,
		'estado_id'=>$estadof,'cp'=>$cpf,'telefono'=>$telefonof,'fecha_registro'=>$fecha_registro);
		$this->api->post('insertar',$_POST)->response;
		echo'<script type="text/javascript">
				alert("Empleado registrado correctamente : ");
				window.location.href="clientes";
			</script>';		
	}
	public function editar_cliente(){
		$_POST['tabla']='clientes';
		$_POST['datos'] = array('nombre' => $_POST['nombre'],'fecha_registro'=>$_POST['fecha_registro'],'direccion'=>$_POST['direccion'],
								'cp'=>$_POST['cp'],'colonia'=>$_POST['colonia'],'telefono'=>$_POST['telefono'],'email'=>$_POST['email']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_cliente(){
		$_POST['tabla']='clientes';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
	public function productos(){
		$data = $this->basicas();
		$_POST['tabla'] = 'productos';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		//var_dump($data['datos']);
		$data['categorias'] = $this->crea_select('categorias');
		$this->load->view('productos/producto',$data);
		$this->load->view('productos/producto_js');
		$this->load->view('footer');
	}
	public function crea_producto(){
		//$usuario_creador=$_POST['usuario_creador'];
		//$direccion1=$_POST['direccion1'];
		//$estatus=$_POST['estatus'];
		//$tipo=$_POST['tipo'];
		$code=$_POST['code'];
		$nombre =$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$fecha_creacion=$_POST['fecha_creacion'];
		$_POST['tabla'] = 'productos';
		$_POST['datos'] = array('nombre'=>$nombre,'code'=>$code,'descripcion'=>$descripcion,'precio'=>$precio,
		'fecha_creacion'=>$fecha_creacion);
		$this->api->post('insertar',$_POST)->response;
		echo'<script type="text/javascript">
				alert("Producto registrado correctamente : ");
				window.location.href="productos";
			</script>';		
	}
	public function editar_producto(){
		$_POST['tabla']='productos';
		$_POST['datos'] = array('nombre' => $_POST['nombre'],'fecha_creacion'=>$_POST['fecha_creacion'],'descripcion'=>$_POST['descripcion'],
								'precio'=>$_POST['precio'],'code'=>$_POST['code']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump($this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_producto(){
		$_POST['tabla']='productos';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
	public function cedis(){
		$this->basicas();
		$_POST['tabla'] = 'cedis';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		//var_dump($data['datos']);
		$this->load->view('cedis/cedis',$data);
		$this->load->view('cedis/cedis_js');
		$this->load->view('footer');
	}
	public function crea_cedis(){
		//$ultimo_acceso=$_POST['ultimo_acceso'];
		//$direccion1=$_POST['direccion1'];
		//$estado=$_POST['estado_id'];
		//$municipio=$_POST['municipio_id'];
		$email=$_POST['email'];
		$direccion =$_POST['direccion'];
		$contacto=$_POST['contacto'];
		$telefono=$_POST['telefono'];
		$fecha_creacion=$_POST['fecha_creacion'];
		$cedis=$_POST['cedis'];
		$_POST['tabla'] = 'cedis';
		$_POST['datos'] = array('cedis'=>$cedis,'email'=>$email,'direccion'=>$direccion,
		'contacto'=>$contacto,'telefono'=>$telefono,'fecha_creacion'=>$fecha_creacion);
		$this->api->post('insertar',$_POST)->response;
		echo'<script type="text/javascript">
				alert("CeDis registrado correctamente : ");
				window.location.href="cedis";
			</script>';		
	}
	public function editar_cedis(){
		$_POST['tabla']='cedis';
		$_POST['datos'] = array('cedis' => $_POST['cedis'],'fecha_creacion'=>$_POST['fecha_creacion'],'direccion'=>$_POST['direccion'],
								'contacto'=>$_POST['contacto'],'telefono'=>$_POST['telefono'],'email'=>$_POST['email']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_cedis(){
		$_POST['tabla']='cedis';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
}
