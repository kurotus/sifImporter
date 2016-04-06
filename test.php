<?php

require_once __DIR__.'/vendor/autoload.php'; // load composer

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

// the result comes into this variable
$temperature = array();

// set up lexer
$config = new LexerConfig();
$config->setDelimiter(";");
$config->setFlags(\SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_CSV);
$lexer = new Lexer($config);

// set up interpreter
$interpreter = new Interpreter();
$interpreter->addObserver(function(array $row) use (&$temperature) {
    $temperature[] = array(
        'lastName' 	=> $row[0],
        'firstName'    	=> $row[1],
	'instID'        => $row[2],
	'streetAdress'	=> $row[3],
	'postNumber'	=> $row[4],
	'city'		=> $row[5],
	'email'		=> $row[6],
    );
});

// parse
$lexer->parse('patron.csv', $interpreter);
//print_r($temperature);
var_dump($temperature);

?>