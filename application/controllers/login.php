<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
    



    public function cerrarsesion()
     {
        $datasession = array('login' => '', 'logueado' => '');
        // y eliminamos la sesión
        $this->session->unset_userdata($datasession);
       // redirigimos al controlador principal
        $this->session->sess_destroy();
       redirect('login', 'refresh');
     }
	
function __construct(){
    parent::__construct();
    $this->load->model('usuarios_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
  }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('logueo');
		$this->load->view('footer');
	}
    
    public function validaUsuario()
    {
    $this->form_validation->set_rules('login','Usuario','required');
    $this->form_validation->set_rules('password','Contraseña','required');
    $this->form_validation->set_message('required', 
    	'<div class=alert alert-error>El campo %s es  obligatorio</div>');
        
    if ($this->form_validation->run() == FALSE)
         {
         	$this->load->view('header');
         	$this->load->view('logueo');
         	$this->load->view('footer');
         }
    else
    {
     $datos = array(
            'login' => $this->input->post('login',TRUE),
            'password' => $this->input->post('password',TRUE),
     );
     $query=$this->usuarios_model->validaCredenciales($datos);
     if ($query)
     {
        $datasession = array(
             'login' => $this->input->post('login'),
             'logueado' => true);
             
        $this->session->set_userdata($datasession);
     	$this->muestratienda();
     }
     else
     {
     	$this->load->view('header');
        $this->load->view('logueo');
        $this->load->view('footer');
     }
    }

    }

    public function nuevoUsuario()
    {
        $this->load->view('header');
        $this->load->view('newuser');
        $this->load->view('footer');
    
    }

    public function crearnuevoUsuario()
    {
    $this->form_validation->set_rules('nombre','Nombre','required');
    $this->form_validation->set_rules('paterno','Apellido Paterno','required');
    $this->form_validation->set_rules('materno','Apellido Materno','required');
    $this->form_validation->set_rules('fecha_nac','Fecha de Nacimiento','required');
    $this->form_validation->set_rules('sexo','Sexo','required');
    $this->form_validation->set_rules('login','Usuario','required');
    $this->form_validation->set_rules('password','Contraseña','required');
    $this->form_validation->set_message('required', 
        '<div class=alert alert-error>El campo %s es  obligatorio</div>');
        
    if ($this->form_validation->run() == FALSE)
         {
            $this->load->view('header');
            $this->load->view('newuser');
            $this->load->view('footer');
         }
    else
    {
     $datos = array(
            'nombre' => $this->input->post('nombre',TRUE),
            'paterno' => $this->input->post('paterno',TRUE),
            'materno' => $this->input->post('materno',TRUE),
            'fecha_nac' => $this->input->post('fecha_nac',TRUE),  
            'sexo' => $this->input->post('sexo',TRUE),  
            'login' => $this->input->post('login',TRUE),
            'password' => $this->input->post('password',TRUE),
     );
     $query=$this->usuarios_model->nuevoUsuariobd($datos);
     if ($query)
     {
       $this->load->view('header');
        $this->load->view('logueo');
        $this->load->view('footer');
     }
     else
     {
        $this->load->view('header');
        $this->load->view('newuser');
        $this->load->view('footer');
     }
    }
    
    }
	
   function muestratienda()
	{

        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
		$productos=$this->usuarios_model->listaProductos();
		$datos['productos']=$productos;
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('listado',$datos);
        $this->load->view('venta');
		$this->load->view('footer');
    }

	}

     function muestraalmacen()
    {
        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
        $crud = new grocery_CRUD();
        $crud->set_table('productos');
        $crud->required_fields('id_producto','nombre','precio','stock','descripcion');
        $output = $crud->render();
        $this->load->view('menu.php');
        $this->load->view('header');
        $this->load->view('muestraalmacen.php',$output);
        $this->load->view('footer');
            }

    }

     function muestrausuarios()
    {
        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
        $crud = new grocery_CRUD();

        $crud->set_table('usuario');
        $crud->required_fields('id_usuario','nombre','paterno','materno','fecha_nac','sexo');
        $output = $crud->render();
        $this->load->view('menu.php');
        $this->load->view('header');
        $this->load->view('our_template.php',$output);
        $this->load->view('footer');
            }

    }



    public function venta()
    {
if (!$this->session->userdata('login')){
                    redirect('login','refresh');}
                    else{

    $this->form_validation->set_rules('id_1','Campo','required');
    $this->form_validation->set_rules('precio_1','Campo','required');
    $this->form_validation->set_rules('cantidad_1','Campo','required');
    $this->form_validation->set_message('required', 
        '<div class=alert alert-error>El campo %s es  obligatorio</div>');
        
    if ($this->form_validation->run() == FALSE)
         {
        $productos=$this->usuarios_model->listaProductos();
        $datos['productos']=$productos;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('listado',$datos);
        $this->load->view('venta');
        $this->load->view('footer');
         }
    else
    {
     $query=$this->usuarios_model->nuevaventa();
     

      $fila = $this->input->post('fila',TRUE);
  
              if($fila!=''){
                for($x=1;$x<=$fila;$x++){
                 $datos = array(
                        'id' => $this->input->post('id_'.$x,TRUE),
                        'precio' => $this->input->post('precio_'.$x,TRUE),
                        'cantidad' => $this->input->post('cantidad_'.$x,TRUE),
                 );
                $query=$this->usuarios_model->nuevadetalleventa($datos);
                 }
            }
                    else{
                        $datos = array(
                                'id' => $this->input->post('id_1',TRUE),
                                'precio' => $this->input->post('precio_1',TRUE),
                                'cantidad' => $this->input->post('cantidad_1',TRUE),
                         );
                        $query=$this->usuarios_model->nuevadetalleventa($datos);
                    }

     if ($query)
     {
        $datos1 = array(
                    'id' => $query,
             );

       $productos=$this->usuarios_model->descripcionnota($datos1);
        $datos['productos']=$productos;

        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('nota',$datos);
       // $this->load->view('footer');
     }
     else
     {
        $productos=$this->usuarios_model->listaProductos();
        $datos['productos']=$productos;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('listado',$datos);
        $this->load->view('venta');
        $this->load->view('footer');
     }
    }
    }
    }


   
   

    function apartados()
    {
        
        if (!$this->session->userdata('login')){
                    redirect('login','refresh');}
                    else{
                $crud = new grocery_CRUD();
                $crud->set_table('productos');
                $crud->required_fields('id_producto','nombre','precio','stock','descripcion');
                $output = $crud->render();
                $this->load->view('menu.php');
                $this->load->view('header');
                $this->load->view('our_template.php',$output);
                $this->load->view('footer');
                    }
    }


    function finalizarventa()
    {

        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
    
        $productos=$this->usuarios_model->listaProductos();
        $datos['productos']=$productos;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('listado',$datos);
        $this->load->view('venta');
        $this->load->view('footer');
        $cantidad = $this->input->post('cantidad',TRUE);
        $total = $this->input->post('total',TRUE);
        $cambio=$cantidad-$total;
        echo "<script language='javascript'>alert('Su cambio es: ".$cambio."');</script>"; 

    }

    }

      function ventaapartado()
    {

        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
        $idnota = $this->input->post('id_nota',TRUE);
        $data['idnota'] = $idnota;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('apartado',$data);
        $this->load->view('footer');
    }

    }

  function apartado()
    {

        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{

                $this->form_validation->set_rules('nombre','Nombre','required');
    $this->form_validation->set_rules('paterno','Apellido Paterno','required');
    $this->form_validation->set_rules('direccion','Direccion','required');
    $this->form_validation->set_rules('telefono','Telefono','required');
    $this->form_validation->set_rules('cantidad','Cantidad','required');
    $this->form_validation->set_message('required', 
        '<div class=alert alert-error>El campo %s es  obligatorio</div>');
        
    if ($this->form_validation->run() == FALSE)
         {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('apartado');
        $this->load->view('footer');
         }
    else
    {
     $datos = array(
            'nombre' => $this->input->post('nombre',TRUE),
            'paterno' => $this->input->post('paterno',TRUE),
            'direccion' => $this->input->post('direccion',TRUE),
            'telefono' => $this->input->post('telefono',TRUE),  
            'cantidad' => $this->input->post('cantidad',TRUE),
            'id_nota' => $this->input->post('id_nota',TRUE),
     );
     $query=$this->usuarios_model->apartado($datos);

     $productos=$this->usuarios_model->listaProductos();
        $datos['productos']=$productos;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('listado',$datos);
        $this->load->view('venta');
        $this->load->view('footer');

    }
        

    }

    }

 function contabilidad()
    {
        
       if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
        $productos=$this->usuarios_model->contabilidad();
        $datos['productos']=$productos;

        $productos=$this->usuarios_model->totalcontabilidad();
        $datos2['productos']=$productos;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('contabilidad',$datos);
        $this->load->view('totalcontabilidad',$datos2);
        $this->load->view('footer');
    }
}

function menuapartado()
    {
        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('buscarapartado');
        $this->load->view('footer');
            }

    }


    function buscarapartado()
    {
        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
         $this->form_validation->set_rules('id_nota','Id nota','required');
         $this->form_validation->set_message('required', 
        '<div class=alert alert-error>El campo %s es  obligatorio</div>');
        
        if ($this->form_validation->run() == FALSE)
             {
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('buscarapartado');
            $this->load->view('footer');
             }
        else{
        $id = $this->input->post('id_nota',TRUE);
        $productos=$this->usuarios_model->buscarapartado($id);
        $datos['productos']=$productos;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('mostrarapartado',$datos);
        $this->load->view('footer');

        }


            }

    }

function abonar()
    {
        if (!$this->session->userdata('login')){
            redirect('login','refresh');}
            else{
         $this->form_validation->set_rules('abono','abono','required');
         $this->form_validation->set_message('required', 
        '<div class=alert alert-error>El campo %s es  obligatorio</div>');
        
        if ($this->form_validation->run() == FALSE)
             {
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('buscarapartado');
            $this->load->view('footer');
             }
        else{
         $datos = array(
            'id_venta' => $this->input->post('id_nota',TRUE),
            'abono' => $this->input->post('abono',TRUE),
            'total' => $this->input->post('total',TRUE),
     );        
        $productos=$this->usuarios_model->abonar($datos);
        $datos['productos']=$productos;

        $id = $this->input->post('id_nota',TRUE);
        $productos=$this->usuarios_model->buscarapartado($id);
        $datos['productos']=$productos;
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('mostrarapartado',$datos);
        $this->load->view('footer');

        }


            }

    }    



}

