const btnCancelBook = document.querySelector("button.cancelar-book");
const btnBackCancel = document.querySelector(".btn-back-cancel");
const btnAcceptCancel = document.querySelector('.btn-accept-cancel');
const cardCancelWp = document.querySelector('.cancelar-book-wp');

// MOSTRAR A JANELA DE CANCELAMENTO
btnCancelBook.addEventListener("click", (e)=>{
    e.preventDefault();
    cardCancelWp.style.display = "flex";
});

// VOLTAR E NÃO CANCELAR A RESERVA
btnBackCancel.addEventListener("click", (e)=>{
    e.preventDefault();
    cardCancelWp.style.display = "none";
});

// PROSSEGUIR COM O CANCELAMENTO DA RESERVA
btnAcceptCancel.addEventListener("click", (e)=>{
    e.preventDefault();

    e.preventDefault();
    const hotel_id = document.getElementById('hotel_id').getAttribute("value");

    btnAcceptCancel.innerHTML = `
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
        url: "http://localhost/hotel/books/",
        data: {"hotel_id": hotel_id},
        success: function(response){
           let section = $(response)[30]["childNodes"][3];
           $(".cancel-book").html(section);

           cardCancelWp.style.display = "none";

        }, error: function (data){
           alert("Ocorreu um erro ao tentar cancelar a sua reserva. Tente novamente mais tarde.");
        }
    });
});