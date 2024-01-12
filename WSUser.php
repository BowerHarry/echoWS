<?php

class WSUser {

    function __construct($proc, $conn) {
        echo "WSUser";
        switch($proc) {
            case "UserSelect":
                UserSelect($conn);
                break;
            default:
                echo "Procedure";
                echo $proc;
                echo " does not exist."; 
        }
    }

    function UserSelect($conn) {
        echo "UserSelect";
        $sql = "SELECT * FROM eUser";
        $stmt = sqlsrv_query($conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>