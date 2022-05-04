<?php
/*
 * Base Controller
 * Loads the models and views
 */

 class Controller {
     // function to load model
     public function model($model){
        //Require model file
        require_once '../app/models/' . $model . '.php';

        // instantiate the model 

        return new $model();
     }

     public function view($view, $data = []){
        //   check for view file if it exists 
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            die('view does not exist');
        }
     }
 }