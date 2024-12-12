<?php
    ob_start();
    use MongoDB\Client;
    use MongoDB\Driver\ServerApi;
    
    require 'vendor/autoload.php';
    session_start();

    // CONEXÃO COM O BANCO DE DADOS NOSQL - MONGODB
    $uri = 'mongodb+srv://nysilva003:eIY52oWFtaI3Psze@cluster-teste.kfeid.mongodb.net/?retryWrites=true&w=majority&appName=Cluster-teste';
    $apiVersion = new ServerApi(ServerApi::V1);
    $client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);
    // try {
    //     // Send a ping to confirm a successful connection
    //     $client->selectDatabase('admin')->command(['ping' => 1]);
    //     echo "Pinged your deployment. You successfully connected to MongoDB!\n";
    // } catch (Exception $e) {
    //     printf($e->getMessage());
    // }

    // $database = $client->clientes; CRIA O BANCO DE DADOS
    // $collection = $database->reservas; // CRIA A COLEÇÃO
    // $collection->insertOne(["nome"=>"Nycolas"]); // INSERE 1 VALOR

    $autoload = function($class){
        $class = str_replace('\\','/', $class);

        if(file_exists($class.".php"))
            require_once($class.".php");
    };

    spl_autoload_register($autoload);

    date_default_timezone_set("America/Sao_Paulo");

    function recoverPost($post){
        if(isset($_POST[$post]))
            return $_POST[$post];
    }

    define('PATH_INTERATIONS', 'http://localhost/hotel/Views/assets/');
    define('PATH_PAGES', 'http://localhost/hotel/');

    $app = new Application();
    $app->run();

    ob_end_flush();
?>