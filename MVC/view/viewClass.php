<?php

//ViewClass get the php view pages and the html pages ready to view in the browser. 
class ViewClass {

    public $arr = array(); // to send the parameters 

    public function show() {
        extract($this->arr);
        @include_once 'view/template/header.php'; //Template heaher page
        @include_once 'view/' . $_GET['control'] . '.' . $_GET['dist'] . 'View.html'; // the contact page acording to the parameters from  GET/control/dist
        @include_once 'view/template/footer.php'; //Template footer page
    }

    public function assign($name, $value) {//build the barameter array arr
        $this->arr[$name] = $value;
    }

    public function __destruct() {// On destruct Call show method
        $this->show();
    }

}
