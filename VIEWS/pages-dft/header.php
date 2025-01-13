<?php
    use \Model\HospedagemModel;

    $hostModel = new HospedagemModel();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="hotel de luxo">
    <meta name="keywords" content="hotel;luxo;reservas;front-end;back-end;viagens;">
    <meta name="author" content="Nycolas silva">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS; ?>css/style.home.css">
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS; ?>css/style.headerAndFooter.css">
    <link rel="stylesheet" href="<?php echo chooseCSSForPage(); ?>">
    <title><?php 
    if(@$_GET['url'] == "hospedagem"){
        $listNameHotel = $hostModel->getHotelById()["Nome"];
        
        if(isset($listNameHotel) && $listNameHotel !== "")
            echo $listNameHotel." | Realize sua Reserva ainda Hoje - Roro's Hotel"; 
    }else
        echo changeNameWithAPage();
        ?></title>
</head>
<body> 
    <header id="header">
        <div class="container">
            <nav class="navigation">
                <figure class="logo"><a href="/hotel" class="txt-white"><i class='bx bxs-drink' ></i> <h3>Roro's Hotel</h3></a></figure>
                
                <ul id="nav-menu">
                    <li><a href="<?php echo PATH_PAGES; ?>">Home</a></li>
                    <li><a href="#" class="active">Rooms</a></li>
                    <li><a href="<?php echo PATH_PAGES; ?>aboutUs/">About us</a></li>
                    <li><a href="<?php echo PATH_PAGES; ?>register/" class="btn">Sign Up | Login</a></li>
                </ul>
            </nav>
        </div><!-- /.container -->
    </header>