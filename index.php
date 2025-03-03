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
            case "":
                return "Seja Bem-vindo ao Nosso site. Faça uma reserva e Aproveite! | Roro's Hotel";
            break;

            case "home":
                return "Seja Bem-vindo ao Nosso site. Faça uma reserva e Aproveite! | Roro's Hotel";
            break;

            case 'rooms':
                return "Encontre o hotel perfeito para sua estadia. Conforto e localização ideal para você! | Roro's Hotel";
            break;

            case 'register':
                return "Crie sua conta e tenha acesso a ofertas exclusivas e muito mais! | Roro's Hotel";
            break;

            case 'login':
                return "Entre na sua conta para acessar suas reservas e preferências. | Roro's Hotel";
            break;

            case "aboutUs":
                return "Sobre nós - Conheça Nossa História e Nossa Missão | Roro's Hotel";
            break;

            case "userPage":
                return "Início - Bem-vindo de volta à sua conta! | Roro's Hotel";
            break;

            case "savedHotels":
                return "Hotéis Salvos - Confira suas opções favoritas | Roro's Hotel";
            break;

            case "books":
                return "Minhas Reservas - Suas reservas passadas e futuras | Roro's Hotel";
            break;

            default:
                return "Página Não Encontrada - Oops! Não encontramos o que você procurou. | Roro's Hotel";
            break;
        }
    }

    function chooseCSSForPage(){
        $url = explode("/", $_GET['url'])[0];

        switch ($url) {
            case 'rooms':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.rooms.css" />';
            break;

            case 'login':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.register.css" />';
            break;

            case 'register':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.register.css" />';
            break;

            case 'aboutUs':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.aboutus.css" />';
            break;

            case 'hospedagem':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.hospedagem.css" />
                    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
                ';
            break;

            case 'userPage':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.userPage.css" />';
            break;

            case 'savedHotels':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.userPage.css" />
                        <link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.savedHotels.css" />
                ';
            break;

            case 'books':
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.userPage.css" />
                     <link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.books.css" />
                ';
            break;

            default:
                return '<link rel="stylesheet" href="'.PATH_INTERATIONS.'css/style.error-page.css" />';
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
                return '
                    <script defer src="'.PATH_INTERATIONS.'js/func.aboutUs.js"></script>
                    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                    <script> AOS.init(); </script>
                ';
                break;

            case 'hospedagem':
                return '
                    <script defer src="'.PATH_INTERATIONS.'js/func.hospedagem.js"></script>
                    <script defer src="'.PATH_INTERATIONS.'js/ajax.hospedagem.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                ';
                break;

            case "books":
                return '
                    <script defer src="'. PATH_INTERATIONS .'js/func.userPatnerPage.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script defer src="'. PATH_INTERATIONS .'js/ajax.books.js"></script>
                    <script defer src="'.PATH_INTERATIONS .'js/func.userPage.js"></script>
                ';
                break;

            case "userPage":
                return '
                    <script defer src="'.PATH_INTERATIONS .'js/func.userPatnerPage.js"></script>
                    <script defer src="'.PATH_INTERATIONS .'js/func.userPage.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                ';
                break;

            case "savedHotels":
                return '
                    <script defer src="'.PATH_INTERATIONS.'js/func.userPatnerPage.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script defer src="'.PATH_INTERATIONS.'js/ajax.savedHotels.js"></script>
                    <script defer src="'.PATH_INTERATIONS .'js/func.userPage.js"></script>
                ';
                break;
            
            default:
                break;
        };
    }

    function setCookieUser (){
        if(isset($_COOKIE['cookie-user'])){
            return 'style="display:none;"';
        }else{
            if(isset($_POST['cookie'])){
                if($_POST['cookie'] === 'selected'){
                    // USUÁRIO PERMITE O USO DE COOKIES
                    setcookie('cookie-user', 'selected', time() + (60*60*24*3));
                    return 'style="display:none;"';
                }else if($_POST['cookie'] === 'decline'){
                    // USUÁRIO NÃO QUER O USO DE COOKIES
                    return 'style="display:none;"';
                }
            }
        }    
    }

    define('PATH_INTERATIONS', 'http://localhost/hotel/Views/assets/');
    define('PATH_PAGES', 'http://localhost/hotel/');

    $app = new Application();
    $app->run();

    ob_end_flush();
?>