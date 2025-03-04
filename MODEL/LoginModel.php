<?php
    namespace Model;
    use Model\HomeModel;

    class LoginModel extends Model{
        public function signInUser(){
            $user = strip_tags($_POST['username']);
            $pw = strip_tags($_POST['password']);
            $control = true;

            if($user == "" || $pw == ""){
                $homeModel = new HomeModel();
                $homeModel->messageBook("error", "Valores vazios", "Tente preencher todos os campos");
                $control = false;
            }else{
                $collection = parent::connectionDB()->countrys->selectCollection('users');
                $userVerify = $collection->find();
    
                foreach ($userVerify as $value) {
                    if(($value["Meios_contato"]["Email"] == $user) && ($value["Senha"] == md5($pw))){
                        $_SESSION['id_user'] = $value["_id"];

                        if(isset($_POST["remember-me"]) && $_POST["remember-me"] == "on")
                            setcookie("id_user", $value["_id"], time() + (60* 60 * 24 * 3), "/", "", true, true);
                    }else
                        $control = false;
                }

                unset($_SESSION["favoritePageRooms"]);
                unset($_SESSION["bookPendent"]);
            }

            return ($control) ? true : false;
        }
    }

?>