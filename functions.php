<?php
require_once __DIR__.'/vendor/autoload.php'; // load composer
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig; // include CSV tools

function showUsage() {
    echo '
    sifImporter version 1.0
    =======================

    Usage - This is a command line utility to convert valid CSV files in Voyager SIF files
    valid parameters are -i -o -l
    -i      Input CSV file
    -o      Output SIF file
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
    echo "The file $configFile does not exist\n"; // some useful info
    die("Error: Input Data File ($configFile) does not exist!\n"); //Die die die
}
$config = parse_ini_file($configFile, True);


// Use default values from config file.
// Add more if needed

// Ugly way to get variable from config file

$patronGroup = $config['default']['patronGroup'];
$statCat = $config['default']['statCat'];
$purgeDate = $config['default']['purgeDate'];

// We need these variables so let's test if they are there
// Note that we don't check if values are valid
// These need to be the same as in Voyager SysAdmin

if ($patronGroup == "") {
   die("patronGroup required. Exiting!\n");
} else {
   echo "Patron Group defined as: ".$patronGroup."\n";
}
if ($statCat == "") {
   die("Statistical category required. Exiting!\n");
} else {
   echo "Statistical category defined as: ".$statCat."\n";
}
 if ($purgeDate == "") {
   die("Purge date required. Exiting!\n");
} else {
   echo "Purge date defined as: ".$purgeDate."\n";
}
return array($patronGroup, $statCat, $purgeDate);
};

function parseCL() {
// parse command line (input,output,log)
$options = getopt("i:o:l:");

// check if input file is defined

if (!isset($options['i']))  {
   showUsage();
   die ("Input file required \n");
} elseif (!file_exists($options['i'])) {  // check if input file is available
   showUsage();
   die ("Input file not found!\n");
} else {
   $inputFile = $options['i'];
   echo "Input file: "."$inputFile\n";
}
// check if output file is defined. else name one
if (!isset($options['o'])){
   $outputFile ="sif.".(date('o'."-".'m'."-".'d')).".sif";
   echo "Output file: "."$outputFile\n";
} else {
   $outputFile = $options['o'];
   echo "Output file: "."$outputFile\n";
}

// check if log file is defined. else name one.
if (!isset($options['l'])){
   $logFile ="log.".(date('o'."-".'m'."-".'d')).".log";
   echo "Log file: "."$logFile\n";
} else {
   $logFile = $options['l'];
   echo "Log file: "."$logFile\n";
}

return array($inputFile,$outputFile,$logFile);
}

function importCSV($inputFile,$patronGroup,$statCat,$purgeDate) {
   $patron = array();

   $config = new LexerConfig();
   $config->setDelimiter(",");
   $lexer = new Lexer($config);

   $interpreter = new Interpreter();
   $interpreter->addObserver(function(array $row) use (&$patron) {
    $patron[] = array(
        'surname' =>    $row[0],
        'firstname' =>  $row[1],
        'instid' =>     $row[2],
        'street' =>     $row[3],
        'zip' =>        $row[4],
        'city' =>       $row[5],
        'email' =>      $row[6],
    );
});

// lets load our CSV
// it has six columns as declared up
// no format checking whatsoever
   $lexer->parse($inputFile, $interpreter);

//print ($patron[0]['firstname']);
//If we want to know how many rows we have in our data this is one way
//$number = count($patron);
//print ($number);
//But we only want to do stuff for each row. This is one way:

//Print each array row by row
foreach ($patron as $key => $value)
{
$patron[$key]["patronGroup"]=$patronGroup;
$patron[$key]["statCat"]=$statCat;
$patron[$key]["purgeDate"]=$purgeDate;
};

return $patron;


};


?>
