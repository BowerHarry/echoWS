<?php

class WSThoughts {

    function __construct($proc, $conn) {
        switch($proc) {
            case "ThoughtSelect":
                ThoughtSelect($conn);
                break;
            default:
                echo "Procedure";
                echo $proc;
                echo " does not exist."; 
        }
    }

    function ThoughtSelect($conn) {
        echo "ThoughtSelect";
        $sql = "SELECT * FROM eThoughts";
        $stmt = sqlsrv_query($conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>