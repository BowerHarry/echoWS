<?php

class WSThoughts {

    public $proc;
    public $conn;

    function __construct($proc, $conn) {
        $this->conn = $conn;
        echo "WSThoughts";
        switch($proc) {
            case "ThoughtSelect":
                $this->ThoughtSelect();
                break;
            default:
                echo "Procedure";
                echo $proc;
                echo " does not exist."; 
        }
    }

    function ThoughtSelect() {
        $sql = "SELECT * FROM eThoughts";
        $stmt = sqlsrv_query($this->conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>