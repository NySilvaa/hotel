<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="hotel de luxo">
    <meta name="keywords" content="hotel;luxo;reservas;front-end;back-end;viagens;">
    <meta name="author" content="Nycolas silva">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo PATH_INTERATIONS;?>css/style.home.css">
    <?php if($_GET['url'] == 'rooms/'){ ?>
        <link rel="stylesheet" href="<?php echo PATH_INTERATIONS;?>css/style.rooms.css">
    <?php } ?>
    <title>Rooms | Explore as nossas diversas opções</title>
</head>
<body> 
    <header id="header">
        <div class="container">
            <nav class="navigation">
                <figure class="logo"><a href="#" class="txt-white"><i class='bx bxs-drink' ></i> <h3>Roro's Hotel</h3></a></figure>

                
                <ul id="nav-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#" class="btn">Sign Up | Login</a></li>
                </ul>
            </nav>
        </div>
        <!-- /.container -->
    </header>