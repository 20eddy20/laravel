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
$(document).ready(function () {
    var tablaDatos = $("#datos");
    var route = "http://localhost:8000/generos"

    $.get(route, function (res) {
        $(res).each(function (key,value) {
           tablaDatos.append(
               "<tr>" +
                   "<td>"+value.genre+"</td>" +
                   "<td>" +
                        "<button class='btn btn-primary'>Editar</button>" +
                        "<button class='btn btn-danger'>Eliminar</button>" +
                   "</td>" +
               "</tr>");
        });
    });
});