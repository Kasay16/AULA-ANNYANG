$(".box").on("click", ".AgregarArchivo", function(){

    var Sid = $(this).attr("Sid");

    var datos = new FormData();
    datos.append("Sid", Sid);
    
    $.ajax({

        url: "http://localhost/AULA-ANNYANG/Ajax/seccionA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#idS").val(resultado["id"]);

        }

    })

})

$(".box").on("click", ".AgregarVideo", function(){

    var Sidv = $(this).attr("Sidv");

    var datos = new FormData();
    datos.append("Sidv", Sidv);
    
    $.ajax({

        url: "http://localhost/AULA-ANNYANG/Ajax/seccionA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#idSV").val(resultado["id"]);

        }

    })

})

$(".box").on("click", ".VideoY", function(){

    var Sidy = $(this).attr("Sidy");

    var datos = new FormData();
    datos.append("Sidy", Sidy);
    
    $.ajax({

        url: "http://localhost/AULA-ANNYANG/Ajax/seccionA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#idSY").val(resultado["id"]);
            

        }

    })

})

$(".box").on("click", ".AgregarImagen", function(){

    var Sidi = $(this).attr("Sidi");

    var datos = new FormData();
    datos.append("Sidi", Sidi);
    
    $.ajax({

        url: "http://localhost/AULA-ANNYANG/Ajax/seccionA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#idSI").val(resultado["id"]);

        }

    })

})


$(".box").on("click", ".BorrarSeccion", function(){

    var Sid = $(this).attr("Sid");

    var datos = new FormData();
    datos.append("Sid", Sid);
    
    $.ajax({

        url: "http://localhost/AULA-ANNYANG/Ajax/seccionA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#idSE").val(resultado["id"]);

        }

    })

})


CKEDITOR.replace("editor");