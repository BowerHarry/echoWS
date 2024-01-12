<?php

class WSUser {

    public $proc;
    public $conn;

    function __construct($proc, $conn) {
        $this->conn = $conn;
        switch($proc) {
            case "UserSelect":
                $this->UserSelect();
                break;
            default:
                echo "Procedure";
                echo $proc;
                echo " does not exist."; 
        }
    }

    function UserSelect() {
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