<?php

class dbConnection {

    protected $DBConn;

    protected function __construct() {
        include './conf/conf.php'; // include Database configration.
        $this->DBConn = new mysqli($host, $user, $pass, $dbName); // connect to the database.
    }

}
