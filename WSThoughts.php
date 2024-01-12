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

$sql = "SELECT * FROM eThoughts FOR JSON AUTO";
$stmt = sqlsrv_query($conn, $sql);
if(sqlsrv_fetch($stmt) === false)
{
    echo "couldn't fetch data";
}

$json = '';
while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_BOTH)) {
    $json = $row[0];
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
echo $json;
echo "Connection closed";
?>