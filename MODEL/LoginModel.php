<?php
    namespace Model;

    class LoginModel extends Model{
        public function signInUser(){
            $user = strip_tags($_POST['username']);
            $pw = strip_tags($_POST['password']);
            $control = true;

            $collection = parent::connectionDB()->countrys->selectCollection('users');
            $userVerify = $collection->find();

            foreach ($userVerify as $key => $value) {
                if($value["Meios_contato"]["Email"] == $user && $value["Senha"] == md5($pw)){
                    $control = true;
                    $_SESSION['id_user'] = $value["_id"];
                }else
                    $control = false;
            }

            return ($control) ? true : false;
        }
    }

?>