<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getQuotes();
echo json_encode($fetch);

