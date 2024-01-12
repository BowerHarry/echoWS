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

$sql = "SELECT * FROM eThoughts";
$stmt = sqlsrv_query($conn, $sql);
if(sqlsrv_fetch($stmt) === false)
{
    echo "couldn't fetch data";
}

$res = [];
while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
    $res[] = $row;
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
echo json_encode(['data' => $res]);
echo "Connection closed";
?>