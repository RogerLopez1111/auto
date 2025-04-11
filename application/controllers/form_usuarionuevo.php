<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Form_usuarionuevo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pagina_model'); // Asegúrate de que el modelo es correcto
        $this->load->library('session'); // Cargar la biblioteca de sesiones
    }
 
    public function crear()
{
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Recibir datos del formulario
        $nombre = $this->input->post('nombre');
        $apellido_paterno = $this->input->post('apellido_paterno');
        $apellido_materno = $this->input->post('apellido_materno');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $fecha_nacimiento = $this->input->post('fecha_nacimiento');
        $direccion = $this->input->post('direccion');
        $codigo_postal = $this->input->post('codigo_postal');
        $password = $this->input->post('password');
 
        // Validar contraseña (mínimo 12 caracteres alfanuméricos)
        if (strlen($password) < 12 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            $this->session->set_flashdata('error', 'La contraseña debe tener al menos 12 caracteres y ser alfanumérica');
            redirect('login');
            return;
        }
 
        // Llamar al modelo
        $resultado = $this->Pagina_model->crear_usuario(
            $nombre,
            $apellido_paterno,
            $apellido_materno,
            $email,
            $username,
            $fecha_nacimiento,
            $direccion,
            $codigo_postal,
            $password
        );
 
        if ($resultado) {
            $this->session->set_flashdata('success', 'Usuario creado correctamente');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Error al registrar usuario');
            redirect('login');
        }
    } else {
        $this->session->set_flashdata('error', 'Método no permitido');
        redirect('login');
    }
}
 
    public function iniciar()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $resultado == "logged_out";
            // Validar usuario con el modelo
            $resultado = $this->Pagina_model->consultar_usuario($username, $password);
            $this->session->set_userdata('login_status', $resultado);
            if ($resultado = "logged_in") {
                // Iniciar sesión
                redirect(base_url());
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Usuario o contraseña incorrectos']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
        }
    }
    
 
    public function cerrar_sesion()
    {
        // Destruir todas las variables de sesión
        $this->session->unset_userdata('login_status');
        $this->session->sess_destroy();
    
        // Redirigir al login o página principal
        redirect(base_url('login'));

    }
    
 
 
}
 