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

            $this->controller = new $this->controller($this->parameters);

            if (method_exists($this->controller, $this->action)) {
                $this->controller->{$this->action}($this->parameters);
                return;
            }
            
            if (!$this->action && method_exists($this->controller, 'index')) {
                $this->controller->index($this->parameters);
                return;
            }

            require_once ABSPATH . $this->not_found_page;
            return;
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