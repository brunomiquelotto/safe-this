<?php if (!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$this->title?> - Safe This</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/framework.css?v=<?=uniqid()?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/main.css?v=<?=uniqid()?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/fontawesome/fontawesome-all.min.css"/>      
    <script src="<?=HOME_URI?>/views/js/main.js?v=<?=uniqid()?>"></script>
    <script src="<?=HOME_URI?>/views/_includes/lib_canvas/canvasjs.min.js?v=<?=uniqid()?>"></script>

</head>
<body>

<header class="header">
    <a href="<?=HOME_URI?>/admin">
        <img src="\safe-this\views\_includes\images\header\Logo.png" alt="Logotipo">
    </a>
    <div>
        <?php if($this->logged_in):?>
        <h4>
            <a href="<?=HOME_URI?>/login/exit">Sair</a>
        </h4>
        <?php else:?>
           <?php if($_SERVER ['REQUEST_URI'] == "/safe-this/login"):?>
                <h4>
                    <a href="<?=HOME_URI?>/home">Home</a>
                </h4>
            <?php else:?>
                <h4>
                    <a href="<?=HOME_URI?>/login">Login</a>
                </h4>
            <?php endif;?>
        <?php endif;?>
    </div>
</header>
