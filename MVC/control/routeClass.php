<?php

//RouteClass  analyze the URL parameters and route to the right destination
class RouteClass {

    public function __construct() {
        //$className will determine the control class to include it.
        $className = filter_input(INPUT_GET, 'control', FILTER_SANITIZE_STRING);
        //$dist will determine the method in the control class to call it.
        $dist = filter_input(INPUT_GET, 'dist', FILTER_SANITIZE_STRING);
        $name = $className . "Control";
        @include $name . ".php"; // include the control class file.

        if (class_exists($name)) {// Test if the class exists then define $obj object of the class.
            $controlObj = new $name;
        } else {//If THe class is not exist go to the home page with the right parameters's values.
            header("Location: index.php?control=content&dist=home");
            die();
        }
        if (method_exists($controlObj, $dist)) {// Test if the Method exists then define call it.
            $controlObj->$dist();
        } else {//If THe class is not exist go to the home page with the right parameters's values.
            header("Location: index.php?control=content&dist=home");
            die();
        }
    }

}
