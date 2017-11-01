/*
 |------------------------------------------------------------------------------------
 | Validar Campo genero
 |------------------------------------------------------------------------------------
 |
 | Se Obtiene el valor del input genero para luego mandarselo
 | por Ajax al controlador Genero
 |
 | @todo la funcion success recibe lo que el controlador retorna
 | @todo se valida si el input esta vacio o no
 |
 */

$("#registro").click(function () {
    var data = $("#genre").val();
    var route = "http://localhost:8000/genero";
    var token = $("#token").val();

    $.ajax({
        url:route,
        headers: {
            'X-CSRF-TOKEN':token
        },
        type: 'POST',
        dataType: 'json',
        data:{
            genre: data
        },

        success:function(data){
            if(data == 'true'){
                $("#msj-success").fadeIn(data);
            } else {
                $("#msj-error").fadeIn(data);

            }
        },
        error:function(msj){
            $("#msj").html(msj.responseJSON.errors.genre);
            $("#msj-error").fadeIn();
        }
    });
})