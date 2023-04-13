<?php

use ApiBancoDigital\Controller\EnderecoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


//rotas pro banco digital
switch ($url)
{
    default:
        http_response_code(403);
    break;
}