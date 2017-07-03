<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getQuoteRefs();
echo json_encode($fetch);

