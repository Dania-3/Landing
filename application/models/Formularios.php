<?php
class Formularios extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->medoolib->getInstance(); // Carga la instancia de Medoo
    }

    public function insertarContacto($nombre, $telefono, $correo) {
    
        // Usa el método insert de Medoo
        $result = $this->db->insert('contacto', [
            'nombre'   => $nombre,
            'telefono' => $telefono,
            'correo'   => $correo
        ]);
    
        // Verifica si se realizó el insert correctamente
        if ($result->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }



}