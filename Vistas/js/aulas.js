$("#select2").select2();
$("#select2-1").select2();



$(".row").on("click", ".BorrarAula", function(){

    var Aid = $(this).attr("Aid");

    swal({

        type: "warning",
        title: "¿Esta seguro de querer Borrar el Aula?",
        showCancelButton: true,
        cancelButtonText: "cancelar",
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6"

    }).then(function(resultado){

        if(resultado.value){

            window.location = "index.php?url=Aulas&Aid="+Aid;

        }
        
    })

})

$(".table").on("click", ".CrearAula", function(){

    var Soid = $(this).attr("Soid");
    var datos = new FormData();
    datos.append("Soid", Soid);

    $.ajax({

        url: "Ajax/aulasA.php",
        method: "POST",
        dataType: "json",
        data: datos,
        cache: false,
        processData: false,
        contentType: false,

        success: function(resultado){

            $("#id").val(resultado["id"]);
            $("#id_profesor").val(resultado["id_profesor"]);
            $("#materia").val(resultado["materia"]);
            
        }

    })

})

$("#datepicker").datepicker({

    autoclose: true

})