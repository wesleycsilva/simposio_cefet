<?php

require_once 'classes/config_user.php';

spl_autoload_register('carregarClasse');

function carregarClasse($nomeClasse)
{
    if (file_exists('classes/' . $nomeClasse . '.php')) {
        require_once 'classes/' .$nomeClasse . '.php';
    }
}
