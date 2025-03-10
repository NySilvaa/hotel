<?php
namespace Model;
use MongoDB\BSON\ObjectId;

class RoomsModel extends Model
{
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
            $newCitys[] = [$value["nome"], $value['endereco']['rua'], $value['pais'], $value['classificacao'], $value['disponibilidade'], $value['imagens'][0], $value["_id"], $value["preco"], $value["avaliacoes"]["media"]];
        }

        if (count($newCitys) !== 0) {
            $_SESSION['count-hotels'] = count($newCitys);
            return $newCitys;
        } else
            return false;
    }

    public function favoriteHotel()
    {
        if(isset($_SESSION["id_user"])){
            $idUser = $_SESSION["id_user"];
            return $this->methodFavorite($idUser);

        }else if((isset($_COOKIE["id_user"]) && $_COOKIE["id_user"] !== "")){
            $idUser = $_COOKIE["id_user"];
            return $this->methodFavorite($idUser);

        }else{
            $data = json_encode(['status' => 'error', 'message' => 'Usuario nao encontrado']);
            return $data;
        }
    }

    private function methodFavorite($idByUser){
        $hotel_id = isset($_POST['hotel_id']) ? $_POST['hotel_id'] : 0;

        if ($hotel_id != 0) {
            // USER ESTÁ LOGADO, VAMOS VERIFICAR SE ELE JÁ TINHA FAVORITADO ESSE HOTEL ANTES, OU SE É A PRIMEIRA VEZ
            $homeModel = new HomeModel();
            $idUser = $idByUser;
                
            $db = parent::connectionDB();
            $collection = $db->countrys->selectCollection('hotels_saved_by_user');
            $docsExists = $collection->countDocuments(["User_id" => new ObjectId($idUser)]);

            if($docsExists > 0){
                // POSSUI REGISTROS
                $searchHotelById = $collection->countDocuments(["User_id" => new ObjectId($idUser), "Hotel_id" => $hotel_id]);

                if($searchHotelById > 0){
                    // ESSE HOTEL JÁ FOI SALVO, DEVEMOS TIRAR O FAVORITO
                    $deleteResult = $collection->deleteOne(["User_id" => new ObjectId($idUser), "Hotel_id" => $hotel_id]);
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
                      $dataSaveUser = ["User_id" => new ObjectId($idUser), "Hotel_id" => $hotel_id, "Data_salvamento" => $dataToSave];
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
                  $dataSaveUser = ["User_id" => new ObjectId($idUser), "Hotel_id" => $hotel_id, "Data_salvamento" => $dataToSave];
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
            $_SESSION["favoritePageRooms"] = true;
            return $data;
        }
    }
}

?>