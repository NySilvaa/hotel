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

            if(!file_exists('Controllers/'.$url.'Controller.php')){
                $class = "Controllers\\ErrorPageController";
                $view = "Views\\ErrorPageView";
                $model = "Model\\ErrorPageModel";
            }

            $controller = new $class(new $view, new $model);
            $controller->index();    
            
        }
    }
?>