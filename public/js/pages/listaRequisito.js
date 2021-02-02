/*
 * Author: Lucas Matos e Souza
 * Date: 22 Jan 2021
 * Description:
    Este é um arquivo utilizado apenas para o formulário de Cadastro 
    de Requisitos (index.html) 
 **/

function gerarTabela($url_traducao, $url_dados) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $table = $("#tabela-requisitos").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "searching": true,
        "info": true,
        "processing": true,
        "serverSide" : true,
        "ajax": {
            url: $url_dados,
            type: "POST"
        },
        "language": {
            url: $url_traducao
        },
        "order" : [ [ 0, "desc" ] ],
        "columns": [
            {
                "data" : 'id',
                "name" : 'Id',
                "width": "7%"
            },
            {
                "data" : 'nome',
                "name" : 'Nome'
            },
            {
                "data" : 'quantidade',
                "name" : 'Quantidade'
            },
            {
                "data" : 'pontos',
                "name" : 'Pontos'
            },
            {
                "targets": -1,
                "data" : 'Ação',
                "searchable": false,
                "orderable": false,
                "width": "7%",
                "render": function adicionaBotaoAcao(data, type, full, meta){
                    
                    var botaoAcao = 
                    '	<div class="btn-group">'+
                    '		<button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">'+
                    '			Ação'+
                    '		</button>'+
                    '        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">'+
                                status(full.ativo, full.id)+
                    '            <a class="dropdown-item" href="./editar/'+full.id+'"><i class="fas fa-edit"></i>  Editar</a>'+
                    '		</div>'+
                    '	</div>';

                    return botaoAcao;
                }
            }
        ],
        "createdRow": function(row, data, dataIndex){	
            if(data.ativo<1){
                $(row).addClass('table-danger');
            }
        }
    });


    function status(ativo, id){
        if(ativo<1){
            return '<a class="dropdown-item" href="./atualizarStatus/'+id+'"><i class="far fa-lightbulb"></i>  Habilitar</a>';
        }else{
            return '<a class="dropdown-item" href="./atualizarStatus/'+id+'"><i class="fas fa-lightbulb"></i>  Desabilitar</a>';
        }
    }

};
