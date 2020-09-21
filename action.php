<?php
include_once 'database.php';

$db = new Database();
	
if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Opened database successfully \n";
}



$db->close();

?>