$(function(){
    $('#form-book').submit(function(e){
        const dateCheckIn = document.querySelector('[name=date-check-in]');
        let monthAndYearCheckIn = monthCheckIn.innerText.split(" ");
        dateCheckIn.setAttribute('value', `${dayCheckIn.innerText}/${monthAndYearCheckIn[0]}/${monthAndYearCheckIn[1]}`)
      
        // ELEMENTOS DE CHECK-OUT
        const dateCheckOut = document.querySelector('[name=date-check-out]');
        let monthAndYearCheckOut = monthCheckOut.innerText.split(' ')
        dateCheckOut.setAttribute('value', `${dayCheckOut.innerText}/${monthAndYearCheckOut[0]}/${monthAndYearCheckOut[1]}`)

        $.ajax({
            type: "Post",
            url: "http://localhost/hotel/",
            data: {
                "dateCheckIn": dateCheckIn.getAttribute("value"),
                "dateCheckOut": dateCheckOut.getAttribute("value")
            },

            success: function(data){
                // ELEMENTOS DE CHECK-IN
      
              
                if(secao !== undefined){
                    alert('Tudo certo');
                }
            }, 

            error: function(){
                console.log('Algo Falhou');
            }
        })
    })
})