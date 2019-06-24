<?php

namespace abc;

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
    //save
    // // Fetch identifier values

    // if ($companyIdentifier == 1) {
        $config =   [
            'oauth' => [
                'callback' => 'localhost',
                'consumer_key' => 'HPMBEXWBFW1OBI1WJF0IDDMI5QCBYG',
                'consumer_secret' => 'BUDWWNAQH1HOQJ7HFD1JFONWML4IXK',
                'rsa_private_key' => 'file://certs/privatekey.pem',
            ],
        ];
    // }else{
    //     return $response->getBody()->write(json_encode("error"));
    //     exit;
    // }

    // include('Database/db.php');

    // // connect to database
    // $conn = new mysqli($servername, $username, $password, $dbname);

    // // Test Datebase connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // $dateModifided = '';

    // // Get last refresh time
    // $sql = "SELECT * FROM `LastUpdate` WHERE `APICall` = '$companyIdentifier';";

    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();
    //     $dateModifided = date_create($row[Date]);
    // }else{
    //     $dateModifided = date_create("2014-01-01T00:00:00");
    // }

    $xero = new PrivateApplication($config);

    // print_r($xero->load('Accounting\\CreditNote')->page(1)->execute());

            // $invoices = $xero->load(Invoice::class)->where('Type', \XeroPHP\Models\Accounting\Invoice::INVOICE_TYPE_ACCREC)->modifiedAfter($dateModifided)->page($pageCount)->execute();


    // // Check Variables
    // $emptyCheck = 1;

    // // Invoice page count
    // $pageCount = 1;

    // // While loop till page is empty
    // while ($emptyCheck == 1) {

    //     $emptyCheck = 0;

    //     $invoices = $xero->load(Invoice::class)->where('Type', \XeroPHP\Models\Accounting\Invoice::INVOICE_TYPE_ACCREC)->modifiedAfter($dateModifided)->page($pageCount)->execute();

    //     foreach ($invoices as $invoice) {
    //         $emptyCheck = 1;
    
    //         //check if status is paid or autorised
    //         if($invoice->Status == "PAID" || $invoice->Status == "AUTHORISED"){
    
    //             $invoiceID = $invoice->InvoiceID;
    //             $contactName = $invoice->Contact->Name;
    //             $contactName = str_replace("'","\'",$contactName );
    //             $date = $invoice->Date;
    //             $lineAccountType = $invoice->LineAmountTypes;
    //             $lineItemID = '';
    
    
    //             foreach($invoice->LineItems as $lineItem){
                    
    
    //                 // array_push($arraytest,$lineItem->AccountCode);
    //                 $lineItemID = $lineItem->LineItemID;
    //                 $lineItemDescription = 'No Description';
    //                 $lineItemTaxAmount = $lineItem->TaxAmount;
    //                 $lineItemAmount = $lineItem->LineAmount;
    //                 $lineItemAcountCode = $lineItem->AccountCode;
    
    //                 $lineItemTracking = $lineItem->Tracking;
    //                 $lineTrackingManager = 'NO TRACKING';
    //                 $lineTrackingType = 'NO TRACKING';
    //                 $total = 0.00;
    
    //                 // check tracking is array or object
    //                 if(is_array($lineItemTracking) || is_object($lineItemTracking)){
    
    //                     $i = 0;
    
    //                     foreach($lineItem->Tracking as $Tracking){
    //                         if($i == 0)
    //                         {
    //                             $lineTrackingManager = $Tracking->Option;
    //                         }
    //                         if($i == 1)
    //                         {
    //                             $lineTrackingType = $Tracking->Option;
    //                         }
    //                         $i = 1;
    //                     }
    //                 }
    
    //                 // Check if line item is inclusive
    //                 if($lineAccountType == "Inclusive")
    //                 {
    //                     $total = $lineItemAmount - $lineItemTaxAmount;
    //                 }else {
    //                     $total = $lineItemAmount;
    //                 }
    
    //                 if($date == null){
    //                     $date = "0000-00-00 00:00:00";
    //                 }else{
    //                     $dateStr = $date->format('Y-m-d H:i:s');
    //                 }
    
    
    //                 // Get year
    //                 $year = $date->format('Y');
    //                 $month = '';
            
    //                 // Get Month
    //                 $monthCheck = $date->format('m');
    
    //                 // use month value and create month string
    //                 if($monthCheck == "01")
    //                 {
    //                     $month = "Jan";
    //                 }
    //                 if($monthCheck == "02")
    //                 {
    //                     $month = "Feb";
    //                 }
    //                 if($monthCheck == "03")
    //                 {
    //                     $month = "Mar";
    //                 }
    //                     if($monthCheck == "04")
    //                 {
    //                     $month = "Apr";
    //                 }
    //                 if($monthCheck == "05")
    //                 {
    //                     $month = "May";
    //                 }
    //                 if($monthCheck == "06")
    //                 {
    //                     $month = "Jun";
    //                 }
    //                 if($monthCheck == "07")
    //                 {
    //                     $month = "Jul";
    //                 }
    //                 if($monthCheck == "08")
    //                 {
    //                     $month = "Aug";
    //                 }
    //                 if($monthCheck == "09")
    //                 {
    //                     $month = "Sep";
    //                 }
    //                 if($monthCheck == "10")
    //                 {
    //                     $month = "Oct";
    //                 }
    //                 if($monthCheck == "11")
    //                 {
    //                     $month = "Nov";
    //                 }
    //                 if($monthCheck == "12")
    //                 {
    //                     $month = "Dec";
    //                 }

    //                 $sql = "INSERT INTO
    //                         `Invoices`(
    //                             `InvoiceID`,
    //                             `ContactName`,
    //                             `Date`,
    //                             `LineAccountType`,
    //                             `LineItemsLineItemID`,
    //                             `LineItemDescription`,
    //                             `LineItemsTaxAmount`,
    //                             `LineItemsLineAmount`,
    //                             `LineItemsTracking1Option`,
    //                             `LineItemsTracking2Option`,
    //                             `AccountCode`,
    //                             `total`,
    //                             `month`,
    //                             `year`,
    //                             `ApiCall`,
    //                             `EndDate`,
    //                             `RepeatingInvoiceID`
    //                         )
    //                     VALUES (
    //                         '$invoiceID',
    //                         '$contactName',
    //                         '$dateStr',
    //                         '$lineAccountType',
    //                         '$lineItemID',
    //                         '$lineItemDescription',
    //                         '$lineItemTaxAmount',
    //                         '$lineItemAmount',
    //                         '$lineTrackingManager',
    //                         '$lineTrackingType',
    //                         '$lineItemAcountCode',
    //                         '$total',
    //                         '$month',
    //                         '$year',
    //                         '$companyIdentifier',
    //                         '1',
    //                         '1'
    //                     )";
    
    //                 // run querry
    //                 $result = $conn->query($sql);
        
    //             }
    //         }
    //     }
    //     $pageCount++;
    //     sleep(1);
    // }
    // $sql = "DELETE FROM LastUpdate WHERE APICall = '$companyIdentifier'";
    // // Run Insert Querry
    // $conn->query($sql);

    // // Set Insert Querry
    // $sql = "INSERT INTO LastUpdate ( `Date` , `APICall`) VALUES (now(), '$companyIdentifier');";
    // // Run Insert Querry
    // $conn->query($sql);


    return $response->getBody()->write(json_encode("OK123"));
});

$app->get('/creditnotes/{Identifier}', function ($request, $response, array $args) {

    $companyIdentifier = $args['Identifier'];

    // Fetch identifier values

    if ($companyIdentifier == 1) {
        include('configs/thorneWidgery.php');
    }else if($companyIdentifier == 2){
        include('configs/thorneWidgeryWealthManagement.php');
    }else if($companyIdentifier == 2){
        include('configs/thorneWidgeryBusinessSolutions.php');
    }else{
        return $response->getBody()->write(json_encode("error"));
        exit;
    }

    $companyIdentifier = $companyIdentifier + 3;

    include('Database/db.php');

    // connect to database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Test Datebase connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $dateModifided = '';

    // Get last refresh time
    $sql = "SELECT * FROM `LastUpdate` WHERE `APICall` = '$companyIdentifier';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dateModifided = date_create($row[Date]);
    }else{
        $dateModifided = date_create("2014-01-01T00:00:00");
    }

    $xero = new PrivateApplication($config);

    // Check Variables
    $emptyCheck = 1;

    // Invoice page count
    $pageCount = 1;

    // While loop till page is empty
    while ($emptyCheck == 1) {

        $emptyCheck = 0;

        $creditNotes = $xero->load(CreditNote::class)->where('Type', \XeroPHP\Models\Accounting\CreditNote::CREDIT_NOTE_TYPE_ACCRECCREDIT)->modifiedAfter($dateModifided)->page($pageCount)->execute();

        foreach ($creditNotes as $creditNote) {
            $emptyCheck = 1;
    
            //check if status is paid or autorised
            if($creditNote->Status == "PAID" || $creditNote->Status == "AUTHORISED"){
    
                $invoiceID = $creditNote->CreditNoteID;
                $contactName = $creditNote->Contact->Name;
                $contactName = str_replace("'","\'",$contactName );
                $date = $creditNote->Date;
                $lineAccountType = $creditNote->LineAmountTypes;
                $lineItemID = '';
    
                foreach($creditNote->LineItems as $lineItem){
                    
    
                    // array_push($arraytest,$lineItem->AccountCode);
                    $lineItemID = $invoiceID;
                    $lineItemDescription = 'No Description';
                    $lineItemTaxAmount = $lineItem->TaxAmount;
                    $lineItemAmount = $lineItem->LineAmount;
                    $lineItemAcountCode = $lineItem->AccountCode;
    
                    $lineItemTracking = $lineItem->Tracking;
                    $lineTrackingManager = 'NO TRACKING';
                    $lineTrackingType = 'NO TRACKING';
                    $total = 0.00;
    
                    // check tracking is array or object
                    if(is_array($lineItemTracking) || is_object($lineItemTracking)){
    
                        $i = 0;
    
                        foreach($lineItem->Tracking as $Tracking){
                            if($i == 0)
                            {
                                $lineTrackingManager = $Tracking->Option;
                            }
                            if($i == 1)
                            {
                                $lineTrackingType = $Tracking->Option;
                            }
                            $i = 1;
                        }
                    }
    
                    // Check if line item is inclusive
                    if($lineAccountType == "Inclusive")
                    {
                        $total = $lineItemAmount - $lineItemTaxAmount;
                    }else {
                        $total = $lineItemAmount;
                    }
    
                    if($date == null){
                        $date = "0000-00-00 00:00:00";
                    }else{
                        $dateStr = $date->format('Y-m-d H:i:s');
                    }
    
    
                    // Get year
                    $year = $date->format('Y');
                    $month = '';
            
                    // Get Month
                    $monthCheck = $date->format('m');
    
                    // use month value and create month string
                    if($monthCheck == "01")
                    {
                        $month = "Jan";
                    }
                    if($monthCheck == "02")
                    {
                        $month = "Feb";
                    }
                    if($monthCheck == "03")
                    {
                        $month = "Mar";
                    }
                        if($monthCheck == "04")
                    {
                        $month = "Apr";
                    }
                    if($monthCheck == "05")
                    {
                        $month = "May";
                    }
                    if($monthCheck == "06")
                    {
                        $month = "Jun";
                    }
                    if($monthCheck == "07")
                    {
                        $month = "Jul";
                    }
                    if($monthCheck == "08")
                    {
                        $month = "Aug";
                    }
                    if($monthCheck == "09")
                    {
                        $month = "Sep";
                    }
                    if($monthCheck == "10")
                    {
                        $month = "Oct";
                    }
                    if($monthCheck == "11")
                    {
                        $month = "Nov";
                    }
                    if($monthCheck == "12")
                    {
                        $month = "Dec";
                    }

                    $sql = "INSERT INTO
                            `Invoices`(
                                `InvoiceID`,
                                `ContactName`,
                                `Date`,
                                `LineAccountType`,
                                `LineItemsLineItemID`,
                                `LineItemDescription`,
                                `LineItemsTaxAmount`,
                                `LineItemsLineAmount`,
                                `LineItemsTracking1Option`,
                                `LineItemsTracking2Option`,
                                `AccountCode`,
                                `total`,
                                `month`,
                                `year`,
                                `ApiCall`,
                                `EndDate`,
                                `RepeatingInvoiceID`
                            )
                        VALUES (
                            '$invoiceID',
                            '$contactName',
                            '$dateStr',
                            '$lineAccountType',
                            '$lineItemID',
                            '$lineItemDescription',
                            '$lineItemTaxAmount',
                            '$lineItemAmount',
                            '$lineTrackingManager',
                            '$lineTrackingType',
                            '$lineItemAcountCode',
                            '$total',
                            '$month',
                            '$year',
                            '$companyIdentifier',
                            '1',
                            '1'
                        )";
    
                    // run querry
                    $result = $conn->query($sql);
        
                }
            }
        }
        $pageCount++;
        sleep(1);

    }

    $sql = "DELETE FROM LastUpdate WHERE APICall = '$companyIdentifier'";
    // Run Insert Querry
    $conn->query($sql);

    // Set Insert Querry
    $sql = "INSERT INTO LastUpdate ( `Date` , `APICall`) VALUES (now(), '$companyIdentifier');";
    // Run Insert Querry
    $conn->query($sql);


    return $response->getBody()->write(json_encode('OK'));


});

$app->get('/repeating/{Identifier}', function ($request, $response, array $args) {

    $companyIdentifier = $args['Identifier'];

    // Fetch identifier values

    if ($companyIdentifier == 1) {
        include('configs/thorneWidgery.php');
    }else if($companyIdentifier == 2){
        include('configs/thorneWidgeryWealthManagement.php');
    }else if($companyIdentifier == 2){
        include('configs/thorneWidgeryBusinessSolutions.php');
    }else{
        return $response->getBody()->write(json_encode("error"));
        exit;
    }

    $companyIdentifier = $companyIdentifier + 6;

    include('Database/db.php');

    // connect to database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Test Datebase connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $checkDelete = 0;

    while($checkDelete == 0)
    {
        $sql = "DELETE FROM `Invoices` WHERE APICall = '7' LIMIT 1000;";
        $conn->query($sql);
        // echo $conn->affected_rows;
    
        usleep(1000000);
    
        if($conn->affected_rows == 0)
        {
        //   echo 'end - ' .$conn->affected_rows . ' - Deletes';
            $checkDelete = 1;
        }
    }

    $dateModifided = '';

    // Get last refresh time
    $sql = "SELECT * FROM `LastUpdate` WHERE `APICall` = '$companyIdentifier';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dateModifided = date_create($row[Date]);
    }else{
        $dateModifided = date_create("2014-01-01T00:00:00");
    }

    $xero = new PrivateApplication($config);

    $creditNotes = $xero->load(RepeatingInvoice::class)->execute();

    foreach ($repeatingInvoices as $repeatingInvoice) {


        //check if status is paid or autorised
        if($repeatingInvoice->Type == "ACCREC"){


            $date = $repeatingInvoice->Schedule->NextScheduledDate;
            if($date == null){
              $date = "0000-00-00 00:00:00";
            }else{
              $dateStr = $date->format('Y-m-d H:i:s');
            }
    
            $dateEnd = $repeatingInvoice->Schedule->EndDate;
            if($dateEnd == null){
              $dateEnd = "0000-00-00 00:00:00";
            }else{
              $dateEndStr = $dateEnd->format('Y-m-d H:i:s');
            }

            $today = new DateTime("now");

            if($dateEnd >= $today || $dateEnd == "0000-00-00 00:00:00"){
                if($date >= $today) {

                    $invoiceID = $repeatingInvoice->RepeatingInvoiceID;
                    $contactName = $repeatingInvoice->Contact->Name;
                    $contactName = str_replace("'","\'",$contactName );
                    $lineAccountType = $repeatingInvoice->LineAmountTypes;
                    $lineItemID = '';

                    foreach($repeatingInvoice->LineItems as $lineItem){
                

                        // array_push($arraytest,$lineItem->AccountCode);
                        $lineItemID = $lineItem->LineItemID;
                        $lineItemDescription = 'No Description';
                        $lineItemTaxAmount = $lineItem->TaxAmount;
                        $lineItemAmount = $lineItem->LineAmount;
                        $lineItemAcountCode = $lineItem->AccountCode;
        
                        $lineItemTracking = $lineItem->Tracking;
                        $lineTrackingManager = 'NO TRACKING';
                        $lineTrackingType = 'NO TRACKING';
                        $total = 0.00;
        
                        // check tracking is array or object
                        if(is_array($lineItemTracking) || is_object($lineItemTracking)){
        
                            $i = 0;
        
                            foreach($lineItem->Tracking as $Tracking){
                                if($i == 0)
                                {
                                    $lineTrackingManager = $Tracking->Option;
                                }
                                if($i == 1)
                                {
                                    $lineTrackingType = $Tracking->Option;
                                }
                                $i = 1;
                            }
                        }
        
                        // Check if line item is inclusive
                        if($lineAccountType == "Inclusive")
                        {
                            $total = $lineItemAmount - $lineItemTaxAmount;
                        }else {
                            $total = $lineItemAmount;
                        }
        
                        // Get year
                        $year = $date->format('Y');
                        $month = '';
                
                        // Get Month
                        $monthCheck = $date->format('m');
        
                        // use month value and create month string
                        if($monthCheck == "01")
                        {
                            $month = "Jan";
                        }
                        if($monthCheck == "02")
                        {
                            $month = "Feb";
                        }
                        if($monthCheck == "03")
                        {
                            $month = "Mar";
                        }
                            if($monthCheck == "04")
                        {
                            $month = "Apr";
                        }
                        if($monthCheck == "05")
                        {
                            $month = "May";
                        }
                        if($monthCheck == "06")
                        {
                            $month = "Jun";
                        }
                        if($monthCheck == "07")
                        {
                            $month = "Jul";
                        }
                        if($monthCheck == "08")
                        {
                            $month = "Aug";
                        }
                        if($monthCheck == "09")
                        {
                            $month = "Sep";
                        }
                        if($monthCheck == "10")
                        {
                            $month = "Oct";
                        }
                        if($monthCheck == "11")
                        {
                            $month = "Nov";
                        }
                        if($monthCheck == "12")
                        {
                            $month = "Dec";
                        }
        
                        $sql = "INSERT INTO
                                `Invoices`(
                                    `InvoiceID`,
                                    `ContactName`,
                                    `Date`,
                                    `LineAccountType`,
                                    `LineItemsLineItemID`,
                                    `LineItemDescription`,
                                    `LineItemsTaxAmount`,
                                    `LineItemsLineAmount`,
                                    `LineItemsTracking1Option`,
                                    `LineItemsTracking2Option`,
                                    `AccountCode`,
                                    `total`,
                                    `month`,
                                    `year`,
                                    `ApiCall`,
                                    `EndDate`,
                                    `RepeatingInvoiceID`
                                )
                            VALUES (
                                '$invoiceID',
                                '$contactName',
                                '$dateStr',
                                '$lineAccountType',
                                '$lineItemID',
                                '$lineItemDescription',
                                '$lineItemTaxAmount',
                                '$lineItemAmount',
                                '$lineTrackingManager',
                                '$lineTrackingType',
                                '$lineItemAcountCode',
                                '$total',
                                '$month',
                                '$year',
                                '$companyIdentifier',
                                '$dateEndStr',
                                '$invoiceID'
                            )";
        
                        // run querry
                        $result = $conn->query($sql);
            
                    }

                }
            }

        }
    }

    $sql = "DELETE FROM LastUpdate WHERE APICall = '$companyIdentifier'";
    // Run Insert Querry
    $conn->query($sql);

    // Set Insert Querry
    $sql = "INSERT INTO LastUpdate ( `Date` , `APICall`) VALUES (now(), '$companyIdentifier');";
    // Run Insert Querry
    $conn->query($sql);


    return $response->getBody()->write(json_encode('OK'));


});

$app->get('/webhook', function ($request, $response) {
});


$app->run();