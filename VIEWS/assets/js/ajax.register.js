document.getElementById('cep').addEventListener('input', function() {
    let cep = this.value.replace(/\D/g, '');

    if (cep.length == 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`).then(response => response.json())
            .then(data => {
                if (data.erro) {
                    alert('CEP não encontrado!');
                    return;
                }

                document.getElementById('uf').value = data.uf || '';
                document.getElementById('cidade').value = data.localidade || '';
                document.getElementById('bairro').value = data.bairro || '';
                document.getElementById('logradouro').value = data.logradouro || '';
                document.getElementById('complemento').value = data.complemento || '';
            })
            .catch(error => {
                alert('Erro ao buscar o CEP!');
                return false;
            });
    }
});