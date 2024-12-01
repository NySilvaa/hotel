<?php
    namespace Model;
    include("Model.php");

    class RoomsModel extends Model{
        public function changeCharacteres($str){
            $str = mb_strtolower($str);
            $str = preg_replace("/(á,à,ã,â)/", "a", $str);
            $str = preg_replace("/(ê,é)/", "e", $str);
            $str = preg_replace("/(î,Í)/", "i", $str);
            $str = preg_replace("/(ô,ó)/", "o", $str);
            $str = preg_replace("/(û,ú)/", "u", $str);
            $str = strtolower($str);

            return $str;
        }
    }
?>