<?php
    namespace Views;

    abstract class View{
        const DEFAULT_HEADER = "header.php";
        const DEFAULT_FOOTER = "footer.php";

        public function render($body, $header = null, $footer = null){
            if(@$_GET['url'] == '' || @$_GET['url'] == 'Home' || @$_GET['url'] == 'home'){
                // PÁGINA HOME DO SITE
                include('pages/'.$body.'.php');

                if($footer == null)
                    include('pages-dft/'.self::DEFAULT_FOOTER);
            }else{
                // OUTRA PÁGINA QUE NECESSITA DE UM HEADER E UM FOOTER
                    if(@$_GET['url'] == "userPage/" || @$_GET['url'] == "savedHotels/" || @$_GET["url"] == "books/"){
                        if($header == null)
                            include('pages-dft/'.self::DEFAULT_HEADER);

                            include("pages-dft/asideUserPage.php");
                            include('pages/'.$body.'.php');
                    }else{
                        if($header == null)
                            include('pages-dft/'.self::DEFAULT_HEADER);

                            include('pages/'.$body.'.php');

                        if($footer == null)
                            include('pages-dft/'.self::DEFAULT_FOOTER);  
                    }
            }
        }
    }

?>