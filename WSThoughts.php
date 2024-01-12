<?php

$serverName = "bathentrepreneurs.database.windows.net";

$connectionInfo = array("Database"=>"bathentrepreneurs", "UID"=> "harrybower","PWD"=> "hA3LLL!aBY8-sR");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
    echo"Connection established. <br />";
} else {
    echo "Connection could not be established. <br />";
    die(print_r( sqlsrv_errors(), true));
}
?>