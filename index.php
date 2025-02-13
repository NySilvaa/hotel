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
                return PATH_INTERATIONS."css/style.error-page.css";
            break;
        }
    }

    function chooseJSForPage(){
        $url = explode("/", @$_GET['url'])[0];

        switch ($url) {
            case '':
                return '
                   <script defer src="'.PATH_INTERATIONS.'js/ajax.home.js"></script>
                    <script defer src="'.PATH_INTERATIONS.'js/func.home.js"></script>
                      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                      <script> AOS.init(); </script>
                ';
                break;

            case 'home':
                return '
                    <script defer src="'.PATH_INTERATIONS.'js/ajax.home.js"></script>
                    <script defer src="'.PATH_INTERATIONS.'js/func.home.js"></script>
                    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                      <script> AOS.init(); </script>
                ';
                break;

            case 'rooms':
                return '
                    <script defer src="'.PATH_INTERATIONS.'js/func.rooms.js"></script>
                    <script defer src="'.PATH_INTERATIONS.'js/ajax.rooms.js"></script>
                ';
                break;

            case 'register':
                return '
                     <script defer src="'.PATH_INTERATIONS.'js/func.register.js"></script>
                    <script defer src="'.PATH_INTERATIONS.'js/ajax.register.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                ';
                break;

            case 'login':
                return '<script defer src="'.PATH_INTERATIONS.'js/func.login.js"></script>';
                break;

            case 'aboutUs':
                return '<script defer src="'.PATH_INTERATIONS.'js/func.aboutUs.js"></script>
                            <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                            <script> AOS.init(); </script>
                ';
                break;

            case 'hospedagem':
                return '
                    <script defer src="'.PATH_INTERATIONS.'js/func.hospedagem.js"></script>
                    <script defer src="'.PATH_INTERATIONS.'js/ajax.hospedagem.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
                ';
                break;
            
            default:
                # code...
                break;
        };
    }

    define('PATH_INTERATIONS', 'http://localhost/hotel/Views/assets/');
    define('PATH_PAGES', 'http://localhost/hotel/');

    $app = new Application();
    $app->run();

    ob_end_flush();
?>