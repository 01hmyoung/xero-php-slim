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

        $config =   [
            'oauth' => [
                'callback' => 'localhost',
                'consumer_key' => 'HPMBEXWBFW1OBI1WJF0IDDMI5QCBYG',
                'consumer_secret' => 'BUDWWNAQH1HOQJ7HFD1JFONWML4IXK',
                'rsa_private_key' => 'file://certs/privatekey.pem',
            ],
        ];


    $xero = new PrivateApplication($config);

    print_r($xero->load('Accounting\\CreditNote')->page(1)->execute());

    return $response->getBody()->write(json_encode("OK123"));
});



$app->run();