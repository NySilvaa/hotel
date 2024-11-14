<?php

    $autoload = function($class){
        $class = str_replace('\\','/', $class);

        if(file_exists($class.".php"))
            require_once($class.".php");
    };

    spl_autoload_register($autoload);

    define('PATH_INTERATIONS', 'http://localhost/hotel/Views/assets/');

    $app = new Application();
    $app->run();

?>