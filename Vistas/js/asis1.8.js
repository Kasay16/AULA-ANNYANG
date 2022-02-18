function voz (texto){
      
    var textoaescuchar = texto;
    var utter = new SpeechSynthesisUtterance();
    utter.text = textoaescuchar;
    utter.volume = 1;
    utter.rate = 0.7;
    utter.pitch = 1;
    utter.lang = 'es-MX';
    speechSynthesis.speak(utter);
}




function start() {
    if (annyang) {
       /*  annyang.setLanguage("es-MX")
        annyang.start({ autoRestart: true, continuous: false });  */
        console.log("Escuchando 9.1..")
        console.log("se activo esto");
       /*  voz('se ha activado el asistente de voz'); */
        //aca es donde dice que esta diciendo
   /*  annyang.addCallback("result", frases => {
        console.log("Que se esta diciendo: ", frases);
    }); */

    annyang.addCallback('error', function() {
        $('.myErrorText').text('There was an error!');
      });
      
       /*  document.getElementById("btn").style.display = "none"    */
}
}


function restart() {
    annyang.pause();
    annyang.start();
}


 window.addEventListener("keypress",checkKeyPress, false);

 //teclado (ponerle dos teclas)



 function checkKeyPress (key){
    if(key.keyCode == "60"){
        
        start()
        voz('se ha iniciado el asistente de voz');
    }
} 


$(document).ready(function(){
    $(document).on('keydown', null, 'ctrl+space', function(){
        $('#resultado').text('Se ha presionado el atajo ctrl + espacio');
        start()
        voz('se ha iniciado el asistente de voz');
    });

    $(document).bind('keydown', 'ctrl+i', function(){
        $('#resultado').text('Se ha presionado el atajo CTRL + I');
        start()
        voz('se ha iniciado el asistente de voz');
    })

    $(document).bind('keydown', 'shift+space', function(){
        $('#resultado').text('Se ha presionado el atajo CTRL + I');
        location.reload();
        voz('se ha reiniciado el asistente');
    })
    $(document).bind('keydown', 'alt+j', function(){
        $('#resultado').text('Se ha presionado el atajo alt + j');
        annyang.pause();
        voz('se ha pausado el asistente');
    })
    $(document).bind('keydown', 'alt+k', function(){
        $('#resultado').text('Se ha presionado el atajo alt + k');
        annyang.resume();
        voz('se ha reanudado el asistente');
        
    })
    $(document).bind('keydown', 'alt+l', function(){
        $('#resultado').text('Se ha presionado el atajo alt + l');
        annyang.abort();
        voz('se ha apagado el asistente');
        
    })
})
  
$(document).ready(function(){
    $(document).on('keydown', null, 'shift+p', function(){
        $('#resultado').text('Se ha presionado el atajo shift + p');
        restart()
        voz('se ha reiniciado el asistente de voz');
    });
})

if(annyang){
    console.log("funciona annyang")

    

    annyang.setLanguage("es-MX")
    annyang.debug()
    annyang.start({ autoRestart: true, continuous: false });
    annyang.addCallback("result", frases => {
    console.log("Que se esta diciendo: ", frases);
});
annyang.debug()


    //comandos

        var commands ={
            'ir a aulas virtuales':function(){

                voz('dirigiendonos a aulas');
                window.open('http://localhost/AULA-ANNYANG/Aulas-Virtuales','_self');
                
    
            },
            

           

                 
            'menú':function(){

                console.log("menu");

                console.log($("a.contmenu").each(function(index){
                    voz( index + ": " + $(this).text());
                }));
                /* voz($( "a.texto1" ).text()); */
    
    
            },

           


            /* comandos modulo de ingreso */

            'usuario':function(){

                console.log("selecionar campo usuario");

                $("#campousu").trigger('select');
                voz('ya esta en el campo usuario');
    
            },

            'ir a contraseña':function(){

                console.log("selecionar campo contraseña");
                

                $("#campocontra").trigger('select');
                voz('ya esta en el campo contraseña');
                /* voz($( "a.texto1" ).text()); */
    
            },

            'mi nombre de usuario es *tag':function(variable){

                let camposusuario = document.getElementById("campousu");
                camposusuario.value = variable.replace(/\ /g, "").replace(/arroba/g, "@").toLowerCase();
    
                voz("se ha escrito"+variable);

            },

      

            'ir a ingresar':function(){

               
                $( "#ingresar" ).trigger('click');
    
    
            },


            
            'ir a finalizar':function(){

               
                $( "#fin" ).trigger('click');
    
    
            },

            
            'ir al aula':function(){

                voz('se ha entado al aula ');
                $("#btnaula").trigger('click');
    
    
            },

            'volver al principio':function(){

                voz('se ha vuelto al principio');
                $("#header-inicio").trigger('select');
    
    
            },

      //id="volverbtn"

            'ir a inicio':function(){

               /*  voz('se ha ido a inicio '); */
                window.open('http://localhost/AULA-ANNYANG/Inicio','_self');
    
    
            },

            'ir a aulas virtuales':function(){

                /* voz('se ha ido a aulas virtuales'); */
                window.open('http://localhost/AULA-ANNYANG/Aulas-Virtuales','_self');
    
    
            },

            'ir a mis datos':function(){

                /* voz('se ha ido a mis datos'); */
                window.open('http://localhost/AULA-ANNYANG/Mis-Datos','_self');
    
    
            },


            'ir a mensajes':function(){

                /* voz('se ha ido a mensajes '); */
                window.open('http://localhost/AULA-ANNYANG/Mensajes','_self');
    
    
            },

            'ir a salir':function(){

                /* voz('se ha salido del aula'); */
                window.open('http://localhost/AULA-ANNYANG/Salir','_self');
    
    
            },

 


             /* comandos modulo de crear cuenta */
             'mi nombre es *tag':function(variable){
                let camposusuario = document.getElementById("cnombre");
                camposusuario.value = variable;
                voz("se ha escrito"+variable);
  
            },


            'nombre':function(){

                console.log("selecionar campo usuario");

                $("#cnombre").trigger('click');
                /* voz($( "a.texto1" ).text()); */
    
            },

            'mi apellido es *tag':function(variable){
                let camposusuario = document.getElementById("capellido");
                camposusuario.value = variable;
                voz("se ha escrito"+variable);
  
            },

            
            'apellido':function(){

                console.log("selecionar campo usuario");

                $("#capellido").trigger('select');
                /* voz($( "a.texto1" ).text()); */
    
            },
 
            'mi correo es *tag':function(variable){

                
                      let camposusuario = document.getElementById("ccorreo");
                      camposusuario.value = variable.replace(/\ /g, "").replace(/arroba/g, "@").toLowerCase();
          
                      voz("se ha escrito"+variable);
                
            },

        
//hacer que funcione el arroba



            'correo':function(){

                console.log("selecionar campo usuario");

                $("#ccorreo").trigger('select');
                /* voz($( "a.texto1" ).text()); */
    
            },

            'mi documento es *tag':function(variable){
                let camposusuario = document.getElementById("cdocumento");
                camposusuario.value = variable;
                voz("se ha escrito"+variable);
  
            },

           

            'documento':function(){

                console.log("selecionar campo usuario");

                $("#cdocumento").trigger('select');
                /* voz($( "a.texto1" ).text()); */
    
            },

            'mi usuario es *tag':function(variable){
                let camposusuario = document.getElementById("usuario");
                camposusuario.value = variable;
                voz("se ha escrito"+variable);
  
            },

            'contenido usuario':function(){
            
                let camposusuario = document.getElementById("usuario").value;
                voz(camposusuario);


              
              /*   voz($(camposusuario)); */
        
    
            },

            
            'usuario':function(){

                console.log("selecionar campo usuario");

                $("#usuario").trigger('select');
                /* voz($( "a.texto1" ).text()); */
    
            },

            'mi clave es *tag':function(variable){
                let camposusuario = document.getElementById("clave");
                camposusuario.value = variable;
                voz("se ha escrito"+variable);
  
            },

           

  

            'clave':function(){

                console.log("selecionar campo usuario");

                $("#clave").trigger('select');
                /* voz($( "a.texto1" ).text()); */
    
            },

        

            'ir a crear cuenta':function(){

                
                $("#crcuenta").trigger('click');
    
    
            },

            'ir a Iniciar sesión':function(){

               
                $(".btnic").trigger('click');
    
    
            },
            'retroceder':function(){

                window.history.back();
    
    
            },
            
            'avanzar':function(){

                window.history.forward();
    
    
            },
            
           


           
           

            'pausar asistente':function(){
                
                annyang.pause();
            }
        }
    annyang.addCommands(commands);
   
}





if (!annyang) {
    swal({

        type: "warning",
        title: "Lo siento, tu navegador no soporta el reconocimiento de voz",
        showCancelButton: true,
        cancelButtonText: "cancelar",
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6"
    
    })
}




      