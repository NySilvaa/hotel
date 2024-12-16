window.onload = ()=>{
    let control = true;

    const favoriteBook = ()=>{
        const btnFavorite = document.querySelectorAll('.favorite');

        btnFavorite.forEach(item=>{
            item.addEventListener('click', (e)=>{
                e.preventDefault();
            let icon = item.firstElementChild

            if(control){
                icon.classList.remove('bx-heart');
                icon.classList.add('bxs-heart');
                control = false;
            }else{
                icon.classList.add('bx-heart');
                icon.classList.remove('bxs-heart');
                control = true;
            }
            })
        })
    };
    favoriteBook();

    const showModal = ()=>{
        const dataBox = document.querySelectorAll('.data-book-box');
        const fieldCountry = document.getElementById('destiny-country');

        dataBox.forEach(item=>{
            let input = item.childNodes[3]
            
            input.addEventListener('click', ()=>{
            let modal = input.parentNode.lastElementChild;
            hideModal(modal);

                if(control){
                    modal.classList.toggle('show');
                    fieldCountry.focus();
                    chooseCountry();
                    control = false;
                }else{
                    modal.classList.toggle('show');
                    control = true;
                }
            })

        })
    };
    showModal();

    const hideModal = (modal)=>{
        setTimeout(() => {
            document.querySelector('body').addEventListener('click', ()=>{
                modal.classList.remove('show');
                control = true;
            });

            modal.addEventListener('click', (e)=>{e.stopPropagation()});
            modal.parentNode.addEventListener('click', (e)=>{e.stopPropagation()});
        }, 600);    

    };

    // let listOption = "";

    const chooseCountry = ()=>{
        const fieldCountry = document.getElementById('destiny-country');
        const fieldCity = document.getElementById('destiny-city');

            listOption = document.querySelectorAll('ul#list-country li')

            listOption.forEach(element=>{
                element.addEventListener('click', ()=>{
                    let countryChoosed = element.innerText;
                    fieldCountry.value = countryChoosed;
                    
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/hotel/rooms/",
                        data: {paisEscolhido: countryChoosed},
                        success: function (response) {
                           let secao = $(response).find('#list-country').html();

                           $("#list-country").html(secao);
                           chooseCity();
                        }
                    });

                    element.parentNode.innerText = '';
                    fieldCity.focus();
                    //showCity(countryChoosed);
                  
                    fieldCountry.classList.add('selected');
                });
            });

            // fieldCountry.addEventListener('change', ()=>{
            //     listOption = document.querySelectorAll('ul#list-country li')

            //     listOption.forEach(element=>{
            //         element.addEventListener('click', ()=>{
            //             let countryChoosed = element.innerText;
            //             fieldCountry.value = countryChoosed;
            //             element.parentNode.innerText = '';
            //             fieldCity.focus();
            //             showCity(countryChoosed);
            //             fieldCountry.classList.add('selected');
            //         });
            //     });
            // })
    };

    // const showCity = (country)=>{
    //     const citiesByCountry = {
    //         "Brasil": ["São Paulo", "Rio de Janeiro", "Brasília", "Salvador"],
    //         "Estados Unidos": ["Nova York", "Los Angeles", "Chicago", "Houston"],
    //         "Canadá": ["Toronto", "Montreal", "Vancouver", "Calgary"],
    //         "Argentina": ["Buenos Aires", "Córdoba", "Rosario", "Mendoza"],
    //         "China": ["Pequim", "Xangai", "Cantão", "Shenzhen"],
    //         "Japão": ["Tóquio", "Osaka", "Kyoto", "Yokohama"],
    //         "Alemanha": ["Berlim", "Munique", "Hamburgo", "Colônia"],
    //         "França": ["Paris", "Marselha", "Lyon", "Nice"],
    //         "Itália": ["Roma", "Milão", "Veneza", "Florença"],
    //         "Espanha": ["Madrid", "Barcelona", "Valência", "Sevilha"],
    //         "Reino Unido": ["Londres", "Manchester", "Birmingham", "Glasgow"],
    //         "Rússia": ["Moscou", "São Petersburgo", "Novosibirsk", "Cazã"],
    //         "Índia": ["Nova Delhi", "Mumbai", "Calcutá", "Bangalore"],
    //         "Austrália": ["Sydney", "Melbourne", "Brisbane", "Perth"],
    //         "África do Sul": ["Cidade do Cabo", "Johannesburgo", "Durban", "Pretória"],
    //         "México": ["Cidade do México", "Guadalajara", "Monterrey", "Puebla"]
    //     };

    //     chooseCity()
    // };

    const chooseCity = ()=>{
        const locationField = document.getElementById('location');
        const destinyCity = document.getElementById('destiny-city');

        destinyCity.addEventListener('keyup', ()=>{
            locationField.setAttribute('value', destinyCity.value);
        });

            listOption = document.querySelectorAll('ul#list-country li')
        
            listOption.forEach(element=>{
                element.addEventListener('click', ()=>{
                    destinyCity.value = element.innerText;
                    locationField.setAttribute('value', element.innerText);
                    element.parentNode.innerText = '';
                })
            })

            destinyCity.addEventListener('change', ()=>{
                listOption = document.querySelectorAll('ul#list-country li')
        
                listOption.forEach(element=>{
                    element.addEventListener('click', ()=>{
                        destinyCity.value = element.innerText;
                        locationField.setAttribute('value', element.innerText);
                        element.parentNode.innerText = '';
                    })
                })
            })
    };

}