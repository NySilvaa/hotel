<?php
    ob_start();
    session_start();
    $autoload = function($class){
        $class = str_replace('\\','/', $class);

        if(file_exists($class.".php"))
            require_once($class.".php");
    };

    spl_autoload_register($autoload);

    date_default_timezone_set("America/Sao_Paulo");

    function recoverPost($post){
        if(isset($_POST[$post]))
            return $_POST[$post];
    }

    define('PATH_INTERATIONS', 'http://localhost/hotel/Views/assets/');
    define('PATH_PAGES', 'http://localhost/hotel/');

    $app = new Application();
    $app->run();

    ob_end_flush();
?>