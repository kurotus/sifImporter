<?php
require_once __DIR__.'/vendor/autoload.php'; // load composer
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig; // include CSV tools
include './conf/voyager_sif_definitions.php'; //include voager field definitions
require_once 'functions.php';

function writeSIF($patronData,$outputFile,$logFile) {
//Voyager data format is year-month-date
//Let's get rundate into a variable
//Not sure if we need timezone to be set
date_default_timezone_set('Europe/Helsinki');
$rundate= date('o'."-".'m'."-".'d');

//This still has more fields than is required but they are empty
$patronID =""; // created by Voyager
$barcodeID =""; //created by Voyager
$barcode =""; // added by staff
$empty ="";
// $patronGroup="esitt"; //from config file
$barcodeStatus="1"; //active by default
$barcodeModified="2016.04.07"; //rundate
$patronExpire="2382.12.31"; //rundate +5 years
//$purgedate="2020.10.10";
$voyagerDate=$rundate;
$voyagerUpdated=$rundate;
$instID="200383-xxx"; //National identification number, acts as key in patron update. From CSV
$statCat="U"; //from config file
$nameType="1"; //default 1
$surName="Ulvova"; //from csv
$firstName="Ulla";//from csv
$middleName="";//from csv
$title="";//empty
$addressCount="2";//default 2(mail & e-maoil
$addressID=""; //created by Voyager
$addressType="1"; //permanent| by default
$addressStatus="N"; //normal| by default
$addressBegin=$rundate;
$addressEnd="2382.12.31"; //by default
$streetAddress="PL 8123"; // from csv
$city="ROVANIEMI"; // from csv
$zipCode="96101"; //from csv
$country=""; //from csv
$phone="123"; // from csv
$email="lauda@ulapland.fi"; //from csv
$dateAdded=$rundate;
$addressID2=""; // created by Voyager
$addressType2="3"; // e-mail
$addressBegin2=$rundate;
$addressEnd2="2050.10.10";

$writeOutput=fopen($outputFile,"w");

foreach ($patronData as $key => $value)
{


fwrite($writeOutput, str_pad($patronID, 10, "0", STR_PAD_LEFT)); // Zero filled, Voyager creates for new patrons
print str_pad($barcodeID, 10, " ", STR_PAD_LEFT); // blank filled, Voyager creates
print str_pad($barcode, 25, " ",STR_PAD_RIGHT); //blank filled, can be empty. added is the desk.
print str_pad($patronData[$key]["patronGroup"], 10, " ",STR_PAD_RIGHT); // Valid patron group
print str_pad($barcodeStatus, 1," "); // 1=active 2=lost 3=stolen 4=expired 5=other
print str_pad($barcodeModified, 10, " ",STR_PAD_RIGHT); //modified data. hardcoded here but sysdate is better
print str_pad($empty, 122, " "); //other barcodes. See manual for more information
print str_pad($patronExpire,10," "); //expire date
print str_pad($patronData[$key]["purgeDate"],10," "); //purge date
print str_pad($voyagerDate,10," "); //run-date of the load if new patron
print str_pad($voyagerUpdated,10," "); //run-date of the load
print str_pad($empty,10," "); //circulation happening location. not required
print str_pad($patronData[$key]["instid"], 30, " ",STR_PAD_RIGHT); //Institution id acts as a key for us.
print str_pad($empty, 11, " "); //SSN in US format. Not used .
print str_pad($patronData[$key]["statCat"], 3, " ", STR_PAD_RIGHT); // Statistical Category. Defined in SYSADMIN
print str_pad($empty, 27, " "); //Rest of the statcats, we don't use.
print str_pad($nameType, 1, " "); //1=personal 2=institutional
print str_pad($patronData[$key]["surname"], 30, " ", STR_PAD_RIGHT); //patron surname
print str_pad($patronData[$key]["firstname"], 20, " ", STR_PAD_RIGHT); //patron fist name
print str_pad($middleName, 20, " ",STR_PAD_RIGHT); // patron middle name
print str_pad($title,10," ",STR_PAD_RIGHT); // patron title
//print str_pad($empty, 7, "0");
//print (146);
//print str_pad($empty, 9, "0");
//print (4);
//print str_pad($empty, 28, "0");
//print (11);
//print str_pad($empty, 15, "0");
print str_pad($empty, 65,"0"); //transaction counters. These are empty for new patrons.
print str_pad($addressCount, 1, " "); //next lines are for address. first is mailing address
print str_pad($addressID, 10, "0",STR_PAD_RIGHT);
print str_pad($addressType, 1, " ");
print str_pad($addressStatus, 1, " ");
print str_pad($addressBegin,10," ");
print str_pad($addressEnd,10," ");
print str_pad($patronData[$key]["street"],50," ",STR_PAD_RIGHT);
print str_pad($empty,160," ");
print str_pad($patronData[$key]["city"], 40, " ",STR_PAD_RIGHT);
print str_pad($empty,7, " ");
print str_pad($patronData[$key]["zip"],10, " ",STR_PAD_RIGHT);
print str_pad($country,20, " ",STR_PAD_RIGHT);
print str_pad($phone,25," ",STR_PAD_RIGHT);
// Note that primary phone is - and mobi▒le phone is actual number
// this is not defined here yet.
print str_pad($empty,75," ");
print str_pad($dateAdded,10," ");
print str_pad($addressID2, 10, "0",STR_PAD_RIGHT);
print str_pad($addressType2,1, " "); //second one is e-mail address.
print str_pad($addressStatus, 1, " ");
print str_pad($addressBegin2,10," ");
print str_pad($addressEnd2,10," ");
print str_pad($patronData[$key]["email"],50, " ");
print str_pad($empty,337, " ");
print str_pad($voyagerUpdated,10," ");
//print '\n;
// print str_pad($input, 40, "0", STR_PAD_LEFT);
}
};




// Load CSV file

//CSV File validation (count columns?)

//Possible datacheck for CSV (column data format check?).
//This is not necessary but for future development

//Read CSV file in to variables

//print CSV + config + default values into SIF.
//use voyager_sif_definitions to get value help.

//write SIF into a file
// get next csv line
// continue until end is nigh


//  main program
//    showUsage();
    echo '
SifImporter
===========    
';
    $config=readConfig();
    $patronGroup=$config[0];
    $statCat=$config[1];
    $purgeDate=$config[2];

echo $patronGroup;

    $files = parseCL();
    $inputFile=$files[0];
    $outputFile=$files[1];
    $logFile=$files[2];
echo $patronGroup;

$patron=importCSV($inputFile,$patronGroup,$statCat,$purgeDate);
writeSIF($patron,$outputFile,$logFile);
// importCSV();
// writeSIF();
// var_dump($patron);

$myfile=fopen ("test.txt","w");

fclose($myfile);
?>
