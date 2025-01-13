<?php 
    use Model\HospedagemModel;
    $host = new HospedagemModel();
    $dataHotel = $host->getHotelById();
?>
<body>
    <section class="hotel">
        <div class="container">
            <nav class="hotel-tittle">
                <h2><?php echo $dataHotel["Nome"]; ?></h2>
                
                <div class="btn-actions-tittle">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg> Compartilhar</a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg> Salvar</a>
                </div><!-- /.btn-actions-tittle -->
            </nav>

            <section class="img-hotel">
                <figure class="img-main"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="" srcset=""></figure>
               <div class="img-hotel-complements">
                    <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="" srcset=""></figure>
                    <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="" srcset=""></figure>
                    <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="" srcset=""></figure>
                    <figure class="img-complement"><img src="<?php echo $dataHotel["Img"][0]; ?>" alt="" srcset=""></figure>
               </div>
            </section>

            <div class="hotel-description">
                <h3 class="desc-main">1 Pousada em <?php echo $dataHotel["Cidade"].", ".$dataHotel["Pais"]; ?></h3>
                <p class="description"><?php echo $dataHotel["Descricao"]; ?></p>

                <div class="classification">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#403027" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg> <?php echo $dataHotel["Classificacao"].",0"; ?> ° </span>
                    <a href="#"><?php echo count($dataHotel["Avaliacoes"])." Comentários"; ?></a>
                </div>
            </div><!-- /.hotel-description -->

            <section class="sessao-info-hotel">
                <div class="info-hotel">
                    <div class="user-info section-description-hotel">
                        <figure class="pic-profile"><img src="" alt="" sizes="" srcset=""></figure>
                        <p class="name">Alberto Andrade <br> <span>SuperHost: 4 Anos Hospedando</span></p>
                        
                    </div><!-- /.user-info -->

                    <div class="amenidades section-description-hotel">
                        <h3 class="tittle-info-hotel">O que este lugar te oferece?</h3>

                        <div class="amenidades-wp">
                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double"><path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/><path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/><path d="M12 4v6"/><path d="M2 18h20"/></svg></figure>
                                <p>Cama de Casal</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tree-palm"><path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4"/><path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3"/><path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35"/><path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14"/></svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wifi"><path d="M12 20h.01"/><path d="M2 8.82a15 15 0 0 1 20 0"/><path d="M5 12.859a10 10 0 0 1 14 0"/><path d="M8.5 16.429a5 5 0 0 1 7 0"/></svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double"><path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/><path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/><path d="M12 4v6"/><path d="M2 18h20"/></svg></figure>
                                <p>Cama de Casal</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tree-palm"><path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4"/><path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3"/><path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35"/><path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14"/></svg></figure>
                                <p>Tranca na Porta do Quarto</p>
                            </div><!-- /.amenidades-box -->

                            <div class="amenidades-box">
                                <figure class="icon-amenidades"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wifi"><path d="M12 20h.01"/><path d="M2 8.82a15 15 0 0 1 20 0"/><path d="M5 12.859a10 10 0 0 1 14 0"/><path d="M8.5 16.429a5 5 0 0 1 7 0"/></svg></figure>
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
                                <figure class="icon-proximidades"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plane"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"/></svg></figure>
                                <p>Aeroporto</p><br>
                                <span>50m</span>
                            </div><!-- /.proximidades-hotel-box -->

                            <div class="proximidades-hotel-box">
                                <figure class="icon-proximidades"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tree-palm"><path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4"/><path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3"/><path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35"/><path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14"/></svg></figure>
                                <p>Praia</p><br>
                                <span>50m</span>
                            </div><!-- /.proximidades-hotel-box -->

                            <div class="proximidades-hotel-box">
                                <figure class="icon-proximidades"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-store"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/></svg></figure>
                                <p>Lojas Locais</p><br>
                                <span>50m</span>
                            </div><!-- /.proximidades-hotel-box -->
                        </div><!-- /.proximidades-hotel-wp -->
                    </div><!-- /.proximidades-hotel -->
                </div><!-- /.info-hotel -->

                <div class="info-check">
                    <section class="info-checks-user">
                        <div class="info-user">
                            <a href="#" class="check-in">
                                <span>Check-in</span>
                                <p class="date-check-in-user">12/01/2025</p>
                            </a>

                            <a href="#" class="check-out">
                                <span>Check-out</span>
                                <p class="date-check-out-user">12/02/2025</p>
                            </a>

                            <a href="#" class="host">
                                <span>Hóspedes</span><br>
                                <p class="date-check-in-user">1 Hospede</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                            </a>
                        </div><!-- /.info-user -->
                        
                        <span class="aviso"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg> Estas datas não estão disponíveis</span>

                        <button type="submit">Realizar Reserva</button>
                    </section>

                    <div class="box-aviso-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <h4>Você só tem 7 horas para realizar uma reserva</h4>
                        <p>O anfitrião vai parar em breve de aceitar reservas para as datas que você selecionou.</p>
                    </div> <!-- /.box-aviso-info -->

                    <a href="#" target="_blank" rel="noopener noreferrer" class="denuncia"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg> Denunciar Abuso</a>
                </div><!-- /.info-check -->
            </section>
        </div><!-- /.container -->        
    </section>

    <section class="avaliacoes">
        <div class="container">
            <h2 class="avaliacoes-tittle"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg> <?php echo $dataHotel["Classificacao"].",0 ° ".count($dataHotel["Avaliacoes"])." Comentários"; ?></h2>

            <div class="coments">
                <?php 
                    for ($i=0; $i < count($dataHotel["Avaliacoes"]); $i++) { 
                ?>
                    <div class="coments-box">
                        <div class="coments-box-top">
                            <figure class="picture-profile"><img src="" alt="" srcset=""></figure>
                            <p><?php echo $dataHotel["Avaliacoes"]["comentarios"][$i]["cliente"]; ?> <br><span>5 anos no Airbnb</span></p>
                        </div><!-- /.coments-box-top -->

                        <div class="coments-box-description">
                            <span class="stars">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#55331f" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#55331f" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#55331f" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#55331f" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                        </span>
                            <span class="data">agosto de 2023</span>
                            <span class="periodo">Ficou duas noites</span>

                            <p><?php echo $dataHotel["Avaliacoes"]["comentarios"][$i]["comentario"]; ?> </p>
                                <br>
                            <!-- <a href="#">Mostrar mais</a> -->
                        </div>
                        <!-- /.coments-box-description -->
                        
                    </div><!-- /.coments-box -->
                <?php } ?>
            </div><!-- /.coments -->
        </div><!-- /.container -->
        
    </section>

</body>