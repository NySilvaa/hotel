<?php
    namespace Model;

    class HomeModel extends Model{
        public function valuesInvalid($post){          
            foreach ($post as $key => $value) {

                if($key == "price")
                continue;

                if(($key == 'date-check-in' && $value < date('d/m/Y')) || ($key == 'date-check-out' && $value < date('d/m/Y'))){
                    echo "Erro ao Registrar sua reserva";
                    break;
                }


            }
        }
    }

?>