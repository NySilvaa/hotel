<?php
    use Model\SavedHotelsModel;
    $savedHotels = new SavedHotelsModel();
    $hotelsSavedByUser = $savedHotels->getHotelsSavedByUser();
?>
<section class="info-user">
    <div class="container">
        <h2 class="tittle-main"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; position:relative; top: -4px;" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hotel"><path d="M10 22v-6.57"/><path d="M12 11h.01"/><path d="M12 7h.01"/><path d="M14 15.43V22"/><path d="M15 16a5 5 0 0 0-6 0"/><path d="M16 11h.01"/><path d="M16 7h.01"/><path d="M8 11h.01"/><path d="M8 7h.01"/><rect x="4" y="2" width="16" height="20" rx="2"/></svg> Hoteis Salvos</h2>

        <div class="saved-hotels-wp" <?php echo ($hotelsSavedByUser == 0) ? 'style="display: block"' : 'style="display: grid; grid-template-columns: repeat(3, 1fr);"'; ?>>
            
            <?php if($hotelsSavedByUser == 0){ ?>
                    <div class="hotels-empty">
                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 24 24" style="margin-bottom: 20px;" fill="none" stroke="#8e644b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hotel"><path d="M10 22v-6.57"/><path d="M12 11h.01"/><path d="M12 7h.01"/><path d="M14 15.43V22"/><path d="M15 16a5 5 0 0 0-6 0"/><path d="M16 11h.01"/><path d="M16 7h.01"/><path d="M8 11h.01"/><path d="M8 7h.01"/><rect x="4" y="2" width="16" height="20" rx="2"/></svg>
                        <h3 class="tittle-empty-hotels-saved">Você ainda não possui hoteis salvos</h3>
                        <p class="desc-main">Explore o nosso site e descubra hoteis que vão agradar a você</p>
                        <p class="desc-second">Clique no botão abaixo para ir para a seção de Rooms e verificar nossos quartos disponíveis</p>
                        <a class="secao-rooms" href="<?php echo PATH_PAGES; ?>rooms/"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="vertical-align: middle;position: relative; top: -1px;"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double"><path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/><path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/><path d="M12 4v6"/><path d="M2 18h20"/></svg> Seção Rooms</a>
                    </div><!-- /.hotels-empty -->
            <?php }else{
                foreach ($hotelsSavedByUser as $value) { ?>
                    <div class="hotels-box">
                        <div class="hotels-img">
                            <figure><img src="<?php echo $value[1]; ?>" alt="Foto do Hotel" srcset=""></figure>
                            <button class="favorite"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" fill="currentColor" width="18" height="18" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart">
                                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                </svg></button>
                        </div>

                        <div class="hotels-description">
                            <h3 class="tittle-name-hotel"><?php echo $value[2]; ?></h3>
                            <p class="location-hotel"><?php echo $value[3] . " - " .$value[4]; ?></p>
                            <div class="classification">
                                <span style="color: #6a4835;"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; position:relative; top: -3px;" width="20" height="20" fill="#ffc400" viewBox="0 0 24 24" fill="none" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1
                                    .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg> <?php echo $value[5] ?></span>
                            </div>
                        </div>

                        <p class="price" style="margin: 10px 5px; color:rgb(79, 55, 42);"><b>R$ <?php echo $value[6]; ?>, 00</b> por noite</p>

                        <div class="btn-hotel">
                            <a target="_blank" href="<?php echo PATH_PAGES."hospedagem?".$value[0]; ?>">Visualizar Hotel <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left: 2px;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double">
                                    <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                                    <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                                    <path d="M12 4v6" />
                                    <path d="M2 18h20" />
                                </svg></a>
                        </div>

                        <input type="hidden" name="hotel" id="hotel_id" value="<?php echo $value[0]; ?>">
                    </div><!-- /.hotels-box -->
                <?php }}?>
        </div><!-- /.saved-hotels-wp -->
        <br><br><br><br><br><br><br>
    </div><!-- /.container -->
</section>
</main>

<script defer src="<?php echo PATH_INTERATIONS;?>js/func.userPatnerPage.js"></script>