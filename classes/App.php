<?php 
    class App {
        private $controller;
        private $action;
        private $parameters;
        private $not_found_page = '/views/_includes/404.php';
        private static $instance = null;

        public static function get_instance() {
            if (self::$instance == null) {
                self::$instance = new App();
            }
            return self::$instance;
        }

        private function __construct() {
            $this->get_url_data();
            
            if (!$this->controller) {
                require_once ABSPATH . '/controllers/home-controller.php';
                $this->controller = new HomeController();
                $this->controller->index();
                return;
            }
            
            $controllerFileName = ABSPATH . '/controllers/' . $this->controller . '.php';
            if (!file_exists($controllerFileName)) {
                require_once ABSPATH . $this->not_found_page;
                return;
            }

            require_once $controllerFileName;
            $this->controller = preg_replace('/[^a-zA-Z]/i', '', $this->controller);

            if (!class_exists($this->controller)) {
                require_once ABSPATH . $this->not_found_page;
                return;
            }

            $controllerName = $this->controller;
            $this->controller = new $this->controller($this->parameters);
            
            $action = $this->action ? $this->action : 'index';

            if ($this->controller->use_permission_system && !$this->has_permission($controllerName, $action)) {
                echo 'voce n tem permissao bb';
                //require_once ABSPATH . $this->permission_denied;
                exit;
            }
            
            if (method_exists($this->controller, $action)) {
                consolelog('Controller -> ' . $controllerName . ' Action -> ' . $action);
                $this->controller->{$action}($this->parameters);
                return;
            }
            // Não tem metodo index no controller
            require_once ABSPATH . $this->not_found_page;
        }

        private function has_permission($controller, $action) {
            if (isset($_SESSION['userdata']) && !empty($_SESSION['userdata']) && is_array($_SESSION['userdata']) && !isset($_POST['userdata'])) { 
                $userdata = $_SESSION['userdata'];
            } else return false;
            $user_id = $userdata['User_Id'];
            $db = new DB();
            $query = $db->query('SELECT * FROM vw_user_profiles WHERE User_Id = ? ', array($user_id));
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!empty($result) && $result['FullAccess'] == 1) {
                return true;
            }
            $params = array($user_id, $controller, $action);
            $query = $db->query('SELECT * FROM VW_USER_PERMISSION WHERE User_Id = ? AND Controller = ? AND Action = ? LIMIT 1', $params);
            if ($query) {
                return count($query->fetchAll()) > 0;
            }
        }

        public function get_url_data () {
 
            if (isset($_GET['path'])) {
            
                $path = $_GET['path'];
                
                $path = rtrim($path, '/');
                $path = filter_var($path, FILTER_SANITIZE_URL);
                        
                $path = explode('/', $path);
                
                $this->controller = chk_array($path, 0);
                $this->controller .= '-controller';
                $this->action = chk_array($path, 1);
            
                if (chk_array($path, 2)) {
                    unset($path[0]);
                    unset($path[1]);
                    $this->parameters = array_values($path);
                }
            }
        }
    }
?>