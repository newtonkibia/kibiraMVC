<?php

/*
* this file is the App Core Class
* Its used to create URL and load core controller
* the URl format will be - /controller/method/params
*/

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    // this function will fetch the URL
    public function __construct()
    {
        // this will print the array generated from the fuction getUrl
        // print_r($this->getUrl());

        $url = $this->getUrl();

        // this will look in controllers for first value
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // if file exists the we set it as controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);

        }
        // Require the controller
        require_once '../app/controllers/'. $this->currentController
. '.php';

// instantiate the controller class

        $this->currentController = new $this->currentController;

        //check for second part of the array url
        if (isset($url[1])) {
        // check to see of the method/function exists in ths controller class
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get parameters (params)
        $this->params = $url ? array_values($url) : [];
        
        //call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
       

        
}
    public function getUrl(){
       if(isset($_GET['url'])){
           // remove forward slash in a url
           $url = rtrim($_GET['url'], '/');
           // remove characters that are not include in a URL
           $url = filter_var($url, FILTER_SANITIZE_URL);
        //    break the url into arrays 
        $url = explode('/', $url);

        return $url;

       } 
    }
}