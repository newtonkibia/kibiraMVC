<?php

    class Pages extends Controller{
        public function __construct()
        {
            // echo 'Pages loaded';
            //  how to load models 
           
        }

        public function index(){
          
            $data = [
                'title' => 'Kibira MVC Framework',
                
            ];
            
           $this->view('pages/index', $data);
        }
        
        public function about(){
            $this->view('pages/about');
        }
    }