<?php

class WSThoughts {

    public $proc;
    public $conn;

    function __construct($proc, $conn) {
        $this->conn = $conn;
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
        //$sql = "SELECT * FROM eThoughts";
        $sql = "SELECT dbo.InitCap(u.Forename) + ' ' + dbo.InitCap(u.Surname) AS FullName, u.Username, t.Text, CAST(t.CreatedDateTime AS date) AS [Date] FROM eThoughts t JOIN eUser u ON t.eUserID = u.ID";
        $stmt = sqlsrv_query($this->conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>