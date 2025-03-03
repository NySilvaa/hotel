const unFavoriteBtn = document.querySelector(".favorite");
const btnBackUnfavorite = document.querySelector(".btn-back-cancel");
const btnAcceptUnfavorite = document.querySelector('.btn-accept-cancel');
const cardUnfavoriteWp = document.querySelector('.desfavoritar-hotel-wp');

// MOSTRAR A JANELA DE CANCELAMENTO
unFavoriteBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    cardUnfavoriteWp.style.display = "flex";
});

// VOLTAR E NÃO CANCELAR A RESERVA
btnBackUnfavorite.addEventListener("click", (e)=>{
    e.preventDefault();
    cardUnfavoriteWp.style.display = "none";
});

// PROSSEGUIR COM O CANCELAMENTO DA RESERVA
btnAcceptUnfavorite.addEventListener("click", (e)=>{
    e.preventDefault();

    const hotel_id = document.getElementById('hotel_id').getAttribute("value");

    btnAcceptUnfavorite.innerHTML = `
        <div class="spinner-wp">
            <div class="spinner center">
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
                <div class="spinner-blade"></div>
            </div>
        </div>
    `;

    $.ajax({
        type: "POST", 
        url: "http://localhost/hotel/savedHotels/",
        data: {"hotel_id": hotel_id, "unfavorite": true},
        success: function(response){
           let section = $(response)[30]["children"][2];

          $(".desfavoritar-hotel").html(section.innerHTML);
          const cardMsg = $(".card-message");

          setTimeout(() => {
            cardMsg.fadeOut();
          }, 4000);

           cardUnfavoriteWp.style.display = "none";

        }, error: function (data){
           alert("Ocorreu um erro ao tentar cancelar a sua reserva. Tente novamente mais tarde.");
        }
    });
});