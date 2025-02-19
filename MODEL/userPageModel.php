<?php
    namespace Model;

    class userPageModel extends Model{
        public function logoutUser(){
            if(isset($_GET["logout"])){
                session_destroy();
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

                foreach ($cursor as $key => $value) {
                    $endereco[] = [$value["Endereco"]["CEP"], $value["Endereco"]["UF"], $value["Endereco"]["Logradouro"], $value["Endereco"]["Number House"], $value["Endereco"]["Cidade"], $value["Endereco"]["Complemento"]];
                    $contact[] = [$value["Meios_contato"]["Email"], $value["Meios_contato"]["Phone"]];

                    $data[] = [$value["Name"], $value["CPF"], $value["RG"], $value["Data de Nascimento"], $value["Genero"], $endereco, $contact];
                }

                return $data;
            }
        }
    }

?>