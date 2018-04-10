<?php

@include './db/dbConnection.php';

//contentModel will be included acurding to GET/control/dist in its controlclass ex. contentControl.
class contentModel extends dbConnection {

    //private $DBConn;

    public function __construct() {
        parent::__construct();
    }

    public function getData(int $id = 0) {// To retrive the data from the database.
        if ($id > 0) {// so the calling from update method
            //Using methods to help avoiding SQL-Injection 
            $stmt = $this->DBConn->prepare("select * from content where id = ?");
            $stmt->bind_param('i', $id); // 'i' means the variable type is 'int'.
            $stmt->execute();
            $res = $stmt->get_result();
        } elseif ($id == 0) {// so the calling from home method
            $stmt = $this->DBConn->prepare("select * from content ");
            $stmt->execute();
            $res = $stmt->get_result(); // save the results in res parameter.
        }

        $i = 0;
        while ($row[$i] = $res->fetch_assoc()) {
            $i++;
        }

        return $row; // return the data in array $row.
    }

    public function setData(string $title, string $details) {
        //$this->DBConn->query("INSERT INTO `content` (`id`, `title`, `details`) VALUES (NULL, '" . $title . "', '" . $details . "');");
        $stmt = $this->DBConn->prepare("INSERT INTO content (id, title, details) VALUES (NULL, ? , ?)");
        $stmt->bind_param('ss', $title, $details);
        $stmt->execute();

        header("Location: index.php?control=content&dist=home"); // Redirect browser to home page.
        exit(); //stop any respond if any failure occurred before this.
    }

    public function updateData(int $id, string $title = "", string $details = "") {


        $stmt = $this->DBConn->prepare("UPDATE content SET title = ? , details = ? WHERE id = ? ");
        $stmt->bind_param('ssi', $title, $details, $id); // 'i' means the variable type is 'int' and // 's' means 'the variable type is 'String'
        $stmt->execute();


        header("Location: index.php?control=content&dist=home"); // Redirect browser to home page.
        exit(); //stop any respond if any failure occurred before this.
    }

    public function deleteData(int $id) {//Delete record from the database.
        $stmt = $this->DBConn->prepare("DELETE FROM content WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        header("Location: index.php?control=content&dist=home"); // Redirect browser to home page.
        exit(); //stop any respond if any failure occurred before this.
    }

}
