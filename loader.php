<?php

if (!defined('ABSPATH')) exit;

session_start();

if (!defined('DEBUG') || DEBUG === false ) {
    error_reporting(0);
    ini_set("display_errors", 0); 
} else {
    error_reporting(E_ALL);
    ini_set("display_errors", 1); 
}
 
require_once ABSPATH . '/functions/global.php';

$app = App::get_instance();