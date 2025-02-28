<?php

use Model\HomeModel;
use Model\HospedagemModel;
use Model\RoomsModel;

$host = new HospedagemModel();
$dataHotel = $host->getHotelById();
$homeModel = new HomeModel();

$rooms = new RoomsModel();
$idHotel = '';

foreach ($_GET as $key => $value) {
    if ($key !== 'url')
        $idHotel = $key;
}
?>

<body>
    <section id="favorite-section">
        <?php
        if (isset($_POST['hotel_id'])) {
            $hotelId = json_decode($rooms->favoriteHotel());
            echo '<input type="hidden" name="status" value="' . $hotelId->status . '" />';

            if ($hotelId->status == 'added')
                $homeModel->messageBook('success', "Hotel Salvo com Sucesso", "Acesse sua User Page p/ verificar os seus hotéis salvos");
            else if ($hotelId->status == 'removed')
                $homeModel->messageBook('success', "Hotel Removido com Sucesso", "Salve novos hotéis para visitá-los depois");
            else if ($hotelId->status == "error") {
                echo "<script>location.href = 'http://localhost/hotel/login/'</script>";
                die();
            }
        }?>
    </section>

    <section class="book">
        <?php 
            if(isset($_POST["Check-in"])){
                if($host->bookHotel())
                    $homeModel->messageBook("success", "Reserva Efetuada com Sucesso", "Confira na sua User Page demais informações");
            }
        ?> 
    </section><!--book-->

    <div class="loading-book-wp">
        <div class="hourglassBackground">
            <div class="hourglassContainer">
                <div class="hourglassCurves"></div>
                <div class="hourglassCapTop"></div>
                <div class="hourglassGlassTop"></div>
                <div class="hourglassSand"></div>
                <div class="hourglassSandStream"></div>
                <div class="hourglassCapBottom"></div>
                <div class="hourglassGlass"></div>
            </div>
            </div>
    </div><!--loading-book-wp-->

    <section class="hotel">
        <div class="container">
            <div class="card-confirmation-wp">
                <button class="close-card-confirmation"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
                
                <div class="card-confirmation">
                    <section class="landscape-section">
                        <figure class="img-card-confirmation"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="Imagem do Hotel - Card de Confirmação"></figure>
                    </section>

                    <section class="content-section">
                        <div class="weather-info">
                            <div class="left-side">
                                <div class="icon">
                                    <svg
                                        stroke="#000000"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24">
                                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                        <g
                                            stroke-linejoin="round"
                                            stroke-linecap="round"
                                            id="SVGRepo_tracerCarrier"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                stroke-linecap="round"
                                                stroke-width="1.5"
                                                stroke="#ffffff"
                                                d="M22 14.3529C22 17.4717 19.4416 20 16.2857 20H11M14.381 9.02721C14.9767 8.81911 15.6178 8.70588 16.2857 8.70588C16.9404 8.70588 17.5693 8.81468 18.1551 9.01498M7.11616 11.6089C6.8475 11.5567 6.56983 11.5294 6.28571 11.5294C3.91878 11.5294 2 13.4256 2 15.7647C2 18.1038 3.91878 20 6.28571 20H7M7.11616 11.6089C6.88706 10.9978 6.7619 10.3369 6.7619 9.64706C6.7619 6.52827 9.32028 4 12.4762 4C15.4159 4 17.8371 6.19371 18.1551 9.01498M7.11616 11.6089C7.68059 11.7184 8.20528 11.9374 8.66667 12.2426M18.1551 9.01498C18.8381 9.24853 19.4623 9.60648 20 10.0614"></path>
                                        </g>
                                    </svg>
                                </div>
                                <p>Cloudy</p>
                            </div>
                            <div class="right-side">
                                <div class="location">
                                    <div>
                                        <svg
                                            version="1.0"
                                            id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="64px"
                                            height="64px"
                                            viewBox="0 0 64 64"
                                            xml:space="preserve"
                                            fill="#ffffff"
                                            stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g
                                                id="SVGRepo_tracerCarrier"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    fill="#ffffff"
                                                    d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path>
                                            </g>
                                        </svg>
                                        <span class="country-card-confirmation"><?php echo $dataHotel["Pais"]; ?></span>
                                    </div>
                                </div>
                                <p class="date-card-confirmation">Monday, 4th May</p>
                                <p class="temperature">24°C</p>
                            </div>
                        </div>

                        <div class="forecast">
                            <div class="info-order">
                                <p>Check In</p>
                                <p class="check-in-confirmation"></p>
                                <input type="hidden" name="check-in-confirmation" id="check-in-confirmation-value" value="">
                            </div>
                            <div class="separator"></div>
                            <div class="info-order">
                                <p>Check Out</p>
                                <p class="check-out-confirmation"></p>
                                <input type="hidden" name="check-out-confirmation" id="check-out-confirmation-value" value="">
                            </div>
                            <div class="separator"></div>
                            <div class="info-order">
                                <p>Person</p>
                                <p class="person-confirmation"></p>
                                <input type="hidden" name="person-confirmation" id="person-confirmation-value" value="">
                            </div>
                            <div class="separator"></div>
                            <div class="info-order">
                                <p>Night</p>
                                <p class="nights-confirmation"></p>
                                <input type="hidden" name="nights-confirmation" id="nights-confirmation-value" value="">
                            </div>
                            <div class="separator"></div>
                            <div class="info-order">
                                <p>Valor c/ impostos</p>
                                <p class="prize-confirmation"></p>
                                <input type="hidden" name="prize-final-confirmation" id="prize-final-confirmation-value" value="">
                            </div>
                            <div class="separator"></div>
                            <div>
                                <button class="finishOrder" type="submit" name="finishOrder">Finalizar Pedido</button>
                            </div>
                        </div>
                    </section>
                </div><!--card-confirmation-->
            </div><!-- /.card-confirmation-wp -->

            <nav class="hotel-tittle">
                <h2><?php echo $dataHotel["Nome"]; ?></h2>

                <div class="btn-actions-tittle">
                    <a href="#" class="btn-share"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-share">
                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                            <polyline points="16 6 12 2 8 6" />
                            <line x1="12" x2="12" y1="2" y2="15" />
                        </svg> Compartilhar</a>
                    <button type="submit" class="favorite">
                        <?php if(!$host->verifyFavoriteHotel($idHotel)){ ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                            </svg> Favoritar
                        <?php }else{ ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-off"><line x1="2" y1="2" x2="22" y2="22"/><path d="M16.5 16.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5a5.5 5.5 0 0 1 2.14-4.35"/>
                                <path d="M8.76 3.1c1.15.22 2.13.78 3.24 1.9 1.5-1.5 2.74-2 4.5-2A5.5 5.5 0 0 1 22 8.5c0 2.12-1.3 3.78-2.67 5.17"/>
                            </svg> Desfavoritar
                        <?php } ?>
                    </button>
                </div><!-- /.btn-actions-tittle -->
            </nav>

            <section class="img-hotel">
                <a href="<?php echo $dataHotel["Img"][0]; ?>" data-fancybox="gallery" data-caption="Caption #1">
                    <figure class="img-main"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="" srcset=""></figure>
                </a>

                <div class="img-hotel-complements">
                    <div class="img-complements-box">
                        <a href="<?php echo $dataHotel["Img"][1]; ?>" data-fancybox="gallery" data-caption="Caption #2">
                            <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][1]; ?>" alt="" srcset=""></figure>
                        </a>
                        <a href="<?php echo $dataHotel["Img"][2]; ?>" data-fancybox="gallery" data-caption="Caption #3">
                            <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][2]; ?>" alt="" srcset=""></figure>
                        </a>
                    </div>

                    <div class="img-complements-box">
                        <a href="<?php echo $dataHotel["Img"][3]; ?>" data-fancybox="gallery" data-caption="Caption #4">
                            <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][3]; ?>" alt="" srcset=""></figure>
                        </a>
                        <a href="<?php echo $dataHotel["Img"][0]; ?>" data-fancybox="gallery" data-caption="Caption #5">
                            <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="" srcset=""></figure>
                        </a>
                    </div>
                </div>
                <a href="#" class="btn-img-hotel-complements" <?php echo (count($dataHotel["Img"]) > 4) ? 'style="display: inline-block;"' : 'style="display: none;"'; ?>>Visualizar mais imagens</a>
            </section>

            <div class="hotel-description">
                <h3 class="desc-main">1 Pousada em <?php echo $dataHotel["Cidade"] . ", " . $dataHotel["Pais"]; ?></h3>
                <p class="description"><?php echo $dataHotel["Descricao"]; ?></p>

                <div class="classification">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#403027" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 
                    1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 
                    21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z" />
                        </svg> <?php echo $dataHotel["Avaliacoes"]["media"]; ?> ° </span>
                    <a href="#comentarios"><?php echo count($dataHotel["Avaliacoes"]["comentarios"]) . " Comentários"; ?></a>
                </div>
            </div><!-- /.hotel-description -->

            <section class="sessao-info-hotel">
                <div class="info-hotel">
                    <div class="user-info section-description-hotel">
                        <figure class="pic-profile"><img src="<?php echo PATH_INTERATIONS; ?>images/profile/profile1.png" alt="" sizes="" srcset=""></figure>
                        <p class="name">Alberto Andrade <br> <span>SuperHost: 4 Anos Hospedando</span></p>

                    </div><!-- /.user-info -->

                    <div class="amenidades section-description-hotel">
                        <h3 class="tittle-info-hotel">O que este lugar te oferece?</h3>

                        <div class="amenidades-wp">
                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double">
                                        <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                                        <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                                        <path d="M12 4v6" />
                                        <path d="M2 18h20" />
                                    </svg></figure>
                                <p>Cama de Casal</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tree-palm">
                                        <path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4" />
                                        <path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3" />
                                        <path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35" />
                                        <path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14" />
                                    </svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wifi">
                                        <path d="M12 20h.01" />
                                        <path d="M2 8.82a15 15 0 0 1 20 0" />
                                        <path d="M5 12.859a10 10 0 0 1 14 0" />
                                        <path d="M8.5 16.429a5 5 0 0 1 7 0" />
                                    </svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double">
                                        <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                                        <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                                        <path d="M12 4v6" />
                                        <path d="M2 18h20" />
                                    </svg></figure>
                                <p>Cama de Casal</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tree-palm">
                                        <path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4" />
                                        <path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3" />
                                        <path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35" />
                                        <path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14" />
                                    </svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wifi">
                                        <path d="M12 20h.01" />
                                        <path d="M2 8.82a15 15 0 0 1 20 0" />
                                        <path d="M5 12.859a10 10 0 0 1 14 0" />
                                        <path d="M8.5 16.429a5 5 0 0 1 7 0" />
                                    </svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->
                        </div><!-- /.amenidades-wp -->
                    </div><!-- /.amenidades -->

                    <div class="sobre-hotel section-description-hotel">
                        <h3 class="tittle-info-hotel">Sobre Este Lugar</h3>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore minus autem ipsum laboriosam aliquam placeat libero nam, repellat, dolorum eaque ducimus recusandae hic temporibus sed excepturi officiis quidem. Suscipit, quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit sint debitis, dignissimos commodi nihil aspernatur ipsa est omnis quis quam dolores architecto aliquid! Dolor officia officiis nemo, nam eos ut.</p>
                    </div><!-- /.sobre-hotel -->

                    <div class="proximidades-hotel section-description-hotel">
                        <h3 class="tittle-info-hotel">Este Hotel é Proximo de:</h3>

                        <div class="proximidades-hotel-wp">
                            <div class="proximidades-hotel-box">
                                <figure class="icon-proximidades"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plane">
                                        <path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z" />
                                    </svg></figure>
                                <p>Aeroporto</p><br>
                                <span>50m</span>
                            </div><!-- /.proximidades-hotel-box -->

                            <div class="proximidades-hotel-box">
                                <figure class="icon-proximidades"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tree-palm">
                                        <path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4" />
                                        <path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3" />
                                        <path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35" />
                                        <path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14" />
                                    </svg></figure>
                                <p>Praia</p><br>
                                <span>50m</span>
                            </div><!-- /.proximidades-hotel-box -->

                            <div class="proximidades-hotel-box">
                                <figure class="icon-proximidades"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-store">
                                        <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7" />
                                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                                        <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4" />
                                        <path d="M2 7h20" />
                                        <path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7" />
                                    </svg></figure>
                                <p>Lojas Locais</p><br>
                                <span>50m</span>
                            </div><!-- /.proximidades-hotel-box -->
                        </div><!-- /.proximidades-hotel-wp -->
                    </div><!-- /.proximidades-hotel -->
                </div><!-- /.info-hotel -->

                <div class="info-check">
                    <section class="info-books">
                        <h3 class="info-books-tittle"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; position: relative; top: -2px;" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-hat">
                                <path d="M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5" />
                                <path d="M14 6a6 6 0 0 1 6 6v3" />
                                <path d="M4 15v-3a6 6 0 0 1 6-6" />
                                <rect x="2" y="15" width="20" height="4" rx="1" />
                            </svg> Informações p/ a Reserva </h3>
                        <form action="" method="post">
                            <div class="wave-group">
                                <input required="" type="text" class="input" id="check-in-info-book">
                                <span class="bar"></span>
                                <label class="label">
                                    <span class="label-char" style="--index: 0">C</span>
                                    <span class="label-char" style="--index: 1">h</span>
                                    <span class="label-char" style="--index: 2">e</span>
                                    <span class="label-char" style="--index: 3">c</span>
                                    <span class="label-char" style="--index: 4">k</span>
                                    <span class="label-char" style="--index: 5">-</span>
                                    <span class="label-char" style="--index: 6">I</span>
                                    <span class="label-char" style="--index: 7">n</span>
                                </label>
                            </div><!--wave-group-->

                            <div class="wave-group">
                                <input required="" type="text" class="input" id="check-out-info-book">
                                <span class="bar"></span>
                                <label class="label">
                                    <span class="label-char" style="--index: 0">C</span>
                                    <span class="label-char" style="--index: 1">h</span>
                                    <span class="label-char" style="--index: 2">e</span>
                                    <span class="label-char" style="--index: 3">c</span>
                                    <span class="label-char" style="--index: 4">k</span>
                                    <span class="label-char" style="--index: 5">-</span>
                                    <span class="label-char" style="--index: 6">O</span>
                                    <span class="label-char" style="--index: 7">u</span>
                                    <span class="label-char" style="--index: 7">t</span>
                                </label>
                                </label>
                            </div><!--wave-group-->

                            <div class="wave-group">
                                <input required="" type="text" class="input" id="person-info-book">
                                <span class="bar"></span>
                                <label class="label">
                                    <span class="label-char" style="--index: 0">P</span>
                                    <span class="label-char" style="--index: 1">e</span>
                                    <span class="label-char" style="--index: 2">r</span>
                                    <span class="label-char" style="--index: 3">s</span>
                                    <span class="label-char" style="--index: 4">o</span>
                                    <span class="label-char" style="--index: 5">n</span>
                                </label>
                            </div><!--wave-group-->

                            <div class="wave-group">
                                <input required="" type="text" class="input" id="nights-info-book">
                                <span class="bar"></span>
                                <label class="label">
                                    <span class="label-char" style="--index: 0">N</span>
                                    <span class="label-char" style="--index: 1">i</span>
                                    <span class="label-char" style="--index: 2">g</span>
                                    <span class="label-char" style="--index: 3">h</span>
                                    <span class="label-char" style="--index: 3">t</span>
                                </label>
                            </div><!--wave-group-->

                            <button class="next-step-book">Prosseguir com a Reserva</button>
                        </form>
                    </section><!-- /.info-books -->

                    <section class="info-checks-user">
                        <div class="info-user">
                            <a href="#" class="check-in">
                                <span>Check-in</span>
                                <p class="date-check-in-user"><?php echo (isset($_SESSION["date-check-in"])) ? $_SESSION["date-check-in"] : "dd/mm/aaaa"; ?></p>
                            </a>

                            <a href="#" class="check-out">
                                <span>Check-out</span>
                                <p class="date-check-out-user"><?php echo (isset($_SESSION["date-check-out"])) ? $_SESSION["date-check-out"] : "dd/mm/aaaa"; ?></p>
                            </a>

                            <a href="#" class="host">
                                <span>Hóspedes</span><br>
                                <p class="date-check-in-user">1 Hospede</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </a>
                        </div><!-- /.info-user -->

                        <!-- <span class="aviso"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg> Estas datas não estão disponíveis</span> -->

                        <button id="efetuar-reserva" type="submit">Iniciar Reserva</button>

                        <div class="precificacao-box">
                            <a href="#" class="prizePerNights"><b>R$ <?php echo $dataHotel["Preco"]; ?>,00 </b> por noite</a>
                            <span class="prizeHalf"><?php echo (isset($_SESSION["prizePerNight"])) ? $_SESSION["prizerPerNight"] : "R$ " . $dataHotel["Preco"] . ",00"; ?></span>

                            <div class="prizeFinal">
                                <p>Total Sem Impostos</p>
                                <span><?php echo (isset($_SESSION["prizePerNight"])) ? $_SESSION["prizerPerNight"] : "R$ " . $dataHotel["Preco"] . ",00"; ?></span>
                            </div>
                        </div>
                    </section>

                    <div class="box-aviso-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <h4>Você só tem 7 horas para realizar uma reserva</h4>
                        <p>O anfitrião vai parar em breve de aceitar reservas para as datas que você selecionou.</p>
                    </div> <!-- /.box-aviso-info -->

                    <a href="#" target="_blank" rel="noopener noreferrer" class="denuncia"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flag">
                            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
                            <line x1="4" x2="4" y1="22" y2="15" />
                        </svg> Denunciar Abuso</a>
                </div><!-- /.info-check -->
            </section>

            <input type="hidden" name="hotel" id="hotel_id" value="<?php echo $idHotel; ?>">
        </div><!-- /.container -->
    </section>

    <section class="avaliacoes" id="comentarios">
        <div class="container">
            <h2 class="avaliacoes-tittle"><svg xmlns="http://www.w3.org/2000/svg" fill="#55331f" width="28" height="28" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z" />
                </svg> <?php echo $dataHotel["Avaliacoes"]["media"] . " ° " . count($dataHotel["Avaliacoes"]["comentarios"]) . " Comentários"; ?></h2>

            <div class="coments">
                <?php
                $comentarios = $dataHotel["Avaliacoes"]["comentarios"];
                foreach ($comentarios as $key => $value) {
                ?>
                    <div class="coments-box">
                        <div class="coments-box-top">
                            <figure class="picture-profile"><img src="" alt="" srcset=""></figure>
                            <p><?php echo $value["cliente"] ?> <br><span>5 anos no Airbnb</span></p>
                        </div><!-- /.coments-box-top -->

                        <div class="coments-box-description">
                            <span class="stars"><?php $host->addStarsBasedByOpinion($value["nota"]); ?></span>
                            <span class="data">agosto de 2023</span>
                            <span class="periodo">Ficou duas noites</span>

                            <p><?php echo $value["comentario"] ?> </p>
                            <br>
                        </div>
                        <!-- /.coments-box-description -->

                    </div><!-- /.coments-box -->
                <?php } ?>
            </div><!-- /.coments -->
        </div><!-- /.container -->

    </section>
</body>