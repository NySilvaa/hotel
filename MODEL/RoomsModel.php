<?php

namespace Model;

class RoomsModel extends Model
{
    // Senha do Banco de dados MongoDb = eIY52oWFtaI3Psze
    // User do Banco de dados MongoDB = nysilva003

    public function querysDataBase()
    {
        return parent::connectionDB();
    }

    public function listCountry()
    {
        $controller = parent::connectionDB();

        $db = $controller->countrys->selectCollection('countrys-available')->find(['ativo' => "SIM"]);

        $countrys = [];

        foreach ($db as $key => $value) {
            $countrys[] = [$value['sigla'], $value['name'], $value['bandeira']];
        }

        return (count($countrys) !== 0) ? $countrys : false;
    }

    public function listCitys($country)
    {
        $controller = parent::connectionDB();

        $citysDB = $controller->countrys->selectCollection('citys-available')->find(['pais' => strip_tags($country)]); // PEGA AS CIDADES DAQUELE PAÍS
        $bandeiraDB = $controller->countrys->selectCollection('countrys-available')->find(['name' => strtoupper(strip_tags($country))]); // PEGA A BANDEIRA DELE

        $citys = [];
        $bandeira = "";

        // PUXAR A BANDEIRA DO PAÍS ESCOLHIDO
        foreach ($bandeiraDB as $value)
            $bandeira .= $value['bandeira'];

        // PUXAR OS VALORES DO PAÍS ESCOLHIDO
        foreach ($citysDB as $value)
            $citys[] = [$value['name'], $value['estado'], $value['avaliacao'], $bandeira];

        return (count($citys) !== 0) ? $citys : false;
    }

    public function listHotels($city)
    {
        $controller = parent::connectionDB();
        $city = strip_tags($city);

        $citys = $controller->countrys->selectCollection('hotels')->find(['cidade' => trim($city)]);
        $newCitys = [];
        foreach ($citys as $value) {
            $newCitys[] = [$value["nome"], $value['endereco']['rua'], $value['pais'], $value['classificacao'], $value['disponibilidade'], $value['imagens'][0], $value["_id"]];
        }

        if (count($newCitys) !== 0) {
            $_SESSION['count-hotels'] = count($newCitys);
            return $newCitys;
        } else
            return false;
    }

    public function favoriteHotel()
    {
        if (!isset($_SESSION['id_user'])) {
            $data = json_encode(['status' => 'error', 'message' => 'Usuario nao encontrado']);
            return $data;
        }

        $hotel_id = isset($_POST['hotel_id']) ? $_POST['hotel_id'] : 0;

        if ($hotel_id != 0) {
            // USER ESTÁ LOGADO, VAMOS VERIFICAR SE ELE JÁ TINHA FAVORITADO ESSE HOTEL ANTES, OU SE É A PRIMEIRA VEZ
            $idUser = $_SESSION['id_user'];
            $homeModel = new HomeModel();

            $newIdUser = '';
            foreach ($idUser as $value) 
                $newIdUser = $value;
                
            $db = parent::connectionDB();
            $collection = $db->countrys->selectCollection('hotels_saved_by_user');
            $docsExists = $collection->countDocuments(["User_id" => $newIdUser]);

            if($docsExists > 0){
                // POSSUI REGISTROS
                $searchHotelById = $collection->countDocuments(["User_id" => $newIdUser, "Hotel_id" => $hotel_id]);

                if($searchHotelById > 0){
                    // ESSE HOTEL JÁ FOI SALVO, DEVEMOS TIRAR O FAVORITO
                    $deleteResult = $collection->deleteOne(["User_id" => $newIdUser, "Hotel_id" => $hotel_id]);
                    if ($deleteResult->getDeletedCount() > 0) {
                        // HOTEL DELETADO COM SUCESSO
                        $data = json_encode(['status' => 'removed', 'message' => 'Hotel Removido com Sucesso']);
                        return $data;
                    } else {
                        $homeModel->messageBook('error', "Erro ao Apagar o Favorito", "Tente novamente");
                        return false;
                    }
                }else{
                    // O USER VAI SALVÁ-LO PELA PRIMEIRA VEZ
                      $dataToSave = date("d/m/Y");
                      $dataSaveUser = ["User_id" => $newIdUser, "Hotel_id" => $hotel_id, "Data_salvamento" => $dataToSave];
                      $insertData = $collection->insertOne($dataSaveUser);
                  
                      if ($insertData->getInsertedCount() > 0) {
                          // HOTEL SALVO COM SUCESSO
                          $data = json_encode(['status' => 'added', 'message' => 'Hotel Favoritado Com sucesso']);
                          return $data;
                      } else {
                          $homeModel->messageBook('error', "Erro ao Salvar o Hotel", "Tente novamente");
                          return false;
                      }
                }
                
            }else{
                // SERÁ O PRIMEIRO HOTEL QUE O USER VAI FAVORITAR
                  $dataToSave = date("d/m/Y");
                  $dataSaveUser = ["User_id" => $newIdUser, "Hotel_id" => $hotel_id, "Data_salvamento" => $dataToSave];
                  $insertData = $collection->insertOne($dataSaveUser);
              
                  if ($insertData->getInsertedCount() > 0) {
                      // HOTEL SALVO COM SUCESSO
                      $data = json_encode(['status' => 'added', 'message' => 'Hotel Favoritado Com sucesso']);
                      return $data;
                  } else {
                      $homeModel->messageBook('error', "Erro ao Salvar o Hotel", "Tente novamente");
                      return false;
                  }
            }
        }else{
            $data = json_encode(['status' => 'error', 'message' => 'Usuario nao encontrado']);
            return $data;
        }
    }
}

/*
    COLEÇÃO DAS RESERVAS
    
    {
  "user_id": "user123",
  "hotel_id": "hotel456",
  "check_in": "2025-03-01T14:00:00",
  "check_out": "2025-03-07T11:00:00",
  "status": "confirmada",
  "payment_status": "pago",
  "payment_method": "cartão",
  "guest_count": 2,
  "special_requests": "Cama extra",
  "created_at": "2025-01-31T10:00:00"
}

    */
