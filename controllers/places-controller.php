<?php

class PlacesController extends MainController {
    public function index() {
        $this->ensure_is_logged();
        
        $this->title = 'Lugares';
        $this->load_page('places/index.php');
    }

    public function create() {
        $this->ensure_is_logged();
        $this->title = "Lugares";
        $this->load_page('places/create.php');
    }

    public function save() {
        $this->ensure_is_logged();
        //lógica para salvar o maluco
        $this->goto_page(HOME_URI . '/places/index');
    }

    public function delete() {
        $this->ensure_is_logged();
        
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        // lógica para remover
        $this->goto_page(HOME_URI. '/places/index');
    }

    public function edit() {
        $this->ensure_is_logged();
        $this->title = 'Editing ISE';
        $this->model = new stdClass();
        $this->model->description = 'ISE';
        $this->load_page('places/edit.php');
    }
}