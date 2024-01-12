<?php

class WSTest {

    public $proc;
    public $conn;

    function __construct($sql, $conn) {
        $stmt = sqlsrv_query($conn, $sql);

        $rows = array();
        while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $r;
        }

        echo json_encode($rows);
    }

}

?>