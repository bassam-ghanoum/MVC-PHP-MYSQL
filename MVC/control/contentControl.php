<?php

include './view/viewClass.php';

//include the view class to be extended by contentControl Class.

class contentControl extends ViewClass {

    public $obj;

    public function __construct() {
        $controlModelName = $_GET['control'] . 'Model'; //Build the Model class name using "control" (Values have been tested in RouteClass).

        @include './model/' . $controlModelName . '.php'; // Include the file from model folder.

        $this->obj = new $controlModelName();
    }

    public function home() {// called in the routeClass /in the GET/dist 
        //Call assign method from the (supper) class ViewClass with Data that returnd from getData method  from contentModel.
        $this->assign("data", $this->obj->getData());
    }

    public function add() {
        
    }

    public function store() {// called in the routeClass /in the GET/dist 

        $tempTitle = "";// Temp barameter to test if the value in GET/title is valid
        $tempDetails = "";// Temp barameter to test if the value in GET/details is valid

        if (isset($_GET['title'])) {
            $tempTitle = htmlspecialchars($_GET['title']);
        }
        if (isset($_GET['details'])) {
            $tempDetails = htmlspecialchars($_GET['details']);
        }
        //Call setData method 
        $this->obj->setData($tempTitle, $tempDetails);
    }

    public function edit() {// called in the routeClass /in the GET/dist 
        //Call assign method from the (supper) class ViewClass with Data that returnd from getData method  from contentModel.
        $this->assign("data", $this->obj->getData((int) $_GET['id']));
    }

    public function update() {// called in the routeClass /in the GET/dist 

        $tempId = (int) $_GET['id'];// recive GET/id as integer.
        $tempTitle = "";// Temp barameter to test if the value in GET/title is valid
        $tempDetails = "";// Temp barameter to test if the value in GET/details is valid

        if (isset($_GET['title'])) {
            $tempTitle = htmlspecialchars($_GET['title']);
        }
        if (isset($_GET['details'])) {
            $tempDetails = htmlspecialchars($_GET['details']);
        }
        //Call updateData method to update record in the Database.
        $this->obj->updateData($tempId, $tempTitle, $tempDetails);
    }

    public function delete() {// called in the routeClass /in the GET/dist 
        $tempId = (int) $_GET['id'];// recive GET/id as integer.
        $this->obj->deleteData($tempId);//Call deleteData method.
    }

}
