<?php 
    // Coloque as funções globais aqui amigos.
    function chk_array ( $array, $key ) {
        if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    } 

    spl_autoload_register(function($class) {
        $path = ABSPATH . '/classes/' . $class . '.php';
        if (!file_exists($path)) {
            return;
        }
        include $path;
    });

    function consolelog($content) {
        $debugFileName = ABSPATH . '/log/log.txt';
        $debugFile = fopen($debugFileName, "a");
        fwrite($debugFile, "<==== DEBUG ====>\r\n");
        fwrite($debugFile, $content);
        fwrite($debugFile, "\r\n<==== END DEBUG ====>\r\n");
        fclose($debugFile);
    }


    function debug_variable($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
    
?>