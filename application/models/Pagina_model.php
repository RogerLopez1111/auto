<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_model extends CI_Model {

    function consultar_seccion($Id){
        $sql = "exec pa_consultar_secciones @Id='" . $Id . "'";
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function consultar_secciones(){
        $sql = "exec pa_consultar_secciones_activas";
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }
    
    function consultar_servicios(){
        $sql = "exec pa_consultar_servicios";
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }
    
    function consultar_historia(){
        $sql = "exec pa_consultar_historia";
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }
    // Nueva función para consultar el carrusel
    function consultar_carrusel(){
        $sql = "exec pa_consultar_carrusel"; 
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }

    // Llama al procedimiento pa_requisitos_renta
    function requisitos_renta(){
        $sql = "exec pa_requisitos_renta"; 
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }

    // Llama al procedimiento pa_carrusel_vehiculo

    function carrusel_vehiculo(){
        $sql = "exec pa_carrusel_vehiculo"; 
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }

    function cat_vehiculo(){
        $sql = "exec pa_cat_vehiculo"; 
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }

    function consultar_detalle($id){
        $sql="exec pa_consultar_detalle_servicio @Id='".$id."'";
        log_message('error', $sql); 
        $query=$this->db->query($sql);
        if($query != false){
            if($query->num_rows()>0){
            return $query->result();
        }

        }else{
        return false;
        }
    }

    function consultar_detalle_vehiculo($id_vehiculo){
        $sql = "exec pa_consultar_detalle_vehiculo @id_vehiculo='".$id_vehiculo."'"; 
        //log_message('error, $sql');
        $query=$this->db->query($sql);
        if($query!== false){
            if($query->num_rows()>0){
                return $query->result();
            }
        } else {
            return false;
        }
    }

    public function crear_usuario($nombre, $apellido_paterno, $apellido_materno, $email, $username,  $fecha_nacimiento, $direccion, $codigo_postal, $password)
{
    $sql = "EXEC pa_crear_usuario
            @nombre = ?,
            @apellido_paterno = ?,
            @apellido_materno = ?,
            @email = ?,
            @username = ?,
            @fecha_nacimiento = ?,
            @direccion = ?,
            @codigo_postal = ?,
            @password = ?";
    
    $query = $this->db->query($sql, [
        $nombre,
        $apellido_paterno,
        $apellido_materno,
        $email,
        $username,
        $fecha_nacimiento,
        $direccion,
        $codigo_postal,
        $password
    ]);
 
    if ($query === false) {
        log_message('error', 'Error en la consulta SQL: ' . $this->db->error()['message']);
        return false;
    }
 
    return true;
}
 
    // Consultar secciones activas en login (sin parámetros)

    public function consultar_secciones_login(){
        $sql = "exec pa_consultar_secciones_activas_login";
        $query = $this->db->query($sql);
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        } else {
            return false;
        }
    }

    function consultar_footer() {
        $sql = "exec pa_consultar_footer";
        $query = $this->db->query($sql);
        if ($query !== false) {
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        } 
        return false;
    }

    // Consultar usuario (con parámetros nombrados)
    public function consultar_usuario($username, $password)
    {
        $sql = "EXEC pa_consultar_usuario @username = ?, @password = ?";
        $query = $this->db->query($sql, [$username, $password]);

        if ($query !== false && $query->num_rows() > 0) {
            return $query->row()->resultado; // Asegúrate que el SP devuelva 'resultado' como alias
        }
        return false;
    }
    
    function filtrar_vehiculos($filtros) {
        // Construir parámetros para el procedimiento almacenado
        $params = [
            'categoria' => $filtros['categoria'] ?? NULL,
            'tipo_vehiculo' => $filtros['tipo_vehiculo'] ?? NULL,
            'color' => $filtros['color'] ?? NULL,
            'capacidad' => $filtros['capacidad'] ?? NULL,
            'precio_max' => $filtros['precio_max'] ?? NULL
        ];
    
        // Construir la consulta SQL con parámetros nombrados
        $sql = "EXEC pa_filtrar_vehiculos 
                @categoria = ?, 
                @tipo_vehiculo = ?, 
                @color = ?, 
                @capacidad = ?, 
                @precio_max = ?";
        
        // Ejecutar la consulta
        $query = $this->db->query($sql, $params);
        
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        }
        return false;
    }
    
    function obtener_filtros_vehiculos() {
        // Este método traerá los valores únicos para los filtros
        $sql = "SELECT 
                DISTINCT 
                Categoria as categoria,
                Tipo_vehiculo as tipo,
                Color as color,
                Capacidad as capacidad
                FROM cat_vehiculo
                ORDER BY Categoria, Tipo_vehiculo, Color, Capacidad";
        
        $query = $this->db->query($sql);
        
        if($query !== false){
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        }
        return false;
    }
}

