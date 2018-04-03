# mvc-example
PHP MVC Boilerplate

### Configurations:

	define('ABSPATH', dirname( __FILE__ ) ); // Define o diretório absoluto da aplicação
	define('UP_ABSPATH', ABSPATH . '/views/_uploads'); // Diretório onde ficarão os uploads
	define('HOME_URI', 'http://127.0.0.1:81/mvc/'); // URL da aplicação
	define('HOSTNAME', 'localhost'); // Nome do host do banco de dados
	define('DB_NAME', 'safethis'); // Nome do banco de dados
	define('DB_USER', 'root'); // Usuário para se conectar ao banco
	define('DB_PASSWORD', ''); // Senha para se conectar ao banco de dados
	define('DB_CHARSET', 'utf8'); // Charset da conexão com o Banco de dados
	define('DEBUG', true); // Controla a exibição de erros e mensagens para o usuário, alterar para FALSE ao subir para produção

### Classe DB:

#### Métodos

##### Instanciar

    $db = new DB();

##### Insert

    $user = array(
    	'name' => 'Bruno',
    	'email' => 'bruno@email.com',
    	'password' => '123456'
    );
    $db->insert('users', $user); // Tabela, valor

##### Update
    $newUserData = array(
    	'name' => 'Bruno Miquelotto',
    	'email' => 'bruno.miquelotto@email.com',
    	'password' => '123456'
    );
    $db->update('users', 'user_id', '1', $newUserData); // Tabela, condição, valor da condição, novos valores
##### Delete
    $db->delete('users', 'user_id', '1'); // Tabela, condição, valor condição
##### Select
	$filtros = array('1');
	$db->query('SELECT * FROM users where user_id = ?', $filtros); // SQL a ser executado