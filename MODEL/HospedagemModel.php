<?php 
    namespace Model;

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
                        "Classificacao"=> $value["classificacao"],  
                        "Proximidades"=> $value["proximidades"],  
                        "Metodos-pagamento"=> $value["metodos_pagamento"],  
                        "Img"=> $value["imagens"],
                    ];
            }

            return $hotelSingle;
        }
    }
?>