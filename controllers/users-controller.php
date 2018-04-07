<?php 

class UsersController extends MainController {

    public function __construct() {
        parent::__construct();
        $this->ensure_is_logged();
        $this->load_model('UserModel');
    }
    public function index() {
        $this->title = "Usuários";
        $this->model->users = UserModel::all();
        $this->load_page('users/index.php');
    }

    public function edit() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        $user = UserModel::find($id);
        if (!$user) {
            $this->throw_404();
        }
        $this->model->user = $user;
        $this->load_page('users/edit.php');
    }

    public function create() {
        $this->title = "Novo Responsável";
        $this->load_page('users/create.php');
    }

    public function delete() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        UserModel::delete($id);
        $this->goto_page(HOME_URI . '/users/index');
    }

    public function save() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        if ($id) {
            $data['user_id'] = $id;
        }
        $data['user_password'] = $this->phpass->HashPassword('admin');
        $user = new UserModel($data);
        $results = $user->save();
        $this->goto_page(HOME_URI . '/users/index');
    }
}

?>