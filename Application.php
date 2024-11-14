<?php
    class Application{
        public function run(){
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url'])[0];
                $url = ucfirst($url);
                $class = "Controllers\\".$url."Controller";
            }else{
                $class = "Controllers\\HomeController";
                $url = "Home";
            }

            $view = "Views\\".$url."View";
            $model = "Model\\".$url."Model";

            $controller = new $class(new $view, new $model);
            $controller->index();    
            
        }
    }
?>