<?php

class WSUser {

    public $proc;
    public $conn;

    function __construct($proc, $conn, $args) {
        $this->conn = $conn;
        switch($proc) {
            case "UserSelect":
                $this->UserSelect();
                break;
            case "LoginCredentialCheck":
                $this->LoginCredentialCheck($args);
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

    function LoginCredentialCheck($args) {
        echo 'made it here';
        $username = $args->username;
        echo $username;
        $encodedPassword = $args->encodedPassword;
        echo $encodedPassword;
        $sql = 'EXEC LoginCredentialCheck '.$username.' '.$encodedPassword;
        echo $sql;
        $stmt = sqlsrv_query($this->conn, $sql);

        $rows = array();
        echo $rows[0];
        echo $rows[1];
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo $r;
            $rows[] = $r;
        }
        echo 'made it here';
        echo json_encode($rows);
    }

}

?>