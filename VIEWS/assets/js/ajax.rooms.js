$(document).ready(function (){
    $('.favorite').click(function() {
        let button = $(this);
        let hotelId = document.getElementById('hotel_id').getAttribute('value');

        $.ajax({
            url: "http://localhost/hotel/rooms/",
            type: "POST",
            data: {hotel_id: hotelId},
            success: function (response){
                let newSection = $(response)[27].innerHTML.trim();

                $("#testeJson").html(newSection);

                let inputHid = document.getElementsByName('status')[0];

                console.log(inputHid.getAttribute('value'))

                if(inputHid.getAttribute('value') == 'added'){
                    button.html(`<svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-off"><line x1="2" y1="2" x2="22" y2="22"/><path d="M16.5 16.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5a5.5 5.5 0 0 1 2.14-4.35"/><path d="M8.76 3.1c1.15.22 2.13.78 3.24 1.9 1.5-1.5 2.74-2 4.5-2A5.5 5.5 0 0 1 22 8.5c0 2.12-1.3 3.78-2.67 5.17"/></svg>`);
                    button.css('background', '#8e644b').css('color', '#F2F2F2');
                }else if(inputHid.getAttribute('value') == 'removed'){
                    button.html(`<svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" /></svg>`);
                    button.css('color', '#8e644b').css('background', '#F2F2F2');
                }
            }
        })
    })
})