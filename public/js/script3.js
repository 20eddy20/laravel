$( document ).on( 'click','.pagination a', function ( event ) {
    /** Prevenir que este evento desencadene aglo **/
    event.preventDefault();

    /** Obtener el valor del atributo href**/
    var page = $(this).attr('href').split("page=")[1];
    var route = "http://localhost:8000/usuario";

    $.ajax({
        url: route,
        data:{page:page},
        type:'GET',
        dataType: 'json',
        success:function (data) {
            console.log(data);
            $(".users").html(data);
        }
    });


});


