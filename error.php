<?php
session_start(); ?>

<div class="errorPage">
    <p class="errorMsg"><?=($_SESSION['error'])?></p>
    <a href="<?= $_SESSION['previousPage'] ?>">Revenir en arrière</a>
</div>
