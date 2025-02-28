<?php

use \Model\HomeModel;
use \Model\RoomsModel;
use Model\HospedagemModel;

$homeModel = new HomeModel();
$rooms = new RoomsModel();
$host = new HospedagemModel();
?>

<section id="testeJson">
    <?php
        if(isset($_POST['hotel_id'])){
            $hotelId = json_decode($rooms->favoriteHotel());
            echo '<input type="hidden" name="status" value="'.$hotelId->status.'" />';

            if($hotelId->status == 'added')
                $homeModel->messageBook('success', "Hotel Salvo com Sucesso","Acesse sua User Page p/ verificar os seus hotéis salvos");
            else if($hotelId->status == 'removed')
                $homeModel->messageBook('success', "Hotel Removido com Sucesso","Salve novos hotéis para visitá-los depois");
            else if($hotelId->status == "error"){
                echo "<script>location.href = 'http://localhost/hotel/login/'</script>";
                die();
            }
        }
    ?>
</section>

<section class="data-user-book">
    <div class="container">
        <div class="data-user-book-wp">
            <div class="data-book-box">
                <label for="location" class="book-title">Location</label>
                <input type="text" id="location" name="location" placeholder="Choose Your Destiny" value="<?php echo recoverPost('destiny'); ?>">

                <div class="modal">
                    <form class="form" method="post" id="form-location-destiny">
                        <div class="separator">
                            <hr class="line">
                            <p>Select Your Location</p>
                            <hr class="line">
                        </div>
                        <div class="credit-card-info--form">
                            <div class="input_container">
                                <label for="origin" class="input_label">De Onde Está Saindo? </label>
                                <input id="origin" class="input_field" type="text" name="origin" title="Inpit title" placeholder="Currently Location" value="SP - BRAZIL">
                            </div>
                            <div class="input_container">
                                <label for="destiny-city" class="input_label">Para Onde Está Indo?</label>
                                <input id="destiny-country" class="input_field destiny-country" type="text" name="destiny-country" title="Inpit title" placeholder="The Country">
                                <input id="destiny-city" class="input_field destiny-location" type="text" name="destiny" title="Inpit title" placeholder="Your Destiny">
                                <div class="div-teste">
                                    <ul id="list-country">
                                        <?php
                                        if (!isset($_GET['paisEscolhido'])) {
                                            // O USUÁRIO ESTÁ NA PRIMEIRA ETAPA AINDA
                                            if ($rooms->listCountry() === false) {
                                                // DEU ERRO AO ESCOLHER O PAÍS
                                                $homeModel->messageBook("error", "País Inválido", "Houve um Erro ao Selecionar o País para a sua Reserva");
                                                return false;
                                            } else {
                                                $roomsCountrys = $rooms->listCountry();

                                                foreach ($roomsCountrys as $key => $value) {
                                        ?>
                                                    <li data-country="<?php echo $value[1]; ?>">
                                                        <figure><img src="<?php echo $value[2]; ?>" alt="" srcset=""></figure><?php echo $value[1]; ?> (<?php echo $value[0]; ?>)
                                                    </li>
                                                <?php
                                                }
                                            }
                                        } // FIM DO FOREACH E DO IF
                                        else {
                                            $paisEscolhido = strip_tags($_GET['paisEscolhido']);
                                            $paisEscolhido = $paisEscolhido . str_replace("%20", " ", $paisEscolhido);
                                            $paisFormatado = "";

                                            for ($i = 0; $i < $paisEscolhido; $i++) {
                                                // PEGA APENAS O NOME DO PAÍS, SEM A SIGLA
                                                if ($paisEscolhido[$i] == "(")
                                                    break;

                                                $paisFormatado .= $paisEscolhido[$i];
                                            }

                                            $paisFormatado = trim($paisFormatado); // DEIXA TUDO EM MINÚSCULO E REMOVE OS ESPAÇOS EM BRANCO DO INÍCIO E DO FIM
                                            if ($rooms->listCitys($paisFormatado) === false) {
                                                $homeModel->messageBook("error", "Cidade Inválida", "Houve um Erro ao Selecionar a Cidade para a sua Reserva");
                                                return false;
                                            } else {
                                                $roomsCitys = $rooms->listCitys(ucfirst($paisFormatado));
                                                foreach ($roomsCitys as $key => $value) { ?>
                                                    <li data-country="<?php echo strtoupper($value[0]); ?>">
                                                        <figure><img src="<?php echo $value[3] ?>" alt="" srcset=""></figure> <?php echo strtoupper($value[0]); ?>
                                                    </li>
                                        <?php }
                                            }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="purchase--btn" name="findOutDestiny">Verificar Lugares Disponíveis</button>
                    </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="person" class="book-title">Person</label>
                <input type="text" id="person" name="person" placeholder="Choose the Count" value="<?php
                   if(isset($_SESSION['countPerson']) && !isset($_POST['count-person-field']))
                        echo $_SESSION['countPerson'];
                    else{
                        if (!isset($_POST['count-person']))
                            echo (isset($_SESSION['count'])) ? $_SESSION['count'] : 1;
                        else{
                            $_SESSION['countPerson'] = $_POST['count-person-field'];
                            echo recoverPost('count-person-field');
                        }
                    }
                    ?> Person" />

                <div class="modal">
                    <form class="form" method="post">
                        <div class="separator">
                            <hr class="line">
                            <p>Select the Count of People</p>
                            <hr class="line">
                        </div>
                        <div class="credit-card-info--form">
                            <div class="input_container">
                                <label for="password_field" class="input_label">Person </label>
                                <input id="password_field" class="input_field" type="text" name="count-person-field" title="Inpit title" placeholder="Type the count of person">
                            </div>
                        </div>
                        <button class="purchase--btn" name="count-person">Registrar <?php
                                if(isset($_SESSION['countPerson']) && !isset($_POST['count-person-field']))
                                    echo $_SESSION['countPerson'];
                                else{
                                    if (!isset($_POST['count-person']))
                                        echo (isset($_SESSION['count'])) ? $_SESSION['count'] : 1;
                                    else{
                                        $_SESSION['countPerson'] = $_POST['count-person-field'];
                                        echo recoverPost('count-person-field');
                                    }
                                }
                            ?> Pessoas</button>
                    </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="check-in" class="book-title">Check-in</label>
                <input type="text" id="check-in" name="check-in" placeholder="Check-in Date" value="<?php echo (isset($_SESSION['date-check-in'])) ? $_SESSION['date-check-in'] : date('d/m/Y'); ?>" />

                <div id="calendar"></div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="check-out" class="book-title">Check-out</label>
                <input type="text" id="check-out" name="check-out" placeholder="Check-out Date" value="<?php echo (isset($_SESSION['date-check-out'])) ? $_SESSION['date-check-out'] : date('d/m/Y', time() + (60 * 60 * 24 * 30)); ?>"">

                <div id=" calendar">
            </div>
        </div><!-- /.data-book-box-->
    </div>

    <div class="search-box">
        <label for="search-place" class="book-tittle">Find Specific Place</label>
        <input type="text" id="search-place" name="search-place" placeholder="Ex.: Ibis Hotel">
        <button type="submit" name="btn-search-place"><i class="bx bx-search"></i></button>
    </div><!-- /.search-box -->
    </div><!-- /.container -->
</section>

<main id="hotels">
    <div class="container">
        <?php
        if (isset($_SESSION['count-hotels'])) { ?>
            <h2 class="hotels--title">Hotels in <p><?php echo recoverPost('destiny'); ?></p>
            </h2>
            <span class="count-hotels">Foram encontrados <p><?php echo count($rooms->listHotels($_SESSION['destiny'])); ?></p> Premium Hotels</span>
        <?php  } ?>

        <div class="hotels-wp" <?php if (!isset($_SESSION['count-hotels']) && !isset($_POST['destiny'])) {
                                    echo 'style="display:block;"';
                                } ?>>
            <?php if (!isset($_SESSION['count-hotels']) && !isset($_POST['destiny'])) { ?>
                <h2 style="text-align: center; width: 100%; margin: 50px 0 10px 0; color: #403027;">Selecione o Local para Onde Deseja Viajar!!!</h2>
                <p style="text-align:center; font-size: 0.9rem; color:#8e644b;">Clique no Campo <b>Location</b> no Canto Superior Esquerdo e <br> Explore as Nossas Opções.</p>
                <?php } else {
                if (isset($_POST['destiny'])) {
                    if ($rooms->listHotels($_POST['destiny']) == false) {
                        $homeModel->messageBook("error", "Falha na Reserva", "Erro ao buscar os resultados. Tente novamente mais tarde.");
                        return false;
                    } else {
                        $_SESSION['destiny'] = $_POST['destiny'];
                        $_SESSION['rooms'] = $rooms->listHotels(strip_tags($_POST['destiny']));

                        foreach ($_SESSION['rooms'] as $value) {
                ?>
                            <div class="hotels-box">
                                <div class="hotels-img">
                                    <figure><img src="<?php echo $value[5]; ?>" alt="Foto do Hotel" srcset=""></figure>
                                    <button type="submit" class="favorite">
                                        <?php if(!$host->verifyFavoriteHotel($value[6])){ ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart">
                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                            </svg>
                                        <?php }else{ ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-off"><line x1="2" y1="2" x2="22" y2="22"/><path d="M16.5 16.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5a5.5 5.5 0 0 1 2.14-4.35"/>
                                            <path d="M8.76 3.1c1.15.22 2.13.78 3.24 1.9 1.5-1.5 2.74-2 4.5-2A5.5 5.5 0 0 1 22 8.5c0 2.12-1.3 3.78-2.67 5.17"/></svg>
                                        <?php } ?>
                                    </button>
                                </div>

                                <div class="hotels-description">
                                    <h3 class="tittle-name-hotel"><?php echo $value[0]; ?></h3>
                                    <p class="location-hotel"><?php echo $value[1] . " - " . $value[2]; ?></p>
                                    <div class="classification">
                                        <?php
                                            echo '<span style="font-size: 0.9rem;"><svg style="vertical-align: middle; position: relative; top: -3px;" xmlns="http://www.w3.org/2000/svg" 
                                            width="20" height="20" viewBox="0 0 24 24" fill="#ffc400" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1
                                             .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 
                                             0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg> 
                                             '.$value[8].'</span>';
                                        ?>
                                    </div>
                                    <p class="visitors">(1219 Visitantes)</p>
                                    <br>
                                    <span class="pricesHotel" style="margin-top: 15px; display: inline-block;"><b>R$ <?php echo $value[7].",00"; ?></b> por noite</span>
                                </div>

                                <div class="btn-hotel">
                                    <a target="_blank" href="<?php echo PATH_PAGES; ?>hospedagem?<?php echo $value[6] ?>">Explorar Quarto <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left: 2px;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double">
                                            <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                                            <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                                            <path d="M12 4v6" />
                                            <path d="M2 18h20" />
                                        </svg></a>
                                </div>
                                <input type="hidden" name="hotel" id="hotel_id" value="<?php echo $value[6] ?>">
                            </div><!-- /.hotels-box -->
                        <?php } // FIM DO FOREACH
                    } // FIM DO ELSE DO MÉTODO LIST HOTELS
                } // FIM DO IF DO POST DESTINY
                else {
                    if(isset($_SESSION['rooms'])) {
                        $_SESSION['rooms'] = $rooms->listHotels(strip_tags($_SESSION['destiny']));

                        foreach ($_SESSION['rooms'] as $value) {
                        ?>
                            <div class="hotels-box">
                                <div class="hotels-img">
                                    <figure><img src="<?php echo $value[5]; ?>" alt="Foto do Hotel" srcset=""></figure>
                                    <button class="favorite">
                                        <?php if(!$host->verifyFavoriteHotel($value[6])){ ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart">
                                                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                                </svg>
                                            <?php }else{ ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-off"><line x1="2" y1="2" x2="22" y2="22"/><path d="M16.5 16.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5a5.5 5.5 0 0 1 2.14-4.35"/>
                                                <path d="M8.76 3.1c1.15.22 2.13.78 3.24 1.9 1.5-1.5 2.74-2 4.5-2A5.5 5.5 0 0 1 22 8.5c0 2.12-1.3 3.78-2.67 5.17"/></svg>
                                            <?php } ?>
                                    </button>
                                </div>

                                <div class="hotels-description">
                                    <h3 class="tittle-name-hotel"><?php echo $value[0]; ?></h3>
                                    <p class="location-hotel"><?php echo $value[1] . " - " . $value[2]; ?></p>
                                    <div class="classification">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; position:relative; top: -3px;" width="20" height="20" fill="#ffc400" viewBox="0 0 24 24" fill="none" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg></span>
                                    </div>
                                    <p class="visitors">(1219 Visitantes)</p>
                                </div>

                                <div class="btn-hotel">
                                    <a target="_blank" href="<?php echo PATH_PAGES; ?>hospedagem?<?php echo $value[6] ?>">Explorar Quarto <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left: 2px;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double">
                                            <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                                            <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                                            <path d="M12 4v6" />
                                            <path d="M2 18h20" />
                                        </svg></a>
                                </div>

                                <input type="hidden" name="hotel" id="hotel_id" value="<?php echo $value[6] ?>">
                            </div><!-- /.hotels-box -->
            <?php } // FIM DO FOREACH
                    } // FIM DO ELSE DO MÉTODO LISTHOTELS
                }
            } //FIM DO ELSE DA SESSIO COUNT-HOTELS 
            ?>
        </div><!-- /.hotels-wp -->
    </div><!-- /.container -->
</main>