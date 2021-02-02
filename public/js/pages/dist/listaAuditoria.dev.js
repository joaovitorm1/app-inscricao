"use strict";

/*
 * Author: Lucas Matos e Souza
 * Date: 22 Jan 2021
 * Description:
    Este é um arquivo utilizado apenas para listar Auditoria cadastrados (index.html) 
 **/
function gerarTabela($url_traducao, $url_dados) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $table = $("#tabela-registro-auditoria").DataTable({
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "searching": true,
    "info": true,
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: $url_dados,
      type: "POST"
    },
    "language": {
      url: $url_traducao
    },
    "order": [[0, "desc"]],
    "columns": [{
      "data": 'id',
      "name": 'Id',
      "width": "5%"
    }, {
      "data": 'ip',
      "name": 'IP',
      "width": "10%"
    }, {
      "data": 'nome_maquina',
      "name": 'Endereço'
    }, {
      "data": 'data_acesso',
      "name": 'Data',
      "width": "15%"
    }, {
      "data": 'registro',
      "name": 'Registro'
    }],
    "createdRow": function createdRow(row, data, dataIndex) {
      if (data.ativo < 1) {
        $(row).addClass('table-danger');
      }
    }
  });
}

;