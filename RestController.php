<?php

// Import classes
require_once ("WSThoughts.php");
require_once ("WSUser.php");
require_once ("WSFriendship.php");

// Handle URL arguments
if (isset($_GET["ws"]) and isset($_GET["proc"]))
{
    $ws = trim($_GET["ws"]);
    $proc = trim($_GET["proc"]);
} else {
    echo "WS and PROCEDURE not defined";
    die();
}

// Database connection
$serverName = "bathentrepreneurs.database.windows.net";

$connectionInfo = array("Database"=>"bathentrepreneurs", "UID"=> "harrybower","PWD"=> "hA3LLL!aBY8-sR");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
    //echo"Connection established.";
} else {
    echo "Connection could not be established.";
    die(print_r( sqlsrv_errors(), true));
}


// Decides which constructor to call
switch ($ws) {

    case "thoughts":
        $wsThoughts = new WSThoughts($proc, $conn);
        break;

    case "user":
        $wsUser = new WSUser($proc, $conn);
        break;

    case "friendship":
        $wsFriendship = new WSFriendship($proc, $conn);
        break;

    default:
        echo "WS";
        echo $ws;
        echo " does not exist.";
}
?>
