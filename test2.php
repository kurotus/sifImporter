<?php
$patronID ="";
$barcodeID ="";
$barcode ="";
$patronGroup="LaY OPI";
$barcodeStatus="1";
$instID="150179-xxxx";
$statCat="E";
$nameType="1";
$surName="Smith";
$firstName="John";
$middleName="Edward";
//$input = "2700012915";
print str_pad($patronID, 10, " ", STR_PAD_RIGHT);
print str_pad($barcodeID, 10, " ", STR_PAD_RIGHT);
print str_pad($barcode, 25, " ",STR_PAD_RIGHT);
print str_pad($patronGroup, 10, " ",STR_PAD_RIGHT);
print str_pad($barcodeStatus, 1," ");
print str_pad($barcode, 182, " ");
print str_pad($instID, 30, " ",STR_PAD_RIGHT);
print str_pad($barcode, 11, " ");
print str_pad($statCat, 3, " ", STR_PAD_RIGHT);
print str_pad($barcode, 27, " ");
print str_pad($nameType, 1, " ");
print str_pad($surName, 20, " ", STR_PAD_RIGHT);
print str_pad($firstName, 20, " ", STR_PAD_RIGHT);
print str_pad($middleName, 20, " ",STR_PAD_RIGHT);
print str_pad($barcode, 75, " ");

// print str_pad($input, 40, "0", STR_PAD_LEFT); 
?>
