<?php

require_once ("MobileRestHandler.php");

$view = "";
if (isset($_GET["view"]))
    $view = $_GET["view"];
/*
 * controls the RESTful services
 * URL mapping
 */
switch ($view) {

    case "all":
        // to handle REST Url /mobile/list/
        echo "GETTING ALL MOBILES";
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getAllMobiles();
        break;

    case "single":
        // to handle REST Url /mobile/show/<id>/
        echo "GETTING SOME MOBILES"
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getMobile($_GET["id"]);
        break;

    case "test";
        echo "I HEAR YOU";
        break;


    case "":
        echo "EMPTY";
        // 404 - not found;
        break;
}
?>
