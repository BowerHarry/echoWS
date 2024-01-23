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
        $username = $args->username;
        $encodedPassword = $args->encodedPassword;
        $sql = "EXEC LoginCredentialCheck " + '$username' + ' ' + '$encodedPassword';
        $stmt = sqlsrv_query($this->conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>