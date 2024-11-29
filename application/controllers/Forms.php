<?php

class Forms extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->helper("form"); // Carga el helper para formularios
        $this->load->library("MedooLib"); // Asegúrate de cargar esta librería
        $this->load->model("Formularios"); // Carga el modelo

    }

    public function contacto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtén los datos enviados por el formulario
            $nombre = htmlspecialchars($this->input->post('nombre1', true));
            $telefono = htmlspecialchars($this->input->post('telefono1', true));
            $correo = htmlspecialchars($this->input->post('correo1', true));

            // Verifica que los campos no estén vacíos
            if (!empty($nombre) && !empty($telefono) && !empty($correo)) {
                // Llama al modelo para insertar los datos
                $insertado = $this->Formularios->insertarContacto($nombre, $telefono, $correo);

                if ($insertado) {
                    // Inserción exitosa
                    $this->session->set_flashdata('success', 'El contacto se guardó correctamente.');
                } else {
                    // Inserción fallida
                    $this->session->set_flashdata('error', 'Hubo un problema al guardar el contacto.');
                }
            } else {
                // Datos incompletos
                $this->session->set_flashdata('error', 'Por favor, complete todos los campos.');
            }

            // Redirige a la misma página (puedes cambiar la ruta según tu necesidad)
            redirect(base_url('contacto'));
        } else {
            $this->load->view('puntoventa');
        }
    }

}

?>