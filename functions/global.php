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
    
?>