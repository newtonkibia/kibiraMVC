<?php
//load config
require_once 'config/config.php';

// load libraries

// require_once 'libraries/core.php';
// require_once 'libraries/controller.php';
// require_once 'libraries/database.php';

//Autoload Core liibraries

spl_autoload_register(function($classMame){
    require_once 'libraries/' . $classMame . '.php';
});