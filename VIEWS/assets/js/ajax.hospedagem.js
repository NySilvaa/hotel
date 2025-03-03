const urlPathFinishOrder = location.href;

$('.favorite').click(function() {
    let button = $(this);
    let hotelId = document.getElementById('hotel_id').getAttribute('value');
    
    $.ajax({
        url: urlPathFinishOrder,
        type: "POST",
        data: {hotel_id: hotelId},
        success: function (response){
            let newSection = $(response)[30];
            
            $("#favorite-section").html(newSection.innerHTML);
            
            let inputHid = document.getElementsByName('status')[0];
            
            if(inputHid.getAttribute('value') == 'added'){
                let cardMsg = $('.card-message');
                button.html(`<svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-off"><line x1="2" y1="2" x2="22" y2="22"/><path d="M16.5 16.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5a5.5 5.5 0 0 1 2.14-4.35"/><path d="M8.76 3.1c1.15.22 2.13.78 3.24 1.9 1.5-1.5 2.74-2 4.5-2A5.5 5.5 0 0 1 22 8.5c0 2.12-1.3 3.78-2.67 5.17"/></svg> Desfavoritar`);
                setTimeout(() => {
                    cardMsg.fadeOut();
                }, 4000);
            }else if(inputHid.getAttribute('value') == 'removed'){
                let cardMsg = $('.card-message');
                button.html(`<svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" /></svg> Favoritar`);
                setTimeout(() => {
                    cardMsg.fadeOut();
                }, 4000);
            }
        }
    });
});

$(".finishOrder").click(function(e){
    e.preventDefault();

    const checkInConfirmationValue = document.getElementById("check-in-confirmation-value").value;
    const checkOutConfirmationValue = document.getElementById("check-out-confirmation-value").value;
    const personConfirmationValue = document.getElementById("person-confirmation-value").value;
    const nightsConfirmationValue = document.getElementById("nights-confirmation-value").value;
    const prizeFinalConfirmationValue = document.getElementById("prize-final-confirmation-value").value;
    const hotelId = document.getElementById("hotel_id").getAttribute("value");
    const loadingBookWp = document.querySelector(".loading-book-wp");

    $(".finishOrder").html(`
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
    `);

    loadingBookWp.style.display = "flex";
    
    $.ajax({
        url: urlPathFinishOrder,
        type: "POST",
        data: {
            "IdHotel": hotelId,
            "Check-in": checkInConfirmationValue,
            "Check-out": checkOutConfirmationValue,
            "PersonPerNights": personConfirmationValue,
            "Nights": nightsConfirmationValue,
            "Prize_Final": prizeFinalConfirmationValue
        },
        success: function(response){
            let sectionFinishOrder = $(response)[31];
            $(".book").html(sectionFinishOrder.innerHTML);

            const infoBooks = $('.info-books');
            const cardMessageStatus = $(".card-message");
            
            infoBooks.css("height", "0px");
            infoBooks.css("opacity", "0");

            $(".card-confirmation-wp").css("display", "none");
            loadingBookWp.style.display = "none";

            setTimeout(() => {
                cardMessageStatus.fadeOut();
            }, 4000);
            
        }, error: function(data){
            alert("Algo falhou ao tentar efetuar a sua reserva. Tente recarregar a página e repetir o processo.");
        }
    });
});