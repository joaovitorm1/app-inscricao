$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); //Recupera o Edital Selecionado
//envia dados para o json e pega retornando as informações json, porem não envia para o select
$.ajax({
    type: "GET",
    contentType: "application/json;charset=UTF-8",
    url: "../doc/lista/1",
    success: function success(dados) {
        for (var i = 0; i < dados.length; i++) {
            var option = new Option(dados[i].nome, dados[i].id);
            var select = "tipodoc";
            $(select).append(option);

        }
    },
    fail: function fail() {
        alert('Falha ao Buscar os cargo');
    }
});