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
    $("#btn-cadastrar-tipo-vaga").attr("disabled", false);
  } else {
    $("#nome").attr("readonly", true);
    $("#btn-cadastrar-tipo-vaga").attr("disabled", true);
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
    $("#btn-atualizar-tipo-vaga").attr("disabled", false);
  } else {
    $("#nome").attr("readonly", true);
    $("#btn-atualizar-tipo-vaga").attr("disabled", true);
  }
}).change();