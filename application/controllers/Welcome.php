<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]
	class Welcome extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Pagina_model', 'mP');
			$this->load->library('session');
		}

	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index() 
	{
		$datos["secciones"] = $this->mP->consultar_secciones();
		$datos["servicios"] = $this->mP->consultar_servicios();
		$datos["carrusel"] = $this->mP->consultar_carrusel();
		$datos["historia"] = $this->mP->consultar_historia();
		$datos["vehiculo"] = $this->mP->cat_vehiculo();
		$datos['requisitos'] = $this->mP->requisitos_renta();
        $datos['carrusel1'] = $this->mP->carrusel_vehiculo();
		$datos["secciones_login"] = $this->mP->consultar_secciones_login();
		$datos["footer"] = $this->mP->consultar_footer();

		// Obtener opciones para los filtros
		$datos["filtros_opciones"] = $this->mP->obtener_filtros_vehiculos();
		
		// Verificar si hay filtros en POST (para cuando se envíe el formulario)
		if($this->input->post()) {
			$filtros = $this->input->post();
			$datos["vehiculo"] = $this->mP->filtrar_vehiculos($filtros);
		} else {
			// Cargar todos los vehículos si no hay filtros
			$datos["vehiculo"] = $this->mP->cat_vehiculo();
		}
		

		$this->load->view("genericos/header");
		$this->load->view("menu", $datos);
		//$this->load->view("buscador");
		$this->load->view("carrusel", $datos);
		$this->load->view("servicios", $datos);

		$this->load->view("genericos/footer", $datos);
		$this->load->view('genericos/detalles');

	}       
	public function catalogos_productos(){

		$this->load->view('genericos/header'); 
		$datos['secciones']=$this ->mP->consultar_secciones();  
		$datos["secciones_login"] = $this->mP->consultar_secciones_login();
		$this->load->view('menu', $datos); 
		//$this->load->view('buscador'); 
		$datos['servicios']=$this ->mP->consultar_servicios(); 
		$this->load->view('servicios', $datos); 
		$this->load->view('genericos/detalles');
		
	}
	public function traer_producto(){
		$id=$this->input->post('id');
		$datos["caracteristicas"]=$this->mP->consultar_detalle($id);
		log_message('error',$id);
		$respuesta=$this->load->view('caracteristicas',$datos);
		
	}

	public function consultar_producto($Id){
		$this->load->view('genericos/header');
		$datos["secciones_login"] = $this->mP->consultar_secciones_login();
		$datos['secciones' ]=$this->mP->consultar_secciones();
		$datos["historia"] = $this->mP->consultar_historia();
		$this->load->view('menu',$datos);
		$datos["Id"]=$Id;
		$this->load->view('producto',$datos);
		$this->load->view('genericos/detalles');
	}		
	public function nosotros() 
	{
		$datos["secciones"] = $this->mP->consultar_secciones();
		$datos["historia"] = $this->mP->consultar_historia();
		$datos["secciones_login"] = $this->mP->consultar_secciones_login();
		$datos["footer"] = $this->mP->consultar_footer();
		$this->load->view("genericos/header");
		$this->load->view("menu", $datos);
		//$this->load->view("buscador");
		$this->load->view("historia", $datos);
		$this->load->view("genericos/footer", $datos);
		
	}

	public function requerimientos(){

		$datos["secciones"] = $this->mP->consultar_secciones();
		$datos["servicios"] = $this->mP->consultar_servicios();
		$datos['requisitos'] = $this->mP->requisitos_renta();
		$datos["historia"] = $this->mP->consultar_historia();
		$datos["secciones_login"] = $this->mP->consultar_secciones_login();
		$datos["footer"] = $this->mP->consultar_footer();

		$this->load->view("genericos/header");
		$this->load->view("menu", $datos);
		//$this->load->view("buscador");
		$this->load->view('requerimientos', $datos);
		$this->load->view("genericos/footer", $datos);
		
	}
	
	public function login() {
        $datos["secciones"] = $this->mP->consultar_secciones();
        $datos["secciones_login"] = $this->mP->consultar_secciones_login();
		$datos["historia"] = $this->mP->consultar_historia();
		$datos["footer"] = $this->mP->consultar_footer();
        $this->load->view("genericos/header");
        $this->load->view("menu", $datos);
        $this->load->view("login");
		$this->load->view("genericos/footer", $datos);
        
    }
	public function vehiculo() {
		$datos["secciones"] = $this->mP->consultar_secciones();
		$datos["historia"] = $this->mP->consultar_historia();
		$datos["secciones_login"] = $this->mP->consultar_secciones_login();
		$datos["footer"] = $this->mP->consultar_footer();
		
		// Obtener opciones para los filtros
		$datos["filtros_opciones"] = $this->mP->obtener_filtros_vehiculos();
		
		// Verificar si hay filtros en POST (para cuando se envíe el formulario)
		if($this->input->post()) {
			$filtros = $this->input->post();
			$datos["vehiculo"] = $this->mP->filtrar_vehiculos($filtros);
		} else {
			// Cargar todos los vehículos si no hay filtros
			$datos["vehiculo"] = $this->mP->cat_vehiculo();
		}
		
		$this->load->view("genericos/header");
		$this->load->view("menu", $datos);
		//$this->load->view("buscador");
		$this->load->view("vehiculo", $datos);
		$this->load->view("genericos/footer", $datos);
	}

	public function filtrar_vehiculos_ajax() {
		// Solo responder a solicitudes AJAX
		if(!$this->input->is_ajax_request()) {
			show_404();
		}
		
		$filtros = $this->input->post();
		$resultados = $this->mP->filtrar_vehiculos($filtros);
		
		if($resultados !== false) {
			$datos["vehiculo"] = $resultados;
			$html = $this->load->view("genericos/lista_vehiculos", $datos, TRUE);
			echo json_encode(["success" => true, "html" => $html]);
		} else {
			echo json_encode(["success" => false, "message" => "No se encontraron resultados"]);
		}
	}

}
