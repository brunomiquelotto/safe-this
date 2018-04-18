<?php 

class UsersController extends MainController {
    public function __construct() {
        parent::__construct();
        $this->use_permission_system = true;
        $this->ensure_is_logged();
        $this->load_model('UserModel');
        $this->load_model('ProfileModel');
    }
    public function index() {
        $this->title = "Usuários";
        $this->model->users = $this->include_profile(UserModel::all());
        $this->load_page('users/index.php');
    }
    
    private function include_profile($users) {
        $profiles = ProfileModel::all();
        $indexedList = array();
        foreach ($profiles as $profile) {
            $indexedList[$profile['Profile_Id']] = $profile['Description'];
        }
        for($i = 0; $i < count($users); $i++) {
            $users[$i]['Profile'] = $indexedList[$users[$i]['Profile_Id']];
        }
        return $users;
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
        $profileId = $user['Profile_Id'];
        $this->model->user = $user;
        $this->model->profiles = ProfileModel::all();
        $this->load_page('users/edit.php');
    }

    public function create() {
        $this->title = "Novo Responsável";
        $this->model->profiles = ProfileModel::all();
        $this->load_page('users/create.php');
    }

    public function delete() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        UserModel::delete($id);
        $this->set_message('Usuário deletado', 'warning');
        $this->goto_page(HOME_URI . '/users/index');
    }

    public function save() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        if ($id) {
            $data['User_Id'] = $id;
        }
        if (!isset($data['Password'])) {
            $data['Password'] = $this->phpass->HashPassword('123456');
        }
        $user = new UserModel($data);
        $results = $user->save();
        $this->set_message('Salvo com sucesso', 'success');
        $this->goto_page(HOME_URI . '/users/index');
    }
}

?>