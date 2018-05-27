<?php

class MainController extends UserLogin
{
    public $db;
    public $phpass;
    public $title;
    public $login_required = false;
    public $logged_in = false;
    public $parameters = array();
    public $use_permission_system = false;
    public $message = null;

    public function __construct ( $parameters = array() ) {
        $this->db = new DB();
        $this->parameters = $parameters;
        $this->phpass = new PasswordHash(8, false);
        $this->check_user_login();
        $this->model = (object)array();
        $this->check_messages();
    }

    public function load_model($model_name = false) {
        if (!$model_name) return;
        $model_path = ABSPATH . '/models/' . $model_name . '.php';
        if (file_exists( $model_path)) {
            require_once $model_path;
            $model_name = explode('/', $model_name);
            $model_name = end( $model_name );
            $model_name = preg_replace('/[^a-zA-Z0-9]/is', '', $model_name);
            if (class_exists($model_name)) {
                return new $model_name($this->db, $this);
            }
            return;
        }
    }

    protected function load_view($view_name) {
        require ABSPATH . '/views/' . $view_name;
    }

    protected function load_page($page_name) {
        $this->load_view('_includes/header.php');
        $this->load_view('_includes/menu.php');
        $this->load_view($page_name);
        $this->load_view('_includes/footer.php');
    }

    protected function throw_404() {
        $this->load_view('_includes/404/404.php');
        exit;
    }
    
    protected function ensure_is_logged() {
        if (!$this->logged_in) {
            $this->goto_login();
        }
    }

    protected function create_dir_if_no_exists($dir) {
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    protected function set_message($text, $type = 'info', $data = null) {
        if (!$type) {
            $type = 'info';
        }
        if (!$data) {
            $data = (object)array();
        }
        $_SESSION['message'] = array(
            'Text' => $text,
            'Type' => $type,
            'Data' => $data
        );
    }

    private function check_messages() {
        if (array_key_exists('message', $_SESSION) && $_SESSION['message']) {
            $message = $_SESSION['message'];
            $this->message = (object)$message;
            $_SESSION['message'] = null;
        }
    }
 
} 