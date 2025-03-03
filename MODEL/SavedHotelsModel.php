<?php
    namespace Model;
    use Model\HomeModel;
    use MongoDB\BSON\ObjectId;

    class SavedHotelsModel extends Model{
        public function getHotelsSavedByUser(){
            if(isset($_SESSION["id_user"])){
                $idUser = $_SESSION["id_user"];
                return $this->methodGetHotelsSaved($idUser);
            
            }else if(isset($_COOKIE["id_user"]) && $_COOKIE["id_user"] !== ""){
                $idUser = $_COOKIE["id_user"];
                return $this->methodGetHotelsSaved($idUser);
            
            }else
                return 0;
        }

        private function methodGetHotelsSaved($idFromUser){
            $idUser = $idFromUser;
                
            $controller = parent::connectionDB();
            $collection = $controller->countrys->selectCollection('hotels_saved_by_user');
            $cursor = $collection->countDocuments(["User_id" => new ObjectId($idUser)]);

            if($cursor > 0){
                // USUÁRIO JÁ SALVOU ALGUM HOTEL ANTES, ENTÃO VAMOS PUXÁ-LOS
                $idUserWhoSavedHotel = $collection->find(["User_id" => new ObjectId($idUser)]);
                $idHotel = [];

                foreach ($idUserWhoSavedHotel as $value){
                    $idHotel[] = [$value["Hotel_id"]];
                }

                $hotels = $controller->countrys->selectCollection("hotels");
                $dataHotel = [];

                for ($i=0; $i < count($idHotel); $i++) { 
                   $hotelIdTemp = $idHotel[$i][0];
                   $cursorNew = $hotels->find();

                   foreach ($cursorNew as $value)
                        if($value["_id"] == $hotelIdTemp)
                            $dataHotel[] = [$value["_id"], $value["imagens"][0], $value["nome"], 
                        $value["cidade"], $value["pais"], $value["avaliacoes"]["media"], $value["preco"]];      
                }

                return $dataHotel;
            }
        }

        public function unfavoriteHotel(){
            if(isset($_SESSION["id_user"])){
                $idUser = $_SESSION["id_user"];
                return $this->methodUnfavoriteHotelByUser($idUser);
            
            }else if(isset($_COOKIE["id_user"]) && $_COOKIE["id_user"] !== ""){
                $idUser = $_COOKIE["id_user"];
                return $this->methodUnfavoriteHotelByUser($idUser);
            
            }else
                return 0;
        }

        private function methodUnfavoriteHotelByUser($idFromUser){
            $controller = parent::connectionDB()->countrys;
            $collection = $controller->selectCollection("hotels_saved_by_user");
            $hotelId = strip_tags($_POST["hotel_id"]);
            $idUser = $idFromUser;

            $cursor = $collection->countDocuments(["Hotel_id" => $hotelId, "User_id" => new ObjectId($idUser)]);
            $homeModel = new HomeModel();

            if($cursor == 0){
                // FALHOU
                $homeModel->messageBook("error", "Erro ao remover dos favoritos", "Tente novamente mais tarde");
                return false;
            }else{
                // ENCONTROU O REGISTRO, PODEMOS DELETAR
                  $deleteResult = $collection->deleteOne(["Hotel_id" => $hotelId, "User_id" => new ObjectId($idUser)]);
                  
                  if ($deleteResult->getDeletedCount() > 0) {
                      // HOTEL DELETADO COM SUCESSO
                        $homeModel->messageBook("success", "Remoção Feita c/ Sucesso", "Busque por novas opções no site");
                      return true;
                  } else {
                      $homeModel->messageBook('error', "Erro ao Desfavoritar", "Tente novamente mais tarde");
                      return false;
                  }
            }
        }
    }
?>