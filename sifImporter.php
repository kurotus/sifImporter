<?php
require_once __DIR__.'/vendor/autoload.php'; // load composer

use Goodby\CSV\Import\Standard\LexerConfig; // include CSV tools
include './conf/voyager_sif_definitions.php'; //include voager field definitions

function showUsage() {
    echo '
    sifImporter version 1.0
    =======================

    Usage - This is a command line utility to convert valid CSV files in Voyager SIF files
    valid parameters are -i -o -l
    -i      Input CSV file
    -o	    Output SIF file
    -a      Log file
    Examples:
    SIF2SISV2.php -i input.csv -o output.sif -l import.log

    ';
}

function readConfig() {
$configFile = "config.ini";

//Let's check configuration if file exists

if (file_exists($configFile)) {
    echo "The file $configFile exists\n";
} else {
    echo "    The file $configFile does not exist\n"; // some useful info
    die("    Error: configuraton file ($configFile) does not exist!\n"); //Die die die
}
$config = parse_ini_file($configFile, True);


// Use default values from config file.
// Add more if needed

// Ugly way to get variable from config file

$patronGroup = $config['default']['patronGroup'];
$statCat = $config['default']['statCat'];

// We need these variables so let's test if they are there
// Note that we don't check if values are valid
// These need to be the same as in Voyager SysAdmin

if ($patronGroup == "") {
   die("    patronGroup required. Exiting!\n");
} else {
   echo "    Patron Group defined as: ".$patronGroup."\n";
}
if ($statCat == "") {
   die("    Statistical category required. Exiting!\n");
} else {
   echo "    Statistical category defined as: ".$statCat."\n";
}

//CSV file exists?

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
}

//  main program
    showUsage();
    readConfig();
?>
