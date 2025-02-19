<?php
    namespace Model;

    class SavedHotelsModel extends Model{
        public function getHotelsSavedByUser(){
            $idUser = $_SESSION['id_user'];

            $newIdUser = '';
            foreach ($idUser as $value) 
                $newIdUser = $value;
                
            $controller = parent::connectionDB();
            $collection = $controller->countrys->selectCollection('hotels_saved_by_user');
            $cursor = $collection->countDocuments(["User_id" => $newIdUser]);

            if($cursor > 0){
                // USUÁRIO JÁ SALVOU ALGUM HOTEL ANTES, ENTÃO VAMOS PUXÁ-LOS
                $idUserWhoSavedHotel = $collection->find(["User_id" => $newIdUser]);
                $idHotel = [];

                foreach ($idUserWhoSavedHotel as $key => $value){
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
            }else
                return 0;
        }
    }
?>