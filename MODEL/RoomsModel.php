<?php
    namespace Model;

    class RoomsModel extends Model{
       // Senha do Banco de dados MongoDb = eIY52oWFtaI3Psze
       // User do Banco de dados MongoDB = nysilva003

       public function querysDataBase(){
            return parent::connectionDB();
       }

       public function listCountry(){
        $controller = parent::connectionDB();

        $db = $controller->countrys->selectCollection('countrys-available')->find(['ativo'=>"SIM"]);

        $countrys = [];

         foreach ($db as $key => $value) {
             $countrys[] = [$value['sigla'], $value['name'], $value['bandeira']];
         }

         return (count($countrys) !== 0) ? $countrys : false;
       }

       public function listCitys($country){
            $controller = parent::connectionDB();

            $citysDB = $controller->countrys->selectCollection('citys-available')->find(['pais'=>strip_tags($country)]); // PEGA AS CIDADES DAQUELE PAÍS
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

       public function listHotels($city){
            $controller = parent::connectionDB();
            $city = strip_tags($city);

            $citys = $controller->countrys->selectCollection('hotels')->find(['cidade'=> trim($city)]);
            $newCitys = [];
                foreach ($citys as $value) {
                    $newCitys[] = [$value["nome"], $value['endereco']['rua'], $value['pais'], $value['classificacao'], $value['disponibilidade'], $value['imagens'][0], $value["_id"]];
                }
    
                if(count($newCitys) !== 0){
                    $_SESSION['count-hotels'] = count($newCitys);
                    return $newCitys;
                }else
                    return false;
       }
    }
?>