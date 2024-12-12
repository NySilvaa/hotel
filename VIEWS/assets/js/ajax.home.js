    $('#form-book').submit(function(e){
        const dayCheckIn = document.getElementById('day-check-in');
        const dateCheckIn = document.querySelector('[name=date-check-in]');
        let monthAndYearCheckIn = monthCheckIn.innerText.split(" ");
        dateCheckIn.setAttribute('value', `${dayCheckIn.innerText}/${monthAndYearCheckIn[0]}/${monthAndYearCheckIn[1]}`);
      
        // ELEMENTOS DE CHECK-OUT
        const dayCheckOut = document.getElementById('day-check-out');
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
                console.log("Deu certo");
            }, 

            error: function(){
                console.log('Algo Falhou');
            }
        })
    })
