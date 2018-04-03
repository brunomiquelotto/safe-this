<?php

class HomeController extends MainController
{
    public function index() {
        $this->ensure_is_logged();
        $this->title = 'Home';
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->load_model('UserModel');
        $this->model = UserModel::find(1);
        $this->load_page('home/index.php');
    }
}