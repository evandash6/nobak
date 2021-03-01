<?Php
//$url = $_SERVER['PHP_SELF'];
$url = $_SERVER['REQUEST_URI'];

$titulo_m = '';
$descri_m = '';
$fa_icon = '';

$m_superior_ini = '';
$m_superior_admin = '';
$m_superior_seg = '';

$configuraciones_m = '';
$perfiles_m = '';
$empleados_m = '';
//$usuarios_m = '';
$proveedores_m = '';
$clientes_m = '';
$entrega_m = '';
$pago_m = '';
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
        $descri_m = 'Módulo para la administración de clientes';
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
    case strpos($url, 'fpago') !== false:
		$pago_m = 'active';
		$fa_icon = 'fal fa-cogs';
        $titulo_m = 'Administración / Formas de pago';
        $descri_m = 'Módulo para la creación y administración de Formas de pago';
        $m_superior_admin = 'active open';
    break;
    case strpos($url, 'entrega') !== false:
		$entrega_m = 'active';
		$fa_icon = 'fal fa-cogs';
        $titulo_m = 'Administración / Formas de Entrega';
        $descri_m = 'Módulo para la creación y administración de Formas de entrega';
        $m_superior_admin = 'active open';
    break;
    case strpos($url, 'seguimiento') !== false:
		$fa_icon = 'fal fa-chart-line';
        $titulo_m = 'Seguimiento';
        $descri_m = 'Módulo para la gestion del seguimiento de compras de clientes';
        $m_superior_seg = 'active open';
    break;
	default:
        $seguimiento_m = 'active';
		$fa_icon = 'fas fa-home';
        $titulo_m = 'NOBAK';
        $descri_m = 'Sistema Administrativo NOBAK';
        $m_superior_ini = 'active open';
	break;
}

    $menu = '
    <li class="nav-title">Menú</li>
    <li class="'.$m_superior_ini.'">
        <a href="'.base_url().'" title="Inicio" data-filter-tags="Inicio">
            <i class="fas fa-home m-r-10"></i><span class="nav-link-text">Inicio</span>
        </a>
    </li>
    <li class="'.$m_superior_admin.'">
        <a href="#"><i class="fal fa-cogs"></i><span class="nav-link-text"> Administración</span></a>
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
            <li class="'.$pago_m.'">
                <a href="'.base_url().'inicio/fpago" title="Formas de Pago" data-filter-tags="pagos">
                <i class="fas fa-money-bill m-r-10"></i><span class="nav-link-text">Formas de Pago</span>
                </a>
            </li>
            <li class="'.$entrega_m.'">
            <a href="'.base_url().'inicio/entregas" title="Formas de Entrega" data-filter-tags="entregas">
            <i class="fas fa-truck m-r-10"></i><span class="nav-link-text">Formas de Entrega</span>
            </a>
        </li>
        </ul>
    </li>
    <li class="'.$m_superior_seg.'">
        <a href="'.base_url().'seguimiento" title="Seguimiento" data-filter-tags="seguimiento">
            <i class="fas fa-chart-line m-r-10"></i><span class="nav-link-text">Seguimiento</span>
        </a>
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

                    