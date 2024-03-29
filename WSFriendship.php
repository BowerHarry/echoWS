<?php

class WSFriendship {

    public $proc;
    public $conn;
    public $args;

    function __construct($proc, $conn, $args) {
        $this->conn = $conn;
        switch($proc) {
            case "FriendshipSelect":
                $this->FriendshipSelect();
                break;
            default:
                echo "Procedure";
                echo $proc;
                echo " does not exist."; 
        }
    }

    function FriendshipSelect() {
        $sql = "SELECT * FROM rFriendships";
        $stmt = sqlsrv_query($this->conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>