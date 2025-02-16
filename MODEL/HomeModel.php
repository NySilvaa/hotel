<?php
    namespace Model;

    class HomeModel extends Model{
        private const months = [
            'January',
             'February',
             'March',
             'April',
             'May',
             'June',
             'July',
             'August',
             'September',
             'October',
             'November',
             'December'
          ];

        
          public function valuesInvalid($post){    
            $valor = 0;
            
            foreach ($post as $key => $value) {
                if($key == "prices")
                continue;

                if($value == ''){
                    self::messageBook('error', 'Valores Inválidos', 'Valores vazios não são permitidos');
                    return false;
                    break;
                }

                if(!isset($post['option'])){
                    self::messageBook('error','Faltou escolher o serviço', 'Escolha uma opção p/ a reserva');
                    return false;
                    break;
                }

                if($key == 'date-check-out' || $key == 'date-check-in'){
                    $month = explode('/', $value)[1];

                    for ($i=0; $i < count(self::months); $i++) { 
                        if(self::months[$i] == $month){
                            $value = str_replace($month,$i+1,$value);
                        }
                    }
                }

                $_SESSION[$key] = $value;

               $valor++;
            }

            if($valor == 4){
                self::messageBook('success', 'Reserva Escolhida', 'Mostraremos nossas ofertas disponíveis');
                return true;
            }
        }

        public function messageBook($status, $title, $mesage){
            echo '
                <div class="card-message" >
                    <div class="card '.$status.'">
                        <svg class="wave" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M0,256L11.4,240C22.9,224,46,192,69,192C91.4,192,114,224,137,234.7C160,245,183,235,206,213.3C228.6,192,251,160,274,149.3C297.1,139,320,149,343,181.3C365.7,213,389,267,411,282.7C434.3,299,457,277,480,250.7C502.9,224,526,192,549,181.3C571.4,171,594,181,617,208C640,235,663,277,686,256C708.6,235,731,149,754,122.7C777.1,96,800,128,823,165.3C845.7,203,869,245,891,224C914.3,203,937,117,960,112C982.9,107,1006,181,1029,197.3C1051.4,213,1074,171,1097,144C1120,117,1143,107,1166,133.3C1188.6,160,1211,224,1234,218.7C1257.1,213,1280,139,1303,133.3C1325.7,128,1349,192,1371,192C1394.3,192,1417,128,1429,96L1440,64L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"
                            fill-opacity="1"
                            ></path>
                        </svg>

                        <div class="icon-container">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            stroke-width="0"
                            fill="currentColor"
                            stroke="currentColor"
                            class="icon"
                            >
                            <path
                                d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"
                            ></path>
                            </svg>
                        </div>
                        <div class="message-text-container">
                            <p class="message-text">'.$title.'</p>
                            <p class="sub-text">'.$mesage.'</p>
                        </div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 15 15"
                            stroke-width="0"
                            fill="none"
                            stroke="currentColor"
                            class="cross-icon"
                         id="btn-close-msg">
                            <path
                            fill="currentColor"
                            d="M11.7816 4.03157C12.0062 3.80702 12.0062 3.44295 11.7816 3.2184C11.5571 2.99385 11.193 2.99385 10.9685 3.2184L7.50005 6.68682L4.03164 3.2184C3.80708 2.99385 3.44301 2.99385 3.21846 3.2184C2.99391 3.44295 2.99391 3.80702 3.21846 4.03157L6.68688 7.49999L3.21846 10.9684C2.99391 11.193 2.99391 11.557 3.21846 11.7816C3.44301 12.0061 3.80708 12.0061 4.03164 11.7816L7.50005 8.31316L10.9685 11.7816C11.193 12.0061 11.5571 12.0061 11.7816 11.7816C12.0062 11.557 12.0062 11.193 11.7816 10.9684L8.31322 7.49999L11.7816 4.03157Z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                </div>
            ';
        }

        public function listHotelsSectionOurRooms(){
            $controller = parent::connectionDB();

            $db = $controller->countrys;
            $collection = $db->hotels;

            function generateRandomNumber(){
                return rand(0, 63);
            }

            $citys = [
                "COPACABANA",
                "FERNANDO DE NORONHA",
                "SANTOS",
                "GRAMADO",
                "NEW YORK",
                "LOS ANGELES",
                "TORONTO",
                "VANCOUVER",
                "MONTREAL",
                "CALGARY",
                "BUENOS AIRES",
                "CÓRDOBA",
                "ROSARIO",
                "MENDOZA",
                "PEQUIM",
                "SHANGHAI",
                "GUANGZHOU",
                "SHENZHEN",
                "TÓQUIO",
                "OSAKA",
                "KYOTO",
                "NAGOYA",
                "BERLIM",
                "MUNIQUE",
                "FRANKFURT",
                "HAMBURGO",
                "PARIS",
                "LYON",
                "MARSELHA",
                "BORDEAUX",
                "ROMA",
                "MILÃO",
                "VENEZA",
                "FLORENÇA",
                "MADRI",
                "BARCELONA",
                "SEVILHA",
                "VALÊNCIA",
                "LONDRES",
                "EDIMBURGO",
                "MANCHESTER",
                "BELFAST",
                "MOSCOU",
                "SÃO PETERSBURGO",
                "NOVOSIBIRSK",
                "ECATERIMBURGO",
                "NOVA DÉLHI",
                "MUMBAI",
                "BANGALORE",
                "JAIPUR",
                "SYDNEY",
                "MELBOURNE",
                "BRISBANE",
                "PERTH",
                "CIDADE DO CABO",
                "JOANESBURGO",
                "DURBAN",
                "PRETÓRIA",
                "CIDADE DO MÉXICO",
                "GUADALAJARA",
                "MONTERREY",
                "CANCÚN",
                "CHICAGO",
                "MIAMI"
            ];

            $arr = [];

            for ($i=0; $i < 10; $i++) { 
                $randomNumber = generateRandomNumber();
                $citysRandom = $citys[$randomNumber];

                $cursor = $collection->find(["cidade" => $citysRandom]);

                foreach ($cursor as $documents) {
                    $arr[$documents["pais"]] = [$documents["_id"], $documents["nome"], $documents["imagens"][0], $documents["avaliacoes"]["media"], $documents["preco"]];
                }
            }
            
            return $arr;
        }
    }

?>