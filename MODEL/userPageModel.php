<?php
    namespace Model;

    class userPageModel extends Model{
        public function logoutUser(){
            if(isset($_GET["logout"])){
                session_destroy();
                setcookie("id_user", "", [
                    "expires" => -1
                ]);
                header("Location: ".PATH_PAGES."login/");
                die();
            }
        }

        public function getInfoUser(){
            if(isset($_SESSION['id_user'])){
                $idUser = $_SESSION["id_user"];
                $controller = parent::connectionDB();
                $collection = $controller->countrys->selectCollection("users");

                $cursor = $collection->find(["_id" => $idUser]);
                $data = [];
                $endereco = [];
                $contact = [];

                foreach ($cursor as $value) {
                    $endereco[] = [$value["Endereco"]["CEP"], $value["Endereco"]["UF"], $value["Endereco"]["Logradouro"], $value["Endereco"]["Number House"], $value["Endereco"]["Cidade"], $value["Endereco"]["Complemento"]];
                    $contact[] = [$value["Meios_contato"]["Email"], $value["Meios_contato"]["Phone"]];

                    $data[] = [$value["Name"], $value["CPF"], $value["RG"], $value["Data de Nascimento"], $value["Genero"], $endereco, $contact];
                }

                return $data;
            }else if(isset($_COOKIE["id_user"])){
                $idUser =  strip_tags($_COOKIE["id_user"]);
                $controller = parent::connectionDB();
                $collection = $controller->countrys->selectCollection("users");

                $cursor = $collection->find();
                $data = [];
                $endereco = [];
                $contact = [];

                foreach ($cursor as $value) {
                    if($value["_id"] == $idUser){
                        $endereco[] = [$value["Endereco"]["CEP"], $value["Endereco"]["UF"], $value["Endereco"]["Logradouro"], $value["Endereco"]["Number House"], $value["Endereco"]["Cidade"], $value["Endereco"]["Complemento"]];
                        $contact[] = [$value["Meios_contato"]["Email"], $value["Meios_contato"]["Phone"]];

                        $data[] = [$value["Name"], $value["CPF"], $value["RG"], $value["Data de Nascimento"], $value["Genero"], $endereco, $contact];
                    }else
                        continue;
                }

                return $data;
            }
        }
    }

?>