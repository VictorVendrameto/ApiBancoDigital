<?php

use ApiBancoDigital\Controller\{ContaController, CorrentistaController, };

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


//rotas pro banco digital
switch ($url)
{
    case '/conta/extrato':
        ContaController::extrato();
    break;

    case '/conta/pix/receber':
        ContaController::receberPix();
    break;

    case '/conta/pix/enviar':
        ContaController::enviarPix();
    break;
    
    case '/correntista/save':
        CorrentistaController::save();
    break;

    case '/correntista/login':
        CorrentistaController::auth();
    break;

    
    default:
        http_response_code(403);
    break;
}