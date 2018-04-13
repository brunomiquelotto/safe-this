<?php if (!defined('ABSPATH')) exit; ?>
<!-- Menu para usuários logados -->
<?php if ($this->logged_in): ?>
<aside class="sidebar">
    <ul>
        <li>
            <a href="<?=HOME_URI?>/admin">Home</a>
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
        <li>
            <a href="<?=HOME_URI?>/vaidar404">404 =(</a>
        </li>
    </ul>
</aside>
<section class="main-content">
<?php endif; ?>