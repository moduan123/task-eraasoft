<?php
$File = "users.txt";   // I assume your file has 57th and 65th line
$fhandle = fopen($File, 'r'); 
while(!feof($fhandle)) // until end of file
{
    $data[] = fgets($fhandle);  // place each line to array
    //Do whatever you want with the data in here
    //This feeds the file into an array line by line
}
fclose($fhandle);
echo "<pre>"; // makes output easier to read

list($kay,$valuname) = explode(':',$data[0]);
list($kay1,$valuemail) = explode(':',$data[1]);
list($kay2,$valuphona) = explode(':',$data[2]);
list($kay3,$valumass) = explode(':',$data[3]);


// print_r($valuname);
// print_r($valuemail);
// print_r($valuphona);
// print_r($valumass); // outputs 57th and 65th line


?>