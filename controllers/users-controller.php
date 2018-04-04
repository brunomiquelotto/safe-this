<?php 

class UsersController extends MainController {

    public function __construct() {
        $this->title = "Usuários";
    }

    public function index() {
        $this->ensure_is_logged();

        $this->load_page('users/index.php');
    }

    public function edit() {
        $this->ensure_is_logged();

        $this->load_page('users/edit.php');
    }

    public function create() {
        $this->ensure_is_logged();

        $this->load_page('users/create.php');
    }

    public function delete() {
        $this->ensure_is_logged();

        $this->goto_page('users/index');
    }

    public function save() {
        $this->ensure_is_logged();

        $this->goto_page('users/index');
    }
}

?>