<?php
    namespace Model;
    use MongoDB\BSON\ObjectId;
    use Model\HomeModel;

    class BooksModel extends Model{
        public function getBooksUser(){
            $controller = parent::connectionDB();
            $collection = $controller->countrys->selectCollection("books_user_hotels");

            $idUser = strip_tags($_SESSION["id_user"]);

            $cursor = $collection->countDocuments(["User_id" => $idUser]);

            if($cursor == 0){
                return false;
            }else{
                $books = $collection->find(["User_id" => $idUser]);
                $data = [];

                foreach ($books as $value) 
                    $data[] = [$value["Hotel_id"], $value["Check_in"], $value["Check_out"], $value["Nights"], $value["Person"], $value["Prize_Final"]];
                
                return $data;
            }
            
        }

        public function getHotelsBookedByUser($idHotel){
            $controller = parent::connectionDB();
            $collection = $controller->countrys->selectCollection('hotels');

            $cursor = $collection->find(["_id" => new ObjectId($idHotel)]);
            $dataHotel = [];

                foreach ($cursor as $value)
                    $dataHotel[] = [$value["_id"], $value["imagens"][0], $value["nome"], $value["cidade"], $value["pais"], $value["avaliacoes"]["media"]];      

                return $dataHotel;
        }

        public function cancelBook(){
            $controller = parent::connectionDB()->countrys;
            $collection = $controller->selectCollection("books_user_hotels");
            $hotelId = strip_tags($_POST["hotel_id"]);
            $idUser = strip_tags($_SESSION["id_user"]);

            $cursor = $collection->countDocuments(["Hotel_id" => $hotelId, "User_id" => $idUser]);
            $homeModel = new HomeModel();

            if($cursor == 0){
                // FALHOU
                $homeModel->messageBook("error", "Erro ao realizar o cancelamento", "Tente novamente mais tarde");
                return false;
            }else{
                // ENCONTROU O REGISTRO, PODEMOS DELETAR
                  $deleteResult = $collection->deleteOne(["Hotel_id" => $hotelId, "User_id" => $idUser]);
                  
                  if ($deleteResult->getDeletedCount() > 0) {
                      // HOTEL DELETADO COM SUCESSO
                      $homeModel->messageBook("success", "Cancelamento Feito c/ Sucesso", "Busque por novas opções no site");
                      return true;
                  } else {
                      $homeModel->messageBook('error', "Erro ao Cancelar sua Reserva", "Tente novamente mais tarde");
                      return false;
                  }
            }
        }
    }

?>