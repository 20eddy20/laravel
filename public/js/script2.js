$(document).ready(function(){
    carga();
});

/*
 |------------------------------------------------------------------------------------
 | Leer registros generos y listar en una tabla
 |------------------------------------------------------------------------------------
 |
 | Se obtiene el id de la tabla en que vamos a mostrar los generos.
 | Se manda la url generos.
 |
 | @todo Se formatea los datos obtenidos en una tabla.
 |
 */
function carga(){
    var tablaDatos = $("#datos");
    var route = "http://localhost:8000/generos";

    $("#datos").empty();
    $.get(route, function(res){
        $(res).each(function(key,value){
            tablaDatos.append(
                "<tr>" +
                    "<td>"+value.genre+"</td>" +
                    "<td>" +
                        "<button class='btn btn-primary' value="+value.id+" OnClick='Mostrar(this);' data-toggle='modal' data-target='#myModal'>Editar</button>" +
                        "<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this);' >Eliminar</button>" +
                    "</td>" +
                "</tr>");
        });
    });
}


/*
 |------------------------------------------------------------------------------------
 | Obtener el nombre del genero
 |------------------------------------------------------------------------------------
 |
 | Se llama al controlador para recoger el nombre del genero pasandole el id.
 | Se obtiene el genero para luego introducirlo en un input de una ventana flotante.
 |
 */
function Mostrar(btn){
    var route = "http://localhost:8000/genero/"+btn.value+"/edit";
    $.get(route, function(res){
        $("#genre").val(res.genre);
        $("#id").val(res.id);
    });
}


function Eliminar(btn) {
    var id = btn.value;
    var route = "http://localhost:8000/genero/"+id;
    
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(){
            carga();
            $("#msj-success-delete").fadeIn();
        },
        error:function(){
            console.log('error');
        }
    });
}



/*
 |----------------------------------------------------------------
 | Actualiza el nombre del genero
 |----------------------------------------------------------------
 | Acualiza el campo input donde contiene el nombre del genero.
 |
 */
$("#actualizar").click(function(){
    var value = $("#id").val();
    var dato = $("#genre").val();
    var route = "http://localhost:8000/genero/"+value+"";
    var token = $("#token").val();
    console.log("update: "+ token);

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data: {genre: dato},
        success: function(){
            carga();
            $("#myModal").modal('toggle');
            $("#msj-success").fadeIn();
        },
        error:function(){
            console.log('error');
        }
    });
});

