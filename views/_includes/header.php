<?php if (!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$this->title?> - Safe This</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/framework.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=HOME_URI?>/views/css/fontawesome/fontawesome-all.min.css"/>      
    <script src="<?=HOME_URI?>/views/js/main.js"></script>
</head>
<body>

<header class="header">
    <h3>
        <a href="<?=HOME_URI?>/home">Safe This</a>
    </h3>
    <div>
        <?php if($this->logged_in):?>
        <h4>
            <a href="<?=HOME_URI?>/login/exit">Sair</a>
        </h4>
        <?php endif;?>
    </div>
</header>
