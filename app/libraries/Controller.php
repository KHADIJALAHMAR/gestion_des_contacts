<?php 
/* 
*Base Controller
*loads models and views
*/

class Controller {
    // load model
    protected function model($model) {
        // Require model file
        require_once '../app/models/' .$model . '.php';
        // instatiate model 
        return new $model();
    }

    // load view 
    protected function view($view, $data = []) {
        // check for view file 
        if (file_exists('../app/views/' .$view . '.php')) {
            require_once '../app/views/' .$view . '.php';
        } else {
            //  view does not exist
            die("view doesnt exist");
        }
    }
}