$(document).ready(function() {
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 0 0000-0000');
    $('#cpf').mask('000.000.000-00', { reverse: true });
});

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";
            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

$(function() {
    //lucas leia antes de meche
    //Quando clicar no botÃ£o para adicionar nova lista de escolaridade
    $("#btn-adicionar-escolaridade").click(function(e) {
        //Evita que o formulÃ¡rio seja enviado ao clicar nesse button 
        e.preventDefault();

        //Gera a estrutura do HTML necessÃ¡ria para criar uma nova linha para adicionar escolaridade
        var linha = '<div class="col-md-3">' +
            '    <div class="form-group">' +
            '        <label>Escolaridade</label>' +
            '            <select class="form-control select2" name="escolaridade" style="width: 100%;" required>' +
            '                   <option value="" selected>Alfabetizado</option>' +
            '                   <option value="">Educação infantil</option>' +
            '                   <option value="">Ensino Fundamental</option>' +
            '                   <option value="">Ensino Médio</option>' +
            '                   <option value="">Ensino Superior</option>' +
            '                   <option value="">Pós-graduação</option>' +
            '                   <option value="">Mestrado</option>' +
            '                   <option value="">Doutorado</option>' +
            '           </select>' +
            '          </div>' +
            '      </div>' +
            '            <div class="col-md-3">' +
            '               <div class="form-group">' +
            '                   <label>Situação</label>' +
            '                       <select class="form-control select2" name="situacao" style="width: 100%;" required>' +
            '                           <option value="" selected>Completo</option>' +
            '                           <option value="">Incompleto</option>' +
            '                       </select>' +
            '               </div>' +
            '           </div>' +
            '           <div class="col-md-2">' +
            '               <div class="form-group">' +
            '                   <label>Ano de Conclusão</label>' +
            '                       <input type="date" name="anoconclusao" class="form-control" required>' +
            '  </div>' +
            '           <div class="col col-md">' +
            '                <button type="button" class="btn btn-danger btn-remover-item form-control" title="Remover experiÃªncia">&times;</button>' +
            '            </div>' +
            '</div>';

        //Adiciona a nova linha na div
        $("#div-escolaridade").append(linha);
    });

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
            '                <input type="text" class="form-control" placeholder="meses" name="periodo[]">' +
            '            </div>' +
            '            <div class="col col-md">' +
            '                <button type="button" class="btn btn-danger btn-remover-item form-control" title="Remover experiÃªncia">&times;</button>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>';

        //Adiciona a nova linha na div
        $("#div-experiencias").append(linha);
    });

    //Quando clicar no botÃ£o para remover formaÃ§Ã£o ou experiÃªncia
    $("#div-escolaridade, #div-experiencias").on("click", ".btn-remover-item", function() {
        //Remove a <div class="card"> que contÃ©m a formaÃ§Ã£o ou experiÃªncia
        $(this).parent().parent().parent().parent().remove();
    })
});
//Detecta alterações nos check box 
$(document).on('change', '.form-check-input', function() {
    //Pegando valor dos Checks
    var elemento1 = document.getElementById('flexCheckDefault1').checked;
    var elemento2 = document.getElementById('flexCheckDefault2').checked;

    if (elemento1 & elemento2) {
        var butao = document.getElementById('btn-cadastrar');
        butao.disabled = false;
    } else {
        var butao = document.getElementById('btn-cadastrar');
        butao.disabled = true;
    }
});