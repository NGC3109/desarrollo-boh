<?php

$db2 = pdoConnect();



$query0="SELECT * FROM members";
$stmt0= $db2->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}





?>



