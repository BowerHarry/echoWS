<?php

class WSFriendship {

    function __construct($proc, $conn) {
        switch($proc) {
            case "FriendshipSelect":
                FriendshipSelect($conn);
                break;
            default:
                echo "Procedure";
                echo $proc;
                echo " does not exist."; 
        }
    }

    function FriendshipSelect($conn) {
        echo "FriendshipSelect";
        $sql = "SELECT * FROM rFriendships";
        $stmt = sqlsrv_query($conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>