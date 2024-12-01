$(function(){
    $('#form-location-destiny').submit(function(e){
        e.preventDefault();

        let formData = $(this).serialize();
        let formDataSplit = formData.split("")

        let newData = ''

        for (let i = 0; i < formDataSplit.length; i++) {
            if(formDataSplit[i] == "%" || formDataSplit[i] == "2")
                continue;

            if(formDataSplit[i] == "0" || formDataSplit[i] == "&")
                newData += " "
            else 
                newData += formDataSplit[i];
        }

        console.log(newData)
                    
        
    })
})