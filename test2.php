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
$addressCount="1";
$addressType="1"; //permanent
$addressStatus="n"; //normal
$addressBegin="2002.01.18";
$addressEnd="2100.01.01";
$streetAddress="Main street 11";
$city="Springfield";
$zipCode="90210";
$country="United States";
$phone="040-12314555";
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
print str_pad($addressCount, 1, " ");
print str_pad($barcode, 10, " ");
print str_pad($addressType, 1, " ");
print str_pad($addressStatus, 1, " ");
print str_pad($addressBegin,10," ");
print str_pad($addressEnd,10," ");
print str_pad($streetAddress,50," ",STR_PAD_RIGHT);
print str_pad($barcode,160," ");
print str_pad($city, 40, " ",STR_PAD_RIGHT);
print str_pad($barcode,7, " ");
print str_pad($zipCode,10, " ",STR_PAD_RIGHT);
print str_pad($country,20, " ",STR_PAD_RIGHT);
print str_pad($phone,25," ",STR_PAD_RIGHT);
print str_pad($barcode,85," ");
print "\n";

// print str_pad($input, 40, "0", STR_PAD_LEFT); 
?>
