<?php
date_default_timezone_set('America/Mexico_City');
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

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

	
	public function index(){
        $this->basicas();
		$data['ventas'] = json_encode($this->AM->consulta_personalizada('vw_ventas_seguimiento','1=1')['data']);
		$data['estatus'] = $this->AM->crea_select('estatus_general',null,'id<=9','<option value="0">TODOS</option>');
		$this->load->view('seguimiento/seguimiento',$data);
	}

	public function ver($id){
		$this->basicas();
		$data['compra'] = json_encode($this->AM->consulta('vw_ventas_seguimiento','id='.$id)['data'][0]);
        $data['his_compras'] = json_decode(json_encode($this->AM->consulta_personalizada('vw_historico_compras','venta_id='.$id)['data']),true);
		$this->load->view('seguimiento/ver_seguimiento',$data);
		$this->load->view('footer');
	}

    public function editar($id){
		$this->basicas();
		$data['compra'] = $this->AM->consulta('vw_ventas_seguimiento','id='.$id)['data'][0];
        $data['his_compras'] = json_decode(json_encode($this->AM->consulta_personalizada('vw_historico_compras','venta_id='.$id)['data']),true);
        $data['estatus'] = $this->AM->crea_select('estatus_general',$data['compra']->estatus_general_id,'1=1','');
		$this->load->view('seguimiento/editar_seguimiento',$data);
		//$this->load->view('footer');
	}

    public function cancelacion(){
        $arr = $_POST;
        $data_cancel = array(
            'motivo_cancelacion'=> $arr['motivo'],
            'fecha_cancelacion'=> date('Y-m-d H:i:s'),
            'estatus_id'=>9
        );
        $condicion = array('id'=>$arr['id']);
        echo json_encode($this->AM->actualizar('ventas',$data_cancel,$condicion));
    }

    public function validar_etapa(){
        $venta_id = $_POST['venta'];
        $estatus_id = $_POST['estatus_id'];
 
        $data_his = array(
            'venta_id'=>$venta_id,
            'estatus_id'=> $estatus_id,
            'fecha_registro'=>date('Y-m-d H:i:s')
        );
        $res = $this->AM->save('historico_ventas',$data_his);
        if($res['ban']){
            $condicion = array('id'=>$venta_id);
            echo json_encode($this->AM->actualizar('ventas',array('estatus_id'=>$estatus_id),$condicion));
        }
    }
}
