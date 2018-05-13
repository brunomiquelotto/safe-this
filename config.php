<?php
 
// Caminho para a raiz
define('ABSPATH', dirname(__FILE__));
 
// Caminho para a pasta de uploads
define('UP_ABSPATH', ABSPATH . '/views/_uploads');
 
// URL da home
define( 'HOME_URI', 'http://localhost/safe-this');
 
// Nome do host da base de dados
define('HOSTNAME', 'localhost');
 
// Nome do DB
define('DB_NAME', 'safe_this_dev');
 
// Usuário do DB
define('DB_USER', 'root');
 
// Senha do DB
define('DB_PASSWORD', 'root');
 
// Charset da conexão PDO
define('DB_CHARSET', 'utf8');
 
// Se você estiver desenvolvendo, modifique o valor para true
define('DEBUG', true);
// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';
?>