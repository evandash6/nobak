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
	}
	
	public function editar_empleado($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['empleado']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'empleados','condicion'=>$condicion))->response)->data);
		
		$this->load->view('empleados/editar_empleado',$data);
	
		$this->load->view('footer');
	}
	public function actualizar_empleado(){
		$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
		$_POST['tabla']='empleados';
		$_POST['datos'] = array('direccion' => $_POST['direccion'],'telefono' => $_POST['telefono'],'cp' => $_POST['cp'],
			'colonia' => $_POST['colonia'],'email' => $_POST['email'],'password' => $password);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('actualizar', $_POST)->response);
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
		$_POST['datos'] = array('nombre' => $_POST['nombre']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_usuario(){
		$_POST['tabla']='empleados';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
	public function entrega(){
		$this->basicas();
		$_POST['tabla'] = 'formas_entrega';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		$this->load->view('entregas/entrega',$data);
		$this->load->view('entregas/entrega_js');
		$this->load->view('footer');
	}
	public function crea_entrega(){
		$titulo=$_POST['titulo'];
		$costo =$_POST['costo'];
		$descripcion=$_POST['descripcion'];
		$mensaje_email=$_POST['mensaje_email'];
		$fecha_creacion=$_POST['fecha_creacion'];
		$_POST['tabla'] = 'formas_entrega';
		$_POST['datos'] = array('titulo'=>$titulo,'costo'=>$costo,'descripcion'=>$descripcion,
		'mensaje_email'=>$mensaje_email,'fecha_creacion'=>$fecha_creacion);
		$this->api->post('insertar',$_POST)->response;
			echo'<script type="text/javascript">
				alert("Forma de Entrega registrada correctamente : ");
				window.location.href="entrega";
			</script>';		
	}
	public function ver_entrega($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['entrega']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'formas_entrega','condicion'=>$condicion))->response)->data);
		$this->load->view('entregas/ver_entrega',$data);
		$this->load->view('footer');
	}
	public function editar_entrega($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['entrega']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'formas_entrega','condicion'=>$condicion))->response)->data);
		//var_dump($data['producto']);
		$this->load->view('entregas/editar_entrega',$data);
		$this->load->view('footer');
	}
	public function actualizar_entrega(){
		$_POST['tabla']='formas_entrega';
		$_POST['datos'] = array('titulo' => $_POST['titulo'],'descripcion' => $_POST['descripcion'],
		'costo' => $_POST['costo'],'mensaje_email' => $_POST['mensaje_email']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_entrega(){
		$_POST['tabla']='formas_entrega';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
	public function pago(){
		$this->basicas();
		$_POST['tabla'] = 'formas_pago';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		$this->load->view('pagos/pago',$data);
		$this->load->view('pagos/pago_js');
		$this->load->view('footer');
	}
	public function crea_pago(){
		$file = $this->carga_archivo('foto_pago',4000,'gif|jpg|png','./frontend/forma_pago/','jpg');
		if($file['ban']){
		$_POST['imagen'] = $file['file_name'];
		$titulo=$_POST['titulo'];
		$costo =$_POST['costo'];
		$descripcion=$_POST['descripcion'];
		$mensaje_email=$_POST['mensaje_email'];
		$fecha_creacion=$_POST['fecha_creacion'];
		$imagen=$_POST['imagen'];
		$_POST['tabla'] = 'formas_pago';
		$_POST['datos'] = array('titulo'=>$titulo,'costo'=>$costo,'descripcion'=>$descripcion,
		'mensaje_email'=>$mensaje_email,'fecha_creacion'=>$fecha_creacion,'imagen'=>$imagen);
		$this->api->post('insertar',$_POST)->response;
		echo'<script type="text/javascript">
				alert("Forma de Pago registrada correctamente : ");
				window.location.href="pago";
			</script>';
		}else	echo'<script type="text/javascript">
		alert("ERROR Forma de Pago no registrada : ");
		window.location.href="pago";
		</script>';	
	}
	public function ver_pago($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['pago']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'formas_pago','condicion'=>$condicion))->response)->data);
		$this->load->view('pagos/ver_pago',$data);
		$this->load->view('footer');
	}
	public function editar_pago($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['pago']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'formas_pago','condicion'=>$condicion))->response)->data);
		//var_dump($data['producto']);
		$this->load->view('pagos/editar_pago',$data);
	
		$this->load->view('footer');
	}
	public function actualizar_pago(){
		$_POST['tabla']='formas_pago';
		$_POST['datos'] = array('titulo' => $_POST['titulo'],'descripcion' => $_POST['descripcion'],
		'costo' => $_POST['costo'],'mensaje_email' => $_POST['mensaje_email']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_pago(){
		$_POST['tabla']='formas_pago';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
	public function ventas(){
		$this->basicas();
		$_POST['tabla'] = 'ventas';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		$this->load->view('ventas/ventas',$data);
		$this->load->view('ventas/ventas_js');
		$this->load->view('footer');
	}
	public function ver_venta($id){
		$this->basicas();
		$condicion = array('venta_id'=>$id);
		$data['venta']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'vw_detalle_ventas','condicion'=>$condicion))->response)->data);
		$this->load->view('ventas/ver_venta',$data);
		$this->load->view('footer');
	}
	
	public function productos(){
		$data = $this->basicas();
		$_POST['tabla'] = 'vw_productos_filtro';
		$data['datos']=json_encode(json_decode( $this->api->post('all',$_POST)->response)->data);
		//var_dump($data['datos']);
		$data['categorias'] = $this->crea_select('categorias');
		$this->load->view('productos/producto',$data);
		$this->load->view('productos/producto_js');
		$this->load->view('footer');
	}
	private function carga_archivo($nombre,$tam,$tipo,$path,$acro){
		$config['upload_path'] = $path;
        $config['allowed_types'] = $tipo;
        $config['max_size'] = $tam;
		$config['file_name'] = $acro.'_'.md5(date('Y-m-d h:i:s'));
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload($nombre))
			return array('ban'=>true,'file_name'=>$config['file_name']);
		else
			return array('ban'=>false);
	}
	public function crea_producto(){
		//$usuario_creador=$_POST['usuario_creador'];
		//$direccion1=$_POST['direccion1'];
		//$estatus=$_POST['estatus'];
		//$tipo=$_POST['tipo'];
		$file = $this->carga_archivo('foto_producto',4000,'gif|jpg|png','./frontend/productos/','jpg');
		if($file['ban']){
		$_POST['fotografia_name'] = $file['file_name'];
		$code=$_POST['code'];
		$nombre =$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$activo=$_POST['activo'];
		$categoria=$_POST['categoria'];
		$fecha_creacion=$_POST['fecha_creacion'];
		$fotografía_name=$_POST['fotografia_name'];
		$_POST['tabla'] = 'productos';
		$_POST['datos'] = array('nombre'=>$nombre,'code'=>$code,'activo'=>$activo,'categoria'=>$categoria,'descripcion'=>$descripcion,'precio'=>$precio,
		'fotografia_name'=>$fotografía_name, 'fecha_creacion'=>$fecha_creacion);
		$this->api->post('insertar',$_POST)->response;
		echo'<script type="text/javascript">
				alert("Producto registrado correctamente : ");
				window.location.href="productos";
			</script>';
		}else 	echo'<script type="text/javascript">
		alert("Producto No registrado: ");
		window.location.href="productos";
		</script>';	
	}
	public function ver_producto($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['producto']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'vw_productos_filtro','condicion'=>$condicion))->response)->data);
		$this->load->view('productos/ver_producto',$data);
		$this->load->view('footer');
	}
	public function editar_producto($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['producto']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'vw_productos_filtro','condicion'=>$condicion))->response)->data);
		//var_dump($data['producto']);
		$this->load->view('productos/editar_producto',$data);
	
		$this->load->view('footer');
	}
	public function actualizar_producto(){
		$_POST['tabla']='productos';
		$_POST['datos'] = array('nombre' => $_POST['nombre'],'descripcion' => $_POST['descripcion'],
		'precio' => $_POST['precio'],'activo' => $_POST['activo']);
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
		$cdl=$_POST['cdl'];
		$telefono=$_POST['telefono'];
		$fecha_creacion=$_POST['fecha_creacion'];
		$cedis=$_POST['cedis'];
		$_POST['tabla'] = 'cedis';
		$_POST['datos'] = array('cedis'=>$cedis,'email'=>$email,'direccion'=>$direccion,
		'contacto'=>$contacto,'telefono'=>$telefono,'cdl'=>$cdl,'fecha_creacion'=>$fecha_creacion);
		$this->api->post('insertar',$_POST)->response;
		echo'<script type="text/javascript">
				alert("CeDis registrado correctamente : ");
				window.location.href="cedis";
			</script>';		
	}
	public function ver_cedis($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['cedis']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'cedis','condicion'=>$condicion))->response)->data);
		$this->load->view('cedis/ver_cedis',$data);
		$this->load->view('footer');
	}
	public function editar_cedis($id){
		$this->basicas();
		$condicion = array('id'=>$id);
		$data['cedis']=json_encode(json_decode( $this->api->post('consulta',array('tabla'=>'cedis','condicion'=>$condicion))->response)->data);
		var_dump($data['cedis']);
		$this->load->view('cedis/editar_cedis',$data);
	
		$this->load->view('footer');
	}
	public function actualizar_cedis(){
		$_POST['tabla']='cedis';
		$_POST['datos'] = array('cedis' => $_POST['cedis'],'cdl' => $_POST['cdl'],'telefono' => $_POST['telefono'],
		'email' => $_POST['email'],'contacto' => $_POST['contacto']);
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump($this->api->post('actualizar', $_POST)->response);
	}
	public function eliminar_cedis(){
		$_POST['tabla']='cedis';
		$_POST['condicion'] = array('id'=>$_POST['id']);
		var_dump( $this->api->post('eliminar', $_POST)->response);
	}
}
