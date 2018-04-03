<?php

class AdminController extends MainController
{
    public function index() {
        $this->ensure_is_logged();
        $this->title = 'Admin';
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->load_model('UserModel');
        $this->load_page('home/index.php');
    }
}