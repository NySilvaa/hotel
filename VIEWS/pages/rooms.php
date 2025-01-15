<?php
   use \Model\HomeModel;
   use \Model\RoomsModel;

   $homeModel = new HomeModel();
    $rooms = new RoomsModel();
?>

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
                                        if(!isset($_GET['paisEscolhido'])){
                                            // O USUÁRIO ESTÁ NA PRIMEIRA ETAPA AINDA
                                            if($rooms->listCountry() === false){
                                                // DEU ERRO AO ESCOLHER O PAÍS
                                                $homeModel->messageBook("error", "País Inválido", "Houve um Erro ao Selecionar o País para a sua Reserva");
                                                return false;
                                            }else{
                                             $roomsCountrys = $rooms->listCountry();

                                             foreach ($roomsCountrys as $key => $value) {
                                    ?>
                                        <li><figure><img src="<?php echo $value[2]; ?>" alt="" srcset=""></figure><?php echo $value[1]; ?> (<?php echo $value[0]; ?>)</li>
                                    <?php 
                                       } }} // FIM DO FOREACH E DO IF
                                        else{
                                            $paisEscolhido = strip_tags($_GET['paisEscolhido']);
                                            $paisEscolhido = $paisEscolhido.str_replace("%20", " ", $paisEscolhido);
                                            $paisFormatado = "";

                                            for ($i=0; $i < $paisEscolhido; $i++) { 
                                                // PEGA APENAS O NOME DO PAÍS, SEM A SIGLA
                                                if($paisEscolhido[$i] == "(")
                                                    break;

                                                $paisFormatado .= $paisEscolhido[$i];
                                            }

                                            $paisFormatado = trim($paisFormatado); // DEIXA TUDO EM MINÚSCULO E REMOVE OS ESPAÇOS EM BRANCO DO INÍCIO E DO FIM
                                            if($rooms->listCitys($paisFormatado) === false){
                                                $homeModel->messageBook("error", "Cidade Inválida", "Houve um Erro ao Selecionar a Cidade para a sua Reserva");
                                                return false;
                                            }else{
                                                $roomsCitys = $rooms->listCitys(ucfirst($paisFormatado));
                                                 foreach ($roomsCitys as $key => $value) { ?>
                                                <li><figure><img src="<?php echo $value[3] ?>" alt="" srcset=""></figure> <?php echo strtoupper($value[0]); ?></li>
                                      <?php }}}?>
                                </ul>
                                </div>
                            </div>
                        </div>
                            <button class="purchase--btn" name="findOutDestiny">Verificar Lugares Disponíveis</button>
                        </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="person" class="book-title">Person</label>
                <input type="text" id="person" name="person" placeholder="Choose the Count"  value="<?php 
                                    if(!isset($_POST['count-person']))
                                        echo (isset($_SESSION['count'])) ? $_SESSION['count'] : 1;
                                    else
                                        echo recoverPost('count-person-field'); 
                                    ?> Person"/>

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
                                    if(!isset($_POST['count-person']))
                                        echo (isset($_SESSION['count'])) ? $_SESSION['count'] : 1;
                                    else
                                        echo recoverPost('count-person-field');
                            ?> Pessoas</button>
                        </form>
                </div>
            </div><!-- /.data-book-box -->

            <div class="data-book-box">
                <label for="check-in" class="book-title">Check-in</label>
                <input type="text" id="check-in" name="check-in" placeholder="Check-in Date" value="<?php echo (isset($_SESSION['date-check-in'])) ? $_SESSION['date-check-in'] : date('d/m/Y'); ?>"/>

                <div id="calendar"></div>
            </div><!-- /.data-book-box -->
            
            <div class="data-book-box">
                <label for="check-out" class="book-title">Check-out</label>
                <input type="text" id="check-out" name="check-out" placeholder="Check-out Date" value="<?php echo (isset($_SESSION['date-check-out'])) ? $_SESSION['date-check-out'] : date('d/m/Y', time() + (60*60*24*30)); ?>"">

                <div id="calendar"></div>
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
            if(isset($_SESSION['count-hotels'])){ ?>
                <h2 class="hotels--title">Hotels in <p><?php echo recoverPost('destiny'); ?></p></h2>
                <span class="count-hotels">Foram encontrados <p><?php echo 4; ?></p> Premium Hotels</span>
        <?php  }?>

        <div class="hotels-wp"  <?php if(!isset($_SESSION['count-hotels']) && !isset($_POST['destiny'])){echo 'style="display:block;"'; }?>>
            <?php if(!isset($_SESSION['count-hotels']) && !isset($_POST['destiny'])){ ?>
                    <h2 style="text-align: center; width: 100%; margin: 50px 0 10px 0; color: #403027;">Selecione o Local para Onde Deseja Viajar!!!</h2>
                    <p style="text-align:center; font-size: 0.9rem; color:#8e644b;">Clique no Campo <b>Location</b> no Canto Superior Esquerdo e <br> Explore as Nossas Opções.</p>
            <?php }else{
                if(isset($_POST['destiny'])){
                    if($rooms->listHotels($_POST['destiny']) == false){
                        $homeModel->messageBook("error", "Falha na Reserva", "Erro ao buscar os resultados. Tente novamente mais tarde.");
                        return false;
                    }else{
                        $listHotels = $rooms->listHotels(strip_tags($_POST['destiny']));
                        
                        foreach ($listHotels as $value) {
            ?>
            <div class="hotels-box">
                <div class="hotels-img">
                    <figure><img src="<?php echo $value[5]; ?>" alt="Foto do Hotel" srcset=""></figure>
                    <a href="#" class="favorite"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg></a>
                </div>

                <div class="hotels-description">
                    <h3 class="tittle-name-hotel"><?php echo $value[0]; ?></h3>
                    <p class="location-hotel"><?php echo $value[1]." - ". $value[2]; ?></p>
                    <div class="classification">
                        <?php
                            for ($i=0; $i < (int)$value[3]; $i++)
                                echo '<span class="stars"><i class="bx bxs-star"></i></span>';
                        ?>
                    </div>
                    <p class="visitors">(1219 Visitantes)</p>
                </div>

                <div class="btn-hotel">
                    <a target="_blank" href="<?php echo PATH_PAGES; ?>hospedagem?<?php echo $value[6] ?>">Explorar Quarto <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left: 2px;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double"><path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/><path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/><path d="M12 4v6"/><path d="M2 18h20"/></svg></a>
                </div>
            </div><!-- /.hotels-box -->
            <?php } // FIM DO FOREACH
                } // FIM DO ELSE DO MÉTODO LISTHOTELS
            } // FIM DO IF DO POST DESTINY
        } //FIM DO ELSE DA SESSIO COUNT-HOTELS ?>
        </div><!-- /.hotels-wp -->
    </div><!-- /.container -->
    
    <!-- TO DO: FAZER UM SISTEMA DE PAGINAÇÃO ---->
</main>

<!--

```json
{
  "nome": "Hotel Exemplo",
  "descricao": "Um hotel luxuoso no coração da cidade.",
  "endereco": {
    "rua": "Rua das Flores",
    "numero": 123,
    "bairro": "Centro",
    "cidade": "São Paulo",
    "pais": "Brasil",
    "cep": "01000-000",
    "latitude": -23.55052,
    "longitude": -46.633308
  },
  "contato": {
    "telefone": "+55 11 98765-4321",
    "email": "contato@hotelexemplo.com"
  },
  "disponibilidade": true,
  "quartos": [
    {
      "tipo": "Casal",
      "preco": 250,
      "disponiveis": 10,
      "descricao": "Quarto para casal com cama king size."
    },
    {
      "tipo": "Família",
      "preco": 400,
      "disponiveis": 5,
      "descricao": "Quarto para família com 2 camas queen size."
    }
  ],
  "amenidades": ["Wi-Fi gratuito", "Piscina", "Academia", "Café da manhã incluso"],
  "avaliacoes": {
    "media": 4.5,
    "comentarios": [
      {
        "cliente": "João Silva",
        "comentario": "Ótima estadia!",
        "nota": 5
      },
      {
        "cliente": "Maria Oliveira",
        "comentario": "Muito confortável.",
        "nota": 4
      }
    ]
  },
  "politicas": {
    "checkin": "14:00",
    "checkout": "12:00",
    "cancelamento": "Gratuito até 24 horas antes da chegada.",
    "animais": "Permitido (custo adicional)."
  },
  "classificacao": 4,
  "moeda": "BRL",
  "imagens": [
    "link_para_imagem1.jpg",
    "link_para_imagem2.jpg"
  ],
  "proximidades": [
    {
      "nome": "Museu da Cidade",
      "distancia": "1 km"
    },
    {
      "nome": "Praia Central",
      "distancia": "500 m"
    }
  ],
  "metodos_pagamento": ["Cartão de Crédito", "PIX", "Dinheiro"]
}
-->