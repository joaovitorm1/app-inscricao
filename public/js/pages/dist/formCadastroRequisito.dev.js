"use strict";

/*
 * Author: Lucas Matos e Souza
 * Date: 22 Jan 2021
 * Description:
    Este é um arquivo utilizado apenas para a página de Cadastros de Requisito (index.html) 
 **/
$('#select-edital').on("change", function selecionaEdital() {
  //Recupera o Edital Selecionado
  var idEdital = $('#select-edital').val();
  console.log(idEdital);

  if (idEdital != 0) {
    $("#nome").attr("readonly", false);
    $("#quantidade").attr("readonly", false);
    $("#pontos").attr("readonly", false);
    $("#btn-cadastrar-requisito").attr("disabled", false);
  } else {
    $("#nome").attr("readonly", true);
    $("#quantidade").attr("readonly", true);
    $("#pontos").attr("readonly", true);
    $("#btn-cadastrar-requisito").attr("disabled", true);
  }
}).change();
/*
*	PARA A ATUALIZAÇÃO 
*/

$('#select-edital-atualizar').on("change", function selecionaEdital() {
  //Recupera o Edital Selecionado
  var idEdital = $('#select-edital-atualizar').val();
  console.log(idEdital);

  if (idEdital != 0) {
    $("#nome").attr("readonly", false);
    $("#quantidade").attr("readonly", false);
    $("#pontos").attr("readonly", false);
    $("#btn-atualizar-requisito").attr("disabled", false);
  } else {
    $("#nome").attr("readonly", true);
    $("#quantidade").attr("readonly", true);
    $("#pontos").attr("readonly", true);
    $("#btn-atualizar-requisito").attr("disabled", true);
  }
}).change();