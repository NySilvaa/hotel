<?php
    namespace Controllers;

    class RoomsController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view, $model);
        }

        public function index(){
            $this->view->render('rooms');
        }
    }

?>