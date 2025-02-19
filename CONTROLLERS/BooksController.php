<?php
    namespace Controllers;

    class BooksController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view, $model);
        }

        public function index(){
            $this->view->render('books');
        }
    }

?>