
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




/* window.addEventListener("keypress",checkKeyPress, false);

function checkKeyPress (key){
    if(key.keyCode == "32"){
        
        start()

    }
} */


if(annyang){
    console.log("funciona annyang")

    annyang.setLanguage("es-MX")
    annyang.debug()
annyang.start({ autoRestart: true, continuous: false });
annyang.addCallback("result", frases => {
    console.log("Que se esta diciendo: ", frases);
});


    //comandos

        var commands ={
            'aulas':function(){

               
                window.open('http://localhost/AULA-ANNYANG/Aulas-Virtuales','_self');
                
    
            },
            'hola':function(){
                console.log("hola2")
              
            },

            'que pasa chavales':function(){

                voz('¿todo bien? ¿todo correcto? . y yo que me alegro!');
    
            },

            
            'dime el texto':function(){
                console.log($( "a.texto1" ).text());
                voz($( "a.texto1" ).text());
    
    
            },

                 
            'menú':function(){

                console.log("menu");

                console.log($("a.contmenu").each(function(index){
                    voz( index + ": " + $(this).text());
                }));
                /* voz($( "a.texto1" ).text()); */
    
    
            },

            'boton':function(){

                voz('se oprimio el boton');
                $( "#btn2" ).click();
    
    
            },

            'pausar asistente':function(){
                
                annyang.pause();
            }
        }
    annyang.addCommands(commands);
   
}
