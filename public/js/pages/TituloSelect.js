cont = 0;
var quantidade = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

$(function() {

    //Quando clicar no botao para adicionar nova escolaridade
    $("#btn-adicionar-escolaridade").click(function(e) {
        //Evita que seja enviado ao clicar nesse botao
        e.preventDefault();

        //copia do codigo a cima com estruturas do cargo, favor verifica parametros de envio
        var linha = '<div class="card" id="form-' + cont + '">' +
            '    <div class="card-body">' +
            '        <div class="row">' +
            '            <div class="col-12 col-md-4">' +
            '                <select class="form-control select2" id="select-cargo' + cont + '" name="titulo_id[]" style="width: 100%;" required>' +
            '                   <option selected>Escolha</option>' +
            '                 </select>' +
            '            </div>' +
            '            <div class="col-12 col-md-3">' +
            '                <input type="text" class="form-control" placeholder="nome" id="nome' + cont + '" name="nome[]" required>' +
            '            </div>' +
            '            <div class="col-6 col-md-2">' +
            '                <input type="date" class="form-control" id="data_conclusao' + cont + '" placeholder="meses" name="data_conclusao[]" required>' +
            '            </div>' +
            '            <div class="col col-md">' +
            '                <button type="button" id="btn-confirmado-' + cont + '" onclick="adicionar(' + cont + ')" class="btn btn-success btn-confirmado form-control" title="Confirma">V</button>' +
            '            </div>' +
            '            <div class="col col-md">' +
            '                <button type="button" class="btn btn-danger btn-remover-item form-control" title="Remover">&times;</button>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>';

        //Adiciona a nova linha na div
        $("#div-escolaridade").append(linha);

        $("#btn-adicionar-escolaridade").attr('disabled', true)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); //Recupera o Edital Selecionado
        //envia dados para o json e pega retornando as informações json, porem não envia para o select
        $.ajax({
            type: "GET",
            contentType: "application/json;charset=UTF-8",
            url: "../titulo/lista/1",
            success: function success(dados) {
                for (var i = 0; i < dados.length; i++) {
                    var option = new Option(dados[i].nome, dados[i].id);
                    dd = cont - 1;
                    var select = '#select-cargo' + dd;
                    $(select).append(option);

                }
            },
            fail: function fail() {
                alert('Falha ao Buscar os cargo');
            }
        });
        cont++;
    });
    //Quando clicar no botÃƒÂ£o para remover formaÃƒÂ§ÃƒÂ£o ou experiÃƒÂªncia
    $("#div-escolaridade").on("click", ".btn-remover-item", function() {
        //Remove a <div class="card"> que contÃƒÂ©m a formaÃƒÂ§ÃƒÂ£o ou experiÃƒÂªncia
        $(this).parent().parent().parent().parent().remove();
        $("#btn-adicionar-escolaridade").attr('disabled', false);
    })




});

function limitar(id) {
    var qtd;
    var d;
    $.ajax({
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        url: "../titulo/lista/1",
        success: function success(dados) {
            qtd = dados[id - 1].quantidade;
            d = dados[id - 1].qtd_max;
        },
        fail: function fail() {
            alert('Falha ao Buscar os cargo');
        }
    });
    if (quantidade[id] > qtd && d === 1) {
        return 1;
    }
    return 0;
}

function adicionar(dados) {
    b = document.getElementById("select-cargo" + dados).value;
    b = b;
    d = limitar(b);

    if (d == 0) {
        document.getElementById("select-cargo" + dados).hidden = true;
        document.getElementById("data_conclusao" + dados).readOnly = true;
        document.getElementById("nome" + dados).readOnly = true;
        dado = "btn-confirmado-" + dados;
        var myobj = document.getElementById(dado);
        myobj.remove();
        $("#btn-adicionar-escolaridade").attr('disabled', false);

        quantidade[b] = quantidade[b] + 1;
        console.log(quantidade[b]);

    } else {
        alert('Ja ultrapassou o limite deste campo');
    }

}