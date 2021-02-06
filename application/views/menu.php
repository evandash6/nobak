<?Php
//$url = $_SERVER['PHP_SELF'];
$url = $_SERVER['REQUEST_URI'];

$titulo_m = '';
$descri_m = '';
$fa_icon = '';

$m_superior_admin = '';
$m_superior_oper = '';
$m_superior_alma = '';
$m_superior_nomi = '';
$m_superior_finan = '';

$configuraciones_m = '';
$perfiles_m = '';
$empleados_m = '';
//$usuarios_m = '';
$proveedores_m = '';
$clientes_m = '';
$prollos_m = '';
$corte_m = '';
$maquila_m = '';
$checador_m = '';
$pagos_m = '';
$prestamos_m = '';
$materiaprima_m = '';
$compras_m = '';
$ventas_m = '';
$caja_chica_m = '';
$productos_m = '';
$cedis_m='';

$vacia_m = '';


switch (true) {
        ///////////////// Administracion //////
    case strpos($url, 'empleados') !== false:
        $empleados_m = 'active';
        $fa_icon = 'fal fa-cogs';
        $titulo_m = 'Administración / Empleados';
        $descri_m = 'Módulo para la creación y administración de empleados';
        $m_superior_admin = 'active open';
        break;
   
    case strpos($url, 'clientes') !== false:
		$clientes_m = 'active';
		$fa_icon = 'fal fa-cogs';
        $titulo_m = 'Administración / Clientes';
        $descri_m = 'Módulo para la creación y administración de clientes';
        $m_superior_admin = 'active open';
    break;
    case strpos($url, 'productos') !== false:
		$productos_m = 'active';
		$fa_icon = 'fal fa-cogs';
        $titulo_m = 'Administración / Productos';
        $descri_m = 'Módulo para la creación y administración de productos';
        $m_superior_admin = 'active open';
    break;
    case strpos($url, 'cedis') !== false:
		$cedis_m = 'active';
		$fa_icon = 'fal fa-cogs';
        $titulo_m = 'Administración / Cedis';
        $descri_m = 'Módulo para la creación y administración de Centros de distribución';
        $m_superior_admin = 'active open';
    break;
    /////////////// Seguimiento //////////////
    case strpos($url, 'rollos') !== false:
		$prollos_m = 'active';
		$fa_icon = 'fal fa-puzzle-piece';
        $titulo_m = 'Producción / Producción de Rollos';
        $descri_m = 'Módulo para la administración en la producción de rollos';
        $m_superior_oper = 'active open';
    break;
    case strpos($url, 'maquila') !== false:
		$maquila_m = 'active';
		$fa_icon = 'fal fa-puzzle-piece';
        $titulo_m = 'Producción / Recepcion de Maquila';
        $descri_m = 'Módulo para la recepción de piezas provenientes de un corte';
        $m_superior_oper = 'active open';
    break;
    case strpos($url, 'corte') !== false:
		$corte_m = 'active';
		$fa_icon = 'fal fa-puzzle-piece';
        $titulo_m = 'Producción / Programación de Cortes';
        $descri_m = 'Módulo para la creación y administración en la producción de piezas';
        $m_superior_oper = 'active open';
    break;
    ///////////////// Almacen //////////////
    case strpos($url, 'insumos') !== false:
		$materiaprima_m = 'active';
		$fa_icon = 'fa fa-box';
        $titulo_m = 'Materia Prima e Insumos';
        $descri_m = 'Módulo para el registro de Materia prima o Insumos';
        $m_superior_alma = 'active open';
    break;
    ///////////////////////////////////////
    case strpos($url, 'pagos') !== false:
		$pagos_m = 'active';
		$fa_icon = 'fa fa-coins';
        $titulo_m = 'Pago a Empleados';
        $descri_m = 'Módulo para definición y pago de nomina a empleados';
        $m_superior_nomi = 'active open';
    break;
    case strpos($url, 'prestamos') !== false:
		$prestamos_m = 'active';
		$fa_icon = 'fa fa-coins';
        $titulo_m = 'Prestamos';
        $descri_m = 'Módulo para el registro de prestamos a empleados';
        $m_superior_nomi = 'active open';
    break;
    ///////////////////////////////////////
    case strpos($url, 'compras') !== false:
		$compras_m = 'active';
		$fa_icon = 'fal fa-euro-sign';
        $titulo_m = 'Compras';
        $descri_m = 'Módulo para el registro de compras a proveedores';
        $m_superior_finan = 'active open';
    break;
    case strpos($url, 'ventas') !== false:
		$ventas_m = 'active';
		$fa_icon = 'fal fa-euro-sign';
        $titulo_m = 'Ventas';
        $descri_m = 'Módulo para el registro de ventas a clientes';
        $m_superior_finan = 'active open';
    break;
    case strpos($url, 'caja') !== false:
		$caja_chica_m = 'active';
		$fa_icon = 'fal fa-euro-sign';
        $titulo_m = 'Caja Chica';
        $descri_m = 'Módulo para el registro de todos los movimientos que surjan de caja chica';
        $m_superior_finan = 'active open';
	break;
	default:
	break;
}

    $menu = '
    <li class="nav-title">Menú</li>
    <li class="'.$m_superior_admin.'">
        <a href="#"><i class="fal fa-cogs m-r-10"></i><span class="nav-link-text"> Administración</span></a>
        <ul>
            <li class="'.$empleados_m.'">
                <a href="'.base_url().'empleados" title="Empleados" data-filter-tags="empleados">
                <i class="fal fa-id-badge m-r-10"></i><span class="nav-link-text">Empleados</span>
                </a>
            </li>
            <li class="'.$clientes_m.'">
                <a href="'.base_url().'clientes" title="Clientes" data-filter-tags="clientes">
                <i class="fal fa-handshake m-r-10"></i><span class="nav-link-text">Clientes</span>
                </a>
            </li>
            <li class="'.$productos_m.'">
                <a href="'.base_url().'productos" title="Productos" data-filter-tags="productos">
                <i class="fal fa-shopping-bag m-r-10"></i><span class="nav-link-text">Productos</span>
                </a>
            </li>
            <li class="'.$cedis_m.'">
                <a href="'.base_url().'cedis" title="Cedis" data-filter-tags="cedis">
                <i class="fal fa-building m-r-10"></i><span class="nav-link-text">CeDis</span>
                </a>
            </li>
        </ul>
    </li>';
?>
    <ul id="js-nav-menu" class="nav-menu">
        <?=$menu?>
    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
</nav>
<div class="nav-footer shadow-top">
    <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
        <i class="ni ni-chevron-right"></i>
        <i class="ni ni-chevron-right"></i>
    </a>
</div>
</aside>
<div class="page-content-wrapper">
<header class="page-header" role="banner">
    <?=$logo?>
    <?=$boton_menu?>
    <?=$ajustes_perfil?>
</header>
<main id="js-page-content" role="main" class="page-content">
<div class="subheader"><h1 class="subheader-title">
    <i class="<?=$fa_icon?> m-r-10"></i><?=$titulo_m?><small><?=$descri_m?></small>
</h1>
</div>

                    