<?php
// sifImporter example.
// Reading patron info from CSV-file using Goodby CSV


require_once __DIR__.'/vendor/autoload.php'; // load composer
include './conf/voyager_sif_definitions.php'; // load SIF definitions for future use


use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

$patron = array();

$config = new LexerConfig();
$config->setDelimiter(",");
$lexer = new Lexer($config);

$interpreter = new Interpreter();
$interpreter->addObserver(function(array $row) use (&$patron) {
    $patron[] = array(
        'surname' => 	$row[0],
        'firstname' => 	$row[1],
	'instid' =>	$row[2],
	'street' =>	$row[3],
	'zip' =>	$row[4],
	'city' =>	$row[5],
	'email' =>	$row[6], 
    );
});

// lets load our CSV
// it has six columns as declared up
// no format checking whatsoever
$lexer->parse('export.csv', $interpreter);

//print ($patron[0]['firstname']);
//If we want to know how many rows we have in our data this is one way
//$number = count($patron);
//print ($number);
//But we only want to do stuff for each row. This is one way:

//Print each array row by row
foreach ($patron as $k => $v) {
print ($patron[$k]['firstname']."\n");
print ($patron[$k]['surname']."\n");
print ($patron[$k]['instid']."\n");
print ($patron[$k]['street']."\n");
print ($patron[$k]['zip']."\n");
print ($patron[$k]['city']."\n");
print ($patron[$k]['email']."\n");
}


?>

