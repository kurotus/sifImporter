<?php
// Let's try to build a valid SIF file from scratch 
// This is hand crafted, artisam SIF building y'all
// This is the Base (Fixed) Segment of Record
include './conf/voyager_sif_definitions.php';


// Define our patron information
// Has more fields than required
// See Voyager Technical manual for more information
$patronID ="38479";
$barcodeID ="56188";
$barcode ="1010101010";
$empty ="";
$patronGroup="esitt";
$barcodeStatus="1";
$barcodeModified="2012.12.05";
$patronExpire="2382.12.31";
$patronPurge="2020.10.10";
$voyagerDate="2010.05.26";
$voyagerUpdated="2014.11.07";
$instID="7777777777juhani";
$statCat="U";
$nameType="1";
$surName="Joutava";
$firstName="Juhani";
$middleName="J";
$title="testi";
$addressCount="2";
$addressID="74320";
$addressType="1"; //permanent
$addressStatus="N"; //normal
$addressBegin="2016.04.06";
$addressEnd="2382.12.31";
$streetAddress="PL 8123";
$city="ROVANIEMI";
$zipCode="96101";
$country="";
$phone="123";
$email="library@acme.com";
$dateAdded="2014.11.07";
$addressID2="125680";
$addressType2="3";
$addressBegin2="2002.08.29";
$addressEnd2="2020.10.10";

//Let's print our patron record in sif

print str_pad($patronID, 10, "0", STR_PAD_LEFT); //zero padded
print str_pad($barcodeID, 10, "0", STR_PAD_LEFT); 
print str_pad($barcode, 25, " ",STR_PAD_RIGHT);
print str_pad($patronGroup, 10, " ",STR_PAD_RIGHT);
print str_pad($barcodeStatus, 1," ");
print str_pad($barcodeModified, 10, " ",STR_PAD_RIGHT);
print str_pad($empty, 122, " ");
print str_pad($patronExpire,10," ");
print str_pad($patronPurge,10," ");
print str_pad($voyagerDate,10," ");
print str_pad($voyagerUpdated,10," ");
print str_pad($empty,10," ");
print str_pad($instID, 30, " ",STR_PAD_RIGHT);
print str_pad($empty, 11, " ");
print str_pad($statCat, 3, " ", STR_PAD_RIGHT);
print str_pad($empty, 27, " ");
print str_pad($nameType, 1, " ");
print str_pad($surName, 30, " ", STR_PAD_RIGHT);
print str_pad($firstName, 20, " ", STR_PAD_RIGHT);
print str_pad($middleName, 20, " ",STR_PAD_RIGHT);
print str_pad($title,10," ",STR_PAD_RIGHT);
//print str_pad($empty, 7, "0");
//print (146);
//print str_pad($empty, 9, "0");
//print (4);
//print str_pad($empty, 28, "0");
//print (11);
//print str_pad($empty, 15, "0");
print str_pad($empty, 45,"0");
print str_pad($addressCount, 1, " ");
print str_pad($addressID, 10, "0",STR_PAD_RIGHT);
print str_pad($addressType, 1, " ");
print str_pad($addressStatus, 1, " ");
print str_pad($addressBegin,10," ");
print str_pad($addressEnd,10," ");
print str_pad($streetAddress,50," ",STR_PAD_RIGHT);
print str_pad($empty,160," ");
print str_pad($city, 40, " ",STR_PAD_RIGHT);
print str_pad($empty,7, " ");
print str_pad($zipCode,10, " ",STR_PAD_RIGHT);
print str_pad($country,20, " ",STR_PAD_RIGHT);
print str_pad($phone,25," ",STR_PAD_RIGHT);
print str_pad($empty,75," ");
print str_pad($dateAdded,10," ");
print str_pad($addressID2, 10, "0",STR_PAD_RIGHT);
print str_pad($addressType2,1, " ");
print str_pad($addressStatus, 1, " ");
print str_pad($addressBegin2,10," ");
print str_pad($addressEnd2,10," ");
print str_pad($email,50, " ");
print str_pad($empty,337, " ");
print str_pad($voyagerUpdated,10," ");
//print '\n;
// print str_pad($input, 40, "0", STR_PAD_LEFT); 
?>
