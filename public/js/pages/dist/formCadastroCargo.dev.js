"use strict";

/*
 * Author: Lucas Matos e Souza
 * Date: 22 Jan 2021
 * Description:
    Este é um arquivo utilizado apenas para a página de Cadastros de Cargos (index.html) 
 **/
$('#select-edital').on("change", function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); //Recupera o Edital Selecionado

  var idEdital = $('#select-edital').val();

  if (idEdital > 0) {
    //Carrega as opções do GrupoOcupacional
    $.ajax({
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      url: "../grupo-ocupacional/lista/edital/" + idEdital,
      success: function success(dados) {
        for (var i = 0; i < dados.length; i++) {
          var option = new Option(dados[i].nome.toUpperCase(), dados[i].id);
          var select = document.getElementById("select-grupoOcupacional");
          select.append(option);
        }
      },
      fail: function fail() {
        alert('Falha ao Buscar os Grupo Ocupacional');
      }
    });
    $("#select-grupoOcupacional").attr("disabled", false); //Carrega as opções do Tipo Cargo

    $.ajax({
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      url: '../tipo-cargo/lista/edital/' + idEdital,
      success: function success(dados) {
        for (var i = 0; i < dados.length; i++) {
          var option = new Option(dados[i].nome.toUpperCase(), dados[i].id);
          var select = document.getElementById("select-tipoCargo");
          select.append(option);
        }
      },
      fail: function fail() {
        alert('Falha ao Buscar os Tipo Cargo');
      }
    });
    $("#select-tipoCargo").attr("disabled", false); //Carrega as opções do GrupoOcupacional

    $.ajax({
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      url: "../local-cargo/lista/edital/" + idEdital,
      success: function success(dados) {
        for (var i = 0; i < dados.length; i++) {
          var option = new Option(dados[i].nome.toUpperCase(), dados[i].id);
          var select = document.getElementById("select-localidade");
          select.append(option);
        }
      },
      fail: function fail() {
        alert('Falha ao Buscar os Localidade');
      }
    });
    $("#select-localidade").attr("disabled", false);
  } else {
    $("#select-tipoCargo").empty();
    $("#select-tipoCargo").append(new Option("SELECIONAR", 0));
    $("#select-grupoOcupacional").empty();
    $("#select-grupoOcupacional").append(new Option("SELECIONAR", 0));
    DesabilitaCampos();
  }
}).change();
$('#select-grupoOcupacional').on("change", function () {
  //Recupera o Grupo Ocupacional Selecionado
  var idGrupoOcupacional = $('#select-grupoOcupacional').val();

  if (idGrupoOcupacional > 0) {
    HabilitaCampos(); //Recupera o Edital Selecionado

    var idEdital = $('#select-edital').val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); //Carrega as opções do Requisitos

    $.ajax({
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      url: "../requisitos/lista/edital/" + idEdital,
      success: function success(dados) {
        for (var i = 0; i < dados.length; i++) {
          var requisito = '<div class="row" onclick="selectTitulo(' + dados[i].id + ')">' + '    <div class="form-group">' + '        <div class="custom-control custom-switch custom-switch-on-success">' + '           <input type="checkbox" name="requisitos[]" class="custom-control-input" value="' + dados[i].id + '" id="req-' + dados[i].id + '" >' + '           <label class="custom-control-label" for="req-' + dados[i].id + '">' + dados[i].nome + '</label>';
          '       </div>' + '   </div>' + '</div>';
          $("#lista-requisitos").append(requisito);
        }
      },
      fail: function fail() {
        alert('Falha ao Buscar os Usuários');
      }
    }); //Carrega as opções do Requisitos

    $.ajax({
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      url: "../titulo/lista/edital/" + idEdital,
      success: function success(dados) {
        $("#lista-titulos").empty();

        for (var i = 0; i < dados.length; i++) {
          var titulo = '<div class="row" onclick="selectRequisito(' + dados[i].id + ')">' + '    <div class="form-group">' + '        <div class="custom-control custom-switch custom-switch-on-success">' + '           <input type="checkbox" name="requisitos[]" class="custom-control-input" value="' + dados[i].id + '" id="titulo-' + dados[i].id + '" >' + '           <label class="custom-control-label" for="titulo-' + dados[i].id + '">' + dados[i].nome + '</label>';
          '       </div>' + '   </div>' + '</div>';
          $("#lista-titulos").append(titulo);
        }
      },
      fail: function fail() {
        alert('Falha ao Buscar os Usuários');
      }
    });
  } else {
    DesabilitaCampos();
  }
}).change();

function HabilitaCampos() {
  //Habilita os campos 
  $("#nome").attr("readonly", false);
  $("#quantidade").attr("readonly", false);
  $("#cargaHoraria").attr("readonly", false);
  $("#salario").attr("readonly", false);
  $('#btn-cadastrar-cargo').attr("disabled", false);
  $("#lista-titulos").empty();
  $("#lista-requisitos").empty();
}

;

function DesabilitaCampos() {
  //Desabilita os campos 
  $("#nome").attr("readonly", true);
  $("#quantidade").attr("readonly", true);
  $("#cargaHoraria").attr("readonly", true);
  $("#salario").attr("readonly", true);
  $('#btn-cadastrar-cargo').attr("disabled", true);
  $("#lista-titulos").empty();
  $("#lista-requisitos").empty();
}