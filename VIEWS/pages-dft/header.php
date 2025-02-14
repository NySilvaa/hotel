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
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS; ?>css/style.home.css">
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS; ?>css/style.headerAndFooter.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="<?php echo chooseCSSForPage(); ?>">
    <?php if(@$_GET['url'] == 'hospedagem'){ ?>
        <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <?php } ?>
    <link rel="shortcut icon" href="<?php echo PATH_INTERATIONS; ?>images/ico/cisne.ico" type="image/x-icon">
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
<div class="box-loader"><div class="loader"></div></div>

    <header id="header">
        <div class="container">
            <nav class="navigation">
                <figure class="logo"><a href="/hotel" class="txt-white"><h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" stroke="#403027" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-origami"><path d="M12 12V4a1 1 0 0 1 1-1h6.297a1 1 0 0 1 .651 1.759l-4.696 4.025"/><path d="m12 21-7.414-7.414A2 2 0 0 1 4 12.172V6.415a1.002 1.002 0 0 1 1.707-.707L20 20.009"/><path d="m12.214 3.381 8.414 14.966a1 1 0 0 1-.167 1.199l-1.168 1.163a1 1 0 0 1-.706.291H6.351a1 1 0 0 1-.625-.219L3.25 18.8a1 1 0 0 1 .631-1.781l4.165.027"/></svg> Roro's Hotel</h3></a></figure>
                
                <ul id="nav-menu">
                    <li><a href="<?php echo PATH_PAGES; ?>" data-page="home">Home</a></li>
                    <li><a href="<?php echo PATH_PAGES; ?>rooms/" data-page="rooms" >Rooms</a></li>
                    <li><a href="<?php echo PATH_PAGES; ?>aboutUs/" data-page="aboutUs">About us</a></li>
                    <li><a href="<?php echo (isset($_SESSION['id_user'])) ? PATH_PAGES."userPage/" : PATH_PAGES."login/"; ?>" class="btn" data-page="register">
                    <?php echo (isset($_SESSION['id_user'])) ? 'User Page <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>' : "Sign Up | Login" ?></a></li>
                </ul>
            </nav>
        </div><!-- /.container -->
    </header>