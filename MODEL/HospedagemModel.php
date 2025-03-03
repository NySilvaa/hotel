<?php 
    namespace Model;
    use Model\HomeModel;
    use \MongoDB\BSON\ObjectId;

    class HospedagemModel extends Model{
        public function getHotelById(){
            $id = '';

            foreach ($_GET as $key => $value) {
                if($key !== 'url')
                    $id = $key;
            }

            $collection = parent::connectionDB()->countrys->selectCollection('hotels')->find();
            $hotelSingle = [];

            foreach ($collection as $value) {
                if($value["_id"] == $id)
                    $hotelSingle = [
                        "Cidade"=> $value["cidade"],
                        "Pais"=> $value["pais"],
                        "Nome"=> $value["nome"],
                        "Descricao"=> $value["descricao"],
                        "Endereco"=> $value["endereco"],
                        "Contato"=> $value["contato"],
                        "Amenidades"=> $value["amenidades"],  
                        "Avaliacoes"=> $value["avaliacoes"],  
                        "Politicas"=> $value["politicas"],  
                        "Proximidades"=> $value["proximidades"],  
                        "Metodos-pagamento"=> $value["metodos_pagamento"],  
                        "Img"=> $value["imagens"],
                        "Preco" => $value["preco"]
                    ];
            }

            return $hotelSingle;
        }

        public function addStarsBasedByOpinion($nota){
            $countStars = explode(".", $nota);

            if((int) $countStars[0] == 0){
                for ($i=0; $i < 5; $i++) 
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>';
            }else{
                for ($i=0; $i < (int) $countStars[0]; $i++)
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#55331f" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>';

                
                if((int) $countStars[0] !== 5){
                   $secondRather = 5 - (int) $countStars[0];
                   
                    if($secondRather == 1){
                        if(!isset($countStars[1]) || $countStars[1] !== "")
                            echo '<span class="half-star"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#55331f" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-half"><path d="M12 18.338a2.1 2.1 0 0 0-.987.244L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.12 2.12 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.12 2.12 0 0 0 1.597-1.16l2.309-4.679A.53.53 0 0 1 12 2"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="star-half-rotate" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-half"><path d="M12 18.338a2.1 2.1 0 0 0-.987.244L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.12 2.12 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.12 2.12 0 0 0 1.597-1.16l2.309-4.679A.53.53 0 0 1 12 2"/></svg></span>';
                        else
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>';
                    }
                    else{
                        echo '<span class="half-star"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#55331f" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-half"><path d="M12 18.338a2.1 2.1 0 0 0-.987.244L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.12 2.12 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.12 2.12 0 0 0 1.597-1.16l2.309-4.679A.53.53 0 0 1 12 2"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="star-half-rotate" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-half"><path d="M12 18.338a2.1 2.1 0 0 0-.987.244L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.12 2.12 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.12 2.12 0 0 0 1.597-1.16l2.309-4.679A.53.53 0 0 1 12 2"/></svg></span>';
                        for ($i=0; $i < $secondRather -1; $i++) 
                            echo '<svg style="position:relative; left:-24px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>';
                    }
               }
            }
        }

        public function bookHotel(){
            if(isset($_SESSION["id_user"])){
                if(isset($_POST["Check-in"])){
                    // DADOS RECUPERADOS DA RESERVA
                    $hotelId = strip_tags($_POST["IdHotel"]);
                    $userId = strip_tags($_SESSION["id_user"]);
                    $checkIn = strip_tags($_POST["Check-in"]);
                    $checkOut = strip_tags($_POST["Check-out"]);
                    $nights = strip_tags($_POST["Nights"]);
                    $personPerNights = strip_tags($_POST["PersonPerNights"]);
                    $prizeFinal = strip_tags($_POST["Prize_Final"]);

                    // CONEXÃO COM O BANCO DE DADOS E VERIFICANDO SE O USER NÃO MEXEU NO ID DO HOTEL PELO FRONT-END
                    $db = parent::connectionDB();
                    $collection = $db->countrys->selectCollection("hotels");
                    $cursor = $collection->findOne(["_id" => new ObjectId($hotelId)]);

                    $homeModel = new HomeModel();

                    if(!$cursor){
                        // O USUÁRIO MEXEU NO ID DO HOTEL OU O HOTEL NÃO ESTÁ MAIS DISPONÍVEL
                        echo $homeModel->messageBook("error", "Hotel Indisponível", "Esse hotel não está disponível agora, tente mais tarde");
                        return false;
                    }else{
                        if($hotelId == "" || $userId == "" || $checkIn == "" || $checkOut == "" || $nights == "" || $personPerNights == "" || $prizeFinal == ""){
                                        // VERIFICAÇÃO PARA VALORES VAZIOS
                            $homeModel->messageBook("error", "Valores vazios", "Valores vazios não são permitidos.");
                            return false;
                        }else if(strtotime($checkIn) < strtotime("now") || strtotime($checkOut) < strtotime("now") || strtotime($checkOut) < strtotime($checkIn)){
                            // VERIFICAÇÃO PARA DATAS RETROATIVAS
                            $homeModel->messageBook("error", "Datas Inválidas", "As datas inseridas não são permitidas.");
                            return false;
                        }else if(!filter_var($nights, FILTER_VALIDATE_INT) || !filter_var($personPerNights, FILTER_VALIDATE_INT)){
                            // VALORES QUE PRECISAM SER NUMÉRICOS, VINDO DE MANEIRA ERRADA
                            $homeModel->messageBook("error", "Valores Incorretos", "Você inseriu um dado errado, tente novamente mais tarde.");
                            return false;
                        }else{
                            $prize = explode(" ", $prizeFinal)[1]; 
                            $prizeFormated = explode(",", $prize)[0];
                            $precoHotel = $cursor["preco"];
                            
                            if((((int) $precoHotel * (int) $nights) +20) !== (int) $prizeFormated){
                                // USUÁRIO MEXEU NO PREÇO FINAL NO FRON-END
                                $homeModel->messageBook("error", "Preço Errado", "Houve um erro ao realizar a sua reserva");
                                return false;
                            }else{
                                $book = $db->countrys->selectCollection("books_user_hotels");
                                $bookPrevious = $book->countDocuments(["Hotel_id" => $hotelId, "User_id" => $userId]);
                                
                                if($bookPrevious > 0){
                                    // USUÁRIO JÁ FEZ UMA RESERVA NESSE HOTEL ANTES
                                    $homeModel->messageBook("error", "Reserva Efetuada Anteriormente", "Você já tem uma reserva nesse hotel");
                                    return false;
                                }else{
                                    // TUDO CERTO PODEMOS FAZER A INSERÇÃO
                                    $result = $book->insertOne([
                                        "Hotel_id" => $hotelId,
                                        "User_id" => $userId,
                                        "Check_in" => $checkIn,
                                        "Check_out" => $checkOut,
                                        "Nights" => $nights,
                                        "Person" => $personPerNights." person",
                                        "Prize_Final" => $prizeFinal
                                    ]);
    
                                    $insertedId = $result->getInsertedId();

                                    if($insertedId){
                                        // INSERÇÃO DEU CERTO
                                        $_SESSION["book_hotel"] = true;
                                        return true;
                                    }else{
                                        // ALGO FALHOU NA INSERÇÃO
                                        $homeModel->messageBook("error", "Sua reserva Falhou", "Tente novamente mais tarde");
                                        return false;
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                $_SESSION["bookPendent"] = true;
                echo "<script>location.href = 'http://localhost/hotel/login/'</script>";
                die();
            }
        }

        public function verifyFavoriteHotel($hotelId){
            if(isset($_SESSION["id_user"])){
                $controller = parent::connectionDB()->countrys;
                $collection = $controller->selectCollection("hotels_saved_by_user");
                $idUser = strip_tags($_SESSION["id_user"]);

                $cursor = $collection->countDocuments(["User_id" => new ObjectId($idUser), "Hotel_id" => $hotelId]);

                return ($cursor > 0) ? true : false;
            }else if((isset($_COOKIE["id_user"]) && $_COOKIE["id_user"] !== "")){
                $controller = parent::connectionDB()->countrys;
                $collection = $controller->selectCollection("hotels_saved_by_user");
                $idUser = strip_tags($_COOKIE["id_user"]);

                $cursor = $collection->countDocuments(["User_id" => new ObjectId($idUser), "Hotel_id" => $hotelId]);

                return ($cursor > 0) ? true : false;
            }else
                return false;
        }
    }
?>