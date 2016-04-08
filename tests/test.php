<?php
// This doesn't do anything interesting. Here only for legacy reasons


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
'patron_id' => $row[0],
    'patron_barcode_id_1' => $row[0], 
    'patron_barcode_1' => $row[0],
    'patron_group_1' => $row[0],
    'barcode_status_1' => $row[0],
    'barcode_modified_date_1' => $row[0],
    'patron_barcode_id_2' => $row[0],
    'patron_barcode_2' => $row[0],
    'patron_group_2' => $row[0],
    'barcode_status_2' => $row[0],
    'barcode_modified_date_2' => $row[0],
    'patron_barcode_id_3' => $row[0],
    'patron_barcode_3' => $row[0],
    'patron_group_3' => $row[0],
    'barcode_status_3' => $row[0],
    'barcode_modified_date_3' => $row[0],
    'registration_date' => $row[0],
    'patron_expiration_date' => $row[0],
    'patron_purge_date' => $row[0],
    'voyager_date' => $row[0],
    'voyager_updated' => $row[0],
    'circulation_happening_location_code' => $row[0],
    'institution_id' => $row[0],
    'ssn' => $row[0],
    'statistical_category_1' => $row[0],
    'statistical_category_2' => $row[0],
    'statistical_category_3' => $row[0],
    'statistical_category_4' => $row[0],
    'statistical_category_5' => $row[0],
    'statistical_category_6' => $row[0],
    'statistical_category_7' => $row[0],
    'statistical_category_8' => $row[0],
    'statistical_category_9' => $row[0],
    'statistical_category_10' => $row[0],
    'name_type' => $row[0],
    'surname' => $row[0],
    'first_name' => $row[0],
    'middle_name' => $row[0],
    'title' => $row[0],
    'historical_charges' => $row[0],
    'claims_returned_count' => $row[0],
    'self_shelved_count' => $row[0],
    'lost_items_count' => $row[0],
    'late_media_returns' => $row[0],
    'historical_bookings' => $row[0],
    'canceled_bookings' => $row[0],
    'unclaimed_bookings' => $row[0],
    'historical_callslips' => $row[0],
    'historical_distributions' => $row[0],
    'historical_shortloans' => $row[0],
    'unclaimed_shortloans' => $row[0],

// Address record definitions
 'address_id' => $row[0],
    'address_type' => $row[0],
    'address_status_code' => $row[0],
    'address_begin_date' => $row[0],
    'address_end_date' => $row[0],
    'address_line_1' => $row[0],
    'address_line_2' => $row[0],
    'address_line_3' => $row[0],
    'address_line_4' => $row[0],
    'address_line_5' => $row[0],
    'city' => $row[0],
    'state_code' => $row[0],
    'zipcode' => $row[0],
    'country' => $row[0],
    'phone_primary' => $row[0],
    'phone_mobile' => $row[0],
    'phone_fax' => $row[0],
    'phone_other' => $row[0],
    'date_added' => $row[0],



    );
});



// parse
$lexer->parse('patron.csv', $interpreter);
var_dump($patron);
//echo "lastname:".$patron[0][0]['lastName']."maxLength:".$patron[0][0][0];
//echo $baseRecordFields['patron_id'];
//echo $baseRecordFields['barcode_status_1'];
?>
