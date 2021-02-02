 $(document).ready(function() {
     $('#vaga').keyup(function() {
         var query = $(this).val();
         if (query != "") {
             $.ajax({
                 url: "inscricao/cargo/lista/" + query,
                 method: "GET",
                 data: { query: query },
                 success: function(data) {
                     /*var linha = '<div class="col-md-4">' +
                         '<div class="form-group">' +
                         '<label>Local</label>' +
                         ' <select class="form-control select2" name="cargo" style="width: 100%;" required>' +
                         '<option selected>Selecione</option>' +
                         data.forEach(aux => {
                             '<option value="' + aux.id + '">' + aux.nome + '</option>' +
                         });
                     '</select>'
                     '</div>' +
                     '</div>'
                     $("#div-cargo").append(linha);*/
                 }
             });
         }
     });
 });