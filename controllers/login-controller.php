<?php

class LoginController extends MainController
{
    public $login_error = null;
    public $use_permission_system = false;
    public function index() {
        if ($this->logged_in) {
            header('Location: ' . HOME_URI . '/admin');
        }
        $this->title = 'Login';
        $parameters = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->load_page('login/index.php');
    }

    public function exit() {
        $this->logout(true);
    }
}