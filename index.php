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

    function changeNameWithAPage(){
        $url = explode("/", $_GET["url"])[0];

        switch ($url) {
            case 'rooms':
                return "Encontre o hotel perfeito para sua estadia. Conforto e localização ideal para você! | Roro's Hotel";
            break;

            case 'register':
                return "Crie sua conta e tenha acesso a ofertas exclusivas e muito mais! | Roro's Hotel";
            break;

            case 'login':
                return "Entre na sua conta para acessar suas reservas e preferências. | Roro's Hotel";
            break;
            
            default:
                return "Seja Bem-vindo ao Nosso site. Faça uma reserva e Aproveite! | Roro's Hotel";
                break;
        }
    }

    function chooseCSSForPage(){
        $url = explode("/", $_GET['url'])[0];

        switch ($url) {
            case 'rooms':
                return PATH_INTERATIONS."css/style.rooms.css";
            break;

            case 'login':
                return PATH_INTERATIONS."css/style.register.css";
            break;

            case 'register':
                return PATH_INTERATIONS."css/style.register.css";
            break;

            case 'aboutUs':
                return PATH_INTERATIONS."css/style.aboutus.css";
            break;

            case 'hospedagem':
                return PATH_INTERATIONS."css/style.hospedagem.css";
            break;

            default:

            break;
        }
    }

    define('PATH_INTERATIONS', 'http://localhost/hotel/Views/assets/');
    define('PATH_PAGES', 'http://localhost/hotel/');

    $app = new Application();
    $app->run();

    ob_end_flush();
?>