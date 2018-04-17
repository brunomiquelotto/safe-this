<?php 

class ProfilesController extends MainController {
    private $Admin_Profile = 1;
    public function __construct() {
        parent::__construct();
        $this->use_permission_system = true;
        $this->ensure_is_logged();
        $this->load_model('ProfilePermissionModel');
        $this->load_model('PermissionModel');
        $this->load_model('ProfileModel');
    }

    public function index() {
        $this->title = "Perfis";
        $this->model->profiles = ProfileModel::all();
        $this->load_page('profiles/index.php');
    }

    public function edit() {
        $this->title="Edição de perfil";
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        $profile = ProfileModel::find($id);
        if (!$profile) {
            $this->throw_404();
        }
        $profileId = $profile['Profile_Id'];
        $profile['Permissions'] = $this->getProfilePermissions($profileId);
        $this->model->profile = $profile;
        $this->load_page('profiles/edit.php');
    }

    private function getProfilePermissions($profileId) {
        if ($profileId == $this->Admin_Profile) {
            return array();
        }
        $allPermissions = PermissionModel::all();
        $profilePermissions = ProfilePermissionModel::where('Profile_Id = ' . $profileId);
        for ($i = 0; $i < count($allPermissions); $i++) {
            $found = array_filter($profilePermissions, function($perm) use ($allPermissions, $i) {
                return $perm['Permission_Id'] == $allPermissions[$i]['Permission_Id'];
            });
            $allPermissions[$i]['Checked'] = count($found) > 0;
        }
        return $allPermissions;
    }

    public function create() {
        $this->title = "Novo Perfil";
        $this->model->profile = (object)array();
        $this->model->profile->permissions = $this->getProfilePermissions(0);
        $this->load_page('profiles/create.php');
    }

    public function delete() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        if (!$parameters) {
            $this->throw_404();
        }
        $id = $parameters[0];
        ProfilePermissionModel::delete_where('Profile_Id = ?', array($id));
        ProfileModel::delete($id);
        $this->set_message('Perfil deletado', 'warning');
        $this->goto_page(HOME_URI . '/profiles/index');
    }

    public function save() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        if ($id) { 
            $data['Profile_Id'] = $id;
        }
        $profile = new ProfileModel($data);
        $results = $profile->save();
        if ($results->id) {
            $id = $results->id;
        }
        if (array_key_exists('Permissions', $data)) {
            $profilePermissions = $data['Permissions'];
            ProfilePermissionModel::delete_where('Profile_Id = ? ', array($id));
            $this->save_permissions($profilePermissions, $id);
        }
        $this->set_message('Salvo com sucesso','success');
        $this->goto_page(HOME_URI . '/profiles/index');
    }

    private function save_permissions($profilePermissions, $id) {
        for($i = 0; $i < count($profilePermissions); $i++) {
            $profileData = array(
                'Permission_Id' => $profilePermissions[$i],
                'Profile_Id' => $id
            );
            $profile = new ProfilePermissionModel($profileData);
            $profile->save();
        }
    }
}

?>