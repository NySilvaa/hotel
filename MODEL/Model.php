<?php
    namespace Model;
    use MongoDB\Driver\ServerApi;
    use Exception;
    require "vendor/autoload.php";

    abstract class Model{
        private const URL = 'mongodb+srv://nysilva003:eIY52oWFtaI3Psze@cluster-teste.kfeid.mongodb.net/?retryWrites=true&w=majority&appName=Cluster-teste';
        
        public function __construct(){
            //self::connectionDB();
        }
        
        static function connectionDB(){
            $apiServer = new ServerApi(ServerApi::V1);
            
            $db = new \MongoDB\Client(self::URL, [], ['serverApi' => $apiServer]);
            try {
                    // Send a ping to confirm a successful connection
                    $db->selectDatabase('countrys')->command(['ping' => 1]);
                } catch (Exception $e) {
                    error_log(date("d/m/Y H:i")." Erro ao conectar no banco de dados. \n O problema que aconteceu foi esse: ".printf($e->getMessage()), 3, "error_log.log");
                    die("Falha ao se Conectar com o Sistema. :( Tente Recarregar a Página.");
                }

                return $db;
        }
    }
?>