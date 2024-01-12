<?php

class WSUser {

    public $proc;
    public $conn;

    function __construct($proc, $conn) {
        $this->conn = $conn;
        echo "WSUser";

        switch($proc) {
            case "UserSelect":
                UserSelect();
                break;
            default:
                echo "Procedure";
                echo $proc;
                echo " does not exist."; 
        }
    }

    function UserSelect() {
        echo "UserSelect";
        $sql = "SELECT * FROM eUser";
        $stmt = sqlsrv_query($this->conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>