<?php

// autoload.php
require 'vendor/autoload.php';

// Xero API 
use XeroPHP\Application\PrivateApplication;
// use XeroPHP\Models\Accounting\invoice;
// use XeroPHP\Models\Accounting\CreditNote;
// use XeroPHP\Models\Accounting\RepeatingInvoice;


// create Slim app
$app = new Slim\App();

// Rount GET /hello
$app->get('/invoices/{Identifier}', function ($request, $response, array $args) {

    $companyIdentifier = $args['Identifier'];

    $xero = new PrivateApplication($config);

    print_r($xero->load('Accounting\\Invoice')->page(1)->execute());

    return $response->getBody()->write(json_encode("OK123"));
});



$app->run();