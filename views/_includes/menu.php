<?php if (!defined('ABSPATH')) exit; ?>
<!-- Menu para usuários logados -->
<?php if ($this->logged_in): ?>
<aside class="sidebar">
    <ul>
        <li>
            <a href="<?=HOME_URI?>/home">Home</a>
        </li>
        <li>
            <a href="<?=HOME_URI?>/vaidar404">404 =(</a>
        </li>
    </ul>
</aside>
<section class="main-content">
<?php endif; ?>