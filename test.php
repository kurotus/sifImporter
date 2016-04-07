<?php

require_once __DIR__.'/vendor/autoload.php'; // load composer
include './conf/voyager_sif_definitions.php';

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

// the result comes into this variable
$patron = array();

// set up lexer
$config = new LexerConfig();
$config->setDelimiter(";");
$config->setFlags(\SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_CSV);
$lexer = new Lexer($config);

// set up interpreter
$interpreter = new Interpreter();
$interpreter->addObserver(function(array $row) use (&$patron) {
    $patron[] = array(
        ['lastName' 	=> $row[0],10],
        ['firstName'    => $row[1],25],
	'instID'        => $row[2],
	'streetAdress'	=> $row[3],
	'postNumber'	=> $row[4],
	'city'		=> $row[5],
	'email'		=> $row[6],
    );
});



// parse
$lexer->parse('patron.csv', $interpreter);
var_dump($patron);
echo "lastname:".$patron[0][0]['lastName']."maxLength:".$patron[0][0][0];
//echo $baseRecordFields['patron_id'];
?>
