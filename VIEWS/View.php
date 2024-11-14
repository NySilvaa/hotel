<?php
    namespace Views;

    abstract class View{
        const DEFAULT_HEADER = "header.php";
        const DEFAULT_FOOTER = "footer.php";

        public function render($body, $header = null, $footer = null){

            include('pages/'.$body.'.php');

            if($footer == null)
                include('pages-dft/'.self::DEFAULT_FOOTER);
        }
    }

?>