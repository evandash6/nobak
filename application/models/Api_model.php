<?Php
/**
 * @category Herramientas
 * @author José Manuel Peralta
 * @copyright (c) 2020
 * @version 1.0
 */

    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 300); //5 minutos
    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH.'/libraries/restclient.php';


    // require_once(APPPATH.'libraries/PHPMailer/src/SMTP.php');
    // require_once(APPPATH.'libraries/PHPMailer/src/PHPMailer.php');
    // require_once(APPPATH.'libraries/PHPMailer/src/Exception.php');

    // use \PHPMailer\PHPMailer\SMTP;
    // use \PHPMailer\PHPMailer\PHPMailer;
    // use \PHPMailer\PHPMailer\Exception;

class Api_model extends CI_Model {

    private $api;

	//Constructor
	function __construct(){
        parent::__construct();
		$this->api = new RestClient([
			'base_url' => 'https://apinobak.lamat.pro/api/', 
			'headers' => [
				//'Autorizacion' => $this->session->token],
				//'Autorizacion' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c3VhcmlvIjoiMSIsInVzdWFyaW8iOiJicnVubyIsImZlY2hhX2FjY2VzbyI6IjIwMjAtMTItMDEgMTg6NTI6NDgifQ.WyBDYuni6LxCSQCh_yWPcjrUCr9G14ah65QbrQWujmk'
			],
			'format' => "json"
		]);
    }

    public function valida_captcha(){
		// your secret key
		$secret = "6Lc7GycaAAAAABmGhk1Eg1aOKdCSBs4_yDtM8Eii";
		// empty response
		$response = null;
		// check secret key
		$reCaptcha = new ReCaptcha($secret);
		if ($_POST["g-recaptcha-response"]) {
			$response = $reCaptcha->verifyResponse(
				$_SERVER["REMOTE_ADDR"],
				$_POST["g-recaptcha-response"]
			);
			if ($response != null && $response->success)
				return json_encode(array('ban'=>true));
            else
                return jseon_encode(array('ban'=>false,'error'=>'Token no válido'));
		}
		else {
			return json_encode(array('ban'=>false,'error'=>'El token de google no se activo'));
		}
	}

    public function crea_select($tabla, $id = null,$condicion,$valores = "<option value=''>Selecciona</option>"){
        $array = $this->consulta($tabla,$condicion);
        if($array['ban']){
            foreach ($array['data'] as $valor) {
                if ($id != null && $valor->id == $id){
                    if(isset($valor->cve))
                        $valores .= '<option selected cve="'.$valor->cve.'" value="' . $valor->id . '">' . $valor->nombre . '</option>';
                    else
                        $valores .= '<option selected value="' . $valor->id . '">' . $valor->nombre . '</option>';
                }
                else{
                    if(isset($valor->cve))
                        $valores .= '<option cve="'.$valor->cve.'" value="' . $valor->id . '">' . $valor->nombre . '</option>';
                    else
                        $valores .= '<option value="' . $valor->id . '">' . $valor->nombre . '</option>';
                }
            }
            return $valores;
        }
        else
            return array('ban'=>false,'error'=>$array['error']);
    }

    // public function crea_select_estado($id = null){
	// 	$_POST['tabla'] = 'cat_estado';
	// 	$valores = "<option value=''>Selecciona</option>";
	// 	$array = $this->api->post('all',$_POST);
    //     foreach ($array['data'] as $valor) {
    //         if ($id != null && $valor->id == $id)
    //            $valores .= "<option selected value='" . $valor->id . "'>" . $valor->nom_ent . "</option>";
    //         else
    //            $valores .= "<option value='" . $valor->id . "'>" . $valor->nom_ent . "</option>";
    //     }
    //     return $valores;
	// }


    //Funcion para traer todos los registros con o sin condicion
    public function all($tabla){
        $query = $this->api->post('all',array('tabla'=>$tabla))->response;
        //var_dump($query);
        if(json_decode($query)->ban){
            return array('ban'=>true,'data'=>json_decode($query)->data,'total'=>json_decode($query)->total);
        }
        else
            return array('ban'=>false,'error'=>json_decode($query));
    }

    //Funcion para traer todos los registros con una 
    public function consulta($tabla,$condicion){
        $query = $this->api->post('consulta',array('tabla'=>$tabla,'condicion'=>$condicion))->response;
        //var_dump($query);
        if(json_decode($query)->ban){
            return array('ban'=>true,'data'=>json_decode($query)->data);
        }
        else
            return array('ban'=>false,'error'=>json_decode($query)->data->message);
    }

    //Funcion para traer todos los registros con una 
    public function consulta_personalizada($tabla,$condicion){
        $query = $this->api->post('consulta_personalizada',array('tabla'=>$tabla,'condicion'=>$condicion))->response;
        //var_dump($query);
        if(json_decode($query)->ban){
            return array('ban'=>true,'data'=>json_decode($query)->data,'total'=>json_decode($query)->total);
        }
        else
            return array('ban'=>false,'error'=>json_decode($query)->data);
    }

    public function save($tabla,$datos){
        $query = $this->api->post('insertar',array('tabla'=>$tabla,'datos'=>$datos))->response;
        //var_dump($query);
        if(json_decode($query)->ban){
            return array('ban'=>true,'data'=>json_decode($query)->id_insertado);
        }
        else
            return array('ban'=>false,'error'=>json_decode($query));
    }

    public function actualizar($tabla,$datos,$condicion){
        $query = $this->api->post('actualizar',array('tabla'=>$tabla,'datos'=>$datos,'condicion'=>$condicion))->response;
        //var_dump($query);
        if(json_decode($query)->ban){
            return array('ban'=>true,'data'=>json_decode($query)->afectados);
        }
        else
            return array('ban'=>false,'error'=>json_decode($query));
    }

    public function eliminar($tabla,$condicion){
        $query = $this->api->post('eliminar',array('tabla'=>$tabla,'condicion'=>$condicion))->response;
        //var_dump($query);
        if(json_decode($query)->ban){
            return array('ban'=>true);
        }
        else
            return array('ban'=>false,'error'=>json_decode($query)->data);
    }

    public function prepara_mensaje($nombre_ori,$email,$asunto,$cuerpo,$email2=null){
        $email_fac = $email;

        if(isset($email2))
            $email_ent = $email2;
        else
            $email_ent = null;

        $html = '
        <style>
            center{
                background-color:#F4F5F9;
                padding:30px;
            }
            .fondo_blanco{
                padding:10px;
                background-color:white;
                width:450px;
            }
            .m-r-5{
                margin-right:5px;
            }
            .espacio{
                height:5px;
            }
            .text-right{
                text-align: right;
            }
            .text-left{
                text-align: left !important;
            }
            .barra_1{
                height : 7px;
                background-color:#6799DC;
            }
            .barra_2{
                height : 7px;
                background-color:#9CDEF5;
            }
            .barra_3{
                height : 7px;
                background-color:#E5E6E6;
            }
            .logo{
                width:200px;
                padding-left:20px;
            }
            .contenido{
                font-family:Arial,Helvetica,sans-serif; 
                font-size:12px; 
                line-height:16px;
            }
        </style>
        <center>
        <div class="fondo_blanco">
            <table style="width:400px" class="contenido">
                <tr><td colspan="2" class="barra_1"></td></tr>
                <tr><td class="espacio"></td></tr>
                <tr>
                    <td class="logo"><a href="'.base_url().'"><img style="max-width:100px" src="https://brillosos.com/images/brillososlogopng1.png"></a></td>
                    <td class="text-right"> <a href="'.base_url().'/productos" class="m-r-5"> Productos </a> <span class="m-r-5">|</span> <a href="'.base_url().'/productos/categorias/8"> Paquetes</a></td>
                </tr>
                <tr><td class="espacio"></td></tr>
                <tr><td colspan="2" class="barra_2"></td></tr>
                <tr><td class="espacio"></td></tr>
            </table>
            '.$cuerpo.'
        </div>
        </center>
        ';
        echo json_encode($this->manda_mensaje($nombre_ori,$email_fac,$asunto,$html,$email_ent));
    }

    private function manda_mensaje($ori,$email,$asunto,$cuerpo,$email2 = null){

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = 2;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host='smtp.live.com';
            $mail->SMTPAuth=true; // Enable SMTP authentication
            $mail->Username = 'evandash6@hotmail.com'; // SMTP username
            $mail->Password='2424123abcA@'; // SMTP password
			$mail->SMTPSecure = 'tls';
            $mail->Port= 587;                                 // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('evandash6@hotmail.com', $ori);
            $mail->addAddress($email);
            if($email2 != null)    // Add a recipient
                $mail->addAddress($email2);               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode($asunto);

            $mail->msgHTML($cuerpo);
            $mail->CharSet = 'UTF-8';

            $mail->send();
            return array('ban'=>true);
        } catch (Exception $e) {
            return array('ban'=>true,'erro'=>$mail->ErrorInfo);
        }
    }
}


