<?php
    namespace Controllers;

    class SavedHotelsController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view, $model);
        }

        public function index(){
            $this->view->render('savedHotels');
        }
    }

?>