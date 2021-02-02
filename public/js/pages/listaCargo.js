/*
 * Author: Lucas Matos e Souza
 * Date: 22 Jan 2021
 * Description:
    Este é um arquivo utilizado apenas para a página de Cadastros de Cargos (index.html) 
 **/
$('#local').on("change", function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Recupera o Edital Selecionado
    var local = $('#local').val();


    if (local > 0) {
        $('#cargo').removeAttr('disabled');
        //Carrega as opções do GrupoOcupacional
        $.ajax({
            type: "GET",
            contentType: "application/json;charset=UTF-8",
            url: "../cargo/" + local,
            success: function(dados) {

                for (var i = 0; i < dados.length; i++) {
                    var option = new Option(dados[i].nome.toUpperCase(), dados[i].id);
                    var select = document.getElementById("cargo");
                    select.append(option);
                }
            },
            fail: function() {
                alert('Não Buscou');
            }
        });
    }
});