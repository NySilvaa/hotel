<?php
    class Application{
        public function run(){
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url'])[0];
                $url = ucfirst($url);
                $class = "CONTROLLERS\\".$url."Controller";
            }else{
                $class = "CONTROLLERS\\HomeController";
                $url = "Home";
            }

            $view = "VIEWS\\".$url."View";
            $model = "MODEL\\".$url."Model";

            $controller = new $class($view, $model);
            $controller->index();
        }
    }
?>