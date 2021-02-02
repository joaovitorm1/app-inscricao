$(function() {
    //lucas leia antes de meche
    //Quando clicar no botÃ£o para adicionar nova lista de escolaridade


    //Quando clicar no botao para adicionar nova experiencia
    $("#btn-adicionar-experiencia").click(function(e) {
        //Evita que seja enviado ao clicar nesse botao
        e.preventDefault();

        //copia do codigo a cima com estruturas do cargo, favor verifica parametros de envio
        var linha = '<div class="card">' +
            '    <div class="card-body">' +
            '        <div class="row">' +
            '            <div class="col-12 col-md-4">' +
            '                <input type="text" class="form-control" placeholder="Cargo" name="cargo[]">' +
            '            </div>' +
            '            <div class="col-12 col-md-3">' +
            '                <input type="text" class="form-control" placeholder="Empresa" name="empresa[]">' +
            '            </div>' +
            '            <div class="col-6 col-md-2">' +
            '                <input type="numeric" class="form-control" placeholder="meses" name="periodo[]">' +
            '            </div>' +
            '            <div class="col col-md">' +
            '                <button type="button" class="btn btn-danger btn-remover-item form-control" title="Remover experiencia">&times;</button>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>';

        //Adiciona a nova linha na div
        $("#div-experiencias").append(linha);
    });

    //Quando clicar no botÃ£o para remover formaÃ§Ã£o ou experiÃªncia
    $("#div-experiencias").on("click", ".btn-remover-item", function() {
        //Remove a <div class="card"> que contÃ©m a formaÃ§Ã£o ou experiÃªncia
        $(this).parent().parent().parent().parent().remove();
    })

});