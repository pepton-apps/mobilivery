<?php

class EditarComercio extends CI_Controller {

    public function index() {
        $this->load->model('Comercio');
        $this->Comercio->load();
        $data['comercio'] = $this->Comercio;
        $this->load->library('googlemaps');
        $config['center'] = $this->Comercio->latitud . ',' . $this->Comercio->longitud;
        $config['zoom'] = '14';
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['position'] = $config['center'];
        $marker['draggable'] = TRUE;
        $marker['ondragend'] = '
            latitud = event.latLng.lat();
            longitud = event.latLng.lng();
            ';
        $this->googlemaps->add_marker($marker);
        $circle = array();
        $circle['center'] = $this->Comercio->latitud . ',' . $this->Comercio->longitud;
        $circle['radius'] = $this->Comercio->radioCobertura;
        $this->googlemaps->add_circle($circle);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('cms/comercio', $data);
    }

    public function actualizar() {
        $params = $this->input->post();
        $this->load->model('Comercio');
        $this->Comercio->load();
        $this->Comercio->nombre = $params['nombre'];
        $this->Comercio->telefono = $params['telefono'];
        $this->Comercio->descripcion = $params['descripcion'];
        $this->Comercio->radioCobertura = $params['radioCobertura'];
        $this->Comercio->latitud = $params['latitud'];
        $this->Comercio->longitud = $params['longitud'];
        $this->Comercio->save();
        redirect('cms/editarComercio');
    }

    public function agregarHorario() {
        $params = $this->input->post();
        $dia = $params['dia'];
        $horario = $params['hApertura'] . ':' . $params['mApertura'] . '-' . $params['hCierre'] . ':' . $params['mCierre'];
        $this->load->model('HorarioDia');
        $this->HorarioDia->insert($dia, $horario);
        redirect('cms/editarComercio');
    }

    public function eliminarHorario() {
        $params = $this->input->post();
        $dia = $params['dia'];
        $horario = $params['horario'];
        $this->load->model('HorarioDia');
        $this->HorarioDia->delete($dia, $horario);
        redirect('cms/editarComercio');
    }

    public function agregarLogo() {
        $config['upload_path'] = 'imgs';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
//        $config['max_width'] = '200';
//        $config['max_height'] = '200';
        $config['file_name'] = 'logo';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
        $upload = $this->upload->do_upload('logo');
        $data = $this->upload->data();
        $this->load->model('Comercio');
        $this->Comercio->load();
        $this->Comercio->logo = 'logo'.$data['file_ext'];
        $this->Comercio->save();
        redirect('cms/editarComercio');
    }

}