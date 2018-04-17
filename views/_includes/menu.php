<?php if (!defined('ABSPATH')) exit; ?>

<!-- Menu para usuários logados -->
<?php if ($this->logged_in): ?>
<aside class="sidebar">
    <ul>
        <li>
            <a href="<?=HOME_URI?>/home">Home</a>
        </li>
        <li>
            <a href="<?=HOME_URI?>/ocurrences">Registro de Ocorrências</a>
        </li>
        <li>
            <a href="<?=HOME_URI?>/admin">Administrativo</a>
        </li>
        <li>
            <a href="<?=HOME_URI?>/reports">Relatórios</a>
        </li>
        <li>
            <a href="<?=HOME_URI?>/places">Locais</a>
        </li>
        <li>
            <a href="<?=HOME_URI?>/users">Usuários</a>
        </li>
        <li>
            <a href="<?=HOME_URI?>/profiles">Perfis</a>
        </li>
    </ul>
    <footer class="footer">
        <p><span>&copy; Safe this</span> - Todos os direitos reservados 2018 <span>&copy;</span></p>
    </footer> 
</aside>
<section class="main-content">
    <?php if ($this->message): ?>
        <div class="alert <?=$this->message->Type?>">
            <span><?=$this->message->Text?></span>
        </div>
    <?php endif ?>
<?php endif ?>