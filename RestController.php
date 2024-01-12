<?php

require_once ("MobileRestHandler.php");

$view = "";
if (isset($_GET["view"]))
    $view = $_GET["view"];
/*
 * controls the RESTful services
 * URL mapping
 */
switch (trim($view)) {

    case "all":
        // to handle REST Url /mobile/list/
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getAllMobiles();
        break;

    case "single":
        // to handle REST Url /mobile/show/<id>/
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getMobile($_GET["id"]);
        break;

    case "":
        echo "EMPTY";
        // 404 - not found;
        break;

    default:
        echo "NOTHING HAPPENING HERE, ";
        echo $view;
}
?>
